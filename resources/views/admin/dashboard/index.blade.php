<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard Administrator') }}
    </x-slot>

    {{-- 1. Banner Welcome --}}
    @include('admin.dashboard.partials._welcome_banner')

    {{-- 2. Alert Section (Permintaan Penilaian) --}}
    @include('admin.dashboard.partials._alert_section')

    {{-- 3. Stats Cards (Total Peserta, dll) --}}
    @include('admin.dashboard.partials._header_stats')

    {{-- 4. SECTION TENGAH: VISI MISI (Kiri) & PENDAFTAR TERBARU (Kanan) --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8 items-start">

        {{-- KOLOM KIRI: VISI & MISI --}}
        <div>
            @include('admin.dashboard.partials._visi_misi')
        </div>

        {{-- KOLOM KANAN: TABEL PENDAFTAR TERBARU --}}
        <div class="w-full overflow-hidden rounded-xl shadow-sm border border-gray-100 bg-white h-full">
            <div class="p-5 border-b bg-gray-50 flex justify-between items-center">
                <div class="flex items-center gap-2">
                    <div class="p-2 bg-indigo-100 text-indigo-600 rounded-lg">
                        <i class="fas fa-history"></i>
                    </div>
                    <h4 class="font-bold text-gray-700">Pendaftar Terbaru</h4>
                </div>
                <span class="text-xs bg-indigo-100 text-indigo-700 px-2 py-1 rounded font-semibold">5 Terakhir</span>
            </div>

            {{-- Include Partial Tabel Recent --}}
            @include('admin.dashboard.partials._recent_table')
        </div>

    </div>

    {{-- 5. SECTION BAWAH: GRAFIK (Lebar) & AKTIVITAS (Sempit) --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8 items-start">

        {{-- KOLOM KIRI (Lebar 2/3): Grafik Statistik --}}
        <div class="lg:col-span-2">
            @include('admin.dashboard.partials._chart_section')
        </div>

        {{-- KOLOM KANAN (Lebar 1/3): Aktivitas Terbaru --}}
        <div class="lg:col-span-1">
            @include('admin.dashboard.partials._activity_list')
        </div>

    </div>

</x-app-layout>
