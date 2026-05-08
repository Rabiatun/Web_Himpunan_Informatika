<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\MahasiswaAuthController;
use App\Http\Controllers\AdminAuthController;

// Landing page
Route::get('/', [LandingPageController::class, 'index'])->name('home');

// ---- Mahasiswa (cookie-based) ----
Route::get('/login', [MahasiswaAuthController::class, 'showLogin'])->name('mahasiswa.login');
Route::post('/login', [MahasiswaAuthController::class, 'login']);
Route::get('/daftar', [MahasiswaAuthController::class, 'showRegister'])->name('mahasiswa.register');
Route::post('/daftar', [MahasiswaAuthController::class, 'register']);
Route::get('/mahasiswa/dashboard', [MahasiswaAuthController::class, 'dashboard'])->name('mahasiswa.dashboard');
Route::get('/mahasiswa/logout', [MahasiswaAuthController::class, 'logout'])->name('mahasiswa.logout');

// ---- Admin (session-based, URL rahasia) ----
// Dashboard & logout tidak butuh secret (sudah pakai session)
Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
// URL login rahasia: /admin/{secret}/login
Route::get('/admin/{secret}/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/{secret}/login', [AdminAuthController::class, 'login']);
Route::get('/admin/{secret}/forgot-password', [AdminAuthController::class, 'showForgotPassword'])->name('admin.forgot-password');
Route::post('/admin/{secret}/forgot-password', [AdminAuthController::class, 'updatePassword'])->name('admin.forgot-password.update');
