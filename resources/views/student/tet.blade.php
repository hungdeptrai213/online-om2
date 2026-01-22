@extends('layouts.client')
@section('content')
    {{-- @include('parts.clients.page_title') --}}
    <section class="all-course py-2 checkout-page">
        <div class="container">
            <h2 class="py-2">Thanh toán đơn hàng <a
                    href="{{ route('students.account.order-detail', $id) }}">#{{ $id }}</a>
                @if (config('checkout.checkout_countdown') > 0)
                    <span class="countdown"><span>00</span>:<span>00</span>
                @endif

            </h2>
            <hr>
            <div class="row">
                <div class="col-12 col-md-6 cot-1" style="padding: 10px 20px 10px 10px;">
                    @include('Students::clients.partials.coupon')
                    <table class="table table-carrt">
                        <thead>
                            <tr>
                                <th class="text-center" width="5%">#</th>
                                <th>Khóa học</th>
                                <th width="20%" class="tri">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->detail as $key => $item)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td class="name-course">{{ $item?->course?->name }}
                                        <p class="teacher-name">{{ $item?->course?->teacher?->name }}</p>
                                    </td>
                                    <td width="20%" class="tri">{{ money($item?->course?->price) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2" class="tri fw-600">Tạm tính:</td>
                                <td width="20%" class="tri">{{ money($order->total) }}</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="tri fw-600">Giảm giá:</td>
                                <td width="20%" class="tri discount-value">{{ money($order->discount, freeText: '0') }}</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="tri fw-600">Tổng cộng:<p class="text-fade-vat">(Đã bao gồm VAT)
                                    </p>
                                </td>
                                <td width="20%" class="tri total-value">{{ money($order->total - $order->discount) }}</td>
                            </tr>

                        </tbody>
                    </table>
                   
                </div>
                <div class="col-12 col-md-6" style="padding: 10px;  text-align: right;">
                    <div class="row">
                        <div class="col-12 col-md-8">
                            <h4 class="mb-3">Thông tin thanh toán</h4>
                            <p>Quý khách vui lòng chuyển khoản tới số tài khoản bên dưới hoặc quét mã QR để thực hiện thanh
                                toán. Vui lòng nhập đúng số tiền và nội dung chuyển khoản</p>
                            <hr>
                            <p>- Ngân hàng MB Bank </p>
                            <p>- Số tài khoản: <span>163448866</span> <i class="bank-copy fa-regular fa-copy"></i>
                            </p>
                            <p>- Chủ tài khoản: Phạm Ngọc Hùng</p>
                            <p>- Số tiền: <span class="total-value">{{ money($order->total - $order->discount) }}</span>
                            </p>
                            <p>- Nội dung:
                           

                                <span>{{ preg_replace('/[^a-zA-Z0-9]/', '', preg_replace('/@.*/', '', $student->email)) }}{{ $order->id }}</span> <i
                                    class="bank-copy fa-regular fa-copy"></i>
                            </p>
                            <hr>
                            <p><strong><i style="color:#f7d078;">Lưu ý: Khách hàng không nên thoát trang khi đang thanh toán. <span style="color:#f7d078;">Hệ thống sẽ tự động xác nhận thanh toán cho đơn hàng sau 5s-10s.</span></i></strong></p>
                        </div>
                        <div class="col-12 col-md-4">

                            <div class="text-center">
                                <img class="qr-img" style="width: 230px"
                                    src="https://img.vietqr.io/image/mb-163448866-compact2.jpg?amount={{ $order->total - $order->discount }}&addInfo={{ preg_replace('/[^a-zA-Z0-9]/', '', preg_replace('/@.*/', '', $student->email))}}{{ $order->id }}"alt="">
                                <button class="btn btn-success btn-sm download-qr">Tải QR Code</button>
                            </div>
                        </div>
                    </div>
                    <a href="/khoa-hoc" class="btn btn-primary btn-sm btn-mua-them">Mua khoá học khác</a>
                    <button
                        onclick="checkPaid({{ $order->total - $order->discount }}, '{{ $student->email }}{{ $order->id }}')"
                        class="btn btn-success btn-sm btn-thanh-toan">Xác nhận đã thanh toán</button>
                </div>
            </div>
        </div>
    </section>
    <div id="payment-popup" class="popup">
        <div class="popup-content">
            <h3><strong>Thanh toán thành công!! </strong></h3>
            <p>Hệ thống sẽ tự động chuyển về trang khóa học sau <span id="timer">5</span>s...
            </p>
        </div>
    </div>
    <div id="fail-popup" class="popup">
        <div class="popup-content">
            <h3><strong>Thanh toán thất bại!! </strong></h3>
            <p>Hệ thống chưa ghi nhận được thanh toán đơn hàng...
            </p>
        </div>
    </div>
    <div id="check-popup" class="popup">
        <div class="popup-content">
            <h3><strong>Đang kiểm tra thanh toán... </strong></h3>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var clickb = false;
        var checkBien = false;
        let clickThanhtoan = document.
        querySelector('button.btn.btn-success.btn-sm.btn-thanh-toan');
        clickThanhtoan.onclick = function() {
            document.getElementById("check-popup").style.display = "flex";
            clickb = true;
        }
        let checkpaidd = setInterval(() => {
            checkPaid({{ $order->total - $order->discount }}, "{{ preg_replace('/[^a-zA-Z0-9]/', '', preg_replace('/@.*/', '', $student->email))  }}{{ $order->id }}");

        }, 2000);
        async function checkPaid(price, content) {

            try {
                const response = await fetch(
                    'https://script.google.com/macros/s/AKfycbw7di2IkMECJx2aYSN6lBtAyIX5bU44PeCWc56UBuDdNoiIbRvlgauTZWLm4AX2VpBYmA/exec'
                );
                const data = await response.json();
                //  console.log(data);
                data.data.forEach(item => {
                    
                    // const lastPaid = data.data[data.data.length - 1];
                    lastPrice = item["Giá trị"];
                    lastContent = item["Mô tả"];
                    // console.log(lastContent.includes(content));
                    if (lastPrice >= price && lastContent.toLowerCase().includes(content.toLowerCase())) {
                        // console.log("Thanh toán thành công");
                        checkBien = true;
                        clearInterval(checkpaidd); // Dừng interval
                        document.getElementById("check-popup").style.display = "none"; // Ẩn popup

                        document.getElementById("payment-popup").style.display = "flex"; // Hiện popup
                        let timeLeft = 2; // Số giây đếm ngược
                        let countdownElement = document.getElementById("timer");

                        let countdownInterval = setInterval(() => {
                            timeLeft--; // Giảm thời gian còn lại
                            countdownElement.textContent = timeLeft; // Cập nhật giao diện

                            if (timeLeft <= 0) { // Khi đếm ngược về 0

                                async function fetchData() {

                                    try {

                                        addToCart({{ $order->id }});
                                        window.location.reload();
                                        let response2 = await fetch(
                                            "/tai-khoan/thanh-toan-thanh-cong");

                                    } catch (error) {
                                        console.error("Lỗi khi gọi API:", error);
                                    }
                                }

                                fetchData();
                                clearInterval(countdownInterval); // Dừng bộ đếm

                                window.location.href =
                                "/khoa-hoc"; // Chuyển hướng đến trang khóa học
                            }
                        }, 1000); // Cập nhật mỗi giây
                    }


                });

                if (!checkBien) {

                    if (clickb) {

                        document.getElementById("check-popup").style.display = "none"; // Ẩn popup
                        document.getElementById("fail-popup").style.display = "flex";
                        let timeLeft2 = 3; // Số giây đếm ngược
                        let countdownElement2 = document.getElementById("timer");

                        let countdownInterval2 = setInterval(() => {
                            timeLeft2--; // Giảm thời gian còn lại
                            countdownElement2.textContent = timeLeft2; // Cập nhật giao diện


                            if (timeLeft2 <= 0) { // Khi đếm ngược về 0
                                clearInterval(countdownInterval2); // Dừng bộ đếm

                                location.reload();
                            } else {
                                return false;
                            }

                        }, 1000);
                    } else {
                        return false;
                    }
                }

            } catch {
                console.error("Lỗi");
            }
        }


        function addToCart(param) {

            let cartFlash = JSON.parse(getCookie('cartFlash')) || []; // Lấy giỏ hàng từ cookie (nếu có)

            if (!cartFlash.includes(param)) {
                cartFlash.push(param);
            }

            setCookie('cartFlash', JSON.stringify(cartFlash), 1); // Lưu cookie trong 1 ngày
            //    alert(JSON.stringify(cartFlash));
        }

        // Hàm đặt cookie
        function setCookie(name, value, days) {
            let expires = "";
            if (days) {
                let date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + value + "; path=/" + expires;
        }

        // Hàm lấy cookie
        function getCookie(name) {
            let nameEQ = name + "=";
            let ca = document.cookie.split(';');
            for (let i = 0; i < ca.length; i++) {
                let c = ca[i].trim();
                if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }
    </script>
@endsection
