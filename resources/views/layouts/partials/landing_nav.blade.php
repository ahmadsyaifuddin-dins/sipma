<nav
    class="fixed w-full z-50 transition-all duration-300 bg-white/95 backdrop-blur-md shadow-sm border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">

            <div class="flex items-center gap-3">
                {{-- Pastikan logo ada di public/logo/kibar.png --}}
                <img src="{{ asset('logo/kibar.png') }}" alt="Logo Kibar" class="h-12 w-auto">
                <div class="hidden md:block">
                    <h1 class="text-lg font-bold text-gray-800 leading-tight">SIPMA BATOLA</h1>
                    <p class="text-xs text-gray-500 font-medium">Sistem Informasi Pelayanan Magang</p>
                </div>
            </div>

            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ url('/') }}"
                    class="text-gray-600 hover:text-blue-600 font-medium transition {{ request()->is('/') ? 'text-blue-600' : '' }}">
                    Beranda
                </a>

                {{-- Pastikan Route 'landing.tentang' sudah dibuat di web.php --}}
                <a href="{{ route('landing.tentang') }}"
                    class="text-gray-600 hover:text-blue-600 font-medium transition {{ request()->routeIs('landing.tentang') ? 'text-blue-600' : '' }}">
                    Tentang PKL
                </a>

                {{-- Pastikan Route 'landing.panduan' sudah dibuat di web.php --}}
                <a href="{{ route('landing.panduan') }}"
                    class="text-gray-600 hover:text-blue-600 font-medium transition {{ request()->routeIs('landing.panduan') ? 'text-blue-600' : '' }}">
                    Panduan
                </a>

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
                <button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')"
                    class="text-gray-600 hover:text-blue-600 focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 px-4 pt-2 pb-4 shadow-lg">
        <a href="{{ url('/') }}" class="block py-2 text-gray-600 hover:text-blue-600 font-medium">Beranda</a>
        <a href="{{ route('landing.tentang') }}"
            class="block py-2 text-gray-600 hover:text-blue-600 font-medium">Tentang PKL</a>
        <a href="{{ route('landing.panduan') }}"
            class="block py-2 text-gray-600 hover:text-blue-600 font-medium">Panduan</a>
        <div class="mt-3 border-t border-gray-100 pt-3">
            @auth
                <a href="{{ url('/dashboard') }}"
                    class="block w-full text-center px-5 py-2.5 bg-blue-600 text-white font-bold rounded-lg">Dashboard</a>
            @else
                <a href="{{ route('login') }}"
                    class="block w-full text-center px-5 py-2.5 bg-white text-blue-600 border-2 border-blue-600 font-bold rounded-lg">Masuk</a>
            @endauth
        </div>
    </div>
</nav>
