@extends('layouts.admin')

@section('title', 'Thêm danh mục khóa học')

@section('content')
    <div style="display:flex;justify-content:center;">
        <div class="page-card" style="max-width:540px;width:100%;">
            <h2 style="margin:0 0 16px;">Thêm danh mục khóa học</h2>
            <form action="{{ route('admin.categories.store') }}" method="post">
                @include('admin.categories.form', ['buttonText' => 'Tạo mới'])
            </form>
        </div>
    </div>
@endsection
