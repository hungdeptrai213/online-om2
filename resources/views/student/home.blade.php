@extends('student.layouts.app')

@section('content')
    <!-- Bộ lọc / tìm kiếm -->
    <div class="container mt-6">
        <div class="row justify-content-center filter-search">
            <div class="col-md-8 col-lg-6 rounded-pill shadow-sm">
                <ul class="list-unstyled py-2  d-flex justify-content-between position-relative mb-0" id="mainNav">
                    <li><a href="{{ route('student.home') }}" class="btn fw-bold fs-2 border-0 {{ ($currentCategory ?? 'home') === 'home' ? 'active' : '' }}">Trang chủ</a></li>
                    <li><a href="{{ route('student.home', ['category' => 'library']) }}" class="btn fw-bold fs-2 border-0 {{ ($currentCategory ?? 'home') === 'library' ? 'active' : '' }}">Thư viện</a></li>
                    <li><a href="{{ route('student.home', ['category' => 'recommended']) }}" class="btn fw-bold fs-2 border-0 {{ ($currentCategory ?? 'home') === 'recommended' ? 'active' : '' }}">Đề xuất</a></li>
                    <li><a href="{{ route('student.home', ['category' => 'featured']) }}" class="btn fw-bold fs-2 border-0 {{ ($currentCategory ?? 'home') === 'featured' ? 'active' : '' }}">Nổi bật</a></li>
                    <li><a href="{{ route('student.home', ['category' => 'new']) }}" class="btn fw-bold fs-2 border-0 {{ ($currentCategory ?? 'home') === 'new' ? 'active' : '' }}">Mới ra</a></li>
                    <button class="btn px-0 my-search-toggle search-icon" type="button" id="openSearch"><i class="fa-solid fa-magnifying-glass fs-2"></i></button>
                </ul>

                <form class="d-flex bg-body h-100 rounded-pill py-2  d-none search-3" role="search" id="searchBar" method="GET" action="{{ route('student.home') }}">
                    <input type="hidden" name="category" value="{{ $currentCategory ?? 'home' }}">
                    <input class="form-control bg-transparent text-center fs-1 fw-bold" name="q" type="search" value="{{ $searchTerm ?? '' }}" placeholder="Bạn muốn tìm khóa học nào?" aria-label="Search" />
                    <button class="btn px-0 me-2" type="submit"><i class="fa-solid fa-magnifying-glass fs-2"></i></button>
                </form>
            </div>
        </div>

        <div class="row d-sm-block d-lg-none">
            <div class="col-12">
                <form class="d-flex rounded-pill py-2 search-4 rounded-pill shadow-sm px-3" role="search" method="GET" action="{{ route('student.home') }}">
                    <input type="hidden" name="category" value="{{ $currentCategory ?? 'home' }}">
                    <input class="form-control bg-transparent text-center fs-2 fw-bold" name="q" type="search" value="{{ $searchTerm ?? '' }}" placeholder="Bạn muốn tìm khóa học nào?" aria-label="Search" />
                    <button class="btn px-0 me-2" type="submit"><i class="fa-solid fa-magnifying-glass fs-2"></i></button>
                </form>
            </div>
            <ul class="list-unstyled py-2  d-flex justify-content-between mt-4 mb-0 overflow-x-auto text-nowrap mobile-category" style="max-height: 200px;">
                <li><a href="{{ route('student.home') }}" class="btn fw-bold fs-2 border-0 {{ ($currentCategory ?? 'home') === 'home' ? 'active' : '' }}">Trang chủ</a></li>
                <li><a href="{{ route('student.home', ['category' => 'library']) }}" class="btn fw-bold fs-2 border-0 {{ ($currentCategory ?? 'home') === 'library' ? 'active' : '' }}">Thư viện</a></li>
                <li><a href="{{ route('student.home', ['category' => 'recommended']) }}" class="btn fw-bold fs-2 border-0 {{ ($currentCategory ?? 'home') === 'recommended' ? 'active' : '' }}">Đề xuất</a></li>
                <li><a href="{{ route('student.home', ['category' => 'featured']) }}" class="btn fw-bold fs-2 border-0 {{ ($currentCategory ?? 'home') === 'featured' ? 'active' : '' }}">Nổi bật</a></li>
                <li><a href="{{ route('student.home', ['category' => 'new']) }}" class="btn fw-bold fs-2 border-0 {{ ($currentCategory ?? 'home') === 'new' ? 'active' : '' }}">Mới ra</a></li>
            </ul>
        </div>
    </div>

    <div class="container mt-5">
        @if($showFilterResults)
        <div class="row" style="margin-top:30px">
            <p class="fs-1 mb-4 fw-bold">Kết quả: {{ $filterHeading ?? 'Khóa học' }}</p>
            @forelse($filterCourses ?? [] as $course)
                @php
                    $thumb = $course->thumbnail;
                    $thumbUrl = $thumb && \Illuminate\Support\Str::startsWith($thumb, ['http://', 'https://'])
                        ? $thumb
                        : ($thumb ? asset($thumb) : '/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg');
                    $price = $course->sale_price ?? $course->price ?? 0;
                    $displayPrice = $price > 0 ? number_format($price, 0, ',', '.') : 'Miễn phí';
                    $categoryNames = optional($course->categories)->pluck('name')->filter()->implode(', ');
                    $short = $course->short_description ?? '';
                @endphp
                <div class="col-sm-6 col-md-4 col-lg-24 mb-3">
                    <a href="{{ route('student.course-detail', ['course' => $course->id]) }}" class="text-decoration-none text-black position-relative has-tooltip">
                        <img src="{{ $thumbUrl }}" alt="{{ $course->title }}" class="w-100 rounded-sm-3 rounded-5 shadow-sm">
                        <p class="fs-2 mt-3">{{ $displayPrice }}</p>
                        <div class="grey-bg rounded-5 p-4 d-flex my-tooltip shadow-sm" style="width: 35%;">
                            <div class="col-5 pe-4">
                                <img src="{{ $thumbUrl }}" alt="{{ $course->title }}" class="w-100 rounded-5 shadow-sm">
                            </div>
                            <div class="col-7">
                                <p class="fs-2 fw-bold mb-1">{{ $course->title }}</p>
                                <p class="fs-4 mb-1">Giá: {{ $displayPrice }}</p>
                                @if($course->author)
                                    <p class="fs-4 mt-3 mb-1 fst-italic">Tác giả: {{ $course->author }}</p>
                                @endif
                                @if($categoryNames)
                                    <p class="fs-4 mb-1 fst-italic">Thể loại: {{ $categoryNames }}</p>
                                @endif
                                @if($short)
                                    <p class="fs-4 mb-1 fst-italic">{{ \Illuminate\Support\Str::limit($short, 160) }}</p>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <p class="fs-4">Chưa có khóa học phù hợp</p>
            @endforelse
        </div>
        @endif

        @if($showHomeSections)
            @auth('student')
            <div class="row" style="margin-top:30px">
                <p class="fs-1 mb-4 fw-bold">Thư viện - Khóa học của bạn</p>
                @forelse($courses ?? [] as $course)
                    @php
                        $thumb = $course->thumbnail;
                        $thumbUrl = $thumb && \Illuminate\Support\Str::startsWith($thumb, ['http://', 'https://'])
                            ? $thumb
                            : ($thumb ? asset($thumb) : '/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg');
                        $price = $course->sale_price ?? $course->price ?? 0;
                        $displayPrice = $price > 0 ? number_format($price, 0, ',', '.') : 'Miễn phí';
                        $categoryNames = optional($course->categories)->pluck('name')->filter()->implode(', ');
                        $short = $course->short_description ?? '';
                    @endphp
                    <div class="col-sm-6 col-md-4 col-lg-24 mb-3">
                        <a href="{{ route('student.course-detail', ['course' => $course->id]) }}" class="text-decoration-none text-black position-relative has-tooltip">
                            <img src="{{ $thumbUrl }}" alt="{{ $course->title }}" class="w-100 rounded-sm-3 rounded-5 shadow-sm">
                            <p class="fs-2 mt-3">{{ $displayPrice }}</p>
                            <div class="grey-bg rounded-5 p-4 d-flex my-tooltip shadow-sm" style="width: 35%;">
                                <div class="col-5 pe-4">
                                    <img src="{{ $thumbUrl }}" alt="{{ $course->title }}" class="w-100 rounded-5 shadow-sm">
                                </div>
                                <div class="col-7">
                                    <p class="fs-2 fw-bold mb-1">{{ $course->title }}</p>
                                    <p class="fs-4 mb-1">Giá: {{ $displayPrice }}</p>
                                    @if($course->author)
                                        <p class="fs-4 mt-3 mb-1 fst-italic">Tác giả: {{ $course->author }}</p>
                                    @endif
                                    @if($categoryNames)
                                        <p class="fs-4 mb-1 fst-italic">Thể loại: {{ $categoryNames }}</p>
                                    @endif
                                    @if($short)
                                        <p class="fs-4 mb-1 fst-italic">{{ \Illuminate\Support\Str::limit($short, 160) }}</p>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <p class="fs-4">Chưa có khóa học phù hợp</p>
                @endforelse
            </div>
            @endauth

            <div class="row" style="margin-top:30px">
                <p class="fs-1 mb-4 fw-bold">Đề xuất khóa học phù hợp cho bạn</p>
                @forelse($recommended ?? [] as $course)
                    @php
                        $thumb = $course->thumbnail;
                        $thumbUrl = $thumb && \Illuminate\Support\Str::startsWith($thumb, ['http://', 'https://'])
                            ? $thumb
                            : ($thumb ? asset($thumb) : '/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg');
                        $price = $course->sale_price ?? $course->price ?? 0;
                        $displayPrice = $price > 0 ? number_format($price, 0, ',', '.') : 'Miễn phí';
                        $categoryNames = optional($course->categories)->pluck('name')->filter()->implode(', ');
                        $short = $course->short_description ?? '';
                    @endphp
                    <div class="col-sm-6 col-md-4 col-lg-24 mb-3">
                        <a href="{{ route('student.course-detail', ['course' => $course->id]) }}" class="text-decoration-none text-black position-relative has-tooltip">
                            <img src="{{ $thumbUrl }}" alt="{{ $course->title }}" class="w-100 rounded-sm-3 rounded-5 shadow-sm">
                            <p class="fs-2 mt-3">{{ $displayPrice }}</p>
                            <div class="grey-bg rounded-5 p-4 d-flex my-tooltip shadow-sm" style="width: 35%;">
                                <div class="col-5 pe-4">
                                    <img src="{{ $thumbUrl }}" alt="{{ $course->title }}" class="w-100 rounded-5 shadow-sm">
                                </div>
                                <div class="col-7">
                                    <p class="fs-2 fw-bold mb-1">{{ $course->title }}</p>
                                    <p class="fs-4 mb-1">Giá: {{ $displayPrice }}</p>
                                    @if($course->author)
                                        <p class="fs-4 mt-3 mb-1 fst-italic">Tác giả: {{ $course->author }}</p>
                                    @endif
                                    @if($categoryNames)
                                        <p class="fs-4 mb-1 fst-italic">Thể loại: {{ $categoryNames }}</p>
                                    @endif
                                    @if($short)
                                        <p class="fs-4 mb-1 fst-italic">{{ \Illuminate\Support\Str::limit($short, 160) }}</p>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <p class="fs-4">Chưa có khóa học phù hợp</p>
                @endforelse
            </div>

            <div class="row" style="margin-top:30px">
                <p class="fs-1 mb-4 fw-bold">Những khóa học nổi bật</p>
                @forelse($featured ?? [] as $course)
                    @php
                        $thumb = $course->thumbnail;
                        $thumbUrl = $thumb && \Illuminate\Support\Str::startsWith($thumb, ['http://', 'https://'])
                            ? $thumb
                            : ($thumb ? asset($thumb) : '/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg');
                        $price = $course->sale_price ?? $course->price ?? 0;
                        $displayPrice = $price > 0 ? number_format($price, 0, ',', '.') : 'Miễn phí';
                        $categoryNames = optional($course->categories)->pluck('name')->filter()->implode(', ');
                        $short = $course->short_description ?? '';
                    @endphp
                    <div class="col-sm-6 col-md-4 col-lg-24 mb-3">
                        <a href="{{ route('student.course-detail', ['course' => $course->id]) }}" class="text-decoration-none text-black position-relative has-tooltip">
                            <img src="{{ $thumbUrl }}" alt="{{ $course->title }}" class="w-100 rounded-sm-3 rounded-5 shadow-sm">
                            <p class="fs-2 mt-3">{{ $displayPrice }}</p>
                            <div class="grey-bg rounded-5 p-4 d-flex my-tooltip shadow-sm" style="width: 35%;">
                                <div class="col-5 pe-4">
                                    <img src="{{ $thumbUrl }}" alt="{{ $course->title }}" class="w-100 rounded-5 shadow-sm">
                                </div>
                                <div class="col-7">
                                    <p class="fs-2 fw-bold mb-1">{{ $course->title }}</p>
                                    <p class="fs-4 mb-1">Giá: {{ $displayPrice }}</p>
                                    @if($course->author)
                                        <p class="fs-4 mt-3 mb-1 fst-italic">Tác giả: {{ $course->author }}</p>
                                    @endif
                                    @if($categoryNames)
                                        <p class="fs-4 mb-1 fst-italic">Thể loại: {{ $categoryNames }}</p>
                                    @endif
                                    @if($short)
                                        <p class="fs-4 mb-1 fst-italic">{{ \Illuminate\Support\Str::limit($short, 160) }}</p>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <p class="fs-4">Chưa có khóa học phù hợp</p>
                @endforelse
            </div>

            <div class="row" style="margin-top:30px">
                <p class="fs-1 mb-4 fw-bold">Khóa học mới ra mắt</p>
                @forelse($newCourses ?? [] as $course)
                    @php
                        $thumb = $course->thumbnail;
                        $thumbUrl = $thumb && \Illuminate\Support\Str::startsWith($thumb, ['http://', 'https://'])
                            ? $thumb
                            : ($thumb ? asset($thumb) : '/om-front/img/khoa-hoc-marketing-tong-quan-min.jpg');
                        $price = $course->sale_price ?? $course->price ?? 0;
                        $displayPrice = $price > 0 ? number_format($price, 0, ',', '.') : 'Miễn phí';
                        $categoryNames = optional($course->categories)->pluck('name')->filter()->implode(', ');
                        $short = $course->short_description ?? '';
                    @endphp
                    <div class="col-sm-6 col-md-4 col-lg-24 mb-3">
                        <a href="{{ route('student.course-detail', ['course' => $course->id]) }}" class="text-decoration-none text-black position-relative has-tooltip">
                            <img src="{{ $thumbUrl }}" alt="{{ $course->title }}" class="w-100 rounded-sm-3 rounded-5 shadow-sm">
                            <p class="fs-2 mt-3">{{ $displayPrice }}</p>
                            <div class="grey-bg rounded-5 p-4 d-flex my-tooltip shadow-sm" style="width: 35%;">
                                <div class="col-5 pe-4">
                                    <img src="{{ $thumbUrl }}" alt="{{ $course->title }}" class="w-100 rounded-5 shadow-sm">
                                </div>
                                <div class="col-7">
                                    <p class="fs-2 fw-bold mb-1">{{ $course->title }}</p>
                                    <p class="fs-4 mb-1">Giá: {{ $displayPrice }}</p>
                                    @if($course->author)
                                        <p class="fs-4 mt-3 mb-1 fst-italic">Tác giả: {{ $course->author }}</p>
                                    @endif
                                    @if($categoryNames)
                                        <p class="fs-4 mb-1 fst-italic">Thể loại: {{ $categoryNames }}</p>
                                    @endif
                                    @if($short)
                                        <p class="fs-4 mb-1 fst-italic">{{ \Illuminate\Support\Str::limit($short, 160) }}</p>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <p class="fs-4">Chưa có khóa học phù hợp</p>
                @endforelse
            </div>
        @endif
    </div>
@endsection

