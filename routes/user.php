<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::middleware(['auth', 'user-access:user'])->group(function() {
    Route::get('/user/home', [HomeController::class, 'userHome'])->name('user.home');
});