<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        // Default tanggal hari ini jika tidak ada filter
        $tanggal = $request->input('tanggal', Carbon::today()->format('Y-m-d'));

        $query = Absensi::with(['peserta'])->orderBy('created_at', 'desc');

        // Filter Tanggal
        if ($tanggal) {
            $query->whereDate('tgl', $tanggal);
        }

        // Filter Status (Opsional)
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $data = $query->paginate(20);

        return view('admin.absensi.index', compact('data', 'tanggal'));
    }

    public function update(Request $request, $id)
    {
        $absensi = Absensi::findOrFail($id);

        $request->validate([
            'status' => 'required|in:hadir,izin,sakit,alfa',
        ]);

        $absensi->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Status absensi berhasil diperbarui.');
    }

    // Fitur Hapus (Jika salah absen)
    public function destroy($id)
    {
        Absensi::findOrFail($id)->delete();

        return back()->with('success', 'Data absensi dihapus.');
    }
}
