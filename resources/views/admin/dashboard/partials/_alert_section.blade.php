@if ($pengajuan_selesai->count() > 0)
    <div class="mb-8 bg-white rounded-r-xl border-l-4 border-blue-600 shadow-md overflow-hidden animate-fade-in-down">

        <div class="bg-blue-50 px-6 py-4 border-b border-blue-100 flex items-center gap-4">
            <div class="bg-blue-600 text-white p-2 rounded-lg shadow-sm">
                <i class="fas fa-bell text-xl"></i>
            </div>
            <div>
                <h4 class="font-bold text-gray-800 text-lg leading-tight">Permintaan Penilaian Masuk!</h4>
                <p class="text-sm text-blue-700 font-medium">
                    Ada <span class="font-bold">{{ $pengajuan_selesai->count() }} peserta</span> mengajukan penyelesaian
                    magang.
                </p>
            </div>
        </div>

        <div class="divide-y divide-gray-100">
            @foreach ($pengajuan_selesai as $item)
                <div
                    class="p-5 flex flex-col md:flex-row md:items-center justify-between gap-4 hover:bg-gray-50 transition duration-150 ease-in-out">

                    <div class="flex items-center gap-4">
                        @if ($item->foto_profil)
                            <img src="{{ asset($item->foto_profil) }}"
                                class="w-12 h-12 rounded-full object-cover border-2 border-white shadow-sm">
                        @else
                            <div
                                class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 font-bold text-lg border-2 border-white shadow-sm">
                                {{ substr($item->nama_lengkap, 0, 2) }}
                            </div>
                        @endif

                        <div>
                            <h5 class="font-bold text-gray-800 text-base">{{ $item->nama_lengkap }}</h5>
                            <div class="flex items-center gap-3 text-xs text-gray-500 mt-1">
                                <span class="flex items-center gap-1 bg-gray-100 px-2 py-0.5 rounded text-gray-600">
                                    <i class="fas fa-id-card"></i> {{ $item->nim_nisn }}
                                </span>
                                <span class="flex items-center gap-1">
                                    <i class="fas fa-university text-gray-400"></i> {{ $item->institusi }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-6">
                        <div class="text-right hidden md:block">
                            <p class="text-[10px] uppercase tracking-wider text-gray-400 font-bold">Pembimbing:</p>
                            <p class="text-sm font-semibold text-gray-700">
                                {{ $item->penempatan->pembimbing->nama ?? '-' }}</p>
                        </div>

                        <a href="{{ route('admin.evaluasi.create', $item->id) }}"
                            class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold rounded-lg shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5 flex items-center gap-2">
                            <i class="fas fa-star"></i> Input Nilai
                        </a>
                    </div>

                </div>
            @endforeach
        </div>

        @if ($pengajuan_selesai->count() > 5)
            <div class="bg-gray-50 px-6 py-2 text-center border-t border-gray-100">
                <a href="{{ route('admin.evaluasi.index') }}"
                    class="text-xs text-blue-600 hover:underline font-semibold">Lihat semua permintaan</a>
            </div>
        @endif
    </div>
@endif
