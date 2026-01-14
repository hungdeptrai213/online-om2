<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Student\HomeController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Student\AuthController as StudentAuthController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\Admin\CourseCategoryController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\CourseContentController;
use App\Http\Controllers\Admin\ProfileController;

Route::get('/', [HomeController::class, 'index'])->name('student.home');
Route::get('/coaching', [HomeController::class, 'coaching'])->name('student.coaching');
Route::get('/lich-hoc', [HomeController::class, 'schedule'])->name('student.schedule');
Route::get('/tai-lieu', [HomeController::class, 'materials'])->name('student.materials');
Route::get('/goi-doanh-nghiep', [HomeController::class, 'enterprise'])->name('student.enterprise');
Route::get('/khoa-hoc/chi-tiet', [HomeController::class, 'courseDetail'])->name('student.course-detail');
Route::get('/gio-hang', [HomeController::class, 'cart'])->name('student.cart');

Route::middleware('guest:student')->group(function () {
    Route::get('/dang-nhap', [StudentAuthController::class, 'showLoginForm'])->name('student.login');
    Route::post('/dang-nhap', [StudentAuthController::class, 'login'])->name('student.login.submit');
});

Route::post('/dang-xuat', [StudentAuthController::class, 'logout'])
    ->middleware('auth:student')
    ->name('student.logout');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:web')->group(function () {
        Route::get('/dang-nhap', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/dang-nhap', [AdminAuthController::class, 'login'])->name('login.submit');
    });

    Route::middleware('admin.auth:web')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/dang-xuat', [AdminAuthController::class, 'logout'])->name('logout');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::resource('users', AdminUserController::class)->names('users');
        Route::resource('students', AdminStudentController::class)->names('students');
        Route::resource('categories', CourseCategoryController::class)->names('categories');
        Route::resource('courses', AdminCourseController::class)->names('courses');
        Route::get('courses/{course}/content', [CourseContentController::class, 'index'])->name('courses.content');
        Route::post('courses/{course}/chapters', [CourseContentController::class, 'storeChapter'])->name('courses.chapters.store');
        Route::post('courses/{course}/chapters/{chapter}/lessons', [CourseContentController::class, 'storeLesson'])->name('courses.lessons.store');
        Route::put('courses/{course}/chapters/{chapter}', [CourseContentController::class, 'updateChapter'])->name('courses.chapters.update');
        Route::delete('courses/{course}/chapters/{chapter}', [CourseContentController::class, 'destroyChapter'])->name('courses.chapters.destroy');
        Route::put('courses/{course}/chapters/{chapter}/lessons/{lesson}', [CourseContentController::class, 'updateLesson'])->name('courses.lessons.update');
        Route::delete('courses/{course}/chapters/{chapter}/lessons/{lesson}', [CourseContentController::class, 'destroyLesson'])->name('courses.lessons.destroy');
    });
});
