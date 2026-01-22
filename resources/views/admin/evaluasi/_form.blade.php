@props(['url', 'peserta', 'evaluasi' => null])

<div x-data="calculator(
    {{ $evaluasi->nilai_disiplin ?? 0 }},
    {{ $evaluasi->nilai_kerjasama ?? 0 }},
    {{ $evaluasi->nilai_inisiatif ?? 0 }},
    {{ $evaluasi->nilai_kerajinan ?? 0 }}
)" x-init="calculate()" class="relative">

    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-indigo-600 mb-8 flex items-start gap-4">
        <div class="p-3 bg-indigo-50 rounded-full text-indigo-600">
            <i class="fas fa-user-graduate text-2xl"></i>
        </div>
        <div>
            <h2 class="text-xl font-bold text-gray-800">{{ $peserta->nama_lengkap }}</h2>
            <div class="flex flex-col md:flex-row gap-2 md:gap-6 text-sm text-gray-500 mt-1">
                <span class="flex items-center gap-1"><i class="fas fa-university"></i> {{ $peserta->institusi }}</span>
                <span class="flex items-center gap-1"><i class="fas fa-id-card"></i> {{ $peserta->nim_nisn }}</span>
                <span class="flex items-center gap-1"><i class="fas fa-calendar-alt"></i> Selesai:
                    {{ \Carbon\Carbon::parse($peserta->tgl_selesai)->format('d M Y') }}</span>
            </div>
        </div>
    </div>

    <form action="{{ $url }}" method="POST">
        @csrf
        @if ($evaluasi)
            @method('PUT')
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-2 space-y-6">

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="bg-gray-50 px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                        <h3 class="font-bold text-gray-700 flex items-center gap-2">
                            <i class="fas fa-list-ol text-indigo-500"></i> Aspek Penilaian
                        </h3>
                        <span class="text-xs text-gray-400 bg-white px-2 py-1 rounded border">Skala 0 - 100</span>
                    </div>

                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-clock text-blue-500 mr-1"></i> Kedisiplinan
                            </label>
                            <div class="relative">
                                <input type="number" name="nilai_disiplin" x-model.number="n1" @input="calculate()"
                                    class="w-full pl-4 pr-12 py-2 border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition"
                                    placeholder="0" min="0" max="100" required>
                                <span class="absolute right-4 top-2 text-gray-400 font-bold">Pts</span>
                            </div>
                            <p class="text-xs text-gray-400 mt-1">Kehadiran & ketepatan waktu.</p>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-users text-green-500 mr-1"></i> Kerjasama Tim
                            </label>
                            <div class="relative">
                                <input type="number" name="nilai_kerjasama" x-model.number="n2" @input="calculate()"
                                    class="w-full pl-4 pr-12 py-2 border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition"
                                    placeholder="0" min="0" max="100" required>
                                <span class="absolute right-4 top-2 text-gray-400 font-bold">Pts</span>
                            </div>
                            <p class="text-xs text-gray-400 mt-1">Komunikasi & adaptasi tim.</p>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-lightbulb text-yellow-500 mr-1"></i> Inisiatif & Kreativitas
                            </label>
                            <div class="relative">
                                <input type="number" name="nilai_inisiatif" x-model.number="n3" @input="calculate()"
                                    class="w-full pl-4 pr-12 py-2 border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition"
                                    placeholder="0" min="0" max="100" required>
                                <span class="absolute right-4 top-2 text-gray-400 font-bold">Pts</span>
                            </div>
                            <p class="text-xs text-gray-400 mt-1">Ide baru & penyelesaian masalah.</p>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-briefcase text-purple-500 mr-1"></i> Kualitas Kerja
                            </label>
                            <div class="relative">
                                <input type="number" name="nilai_kerajinan" x-model.number="n4" @input="calculate()"
                                    class="w-full pl-4 pr-12 py-2 border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition"
                                    placeholder="0" min="0" max="100" required>
                                <span class="absolute right-4 top-2 text-gray-400 font-bold">Pts</span>
                            </div>
                            <p class="text-xs text-gray-400 mt-1">Kerapian & hasil tugas.</p>
                        </div>

                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                    <div class="bg-gray-50 px-6 py-4 border-b border-gray-100">
                        <h3 class="font-bold text-gray-700 flex items-center gap-2">
                            <i class="fas fa-comment-dots text-indigo-500"></i> Catatan Pembimbing
                        </h3>
                    </div>
                    <div class="p-6">
                        <textarea name="catatan_pembimbing" rows="5"
                            class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 shadow-sm"
                            placeholder="Tuliskan evaluasi deskriptif, saran, atau kesan pesan untuk peserta...">{{ $evaluasi->catatan_pembimbing ?? '' }}</textarea>
                        <p class="text-xs text-gray-400 mt-2 text-right">Opsional, tapi sangat disarankan.</p>
                    </div>
                </div>

            </div>

            <div class="lg:col-span-1">
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
            </div>

        </div>
    </form>
</div>

<script>
    function calculator(initN1 = 0, initN2 = 0, initN3 = 0, initN4 = 0) {
        return {
            n1: initN1,
            n2: initN2,
            n3: initN3,
            n4: initN4,
            rataRata: 0,
            predikatFull: 'Menunggu Input',
            colorClass: 'bg-gray-500 text-white',

            calculate() {
                let val1 = parseFloat(this.n1) || 0;
                let val2 = parseFloat(this.n2) || 0;
                let val3 = parseFloat(this.n3) || 0;
                let val4 = parseFloat(this.n4) || 0;

                let total = val1 + val2 + val3 + val4;
                let avg = total / 4;
                this.rataRata = Number.isInteger(avg) ? avg : avg.toFixed(2);

                if (val1 == 0 && val2 == 0 && val3 == 0 && val4 == 0) {
                    this.predikatFull = 'Menunggu Input';
                    this.colorClass = 'bg-gray-500 text-white';
                } else if (avg >= 90) {
                    this.predikatFull = 'A (Sangat Baik)';
                    this.colorClass = 'bg-green-500 text-white';
                } else if (avg >= 80) {
                    this.predikatFull = 'B (Baik)';
                    this.colorClass = 'bg-blue-500 text-white';
                } else if (avg >= 70) {
                    this.predikatFull = 'C (Cukup)';
                    this.colorClass = 'bg-yellow-400 text-yellow-900';
                } else {
                    this.predikatFull = 'D (Kurang)';
                    this.colorClass = 'bg-red-500 text-white';
                }
            }
        }
    }
</script>
