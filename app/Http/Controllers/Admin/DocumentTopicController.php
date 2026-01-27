<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DocumentTopic;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class DocumentTopicController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->get('q', ''));
        $query = DocumentTopic::orderBy('name');
        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $topics = $query->paginate(20)->withQueryString();

        return view('admin.document-topics.index', [
            'topics' => $topics,
            'search' => $search,
        ]);
    }

    public function create()
    {
        return view('admin.document-topics.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('document_topics', 'slug')],
        ]);

        DocumentTopic::create([
            'name' => trim($data['name']),
            'slug' => $data['slug'] ? Str::slug($data['slug']) : Str::slug($data['name']),
        ]);

        return redirect()->route('admin.document-topics.index')->with('status', 'Chủ đề tài liệu đã được tạo.');
    }

    public function edit(DocumentTopic $documentTopic)
    {
        return view('admin.document-topics.edit', [
            'topic' => $documentTopic,
        ]);
    }

    public function update(Request $request, DocumentTopic $documentTopic): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('document_topics', 'slug')->ignore($documentTopic->id)],
        ]);

        $documentTopic->update([
            'name' => trim($data['name']),
            'slug' => $data['slug'] ? Str::slug($data['slug']) : Str::slug($data['name']),
        ]);

        return redirect()->route('admin.document-topics.index')->with('status', 'Chủ đề được cập nhật.');
    }

    public function destroy(DocumentTopic $documentTopic): RedirectResponse
    {
        $documentTopic->documents()->detach();
        $documentTopic->delete();

        return redirect()->route('admin.document-topics.index')->with('status', 'Chủ đề đã bị xóa.');
    }
}
