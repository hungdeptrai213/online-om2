<?php echo csrf_field(); ?>
<div style="display:grid;gap:14px;">
    <div>
        <label for="name" style="font-weight:600;">Tên danh mục</label>
        <input id="name" type="text" name="name" value="<?php echo e(old('name', $category->name ?? '')); ?>" required
               style="width:100%;padding:12px 14px;border:1px solid #e3e8f1;border-radius:8px;margin-top:6px;">
        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger" style="color:#d14343;margin-top:6px;"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div>
        <label for="slug" style="font-weight:600;">Slug (tùy chọn)</label>
        <input id="slug" type="text" name="slug" value="<?php echo e(old('slug', $category->slug ?? '')); ?>"
               style="width:100%;padding:12px 14px;border:1px solid #e3e8f1;border-radius:8px;margin-top:6px;">
        <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger" style="color:#d14343;margin-top:6px;"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div>
        <label for="parent_id" style="font-weight:600;">Danh mục cha</label>
        <select id="parent_id" name="parent_id"
                style="width:100%;padding:12px 14px;border:1px solid #e3e8f1;border-radius:8px;margin-top:6px;">
            <option value="">-- Không có --</option>
            <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($parent->id); ?>" <?php if(old('parent_id', $category->parent_id ?? '') == $parent->id): echo 'selected'; endif; ?>><?php echo e($parent->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php $__errorArgs = ['parent_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger" style="color:#d14343;margin-top:6px;"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div>
        <label for="description" style="font-weight:600;">Mô tả</label>
        <textarea id="description" name="description" rows="3"
                  style="width:100%;padding:12px 14px;border:1px solid #e3e8f1;border-radius:8px;margin-top:6px;"><?php echo e(old('description', $category->description ?? '')); ?></textarea>
        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger" style="color:#d14343;margin-top:6px;"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
</div>
<div style="margin-top:18px;display:flex;gap:10px;">
    <button type="submit" class="btn-dark"><?php echo e($buttonText); ?></button>
    <a href="<?php echo e(route('admin.categories.index')); ?>" style="padding:10px 16px;border-radius:8px;border:1px solid #e3e8f1;color:#1f2d3d;text-decoration:none;">Hủy</a>
</div>
<?php /**PATH C:\xampp\htdocs\online-om\resources\views\admin\categories\form.blade.php ENDPATH**/ ?>