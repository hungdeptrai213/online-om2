<?php $__env->startSection('title', 'Lịch học'); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h2 class="fs-4 fw-bold mb-0">Quản lý lịch học</h2>
            <p class="text-muted mb-0">Danh sách các buổi học sắp khai giảng</p>
        </div>
        <a class="btn btn-dark" href="<?php echo e(route('admin.schedules.create')); ?>">
            <i class="fa-solid fa-plus"></i> Thêm lịch học
        </a>
    </div>

    <?php if(session('status')): ?>
        <div class="alert alert-success">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    <div class="page-card">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                <tr>
                    <th>Tiêu đề</th>
                    <th>Khai giảng</th>
                    <th>Buổi</th>
                    <th>Chi phí</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($schedule->title); ?></td>
                        <td><?php echo e($schedule->start_date?->format('d/m/Y') ?? '—'); ?></td>
                        <td><?php echo e($schedule->sessions); ?> buổi</td>
                        <td><?php echo e(number_format($schedule->cost, 0, ',', '.')); ?> VNĐ</td>
                        <td><?php echo e($schedule->status ?? '—'); ?></td>
                        <td>
                            <a class="btn btn-sm btn-outline-primary me-2" href="<?php echo e(route('admin.schedules.edit', $schedule)); ?>">
                                Chỉnh sửa
                            </a>
                            <form class="d-inline" method="POST" action="<?php echo e(route('admin.schedules.destroy', $schedule)); ?>" onsubmit="return confirm('Xác nhận xoá?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-muted text-center">Chưa có lịch học nào được tạo.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="mt-3 d-flex justify-content-end">
            <?php echo e($schedules->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\online-om\resources\views/admin/schedules/index.blade.php ENDPATH**/ ?>