<div class="sticky top-6 space-y-6">

    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
        <div class="bg-gray-800 p-4 text-center">
            <span class="text-gray-300 text-xs font-bold uppercase tracking-widest">Nilai Akhir</span>
        </div>

        <div class="p-8 text-center bg-gradient-to-b from-gray-800 to-gray-700 text-white">
            <div class="text-6xl font-extrabold tracking-tight mb-2" x-text="rataRata">0</div>
            <div class="text-sm opacity-80 mb-4">Rata - Rata</div>

            <div class="inline-block px-4 py-2 rounded-full font-bold text-sm shadow-md transition-colors duration-300"
                :class="colorClass">
                <span x-text="predikatFull">Menunggu Input</span>
            </div>
        </div>

        <div class="p-4 bg-gray-50 border-t border-gray-200 text-xs text-gray-500 space-y-2">
            <div class="flex justify-between">
                <span>Status:</span>
                <span class="font-bold" :class="rataRata >= 70 ? 'text-green-600' : 'text-red-600'"
                    x-text="rataRata >= 70 ? 'LULUS' : 'BELUM LULUS'"></span>
            </div>
            <div class="flex justify-between">
                <span>Penerbit:</span>
                <span class="font-semibold">{{ Auth::user()->name }}</span>
            </div>
        </div>
    </div>

    <div class="flex flex-col gap-3">
        <button type="submit"
            class="w-full py-3 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 shadow-lg transition flex justify-center items-center gap-2">
            <i class="fas fa-save"></i> {{ $evaluasi ? 'Update Penilaian' : 'Simpan & Terbitkan' }}
        </button>
        <a href="{{ route('admin.evaluasi.index') }}"
            class="w-full py-3 bg-white text-gray-700 font-bold rounded-xl border border-gray-300 hover:bg-gray-50 text-center transition">
            Batal
        </a>
    </div>

    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 flex gap-3 items-start shadow-sm">
        <i class="fas fa-exclamation-triangle text-yellow-600 mt-1"></i>
        <p class="text-xs text-yellow-800 leading-relaxed">
            <strong>Perhatian:</strong> Menyimpan nilai ini akan mengubah status peserta menjadi
            <strong>"Selesai"</strong>. Data tidak dapat diubah oleh peserta.
        </p>
    </div>

</div>
