@extends('layouts.admin')

@section('title', $schedule->exists ? 'Chỉnh sửa lịch học' : 'Thêm lịch học')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h2 class="fs-4 fw-bold mb-0">{{ $schedule->exists ? 'Chỉnh sửa lịch học' : 'Thêm lịch học mới' }}</h2>
            <p class="text-muted mb-0">Điền đầy đủ thông tin để học viên có thể đăng ký dễ dàng.</p>
        </div>
        <a class="btn btn-dark" href="{{ route('admin.schedules.index') }}">
            <i class="fa-solid fa-arrow-left"></i> Quay lại danh sách
        </a>
    </div>

    <div class="page-card">
        <form method="POST" action="{{ $route }}" enctype="multipart/form-data">
            @csrf
            @if($schedule->exists)
                @method('PUT')
            @endif
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Tiêu đề</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $schedule->title) }}" required placeholder="Ví dụ: Digital Marketing | K24">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Lịch học</label>
                    <input type="text" name="schedule" class="form-control" value="{{ old('schedule', $schedule->schedule) }}" placeholder="Tối thứ 2 & tối thứ 4">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Khai giảng</label>
                    <input type="date" name="start_date" class="form-control" value="{{ old('start_date', optional($schedule->start_date)->format('Y-m-d')) }}" placeholder="">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Số buổi</label>
                    <input type="number" name="sessions" class="form-control" value="{{ old('sessions', $schedule->sessions) }}" min="0" placeholder="Số buổi">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Hình thức</label>
                    <input type="text" name="format" class="form-control" value="{{ old('format', $schedule->format) }}" placeholder="Online / Offline">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Chi phí (VNĐ)</label>
                    <input type="number" name="cost" class="form-control" value="{{ old('cost', $schedule->cost) }}" step="1000" min="0" placeholder="590000">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Tác giả</label>
                    <input type="text" name="author" class="form-control" value="{{ old('author', $schedule->author) }}" placeholder="Tên tác giả">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Người chia sẻ</label>
                    <input type="text" name="shared_by" class="form-control" value="{{ old('shared_by', $schedule->shared_by) }}" placeholder="Người chia sẻ">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Trạng thái</label>
                    <input type="text" name="status" class="form-control" value="{{ old('status', $schedule->status) }}" placeholder="Còn trống / Đã đầy">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Ảnh đại diện</label>
                    <input type="file" name="cover_image" class="form-control" accept="image/*">
                    @if($schedule->cover_url)
                        <div class="mt-2">
                            <img src="{{ $schedule->cover_url }}" alt="Ảnh hiện tại" class="img-fluid rounded" style="max-height:120px;">
                        </div>
                    @endif
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">Mô tả</label>
                    <textarea name="description" rows="4" class="form-control" placeholder="Mô tả ngắn gọn về chương trình">{{ old('description', $schedule->description) }}</textarea>
                </div>
            </div>
            <div class="mt-4 d-flex gap-3">
                <button type="submit" class="btn btn-dark">
                    <i class="fa-solid fa-save"></i> {{ $schedule->exists ? 'Cập nhật' : 'Lưu lại' }}
                </button>
                <a href="{{ route('admin.schedules.index') }}" class="btn btn-outline-secondary">Hủy</a>
            </div>
        </form>
    </div>
@endsection
