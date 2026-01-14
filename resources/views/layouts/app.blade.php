<!doctype html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Online-OM')</title>
    </head>
    <body class="min-h-screen bg-slate-50 text-slate-900">
        <header class="border-b bg-white">
            <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">
                <div class="text-lg font-semibold">Online-OM</div>
                <nav class="flex gap-4 text-sm">
                    <a class="hover:underline" href="{{ route('student.home') }}">Hoc vien</a>
                    <a class="hover:underline" href="{{ route('admin.dashboard') }}">Quan tri</a>
                </nav>
            </div>
        </header>
        <main class="mx-auto max-w-6xl px-6 py-10">
            @yield('content')
        </main>
    </body>
</html>
