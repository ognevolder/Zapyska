<?php

use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use Illuminate\Support\Facades\Route;

/**
 * Користувач [web].
 */

// Guest
Route::middleware('guest:web')->group(function()
{
  Route::get('/auth', [SessionController::class, 'create'])->name('auth');
  Route::post('/auth', [SessionController::class, 'store']);

  // Password reset
  Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
  Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
  Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
  Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});


// Auth
Route::middleware('auth:web')->group(function()
{
  // Вихід
  Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth:web');
});


/**
 * Адміністратор [admin].
 */

//Guest
Route::prefix('admin')->name('admin.')->middleware(['guard:admin', 'guest:admin'])->group(function () {
  // Авторизація.
  Route::get('/auth', [SessionController::class, 'create'])->name('login');
  Route::post('/auth', [SessionController::class, 'store'])->middleware('throttle:2,1');
});

// Auth
Route::prefix('admin')->name('admin.')->middleware(['guard:admin', 'auth:admin'])->group(function () {
  // Вихід.
  Route::post('/logout', [SessionController::class, 'destroy']);
});
