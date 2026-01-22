<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// 1. Landing Page (Halaman Depan)
Route::get('/', function () {
    return view('welcome');
});

// 2. Route Khusus User Status Pending (Agar tidak infinite loop)
Route::get('/menunggu-persetujuan', function () {
    return view('auth.pending');
})->middleware(['auth'])->name('menunggu.persetujuan');

// 3. Group Auth (Harus Login Dulu)
Route::middleware('auth')->group(function () {

    // --- GROUP ADMIN ---
    // URL: /admin/dashboard, /admin/pembimbing, dll
    Route::prefix('admin')->middleware('role:admin')->group(function () {

        // Dashboard Admin
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        // Nanti Route CRUD Pembimbing kita taruh sini
        // Route::resource('pembimbing', PembimbingController::class);
    });

    // --- GROUP PEMAGANG ---
    // URL: /pemagang/dashboard, /pemagang/absensi, dll
    // Wajib Role Pemagang DAN Status Aktif
    Route::prefix('pemagang')->middleware(['role:pemagang', 'status.aktif'])->group(function () {

        // Dashboard Pemagang
        Route::get('/dashboard', function () {
            return view('pemagang.dashboard');
        })->name('pemagang.dashboard');

        // Nanti Route Absensi & Laporan taruh sini
    });

    // --- PROFILE (Bawaan Laravel) ---
    // Biarkan ini agar user bisa ganti password/email
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

// Rute Penyelamat: Jika ada yang nyasar ke /dashboard, lempar sesuai role
Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('pemagang.dashboard');
})->middleware(['auth']);

require __DIR__.'/auth.php';
