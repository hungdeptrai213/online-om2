<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::with(['categories', 'category']);

        if ($request->filled('q')) {
            $q = $request->string('q');
            $query->where(function ($builder) use ($q) {
                $builder->where('title', 'like', '%' . $q . '%')
                    ->orWhere('slug', 'like', '%' . $q . '%')
                    ->orWhere('author', 'like', '%' . $q . '%');
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->string('status'));
        }

        if ($request->filled('category_id')) {
            $categoryId = $request->integer('category_id');
            $query->where(function ($builder) use ($categoryId) {
                $builder->whereHas('categories', function ($q) use ($categoryId) {
                    $q->where('course_category_id', $categoryId);
                })->orWhere('course_category_id', $categoryId);
            });
        }

        $courses = $query->latest()->paginate(10)->withQueryString();
        $categories = CourseCategory::orderBy('name')->get();

        return view('admin.courses.index', compact('courses', 'categories'));
    }

    public function create()
    {
        $categories = CourseCategory::orderBy('name')->get();
        return view('admin.courses.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);
        $categoryIds = $data['category_ids'] ?? [];
        unset($data['category_ids']);
        $data['course_category_id'] = $categoryIds[0] ?? null;

        if ($request->hasFile('thumbnail_upload')) {
            $path = $request->file('thumbnail_upload')->store('thumbnails', 'public');
            $data['thumbnail'] = 'storage/' . $path;
        }

        $course = Course::create($data);
        $course->categories()->sync($categoryIds);

        return redirect()->route('admin.courses.index')->with('msg', 'Tạo khóa học thành công.');
    }

    public function edit(Course $course)
    {
        $course->load('categories');
        $categories = CourseCategory::orderBy('name')->get();
        return view('admin.courses.edit', compact('course', 'categories'));
    }

    public function update(Request $request, Course $course)
    {
        $data = $this->validatedData($request, $course->id);
        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);
        $categoryIds = $data['category_ids'] ?? [];
        unset($data['category_ids']);
        $data['course_category_id'] = $categoryIds[0] ?? null;

        $currentThumbnail = $course->thumbnail;
        if ($request->hasFile('thumbnail_upload')) {
            $path = $request->file('thumbnail_upload')->store('thumbnails', 'public');
            $data['thumbnail'] = 'storage/' . $path;
        } else {
            // Giữ nguyên thumbnail cũ nếu không upload mới
            $data['thumbnail'] = $currentThumbnail;
        }

        $course->update($data);
        $course->categories()->sync($categoryIds);

        return redirect()->route('admin.courses.index')->with('msg', 'Cập nhật khóa học thành công.');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('admin.courses.index')->with('msg', 'Đã xóa khóa học.');
    }

    private function validatedData(Request $request, ?int $ignoreId = null): array
    {
        $slugRule = ['nullable', 'string', 'max:255'];
        if ($ignoreId) {
            $slugRule[] = 'unique:courses,slug,' . $ignoreId;
        } else {
            $slugRule[] = 'unique:courses,slug';
        }

        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => $slugRule,
            'category_ids' => ['nullable', 'array'],
            'category_ids.*' => ['integer', 'exists:course_categories,id'],
            'price' => ['required', 'numeric', 'min:0'],
            'sale_price' => ['nullable', 'numeric', 'min:0'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'description' => ['nullable', 'string'],
            'author' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'in:draft,published,archived'],
            'published_at' => ['nullable', 'date'],
            'thumbnail_upload' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
        ]);
    }
}
