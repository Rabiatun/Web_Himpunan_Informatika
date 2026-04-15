<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController; // Import the controller

// Route untuk halaman utama (landing page)
Route::get('/', [LandingPageController::class, 'index'])->name('home');

// Jika Anda ingin menambahkan route untuk form kontak (opsional)
// Route::post('/kontak', [LandingPageController::class, 'submitContactForm'])->name('kontak.submit');
