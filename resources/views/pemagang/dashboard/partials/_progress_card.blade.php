<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <div class="flex justify-between items-end mb-2">
        <h4 class="font-bold text-gray-700">Progress Magang</h4>
        {{-- Tampilkan Persen (Sudah aman dari minus) --}}
        <span class="text-sm font-bold text-indigo-600">{{ $progress_persen }}%</span>
    </div>

    <div class="w-full bg-gray-100 rounded-full h-2.5 mb-4 overflow-hidden">
        <div class="bg-indigo-600 h-2.5 rounded-full transition-all duration-1000" style="width: {{ $progress_persen }}%">
        </div>
    </div>

    <div class="flex justify-between text-sm text-gray-500">
        <div class="text-left">
            <p class="text-xs uppercase">Mulai</p>
            <p class="font-bold text-gray-700">{{ \Carbon\Carbon::parse($peserta->tgl_mulai)->format('d M Y') }}</p>
        </div>

        <div class="text-center">
            <p class="text-xs uppercase">Sisa Waktu</p>

            {{-- Cukup panggil variabel ini, sudah pasti bulat --}}
            <p class="font-bold text-orange-500">{{ $sisa_waktu }} Hari</p>

        </div>

        <div class="text-right">
            <p class="text-xs uppercase">Selesai</p>
            <p class="font-bold text-gray-700">{{ \Carbon\Carbon::parse($peserta->tgl_selesai)->format('d M Y') }}</p>
        </div>
    </div>
</div>
