<?php

// Модуль (Реєстрація). Містить маршрути для форми реєстрації.

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

Route::middleware('guest')->group(function() {
  // Виклик форми реєстрації користувача. User registration form.
  Route::get('/registration', [RegistrationController::class, 'create'])->name('registration');

  // Збереження реєстраційних даних користувача. Store user data.
  Route::post('/registration', [RegistrationController::class, 'store'])->middleware('throttle:4,1');
});