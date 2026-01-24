<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentang PKL - SIPMA Batola</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,700,800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-gray-50 font-sans">

    {{-- NAVBAR (Sama dengan Welcome) --}}
    @include('layouts.partials.landing_nav')
    {{-- ATAU COPY PASTE KODE NAVBAR DARI WELCOME.BLADE.PHP DISINI JIKA BELUM DIPISAH --}}

    {{-- HEADER SECTION --}}
    <div class="pt-32 pb-20 bg-gradient-to-r from-blue-700 to-blue-500 text-center text-white">
        <h1 class="text-4xl font-extrabold tracking-tight">Tentang PKL</h1>
        <p class="mt-2 text-blue-100 text-lg">Praktek Kerja Lapangan Dinas Kominfo Barito Kuala</p>
    </div>

    {{-- MAIN CONTENT --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 mb-20 relative z-10">

        {{-- 1. APA ITU PKL --}}
        <div
            class="bg-white rounded-2xl shadow-xl p-8 mb-10 border-l-8 border-blue-600 flex flex-col md:flex-row items-start gap-6">
            <div class="flex-shrink-0">
                <div
                    class="w-12 h-12 bg-gray-900 rounded-full flex items-center justify-center text-white text-xl font-bold">
                    ?</div>
            </div>
            <div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Apa Itu PKL?</h3>
                <p class="text-gray-600 leading-relaxed">
                    PKL (Praktek Kerja Lapangan) adalah program wajib bagi mahasiswa atau siswa kejuruan untuk
                    memperoleh pengalaman kerja nyata, menerapkan ilmu yang didapat di bangku pendidikan, dan
                    meningkatkan kompetensi di lingkungan instansi pemerintahan.
                </p>
            </div>
        </div>

        {{-- 2. TUJUAN & MANFAAT (GRID) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">

            <div
                class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100 relative overflow-hidden group hover:shadow-xl transition">
                <div class="flex items-center gap-3 mb-6">
                    <div class="p-3 bg-red-50 text-red-500 rounded-lg">
                        <i class="fas fa-bullseye text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800">Tujuan</h3>
                </div>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-green-500 mt-1"></i>
                        <span class="text-gray-600">Membentuk pengalaman kerja praktis bagi peserta.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-green-500 mt-1"></i>
                        <span class="text-gray-600">Memberikan program orientasi budaya kerja profesional.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-green-500 mt-1"></i>
                        <span class="text-gray-600">Membentuk karakter kedisiplinan dan tanggung jawab.</span>
                    </li>
                </ul>
            </div>

            <div
                class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100 relative overflow-hidden group hover:shadow-xl transition">
                <div class="flex items-center gap-3 mb-6">
                    <div class="p-3 bg-green-50 text-green-600 rounded-lg">
                        <i class="fas fa-hand-holding-heart text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800">Manfaat</h3>
                </div>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check text-green-500 mt-1"></i>
                        <span class="text-gray-600">Membentuk wawasan dunia kerja yang sesungguhnya.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check text-green-500 mt-1"></i>
                        <span class="text-gray-600">Membantu persiapan karir di masa depan.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check text-green-500 mt-1"></i>
                        <span class="text-gray-600">Membentuk lulusan dengan mentalitas yang kuat.</span>
                    </li>
                </ul>
            </div>
        </div>

        {{-- 3. PROSES SINGKAT (TIMELINE) --}}
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-gray-800 flex items-center justify-center gap-3">
                <i class="fas fa-rocket text-blue-600"></i> Proses Singkat
            </h2>
        </div>

        <div class="relative">
            <div class="hidden md:block absolute top-8 left-0 w-full h-1 bg-gray-200 -z-10"></div>

            <div class="grid grid-cols-1 md:grid-cols-5 gap-8 text-center">
                <div class="bg-white md:bg-transparent p-4 rounded-xl shadow-sm md:shadow-none">
                    <div
                        class="w-16 h-16 mx-auto bg-blue-600 text-white rounded-full flex items-center justify-center text-2xl shadow-lg mb-4 border-4 border-white">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h4 class="font-bold text-gray-800">Pendaftaran</h4>
                    <p class="text-sm text-gray-500 mt-1">Isi formulir online</p>
                </div>

                <div class="bg-white md:bg-transparent p-4 rounded-xl shadow-sm md:shadow-none">
                    <div
                        class="w-16 h-16 mx-auto bg-blue-500 text-white rounded-full flex items-center justify-center text-2xl shadow-lg mb-4 border-4 border-white">
                        <i class="fas fa-search-location"></i>
                    </div>
                    <h4 class="font-bold text-gray-800">Penempatan</h4>
                    <p class="text-sm text-gray-500 mt-1">Verifikasi & Lokasi</p>
                </div>

                <div class="bg-white md:bg-transparent p-4 rounded-xl shadow-sm md:shadow-none">
                    <div
                        class="w-16 h-16 mx-auto bg-blue-400 text-white rounded-full flex items-center justify-center text-2xl shadow-lg mb-4 border-4 border-white">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <h4 class="font-bold text-gray-800">Pelaksanaan</h4>
                    <p class="text-sm text-gray-500 mt-1">Kegiatan Magang</p>
                </div>

                <div class="bg-white md:bg-transparent p-4 rounded-xl shadow-sm md:shadow-none">
                    <div
                        class="w-16 h-16 mx-auto bg-blue-500 text-white rounded-full flex items-center justify-center text-2xl shadow-lg mb-4 border-4 border-white">
                        <i class="fas fa-star"></i>
                    </div>
                    <h4 class="font-bold text-gray-800">Evaluasi</h4>
                    <p class="text-sm text-gray-500 mt-1">Penilaian Kinerja</p>
                </div>

                <div class="bg-white md:bg-transparent p-4 rounded-xl shadow-sm md:shadow-none">
                    <div
                        class="w-16 h-16 mx-auto bg-blue-600 text-white rounded-full flex items-center justify-center text-2xl shadow-lg mb-4 border-4 border-white">
                        <i class="fas fa-file-upload"></i>
                    </div>
                    <h4 class="font-bold text-gray-800">Laporan Akhir</h4>
                    <p class="text-sm text-gray-500 mt-1">Upload Laporan</p>
                </div>
            </div>
        </div>

    </div>

    {{-- FOOTER --}}
    @include('layouts.partials.landing_footer')
    {{-- ATAU COPY PASTE KODE FOOTER DARI WELCOME.BLADE.PHP DISINI --}}

</body>

</html>
