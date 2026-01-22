<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Evaluasi;
use App\Models\Pembimbing;
use App\Models\Penempatan;
use App\Models\Peserta;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // 1. Halaman Dashboard Pusat Laporan
    public function index()
    {
        return view('admin.laporan.index');
    }

    private function getPeriodeLabel($req)
    {
        if ($req->filled('tgl_mulai') && $req->filled('tgl_selesai')) {
            $start = Carbon::parse($req->tgl_mulai)->translatedFormat('d F Y');
            $end = Carbon::parse($req->tgl_selesai)->translatedFormat('d F Y');

            return "Periode: $start s/d $end";
        }

        return 'Semua Periode';
    }

    // 2. Cetak Laporan Data Peserta
    public function cetakPeserta(Request $request)
    {
        $query = Peserta::with('penempatan.pembimbing')->orderBy('nama_lengkap');

        // Filter: Tampilkan peserta yang MULAI magang dalam rentang ini
        if ($request->filled('tgl_mulai') && $request->filled('tgl_selesai')) {
            $query->whereBetween('tgl_mulai', [$request->tgl_mulai, $request->tgl_selesai]);
        }

        $data = $query->get();
        $periodeLabel = $this->getPeriodeLabel($request);

        $pdf = Pdf::loadView('pdf.peserta', compact('data', 'periodeLabel'));
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan_Data_Peserta.pdf');
    }

    // 3. Cetak Laporan Penempatan (Pindahan dari PenempatanController)
    public function cetakPenempatan(Request $request)
    {
        $query = Penempatan::with(['peserta', 'pembimbing'])->latest();

        if ($request->filled('tgl_mulai') && $request->filled('tgl_selesai')) {
            $query->whereBetween('created_at', [$request->tgl_mulai, $request->tgl_selesai]);
        }

        $data = $query->get();
        $periodeLabel = $this->getPeriodeLabel($request);

        $pdf = Pdf::loadView('pdf.penempatan', compact('data', 'periodeLabel'));
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan_Penempatan.pdf');
    }

    // 4. Cetak Laporan Absensi
    public function cetakAbsensi(Request $request)
    {
        $query = Absensi::with('peserta')->orderBy('tgl', 'desc');

        // Logic Filter Tanggal
        if ($request->filled('tgl_mulai') && $request->filled('tgl_selesai')) {
            $query->whereBetween('tgl', [$request->tgl_mulai, $request->tgl_selesai]);
        }

        $data = $query->get();
        $periodeLabel = $this->getPeriodeLabel($request);

        $pdf = Pdf::loadView('pdf.absensi', compact('data', 'periodeLabel'));
        $pdf->setPaper('a4', 'portrait');

        // Tambahkan info periode di nama file
        $periode = $request->tgl_mulai ? "_{$request->tgl_mulai}_sd_{$request->tgl_selesai}" : '';

        return $pdf->stream("Laporan_Absensi{$periode}.pdf");
    }

    // 5. Cetak Laporan Evaluasi
    public function cetakEvaluasi(Request $request)
    {
        $query = Evaluasi::with(['peserta', 'peserta.penempatan.pembimbing']);

        if ($request->filled('tgl_mulai') && $request->filled('tgl_selesai')) {
            $query->whereBetween('created_at', [$request->tgl_mulai, $request->tgl_selesai]);
        }

        $data = $query->get();
        $periodeLabel = $this->getPeriodeLabel($request);

        $pdf = Pdf::loadView('pdf.evaluasi', compact('data', 'periodeLabel'));
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan_Evaluasi.pdf');
    }

    // 6. Cetak Daftar Pembimbing
    public function cetakPembimbing(Request $request)
    {
        $query = Pembimbing::orderBy('nama');

        // Biasanya master data jarang difilter tanggal, tapi kita siapkan saja
        if ($request->filled('tgl_mulai') && $request->filled('tgl_selesai')) {
            $query->whereBetween('created_at', [$request->tgl_mulai, $request->tgl_selesai]);
        }

        $data = $query->get();
        $periodeLabel = $this->getPeriodeLabel($request);

        $pdf = Pdf::loadView('pdf.pembimbing', compact('data', 'periodeLabel'));
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan_Pembimbing.pdf');
    }
}
