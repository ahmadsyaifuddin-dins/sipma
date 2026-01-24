<x-app-layout>
    <x-slot name="header">
        {{ __('Data Pembimbing Lapangan') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-semibold text-gray-700">Daftar Pembimbing</h2>
            <a href="{{ route('admin.pembimbing.create') }}"
                class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 shadow-md transition flex items-center gap-2">
                <i class="fas fa-plus"></i> Tambah Pembimbing
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 flex items-center gap-2 text-sm text-green-700 bg-green-100 rounded-lg p-3 border border-green-200"
                role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <div class="w-full overflow-hidden rounded-lg shadow-xs border border-gray-200">
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
                            <tr class="text-gray-700 hover:bg-gray-50 transition">
                                <td class="px-4 py-3 text-sm font-mono">{{ $item->nip }}</td>
                                <td class="px-4 py-3 font-semibold">
                                    <div class="flex items-center gap-2">
                                        <div class="p-2 bg-indigo-50 text-indigo-600 rounded-full">
                                            <i class="fas fa-user-tie"></i>
                                        </div>
                                        {{ $item->nama }}
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <div class="font-bold text-gray-700">{{ $item->jabatan }}</div>
                                    <span
                                        class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800 mt-1">
                                        {{ $item->bidang }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    @if ($item->no_hp)
                                        <a href="https://wa.me/{{ $item->no_hp }}" target="_blank"
                                            class="text-green-600 hover:text-green-800 flex items-center gap-1">
                                            <i class="fab fa-whatsapp"></i> {{ $item->no_hp }}
                                        </a>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-center text-sm">
                                    <div class="flex items-center justify-center gap-3">

                                        <a href="{{ route('admin.pembimbing.show', $item->id) }}"
                                            class="text-blue-500 hover:text-blue-700 transition" title="Lihat Detail">
                                            <i class="fas fa-eye text-lg"></i>
                                        </a>

                                        <a href="{{ route('admin.pembimbing.edit', $item->id) }}"
                                            class="text-yellow-500 hover:text-yellow-700 transition" title="Edit Data">
                                            <i class="fas fa-edit text-lg"></i>
                                        </a>

                                        <form action="{{ route('admin.pembimbing.destroy', $item->id) }}"
                                            method="POST" class="inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 transition"
                                                title="Hapus Data">
                                                <i class="fas fa-trash-alt text-lg"></i>
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
                <div class="p-8 text-center text-gray-500">
                    <i class="fas fa-users-slash text-4xl mb-3 text-gray-300"></i>
                    <p>Belum ada data pembimbing.</p>
                </div>
            @endif
        </div>

        <div class="mt-4">
            {{ $data->links() }}
        </div>
    </div>
</x-app-layout>
