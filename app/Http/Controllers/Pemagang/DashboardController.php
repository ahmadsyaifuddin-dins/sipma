<?php

namespace App\Http\Controllers\Pemagang;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard pemagang.
     */
    public function index()
    {
        $peserta = Auth::user()->peserta;

        if (! $peserta) {
            return redirect()->route('pemagang.daftar');
        }

        // Statistik Absensi
        $hadir = $peserta->absensi()->where('status', 'hadir')->count();
        $izin = $peserta->absensi()->where('status', 'izin')->count();
        $sakit = $peserta->absensi()->where('status', 'sakit')->count();
        $alpha = $peserta->absensi()->where('status', 'alpha')->count();

        // 1. Kita reset jam ke 00:00:00 (startOfDay) agar hitungan bulat
        $tgl_mulai = Carbon::parse($peserta->tgl_mulai)->startOfDay();
        $tgl_selesai = Carbon::parse($peserta->tgl_selesai)->startOfDay();
        $sekarang = Carbon::now()->startOfDay();

        // 2. Hitung Total Durasi
        $total_hari = $tgl_mulai->diffInDays($tgl_selesai);

        // 3. Default Value
        $hari_berjalan = 0;
        $sisa_waktu = $total_hari;
        $progress_persen = 0;

        // 4. Logika Kondisi
        if ($sekarang->lessThan($tgl_mulai)) {
            // BELUM MULAI
            $hari_berjalan = 0;
            $sisa_waktu = $total_hari;
            $progress_persen = 0;

        } elseif ($sekarang->greaterThan($tgl_selesai)) {
            // SUDAH SELESAI
            $hari_berjalan = $total_hari;
            $sisa_waktu = 0;
            $progress_persen = 100;

        } else {
            // SEDANG BERJALAN
            // Kita paksa jadi integer (int) biar gak ada koma
            $hari_berjalan = (int) $tgl_mulai->diffInDays($sekarang);
            $sisa_waktu = (int) $sekarang->diffInDays($tgl_selesai);

            // Hitung Persen
            if ($total_hari > 0) {
                $progress_persen = round(($hari_berjalan / $total_hari) * 100);
            } else {
                $progress_persen = 100;
            }
        }

        return view('pemagang.dashboard.index', compact(
            'peserta',
            'hadir', 'izin', 'sakit', 'alpha',
            'progress_persen', 'total_hari', 'hari_berjalan', 'sisa_waktu'
        ));
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
