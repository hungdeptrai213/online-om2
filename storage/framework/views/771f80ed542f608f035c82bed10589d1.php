<?php $__env->startSection('content'); ?>
    

    
    <!-- AutoBG -->

    <div class="container width-60 mt-6">
        <div class="row justify-content-center">
            <h1 class="text-center fw-max-bold text-black fs-custom mon-alt fst-italic position-relative custom-bg w-75">
                <a class="px-0 text-black">Cập nhật lịch khai giảng</a>
            </h1>
    
            <p class="mt-3 text-sm-start text-md-center text-black fs-3 fw-bold ">Khi thông tin càng rõ ràng, mọi quyết định bạn đưa ra càng
                Nguồn cảm hứng đến từ những câu chuyện. Đó là những gì Organic Marketing vẫn đang và sẽ tiếp tục chia sẻ nhiều hơn nữa.
            </p>
    
        </div>
    </div>
     
    <div class="container mt-6">
        <?php if($schedules->isEmpty()): ?>
            <div class="row">
                <div class="col-12">
                    <div class="rounded-5 p-5 shadow-sm custom-bg-3 text-center">
                        <p class="fs-3 fw-bold mb-2">Hiện đang chưa có lịch học mới.</p>
                        <p class="fs-5 text-muted mb-0">Bạn vui lòng quay lại sau hoặc liên hệ admin để được cập nhật.</p>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="row">
                <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-6 mb-4">
                        <div class="rounded-5 p-4 shadow-sm custom-bg-3">
                            <div class="row">
                                <div class="col-5 pe-4">
                                    <img src="<?php echo e($schedule->cover_url ? asset($schedule->cover_url) : asset('/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg')); ?>" alt="Ảnh lịch học"
                                         class="w-100 rounded-5 shadow-sm">
                                </div>
                                <div class="col-7 d-flex flex-column">
                                    <p class="fs-1 mb-1"><?php echo e($schedule->title); ?></p>
                                    <table class="table table-borderless mt-3 fst-italic fs-4">
                                        <tbody>
                                            <tr>
                                                <th class="fw-normal">Lịch học:</th>
                                                <td><?php echo e($schedule->schedule ?? 'Đang cập nhật'); ?></td>
                                            </tr>
                                            <tr>
                                                <th class="fw-normal">Khai giảng:</th>
                                                <td><?php echo e(optional($schedule->start_date)->format('d/m/Y') ?? '—'); ?></td>
                                            </tr>
                                            <tr>
                                                <th class="fw-normal">Thời lượng:</th>
                                                <td><?php echo e($schedule->sessions); ?> buổi</td>
                                            </tr>
                                            <tr>
                                                <th class="fw-normal">Hình thức học:</th>
                                                <td><?php echo e($schedule->format ?? 'Chưa xác định'); ?></td>
                                            </tr>
                                            <tr>
                                                <th class="fw-normal">Chi phí:</th>
                                                <td><?php echo e(number_format($schedule->cost ?? 0, 0, ',', '.')); ?> đ</td>
                                            </tr>
                                            <tr>
                                                <th class="fw-normal">Tác giả:</th>
                                                <td><?php echo e($schedule->author ?? '—'); ?></td>
                                            </tr>
                                            <tr>
                                                <th class="fw-normal">Người chia sẻ:</th>
                                                <td><?php echo e($schedule->shared_by ?? '—'); ?></td>
                                            </tr>
                                            <tr>
                                                <th class="fw-normal">Tình trạng:</th>
                                                <td><?php echo e($schedule->status ?? 'Đang lên kế hoạch'); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="mt-auto">
                                        <a class="btn btn-primary me-2 p-lg-2 px-lg-3 fs-4 rounded-4 fw-bold" href="#" role="button">Tư vấn học</a>
                                        <a class="btn btn-primary p-lg-2 px-lg-3 fs-4 rounded-4 fw-bold" href="#" role="button">Tư vấn CRM</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>

    

<?php $__env->stopSection(); ?>




<?php echo $__env->make('student.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\online-om\resources\views/student/schedule.blade.php ENDPATH**/ ?>