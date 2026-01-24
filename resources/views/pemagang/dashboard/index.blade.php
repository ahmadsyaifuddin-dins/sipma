<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard Saya') }}
    </x-slot>

    <div class="p-6 space-y-6">

        {{-- Header Welcome --}}
        @include('pemagang.dashboard.partials._header_welcome')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- KOLOM KIRI (Status & Progress) --}}
            <div class="lg:col-span-2 space-y-6">
                @include('pemagang.dashboard.partials._status_card')

                @if ($peserta->status == 'aktif')
                    @include('pemagang.dashboard.partials._progress_card')
                    @include('pemagang.dashboard.partials._action_buttons')
                @endif
            </div>

            {{-- KOLOM KANAN (Grafik Absensi) --}}
            <div class="lg:col-span-1">
                @if ($peserta->status == 'aktif' || $peserta->status == 'selesai')
                    @include('pemagang.dashboard.partials._attendance_chart')
                @else
                    {{-- Placeholder jika belum aktif --}}
                    <div
                        class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center text-gray-400 h-full flex flex-col justify-center">
                        <i class="fas fa-chart-pie text-4xl mb-2 opacity-50"></i>
                        <p class="text-sm">Statistik akan muncul setelah magang dimulai.</p>
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
