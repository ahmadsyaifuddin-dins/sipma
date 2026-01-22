<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembimbing;
use App\Models\Penempatan;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerifikasiController extends Controller
{
    // 1. Daftar Peserta Pending
    public function index()
    {
        $data = Peserta::where('status', 'pending')
            ->with('user') // Eager load user
            ->latest()
            ->get();

        return view('admin.verifikasi.index', compact('data'));
    }

    // 2. Detail Peserta (Cek Berkas)
    public function show($id)
    {
        $peserta = Peserta::findOrFail($id);

        // Ambil data pembimbing untuk dropdown (Pluck id dan nama)
        $pembimbings = Pembimbing::pluck('nama', 'id');

        return view('admin.verifikasi.show', compact('peserta', 'pembimbings'));
    }

    // 3. PROSES APPROVE (Sekaligus Penempatan)
    public function store(Request $request, $id)
    {
        $request->validate([
            'pembimbing_id' => 'required|exists:pembimbing,id',
            'ruangan' => 'required|string',
        ]);

        $peserta = Peserta::findOrFail($id);

        // Gunakan Transaction biar aman (Database consistency)
        DB::transaction(function () use ($request, $peserta) {

            // A. Update Status Peserta
            $peserta->update(['status' => 'aktif']);

            // B. Buat Data Penempatan
            Penempatan::create([
                'peserta_id' => $peserta->id,
                'pembimbing_id' => $request->pembimbing_id,
                'ruangan' => $request->ruangan,
                // tgl_mulai & selesai ambil dari request peserta atau input manual?
                // Asumsi: ikut jadwal peserta
                // 'tgl_mulai' => $peserta->tgl_mulai, // Jika perlu disimpan di penempatan juga
            ]);
        });

        return redirect()->route('admin.verifikasi.index')
            ->with('success', 'Peserta berhasil diverifikasi dan ditempatkan!');
    }

    // 4. PROSES TOLAK
    public function destroy($id)
    {
        $peserta = Peserta::findOrFail($id);

        // Ubah status jadi ditolak (Jangan dihapus datanya, biar ada history)
        $peserta->update(['status' => 'ditolak']);

        return redirect()->route('admin.verifikasi.index')
            ->with('success', 'Pengajuan magang ditolak.');
    }
}
