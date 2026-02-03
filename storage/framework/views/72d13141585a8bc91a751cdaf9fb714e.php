<?php $__env->startSection('title', 'Đăng nhập Admin'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .admin-login-card {
        max-width: 500px;
        margin: 40px auto;
        padding: 32px;
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.08);
    }
    .admin-login-card h2 {
        font-size: 26px;
        margin-bottom: 18px;
        text-align: center;
    }
</style>

<div class="container">
    <div class="admin-login-card">
        <div style="text-align:center; margin-bottom:18px;">
            <a href="<?php echo e(route('student.home')); ?>">
                <img src="<?php echo e(asset('om-front/img/Logo Organic Marketing (3).png')); ?>" alt="Logo" style="height:64px;">
            </a>
        </div>
        <h2>Đăng nhập Admin</h2>

        <?php if(session('msg')): ?>
            <div class="alert alert-success"><?php echo e(session('msg')); ?></div>
        <?php endif; ?>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div><?php echo e($error); ?></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('admin.login.submit')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="form-group" style="margin-bottom:12px;">
                <input type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="Email admin" style="width:100%; padding:12px 14px; border-radius:8px; border:1px solid #e3e3e3;">
            </div>
            <div class="form-group" style="margin-bottom:12px;">
                <input type="password" name="password" placeholder="Mật khẩu" style="width:100%; padding:12px 14px; border-radius:8px; border:1px solid #e3e3e3;">
            </div>
            <div class="form-group" style="display:flex; align-items:center; gap:8px; margin-bottom:16px;">
                <input type="checkbox" name="remember" value="1" id="admin-remember">
                <label for="admin-remember" style="margin:0;">Ghi nhớ đăng nhập</label>
            </div>
            <button type="submit" style="width:100%; padding:12px; border-radius:8px; background:#000; color:#fff; border:none;">Đăng nhập</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth_clients', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\online-om\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>