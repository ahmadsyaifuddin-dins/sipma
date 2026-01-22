<x-app-layout>
    <x-slot name="header">Pusat Laporan & Ekspor Data</x-slot>

    <div class="p-6 bg-white rounded-xl shadow-sm mb-8 border border-gray-100 flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Kelola dan ekspor data laporan PKL</h2>
            <p class="text-gray-500 mt-1">Pilih kategori laporan yang ingin Anda unduh dalam format PDF atau Excel.</p>
        </div>
        <div class="hidden md:flex space-x-2">
            <span class="px-3 py-1 bg-gray-100 rounded text-xs text-gray-600 font-semibold">📁 5 Laporan Utama</span>
            <span class="px-3 py-1 bg-gray-100 rounded text-xs text-gray-600 font-semibold">✅ Siap Diunduh</span>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition duration-200">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-indigo-50 rounded-lg text-indigo-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                </div>
                <span class="px-2 py-1 bg-gray-100 text-gray-500 text-[10px] uppercase font-bold rounded">Utama</span>
            </div>
            <h3 class="text-lg font-bold text-gray-800 mb-2">Laporan Data Peserta</h3>
            <p class="text-sm text-gray-500 mb-6 h-10">Detail lengkap data peserta PKL termasuk informasi institusi,
                jurusan, dan status.</p>

            <div class="flex gap-3">
                <a href="{{ route('admin.laporan.cetak.peserta') }}" target="_blank"
                    class="flex-1 flex items-center justify-center gap-2 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm font-semibold transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    PDF
                </a>
                <button onclick="alert('Fitur Excel Coming Soon!')"
                    class="flex-1 flex items-center justify-center gap-2 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg text-sm font-semibold transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Excel
                </button>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition duration-200">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-blue-50 rounded-lg text-blue-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <span class="px-2 py-1 bg-gray-100 text-gray-500 text-[10px] uppercase font-bold rounded">Utama</span>
            </div>
            <h3 class="text-lg font-bold text-gray-800 mb-2">Laporan Penempatan</h3>
            <p class="text-sm text-gray-500 mb-6 h-10">Rekapitulasi alokasi peserta, ruangan, dan pembimbing yang
                ditugaskan.</p>

            <div class="flex gap-3">
                <a href="{{ route('admin.laporan.cetak.penempatan') }}" target="_blank"
                    class="flex-1 flex items-center justify-center gap-2 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm font-semibold transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    PDF
                </a>
                <button onclick="alert('Fitur Excel Coming Soon!')"
                    class="flex-1 flex items-center justify-center gap-2 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg text-sm font-semibold transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Excel
                </button>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition duration-200">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-yellow-50 rounded-lg text-yellow-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <span class="px-2 py-1 bg-gray-100 text-gray-500 text-[10px] uppercase font-bold rounded">Periode</span>
            </div>
            <h3 class="text-lg font-bold text-gray-800 mb-2">Laporan Absensi</h3>
            <p class="text-sm text-gray-500 mb-6 h-10">Rekap kehadiran harian peserta dengan jam masuk, keluar, dan
                total jam kerja.</p>

            <div class="flex gap-3">
                <a href="{{ route('admin.laporan.cetak.absensi') }}" target="_blank"
                    class="flex-1 flex items-center justify-center gap-2 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm font-semibold transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    PDF
                </a>
                <button onclick="alert('Fitur Excel Coming Soon!')"
                    class="flex-1 flex items-center justify-center gap-2 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg text-sm font-semibold transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Excel
                </button>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition duration-200">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-purple-50 rounded-lg text-purple-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                </div>
                <span
                    class="px-2 py-1 bg-gray-100 text-gray-500 text-[10px] uppercase font-bold rounded">Penilaian</span>
            </div>
            <h3 class="text-lg font-bold text-gray-800 mb-2">Laporan Evaluasi</h3>
            <p class="text-sm text-gray-500 mb-6 h-10">Komponen penilaian (disiplin, kerjasama, dll) dan nilai akhir
                peserta.</p>

            <div class="flex gap-3">
                <a href="{{ route('admin.laporan.cetak.evaluasi') }}" target="_blank"
                    class="flex-1 flex items-center justify-center gap-2 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm font-semibold transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    PDF
                </a>
                <button onclick="alert('Fitur Excel Coming Soon!')"
                    class="flex-1 flex items-center justify-center gap-2 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg text-sm font-semibold transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Excel
                </button>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition duration-200">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-gray-100 rounded-lg text-gray-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <span
                    class="px-2 py-1 bg-gray-100 text-gray-500 text-[10px] uppercase font-bold rounded">Pendukung</span>
            </div>
            <h3 class="text-lg font-bold text-gray-800 mb-2">Daftar Pembimbing</h3>
            <p class="text-sm text-gray-500 mb-6 h-10">Data lengkap staf pembimbing lapangan beserta informasi kontak.
            </p>

            <div class="flex gap-3">
                <a href="{{ route('admin.laporan.cetak.pembimbing') }}" target="_blank"
                    class="flex-1 flex items-center justify-center gap-2 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm font-semibold transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    PDF
                </a>
                <button onclick="alert('Fitur Excel Coming Soon!')"
                    class="flex-1 flex items-center justify-center gap-2 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg text-sm font-semibold transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Excel
                </button>
            </div>
        </div>

    </div>

    <div class="mt-8 p-4 bg-gray-50 rounded-lg text-center border border-gray-200">
        <p class="text-sm text-gray-500 flex items-center justify-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Klik tombol PDF pada kartu laporan untuk mengunduh laporan secara langsung.
        </p>
    </div>

</x-app-layout>
