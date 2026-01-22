<x-app-layout>
    <x-slot name="header">Laporan Evaluasi Kinerja</x-slot>

    @if (!$evaluasi)
        <div
            class="min-h-[60vh] flex flex-col items-center justify-center text-center p-6 bg-white rounded-lg shadow-xs">
            <div class="p-4 bg-yellow-50 rounded-full mb-4">
                <svg class="w-16 h-16 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-800">Penilaian Belum Tersedia</h3>
            <p class="text-gray-500 mt-2 max-w-md">
                Pembimbing lapangan Anda belum menginputkan nilai evaluasi akhir.
                <br>Silakan selesaikan masa magang dan ingatkan pembimbing jika sudah waktunya.
            </p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="md:col-span-1">
                <div
                    class="bg-white rounded-lg shadow-md p-6 text-center border-t-4 {{ $evaluasi->predikat_huruf == 'A' ? 'border-green-500' : 'border-blue-500' }}">
                    <h3 class="text-gray-500 font-semibold uppercase tracking-wider text-sm mb-2">Nilai Akhir</h3>

                    <div class="text-6xl font-extrabold text-gray-800 mb-2">
                        {{ $evaluasi->nilai_rata_rata }}
                    </div>

                    <span
                        class="inline-block px-4 py-2 rounded-full text-white font-bold text-lg mb-6 shadow 
                        {{ $evaluasi->predikat_huruf == 'A' ? 'bg-green-600' : ($evaluasi->predikat_huruf == 'B' ? 'bg-blue-600' : 'bg-yellow-500') }}">
                        Predikat: {{ $evaluasi->predikat_huruf }} ({{ $evaluasi->predikat_keterangan }})
                    </span>

                    <div class="border-t pt-4 text-left">
                        <p class="text-xs text-gray-400 uppercase mb-1">Dinilai Oleh:</p>
                        <p class="font-bold text-gray-700">{{ $pembimbing->nama ?? '-' }}</p>
                        <p class="text-sm text-gray-500">{{ $pembimbing->jabatan ?? '' }}</p>
                        <p class="text-xs text-gray-400 mt-2">Pada tanggal: {{ $evaluasi->created_at->format('d F Y') }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="md:col-span-2 space-y-6">

                <div class="bg-white rounded-lg shadow-sm p-6 border">
                    <h3 class="text-lg font-bold text-gray-700 mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        Rincian Aspek Penilaian
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="bg-gray-50 p-4 rounded-lg flex justify-between items-center">
                            <span class="text-gray-600 font-medium">Kedisiplinan</span>
                            <span class="text-xl font-bold text-indigo-600">{{ $evaluasi->nilai_disiplin }}</span>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg flex justify-between items-center">
                            <span class="text-gray-600 font-medium">Kerjasama Tim</span>
                            <span class="text-xl font-bold text-indigo-600">{{ $evaluasi->nilai_kerjasama }}</span>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg flex justify-between items-center">
                            <span class="text-gray-600 font-medium">Inisiatif</span>
                            <span class="text-xl font-bold text-indigo-600">{{ $evaluasi->nilai_inisiatif }}</span>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg flex justify-between items-center">
                            <span class="text-gray-600 font-medium">Kualitas Kerja</span>
                            <span class="text-xl font-bold text-indigo-600">{{ $evaluasi->nilai_kerajinan }}</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6 border">
                    <h3 class="text-lg font-bold text-gray-700 mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                        Catatan Pembimbing
                    </h3>
                    <div class="p-4 bg-indigo-50 rounded-lg text-indigo-900 italic border border-indigo-100">
                        "{{ $evaluasi->catatan_pembimbing ?? 'Tidak ada catatan khusus.' }}"
                    </div>
                </div>

            </div>
        </div>
    @endif

</x-app-layout>
