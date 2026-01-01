<?php

use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:web')->group(function()
{
  /**
   * Auth
   */
  Route::get('/auth', [SessionController::class, 'create'])->name('auth');
  Route::post('/auth', [SessionController::class, 'store']);

  // Password reset
  Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
  Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
  Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
  Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});


// Log Out
Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth:web');


// Адміністратор. [Admin].
Route::prefix('admin')->name('admin.')->middleware(['guard:admin', 'guest:admin'])->group(function () {
  // Реєстрація адміністратора.
  Route::get('/auth', [SessionController::class, 'create'])->name('login');
  Route::post('/auth', [SessionController::class, 'store'])->middleware('throttle:2,1');
});
