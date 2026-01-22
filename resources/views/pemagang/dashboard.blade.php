<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard Saya') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">

        <div class="mb-6">
            <h3 class="text-xl font-semibold text-gray-700">
                Halo, {{ Auth::user()->name }} 👋
            </h3>
            <p class="text-gray-500 text-sm">NIM/NISN: {{ Auth::user()->peserta->nim_nisn ?? '-' }}</p>
        </div>

        @php
            $status = Auth::user()->peserta->status ?? 'pending';
            $colors = [
                'pending' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
                'aktif' => 'bg-green-100 text-green-800 border-green-200',
                'selesai' => 'bg-blue-100 text-blue-800 border-blue-200',
                'ditolak' => 'bg-red-100 text-red-800 border-red-200',
            ];
            $colorClass = $colors[$status] ?? $colors['pending'];
        @endphp

        <div class="p-4 mb-6 border rounded-lg {{ $colorClass }}">
            <div class="flex items-center">
                <span class="font-bold uppercase tracking-wider text-xs mr-2">Status Magang:</span>
                <span class="font-semibold capitalize">{{ $status }}</span>
            </div>
            @if ($status === 'aktif')
                <p class="mt-2 text-sm">
                    Anda sedang menjalani masa magang. Jangan lupa isi absensi setiap hari kerja.
                </p>
            @elseif($status === 'pending')
                <p class="mt-2 text-sm">
                    Data pendaftaran Anda sedang diperiksa oleh Admin Diskominfo. Mohon tunggu persetujuan.
                </p>
            @endif
        </div>

        @if ($status === 'aktif')
            <div class="grid gap-6 mb-8 md:grid-cols-2">

                <a href="#"
                    class="flex items-center p-4 bg-indigo-50 rounded-lg border border-indigo-100 hover:bg-indigo-100 transition shadow-sm group">
                    <div
                        class="p-3 mr-4 text-indigo-500 bg-white rounded-full shadow-sm group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold text-gray-700">Isi Absensi Hari Ini</p>
                        <p class="text-xs text-gray-500">Klik untuk mencatat kehadiran</p>
                    </div>
                </a>

                <a href="#"
                    class="flex items-center p-4 bg-gray-50 rounded-lg border border-gray-100 hover:bg-gray-100 transition shadow-sm">
                    <div class="p-3 mr-4 text-gray-500 bg-white rounded-full shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold text-gray-700">Upload Laporan</p>
                        <p class="text-xs text-gray-500">Logbook & Laporan Akhir</p>
                    </div>
                </a>

            </div>
        @endif

    </div>
</x-app-layout>
