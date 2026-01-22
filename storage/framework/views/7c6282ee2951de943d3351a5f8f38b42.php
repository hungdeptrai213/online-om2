<?php $__env->startSection('title', 'Quên mật khẩu học viên'); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('student.auth.styles', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div class="login-wrapper">
    <div class="home-back">
        <a href="<?php echo e(route('student.home')); ?>">
            <span><i class="fa-solid fa-arrow-left"></i></span>
            Về trang chủ
        </a>
    </div>

    <div class="container contain-login">
        <div class="sign-in">
            <a href="<?php echo e(route('student.home')); ?>">
                <img src="<?php echo e(asset('om-front/img/Logo Organic Marketing (3).png')); ?>" alt="Organic Marketing" class="logo-login">
            </a>

            <h2 class="h2-login">Quên mật khẩu</h2>
            <p class="text-muted mb-3">Nhập email đã đăng ký, chúng tôi sẽ gửi liên kết đặt lại mật khẩu.</p>

            <?php if(session('status')): ?>
                <div class="alert alert-success"><?php echo e(session('status')); ?></div>
            <?php endif; ?>

            <?php if($errors->any()): ?>
                <div class="alert alert-danger text-start">
                    <ul class="mb-0 ps-3">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('student.password.email')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <input type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="Email" autocomplete="email" autofocus />
                <button type="submit">Gửi liên kết đặt lại</button>
            </form>

            <div class="login__footer">
                <a href="<?php echo e(route('student.login')); ?>" class="login__footer-register">Quay lại đăng nhập</a>
            </div>
        </div>
    </div>

    <footer class="light-footer">
        <p class="mb-0">Copyright © 2023 by Hienu.vn | Nền tảng học Marketing online hàng đầu</p>
    </footer>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth_clients', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\online-om\resources\views/student/forgot-password.blade.php ENDPATH**/ ?>