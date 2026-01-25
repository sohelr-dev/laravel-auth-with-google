<?php

use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

    // Google Authentication
    Route::get('auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('google.login');
});

Route::get('auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [LoginController::class, 'showProfile'])->name('profile');
    Route::post('/profile', [GoogleAuthController::class, 'completeProfile'])->name('profile.complete');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

});
