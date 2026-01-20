@extends('student.layouts.app')

@section('style')
    <link rel="stylesheet" href="/om-front/css/custom-option.css">
@endsection

@section('content')
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
                                <td><img width="180px" src="/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg"
                                        alt="" class="my-4 rounded-4 shadow-sm"></td>
                                <td>590.000 VNĐ <button
                                        class="btn btn-warning fs-4 rounded-4 fw-bold px-4 shadow-sm mt-3 d-sm-block d-md-none mx-auto"
                                        href="#" role="button">Xóa</button></td>
                                <td><button
                                        class="btn btn-warning fs-4 rounded-4 fw-bold px-4 shadow-sm d-sm-none d-md-block"
                                        href="#" role="button">Xóa</button></td>
                            </tr>
                            <tr>
                                <th scope="row">2.</th>
                                <td><img width="180px" src="/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg"
                                        alt="" class="my-4 rounded-4 shadow-sm"></td>
                                <td>590.000 VNĐ <button
                                        class="btn btn-warning fs-4 rounded-4 fw-bold px-4 shadow-sm mt-3 d-sm-block d-md-none mx-auto"
                                        href="#" role="button">Xóa</button></td>
                                <td><button
                                        class="btn btn-warning fs-4 rounded-4 fw-bold px-4 shadow-sm d-sm-none d-md-block"
                                        href="#" role="button">Xóa</button></td>
                            </tr>
                            <tr>
                                <th scope="row">3.</th>
                                <td><img width="180px" src="/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg"
                                        alt="" class="my-4 rounded-4 shadow-sm"></td>
                                <td>590.000 VNĐ <button
                                        class="btn btn-warning fs-4 rounded-4 fw-bold px-4 shadow-sm mt-3 d-sm-block d-md-none mx-auto"
                                        href="#" role="button">Xóa</button></td>
                                <td><button
                                        class="btn btn-warning fs-4 rounded-4 fw-bold px-4 shadow-sm d-sm-none d-md-block"
                                        href="#" role="button">Xóa</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            <!-- Right -->
            <div class="col-lg-3 d-flex flex-column mb-6">
                <p class="fs-1 mb-3 fw-bold text-center"># Thanh toán</p>
                <div
                    class="custom-bg-5 p-sm-3 p-md-4  p-lg-4 py-lg-5 d-flex justify-content-center flex-column rounded-5 shadow">
                    <p class="text-center fs-3 fw-bold">Tổng cộng</p>
                    <p class="text-center fs-3 fw-bold mb-0">500.000 VND</p>
                    <p class="text-center fs-4 fst-italic">(3 khóa học)</p>
                    <a class="btn btn-primary fs-3 rounded-4 fw-bold mt-auto mb-4 d-sm-block d-md-none d-lg-block"
                        href="#" role="button">Tiến hành thanh toán</a>
                    <a class="btn btn-primary fs-3 rounded-4 fw-bold mt-auto mb-4 mx-auto d-sm-none d-md-block d-lg-none"
                        href="#" role="button">Tiến hành thanh toán</a>
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
                    <p class="text-center fs-5 mb-0 fst-italic">Nếu sau 15 phút bạn vẫn chưa nhận được khóa học vui lòng
                        liên hệ hỗ trợ</p>
                </div>
            </div>
        </div>
    </div>
@endsection
