<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = ClassSchedule::orderByDesc('start_date')
            ->orderByDesc('id')
            ->paginate(20);

        return view('admin.schedules.index', [
            'schedules' => $schedules,
        ]);
    }

    public function create()
    {
        return view('admin.schedules.form', [
            'schedule' => new ClassSchedule(),
            'method' => 'POST',
            'route' => route('admin.schedules.store'),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'schedule' => ['nullable', 'string', 'max:255'],
            'start_date' => ['nullable', 'date'],
            'sessions' => ['nullable', 'integer', 'min:0'],
            'format' => ['nullable', 'string', 'max:255'],
            'cost' => ['nullable', 'numeric', 'min:0'],
            'author' => ['nullable', 'string', 'max:255'],
            'shared_by' => ['nullable', 'string', 'max:255'],
            'status' => ['nullable', 'string', 'max:255'],
            'cover_image' => ['nullable', 'image', 'max:2048'],
            'description' => ['nullable', 'string'],
        ]);
        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('class-schedules', 'public');
            $data['cover_url'] = Storage::url($path);
        }

        ClassSchedule::create($data);

        return redirect()->route('admin.schedules.index')
            ->with('status', 'Lịch học đã được thêm thành công.');
    }

    public function edit(ClassSchedule $schedule)
    {
        return view('admin.schedules.form', [
            'schedule' => $schedule,
            'method' => 'PUT',
            'route' => route('admin.schedules.update', ['schedule' => $schedule->id]),
        ]);
    }

    public function update(Request $request, ClassSchedule $schedule)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'schedule' => ['nullable', 'string', 'max:255'],
            'start_date' => ['nullable', 'date'],
            'sessions' => ['nullable', 'integer', 'min:0'],
            'format' => ['nullable', 'string', 'max:255'],
            'cost' => ['nullable', 'numeric', 'min:0'],
            'author' => ['nullable', 'string', 'max:255'],
            'shared_by' => ['nullable', 'string', 'max:255'],
            'status' => ['nullable', 'string', 'max:255'],
            'cover_image' => ['nullable', 'image', 'max:2048'],
            'description' => ['nullable', 'string'],
        ]);

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('class-schedules', 'public');
            $data['cover_url'] = Storage::url($path);
        } else {
            $data['cover_url'] = $schedule->cover_url;
        }

        $schedule->update($data);

        return redirect()->route('admin.schedules.index')
            ->with('status', 'Thông tin lịch học đã được cập nhật.');
    }

    public function destroy(ClassSchedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('admin.schedules.index')
            ->with('status', 'Lịch học đã được xoá.');
    }
}
