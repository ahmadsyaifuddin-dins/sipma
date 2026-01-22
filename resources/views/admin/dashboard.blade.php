<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard Administrator') }}
    </x-slot>

    <div
        class="mb-8 p-6 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-xl shadow-lg text-white relative overflow-hidden">
        <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl"></div>
        <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl"></div>

        <div class="flex items-center justify-between relative z-10">
            <div>
                <h3 class="text-2xl font-bold">
                    Halo, {{ Auth::user()->name }}! 👋
                </h3>
                <p class="mt-2 text-indigo-100 max-w-xl">
                    Selamat datang kembali di SIPMA (Sistem Informasi Pelayanan Magang).<br>
                    Pantau aktivitas magang dan kelola data peserta dengan mudah hari ini.
                </p>
            </div>
            <div class="hidden md:block opacity-90 transform rotate-12 mr-6">
                <i class="fas fa-laptop-code text-6xl text-white/80"></i>
            </div>
        </div>
    </div>

    <div class="grid gap-6 mb-8 md:grid-cols-3">

        <div
            class="flex flex-col p-4 bg-white rounded-xl shadow-sm hover:shadow-md transition duration-300 border border-gray-100">
            <div class="flex items-center">
                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full">
                    <i class="fas fa-users text-xl"></i>
                </div>
                <div>
                    <p class="mb-1 text-sm font-medium text-gray-600">Peserta Aktif</p>
                    <p class="text-2xl font-bold text-gray-800">
                        {{ $total_peserta ?? 0 }}
                    </p>
                </div>
            </div>
            <div class="mt-4 border-t pt-3">
                <a href="{{ route('admin.peserta.index') }}"
                    class="text-sm text-blue-600 hover:text-blue-800 font-medium flex items-center group">
                    Lihat semua data <i
                        class="fas fa-arrow-right ml-1 transform group-hover:translate-x-1 transition"></i>
                </a>
            </div>
        </div>

        <div
            class="flex flex-col p-4 bg-white rounded-xl shadow-sm hover:shadow-md transition duration-300 border border-gray-100">
            <div class="flex items-center">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full">
                    <i class="fas fa-user-clock text-xl"></i>
                </div>
                <div>
                    <p class="mb-1 text-sm font-medium text-gray-600">Menunggu Verifikasi</p>
                    <p class="text-2xl font-bold text-gray-800">
                        {{ $peserta_pending ?? 0 }}
                    </p>
                </div>
            </div>
            <div class="mt-4 border-t pt-3">
                <a href="{{ route('admin.verifikasi.index') }}"
                    class="text-sm text-orange-600 hover:text-orange-800 font-medium flex items-center group">
                    Proses pengajuan <i
                        class="fas fa-arrow-right ml-1 transform group-hover:translate-x-1 transition"></i>
                </a>
            </div>
        </div>

        <div
            class="flex flex-col p-4 bg-white rounded-xl shadow-sm hover:shadow-md transition duration-300 border border-gray-100">
            <div class="flex items-center">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full">
                    <i class="fas fa-chalkboard-teacher text-xl"></i>
                </div>
                <div>
                    <p class="mb-1 text-sm font-medium text-gray-600">Total Pembimbing</p>
                    <p class="text-2xl font-bold text-gray-800">
                        {{ $total_pembimbing ?? 0 }}
                    </p>
                </div>
            </div>
            <div class="mt-4 border-t pt-3">
                <a href="{{ route('admin.pembimbing.index') }}"
                    class="text-sm text-green-600 hover:text-green-800 font-medium flex items-center group">
                    Kelola pembimbing <i
                        class="fas fa-arrow-right ml-1 transform group-hover:translate-x-1 transition"></i>
                </a>
            </div>
        </div>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <div class="lg:col-span-2">
            <div class="w-full overflow-hidden rounded-xl shadow-sm border border-gray-100 bg-white h-full">
                <div class="p-4 border-b bg-gray-50 flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-history text-gray-400"></i>
                        <h4 class="font-bold text-gray-700">Pendaftar Terbaru</h4>
                    </div>
                    <span class="text-xs bg-indigo-100 text-indigo-700 px-2 py-1 rounded font-semibold">5
                        Terakhir</span>
                </div>
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead class="bg-gray-50 border-b">
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">
                                <th class="px-4 py-3">Nama Peserta</th>
                                <th class="px-4 py-3">Institusi</th>
                                <th class="px-4 py-3">Tanggal</th>
                                <th class="px-4 py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y">
                            @forelse($latest_peserta ?? [] as $item)
                                <tr class="text-gray-700 hover:bg-gray-50 transition">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full border"
                                                    src="{{ asset($item->user->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($item->nama_lengkap)) }}"
                                                    alt="" loading="lazy" />
                                            </div>
                                            <div>
                                                <p class="font-semibold">{{ $item->nama_lengkap }}</p>
                                                <p class="text-xs text-gray-500">{{ $item->nim_nisn }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $item->institusi }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $item->created_at->format('d M Y') }}
                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full">
                                            Pending
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-4 py-8 text-center text-gray-500">
                                        <div class="flex flex-col items-center">
                                            <i class="fas fa-inbox text-4xl text-gray-300 mb-2"></i>
                                            <span>Belum ada pendaftar baru.</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 h-full overflow-hidden">
                <div class="p-4 border-b bg-gradient-to-r from-gray-50 to-white flex items-center gap-2">
                    <div class="p-1.5 bg-indigo-100 text-indigo-600 rounded">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h4 class="font-bold text-gray-800">Visi & Misi</h4>
                </div>

                <div class="p-6">
                    <div class="mb-6">
                        <h5 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Visi</h5>
                        <div class="p-4 bg-indigo-50 border-l-4 border-indigo-500 rounded-r-lg">
                            <p class="text-indigo-900 font-medium italic text-sm leading-relaxed">
                                "Terwujudnya Sistem Pemerintahan Berbasis Elektronik (SPBE) yang Terintegrasi untuk
                                Pelayanan Publik yang Berkualitas."
                            </p>
                        </div>
                    </div>

                    <div>
                        <h5 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Misi Utama</h5>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                <span class="text-sm text-gray-600 font-medium">Transformasi digital daerah.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                <span class="text-sm text-gray-600 font-medium">Tata kelola pemerintahan bersih.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                <span class="text-sm text-gray-600 font-medium">Pelayanan publik transparan.</span>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-8 flex justify-center opacity-50">
                        <i class="fas fa-building text-6xl text-gray-100"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div x-data="{ isOpen: false }" @open-modal-selesai.window="isOpen = true" x-show="isOpen"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50" style="display: none;"
        x-transition.opacity>
    </div>

</x-app-layout>
