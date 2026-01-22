<x-app-layout>
    <x-slot name="header">Tambah Pengguna Baru</x-slot>

    <div class="p-6 bg-white rounded-lg shadow-md max-w-xl mx-auto">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            <x-form.input name="name" label="Nama User" required="true" />
            <x-form.input name="email" label="Alamat Email" type="email" required="true" />

            <div class="mb-4">
                <x-form.label for="role" value="Role Akses" required="true" />
                <select name="role" class="w-full border-gray-300 rounded shadow-sm focus:ring-indigo-500">
                    <option value="admin">Administrator (Staff Dinas)</option>
                    <option value="pemagang">Pemagang (Mahasiswa)</option>
                </select>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <x-form.input name="password" label="Password" type="password" required="true" />
                <x-form.input name="password_confirmation" label="Konfirmasi Password" type="password"
                    required="true" />
            </div>

            <button type="submit" class="mt-4 w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700">Simpan
                User</button>
        </form>
    </div>
</x-app-layout>
