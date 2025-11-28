<?php

use App\Http\Controllers\WritingController;
use Illuminate\Support\Facades\Route;

// Index
Route::get('/writings', [WritingController::class, 'index'])->name('writings.index');

Route::middleware('auth')->group(function ()
{
    Route::get('/writings/create', [WritingController::class, 'create'])->name('writings.create');
    // Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
    // Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');
    // Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    // Route::patch('/posts/{post}/update', [PostController::class, 'update'])->name('posts.update');
    // Route::delete('/posts/{post}/destroy', [PostController::class, 'destroy'])->name('posts.destroy');
});