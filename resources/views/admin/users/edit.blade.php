<x-app-layout>
    <x-slot name="header">Edit Pengguna</x-slot>

    <div class="p-6 bg-white rounded-lg shadow-md max-w-xl mx-auto">

        {{-- Panggil Form Partial --}}
        @include('admin.users._form', [
            'url' => route('admin.users.update', $user->id),
            'user' => $user,
        ])

    </div>
</x-app-layout>
