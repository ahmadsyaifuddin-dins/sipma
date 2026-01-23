<div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
    <div class="flex items-center gap-3 mb-6 border-b border-gray-100 pb-4">
        <div class="p-2 bg-purple-50 text-purple-600 rounded-lg">
            <i class="fas fa-file-upload"></i>
        </div>
        <h3 class="font-bold text-gray-700">Upload Dokumen</h3>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div x-data="{ photoPreview: null }">
            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Pas Foto (Formal) <span
                    class="text-red-500">*</span></label>
            <div
                class="relative border-2 border-dashed border-gray-300 rounded-xl h-48 flex flex-col justify-center items-center text-center hover:bg-gray-50 transition group overflow-hidden bg-gray-50">
                <input type="file" name="foto_profil" required accept="image/*"
                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20"
                    @change="photoPreview = URL.createObjectURL($event.target.files[0])">

                <div x-show="!photoPreview" class="z-10 flex flex-col items-center">
                    <div class="p-3 bg-white rounded-full shadow-sm mb-2 group-hover:scale-110 transition">
                        <i class="fas fa-camera text-2xl text-purple-500"></i>
                    </div>
                    <p class="text-sm text-gray-600 font-bold">Upload Foto</p>
                    <p class="text-xs text-gray-400">JPG/PNG, Max 2MB</p>
                </div>

                <div x-show="photoPreview" class="absolute inset-0 z-10 w-full h-full bg-white">
                    <img :src="photoPreview" class="w-full h-full object-cover">
                    <div
                        class="absolute bottom-0 left-0 w-full bg-black/50 text-white text-xs py-1 text-center backdrop-blur-sm">
                        Klik untuk ganti foto
                    </div>
                </div>
            </div>
        </div>

        <div x-data="{ fileName: null }">
            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Surat Pengantar (PDF) <span
                    class="text-red-500">*</span></label>
            <div class="relative border-2 border-dashed border-gray-300 rounded-xl h-48 flex flex-col justify-center items-center text-center hover:bg-gray-50 transition group bg-gray-50"
                :class="fileName ? 'border-purple-400 bg-purple-50' : ''">

                <input type="file" name="file_surat_pengantar" required accept=".pdf"
                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20"
                    @change="fileName = $event.target.files[0].name">

                <div x-show="!fileName" class="z-10 flex flex-col items-center">
                    <div class="p-3 bg-white rounded-full shadow-sm mb-2 group-hover:scale-110 transition">
                        <i class="fas fa-file-pdf text-2xl text-red-500"></i>
                    </div>
                    <p class="text-sm text-gray-600 font-bold">Upload PDF</p>
                    <p class="text-xs text-gray-400">Maksimal 5MB</p>
                </div>

                <div x-show="fileName" class="z-10 flex flex-col items-center px-4 animate-bounce-in">
                    <i class="fas fa-check-circle text-4xl text-green-500 mb-2"></i>
                    <p class="text-sm font-bold text-gray-800 break-all line-clamp-2" x-text="fileName"></p>
                    <p class="text-xs text-purple-600 mt-1 font-semibold">Klik untuk ganti file</p>
                </div>
            </div>
        </div>

    </div>
</div>
