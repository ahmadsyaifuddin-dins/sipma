<div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
    <div class="flex items-center gap-3 mb-6 border-b border-gray-100 pb-4">
        <div class="p-2 bg-indigo-50 text-indigo-600 rounded-lg">
            <i class="fas fa-user"></i>
        </div>
        <h3 class="font-bold text-gray-700">Data Pribadi</h3>
    </div>

    <div class="mb-4">
        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Nama Lengkap</label>
        <div class="relative">
            <i class="fas fa-id-card absolute top-3.5 left-4 text-gray-400"></i>
            <input type="text" name="nama_lengkap" value="{{ Auth::user()->name }}" readonly
                class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-600 cursor-not-allowed focus:outline-none">
        </div>
    </div>

    <div class="mb-4">
        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">NIM / NISN <span
                class="text-red-500">*</span></label>
        <div class="relative">
            <i class="fas fa-hashtag absolute top-3.5 left-4 text-gray-400"></i>
            <input type="text" name="nim_nisn" required placeholder="Nomor Induk..."
                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
        </div>
    </div>

    <div class="mb-4">
        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">No. WhatsApp <span
                class="text-red-500">*</span></label>
        <div class="relative">
            <i class="fab fa-whatsapp absolute top-3.5 left-4 text-green-500 text-lg"></i>
            <input type="number" name="no_hp" required placeholder="08xxxxxxxx"
                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
        </div>
    </div>

    <div class="mb-2">
        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Alamat Domisili <span
                class="text-red-500">*</span></label>
        <div class="relative">
            <i class="fas fa-map-marker-alt absolute top-3.5 left-4 text-red-400"></i>
            <textarea name="alamat" required rows="3" placeholder="Alamat lengkap saat ini..."
                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"></textarea>
        </div>
    </div>
</div>
