<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="/om-front/css/custom-option.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-6">
    <h2 class="fw-bold mb-4">Khóa học của tôi</h2>
    <?php if($courses->isEmpty()): ?>
        <p class="fs-4 text-muted">Bạn chưa có khóa học nào. Hãy đăng ký ngay!</p>
    <?php else: ?>
        <div class="row g-3 row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $thumb = $course->thumbnail;
                    $thumbUrl = $thumb && \Illuminate\Support\Str::startsWith($thumb, ['http://', 'https://'])
                        ? $thumb
                        : ($thumb ? asset($thumb) : '/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg');
                    $price = $course->sale_price ?? $course->price ?? 0;
                    $displayPrice = $price > 0 ? number_format($price, 0, ',', '.') . ' VNĐ' : 'Miễn phí';
                    $categoryNames = optional($course->categories)->pluck('name')->filter()->implode(', ');
                ?>
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 rounded-4">
                        <img src="<?php echo e($thumbUrl); ?>" class="card-img-top rounded-top-4" alt="<?php echo e($course->title); ?>">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold"><?php echo e($course->title); ?></h5>
                            <?php if($categoryNames): ?>
                                <p class="card-text text-muted mb-1"><?php echo e($categoryNames); ?></p>
                            <?php endif; ?>
                            <p class="card-text text-muted mb-3"><?php echo e($displayPrice); ?></p>
                            <a href="<?php echo e(route('student.course.learn', ['course' => $course->id])); ?>" class="btn btn-primary mt-auto rounded-4">Vào học</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('student.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\online-om\resources\views/student/my-courses.blade.php ENDPATH**/ ?>