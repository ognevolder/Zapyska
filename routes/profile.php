<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function()
{
  // Profile page (profile)
  Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
  // User data (bio)
  Route::get('/profile/bio', [ProfileController::class, 'bio'])->name('profile.bio');
  // User posts (posts)
  Route::get('/profile/posts', [ProfileController::class, 'posts'])->name('profile.posts');

  // AJAX
  Route::post('/profile/bio', [ProfileController::class, 'bio'])->middleware('auth')->name('profile.bio');
  Route::post('/profile/posts', [ProfileController::class, 'posts'])->middleware('auth')->name('profile.posts');
});
