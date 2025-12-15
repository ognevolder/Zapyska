<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware('guest:admin')->group(function () {
  // Реєстрація адміністратора.
  Route::get('/registration', [AdminController::class, 'create'])->name('registration');
  Route::post('/registration', [AdminController::class, 'store'])->defaults('guard', 'admin');
  // Авторизація адміністратора.
  Route::get('/auth', [AdminController::class, 'show'])->name('auth');
  Route::post('/auth', [AdminController::class, 'login']);

  Route::middleware('auth:admin')->group(function () {
    // Dashboard
    Route::get('/', [AdminController::class, 'index'])->name('profile');
    // Вихід
    Route::post('/logout', [AdminController::class, 'logout']);
  });
});
// Route::prefix('admin')->group(function() {

//   Route::middleware('guest:admin')->group(function () {
//     // Registration
//     Route::get('create', [AdminController::class, 'create'])->name('admin.registration');
//     Route::post('store', [AdminController::class, 'store']);

//     // Login
//     Route::get('show', [AdminController::class, 'show'])->name('admin.login');
//     Route::post('login', [AdminController::class, 'login']);
//   });

//   Route::middleware('auth:admin')->group(function () {
//     // Dashboard
//     Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
//   });
// });


