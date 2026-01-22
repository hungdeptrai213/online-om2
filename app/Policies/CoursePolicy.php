<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\Student;
use App\Models\User;

class CoursePolicy
{
    public function view(?object $user, Course $course): bool
    {
        if ($course->isFree()) {
            return true;
        }

        if ($user instanceof User) {
            return true;
        }

        if ($user instanceof Student) {
            return $user->hasCourseAccess($course);
        }

        return false;
    }
}
