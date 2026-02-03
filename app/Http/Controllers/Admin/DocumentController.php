<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\DocumentTopic;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $query = Document::with('topics')->latest();
        $search = trim((string) $request->get('q', ''));
        if ($search) {
            $query->where('title', 'like', "%{$search}%");
        }

        $topicId = (int) $request->get('topic');
        if ($topicId) {
            $query->whereHas('topics', function ($q) use ($topicId) {
                $q->where('document_topics.id', $topicId);
            });
        }

        $documents = $query->paginate(12)->withQueryString();
        $topics = DocumentTopic::orderBy('name')->get();

        return view('admin.documents.index', [
            'documents' => $documents,
            'topics' => $topics,
            'search' => $search,
            'topicId' => $topicId,
        ]);
    }

    public function create()
    {
        $topics = DocumentTopic::orderBy('name')->get();

        return view('admin.documents.create', [
            'topics' => $topics,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'link_upload' => ['required', 'file', 'mimes:pdf', 'max:51200'], // 50MB
            'price' => ['nullable', 'numeric', 'min:0'],
            'published_at' => ['nullable', 'date'],
            'description' => ['nullable', 'string'],
            'lecturer_name' => ['nullable', 'string', 'max:255'],
            'lecturer_bio' => ['nullable', 'string', 'max:2000'],
            'thumbnail_upload' => ['nullable', 'image', 'max:2048'],
            'topic_ids' => ['nullable', 'array'],
            'topic_ids.*' => ['integer', 'exists:document_topics,id'],
            'new_topics' => ['nullable', 'string'],
        ]);

        $description = trim($data['description'] ?? '');
        $lecturerName = trim($data['lecturer_name'] ?? '');
        $lecturerBio = trim($data['lecturer_bio'] ?? '');
        $linkPath = $request->file('link_upload')->store('document-files', 'public');
        $link = 'storage/' . $linkPath;
        $thumbnail = null;
        if ($request->hasFile('thumbnail_upload')) {
            $thumbnailPath = $request->file('thumbnail_upload')->store('document-thumbnails', 'public');
            $thumbnail = 'storage/' . $thumbnailPath;
        }

        $document = Document::create([
            'title' => trim($data['title']),
            'link' => $link,
            'price' => $data['price'] ?? 0,
            'published_at' => $data['published_at'],
            'description' => $description !== '' ? $description : null,
            'lecturer_name' => $lecturerName !== '' ? $lecturerName : null,
            'lecturer_bio' => $lecturerBio !== '' ? $lecturerBio : null,
            'thumbnail' => $thumbnail,
        ]);

        $topicIds = $this->resolveTopicIds($data['topic_ids'] ?? [], $data['new_topics'] ?? '');
        $document->topics()->sync($topicIds);

        return redirect()->route('admin.documents.index')->with('status', 'Tạo tài liệu thành công.');
    }

    public function edit(Document $document)
    {
        $topics = DocumentTopic::orderBy('name')->get();

        return view('admin.documents.edit', [
            'document' => $document,
            'topics' => $topics,
        ]);
    }

    public function update(Request $request, Document $document): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'link_upload' => ['nullable', 'file', 'mimes:pdf', 'max:51200'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'published_at' => ['nullable', 'date'],
            'description' => ['nullable', 'string'],
            'lecturer_name' => ['nullable', 'string', 'max:255'],
            'lecturer_bio' => ['nullable', 'string', 'max:2000'],
            'thumbnail_upload' => ['nullable', 'image', 'max:2048'],
            'topic_ids' => ['nullable', 'array'],
            'topic_ids.*' => ['integer', 'exists:document_topics,id'],
            'new_topics' => ['nullable', 'string'],
        ]);

        $description = trim($data['description'] ?? '');
        $lecturerName = trim($data['lecturer_name'] ?? '');
        $lecturerBio = trim($data['lecturer_bio'] ?? '');
        $thumbnail = $document->thumbnail;
        if ($request->hasFile('thumbnail_upload')) {
            if ($thumbnail && str_starts_with($thumbnail, 'storage/document-thumbnails/')) {
                $relativePath = Str::after($thumbnail, 'storage/');
                Storage::disk('public')->delete($relativePath);
            }
            $thumbnailPath = $request->file('thumbnail_upload')->store('document-thumbnails', 'public');
            $thumbnail = 'storage/' . $thumbnailPath;
        }

        $link = $document->link;
        if ($request->hasFile('link_upload')) {
            if ($link && str_starts_with($link, 'storage/document-files/')) {
                $relative = Str::after($link, 'storage/');
                Storage::disk('public')->delete($relative);
            }
            $linkPath = $request->file('link_upload')->store('document-files', 'public');
            $link = 'storage/' . $linkPath;
        }

        $document->update([
            'title' => trim($data['title']),
            'link' => $link,
            'price' => $data['price'] ?? 0,
            'published_at' => $data['published_at'],
            'description' => $description !== '' ? $description : null,
            'lecturer_name' => $lecturerName !== '' ? $lecturerName : null,
            'lecturer_bio' => $lecturerBio !== '' ? $lecturerBio : null,
            'thumbnail' => $thumbnail,
        ]);

        $topicIds = $this->resolveTopicIds($data['topic_ids'] ?? [], $data['new_topics'] ?? '');
        $document->topics()->sync($topicIds);

        return redirect()->route('admin.documents.index')->with('status', 'Cập nhật tài liệu thành công.');
    }

    public function destroy(Document $document): RedirectResponse
    {
        $document->delete();

        return redirect()->route('admin.documents.index')->with('status', 'Xóa tài liệu thành công.');
    }

    private function resolveTopicIds(array $selectedIds, string $extra): array
    {
        $ids = array_filter($selectedIds, fn ($value) => is_numeric($value) && (int) $value > 0);
        $ids = array_map('intval', $ids);

        $extraTopics = collect(explode(',', $extra))
            ->map(fn ($item) => trim($item))
            ->filter()
            ->unique()
            ->reject(fn ($item) => $item === '');

        foreach ($extraTopics as $name) {
            $slug = Str::slug($name);
            if (!$slug) {
                $slug = Str::random(6);
            }
            $topic = DocumentTopic::firstOrCreate(
                ['slug' => $slug],
                ['name' => $name]
            );
            $ids[] = $topic->id;
        }

        return array_values(array_unique($ids));
    }
}
