@extends('layouts.admin')

@section('title', 'Theo dõi đăng ký')

@section('content')
    <div class="page-card">
        <div style="display:flex;justify-content:space-between;gap:12px;align-items:center;margin-bottom:14px;">
            <div>
                <h2 style="margin:0;">Theo dõi đăng ký</h2>
                <div class="muted">Bảng tổng hợp học viên mới đăng ký khóa học, theo dõi trạng thái thanh toán và số tiền.</div>
            </div>
            <form method="get" style="display:flex;flex-wrap:wrap;gap:10px;justify-content:flex-end;align-items:center;">
                <input type="text" name="q" value="{{ $search ?? '' }}" placeholder="Tìm theo tên, email hoặc ghi chú"
                       style="padding:10px 12px;border:1px solid #e3e8f1;border-radius:6px;min-width:240px;">
                <select name="payment_status" style="padding:10px 12px;border:1px solid #e3e8f1;border-radius:6px;min-width:180px;">
                    <option value="">Tất cả trạng thái</option>
                    <option value="paid" @selected(($paymentStatus ?? '') === 'paid')>Đã thanh toán</option>
                    <option value="unpaid" @selected(($paymentStatus ?? '') === 'unpaid')>Chưa thanh toán</option>
                    <option value="processing" @selected(($paymentStatus ?? '') === 'processing')>Đang xử lý</option>
                    <option value="failed" @selected(($paymentStatus ?? '') === 'failed')>Thanh toán thất bại</option>
                    <option value="refunded" @selected(($paymentStatus ?? '') === 'refunded')>Hoàn tiền</option>
                </select>
                <button type="submit" class="btn-dark" style="padding:9px 14px;border-radius:6px;">Lọc</button>
                <a href="{{ route('admin.registrations.index') }}" style="color:#1f2d3d;text-decoration:none;">Xóa lọc</a>
            </form>
        </div>

        <div style="overflow:auto;">
            <table style="width:100%;border-collapse:collapse;min-width:960px;">
                <thead>
                <tr style="text-align:left;background:#f7f9fc;">
                    <th style="padding:10px 12px;border-bottom:1px solid #e6ecf5;width:50px;">#</th>
                    <th style="padding:10px 12px;border-bottom:1px solid #e6ecf5;">Học viên</th>
                    <th style="padding:10px 12px;border-bottom:1px solid #e6ecf5;">Khóa học</th>
                    <th style="padding:10px 12px;border-bottom:1px solid #e6ecf5;">Ngày đăng ký</th>
                    <th style="padding:10px 12px;border-bottom:1px solid #e6ecf5;">Thanh toán</th>
                    <th style="padding:10px 12px;border-bottom:1px solid #e6ecf5;">Tổng tiền</th>
                    <th style="padding:10px 12px;border-bottom:1px solid #e6ecf5;"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($orders as $idx => $order)
                    <tr style="border-bottom:1px solid #eef1f7;">
                        <td style="padding:10px 12px;color:#6b7280;">{{ ($orders->currentPage()-1)*$orders->perPage() + $idx + 1 }}</td>
                        <td style="padding:10px 12px;">
                            <div><strong>{{ $order->student->name ?? 'Khách lẻ' }}</strong></div>
                            <div class="muted" style="font-size:13px;">
                                <strong>Email:</strong> {{ $order->student->email ?? '—' }}
                                <br>
                                <strong>Điện thoại:</strong> {{ $order->student->phone ?? '—' }}
                            </div>
                        </td>
                        <td style="padding:10px 12px;">
                            @if($order->items->isEmpty())
                                <span class="muted">Không có sản phẩm</span>
                            @else
                                @foreach($order->items as $item)
                                    <div>{{ $item->course?->title ?? 'Khóa học đã xóa' }}</div>
                                @endforeach
                            @endif
                        </td>
                        <td style="padding:10px 12px;">
                            <div>{{ $order->created_at->format('d/m/Y H:i') }}</div>
                            <div class="muted" style="font-size:13px;">{{ $order->created_at->diffForHumans() }}</div>
                        </td>
                        <td style="padding:10px 12px;">
                            @php
                                $statusLabel = \Illuminate\Support\Str::headline($order->payment_status ?? '');
                                $statusStyle = match ($order->payment_status) {
                                    'paid' => 'background:#0c6b3d;color:#fff;',
                                    'processing' => 'background:#0f766e;color:#fff;',
                                    'failed' => 'background:#b91c1c;color:#fff;',
                                    'refunded' => 'background:#1e3a8a;color:#fff;',
                                    'unpaid' => 'background:#6b7280;color:#fff;',
                                    default => 'background:#94a3b8;color:#0f172a;',
                                };
                            @endphp
                            <span style="display:inline-flex;align-items:center;gap:6px;padding:4px 10px;border-radius:999px;font-size:13px;font-weight:600;{{ $statusStyle }}">
                                {{ $statusLabel ?: 'Chưa có' }}
                            </span>
                        </td>
                        <td style="padding:10px 12px;">
                            {{ number_format($order->total, 0, ',', '.') }} ₫
                        </td>
                        <td style="padding:10px 12px;">
                            <button type="button"
                                    class="btn btn-outline-secondary btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#studentInfoModal"
                                    data-student-name="{{ $order->student->name ?? 'Khách lẻ' }}"
                                    data-student-email="{{ $order->student->email ?? '—' }}"
                                    data-student-phone="{{ $order->student->phone ?? '—' }}"
                                    data-order-notes="{{ $order->notes ?? '—' }}"
                                    data-order-created="{{ $order->created_at->format('d/m/Y H:i') }}"
                                    data-order-payment-status="{{ $statusLabel }}"
                                    data-order-total="{{ number_format($order->total, 0, ',', '.') }} ₫"
                            >
                                Thông tin
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="padding:14px 12px;text-align:center;color:#6b7280;">Hiện chưa có đơn đăng ký.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top:14px;">
            {{ $orders->links() }}
        </div>
    </div>

    <div class="modal fade" id="studentInfoModal" tabindex="-1" aria-labelledby="studentInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="studentInfoModalLabel">Thông tin học viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-1"><strong>Họ tên:</strong> <span data-student-info="name">—</span></p>
                    <p class="mb-1"><strong>Email:</strong> <span data-student-info="email">—</span></p>
                    <p class="mb-1"><strong>Điện thoại:</strong> <span data-student-info="phone">—</span></p>
                    <p class="mb-1"><strong>Ngày đăng ký:</strong> <span data-student-info="created">—</span></p>
                    <p class="mb-1"><strong>Trạng thái thanh toán:</strong> <span data-student-info="paymentStatus">—</span></p>
                    <p class="mb-1"><strong>Tổng tiền:</strong> <span data-student-info="total">—</span></p>
                    <p class="mb-0"><strong>Ghi chú:</strong> <span data-student-info="notes">—</span></p>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        const studentInfoModal = document.getElementById('studentInfoModal');
        if (studentInfoModal) {
            studentInfoModal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget;
                if (!button) return;

                const fill = (key, value) => {
                    const target = studentInfoModal.querySelector(`[data-student-info="${key}"]`);
                    if (target) {
                        target.textContent = value || '—';
                    }
                };

                fill('name', button.getAttribute('data-student-name'));
                fill('email', button.getAttribute('data-student-email'));
                fill('phone', button.getAttribute('data-student-phone'));
                fill('created', button.getAttribute('data-order-created'));
                fill('paymentStatus', button.getAttribute('data-order-payment-status'));
                fill('total', button.getAttribute('data-order-total'));
                fill('notes', button.getAttribute('data-order-notes'));
            });
        }
    </script>
@endpush
