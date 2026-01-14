<?php $__env->startSection('title', 'Sửa khóa học'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-card" style="max-width: 900px; margin: 0 auto;">
        <div style="display:flex;justify-content:space-between;gap:12px;align-items:center;margin-bottom:14px;">
            <div>
                <h2 style="margin:0;">Sửa khóa học</h2>
                <div class="muted">Cập nhật thông tin khóa học</div>
            </div>
            <a href="<?php echo e(route('admin.courses.index')); ?>" class="btn-dark" style="background:#f4f6fb;color:#1f2d3d;border:1px solid #e3e8f1;">Quay lại</a>
        </div>

        <?php if($errors->any()): ?>
            <div style="padding:10px 12px;border-radius:10px;border:1px solid #f5c2c7;background:#fdf3f4;color:#842029;margin-bottom:12px;">
                <ul style="margin:0; padding-left:18px;">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="post" action="<?php echo e(route('admin.courses.update', $course)); ?>" enctype="multipart/form-data" style="display:grid;gap:14px;">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div style="display:grid;gap:12px;">
                <div>
                    <label style="font-weight:700;">Tiêu đề *</label>
                    <input type="text" name="title" value="<?php echo e(old('title', $course->title)); ?>" required
                           style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;">
                </div>
                <div>
                    <label style="font-weight:700;">Slug</label>
                    <input type="text" name="slug" value="<?php echo e(old('slug', $course->slug)); ?>"
                           style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;">
                </div>
            </div>

            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:12px;">
                <div>
                    <label style="font-weight:700;">Danh mục</label>
                    <select name="course_category_id" style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;">
                        <option value="">-- Chọn danh mục --</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cat->id); ?>" <?php if(old('course_category_id', $course->course_category_id)==$cat->id): echo 'selected'; endif; ?>><?php echo e($cat->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div>
                    <label style="font-weight:700;">Giá *</label>
                    <input type="number" step="0.01" min="0" name="price" value="<?php echo e(old('price', $course->price)); ?>" required
                           style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;">
                </div>
                <div>
                    <label style="font-weight:700;">Giá khuyến mãi</label>
                    <input type="number" step="0.01" min="0" name="sale_price" value="<?php echo e(old('sale_price', $course->sale_price)); ?>"
                           style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;">
                </div>
                <div>
                    <label style="font-weight:700;">Trạng thái *</label>
                    <select name="status" required style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;">
                        <option value="draft" <?php if(old('status',$course->status)==='draft'): echo 'selected'; endif; ?>>Nháp</option>
                        <option value="published" <?php if(old('status',$course->status)==='published'): echo 'selected'; endif; ?>>Xuất bản</option>
                        <option value="archived" <?php if(old('status',$course->status)==='archived'): echo 'selected'; endif; ?>>Lưu trữ</option>
                    </select>
                </div>
                <div>
                    <label style="font-weight:700;">Ngày xuất bản</label>
                    <input type="datetime-local" name="published_at" value="<?php echo e(old('published_at', optional($course->published_at)->format('Y-m-d\TH:i'))); ?>"
                           style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;">
                </div>
            </div>

            <?php
                $thumb = $course->thumbnail;
                $thumbUrl = '';
                if ($thumb) {
                    $thumbUrl = \Illuminate\Support\Str::startsWith($thumb, ['http://', 'https://'])
                        ? $thumb
                        : asset($thumb);
                }
            ?>
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:12px;">
                <div>
                    <label style="font-weight:700;">Tác giả</label>
                    <input type="text" name="author" value="<?php echo e(old('author', $course->author)); ?>"
                           style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;">
                </div>
                <div>
                    <label style="font-weight:700;">Ảnh thumbnail</label>
                    <input id="thumbInput" type="file" name="thumbnail_upload" accept="image/*" style="display:none;">
                    <label for="thumbInput" style="margin-top:6px;display:inline-flex;align-items:center;gap:8px;padding:10px 14px;border:1px solid #e3e8f1;border-radius:10px;background:#f8fafc;cursor:pointer;">
                        <i class="fa-solid fa-image"></i> <span id="thumbFileName"><?php echo e($thumbUrl ? basename($thumbUrl) : 'Chọn ảnh'); ?></span>
                    </label>
                    <div style="margin-top:8px;">
                        <img id="thumbPreview" src="<?php echo e($thumbUrl); ?>" alt="Preview"
                             data-has-initial="<?php echo e($thumbUrl ? '1' : ''); ?>"
                             style="max-width:200px;border-radius:10px;<?php echo e($thumbUrl ? '' : 'display:none;'); ?>border:1px solid #e6ecf5;padding:4px;">
                    </div>
                </div>
            </div>

            <div>
                <label style="font-weight:700;">Mô tả ngắn</label>
                <textarea name="short_description" rows="3" style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;"><?php echo e(old('short_description', $course->short_description)); ?></textarea>
            </div>

            <div>
                <label style="font-weight:700;">Nội dung chi tiết</label>
                <textarea name="description" rows="6" style="width:100%;margin-top:6px;padding:10px 12px;border:1px solid #e3e8f1;border-radius:10px;"><?php echo e(old('description', $course->description)); ?></textarea>
            </div>

            <div style="display:flex;gap:10px;">
                <button type="submit" class="btn-dark">Lưu thay đổi</button>
                <a href="<?php echo e(route('admin.courses.index')); ?>" style="padding:10px 14px;border-radius:10px;border:1px solid #e3e8f1;text-decoration:none;">Hủy</a>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    (function() {
        const input = document.querySelector('input[name="thumbnail_upload"]');
        const preview = document.getElementById('thumbPreview');
        const fileName = document.getElementById('thumbFileName');
        if (input) {
            input.addEventListener('change', function () {
                const file = this.files?.[0];
                if (!file) {
                    if (!preview.dataset.hasInitial) {
                        preview.style.display = 'none';
                        preview.src = '';
                    }
                    if (fileName && !preview.dataset.hasInitial) fileName.textContent = 'Chọn ảnh';
                    return;
                }
                if (fileName) fileName.textContent = file.name;
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            });
        }
    })();
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\online-om\resources\views\admin\courses\edit.blade.php ENDPATH**/ ?>