<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký Coaching</title>
</head>
<body>
    <h2>Đăng ký Coaching 1 kèm 1</h2>
    <p><strong>Gói:</strong> <?php echo e($data['plan_type'] === 'buoi_le' ? 'Buổi lẻ' : 'Lộ trình'); ?></p>
    <p><strong>Họ tên:</strong> <?php echo e($data['name']); ?></p>
    <p><strong>Điện thoại:</strong> <?php echo e($data['phone']); ?></p>
    <p><strong>Email:</strong> <?php echo e($data['email']); ?></p>
    <p><strong>Nội dung mong muốn đào tạo:</strong></p>
    <p style="white-space: pre-line;"><?php echo e($data['message']); ?></p>
</body>
</html>
<?php /**PATH C:\laragon\www\online-om\resources\views/emails/coaching-request.blade.php ENDPATH**/ ?>