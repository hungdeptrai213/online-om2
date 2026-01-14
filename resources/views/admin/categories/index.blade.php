@extends('layouts.admin')

@section('title', 'Danh mục khóa học')

@section('content')
    <div class="page-card">
        <div style="display:flex;justify-content:space-between;gap:12px;align-items:center;margin-bottom:14px;">
            <div>
                <h2 style="margin:0;">Danh mục khóa học</h2>
                <div class="muted">Quản lý bảng course_categories</div>
            </div>
            <a href="{{ route('admin.categories.create') }}" class="btn-dark">+ Thêm mới</a>
        </div>

        @if (session('msg'))
            <div style="padding:10px 12px;border-radius:8px;background:#e6f7ee;color:#1b7f46;margin-bottom:12px;">
                {{ session('msg') }}
            </div>
        @endif

        <form method="get" style="display:flex;justify-content:flex-end;gap:10px;align-items:center;margin-bottom:14px;flex-wrap:wrap;">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Tìm theo tên hoặc slug"
                   style="padding:10px 12px;border:1px solid #e3e8f1;border-radius:8px;min-width:220px;">
            <button type="submit" class="btn-dark" style="padding:9px 14px;border-radius:8px;">Lọc</button>
            <a href="{{ route('admin.categories.index') }}" style="color:#1f2d3d;text-decoration:none;">Xóa lọc</a>
        </form>

        <div style="overflow:auto;">
            <table style="width:100%;border-collapse:collapse;">
                <thead>
                <tr style="background:#f7f8fb;text-align:left;">
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">#</th>
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">Tên</th>
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">Slug</th>
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">Danh mục cha</th>
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">Mô tả</th>
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">Hành động</th>
                </tr>
                </thead>
                <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;">{{ $category->id }}</td>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;">{{ $category->name }}</td>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;">{{ $category->slug }}</td>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;">{{ $category->parent?->name ?? '—' }}</td>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;">{{ Str::limit($category->description, 60) }}</td>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;display:flex;gap:8px;flex-wrap:wrap;">
                            <a href="{{ route('admin.categories.edit', $category) }}" style="padding:8px 10px;border-radius:8px;border:1px solid #e6ecf5;text-decoration:none;">Sửa</a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="post" onsubmit="return confirm('Xóa danh mục này?');">
                                @csrf
                                @method('delete')
                                <button type="submit" style="padding:8px 10px;border-radius:8px;border:1px solid #f1d0d0;background:#ffecec;color:#d14343;cursor:pointer;">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="padding:14px;text-align:center;color:#1f2d3d;">Không có danh mục phù hợp.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top:12px;">
            {{ $categories->links() }}
        </div>
    </div>
@endsection
