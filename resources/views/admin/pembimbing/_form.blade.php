<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <x-form.input name="nip" label="NIP / ID Staff" :value="$pembimbing->nip ?? ''" required="true" type="number" />

    <x-form.input name="nama" label="Nama Lengkap & Gelar" :value="$pembimbing->nama ?? ''" required="true" />

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Jabatan</label>
        <div class="relative">
            <select name="jabatan"
                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <option value="" disabled {{ !isset($pembimbing->jabatan) ? 'selected' : '' }}>-- Pilih Jabatan --
                </option>

                @foreach (\App\Helpers\StaticData::getJabatan() as $jab)
                    <option value="{{ $jab }}"
                        {{ isset($pembimbing->jabatan) && $pembimbing->jabatan == $jab ? 'selected' : '' }}>
                        {{ $jab }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <x-form.select name="bidang" label="Bidang / Unit Kerja" :options="$listBidang" :value="$pembimbing->bidang ?? ''" required="true" />

    <x-form.input name="no_hp" label="Nomor WhatsApp" :value="$pembimbing->no_hp ?? ''" type="number" />

</div>

<div class="mt-6 flex justify-end pt-4 border-t border-gray-100">
    <button type="submit"
        class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 shadow-md transition flex items-center gap-2">
        <i class="fas fa-save"></i> Simpan Data
    </button>
</div>
