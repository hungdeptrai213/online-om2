<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use App\Services\EnrollmentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StudentCourseController extends Controller
{
    public function __construct(private readonly EnrollmentService $enrollmentService)
    {
    }

    public function list(Student $student): JsonResponse
    {
        $courses = Course::orderBy('title')->get(['id', 'title', 'price', 'sale_price']);
        $owned = $student->getOwnedCourseIds();

        $courses = $courses->map(function (Course $course) {
            $price = $course->sale_price ?? $course->price ?? 0;
            $course->price_text = $price > 0 ? number_format($price, 0, ',', '.') . ' VNĐ' : 'Miễn phí';
            return $course;
        });

        return response()->json([
            'courses' => $courses,
            'owned' => $owned,
        ]);
    }

    public function sync(Request $request, Student $student): JsonResponse
    {
        $data = $request->validate([
            'course_ids' => ['array'],
            'course_ids.*' => ['integer', 'exists:courses,id'],
        ]);

        $ids = $data['course_ids'] ?? [];
        $student->courses()->sync($ids);
        $student->forgetCourseAccessCache();

        return response()->json([
            'message' => 'Đã cập nhật phân quyền khóa học cho học viên.',
        ]);
    }

    public function store(Request $request, Student $student, Course $course): JsonResponse
    {
        if ($student->hasCourseAccess($course)) {
            return response()->json(['message' => 'Sinh viên đã có quyền truy cập khóa học.'], 200);
        }

        $this->enrollmentService->grantCourse($student, $course, 'admin');

        return response()->json(['message' => 'Đã cấp quyền khóa học cho sinh viên.'], 201);
    }

    public function destroy(Request $request, Student $student, Course $course): JsonResponse
    {
        $this->enrollmentService->revokeCourse($student, $course);

        return response()->json(['message' => 'Đã thu hồi quyền khóa học của sinh viên.']);
    }
}
