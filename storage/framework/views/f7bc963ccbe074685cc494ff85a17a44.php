<?php $__env->startSection('title', 'Khóa học'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-card">
        <div style="display:flex;justify-content:space-between;gap:12px;align-items:center;margin-bottom:14px;">
            <div>
                <h2 style="margin:0;">Khóa học</h2>
                <div class="muted">Danh sách khóa học (courses)</div>
            </div>
            <a href="<?php echo e(route('admin.courses.create')); ?>" class="btn-dark">+ Thêm mới</a>
        </div>

        <?php if(session('msg')): ?>
            <div style="padding:10px 12px;border-radius:10px;background:#e6f7ee;color:#1b7f46;margin-bottom:12px;">
                <?php echo e(session('msg')); ?>

            </div>
        <?php endif; ?>

        <form method="get" style="display:flex;justify-content:flex-end;gap:10px;align-items:center;margin-bottom:14px;flex-wrap:wrap;">
            <input type="text" name="q" value="<?php echo e(request('q')); ?>" placeholder="Tìm theo tiêu đề, slug, tác giả"
                   style="padding:10px 12px;border:1px solid #e3e8f1;border-radius:6px;min-width:240px;">
            <select name="category_id" style="padding:10px 12px;border:1px solid #e3e8f1;border-radius:6px;min-width:180px;">
                <option value="">Danh mục</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cat->id); ?>" <?php if(request('category_id') == $cat->id): echo 'selected'; endif; ?>><?php echo e($cat->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <select name="status" style="padding:10px 12px;border:1px solid #e3e8f1;border-radius:6px;min-width:160px;">
                <option value="">Trạng thái</option>
                <option value="draft" <?php if(request('status')==='draft'): echo 'selected'; endif; ?>>Nháp</option>
                <option value="published" <?php if(request('status')==='published'): echo 'selected'; endif; ?>>Xuất bản</option>
                <option value="archived" <?php if(request('status')==='archived'): echo 'selected'; endif; ?>>Lưu trữ</option>
            </select>
            <button type="submit" class="btn-dark" style="padding:9px 14px;border-radius:6px;">Lọc</button>
            <a href="<?php echo e(route('admin.courses.index')); ?>" style="color:#1f2d3d;text-decoration:none;">Xóa lọc</a>
        </form>

        <div style="overflow:auto;">
            <table style="width:100%;border-collapse:collapse;">
                <thead>
                <tr style="background:#f7f8fb;text-align:left;">
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">#</th>
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">Tiêu đề</th>
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">Danh mục</th>
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">Giá</th>
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">Trạng thái</th>
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">Ngày tạo</th>
                    <th style="padding:12px;border-bottom:1px solid #e6ecf5;">Hành động</th>
                </tr>
                </thead>
                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;"><?php echo e($course->id); ?></td>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;">
                            <div style="font-weight:700;color:#1f2d3d;"><?php echo e($course->title); ?></div>
                            <?php if($course->author): ?>
                                <div style="color:#8ea0c1;font-size:13px;">Tác giả: <?php echo e($course->author); ?></div>
                            <?php endif; ?>
                        </td>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;"><?php echo e($course->category?->name ?? '—'); ?></td>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;">
                            <div style="font-weight:700;"><?php echo e(number_format((float)$course->price, 0, ',', '.')); ?>đ</div>
                            <?php if($course->sale_price): ?>
                                <div style="color:#dc2626;font-size:13px;">Sale: <?php echo e(number_format((float)$course->sale_price, 0, ',', '.')); ?>đ</div>
                            <?php endif; ?>
                        </td>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;">
                            <?php
                                $statusLabel = ['draft' => 'Nháp', 'published' => 'Xuất bản', 'archived' => 'Lưu trữ'][$course->status] ?? $course->status;
                                $statusColor = match($course->status) {
                                    'published' => ['#e6f7ee', '#1b7f46'],
                                    'archived' => ['#f3f4f6', '#4b5563'],
                                    default => ['#fff4e5', '#a36100'],
                                };
                            ?>
                            <span style="background:<?php echo e($statusColor[0]); ?>;color:<?php echo e($statusColor[1]); ?>;padding:4px 8px;border-radius:8px;font-size:12px;">
                                <?php echo e($statusLabel); ?>

                            </span>
                        </td>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;"><?php echo e($course->created_at?->format('d/m/Y')); ?></td>
                        <td style="padding:12px;border-bottom:1px solid #f1f2f6;display:flex;gap:10px;flex-wrap:wrap;align-items:center;">
                            <a href="<?php echo e(route('admin.courses.content', $course)); ?>" style="padding:9px 14px;border-radius:9px;border:1px solid #0ea5e9;background:linear-gradient(135deg,#0ea5e9,#0284c7);color:#fff;text-decoration:none;font-weight:800;box-shadow:0 8px 18px rgba(8,145,178,0.25);">
                                Bài học
                            </a>
                            <a href="<?php echo e(route('admin.courses.edit', $course)); ?>" style="width:36px;height:36px;border-radius:10px;border:1px solid #e6ecf5;text-decoration:none;display:inline-flex;align-items:center;justify-content:center;background:#fff;">
                                <i class="fa-solid fa-pen" style="font-size:14px;color:#1f2d3d;"></i>
                            </a>
                            <form action="<?php echo e(route('admin.courses.destroy', $course)); ?>" method="post" onsubmit="return confirm('Xóa khóa học này?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('delete'); ?>
                                <button type="submit" style="width:36px;height:36px;border-radius:10px;border:1px solid #f5c2c7;background:#ffecec;color:#d14343;cursor:pointer;display:inline-flex;align-items:center;justify-content:center;">
                                    <i class="fa-solid fa-trash" style="font-size:15px;"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" style="padding:14px;text-align:center;color:#1f2d3d;">Không có khóa học phù hợp.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div style="margin-top:12px;">
            <?php echo e($courses->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\online-om\resources\views\admin\courses\index.blade.php ENDPATH**/ ?>