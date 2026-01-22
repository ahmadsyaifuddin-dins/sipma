<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePendaftaranRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check(); // User harus login
    }

    public function rules(): array
    {
        return [
            'nim_nisn' => 'required|string|max:20|unique:peserta,nim_nisn',
            'nama_lengkap' => 'required|string|max:255',
            'institusi' => 'required|string|max:255', // Nama Sekolah/Kampus
            'jurusan' => 'required|string|max:255',
            'no_hp' => 'required|numeric',
            'alamat' => 'required|string',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date|after:tgl_mulai',

            // Validasi File (Old School Upload)
            'foto_profil' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Max 2MB
            'file_surat_pengantar' => 'required|mimes:pdf|max:5120', // Max 5MB, PDF Only
        ];
    }

    public function messages()
    {
        return [
            'nim_nisn.unique' => 'NIM/NISN ini sudah terdaftar.',
            'tgl_selesai.after' => 'Tanggal selesai harus sesudah tanggal mulai.',
            'file_surat_pengantar.mimes' => 'Surat pengantar harus berformat PDF.',
            'foto_profil.max' => 'Ukuran foto maksimal 2MB.',
        ];
    }
}
