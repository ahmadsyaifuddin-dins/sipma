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
