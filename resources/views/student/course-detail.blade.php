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
            <div class="col-lg-9 mb-5">
                <p class="fs-1 mb-1 fw-bold mb-1">Giới thiệu khóa học</p>
                <p class="fs-3 mb-1">Khoá học Content tinh gọn hay gọi đầy đủ hơn là khóa học Content Marketing. 
                    Chắc hẳn mọi người đã quá quen thuộc với câu nói Content Is King rồi phải không nào? Nhưng cụ thể nó là như thế nào, vận hành ứng dụng và vai trò cụ thể ra làm sao thì có vẻ như chưa có ai xây dựng cho bạn một lộ trình học bài bản.
                </p>
                <p class="fs-1 fw-bold mb-1 mt-4">Nội dung khóa học</p>

                <p class="fs-3 mb-3 fw-bold mt-4">Chương 1: Tổng quan Content Marketing</p>
                    <div class="d-flex flex-wrap justify-content-end align-items-center mb-sm-3 mb-md-1 nd-chuong">
                        <div class="col-md-8 col-lg-9 col-xxl-10">
                            <div class="d-flex align-items-center">
                                <p class="fs-3 mb-0">Bài 1: Giới thiệu khóa học Content Marketing</p>
                                <div class="flex-grow-1 ms-md-2 ms-lg-2 ms-xl-3" style="border-style: dashed; border-width: 0 0 2px 0;"> </div>
                            </div>
                        </div>
                        <div class="col-lg-2 d-flex justify-content-end flex-wrap">
                            <div class="d-flex justify-content-end">
                                <a class="btn fs-4 p-0 me-lg-2 me-xl-3" href="#" role="button">
                                    <img src="/om-front/img/Circled Play Button.png" alt="" width="25px" class=" mb-1">
                                    Xem
                                </a>
                                <a class="btn fs-4 p-0" href="#" role="button">
                                    <img src="/om-front/img/Open Document.png" alt="" width="25px" class="mb-1">
                                    Xem
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap justify-content-end align-items-center mb-sm-3 mb-md-1 nd-chuong">
                        <div class="col-md-8 col-lg-9 col-xxl-10">
                            <div class="d-flex align-items-center">
                                <p class="fs-3 mb-0">Bài 2: Khái niệm Content Marketing nhất định bạn phải nắm chắc</p>
                                <div class="flex-grow-1 ms-md-2 ms-lg-2 ms-xl-3" style="border-style: dashed; border-width: 0 0 2px 0;"> </div>
                            </div>
                        </div>
                        <div class="col-lg-2 d-flex justify-content-end flex-wrap">
                            <div class="d-flex justify-content-end">
                                <a class="btn fs-4 p-0 me-lg-2 me-xl-3" href="#" role="button">
                                    <img src="/om-front/img/Circled Play Button.png" alt="" width="25px" class=" mb-1">
                                    Xem
                                </a>
                                <a class="btn fs-4 p-0" href="#" role="button">
                                    <img src="/om-front/img/Open Document.png" alt="" width="25px" class="mb-1">
                                    Xem
                                </a>
                            </div>
                        </div>
                    </div>
                
                <p class="fs-3 mb-3 fw-bold mt-4">Chương 2: Tổng quan Content Marketing</p>
                    <div class="d-flex flex-wrap justify-content-end align-items-center mb-sm-3 mb-md-1 nd-chuong">
                        <div class="col-md-8 col-lg-9 col-xxl-10">
                            <div class="d-flex align-items-center">
                                <p class="fs-3 mb-0">Bài 1: Giới thiệu khóa học Content Marketing</p>
                                <div class="flex-grow-1 ms-md-2 ms-lg-2 ms-xl-3" style="border-style: dashed; border-width: 0 0 2px 0;"> </div>
                            </div>
                        </div>
                        <div class="col-lg-2 d-flex justify-content-end flex-wrap">
                            <div class="d-flex justify-content-end">
                                <a class="btn fs-4 p-0 me-lg-2 me-xl-3" href="#" role="button">
                                    <img src="/om-front/img/Circled Play Button.png" alt="" width="25px" class=" mb-1">
                                    Xem
                                </a>
                                <a class="btn fs-4 p-0" href="#" role="button">
                                    <img src="/om-front/img/Open Document.png" alt="" width="25px" class="mb-1">
                                    Xem
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap justify-content-end align-items-center mb-sm-3 mb-md-1 nd-chuong">
                        <div class="col-md-8 col-lg-9 col-xxl-10">
                            <div class="d-flex align-items-center">
                                <p class="fs-3 mb-0">Bài 2: Khái niệm Content Marketing nhất định bạn phải nắm chắc</p>
                                <div class="flex-grow-1 ms-md-2 ms-lg-2 ms-xl-3" style="border-style: dashed; border-width: 0 0 2px 0;"> </div>
                            </div>
                        </div>
                        <div class="col-lg-2 d-flex justify-content-end flex-wrap">
                            <div class="d-flex justify-content-end">
                                <a class="btn fs-4 p-0 me-lg-2 me-xl-3" href="#" role="button">
                                    <img src="/om-front/img/Circled Play Button.png" alt="" width="25px" class=" mb-1">
                                    Xem
                                </a>
                                <a class="btn fs-4 p-0" href="#" role="button">
                                    <img src="/om-front/img/Open Document.png" alt="" width="25px" class="mb-1">
                                    Xem
                                </a>
                            </div>
                        </div>
                    </div>
                
                <div class="more-content" style="display: none;">
                    <p class="fs-3 mb-3 fw-bold mt-4">Chương 3: Tổng quan Content Marketing</p>
                    <div class="d-flex flex-wrap justify-content-end align-items-center mb-sm-3 mb-md-1 nd-chuong">
                        <div class="col-md-8 col-lg-9 col-xxl-10">
                            <div class="d-flex align-items-center">
                                <p class="fs-3 mb-0">Bài 1: Giới thiệu khóa học Content Marketing</p>
                                <div class="flex-grow-1 ms-md-2 ms-lg-2 ms-xl-3" style="border-style: dashed; border-width: 0 0 2px 0;"> </div>
                            </div>
                        </div>
                        <div class="col-lg-2 d-flex justify-content-end flex-wrap">
                            <div class="d-flex justify-content-end">
                                <a class="btn fs-4 p-0 me-lg-2 me-xl-3" href="#" role="button">
                                    <img src="/om-front/img/Circled Play Button.png" alt="" width="25px" class=" mb-1">
                                    Xem
                                </a>
                                <a class="btn fs-4 p-0" href="#" role="button">
                                    <img src="/om-front/img/Open Document.png" alt="" width="25px" class="mb-1">
                                    Xem
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap justify-content-end align-items-center mb-sm-3 mb-md-1 nd-chuong">
                        <div class="col-md-8 col-lg-9 col-xxl-10">
                            <div class="d-flex align-items-center">
                                <p class="fs-3 mb-0">Bài 1: Giới thiệu khóa học Content Marketing</p>
                                <div class="flex-grow-1 ms-md-2 ms-lg-2 ms-xl-3" style="border-style: dashed; border-width: 0 0 2px 0;"> </div>
                            </div>
                        </div>
                        <div class="col-lg-2 d-flex justify-content-end flex-wrap">
                            <div class="d-flex justify-content-end">
                                <a class="btn fs-4 p-0 me-lg-2 me-xl-3" href="#" role="button">
                                    <img src="/om-front/img/Circled Play Button.png" alt="" width="25px" class=" mb-1">
                                    Xem
                                </a>
                                <a class="btn fs-4 p-0" href="#" role="button">
                                    <img src="/om-front/img/Open Document.png" alt="" width="25px" class="mb-1">
                                    Xem
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                    
                <button class="btn btn-warning fs-4 rounded-pill fw-bold px-3 read-more-btn mt-5 shadow" href="#" role="button"><img src="/om-front/img/angle tranparent.png" alt="" width="20px" class="me-2 mb-1 toggle-icon"><span>Xem tất cả</span></button>
                
                <p class="fs-1 fw-bold mb-1 mt-5">Ai nên học?</p>
                <ul class="fs-3">
                    <li>Giới thiệu khóa học Content Marketing</li>
                    <li>Khái niệm Content Marketing nhất định bạn phải nắm chắc</li>
                    <li>Kinh doanh thành công với vai trò Content Marketin</li>
                    <li>Các dạng nội dung khi học Content Marketing</li>
                    <li>Cùng tìm hiểu về người làm sáng tạo nội dung - Content Creator</li>
                 </ul>
                 <p class="h1 fw-bold mb-1 mt-5">Giới thiệu giảng viên</p>
                 <div class="row mt-4 gx-lg-5">
                    <div class="col-lg-2">
                        <img src="/om-front/img/person_3_sm.jpg" alt="" class="d-none d-lg-block w-100 rounded-circle shadow">
                        <div class="mb-4 d-flex justify-content-center">
                            <img src="/om-front/img/person_3_sm.jpg" alt="" class="d-sm-block d-lg-none rounded-circle w-75 shadow">
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <p class="fs-2 fw-bold mb-0">Đặng Minh Hiếu</p>
                        <p class="fs-2 mb-1 mb-1">Founder Hienu / Organic Marketing</p>
                    </div>
                 </div>
                 <p class="fs-3 mb-1 mt-5">Khoá học Content tinh gọn hay gọi đầy đủ hơn là khóa học Content Marketing. Chắc hẳn mọi người đã quá quen thuộc với câu nói Content Is King rồi phải không nào? Nhưng cụ thể nó là như thế nào, vận hành ứng dụng và vai trò cụ thể ra làm sao thì có vẻ như chưa có ai xây dựng cho bạn một lộ trình học bài bản.</p>
            
                 <p class="fs-1 fw-bold mb-1 mt-5">Công việc / dự án</p>
                    <ul class="fs-3">
                        <li>Giới thiệu khóa học Content Marketing</li>
                        <li>Khái niệm Content Marketing nhất định bạn phải nắm chắc</li>
                        <li>Kinh doanh thành công với vai trò Content Marketin</li>
                        <li>Các dạng nội dung khi học Content Marketing</li>
                        <li>Cùng tìm hiểu về người làm sáng tạo nội dung - Content Creator</li>
                    </ul>

                <p class="fs-1 fw-bold mb-1 mt-5">Trang cá nhân</p>
                    <ul class="fs-3">
                        <li>Facebook</li>
                        <li>Tiktok</li>
                        <li>YouTube</li>
                        <li>Instargram</li>
                        <li>Website</li>
                    </ul>
            </div>

            <!-- Right -->
            <div class="col-lg-3 d-flex flex-column mb-5">
                <div class="custom-bg-5 p-sm-3 p-md-3 p-lg-4 d-flex justify-content-center flex-column rounded-5 shadow">
                    <div class="row">
                        <div class="col-md-6 col-lg-12">
                            <img src="/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg" alt="" class="rounded-5 shadow-sm w-100">
                        </div>
                        <div class="col-md-6 col-lg-12 d-flex flex-column">
                            <p class="fs-1 mt-4 mb-1 fw-medium mb-1">Digital Marketing</p>
                            <p class="fs-3 fst-italic mb-1">Tác giả: Hienu</p>
                            <p class="fs-3 fst-italic mb-1">Thể loại: Tư duy</p>
                            <p class="fs-3 fst-italic mb-1">Thời lượng: 18 giờ 24 phút</p>
                            <p class="fs-3 fst-italic mb-lg-5">600.000 đ</p>

                            <a class="btn btn-primary fs-3 rounded-4 fw-bold mt-auto mb-2" href="#" role="button">Đăng ký</a>
                            <a class="btn btn-primary fs-3 rounded-4 fw-bold mt-2 mb-2" href="#" role="button">Vào học</a>
                        </div>
                    </div>
                </div>
                    <a class="btn btn-primary fs-3 rounded-4 fw-bold mt-sm-3 mt-md-5 mt-lg-5 mx-lg-5 mb-5 shadow-sm ms-sm-auto me-sm-auto d-none" href="#" role="button">Vào học</a>
            </div>
        </div>
    </div>

    


    <!-- Footer -->
    <div class="container">
        <footer class="mt-6 pt-5 border-top border-2 border-custom">
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






