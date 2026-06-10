<?php

use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*
|-------------------------
| PUBLIC ROUTES
|-------------------------
*/

// frontend Start Route

// middleware
Route::middleware(['guest'])->group(function () {

    // Login
    Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('google.login');
    Route::get('/auth/google/callback', [GoogleController::class, 'callback']);

    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/login-post', [LoginController::class, 'store'])->name('login-post');

    // register
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register-post', [RegisterController::class, 'store'])->name('register-post');

    // Forgot Password
    Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot.password');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('forgot.passwordpost');

    // Reset Password
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'index'])->name('password.reset');
    // reset ke liye inbuid route name hi rakhna h laravel ka rule
    Route::post('/reset-password', [ResetPasswordController::class, 'store'])->name('reset.passwordpost');
});




/*
|-------------------------
| PROTECTED ROUTES
|-------------------------
*/

// Backend Start Route
Route::middleware(['auth'])->group(function () {

    Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('change-password');
    Route::post('/change-passwordpost', [ChangePasswordController::class, 'store'])->name('change-passwordpost');
    Route::post('logout-post', [LogoutController::class, 'store'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('student', StudentController::class);
    Route::resource('profile', ProfileController::class);
});
// Backend End Start Route
