<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Evaluasi;
use App\Models\Peserta;
use Illuminate\Http\Request;

class EvaluasiController extends Controller
{
    // 1. TAMPILKAN LIST PESERTA SIAP NILAI
    public function index()
    {
        // Hanya ambil peserta yang statusnya 'aktif' atau 'selesai'
        // dan load relasi evaluasi (untuk cek sudah dinilai belum)
        $peserta = Peserta::with(['evaluasi', 'penempatan.pembimbing'])
            ->whereIn('status', ['aktif', 'selesai', 'menunggu_nilai'])
            ->latest()
            ->paginate(10);

        return view('admin.evaluasi.index', compact('peserta'));
    }

    // 2. FORM PENILAIAN
    public function create($peserta_id)
    {
        $peserta = Peserta::findOrFail($peserta_id);

        // Cek jika sudah dinilai, lempar ke edit aja
        if ($peserta->evaluasi) {
            return redirect()->route('admin.evaluasi.edit', $peserta->evaluasi->id);
        }

        return view('admin.evaluasi.create', compact('peserta'));
    }

    // 3. PROSES SIMPAN NILAI (LOGIC UTAMA)
    public function store(Request $request, $peserta_id)
    {
        // 1. Validasi 10 Aspek
        $request->validate([
            'nilai_disiplin' => 'required|numeric|min:0|max:100',
            'nilai_etika' => 'required|numeric|min:0|max:100',
            'nilai_motivasi' => 'required|numeric|min:0|max:100',
            'nilai_kualitas' => 'required|numeric|min:0|max:100',
            'nilai_penguasaan' => 'required|numeric|min:0|max:100',
            'nilai_produktivitas' => 'required|numeric|min:0|max:100',
            'nilai_kerjasama' => 'required|numeric|min:0|max:100',
            'nilai_komunikasi' => 'required|numeric|min:0|max:100',
            'nilai_inisiatif' => 'required|numeric|min:0|max:100',
            'nilai_adaptasi' => 'required|numeric|min:0|max:100',
            'catatan_pembimbing' => 'nullable|string',
        ]);

        // 2. Hitung Rata-rata (Total / 10)
        $total = $request->nilai_disiplin + $request->nilai_etika + $request->nilai_motivasi +
                 $request->nilai_kualitas + $request->nilai_penguasaan + $request->nilai_produktivitas +
                 $request->nilai_kerjasama + $request->nilai_komunikasi + $request->nilai_inisiatif +
                 $request->nilai_adaptasi;

        $rataRata = $total / 10;

        // 3. Tentukan Predikat
        $predikat = $this->hitungPredikat($rataRata);

        // 4. Simpan
        Evaluasi::create([
            'peserta_id' => $peserta_id,
            // Insert semua field baru
            'nilai_disiplin' => $request->nilai_disiplin,
            'nilai_etika' => $request->nilai_etika,
            'nilai_motivasi' => $request->nilai_motivasi,
            'nilai_kualitas' => $request->nilai_kualitas,
            'nilai_penguasaan' => $request->nilai_penguasaan,
            'nilai_produktivitas' => $request->nilai_produktivitas,
            'nilai_kerjasama' => $request->nilai_kerjasama,
            'nilai_komunikasi' => $request->nilai_komunikasi,
            'nilai_inisiatif' => $request->nilai_inisiatif,
            'nilai_adaptasi' => $request->nilai_adaptasi,

            'nilai_rata_rata' => $rataRata,
            'predikat_huruf' => $predikat['huruf'],
            'predikat_keterangan' => $predikat['ket'],
            'catatan_pembimbing' => $request->catatan_pembimbing,
        ]);

        // Update Status Peserta
        $peserta = Peserta::findOrFail($peserta_id);
        if (in_array($peserta->status, ['aktif', 'menunggu_nilai'])) {
            $peserta->update(['status' => 'selesai']);
        }

        return redirect()->route('admin.evaluasi.index')->with('success', 'Penilaian Lengkap Berhasil Disimpan.');
    }

    // 4. FORM EDIT (Jika ada revisi nilai)
    public function edit($id)
    {
        $evaluasi = Evaluasi::with('peserta')->findOrFail($id);

        return view('admin.evaluasi.edit', compact('evaluasi'));
    }

