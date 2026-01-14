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
    


    

    <!-- Dang Ky -->
    <div class="container mt-6">
        <div class="row gx-5 justify-content-between">
            <!-- Left main video -->
            <div class="col-lg-6 pe-xl-5 mb-5">
                <div class="custom-bg-4 p-5 d-flex justify-content-center flex-column rounded-5 form-2-container shadow-sm">
                    <p class="text-center fs-1 fw-bold">Đăng ký đào tạo<br class="d-none d-md-block"> dành cho doanh nghiệp</p>
                    <p class="text-center fs-2 fw-bolder">Thông tin của bạn</p>
                    <form class="form-2 ms-auto me-auto">
                        <div class="mb-3">
                            <input type="" class="form-control p-2 shadow-sm rounded-4 fs-4 ps-3" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Tên công ty">
                        </div>
                        <div class="mb-3">
                            <input type="" class="form-control p-2 shadow-sm rounded-4 fs-4 ps-3" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Người đại diện liên hệ">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control p-2 shadow-sm rounded-4 fs-4 ps-3" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Số điện thoại người đại diện">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control p-2 shadow-sm rounded-4 fs-4 ps-3" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <input type="" class="form-control p-2 shadow-sm rounded-4 fs-4 ps-3" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Số lượng nhân sự đào tạo">
                        </div>
                        <div class="mb-3">
                            <textarea placeholder="Nội dụng bạn muốn đào tạo" class="w-100 p-2 bg-transparent border-0 shadow-sm rounded-4 fs-4 ps-3 "></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 fw-bold rounded-4 fs-4">Đăng ký tư vấn & báo giá chi tiết</button>
                    </form>
                    
                    <p class="text-center fs-5 mt-4 fst-italic">SDT | Zalo - 082.688.6868 - Minh Hiếu</p>
                </div>
            </div>

            <!-- Right side small videos -->
            <div class="col-lg-6 d-flex flex-column">
                <div class=" mb-4 row m-0 shadow-sm rounded-5 p-4">
                    <p class="fs-1 fw-bold mb-0 fst-italic">1. Trao đổi thông tin nhanh.</p>
                    <ul class="fst-italic fs-4" style="list-style-position: inside;">
                        <li class="my-2">Sau khi nhận được thông tin đăng ký của quý khách hàng. Organic Marketing sẽ nhanh tróng liên hệ để trao đổi nắm bắt và tổng hợp những vấn đề quan trọng mà doanh nghiệp đang cần xử lý.</li>
                        <li class="my-2">Bạn sẽ làm việc cùng chuyên gia của Organic Marketing thông qua hình thức gặp mặt trực tiếp hoặc Online.</li>
                    </ul>
                </div>
                
                <div class=" mb-4 row m-0 shadow-sm rounded-5 p-4">
                    <p class="fs-1 fw-bold mb-0 fst-italic">2. Xây dựng nội dung đào tạo chuyên biệt</p>
                    <ul class="fst-italic fs-4" style="list-style-position: inside;">
                        <li class="my-2">Organic Marketing sẽ tiến hành biên soạn 1 các nội dung đào tạo phù hợp với riêng doanh nghiệp và nhân sự của bạn dựa trên các tiêu chí cụ thể như: “Thời lượng, hình thức học tập, bài tập thực hành,...”</li>
                        <li class="my-2">Song song cùng với đó là những bộ tài liệu và công cụ phần mềm hướng dẫn thực hành.</li>
                    </ul>
                </div>

                <div class=" mb-4 row m-0 shadow-sm rounded-5 p-4">
                    <p class="fs-1 fw-bold mb-0 fst-italic">3. Đồng hành cùng doanh nghiệp dài hạn</p>
                    <ul class="fst-italic fs-4" style="list-style-position: inside;">
                        <li class="my-2">Organic Marketing sẽ liên tục cập nhật những thông tin kiến thức quan trọng cho doanh nghiệp thông qua những khóa học mới, buổi học bổ sung.</li>
                        <li class="my-2">Cùng với đó là cung cấp các giải pháp quản trị chuyên nghiệm và liên tục cập nhật và tối ưu tính năng nhằm mang lại các hệ thống báo cáo và đánh giá chuẩn xác trong công việc thực tế.</li>
                    </ul>
                </div>

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






