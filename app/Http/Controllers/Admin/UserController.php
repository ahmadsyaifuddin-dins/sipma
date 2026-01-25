<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Tampilkan SEMUA user (Admin & Pemagang)
        // Urutkan admin dulu, baru pemagang, lalu berdasarkan tanggal terbaru
        $users = User::orderByRaw("FIELD(role, 'admin', 'pemagang')")
            ->latest()
            ->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin', // Hardcode role admin biar aman
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'Administrator baru berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role ?? $user->role,
        ];

        // Cek jika password diisi, baru update passwordnya
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')
            ->with('success', 'Data Akun berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        // Proteksi: Jangan biarkan admin menghapus dirinya sendiri saat login
        if ($user->id === Auth::id()) {
            return back()->with('error', 'Anda tidak bisa menghapus akun yang sedang digunakan!');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'Akun pengguna berhasil dihapus.');
    }
}
