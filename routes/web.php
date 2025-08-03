<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Admin\AdminConsultationController;
use App\Http\Controllers\Admin\AdminAppointmentController;
use App\Http\Controllers\Admin\ResponseController;
use App\Http\Controllers\Admin\UserController;

// Trang chủ
Route::get('/', function () {
    return view('welcome');
});

// Dashboard cho người dùng
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Quản lý hồ sơ cá nhân
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Bài viết (truy cập ẩn danh)
Route::get('/bai-viet', [ArticleController::class, 'index'])->name('bai-viet');

// Gửi yêu cầu tư vấn (ẩn danh)
Route::get('/tuvan', [ConsultationController::class, 'create'])->name('tu-van.create');
Route::post('/tuvan', [ConsultationController::class, 'store'])->name('tu-van.store');

// Đặt lịch tham vấn (ẩn danh)
Route::get('/appointments', [AppointmentController::class, 'create'])->name('appointments.create');
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');

// Đăng nhập, đăng ký
require __DIR__.'/auth.php';
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Thông báo người dùng
Route::get('/notifications', function () {
    return view('notifications', [
        'notifications' => auth()->user()->notifications
    ]);
})->middleware('auth');

// ✅ Logout tùy chỉnh
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');

// ===================== ADMIN ROUTES =====================
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {

    // Trang dashboard admin
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Quản lý người dùng
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    // Quản lý tư vấn
    Route::get('/consultations', [AdminConsultationController::class, 'index'])->name('consultations.index');
    Route::get('/consultations/{id}', [AdminConsultationController::class, 'show'])->name('consultations.show');
    Route::post('/consultations/{id}/reply', [AdminConsultationController::class, 'reply'])->name('consultations.reply');

    // Quản lý lịch hẹn
    Route::get('/appointments', [AdminAppointmentController::class, 'index'])->name('appointments.index');

    // Phản hồi
    Route::get('/responses', [ResponseController::class, 'index'])->name('responses.index');
});
