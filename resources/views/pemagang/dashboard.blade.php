<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard Saya') }}
    </x-slot>

    <div class="p-6 bg-white rounded-xl shadow-sm border border-gray-100">

        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 pb-6 border-b border-gray-100">
            <div>
                <h3 class="text-2xl font-bold text-gray-800">
                    Halo, {{ Auth::user()->name }} 👋
                </h3>
                <p class="text-gray-500 mt-1">Selamat datang di Panel Peserta Magang.</p>
            </div>

            @if (Auth::user()->peserta)
                <div class="mt-4 md:mt-0 px-4 py-2 bg-gray-50 rounded-lg text-right">
                    <p class="text-xs text-gray-400 uppercase font-bold">Identitas</p>
                    <p class="text-sm font-mono font-semibold text-gray-700">{{ Auth::user()->peserta->nim_nisn }}</p>
                </div>
            @endif
        </div>

        @php
            // Cek apakah data peserta ada
            $peserta = Auth::user()->peserta;
        @endphp

        {{-- BELUM DAFTAR (DATA PESERTA NULL) --}}
        @if (!$peserta)

            <div class="flex flex-col items-center justify-center py-10 text-center space-y-6">
                <div class="p-6 bg-indigo-50 rounded-full animate-bounce">
                    <i class="fas fa-clipboard-list text-6xl text-indigo-600"></i>
                </div>
                <div class="max-w-lg">
                    <h2 class="text-2xl font-bold text-gray-800">Akun Anda Belum Aktif</h2>
                    <p class="text-gray-500 mt-2">
                        Anda telah berhasil membuat akun pengguna. Langkah selanjutnya adalah melengkapi biodata dan
                        mengunggah dokumen persyaratan magang.
                    </p>
                </div>

                <a href="{{ route('pemagang.daftar.create') }}"
                    class="px-8 py-4 bg-indigo-600 text-white font-bold rounded-xl shadow-lg hover:bg-indigo-700 hover:shadow-indigo-500/30 transition transform hover:-translate-y-1 flex items-center gap-3">
                    <span>Lengkapi Biodata Sekarang</span>
                    <i class="fas fa-arrow-right"></i>
                </a>

                <p class="text-xs text-gray-400">
                    *Menu Absensi & Evaluasi akan terbuka setelah Anda menyelesaikan pendaftaran.
                </p>
            </div>

            {{-- ================================================= --}}
            {{-- KONDISI 2: SUDAH DAFTAR (TAMPILKAN STATUS)        --}}
            {{-- ================================================= --}}
        @else
            @php
                $status = $peserta->status ?? 'pending';
                // Konfigurasi Warna Status
                $statusConfig = [
                    'pending' => [
                        'bg' => 'bg-yellow-50',
                        'text' => 'text-yellow-800',
                        'border' => 'border-yellow-200',
                        'icon' => 'fas fa-clock',
                        'msg' => 'Pendaftaran sedang diverifikasi. Mohon tunggu persetujuan Admin.',
                    ],
                    'aktif' => [
                        'bg' => 'bg-green-50',
                        'text' => 'text-green-800',
                        'border' => 'border-green-200',
                        'icon' => 'fas fa-check-circle',
                        'msg' => 'Status Anda AKTIF. Silakan lakukan absensi setiap hari kerja.',
                    ],
                    'menunggu_nilai' => [
                        'bg' => 'bg-blue-50',
                        'text' => 'text-blue-800',
                        'border' => 'border-blue-200',
                        'icon' => 'fas fa-hourglass-half',
                        'msg' => 'Pengajuan selesai diterima. Menunggu input nilai dan validasi dari Pembimbing/Admin.',
                    ],
                    'selesai' => [
                        'bg' => 'bg-indigo-50',
                        'text' => 'text-indigo-800',
                        'border' => 'border-indigo-200',
                        'icon' => 'fas fa-graduation-cap',
                        'msg' => 'Selamat! Program magang telah selesai. Anda dapat melihat hasil evaluasi.',
                    ],
                    'ditolak' => [
                        'bg' => 'bg-red-50',
                        'text' => 'text-red-800',
                        'border' => 'border-red-200',
                        'icon' => 'fas fa-times-circle',
                        'msg' => 'Maaf, pendaftaran magang Anda tidak dapat diterima.',
                    ],
                ];
                $config = $statusConfig[$status] ?? $statusConfig['pending'];
            @endphp

            <div class="p-5 mb-8 rounded-xl border {{ $config['bg'] }} {{ $config['border'] }} flex items-start gap-4">
                <div class="p-2 bg-white bg-opacity-60 rounded-lg {{ $config['text'] }}">
                    <i class="{{ $config['icon'] }} text-xl"></i>
                </div>
                <div>
                    <h4 class="font-bold {{ $config['text'] }} uppercase text-xs tracking-wider mb-1">Status Saat Ini
                    </h4>
                    <p class="font-bold text-lg {{ $config['text'] }} capitalize mb-1">
                        {{ str_replace('_', ' ', $status) }}</p>
                    <p class="text-sm {{ $config['text'] }} opacity-90">{{ $config['msg'] }}</p>

                    @if ($status == 'aktif' && $peserta->penempatan)
                        <div class="mt-4 pt-4 border-t border-black/5 text-sm {{ $config['text'] }}">
                            <p><strong>Pembimbing:</strong> {{ $peserta->penempatan->pembimbing->nama }}</p>
                            <p><strong>Ruangan:</strong> {{ $peserta->penempatan->ruangan }}</p>
                        </div>
                    @endif
                </div>
            </div>

            @if ($status === 'aktif')
                <div class="grid gap-6 mb-8 md:grid-cols-1">
                    <a href="{{ route('pemagang.absensi.index') }}"
                        class="flex items-center justify-between p-6 bg-white rounded-xl border border-gray-200 hover:border-indigo-500 hover:shadow-lg transition group">
                        <div class="flex items-center gap-4">
                            <div
                                class="p-4 bg-indigo-50 text-indigo-600 rounded-full group-hover:bg-indigo-600 group-hover:text-white transition">
                                <i class="fas fa-fingerprint text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800 text-lg">Absensi Harian</h4>
                                <p class="text-sm text-gray-500">Catat jam masuk & pulang kerja Anda di sini.</p>
                            </div>
                        </div>
                        <div>
                            <i
                                class="fas fa-chevron-right text-gray-300 group-hover:text-indigo-500 text-xl transition"></i>
                        </div>
                    </a>
                </div>

                @if (\Carbon\Carbon::now()->gte(\Carbon\Carbon::parse($peserta->tgl_selesai)))
                    <div
                        class="mt-8 p-6 bg-gradient-to-r from-orange-50 to-yellow-50 border border-orange-200 rounded-xl animate-fade-in-up">
                        <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                            <div class="flex items-start gap-4">
                                <div class="p-3 bg-orange-100 text-orange-600 rounded-full">
                                    <i class="fas fa-flag-checkered text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 text-lg">Masa Magang Berakhir</h4>
                                    <p class="text-gray-600 text-sm mt-1">
                                        Masa magang selesai pada
                                        <strong>{{ \Carbon\Carbon::parse($peserta->tgl_selesai)->translatedFormat('d F Y') }}</strong>.
                                        <br>Silakan ajukan penyelesaian jika tugas sudah tuntas.
                                    </p>
                                </div>
                            </div>
                            <form action="{{ route('pemagang.ajukan.selesai') }}" method="POST"
                                onsubmit="return confirm('Yakin ajukan selesai?');">
                                @csrf @method('PUT')
                                <button type="submit"
                                    class="w-full md:w-auto px-6 py-3 bg-orange-600 text-white font-bold rounded-lg hover:bg-orange-700 shadow-lg transform hover:scale-105 transition flex items-center justify-center gap-2">
                                    <span>Ajukan Penyelesaian</span> <i class="fas fa-paper-plane"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endif
            @elseif ($status === 'selesai')
                <div class="grid gap-6 mb-8">
                    <a href="{{ route('pemagang.evaluasi.index') }}"
                        class="flex items-center justify-between p-6 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl text-white shadow-lg hover:shadow-xl transition transform hover:-translate-y-1">
                        <div class="flex items-center gap-4">
                            <div class="p-3 bg-white/20 rounded-lg"><i class="fas fa-star text-2xl text-yellow-300"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-xl">Lihat Rapor Evaluasi</h3>
                                <p class="text-indigo-100 text-sm">Cek nilai akhir dan sertifikat.</p>
                            </div>
                        </div>
                        <div><i class="fas fa-chevron-right text-2xl"></i></div>
                    </a>
                </div>
            @endif

        @endif
    </div>
</x-app-layout>
