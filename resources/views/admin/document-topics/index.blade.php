@extends('layouts.admin')

@section('title', 'Chủ đề tài liệu')

@section('content')
    <div class="page-card">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:18px;">
            <div>
                <h2 style="margin:0;">Chủ đề tài liệu</h2>
                <div class="muted">Quản lý chủ đề để gán cho tài liệu</div>
            </div>
            <a class="btn-dark" href="{{ route('admin.document-topics.create') }}">Tạo chủ đề</a>
        </div>

        @if(session('status'))
            <div style="margin-bottom:12px;padding:10px 14px;border-radius:8px;background:#e6f3ff;color:#0f3d91;font-weight:600;">{{ session('status') }}</div>
        @endif

        <form method="get" style="display:flex;gap:10px;justify-content:flex-end;margin-bottom:14px;">
            <input type="text" name="q" value="{{ $search ?? '' }}" placeholder="Tìm theo tên" style="padding:10px 12px;border:1px solid #e3e8f1;border-radius:6px;min-width:240px;">
            <button type="submit" class="btn-dark" style="padding:9px 14px;border-radius:6px;">Lọc</button>
            <a href="{{ route('admin.document-topics.index') }}" style="color:#1f2d3d;text-decoration:none;">Xóa lọc</a>
        </form>

        <div style="overflow:auto;">
            <table style="width:100%;border-collapse:collapse;min-width:720px;">
                <thead>
                <tr style="text-align:left;background:#f7f9fc;">
                    <th style="padding:10px 12px;border-bottom:1px solid #e6ecf5;width:50px;">#</th>
                    <th style="padding:10px 12px;border-bottom:1px solid #e6ecf5;">Tên</th>
                    <th style="padding:10px 12px;border-bottom:1px solid #e6ecf5;">Slug</th>
                    <th style="padding:10px 12px;border-bottom:1px solid #e6ecf5;">Hành động</th>
                </tr>
                </thead>
                <tbody>
                @forelse($topics as $idx => $topic)
                    <tr style="border-bottom:1px solid #eef1f7;">
                        <td style="padding:10px 12px;color:#6b7280;">{{ ($topics->currentPage()-1)*$topics->perPage() + $idx + 1 }}</td>
                        <td style="padding:10px 12px;">{{ $topic->name }}</td>
                        <td style="padding:10px 12px;">{{ $topic->slug }}</td>
                        <td style="padding:10px 12px;">
                            <div style="display:flex;gap:12px;">
                                <a href="{{ route('admin.document-topics.edit', ['document_topic' => $topic->id]) }}" style="color:#1f2d3d;font-weight:600;">Sửa</a>
                                <form method="post" action="{{ route('admin.document-topics.destroy', ['document_topic' => $topic->id]) }}" onsubmit="return confirm('Bạn có muốn xóa chủ đề này?');">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" style="background:none;border:none;color:#d92a1c;font-weight:600;cursor:pointer;padding:0;">Xóa</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="padding:14px 12px;text-align:center;color:#6b7280;">Không có chủ đề nào.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top:14px;">
            {{ $topics->links() }}
        </div>
    </div>
@endsection
