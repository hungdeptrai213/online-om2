@extends('layouts.admin')

@section('title', 'Form đăng ký')

@section('content')
    <div class="page-card">
        <div style="display:flex;justify-content:space-between;gap:12px;align-items:center;margin-bottom:14px;">
            <div>
                <h2 style="margin:0;">Form đăng ký</h2>
                <div class="muted">Dữ liệu coaching & doanh nghiệp</div>
            </div>
        </div>

        <form method="get" style="display:flex;flex-wrap:wrap;gap:10px;justify-content:flex-end;margin-bottom:14px;">
            <input type="text" name="q" value="{{ $search ?? '' }}" placeholder="Tìm theo tên, email, công ty"
                   style="padding:10px 12px;border:1px solid #e3e8f1;border-radius:6px;min-width:240px;">
            <select name="form_type" style="padding:10px 12px;border:1px solid #e3e8f1;border-radius:6px;min-width:180px;">
                <option value="">Loại form</option>
                <option value="coaching" @selected(($formType ?? '') === 'coaching')>Coaching 1:1</option>
                <option value="enterprise" @selected(($formType ?? '') === 'enterprise')>Doanh nghiệp</option>
                <option value="teach" @selected(($formType ?? '') === 'teach')>Dạy trên OM Edu</option>
            </select>
            <button type="submit" class="btn-dark" style="padding:9px 14px;border-radius:6px;">Lọc</button>
            <a href="{{ route('admin.forms.index') }}" style="color:#1f2d3d;text-decoration:none;">Xóa lọc</a>
        </form>

        <div style="overflow:auto;">
            <table style="width:100%;border-collapse:collapse;min-width:920px;">
                <thead>
                <tr style="text-align:left;background:#f7f9fc;">
                    <th style="padding:10px 12px;border-bottom:1px solid #e6ecf5;width:50px;">#</th>
                    <th style="padding:10px 12px;border-bottom:1px solid #e6ecf5;">Loại form</th>
                    <th style="padding:10px 12px;border-bottom:1px solid #e6ecf5;">Thông tin liên hệ</th>
                    <th style="padding:10px 12px;border-bottom:1px solid #e6ecf5;">Doanh nghiệp / Gói</th>
                    <th style="padding:10px 12px;border-bottom:1px solid #e6ecf5;">Nội dung</th>
                    <th style="padding:10px 12px;border-bottom:1px solid #e6ecf5;">Thời gian</th>
                </tr>
                </thead>
                <tbody>
                @forelse($submissions as $idx => $submission)
                    <tr style="border-bottom:1px solid #eef1f7;">
                        <td style="padding:10px 12px;color:#6b7280;">{{ ($submissions->currentPage()-1)*$submissions->perPage() + $idx + 1 }}</td>
                        <td style="padding:10px 12px;">
                            <div style="font-weight:600;">
                                @switch($submission->form_type)
                                    @case('coaching')
                                        Coaching 1:1
                                        @break
                                    @case('enterprise')
                                        Doanh nghiệp
                                        @break
                                    @default
                                        Dạy trên OM Edu
                                @endswitch
                            </div>
                            @if($submission->form_type === 'coaching' && $submission->plan_type)
                                <div class="muted" style="font-size:13px;">Gói: {{ $submission->plan_type === 'buoi_le' ? 'Buổi lẻ' : 'Lộ trình' }}</div>
                            @endif
                        </td>
                        <td style="padding:10px 12px;">
                            <div><strong>Họ tên:</strong> {{ $submission->name ?? $submission->contact_name ?? '—' }}</div>
                            <div class="muted" style="font-size:13px;">
                                <strong>Điện thoại:</strong> {{ $submission->phone ?? $submission->contact_phone ?? '—' }}
                                <br>
                                <strong>Email:</strong> {{ $submission->email ?? '—' }}
                            </div>
                        </td>
                        <td style="padding:10px 12px;">
                            @if($submission->form_type === 'enterprise')
                                <div><strong>Công ty:</strong> {{ $submission->company ?? '—' }}</div>
                                <div class="muted" style="font-size:13px;">{{ $submission->employee_count ? 'Nhân sự: ' . $submission->employee_count : '' }}</div>
                            @elseif($submission->form_type === 'teach')
                                <div><strong>Lĩnh vực:</strong> {{ $submission->field ?? '—' }}</div>
                            @else
                                <span class="muted">—</span>
                            @endif
                        </td>
                        <td style="padding:10px 12px;max-width:360px;">
                            <div style="white-space:pre-line;">{{ $submission->message ?? $submission->field }}</div>
                        </td>
                        <td style="padding:10px 12px;">
                            <div>{{ $submission->created_at->format('d/m/Y H:i') }}</div>
                            <div class="muted" style="font-size:13px;">{{ $submission->created_at->diffForHumans() }}</div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="padding:14px 12px;text-align:center;color:#6b7280;">Chưa có form đăng ký nào.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top:14px;">
            {{ $submissions->links() }}
        </div>
    </div>
@endsection
