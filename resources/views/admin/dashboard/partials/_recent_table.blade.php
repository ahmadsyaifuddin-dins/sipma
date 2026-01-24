<div class="w-full overflow-x-auto">
    <table class="w-full whitespace-no-wrap">
        <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                <th class="px-4 py-3">Nama Peserta</th>
                <th class="px-4 py-3">Institusi</th>
                <th class="px-4 py-3">Tanggal Daftar</th>
                <th class="px-4 py-3">Status</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y">
            @forelse($latest_peserta ?? [] as $item)
                <tr class="text-gray-700 hover:bg-gray-50 transition">
                    {{-- KOLOM NAMA & FOTO --}}
                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                <img class="object-cover w-full h-full rounded-full border border-gray-200"
                                    src="{{ $item->foto_profil ? asset($item->foto_profil) : 'https://ui-avatars.com/api/?name=' . urlencode($item->nama_lengkap) . '&color=7F9CF5&background=EBF4FF' }}"
                                    alt="" loading="lazy" />
                            </div>
                            <div>
                                <p class="font-semibold text-gray-700">{{ $item->nama_lengkap }}</p>
                                <p class="text-xs text-gray-500">{{ $item->nim_nisn }}</p>
                            </div>
                        </div>
                    </td>

                    {{-- KOLOM INSTITUSI --}}
                    <td class="px-4 py-3 text-sm">
                        <div class="font-medium text-gray-700">{{ $item->institusi }}</div>
                        <div class="text-xs text-gray-400">{{ $item->jurusan }}</div>
                    </td>

                    {{-- KOLOM TANGGAL --}}
                    <td class="px-4 py-3 text-sm text-gray-500">
                        {{ $item->created_at->format('d M Y') }}
                        <span class="text-xs text-gray-400 block">{{ $item->created_at->format('H:i') }}</span>
                    </td>

                    {{-- KOLOM STATUS --}}
                    <td class="px-4 py-3 text-xs">
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full border border-orange-200">
                            Pending
                        </span>
                    </td>
                </tr>
            @empty
                {{-- EMPTY STATE --}}
                <tr>
                    <td colspan="4" class="px-4 py-8 text-center text-gray-500">
                        <div class="flex flex-col items-center justify-center py-4">
                            <div class="p-3 bg-gray-50 rounded-full mb-2">
                                <i class="fas fa-inbox text-2xl text-gray-300"></i>
                            </div>
                            <p class="text-sm">Belum ada pendaftar baru.</p>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
