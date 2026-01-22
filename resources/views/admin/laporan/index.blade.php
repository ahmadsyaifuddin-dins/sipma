<x-app-layout>
    <x-slot name="header">Pusat Laporan & Ekspor Data</x-slot>

    <div x-data="reportModal()">

        <div
            class="p-6 bg-white rounded-xl shadow-sm mb-8 border border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl text-white shadow-lg">
                    <i class="fas fa-file-invoice text-2xl"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Laporan & Arsip Digital</h2>
                    <p class="text-gray-500 text-sm">Kelola data laporan PKL dalam format PDF siap cetak.</p>
                </div>
            </div>
            <div class="flex space-x-2">
                <span
                    class="px-3 py-1 bg-indigo-50 text-indigo-600 rounded-full text-xs font-bold border border-indigo-100">
                    <i class="fas fa-check-circle mr-1"></i> Sistem Ready
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <div
                class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition duration-200 group">
                <div class="flex justify-between items-start mb-4">
                    <div
                        class="w-12 h-12 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center group-hover:bg-indigo-600 group-hover:text-white transition">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                    <span class="px-2 py-1 bg-gray-100 text-gray-500 text-[10px] uppercase font-bold rounded">Master
                        Data</span>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Data Peserta</h3>
                <p class="text-sm text-gray-500 mb-6 h-10 line-clamp-2">Laporan lengkap biodata peserta, asal institusi,
                    dan status aktif.</p>
                <div class="flex gap-2">
                    <button
                        @click="openModal('Laporan Peserta', 'Data lengkap seluruh peserta magang.', '{{ route('admin.laporan.cetak.peserta') }}', true)"
                        class="w-full py-2 bg-indigo-50 text-indigo-700 hover:bg-indigo-600 hover:text-white rounded-lg text-sm font-semibold transition flex items-center justify-center gap-2">
                        <i class="fas fa-file-pdf"></i> PDF
                    </button>
                </div>
            </div>

            <div
                class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition duration-200 group">
                <div class="flex justify-between items-start mb-4">
                    <div
                        class="w-12 h-12 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition">
                        <i class="fas fa-map-marker-alt text-xl"></i>
                    </div>
                    <span
                        class="px-2 py-1 bg-gray-100 text-gray-500 text-[10px] uppercase font-bold rounded">Lokasi</span>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Penempatan</h3>
                <p class="text-sm text-gray-500 mb-6 h-10 line-clamp-2">Rekap alokasi peserta, ruangan/unit kerja, dan
                    pembimbing lapangan.</p>
                <div class="flex gap-2">
                    <button
                        @click="openModal('Laporan Penempatan', 'Rekapitulasi pembagian ruangan dan pembimbing.', '{{ route('admin.laporan.cetak.penempatan') }}', true)"
                        class="w-full py-2 bg-blue-50 text-blue-700 hover:bg-blue-600 hover:text-white rounded-lg text-sm font-semibold transition flex items-center justify-center gap-2">
                        <i class="fas fa-file-pdf"></i> PDF
                    </button>
                </div>
            </div>

            <div
                class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition duration-200 group">
                <div class="flex justify-between items-start mb-4">
                    <div
                        class="w-12 h-12 rounded-lg bg-yellow-50 text-yellow-600 flex items-center justify-center group-hover:bg-yellow-600 group-hover:text-white transition">
                        <i class="fas fa-clock text-xl"></i>
                    </div>
                    <span
                        class="px-2 py-1 bg-gray-100 text-gray-500 text-[10px] uppercase font-bold rounded">Harian</span>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Rekap Absensi</h3>
                <p class="text-sm text-gray-500 mb-6 h-10 line-clamp-2">Log kehadiran, jam masuk/pulang, dan rekap
                    izin/sakit.</p>
                <div class="flex gap-2">
                    <button
                        @click="openModal('Laporan Absensi', 'Rekapitulasi kehadiran peserta per periode.', '{{ route('admin.laporan.cetak.absensi') }}', true)"
                        class="w-full py-2 bg-yellow-50 text-yellow-700 hover:bg-yellow-600 hover:text-white rounded-lg text-sm font-semibold transition flex items-center justify-center gap-2">
                        <i class="fas fa-file-pdf"></i> PDF
                    </button>
                </div>
            </div>

            <div
                class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition duration-200 group">
                <div class="flex justify-between items-start mb-4">
                    <div
                        class="w-12 h-12 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center group-hover:bg-purple-600 group-hover:text-white transition">
                        <i class="fas fa-star-half-alt text-xl"></i>
                    </div>
                    <span
                        class="px-2 py-1 bg-gray-100 text-gray-500 text-[10px] uppercase font-bold rounded">Akhir</span>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Evaluasi Nilai</h3>
                <p class="text-sm text-gray-500 mb-6 h-10 line-clamp-2">Nilai akhir, predikat, dan catatan evaluasi dari
                    pembimbing.</p>
                <div class="flex gap-2">
                    <button
                        @click="openModal('Laporan Evaluasi', 'Nilai akhir dan predikat kelulusan peserta.', '{{ route('admin.laporan.cetak.evaluasi') }}', true)"
                        class="w-full py-2 bg-purple-50 text-purple-700 hover:bg-purple-600 hover:text-white rounded-lg text-sm font-semibold transition flex items-center justify-center gap-2">
                        <i class="fas fa-file-pdf"></i> PDF
                    </button>
                </div>
            </div>

            <div
                class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition duration-200 group">
                <div class="flex justify-between items-start mb-4">
                    <div
                        class="w-12 h-12 rounded-lg bg-gray-100 text-gray-600 flex items-center justify-center group-hover:bg-gray-700 group-hover:text-white transition">
                        <i class="fas fa-chalkboard-teacher text-xl"></i>
                    </div>
                    <span
                        class="px-2 py-1 bg-gray-100 text-gray-500 text-[10px] uppercase font-bold rounded">Staf</span>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Data Pembimbing</h3>
                <p class="text-sm text-gray-500 mb-6 h-10 line-clamp-2">Daftar staf pembimbing lapangan beserta kontak
                    dan jabatan.</p>
                <div class="flex gap-2">
                    <button
                        @click="openModal('Data Pembimbing', 'Daftar lengkap pembimbing lapangan.', '{{ route('admin.laporan.cetak.pembimbing') }}', false)"
                        class="w-full py-2 bg-gray-100 text-gray-700 hover:bg-gray-700 hover:text-white rounded-lg text-sm font-semibold transition flex items-center justify-center gap-2">
                        <i class="fas fa-file-pdf"></i> PDF
                    </button>
                </div>
            </div>

        </div>
        @include('admin.laporan._modal_filter')

    </div>
    <script>
        function reportModal() {
            return {
                isOpen: false,
                modalTitle: '',
                modalDesc: '',
                actionUrl: '',
                showDateFilter: true,

                openModal(title, desc, url, dateFilter = true) {
                    this.modalTitle = title;
                    this.modalDesc = desc;
                    this.actionUrl = url;
                    this.showDateFilter = dateFilter;
                    this.isOpen = true;
                }
            }
        }
    </script>
</x-app-layout>
