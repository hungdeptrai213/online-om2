<?php echo csrf_field(); ?>
<div style="display:grid;gap:14px;">
    <div>
        <label for="name" style="font-weight:600;">Tên</label>
        <input id="name" type="text" name="name" value="<?php echo e(old('name', $student->name ?? '')); ?>" required
               style="width:100%;padding:12px 14px;border:1px solid #e3e8f1;border-radius:8px;margin-top:6px;">
        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger" style="color:#d14343;margin-top:6px;"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div>
        <label for="email" style="font-weight:600;">Email</label>
        <input id="email" type="email" name="email" value="<?php echo e(old('email', $student->email ?? '')); ?>" required
               style="width:100%;padding:12px 14px;border:1px solid #e3e8f1;border-radius:8px;margin-top:6px;">
        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger" style="color:#d14343;margin-top:6px;"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div>
        <label for="phone" style="font-weight:600;">Số điện thoại</label>
        <input id="phone" type="text" name="phone" value="<?php echo e(old('phone', $student->phone ?? '')); ?>"
               style="width:100%;padding:12px 14px;border:1px solid #e3e8f1;border-radius:8px;margin-top:6px;">
        <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger" style="color:#d14343;margin-top:6px;"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div>
        <label for="password" style="font-weight:600;">Mật khẩu</label>
        <input id="password" type="password" name="password"
               <?php if(!isset($student)): ?> required <?php endif; ?>
               style="width:100%;padding:12px 14px;border:1px solid #e3e8f1;border-radius:8px;margin-top:6px;"
               placeholder="<?php echo e(isset($student) ? 'Để trống nếu không đổi' : ''); ?>">
        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger" style="color:#d14343;margin-top:6px;"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
</div>
<div style="margin-top:18px;display:flex;gap:10px;">
    <button type="submit" class="btn-dark"><?php echo e($buttonText); ?></button>
    <a href="<?php echo e(route('admin.students.index')); ?>" style="padding:10px 16px;border-radius:8px;border:1px solid #e3e8f1;color:#1f2d3d;text-decoration:none;">Hủy</a>
</div>
<?php /**PATH C:\laragon\www\online-om\resources\views/admin/students/form.blade.php ENDPATH**/ ?>