@extends('student.layouts.app')

@section('style')
    <link rel="stylesheet" href="/om-front/css/custom-option.css">
@endsection

@section('content')
    

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


@endsection
