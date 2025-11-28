<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// All posts (index)
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// Post operations (create | store | edit | update | delete)
Route::middleware('auth')->group(function ()
{
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::patch('/posts/{post}/update', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}/destroy', [PostController::class, 'destroy'])->name('posts.destroy');
});

// Show single post (show)
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');