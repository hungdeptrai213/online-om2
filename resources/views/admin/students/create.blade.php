@extends('layouts.admin')

@section('title', 'Thêm tài khoản học viên')

@section('content')
    <div style="display:flex;justify-content:center;">
        <div class="page-card" style="max-width:540px;width:100%;">
            <h2 style="margin:0 0 16px;">Thêm tài khoản học viên</h2>
            <form action="{{ route('admin.students.store') }}" method="post">
                @include('admin.students.form', ['buttonText' => 'Tạo mới'])
            </form>
        </div>
    </div>
@endsection
