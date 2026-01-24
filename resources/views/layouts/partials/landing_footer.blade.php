<footer class="bg-gray-900 text-white py-10 border-t border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8 text-center md:text-left">

            <div>
                <h4 class="text-lg font-bold text-white mb-4 flex items-center justify-center md:justify-start gap-2">
                    <img src="{{ asset('logo/kibar.png') }}" class="h-8 w-auto grayscale brightness-200">
                    SIPMA BATOLA
                </h4>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Sistem digitalisasi layanan magang untuk efisiensi administrasi dan peningkatan kualitas SDM di
                    Kabupaten Barito Kuala.
                </p>
            </div>

            <div>
                <h4 class="text-lg font-bold text-white mb-4">Tautan Cepat</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="{{ url('/') }}" class="hover:text-blue-400 transition">Beranda</a></li>
                    <li><a href="{{ route('landing.tentang') }}" class="hover:text-blue-400 transition">Tentang
                            Program</a></li>
                    <li><a href="{{ route('landing.panduan') }}" class="hover:text-blue-400 transition">Panduan
                            Pendaftaran</a></li>
                    <li><a href="{{ route('login') }}" class="hover:text-blue-400 transition">Login Peserta</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-bold text-white mb-4">Hubungi Kami</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><i class="fas fa-map-marker-alt mr-2"></i> Marabahan, Barito Kuala</li>
                    <li><i class="fas fa-envelope mr-2"></i> diskominfo@baritokualakab.go.id</li>
                    <li><i class="fas fa-phone mr-2"></i> (0511) xxxx-xxxx</li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-800 pt-8 text-center">
            <p class="text-gray-500 text-sm">
                &copy; {{ date('Y') }} Dinas Komunikasi dan Informatika Kabupaten Barito Kuala. <br
                    class="md:hidden">Hak Cipta Dilindungi.
            </p>
        </div>
    </div>
</footer>
