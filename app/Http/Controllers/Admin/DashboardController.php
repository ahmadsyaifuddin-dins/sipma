<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembimbing;
use App\Models\Peserta;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung Data Real dari Database
        $total_peserta = Peserta::where('status', 'aktif')->count();
        $peserta_pending = Peserta::where('status', 'pending')->count();
        $total_pembimbing = Pembimbing::count();

        // Ambil 5 pendaftar terakhir untuk tabel "Recent Activity"
        $latest_peserta = Peserta::where('status', 'pending')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'total_peserta',
            'peserta_pending',
            'total_pembimbing',
            'latest_peserta'
        ));
    }
}
