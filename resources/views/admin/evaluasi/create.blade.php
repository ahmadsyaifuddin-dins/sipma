<x-app-layout>
    <x-slot name="header">Input Penilaian Magang</x-slot>

    @include('admin.evaluasi._form', [
        'url' => route('admin.evaluasi.store', $peserta->id),
        'peserta' => $peserta,
        'evaluasi' => null, // Mode Create, evaluasi kosong
    ])

</x-app-layout>
