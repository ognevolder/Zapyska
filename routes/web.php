<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/registration.php';
require __DIR__.'/auth.php';
require __DIR__.'/post.php';
require __DIR__.'/profile.php';
require __DIR__.'/admin.php';

// Головна сторінка. Welcome page (index)
Route::get('/', [IndexController::class, 'index'])->name('index');
