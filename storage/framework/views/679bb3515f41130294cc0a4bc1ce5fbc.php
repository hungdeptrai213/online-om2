<?php $__env->startSection('title', 'Nội dung khóa học'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-card">
        <div style="display:flex;justify-content:space-between;gap:12px;align-items:center;margin-bottom:14px;">
            <div>
                <h2 style="margin:0;">Nội dung: <?php echo e($course->title); ?></h2>
                <div class="muted">Thêm chương và bài học</div>
            </div>
            <a href="<?php echo e(route('admin.courses.index')); ?>" class="btn-dark" style="background:#f4f6fb;color:#1f2d3d;border:1px solid #e3e8f1;">Quay lại</a>
        </div>

        <?php if(session('msg')): ?>
            <div style="padding:10px 12px;border-radius:10px;background:#e6f7ee;color:#1b7f46;margin-bottom:12px;">
                <?php echo e(session('msg')); ?>

            </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div style="padding:10px 12px;border-radius:10px;border:1px solid #f5c2c7;background:#fdf3f4;color:#842029;margin-bottom:12px;">
                <ul style="margin:0; padding-left:18px;">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <div style="display:grid;gap:12px;margin-bottom:16px;">
            <?php
                $hasChapters = $chapters->isNotEmpty();
            ?>
            <details <?php echo e($hasChapters ? '' : 'open'); ?> style="border:1px solid #e6ecf5;border-radius:10px;padding:12px;">
                <summary style="cursor:pointer;font-weight:800;margin-bottom:12px;display:inline-flex;align-items:center;gap:8px;padding:10px 14px;border-radius:10px;border:1px solid #dbeafe;background:#eef4ff;color:#1d4ed8;box-shadow:0 8px 18px rgba(37,99,235,0.12);">
                    <i class="fa-solid fa-plus"></i> Thêm chương
                </summary>
                <form method="post" action="<?php echo e(route('admin.courses.chapters.store', $course)); ?>" style="display:grid;gap:10px;">
                    <?php echo csrf_field(); ?>
                    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:10px;">
                        <div>
                            <label style="font-weight:700;">Tiêu đề *</label>
                            <input type="text" name="title" required style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;">
                        </div>
                        <div>
                            <label style="font-weight:700;">Vị trí</label>
                            <input type="number" name="position" min="1" style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;">
                        </div>
                    </div>
                    <div>
                        <label style="font-weight:700;">Mô tả</label>
                        <textarea name="description" rows="2" style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn-dark">Lưu chương</button>
                    </div>
                </form>
            </details>
        </div>

        <div style="display:grid;gap:16px;">
            <?php $__empty_1 = true; $__currentLoopData = $chapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div style="border:1px solid #d9e2f3;border-radius:14px;padding:16px;background:linear-gradient(180deg,#f8fbff 0%,#fdfefe 100%);box-shadow:0 12px 30px rgba(17,38,146,0.06);">
                    <div style="display:flex;justify-content:space-between;align-items:flex-start;gap:10px;flex-wrap:wrap;">
                        <div style="display:flex;align-items:flex-start;gap:10px;">
                            <div style="width:90px;height:34px;border-radius:10px;background:#1d4ed8;color:#fff;display:grid;place-items:center;font-weight:800;">Chương <?php echo e($chapter->position); ?></div>
                            <div>
                                <div style="font-weight:800;font-size:16px;color:#0f172a;"><?php echo e($chapter->title); ?></div>
                                <?php if($chapter->description): ?>
                                    <div style="color:#475569;font-size:14px;margin-top:4px;"><?php echo e($chapter->description); ?></div>
                                <?php endif; ?>
                                <div style="color:#94a3b8;font-size:12px;margin-top:4px;">#<?php echo e($chapter->id); ?></div>
                            </div>
                        </div>
                        <div style="display:flex;align-items:center;gap:8px;color:#7183a8;">
                            <details style="display:inline-block;position:relative;">
                                <summary style="list-style:none;display:inline-flex;align-items:center;justify-content:center;width:36px;height:36px;border-radius:10px;border:1px solid #e6ecf5;background:#fff;cursor:pointer;">
                                    <i class="fa-solid fa-pen" style="font-size:14px;color:#1f2d3d;"></i>
                                </summary>
                                <form method="post" action="<?php echo e(route('admin.courses.chapters.update', [$course, $chapter])); ?>" style="position:absolute;right:0;top:44px;z-index:20;display:grid;gap:8px;background:#fff;padding:14px;border:1px solid #dfe6f5;border-radius:12px;min-width:320px;box-shadow:0 18px 40px rgba(17,38,146,0.16);">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <label style="font-weight:700;">Tiêu đề
                                        <input type="text" name="title" value="<?php echo e($chapter->title); ?>" required style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;">
                                    </label>
                                    <label style="font-weight:700;">Vị trí
                                        <input type="number" name="position" value="<?php echo e($chapter->position); ?>" min="1" style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;">
                                    </label>
                                    <label style="font-weight:700;">Mô tả
                                        <textarea name="description" rows="3" style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;"><?php echo e($chapter->description); ?></textarea>
                                    </label>
                                    <button type="submit" class="btn-dark" style="justify-content:center;">Lưu chương</button>
                                </form>
                            </details>
                            <form method="post" action="<?php echo e(route('admin.courses.chapters.destroy', [$course, $chapter])); ?>" onsubmit="return confirm('Xóa chương này và toàn bộ bài học?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" style="width:36px;height:36px;border-radius:10px;border:1px solid #f5c2c7;background:#ffecec;color:#d14343;cursor:pointer;display:inline-flex;align-items:center;justify-content:center;">
                                    <i class="fa-solid fa-trash" style="font-size:15px;"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div style="margin-top:12px;">
                        <details>
                            <summary style="cursor:pointer;font-weight:800;margin-bottom:8px;display:inline-flex;align-items:center;gap:8px;padding:8px 12px;border:1px solid #dbeafe;border-radius:10px;background:#eff6ff;color:#1d4ed8;">
                                <i class="fa-solid fa-plus"></i> Thêm bài học
                            </summary>
                            <form method="post" action="<?php echo e(route('admin.courses.lessons.store', [$course, $chapter])); ?>" style="display:grid;gap:10px;margin-top:8px;">
                                <?php echo csrf_field(); ?>
                                <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:10px;">
                                    <div>
                                        <label style="font-weight:700;">Tiêu đề *</label>
                                        <input type="text" name="title" required style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;">
                                    </div>
                                    <div>
                                        <label style="font-weight:700;">Vị trí</label>
                                        <input type="number" name="position" min="1" style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;">
                                    </div>
                                    <div>
                                        <label style="font-weight:700;">Thời lượng (phút:giây)</label>
                                        <input type="text" name="duration_input" placeholder="vd: 03:55 hoặc 230" style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;">
                                    </div>
                                </div>
                                <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:10px;">
                                    <div>
                                        <label style="font-weight:700;">Video URL</label>
                                        <input type="text" name="video_url" style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;">
                                    </div>
                                    <label style="display:flex;align-items:center;gap:8px;margin-top:24px;font-weight:700;">
                                        <input type="checkbox" name="is_previewable" value="1"> Miễn phí xem trước
                                    </label>
                                </div>
                                <div>
                                    <label style="font-weight:700;">Mô tả</label>
                                    <textarea name="description" rows="2" style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;"></textarea>
                                </div>
                                <div>
                                    <button type="submit" class="btn-dark">Lưu bài học</button>
                                </div>
                            </form>
                        </details>
                    </div>

                    <div style="margin-top:12px; position: relative;">
                        <table style="width:100%;border-collapse:collapse;">
                            <thead>
                            <tr style="background:#f7f8fb;text-align:left;">
                                <th style="padding:10px;border-bottom:1px solid #e6ecf5;">#</th>
                                <th style="padding:10px;border-bottom:1px solid #e6ecf5;">Tiêu đề</th>
                                <th style="padding:10px;border-bottom:1px solid #e6ecf5;">Thời lượng</th>
                                <th style="padding:10px;border-bottom:1px solid #e6ecf5;">Preview</th>
                                <th style="padding:10px;border-bottom:1px solid #e6ecf5;">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__empty_2 = true; $__currentLoopData = $chapter->lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                <?php
                                    $dur = (int)($lesson->duration_seconds ?? 0);
                                    $durFormatted = sprintf('%02d:%02d', intdiv($dur, 60), $dur % 60);
                                    $durStr = sprintf('%02d:%02d', intdiv($dur,60), $dur%60);
                                ?>
                                <tr style="background:<?php echo e($loop->even ? '#f9fbff' : '#ffffff'); ?>;">
                                    <td style="padding:12px;border-bottom:1px solid #f1f2f6;font-weight:700;color:#1f2937;"><?php echo e($lesson->position); ?></td>
                                    <td style="padding:12px;border-bottom:1px solid #f1f2f6;">
                                        <div style="font-weight:800;color:#0f172a;"><?php echo e($lesson->title); ?></div>
                                    </td>
                                    <td style="padding:12px;border-bottom:1px solid #f1f2f6;font-weight:700;color:#0f172a;"><?php echo e($durFormatted); ?> <span style="color:#94a3b8;">(<?php echo e($dur); ?>s)</span></td>
                                    <td style="padding:12px;border-bottom:1px solid #f1f2f6;font-weight:700;color:<?php echo e($lesson->is_previewable ? '#16a34a' : '#dc2626'); ?>;"><?php echo e($lesson->is_previewable ? 'Có' : 'Không'); ?></td>
                                    <td style="padding:12px;border-bottom:1px solid #f1f2f6;position:relative;">
                                        <div style="display:flex;gap:8px;align-items:center;flex-wrap:wrap;">
                                            <details style="display:inline-block;position:relative;">
                                                <summary style="list-style:none;display:inline-flex;align-items:center;justify-content:center;width:32px;height:32px;border-radius:8px;border:1px solid #e6ecf5;background:#fff;cursor:pointer;">
                                                    <i class="fa-solid fa-pen" style="font-size:14px;color:#1f2d3d;"></i>
                                                </summary>
                                                <form method="post" action="<?php echo e(route('admin.courses.lessons.update', [$course, $chapter, $lesson])); ?>" style="position:absolute;right:0;top:38px;z-index:30;display:grid;gap:10px;background:#fff;padding:14px;border:1px solid #dfe6f5;border-radius:12px;min-width:320px;box-shadow:0 18px 40px rgba(17,38,146,0.16);">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PUT'); ?>
                                                    <label style="font-weight:700;">Tiêu đề
                                                        <input type="text" name="title" value="<?php echo e($lesson->title); ?>" required style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;">
                                                    </label>
                                                    <label style="font-weight:700;">Vị trí
                                                        <input type="number" name="position" value="<?php echo e($lesson->position); ?>" min="1" style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;">
                                                    </label>
                                                    <label style="font-weight:700;">Thời lượng (phút:giây)
                                                        <input type="text" name="duration_input" value="<?php echo e($durStr); ?>" style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;">
                                                    </label>
                                                    <label style="font-weight:700;">Video URL
                                                        <input type="text" name="video_url" value="<?php echo e($lesson->video_url); ?>" style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;">
                                                    </label>
                                                    <label style="display:flex;align-items:center;gap:8px;font-weight:700;">
                                                        <input type="checkbox" name="is_previewable" value="1" <?php if($lesson->is_previewable): echo 'checked'; endif; ?>> Miễn phí xem trước
                                                    </label>
                                                    <label style="font-weight:700;">Mô tả
                                                        <textarea name="description" rows="3" style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;"><?php echo e($lesson->description); ?></textarea>
                                                    </label>
                                                    <button type="submit" class="btn-dark" style="justify-content:center;">Lưu</button>
                                                </form>
                                            </details>
                                            <form method="post" action="<?php echo e(route('admin.courses.lessons.destroy', [$course, $chapter, $lesson])); ?>" onsubmit="return confirm('Xóa bài học này?');">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" style="width:32px;height:32px;border-radius:8px;border:1px solid #f5c2c7;background:#ffecec;color:#d14343;cursor:pointer;display:inline-flex;align-items:center;justify-content:center;">
                                                    <i class="fa-solid fa-trash" style="font-size:13px;"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                <tr>
                                    <td colspan="5" style="padding:10px;text-align:center;color:#8ea0c1;">Chưa có bài học</td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div style="padding:14px;border:1px dashed #e3e8f1;border-radius:12px;text-align:center;color:#8ea0c1;">
                    Chưa có chương nào. Thêm chương mới ở trên.
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\online-om\resources\views/admin/courses/content.blade.php ENDPATH**/ ?>