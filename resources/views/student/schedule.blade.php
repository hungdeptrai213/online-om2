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
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="rounded-5 p-4 shadow-sm custom-bg-3">
                    <div class="row">
                        <div class="col-5 pe-4">
                            <img src="/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg" alt=""
                                class="w-100 rounded-5 shadow-sm">
                        </div>
                        <div class="col-7 d-flex flex-column">
                            <p class="fs-1 mb-1">Digital Marketing | K24</p>
                            <table class="table table-borderless mt-3 fst-italic fs-4">
                                <tbody>
                                    <tr>
                                        <th class="fw-normal">Lịch học:</th>
                                        <td>Tối thứ 2 & tối thứ 4</td>
                                    </tr>
                                    <tr>
                                        <th class="fw-normal">Khai giảng:</th>
                                        <td>23/11/2025</td>
                                    </tr>
                                    <tr>
                                        <th class="fw-normal">Thời lượng:</th>
                                        <td>4 buổi</td>
                                    </tr>
                                    <tr>
                                        <th class="fw-normal">Hình thức học:</th>
                                        <td>Online</td>
                                    </tr>
                                    <tr>
                                        <th class="fw-normal">Chi phí:</th>
                                        <td>590.000 đ</td>
                                    </tr>
                                    <tr>
                                        <th class="fw-normal">Tác giả:</th>
                                        <td>Hienu</td>
                                    </tr>
                                    <tr>
                                        <th class="fw-normal">Người chia sẻ:</th>
                                        <td>Minh Hiếu</td>
                                    </tr>
                                    <tr>
                                        <th class="fw-normal">Tình trạng:</th>
                                        <td>Còn trống</td>
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

            <div class="col-lg-6 mb-4">
                <div class="rounded-5 p-4 shadow-sm custom-bg-3">
                    <div class="row">
                        <div class="col-5 pe-4">
                            <img src="/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg" alt=""
                                class="w-100 rounded-5 shadow-sm">
                        </div>
                        <div class="col-7 d-flex flex-column">
                            <p class="fs-1 mb-1">Digital Marketing | K24</p>
                            <table class="table table-borderless mt-3 fst-italic fs-4">
                                <tbody>
                                    <tr>
                                        <th class="fw-normal">Lịch học:</th>
                                        <td>Tối thứ 2 & tối thứ 4</td>
                                    </tr>
                                    <tr>
                                        <th class="fw-normal">Khai giảng:</th>
                                        <td>23/11/2025</td>
                                    </tr>
                                    <tr>
                                        <th class="fw-normal">Thời lượng:</th>
                                        <td>4 buổi</td>
                                    </tr>
                                    <tr>
                                        <th class="fw-normal">Hình thức học:</th>
                                        <td>Online</td>
                                    </tr>
                                    <tr>
                                        <th class="fw-normal">Chi phí:</th>
                                        <td>590.000 đ</td>
                                    </tr>
                                    <tr>
                                        <th class="fw-normal">Tác giả:</th>
                                        <td>Hienu</td>
                                    </tr>
                                    <tr>
                                        <th class="fw-normal">Người chia sẻ:</th>
                                        <td>Minh Hiếu</td>
                                    </tr>
                                    <tr>
                                        <th class="fw-normal">Tình trạng:</th>
                                        <td>Còn trống</td>
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

            <div class="col-lg-6 mb-4">
                <div class="rounded-5 p-4 shadow-sm custom-bg-3">
                    <div class="row">
                        <div class="col-5 pe-4">
                            <img src="/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg" alt=""
                                class="w-100 rounded-5 shadow-sm">
                        </div>
                        <div class="col-7 d-flex flex-column">
                            <p class="fs-1 mb-1">Digital Marketing | K24</p>
                            <table class="table table-borderless mt-3 fst-italic fs-4">
                                <tbody>
                                    <tr>
                                        <th class="fw-normal">Lịch học:</th>
                                        <td>Tối thứ 2 & tối thứ 4</td>
                                    </tr>
                                    <tr>
                                        <th class="fw-normal">Khai giảng:</th>
                                        <td>23/11/2025</td>
                                    </tr>
                                    <tr>
                                        <th class="fw-normal">Thời lượng:</th>
                                        <td>4 buổi</td>
                                    </tr>
                                    <tr>
                                        <th class="fw-normal">Hình thức học:</th>
                                        <td>Online</td>
                                    </tr>
                                    <tr>
                                        <th class="fw-normal">Chi phí:</th>
                                        <td>590.000 đ</td>
                                    </tr>
                                    <tr>
                                        <th class="fw-normal">Tác giả:</th>
                                        <td>Hienu</td>
                                    </tr>
                                    <tr>
                                        <th class="fw-normal">Người chia sẻ:</th>
                                        <td>Minh Hiếu</td>
                                    </tr>
                                    <tr>
                                        <th class="fw-normal">Tình trạng:</th>
                                        <td>Còn trống</td>
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
</body>
</html>






