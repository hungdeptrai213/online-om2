<?php $__env->startSection('title', 'Thêm danh mục khóa học'); ?>

<?php $__env->startSection('content'); ?>
    <div style="display:flex;justify-content:center;">
        <div class="page-card" style="max-width:540px;width:100%;">
            <h2 style="margin:0 0 16px;">Thêm danh mục khóa học</h2>
            <form action="<?php echo e(route('admin.categories.store')); ?>" method="post">
                <?php echo $__env->make('admin.categories.form', ['buttonText' => 'Tạo mới'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\online-om\resources\views\admin\categories\create.blade.php ENDPATH**/ ?>