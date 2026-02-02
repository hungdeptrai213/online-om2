<?php $__env->startSection('title', 'Bảng điều khiển'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-card">
        <h2 style="margin:0 0 8px;">Tổng quan</h2>
        <p class="muted" style="margin:0 0 12px;">Đây là layout mới cho khu vực admin. Các menu đã sẵn sàng để gắn CRUD cho users, students, khóa học, chương, bài học, danh mục, form đăng ký, lịch học, tài liệu, bình luận.</p>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:14px;">
            <div class="page-card" style="padding:14px;">
                <div class="muted" style="font-size:13px;">Tài khoản Admin</div>
                <div style="font-size:26px;font-weight:700;">—</div>
                <div class="muted">CRUD bảng users</div>
            </div>
            <div class="page-card" style="padding:14px;">
                <div class="muted" style="font-size:13px;">Tài khoản học viên</div>
                <div style="font-size:26px;font-weight:700;">—</div>
                <div class="muted">CRUD bảng students</div>
            </div>
            <div class="page-card" style="padding:14px;">
                <div class="muted" style="font-size:13px;">Khóa học</div>
                <div style="font-size:26px;font-weight:700;">—</div>
                <div class="muted">Danh mục, khóa, chương, bài học</div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\online-om\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>