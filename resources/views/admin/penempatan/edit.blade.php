<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Penempatan Peserta') }}
            </h2>
            <a href="{{ route('admin.penempatan.index') }}" class="text-sm text-gray-500 hover:text-indigo-600">
                &larr; Kembali
            </a>
        </div>
    </x-slot>

    <div class="max-w-2xl mx-auto p-4">

        <div class="bg-indigo-50 border-l-4 border-indigo-500 p-4 mb-6 rounded-r-lg shadow-sm flex items-start gap-4">
            <img src="{{ $penempatan->peserta->foto_profil ? asset($penempatan->peserta->foto_profil) : 'https://ui-avatars.com/api/?name=' . urlencode($penempatan->peserta->nama_lengkap) }}"
                class="w-16 h-16 rounded-full object-cover border-2 border-white shadow-sm">
            <div>
                <h3 class="font-bold text-gray-800 text-lg">{{ $penempatan->peserta->nama_lengkap }}</h3>
                <p class="text-sm text-gray-600">{{ $penempatan->peserta->institusi }}</p>
                <div class="mt-2 flex gap-2 text-xs">
                    <span class="bg-white px-2 py-1 rounded border border-indigo-200 text-indigo-700">
                        <i class="fas fa-id-card"></i> {{ $penempatan->peserta->nim_nisn }}
                    </span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-6">
                <form action="{{ route('admin.penempatan.update', $penempatan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <h4 class="text-gray-700 font-bold mb-4 border-b pb-2 flex items-center gap-2">
                        <i class="fas fa-map-marked-alt text-indigo-600"></i> Form Mutasi / Pindah
                    </h4>

                    <div class="mb-5">
                        <x-form.select name="pembimbing_id" label="Pembimbing Lapangan" :options="$pembimbings"
                            :value="$penempatan->pembimbing_id" required="true" />
                        <p class="text-xs text-gray-400 mt-1">*Pastikan pembimbing yang dipilih aktif.</p>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ruangan / Unit Kerja</label>
                        <div class="relative">
                            <select name="ruangan" required
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm appearance-none bg-white py-2 pl-3 pr-10">

                                <option value="" disabled>-- Pilih Ruangan --</option>
                                @foreach (\App\Helpers\BidangHelper::getAll() as $ruang)
                                    <option value="{{ $ruang }}"
                                        {{ $penempatan->ruangan == $ruang ? 'selected' : '' }}>
                                        {{ $ruang }}
                                    </option>
                                @endforeach

                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                                <i class="fas fa-building"></i>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                        <a href="{{ route('admin.penempatan.index') }}"
                            class="px-4 py-2 bg-white text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-50 transition font-medium">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-6 py-2 bg-indigo-600 text-white font-bold rounded-lg hover:bg-indigo-700 shadow-md transition flex items-center gap-2">
                            <i class="fas fa-save"></i> Simpan Perubahan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
