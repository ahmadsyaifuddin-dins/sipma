<x-app-layout>
    <x-slot name="header">Edit Data Peserta</x-slot>

    <div class="p-6 bg-white rounded-lg shadow-md max-w-2xl mx-auto">
        <form action="{{ route('admin.peserta.update', $peserta->id) }}" method="POST">
            @csrf
            @method('PUT')

            <h3 class="text-lg font-semibold mb-4 border-b pb-2">Informasi Dasar</h3>

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

            <h3 class="text-lg font-semibold mb-4 border-b pb-2 mt-6">Penempatan (Opsional)</h3>

            <x-form.select name="pembimbing_id" label="Ganti Pembimbing" :options="$pembimbings" :value="$peserta->penempatan->pembimbing_id ?? ''" />

            <x-form.input name="ruangan" label="Ruangan" :value="$peserta->penempatan->ruangan ?? ''" />

            <div class="flex justify-end gap-3 mt-6">
                <a href="{{ route('admin.peserta.index') }}"
                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Batal</a>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Simpan
                    Perubahan</button>
            </div>
        </form>
    </div>
</x-app-layout>
