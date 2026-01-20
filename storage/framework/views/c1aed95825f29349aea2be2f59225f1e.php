

<?php $__env->startSection('content'); ?>
    <!-- Bộ lọc / tìm kiếm -->
    <div class="container mt-6">
        <div class="row justify-content-center filter-search">
            <div class="col-md-8 col-lg-6 rounded-pill shadow-sm">
                <ul class="list-unstyled py-2  d-flex justify-content-between position-relative mb-0" id="mainNav">
                    <li><a href="<?php echo e(route('student.home')); ?>" class="btn fw-bold fs-2 border-0 <?php echo e(($currentCategory ?? 'home') === 'home' ? 'active' : ''); ?>">Trang chủ</a></li>
                    <li><a href="<?php echo e(route('student.home', ['category' => 'library'])); ?>" class="btn fw-bold fs-2 border-0 <?php echo e(($currentCategory ?? 'home') === 'library' ? 'active' : ''); ?>">Thư viện</a></li>
                    <li><a href="<?php echo e(route('student.home', ['category' => 'recommended'])); ?>" class="btn fw-bold fs-2 border-0 <?php echo e(($currentCategory ?? 'home') === 'recommended' ? 'active' : ''); ?>">Đề xuất</a></li>
                    <li><a href="<?php echo e(route('student.home', ['category' => 'featured'])); ?>" class="btn fw-bold fs-2 border-0 <?php echo e(($currentCategory ?? 'home') === 'featured' ? 'active' : ''); ?>">Nổi bật</a></li>
                    <li><a href="<?php echo e(route('student.home', ['category' => 'new'])); ?>" class="btn fw-bold fs-2 border-0 <?php echo e(($currentCategory ?? 'home') === 'new' ? 'active' : ''); ?>">Mới ra</a></li>
                    <button class="btn px-0 my-search-toggle search-icon" type="button" id="openSearch"><i class="fa-solid fa-magnifying-glass fs-2"></i></button>
                </ul>

                <form class="d-flex bg-body h-100 rounded-pill py-2  d-none search-3" role="search" id="searchBar" method="GET" action="<?php echo e(route('student.home')); ?>">
                    <input type="hidden" name="category" value="<?php echo e($currentCategory ?? 'home'); ?>">
                    <input class="form-control bg-transparent text-center fs-1 fw-bold" name="q" type="search" value="<?php echo e($searchTerm ?? ''); ?>" placeholder="Bạn muốn tìm khóa học nào?" aria-label="Search" />
                    <button class="btn px-0 me-2" type="submit"><i class="fa-solid fa-magnifying-glass fs-2"></i></button>
                </form>
            </div>
        </div>

        <div class="row d-sm-block d-lg-none">
            <div class="col-12">
                <form class="d-flex rounded-pill py-2 search-4 rounded-pill shadow-sm px-3" role="search" method="GET" action="<?php echo e(route('student.home')); ?>">
                    <input type="hidden" name="category" value="<?php echo e($currentCategory ?? 'home'); ?>">
                    <input class="form-control bg-transparent text-center fs-2 fw-bold" name="q" type="search" value="<?php echo e($searchTerm ?? ''); ?>" placeholder="Bạn muốn tìm khóa học nào?" aria-label="Search" />
                    <button class="btn px-0 me-2" type="submit"><i class="fa-solid fa-magnifying-glass fs-2"></i></button>
                </form>
            </div>
            <ul class="list-unstyled py-2  d-flex justify-content-between mt-4 mb-0 overflow-x-auto text-nowrap mobile-category" style="max-height: 200px;">
                <li><a href="<?php echo e(route('student.home')); ?>" class="btn fw-bold fs-2 border-0 <?php echo e(($currentCategory ?? 'home') === 'home' ? 'active' : ''); ?>">Trang chủ</a></li>
                <li><a href="<?php echo e(route('student.home', ['category' => 'library'])); ?>" class="btn fw-bold fs-2 border-0 <?php echo e(($currentCategory ?? 'home') === 'library' ? 'active' : ''); ?>">Thư viện</a></li>
                <li><a href="<?php echo e(route('student.home', ['category' => 'recommended'])); ?>" class="btn fw-bold fs-2 border-0 <?php echo e(($currentCategory ?? 'home') === 'recommended' ? 'active' : ''); ?>">Đề xuất</a></li>
                <li><a href="<?php echo e(route('student.home', ['category' => 'featured'])); ?>" class="btn fw-bold fs-2 border-0 <?php echo e(($currentCategory ?? 'home') === 'featured' ? 'active' : ''); ?>">Nổi bật</a></li>
                <li><a href="<?php echo e(route('student.home', ['category' => 'new'])); ?>" class="btn fw-bold fs-2 border-0 <?php echo e(($currentCategory ?? 'home') === 'new' ? 'active' : ''); ?>">Mới ra</a></li>
            </ul>
        </div>
    </div>

    <div class="container mt-5">
        <?php if($showFilterResults): ?>
        <div class="row" style="margin-top:30px">
            <p class="fs-1 mb-4 fw-bold">Kết quả: <?php echo e($filterHeading ?? 'Khóa học'); ?></p>
            <?php $__empty_1 = true; $__currentLoopData = $filterCourses ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    $thumb = $course->thumbnail;
                    $thumbUrl = $thumb && \Illuminate\Support\Str::startsWith($thumb, ['http://', 'https://'])
                        ? $thumb
                        : ($thumb ? asset($thumb) : '/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg');
                    $price = $course->sale_price ?? $course->price ?? 0;
                    $displayPrice = $price > 0 ? number_format($price, 0, ',', '.') : 'Miễn phí';
                    $categoryNames = optional($course->categories)->pluck('name')->filter()->implode(', ');
                    $short = $course->short_description ?? '';
                ?>
                <div class="col-sm-6 col-md-4 col-lg-24 mb-3">
                    <a href="<?php echo e(route('student.course-detail')); ?>" class="text-decoration-none text-black position-relative has-tooltip">
                        <img src="<?php echo e($thumbUrl); ?>" alt="<?php echo e($course->title); ?>" class="w-100 rounded-sm-3 rounded-5 shadow-sm">
                        <p class="fs-2 mt-3"><?php echo e($displayPrice); ?></p>
                        <div class="grey-bg rounded-5 p-4 d-flex my-tooltip shadow-sm" style="width: 35%;">
                            <div class="col-5 pe-4">
                                <img src="<?php echo e($thumbUrl); ?>" alt="<?php echo e($course->title); ?>" class="w-100 rounded-5 shadow-sm">
                            </div>
                            <div class="col-7">
                                <p class="fs-2 fw-bold mb-1"><?php echo e($course->title); ?></p>
                                <p class="fs-4 mb-1">Giá: <?php echo e($displayPrice); ?></p>
                                <?php if($course->author): ?>
                                    <p class="fs-4 mt-3 mb-1 fst-italic">Tác giả: <?php echo e($course->author); ?></p>
                                <?php endif; ?>
                                <?php if($categoryNames): ?>
                                    <p class="fs-4 mb-1 fst-italic">Thể loại: <?php echo e($categoryNames); ?></p>
                                <?php endif; ?>
                                <?php if($short): ?>
                                    <p class="fs-4 mb-1 fst-italic"><?php echo e(\Illuminate\Support\Str::limit($short, 160)); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="fs-4">Chưa có khóa học phù hợp</p>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <?php if($showHomeSections): ?>
            <?php if(auth()->guard()->check()): ?>
            <div class="row" style="margin-top:30px">
                <p class="fs-1 mb-4 fw-bold">Thư viện - Khóa học của bạn</p>
                <?php $__empty_1 = true; $__currentLoopData = $courses ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $thumb = $course->thumbnail;
                        $thumbUrl = $thumb && \Illuminate\Support\Str::startsWith($thumb, ['http://', 'https://'])
                            ? $thumb
                            : ($thumb ? asset($thumb) : '/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg');
                        $price = $course->sale_price ?? $course->price ?? 0;
                        $displayPrice = $price > 0 ? number_format($price, 0, ',', '.') : 'Miễn phí';
                        $categoryNames = optional($course->categories)->pluck('name')->filter()->implode(', ');
                        $short = $course->short_description ?? '';
                    ?>
                    <div class="col-sm-6 col-md-4 col-lg-24 mb-3">
                        <a href="<?php echo e(route('student.course-detail')); ?>" class="text-decoration-none text-black position-relative has-tooltip">
                            <img src="<?php echo e($thumbUrl); ?>" alt="<?php echo e($course->title); ?>" class="w-100 rounded-sm-3 rounded-5 shadow-sm">
                            <p class="fs-2 mt-3"><?php echo e($displayPrice); ?></p>
                            <div class="grey-bg rounded-5 p-4 d-flex my-tooltip shadow-sm" style="width: 35%;">
                                <div class="col-5 pe-4">
                                    <img src="<?php echo e($thumbUrl); ?>" alt="<?php echo e($course->title); ?>" class="w-100 rounded-5 shadow-sm">
                                </div>
                                <div class="col-7">
                                    <p class="fs-2 fw-bold mb-1"><?php echo e($course->title); ?></p>
                                    <p class="fs-4 mb-1">Giá: <?php echo e($displayPrice); ?></p>
                                    <?php if($course->author): ?>
                                        <p class="fs-4 mt-3 mb-1 fst-italic">Tác giả: <?php echo e($course->author); ?></p>
                                    <?php endif; ?>
                                    <?php if($categoryNames): ?>
                                        <p class="fs-4 mb-1 fst-italic">Thể loại: <?php echo e($categoryNames); ?></p>
                                    <?php endif; ?>
                                    <?php if($short): ?>
                                        <p class="fs-4 mb-1 fst-italic"><?php echo e(\Illuminate\Support\Str::limit($short, 160)); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="fs-4">Chưa có khóa học phù hợp</p>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <div class="row" style="margin-top:30px">
                <p class="fs-1 mb-4 fw-bold">Đề xuất khóa học phù hợp cho bạn</p>
                <?php $__empty_1 = true; $__currentLoopData = $recommended ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $thumb = $course->thumbnail;
                        $thumbUrl = $thumb && \Illuminate\Support\Str::startsWith($thumb, ['http://', 'https://'])
                            ? $thumb
                            : ($thumb ? asset($thumb) : '/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg');
                        $price = $course->sale_price ?? $course->price ?? 0;
                        $displayPrice = $price > 0 ? number_format($price, 0, ',', '.') : 'Miễn phí';
                        $categoryNames = optional($course->categories)->pluck('name')->filter()->implode(', ');
                        $short = $course->short_description ?? '';
                    ?>
                    <div class="col-sm-6 col-md-4 col-lg-24 mb-3">
                        <a href="<?php echo e(route('student.course-detail')); ?>" class="text-decoration-none text-black position-relative has-tooltip">
                            <img src="<?php echo e($thumbUrl); ?>" alt="<?php echo e($course->title); ?>" class="w-100 rounded-sm-3 rounded-5 shadow-sm">
                            <p class="fs-2 mt-3"><?php echo e($displayPrice); ?></p>
                            <div class="grey-bg rounded-5 p-4 d-flex my-tooltip shadow-sm" style="width: 35%;">
                                <div class="col-5 pe-4">
                                    <img src="<?php echo e($thumbUrl); ?>" alt="<?php echo e($course->title); ?>" class="w-100 rounded-5 shadow-sm">
                                </div>
                                <div class="col-7">
                                    <p class="fs-2 fw-bold mb-1"><?php echo e($course->title); ?></p>
                                    <p class="fs-4 mb-1">Giá: <?php echo e($displayPrice); ?></p>
                                    <?php if($course->author): ?>
                                        <p class="fs-4 mt-3 mb-1 fst-italic">Tác giả: <?php echo e($course->author); ?></p>
                                    <?php endif; ?>
                                    <?php if($categoryNames): ?>
                                        <p class="fs-4 mb-1 fst-italic">Thể loại: <?php echo e($categoryNames); ?></p>
                                    <?php endif; ?>
                                    <?php if($short): ?>
                                        <p class="fs-4 mb-1 fst-italic"><?php echo e(\Illuminate\Support\Str::limit($short, 160)); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="fs-4">Chưa có khóa học phù hợp</p>
                <?php endif; ?>
            </div>

            <div class="row" style="margin-top:30px">
                <p class="fs-1 mb-4 fw-bold">Những khóa học nổi bật</p>
                <?php $__empty_1 = true; $__currentLoopData = $featured ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $thumb = $course->thumbnail;
                        $thumbUrl = $thumb && \Illuminate\Support\Str::startsWith($thumb, ['http://', 'https://'])
                            ? $thumb
                            : ($thumb ? asset($thumb) : '/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg');
                        $price = $course->sale_price ?? $course->price ?? 0;
                        $displayPrice = $price > 0 ? number_format($price, 0, ',', '.') : 'Miễn phí';
                        $categoryNames = optional($course->categories)->pluck('name')->filter()->implode(', ');
                        $short = $course->short_description ?? '';
                    ?>
                    <div class="col-sm-6 col-md-4 col-lg-24 mb-3">
                        <a href="<?php echo e(route('student.course-detail')); ?>" class="text-decoration-none text-black position-relative has-tooltip">
                            <img src="<?php echo e($thumbUrl); ?>" alt="<?php echo e($course->title); ?>" class="w-100 rounded-sm-3 rounded-5 shadow-sm">
                            <p class="fs-2 mt-3"><?php echo e($displayPrice); ?></p>
                            <div class="grey-bg rounded-5 p-4 d-flex my-tooltip shadow-sm" style="width: 35%;">
                                <div class="col-5 pe-4">
                                    <img src="<?php echo e($thumbUrl); ?>" alt="<?php echo e($course->title); ?>" class="w-100 rounded-5 shadow-sm">
                                </div>
                                <div class="col-7">
                                    <p class="fs-2 fw-bold mb-1"><?php echo e($course->title); ?></p>
                                    <p class="fs-4 mb-1">Giá: <?php echo e($displayPrice); ?></p>
                                    <?php if($course->author): ?>
                                        <p class="fs-4 mt-3 mb-1 fst-italic">Tác giả: <?php echo e($course->author); ?></p>
                                    <?php endif; ?>
                                    <?php if($categoryNames): ?>
                                        <p class="fs-4 mb-1 fst-italic">Thể loại: <?php echo e($categoryNames); ?></p>
                                    <?php endif; ?>
                                    <?php if($short): ?>
                                        <p class="fs-4 mb-1 fst-italic"><?php echo e(\Illuminate\Support\Str::limit($short, 160)); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="fs-4">Chưa có khóa học phù hợp</p>
                <?php endif; ?>
            </div>

            <div class="row" style="margin-top:30px">
                <p class="fs-1 mb-4 fw-bold">Khóa học mới ra mắt</p>
                <?php $__empty_1 = true; $__currentLoopData = $newCourses ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $thumb = $course->thumbnail;
                        $thumbUrl = $thumb && \Illuminate\Support\Str::startsWith($thumb, ['http://', 'https://'])
                            ? $thumb
                            : ($thumb ? asset($thumb) : '/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg');
                        $price = $course->sale_price ?? $course->price ?? 0;
                        $displayPrice = $price > 0 ? number_format($price, 0, ',', '.') : 'Miễn phí';
                        $categoryNames = optional($course->categories)->pluck('name')->filter()->implode(', ');
                        $short = $course->short_description ?? '';
                    ?>
                    <div class="col-sm-6 col-md-4 col-lg-24 mb-3">
                        <a href="<?php echo e(route('student.course-detail')); ?>" class="text-decoration-none text-black position-relative has-tooltip">
                            <img src="<?php echo e($thumbUrl); ?>" alt="<?php echo e($course->title); ?>" class="w-100 rounded-sm-3 rounded-5 shadow-sm">
                            <p class="fs-2 mt-3"><?php echo e($displayPrice); ?></p>
                            <div class="grey-bg rounded-5 p-4 d-flex my-tooltip shadow-sm" style="width: 35%;">
                                <div class="col-5 pe-4">
                                    <img src="<?php echo e($thumbUrl); ?>" alt="<?php echo e($course->title); ?>" class="w-100 rounded-5 shadow-sm">
                                </div>
                                <div class="col-7">
                                    <p class="fs-2 fw-bold mb-1"><?php echo e($course->title); ?></p>
                                    <p class="fs-4 mb-1">Giá: <?php echo e($displayPrice); ?></p>
                                    <?php if($course->author): ?>
                                        <p class="fs-4 mt-3 mb-1 fst-italic">Tác giả: <?php echo e($course->author); ?></p>
                                    <?php endif; ?>
                                    <?php if($categoryNames): ?>
                                        <p class="fs-4 mb-1 fst-italic">Thể loại: <?php echo e($categoryNames); ?></p>
                                    <?php endif; ?>
                                    <?php if($short): ?>
                                        <p class="fs-4 mb-1 fst-italic"><?php echo e(\Illuminate\Support\Str::limit($short, 160)); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="fs-4">Chưa có khóa học phù hợp</p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('student.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\online-om\resources\views/student/home.blade.php ENDPATH**/ ?>