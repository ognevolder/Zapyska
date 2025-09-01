<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Welcome page (index)
Route::get('/', [NavigationController::class, 'index']);

// Profile page
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

// Auth
Route::middleware('guest')->group(function()
{
    // Registartion
    Route::get('/registration', [RegistrationController::class, 'show'])->name('registration.show');
    Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');
    // Authorisation
    Route::get('/auth', [SessionController::class, 'create'])->name('auth.show');
    Route::post('/auth', [SessionController::class, 'store'])->name('auth.store');
});

Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');

// Admin page
Route::middleware(['auth', 'role:Admin'])->group(function()
{
    Route::get('/admin', AdminController::class)->name('admin.dashboard');
});

// All posts (index)
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
// Post operations (create | store | edit | update | delete)
Route::middleware('auth')->group(function ()
{
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::patch('/posts/{post}/update', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}/destroy', [PostController::class, 'destroy'])->name('posts.destroy');
});
// Show single post (show)
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
