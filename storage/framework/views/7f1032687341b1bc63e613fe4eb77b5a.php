<?php $__env->startSection('title', 'Theo dõi đăng ký'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-card">
        <div style="display:flex;justify-content:space-between;gap:12px;align-items:center;margin-bottom:14px;">
            <div>
                <h2 style="margin:0;">Theo dõi đăng ký</h2>
                <div class="muted">Bảng tổng hợp học viên mới đăng ký khóa học, theo dõi trạng thái thanh toán và số tiền.</div>
            </div>
            <form method="get" style="display:flex;flex-wrap:wrap;gap:10px;justify-content:flex-end;align-items:center;">
                <input type="text" name="q" value="<?php echo e($search ?? ''); ?>" placeholder="Tìm theo tên, email hoặc ghi chú"
                       style="padding:10px 12px;border:1px solid #e3e8f1;border-radius:6px;min-width:240px;">
                <select name="payment_status" style="padding:10px 12px;border:1px solid #e3e8f1;border-radius:6px;min-width:180px;">
                    <option value="">Tất cả trạng thái</option>
                    <option value="paid" <?php if(($paymentStatus ?? '') === 'paid'): echo 'selected'; endif; ?>>Đã thanh toán</option>
                    <option value="unpaid" <?php if(($paymentStatus ?? '') === 'unpaid'): echo 'selected'; endif; ?>>Chưa thanh toán</option>
                    <option value="processing" <?php if(($paymentStatus ?? '') === 'processing'): echo 'selected'; endif; ?>>Đang xử lý</option>
                    <option value="failed" <?php if(($paymentStatus ?? '') === 'failed'): echo 'selected'; endif; ?>>Thanh toán thất bại</option>
                    <option value="refunded" <?php if(($paymentStatus ?? '') === 'refunded'): echo 'selected'; endif; ?>>Hoàn tiền</option>
                </select>
                <button type="submit" class="btn-dark" style="padding:9px 14px;border-radius:6px;">Lọc</button>
                <a href="<?php echo e(route('admin.registrations.index')); ?>" style="color:#1f2d3d;text-decoration:none;">Xóa lọc</a>
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
                <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr style="border-bottom:1px solid #eef1f7;">
                        <td style="padding:10px 12px;color:#6b7280;"><?php echo e(($orders->currentPage()-1)*$orders->perPage() + $idx + 1); ?></td>
                        <td style="padding:10px 12px;">
                            <div><strong><?php echo e($order->student->name ?? 'Khách lẻ'); ?></strong></div>
                            <div class="muted" style="font-size:13px;">
                                <strong>Email:</strong> <?php echo e($order->student->email ?? '—'); ?>

                                <br>
                                <strong>Điện thoại:</strong> <?php echo e($order->student->phone ?? '—'); ?>

                            </div>
                        </td>
                        <td style="padding:10px 12px;">
                            <?php if($order->items->isEmpty()): ?>
                                <span class="muted">Không có sản phẩm</span>
                            <?php else: ?>
                                <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div><?php echo e($item->course?->title ?? 'Khóa học đã xóa'); ?></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </td>
                        <td style="padding:10px 12px;">
                            <div><?php echo e($order->created_at->format('d/m/Y H:i')); ?></div>
                            <div class="muted" style="font-size:13px;"><?php echo e($order->created_at->diffForHumans()); ?></div>
                        </td>
                        <td style="padding:10px 12px;">
                            <?php
                                $statusLabel = \Illuminate\Support\Str::headline($order->payment_status ?? '');
                                $statusStyle = match ($order->payment_status) {
                                    'paid' => 'background:#0c6b3d;color:#fff;',
                                    'processing' => 'background:#0f766e;color:#fff;',
                                    'failed' => 'background:#b91c1c;color:#fff;',
                                    'refunded' => 'background:#1e3a8a;color:#fff;',
                                    'unpaid' => 'background:#6b7280;color:#fff;',
                                    default => 'background:#94a3b8;color:#0f172a;',
                                };
                            ?>
                            <span style="display:inline-flex;align-items:center;gap:6px;padding:4px 10px;border-radius:999px;font-size:13px;font-weight:600;<?php echo e($statusStyle); ?>">
                                <?php echo e($statusLabel ?: 'Chưa có'); ?>

                            </span>
                        </td>
                        <td style="padding:10px 12px;">
                            <?php echo e(number_format($order->total, 0, ',', '.')); ?> ₫
                        </td>
                        <td style="padding:10px 12px;">
                            <button type="button"
                                    class="btn btn-outline-secondary btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#studentInfoModal"
                                    data-student-name="<?php echo e($order->student->name ?? 'Khách lẻ'); ?>"
                                    data-student-email="<?php echo e($order->student->email ?? '—'); ?>"
                                    data-student-phone="<?php echo e($order->student->phone ?? '—'); ?>"
                                    data-order-notes="<?php echo e($order->notes ?? '—'); ?>"
                                    data-order-created="<?php echo e($order->created_at->format('d/m/Y H:i')); ?>"
                                    data-order-payment-status="<?php echo e($statusLabel); ?>"
                                    data-order-total="<?php echo e(number_format($order->total, 0, ',', '.')); ?> ₫"
                            >
                                Thông tin
                            </button>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" style="padding:14px 12px;text-align:center;color:#6b7280;">Hiện chưa có đơn đăng ký.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div style="margin-top:14px;">
            <?php echo e($orders->links()); ?>

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

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\online-om\resources\views/admin/registrations/index.blade.php ENDPATH**/ ?>