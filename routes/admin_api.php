<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StudentCourseController;

Route::middleware('admin.auth:web')->group(function () {
    Route::get('/students/{student}/courses', [StudentCourseController::class, 'list'])->name('admin.api.students.courses');
    Route::post('/students/{student}/courses', [StudentCourseController::class, 'sync'])->name('admin.api.students.courses.sync');
});
