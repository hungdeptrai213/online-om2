<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="https://organicmarketing.vn/img/Logo%20Organic%20Marketing%20small%20(1).png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <a @class(['nav-link', 'fs-2', 'me-xl-4', 'mon-alt', 'active' => request()->routeIs('student.home')]) href="{{ route('student.home') }}">Khóa Học</a>
    </li>
    <li class="nav-item">
        <a @class(['nav-link', 'fs-2', 'me-xl-4', 'mon-alt', 'active' => request()->routeIs('student.coaching')]) href="{{ route('student.coaching') }}">Coaching</a>
    </li>
    <li class="nav-item">
        <a @class(['nav-link', 'fs-2', 'me-xl-4', 'mon-alt', 'active' => request()->routeIs('student.schedule')]) href="{{ route('student.schedule') }}">Lịch Học</a>
    </li>
    <li class="nav-item">
        <a @class(['nav-link', 'fs-2', 'me-xl-4', 'mon-alt', 'active' => request()->routeIs('student.enterprise')]) href="{{ route('student.enterprise') }}">Gói Doanh Nghiệp</a>
    </li>
    <li class="nav-item">
        <a @class(['nav-link', 'fs-2', 'me-xl-4', 'mon-alt', 'active' => request()->routeIs('student.materials')]) href="{{ route('student.materials') }}">Tài Liệu</a>
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
    

    
    <!-- FlexBox -->
    <div class="container mt-6">
        <div class="row justify-content-center filter-search">
            <div class="col-md-8 col-lg-6 rounded-pill shadow-sm">
                <ul class="list-unstyled py-2 px-xl-4 px-xxl-5 d-flex justify-content-between position-relative mb-0" id="mainNav">
                    <li class=""><a href="" class="btn fw-bold fs-2 border-0">Trang Chủ</a></li>
                    <li class=""><a href="" class="btn fw-bold fs-2 border-0 active">Thư Viện</a></li>
                    <li class=""><a href="" class="btn fw-bold fs-2 border-0">Đề Xuất</a></li>
                    <li class=""><a href="" class="btn fw-bold fs-2 border-0">Nổi bật</a></li>
                    <li class=""><a href="" class="btn fw-bold fs-2 border-0">Mới Ra</a></li>
                    <button class="btn px-0 my-search-toggle my-search-toggle search-icon" type="" id="openSearch"><i class="fa-solid fa-magnifying-glass fs-2"></i></button>
                
                </ul>

                <form class=" d-flex bg-body h-100 rounded-pill py-2 px-xl-4 px-xxl-5 d-none search-3" role="search" style="" id="searchBar">
                        <input class="form-control bg-transparent text-center fs-1 fw-bold" type="search"
                            placeholder="Bạn muốn nghe gì nào?" aria-label="Search" />
                        <button class="btn px-0 me-2" type="submit"><i class="fa-solid fa-magnifying-glass fs-2"></i></button>
                </form>
            </div>
        </div>

        <div class="row d-sm-block d-lg-none">
            <div class="col-12">
                <form class="d-flex rounded-pill py-2 search-4 rounded-pill shadow-sm px-3 search-4" role="search" style="">
                        <input class="form-control bg-transparent text-center fs-2 fw-bold" type="search"
                            placeholder="Bạn muốn nghe gì nào?" aria-label="Search" />
                        <button class="btn px-0 me-2" type="submit"><i class="fa-solid fa-magnifying-glass fs-2"></i></button>
                </form>

                
            </div>
            <ul class="list-unstyled py-2 px-xl-4 px-xxl-5 d-flex justify-content-between mt-4 mb-0 overflow-x-auto text-nowrap mobile-category" style="max-height: 200px;">
                    <li class=""><a href="" class="btn fw-bold fs-2 border-0 ">Trang Chủ</a></li>
                    <li class=""><a href="" class="btn fw-bold fs-2 border-0 ">Thư Viện</a></li>
                    <li class=""><a href="" class="btn fw-bold fs-2 border-0 ">Đề Xuất</a></li>
                    <li class=""><a href="" class="btn fw-bold fs-2 border-0 ">Nổi bật</a></li>
                    <li class=""><a href="" class="btn fw-bold fs-2 border-0 ">Mới Ra</a></li>
                
            </ul>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <p class="fs-1 mb-4 fw-bold">Thư Viện</p>
            <div class="col-sm-6 col-md-4 col-lg-24 mb-3">
                <a href="" class="text-decoration-none text-black position-relative has-tooltip">
                    <img src="/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg" alt="" class="w-100 rounded-sm-3 rounded-5 shadow-sm">
                    <p class="fs-2 mt-3">500.000</p>
                    <div class="grey-bg rounded-5 p-4 d-flex my-tooltip shadow-sm" style="width: 35%;">
                        <div class="col-5 pe-4">
                            <img src="/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg" alt="" class="w-100 rounded-5 shadow-sm">
                        </div>

                        <div class="col-7">
                            <p class="fs-2 fw-bold mb-1">Digital Marketing</p>
                            <p class="fs-4 mb-1">Thời lượng: 1h</p>
                            <p class="fs-4 mb-1">500.000</p>
                            <p class="fs-4 mt-3 mb-1 fst-italic">Tác giả: Hienu</p>
                            <p class="fs-4 mb-1 fst-italic">Thể loại: Marketing</p>
                            <p class="fs-4 mb-1 fst-italic">Khóa học Digital Marketing được thiết kế nhằm cung cấp cho học viên cái nhìn tổng thể, hệ thống và thực tiễn về cách ứng dụng các công cụ và kênh truyền thông số để thu hút khách hàng, xây dựng thương hiệu và tạo ra doanh thu bền vững.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-24 mb-3">
                <a href="" class="text-decoration-none text-black position-relative has-tooltip">
                    <img src="/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg" alt="" class="w-100 rounded-5 shadow-sm">
                    <p class="fs-2 mt-3">500.000</p>
                    <div class="grey-bg rounded-5 p-4 d-flex my-tooltip shadow-sm" style="width: 35%;">
                        <div class="col-5 pe-4">
                            <img src="/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg" alt="" class="w-100 rounded-5 shadow-sm">
                        </div>

                        <div class="col-7">
                            <p class="fs-2 fw-bold mb-1">Digital Marketing</p>
                            <p class="fs-4 mb-1">Thời lượng: 1h</p>
                            <p class="fs-4 mb-1">500.000</p>
                            <p class="fs-4 mt-3 mb-1 fst-italic">Tác giả: Hienu</p>
                            <p class="fs-4 mb-1 fst-italic">Thể loại: Marketing</p>
                            <p class="fs-4 mb-1 fst-italic">Khóa học Digital Marketing được thiết kế nhằm cung cấp cho học viên cái nhìn tổng thể, hệ thống và thực tiễn về cách ứng dụng các công cụ và kênh truyền thông số để thu hút khách hàng, xây dựng thương hiệu và tạo ra doanh thu bền vững.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-24 mb-3">
                <a href="" class="text-decoration-none text-black position-relative has-tooltip">
                    <img src="/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg" alt="" class="w-100 rounded-5 shadow-sm">
                    <p class="fs-2 mt-3">500.000</p>
                    <div class="grey-bg rounded-5 p-4 d-flex my-tooltip shadow-sm" style="width: 35%;">
                        <div class="col-5 pe-4">
                            <img src="/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg" alt="" class="w-100 rounded-5 shadow-sm">
                        </div>

                        <div class="col-7">
                            <p class="fs-2 fw-bold mb-1">Digital Marketing</p>
                            <p class="fs-4 mb-1">Thời lượng: 1h</p>
                            <p class="fs-4 mb-1">500.000</p>
                            <p class="fs-4 mt-3 mb-1 fst-italic">Tác giả: Hienu</p>
                            <p class="fs-4 mb-1 fst-italic">Thể loại: Marketing</p>
                            <p class="fs-4 mb-1 fst-italic">Khóa học Digital Marketing được thiết kế nhằm cung cấp cho học viên cái nhìn tổng thể, hệ thống và thực tiễn về cách ứng dụng các công cụ và kênh truyền thông số để thu hút khách hàng, xây dựng thương hiệu và tạo ra doanh thu bền vững.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-24 mb-3">
                <a href="" class="text-decoration-none text-black position-relative has-tooltip">
                    <img src="/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg" alt="" class="w-100 rounded-5 shadow-sm">
                    <p class="fs-2 mt-3">500.000</p>
                    <div class="grey-bg rounded-5 p-4 d-flex my-tooltip shadow-sm" style="width: 35%;">
                        <div class="col-5 pe-4">
                            <img src="/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg" alt="" class="w-100 rounded-5 shadow-sm">
                        </div>

                        <div class="col-7">
                            <p class="fs-2 fw-bold mb-1">Digital Marketing</p>
                            <p class="fs-4 mb-1">Thời lượng: 1h</p>
                            <p class="fs-4 mb-1">500.000</p>
                            <p class="fs-4 mt-3 mb-1 fst-italic">Tác giả: Hienu</p>
                            <p class="fs-4 mb-1 fst-italic">Thể loại: Marketing</p>
                            <p class="fs-4 mb-1 fst-italic">Khóa học Digital Marketing được thiết kế nhằm cung cấp cho học viên cái nhìn tổng thể, hệ thống và thực tiễn về cách ứng dụng các công cụ và kênh truyền thông số để thu hút khách hàng, xây dựng thương hiệu và tạo ra doanh thu bền vững.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-24 mb-3">
                <a href="" class="text-decoration-none text-black position-relative has-tooltip">
                    <img src="/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg" alt="" class="w-100 rounded-5 shadow-sm">
                    <p class="fs-2 mt-3">500.000</p>
                    <div class="grey-bg rounded-5 p-4 d-flex my-tooltip shadow-sm" style="width: 35%;">
                        <div class="col-5 pe-4">
                            <img src="/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg" alt="" class="w-100 rounded-5 shadow-sm">
                        </div>

                        <div class="col-7">
                            <p class="fs-2 fw-bold mb-1">Digital Marketing</p>
                            <p class="fs-4 mb-1">Thời lượng: 1h</p>
                            <p class="fs-4 mb-1">500.000</p>
                            <p class="fs-4 mt-3 mb-1 fst-italic">Tác giả: Hienu</p>
                            <p class="fs-4 mb-1 fst-italic">Thể loại: Marketing</p>
                            <p class="fs-4 mb-1 fst-italic">Khóa học Digital Marketing được thiết kế nhằm cung cấp cho học viên cái nhìn tổng thể, hệ thống và thực tiễn về cách ứng dụng các công cụ và kênh truyền thông số để thu hút khách hàng, xây dựng thương hiệu và tạo ra doanh thu bền vững.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-24 mb-3">
                <a href="" class="text-decoration-none text-black position-relative has-tooltip">
                    <img src="/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg" alt="" class="w-100 rounded-5 shadow-sm">
                    <p class="fs-2 mt-3">500.000</p>
                    <div class="grey-bg rounded-5 p-4 d-flex my-tooltip shadow-sm" style="width: 35%;">
                        <div class="col-5 pe-4">
                            <img src="/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg" alt="" class="w-100 rounded-5 shadow-sm">
                        </div>

                        <div class="col-7">
                            <p class="fs-2 fw-bold mb-1">Digital Marketing</p>
                            <p class="fs-4 mb-1">Thời lượng: 1h</p>
                            <p class="fs-4 mb-1">500.000</p>
                            <p class="fs-4 mt-3 mb-1 fst-italic">Tác giả: Hienu</p>
                            <p class="fs-4 mb-1 fst-italic">Thể loại: Marketing</p>
                            <p class="fs-4 mb-1 fst-italic">Khóa học Digital Marketing được thiết kế nhằm cung cấp cho học viên cái nhìn tổng thể, hệ thống và thực tiễn về cách ứng dụng các công cụ và kênh truyền thông số để thu hút khách hàng, xây dựng thương hiệu và tạo ra doanh thu bền vững.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-24 mb-3">
                <a href="" class="text-decoration-none text-black position-relative has-tooltip">
                    <img src="/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg" alt="" class="w-100 rounded-5 shadow-sm">
                    <p class="fs-2 mt-3">500.000</p>
                    <div class="grey-bg rounded-5 p-4 d-flex my-tooltip shadow-sm" style="width: 35%;">
                        <div class="col-5 pe-4">
                            <img src="/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg" alt="" class="w-100 rounded-5 shadow-sm">
                        </div>

                        <div class="col-7">
                            <p class="fs-2 fw-bold mb-1">Digital Marketing</p>
                            <p class="fs-4 mb-1">Thời lượng: 1h</p>
                            <p class="fs-4 mb-1">500.000</p>
                            <p class="fs-4 mt-3 mb-1 fst-italic">Tác giả: Hienu</p>
                            <p class="fs-4 mb-1 fst-italic">Thể loại: Marketing</p>
                            <p class="fs-4 mb-1 fst-italic">Khóa học Digital Marketing được thiết kế nhằm cung cấp cho học viên cái nhìn tổng thể, hệ thống và thực tiễn về cách ứng dụng các công cụ và kênh truyền thông số để thu hút khách hàng, xây dựng thương hiệu và tạo ra doanh thu bền vững.</p>
                        </div>
                    </div>
                </a>
            </div>
            
        
    </div>

    

    <!-- Footer -->
    <div class="container">
        <footer class="mt-6 pt-5 border-top border-2 border-custom ">
            <div class="container width-60">
                <div class="d-flex justify-content-center">
                    <img class="rounded-circle mx-2" src="/om-front/img/Screenshot (1216).png" alt="" width="80" height="80">
                    <img class="rounded-circle mx-2" src="/om-front/img/Screenshot (1216).png" alt="" width="80" height="80">
                    <img class="rounded-circle mx-2" src="/om-front/img/Screenshot (1216).png" alt="" width="80" height="80">
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



</body>
</html>









