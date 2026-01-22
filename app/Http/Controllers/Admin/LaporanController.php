<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Evaluasi;
use App\Models\Pembimbing;
use App\Models\Penempatan;
use App\Models\Peserta;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // 1. Halaman Dashboard Pusat Laporan
    public function index()
    {
        return view('admin.laporan.index');
    }

    // 2. Cetak Laporan Data Peserta
    public function cetakPeserta()
    {
        $data = Peserta::with('penempatan.pembimbing')->orderBy('nama_lengkap')->get();

        $pdf = Pdf::loadView('pdf.peserta', compact('data'));
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan_Data_Peserta.pdf');
    }

    // 3. Cetak Laporan Penempatan (Pindahan dari PenempatanController)
    public function cetakPenempatan()
    {
        $data = Penempatan::with(['peserta', 'pembimbing'])->latest()->get();

        $pdf = Pdf::loadView('pdf.penempatan', compact('data')); // File view yg sudah kita buat
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan_Penempatan.pdf');
    }

    // 4. Cetak Laporan Absensi
    public function cetakAbsensi()
    {
        // Default: Ambil bulan ini (bisa dikembangkan pakai filter request)
        $data = Absensi::with('peserta')->orderBy('tgl', 'desc')->get();

        $pdf = Pdf::loadView('pdf.absensi', compact('data'));
        $pdf->setPaper('a4', 'portrait'); // Absensi mungkin butuh landscape kalau kolom banyak

        return $pdf->stream('Laporan_Absensi.pdf');
    }

    // 5. Cetak Laporan Evaluasi
    public function cetakEvaluasi()
    {
        $data = Evaluasi::with(['peserta', 'peserta.penempatan.pembimbing'])->get();

        $pdf = Pdf::loadView('pdf.evaluasi', compact('data'));
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan_Evaluasi.pdf');
    }

    // 6. Cetak Daftar Pembimbing
    public function cetakPembimbing()
    {
        $data = Pembimbing::orderBy('nama')->get();

        $pdf = Pdf::loadView('pdf.pembimbing', compact('data'));
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan_Pembimbing.pdf');
    }
}
