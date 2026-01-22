<x-app-layout>
    <x-slot name="header">Absensi Harian</x-slot>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="md:col-span-1">
            <div class="p-6 bg-white rounded-lg shadow-xs border-t-4 border-indigo-500">
                <h3 class="text-lg font-bold text-gray-700 mb-4">Input Kehadiran</h3>

                @if (!$absensiHariIni)
                    <form action="{{ route('pemagang.absensi.store') }}" method="POST" x-data="{ status: 'hadir' }">
                        @csrf

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status Kehadiran</label>
                            <div class="flex gap-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="status" value="hadir" x-model="status"
                                        class="text-indigo-600 border-gray-300 focus:ring-indigo-500">
                                    <span class="ml-2">Hadir</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="status" value="izin" x-model="status"
                                        class="text-yellow-600 border-gray-300 focus:ring-yellow-500">
                                    <span class="ml-2">Izin</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="status" value="sakit" x-model="status"
                                        class="text-red-600 border-gray-300 focus:ring-red-500">
                                    <span class="ml-2">Sakit</span>
                                </label>
                            </div>
                        </div>

                        <div x-show="status === 'hadir'"
                            class="mb-4 p-3 bg-blue-50 text-blue-800 rounded text-sm text-center">
                            Jam Masuk Anda akan tercatat: <br>
                            <span class="font-bold text-lg">{{ \Carbon\Carbon::now()->format('H:i') }} WITA</span>
                        </div>

                        <div x-show="status !== 'hadir'" style="display: none;">
                            <x-form.label for="keterangan" value="Alasan Izin / Sakit" required="true" />
                            <textarea name="keterangan" class="w-full border-gray-300 rounded-md shadow-sm" rows="3"
                                placeholder="Jelaskan alasan Anda..."></textarea>
                        </div>

                        <button type="submit"
                            class="w-full mt-4 bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition">
                            Kirim Absensi
                        </button>
                    </form>
                @elseif($absensiHariIni->status == 'hadir' && $absensiHariIni->jam_keluar == null)
                    <div class="text-center">
                        <div class="mb-4 text-green-600">
                            <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p class="font-semibold">Anda sudah absen masuk jam {{ $absensiHariIni->jam_masuk }}</p>
                        </div>

                        <form action="{{ route('pemagang.absensi.pulang', $absensiHariIni->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit"
                                class="w-full bg-red-500 text-white py-2 rounded-md hover:bg-red-600 transition shadow-lg animate-pulse">
                                🛑 Klik untuk Absen Pulang
                            </button>
                        </form>
                    </div>
                @else
                    <div class="text-center py-6">
                        <span class="text-gray-400 text-4xl">😴</span>
                        <p class="mt-2 text-gray-500 font-medium">Absensi hari ini sudah tuntas.</p>
                        <p class="text-sm text-gray-400">Sampai jumpa besok!</p>
                    </div>
                @endif

            </div>
        </div>

        <div class="md:col-span-2">
            <div class="bg-white rounded-lg shadow-xs overflow-hidden border">
                <div class="p-4 border-b bg-gray-50">
                    <h3 class="font-bold text-gray-700">Riwayat Kehadiran</h3>
                </div>
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                                <th class="px-4 py-3">Tanggal</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Jam Masuk</th>
                                <th class="px-4 py-3">Jam Pulang</th>
                                <th class="px-4 py-3">Ket</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y">
                            @forelse($history as $item)
                                <tr class="text-gray-700 hover:bg-gray-50">
                                    <td class="px-4 py-3 text-sm">
                                        {{ \Carbon\Carbon::parse($item->tgl)->translatedFormat('d F Y') }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        @if ($item->status == 'hadir')
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full text-xs">Hadir</span>
                                        @elseif($item->status == 'izin')
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full text-xs">Izin</span>
                                        @else
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full text-xs">Sakit</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-sm font-mono">{{ $item->jam_masuk ?? '-' }}</td>
                                    <td class="px-4 py-3 text-sm font-mono">{{ $item->jam_keluar ?? '-' }}</td>
                                    <td class="px-4 py-3 text-sm italic text-gray-500">{{ $item->keterangan ?? '-' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="p-4 text-center text-gray-500">Belum ada riwayat absensi.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-4 border-t">
                    {{ $history->links() }}
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
