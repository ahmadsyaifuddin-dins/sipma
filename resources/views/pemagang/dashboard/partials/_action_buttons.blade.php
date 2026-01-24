<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <a href="{{ route('pemagang.absensi.index') }}"
        class="flex items-center justify-between p-4 bg-indigo-600 text-white rounded-xl shadow-lg hover:bg-indigo-700 transition transform hover:-translate-y-1">
        <div class="flex items-center gap-3">
            <div class="p-2 bg-white/20 rounded-lg">
                <i class="fas fa-fingerprint text-xl"></i>
            </div>
            <div class="text-left">
                <p class="font-bold">Isi Absensi</p>
                <p class="text-xs text-indigo-200">Catat kehadiran harianmu</p>
            </div>
        </div>
        <i class="fas fa-chevron-right opacity-70"></i>
    </a>

    @if (\Carbon\Carbon::now()->gte(\Carbon\Carbon::parse($peserta->tgl_selesai)))
        <form action="{{ route('pemagang.ajukan.selesai') }}" method="POST" class="w-full">
            @csrf @method('PUT')
            <button type="submit" onclick="return confirm('Yakin ajukan selesai?')"
                class="w-full flex items-center justify-between p-4 bg-orange-500 text-white rounded-xl shadow-lg hover:bg-orange-600 transition transform hover:-translate-y-1">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-white/20 rounded-lg">
                        <i class="fas fa-flag-checkered text-xl"></i>
                    </div>
                    <div class="text-left">
                        <p class="font-bold">Ajukan Selesai</p>
                        <p class="text-xs text-orange-100">Masa magang berakhir</p>
                    </div>
                </div>
                <i class="fas fa-arrow-right opacity-70"></i>
            </button>
        </form>
    @else
        <div
            class="flex items-center justify-between p-4 bg-gray-50 border border-gray-200 text-gray-400 rounded-xl cursor-not-allowed">
            <div class="flex items-center gap-3">
                <div class="p-2 bg-gray-200 rounded-lg">
                    <i class="fas fa-lock text-xl"></i>
                </div>
                <div class="text-left">
                    <p class="font-bold text-gray-500">Ajukan Selesai</p>
                    <p class="text-xs">Tersedia: {{ \Carbon\Carbon::parse($peserta->tgl_selesai)->format('d M Y') }}</p>
                </div>
            </div>
        </div>
    @endif
</div>
