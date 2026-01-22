<?php $__env->startSection('title', 'Đăng ký học viên'); ?>

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

            <h2 class="h2-login">Đăng ký tài khoản</h2>

            <div class="login__container-hoac"><span>Điền thông tin</span></div>

            <?php if($errors->any()): ?>
                <div class="alert alert-danger text-start">
                    <ul class="mb-0 ps-3">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('student.register.submit')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <input type="text" name="name" value="<?php echo e(old('name')); ?>" placeholder="Họ và tên" autocomplete="name" autofocus />
                <input type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="Email" autocomplete="email" />
                <input type="text" name="phone" value="<?php echo e(old('phone')); ?>" placeholder="Số điện thoại (tuỳ chọn)" autocomplete="tel" />
                <input type="password" name="password" placeholder="Mật khẩu" autocomplete="new-password" />
                <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu" autocomplete="new-password" />

                <button type="submit">Tạo tài khoản</button>
            </form>

            <div class="login__footer">
                <span class="login__footer-span">Đã có tài khoản?</span>
                <a href="<?php echo e(route('student.login')); ?>" class="login__footer-register">Đăng nhập</a>
            </div>
        </div>
    </div>

    <footer class="light-footer">
        <p class="mb-0">Copyright © 2023 by Hienu.vn | Nền tảng học Marketing online hàng đầu</p>
    </footer>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth_clients', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\online-om\resources\views/student/register.blade.php ENDPATH**/ ?>