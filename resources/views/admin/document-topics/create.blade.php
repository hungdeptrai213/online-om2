@extends('layouts.admin')

@section('title', 'Tạo chủ đề tài liệu')

@section('content')
    <div class="page-card">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:18px;">
            <div>
                <h2 style="margin:0;">Tạo chủ đề mới</h2>
                <div class="muted">Đặt tên và slug để dễ lọc tài liệu</div>
            </div>
        </div>

        <form method="post" action="{{ route('admin.document-topics.store') }}" style="display:grid;gap:16px;">
            @csrf
            <div style="display:grid;gap:6px;">
                <label for="name">Tên chủ đề</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}"
                       style="padding:10px 12px;border:1px solid #ced4da;border-radius:8px;">
                @error('name')<div style="color:#d92a1c;font-size:13px;">{{ $message }}</div>@enderror
            </div>
            <div style="display:grid;gap:6px;">
                <label for="slug">Slug (tùy chọn)</label>
                <input id="slug" name="slug" type="text" value="{{ old('slug') }}"
                       style="padding:10px 12px;border:1px solid #ced4da;border-radius:8px;">
                <div class="muted" style="font-size:13px;">Nếu không nhập, hệ thống tự tạo dựa trên tên.</div>
            </div>
            <button type="submit" class="btn-dark" style="align-self:flex-start;">Lưu chủ đề</button>
        </form>
    </div>
@endsection
