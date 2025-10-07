<?php

use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function()
{
  // New user registration
  Route::get('/registration', [RegistrationController::class, 'create'])->name('registration');
  Route::post('/registration', [RegistrationController::class, 'store'])->middleware('throttle:4,1');

  // Authorisation
  Route::get('/auth', [SessionController::class, 'create'])->name('login');
  Route::post('/auth', [SessionController::class, 'store']);
});

// Email verification
Route::middleware('auth')->group(function () {
    Route::get('/verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:4,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:4,1')
        ->name('verification.send');

// Log Out
Route::post('/logout', [SessionController::class, 'destroy']);
});
