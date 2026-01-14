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
    

    
    

    <!-- Search -->
    <div class="container mt-6">
        <form class="d-flex rounded-pill shadow-sm p-3 search-1" role="search">
            <input class="form-control bg-transparent text-center fs-1 fw-bold" type="search" placeholder="Bạn muốn tìm tài liệu nào?" aria-label="Search"/>
            <button class="btn px-0 me-2" type="submit"><i class="fa-solid fa-magnifying-glass fs-2"></i></button>
        </form>
        
    </div>

    

    <!-- Content -->
    <div class="container mt-5">
        <div class="row gx-5">
            <!-- Left main video -->
            <div class="col-lg-9 d-flex flex-column">
                
 
                <div class=" mb-4 row m-0 shadow-sm rounded-5 p-4">
                    <p class="fs-3 fw-bold mb-0 ">Slide bài giảng khóa học Marketing tổng quan.
                        <a class="btn fs-4 fst-italic py-0" href="#" role="button">
                            <img src="/om-front/img/Eyes Cartoon.png" alt="" width="30px" class="me-1 mb-1">
                            Xem thêm
                        </a>
                        <a class="btn fs-4 fst-italic py-0" href="#" role="button">
                            <img src="/om-front/img/Download from the Cloud.png" alt="" width="30px" class="me-1">
                            Tải xuống
                        </a>
                    
                    </p>
                    <a class="btn fs-4 fst-italic text-start py-0" href="#" role="button">#Minh Hieu</a>
                    <p class="fs-4 mb-1">22/10/2025</p>
                    

                    <div class="d-flex justify-content-between ps-0">
                        <div class="d-flex flex-wrap ps-0">
                            <a class="btn fs-4 fst-italic text-start py-0" href="#" role="button">#Phạm Hùng</a>
                            <a class="btn fs-4 fst-italic text-start py-0" href="#" role="button">#Marketing</a>
                            <a class="btn fs-4 fst-italic text-start py-0" href="#" role="button">#Sale</a>
                            <a class="btn fs-4 fst-italic text-start py-0" href="#" role="button">#Bất động sản</a>
                        </div>
                        
                    </div>
                </div>

                <div class=" mb-4 row m-0 shadow-sm rounded-5 p-4">
                    <p class="fs-3 fw-bold mb-0 ">Nguồn cảm hứng đến từ những câu chuyện. Đó là những gì Organic Marketing vẫn đang và sẽ tiếp tục chia sẻ nhiều hơn nữa. <a class="btn fs-4 fst-italic py-0" href="#" role="button">Xem thêm
                            </a></p>
                    <div></div>
                    <a class="btn fs-4 fst-italic text-start py-0" href="#" role="button">#Minh Hieu</a>
                    <p class="fs-4 mb-1">22/10/2025</p>
                    

                    <div class="d-flex justify-content-between ps-0">
                        <div class="d-flex flex-wrap ps-0">
                            <a class="btn fs-4 fst-italic text-start py-0" href="#" role="button">#Phạm Hùng</a>
                            <a class="btn fs-4 fst-italic text-start py-0" href="#" role="button">#Marketing</a>
                            <a class="btn fs-4 fst-italic text-start py-0" href="#" role="button">#Sale</a>
                            <a class="btn fs-4 fst-italic text-start py-0" href="#" role="button">#Bất động sản</a>
                        </div>
                        
                    </div>
                </div>
 
                <div class=" mb-4 row m-0 shadow-sm rounded-5 p-4">
                    <p class="fs-3 fw-bold mb-0 ">Nguồn cảm hứng đến từ những câu chuyện. Đó là những gì Organic Marketing vẫn đang và sẽ tiếp tục chia sẻ nhiều hơn nữa. <a class="btn fs-4 fst-italic py-0" href="#" role="button">Xem thêm
                            </a></p>
                    <a class="btn fs-4 fst-italic text-start py-0" href="#" role="button">#Minh Hieu</a>
                    <p class="fs-4 mb-1">22/10/2025</p>
                    

                    <div class="d-flex justify-content-between ps-0">
                        <div class="d-flex flex-wrap ps-0">
                            <a class="btn fs-4 fst-italic text-start py-0" href="#" role="button">#Phạm Hùng</a>
                            <a class="btn fs-4 fst-italic text-start py-0" href="#" role="button">#Marketing</a>
                            <a class="btn fs-4 fst-italic text-start py-0" href="#" role="button">#Sale</a>
                            <a class="btn fs-4 fst-italic text-start py-0" href="#" role="button">#Bất động sản</a>
                        </div>
                        
                    </div>
                </div>
            </div>

            <!-- Right side small videos -->
            <div class="col-lg-3">
                

                <img src="/om-front/img/441400452_949802063555552_4379178154103149160_n.jpg" alt="" class="rounded-5 shadow-custom w-100 ">
                <img src="/om-front/img/441400452_949802063555552_4379178154103149160_n.jpg" alt="" class="rounded-5 shadow-custom w-100 mt-5">
                

            </div>
        </div>
    </div>



    <!-- Footer -->
    <div class="container">
        <footer class="mt-6 pt-5 border-top border-2 border-custom">
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

    <script src="/om-front/js/custom-option.js"></script>


</body>

</html>






