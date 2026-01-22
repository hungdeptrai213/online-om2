@extends('layouts.admin')

@section('title', 'Tài khoản học viên')

@section('content')
    <div class="page-card">
        <div style="display:flex;justify-content:space-between;gap:12px;align-items:center;margin-bottom:14px;">
            <div>
                <h2 style="margin:0;">Tài khoản học viên</h2>
                <div class="muted">Danh sách tài khoản bảng students</div>
            </div>
            <a href="{{ route('admin.students.create') }}" class="btn-dark">+ Thêm mới</a>
        </div>

        @if (session('msg'))
            <div style="padding:10px 12px;border-radius:8px;background:#e6f7ee;color:#1b7f46;margin-bottom:12px;">
                {{ session('msg') }}
            </div>
        @endif

        <form method="get" style="display:flex;justify-content:flex-end;gap:10px;align-items:center;margin-bottom:14px;flex-wrap:wrap;">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Tìm theo tên, email hoặc số điện thoại"
                   style="padding:10px 12px;border:1px solid #e3e8f1;border-radius:8px;min-width:240px;">
            <select name="verified" style="padding:10px 12px;border:1px solid #e3e8f1;border-radius:8px;min-width:160px;">
                <option value="">Trạng thái email</option>
                <option value="1" @selected(request('verified')==='1')>Đã xác minh</option>
                <option value="0" @selected(request('verified')==='0')>Chưa xác minh</option>
            </select>
            <button type="submit" class="btn-dark" style="padding:9px 14px;border-radius:8px;">Lọc</button>
            <a href="{{ route('admin.students.index') }}" style="color:#1f2d3d;text-decoration:none;">Xóa lọc</a>
        </form>

        <div style="overflow:auto;">
            <table style="width:100%;border-collapse:collapse;">
                <thead>
                <tr style="background:#f7f8fb;text-align:left;">
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">#</th>
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">Tên</th>
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">Email</th>
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">SĐT</th>
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">Email verified</th>
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">Ngày tạo</th>
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">Hành động</th>
                </tr>
                </thead>
                <tbody>
                @forelse($students as $student)
                    <tr>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;">{{ $student->id }}</td>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;">{{ $student->name }}</td>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;">{{ $student->email }}</td>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;">{{ $student->phone ?? '—' }}</td>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;">
                            @if($student->email_verified_at)
                                <span style="background:#e6f7ee;color:#1b7f46;padding:4px 8px;border-radius:8px;font-size:12px;">Đã xác minh</span>
                            @else
                                <span style="background:#fff4e5;color:#a36100;padding:4px 8px;border-radius:8px;font-size:12px;">Chưa xác minh</span>
                            @endif
                        </td>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;">{{ $student->created_at?->format('d/m/Y') }}</td>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;display:flex;gap:8px;flex-wrap:wrap;align-items:center;">
                            <button type="button"
                                    class="btn-assign"
                                    data-student="{{ $student->id }}"
                                    data-name="{{ $student->name }}"
                                    style="padding:8px 10px;border-radius:8px;border:1px solid #d4e3ff;background:#eff5ff;color:#0c3b2e;cursor:pointer;">
                                Phân quyền
                            </button>
                            <a href="{{ route('admin.students.edit', $student) }}" style="padding:8px 10px;border-radius:8px;border:1px solid #e6ecf5;text-decoration:none;">Sửa</a>
                            <form action="{{ route('admin.students.destroy', $student) }}" method="post" onsubmit="return confirm('Xóa tài khoản này?');">
                                @csrf
                                @method('delete')
                                <button type="submit" style="padding:8px 10px;border-radius:8px;border:1px solid #f1d0d0;background:#ffecec;color:#d14343;cursor:pointer;">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="padding:14px;text-align:center;color:#1f2d3d;">Không có tài khoản phù hợp.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top:12px;">
            {{ $students->links() }}
        </div>
    </div>

    <div class="modal fade" id="assignModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="border:0;border-radius:16px;">
                <div class="modal-header" style="border-bottom:1px solid #f1f2f6;">
                    <h5 class="modal-title">Phân quyền khóa học</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="assignStatus" class="alert d-none" role="alert"></div>
                    <div class="mb-3">
                        <strong>Học viên:</strong> <span id="assignStudentName"></span>
                    </div>
                    <div style="max-height:360px;overflow:auto;border:1px solid #e6ecf5;border-radius:10px;padding:12px;">
                        <form id="assignForm" class="d-flex flex-column gap-2">
                            @csrf
                            <div id="assignCourses" class="d-flex flex-column gap-2">
                                <div class="text-muted small">Đang tải danh sách khóa học...</div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer" style="border-top:1px solid #f1f2f6;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="assignSave">Lưu phân quyền</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const modalElement = document.getElementById('assignModal');
    const modal = modalElement && window.bootstrap ? new bootstrap.Modal(modalElement) : null;
    const assignCourses = document.getElementById('assignCourses');
    const assignStudentName = document.getElementById('assignStudentName');
    const assignStatus = document.getElementById('assignStatus');
    const assignSave = document.getElementById('assignSave');
    let currentStudentId = null;

        const fetchCourses = async (studentId) => {
            if (!assignCourses) return;
            assignCourses.innerHTML = '<div class="text-muted small">Đang tải danh sách khóa học...</div>';
            const res = await fetch(`{{ url('/admin/students') }}/${studentId}/courses-json`);
            const data = await res.json().catch(() => ({}));
            if (!res.ok) {
                assignCourses.innerHTML = '<div class="text-danger small">Không tải được danh sách khóa học.</div>';
                return;
            }
            const { courses = [], owned = [] } = data;
            if (!courses.length) {
                assignCourses.innerHTML = '<div class="text-muted small">Chưa có khóa học nào.</div>';
                return;
            }
            const ownedSet = new Set(owned);
            assignCourses.innerHTML = '';
            courses.forEach((course) => {
                const id = course.id;
                const label = document.createElement('label');
                label.style.display = 'flex';
                label.style.alignItems = 'center';
                label.style.gap = '8px';
                label.style.padding = '6px 8px';
                label.style.borderRadius = '8px';
                label.style.border = '1px solid #e6ecf5';
                label.style.cursor = 'pointer';

                const checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.name = 'courses[]';
                checkbox.value = id;
                checkbox.checked = ownedSet.has(id);

                const title = document.createElement('div');
                title.innerHTML = `<strong>${course.title}</strong><div class="text-muted small">${course.price_text || ''}</div>`;

                label.appendChild(checkbox);
                label.appendChild(title);
                assignCourses.appendChild(label);
            });
        };

    const setStatus = (msg, success = true) => {
        if (!assignStatus) return;
        assignStatus.classList.remove('d-none', 'alert-success', 'alert-danger');
        assignStatus.classList.add(success ? 'alert-success' : 'alert-danger');
        assignStatus.textContent = msg;
    };

    document.querySelectorAll('.btn-assign').forEach((btn) => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            currentStudentId = btn.getAttribute('data-student');
            assignStudentName.textContent = btn.getAttribute('data-name') || '';
            if (assignStatus) {
                assignStatus.classList.add('d-none');
                assignStatus.textContent = '';
            }
            fetchCourses(currentStudentId);
            if (modal) {
                modal.show();
            } else {
                console.error('Bootstrap modal not available.');
            }
        });
    });

    if (assignSave) {
        assignSave.addEventListener('click', async () => {
            if (!currentStudentId || !assignCourses) return;
            const selected = Array.from(assignCourses.querySelectorAll('input[type=\"checkbox\"]'))
                .filter((cb) => cb.checked)
                .map((cb) => cb.value);
            assignSave.disabled = true;
            assignSave.textContent = 'Đang lưu...';
            setStatus('', true);
            assignStatus.classList.add('d-none');
            try {
                const res = await fetch(`{{ url('/admin/students') }}/${currentStudentId}/courses-sync`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({ course_ids: selected }),
                });
                const data = await res.json().catch(() => ({}));
                if (!res.ok) {
                    throw new Error(data.message || 'Lưu phân quyền thất bại.');
                }
                setStatus('Đã lưu phân quyền khóa học.', true);
            } catch (err) {
                setStatus(err.message || 'Lưu phân quyền thất bại.', false);
            } finally {
                assignSave.disabled = false;
                assignSave.textContent = 'Lưu phân quyền';
            }
        });
    }
});
</script>
@endpush
