<x-app-layout>
    <x-slot name="header">Edit Penilaian Magang</x-slot>

    <div class="p-6 bg-white rounded-lg shadow-md max-w-4xl mx-auto" x-data="calculator()" x-init="n1 = {{ $evaluasi->nilai_disiplin }};
    n2 = {{ $evaluasi->nilai_kerjasama }};
    n3 = {{ $evaluasi->nilai_inisiatif }};
    n4 = {{ $evaluasi->nilai_kerajinan }};
    calculate();">

        <div class="flex justify-between items-center border-b pb-4 mb-6">
            <div>
                <h2 class="text-xl font-bold text-gray-800">Edit Evaluasi Peserta</h2>
                <p class="text-gray-500 text-sm">Peserta: {{ $evaluasi->peserta->nama_lengkap }}
                    ({{ $evaluasi->peserta->institusi }})</p>
            </div>

            <div class="text-right">
                <span class="block text-xs text-gray-400 uppercase">Nilai Akhir</span>
                <span class="text-3xl font-bold text-indigo-600" x-text="rataRata">0</span>
                <span class="px-2 py-1 text-xs font-bold text-white rounded bg-gray-500" :class="colorClass"
                    x-text="predikatFull">
                    -
                </span>
            </div>
        </div>

        <form action="{{ route('admin.evaluasi.update', $evaluasi->id) }}" method="POST">
            @csrf
            @method('PUT') <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <h3 class="font-semibold text-gray-700 mb-4">Aspek Penilaian (0 - 100)</h3>

                    <div class="space-y-4">
                        <div class="mb-3">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Kedisiplinan</label>
                            <input type="number" name="nilai_disiplin" x-model.number="n1" @input="calculate()"
                                class="w-full border-gray-300 rounded focus:ring-indigo-500" required min="0"
                                max="100">
                        </div>

                        <div class="mb-3">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Kerjasama Tim</label>
                            <input type="number" name="nilai_kerjasama" x-model.number="n2" @input="calculate()"
                                class="w-full border-gray-300 rounded focus:ring-indigo-500" required min="0"
                                max="100">
                        </div>

                        <div class="mb-3">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Inisiatif & Kreativitas</label>
                            <input type="number" name="nilai_inisiatif" x-model.number="n3" @input="calculate()"
                                class="w-full border-gray-300 rounded focus:ring-indigo-500" required min="0"
                                max="100">
                        </div>

                        <div class="mb-3">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Kerajinan / Kualitas
                                Kerja</label>
                            <input type="number" name="nilai_kerajinan" x-model.number="n4" @input="calculate()"
                                class="w-full border-gray-300 rounded focus:ring-indigo-500" required min="0"
                                max="100">
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="font-semibold text-gray-700 mb-4">Catatan Tambahan</h3>

                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Komentar Pembimbing</label>
                        <textarea name="catatan_pembimbing" rows="8" class="w-full border-gray-300 rounded focus:ring-indigo-500">{{ $evaluasi->catatan_pembimbing }}</textarea>
                    </div>

                    <div class="bg-blue-50 p-4 rounded text-sm text-blue-800 border border-blue-200">
                        <p><strong>Info:</strong> Anda sedang dalam mode Edit. Perubahan nilai akan otomatis mengupdate
                            Sertifikat (jika ada).</p>
                    </div>
                </div>

            </div>

            <div class="mt-8 flex justify-end gap-4">
                <a href="{{ route('admin.evaluasi.index') }}"
                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Batal</a>
                <button type="submit"
                    class="px-6 py-2 bg-indigo-600 text-white font-bold rounded hover:bg-indigo-700 shadow-lg">
                    Update Nilai
                </button>
            </div>
        </form>
    </div>

    <script>
        function calculator() {
            return {
                n1: 0,
                n2: 0,
                n3: 0,
                n4: 0,
                rataRata: 0,
                predikatFull: '-',
                colorClass: 'bg-gray-500',

                calculate() {
                    let total = (this.n1 || 0) + (this.n2 || 0) + (this.n3 || 0) + (this.n4 || 0);
                    this.rataRata = (total / 4).toFixed(2);

                    if (this.rataRata >= 90) {
                        this.predikatFull = 'A (Sangat Baik)';
                        this.colorClass = 'bg-green-600';
                    } else if (this.rataRata >= 80) {
                        this.predikatFull = 'B (Baik)';
                        this.colorClass = 'bg-blue-600';
                    } else if (this.rataRata >= 70) {
                        this.predikatFull = 'C (Cukup)';
                        this.colorClass = 'bg-yellow-600';
                    } else {
                        this.predikatFull = 'D (Kurang)';
                        this.colorClass = 'bg-red-600';
                    }
                }
            }
        }
    </script>
</x-app-layout>
