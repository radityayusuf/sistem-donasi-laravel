<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Kategori\Index;
use App\Livewire\Kampanye\Index as KampanyeIndex;
use App\Livewire\Donasi\Index as DonasiIndex; // ✅ Tambahkan ini

// ✅ Redirect ke login saat mengakses root URL
Route::redirect('/', 'login');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// ✅ Semua route yang butuh login diletakkan di sini
Route::middleware('auth')->group(function () {
    Route::get('/kategori', Index::class)->name('kategori.index');
    Route::get('/kampanye', KampanyeIndex::class)->name('kampanye.index');
    Route::get('/donasi', DonasiIndex::class)->name('donasi.index'); // ✅ Ini yang ditambahkan
});

require __DIR__.'/auth.php';
