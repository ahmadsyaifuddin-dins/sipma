<div class="grid grid-cols-1 md:grid-cols-2 gap-4">

    <x-form.input name="nip" label="NIP / ID Staff" :value="$pembimbing->nip ?? ''" required="true" type="number" />

    <x-form.input name="nama" label="Nama Lengkap & Gelar" :value="$pembimbing->nama ?? ''" required="true" />

    <x-form.input name="jabatan" label="Jabatan" :value="$pembimbing->jabatan ?? ''" required="true"
        placeholder="Contoh: Pranata Komputer Ahli Muda" />

    <x-form.select name="bidang" label="Bidang / Unit Kerja" :options="$listBidang" :value="$pembimbing->bidang ?? ''" required="true" />

    <x-form.input name="no_hp" label="Nomor WhatsApp" :value="$pembimbing->no_hp ?? ''" type="number" />

</div>

<div class="mt-4 flex justify-end">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
        Simpan Data
    </button>
</div>
