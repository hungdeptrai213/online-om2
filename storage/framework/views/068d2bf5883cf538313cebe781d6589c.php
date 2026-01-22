<?php $__env->startSection('title', 'Đăng nhập học viên'); ?>

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

            <?php if(session('msg')): ?>
                <div class="alert alert-success mb-2"><?php echo e(session('msg')); ?></div>
            <?php endif; ?>
            <?php if(session('status')): ?>
                <div class="alert alert-success mb-2"><?php echo e(session('status')); ?></div>
            <?php endif; ?>

            <h2 class="h2-login">Đăng nhập Hienu</h2>

            <div class="login__container-method">
                <a href="<?php echo e(url('/auth/google')); ?>" class="login__container-item">
                    <i class="fab fa-google login__container-icon-link"></i>
                    <span class="login__container-text">Đăng nhập với Google</span>
                </a>
                <a style="display:none;" href="<?php echo e(url('/auth/facebook')); ?>" class="login__container-item">
                    <i class="fab fa-facebook-square login__container-icon-link"></i>
                    <span class="login__container-text">Đăng nhập với Facebook</span>
                </a>
            </div>

            <div class="login__container-hoac"><span>HOẶC</span></div>

            <form action="<?php echo e(route('student.login.submit')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <input type="text" name="email" value="<?php echo e(old('email')); ?>" placeholder="Email/Username" autocomplete="username" autofocus />
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-start text-danger mb-3 d-block"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <input type="password" name="password" placeholder="Mật khẩu" autocomplete="current-password" />
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-start text-danger mb-3 d-block"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <p class="forgot-password">
                    <a href="<?php echo e(route('student.password.request')); ?>">Quên mật khẩu</a>
                </p>
                <div class="remember">
                    <input type="checkbox" name="remember" value="1" id="remember-student">
                    <label for="remember-student" style="margin:0;">Ghi nhớ đăng nhập</label>
                </div>
                <button type="submit">Đăng nhập</button>
            </form>

            <div class="login__footer">
                <span class="login__footer-span">Bạn chưa có tài khoản?</span>
                <a href="<?php echo e(route('student.register')); ?>" class="login__footer-register">Đăng ký ngay</a>
            </div>
        </div>
    </div>

    <footer class="light-footer">
        <p class="mb-0">Copyright © 2023 by Hienu.vn | Nền tảng học Marketing online hàng đầu</p>
    </footer>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.auth_clients', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\online-om\resources\views/student/login.blade.php ENDPATH**/ ?>