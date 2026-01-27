<?php $__env->startSection('title', $schedule->exists ? 'Chỉnh sửa lịch học' : 'Thêm lịch học'); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h2 class="fs-4 fw-bold mb-0"><?php echo e($schedule->exists ? 'Chỉnh sửa lịch học' : 'Thêm lịch học mới'); ?></h2>
            <p class="text-muted mb-0">Điền đầy đủ thông tin để học viên có thể đăng ký dễ dàng.</p>
        </div>
        <a class="btn btn-dark" href="<?php echo e(route('admin.schedules.index')); ?>">
            <i class="fa-solid fa-arrow-left"></i> Quay lại danh sách
        </a>
    </div>

    <div class="page-card">
        <form method="POST" action="<?php echo e($route); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php if($schedule->exists): ?>
                <?php echo method_field('PUT'); ?>
            <?php endif; ?>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Tiêu đề</label>
                    <input type="text" name="title" class="form-control" value="<?php echo e(old('title', $schedule->title)); ?>" required placeholder="Ví dụ: Digital Marketing | K24">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Lịch học</label>
                    <input type="text" name="schedule" class="form-control" value="<?php echo e(old('schedule', $schedule->schedule)); ?>" placeholder="Tối thứ 2 & tối thứ 4">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Khai giảng</label>
                    <input type="date" name="start_date" class="form-control" value="<?php echo e(old('start_date', optional($schedule->start_date)->format('Y-m-d'))); ?>" placeholder="">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Số buổi</label>
                    <input type="number" name="sessions" class="form-control" value="<?php echo e(old('sessions', $schedule->sessions)); ?>" min="0" placeholder="Số buổi">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Hình thức</label>
                    <input type="text" name="format" class="form-control" value="<?php echo e(old('format', $schedule->format)); ?>" placeholder="Online / Offline">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Chi phí (VNĐ)</label>
                    <input type="number" name="cost" class="form-control" value="<?php echo e(old('cost', $schedule->cost)); ?>" step="1000" min="0" placeholder="590000">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Tác giả</label>
                    <input type="text" name="author" class="form-control" value="<?php echo e(old('author', $schedule->author)); ?>" placeholder="Tên tác giả">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Người chia sẻ</label>
                    <input type="text" name="shared_by" class="form-control" value="<?php echo e(old('shared_by', $schedule->shared_by)); ?>" placeholder="Người chia sẻ">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Trạng thái</label>
                    <input type="text" name="status" class="form-control" value="<?php echo e(old('status', $schedule->status)); ?>" placeholder="Còn trống / Đã đầy">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Ảnh đại diện</label>
                    <input type="file" name="cover_image" class="form-control" accept="image/*">
                    <?php if($schedule->cover_url): ?>
                        <div class="mt-2">
                            <img src="<?php echo e($schedule->cover_url); ?>" alt="Ảnh hiện tại" class="img-fluid rounded" style="max-height:120px;">
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">Mô tả</label>
                    <textarea name="description" rows="4" class="form-control" placeholder="Mô tả ngắn gọn về chương trình"><?php echo e(old('description', $schedule->description)); ?></textarea>
                </div>
            </div>
            <div class="mt-4 d-flex gap-3">
                <button type="submit" class="btn btn-dark">
                    <i class="fa-solid fa-save"></i> <?php echo e($schedule->exists ? 'Cập nhật' : 'Lưu lại'); ?>

                </button>
                <a href="<?php echo e(route('admin.schedules.index')); ?>" class="btn btn-outline-secondary">Hủy</a>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\online-om\resources\views/admin/schedules/form.blade.php ENDPATH**/ ?>