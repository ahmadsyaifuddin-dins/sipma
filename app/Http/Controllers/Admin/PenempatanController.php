<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembimbing;
use App\Models\Penempatan;
use Illuminate\Http\Request;

class PenempatanController extends Controller
{
    // 1. DAFTAR PENEMPATAN
    public function index(Request $request)
    {
        $query = Penempatan::with(['peserta', 'pembimbing']);

        // Fitur Cari (Nama Peserta / Ruangan / Pembimbing)
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('peserta', function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%");
            })->orWhereHas('pembimbing', function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%");
            })->orWhere('ruangan', 'like', "%{$search}%");
        }

        $data = $query->latest()->paginate(10);

        return view('admin.penempatan.index', compact('data'));
    }

    // 2. FORM EDIT PENEMPATAN
    public function edit($id)
    {
        $penempatan = Penempatan::with(['peserta', 'pembimbing'])->findOrFail($id);
        $pembimbings = Pembimbing::pluck('nama', 'id'); // Untuk dropdown

        return view('admin.penempatan.edit', compact('penempatan', 'pembimbings'));
    }

    // 3. UPDATE DATABASE
    public function update(Request $request, $id)
    {
        $request->validate([
            'pembimbing_id' => 'required|exists:pembimbing,id',
            'ruangan' => 'required|string',
        ]);

        $penempatan = Penempatan::findOrFail($id);

        $penempatan->update([
            'pembimbing_id' => $request->pembimbing_id,
            'ruangan' => $request->ruangan,
        ]);

        return redirect()->route('admin.penempatan.index')
            ->with('success', 'Data penempatan peserta berhasil diperbarui.');
    }
}
