<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePembimbingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Ubah jadi true agar Admin bisa akses
    }

    public function rules(): array
    {
        return [
            'nip' => 'required|numeric|unique:pembimbing,nip,'.$this->pembimbing->id,
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'bidang' => 'required|string|max:255',
            'no_hp' => 'nullable|numeric',
        ];
    }

    // Custom pesan error bahasa Indonesia
    public function messages()
    {
        return [
            'nip.required' => 'NIP wajib diisi.',
            'nip.unique' => 'NIP ini sudah terdaftar.',
            'nama.required' => 'Nama pembimbing wajib diisi.',
            'jabatan.required' => 'Jabatan wajib diisi.',
            'bidang.required' => 'Bidang wajib diisi.',
            'no_hp.numeric' => 'No. HP harus angka.',
        ];
    }
}
