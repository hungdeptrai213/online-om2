@extends('layouts.admin')

@section('title', 'Chỉnh sửa tài liệu')

@section('content')
    <div class="page-card">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:18px;">
            <div>
                <h2 style="margin:0;">Chỉnh sửa tài liệu</h2>
                <div class="muted">Cập nhật thông tin và chủ đề</div>
            </div>
        </div>

        <form method="post" action="{{ route('admin.documents.update', ['document' => $document->id]) }}" style="display:grid;gap:16px;">
            @csrf
            @method('put')
            <div style="display:grid;gap:6px;">
                <label for="title">Tiêu đề</label>
                <input id="title" name="title" type="text" value="{{ old('title', $document->title) }}"
                       style="padding:10px 12px;border:1px solid #ced4da;border-radius:8px;">
                @error('title')<div style="color:#d92a1c;font-size:13px;">{{ $message }}</div>@enderror
            </div>
            <div style="display:grid;gap:6px;">
                <label for="link">Link tài liệu</label>
                <input id="link" name="link" type="text" value="{{ old('link', $document->link) }}"
                       style="padding:10px 12px;border:1px solid #ced4da;border-radius:8px;">
                @error('link')<div style="color:#d92a1c;font-size:13px;">{{ $message }}</div>@enderror
            </div>
            <div style="display:grid;gap:6px;">
                <label for="price">Giá (VNĐ)</label>
                <input id="price" name="price" type="number" min="0" step="0.01" value="{{ old('price', $document->price) }}"
                       style="padding:10px 12px;border:1px solid #ced4da;border-radius:8px;">
                @error('price')<div style="color:#d92a1c;font-size:13px;">{{ $message }}</div>@enderror
            </div>
            <div style="display:grid;gap:6px;">
                <label for="published_at">Ngày tháng</label>
                <input id="published_at" name="published_at" type="date" value="{{ old('published_at', $document->published_at?->format('Y-m-d')) }}"
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
                       style="padding:10px 12px;border:1px solid #ced4da;border-radius:8px;">
            </div>

            <div style="display:flex;gap:10px;">
                <button type="submit" class="btn-dark">Lưu thay đổi</button>
                <a href="{{ route('admin.documents.index') }}" class="muted" style="align-self:flex-center;line-height:38px;">Hủy</a>
            </div>
        </form>
    </div>
@endsection
