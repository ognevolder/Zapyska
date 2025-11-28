<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';
require __DIR__.'/post.php';
require __DIR__.'/writing.php';
require __DIR__.'/profile.php';

// Welcome page (index)
Route::get('/', [HomeController::class, 'index'])->name('index');

// Admin page
// Route::middleware(['auth', 'role:Admin'])->group(function()
// {
//     Route::get('/admin', AdminController::class)->name('admin.dashboard');
// });
