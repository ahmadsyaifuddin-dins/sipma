<div class="bg-gradient-to-br from-indigo-600 to-purple-700 rounded-xl shadow-lg text-white overflow-hidden relative">
    
    <div class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 bg-white opacity-10 rounded-full blur-2xl"></div>
    <div class="absolute bottom-0 left-0 -mb-4 -ml-4 w-24 h-24 bg-white opacity-10 rounded-full blur-xl"></div>

    <div class="p-6 relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6">
            
            <div class="text-center md:text-left">
                <div class="inline-flex items-center justify-center p-2 bg-white/20 rounded-lg mb-3 backdrop-blur-sm">
                    <i class="fas fa-medal text-yellow-300 text-xl"></i>
                </div>
                <h4 class="font-bold text-xl">Selamat, Magang Selesai!</h4>
                <p class="text-indigo-100 text-sm mt-1 max-w-xs">
                    Terima kasih telah menyelesaikan program magang dengan baik. Berikut adalah hasil evaluasi akhir Anda.
                </p>
                
                {{-- Tombol Lihat Detail (Opsional, arahkan ke halaman evaluasi detail) --}}
                <div class="mt-4">
                    <a href="{{ route('pemagang.evaluasi.index') }}" 
                       class="inline-block px-4 py-2 bg-white text-indigo-700 text-xs font-bold rounded-lg hover:bg-gray-100 transition shadow-sm">
                        Lihat Rincian Rapor <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>

            <div class="flex items-center gap-4 bg-white/10 p-4 rounded-xl backdrop-blur-sm border border-white/10">
                <div class="text-right">
                    <p class="text-xs text-indigo-200 uppercase tracking-wider font-bold mb-1">Nilai Akhir</p>
                    <div class="text-5xl font-extrabold text-yellow-300">
                        {{ $peserta->evaluasi->nilai_rata_rata ?? 0 }}
                    </div>
                </div>
                
                <div class="h-12 w-px bg-indigo-400/50"></div> {{-- Divider --}}

                <div class="text-left">
                    <p class="text-xs text-indigo-200 uppercase tracking-wider font-bold mb-1">Predikat</p>
                    <div class="flex flex-col">
                        <span class="text-2xl font-bold leading-none">{{ $peserta->evaluasi->predikat_huruf ?? '-' }}</span>
                        <span class="text-[10px] bg-white/20 px-2 py-0.5 rounded mt-1 text-center">
                            {{ $peserta->evaluasi->predikat_keterangan ?? '-' }}
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>