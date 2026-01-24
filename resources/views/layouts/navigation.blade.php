<div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
    class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>

<div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
    class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0 border-r border-gray-800">

    <div class="flex items-center justify-center mt-8 mb-6 px-4">
        <div class="flex flex-col items-center">
            <img src="{{ asset('logo/kibar.png') }}" alt="Logo Diskominfo Batola" class="h-16 w-auto object-contain mb-2">

            <span class="text-white text-xl font-bold tracking-wider">SIPMA</span>
            <span class="text-gray-500 text-[10px] uppercase font-semibold tracking-widest">Diskominfo Batola</span>
        </div>
    </div>

    <nav class="mt-6">

        {{-- ================= MENU KHUSUS ADMIN ================= --}}
        @if (Auth::user()->role === 'admin')

            <x-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
                <x-slot name="icon">
                    <i class="fas fa-tachometer-alt text-lg w-6 text-center"></i>
                </x-slot>
                {{ __('Dashboard') }}
            </x-nav-link>

            <x-nav-link href="{{ route('admin.users.index') }}" :active="request()->routeIs('admin.users.*')">
                <x-slot name="icon">
                    <i class="fas fa-users-cog text-lg w-6 text-center"></i>
                </x-slot>
                {{ __('Manajemen Admin') }}
            </x-nav-link>

            <x-nav-link href="{{ route('admin.pembimbing.index') }}" :active="request()->routeIs('admin.pembimbing.*')">
                <x-slot name="icon">
                    <i class="fas fa-chalkboard-teacher text-lg w-6 text-center"></i>
                </x-slot>
                {{ __('Data Pembimbing') }}
            </x-nav-link>

            <x-nav-link href="{{ route('admin.verifikasi.index') }}" :active="request()->routeIs('admin.verifikasi.*')">
                <x-slot name="icon">
                    <i class="fas fa-user-check text-lg w-6 text-center"></i>
                </x-slot>
                {{ __('Verifikasi Peserta') }}
            </x-nav-link>

            <x-nav-link href="{{ route('admin.penempatan.index') }}" :active="request()->routeIs('admin.penempatan.*')">
                <x-slot name="icon">
                    <i class="fas fa-map-marked-alt text-lg w-6 text-center"></i>
                </x-slot>
                {{ __('Data Penempatan') }}
            </x-nav-link>

            <x-nav-link href="{{ route('admin.peserta.index') }}" :active="request()->routeIs('admin.peserta.*')">
                <x-slot name="icon">
                    <i class="fas fa-user-graduate text-lg w-6 text-center"></i>
                </x-slot>
                {{ __('Data Peserta') }}
            </x-nav-link>

            <x-nav-link href="{{ route('admin.absensi.index') }}" :active="request()->routeIs('admin.absensi.*')">
                <x-slot name="icon">
                    <i class="fas fa-clock text-lg w-6 text-center"></i>
                </x-slot>
                {{ __('Monitoring Absensi') }}
            </x-nav-link>

            <x-nav-link href="{{ route('admin.evaluasi.index') }}" :active="request()->routeIs('admin.evaluasi.*')">
                <x-slot name="icon">
                    <i class="fas fa-clipboard-list text-lg w-6 text-center"></i>
                </x-slot>
                {{ __('Data Evaluasi') }}
            </x-nav-link>

            <x-nav-link href="{{ route('admin.laporan.index') }}" :active="request()->routeIs('admin.laporan.*')">
                <x-slot name="icon">
                    <i class="fas fa-print text-lg w-6 text-center"></i>
                </x-slot>
                {{ __('Pusat Laporan') }}
            </x-nav-link>

            {{-- ================= MENU KHUSUS PEMAGANG ================= --}}
        @elseif(Auth::user()->role === 'pemagang')
            <x-nav-link href="{{ route('pemagang.dashboard') }}" :active="request()->routeIs('pemagang.dashboard')">
                <x-slot name="icon">
                    <i class="fas fa-home text-lg w-6 text-center"></i>
                </x-slot>
                {{ __('Dashboard') }}
            </x-nav-link>

            <x-nav-link href="{{ route('pemagang.penempatan.index') }}" :active="request()->routeIs('pemagang.penempatan.*')">
                <x-slot name="icon">
                    <i class="fas fa-map-marked-alt text-lg w-6 text-center"></i>
                </x-slot>
                {{ __('Info Penempatan') }}
            </x-nav-link>

            {{-- HANYA TAMPIL JIKA DATA PESERTA SUDAH ADA --}}
            @if (Auth::user()->peserta)
                <x-nav-link href="{{ route('pemagang.absensi.index') }}" :active="request()->routeIs('pemagang.absensi.*')">
                    <x-slot name="icon">
                        <i class="fas fa-fingerprint text-lg w-6 text-center"></i>
                    </x-slot>
                    {{ __('Absensi') }}
                </x-nav-link>

                <x-nav-link href="{{ route('pemagang.evaluasi.index') }}" :active="request()->routeIs('pemagang.evaluasi.*')">
                    <x-slot name="icon">
                        <i class="fas fa-star text-lg w-6 text-center"></i>
                    </x-slot>
                    {{ __('Evaluasi Kinerja') }}
                </x-nav-link>
            @endif

        @endif
    </nav>
</div>
