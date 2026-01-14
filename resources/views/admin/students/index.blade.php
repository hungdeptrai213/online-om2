@extends('layouts.admin')

@section('title', 'Tài khoản học viên')

@section('content')
    <div class="page-card">
        <div style="display:flex;justify-content:space-between;gap:12px;align-items:center;margin-bottom:14px;">
            <div>
                <h2 style="margin:0;">Tài khoản học viên</h2>
                <div class="muted">Danh sách tài khoản bảng students</div>
            </div>
            <a href="{{ route('admin.students.create') }}" class="btn-dark">+ Thêm mới</a>
        </div>

        @if (session('msg'))
            <div style="padding:10px 12px;border-radius:8px;background:#e6f7ee;color:#1b7f46;margin-bottom:12px;">
                {{ session('msg') }}
            </div>
        @endif

        <form method="get" style="display:flex;justify-content:flex-end;gap:10px;align-items:center;margin-bottom:14px;flex-wrap:wrap;">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Tìm theo tên, email hoặc số điện thoại"
                   style="padding:10px 12px;border:1px solid #e3e8f1;border-radius:8px;min-width:240px;">
            <select name="verified" style="padding:10px 12px;border:1px solid #e3e8f1;border-radius:8px;min-width:160px;">
                <option value="">Trạng thái email</option>
                <option value="1" @selected(request('verified')==='1')>Đã xác minh</option>
                <option value="0" @selected(request('verified')==='0')>Chưa xác minh</option>
            </select>
            <button type="submit" class="btn-dark" style="padding:9px 14px;border-radius:8px;">Lọc</button>
            <a href="{{ route('admin.students.index') }}" style="color:#1f2d3d;text-decoration:none;">Xóa lọc</a>
        </form>

        <div style="overflow:auto;">
            <table style="width:100%;border-collapse:collapse;">
                <thead>
                <tr style="background:#f7f8fb;text-align:left;">
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">#</th>
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">Tên</th>
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">Email</th>
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">SĐT</th>
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">Email verified</th>
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">Ngày tạo</th>
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">Hành động</th>
                </tr>
                </thead>
                <tbody>
                @forelse($students as $student)
                    <tr>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;">{{ $student->id }}</td>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;">{{ $student->name }}</td>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;">{{ $student->email }}</td>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;">{{ $student->phone ?? '—' }}</td>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;">
                            @if($student->email_verified_at)
                                <span style="background:#e6f7ee;color:#1b7f46;padding:4px 8px;border-radius:8px;font-size:12px;">Đã xác minh</span>
                            @else
                                <span style="background:#fff4e5;color:#a36100;padding:4px 8px;border-radius:8px;font-size:12px;">Chưa xác minh</span>
                            @endif
                        </td>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;">{{ $student->created_at?->format('d/m/Y') }}</td>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;display:flex;gap:8px;flex-wrap:wrap;">
                            <a href="{{ route('admin.students.edit', $student) }}" style="padding:8px 10px;border-radius:8px;border:1px solid #e6ecf5;text-decoration:none;">Sửa</a>
                            <form action="{{ route('admin.students.destroy', $student) }}" method="post" onsubmit="return confirm('Xóa tài khoản này?');">
                                @csrf
                                @method('delete')
                                <button type="submit" style="padding:8px 10px;border-radius:8px;border:1px solid #f1d0d0;background:#ffecec;color:#d14343;cursor:pointer;">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="padding:14px;text-align:center;color:#1f2d3d;">Không có tài khoản phù hợp.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top:12px;">
            {{ $students->links() }}
        </div>
    </div>
@endsection
