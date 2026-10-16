<?php

use Illuminate\Support\Facades\Route;

// Halaman utama sekarang langsung memanggil view login
Route::get('/', function () {
    return view('login');
});

// Halaman dashboard setelah user masuk (login)
Route::view('/dashboard', 'dashboard');

// Halaman-halaman admin lainnya
Route::view('/keuangan', 'keuangan');
Route::view('/donasi', 'donasi');
Route::view('/agenda', 'agenda');
Route::view('/jadwal-salat', 'jadwal-salat');
Route::view('/digital-signage', 'digital-signage');
Route::view('/inventaris', 'inventaris');
Route::view('/pengaturan', 'pengaturan');
Route::view('/lupa-password', 'lupa-password');
Route::view('/preview-signage', 'preview-signage');