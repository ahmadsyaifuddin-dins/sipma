<?php

namespace App\Http\Controllers\Pemagang;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePendaftaranRequest;
use App\Models\Peserta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; // Untuk random string nama file

class PendaftaranController extends Controller
{
    // Tampilkan Form
    public function create()
    {
        // Cek dulu, kalau sudah daftar jangan kasih akses form lagi
        if (Auth::user()->peserta) {
            return redirect()->route('pemagang.dashboard');
        }

        return view('pemagang.pendaftaran.create');
    }

    // Proses Simpan
    public function store(StorePendaftaranRequest $request)
    {
        // 1. Handle Upload Foto (Old School)
        $foto = $request->file('foto_profil');
        $namaFoto = time().'_'.Str::slug($request->nama_lengkap).'.'.$foto->getClientOriginalExtension();
        $foto->move(public_path('uploads/foto_profil'), $namaFoto);

        // 2. Handle Upload PDF Surat (Old School)
        $surat = $request->file('file_surat_pengantar');
        $namaSurat = time().'_Surat_'.$request->nim_nisn.'.'.$surat->getClientOriginalExtension();
        $surat->move(public_path('uploads/surat_pengantar'), $namaSurat);

        // 3. Simpan ke Database
        Peserta::create([
            'user_id' => Auth::id(),
            'nim_nisn' => $request->nim_nisn,
            'nama_lengkap' => $request->nama_lengkap,
            'institusi' => $request->institusi,
            'jurusan' => $request->jurusan,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'status' => 'pending', // Default pending
            // Simpan path relatif aja biar database bersih
            'foto_profil' => 'uploads/foto_profil/'.$namaFoto,
            'file_surat_pengantar' => 'uploads/surat_pengantar/'.$namaSurat,
        ]);

        return redirect()->route('pemagang.dashboard')
            ->with('success', 'Pendaftaran berhasil dikirim! Silakan tunggu verifikasi admin.');
    }
}
