<?php

namespace App\Services;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Support\Carbon;

class EnrollmentService
{
    public function grantCourse(Student $student, Course $course, ?string $source = 'order', ?Carbon $expiresAt = null): void
    {
        $student->grantCourseAccess($course, $source, $expiresAt);
    }

    public function revokeCourse(Student $student, Course $course): void
    {
        $student->revokeCourseAccess($course);
    }
}
