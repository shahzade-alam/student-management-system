<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;

/*
|-------------------------
| PUBLIC ROUTES
|-------------------------
*/

// sirf data dekh sakte hain (no login required)

// Register
Route::post('/register', [AuthController::class, 'register']);

// Login
Route::post('/login', [AuthController::class, 'login']);

// Forgot Password (OTP / Email send)
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);

// Reset Password (after OTP verify or token)
Route::post('/reset-password', [AuthController::class, 'resetPassword']);


/*
|-------------------------
| PROTECTED ROUTES
|-------------------------
*/

// login Required Inko Chalane Ke Liye
Route::middleware('auth:sanctum')->group(function () {

    // Change Password (logged-in user)
    Route::post('/change-password', [AuthController::class, 'changePassword']);
    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);


    Route::resource('/students', StudentController::class);
    



});