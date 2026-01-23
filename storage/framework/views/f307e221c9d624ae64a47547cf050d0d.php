<?php $__env->startSection('title', 'Bình luận'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-card">
        <div style="display:flex;justify-content:space-between;gap:12px;align-items:center;margin-bottom:14px;">
            <div>
                <h2 style="margin:0;">Bình luận</h2>
                <div class="muted">Danh sách bình luận của học viên</div>
            </div>
        </div>

        <form method="get" style="display:flex;justify-content:flex-end;gap:10px;align-items:center;margin-bottom:14px;flex-wrap:wrap;">
            <input type="text" name="q" value="<?php echo e(request('q')); ?>" placeholder="Tìm theo nội dung, học viên, khóa học, bài học"
                   style="padding:10px 12px;border:1px solid #e3e8f1;border-radius:6px;min-width:280px;">
            <button type="submit" class="btn-dark" style="padding:9px 14px;border-radius:6px;">Lọc</button>
            <a href="<?php echo e(route('admin.comments.index')); ?>" style="color:#1f2d3d;text-decoration:none;">Xóa lọc</a>
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
                <?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr style="border-bottom:1px solid #eef1f7;">
                        <td style="padding:10px 12px;color:#6b7280;"><?php echo e(($comments->currentPage()-1)*$comments->perPage() + $idx + 1); ?></td>
                        <td style="padding:10px 12px;">
                            <div style="font-weight:600;"><?php echo e($comment->course->title ?? '—'); ?></div>
                            <?php if($comment->course): ?>
                                <div class="muted" style="font-size:13px;">ID: <?php echo e($comment->course->id); ?></div>
                            <?php endif; ?>
                        </td>
                        <td style="padding:10px 12px;">
                            <?php if($comment->lesson): ?>
                                <div style="font-weight:600;"><?php echo e($comment->lesson->title); ?></div>
                                <div class="muted" style="font-size:13px;">ID: <?php echo e($comment->lesson->id); ?></div>
                            <?php else: ?>
                                <span class="muted">Chưa gán bài</span>
                            <?php endif; ?>
                        </td>
                        <td style="padding:10px 12px;">
                            <div style="font-weight:600;"><?php echo e($comment->student->name ?? 'Ẩn danh'); ?></div>
                            <?php if(optional($comment->student)->email): ?>
                                <div class="muted" style="font-size:13px;"><?php echo e($comment->student->email); ?></div>
                            <?php endif; ?>
                        </td>
                        <td style="padding:10px 12px;max-width:380px;">
                            <div style="white-space:pre-line;"><?php echo e($comment->content); ?></div>
                        </td>
                        <td style="padding:10px 12px;">
                            <div><?php echo e($comment->created_at->format('d/m/Y H:i')); ?></div>
                            <div class="muted" style="font-size:13px;"><?php echo e($comment->created_at->diffForHumans()); ?></div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" style="padding:14px 12px;text-align:center;color:#6b7280;">Chưa có bình luận nào.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div style="margin-top:14px;">
            <?php echo e($comments->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\online-om\resources\views/admin/comments/index.blade.php ENDPATH**/ ?>