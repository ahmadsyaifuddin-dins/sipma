<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Pembimbing;
use App\Models\Peserta;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. DATA STATISTIK (Sama seperti sebelumnya)
        $total_peserta = Peserta::where('status', 'aktif')->count();
        $peserta_pending = Peserta::where('status', 'pending')->count();
        $total_pembimbing = Pembimbing::count();
        $total_menunggu_nilai = Peserta::where('status', 'menunggu_nilai')->count();

        // 2. DATA ALERT (Pengajuan Selesai)
        $pengajuan_selesai = Peserta::where('status', 'menunggu_nilai')
            ->with(['user', 'penempatan.pembimbing'])
            ->latest()
            ->get();

        // 3. DATA GRAFIK (Pendaftar per Bulan Tahun Ini)
        // Mengambil jumlah pendaftar dikelompokkan berdasarkan bulan
        $grafik_pendaftar = Peserta::select(DB::raw('COUNT(*) as count'), DB::raw('MONTHNAME(created_at) as month_name'), DB::raw('MONTH(created_at) as month_num'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('month_name', 'month_num')
            ->orderBy('month_num')
            ->get();

        // Format data untuk Chart.js
        $chart_labels = $grafik_pendaftar->pluck('month_name');
        $chart_data = $grafik_pendaftar->pluck('count');

        // 4. DATA NOTIFIKASI AKTIVITAS (Gabungan Absensi & Pendaftar)
        // Ambil 5 Absensi Terakhir
        $log_absensi = Absensi::with('peserta')
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($item) {
                return [
                    'type' => 'absensi',
                    'message' => $item->peserta->nama_lengkap.' melakukan absensi '.ucfirst($item->status_kehadiran),
                    'time' => $item->created_at,
                    'icon' => 'fas fa-fingerprint',
                    'color' => 'bg-green-100 text-green-600',
                ];
            });

        // Ambil 3 Pendaftar Terakhir
        $log_daftar = Peserta::latest()
            ->take(3)
            ->get()
            ->map(function ($item) {
                return [
                    'type' => 'daftar',
                    'message' => 'Pendaftar baru: '.$item->nama_lengkap,
                    'time' => $item->created_at,
                    'icon' => 'fas fa-user-plus',
                    'color' => 'bg-blue-100 text-blue-600',
                ];
            });

        // Gabung dan urutkan berdasarkan waktu
        $recent_activities = $log_absensi->merge($log_daftar)->sortByDesc('time')->take(6);

        return view('admin.dashboard.index', compact(
            'total_peserta',
            'peserta_pending',
            'total_pembimbing',
            'total_menunggu_nilai',
            'pengajuan_selesai',
            'chart_labels',
            'chart_data',
            'recent_activities'
        ));
    }
}
