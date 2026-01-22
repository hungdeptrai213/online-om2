<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" href="{{ asset('om-front/img/Logo Organic Marketing small (1).png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        :root {
            --sidebar-bg: #000;
            --sidebar-width: 280px;
            --text-muted: #8ea0c1;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Montserrat', 'Segoe UI', Arial, sans-serif;
            background: #F4F3EF;
            color: #1f2d3d;
        }
        input, select, button {
            font-family: 'Montserrat', 'Segoe UI', Arial, sans-serif;
        }
        a { color: inherit; text-decoration: none; }
        .layout {
            display: grid;
            grid-template-columns: var(--sidebar-width) 1fr;
            min-height: 100vh;
        }
        .sidebar {
            background: var(--sidebar-bg);
            color: #e8edff;
            padding: 20px 16px;
            position: sticky;
            top: 0;
            height: 100vh;
        }
        .sidebar .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 8px 16px;
        }
        .sidebar .brand .logo {
            width: 38px;
            height: 38px;
            border-radius: 8px;
            background: rgba(255,255,255,0.18);
            display: grid;
            place-items: center;
            font-weight: 800;
        }
        .sidebar .brand span {
            font-weight: 800;
            letter-spacing: 0.5px;
            font-size: 16px;
        }
        .nav-group {
            margin-top: 4px;
            display: grid;
            gap: 6px;
        }
        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 10px;
            color: #fff;
            cursor: pointer;
            transition: background 0.2s ease, transform 0.1s ease;
            font-size: 16px;
        }
        .nav-item:hover { background: rgba(255,255,255,0.08); }
        .nav-item.active {
            background: rgba(255,255,255,0.22);
            color: #fff;
        }
        .nav-item i { width: 18px; text-align: center; font-size: 16px; }
        .nav-label { flex: 1; }
        .nav-badge {
            background: rgba(255,255,255,0.14);
            color: #fff;
            border-radius: 8px;
            padding: 2px 8px;
            font-size: 12px;
        }
        .nav-divider {
            border: 0;
            border-top: 1px solid rgba(255,255,255,0.12);
            margin: 12px 0;
        }
        .nav-sub {
            padding-left: 20px;
            display: grid;
            gap: 4px;
        }
        .nav-sub a {
            color: #fff;
            padding: 10px 12px;
            border-radius: 10px;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
            background: rgba(255,255,255,0.04);
        }
        .nav-sub a.active, .nav-sub a:hover {
            background: rgba(255,255,255,0.18);
            color: #fff;
        }
        .nav-sub .triangle {
            width: 0;
            height: 0;
            border-left: 6px solid #d7e1ff;
            border-top: 4px solid transparent;
            border-bottom: 4px solid transparent;
            display: inline-block;
        }
        .nav-sub.hide {
            display: none;
        }
        .nav-item.has-children {
            position: relative;
        }
        .nav-item .chevron {
            transform: rotate(90deg);
            transition: transform 0.15s ease;
            font-size: 12px;
        }
        .nav-item.collapsed .chevron {
            transform: rotate(0deg);
        }
        .sidebar-footer {
            position: absolute;
            bottom: 16px;
            left: 16px;
            right: 16px;
            font-size: 12px;
            color: rgba(232,237,255,0.75);
        }
        .main {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .topbar {
            background: #fff;
            border-bottom: 1px solid #e6ecf5;
            padding: 12px 20px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 16px;
            position: sticky;
            top: 0;
            z-index: 10;
        }
        .search {
            display: flex;
            align-items: center;
            background: #f2f4f9;
            padding: 8px 12px;
            border-radius: 8px;
            flex: 0 0 320px;
            max-width: 70%;
            border: 1px solid #e6ecf5;
        }
        .search input {
            border: none;
            background: transparent;
            outline: none;
            flex: 1;
            font-size: 14px;
        }
        .top-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .icon-btn {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            background: #f2f4f9;
            display: grid;
            place-items: center;
            border: 1px solid #e6ecf5;
            color: #2f3b57;
            cursor: pointer;
            transition: box-shadow 0.15s ease, transform 0.1s ease;
        }
        .icon-btn:hover { box-shadow: 0 6px 18px rgba(0,0,0,0.08); transform: translateY(-1px); }
        .user-menu { position: relative; }
        .user-toggle {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 0 10px;
            height: 38px;
            background: #eef2fb;
            border: 1px solid #d7dff1;
            border-radius: 12px;
            color: #1f2d3d;
            font-weight: 600;
            cursor: pointer;
            transition: box-shadow 0.15s ease, transform 0.1s ease;
        }
        .user-toggle:hover { box-shadow: 0 10px 24px rgba(0,0,0,0.08); transform: translateY(-1px); }
        .user-avatar {
            width: 30px;
            height: 30px;
            border-radius: 10px;
            background: linear-gradient(135deg, #5b7cff, #192442);
            color: #fff;
            display: grid;
            place-items: center;
            font-weight: 800;
        }
        .user-dropdown {
            position: absolute;
            top: 46px;
            right: 0;
            background: #fff;
            border: 1px solid #e6ecf5;
            border-radius: 12px;
            box-shadow: 0 20px 60px rgba(17,38,146,0.12);
            width: 220px;
            padding: 10px;
            display: none;
            z-index: 50;
        }
        .user-menu.open .user-dropdown { display: block; }
        .user-dropdown .user-name { font-weight: 700; color: #1f2d3d; margin-bottom: 2px; }
        .user-dropdown .user-email { color: #7183a8; font-size: 13px; margin-bottom: 10px; }
        .user-dropdown .dropdown-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 10px;
            color: #1f2d3d;
            font-weight: 600;
        }
        .user-dropdown .dropdown-link:hover { background: #f4f6fb; }
        .user-dropdown hr {
            border: 0;
            border-top: 1px solid #eef1f7;
            margin: 10px 0;
        }
        .content {
            padding: 20px;
            flex: 1;
        }
        .page-card {
            background: #fff;
            border: 1px solid #e6ecf5;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 10px 35px rgba(17,38,146,0.05);
        }
        .muted { color: #1f2d3d; }
        table thead th {
            font-weight: 700;
            color: #1f2d3d;
        }
        .btn-dark {
            background: #1f1f1f;
            color: #fff;
            border: none;
            padding: 10px 14px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border: 1px solid #0d1320;
        }
        .btn-dark:hover { background: #0c1220; }
        .btn-dark:focus { outline: 2px solid #000; outline-offset: 1px; }
    </style>
</head>
<body>
<div class="layout">
    <aside class="sidebar">
        <div class="brand">
            <div class="logo"><i class="fa-solid fa-gauge-high"></i></div>
            <span>OM E-LEARNING</span>
        </div>

        @php($userActive = request()->routeIs('admin.users.*'))
        @php($studentActive = request()->routeIs('admin.students.*'))
        @php($categoryActive = request()->routeIs('admin.categories.*'))
        <div class="nav-group">
            <div class="nav-item active">
                <i class="fa-solid fa-chart-pie"></i>
                <span class="nav-label">Tổng quan</span>
            </div>
            <hr class="nav-divider">
            <div class="nav-item has-children {{ $userActive ? 'active' : 'collapsed' }}">
                <i class="fa-solid fa-user-shield"></i>
                <span class="nav-label">Tài khoản Admin</span>
                <i class="fa-solid fa-chevron-right chevron"></i>
            </div>
            <div class="nav-sub {{ $userActive ? '' : 'hide' }}">
                <a class="{{ $userActive ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                    <span class="triangle"></span> Danh sách tài khoản
                </a>
                <a href="{{ route('admin.users.create') }}">
                    <span class="triangle"></span> Thêm tài khoản
                </a>
            </div>
            <div class="nav-item has-children {{ $studentActive ? 'active' : 'collapsed' }}">
                <i class="fa-solid fa-user-graduate"></i>
                <span class="nav-label">Tài khoản học viên</span>
                <i class="fa-solid fa-chevron-right chevron"></i>
            </div>
            <div class="nav-sub {{ $studentActive ? '' : 'hide' }}">
                <a class="{{ $studentActive ? 'active' : '' }}" href="{{ route('admin.students.index') }}">
                    <span class="triangle"></span> Danh sách học viên
                </a>
                <a href="{{ route('admin.students.create') }}">
                    <span class="triangle"></span> Thêm học viên
                </a>
            </div>
            <div class="nav-item has-children {{ $categoryActive ? 'active' : 'collapsed' }}">
                <i class="fa-solid fa-layer-group"></i>
                <span class="nav-label">Danh mục khóa học</span>
                <i class="fa-solid fa-chevron-right chevron"></i>
            </div>
            <div class="nav-sub {{ $categoryActive ? '' : 'hide' }}">
                <a class="{{ request()->routeIs('admin.categories.index') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
                    <span class="triangle"></span> Danh sách danh mục
                </a>
                <a class="{{ request()->routeIs('admin.categories.create') ? 'active' : '' }}" href="{{ route('admin.categories.create') }}">
                    <span class="triangle"></span> Thêm danh mục
                </a>
            </div>
            <a class="nav-item" href="{{ route('admin.courses.index') }}">
                <i class="fa-solid fa-book-open-reader"></i>
                <span class="nav-label">Khóa học</span>
                <span class="nav-badge">Chương/Bài</span>
            </a>
            <div class="nav-item">
                <i class="fa-solid fa-clipboard-list"></i>
                <span class="nav-label">Form đăng ký</span>
            </div>
            <div class="nav-item">
                <i class="fa-solid fa-calendar-days"></i>
                <span class="nav-label">Lịch học</span>
            </div>
            <div class="nav-item">
                <i class="fa-solid fa-folder-open"></i>
                <span class="nav-label">Tài liệu</span>
            </div>
            <div class="nav-item">
                <i class="fa-solid fa-comments"></i>
                <span class="nav-label">Bình luận</span>
            </div>
            <div class="nav-item">
                <i class="fa-solid fa-user-check"></i>
                <span class="nav-label">Theo dõi đăng ký</span>
            </div>
        </div>

        <div class="sidebar-footer">
            <div style="font-weight:600;">Hienu Admin</div>
            <div class="muted">E-learning control panel</div>
        </div>
    </aside>

    <div class="main">
        <header class="topbar">
            <form class="search">
                <i class="fa-solid fa-magnifying-glass" style="margin-right:8px;"></i>
                <input type="text" placeholder="Tìm kiếm...">
            </form>
            <div class="top-actions">
                <div class="icon-btn"><i class="fa-regular fa-bell"></i></div>
                <div class="icon-btn"><i class="fa-regular fa-envelope"></i></div>
                <div class="user-menu" id="userMenu">
                    <button type="button" class="user-toggle" aria-expanded="false">
                        <div class="user-avatar">
                            {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                        </div>
                        <i class="fa-solid fa-user"></i>
                        <i class="fa-solid fa-chevron-down" style="font-size:12px;"></i>
                    </button>
                    <div class="user-dropdown" role="menu">
                        <div class="user-name">{{ auth()->user()->name ?? 'Admin' }}</div>
                        <div class="user-email">{{ auth()->user()->email ?? '' }}</div>
                        <a class="dropdown-link" href="{{ route('admin.profile.edit') }}">
                            <i class="fa-solid fa-id-card-clip"></i> Hồ sơ cá nhân
                        </a>
                        <hr>
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-link" style="width:100%; text-align:left; border:0; background:none; cursor:pointer;">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i> Đăng xuất
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>
        <main class="content">
            @yield('content')
        </main>
    </div>
</div>

<script>
    document.querySelectorAll('.nav-item.has-children').forEach(function (item) {
        item.addEventListener('click', function () {
            const sub = item.nextElementSibling;
            const isOpen = !sub.classList.contains('hide');
            item.classList.toggle('collapsed', isOpen);
            sub.classList.toggle('hide', isOpen);
        });
    });

    const userMenu = document.getElementById('userMenu');
    const userToggle = userMenu?.querySelector('.user-toggle');
    document.addEventListener('click', function (e) {
        if (!userMenu) return;
        if (userMenu.contains(e.target)) {
            if (userToggle && userToggle.contains(e.target)) {
                const isOpen = userMenu.classList.toggle('open');
                userToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            }
            return;
        }
        userMenu.classList.remove('open');
        userToggle?.setAttribute('aria-expanded', 'false');
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@stack('scripts')
</body>
</html>
