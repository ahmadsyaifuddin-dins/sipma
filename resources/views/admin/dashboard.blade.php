<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard Administrator') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">

        <div class="mb-8">
            <h3 class="text-xl font-semibold text-gray-700">
                Selamat Datang, {{ Auth::user()->name }}!
            </h3>
            <p class="text-gray-500">Berikut adalah ringkasan data SIPMA hari ini.</p>
        </div>

        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">

            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs border border-gray-200">
                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600">Peserta Aktif</p>
                    <p class="text-lg font-semibold text-gray-700">
                        {{ $total_peserta ?? 0 }}
                    </p>
                </div>
            </div>

            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs border border-gray-200">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600">Menunggu Verifikasi</p>
                    <p class="text-lg font-semibold text-gray-700">
                        {{ $peserta_pending ?? 0 }}
                    </p>
                </div>
            </div>

            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs border border-gray-200">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600">Pembimbing</p>
                    <p class="text-lg font-semibold text-gray-700">
                        {{ $total_pembimbing ?? 0 }}
                    </p>
                </div>
            </div>

        </div>

    </div>
</x-app-layout>
