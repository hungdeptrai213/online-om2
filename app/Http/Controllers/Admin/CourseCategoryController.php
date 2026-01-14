<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseCategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = CourseCategory::with('parent');

        if ($request->filled('q')) {
            $q = $request->string('q');
            $query->where(function ($builder) use ($q) {
                $builder->where('name', 'like', '%' . $q . '%')
                    ->orWhere('slug', 'like', '%' . $q . '%');
            });
        }

        $categories = $query->latest()->paginate(10)->withQueryString();
        $parents = CourseCategory::orderBy('name')->get();

        return view('admin.categories.index', compact('categories', 'parents'));
    }

    public function create()
    {
        $parents = CourseCategory::orderBy('name')->get();
        return view('admin.categories.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:course_categories,slug'],
            'description' => ['nullable', 'string'],
            'parent_id' => ['nullable', 'exists:course_categories,id'],
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['name']);

        CourseCategory::create($data);

        return redirect()->route('admin.categories.index')->with('msg', 'Tạo danh mục khóa học thành công.');
    }

    public function edit(CourseCategory $category)
    {
        $parents = CourseCategory::where('id', '!=', $category->id)->orderBy('name')->get();
        return view('admin.categories.edit', compact('category', 'parents'));
    }

    public function update(Request $request, CourseCategory $category)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:course_categories,slug,' . $category->id],
            'description' => ['nullable', 'string'],
            'parent_id' => ['nullable', 'exists:course_categories,id'],
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['name']);

        $category->update($data);

        return redirect()->route('admin.categories.index')->with('msg', 'Cập nhật danh mục khóa học thành công.');
    }

    public function destroy(CourseCategory $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('msg', 'Đã xóa danh mục.');
    }
}
