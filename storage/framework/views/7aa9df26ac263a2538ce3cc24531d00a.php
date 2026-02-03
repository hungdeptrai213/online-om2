<?php $__env->startSection('title', 'Tạo tài liệu'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-card">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:18px;">
            <div>
                <h2 style="margin:0;">Tạo tài liệu mới</h2>
                <div class="muted">Điền đầy đủ thông tin để quản lý tài liệu</div>
            </div>
        </div>

        <form method="post" action="<?php echo e(route('admin.documents.store')); ?>" enctype="multipart/form-data" style="display:grid;gap:16px;">
            <?php echo csrf_field(); ?>
            <div style="display:grid;gap:6px;">
                <label for="title">Tiêu đề</label>
                <input id="title" name="title" type="text" value="<?php echo e(old('title')); ?>"
                       placeholder="VD: Content Strategy Workbook"
                       style="padding:10px 12px;border:1px solid #ced4da;border-radius:8px;">
                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div style="color:#d92a1c;font-size:13px;"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div style="display:grid;gap:6px;">
                <label for="description">Mô tả</label>
                <textarea id="description" name="description" rows="4"
                          placeholder="Tóm tắt ngắn gọn nội dung tài liệu, mục tiêu học liệu..."
                          style="padding:10px 12px;border:1px solid #ced4da;border-radius:8px;"><?php echo e(old('description')); ?></textarea>
                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div style="color:#d92a1c;font-size:13px;"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div style="display:grid;gap:6px;">
                <label for="thumbnail_upload">Ảnh bìa nhỏ (upload)</label>
                <input id="thumbnail_upload" name="thumbnail_upload" type="file" accept="image/*"
                       style="padding:10px 12px;border:1px solid #ced4da;border-radius:8px;background:#fff;">
                <div class="muted" style="font-size:13px;">Định dạng: jpg, png, webp. Tối đa 2MB.</div>
                <?php $__errorArgs = ['thumbnail_upload'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div style="color:#d92a1c;font-size:13px;"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div style="display:grid;gap:6px;">
                <label for="link_upload">File tài liệu (PDF)</label>
                <input id="link_upload" name="link_upload" type="file" accept="application/pdf"
                       style="padding:10px 12px;border:1px solid #ced4da;border-radius:8px;background:#fff;">
                <div class="muted" style="font-size:13px;">Chỉ PDF, dung lượng tối đa 50MB.</div>
                <?php $__errorArgs = ['link_upload'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div style="color:#d92a1c;font-size:13px;"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div style="display:grid;gap:6px;">
                <label for="price">Giá (VNĐ)</label>
                <input id="price" name="price" type="number" min="0" step="0.01" value="<?php echo e(old('price', 0)); ?>"
                       placeholder="0 cho tài liệu miễn phí"
                       style="padding:10px 12px;border:1px solid #ced4da;border-radius:8px;">
                <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div style="color:#d92a1c;font-size:13px;"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div style="display:grid;gap:6px;">
                <label for="published_at">Ngày tháng</label>
                <input id="published_at" name="published_at" type="date" value="<?php echo e(old('published_at')); ?>"
                       placeholder="YYYY-MM-DD"
                       style="padding:10px 12px;border:1px solid #ced4da;border-radius:8px;">
            </div>
            <div style="display:grid;gap:6px;">
                <label for="topic_ids">Chủ đề (có thể chọn nhiều)</label>
                <select id="topic_ids" name="topic_ids[]" multiple size="5"
                        style="padding:10px 12px;border:1px solid #ced4da;border-radius:8px;">
                    <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($topic->id); ?>" <?php if(in_array($topic->id, old('topic_ids', []))): echo 'selected'; endif; ?>><?php echo e($topic->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div style="display:grid;gap:6px;">
                <label for="new_topics">Chủ đề mới (phân cách bằng dấu phẩy)</label>
                <input id="new_topics" name="new_topics" type="text" value="<?php echo e(old('new_topics')); ?>"
                       placeholder="Marketing, Content, Branding..."
                       style="padding:10px 12px;border:1px solid #ced4da;border-radius:8px;">
            </div>

            <button type="submit" class="btn-dark" style="align-self:flex-start;">Lưu tài liệu</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\online-om\resources\views/admin/documents/create.blade.php ENDPATH**/ ?>