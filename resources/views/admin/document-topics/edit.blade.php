@extends('layouts.admin')

@section('title', 'Sửa chủ đề tài liệu')

@section('content')
    <div class="page-card">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:18px;">
            <div>
                <h2 style="margin:0;">Sửa chủ đề</h2>
                <div class="muted">Điều chỉnh tên hoặc slug để phù hợp</div>
            </div>
        </div>

        <form method="post" action="{{ route('admin.document-topics.update', ['document_topic' => $topic->id]) }}" style="display:grid;gap:16px;">
            @csrf
            @method('put')
            <div style="display:grid;gap:6px;">
                <label for="name">Tên chủ đề</label>
                <input id="name" name="name" type="text" value="{{ old('name', $topic->name) }}"
                       style="padding:10px 12px;border:1px solid #ced4da;border-radius:8px;">
                @error('name')<div style="color:#d92a1c;font-size:13px;">{{ $message }}</div>@enderror
            </div>
            <div style="display:grid;gap:6px;">
                <label for="slug">Slug (tùy chọn)</label>
                <input id="slug" name="slug" type="text" value="{{ old('slug', $topic->slug) }}"
                       style="padding:10px 12px;border:1px solid #ced4da;border-radius:8px;">
                <div class="muted" style="font-size:13px;">Nếu bỏ trống, slug sẽ cập nhật theo tên.</div>
            </div>
            <div style="display:flex;gap:10px;">
                <button type="submit" class="btn-dark">Lưu lại</button>
                <a href="{{ route('admin.document-topics.index') }}" class="muted" style="line-height:38px;">Hủy</a>
            </div>
        </form>
    </div>
@endsection
