<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\BidangHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePembimbingRequest;
use App\Http\Requests\UpdatePembimbingRequest;
use App\Models\Pembimbing;

class PembimbingController extends Controller
{
    public function index()
    {
        // Ambil data terbaru
        $data = Pembimbing::latest()->get();

        return view('admin.pembimbing.index', compact('data'));
    }

    public function create()
    {
        // Panggil data dari Helper
        $listBidang = BidangHelper::getAll();

        return view('admin.pembimbing.create', compact('listBidang'));
    }

    // Gunakan Request Class terpisah (Rule #1)
    public function store(StorePembimbingRequest $request)
    {
        // Logic Simpan (Simple karena validasi sudah di Request)
        Pembimbing::create($request->validated());

        return redirect()->route('admin.pembimbing.index')
            ->with('success', 'Data Pembimbing berhasil ditambahkan.');
    }

    public function edit(Pembimbing $pembimbing)
    {
        $listBidang = BidangHelper::getAll();

        return view('admin.pembimbing.edit', compact('pembimbing', 'listBidang'));
    }

    public function update(UpdatePembimbingRequest $request, Pembimbing $pembimbing)
    {
        $pembimbing->update($request->validated());

        return redirect()->route('admin.pembimbing.index')
            ->with('success', 'Data Pembimbing berhasil diperbarui.');
    }

    public function destroy(Pembimbing $pembimbing)
    {
        $pembimbing->delete();

        return redirect()->route('admin.pembimbing.index')
            ->with('success', 'Data Pembimbing berhasil dihapus.');
    }
}
