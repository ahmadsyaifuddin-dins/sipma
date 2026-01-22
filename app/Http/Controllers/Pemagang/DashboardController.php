<?php

namespace App\Http\Controllers\Pemagang;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard pemagang.
     */
    public function index()
    {
        // Ambil data peserta dari user yang sedang login
        // Asumsi: User memiliki relasi 'peserta' (hasOne)
        $peserta = Auth::user()->peserta;

        // Kita kirim variabel $peserta ke view agar kodenya lebih bersih
        return view('pemagang.dashboard', compact('peserta'));
    }

    /**
     * Memproses pengajuan penyelesaian magang.
     * Mengubah status dari 'aktif' menjadi 'menunggu_nilai'.
     */
    public function ajukanSelesai()
    {
        $peserta = Auth::user()->peserta;

        // Validasi: Hanya peserta berstatus 'aktif' yang boleh mengajukan
        if ($peserta && $peserta->status == 'aktif') {

            // Update status
            $peserta->update([
                'status' => 'menunggu_nilai',
            ]);

            // Redirect kembali dengan pesan sukses
            return redirect()->back()->with('success', 'Pengajuan penyelesaian berhasil dikirim! Silakan tunggu penilaian dari Pembimbing atau Admin.');
        }

        // Jika status bukan 'aktif' (misal sudah 'selesai' atau masih 'pending')
        return redirect()->back()->with('error', 'Anda tidak dapat melakukan aksi ini karena status magang tidak valid.');
    }
}
