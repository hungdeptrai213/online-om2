@extends('layouts.admin')

@section('title', 'Sửa tài khoản học viên')

@section('content')
    <div style="display:flex;justify-content:center;">
        <div class="page-card" style="max-width:540px;width:100%;">
            <h2 style="margin:0 0 16px;">Sửa tài khoản học viên</h2>
            <form action="{{ route('admin.students.update', $student) }}" method="post">
                @method('put')
                @include('admin.students.form', ['buttonText' => 'Cập nhật', 'student' => $student])
            </form>
        </div>
    </div>
@endsection
