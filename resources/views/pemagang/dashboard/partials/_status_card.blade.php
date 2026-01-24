@php
    $colors = [
        'pending' => 'bg-yellow-50 text-yellow-800 border-yellow-200',
        'aktif' => 'bg-green-50 text-green-800 border-green-200',
        'menunggu_nilai' => 'bg-blue-50 text-blue-800 border-blue-200',
        'selesai' => 'bg-indigo-50 text-indigo-800 border-indigo-200',
        'ditolak' => 'bg-red-50 text-red-800 border-red-200',
    ];
    $statusClass = $colors[$peserta->status] ?? $colors['pending'];
@endphp

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-5 border-b border-gray-50 flex justify-between items-center">
        <h4 class="font-bold text-gray-700">Status Magang</h4>
        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase border {{ $statusClass }}">
            {{ str_replace('_', ' ', $peserta->status) }}
        </span>
    </div>

    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <p class="text-xs text-gray-400 font-bold uppercase mb-1">Lokasi Magang</p>
            <div class="flex items-center gap-3">
                <div class="p-2 bg-indigo-100 text-indigo-600 rounded-lg">
                    <i class="fas fa-building"></i>
                </div>
                <div>
                    <p class="font-bold text-gray-800">{{ $peserta->penempatan->ruangan ?? 'Belum ditentukan' }}</p>
                    <p class="text-xs text-gray-500">{{ $peserta->institusi }}</p>
                </div>
            </div>
        </div>

        <div>
            <p class="text-xs text-gray-400 font-bold uppercase mb-1">Pembimbing Lapangan</p>
            <div class="flex items-center gap-3">
                <div class="p-2 bg-purple-100 text-purple-600 rounded-lg">
                    <i class="fas fa-user-tie"></i>
                </div>
                <div>
                    <p class="font-bold text-gray-800">
                        {{ $peserta->penempatan->pembimbing->nama ?? 'Belum ditentukan' }}</p>
                    <p class="text-xs text-gray-500">NIP: {{ $peserta->penempatan->pembimbing->nip ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
