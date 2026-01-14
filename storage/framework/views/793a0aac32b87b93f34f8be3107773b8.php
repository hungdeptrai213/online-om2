<?php $__env->startSection('title', 'Thêm tài khoản Admin'); ?>

<?php $__env->startSection('content'); ?>
    <div style="display:flex;justify-content:center;">
        <div class="page-card" style="max-width:540px;width:100%;">
            <h2 style="margin:0 0 16px;">Thêm tài khoản Admin</h2>
            <form action="<?php echo e(route('admin.users.store')); ?>" method="post">
                <?php echo $__env->make('admin.users.form', ['buttonText' => 'Tạo mới'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\online-om\resources\views\admin\users\create.blade.php ENDPATH**/ ?>