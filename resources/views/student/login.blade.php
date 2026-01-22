@extends('layouts.auth_clients')

@section('title', 'Đăng nhập học viên')

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

            @if (session('msg'))
                <div class="alert alert-success mb-2">{{ session('msg') }}</div>
            @endif
            @if (session('status'))
                <div class="alert alert-success mb-2">{{ session('status') }}</div>
            @endif

            <h2 class="h2-login">Đăng nhập Hienu</h2>

            <div class="login__container-method">
                <a href="{{ url('/auth/google') }}" class="login__container-item">
                    <i class="fab fa-google login__container-icon-link"></i>
                    <span class="login__container-text">Đăng nhập với Google</span>
                </a>
                <a style="display:none;" href="{{ url('/auth/facebook') }}" class="login__container-item">
                    <i class="fab fa-facebook-square login__container-icon-link"></i>
                    <span class="login__container-text">Đăng nhập với Facebook</span>
                </a>
            </div>

            <div class="login__container-hoac"><span>HOẶC</span></div>

            <form action="{{ route('student.login.submit') }}" method="post">
                @csrf
                <input type="text" name="email" value="{{ old('email') }}" placeholder="Email/Username" autocomplete="username" autofocus />
                @error('email')
                    <span class="text-start text-danger mb-3 d-block">{{ $message }}</span>
                @enderror

                <input type="password" name="password" placeholder="Mật khẩu" autocomplete="current-password" />
                @error('password')
                    <span class="text-start text-danger mb-3 d-block">{{ $message }}</span>
                @enderror

                <p class="forgot-password">
                    <a href="{{ route('student.password.request') }}">Quên mật khẩu</a>
                </p>
                <div class="remember">
                    <input type="checkbox" name="remember" value="1" id="remember-student">
                    <label for="remember-student" style="margin:0;">Ghi nhớ đăng nhập</label>
                </div>
                <button type="submit">Đăng nhập</button>
            </form>

            <div class="login__footer">
                <span class="login__footer-span">Bạn chưa có tài khoản?</span>
                <a href="{{ route('student.register') }}" class="login__footer-register">Đăng ký ngay</a>
            </div>
        </div>
    </div>

    <footer class="light-footer">
        <p class="mb-0">Copyright © 2023 by Hienu.vn | Nền tảng học Marketing online hàng đầu</p>
    </footer>
</div>
@endsection

