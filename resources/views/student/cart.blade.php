<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="https://organicmarketing.vn/img/Logo%20Organic%20Marketing%20small%20(1).png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/om-front/css/owl.carousel.css" />
    <!-- <link rel="stylesheet" href="/om-front/css/owl.theme.carousel.css" /> -->
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
    <link rel="stylesheet" href="/om-front/css/custom-option.css">
    <link rel="stylesheet" href="/om-front/css/responsive.css">
</head>

<body class="overflow-x-hidden">

    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg bg-body py-0 position-sticky top-0 z-3 px-0 e-learning-nav">
        <div class="container border-bottom border-custom border-2">
            <a class="navbar-brand py-0" href="{{ route('student.home') }}">
    
                <img src="/om-front/img/Logo Organic Marketing small (1).png" alt="Bootstrap" width="" height=""
                    class="d-md-none p-2 " style="max-height: 80px;">
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
        <a @class(['nav-link', 'fs-3', 'me-xl-4', 'mon-alt', 'active' => request()->routeIs('student.home')]) href="{{ route('student.home') }}">Khóa Học</a>
    </li>
    <li class="nav-item">
        <a @class(['nav-link', 'fs-3', 'me-xl-4', 'mon-alt', 'active' => request()->routeIs('student.coaching')]) href="{{ route('student.coaching') }}">Coaching</a>
    </li>
    <li class="nav-item">
        <a @class(['nav-link', 'fs-3', 'me-xl-4', 'mon-alt', 'active' => request()->routeIs('student.schedule')]) href="{{ route('student.schedule') }}">Lịch Học</a>
    </li>
    <li class="nav-item">
        <a @class(['nav-link', 'fs-3', 'me-xl-4', 'mon-alt', 'active' => request()->routeIs('student.enterprise')]) href="{{ route('student.enterprise') }}">Gói Doanh Nghiệp</a>
    </li>
    <li class="nav-item">
        <a @class(['nav-link', 'fs-3', 'me-xl-4', 'mon-alt', 'active' => request()->routeIs('student.materials')]) href="{{ route('student.materials') }}">Tài Liệu</a>
    </li>
    <div class="d-sm-flex d-lg-none my-3">
        <a class="btn btn-primary me-2 p-xl-4 p-lg-3 fs-4 fw-bold rounded-4" href="#" role="button">Dạy trên OM Edu</a>
        <a class="btn btn-primary p-xl-4 p-lg-3 fs-4 fw-bold rounded-4" href="#" role="button">Đăng nhập</a>
    </div>
