@extends('student.layouts.app')

@section('style')
    <link rel="stylesheet" href="/om-front/css/custom-option.css">
@endsection

@section('content')
<div class="container mt-6">
    <h2 class="fw-bold mb-4">Khóa học của tôi</h2>
    @if($courses->isEmpty())
        <p class="fs-4 text-muted">Bạn chưa có khóa học nào. Hãy đăng ký ngay!</p>
    @else
        <div class="row g-3 row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
            @foreach($courses as $course)
                @php
                    $thumb = $course->thumbnail;
                    $thumbUrl = $thumb && \Illuminate\Support\Str::startsWith($thumb, ['http://', 'https://'])
                        ? $thumb
                        : ($thumb ? asset($thumb) : '/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg');
                    $price = $course->sale_price ?? $course->price ?? 0;
                    $displayPrice = $price > 0 ? number_format($price, 0, ',', '.') . ' VNĐ' : 'Miễn phí';
                    $categoryNames = optional($course->categories)->pluck('name')->filter()->implode(', ');
                @endphp
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 rounded-4">
                        <img src="{{ $thumbUrl }}" class="card-img-top rounded-top-4" alt="{{ $course->title }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">{{ $course->title }}</h5>
                            @if($categoryNames)
                                <p class="card-text text-muted mb-1">{{ $categoryNames }}</p>
                            @endif
                            <p class="card-text text-muted mb-3">{{ $displayPrice }}</p>
                            <a href="{{ route('student.course-detail', ['course' => $course->id]) }}" class="btn btn-primary mt-auto rounded-4">Vào học</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
