<!doctype html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $__env->yieldContent('title', 'Online-OM'); ?></title>
    </head>
    <body class="min-h-screen bg-slate-50 text-slate-900">
        <header class="border-b bg-white">
            <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">
                <div class="text-lg font-semibold">Online-OM</div>
                <nav class="flex gap-4 text-sm">
                    <a class="hover:underline" href="<?php echo e(route('student.home')); ?>">Hoc vien</a>
                    <a class="hover:underline" href="<?php echo e(route('admin.dashboard')); ?>">Quan tri</a>
                </nav>
            </div>
        </header>
        <main class="mx-auto max-w-6xl px-6 py-10">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\online-om\resources\views\layouts\app.blade.php ENDPATH**/ ?>