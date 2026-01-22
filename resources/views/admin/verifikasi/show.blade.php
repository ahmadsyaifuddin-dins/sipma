<x-app-layout>
    <x-slot name="header">Detail Verifikasi</x-slot>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="lg:col-span-2 space-y-6">

            <div class="p-6 bg-white rounded-lg shadow-sm border">
                <h3 class="text-lg font-bold text-gray-700 mb-4 border-b pb-2">Biodata Peserta</h3>
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="text-gray-500">Nama Lengkap</p>
                        <p class="font-semibold">{{ $peserta->nama_lengkap }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">NIM / NISN</p>
                        <p class="font-semibold">{{ $peserta->nim_nisn }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Institusi</p>
                        <p class="font-semibold">{{ $peserta->institusi }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Kontak (WA)</p>
                        <p class="font-semibold">{{ $peserta->no_hp }}</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-gray-500">Alamat</p>
                        <p class="font-semibold">{{ $peserta->alamat }}</p>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-white rounded-lg shadow-sm border">
                <h3 class="text-lg font-bold text-gray-700 mb-4 border-b pb-2">Berkas Pendukung</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="mb-2 font-semibold text-gray-600">Pas Foto:</p>
                        <img src="{{ asset($peserta->foto_profil) }}" alt="Foto Peserta"
                            class="w-32 h-40 object-cover rounded border shadow-sm">
                    </div>

                    <div>
                        <p class="mb-2 font-semibold text-gray-600">Surat Pengantar:</p>
                        <div class="border p-4 rounded bg-gray-50 flex items-center justify-between">
                            <div class="flex items-center">
                                <svg class="w-8 h-8 text-red-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 2H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span class="text-sm text-gray-600 truncate max-w-[150px]">Surat_Pengantar.pdf</span>
                            </div>
                            <a href="{{ asset($peserta->file_surat_pengantar) }}" target="_blank"
                                class="text-blue-600 hover:underline text-sm font-bold">
                                Lihat / Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-1">
            <div class="p-6 bg-white rounded-lg shadow-lg border-t-4 border-indigo-600 sticky top-4">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Keputusan Admin</h3>

                <form action="{{ route('admin.verifikasi.approve', $peserta->id) }}" method="POST">
                    @csrf

                    <div class="space-y-4">
                        <div class="bg-blue-50 p-3 rounded text-sm text-blue-800 mb-4">
                            <strong>Instruksi:</strong> Jika data valid, silakan pilih Pembimbing untuk peserta ini.
                        </div>

                        <x-form.select name="pembimbing_id" label="Pilih Pembimbing Lapangan" :options="$pembimbings"
                            required="true" />

                        <x-form.input name="ruangan" label="Tempat / Ruangan Magang" placeholder="Contoh: Ruang Server"
                            required="true" />

                        <button type="submit"
                            class="w-full py-2 px-4 bg-green-600 hover:bg-green-700 text-white font-bold rounded shadow transition transform hover:scale-105">
                            ✅ Terima & Tempatkan
                        </button>
                    </div>
                </form>

                <hr class="my-6 border-gray-200">

                <form action="{{ route('admin.verifikasi.reject', $peserta->id) }}" method="POST"
                    onsubmit="return confirm('Yakin ingin menolak peserta ini?');">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="w-full py-2 px-4 bg-gray-200 hover:bg-red-600 hover:text-white text-gray-600 font-bold rounded shadow transition">
                        ❌ Tolak Pendaftaran
                    </button>
                </form>

            </div>
        </div>

    </div>
</x-app-layout>
