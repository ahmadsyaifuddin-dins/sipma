<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembimbing;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    // 1. TAMPILKAN SEMUA DATA (Dengan Fitur Cari & Filter)
    public function index(Request $request)
    {
        $query = Peserta::with(['user', 'penempatan.pembimbing']);

        // Filter Status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Pencarian (Nama / NIM / Instansi)
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%")
                    ->orWhere('nim_nisn', 'like', "%{$search}%")
                    ->orWhere('institusi', 'like', "%{$search}%");
            });
        }

        $data = $query->latest()->paginate(10); // Pagination biar rapi

        return view('admin.peserta.index', compact('data'));
    }

    // Tambahkan method ini di PesertaController
    public function show($id)
    {
        // Ambil data peserta beserta relasinya
        $peserta = Peserta::with(['penempatan.pembimbing', 'user'])->findOrFail($id);

        // Return VIEW PARTIAL (Hanya potongan HTML untuk isi modal)
        // Kita belum buat view-nya, habis ini kita buat.
        return view('admin.peserta._detail_modal', compact('peserta'));
    }

    // 2. FORM EDIT (Misal: Salah nama, atau mau ganti Pembimbing)
    public function edit($id)
    {
        $peserta = Peserta::with('penempatan')->findOrFail($id);
        $pembimbings = Pembimbing::pluck('nama', 'id'); // Untuk dropdown ganti pembimbing

        return view('admin.peserta.edit', compact('peserta', 'pembimbings'));
    }

    // 3. UPDATE DATA
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'status' => 'required|in:pending,aktif,selesai,ditolak',
            // Validasi Pembimbing jika status aktif
            'pembimbing_id' => 'nullable|exists:pembimbing,id',
        ]);

        $peserta = Peserta::findOrFail($id);

        // Update Data Dasar
        $peserta->update([
            'nama_lengkap' => $request->nama_lengkap,
            'status' => $request->status,
            // Tambahkan field lain jika perlu diedit admin
        ]);

        // Update User Name juga (Biar sinkron)
        $peserta->user->update(['name' => $request->nama_lengkap]);

        // Update Penempatan (Jika ada perubahan pembimbing)
        if ($request->pembimbing_id && $peserta->penempatan) {
            $peserta->penempatan->update([
                'pembimbing_id' => $request->pembimbing_id,
                'ruangan' => $request->ruangan ?? $peserta->penempatan->ruangan,
            ]);
        }

        return redirect()->route('admin.peserta.index')->with('success', 'Data peserta berhasil diperbarui.');
    }

    // 4. HAPUS DATA (PENTING: Hapus User-nya juga)
    public function destroy($id)
    {
        $peserta = Peserta::findOrFail($id);

        // Kita hapus User-nya (Induknya), maka Peserta (Anaknya) otomatis terhapus karena Cascade
        $user = User::findOrFail($peserta->user_id);
        $user->delete();

        return redirect()->route('admin.peserta.index')->with('success', 'Data peserta dan akun login berhasil dihapus permanen.');
    }
}
