@extends('layouts.admin')

@section('title', 'Sửa khóa học')

@section('content')
    <div class="page-card" style="max-width: 900px; margin: 0 auto;">
        <div style="display:flex;justify-content:space-between;gap:12px;align-items:center;margin-bottom:14px;">
            <div>
                <h2 style="margin:0;">Sửa khóa học</h2>
                <div class="muted">Cập nhật thông tin khóa học</div>
            </div>
            <a href="{{ route('admin.courses.index') }}" class="btn-dark"
                style="background:#f4f6fb;color:#1f2d3d;border:1px solid #e3e8f1;">Quay lại</a>
        </div>

        @if ($errors->any())
            <div
                style="padding:10px 12px;border-radius:10px;border:1px solid #f5c2c7;background:#fdf3f4;color:#842029;margin-bottom:12px;">
                <ul style="margin:0; padding-left:18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('admin.courses.update', $course) }}" enctype="multipart/form-data"
            style="display:grid;gap:14px;">
            @csrf
            @method('PUT')

            <div style="display:grid;gap:12px;">
                <div>
                    <label style="font-weight:700;">Tiêu đề *</label>
                    <input type="text" name="title" value="{{ old('title', $course->title) }}" required
                        style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;">
                </div>
                <div>
                    <label style="font-weight:700;">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug', $course->slug) }}"
                        style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;">
                </div>
            </div>

            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:12px;">
                <div>
                    <label style="font-weight:700;">Danh mục</label>
                    @php
                        $selectedCategories = old('category_ids', $course->categories->pluck('id')->all()) ?? [];
                    @endphp <select name="category_ids[]" multiple
                        style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;min-height:120px;">
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" @selected(in_array($cat->id, $selectedCategories))>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    <div class="muted" style="font-size:13px;margin-top:6px;">Giữ Ctrl/Command để chọn nhiều danh mục.
                    </div>
                </div>
                <div>
                    <label style="font-weight:700;">Giá *</label>
                    <input type="number" step="0.01" min="0" name="price"
                        value="{{ old('price', $course->price) }}" required
                        style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;">
                </div>
                <div>
                    <label style="font-weight:700;">Giá khuyến mãi</label>
                    <input type="number" step="0.01" min="0" name="sale_price"
                        value="{{ old('sale_price', $course->sale_price) }}"
                        style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;">
                </div>
                <div>
                    <label style="font-weight:700;">Trạng thái *</label>
                    <select name="status" required
                        style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;">
                        <option value="draft" @selected(old('status', $course->status) === 'draft')>Nháp</option>
                        <option value="published" @selected(old('status', $course->status) === 'published')>Xuất bản</option>
                        <option value="archived" @selected(old('status', $course->status) === 'archived')>Lưu trữ</option>
                    </select>
                </div>
                <div>
                    <label style="font-weight:700;">Ngày xuất bản</label>
                    <input type="datetime-local" name="published_at"
                        value="{{ old('published_at', optional($course->published_at)->format('Y-m-d\TH:i')) }}"
                        style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;">
                </div>
            </div>

                @php
                    $thumb = $course->thumbnail ?? '';
                    $thumbUrlSafe = '';
                    if ($thumb) {
                        if (\Illuminate\Support\Str::startsWith($thumb, ['http://', 'https://'])) {
                            $thumbUrlSafe = $thumb;
                        } elseif (\Illuminate\Support\Str::startsWith($thumb, ['/storage', 'storage'])) {
                            $thumbUrlSafe = asset(ltrim($thumb, '/'));
                        } elseif (\Illuminate\Support\Str::startsWith($thumb, ['public/'])) {
                            $thumbUrlSafe = asset(\Illuminate\Support\Str::replaceFirst('public/', 'storage/', $thumb));
                        } else {
                            $thumbUrlSafe = asset('storage/' . ltrim($thumb, '/'));
                        }
                    }
                @endphp
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:12px;">
                <div>
                    <label style="font-weight:700;">Tác giả</label>
                    <input type="text" name="author" value="{{ old('author', $course->author) }}"
                        style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;">
                </div>
                <div style="overflow: hidden;">
                    <label style="font-weight:700;">Ảnh thumbnail</label>
                    <input id="thumbInput" type="file" name="thumbnail_upload" accept="image/*" style="display:none;">
                    <label for="thumbInput"
                        style="margin-top:6px;display:inline-flex;align-items:center;gap:8px;padding:10px 14px;border:1px solid #e3e8f1;border-radius:10px;background:#f8fafc;cursor:pointer;">
                        <i class="fa-solid fa-image"></i> <span
                            id="thumbFileName">{{ $thumbUrlSafe ? basename($thumbUrlSafe) : 'Chọn ảnh' }}</span>
                    </label>
                    <div style="margin-top:8px;">
                        <img id="thumbPreview" src="{{ $thumbUrlSafe }}" alt="Preview"
                            data-has-initial="{{ $thumbUrlSafe ? '1' : '' }}"
                            style="max-width:200px;border-radius:10px;{{ $thumbUrlSafe ? '' : 'display:none;' }}border:1px solid #e6ecf5;padding:4px;">
                    </div>
                </div>
            </div>

            <div>
                <label style="font-weight:700;">Mô tả ngắn</label>
                <textarea name="short_description" rows="3"
                    style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;">{{ old('short_description', $course->short_description) }}</textarea>
            </div>

            <div>
                <label style="font-weight:700;">Nội dung chi tiết</label>
                <textarea name="description" rows="6"
                    style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;">{{ old('description', $course->description) }}</textarea>
            </div>

            <div style="display:flex;gap:10px;">
                <button type="submit" class="btn-dark">Lưu thay đổi</button>
                <a href="{{ route('admin.courses.index') }}"
                    style="padding:10px 14px;border-radius:10px;border:1px solid #e3e8f1;text-decoration:none;">Hủy</a>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        (function() {
            const input = document.querySelector('input[name="thumbnail_upload"]');
            const preview = document.getElementById('thumbPreview');
            const fileName = document.getElementById('thumbFileName');
            if (input) {
                input.addEventListener('change', function() {
                    const file = this.files?.[0];
                    if (!file) {
                        if (!preview.dataset.hasInitial) {
                            preview.style.display = 'none';
                            preview.src = '';
                        }
                        if (fileName && !preview.dataset.hasInitial) fileName.textContent = 'Chọn ảnh';
                        return;
                    }
                    if (fileName) fileName.textContent = file.name;
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                });
            }
        })();
    </script>
@endpush