</ul>
            </div>
    
            <div class="d-flex two-button">
                <a class="btn btn-primary me-2 p-lg-3 p-xl-4 px-lg-2 px-xl-3 fs-4 rounded-4 fw-bold" href="#" role="button">Dạy trên OM Edu</a>
                <a class="btn btn-primary p-lg-3 p-xl-4 px-lg-2 px-xl-3 fs-4 rounded-4 fw-bold" href="#" role="button">Đăng nhập</a>
            </div>
    
        </div>
    </nav>
    


    

    <!-- Content -->
    <div class="container mt-6">
        <div class="row gx-lg-4 gx-xl-5 justify-content-between thong-tin-khoa-hoc">
            <!-- Left -->
            <div class="col-lg-8 mb-5">
                <p class="fs-1 mb-1 fw-bold text-sm-center text-md-left"># Thông tin giỏ hàng</p>
                <div class="table-responsive-md">
                    <table class="table mt-5 align-middle fs-2 fw-bold text-center">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Khóa học</th>
                            <th scope="col" class="text-nowrap">Thành tiền</th>
                            <th scope="col" class=""></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1.</th>
                            <td><img width="180px" src="/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg" alt="" class="my-4 rounded-4 shadow-sm"></td>
                            <td>590.000 VNĐ <button class="btn btn-warning fs-4 rounded-4 fw-bold px-4 shadow-sm mt-3 d-sm-block d-md-none mx-auto" href="#" role="button">Xóa</button></td>
                            <td><button class="btn btn-warning fs-4 rounded-4 fw-bold px-4 shadow-sm d-sm-none d-md-block" href="#" role="button">Xóa</button></td>
                        </tr>
                        <tr>
                            <th scope="row">2.</th>
                            <td><img width="180px" src="/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg" alt="" class="my-4 rounded-4 shadow-sm"></td>
                            <td>590.000 VNĐ <button class="btn btn-warning fs-4 rounded-4 fw-bold px-4 shadow-sm mt-3 d-sm-block d-md-none mx-auto" href="#" role="button">Xóa</button></td>
                            <td><button class="btn btn-warning fs-4 rounded-4 fw-bold px-4 shadow-sm d-sm-none d-md-block" href="#" role="button">Xóa</button></td>
                        </tr>
                        <tr>
                            <th scope="row">3.</th>
                            <td><img width="180px" src="/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg" alt="" class="my-4 rounded-4 shadow-sm"></td>
                            <td>590.000 VNĐ <button class="btn btn-warning fs-4 rounded-4 fw-bold px-4 shadow-sm mt-3 d-sm-block d-md-none mx-auto" href="#" role="button">Xóa</button></td>
                            <td><button class="btn btn-warning fs-4 rounded-4 fw-bold px-4 shadow-sm d-sm-none d-md-block" href="#" role="button">Xóa</button></td>
                        </tr>
                    </tbody>
                </table>
                </div>
                
            </div>

            <!-- Right -->
            <div class="col-lg-3 d-flex flex-column mb-6">
                <p class="fs-1 mb-3 fw-bold text-center"># Thanh toán</p>
                <div class="custom-bg-5 p-sm-3 p-md-4  p-lg-4 py-lg-5 d-flex justify-content-center flex-column rounded-5 shadow">
                    <p class="text-center fs-3 fw-bold">Tổng cộng</p>
                    <p class="text-center fs-3 fw-bold mb-0">500.000 VND</p>
                    <p class="text-center fs-4 fst-italic">(3 khóa học)</p>
                    <a class="btn btn-primary fs-3 rounded-4 fw-bold mt-auto mb-4 d-sm-block d-md-none d-lg-block" href="#" role="button">Tiến hành thanh toán</a>
                    <a class="btn btn-primary fs-3 rounded-4 fw-bold mt-auto mb-4 mx-auto d-sm-none d-md-block d-lg-none" href="#" role="button">Tiến hành thanh toán</a>
                    <p class="text-center fs-3 mb-0">Cách 1:</p>
                    <p class="text-center fs-3">Thanh toán theo mã QR</p>
                    <img src="/om-front/img/person_1_sm.jpg" alt="" class="w-75 mx-auto d-sm-none d-lg-block">
                    <img src="/om-front/img/person_1_sm.jpg" alt="" class="w-50 mx-auto d-sm-block d-lg-none">
                    <hr class="opacity-100 w-25 ms-auto me-auto mt-4">
                    <p class="text-center fs-3 mb-0">Cách 2:</p>
                    <p class="text-center fs-3 mb-0">Thanh toán chuyển khoản</p>
                    <p class="text-center fs-5 mb-0 fw-bold">MB Bank - 163448866 - Phạm Ngọc Hùng</p>
                    <p class="text-center fs-4 mb-0">Nội dung chuyển khoản: mh103</p>
                    <p class="text-center fs-4 mb-0">Lưu ý kiểm tra đúng số tiền và nội dung chuyển khoản.</p>
                    <hr class="opacity-100 w-25 mx-auto mt-4">
                    <p class="text-center fs-5 mb-0 fst-italic">Nếu sau 15 phút bạn vẫn chưa nhận được khóa học vui lòng liên hệ hỗ trợ</p>
                </div>
            </div>
        </div>
    </div>

    


    <!-- Footer -->
    <div class="container">
        <footer class="mt-5 pt-5 border-top border-2 border-custom">
            <div class="container width-60">
                <div class="d-flex justify-content-center">
                    <a href="">
                        <img class="rounded-circle mx-2" src="/om-front/img/youtube-icon.png" alt="" width="80" height="80">
                    </a>

                    <a href="">
                        <img class="rounded-circle mx-2" src="/om-front/img/facebook-icon.png" alt="" width="80" height="80">
                    </a>

                    <a href="">
                        <img class="rounded-circle mx-2" src="/om-front/img/tiktok-icon.png" alt="" width="80" height="80">
                    </a>
                    
                    
                    
                </div>
                <p class="text-center mt-5 fs-2">Trang bị những hành trang tuyệt vời từ Organic Marketing. Được khai
                    sáng,
                    bước đến 1 vùng đất đầy tri thức và đưa thương hiệu của bạn đến nơi xứng đáng thuộc về.</p>
                <p class="text-center mt-4 fs-4">Nocopyright | @OrganicMarketing | MST: 1047565555</p>
        </footer>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous">
        </script>

    <script src="/om-front/js/owl.carousel.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>

    <script src="/om-front/js/Js-custom.js"></script>

    <script src="/om-front/js/custom-option.js"></script>


</body>

</html>






