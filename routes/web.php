<?php

use App\Http\Controllers\Admin\AbsensiController as AdminAbsensiController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
// IMPORT CONTROLLER ADMIN
use App\Http\Controllers\Admin\EvaluasiController as AdminEvaluasiController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\PembimbingController; // Tambah Alias biar gak bentrok
use App\Http\Controllers\Admin\PenempatanController;
use App\Http\Controllers\Admin\PesertaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VerifikasiController;
use App\Http\Controllers\Pemagang\AbsensiController;
use App\Http\Controllers\Pemagang\DashboardController as PemagangDashboardController;
// IMPORT CONTROLLER PEMAGANG
use App\Http\Controllers\Pemagang\EvaluasiController;
use App\Http\Controllers\Pemagang\PendaftaranController;
use App\Http\Controllers\Pemagang\PenempatanController as PemagangPenempatanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// 1. Landing Page (Halaman Depan)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Halaman Tentang PKL
Route::get('/tentang-pkl', function () {
    return view('landing.tentang');
})->name('landing.tentang');

// Halaman Panduan
Route::get('/panduan', function () {
    return view('landing.panduan');
})->name('landing.panduan');

// 2. Route Khusus User Status Pending
Route::get('/menunggu-persetujuan', function () {
    return view('auth.pending');
})->middleware(['auth'])->name('menunggu.persetujuan');

// 3. Group Auth
Route::middleware('auth')->group(function () {

    // ==========================================
    // GROUP ADMIN
    // ==========================================
    Route::prefix('admin')->middleware('role:admin')->group(function () {
        Route::resource('users', UserController::class, ['as' => 'admin']);

        // Dashboard Admin (Pakai Alias AdminDashboardController)
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        Route::get('/absensi', [AdminAbsensiController::class, 'index'])->name('admin.absensi.index');
        Route::put('/absensi/{id}', [AbsensiController::class, 'update'])->name('admin.absensi.update'); // Ini numpang update punya pemagang, oke
        Route::delete('/absensi/{id}', [AbsensiController::class, 'destroy'])->name('admin.absensi.destroy');

        Route::resource('pembimbing', PembimbingController::class, ['as' => 'admin']);
        Route::resource('peserta', PesertaController::class, ['as' => 'admin'])->except(['create', 'store']);

        // Verifikasi
        Route::get('/verifikasi', [VerifikasiController::class, 'index'])->name('admin.verifikasi.index');
        Route::get('/verifikasi/{id}', [VerifikasiController::class, 'show'])->name('admin.verifikasi.show');
        Route::post('/verifikasi/{id}/approve', [VerifikasiController::class, 'store'])->name('admin.verifikasi.approve');
        Route::delete('/verifikasi/{id}/reject', [VerifikasiController::class, 'destroy'])->name('admin.verifikasi.reject');

        // Penempatan
        Route::resource('penempatan', PenempatanController::class, ['as' => 'admin'])
            ->only(['index', 'edit', 'update']);

        // Evaluasi
        Route::get('/evaluasi', [AdminEvaluasiController::class, 'index'])->name('admin.evaluasi.index');
        Route::get('/evaluasi/input/{peserta_id}', [AdminEvaluasiController::class, 'create'])->name('admin.evaluasi.create');
        Route::post('/evaluasi/input/{peserta_id}', [AdminEvaluasiController::class, 'store'])->name('admin.evaluasi.store');
        Route::get('/evaluasi/{id}/edit', [AdminEvaluasiController::class, 'edit'])->name('admin.evaluasi.edit');
        Route::put('/evaluasi/{id}', [AdminEvaluasiController::class, 'update'])->name('admin.evaluasi.update');
        Route::get('/evaluasi/{id}', [AdminEvaluasiController::class, 'show'])->name('admin.evaluasi.show');
        Route::delete('/evaluasi/{id}', [AdminEvaluasiController::class, 'destroy'])->name('admin.evaluasi.destroy');

        // Pusat Laporan
        Route::get('/laporan', [LaporanController::class, 'index'])->name('admin.laporan.index');
        Route::get('/laporan/cetak/peserta', [LaporanController::class, 'cetakPeserta'])->name('admin.laporan.cetak.peserta');
        Route::get('/laporan/cetak/penempatan', [LaporanController::class, 'cetakPenempatan'])->name('admin.laporan.cetak.penempatan');
        Route::get('/laporan/cetak/absensi', [LaporanController::class, 'cetakAbsensi'])->name('admin.laporan.cetak.absensi');
        Route::get('/laporan/cetak/evaluasi', [LaporanController::class, 'cetakEvaluasi'])->name('admin.laporan.cetak.evaluasi');
        Route::get('/laporan/cetak/pembimbing', [LaporanController::class, 'cetakPembimbing'])->name('admin.laporan.cetak.pembimbing');
    });

    // ==========================================
    // GROUP PEMAGANG
    // ==========================================
    Route::prefix('pemagang')->middleware(['role:pemagang'])->group(function () {

        // 1. Pendaftaran
        Route::get('/daftar', [PendaftaranController::class, 'create'])->name('pemagang.daftar');
        Route::post('/daftar', [PendaftaranController::class, 'store'])->name('pemagang.daftar.store');

        // 2. Dashboard
        Route::get('/dashboard', [PemagangDashboardController::class, 'index'])->name('pemagang.dashboard');

        Route::get('/penempatan', [PemagangPenempatanController::class, 'index'])
            ->name('pemagang.penempatan.index');

        // 3. Fitur yang butuh Status Aktif
        Route::middleware(['status.aktif'])->group(function () {
            Route::get('/absensi', [AbsensiController::class, 'index'])->name('pemagang.absensi.index');
            Route::post('/absensi', [AbsensiController::class, 'store'])->name('pemagang.absensi.store');
            Route::put('/absensi/{id}/pulang', [AbsensiController::class, 'absenPulang'])->name('pemagang.absensi.pulang');

            // Ajukan Selesai (Pakai Alias PemagangDashboardController)
            Route::put('/ajukan-selesai', [PemagangDashboardController::class, 'ajukanSelesai'])->name('pemagang.ajukan.selesai');
        });

        // Evaluasi (Rapor)
        Route::get('/evaluasi', [EvaluasiController::class, 'index'])->name('pemagang.evaluasi.index');
    });

    // --- PROFILE ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

// Rute Penyelamat
Route::get('/dashboard', function () {
    if (Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('pemagang.dashboard');
})->middleware(['auth']);

require __DIR__.'/auth.php';
