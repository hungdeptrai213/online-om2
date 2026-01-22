<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="https://organicmarketing.vn/img/Logo%20Organic%20Marketing%20small%20(1).png"
        type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OM Edu</title>
    <link rel="stylesheet" href="/om-front/css/owl.carousel.css" />
    <link rel="stylesheet" href="/om-front/css/owl.theme.default.css" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />

    <!-- <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="/om-front/css/main.css">
    <link rel="stylesheet" href="/om-front/css/custom.css">
    <link rel="stylesheet" href="/om-front/css/responsive.css">

    <?php echo $__env->yieldContent('style'); ?>

</head>

<body class="overflow-x-hidden">
    <?php use Illuminate\Support\Str; ?>

    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg bg-body py-0 position-sticky top-0 z-3 px-0 e-learning-nav">
        <div class="container border-bottom border-custom border-2">
            <a class="navbar-brand py-0" href="<?php echo e(route('student.home')); ?>">

                <img src="/om-front/img/Logo Organic Marketing small (1).png" alt="Bootstrap" width=""
                    height="" class="d-md-none p-2 " style="max-height: 80px;">
                <img src="/om-front/img/Logo Organic Marketing (3).png" alt="Bootstrap" width="" height=""
                    class="d-none d-md-block my-md-3 py-md-3 py-lg-0 big-logo">

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav fw-bold">
                    <li class="nav-item">
                        <a class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'nav-link',
                            'fs-2',
                            'me-xl-4',
                            'mon-alt',
                            'active' => request()->routeIs('student.home'),
                        ]); ?>" href="<?php echo e(route('student.home')); ?>">Khóa Học</a>
                    </li>
                    <li class="nav-item">
                        <a class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'nav-link',
                            'fs-2',
                            'me-xl-4',
                            'mon-alt',
                            'active' => request()->routeIs('student.coaching'),
                        ]); ?>" href="<?php echo e(route('student.coaching')); ?>">Coaching</a>
                    </li>
                    <li class="nav-item">
                        <a class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'nav-link',
                            'fs-2',
                            'me-xl-4',
                            'mon-alt',
                            'active' => request()->routeIs('student.schedule'),
                        ]); ?>" href="<?php echo e(route('student.schedule')); ?>">Lịch Học</a>
                    </li>
                    <li class="nav-item">
                        <a class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'nav-link',
                            'fs-2',
                            'me-xl-4',
                            'mon-alt',
                            'active' => request()->routeIs('student.enterprise'),
                        ]); ?>" href="<?php echo e(route('student.enterprise')); ?>">Gói Doanh Nghiệp</a>
                    </li>
                    <li class="nav-item">
                        <a class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'nav-link',
                            'fs-2',
                            'me-xl-4',
                            'mon-alt',
                            'active' => request()->routeIs('student.materials'),
                        ]); ?>" href="<?php echo e(route('student.materials')); ?>">Tài Liệu</a>
                    </li>
                    <div class="d-sm-flex d-lg-none my-3 align-items-center">
                        <a class="btn btn-primary me-2 p-xl-4 p-lg-3 fs-4 fw-bold rounded-4" href="#"
                            role="button">Dạy trên OM Edu</a>
                        <?php if(auth()->guard('student')->check()): ?>
                            <?php ($student = auth('student')->user()); ?>
                            <div
                                class="student-account d-flex align-items-center gap-2 px-3 py-2 rounded-4 w-100 justify-content-between">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="student-avatar text-white fw-bold">
                                        <?php echo e(Str::upper(Str::substr($student->name ?? 'U', 0, 1))); ?>

                                    </div>
                                    <div class="student-name fw-bold text-nowrap"><?php echo e($student->name); ?></div>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-link text-dark p-0 dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false" aria-label="Tùy chọn tài khoản">
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li class="dropdown-item-text small"><?php echo e($student->email); ?></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <form action="<?php echo e(route('student.logout')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <button class="dropdown-item" type="submit">Đăng xuất</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <?php else: ?>
                            <a class="btn btn-primary p-xl-4 p-lg-3 fs-4 fw-bold rounded-4" href="/dang-nhap"
                                role="button">Đăng nhập</a>
                        <?php endif; ?>
                    </div>
                </ul>
            </div>

            <div class="d-flex two-button">
                <a class="btn btn-primary me-2 p-lg-3 p-xl-4 px-lg-2 px-xl-3 fs-4 rounded-4 fw-bold" href="#"
                    role="button">Dạy trên OM Edu</a>
                <?php if(auth()->guard('student')->check()): ?>
                    <?php ($student = auth('student')->user()); ?>
                    <div class="student-account d-none d-lg-flex align-items-center gap-3 px-3 py-2 rounded-4">
                        <div class="student-avatar text-white fw-bold">
                            <?php echo e(Str::upper(Str::substr($student->name ?? 'U', 0, 1))); ?>

                        </div>
                        <div class="d-flex flex-column">
                            <span class="student-name fw-bold"><?php echo e($student->name); ?></span>
                            <span class="text-muted small"><?php echo e($student->email); ?></span>
                        </div>
                        <div class="dropdown ms-2">
                            <button class="btn btn-link text-dark p-0 dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false" aria-label="Tùy chọn tài khoản">
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li class="dropdown-item-text small"><?php echo e($student->email); ?></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="<?php echo e(route('student.logout')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <button class="dropdown-item" type="submit">Đăng xuất</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php else: ?>
                    <a class="btn btn-primary p-lg-3 p-xl-4 px-lg-2 px-xl-3 fs-4 rounded-4 fw-bold" href="/dang-nhap"
                        role="button">Đăng nhập</a>
                <?php endif; ?>
            </div>

        </div>
    </nav>



    <?php echo $__env->yieldContent('content'); ?>


    <!-- Footer -->
    <div class="container">
        <footer class="mt-6 pt-5 border-top border-2 border-custom ">
            <div class="container width-60">
                <div class="d-flex justify-content-center">
                    <img class="rounded-circle mx-2" src="<?php echo e(asset('img/call.png')); ?>" alt=""
                        width="80" height="80">
                    <img class="rounded-circle mx-2" src="<?php echo e(asset('img/fb.png')); ?>" alt="" width="80"
                        height="80">
                    <img class="rounded-circle mx-2" src="<?php echo e(asset('img/tiktok.png')); ?>" alt=""
                        width="80" height="80">
                    <img class="rounded-circle mx-2" src="<?php echo e(asset('img/youtube.png')); ?>" alt=""
                        width="80" height="80">
                </div>
                <p class="text-center mt-5 fs-2">Trang bị những hành trang tuyệt vời từ Organic Marketing.
                    Được khai sáng, bước đến 1 vùng đất đầy tri thức và
                    đưa thương hiệu của bạn đến nơi xứng đáng thuộc về.</p>
                <p class="text-center mt-4 fs-4">Nocopyright | @OrganicMarketing | MST: 0110715667</p>
            </div>
        </footer>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <script src="/om-front/js/owl.carousel.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>

    <script src="/om-front/js/Js-custom.js"></script>

    <?php echo $__env->yieldPushContent('scripts'); ?>



</body>

</html>

<?php /**PATH C:\xampp\htdocs\online-om\resources\views/student/layouts/app.blade.php ENDPATH**/ ?>