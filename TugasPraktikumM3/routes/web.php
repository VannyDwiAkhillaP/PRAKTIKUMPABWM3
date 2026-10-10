<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanBanjirController;

// Halaman utama diarahkan ke form laporan
Route::redirect('/', '/lapor');

// Form pelaporan
Route::get('/lapor', [LaporanBanjirController::class, 'form'])->name('lapor.form');

// Memproses laporan (POST)
Route::post('/lapor', [LaporanBanjirController::class, 'kirim'])->name('lapor.kirim');

// Halaman konfirmasi
Route::get('/lapor/konfirmasi', [LaporanBanjirController::class, 'konfirmasi'])->name('lapor.konfirmasi');

// Daftar laporan
Route::get('/laporan', [LaporanBanjirController::class, 'daftar'])->name('lapor.daftar');

// Tentang aplikasi
Route::get('/tentang', [LaporanBanjirController::class, 'tentang'])->name('tentang');
