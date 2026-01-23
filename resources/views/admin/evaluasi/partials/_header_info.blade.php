<div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-indigo-600 mb-8 flex items-start gap-4">
    <div class="p-3 bg-indigo-50 rounded-full text-indigo-600">
        <i class="fas fa-user-graduate text-2xl"></i>
    </div>
    <div>
        <h2 class="text-xl font-bold text-gray-800">{{ $peserta->nama_lengkap }}</h2>
        <div class="flex flex-col md:flex-row gap-2 md:gap-6 text-sm text-gray-500 mt-1">
            <span class="flex items-center gap-1"><i class="fas fa-university"></i> {{ $peserta->institusi }}</span>
            <span class="flex items-center gap-1"><i class="fas fa-id-card"></i> {{ $peserta->nim_nisn }}</span>
            <span class="flex items-center gap-1">
                <i class="fas fa-calendar-alt"></i> Selesai:
                {{ \Carbon\Carbon::parse($peserta->tgl_selesai)->format('d M Y') }}
            </span>
        </div>
    </div>
</div>
