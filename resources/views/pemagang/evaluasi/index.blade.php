<x-app-layout>
    <x-slot name="header">Laporan Evaluasi Kinerja</x-slot>

    @if (!$evaluasi)
        <div
            class="min-h-[60vh] flex flex-col items-center justify-center text-center p-6 bg-white rounded-lg shadow-xs">
            <div class="p-4 bg-yellow-50 rounded-full mb-4 animate-bounce">
                <i class="fas fa-hourglass-half text-4xl text-yellow-500"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-800">Penilaian Belum Tersedia</h3>
            <p class="text-gray-500 mt-2 max-w-md">
                Pembimbing lapangan Anda belum menginputkan nilai evaluasi akhir.
                <br>Silakan selesaikan masa magang dan ingatkan pembimbing jika sudah waktunya.
            </p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- KOLOM KIRI: NILAI AKHIR & INFO --}}
            <div class="md:col-span-1 space-y-6">

                {{-- KARTU NILAI UTAMA --}}
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div
                        class="bg-gradient-to-r {{ $evaluasi->predikat_huruf == 'A' ? 'from-green-500 to-emerald-600' : ($evaluasi->predikat_huruf == 'B' ? 'from-blue-500 to-indigo-600' : 'from-yellow-400 to-orange-500') }} p-6 text-center text-white">
                        <h3 class="text-white/80 font-bold uppercase tracking-wider text-xs mb-2">Nilai Akhir</h3>
                        <div class="text-6xl font-extrabold mb-2 tracking-tight">
                            {{ $evaluasi->nilai_rata_rata }}
                        </div>
                        <div
                            class="inline-block px-3 py-1 bg-white/20 rounded-full backdrop-blur-sm text-sm font-bold border border-white/30 shadow-sm">
                            Predikat: {{ $evaluasi->predikat_huruf }} ({{ $evaluasi->predikat_keterangan }})
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="text-sm space-y-4">
                            <div>
                                <p class="text-xs text-gray-400 uppercase font-bold mb-1">Dinilai Oleh</p>
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-gray-500">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                    <div>
                                        <p class="font-bold text-gray-800">{{ $pembimbing->nama ?? '-' }}</p>
                                        <p class="text-xs text-gray-500">
                                            {{ $pembimbing->jabatan ?? 'Pembimbing Lapangan' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-4 border-t border-gray-100">
                                <p class="text-xs text-gray-400 uppercase font-bold mb-1">Tanggal Penilaian</p>
                                <p class="text-gray-700 font-medium flex items-center gap-2">
                                    <i class="far fa-calendar-alt text-gray-400"></i>
                                    {{ $evaluasi->created_at->format('d F Y') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- CATATAN PEMBIMBING (Mobile Friendly: Pindah kesini biar compact) --}}
                <div class="bg-white rounded-xl shadow-sm p-6 border border-indigo-100">
                    <h3 class="text-sm font-bold text-gray-700 mb-3 flex items-center gap-2">
                        <i class="fas fa-comment-alt text-indigo-500"></i> Catatan Pembimbing
                    </h3>
                    <div
                        class="p-4 bg-indigo-50 rounded-lg text-indigo-900 italic text-sm border border-indigo-100 relative">
                        <span class="absolute top-2 left-2 text-indigo-200 text-2xl font-serif">"</span>
                        <p class="relative z-10 pl-2">
                            {{ $evaluasi->catatan_pembimbing ?? 'Tidak ada catatan khusus.' }}
                        </p>
                    </div>
                </div>

            </div>

            {{-- KOLOM KANAN: RINCIAN 10 KRITERIA --}}
            <div class="md:col-span-2">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
                        <h3 class="font-bold text-gray-800 flex items-center gap-2">
                            <i class="fas fa-list-ol text-blue-600"></i> Rincian Aspek Penilaian
                        </h3>
                    </div>

                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">

                        <div>
                            <h4 class="text-xs font-bold text-gray-400 uppercase mb-4 border-b pb-1">Aspek Personal</h4>
                            <div class="space-y-4">
                                <div class="flex justify-between items-center group">
                                    <span
                                        class="text-gray-600 text-sm group-hover:text-indigo-600 transition">Kedisiplinan</span>
                                    <span
                                        class="font-bold text-gray-800 bg-gray-100 px-2 py-1 rounded text-sm group-hover:bg-indigo-100 group-hover:text-indigo-700 transition">{{ $evaluasi->nilai_disiplin }}</span>
                                </div>
                                <div class="flex justify-between items-center group">
                                    <span class="text-gray-600 text-sm group-hover:text-indigo-600 transition">Etika &
                                        Perilaku</span>
                                    <span
                                        class="font-bold text-gray-800 bg-gray-100 px-2 py-1 rounded text-sm group-hover:bg-indigo-100 group-hover:text-indigo-700 transition">{{ $evaluasi->nilai_etika }}</span>
                                </div>
                                <div class="flex justify-between items-center group">
                                    <span class="text-gray-600 text-sm group-hover:text-indigo-600 transition">Motivasi
                                        Diri</span>
                                    <span
                                        class="font-bold text-gray-800 bg-gray-100 px-2 py-1 rounded text-sm group-hover:bg-indigo-100 group-hover:text-indigo-700 transition">{{ $evaluasi->nilai_motivasi }}</span>
                                </div>
                                <div class="flex justify-between items-center group">
                                    <span
                                        class="text-gray-600 text-sm group-hover:text-indigo-600 transition">Inisiatif</span>
                                    <span
                                        class="font-bold text-gray-800 bg-gray-100 px-2 py-1 rounded text-sm group-hover:bg-indigo-100 group-hover:text-indigo-700 transition">{{ $evaluasi->nilai_inisiatif }}</span>
                                </div>
                                <div class="flex justify-between items-center group">
                                    <span
                                        class="text-gray-600 text-sm group-hover:text-indigo-600 transition">Adaptasi</span>
                                    <span
                                        class="font-bold text-gray-800 bg-gray-100 px-2 py-1 rounded text-sm group-hover:bg-indigo-100 group-hover:text-indigo-700 transition">{{ $evaluasi->nilai_adaptasi }}</span>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-xs font-bold text-gray-400 uppercase mb-4 border-b pb-1">Aspek Profesional
                            </h4>
                            <div class="space-y-4">
                                <div class="flex justify-between items-center group">
                                    <span class="text-gray-600 text-sm group-hover:text-indigo-600 transition">Kualitas
                                        Kerja</span>
                                    <span
                                        class="font-bold text-gray-800 bg-gray-100 px-2 py-1 rounded text-sm group-hover:bg-indigo-100 group-hover:text-indigo-700 transition">{{ $evaluasi->nilai_kualitas }}</span>
                                </div>
                                <div class="flex justify-between items-center group">
                                    <span
                                        class="text-gray-600 text-sm group-hover:text-indigo-600 transition">Penguasaan
                                        Materi</span>
                                    <span
                                        class="font-bold text-gray-800 bg-gray-100 px-2 py-1 rounded text-sm group-hover:bg-indigo-100 group-hover:text-indigo-700 transition">{{ $evaluasi->nilai_penguasaan }}</span>
                                </div>
                                <div class="flex justify-between items-center group">
                                    <span
                                        class="text-gray-600 text-sm group-hover:text-indigo-600 transition">Produktivitas</span>
                                    <span
                                        class="font-bold text-gray-800 bg-gray-100 px-2 py-1 rounded text-sm group-hover:bg-indigo-100 group-hover:text-indigo-700 transition">{{ $evaluasi->nilai_produktivitas }}</span>
                                </div>
                                <div class="flex justify-between items-center group">
                                    <span class="text-gray-600 text-sm group-hover:text-indigo-600 transition">Kerjasama
                                        Tim</span>
                                    <span
                                        class="font-bold text-gray-800 bg-gray-100 px-2 py-1 rounded text-sm group-hover:bg-indigo-100 group-hover:text-indigo-700 transition">{{ $evaluasi->nilai_kerjasama }}</span>
                                </div>
                                <div class="flex justify-between items-center group">
                                    <span
                                        class="text-gray-600 text-sm group-hover:text-indigo-600 transition">Komunikasi</span>
                                    <span
                                        class="font-bold text-gray-800 bg-gray-100 px-2 py-1 rounded text-sm group-hover:bg-indigo-100 group-hover:text-indigo-700 transition">{{ $evaluasi->nilai_komunikasi }}</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- TOMBOL CETAK PDF --}}
                <div class="text-right mt-4">
                    <a href="{{ route('pemagang.evaluasi.cetak') }}" target="_blank"
                        class="inline-flex items-center px-4 py-2 bg-red-600 text-white text-sm font-bold rounded-lg hover:bg-red-700 shadow-md transition gap-2">
                        <i class="fas fa-file-pdf"></i> Unduh PDF Penilaian
                    </a>
                </div>
            </div>

        </div>
    @endif
</x-app-layout>
