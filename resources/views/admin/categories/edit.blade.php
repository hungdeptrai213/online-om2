@extends('layouts.admin')

@section('title', 'Sửa danh mục khóa học')

@section('content')
    <div style="display:flex;justify-content:center;">
        <div class="page-card" style="max-width:540px;width:100%;">
            <h2 style="margin:0 0 16px;">Sửa danh mục khóa học</h2>
            <form action="{{ route('admin.categories.update', $category) }}" method="post">
                @method('put')
                @include('admin.categories.form', ['buttonText' => 'Cập nhật', 'category' => $category])
            </form>
        </div>
    </div>
@endsection
