<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Digital PKL - Diskominfo Batola</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,700,800&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Animasi Custom */
        .fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        .delay-100 {
            animation-delay: 0.1s;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }

        .delay-300 {
            animation-delay: 0.3s;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-gradient {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
        }
    </style>
</head>

<body class="antialiased bg-gray-50 font-sans">

    <nav
        class="fixed w-full z-50 transition-all duration-300 bg-white/95 backdrop-blur-md shadow-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">

                <div class="flex items-center gap-3">
                    <img src="{{ asset('logo/kibar.png') }}" alt="Logo Kibar" class="h-12 w-auto">
                    <div class="hidden md:block">
                        <h1 class="text-lg font-bold text-gray-800 leading-tight">SIPMA BATOLA</h1>
                        <p class="text-xs text-gray-500 font-medium">Sistem Informasi Pelayanan Magang</p>
                    </div>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}"
                        class="text-gray-600 hover:text-blue-600 font-medium transition">Beranda</a>
                    <a href="{{ route('landing.tentang') }}"
                        class="text-gray-600 hover:text-blue-600 font-medium transition">Tentang PKL</a>
                    <a href="{{ route('landing.panduan') }}"
                        class="text-gray-600 hover:text-blue-600 font-medium transition">Panduan</a>

                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="px-5 py-2.5 bg-blue-600 text-white font-bold rounded-full shadow-lg hover:bg-blue-700 hover:shadow-blue-500/30 transition transform hover:-translate-y-0.5">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="px-5 py-2.5 bg-white text-blue-600 border-2 border-blue-600 font-bold rounded-full hover:bg-blue-50 transition">
                                Masuk
                            </a>
                        @endauth
                    @endif
                </div>

                <div class="md:hidden flex items-center">
                    <button class="text-gray-600 hover:text-blue-600 focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <div class="relative pt-20 pb-32 lg:pb-48 overflow-hidden hero-gradient">
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
            <div class="absolute -top-24 -left-24 w-96 h-96 bg-white opacity-10 rounded-full blur-3xl"></div>
            <div class="absolute top-1/2 right-0 w-80 h-80 bg-blue-400 opacity-20 rounded-full blur-3xl"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 lg:mt-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                <div class="text-center lg:text-left fade-in-up">
                    <span
                        class="inline-block py-1 px-3 rounded-full bg-blue-500/20 border border-blue-400 text-blue-100 text-xs font-bold uppercase tracking-wider mb-4 backdrop-blur-sm">
                        Resmi Dinas Kominfo Barito Kuala
                    </span>
                    <h1 class="text-4xl lg:text-5xl font-extrabold text-white leading-tight mb-6">
                        Selamat Datang di Portal <br>
                        <span class="text-blue-200">Pendaftaran PKL Digital</span>
                    </h1>
                    <p class="text-blue-100 text-lg mb-8 max-w-lg mx-auto lg:mx-0 leading-relaxed">
                        Platform terintegrasi untuk mahasiswa dan siswa SMK yang ingin mengembangkan potensi melalui
                        program magang di lingkungan pemerintahan Barito Kuala.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="px-8 py-4 bg-white text-blue-700 font-bold rounded-xl shadow-lg hover:bg-gray-100 transition transform hover:-translate-y-1 flex items-center justify-center gap-2">
                                <i class="fas fa-rocket"></i> Ke Dashboard
                            </a>
                        @else
                            <a href="{{ route('register') }}"
                                class="px-8 py-4 bg-white text-blue-700 font-bold rounded-xl shadow-lg hover:bg-gray-100 transition transform hover:-translate-y-1 flex items-center justify-center gap-2">
                                <i class="fas fa-user-plus"></i> Daftar PKL Sekarang
                            </a>
                            <a href="{{ route('login') }}"
                                class="px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-xl hover:bg-white/10 transition flex items-center justify-center gap-2">
                                <i class="fas fa-sign-in-alt"></i> Masuk Akun
                            </a>
                        @endauth
                    </div>
                </div>

                <div class="hidden lg:block relative fade-in-up delay-200">
                    <img src="https://cdni.iconscout.com/illustration/premium/thumb/web-development-2974925-2477356.png"
                        alt="Ilustrasi PKL" class="w-full max-w-lg mx-auto drop-shadow-2xl animate-float">
                </div>
            </div>
        </div>
    </div>

    <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-24 mb-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            <div
                class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100 hover:shadow-2xl transition transform hover:-translate-y-1 fade-in-up delay-100">
                <div class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 mb-4">
                    <i class="fas fa-bullhorn text-2xl"></i>
                </div>
                <h3 class="font-bold text-gray-800 text-lg mb-2">Pendaftaran PKL</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Proses pendaftaran mudah dan cepat secara online tanpa
                    perlu datang ke kantor.</p>
            </div>

            <div
                class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100 hover:shadow-2xl transition transform hover:-translate-y-1 fade-in-up delay-200">
                <div class="w-14 h-14 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-600 mb-4">
                    <i class="fas fa-chart-pie text-2xl"></i>
                </div>
                <h3 class="font-bold text-gray-800 text-lg mb-2">Kuota Tersedia</h3>
                <div class="flex items-end gap-2">
                    <span class="text-3xl font-extrabold text-indigo-600">5</span>
                    <span class="text-sm text-gray-400 mb-1">/ 10 Slot</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-1.5 mt-3">
                    <div class="bg-indigo-600 h-1.5 rounded-full" style="width: 50%"></div>
                </div>
            </div>

            <div
                class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100 hover:shadow-2xl transition transform hover:-translate-y-1 fade-in-up delay-300">
                <div class="w-14 h-14 bg-orange-50 rounded-xl flex items-center justify-center text-orange-600 mb-4">
                    <i class="fas fa-envelope-open-text text-2xl"></i>
                </div>
                <h3 class="font-bold text-gray-800 text-lg mb-2">Layanan Bantuan</h3>
                <p class="text-sm text-gray-500 mb-1">Butuh bantuan teknis?</p>
                <a href="mailto:komiinfobatola@gmail.com" class="text-orange-600 font-semibold text-sm hover:underline">
                    komiinfobatola@gmail.com
                </a>
            </div>

            <div
                class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100 hover:shadow-2xl transition transform hover:-translate-y-1 fade-in-up delay-300">
                <div class="w-14 h-14 bg-green-50 rounded-xl flex items-center justify-center text-green-600 mb-4">
                    <i class="fas fa-phone-alt text-2xl"></i>
                </div>
                <h3 class="font-bold text-gray-800 text-lg mb-2">Kontak Telepon</h3>
                <p class="text-sm text-gray-500 mb-1">Hubungi kami di jam kerja:</p>
                <p class="text-green-700 font-bold text-lg tracking-wide">0511-xxxxxxx</p>
            </div>

        </div>
    </div>

    <footer class="bg-gray-900 text-white py-8 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-gray-400 text-sm">
                &copy; {{ date('Y') }} Dinas Komunikasi dan Informatika Kabupaten Barito Kuala. <br
                    class="md:hidden">Hak Cipta Dilindungi.
            </p>
        </div>
    </footer>

</body>

</html>
