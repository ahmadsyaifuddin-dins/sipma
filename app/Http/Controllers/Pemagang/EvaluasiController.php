<?php

namespace App\Http\Controllers\Pemagang;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class EvaluasiController extends Controller
{
    public function index()
    {
        // Ambil data peserta yang sedang login
        $peserta = Auth::user()->peserta;

        // Ambil data evaluasi (jika ada)
        // Kita gunakan 'load' agar lebih efisien daripada query ulang
        $peserta->load('evaluasi', 'penempatan.pembimbing');

        $evaluasi = $peserta->evaluasi;
        $pembimbing = $peserta->penempatan->pembimbing ?? null;

        return view('pemagang.evaluasi.index', compact('peserta', 'evaluasi', 'pembimbing'));
    }

    public function cetakPdf()
    {
        $peserta = Auth::user()->peserta;

        // Pastikan sudah ada evaluasi
        if (! $peserta || ! $peserta->evaluasi) {
            return redirect()->back()->with('error', 'Belum ada data nilai untuk dicetak.');
        }

        $evaluasi = $peserta->evaluasi;
        $pembimbing = $peserta->penempatan->pembimbing;

        // Load View PDF
        $pdf = Pdf::loadView('pemagang.evaluasi.pdf_nilai', compact('peserta', 'evaluasi', 'pembimbing'))
            ->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan_Nilai_'.$peserta->nim_nisn.'.pdf');
    }
}
