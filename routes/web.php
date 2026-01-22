<?php

use App\Http\Controllers\Admin\AbsensiController as AdminAbsensiController;
use App\Http\Controllers\Admin\PembimbingController;
use App\Http\Controllers\Admin\PesertaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VerifikasiController;
use App\Http\Controllers\Pemagang\AbsensiController;
use App\Http\Controllers\Pemagang\EvaluasiController;
use App\Http\Controllers\Pemagang\PendaftaranController;
use App\Http\Controllers\ProfileController;
use App\Models\Pembimbing;
use App\Models\Peserta;
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
        Route::resource('users', UserController::class, ['as' => 'admin']);
        // Dashboard Admin dengan Data Real
        Route::get('/dashboard', function () {
            return view('admin.dashboard', [
                'total_peserta' => Peserta::where('status', 'aktif')->count(),
                'peserta_pending' => Peserta::where('status', 'pending')->count(),
                'total_pembimbing' => Pembimbing::count(),
            ]);
        })->name('admin.dashboard');

        Route::get('/absensi', [AdminAbsensiController::class, 'index'])->name('admin.absensi.index');
        Route::put('/absensi/{id}', [AbsensiController::class, 'update'])->name('admin.absensi.update');
        Route::delete('/absensi/{id}', [AbsensiController::class, 'destroy'])->name('admin.absensi.destroy');

        Route::resource('pembimbing', PembimbingController::class, ['as' => 'admin']);
        Route::resource('peserta', PesertaController::class, ['as' => 'admin'])->except(['create', 'store', 'show']);

        // Route Verifikasi
        Route::get('/verifikasi', [VerifikasiController::class, 'index'])->name('admin.verifikasi.index');
        Route::get('/verifikasi/{id}', [VerifikasiController::class, 'show'])->name('admin.verifikasi.show');
        Route::post('/verifikasi/{id}/approve', [VerifikasiController::class, 'store'])->name('admin.verifikasi.approve');
        Route::delete('/verifikasi/{id}/reject', [VerifikasiController::class, 'destroy'])->name('admin.verifikasi.reject');

        // Route Evaluasi
        Route::get('/evaluasi', [App\Http\Controllers\Admin\EvaluasiController::class, 'index'])->name('admin.evaluasi.index');

        // Route Form Nilai (Butuh ID Peserta)
        Route::get('/evaluasi/input/{peserta_id}', [App\Http\Controllers\Admin\EvaluasiController::class, 'create'])->name('admin.evaluasi.create');
        Route::post('/evaluasi/input/{peserta_id}', [App\Http\Controllers\Admin\EvaluasiController::class, 'store'])->name('admin.evaluasi.store');

        // Route Edit & Update (Butuh ID Evaluasi)
        Route::get('/evaluasi/{id}/edit', [App\Http\Controllers\Admin\EvaluasiController::class, 'edit'])->name('admin.evaluasi.edit');
        Route::put('/evaluasi/{id}', [App\Http\Controllers\Admin\EvaluasiController::class, 'update'])->name('admin.evaluasi.update');
    });

    // --- GROUP PEMAGANG ---
    // URL: /pemagang/dashboard, /pemagang/absensi, dll
    // Wajib Role Pemagang DAN Status Aktif
    Route::prefix('pemagang')->middleware(['role:pemagang'])->group(function () {

        // 1. Route Pendaftaran (Bisa diakses user baru)
        Route::get('/daftar', [PendaftaranController::class, 'create'])->name('pemagang.daftar');
        Route::post('/daftar', [PendaftaranController::class, 'store'])->name('pemagang.daftar.store');

        // 2. Group yang butuh STATUS AKTIF (Dashboard, Absensi)
        Route::middleware(['status.aktif'])->group(function () {

            Route::get('/dashboard', function () {
                return view('pemagang.dashboard');
            })->name('pemagang.dashboard');

            Route::get('/absensi', [AbsensiController::class, 'index'])->name('pemagang.absensi.index');
            Route::post('/absensi', [AbsensiController::class, 'store'])->name('pemagang.absensi.store');
            Route::put('/absensi/{id}/pulang', [AbsensiController::class, 'absenPulang'])->name('pemagang.absensi.pulang');
        });
    });

    Route::get('/evaluasi', [EvaluasiController::class, 'index'])->name('pemagang.evaluasi.index');

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
