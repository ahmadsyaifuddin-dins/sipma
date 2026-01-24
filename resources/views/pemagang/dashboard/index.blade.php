<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard Saya') }}
    </x-slot>

    <div class="p-6 space-y-6">

        {{-- Header Welcome --}}
        @include('pemagang.dashboard.partials._header_welcome')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- KOLOM KIRI --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- 1. Status Card (Selalu muncul) --}}
                @include('pemagang.dashboard.partials._status_card')

                {{-- 2. KONDISIONAL CONTENT --}}
                @if ($peserta->status == 'aktif')
                    {{-- Jika AKTIF: Tampilkan Progress & Tombol Absen --}}
                    @include('pemagang.dashboard.partials._progress_card')
                    @include('pemagang.dashboard.partials._action_buttons')
                @elseif ($peserta->status == 'selesai' && $peserta->evaluasi)
                    {{-- Jika SELESAI & SUDAH DINILAI: Tampilkan Kartu Nilai --}}
                    @include('pemagang.dashboard.partials._grade_card')
                @elseif ($peserta->status == 'menunggu_nilai')
                    {{-- Jika MENUNGGU NILAI: Tampilkan Info --}}
                    <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-lg">
                        <div class="flex items-center">
                            <i class="fas fa-hourglass-half text-blue-500 text-2xl mr-3"></i>
                            <div>
                                <h4 class="font-bold text-blue-700">Menunggu Penilaian</h4>
                                <p class="text-sm text-blue-600">
                                    Anda telah mengajukan penyelesaian. Mohon tunggu pembimbing atau admin menginput
                                    nilai akhir Anda.
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

            </div>

            {{-- KOLOM KANAN (Grafik Absensi) --}}
            <div class="lg:col-span-1">
                @if ($peserta->status == 'aktif' || $peserta->status == 'selesai' || $peserta->status == 'menunggu_nilai')
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
