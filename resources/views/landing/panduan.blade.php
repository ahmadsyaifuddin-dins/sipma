<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panduan PKL - SIPMA Batola</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,700,800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-gray-50 font-sans">

    {{-- NAVBAR --}}
    @include('layouts.partials.landing_nav')
    {{-- ATAU COPY PASTE KODE NAVBAR DARI WELCOME.BLADE.PHP --}}

    {{-- HEADER --}}
    <div class="pt-32 pb-20 bg-gradient-to-r from-blue-800 to-blue-600 text-center text-white">
        <h1 class="text-4xl font-extrabold tracking-tight mb-2">Panduan Program PKL</h1>
        <p class="text-blue-100 text-lg">Ikuti langkah-langkah mudah untuk mendaftar dan menjalani program PKL.</p>
    </div>

    {{-- CONTENT --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 mb-20 relative z-10">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <div
                class="bg-white p-8 rounded-xl shadow-lg border border-gray-100 relative overflow-hidden group hover:-translate-y-1 transition duration-300">
                <span
                    class="absolute -top-4 -left-2 text-7xl font-extrabold text-blue-50 opacity-50 select-none">01</span>
                <div class="relative z-10">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-file-signature text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Cara Pendaftaran</h3>
                    <ul class="space-y-3 text-sm text-gray-600">
                        <li class="flex items-start gap-2"><i class="fas fa-check text-green-500 mt-1"></i> Masuk menu
                            'Daftar PKL'</li>
                        <li class="flex items-start gap-2"><i class="fas fa-check text-green-500 mt-1"></i> Isi form
                            online dengan data lengkap</li>
                        <li class="flex items-start gap-2"><i class="fas fa-check text-green-500 mt-1"></i> Unggah surat
                            pengantar dari kampus/sekolah</li>
                    </ul>
                </div>
            </div>

            <div
                class="bg-white p-8 rounded-xl shadow-lg border border-gray-100 relative overflow-hidden group hover:-translate-y-1 transition duration-300">
                <span
                    class="absolute -top-4 -left-2 text-7xl font-extrabold text-blue-50 opacity-50 select-none">02</span>
                <div class="relative z-10">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-search text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Proses Seleksi</h3>
                    <ul class="space-y-3 text-sm text-gray-600">
                        <li class="flex items-start gap-2"><i class="fas fa-check text-green-500 mt-1"></i> Admin
                            memverifikasi semua data & dokumen</li>
                        <li class="flex items-start gap-2"><i class="fas fa-check text-green-500 mt-1"></i> Hasil
                            seleksi akan diumumkan via email/dashboard</li>
                    </ul>
                </div>
            </div>

            <div
                class="bg-white p-8 rounded-xl shadow-lg border border-gray-100 relative overflow-hidden group hover:-translate-y-1 transition duration-300">
                <span
                    class="absolute -top-4 -left-2 text-7xl font-extrabold text-blue-50 opacity-50 select-none">03</span>
                <div class="relative z-10">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-map-marker-alt text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Penempatan</h3>
                    <ul class="space-y-3 text-sm text-gray-600">
                        <li class="flex items-start gap-2"><i class="fas fa-check text-green-500 mt-1"></i> Mahasiswa
                            ditempatkan sesuai bidang</li>
                        <li class="flex items-start gap-2"><i class="fas fa-check text-green-500 mt-1"></i> Pembimbing
                            ditentukan oleh admin</li>
                    </ul>
                </div>
            </div>

            <div
                class="bg-white p-8 rounded-xl shadow-lg border border-gray-100 relative overflow-hidden group hover:-translate-y-1 transition duration-300">
                <span
                    class="absolute -top-4 -left-2 text-7xl font-extrabold text-blue-50 opacity-50 select-none">04</span>
                <div class="relative z-10">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-calendar-check text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Absensi</h3>
                    <ul class="space-y-3 text-sm text-gray-600">
                        <li class="flex items-start gap-2"><i class="fas fa-check text-green-500 mt-1"></i> Isi presensi
                            harian (Masuk/Pulang)</li>
                        <li class="flex items-start gap-2"><i class="fas fa-check text-green-500 mt-1"></i> Pastikan
                            lokasi sesuai kantor</li>
                    </ul>
                </div>
            </div>

            <div
                class="bg-white p-8 rounded-xl shadow-lg border border-gray-100 relative overflow-hidden group hover:-translate-y-1 transition duration-300">
                <span
                    class="absolute -top-4 -left-2 text-7xl font-extrabold text-blue-50 opacity-50 select-none">05</span>
                <div class="relative z-10">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-star text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Evaluasi</h3>
                    <ul class="space-y-3 text-sm text-gray-600">
                        <li class="flex items-start gap-2"><i class="fas fa-check text-green-500 mt-1"></i> Pembimbing
                            memberikan nilai & feedback</li>
                        <li class="flex items-start gap-2"><i class="fas fa-check text-green-500 mt-1"></i> Lihat hasil
                            evaluasi di dashboard</li>
                    </ul>
                </div>
            </div>

            <div
                class="bg-white p-8 rounded-xl shadow-lg border border-gray-100 relative overflow-hidden group hover:-translate-y-1 transition duration-300">
                <span
                    class="absolute -top-4 -left-2 text-7xl font-extrabold text-blue-50 opacity-50 select-none">06</span>
                <div class="relative z-10">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-file-upload text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Laporan Akhir</h3>
                    <ul class="space-y-3 text-sm text-gray-600">
                        <li class="flex items-start gap-2"><i class="fas fa-check text-green-500 mt-1"></i> Unggah
                            Laporan PKL format PDF</li>
                        <li class="flex items-start gap-2"><i class="fas fa-check text-green-500 mt-1"></i> Ikuti jadwal
                            pengumpulan</li>
                    </ul>
                </div>
            </div>

        </div>

        <div
            class="mt-16 rounded-3xl bg-gradient-to-r from-blue-600 to-indigo-700 p-10 text-center text-white shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl"></div>
            <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl">
            </div>

            <h2 class="text-3xl font-bold mb-4 relative z-10">Siap untuk Memulai PKL Anda?</h2>
            <p class="text-blue-100 mb-8 max-w-2xl mx-auto relative z-10">Daftar sekarang dan raih pengalaman kerja
                terbaik di lingkungan pemerintahan Barito Kuala!</p>

            @auth
                <a href="{{ url('/dashboard') }}"
                    class="inline-block px-8 py-4 bg-white text-blue-700 font-bold rounded-full shadow-lg hover:bg-gray-100 transition transform hover:-translate-y-1 relative z-10">
                    <i class="fas fa-rocket mr-2"></i> Ke Dashboard
                </a>
            @else
                <a href="{{ route('register') }}"
                    class="inline-block px-8 py-4 bg-white text-blue-700 font-bold rounded-full shadow-lg hover:bg-gray-100 transition transform hover:-translate-y-1 relative z-10">
                    Daftar Sekarang
                </a>
            @endauth
        </div>

    </div>

    {{-- FOOTER --}}
    @include('layouts.partials.landing_footer')
    {{-- ATAU COPY PASTE KODE FOOTER DARI WELCOME.BLADE.PHP --}}

</body>

</html>
