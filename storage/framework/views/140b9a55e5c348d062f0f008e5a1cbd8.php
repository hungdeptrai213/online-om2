<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="comment-item" style="margin-left: <?php echo e($level * 16); ?>px;">
        <div class="d-flex justify-content-between align-items-center">
            <div class="fw-semibold small mb-1"><?php echo e($comment->student->name ?? 'Học viên'); ?></div>
            <small class="text-muted"><?php echo e($comment->created_at?->diffForHumans()); ?></small>
        </div>
        <div class="text-muted"><?php echo e($comment->content); ?></div>
        <button type="button" class="btn btn-link btn-sm p-0 mt-1 btn-reply" data-id="<?php echo e($comment->id); ?>">Trả lời</button>
        <?php if($comment->repliesRecursive?->count()): ?>
            <?php echo $__env->make('student.partials.comment-tree', ['comments' => $comment->repliesRecursive, 'level' => $level + 1], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endif; ?>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\laragon\www\online-om\resources\views/student/partials/comment-tree.blade.php ENDPATH**/ ?>