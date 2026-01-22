<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard Administrator') }}
    </x-slot>

    <div class="mb-8 p-6 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-lg shadow-md text-white">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-2xl font-bold">
                    Halo, {{ Auth::user()->name }}! 👋
                </h3>
                <p class="mt-2 text-indigo-100">
                    Selamat datang kembali di SIPMA. Berikut adalah ringkasan aktivitas magang hari ini.
                </p>
            </div>
            <div class="hidden md:block opacity-80">
                <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                    </path>
                </svg>
            </div>
        </div>
    </div>

    <div class="grid gap-6 mb-8 md:grid-cols-3">

        <div
            class="flex flex-col p-4 bg-white rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-300 border border-gray-100">
            <div class="flex items-center">
                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
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
                    class="text-sm text-blue-600 hover:text-blue-800 font-medium flex items-center">
                    Lihat semua data <span class="ml-1">&rarr;</span>
                </a>
            </div>
        </div>

        <div
            class="flex flex-col p-4 bg-white rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-300 border border-gray-100">
            <div class="flex items-center">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
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
                    class="text-sm text-orange-600 hover:text-orange-800 font-medium flex items-center">
                    Proses pengajuan <span class="ml-1">&rarr;</span>
                </a>
            </div>
        </div>

        <div
            class="flex flex-col p-4 bg-white rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-300 border border-gray-100">
            <div class="flex items-center">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
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
                    class="text-sm text-green-600 hover:text-green-800 font-medium flex items-center">
                    Kelola pembimbing <span class="ml-1">&rarr;</span>
                </a>
            </div>
        </div>

    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs border bg-white mb-8">
        <div class="p-4 border-b bg-gray-50 flex justify-between items-center">
            <h4 class="font-semibold text-gray-700">Pendaftar Terbaru</h4>
            <span class="text-xs bg-gray-200 text-gray-600 px-2 py-1 rounded">5 Terakhir</span>
        </div>
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead class="bg-gray-50 border-b">
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">
                        <th class="px-4 py-3">Nama Peserta</th>
                        <th class="px-4 py-3">Asal Sekolah/Kampus</th>
                        <th class="px-4 py-3">Tanggal Daftar</th>
                        <th class="px-4 py-3">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y">
                    @forelse($latest_peserta ?? [] as $item)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="{{ asset($item->foto_profil ?? 'images/default-avatar.png') }}"
                                            alt="" loading="lazy" />
                                    </div>
                                    <div>
                                        <p class="font-semibold">{{ $item->nama_lengkap }}</p>
                                        <p class="text-xs text-gray-600">{{ $item->nim_nisn }}</p>
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
                            <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                                Belum ada pendaftar baru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
