<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

// Welcome page (index)
Route::get('/', [NavigationController::class, 'index']);

// Profile page
Route::get('/profile', [NavigationController::class, 'profile'])->middleware('auth');

// Auth
Route::get('/registration', [RegistrationController::class, 'create']);
Route::post('/registration', [RegistrationController::class, 'store']);

Route::get('/auth', [SessionController::class, 'create'])->name('login');
Route::post('/auth', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

// Admin page
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        abort_unless(auth()->user()->can('view-admin-panel'), 403);
    })->name('admin.dashboard');
});

// All posts (index)
Route::get('/posts', [PostController::class, 'index']);
// Show single post (show)
Route::get('/posts/{id}', [PostController::class, 'show']);
