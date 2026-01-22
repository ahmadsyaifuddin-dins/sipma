<x-app-layout>
    <x-slot name="header">
        {{ __('Data Pembimbing Lapangan') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-700">Daftar Pembimbing</h2>
            <a href="{{ route('admin.pembimbing.create') }}"
                class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                + Tambah Pembimbing
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 text-sm text-green-700 bg-green-100 rounded-lg p-3" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="w-full overflow-hidden rounded-lg shadow-xs border">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                            <th class="px-4 py-3">NIP</th>
                            <th class="px-4 py-3">Nama Lengkap</th>
                            <th class="px-4 py-3">Jabatan & Bidang</th>
                            <th class="px-4 py-3">Kontak</th>
                            <th class="px-4 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach ($data as $item)
                            <tr class="text-gray-700 hover:bg-gray-50">
                                <td class="px-4 py-3 text-sm font-mono">{{ $item->nip }}</td>
                                <td class="px-4 py-3 font-semibold">{{ $item->nama }}</td>
                                <td class="px-4 py-3 text-sm">
                                    <div class="font-semibold">{{ $item->jabatan }}</div>
                                    <div class="text-xs text-gray-500">{{ $item->bidang }}</div>
                                </td>
                                <td class="px-4 py-3 text-sm">{{ $item->no_hp ?? '-' }}</td>
                                <td class="px-4 py-3 text-center text-sm">
                                    <div class="flex items-center justify-center space-x-4 text-sm">
                                        <a href="{{ route('admin.pembimbing.edit', $item->id) }}"
                                            class="text-purple-600 hover:underline">Edit</a>

                                        <form action="{{ route('admin.pembimbing.destroy', $item->id) }}" method="POST"
                                            class="inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline mx-1">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if ($data->isEmpty())
                <div class="p-4 text-center text-gray-500">
                    Belum ada data pembimbing.
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
