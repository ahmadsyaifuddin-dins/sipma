<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="bg-gray-50 px-6 py-4 border-b border-gray-100 flex justify-between items-center">
        <h3 class="font-bold text-gray-700 flex items-center gap-2">
            <i class="fas fa-list-ol text-indigo-500"></i> Aspek Penilaian (10 Kriteria)
        </h3>
        <span class="text-xs text-gray-400 bg-white px-2 py-1 rounded border">Skala 0 - 100</span>
    </div>

    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1"><i class="fas fa-clock text-blue-500 w-5"></i>
                Kedisiplinan</label>
            <input type="number" name="nilai_disiplin" x-model.number="n1" @input="calculate()"
                class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 transition" placeholder="0-100"
                min="0" max="100" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1"><i
                    class="fas fa-user-tie text-blue-500 w-5"></i> Etika & Perilaku</label>
            <input type="number" name="nilai_etika" x-model.number="n2" @input="calculate()"
                class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 transition" placeholder="0-100"
                min="0" max="100" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1"><i class="fas fa-fire text-red-500 w-5"></i>
                Motivasi Diri</label>
            <input type="number" name="nilai_motivasi" x-model.number="n3" @input="calculate()"
                class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 transition" placeholder="0-100"
                min="0" max="100" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1"><i
                    class="fas fa-award text-yellow-500 w-5"></i> Kualitas Kerja</label>
            <input type="number" name="nilai_kualitas" x-model.number="n4" @input="calculate()"
                class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 transition" placeholder="0-100"
                min="0" max="100" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1"><i
                    class="fas fa-brain text-purple-500 w-5"></i> Penguasaan Materi</label>
            <input type="number" name="nilai_penguasaan" x-model.number="n5" @input="calculate()"
                class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 transition" placeholder="0-100"
                min="0" max="100" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1"><i
                    class="fas fa-chart-line text-green-500 w-5"></i> Produktivitas</label>
            <input type="number" name="nilai_produktivitas" x-model.number="n6" @input="calculate()"
                class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 transition" placeholder="0-100"
                min="0" max="100" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1"><i class="fas fa-users text-teal-500 w-5"></i>
                Kerjasama Tim</label>
            <input type="number" name="nilai_kerjasama" x-model.number="n7" @input="calculate()"
                class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 transition" placeholder="0-100"
                min="0" max="100" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1"><i
                    class="fas fa-comments text-orange-500 w-5"></i> Komunikasi</label>
            <input type="number" name="nilai_komunikasi" x-model.number="n8" @input="calculate()"
                class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 transition" placeholder="0-100"
                min="0" max="100" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1"><i
                    class="fas fa-lightbulb text-yellow-400 w-5"></i> Inisiatif</label>
            <input type="number" name="nilai_inisiatif" x-model.number="n9" @input="calculate()"
                class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 transition" placeholder="0-100"
                min="0" max="100" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1"><i
                    class="fas fa-sync-alt text-indigo-500 w-5"></i> Adaptasi</label>
            <input type="number" name="nilai_adaptasi" x-model.number="n10" @input="calculate()"
                class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 transition" placeholder="0-100"
                min="0" max="100" required>
        </div>

    </div>
</div>
