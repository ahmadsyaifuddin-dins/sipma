<div class="relative">
    <div class="bg-indigo-600 px-6 py-4 flex items-center justify-between rounded-t-xl">
        <h3 class="text-lg font-bold text-white flex items-center gap-2">
            <i class="fas fa-file-contract"></i> Rapor Evaluasi
        </h3>
        <button @click="open = false" class="text-white hover:text-gray-200 transition focus:outline-none">
            <i class="fas fa-times text-xl"></i>
        </button>
    </div>

    <div class="p-6 max-h-[75vh] overflow-y-auto">

        <div class="text-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">{{ $evaluasi->peserta->nama_lengkap }}</h2>
            <p class="text-sm text-gray-500">{{ $evaluasi->peserta->institusi }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div class="bg-gray-50 p-4 rounded-lg">
                <h4 class="font-bold text-gray-700 mb-2 border-b pb-1">Aspek Personal</h4>
                <ul class="text-sm space-y-2">
                    <li class="flex justify-between"><span>Disiplin</span> <span
                            class="font-bold">{{ $evaluasi->nilai_disiplin }}</span></li>
                    <li class="flex justify-between"><span>Etika</span> <span
                            class="font-bold">{{ $evaluasi->nilai_etika }}</span></li>
                    <li class="flex justify-between"><span>Motivasi</span> <span
                            class="font-bold">{{ $evaluasi->nilai_motivasi }}</span></li>
                    <li class="flex justify-between"><span>Inisiatif</span> <span
                            class="font-bold">{{ $evaluasi->nilai_inisiatif }}</span></li>
                    <li class="flex justify-between"><span>Adaptasi</span> <span
                            class="font-bold">{{ $evaluasi->nilai_adaptasi }}</span></li>
                </ul>
            </div>
            <div class="bg-gray-50 p-4 rounded-lg">
                <h4 class="font-bold text-gray-700 mb-2 border-b pb-1">Aspek Profesional</h4>
                <ul class="text-sm space-y-2">
                    <li class="flex justify-between"><span>Kualitas Kerja</span> <span
                            class="font-bold">{{ $evaluasi->nilai_kualitas }}</span></li>
                    <li class="flex justify-between"><span>Penguasaan</span> <span
                            class="font-bold">{{ $evaluasi->nilai_penguasaan }}</span></li>
                    <li class="flex justify-between"><span>Produktivitas</span> <span
                            class="font-bold">{{ $evaluasi->nilai_produktivitas }}</span></li>
                    <li class="flex justify-between"><span>Kerjasama</span> <span
                            class="font-bold">{{ $evaluasi->nilai_kerjasama }}</span></li>
                    <li class="flex justify-between"><span>Komunikasi</span> <span
                            class="font-bold">{{ $evaluasi->nilai_komunikasi }}</span></li>
                </ul>
            </div>
        </div>

        <div class="bg-indigo-50 border border-indigo-100 rounded-lg p-4 mb-6 text-center">
            <p class="text-sm text-gray-500 uppercase tracking-wide font-bold">Nilai Akhir</p>
            <div class="text-4xl font-extrabold text-indigo-700 my-1">{{ $evaluasi->nilai_rata_rata }}</div>
            <span
                class="px-3 py-1 bg-white text-indigo-600 rounded-full text-xs font-bold border border-indigo-200 shadow-sm">
                Predikat: {{ $evaluasi->predikat_huruf }} ({{ $evaluasi->predikat_keterangan }})
            </span>
        </div>

        @if ($evaluasi->catatan_pembimbing)
            <div class="mb-4">
                <h4 class="text-sm font-bold text-gray-700 mb-2">Catatan Pembimbing:</h4>
                <div class="bg-gray-50 p-3 rounded-lg text-sm text-gray-600 italic border border-gray-200">
                    "{{ $evaluasi->catatan_pembimbing }}"
                </div>
            </div>
        @endif

        <div class="flex justify-end gap-2 mt-6">
            <a href="{{ route('admin.evaluasi.edit', $evaluasi->id) }}"
                class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition text-sm font-bold">
                <i class="fas fa-edit"></i> Edit Nilai
            </a>
        </div>
    </div>
</div>
