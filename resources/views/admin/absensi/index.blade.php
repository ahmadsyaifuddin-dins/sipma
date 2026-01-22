<x-app-layout>
    <x-slot name="header">Monitoring Absensi Peserta</x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">

        <form method="GET" action="{{ route('admin.absensi.index') }}"
            class="mb-6 bg-gray-50 p-4 rounded-lg border border-gray-200 flex flex-col md:flex-row gap-4 items-end">

            <div class="w-full md:w-auto">
                <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Tanggal</label>
                <input type="date" name="tanggal" value="{{ $tanggal }}"
                    class="border-gray-300 rounded focus:ring-indigo-500 text-sm" onchange="this.form.submit()">
            </div>

            <div class="w-full md:w-auto">
                <label class="block text-sm font-medium text-gray-700 mb-1">Filter Status</label>
                <select name="status" class="border-gray-300 rounded focus:ring-indigo-500 text-sm w-full md:w-40"
                    onchange="this.form.submit()">
                    <option value="">Semua</option>
                    <option value="hadir" {{ request('status') == 'hadir' ? 'selected' : '' }}>Hadir</option>
                    <option value="izin" {{ request('status') == 'izin' ? 'selected' : '' }}>Izin</option>
                    <option value="sakit" {{ request('status') == 'sakit' ? 'selected' : '' }}>Sakit</option>
                    <option value="alfa" {{ request('status') == 'alfa' ? 'selected' : '' }}>Alfa</option>
                </select>
            </div>

            <div class="flex-grow text-right hidden md:block">
                <span class="text-sm text-gray-500">Menampilkan data tanggal:
                    <strong>{{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}</strong></span>
            </div>
        </form>

        <div class="w-full overflow-x-auto border rounded-lg">
            <table class="w-full whitespace-no-wrap">
                <thead class="bg-gray-50 border-b">
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">
                        <th class="px-4 py-3">Peserta</th>
                        <th class="px-4 py-3">Jam Masuk/Pulang</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 w-1/3">Keterangan / Alasan</th>
                        <th class="px-4 py-3 text-center">Aksi Admin</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y">
                    @forelse($data as $item)
                        <tr class="text-gray-700 hover:bg-gray-50">
                            <td class="px-4 py-3">
                                <div class="font-semibold">{{ $item->peserta->nama_lengkap }}</div>
                                <div class="text-xs text-gray-500">{{ $item->peserta->institusi }}</div>
                            </td>

                            <td class="px-4 py-3 text-sm font-mono">
                                @if ($item->status == 'hadir')
                                    <div class="text-green-600">In: {{ $item->jam_masuk ?? '--:--' }}</div>
                                    <div class="text-red-600">Out: {{ $item->jam_keluar ?? '--:--' }}</div>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>

                            <td class="px-4 py-3 text-xs">
                                @php
                                    $colors = [
                                        'hadir' => 'bg-green-100 text-green-700',
                                        'izin' => 'bg-yellow-100 text-yellow-700',
                                        'sakit' => 'bg-red-100 text-red-700',
                                        'alfa' => 'bg-gray-100 text-gray-700',
                                    ];
                                @endphp
                                <span
                                    class="px-2 py-1 font-semibold leading-tight rounded-full {{ $colors[$item->status] ?? 'bg-gray-100' }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>

                            <td class="px-4 py-3 text-sm">
                                @if ($item->status != 'hadir')
                                    <div
                                        class="p-2 bg-yellow-50 border border-yellow-100 rounded text-yellow-800 italic text-xs">
                                        "{{ $item->keterangan ?? 'Tidak ada keterangan' }}"
                                    </div>
                                @else
                                    <span class="text-gray-400 text-xs">-</span>
                                @endif
                            </td>

                            <td class="px-4 py-3 text-center">
                                <div x-data="{ open: false }" class="relative inline-block text-left">
                                    <button @click="open = !open"
                                        class="text-gray-500 hover:text-indigo-600 focus:outline-none">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                            </path>
                                        </svg>
                                    </button>

                                    <div x-show="open" @click.away="open = false"
                                        class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50"
                                        style="display: none;">
                                        <div class="py-1">
                                            <p class="px-4 py-2 text-xs text-gray-400 border-b">Ubah Status:</p>

                                            <form action="{{ route('admin.absensi.update', $item->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')

                                                <button name="status" value="hadir"
                                                    class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Jadikan
                                                    Hadir</button>
                                                <button name="status" value="alfa"
                                                    class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Jadikan
                                                    Alfa (Tolak)</button>
                                            </form>

                                            <form action="{{ route('admin.absensi.destroy', $item->id) }}"
                                                method="POST" class="delete-form border-t mt-1">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Hapus
                                                    Data</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-6 text-center text-gray-500">Tidak ada data absensi pada tanggal
                                ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $data->withQueryString()->links() }}
        </div>
    </div>
</x-app-layout>
