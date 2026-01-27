<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Student\DocumentPurchaseController;
use App\Http\Controllers\Student\HomeController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Student\AuthController as StudentAuthController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\Admin\CourseCategoryController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\CourseContentController;
use App\Http\Controllers\Admin\FormSubmissionController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\StudentCourseController as AdminStudentCourseController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\DocumentTopicController;
use App\Http\Controllers\Admin\RegistrationController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Student\CheckoutController;
use App\Http\Controllers\Student\CommentController;

Route::get('/', [HomeController::class, 'index'])->name('student.home');
Route::get('/coaching', [HomeController::class, 'coaching'])->name('student.coaching');
Route::post('/coaching', [HomeController::class, 'submitCoaching'])->name('student.coaching.submit');
Route::get('/lich-hoc', [HomeController::class, 'schedule'])->name('student.schedule');
Route::get('/tai-lieu', [HomeController::class, 'materials'])->name('student.materials');
Route::get('/tai-lieu/{document}/gio-hang', [DocumentPurchaseController::class, 'show'])->name('student.documents.cart');
Route::post('/tai-lieu/{document}/gio-hang/xac-nhan', [DocumentPurchaseController::class, 'confirm'])->name('student.documents.cart.confirm');
Route::get('/goi-doanh-nghiep', [HomeController::class, 'enterprise'])->name('student.enterprise');
Route::post('/goi-doanh-nghiep', [HomeController::class, 'submitEnterprise'])->name('student.enterprise.submit');
Route::post('/teach', [HomeController::class, 'submitTeach'])->name('student.teach.submit');
Route::get('/khoa-hoc/chi-tiet', [HomeController::class, 'courseDetail'])->name('student.course-detail');
    Route::middleware('auth:student')->group(function () {
        Route::get('/gio-hang', [HomeController::class, 'cart'])->name('student.cart');
        Route::post('/gio-hang/xac-nhan', [CheckoutController::class, 'confirm'])->name('student.cart.confirm');
    Route::get('/ho-so', [HomeController::class, 'profile'])->name('student.profile');
    Route::get('/khoa-hoc-cua-toi', [HomeController::class, 'myCourses'])->name('student.my-courses');
    Route::post('/ho-so', [HomeController::class, 'updateProfile'])->name('student.profile.update');
    Route::get('/khoa-hoc/hoc/{course}/{lesson?}', [HomeController::class, 'learn'])->name('student.course.learn');
    Route::post('/comments', [CommentController::class, 'store'])->name('student.comments.store');
});

Route::middleware('guest:student')->group(function () {
    Route::get('/dang-nhap', [StudentAuthController::class, 'showLoginForm'])->name('student.login');
    Route::post('/dang-nhap', [StudentAuthController::class, 'login'])->name('student.login.submit');
    Route::get('/dang-ky', [StudentAuthController::class, 'showRegisterForm'])->name('student.register');
    Route::post('/dang-ky', [StudentAuthController::class, 'register'])->name('student.register.submit');
    Route::get('/quen-mat-khau', [StudentAuthController::class, 'showPasswordRequestForm'])->name('student.password.request');
    Route::post('/quen-mat-khau', [StudentAuthController::class, 'sendResetLinkEmail'])->name('student.password.email');
    Route::get('/dat-lai-mat-khau/{token}', [StudentAuthController::class, 'showResetForm'])->name('student.password.reset');
    Route::post('/dat-lai-mat-khau', [StudentAuthController::class, 'reset'])->name('student.password.update');
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
        Route::resource('documents', DocumentController::class)->names('documents');
        Route::resource('document-topics', DocumentTopicController::class)->names('document-topics');
        Route::resource('schedules', ScheduleController::class)->names('schedules');
        Route::get('courses/{course}/content', [CourseContentController::class, 'index'])->name('courses.content');
        Route::post('courses/{course}/chapters', [CourseContentController::class, 'storeChapter'])->name('courses.chapters.store');
        Route::post('courses/{course}/chapters/{chapter}/lessons', [CourseContentController::class, 'storeLesson'])->name('courses.lessons.store');
        Route::put('courses/{course}/chapters/{chapter}', [CourseContentController::class, 'updateChapter'])->name('courses.chapters.update');
        Route::delete('courses/{course}/chapters/{chapter}', [CourseContentController::class, 'destroyChapter'])->name('courses.chapters.destroy');
        Route::put('courses/{course}/chapters/{chapter}/lessons/{lesson}', [CourseContentController::class, 'updateLesson'])->name('courses.lessons.update');
        Route::delete('courses/{course}/chapters/{chapter}/lessons/{lesson}', [CourseContentController::class, 'destroyLesson'])->name('courses.lessons.destroy');
        Route::post('students/{student}/courses/{course}', [AdminStudentCourseController::class, 'store'])->name('students.courses.store');
        Route::delete('students/{student}/courses/{course}', [AdminStudentCourseController::class, 'destroy'])->name('students.courses.destroy');
        Route::get('students/{student}/courses-json', [AdminStudentCourseController::class, 'list'])->name('students.courses.list');
        Route::post('students/{student}/courses-sync', [AdminStudentCourseController::class, 'sync'])->name('students.courses.sync');
        Route::get('comments', [AdminCommentController::class, 'index'])->name('comments.index');
        Route::get('forms', [FormSubmissionController::class, 'index'])->name('forms.index');
        Route::get('registrations', [RegistrationController::class, 'index'])->name('registrations.index');
    });
});
