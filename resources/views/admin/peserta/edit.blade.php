<x-app-layout>
    <x-slot name="header">Edit Data Peserta</x-slot>

    <div class="p-6 bg-white rounded-lg shadow-md max-w-2xl mx-auto">
        <form action="{{ route('admin.peserta.update', $peserta->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="flex items-center justify-between mb-6 border-b pb-4">
                <h3 class="text-lg font-bold text-gray-800">Form Edit Peserta</h3>
                <span class="text-xs bg-gray-100 text-gray-500 px-2 py-1 rounded">ID: {{ $peserta->nim_nisn }}</span>
            </div>

            <x-form.input name="nama_lengkap" label="Nama Lengkap" :value="$peserta->nama_lengkap" required="true" />

            <div class="mb-4">
                <x-form.label for="status" value="Status Magang" required="true" />
                <select name="status" class="w-full border-gray-300 rounded shadow-sm focus:ring-indigo-500">
                    <option value="pending" {{ $peserta->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="aktif" {{ $peserta->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="selesai" {{ $peserta->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="ditolak" {{ $peserta->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 mb-6">
                <h4 class="text-xs font-bold text-gray-400 uppercase mb-3 flex items-center gap-1">
                    <i class="fas fa-lock"></i> Durasi Magang (Terkunci)
                </h4>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Tanggal Mulai</label>
                        <input type="text" value="{{ $peserta->tgl_mulai }}" readonly
                            class="w-full bg-gray-200 text-gray-600 border-gray-300 rounded shadow-sm cursor-not-allowed focus:ring-0 focus:border-gray-300 select-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Tanggal Selesai</label>
                        <input type="text" value="{{ $peserta->tgl_selesai }}" readonly
                            class="w-full bg-gray-200 text-gray-600 border-gray-300 rounded shadow-sm cursor-not-allowed focus:ring-0 focus:border-gray-300 select-none">
                    </div>
                </div>
                <p class="text-xs text-gray-400 mt-2 italic">*Tanggal tidak dapat diubah oleh Admin untuk menjaga
                    integritas data pendaftaran.</p>
            </div>

            <h3 class="text-lg font-semibold mb-4 border-b pb-2">Penempatan</h3>

            <x-form.select name="pembimbing_id" label="Pembimbing Lapangan" :options="$pembimbings" :value="$peserta->penempatan->pembimbing_id ?? ''" />

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Ruangan / Unit Kerja</label>
                <div class="relative">
                    <select name="ruangan"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        <option value="" disabled selected>-- Pilih Ruangan --</option>
                        @foreach (\App\Helpers\BidangHelper::getAll() as $ruang)
                            <option value="{{ $ruang }}"
                                {{ isset($peserta->penempatan->ruangan) && $peserta->penempatan->ruangan == $ruang ? 'selected' : '' }}>
                                {{ $ruang }}
                            </option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-3 mt-8 pt-4 border-t">
                <a href="{{ route('admin.peserta.index') }}"
                    class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition">
                    Batal
                </a>
                <button type="submit"
                    class="px-5 py-2.5 bg-indigo-600 text-white font-bold rounded-lg hover:bg-indigo-700 shadow-lg transition transform hover:-translate-y-0.5">
                    <i class="fas fa-save mr-1"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
