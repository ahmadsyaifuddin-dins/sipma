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
            ->whereIn('status', ['aktif', 'selesai'])
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
        $request->validate([
            'nilai_disiplin' => 'required|numeric|min:0|max:100',
            'nilai_kerjasama' => 'required|numeric|min:0|max:100',
            'nilai_inisiatif' => 'required|numeric|min:0|max:100',
            'nilai_kerajinan' => 'required|numeric|min:0|max:100',
            'catatan_pembimbing' => 'nullable|string',
        ]);

        // Hitung Rata-rata
        $rataRata = ($request->nilai_disiplin + $request->nilai_kerjasama + $request->nilai_inisiatif + $request->nilai_kerajinan) / 4;

        // Tentukan Predikat (Sesuai requestmu: Otomatis)
        $predikat = $this->hitungPredikat($rataRata);

        Evaluasi::create([
            'peserta_id' => $peserta_id,
            'nilai_disiplin' => $request->nilai_disiplin,
            'nilai_kerjasama' => $request->nilai_kerjasama,
            'nilai_inisiatif' => $request->nilai_inisiatif,
            'nilai_kerajinan' => $request->nilai_kerajinan,
            'nilai_rata_rata' => $rataRata,
            'predikat_huruf' => $predikat['huruf'],
            'predikat_keterangan' => $predikat['ket'],
            'catatan_pembimbing' => $request->catatan_pembimbing,
        ]);

        // Opsional: Ubah status peserta jadi 'Selesai' jika belum
        $peserta = Peserta::findOrFail($peserta_id);
        if ($peserta->status == 'aktif') {
            $peserta->update(['status' => 'selesai']);
        }

        return redirect()->route('admin.evaluasi.index')->with('success', 'Penilaian berhasil disimpan. Peserta dinyatakan LULUS.');
    }

    // 4. FORM EDIT (Jika ada revisi nilai)
    public function edit($id)
    {
        $evaluasi = Evaluasi::with('peserta')->findOrFail($id);

        return view('admin.evaluasi.edit', compact('evaluasi'));
    }

    // 5. UPDATE NILAI
    public function update(Request $request, $id)
    {
        $evaluasi = Evaluasi::findOrFail($id);

        $request->validate([
            'nilai_disiplin' => 'required|numeric|min:0|max:100',
            'nilai_kerjasama' => 'required|numeric|min:0|max:100',
            'nilai_inisiatif' => 'required|numeric|min:0|max:100',
            'nilai_kerajinan' => 'required|numeric|min:0|max:100',
        ]);

        // Hitung ulang
        $rataRata = ($request->nilai_disiplin + $request->nilai_kerjasama + $request->nilai_inisiatif + $request->nilai_kerajinan) / 4;
        $predikat = $this->hitungPredikat($rataRata);

        $evaluasi->update([
            'nilai_disiplin' => $request->nilai_disiplin,
            'nilai_kerjasama' => $request->nilai_kerjasama,
            'nilai_inisiatif' => $request->nilai_inisiatif,
            'nilai_kerajinan' => $request->nilai_kerajinan,
            'nilai_rata_rata' => $rataRata,
            'predikat_huruf' => $predikat['huruf'],
            'predikat_keterangan' => $predikat['ket'],
            'catatan_pembimbing' => $request->catatan_pembimbing,
        ]);

        return redirect()->route('admin.evaluasi.index')->with('success', 'Nilai evaluasi berhasil diperbarui.');
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
