@extends('layouts.admin')

@section('title', 'Khóa học')

@section('content')
    <div class="page-card">
        <div style="display:flex;justify-content:space-between;gap:12px;align-items:center;margin-bottom:14px;">
            <div>
                <h2 style="margin:0;">Khóa học</h2>
                <div class="muted">Danh sách khóa học (courses)</div>
            </div>
            <a href="{{ route('admin.courses.create') }}" class="btn-dark">+ Thêm mới</a>
        </div>

        @if (session('msg'))
            <div style="padding:10px 12px;border-radius:10px;background:#e6f7ee;color:#1b7f46;margin-bottom:12px;">
                {{ session('msg') }}
            </div>
        @endif

        <form method="get" style="display:flex;justify-content:flex-end;gap:10px;align-items:center;margin-bottom:14px;flex-wrap:wrap;">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Tìm theo tiêu đề, slug, tác giả"
                   style="padding:10px 12px;border:1px solid #e3e8f1;border-radius:6px;min-width:240px;">
            <select name="category_id" style="padding:10px 12px;border:1px solid #e3e8f1;border-radius:6px;min-width:180px;">
                <option value="">Danh mục</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @selected(request('category_id') == $cat->id)>{{ $cat->name }}</option>
                @endforeach
            </select>
            <select name="status" style="padding:10px 12px;border:1px solid #e3e8f1;border-radius:6px;min-width:160px;">
                <option value="">Trạng thái</option>
                <option value="draft" @selected(request('status')==='draft')>Nháp</option>
                <option value="published" @selected(request('status')==='published')>Xuất bản</option>
                <option value="archived" @selected(request('status')==='archived')>Lưu trữ</option>
            </select>
            <button type="submit" class="btn-dark" style="padding:9px 14px;border-radius:6px;">Lọc</button>
            <a href="{{ route('admin.courses.index') }}" style="color:#1f2d3d;text-decoration:none;">Xóa lọc</a>
        </form>

        <div style="overflow:auto;">
            <table style="width:100%;border-collapse:collapse;">
                <thead>
                <tr style="background:#f7f8fb;text-align:left;">
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">#</th>
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">Tiêu đề</th>
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">Danh mục</th>
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">Giá</th>
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">Trạng thái</th>
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">Ngày tạo</th>
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">Hành động</th>
                </tr>
                </thead>
                <tbody>
                @forelse($courses as $course)
                    <tr>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;">{{ $course->id }}</td>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;">
                            <div style="font-weight:700;color:#1f2d3d;">{{ $course->title }}</div>
                            @if($course->author)
                                <div style="color:#8ea0c1;font-size:13px;">Tác giả: {{ $course->author }}</div>
                            @endif
                        </td>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;">
                            @php
                                $categoryNames = $course->categories->pluck('name')->all();
                                if (!$categoryNames && $course->category?->name) {
                                    $categoryNames[] = $course->category->name;
                                }
                            @endphp
                            {{ $categoryNames ? implode(', ', $categoryNames) : '—' }}
                        </td>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;">
                            <div style="font-weight:700;">{{ number_format((float)$course->price, 0, ',', '.') }}đ</div>
                            @if($course->sale_price)
                                <div style="color:#dc2626;font-size:13px;">Sale: {{ number_format((float)$course->sale_price, 0, ',', '.') }}đ</div>
                            @endif
                        </td>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;">
                            @php
                                $statusLabel = ['draft' => 'Nháp', 'published' => 'Xuất bản', 'archived' => 'Lưu trữ'][$course->status] ?? $course->status;
                                $statusColor = match($course->status) {
                                    'published' => ['#e6f7ee', '#1b7f46'],
                                    'archived' => ['#f3f4f6', '#4b5563'],
                                    default => ['#fff4e5', '#a36100'],
                                };
                            @endphp
                            <span style="background:{{ $statusColor[0] }};color:{{ $statusColor[1] }};padding:4px 8px;border-radius:8px;font-size:12px;">
                                {{ $statusLabel }}
                            </span>
                        </td>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;">{{ $course->created_at?->format('d/m/Y') }}</td>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;display:flex;gap:10px;flex-wrap:wrap;align-items:center;">
                            <a href="{{ route('admin.courses.content', $course) }}" style="padding:9px 14px;border-radius:9px;border:1px solid #0ea5e9;background:linear-gradient(135deg,#0ea5e9,#0284c7);color:#fff;text-decoration:none;font-weight:800;box-shadow:0 8px 18px rgba(8,145,178,0.25);">
                                Bài học
                            </a>
                            <a href="{{ route('admin.courses.edit', $course) }}" style="width:36px;height:36px;border-radius:10px;border:1px solid #e6ecf5;text-decoration:none;display:inline-flex;align-items:center;justify-content:center;background:#fff;">
                                <i class="fa-solid fa-pen" style="font-size:14px;color:#1f2d3d;"></i>
                            </a>
                            <form action="{{ route('admin.courses.destroy', $course) }}" method="post" onsubmit="return confirm('Xóa khóa học này?');">
                                @csrf
                                @method('delete')
                                <button type="submit" style="width:36px;height:36px;border-radius:10px;border:1px solid #f5c2c7;background:#ffecec;color:#d14343;cursor:pointer;display:inline-flex;align-items:center;justify-content:center;">
                                    <i class="fa-solid fa-trash" style="font-size:15px;"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="padding:14px;text-align:center;color:#1f2d3d;">Không có khóa học phù hợp.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top:12px;">
            {{ $courses->links() }}
        </div>
    </div>
@endsection
