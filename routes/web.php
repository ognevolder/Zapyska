<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;

// Welcome page (index)
Route::get('/', function() {
    return view('index');
})->name('index');

// Profile page (profile)
Route::get('/profile', [ProfileController::class, 'profile'])->middleware('auth')->name('profile');
// -| AJAX
Route::post('/profile/bio', [ProfileController::class, 'bio'])->middleware('auth')->name('profile.bio');
Route::post('/profile/posts', [ProfileController::class, 'posts'])->middleware('auth')->name('profile.posts');


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

// All art (index)
// Route::get('/art', [ArtController::class, 'index'])->name('art.index');
require __DIR__.'/auth.php';
