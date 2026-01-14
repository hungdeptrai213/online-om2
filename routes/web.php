<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Student\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('student.home');
Route::get('/coaching', [HomeController::class, 'coaching'])->name('student.coaching');
Route::get('/lich-hoc', [HomeController::class, 'schedule'])->name('student.schedule');
Route::get('/tai-lieu', [HomeController::class, 'materials'])->name('student.materials');
Route::get('/goi-doanh-nghiep', [HomeController::class, 'enterprise'])->name('student.enterprise');
Route::get('/khoa-hoc/chi-tiet', [HomeController::class, 'courseDetail'])->name('student.course-detail');
Route::get('/gio-hang', [HomeController::class, 'cart'])->name('student.cart');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});
