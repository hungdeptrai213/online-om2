@extends('layouts.admin')

@section('title', 'Chỉnh sửa tài liệu')

@section('content')
    @php
        $thumb = $document->thumbnail;
        $thumbUrl = $thumb && \Illuminate\Support\Str::startsWith($thumb, ['http://', 'https://'])
            ? $thumb
            : ($thumb ? asset($thumb) : null);
    @endphp
    <div class="page-card">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:18px;">
            <div>
                <h2 style="margin:0;">Chỉnh sửa tài liệu</h2>
                <div class="muted">Cập nhật thông tin và chủ đề</div>
            </div>
        </div>

        <form method="post" action="{{ route('admin.documents.update', ['document' => $document->id]) }}" enctype="multipart/form-data" style="display:grid;gap:16px;">
            @csrf
            @method('put')
            <div style="display:grid;gap:6px;">
                <label for="title">Tiêu đề</label>
                <input id="title" name="title" type="text" value="{{ old('title', $document->title) }}"
                       placeholder="VD: Content Strategy Workbook"
                       style="padding:10px 12px;border:1px solid #ced4da;border-radius:8px;">
                @error('title')<div style="color:#d92a1c;font-size:13px;">{{ $message }}</div>@enderror
            </div>
            <div style="display:grid;gap:6px;">
                <label for="description">Mô tả</label>
                <textarea id="description" name="description" rows="4"
                          placeholder="Tóm tắt ngắn gọn nội dung tài liệu, mục tiêu học liệu..."
                          style="padding:10px 12px;border:1px solid #ced4da;border-radius:8px;">{{ old('description', $document->description) }}</textarea>
                @error('description')<div style="color:#d92a1c;font-size:13px;">{{ $message }}</div>@enderror
            </div>
            <div style="display:grid;gap:6px;">
                <label for="lecturer_name">Giang vien</label>
                <input id="lecturer_name" name="lecturer_name" type="text" value="{{ old('lecturer_name', $document->lecturer_name) }}"
                       placeholder="VD: Nguyen Van A"
                       style="padding:10px 12px;border:1px solid #ced4da;border-radius:8px;">
                @error('lecturer_name')<div style="color:#d92a1c;font-size:13px;">{{ $message }}</div>@enderror
            </div>
            <div style="display:grid;gap:6px;">
                <label for="lecturer_bio">Gioi thieu giang vien</label>
                <textarea id="lecturer_bio" name="lecturer_bio" rows="4"
                          placeholder="Tom tat kinh nghiem giang day, chuyen mon..."
                          style="padding:10px 12px;border:1px solid #ced4da;border-radius:8px;">{{ old('lecturer_bio', $document->lecturer_bio) }}</textarea>
                @error('lecturer_bio')<div style="color:#d92a1c;font-size:13px;">{{ $message }}</div>@enderror
            </div>
            <div style="display:grid;gap:6px;">
                <label for="thumbnail_upload">Ảnh bìa nhỏ (upload)</label>
                <input id="thumbnail_upload" name="thumbnail_upload" type="file" accept="image/*"
                       style="padding:10px 12px;border:1px solid #ced4da;border-radius:8px;background:#fff;">
                @if($thumbUrl)
                    <div style="display:flex;gap:10px;align-items:center;">
                        <img src="{{ $thumbUrl }}" alt="Thumbnail hiện tại" style="height:80px;border-radius:8px;border:1px solid #e5e7eb;">
                        <span class="muted" style="font-size:13px;">Đang dùng ảnh hiện tại. Chọn file mới để thay.</span>
                    </div>
                @endif
                <div class="muted" style="font-size:13px;">Định dạng: jpg, png, webp. Tối đa 2MB.</div>
                @error('thumbnail_upload')<div style="color:#d92a1c;font-size:13px;">{{ $message }}</div>@enderror
            </div>
            <div style="display:grid;gap:6px;">
                <label for="link_upload">File tài liệu (PDF)</label>
                <input id="link_upload" name="link_upload" type="file" accept="application/pdf"
                       style="padding:10px 12px;border:1px solid #ced4da;border-radius:8px;background:#fff;">
                @if($document->link)
                    <div class="muted" style="font-size:13px;">Đang dùng file hiện tại. Chọn file mới để thay.</div>
                @endif
                <div class="muted" style="font-size:13px;">Chỉ PDF, dung lượng tối đa 50MB.</div>
                @error('link_upload')<div style="color:#d92a1c;font-size:13px;">{{ $message }}</div>@enderror
            </div>
            <div style="display:grid;gap:6px;">
                <label for="price">Giá (VNĐ)</label>
                <input id="price" name="price" type="number" min="0" step="0.01" value="{{ old('price', $document->price) }}"
                       placeholder="0 cho tài liệu miễn phí"
                       style="padding:10px 12px;border:1px solid #ced4da;border-radius:8px;">
                @error('price')<div style="color:#d92a1c;font-size:13px;">{{ $message }}</div>@enderror
            </div>
            <div style="display:grid;gap:6px;">
                <label for="published_at">Ngày tháng</label>
                <input id="published_at" name="published_at" type="date" value="{{ old('published_at', $document->published_at?->format('Y-m-d')) }}"
                       placeholder="YYYY-MM-DD"
                       style="padding:10px 12px;border:1px solid #ced4da;border-radius:8px;">
            </div>
            <div style="display:grid;gap:6px;">
                <label for="topic_ids">Chủ đề (có thể chọn nhiều)</label>
                <select id="topic_ids" name="topic_ids[]" multiple size="5"
                        style="padding:10px 12px;border:1px solid #ced4da;border-radius:8px;">
                    @foreach($topics as $topic)
                        <option value="{{ $topic->id }}"
                                @selected(in_array($topic->id, old('topic_ids', $document->topics->pluck('id')->toArray())))>{{ $topic->name }}</option>
                    @endforeach
                </select>
            </div>
            <div style="display:grid;gap:6px;">
                <label for="new_topics">Chủ đề mới (phân cách bằng dấu phẩy)</label>
                <input id="new_topics" name="new_topics" type="text" value="{{ old('new_topics') }}"
                       placeholder="Marketing, Content, Branding..."
                       style="padding:10px 12px;border:1px solid #ced4da;border-radius:8px;">
            </div>

            <div style="display:flex;gap:10px;">
                <button type="submit" class="btn-dark">Lưu thay đổi</button>
                <a href="{{ route('admin.documents.index') }}" class="muted" style="align-self:flex-center;line-height:38px;">Hủy</a>
            </div>
        </form>
    </div>
@endsection
