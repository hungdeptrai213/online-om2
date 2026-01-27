@extends('layouts.admin')

@section('title', 'Tài liệu')

@section('content')
    <div class="page-card">
        <div style="display:flex;justify-content:space-between;gap:12px;align-items:center;margin-bottom:14px;">
            <div>
                <h2 style="margin:0;">Danh sách tài liệu</h2>
                <div class="muted">Quản lý tài liệu và chủ đề</div>
            </div>
            <a class="btn-dark" href="{{ route('admin.documents.create') }}">Thêm tài liệu</a>
        </div>

        @if(session('status'))
            <div style="margin-bottom:12px;padding:10px 14px;border-radius:8px;background:#e6f3ff;color:#0f3d91;font-weight:600;">{{ session('status') }}</div>
        @endif

        <form method="get" style="display:flex;flex-wrap:wrap;gap:10px;justify-content:flex-end;margin-bottom:14px;">
            <input type="text" name="q" value="{{ $search ?? '' }}" placeholder="Tìm theo tiêu đề"
                   style="padding:10px 12px;border:1px solid #e3e8f1;border-radius:6px;min-width:220px;">
            <select name="topic"
                    style="padding:10px 12px;border:1px solid #e3e8f1;border-radius:6px;min-width:200px;">
                <option value="">Chủ đề</option>
                @foreach($topics as $topic)
                    <option value="{{ $topic->id }}" @selected($topicId == $topic->id)>{{ $topic->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn-dark" style="padding:9px 14px;border-radius:6px;">Lọc</button>
            <a href="{{ route('admin.documents.index') }}" style="color:#1f2d3d;text-decoration:none;">Xóa lọc</a>
        </form>

        <div style="overflow:auto;">
            <table style="width:100%;border-collapse:collapse;min-width:960px;">
                <thead>
                <tr style="text-align:left;background:#f7f9fc;">
                    <th style="padding:10px 12px;border-bottom:1px solid #e6ecf5;width:50px;">#</th>
                    <th style="padding:10px 12px;border-bottom:1px solid #e6ecf5;">Tiêu đề / Link</th>
                    <th style="padding:10px 12px;border-bottom:1px solid #e6ecf5;">Giá</th>
                    <th style="padding:10px 12px;border-bottom:1px solid #e6ecf5;">Ngày cập nhật</th>
                    <th style="padding:10px 12px;border-bottom:1px solid #e6ecf5;">Chủ đề</th>
                    <th style="padding:10px 12px;border-bottom:1px solid #e6ecf5;">Hành động</th>
                </tr>
                </thead>
                <tbody>
                @forelse($documents as $idx => $document)
                    <tr style="border-bottom:1px solid #eef1f7;">
                        <td style="padding:10px 12px;color:#6b7280;">{{ ($documents->currentPage()-1)*$documents->perPage() + $idx + 1 }}</td>
                        <td style="padding:10px 12px;">
                            <div style="font-weight:600;">{{ $document->title }}</div>
                            <div class="muted" style="font-size:13px;">{{ $document->link }}</div>
                        </td>
                        <td style="padding:10px 12px;">{{ $document->price > 0 ? number_format($document->price, 0, ',', '.') . ' VNĐ' : 'Miễn phí' }}</td>
                        <td style="padding:10px 12px;">
                            {{ $document->published_at ? $document->published_at->format('d/m/Y') : '—' }}
                        </td>
                        <td style="padding:10px 12px;">
                            <div style="display:flex;flex-wrap:wrap;gap:6px;">
                                @foreach($document->topics as $topic)
                                    <span style="font-size:12px;padding:4px 8px;background:#eef1f7;border-radius:6px;">{{ $topic->name }}</span>
                                @endforeach
                            </div>
                        </td>
                        <td style="padding:10px 12px;">
                            <div style="display:flex;gap:8px;">
                                <a href="{{ route('admin.documents.edit', ['document' => $document->id]) }}"
                                   style="color:#1f2d3d;font-weight:600;">Sửa</a>
                                <form method="post"
                                      action="{{ route('admin.documents.destroy', ['document' => $document->id]) }}"
                                      onsubmit="return confirm('Bạn có chắc muốn xóa tài liệu này?');">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                            style="background:none;border:none;color:#d92a1c;font-weight:600;cursor:pointer;padding:0;">Xóa</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="padding:14px 12px;text-align:center;color:#6b7280;">Chưa có tài liệu.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top:14px;">
            {{ $documents->links() }}
        </div>
    </div>
@endsection
