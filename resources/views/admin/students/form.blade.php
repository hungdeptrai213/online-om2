@csrf
<div style="display:grid;gap:14px;">
    <div>
        <label for="name" style="font-weight:600;">Tên</label>
        <input id="name" type="text" name="name" value="{{ old('name', $student->name ?? '') }}" required
               style="width:100%;padding:12px 14px;border:1px solid #e3e8f1;border-radius:8px;margin-top:6px;">
        @error('name')<div class="text-danger" style="color:#d14343;margin-top:6px;">{{ $message }}</div>@enderror
    </div>
    <div>
        <label for="email" style="font-weight:600;">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email', $student->email ?? '') }}" required
               style="width:100%;padding:12px 14px;border:1px solid #e3e8f1;border-radius:8px;margin-top:6px;">
        @error('email')<div class="text-danger" style="color:#d14343;margin-top:6px;">{{ $message }}</div>@enderror
    </div>
    <div>
        <label for="phone" style="font-weight:600;">Số điện thoại</label>
        <input id="phone" type="text" name="phone" value="{{ old('phone', $student->phone ?? '') }}"
               style="width:100%;padding:12px 14px;border:1px solid #e3e8f1;border-radius:8px;margin-top:6px;">
        @error('phone')<div class="text-danger" style="color:#d14343;margin-top:6px;">{{ $message }}</div>@enderror
    </div>
    <div>
        <label for="password" style="font-weight:600;">Mật khẩu</label>
        <input id="password" type="password" name="password"
               @if(!isset($student)) required @endif
               style="width:100%;padding:12px 14px;border:1px solid #e3e8f1;border-radius:8px;margin-top:6px;"
               placeholder="{{ isset($student) ? 'Để trống nếu không đổi' : '' }}">
        @error('password')<div class="text-danger" style="color:#d14343;margin-top:6px;">{{ $message }}</div>@enderror
    </div>
</div>
<div style="margin-top:18px;display:flex;gap:10px;">
    <button type="submit" class="btn-dark">{{ $buttonText }}</button>
    <a href="{{ route('admin.students.index') }}" style="padding:10px 16px;border-radius:8px;border:1px solid #e3e8f1;color:#1f2d3d;text-decoration:none;">Hủy</a>
</div>
