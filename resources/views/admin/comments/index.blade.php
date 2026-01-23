@extends('layouts.admin')

@section('title', 'Bình luận')

@section('content')
    <div class="page-card">
        <div style="display:flex;justify-content:space-between;gap:12px;align-items:center;margin-bottom:14px;">
            <div>
                <h2 style="margin:0;">Bình luận</h2>
                <div class="muted">Danh sách bình luận của học viên</div>
            </div>
        </div>

        <form method="get" style="display:flex;justify-content:flex-end;gap:10px;align-items:center;margin-bottom:14px;flex-wrap:wrap;">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Tìm theo nội dung, học viên, khóa học, bài học"
                   style="padding:10px 12px;border:1px solid #e3e8f1;border-radius:6px;min-width:280px;">
            <button type="submit" class="btn-dark" style="padding:9px 14px;border-radius:6px;">Lọc</button>
            <a href="{{ route('admin.comments.index') }}" style="color:#1f2d3d;text-decoration:none;">Xóa lọc</a>
        </form>

        <div style="overflow:auto;">
            <table style="width:100%;border-collapse:collapse;min-width:920px;">
                <thead>
                <tr style="text-align:left;background:#f7f9fc;">
                    <th style="padding:10px 12px;border-bottom:1px solid #e6ecf5;width:50px;">#</th>
                    <th style="padding:10px 12px;border-bottom:1px solid #e6ecf5;">Khóa học</th>
                    <th style="padding:10px 12px;border-bottom:1px solid #e6ecf5;">Bài học</th>
                    <th style="padding:10px 12px;border-bottom:1px solid #e6ecf5;">Người bình luận</th>
                    <th style="padding:10px 12px;border-bottom:1px solid #e6ecf5;min-width:260px;">Nội dung</th>
                    <th style="padding:10px 12px;border-bottom:1px solid #e6ecf5;">Thời gian</th>
                </tr>
                </thead>
                <tbody>
                @forelse($comments as $idx => $comment)
                    <tr style="border-bottom:1px solid #eef1f7;">
                        <td style="padding:10px 12px;color:#6b7280;">{{ ($comments->currentPage()-1)*$comments->perPage() + $idx + 1 }}</td>
                        <td style="padding:10px 12px;">
                            <div style="font-weight:600;">{{ $comment->course->title ?? '—' }}</div>
                            @if($comment->course)
                                <div class="muted" style="font-size:13px;">ID: {{ $comment->course->id }}</div>
                            @endif
                        </td>
                        <td style="padding:10px 12px;">
                            @if($comment->lesson)
                                <div style="font-weight:600;">{{ $comment->lesson->title }}</div>
                                <div class="muted" style="font-size:13px;">ID: {{ $comment->lesson->id }}</div>
                            @else
                                <span class="muted">Chưa gán bài</span>
                            @endif
                        </td>
                        <td style="padding:10px 12px;">
                            <div style="font-weight:600;">{{ $comment->student->name ?? 'Ẩn danh' }}</div>
                            @if(optional($comment->student)->email)
                                <div class="muted" style="font-size:13px;">{{ $comment->student->email }}</div>
                            @endif
                        </td>
                        <td style="padding:10px 12px;max-width:380px;">
                            <div style="white-space:pre-line;">{{ $comment->content }}</div>
                        </td>
                        <td style="padding:10px 12px;">
                            <div>{{ $comment->created_at->format('d/m/Y H:i') }}</div>
                            <div class="muted" style="font-size:13px;">{{ $comment->created_at->diffForHumans() }}</div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="padding:14px 12px;text-align:center;color:#6b7280;">Chưa có bình luận nào.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top:14px;">
            {{ $comments->links() }}
        </div>
    </div>
@endsection
