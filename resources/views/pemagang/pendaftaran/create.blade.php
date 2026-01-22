<x-onboarding-layout>
    <div class="p-6 bg-white rounded-lg shadow-xs max-w-4xl mx-auto">

        <div class="mb-6 text-center border-b pb-4">
            <h2 class="text-2xl font-bold text-gray-700">Lengkapi Biodata</h2>
            <p class="text-gray-500">Silakan isi data diri Anda dengan benar sesuai dokumen asli.</p>
        </div>

        <form action="{{ route('pemagang.daftar.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <h3 class="text-lg font-semibold text-gray-600 mb-4">Data Pribadi</h3>

                    <x-form.input name="nim_nisn" label="NIM / NISN" required="true"
                        placeholder="Nomor Induk Mahasiswa/Siswa" />

                    <x-form.input name="nama_lengkap" label="Nama Lengkap" :value="Auth::user()->name" required="true" />

                    <x-form.input name="no_hp" label="Nomor WhatsApp" type="number" required="true"
                        placeholder="08..." />

                    <div class="mb-3">
                        <x-form.label for="alamat" value="Alamat Domisili" required="true" />
                        <textarea name="alamat"
                            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="3"
                            required></textarea>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-600 mb-4">Data Instansi & Berkas</h3>

                    <x-form.input name="institusi" label="Asal Kampus / Sekolah" required="true"
                        placeholder="Contoh: UNISKA Banjarmasin" />

                    <x-form.input name="jurusan" label="Jurusan / Prodi" required="true"
                        placeholder="Contoh: Teknik Informatika" />

                    <div class="grid grid-cols-2 gap-4">
                        <x-form.input name="tgl_mulai" label="Tanggal Mulai" type="date" required="true" />
                        <x-form.input name="tgl_selesai" label="Tanggal Selesai" type="date" required="true" />
                    </div>

                    <div class="mb-3">
                        <x-form.label for="foto_profil" value="Pas Foto (Formal)" required="true" />
                        <input type="file" name="foto_profil"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
                            accept="image/*" required>
                        <p class="text-xs text-gray-500 mt-1">Format: JPG/PNG, Max 2MB.</p>
                    </div>

                    <div class="mb-3">
                        <x-form.label for="file_surat_pengantar" value="Surat Pengantar (PDF)" required="true" />
                        <input type="file" name="file_surat_pengantar"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
                            accept=".pdf" required>
                        <p class="text-xs text-gray-500 mt-1">Format: PDF, Max 5MB.</p>
                    </div>
                </div>

            </div>

            <div class="mt-8 flex justify-end">
                <button type="submit"
                    class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 shadow-lg transition duration-150 transform hover:scale-105">
                    Kirim Pendaftaran
                </button>
            </div>

        </form>
    </div>
</x-onboarding-layout>
