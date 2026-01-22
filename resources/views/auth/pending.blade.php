<x-onboarding-layout>
    <div class="min-h-[80vh] flex flex-col items-center justify-center p-6 text-center">

        <div class="mb-6 p-4 bg-yellow-50 rounded-full animate-pulse">
            <svg class="w-20 h-20 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>

        <h2 class="text-3xl font-bold text-gray-800 mb-2">
            Pendaftaran Sedang Diverifikasi
        </h2>

        <p class="text-gray-600 max-w-lg text-lg mb-8">
            Terima kasih telah melengkapi biodata. Saat ini Admin Diskominfo sedang memverifikasi data Anda.
            <br class="hidden md:block">
            Silakan cek halaman ini secara berkala.
        </p>

        <div class="bg-white border border-gray-200 rounded-lg p-6 max-w-md w-full shadow-sm">
            <h3 class="font-semibold text-gray-700 mb-2">Status Saat Ini:</h3>
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                <span class="w-2 h-2 mr-2 bg-yellow-500 rounded-full"></span>
                Menunggu Persetujuan Admin
            </span>

            <div class="mt-4 text-sm text-gray-500 border-t pt-4">
                <p>Butuh bantuan mendesak?</p>
                <a href="#" class="text-indigo-600 hover:underline">Hubungi Admin Diskominfo</a>
            </div>
        </div>

        <div class="mt-8">
            <a href="{{ route('pemagang.dashboard') }}" class="text-gray-500 hover:text-gray-900 underline text-sm">
                Cek Status Lagi
            </a>
        </div>

    </div>
</x-onboarding-layout>
