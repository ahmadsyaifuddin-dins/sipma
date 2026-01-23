<div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 mb-6">
    <div class="flex items-center gap-3 mb-6 border-b border-gray-100 pb-4">
        <div class="p-2 bg-blue-50 text-blue-600 rounded-lg">
            <i class="fas fa-university"></i>
        </div>
        <h3 class="font-bold text-gray-700">Data Akademik</h3>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
        <div>
            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Asal Sekolah / Kampus <span
                    class="text-red-500">*</span></label>
            <input type="text" name="institusi" required placeholder="Contoh: Politeknik Hasnur"
                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Jurusan / Prodi <span
                    class="text-red-500">*</span></label>
            <input type="text" name="jurusan" required placeholder="Contoh: Teknik Informatika"
                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>
    </div>

    <div>
        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Semester Saat Ini <span
                class="text-red-500">*</span></label>
        <div class="relative">
            <select name="semester" required
                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition appearance-none bg-white">
                <option value="" disabled selected>Pilih Semester</option>
                @foreach (\App\Helpers\StaticData::getSemesters() as $smt)
                    <option value="{{ $smt }}">Semester {{ $smt }}</option>
                @endforeach
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                <i class="fas fa-chevron-down text-xs"></i>
            </div>
        </div>
    </div>
</div>

<div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 relative overflow-hidden">
    <div class="flex items-center gap-3 mb-6 border-b border-gray-100 pb-4">
        <div class="p-2 bg-orange-50 text-orange-600 rounded-lg">
            <i class="fas fa-calendar-alt"></i>
        </div>
        <h3 class="font-bold text-gray-700">Rencana Durasi Magang</h3>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 relative z-10">
        <div>
            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Tanggal Mulai <span
                    class="text-red-500">*</span></label>
            <input type="date" name="tgl_mulai" required x-model="start" @change="calculate()"
                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition cursor-pointer">
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Tanggal Selesai <span
                    class="text-red-500">*</span></label>
            <input type="date" name="tgl_selesai" required x-model="end" @change="calculate()"
                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition cursor-pointer">
        </div>
    </div>

    <div x-show="durationText !== ''" x-transition
        class="mt-6 bg-gradient-to-r from-orange-50 to-yellow-50 border border-orange-200 rounded-xl p-4 flex items-start gap-4">
        <div class="p-2 bg-white rounded-full shadow-sm text-orange-500">
            <i class="fas fa-hourglass-half"></i>
        </div>
        <div>
            <p class="text-xs text-orange-800 font-bold uppercase tracking-wide">Total Durasi</p>
            <p class="text-lg font-bold text-gray-800" x-text="durationText"></p>
            <p class="text-xs text-gray-600 mt-1" x-text="monthText"></p>
        </div>
    </div>

    <div x-show="error" x-transition class="mt-4 text-red-500 text-sm font-semibold flex items-center gap-2">
        <i class="fas fa-exclamation-circle"></i> Tanggal selesai harus lebih besar dari tanggal mulai.
    </div>
</div>
