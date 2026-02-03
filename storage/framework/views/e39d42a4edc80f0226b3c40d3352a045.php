<?php $__env->startSection('title', 'Form đăng ký'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-card">
        <div style="display:flex;justify-content:space-between;gap:12px;align-items:center;margin-bottom:14px;">
            <div>
                <h2 style="margin:0;">Form đăng ký</h2>
                <div class="muted">Dữ liệu coaching, doanh nghiệp & mua tài liệu</div>
            </div>
        </div>

        <form method="get" style="display:flex;flex-wrap:wrap;gap:10px;justify-content:flex-end;margin-bottom:14px;">
            <input type="text" name="q" value="<?php echo e($search ?? ''); ?>" placeholder="Tìm theo tên, email, công ty"
                   style="padding:10px 12px;border:1px solid #e3e8f1;border-radius:6px;min-width:240px;">
            <select name="form_type" style="padding:10px 12px;border:1px solid #e3e8f1;border-radius:6px;min-width:180px;">
                <option value="">Loại form</option>
                <option value="coaching" <?php if(($formType ?? '') === 'coaching'): echo 'selected'; endif; ?>>Coaching 1:1</option>
                <option value="enterprise" <?php if(($formType ?? '') === 'enterprise'): echo 'selected'; endif; ?>>Doanh nghiệp</option>
                <option value="teach" <?php if(($formType ?? '') === 'teach'): echo 'selected'; endif; ?>>Dạy trên OM Edu</option>
                <option value="document_purchase" <?php if(($formType ?? '') === 'document_purchase'): echo 'selected'; endif; ?>>Mua tài liệu</option>
            </select>
            <button type="submit" class="btn-dark" style="padding:9px 14px;border-radius:6px;">Lọc</button>
            <a href="<?php echo e(route('admin.forms.index')); ?>" style="color:#1f2d3d;text-decoration:none;">Xóa lọc</a>
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
                <?php $__empty_1 = true; $__currentLoopData = $submissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $submission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr style="border-bottom:1px solid #eef1f7;">
                        <td style="padding:10px 12px;color:#6b7280;"><?php echo e(($submissions->currentPage()-1)*$submissions->perPage() + $idx + 1); ?></td>
                        <td style="padding:10px 12px;">
                            <div style="font-weight:600;">
                                <?php switch($submission->form_type):
                                    case ('coaching'): ?>
                                        Coaching 1:1
                                        <?php break; ?>
                                    <?php case ('enterprise'): ?>
                                        Doanh nghiệp
                                        <?php break; ?>
                                    <?php case ('teach'): ?>
                                        Dạy trên OM Edu
                                        <?php break; ?>
                                    <?php case ('document_purchase'): ?>
                                        Mua tài liệu
                                        <?php break; ?>
                                    <?php default: ?>
                                        Dạy trên OM Edu
                                <?php endswitch; ?>
                            </div>
                            <?php if($submission->form_type === 'coaching' && $submission->plan_type): ?>
                                <div class="muted" style="font-size:13px;">Gói: <?php echo e($submission->plan_type === 'buoi_le' ? 'Buổi lẻ' : 'Lộ trình'); ?></div>
                            <?php endif; ?>
                        </td>
                        <td style="padding:10px 12px;">
                            <div><strong>Họ tên:</strong> <?php echo e($submission->name ?? $submission->contact_name ?? '—'); ?></div>
                            <div class="muted" style="font-size:13px;">
                                <strong>Điện thoại:</strong> <?php echo e($submission->phone ?? $submission->contact_phone ?? '—'); ?>

                                <br>
                                <strong>Email:</strong> <?php echo e($submission->email ?? '—'); ?>

                            </div>
                        </td>
                        <td style="padding:10px 12px;">
                        <?php if($submission->form_type === 'enterprise'): ?>
                            <div><strong>Công ty:</strong> <?php echo e($submission->company ?? '—'); ?></div>
                            <div class="muted" style="font-size:13px;"><?php echo e($submission->employee_count ? 'Nhân sự: ' . $submission->employee_count : ''); ?></div>
                        <?php elseif($submission->form_type === 'teach'): ?>
                            <div><strong>Lĩnh vực:</strong> <?php echo e($submission->field ?? '—'); ?></div>
                        <?php elseif($submission->form_type === 'document_purchase'): ?>
                            <div><strong>Tài liệu:</strong> <?php echo e($submission->document_title ?? '—'); ?></div>
                            <div class="muted" style="font-size:13px;">
                                <strong>Giá:</strong> <?php echo e($submission->document_price ? number_format($submission->document_price, 0, ',', '.') . ' VNĐ' : 'Miễn phí'); ?>

                            </div>
                            <div class="muted" style="font-size:13px;">
                                <strong>Địa chỉ nhận:</strong> <?php echo e($submission->address ?? '—'); ?>

                            </div>
                        <?php else: ?>
                            <span class="muted">—</span>
                        <?php endif; ?>
                        </td>
                        <td style="padding:10px 12px;max-width:360px;">
                            <div style="white-space:pre-line;"><?php echo e($submission->message ?? $submission->field); ?></div>
                        </td>
                        <td style="padding:10px 12px;">
                            <div><?php echo e($submission->created_at->format('d/m/Y H:i')); ?></div>
                            <div class="muted" style="font-size:13px;"><?php echo e($submission->created_at->diffForHumans()); ?></div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" style="padding:14px 12px;text-align:center;color:#6b7280;">Chưa có form đăng ký nào.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div style="margin-top:14px;">
            <?php echo e($submissions->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\online-om\resources\views/admin/forms/index.blade.php ENDPATH**/ ?>