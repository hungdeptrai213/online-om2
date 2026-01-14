@extends('layouts.admin')

@section('title', 'Sửa tài khoản Admin')

@section('content')
    <div style="display:flex;justify-content:center;">
        <div class="page-card" style="max-width:540px;width:100%;">
            <h2 style="margin:0 0 16px;">Sửa tài khoản Admin</h2>
            <form action="{{ route('admin.users.update', $user) }}" method="post">
                @method('put')
                @include('admin.users.form', ['buttonText' => 'Cập nhật', 'user' => $user])
            </form>
        </div>
    </div>
@endsection
