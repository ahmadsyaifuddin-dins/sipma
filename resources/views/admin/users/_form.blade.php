@props(['url', 'user' => null])

<form action="{{ $url }}" method="POST">
    @csrf
    @if ($user)
        @method('PUT')
    @endif

    <x-form.input name="name" label="Nama User" :value="old('name', $user->name ?? '')" required="true" />

    <x-form.input name="email" label="Alamat Email" type="email" :value="old('email', $user->email ?? '')" required="true" />

    <div class="mb-4">
        <x-form.label for="role" value="Role Akses" required="true" />

        <select name="role"
            class="w-full border-gray-300 rounded shadow-sm focus:ring-indigo-500 bg-gray-50 cursor-not-allowed"
            readonly>
            <option value="admin" selected>Administrator (Staff Dinas)</option>
        </select>

        <p class="text-xs text-gray-500 mt-1">
            <i class="fas fa-info-circle"></i> Modul ini khusus untuk menambahkan akun Administrator.
        </p>
    </div>

    <div class="{{ $user ? 'border-t pt-4 mt-4 bg-gray-50 p-4 rounded' : 'mt-4' }}">

        @if ($user)
            <h4 class="text-sm font-bold text-gray-600 mb-2">Ganti Password (Opsional)</h4>
            <p class="text-xs text-gray-500 mb-3">Biarkan kosong jika tidak ingin mengubah password.</p>
        @endif

        <div class="grid grid-cols-2 gap-4">
            <x-form.input name="password" label="{{ $user ? 'Password Baru' : 'Password' }}" type="password"
                :required="!$user" />

            <x-form.input name="password_confirmation" label="{{ $user ? 'Ulangi Password' : 'Konfirmasi Password' }}"
                type="password" :required="!$user" />
        </div>
    </div>

    <button type="submit"
        class="mt-6 w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700 transition shadow-lg">
        {{ $user ? 'Simpan Perubahan' : 'Simpan Admin Baru' }}
    </button>
</form>
