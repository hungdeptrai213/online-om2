@extends('layouts.auth_clients')

@section('title', 'Đặt lại mật khẩu học viên')

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

            <h2 class="h2-login">Đặt lại mật khẩu</h2>

            @if ($errors->any())
                <div class="alert alert-danger text-start">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('student.password.update') }}" method="post">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="email" name="email" value="{{ old('email', $email) }}" placeholder="Email" autocomplete="email" autofocus />
                <input type="password" name="password" placeholder="Mật khẩu mới" autocomplete="new-password" />
                <input type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu" autocomplete="new-password" />
                <button type="submit">Cập nhật mật khẩu</button>
            </form>

            <div class="login__footer">
                <a href="{{ route('student.login') }}" class="login__footer-register">Quay lại đăng nhập</a>
            </div>
        </div>
    </div>

    <footer class="light-footer">
        <p class="mb-0">Copyright © 2023 by Hienu.vn | Nền tảng học Marketing online hàng đầu</p>
    </footer>
</div>
@endsection
