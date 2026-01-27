@extends('layouts.admin')

@section('title', 'Lịch học')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h2 class="fs-4 fw-bold mb-0">Quản lý lịch học</h2>
            <p class="text-muted mb-0">Danh sách các buổi học sắp khai giảng</p>
        </div>
        <a class="btn btn-dark" href="{{ route('admin.schedules.create') }}">
            <i class="fa-solid fa-plus"></i> Thêm lịch học
        </a>
    </div>

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="page-card">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                <tr>
                    <th>Tiêu đề</th>
                    <th>Khai giảng</th>
                    <th>Buổi</th>
                    <th>Chi phí</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                @forelse($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->title }}</td>
                        <td>{{ $schedule->start_date?->format('d/m/Y') ?? '—' }}</td>
                        <td>{{ $schedule->sessions }} buổi</td>
                        <td>{{ number_format($schedule->cost, 0, ',', '.') }} VNĐ</td>
                        <td>{{ $schedule->status ?? '—' }}</td>
                        <td>
                            <a class="btn btn-sm btn-outline-primary me-2" href="{{ route('admin.schedules.edit', $schedule) }}">
                                Chỉnh sửa
                            </a>
                            <form class="d-inline" method="POST" action="{{ route('admin.schedules.destroy', $schedule) }}" onsubmit="return confirm('Xác nhận xoá?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-muted text-center">Chưa có lịch học nào được tạo.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3 d-flex justify-content-end">
            {{ $schedules->links() }}
        </div>
    </div>
@endsection
