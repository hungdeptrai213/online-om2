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
            <a class="navbar-brand py-0" href="<?php echo e(route('student.home')); ?>">
    
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
        <a class="<?php echo \Illuminate\Support\Arr::toCssClasses(['nav-link', 'fs-3', 'me-xl-4', 'mon-alt', 'active' => request()->routeIs('student.home')]); ?>" href="<?php echo e(route('student.home')); ?>">Khóa Học</a>
    </li>
    <li class="nav-item">
        <a class="<?php echo \Illuminate\Support\Arr::toCssClasses(['nav-link', 'fs-3', 'me-xl-4', 'mon-alt', 'active' => request()->routeIs('student.coaching')]); ?>" href="<?php echo e(route('student.coaching')); ?>">Coaching</a>
    </li>
    <li class="nav-item">
        <a class="<?php echo \Illuminate\Support\Arr::toCssClasses(['nav-link', 'fs-3', 'me-xl-4', 'mon-alt', 'active' => request()->routeIs('student.schedule')]); ?>" href="<?php echo e(route('student.schedule')); ?>">Lịch Học</a>
    </li>
    <li class="nav-item">
        <a class="<?php echo \Illuminate\Support\Arr::toCssClasses(['nav-link', 'fs-3', 'me-xl-4', 'mon-alt', 'active' => request()->routeIs('student.enterprise')]); ?>" href="<?php echo e(route('student.enterprise')); ?>">Gói Doanh Nghiệp</a>
    </li>
    <li class="nav-item">
        <a class="<?php echo \Illuminate\Support\Arr::toCssClasses(['nav-link', 'fs-3', 'me-xl-4', 'mon-alt', 'active' => request()->routeIs('student.materials')]); ?>" href="<?php echo e(route('student.materials')); ?>">Tài Liệu</a>
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
    


    

    <!-- Lo trinh hoc coaching -->
    <div class="container mt-6 overflow-hidden">
        
        <div class="d-flex flex-nowrap w-100">
            <div class="flex-grow-1 d-sm-none d-lg-block grey-bg me-5"> </div>
            <div class="fs-custom-3 text-center fw-bold d-flex align-items-center justify-content-center mx-auto">
                Lộ trình học Coaching
            </div>
            <div class="flex-grow-1 d-sm-none d-lg-block grey-bg ms-5" > </div>
        </div>

        <div class="row mt-6 justify-content-center">
            <div class="col-sm-12 col-lg-4 mb-4">
                <div class="shadow-sm rounded-5 py-4 px-5 height-100">
                    <span class="fs-custom-3 fw-bold">1. </span>
                    <span class="fs-1 fw-bold fst-italic"> Học viên đăng ký form</span>
                    <p class="fs-3 fst-italic">Hãy cho chúng tôi biết thông tin liên hệ và  mục tiêu hoặc nội dung bạn muốn được đào tạo.</p>
                </div>
            </div>

            <div class="col-sm-12 col-lg-4 mb-4">
                <div class="shadow-sm rounded-5 py-4 px-5 height-100">
                    <span class="fs-custom-3 fw-bold">2. </span>
                    <span class="fs-1 fw-bold fst-italic"> Buổi tư vấn 30 phút miễn phí</span>
                    <p class="fs-3 fst-italic mb-0">Hãy chú ý điện thoại, sau khi đăng ký bạn sẽ nhận được 1 buổi tư vấn miễn phí với những nội dung sau:</p>
                    <ul class="fst-italic fs-3">
                        <li>Đánh giá năng lực hiện tại</li>
                        <li>Giải đáp thắc mắc của học viên</li>
                        <li>Sắp xếp lịch học với chuyên gia</li>
                        <li>Xây dựng lộ trình và báo giá Coaching</li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-12 col-lg-4 mb-4">
                <div class="shadow-sm rounded-5 py-4 px-5 height-100">
                    <span class="fs-custom-3 fw-bold">3. </span>
                    <span class="fs-1 fw-bold fst-italic"> Bắt đầu Coaching 1:1</span>
                    <p class="fs-3 fst-italic mb-0">Hãy chú ý điện thoại, sau khi đăng ký bạn sẽ nhận được 1 buổi tư vấn miễn phí với những nội dung sau:</p>
                    <ul class="fst-italic fs-3">
                        <li>Cung cấp các tài liệu hỗ trợ học tập liên quan.</li>
                        <li>Liên tục nhắc nhở học viên bám sát lộ trình.</li>
                        <li>Đánh giá và cải thiện liên tục.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="d-flex justify-content-center">
        <i class="bi bi-arrow-down text-center mt-5 fs-custom-2 shadow-sm px-3 pt-5 rounded-5 text-black-50 btn scroll-btn"></i>
    </div>

    
    <!-- Loi ich hoc vien -->
    <div class="container mt-6 overflow-hidden">
        <div class="d-flex flex-nowrap w-100">
            <div class="flex-grow-1 d-sm-none d-lg-block grey-bg me-5"> </div>
            <div class="fs-custom-3 text-center fw-bold d-flex align-items-center justify-content-center mx-auto">
                Lợi ích học viên
            </div>
            <div class="flex-grow-1 d-sm-none d-lg-block grey-bg ms-5" > </div>
        </div>

        <div class="row mt-6 justify-content-center">
            <div class="col-sm-12 col-lg-4 col-xl-3 mb-4">
                <div class="shadow-sm rounded-5 p-sm-4 p-sm-3 p-md-4 p-lg-5 height-100">
                    <p class="fs-2 fw-bold fst-italic">1. Lộ trình học cá nhân hóa 100%</p>
                    <ul class="fst-italic fs-3">
                        <li>Mỗi học viên có một kế hoạch học riêng, được thiết kế dựa trên mục tiêu, kinh nghiệm và ngành nghề của bạn.</li>
                        <li>Không học dàn trải — chỉ tập trung vào những kỹ năng thực sự cần thiết để đạt kết quả nhanh nhất.</li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-12 col-lg-4 col-xl-3 mb-4">
                <div class="shadow-sm rounded-5 p-sm-4 p-md-4 p-lg-5 height-100">
                    <p class="fs-2 fw-bold fst-italic">2. Học 1:1 trực tiếp cùng chuyên gia thực chiến</p>
                    <ul class="fst-italic fs-3">
                        <li>Làm việc 1:1 với coach, người đã có kinh nghiệm thực tế trong Marketing & Sales.</li>
                        <li>Được hướng dẫn cụ thể từng bước, giải đáp mọi thắc mắc, hỗ trợ xuyên suốt hành trình học.</li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-12 col-lg-4 col-xl-3 mb-4">
                <div class="shadow-sm rounded-5 p-sm-4 p-md-4 p-lg-5 height-100">
                    <p class="fs-2 fw-bold fst-italic">3. Học đi đôi với thực hành</p>
                    <ul class="fst-italic fs-3">
                        <li>Không chỉ học lý thuyết, bạn sẽ ứng dụng ngay vào công việc thực tế hoặc dự án riêng của mình.</li>
                        <li>Sau mỗi buổi học đều có bài tập thực hành, phản hồi và chỉnh sửa chi tiết từ coach.</li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-12 col-lg-4 col-xl-3 mb-4">
                <div class="shadow-sm rounded-5 p-sm-4 p-md-4 p-lg-5 height-100">
                    <p class="fs-2 fw-bold fst-italic">4. Phát triển kỹ năng tư duy & chiến lược</p>
                    <ul class="fst-italic fs-3">
                        <li>Học viên được rèn luyện khả năng phân tích thị trường, xây dựng chiến lược marketing, thiết lập quy trình bán hàng hiệu quả.</li>
                        <li>Hiểu sâu cách vận hành toàn bộ hệ thống marketing - sales trong doanh nghiệp.</li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-12 col-lg-4 col-xl-3 mb-4">
                <div class="shadow-sm rounded-5 p-sm-4 p-md-4 p-lg-5 height-100">
                    <p class="fs-2 fw-bold fst-italic">5. Tăng cơ hội nghề nghiệp & thu nhập</p>
                    <ul class="fst-italic fs-3">
                        <li>Tự tin ứng tuyển vị trí marketing/sales chuyên nghiệp</li>
                        <li>Phát triển dự án cá nhân hoặc startup riêng</li>
                        <li>Gia tăng doanh số nếu đang làm kinh doanh</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-sm-12 col-lg-4 col-xl-3 mb-4">
                <div class="shadow-sm rounded-5 p-sm-4 p-md-4 p-lg-5 height-100">
                    <p class="fs-2 fw-bold fst-italic">6. Hỗ trợ & mentoring lâu dài</p>
                    <ul class="fst-italic fs-3">
                        <li>Ngay cả sau khi kết thúc coaching, học viên vẫn được duy trì kết nối với mentor để hỏi đáp, cập nhật kiến thức mới.</li>
                        <li>Tham gia cộng đồng học viên & chuyên gia, nơi chia sẻ cơ hội việc làm, dự án và network chất lượng.</li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-12 col-lg-4 col-xl-3 mb-4">
                <div class="shadow-sm rounded-5 p-sm-4 p-md-4 p-lg-5 height-100">
                    <p class="fs-2 fw-bold fst-italic">7. Phương pháp học linh hoạt, dễ theo</p>
                    <ul class="fst-italic fs-3">
                        <li>Lịch học tùy chọn theo thời gian cá nhân (buổi tối, cuối tuần...).</li>
                        <li>Có thể học trực tuyến 1:1 qua Zoom hoặc trực tiếp (nếu ở cùng khu vực).</li>
                        <li>Tài liệu học & ghi hình buổi học được lưu trữ đầy đủ để xem lại.</li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-12 col-lg-4 col-xl-3 mb-4">
                <div class="shadow-sm rounded-5 p-sm-4 p-md-4 p-lg-5 height-100">
                    <p class="fs-2 fw-bold fst-italic">8. Cam kết kết quả rõ ràng</p>
                    <ul class="fst-italic fs-3">
                        <li>Mỗi học viên đều có mục tiêu đo lường được ngay từ đầu (ví dụ: tăng doanh số, xây dựng chiến dịch, tối ưu funnel...).</li>
                        <li>Coach đồng hành đến khi học viên đạt kết quả mong muốn.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <i class="bi bi-arrow-down text-center mt-5 fs-custom-2 shadow-sm px-3 pt-5 rounded-5 text-black-50 btn scroll-btn"></i>
    </div>

    <!-- Cam nhan hoc vien -->
    <div class="container mt-6 overflow-hidden">
        <div class="row gx-5 justify-content-between d-none">
            <div class="col-lg-4 d-sm-none d-lg-block grey-bg" ></div>
            <div class="col-sm-12 col-lg-4 fs-custom-3 text-center fw-bold d-flex align-items-center justify-content-center">
                Cảm nhận học viên
            </div>
            <div class="col-lg-4 d-sm-none d-lg-block grey-bg" ></div>
        </div>
        <div class="d-flex flex-nowrap w-100">
            <div class="flex-grow-1 d-sm-none d-lg-block grey-bg me-5"> </div>
            <div class="fs-custom-3 text-center fw-bold d-flex align-items-center justify-content-center mx-auto">
                Cảm nhận học viên
            </div>
            <div class="flex-grow-1 d-sm-none d-lg-block grey-bg ms-5" > </div>
        </div>
        

        <div class="row mt-6 justify-content-center">
            <div class="col-sm-12 col-lg-4 mb-4">
                <div class="shadow-sm rounded-5 p-sm-2 pt-sm-4 p-md-4 p-xl-5 d-flex flex-wrap">
                    <div class="col-sm-12 col-lg-3 col-xxl-2 ps-0 pe-3">
                        <img class="rounded-circle w-100 d-none d-lg-block" src="/om-front/img/youtube-icon.png" alt="" width="" height="">
                        <div class="d-flex justify-content-center mb-md-2 mb-lg-4 d-block d-lg-none">
                            <img class="rounded-circle" src="/om-front/img/youtube-icon.png" alt="" width="90px" height="90px">
                        </div>
                        
                    </div>
                    <div class="col-sm-12 col-lg-9 col-xxl-10">
                        <p class="fs-2 fw-bold fst-italic mb-0">Minh Hiếu</p>
                        <p class="fs-3 fst-italic">Founder Organic Marketing & Hienu</p>
                        <div>
                            <span class="material-symbols-outlined fs-3" style="font-variation-settings:'FILL' 1">
                                favorite
                            </span>
                            <span class="material-symbols-outlined fs-3" style="font-variation-settings:'FILL' 1">
                                favorite
                            </span>
                            <span class="material-symbols-outlined fs-3" style="font-variation-settings:'FILL' 1">
                                favorite
                            </span>
                            <span class="material-symbols-outlined fs-3" style="font-variation-settings:'FILL' 1">
                                favorite
                            </span>
                            <span class="material-symbols-outlined fs-3" style="font-variation-settings:'FILL' 1">
                                favorite
                            </span>
                        </div>
                        <p class="fs-3 fst-italic mt-3">
                        Trong khóa học Xây Dựng Thương hiệu cá nhân này mình sẽ cho các bạn 1 bức tranh. 1 cách tư duy tổng thể và logic về chiến lược thương hiệu cá nhân. Từ đó định hình ra được phong cách và chiến lược cần phải đi cho mỗi người.</p>
                    </div>
                    
                </div>
            </div>

            <div class="col-sm-12 col-lg-4 mb-4">
                <div class="shadow-sm rounded-5 p-sm-2 pt-sm-4 p-md-4 p-xl-5 d-flex flex-wrap">
                    <div class="col-sm-12 col-lg-3 col-xxl-2 ps-0 pe-3">
                        <img class="rounded-circle w-100 d-none d-lg-block" src="/om-front/img/youtube-icon.png" alt="" width="" height="">
                        <div class="d-flex justify-content-center mb-md-2 mb-lg-4 d-block d-lg-none">
                            <img class="rounded-circle" src="/om-front/img/youtube-icon.png" alt="" width="90px" height="90px">
                        </div>
                        
                    </div>
                    <div class="col-sm-12 col-lg-9 col-xxl-10">
                        <p class="fs-2 fw-bold fst-italic mb-0">Minh Hiếu</p>
                        <p class="fs-3 fst-italic">Founder Organic Marketing & Hienu</p>
                        <div>
                            <span class="material-symbols-outlined fs-3" style="font-variation-settings:'FILL' 1">
                                favorite
                            </span>
                            <span class="material-symbols-outlined fs-3" style="font-variation-settings:'FILL' 1">
                                favorite
                            </span>
                            <span class="material-symbols-outlined fs-3" style="font-variation-settings:'FILL' 1">
                                favorite
                            </span>
                            <span class="material-symbols-outlined fs-3" style="font-variation-settings:'FILL' 1">
                                favorite
                            </span>
                            <span class="material-symbols-outlined fs-3" style="font-variation-settings:'FILL' 1">
                                favorite
                            </span>
                        </div>
                        <p class="fs-3 fst-italic mt-3">
                        Trong khóa học Xây Dựng Thương hiệu cá nhân này mình sẽ cho các bạn 1 bức tranh. 1 cách tư duy tổng thể và logic về chiến lược thương hiệu cá nhân. Từ đó định hình ra được phong cách và chiến lược cần phải đi cho mỗi người.</p>
                    </div>
                    
                </div>
            </div>

            <div class="col-sm-12 col-lg-4 mb-4">
                <div class="shadow-sm rounded-5 p-sm-2 pt-sm-4 p-md-4 p-xl-5 d-flex flex-wrap">
                    <div class="col-sm-12 col-lg-3 col-xxl-2 ps-0 pe-3">
                        <img class="rounded-circle w-100 d-none d-lg-block" src="/om-front/img/youtube-icon.png" alt="" width="" height="">
                        <div class="d-flex justify-content-center mb-md-2 mb-lg-4 d-block d-lg-none">
                            <img class="rounded-circle" src="/om-front/img/youtube-icon.png" alt="" width="90px" height="90px">
                        </div>
                        
                    </div>
                    <div class="col-sm-12 col-lg-9 col-xxl-10">
                        <p class="fs-2 fw-bold fst-italic mb-0">Minh Hiếu</p>
                        <p class="fs-3 fst-italic">Founder Organic Marketing & Hienu</p>
                        <div>
                            <span class="material-symbols-outlined fs-3" style="font-variation-settings:'FILL' 1">
                                favorite
                            </span>
                            <span class="material-symbols-outlined fs-3" style="font-variation-settings:'FILL' 1">
                                favorite
                            </span>
                            <span class="material-symbols-outlined fs-3" style="font-variation-settings:'FILL' 1">
                                favorite
                            </span>
                            <span class="material-symbols-outlined fs-3" style="font-variation-settings:'FILL' 1">
                                favorite
                            </span>
                            <span class="material-symbols-outlined fs-3" style="font-variation-settings:'FILL' 1">
                                favorite
                            </span>
                        </div>
                        <p class="fs-3 fst-italic mt-3">
                        Trong khóa học Xây Dựng Thương hiệu cá nhân này mình sẽ cho các bạn 1 bức tranh. 1 cách tư duy tổng thể và logic về chiến lược thương hiệu cá nhân. Từ đó định hình ra được phong cách và chiến lược cần phải đi cho mỗi người.</p>
                    </div>
                    
                </div>
            </div>

            <div class="col-sm-12 col-lg-4 mb-4 d-none">
                <div class="shadow-sm rounded-5 p-5 height-100 d-flex">
                    <div class="col-2">
                        <img class="rounded-circle me-3" src="/om-front/img/youtube-icon.png" alt="" width="80" height="80">
                    </div>
                    <div class="col-10">
                        <p class="fs-2 fw-bold fst-italic mb-0">Minh Hiếu</p>
                        <p class="fs-3 fst-italic">Founder Organic Marketing & Hienu</p>
                        <div>
                            <span class="material-symbols-outlined fs-3" style="font-variation-settings:'FILL' 1">
                                favorite
                            </span>
                            <span class="material-symbols-outlined fs-3" style="font-variation-settings:'FILL' 1">
                                favorite
                            </span>
                            <span class="material-symbols-outlined fs-3" style="font-variation-settings:'FILL' 1">
                                favorite
                            </span>
                            <span class="material-symbols-outlined fs-3" style="font-variation-settings:'FILL' 1">
                                favorite
                            </span>
                            <span class="material-symbols-outlined fs-3" style="font-variation-settings:'FILL' 1">
                                favorite
                            </span>
                        </div>
                        <p class="fs-3 fst-italic mt-3">
                        Trong khóa học Xây Dựng Thương hiệu cá nhân này mình sẽ cho các bạn 1 bức tranh. 1 cách tư duy tổng thể và logic về chiến lược thương hiệu cá nhân. Từ đó định hình ra được phong cách và chiến lược cần phải đi cho mỗi người.</p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <i class="bi bi-arrow-down text-center mt-5 fs-custom-2 shadow-sm px-3 pt-5 rounded-5 text-black-50 btn scroll-btn"></i>
    </div>

    <!-- Bang gia coaching -->
    <div class="container mt-6 overflow-hidden">
       <div class="d-flex flex-nowrap w-100">
            <div class="flex-grow-1 d-sm-none d-lg-block grey-bg me-5"> </div>
            <div class="fs-custom-3 text-center fw-bold d-flex align-items-center justify-content-center mx-auto">
                Lộ trình học Coaching
            </div>
            <div class="flex-grow-1 d-sm-none d-lg-block grey-bg ms-5" > </div>
        </div>

        <div class="row mt-6 justify-content-center">
            <div class="col-sm-12 col-lg-4 mb-4">
                <div class="shadow-sm rounded-5 p-5 height-100 d-flex flex-column">
                    <p class="fs-1 fw-bold">Chương trình Coaching Buổi Lẻ Marketing & Sales 1:1</p>
                    <p class="fs-4 fst-italic mt-5">Mỗi buổi coaching kéo dài 60–90 phút, học viên sẽ được:</p>
                    <ul class="fst-italic fs-4">
                        <li>Làm việc trực tiếp 1:1 với chuyên gia,</li>
                        <li>Giải quyết (hỏi đáp) một vấn đề cụ thể đang gặp phải trong công việc hoặc dự án.</li>
                        <li>Nhận hướng dẫn – phản hồi – kế hoạch hành động chi tiết sau buổi học.</li>
                    </ul>
                    <p class="fs-4 fst-italic mt-5">Mỗi buổi coaching kéo dài 60–90 phút, học viên sẽ được:</p>
                    <ul class="fst-italic fs-4">
                        <li>Làm việc trực tiếp 1:1 với chuyên gia,</li>
                        <li>Giải quyết (hỏi đáp) một vấn đề cụ thể đang gặp phải trong công việc hoặc dự án.</li>
                        <li>Nhận hướng dẫn – phản hồi – kế hoạch hành động chi tiết sau buổi học.</li>
                    </ul>
                    <p class="fs-4 fw-bold fst-italic mt-5">Chi phí: 500.000 VNĐ / buổi</p>
                </div>
            </div>

            <div class="col-sm-12 col-lg-4 mb-4">
                <div class="shadow-sm rounded-5 p-5 height-100 d-flex flex-column">
                    <p class="fs-1 fw-bold">Chương Trình Coaching Marketing & Sales Theo Lộ Trình Cá Nhân Hóa</p>
                    <p class="fs-4 fst-italic">Cấu trúc lộ trình học tùy vào mục tiêu của học viên. Mỗi học viên được thiết kế lộ trình học riêng, phù hợp với mục tiêu nghề nghiệp, năng lực hiện tại và lĩnh vực đang hoạt động.</p>
                    <p class="fs-4 fst-italic mt-5">Thời gian và hình thức học tương tự buổi lẻ. Học viên sẽ được:</p>
                    <ul class="fst-italic fs-4">
                        <li>Giúp học viên hiểu bản chất Marketing & Sales thay vì chỉ học mẹo.</li>
                        <li>Xây dựng tư duy chiến lược và kỹ năng triển khai thực tế.</li>
                        <li>Có thể vận hành chiến dịch Marketing hoặc quy trình bán hàng hoàn chỉnh sau khi hoàn thành chương trình.</li>
                    </ul>
                    
                    <p class="fs-4 fw-bold fst-italic mt-auto">Chi phí: 350.000 VNĐ / buổi</p>
                </div>
            </div>

        </div>
    </div>

    <div class="d-flex justify-content-center">
        <i class="bi bi-arrow-down text-center mt-5 fs-custom-2 shadow-sm px-3 pt-5 rounded-5 text-black-50 btn scroll-btn"></i>
    </div>

    <!-- Bat dau thoi nao -->
    <div class="container mt-6 overflow-hidden">
        
        <div class="d-flex flex-nowrap w-100">
            <div class="flex-grow-1 d-sm-none d-lg-block grey-bg me-5"> </div>
            <div class="fs-custom-3 text-center fw-bold d-flex align-items-center justify-content-center mx-auto">
                Bắt đầu thôi nào!
            </div>
            <div class="flex-grow-1 d-sm-none d-lg-block grey-bg ms-5" > </div>
        </div>
    
            <div class="row justify-content-center mt-6">
                <div class="col-lg-6 mb-5">
                    <div class="custom-bg-4 p-5 d-flex justify-content-center flex-column rounded-5 form-2-container shadow-sm">
                        <p class="text-center fs-1 fw-bold">Đăng ký khóa học<br class="d-none d-md-block"> Coaching 1 kèm 1</p>
                        <div class="shadow-sm rounded-pill d-flex justify-content-center p-1 ms-auto me-auto">
                            <a class="btn btn-primary me-2 p-1 px-3 fs-4 fw-bold rounded-4 rounded-pill" href="#" role="button">Buổi lẻ</a>
                            <a class="btn p-1 px-3 fs-4 fw-bold rounded-4" href="#" role="button">Lộ trình</a>
                        </div>
                        <p class="text-center fs-2 fw-bolder mt-4">Thông tin của bạn</p>
                        <form class="form-2 ms-auto me-auto">
                            <div class="mb-3">
                                <input type="" class="form-control p-2 shadow-sm rounded-4 fs-4 ps-3"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên của bạn">
                            </div>
                            
                            <div class="mb-3">
                                <input type="email" class="form-control p-2 shadow-sm rounded-4 fs-4 ps-3"
                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                    placeholder="Số điện thoại của bạn">
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control p-2 shadow-sm rounded-4 fs-4 ps-3"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Gmail">
                            </div>
                            
                            <div class="mb-3">
                                <textarea placeholder="Nội dụng bạn muốn đào tạo"
                                    class="w-100 p-2 bg-transparent border-0 shadow-sm rounded-4 fs-4 ps-3 "></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 fw-bold rounded-4 fs-4">Đăng ký Coaching</button>
                        </form>
    
                        <p class="text-center fs-5 mt-4 fst-italic">SDT | Zalo - 082.688.6868 - Minh Hiếu</p>
                    </div>
                </div>
            </div>
        

    <div class="container mt-6">
        

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









<?php /**PATH C:\xampp\htdocs\online-om\resources\views\student\coaching.blade.php ENDPATH**/ ?>