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

    {{-- 4. SECTION VISI & MISI (Dipindah ke Sini) --}}
    <div class="mb-8">
        @include('admin.dashboard.partials._visi_misi')
    </div>

    {{-- 5. Main Content Grid (Grafik, Tabel, Aktivitas) --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8 items-start">

        {{-- KOLOM KIRI (Lebar 2/3): Grafik & Tabel Pendaftar --}}
        <div class="lg:col-span-2 space-y-8">

            @include('admin.dashboard.partials._chart_section')

            <div class="w-full overflow-hidden rounded-xl shadow-sm border border-gray-100 bg-white">
                <div class="p-4 border-b bg-gray-50 flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-history text-gray-400"></i>
                        <h4 class="font-bold text-gray-700">Pendaftar Terbaru</h4>
                    </div>
                    <span class="text-xs bg-indigo-100 text-indigo-700 px-2 py-1 rounded font-semibold">5 Terakhir</span>
                </div>

                {{-- Include Partial Tabel Recent --}}
                @include('admin.dashboard.partials._recent_table')
            </div>

        </div>

        {{-- KOLOM KANAN (Lebar 1/3): Aktivitas Terbaru --}}
        <div class="lg:col-span-1 space-y-8">

            @include('admin.dashboard.partials._activity_list')

        </div>
    </div>

</x-app-layout>
