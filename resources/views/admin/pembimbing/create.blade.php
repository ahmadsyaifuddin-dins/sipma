<x-app-layout>
    <x-slot name="header">
        {{ __('Tambah Pembimbing Baru') }}
    </x-slot>

    <div class="p-6 bg-white rounded-lg shadow-xs">
        <form action="{{ route('admin.pembimbing.store') }}" method="POST">
            @csrf

            @include('admin.pembimbing._form')

        </form>
    </div>
</x-app-layout>
