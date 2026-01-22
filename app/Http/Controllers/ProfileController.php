<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        if ($request->hasFile('photo')) {

            // 1. Hapus Foto Lama (Jika ada)
            // Cek apakah user punya foto dan filenya beneran ada di folder public
            $oldPath = public_path($request->user()->profile_photo_path);
            if ($request->user()->profile_photo_path && File::exists($oldPath)) {
                File::delete($oldPath);
            }

            // 2. Siapkan Variabel
            $file = $request->file('photo');
            // Bikin nama unik: waktu_namafile.jpg
            $fileName = time().'_'.str_replace(' ', '_', $file->getClientOriginalName());
            $destinationPath = public_path('profile-photos'); // Folder tujuan: public/profile-photos

            // 3. Pindahkan File (move)
            $file->move($destinationPath, $fileName);

            // 4. Simpan path relatif ke database
            $request->user()->profile_photo_path = 'profile-photos/'.$fileName;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
