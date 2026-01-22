@extends('layouts.auth_clients')

@section('title', 'Đăng ký học viên')

@section('content')
@include('student.auth.styles')

<div class="login-wrapper">
    <div class="home-back">
        <a href="{{ route('student.home') }}">
            <span><i class="fa-solid fa-arrow-left"></i></span>
            Về trang chủ
        </a>
    </div>

    <div class="container contain-login">
        <div class="sign-in">
            <a href="{{ route('student.home') }}">
                <img src="{{ asset('om-front/img/Logo Organic Marketing (3).png') }}" alt="Organic Marketing" class="logo-login">
            </a>

            <h2 class="h2-login">Đăng ký tài khoản</h2>

            <div class="login__container-hoac"><span>Điền thông tin</span></div>

            @if ($errors->any())
                <div class="alert alert-danger text-start">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('student.register.submit') }}" method="post">
                @csrf
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Họ và tên" autocomplete="name" autofocus />
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" autocomplete="email" />
                <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Số điện thoại (tuỳ chọn)" autocomplete="tel" />
                <input type="password" name="password" placeholder="Mật khẩu" autocomplete="new-password" />
                <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu" autocomplete="new-password" />

                <button type="submit">Tạo tài khoản</button>
            </form>

            <div class="login__footer">
                <span class="login__footer-span">Đã có tài khoản?</span>
                <a href="{{ route('student.login') }}" class="login__footer-register">Đăng nhập</a>
            </div>
        </div>
    </div>

    <footer class="light-footer">
        <p class="mb-0">Copyright © 2023 by Hienu.vn | Nền tảng học Marketing online hàng đầu</p>
    </footer>
</div>
@endsection
