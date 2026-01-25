<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký Coaching</title>
</head>
<body>
    <h2>Đăng ký Coaching 1 kèm 1</h2>
    <p><strong>Gói:</strong> {{ $data['plan_type'] === 'buoi_le' ? 'Buổi lẻ' : 'Lộ trình' }}</p>
    <p><strong>Họ tên:</strong> {{ $data['name'] }}</p>
    <p><strong>Điện thoại:</strong> {{ $data['phone'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Nội dung mong muốn đào tạo:</strong></p>
    <p style="white-space: pre-line;">{{ $data['message'] }}</p>
</body>
</html>
