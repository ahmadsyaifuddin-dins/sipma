<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Detail Verifikasi Peserta') }}
            </h2>
            <a href="{{ route('admin.verifikasi.index') }}"
                class="text-sm text-gray-500 hover:text-indigo-600 transition flex items-center gap-1">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </x-slot>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <div class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-indigo-50 px-6 py-4 border-b border-indigo-100 flex items-center gap-2">
                    <i class="fas fa-user-circle text-indigo-600 text-lg"></i>
                    <h3 class="font-bold text-gray-800">Profil Peserta</h3>
                </div>

                <div class="p-6 flex flex-col md:flex-row gap-8">
                    <div class="flex-shrink-0 flex flex-col items-center">
                        <div class="relative">
                            <img src="{{ asset($peserta->foto_profil) }}" alt="Foto Peserta"
                                class="w-40 h-48 object-cover rounded-lg shadow-md border-2 border-white ring-2 ring-gray-100">
                            <div class="absolute -bottom-3 -right-3 bg-blue-100 text-blue-600 p-2 rounded-full border-2 border-white shadow-sm"
                                title="Status: Pending">
                                <i class="fas fa-clock"></i>
                            </div>
                        </div>
                        <span
                            class="mt-4 px-3 py-1 bg-gray-100 text-gray-500 text-xs font-bold rounded-full uppercase tracking-wide">
                            {{ $peserta->status }}
                        </span>
                    </div>

                    <div class="flex-grow grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-8">
                        <div>
                            <p class="text-xs text-gray-400 uppercase font-bold mb-1">
                                <i class="fas fa-font mr-1"></i> Nama Lengkap
                            </p>
                            <p class="text-gray-800 font-semibold text-lg border-b pb-2">{{ $peserta->nama_lengkap }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs text-gray-400 uppercase font-bold mb-1">
                                <i class="fas fa-id-card mr-1"></i> NIM / NISN
                            </p>
                            <p class="text-gray-800 font-semibold text-lg border-b pb-2">{{ $peserta->nim_nisn }}</p>
                        </div>

                        <div>
                            <p class="text-xs text-gray-400 uppercase font-bold mb-1">
                                <i class="fas fa-university mr-1"></i> Asal Institusi
                            </p>
                            <p class="text-gray-800 font-semibold text-lg border-b pb-2">{{ $peserta->institusi }}</p>
                        </div>

                        <div>
                            <p class="text-xs text-gray-400 uppercase font-bold mb-1">
                                <i class="fab fa-whatsapp mr-1 text-green-500"></i> Kontak (WA)
                            </p>
                            <p class="text-gray-800 font-semibold text-lg border-b pb-2">{{ $peserta->no_hp }}</p>
                        </div>

                        <div class="md:col-span-2">
                            <p class="text-xs text-gray-400 uppercase font-bold mb-1">
                                <i class="fas fa-map-marker-alt mr-1 text-red-500"></i> Alamat Domisili
                            </p>
                            <p class="text-gray-800 font-medium">{{ $peserta->alamat }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 flex items-center gap-2 bg-gray-50">
                    <i class="fas fa-folder-open text-gray-500 text-lg"></i>
                    <h3 class="font-bold text-gray-700">Dokumen Pendukung</h3>
                </div>

                <div class="p-6">
                    <div
                        class="bg-white border border-gray-200 rounded-lg p-4 flex items-center justify-between hover:shadow-md transition">
                        <div class="flex items-center gap-4">
                            <div class="p-3 bg-red-50 text-red-600 rounded-lg">
                                <i class="fas fa-file-pdf text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">Surat Pengantar Magang</h4>
                                <p class="text-sm text-gray-500">Dokumen resmi dari Institusi/Sekolah</p>
                            </div>
                        </div>

                        <a href="{{ asset($peserta->file_surat_pengantar) }}" target="_blank"
                            class="px-4 py-2 bg-indigo-50 text-indigo-700 rounded-lg font-semibold text-sm hover:bg-indigo-100 transition flex items-center gap-2">
                            <i class="fas fa-eye"></i> Lihat Dokumen
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-lg border-t-4 border-indigo-600 sticky top-6">

                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2 flex items-center gap-2">
                        <i class="fas fa-gavel text-indigo-600"></i> Keputusan Admin
                    </h3>
                    <p class="text-sm text-gray-500 mb-6">Silakan validasi data peserta sebelum mengambil tindakan.</p>

                    <form action="{{ route('admin.verifikasi.approve', $peserta->id) }}" method="POST">
                        @csrf

                        <div class="space-y-5">
                            <div class="bg-blue-50 border border-blue-100 p-3 rounded-lg flex gap-3">
                                <i class="fas fa-info-circle text-blue-600 mt-1"></i>
                                <p class="text-xs text-blue-800 leading-relaxed">
                                    Jika diterima, sistem akan membuatkan akun dan menempatkan peserta sesuai data
                                    berikut.
                                </p>
                            </div>

                            <div>
                                <x-form.select name="pembimbing_id" label="Pilih Pembimbing" :options="$pembimbings"
                                    required="true" />
                            </div>

                            <div class="relative">
                                <x-form.input name="ruangan" label="Ruangan / Unit Kerja"
                                    placeholder="Cth: Ruang Server" required="true" />
                                <div class="absolute top-9 right-3 text-gray-400">
                                    <i class="fas fa-building"></i>
                                </div>
                            </div>

                            <button type="submit"
                                class="w-full py-3 px-4 bg-gradient-to-r from-green-600 to-green-500 hover:from-green-700 hover:to-green-600 text-white font-bold rounded-lg shadow-md transition transform hover:-translate-y-0.5 flex justify-center items-center gap-2">
                                <i class="fas fa-check-circle"></i> Terima & Tempatkan
                            </button>
                        </div>
                    </form>

                    <div class="relative flex py-6 items-center">
                        <div class="flex-grow border-t border-gray-200"></div>
                        <span class="flex-shrink-0 mx-4 text-gray-400 text-xs uppercase">Atau</span>
                        <div class="flex-grow border-t border-gray-200"></div>
                    </div>

                    <form action="{{ route('admin.verifikasi.reject', $peserta->id) }}" method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin menolak pendaftaran ini? Data akan dihapus.');">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            class="w-full py-3 px-4 bg-white border-2 border-gray-200 text-gray-500 font-bold rounded-lg hover:bg-red-50 hover:text-red-600 hover:border-red-200 transition flex justify-center items-center gap-2 group">
                            <i class="fas fa-times-circle group-hover:text-red-600 transition"></i> Tolak Pendaftaran
                        </button>
                    </form>

                </div>
            </div>
        </div>

    </div>
</x-app-layout>
