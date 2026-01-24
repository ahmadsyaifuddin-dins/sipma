<div class="relative">
    <div class="bg-indigo-600 px-6 py-4 flex items-center justify-between rounded-t-xl">
        <h3 class="text-lg font-bold text-white flex items-center gap-2">
            <i class="fas fa-id-card-alt"></i> Detail Peserta
        </h3>
        <button @click="open = false" class="text-white hover:text-gray-200 transition focus:outline-none">
            <i class="fas fa-times text-xl"></i>
        </button>
    </div>

    <div class="p-6 max-h-[75vh] overflow-y-auto">

        <div class="flex flex-col md:flex-row gap-6 mb-6">
            <div class="flex-shrink-0 mx-auto md:mx-0 text-center">
                @php
                    $avatar = $peserta->foto_profil
                        ? asset($peserta->foto_profil)
                        : 'https://ui-avatars.com/api/?name=' .
                            urlencode($peserta->nama_lengkap) .
                            '&color=7F9CF5&background=EBF4FF';
                @endphp
                <img src="{{ $avatar }}" alt="Foto"
                    class="w-32 h-40 object-cover rounded-lg shadow-md border-2 border-gray-100 mx-auto">

                <div class="mt-3">
                    <span
                        class="px-3 py-1 text-xs font-bold uppercase rounded-full 
                        {{ $peserta->status == 'aktif'
                            ? 'bg-green-100 text-green-700'
                            : ($peserta->status == 'pending'
                                ? 'bg-yellow-100 text-yellow-700'
                                : ($peserta->status == 'selesai'
                                    ? 'bg-blue-100 text-blue-700'
                                    : 'bg-red-100 text-red-700')) }}">
                        {{ $peserta->status }}
                    </span>
                </div>
            </div>

            <div class="flex-grow space-y-3 text-sm">
                <div>
                    <label class="text-xs text-gray-400 font-bold uppercase">Nama Lengkap</label>
                    <p class="font-bold text-gray-800 text-lg">{{ $peserta->nama_lengkap }}</p>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-xs text-gray-400 font-bold uppercase">NIM / NISN</label>
                        <p class="font-semibold text-gray-700">{{ $peserta->nim_nisn }}</p>
                    </div>
                    <div>
                        <label class="text-xs text-gray-400 font-bold uppercase">No. WhatsApp</label>
                        <p class="font-semibold text-gray-700">
                            <a href="https://wa.me/{{ $peserta->no_hp }}" target="_blank"
                                class="text-green-600 hover:underline flex items-center gap-1">
                                <i class="fab fa-whatsapp"></i> {{ $peserta->no_hp }}
                            </a>
                        </p>
                    </div>
                </div>
                <div>
                    <label class="text-xs text-gray-400 font-bold uppercase">Institusi</label>
                    <p class="font-semibold text-gray-700">{{ $peserta->institusi }}</p>
                    <p class="text-xs text-gray-500">{{ $peserta->jurusan }}
                        {{ $peserta->semester ? '- Semester ' . $peserta->semester : '' }}</p>
                </div>
                <div>
                    <label class="text-xs text-gray-400 font-bold uppercase">Alamat</label>
                    <p class="font-medium text-gray-600">{{ $peserta->alamat }}</p>
                </div>
            </div>
        </div>

        <hr class="border-gray-100 mb-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                <h4 class="font-bold text-gray-700 mb-3 flex items-center gap-2">
                    <i class="fas fa-map-marker-alt text-red-500"></i> Penempatan
                </h4>
                @if ($peserta->penempatan)
                    <ul class="space-y-2 text-sm">
                        <li class="flex justify-between">
                            <span class="text-gray-500">Pembimbing:</span>
                            <span
                                class="font-medium text-right">{{ $peserta->penempatan->pembimbing->nama ?? '-' }}</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-500">Ruangan:</span>
                            <span class="font-medium text-right">{{ $peserta->penempatan->ruangan }}</span>
                        </li>
                    </ul>
                @else
                    <p class="text-sm text-gray-400 italic text-center py-2">Belum ditempatkan.</p>
                @endif
            </div>

            <div class="bg-blue-50 p-4 rounded-lg border border-blue-100">
                <h4 class="font-bold text-gray-700 mb-3 flex items-center gap-2">
                    <i class="fas fa-calendar-check text-blue-600"></i> Durasi Magang
                </h4>
                <ul class="space-y-2 text-sm">
                    <li class="flex justify-between">
                        <span class="text-gray-500">Mulai:</span>
                        <span
                            class="font-medium">{{ \Carbon\Carbon::parse($peserta->tgl_mulai)->format('d M Y') }}</span>
                    </li>
                    <li class="flex justify-between">
                        <span class="text-gray-500">Selesai:</span>
                        <span
                            class="font-medium">{{ \Carbon\Carbon::parse($peserta->tgl_selesai)->format('d M Y') }}</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="mt-6 flex gap-3">
            <a href="{{ asset($peserta->file_surat_pengantar) }}" target="_blank"
                class="flex-1 py-3 bg-red-50 text-red-700 text-center font-bold rounded-lg hover:bg-red-100 transition border border-red-200 flex items-center justify-center gap-2">
                <i class="fas fa-file-pdf"></i> Surat Pengantar
            </a>
        </div>
    </div>
</div>
