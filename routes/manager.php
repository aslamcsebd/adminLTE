<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::middleware(['auth', 'user-access:manager'])->group(function() {
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});