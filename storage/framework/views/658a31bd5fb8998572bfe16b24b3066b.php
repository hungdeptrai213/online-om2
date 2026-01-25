

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="/om-front/css/custom-option.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Dang Ky -->
    <div class="container mt-6">
        <div class="row gx-5 justify-content-between">
            <!-- Left main video -->
            <div class="col-lg-6 pe-xl-5 mb-5">
                <div class="custom-bg-4 p-5 d-flex justify-content-center flex-column rounded-5 form-2-container shadow-sm">
                    <p class="text-center fs-1 fw-bold">Đăng ký đào tạo<br class="d-none d-md-block"> dành cho doanh nghiệp
                    </p>
                    <p class="text-center fs-2 fw-bolder">Thông tin của bạn</p>

                    <?php if(session('enterprise_success')): ?>
                        <div class="alert alert-success text-center" data-autohide="5000" role="alert">
                            <?php echo e(session('enterprise_success')); ?>

                        </div>
                    <?php elseif(session('enterprise_error')): ?>
                        <div class="alert alert-danger text-center" data-autohide="5000" role="alert">
                            <?php echo e(session('enterprise_error')); ?>

                        </div>
                    <?php endif; ?>

                    <form class="form-2 ms-auto me-auto" method="post" action="<?php echo e(route('student.enterprise.submit')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <input name="company" type="text" class="form-control p-2 shadow-sm rounded-4 fs-4 ps-3"
                                value="<?php echo e(old('company')); ?>" placeholder="Tên công ty" required>
                        </div>
                        <div class="mb-3">
                            <input name="contact_name" type="text" class="form-control p-2 shadow-sm rounded-4 fs-4 ps-3"
                                value="<?php echo e(old('contact_name')); ?>" placeholder="Người đại diện liên hệ" required>
                        </div>
                        <div class="mb-3">
                            <input name="contact_phone" type="text"
                                class="form-control p-2 shadow-sm rounded-4 fs-4 ps-3" value="<?php echo e(old('contact_phone')); ?>"
                                placeholder="Số điện thoại người đại diện" required>
                        </div>
                        <div class="mb-3">
                            <input name="email" type="email" class="form-control p-2 shadow-sm rounded-4 fs-4 ps-3"
                                value="<?php echo e(old('email')); ?>" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <input name="employee_count" type="text"
                                class="form-control p-2 shadow-sm rounded-4 fs-4 ps-3" value="<?php echo e(old('employee_count')); ?>"
                                placeholder="Số lượng nhân sự đào tạo" required>
                        </div>
                        <div class="mb-3">
                            <textarea name="message" placeholder="Nội dung bạn muốn đào tạo"
                                class="w-100 p-2 bg-transparent border-0 shadow-sm rounded-4 fs-4 ps-3 " required><?php echo e(old('message')); ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 fw-bold rounded-4 fs-4">Đăng ký tư vấn & báo giá
                            chi tiết</button>
                    </form>

                    <p class="text-center fs-5 mt-4 fst-italic">SDT | Zalo - 082.688.6868 - Minh Hiếu</p>
                </div>
            </div>

            <!-- Right side small videos -->
            <div class="col-lg-6 d-flex flex-column">
                <div class=" mb-4 row m-0 shadow-sm rounded-5 p-4">
                    <p class="fs-1 fw-bold mb-0 fst-italic">1. Trao đổi thông tin nhanh.</p>
                    <ul class="fst-italic fs-4" style="list-style-position: inside;">
                        <li class="my-2">Sau khi nhận được thông tin đăng ký của quý khách hàng. Organic Marketing sẽ
                            nhanh tróng liên hệ để trao đổi nắm bắt và tổng hợp những vấn đề quan trọng mà doanh nghiệp đang
                            cần xử lý.</li>
                        <li class="my-2">Bạn sẽ làm việc cùng chuyên gia của Organic Marketing thông qua hình thức gặp mặt
                            trực tiếp hoặc Online.</li>
                    </ul>
                </div>

                <div class=" mb-4 row m-0 shadow-sm rounded-5 p-4">
                    <p class="fs-1 fw-bold mb-0 fst-italic">2. Xây dựng nội dung đào tạo chuyên biệt</p>
                    <ul class="fst-italic fs-4" style="list-style-position: inside;">
                        <li class="my-2">Organic Marketing sẽ tiến hành biên soạn 1 các nội dung đào tạo phù hợp với riêng
                            doanh nghiệp và nhân sự của bạn dựa trên các tiêu chí cụ thể như: “Thời lượng, hình thức học
                            tập, bài tập thực hành,...”</li>
                        <li class="my-2">Song song cùng với đó là những bộ tài liệu và công cụ phần mềm hướng dẫn thực
                            hành.</li>
                    </ul>
                </div>

                <div class=" mb-4 row m-0 shadow-sm rounded-5 p-4">
                    <p class="fs-1 fw-bold mb-0 fst-italic">3. Đồng hành cùng doanh nghiệp dài hạn</p>
                    <ul class="fst-italic fs-4" style="list-style-position: inside;">
                        <li class="my-2">Organic Marketing sẽ liên tục cập nhật những thông tin kiến thức quan trọng cho
                            doanh nghiệp thông qua những khóa học mới, buổi học bổ sung.</li>
                        <li class="my-2">Cùng với đó là cung cấp các giải pháp quản trị chuyên nghiệm và liên tục cập nhật
                            và tối ưu tính năng nhằm mang lại các hệ thống báo cáo và đánh giá chuẩn xác trong công việc
                            thực tế.</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('student.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\online-om\resources\views/student/enterprise.blade.php ENDPATH**/ ?>