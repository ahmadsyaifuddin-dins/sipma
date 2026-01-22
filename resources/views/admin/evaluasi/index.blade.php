<x-app-layout>
    <x-slot name="header">Data Evaluasi Akhir</x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">

        <div class="w-full overflow-hidden border rounded-lg">
            <table class="w-full whitespace-no-wrap">
                <thead class="bg-gray-50 border-b">
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">
                        <th class="px-4 py-3">Peserta</th>
                        <th class="px-4 py-3">Pembimbing</th>
                        <th class="px-4 py-3 text-center">Nilai Rata-Rata</th>
                        <th class="px-4 py-3 text-center">Predikat</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y">
                    @foreach ($peserta as $item)
                        <tr class="text-gray-700 hover:bg-gray-50">
                            <td class="px-4 py-3">
                                <div class="font-semibold">{{ $item->nama_lengkap }}</div>
                                <div class="text-xs text-gray-500">{{ $item->nim_nisn }}</div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $item->penempatan->pembimbing->nama ?? '-' }}
                            </td>

                            <td class="px-4 py-3 text-center">
                                @if ($item->evaluasi)
                                    <span
                                        class="font-bold text-lg text-gray-800">{{ $item->evaluasi->nilai_rata_rata }}</span>
                                @else
                                    <span class="text-gray-400 text-sm italic">Belum dinilai</span>
                                @endif
                            </td>

                            <td class="px-4 py-3 text-center">
                                @if ($item->evaluasi)
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight rounded-full 
                                    {{ $item->evaluasi->predikat_huruf == 'A' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700' }}">
                                        {{ $item->evaluasi->predikat_huruf }}
                                        ({{ $item->evaluasi->predikat_keterangan }})
                                    </span>
                                @else
                                    -
                                @endif
                            </td>

                            <td class="px-4 py-3 text-center">
                                @if ($item->evaluasi)
                                    <a href="{{ route('admin.evaluasi.edit', $item->evaluasi->id) }}"
                                        class="text-yellow-600 hover:underline text-sm font-medium">
                                        ✏️ Edit Nilai
                                    </a>
                                @else
                                    <a href="{{ route('admin.evaluasi.create', $item->id) }}"
                                        class="inline-block px-3 py-1 text-sm font-medium leading-5 text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none shadow">
                                        ★ Input Nilai
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $peserta->links() }}
        </div>
    </div>
</x-app-layout>
