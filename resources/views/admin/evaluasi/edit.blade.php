<x-app-layout>
    <x-slot name="header">Edit Penilaian Magang</x-slot>

    @include('admin.evaluasi._form', [
        'url' => route('admin.evaluasi.update', $evaluasi->id),
        'peserta' => $evaluasi->peserta, // Ambil data peserta dari relasi evaluasi
        'evaluasi' => $evaluasi, // Mode Edit, kirim data evaluasi
    ])

</x-app-layout>
