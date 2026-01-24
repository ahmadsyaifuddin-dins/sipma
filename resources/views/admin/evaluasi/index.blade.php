<x-app-layout>
    <x-slot name="header">Data Evaluasi Akhir</x-slot>

    <div x-data="{
        open: false,
        isLoading: false,
        modalContent: '',
        async openModal(url) {
            this.open = true;
            this.isLoading = true;
            this.modalContent = '';
            try {
                let response = await fetch(url);
                this.modalContent = await response.text();
            } catch (e) {
                this.modalContent = 'Error loading content.';
            } finally {
                this.isLoading = false;
            }
        }
    }" class="p-4 bg-white rounded-lg shadow-xs relative">

        <div class="w-full overflow-hidden border rounded-lg">
            <table class="w-full whitespace-no-wrap">
                <thead class="bg-gray-50 border-b">
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">
                        <th class="px-4 py-3">Peserta</th>
                        <th class="px-4 py-3">Pembimbing</th>
                        <th class="px-4 py-3 text-center">Nilai Rata-Rata</th>
                        <th class="px-4 py-3 text-center">Predikat</th>
                        <th class="px-4 py-3 text-center">Status</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y">
                    @foreach ($peserta as $item)
                        <tr class="text-gray-700 hover:bg-gray-50 transition">
                            <td class="px-4 py-3">
                                <div class="font-bold text-gray-800">{{ $item->nama_lengkap }}</div>
                                <div class="text-xs text-gray-500">{{ $item->nim_nisn }}</div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $item->penempatan->pembimbing->nama ?? '-' }}
                            </td>

                            <td class="px-4 py-3 text-center">
                                @if ($item->evaluasi)
                                    <span
                                        class="font-bold text-lg text-indigo-700">{{ $item->evaluasi->nilai_rata_rata }}</span>
                                @else
                                    <span class="text-gray-400 text-sm italic">Belum dinilai</span>
                                @endif
                            </td>

                            <td class="px-4 py-3 text-center">
                                @if ($item->evaluasi)
                                    <span
                                        class="px-2 py-1 text-xs font-bold leading-tight rounded-full 
                                    {{ $item->evaluasi->predikat_huruf == 'A'
                                        ? 'bg-green-100 text-green-700'
                                        : ($item->evaluasi->predikat_huruf == 'B'
                                            ? 'bg-blue-100 text-blue-700'
                                            : 'bg-yellow-100 text-yellow-700') }}">
                                        {{ $item->evaluasi->predikat_huruf }} -
                                        {{ $item->evaluasi->predikat_keterangan }}
                                    </span>
                                @else
                                    -
                                @endif
                            </td>

                            {{-- TAMPILAN KOLOM STATUS --}}
                            <td class="px-4 py-3 text-center">
                                @php
                                    $statusColors = [
                                        'aktif' => 'bg-green-100 text-green-700',
                                        'menunggu_nilai' => 'bg-blue-100 text-blue-700',
                                        'selesai' => 'bg-indigo-100 text-indigo-700',
                                        'ditolak' => 'bg-red-100 text-red-700',
                                    ];
                                    $BadgeColor = $statusColors[$item->status] ?? 'bg-gray-100 text-gray-600';
                                @endphp
                                <span
                                    class="px-2 py-1 font-semibold leading-tight rounded-full text-xs {{ $BadgeColor }}">
                                    {{ ucwords(str_replace('_', ' ', $item->status)) }}
                                </span>
                            </td>

                            <td class="px-4 py-3 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    @if ($item->evaluasi)
                                        <button
                                            @click="openModal('{{ route('admin.evaluasi.show', $item->evaluasi->id) }}')"
                                            class="text-blue-600 hover:text-blue-800 transition" title="Lihat Rapor">
                                            <i class="fas fa-eye text-lg"></i>
                                        </button>

                                        <a href="{{ route('admin.evaluasi.edit', $item->evaluasi->id) }}"
                                            class="text-yellow-500 hover:text-yellow-700 transition" title="Edit Nilai">
                                            <i class="fas fa-edit text-lg"></i>
                                        </a>

                                        <form action="{{ route('admin.evaluasi.destroy', $item->evaluasi->id) }}"
                                            method="POST" class="inline delete-form"
                                            onsubmit="return confirm('Yakin hapus nilai ini? Status peserta akan kembali Aktif.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 transition"
                                                title="Hapus Nilai">
                                                <i class="fas fa-trash-alt text-lg"></i>
                                            </button>
                                        </form>
                                    @else
                                        <a href="{{ route('admin.evaluasi.create', $item->id) }}"
                                            class="inline-flex items-center px-3 py-1.5 bg-indigo-600 text-white text-xs font-bold rounded-lg hover:bg-indigo-700 shadow-sm transition gap-1">
                                            <i class="fas fa-plus"></i> Input Nilai
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $peserta->links() }}
        </div>

        {{-- MODAL --}}
        <div x-show="open" style="display: none;"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm p-4"
            x-transition>
            <div @click.away="open = false" class="bg-white rounded-xl shadow-2xl w-full max-w-lg overflow-hidden">
                <div x-show="isLoading" class="p-8 text-center"><i
                        class="fas fa-spinner fa-spin text-2xl text-indigo-600"></i></div>
                <div x-show="!isLoading" x-html="modalContent"></div>
            </div>
        </div>

    </div>
</x-app-layout>
