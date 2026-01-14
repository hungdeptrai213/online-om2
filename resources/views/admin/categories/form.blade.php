@csrf
<div style="display:grid;gap:14px;">
    <div>
        <label for="name" style="font-weight:600;">Tên danh mục</label>
        <input id="name" type="text" name="name" value="{{ old('name', $category->name ?? '') }}" required
               style="width:100%;padding:12px 14px;border:1px solid #e3e8f1;border-radius:8px;margin-top:6px;">
        @error('name')<div class="text-danger" style="color:#d14343;margin-top:6px;">{{ $message }}</div>@enderror
    </div>
    <div>
        <label for="slug" style="font-weight:600;">Slug (tùy chọn)</label>
        <input id="slug" type="text" name="slug" value="{{ old('slug', $category->slug ?? '') }}"
               style="width:100%;padding:12px 14px;border:1px solid #e3e8f1;border-radius:8px;margin-top:6px;">
        @error('slug')<div class="text-danger" style="color:#d14343;margin-top:6px;">{{ $message }}</div>@enderror
    </div>
    <div>
        <label for="parent_id" style="font-weight:600;">Danh mục cha</label>
        <select id="parent_id" name="parent_id"
                style="width:100%;padding:12px 14px;border:1px solid #e3e8f1;border-radius:8px;margin-top:6px;">
            <option value="">-- Không có --</option>
            @foreach($parents as $parent)
                <option value="{{ $parent->id }}" @selected(old('parent_id', $category->parent_id ?? '') == $parent->id)>{{ $parent->name }}</option>
            @endforeach
        </select>
        @error('parent_id')<div class="text-danger" style="color:#d14343;margin-top:6px;">{{ $message }}</div>@enderror
    </div>
    <div>
        <label for="description" style="font-weight:600;">Mô tả</label>
        <textarea id="description" name="description" rows="3"
                  style="width:100%;padding:12px 14px;border:1px solid #e3e8f1;border-radius:8px;margin-top:6px;">{{ old('description', $category->description ?? '') }}</textarea>
        @error('description')<div class="text-danger" style="color:#d14343;margin-top:6px;">{{ $message }}</div>@enderror
    </div>
</div>
<div style="margin-top:18px;display:flex;gap:10px;">
    <button type="submit" class="btn-dark">{{ $buttonText }}</button>
    <a href="{{ route('admin.categories.index') }}" style="padding:10px 16px;border-radius:8px;border:1px solid #e3e8f1;color:#1f2d3d;text-decoration:none;">Hủy</a>
</div>
