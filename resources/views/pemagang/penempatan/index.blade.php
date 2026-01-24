<x-app-layout>
    <x-slot name="header">Info Penempatan Rekan Magang</x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">

        <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
            <div>
                <h2 class="text-lg font-semibold text-gray-700">Daftar Rekan Magang Aktif</h2>
                <p class="text-xs text-gray-500">Cari teman satu ruangan atau satu institusi.</p>
            </div>

            <form method="GET" action="{{ route('pemagang.penempatan.index') }}" class="flex gap-2 w-full md:w-auto">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Nama / Ruangan..."
                    class="border-gray-300 rounded text-sm w-full md:w-64 focus:ring-indigo-500">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded text-sm hover:bg-indigo-700">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>

        <div class="w-full overflow-x-auto border rounded-lg">
            <table class="w-full whitespace-no-wrap">
                <thead class="bg-gray-50 border-b">
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">
                        <th class="px-4 py-3 text-center" width="80">Foto</th>
                        <th class="px-4 py-3">Nama Peserta</th>
                        <th class="px-4 py-3">Asal Institusi</th>
                        <th class="px-4 py-3">Unit Kerja / Ruangan</th>
                        <th class="px-4 py-3">Pembimbing</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y">
                    @forelse($data as $item)
                        <tr class="text-gray-700 hover:bg-gray-50 transition">

                            <td class="px-4 py-3 text-center">
                                <div class="relative w-10 h-10 mx-auto">
                                    <img class="object-cover w-full h-full rounded-full border border-gray-200"
                                        src="{{ $item->peserta->foto_profil ? asset($item->peserta->foto_profil) : 'https://ui-avatars.com/api/?name=' . urlencode($item->peserta->nama_lengkap) . '&color=7F9CF5&background=EBF4FF' }}"
                                        alt="">
                                </div>
                            </td>

                            <td class="px-4 py-3">
                                <div
                                    class="font-semibold {{ $item->peserta->user_id == Auth::id() ? 'text-indigo-600' : 'text-gray-700' }}">
                                    {{ $item->peserta->nama_lengkap }}
                                    @if ($item->peserta->user_id == Auth::id())
                                        <span
                                            class="ml-2 px-2 py-0.5 text-[10px] bg-indigo-100 text-indigo-700 rounded-full border border-indigo-200">Anda</span>
                                    @endif
                                </div>
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $item->peserta->institusi }}
                                <div class="text-xs text-gray-400">{{ $item->peserta->jurusan }}</div>
                            </td>

                            <td class="px-4 py-3 text-sm">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ $item->ruangan }}
                                </span>
                            </td>

                            <td class="px-4 py-3 text-sm">
                                @if ($item->pembimbing)
                                    <div class="flex items-center gap-1">
                                        <i class="fas fa-user-tie text-gray-400 text-xs"></i>
                                        <span>{{ $item->pembimbing->nama }}</span>
                                    </div>
                                @else
                                    <span class="text-gray-400 italic text-xs">-</span>
                                @endif
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-gray-500">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fas fa-users-slash text-4xl text-gray-300 mb-2"></i>
                                    <p>Belum ada data penempatan aktif.</p>
                                </div>
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
