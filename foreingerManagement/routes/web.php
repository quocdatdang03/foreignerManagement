<?php

use App\Http\Controllers\Auth\UpdateUserInfoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\ChangePasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\GoogleAuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Trang userhome
    Route::get('/userhome', function () {
        return view('user.userhome');
    })->name('user.home')->middleware('role:1'); // idVaiTro = 1 cho User

    // Trang adminhome
    Route::get('/adminhome', function () {
        return view('admin.adminhome');
    })->name('admin.home')->middleware('role:2'); // idVaiTro = 2 cho Admin

    Route::middleware(['auth'])->group(function () {
        Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('password.change');
        Route::post('/change-password', [ChangePasswordController::class, 'update'])->name('password.update');
    });

    Route::get('/user/update-info', [UpdateUserInfoController::class, 'index'])->name('user.update-info');
    Route::post('/user/update-info', [UpdateUserInfoController::class, 'update'])->name('user.update-info.update');
});

Route::get('/login', [AuthenticatedSessionController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'login']);
Route::post('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});
Route::get('/verify-email/{id}/{hash}', [RegisteredUserController::class, 'verify'])
    ->name('verification.verify')
    ->middleware(['signed']);


Route::get('auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);
require __DIR__.'/auth.php';
