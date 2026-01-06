<?php

/**
 * ----------------------------------------------------------
 * Модуль [Реєстрація]
 * ----------------------------------------------------------
 * Виклик форми реєстрації відповідно до маршруту запиту.
 * Створення користувача або адміністратора в БД.
 * Верифікація електронної пошти зареєстрованого користувача.
 * Скидання паролю.
 * Зміна паролю.
 */

use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Registration\PasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Registration\RegistrationController;


/**
 * ----------------------------------------------------------
 * Користувач [web]
 * ----------------------------------------------------------
 * Звичайний користувач
 * - Доступ -
 *   Публікації, Профіль, Публічні профілі,
 *   Реєстрація користувача, Авторизація користувача,
 *   Запит на права автора, Запит на публікацію, Зміна паролю.
*/

// Guest
Route::middleware('guest:web')->group(function() {
  // Форма реєстрації користувача. User registration form.
  Route::get('/registration', [RegistrationController::class, 'create'])->name('registration');
  Route::post('/registration', [RegistrationController::class, 'user'])->middleware('throttle:4,1');
});

// Auth
Route::middleware('auth:web')->group(function() {
  // Форма зміни паролю. Change password.
  Route::get('/password-update', [PasswordController::class, 'edit'])->name('password.edit');
  Route::put('/password-update', [PasswordController::class, 'user'])->name('password.update');
});


/**
 * ----------------------------------------------------------
 * Адміністратор [admin]
 * ----------------------------------------------------------
 * Адміністратор проєкту
 * - Доступ -
 *   Публікації, Профіль, Публічні профілі,
 *   Реєстрація користувача, Авторизація користувача,
 *   Запит на права автора, Запит на публікацію.
*/

// Guest
Route::prefix('admin')->name('admin.')->middleware(['guard:admin', 'guest:admin'])->group(function () {
  // Форма реєстрації адміністратора.
  Route::get('/registration', [RegistrationController::class, 'create'])->name('registration');
  Route::post('/registration', [RegistrationController::class, 'admin'])->middleware('throttle:2,1');
});

// Auth
Route::prefix('admin')->name('admin.')->middleware(['guard:admin', 'auth:admin'])->group(function () {
  // Форма зміни паролю адміністратора.
  Route::get('/password-update', [PasswordController::class, 'edit'])->name('password.edit');
  Route::put('/password-update', [PasswordController::class, 'admin'])->name('password.update');
});


// Email-верифікація.
Route::middleware('auth:web')->group(function () {
  // Повідомлення про необхідність верифікації електронної пошти.
  Route::get('/verify-email', EmailVerificationPromptController::class)->name('verification.notice');

  Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['signed', 'throttle:4,1'])
    ->name('verification.verify');

  Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware('throttle:4,1')
    ->name('verification.send');


});