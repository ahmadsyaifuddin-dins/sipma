<?php

namespace App\Http\Controllers\Pemagang;

use App\Http\Controllers\Controller;
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
}
