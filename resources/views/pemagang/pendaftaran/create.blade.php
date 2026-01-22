<x-onboarding-layout>
    <div x-data="dateCalculator()" class="max-w-5xl mx-auto">

        <div class="text-center mb-10">
            <h2 class="text-3xl font-extrabold text-gray-800">Lengkapi Biodata Magang</h2>
            <p class="text-gray-500 mt-2">Isi formulir di bawah ini untuk menyelesaikan proses pendaftaran.</p>
        </div>

        @if ($errors->any())
            <div class="mb-8 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-xl shadow-sm animate-pulse">
                <div class="flex items-start gap-3">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-triangle text-red-500 text-xl mt-0.5"></i>
                    </div>
                    <div class="w-full">
                        <h3 class="text-sm font-bold text-red-800">Gagal Menyimpan Data!</h3>
                        <p class="text-xs text-red-600 mt-1 mb-2">Silakan perbaiki kesalahan berikut:</p>
                        <ul
                            class="list-disc list-inside text-sm text-red-700 space-y-1 bg-white/50 p-2 rounded-lg border border-red-100">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ route('pemagang.daftar.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-1 space-y-6">
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
                </div>

                <div class="lg:col-span-2 space-y-6">

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                        <div class="flex items-center gap-3 mb-6 border-b border-gray-100 pb-4">
                            <div class="p-2 bg-blue-50 text-blue-600 rounded-lg">
                                <i class="fas fa-university"></i>
                            </div>
                            <h3 class="font-bold text-gray-700">Data Akademik</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Asal Sekolah /
                                    Kampus <span class="text-red-500">*</span></label>
                                <input type="text" name="institusi" required placeholder="Contoh: Politeknik Hasnur"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Jurusan / Prodi
                                    <span class="text-red-500">*</span></label>
                                <input type="text" name="jurusan" required placeholder="Contoh: Teknik Informatika"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
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
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Tanggal Selesai
                                    <span class="text-red-500">*</span></label>
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

                        <div x-show="error" x-transition
                            class="mt-4 text-red-500 text-sm font-semibold flex items-center gap-2">
                            <i class="fas fa-exclamation-circle"></i> Tanggal selesai harus lebih besar dari tanggal
                            mulai.
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                        <div class="flex items-center gap-3 mb-6 border-b border-gray-100 pb-4">
                            <div class="p-2 bg-purple-50 text-purple-600 rounded-lg">
                                <i class="fas fa-file-upload"></i>
                            </div>
                            <h3 class="font-bold text-gray-700">Upload Dokumen</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div x-data="{ photoPreview: null }">
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">
                                    Pas Foto (Formal) <span class="text-red-500">*</span>
                                </label>

                                <div
                                    class="relative border-2 border-dashed border-gray-300 rounded-xl h-48 flex flex-col justify-center items-center text-center hover:bg-gray-50 transition group overflow-hidden bg-gray-50">

                                    <input type="file" name="foto_profil" required accept="image/*"
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20"
                                        @change="photoPreview = URL.createObjectURL($event.target.files[0])">

                                    <div x-show="!photoPreview" class="z-10 flex flex-col items-center">
                                        <div
                                            class="p-3 bg-white rounded-full shadow-sm mb-2 group-hover:scale-110 transition">
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
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">
                                    Surat Pengantar (PDF) <span class="text-red-500">*</span>
                                </label>

                                <div class="relative border-2 border-dashed border-gray-300 rounded-xl h-48 flex flex-col justify-center items-center text-center hover:bg-gray-50 transition group bg-gray-50"
                                    :class="fileName ? 'border-purple-400 bg-purple-50' : ''">

                                    <input type="file" name="file_surat_pengantar" required accept=".pdf"
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20"
                                        @change="fileName = $event.target.files[0].name">

                                    <div x-show="!fileName" class="z-10 flex flex-col items-center">
                                        <div
                                            class="p-3 bg-white rounded-full shadow-sm mb-2 group-hover:scale-110 transition">
                                            <i class="fas fa-file-pdf text-2xl text-red-500"></i>
                                        </div>
                                        <p class="text-sm text-gray-600 font-bold">Upload PDF</p>
                                        <p class="text-xs text-gray-400">Maksimal 5MB</p>
                                    </div>

                                    <div x-show="fileName"
                                        class="z-10 flex flex-col items-center px-4 animate-bounce-in">
                                        <i class="fas fa-check-circle text-4xl text-green-500 mb-2"></i>
                                        <p class="text-sm font-bold text-gray-800 break-all line-clamp-2"
                                            x-text="fileName"></p>
                                        <p class="text-xs text-purple-600 mt-1 font-semibold">Klik untuk ganti file</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="mt-8 flex justify-end">
                <button type="submit"
                    class="px-8 py-4 bg-indigo-600 text-white font-bold rounded-xl shadow-lg hover:bg-indigo-700 hover:shadow-xl transition transform hover:-translate-y-1 flex items-center gap-2">
                    <span>Kirim Pendaftaran</span>
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>

        </form>
    </div>

    <script>
        function dateCalculator() {
            return {
                start: '',
                end: '',
                durationText: '',
                monthText: '',
                error: false,

                calculate() {
                    if (this.start && this.end) {
                        const startDate = new Date(this.start);
                        const endDate = new Date(this.end);

                        // Hitung selisih waktu dalam miliseconds
                        const diffTime = endDate - startDate;

                        if (diffTime < 0) {
                            this.error = true;
                            this.durationText = '';
                            this.monthText = '';
                        } else {
                            this.error = false;

                            // Konversi ke Hari (1 hari = 1000 * 60 * 60 * 24 ms)
                            // Ditambah 1 agar tanggal mulai juga dihitung sebagai hari pertama
                            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;

                            this.durationText = `${diffDays} Hari`;

                            // Estimasi Bulan (Asumsi 1 bulan = 30 hari)
                            const months = Math.floor(diffDays / 30);
                            const remainingDays = diffDays % 30;

                            let text = '(Kurang lebih ';
                            if (months > 0) {
                                text += `${months} Bulan`;
                            }
                            if (remainingDays > 0) {
                                text += months > 0 ? ` ${remainingDays} Hari` : `${remainingDays} Hari`;
                            }
                            text += ')';

                            this.monthText = text;
                        }
                    }
                }
            }
        }
    </script>
</x-onboarding-layout>
