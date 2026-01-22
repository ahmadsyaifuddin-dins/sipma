<x-app-layout>
    <x-slot name="header">Data Peserta Magang</x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">

        <form method="GET" action="{{ route('admin.peserta.index') }}"
            class="mb-6 flex flex-col md:flex-row gap-4 justify-between">

            <div class="flex items-center gap-2">
                <span class="text-sm text-gray-600">Filter Status:</span>
                <select name="status" onchange="this.form.submit()"
                    class="border-gray-300 rounded text-sm focus:ring-indigo-500">
                    <option value="">Semua</option>
                    <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <div class="flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Nama / NIM..."
                    class="border-gray-300 rounded text-sm w-full md:w-64 focus:ring-indigo-500">
                <button type="submit"
                    class="bg-indigo-600 text-white px-4 py-2 rounded text-sm hover:bg-indigo-700">Cari</button>
            </div>
        </form>

        <div class="w-full overflow-x-auto border rounded-lg">
            <table class="w-full whitespace-no-wrap">
                <thead class="bg-gray-50 border-b">
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">
                        <th class="px-4 py-3">Peserta</th>
                        <th class="px-4 py-3">Institusi</th>
                        <th class="px-4 py-3">Pembimbing & Ruangan</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y">
                    @forelse($data as $item)
                        <tr class="text-gray-700 hover:bg-gray-50">
                            <td class="px-4 py-3">
                                <div class="font-semibold">{{ $item->nama_lengkap }}</div>
                                <div class="text-xs text-gray-500 font-mono">{{ $item->nim_nisn }}</div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $item->institusi }} <br>
                                <span class="text-xs text-gray-400">{{ $item->jurusan }}</span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                @if ($item->penempatan)
                                    <div class="font-medium text-gray-700">
                                        {{ $item->penempatan->pembimbing->nama ?? '-' }}</div>
                                    <div class="text-xs text-gray-500">{{ $item->penempatan->ruangan }}</div>
                                @else
                                    <span class="text-gray-400 italic">- Belum ditempatkan -</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-xs">
                                @php
                                    $colors = [
                                        'aktif' => 'bg-green-100 text-green-700',
                                        'pending' => 'bg-yellow-100 text-yellow-700',
                                        'selesai' => 'bg-blue-100 text-blue-700',
                                        'ditolak' => 'bg-red-100 text-red-700',
                                    ];
                                @endphp
                                <span
                                    class="px-2 py-1 font-semibold leading-tight rounded-full {{ $colors[$item->status] ?? 'bg-gray-100' }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex items-center justify-center gap-2 text-sm">
                                    <a href="{{ route('admin.peserta.edit', $item->id) }}"
                                        class="text-blue-600 hover:underline">Edit</a>

                                    <form action="{{ route('admin.peserta.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('HATI-HATI! Menghapus data ini akan menghapus akun login dan riwayat absensinya juga. Lanjutkan?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-6 text-center text-gray-500">Data tidak ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $data->links() }}
        </div>
    </div>
</x-app-layout>
