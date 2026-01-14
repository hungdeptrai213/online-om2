<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Đăng nhập')</title>
    <link rel="stylesheet" href="{{ asset('om-front/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('om-front/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('om-front/css/custom-option.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    @yield('content')
</body>
</html>
