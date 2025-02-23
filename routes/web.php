<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route(Auth::user()->role . '.home');
    }
    return view('welcome'); 
});

Auth::routes();
Route::get('/auth', [HomeController::class, 'auth'])->name('auth');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

require __DIR__ . '/admin.php';
require __DIR__ . '/manager.php';
require __DIR__ . '/user.php';

Route::fallback(function () {
	return view(404);
});