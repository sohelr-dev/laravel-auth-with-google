<?php

use App\Http\Controllers\Auth\FacebookAuthController;
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
    //facebook Authentication
    Route::get('auth/facebook',[FacebookAuthController::class, 'redirectToFacebook'])->name('facebook.login');
});
// Google OAuth callback route
Route::get('auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);
Route::get('auth/facebook/callback', [FacebookAuthController::class, 'handleFacebookCallback']);

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [LoginController::class, 'showProfile'])->name('profile');
    Route::post('/profile', [GoogleAuthController::class, 'completeProfile'])->name('profile.complete');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

});