    // 5. UPDATE NILAI
    // 5. UPDATE NILAI
    public function update(Request $request, $id)
    {
        $evaluasi = Evaluasi::findOrFail($id);

        // 1. Validasi
        $request->validate([
            'nilai_disiplin' => 'required|numeric|min:0|max:100',
            'nilai_etika' => 'required|numeric|min:0|max:100',
            'nilai_motivasi' => 'required|numeric|min:0|max:100',
            'nilai_kualitas' => 'required|numeric|min:0|max:100',
            'nilai_penguasaan' => 'required|numeric|min:0|max:100',
            'nilai_produktivitas' => 'required|numeric|min:0|max:100',
            'nilai_kerjasama' => 'required|numeric|min:0|max:100',
            'nilai_komunikasi' => 'required|numeric|min:0|max:100',
            'nilai_inisiatif' => 'required|numeric|min:0|max:100',
            'nilai_adaptasi' => 'required|numeric|min:0|max:100',
            'catatan_pembimbing' => 'nullable|string', // Jangan lupa validasi catatan juga
        ]);

        // 2. Hitung Ulang Rata-rata
        $total = $request->nilai_disiplin + $request->nilai_etika + $request->nilai_motivasi +
                 $request->nilai_kualitas + $request->nilai_penguasaan + $request->nilai_produktivitas +
                 $request->nilai_kerjasama + $request->nilai_komunikasi + $request->nilai_inisiatif +
                 $request->nilai_adaptasi;

        $rataRata = $total / 10;
        $predikat = $this->hitungPredikat($rataRata);

        // 3. Update Data Evaluasi
        $evaluasi->update([
            'nilai_disiplin' => $request->nilai_disiplin,
            'nilai_etika' => $request->nilai_etika,
            'nilai_motivasi' => $request->nilai_motivasi,
            'nilai_kualitas' => $request->nilai_kualitas,
            'nilai_penguasaan' => $request->nilai_penguasaan,
            'nilai_produktivitas' => $request->nilai_produktivitas,
            'nilai_kerjasama' => $request->nilai_kerjasama,
            'nilai_komunikasi' => $request->nilai_komunikasi,
            'nilai_inisiatif' => $request->nilai_inisiatif,
            'nilai_adaptasi' => $request->nilai_adaptasi,
            'nilai_rata_rata' => $rataRata,
            'predikat_huruf' => $predikat['huruf'],
            'predikat_keterangan' => $predikat['ket'],
            'catatan_pembimbing' => $request->catatan_pembimbing,
        ]);

        // Ambil data peserta dari relasi evaluasi
        $peserta = $evaluasi->peserta;

        // Pastikan status jadi 'selesai' jika masih 'menunggu_nilai' atau 'aktif'
        if ($peserta && in_array($peserta->status, ['aktif', 'menunggu_nilai'])) {
            $peserta->update(['status' => 'selesai']);
        }

        return redirect()->route('admin.evaluasi.index')->with('success', 'Nilai evaluasi berhasil diperbarui.');
    }

    public function show($id)
    {
        // $id di sini adalah ID EVALUASI, bukan ID Peserta
        $evaluasi = Evaluasi::with('peserta')->findOrFail($id);

        // Return view partial untuk isi modal
        return view('admin.evaluasi._detail_modal', compact('evaluasi'));
    }

    // 7. HAPUS PENILAIAN
    public function destroy($id)
    {
        $evaluasi = Evaluasi::findOrFail($id);

        // Kembalikan status peserta jadi Aktif (agar bisa dinilai ulang / belum selesai)
        $peserta = Peserta::findOrFail($evaluasi->peserta_id);
        $peserta->update(['status' => 'aktif']);

        $evaluasi->delete();

        return redirect()->route('admin.evaluasi.index')->with('success', 'Data evaluasi berhasil dihapus.');
    }

    // Helper Function (Private)
    private function hitungPredikat($nilai)
    {
        if ($nilai >= 90) {
            return ['huruf' => 'A', 'ket' => 'Sangat Baik'];
        }
        if ($nilai >= 80) {
            return ['huruf' => 'B', 'ket' => 'Baik'];
        }
        if ($nilai >= 70) {
            return ['huruf' => 'C', 'ket' => 'Cukup'];
        }

        return ['huruf' => 'D', 'ket' => 'Kurang'];
    }
}
