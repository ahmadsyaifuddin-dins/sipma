<?php

namespace App\Http\Controllers\Pemagang;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    // Halaman Utama Absensi (History & Tombol Action)
    public function index()
    {
        $pesertaId = Auth::user()->peserta->id;
        $today = Carbon::today()->format('Y-m-d');

        // 1. Cek Data Absensi Hari Ini
        $absensiHariIni = Absensi::where('peserta_id', $pesertaId)
            ->whereDate('tgl', $today)
            ->first();

        // 2. Ambil History Absensi (5 Terakhir)
        $history = Absensi::where('peserta_id', $pesertaId)
            ->latest()
            ->paginate(10);

        return view('pemagang.absensi.index', compact('absensiHariIni', 'history'));
    }

    // Proses Absen Masuk / Izin / Sakit
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|in:hadir,izin,sakit',
            'keterangan' => 'nullable|string', // Wajib jika izin/sakit (cek di UI & Logic bawah)
        ]);

        $status = $request->status;
        $pesertaId = Auth::user()->peserta->id;

        // Validasi Keterangan
        if ($status != 'hadir' && empty($request->keterangan)) {
            return back()->withErrors(['keterangan' => 'Keterangan wajib diisi jika Izin/Sakit.']);
        }

        Absensi::create([
            'peserta_id' => $pesertaId,
            'tgl' => Carbon::today(),
            'jam_masuk' => ($status == 'hadir') ? Carbon::now()->format('H:i:s') : null,
            'status' => $status,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->back()->with('success', 'Absensi berhasil dicatat.');
    }

    // Proses Absen Pulang
    public function absenPulang($id)
    {
        $absensi = Absensi::findOrFail($id);

        // Pastikan yg absen pulang adalah pemilik data
        if ($absensi->peserta_id != Auth::user()->peserta->id) {
            abort(403);
        }

        $absensi->update([
            'jam_keluar' => Carbon::now()->format('H:i:s'),
        ]);

        return redirect()->back()->with('success', 'Hati-hati di jalan! Absen pulang berhasil.');
    }
}
