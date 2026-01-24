<?php

namespace App\Http\Controllers\Pemagang;

use App\Http\Controllers\Controller;
use App\Models\Penempatan;
use Illuminate\Http\Request;

class PenempatanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data penempatan dimana peserta-nya berstatus 'aktif'
        $query = Penempatan::with(['peserta', 'pembimbing'])
            ->whereHas('peserta', function ($q) {
                $q->where('status', 'aktif');
            });

        // Fitur Pencarian Sederhana
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('peserta', function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%")
                    ->orWhere('institusi', 'like', "%{$search}%");
            })->orWhere('ruangan', 'like', "%{$search}%");
        }

        // Urutkan berdasarkan ruangan agar yang seruangan kumpul
        $data = $query->orderBy('ruangan')->paginate(10);

        return view('pemagang.penempatan.index', compact('data'));
    }
}
