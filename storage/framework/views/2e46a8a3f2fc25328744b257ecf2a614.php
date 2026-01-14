<?php $__env->startSection('title', 'Hồ sơ cá nhân'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-card" style="max-width: 720px; margin: 0 auto;">
        <h2 style="margin-top:0; margin-bottom:16px;">Hồ sơ cá nhân</h2>

        <?php if(session('status')): ?>
            <div style="padding:12px 14px; border:1px solid #d1e7dd; background:#f0f9f4; color:#0f5132; border-radius:8px; margin-bottom:14px;">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div style="padding:12px 14px; border:1px solid #f5c2c7; background:#fdf3f4; color:#842029; border-radius:8px; margin-bottom:14px;">
                <ul style="margin:0; padding-left:18px;">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('admin.profile.update')); ?>" style="display:grid; gap:14px;">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div>
                <label for="name" style="font-weight:600;">Tên</label>
                <input id="name" name="name" type="text" value="<?php echo e(old('name', $user->name)); ?>" required
                       style="width:100%; margin-top:6px; padding:10px 12px; border-radius:8px; border:1px solid #dce3ef; font-size:14px;">
            </div>

            <div>
                <label for="email" style="font-weight:600;">Email</label>
                <input id="email" name="email" type="email" value="<?php echo e(old('email', $user->email)); ?>" required
                       style="width:100%; margin-top:6px; padding:10px 12px; border-radius:8px; border:1px solid #dce3ef; font-size:14px;">
            </div>

            <div style="display:grid; gap:10px;">
                <div>
                    <label for="password" style="font-weight:600;">Mật khẩu mới (bỏ trống nếu không đổi)</label>
                    <input id="password" name="password" type="password"
                           style="width:100%; margin-top:6px; padding:10px 12px; border-radius:8px; border:1px solid #dce3ef; font-size:14px;">
                </div>
                <div>
                    <label for="password_confirmation" style="font-weight:600;">Nhập lại mật khẩu</label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                           style="width:100%; margin-top:6px; padding:10px 12px; border-radius:8px; border:1px solid #dce3ef; font-size:14px;">
                </div>
            </div>

            <div style="display:flex; gap:10px;">
                <button type="submit" style="background:#111827; color:#fff; border:0; padding:10px 16px; border-radius:8px; font-weight:700; cursor:pointer;">
                    Lưu thay đổi
                </button>
                <a href="<?php echo e(route('admin.dashboard')); ?>" style="padding:10px 16px; border-radius:8px; border:1px solid #dce3ef; text-decoration:none; color:#1f2d3d; background:#f7f9fc; font-weight:600;">
                    Hủy
                </a>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\online-om\resources\views\admin\profile.blade.php ENDPATH**/ ?>