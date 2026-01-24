<x-app-layout>
    <x-slot name="header">Data Penempatan Magang</x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-semibold text-gray-700">Monitoring Lokasi & Pembimbing</h2>

            <form method="GET" action="{{ route('admin.penempatan.index') }}" class="flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Cari Peserta / Ruangan..."
                    class="border-gray-300 rounded text-sm w-64 focus:ring-indigo-500">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded text-sm hover:bg-indigo-700">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>

        @if (session('success'))
            <div
                class="mb-4 flex items-center gap-2 text-sm text-green-700 bg-green-100 rounded-lg p-3 border border-green-200">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <div class="w-full overflow-x-auto border rounded-lg">
            <table class="w-full whitespace-no-wrap">
                <thead class="bg-gray-50 border-b">
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">
                        <th class="px-4 py-3">Peserta</th>
                        <th class="px-4 py-3">Unit Kerja / Ruangan</th>
                        <th class="px-4 py-3">Pembimbing Lapangan</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y">
                    @forelse($data as $item)
                        <tr class="text-gray-700 hover:bg-gray-50 transition">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full border"
                                            src="{{ $item->peserta->foto_profil ? asset($item->peserta->foto_profil) : 'https://ui-avatars.com/api/?name=' . urlencode($item->peserta->nama_lengkap) }}"
                                            alt="" />
                                    </div>
                                    <div>
                                        <p class="font-semibold">{{ $item->peserta->nama_lengkap }}</p>
                                        <p class="text-xs text-gray-500">{{ $item->peserta->institusi }}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-4 py-3 text-sm">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-building text-indigo-400"></i>
                                    <span class="font-medium">{{ $item->ruangan }}</span>
                                </div>
                            </td>

                            <td class="px-4 py-3 text-sm">
                                @if ($item->pembimbing)
                                    <div class="flex flex-col">
                                        <span class="font-semibold text-gray-700">{{ $item->pembimbing->nama }}</span>
                                        <span class="text-xs text-gray-500">NIP: {{ $item->pembimbing->nip }}</span>
                                    </div>
                                @else
                                    <span class="text-red-500 text-xs italic">Belum ada pembimbing</span>
                                @endif
                            </td>

                            <td class="px-4 py-3 text-center">
                                <a href="{{ route('admin.penempatan.edit', $item->id) }}"
                                    class="inline-flex items-center px-3 py-2 bg-yellow-50 text-yellow-700 rounded-lg hover:bg-yellow-100 transition border border-yellow-200 text-xs font-bold gap-1">
                                    <i class="fas fa-exchange-alt"></i> Pindah / Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-6 text-center text-gray-500">
                                Belum ada data penempatan.
                            </td>
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
