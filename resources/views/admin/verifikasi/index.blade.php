<x-app-layout>
    <x-slot name="header">Verifikasi Peserta Baru</x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        @if (session('success'))
            <div class="mb-4 text-sm text-green-700 bg-green-100 rounded-lg p-3">{{ session('success') }}</div>
        @endif

        <div class="w-full overflow-hidden rounded-lg border">
            <table class="w-full whitespace-no-wrap">
                <thead class="bg-gray-50 border-b">
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">
                        <th class="px-4 py-3">Tgl Daftar</th>
                        <th class="px-4 py-3">Nama & Asal</th>
                        <th class="px-4 py-3">Jurusan</th>
                        <th class="px-4 py-3">Rencana Magang</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y">
                    @forelse($data as $item)
                        <tr class="text-gray-700 hover:bg-gray-50">
                            <td class="px-4 py-3 text-sm">
                                {{ $item->created_at->format('d/m/Y') }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="font-semibold">{{ $item->nama_lengkap }}</div>
                                <div class="text-xs text-gray-500">{{ $item->institusi }}</div>
                            </td>
                            <td class="px-4 py-3 text-sm">{{ $item->jurusan }}</td>
                            <td class="px-4 py-3 text-sm">
                                {{ \Carbon\Carbon::parse($item->tgl_mulai)->format('d M') }} -
                                {{ \Carbon\Carbon::parse($item->tgl_selesai)->format('d M Y') }}
                            </td>
                            <td class="px-4 py-3 text-center">
                                <a href="{{ route('admin.verifikasi.show', $item->id) }}"
                                    class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                    Periksa Data
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-3 text-center text-gray-500">Tidak ada pendaftaran baru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
