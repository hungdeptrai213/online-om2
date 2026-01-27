<?php $__env->startSection('title', 'Tài liệu'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-card">
        <div style="display:flex;justify-content:space-between;gap:12px;align-items:center;margin-bottom:14px;">
            <div>
                <h2 style="margin:0;">Danh sách tài liệu</h2>
                <div class="muted">Quản lý tài liệu và chủ đề</div>
            </div>
            <a class="btn-dark" href="<?php echo e(route('admin.documents.create')); ?>">Thêm tài liệu</a>
        </div>

        <?php if(session('status')): ?>
            <div style="margin-bottom:12px;padding:10px 14px;border-radius:8px;background:#e6f3ff;color:#0f3d91;font-weight:600;"><?php echo e(session('status')); ?></div>
        <?php endif; ?>

        <form method="get" style="display:flex;flex-wrap:wrap;gap:10px;justify-content:flex-end;margin-bottom:14px;">
            <input type="text" name="q" value="<?php echo e($search ?? ''); ?>" placeholder="Tìm theo tiêu đề"
                   style="padding:10px 12px;border:1px solid #e3e8f1;border-radius:6px;min-width:220px;">
            <select name="topic"
                    style="padding:10px 12px;border:1px solid #e3e8f1;border-radius:6px;min-width:200px;">
                <option value="">Chủ đề</option>
                <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($topic->id); ?>" <?php if($topicId == $topic->id): echo 'selected'; endif; ?>><?php echo e($topic->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <button type="submit" class="btn-dark" style="padding:9px 14px;border-radius:6px;">Lọc</button>
            <a href="<?php echo e(route('admin.documents.index')); ?>" style="color:#1f2d3d;text-decoration:none;">Xóa lọc</a>
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
                <?php $__empty_1 = true; $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr style="border-bottom:1px solid #eef1f7;">
                        <td style="padding:10px 12px;color:#6b7280;"><?php echo e(($documents->currentPage()-1)*$documents->perPage() + $idx + 1); ?></td>
                        <td style="padding:10px 12px;">
                            <div style="font-weight:600;"><?php echo e($document->title); ?></div>
                            <div class="muted" style="font-size:13px;"><?php echo e($document->link); ?></div>
                        </td>
                        <td style="padding:10px 12px;"><?php echo e($document->price > 0 ? number_format($document->price, 0, ',', '.') . ' VNĐ' : 'Miễn phí'); ?></td>
                        <td style="padding:10px 12px;">
                            <?php echo e($document->published_at ? $document->published_at->format('d/m/Y') : '—'); ?>

                        </td>
                        <td style="padding:10px 12px;">
                            <div style="display:flex;flex-wrap:wrap;gap:6px;">
                                <?php $__currentLoopData = $document->topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span style="font-size:12px;padding:4px 8px;background:#eef1f7;border-radius:6px;"><?php echo e($topic->name); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </td>
                        <td style="padding:10px 12px;">
                            <div style="display:flex;gap:8px;">
                                <a href="<?php echo e(route('admin.documents.edit', ['document' => $document->id])); ?>"
                                   style="color:#1f2d3d;font-weight:600;">Sửa</a>
                                <form method="post"
                                      action="<?php echo e(route('admin.documents.destroy', ['document' => $document->id])); ?>"
                                      onsubmit="return confirm('Bạn có chắc muốn xóa tài liệu này?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('delete'); ?>
                                    <button type="submit"
                                            style="background:none;border:none;color:#d92a1c;font-weight:600;cursor:pointer;padding:0;">Xóa</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" style="padding:14px 12px;text-align:center;color:#6b7280;">Chưa có tài liệu.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div style="margin-top:14px;">
            <?php echo e($documents->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\online-om\resources\views/admin/documents/index.blade.php ENDPATH**/ ?>