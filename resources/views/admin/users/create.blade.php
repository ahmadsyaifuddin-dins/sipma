<x-app-layout>
    <x-slot name="header">Tambah Pengguna Baru</x-slot>

    <div class="p-6 bg-white rounded-lg shadow-md max-w-xl mx-auto">

        {{-- Panggil Form Partial --}}
        @include('admin.users._form', [
            'url' => route('admin.users.store'),
            'user' => null,
        ])

    </div>
</x-app-layout>
