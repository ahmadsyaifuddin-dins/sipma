<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Pembimbing') }}
    </x-slot>

    <div class="p-6 bg-white rounded-lg shadow-xs">
        <form action="{{ route('admin.pembimbing.update', $pembimbing->id) }}" method="POST">
            @csrf
            @method('PUT')

            @include('admin.pembimbing._form')

        </form>
    </div>
</x-app-layout>
