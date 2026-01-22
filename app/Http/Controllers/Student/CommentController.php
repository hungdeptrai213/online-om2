<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $student = $request->user('student');
        if (!$student) {
            return redirect()->route('student.login');
        }

        $data = $request->validate([
            'course_id' => ['required', 'integer', 'exists:courses,id'],
            'lesson_id' => ['nullable', 'integer', 'exists:lessons,id'],
            'parent_id' => ['nullable', 'integer', 'exists:comments,id'],
            'content' => ['required', 'string', 'max:2000'],
        ]);

        $course = Course::findOrFail($data['course_id']);
        $lesson = isset($data['lesson_id']) ? Lesson::findOrFail($data['lesson_id']) : null;

        Comment::create([
            'student_id' => $student->id,
            'course_id' => $course->id,
            'lesson_id' => $lesson?->id,
            'parent_id' => $data['parent_id'] ?? null,
            'content' => $data['content'],
        ]);

        return back()->with('status', 'Đã gửi bình luận.');
    }
}
