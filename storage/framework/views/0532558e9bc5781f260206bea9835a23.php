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
                    <button class="btn btn-primary me-2 p-xl-4 p-lg-3 fs-4 fw-bold rounded-4" type="button"
                            data-bs-toggle="modal" data-bs-target="#teachModal" data-teach-modal>
                        Dạy trên OM Edu
                    </button>
                        <?php if(auth()->guard('student')->check()): ?>
                            <?php ($student = auth('student')->user()); ?>
                            <?php ($avatarUrl = $student->avatar ? asset($student->avatar) : null); ?>
                            <div class="dropdown w-100">
                                <button class="btn w-100 d-flex align-items-center justify-content-between px-3 py-2 rounded-4 border"
                                        type="button"
                                        id="studentMenuMobile"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="student-avatar text-white fw-bold" style="overflow:hidden;">
                                            <?php if($avatarUrl): ?>
                                                <img src="<?php echo e($avatarUrl); ?>" alt="<?php echo e($student->name); ?>" style="width:100%;height:100%;object-fit:cover;border-radius:50%;">
                                            <?php else: ?>
                                                <?php echo e(Str::upper(Str::substr($student->name ?? 'U', 0, 1))); ?>

                                            <?php endif; ?>
                                        </div>
                                        <i class="bi bi-person-fill"></i>
                                    </div>
                                    <i class="bi bi-chevron-down ms-2"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow-sm w-100" aria-labelledby="studentMenuMobile" style="min-width: 220px;">
                                    <li class="px-3 pt-3 pb-2">
                                        <div class="fw-bold"><?php echo e($student->name); ?></div>
                                        <div class="text-muted small"><?php echo e($student->email); ?></div>
                                    </li>
                                    <li><hr class="dropdown-divider my-2"></li>
                                    <li><a class="dropdown-item py-2" href="<?php echo e(route('student.profile')); ?>"><i class="bi bi-person me-2"></i>Hồ sơ</a></li>
                                    <li><a class="dropdown-item py-2" href="<?php echo e(route('student.my-courses')); ?>"><i class="bi bi-book me-2"></i>Khóa học của tôi</a></li>
                                    <li><a class="dropdown-item py-2" href="<?php echo e(route('student.cart')); ?>"><i class="bi bi-bag me-2"></i>Giỏ hàng</a></li>
                                    <li><hr class="dropdown-divider my-2"></li>
                                    <li>
                                        <form action="<?php echo e(route('student.logout')); ?>" method="POST" class="m-0">
                                            <?php echo csrf_field(); ?>
                                            <button class="dropdown-item text-danger py-2" type="submit"><i class="bi bi-box-arrow-right me-2"></i>Đăng xuất</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        <?php else: ?>
                            <a class="btn btn-primary p-xl-4 p-lg-3 fs-4 fw-bold rounded-4" href="/dang-nhap"
                                role="button">Đăng nhập</a>
                        <?php endif; ?>
                    </div>
                </ul>
            </div> 

            <div class="d-flex two-button align-items-center">
                <button class="btn btn-primary me-2 px-4 fs-5 rounded-4 fw-bold" style="height:60px; display:flex; align-items:center; border-radius:12px;"
                        type="button" data-bs-toggle="modal" data-bs-target="#teachModal" data-teach-modal>
                    Dạy trên OM Edu
                </button>
                <?php if(auth()->guard('student')->check()): ?>
                    <?php ($student = auth('student')->user()); ?>
                    <?php ($avatarUrl = $student->avatar ? asset($student->avatar) : null); ?>
                    <div class="dropdown d-none d-lg-flex align-items-center">
                        <button class="btn btn-light d-flex align-items-center gap-2 px-3 py-2 rounded-4 border"
                                type="button"
                                id="studentMenuDesktop"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">
                            <div class="student-avatar text-white fw-bold" style="overflow:hidden;">
                                <?php if($avatarUrl): ?>
                                    <img src="<?php echo e($avatarUrl); ?>" alt="<?php echo e($student->name); ?>" style="width:100%;height:100%;object-fit:cover;border-radius:50%;">
                                <?php else: ?>
                                    <?php echo e(Str::upper(Str::substr($student->name ?? 'U', 0, 1))); ?>

                                <?php endif; ?>
                            </div>
                            <i class="bi bi-person-fill"></i>
                            <i class="bi bi-chevron-down ms-1"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="studentMenuDesktop" style="min-width: 220px;">
                            <li class="px-3 pt-3 pb-2">
                                <div class="fw-bold"><?php echo e($student->name); ?></div>
                                <div class="text-muted small"><?php echo e($student->email); ?></div>
                            </li>
                            <li><hr class="dropdown-divider my-2"></li>
                            <li><a class="dropdown-item py-2" href="<?php echo e(route('student.profile')); ?>"><i class="bi bi-person me-2"></i>Hồ sơ</a></li>
                            <li><a class="dropdown-item py-2" href="<?php echo e(route('student.my-courses')); ?>"><i class="bi bi-book me-2"></i>Khóa học của tôi</a></li>
                            <li><a class="dropdown-item py-2" href="<?php echo e(route('student.cart')); ?>"><i class="bi bi-bag me-2"></i>Giỏ hàng</a></li>
                            <li><hr class="dropdown-divider my-2"></li>
                            <li>
                                <form action="<?php echo e(route('student.logout')); ?>" method="POST" class="m-0">
                                    <?php echo csrf_field(); ?>
                                    <button class="dropdown-item text-danger py-2" type="submit"><i class="bi bi-box-arrow-right me-2"></i>Đăng xuất</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                <?php else: ?>
                    <a class="btn btn-primary px-4 fs-5 rounded-4 fw-bold" style="height:60px; display:flex; align-items:center; border-radius:12px;" href="/dang-nhap"
                        role="button">Đăng nhập</a>
                <?php endif; ?>
            </div>

        </div>
    </nav>



    <?php if(session('teach_success')): ?>
        <div class="teach-alert-wrapper">
            <div class="alert alert-success teach-alert" data-autohide="5000" role="alert">
                <?php echo e(session('teach_success')); ?>

            </div>
        </div>
    <?php elseif(session('teach_error')): ?>
        <div class="teach-alert-wrapper">
            <div class="alert alert-danger teach-alert" data-autohide="5000" role="alert">
                <?php echo e(session('teach_error')); ?>

            </div>
        </div>
    <?php endif; ?>
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
                <p class="text-center mt-5 fs-2">Trang bị những hành trang tuyệt vời từ Organic Marketing.</br>
                    Được khai sáng, bước đến 1 vùng đất đầy tri thức và</br>
                    đưa thương hiệu của bạn đến nơi xứng đáng thuộc về.</p>
                <p class="text-center mt-4 fs-4">Copyright | @OrganicMarketing</p>
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

    <!-- Teach modal -->
    <div class="modal fade teach-modal" id="teachModal" tabindex="-1" aria-labelledby="teachModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-5 shadow-sm">
                <div class="modal-header border-0">
                    <h3 class="modal-title fw-bold" id="teachModalLabel">Dạy trên OM Edu</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                </div>
                <div class="modal-body">
                    <p class="fs-4 fw-bolder mb-3">Gửi thông tin giáo viên/coach muốn hợp tác</p>
                    <form method="post" action="<?php echo e(route('student.teach.submit')); ?>" class="row g-3">
                        <?php echo csrf_field(); ?>
                        <div class="col-12">
                            <input name="name" type="text" class="form-control p-2 shadow-sm rounded-4 fs-4 ps-3" placeholder="Họ tên" required>
                        </div>
                        <div class="col-12">
                            <input name="phone" type="text" class="form-control p-2 shadow-sm rounded-4 fs-4 ps-3" placeholder="Số điện thoại" required>
                        </div>
                        <div class="col-12">
                            <input name="email" type="email" class="form-control p-2 shadow-sm rounded-4 fs-4 ps-3" placeholder="Email" required>
                        </div>
                        <div class="col-12">
                            <textarea name="field" class="form-control p-2 shadow-sm rounded-4 fs-4 ps-3" rows="3" placeholder="Lĩnh vực bạn đào tạo là gì" required></textarea>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary px-4 py-3 fs-5 rounded-4 w-100">
                                Gửi thông tin
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modalEl = document.getElementById('teachModal');
            if (!modalEl) {
                return;
            }
            const bsModal = new bootstrap.Modal(modalEl);
            document.querySelectorAll('[data-teach-modal]').forEach((el) => {
                el.addEventListener('click', (event) => {
                    event.preventDefault();
                    bsModal.show();
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const autoHideAlerts = document.querySelectorAll('[data-autohide]');
            autoHideAlerts.forEach((alertEl) => {
                const delay = Math.max(0, parseInt(alertEl.dataset.autohide, 10) || 5000);
                setTimeout(() => {
                    alertEl.style.transition = 'opacity 0.4s ease';
                    alertEl.style.opacity = '0';
                    setTimeout(() => {
                        const wrapper = alertEl.closest('.teach-alert-wrapper');
                        if (wrapper) {
                            wrapper.remove();
                        } else if (alertEl.parentNode) {
                            alertEl.parentNode.removeChild(alertEl);
                        }
                    }, 500);
                }, delay);
            });
        });
    </script>

</body>

</html>

<?php /**PATH C:\xampp\htdocs\online-om\resources\views/student/layouts/app.blade.php ENDPATH**/ ?>