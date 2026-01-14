<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseChapter;
use App\Models\Lesson;
use Illuminate\Http\Request;

class CourseContentController extends Controller
{
    public function index(Course $course)
    {
        $chapters = CourseChapter::with(['lessons' => function ($q) {
            $q->orderBy('position');
        }])->where('course_id', $course->id)->orderBy('position')->get();

        return view('admin.courses.content', compact('course', 'chapters'));
    }

    public function storeChapter(Request $request, Course $course)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'position' => ['nullable', 'integer', 'min:1'],
        ]);

        $data['course_id'] = $course->id;
        $data['position'] = $data['position'] ?? ($course->chapters()->max('position') + 1 ?? 1);

        CourseChapter::create($data);

        return redirect()->route('admin.courses.content', $course)->with('msg', 'Thêm chương thành công.');
    }

    public function storeLesson(Request $request, Course $course, CourseChapter $chapter)
    {
        abort_unless($chapter->course_id === $course->id, 404);

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'duration_input' => ['nullable', 'string', 'max:20'],
            'video_url' => ['nullable', 'string', 'max:2000'],
            'is_previewable' => ['nullable', 'boolean'],
            'position' => ['nullable', 'integer', 'min:1'],
        ]);

        $data['course_chapter_id'] = $chapter->id;
        $data['is_previewable'] = $request->boolean('is_previewable');
        $data['position'] = $data['position'] ?? ($chapter->lessons()->max('position') + 1 ?? 1);
        $data['duration_seconds'] = $this->parseDurationSeconds($data['duration_input'] ?? null);
        unset($data['duration_input']);

        Lesson::create($data);

        return redirect()->route('admin.courses.content', $course)->with('msg', 'Thêm bài học thành công.');
    }

    public function updateChapter(Request $request, Course $course, CourseChapter $chapter)
    {
        abort_unless($chapter->course_id === $course->id, 404);

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'position' => ['nullable', 'integer', 'min:1'],
        ]);

        $chapter->update($data);

        return redirect()->route('admin.courses.content', $course)->with('msg', 'Cập nhật chương thành công.');
    }

    public function destroyChapter(Course $course, CourseChapter $chapter)
    {
        abort_unless($chapter->course_id === $course->id, 404);

        $chapter->delete();

        return redirect()->route('admin.courses.content', $course)->with('msg', 'Đã xóa chương cùng các bài học.');
    }

    public function updateLesson(Request $request, Course $course, CourseChapter $chapter, Lesson $lesson)
    {
        abort_unless($chapter->course_id === $course->id && $lesson->course_chapter_id === $chapter->id, 404);

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'duration_input' => ['nullable', 'string', 'max:20'],
            'video_url' => ['nullable', 'string', 'max:2000'],
            'is_previewable' => ['nullable', 'boolean'],
            'position' => ['nullable', 'integer', 'min:1'],
        ]);

        $data['is_previewable'] = $request->boolean('is_previewable');
        $data['duration_seconds'] = $this->parseDurationSeconds($data['duration_input'] ?? null);
        unset($data['duration_input']);

        $lesson->update($data);

        return redirect()->route('admin.courses.content', $course)->with('msg', 'Cập nhật bài học thành công.');
    }

    public function destroyLesson(Course $course, CourseChapter $chapter, Lesson $lesson)
    {
        abort_unless($chapter->course_id === $course->id && $lesson->course_chapter_id === $chapter->id, 404);

        $lesson->delete();

        return redirect()->route('admin.courses.content', $course)->with('msg', 'Đã xóa bài học.');
    }

    private function parseDurationSeconds(?string $value): ?int
    {
        if (!$value) {
            return null;
        }

        $value = trim($value);

        // If pure numeric, treat as seconds
        if (ctype_digit($value)) {
            return (int)$value;
        }

        // Accept mm:ss or hh:mm:ss
        $parts = array_map('trim', explode(':', $value));
        if (count($parts) === 2) {
            [$m, $s] = $parts;
            if (ctype_digit($m) && ctype_digit($s)) {
                return ((int)$m) * 60 + (int)$s;
            }
        }
        if (count($parts) === 3) {
            [$h, $m, $s] = $parts;
            if (ctype_digit($h) && ctype_digit($m) && ctype_digit($s)) {
                return ((int)$h) * 3600 + ((int)$m) * 60 + (int)$s;
            }
        }

        return null;
    }
}
