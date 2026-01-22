<?php $__env->startSection('style'); ?>
<style>
.profile-card input.form-control,
.profile-card input[type="file"] {
    background: #f8fafc;
    border: 1px solid #e5e7eb;
    height: 46px;
    border-radius: 8px;
}
.profile-card .form-text {
    color: #6b7280;
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-6">
    <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-8">
            <div class="p-4 p-md-5 bg-white rounded-4 shadow-sm profile-card" style="box-shadow: 0 18px 50px rgba(0,0,0,0.08);">
                <div class="d-flex align-items-center gap-3 mb-4">
                    
                        <?php ($avatarUrl = $student->avatar ? asset($student->avatar) : 'https://via.placeholder.com/150x150.png?text=Avatar'); ?>
                        
                    
                    <div>
                        <h2 class="fw-bold mb-1">Hồ sơ học viên</h2>
                        <p class="mb-0 text-muted small">Cập nhật thông tin và ảnh đại diện của bạn</p>
                    </div>
                </div>

                <?php if(session('status')): ?>
                    <div class="alert alert-success"><?php echo e(session('status')); ?></div>
                <?php endif; ?>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('student.profile.update')); ?>" enctype="multipart/form-data" class="ho-so d-flex flex-column gap-3">
                    <?php echo csrf_field(); ?>
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold">Họ tên</label>
                            <input type="text" name="name" value="<?php echo e(old('name', $student->name)); ?>" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" value="<?php echo e($student->email); ?>" class="form-control" disabled>
                            <div class="form-text">Email không thể thay đổi.</div>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Số điện thoại</label>
                            <input type="text" name="phone" value="<?php echo e(old('phone', $student->phone)); ?>" class="form-control" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Ảnh đại diện</label>
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle overflow-hidden border" style="width: 200px; height: 200px; border-radius:12px!important;">
                                    <img src="<?php echo e($avatarUrl); ?>" alt="Avatar" class="w-100 h-100 object-fit-cover">
                                </div>
                                <input type="file" name="avatar" class="form-control" accept="image/*">
                            </div>
                            <div class="form-text">Tải ảnh vuông, tối đa 2MB.</div>
                        </div>
                    </div>
                    <hr>
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold">Mật khẩu mới (nếu muốn đổi)</label>
                            <input type="password" name="password" class="form-control" placeholder="Để trống nếu không đổi">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Xác nhận mật khẩu mới</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Nhập lại mật khẩu mới">
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary rounded-4 px-4">Lưu thay đổi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('student.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\online-om\resources\views/student/profile.blade.php ENDPATH**/ ?>