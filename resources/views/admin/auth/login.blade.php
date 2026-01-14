@extends('layouts.auth_clients')

@section('title', 'Đăng nhập Admin')

@section('content')
<style>
    .admin-login-card {
        max-width: 500px;
        margin: 40px auto;
        padding: 32px;
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.08);
    }
    .admin-login-card h2 {
        font-size: 26px;
        margin-bottom: 18px;
        text-align: center;
    }
</style>

<div class="container">
    <div class="admin-login-card">
        <div style="text-align:center; margin-bottom:18px;">
            <a href="{{ route('student.home') }}">
                <img src="{{ asset('om-front/img/Logo Organic Marketing (3).png') }}" alt="Logo" style="height:64px;">
            </a>
        </div>
        <h2>Đăng nhập Admin</h2>

        @if (session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="post">
            @csrf
            <div class="form-group" style="margin-bottom:12px;">
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email admin" style="width:100%; padding:12px 14px; border-radius:8px; border:1px solid #e3e3e3;">
            </div>
            <div class="form-group" style="margin-bottom:12px;">
                <input type="password" name="password" placeholder="Mật khẩu" style="width:100%; padding:12px 14px; border-radius:8px; border:1px solid #e3e3e3;">
            </div>
            <div class="form-group" style="display:flex; align-items:center; gap:8px; margin-bottom:16px;">
                <input type="checkbox" name="remember" value="1" id="admin-remember">
                <label for="admin-remember" style="margin:0;">Ghi nhớ đăng nhập</label>
            </div>
            <button type="submit" style="width:100%; padding:12px; border-radius:8px; background:#000; color:#fff; border:none;">Đăng nhập</button>
        </form>
    </div>
</div>
@endsection
