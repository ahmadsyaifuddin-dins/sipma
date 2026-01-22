<x-app-layout>
    <x-slot name="header">Edit Pengguna</x-slot>

    <div class="p-6 bg-white rounded-lg shadow-md max-w-xl mx-auto">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <x-form.input name="name" label="Nama User" :value="$user->name" required="true" />
            <x-form.input name="email" label="Alamat Email" type="email" :value="$user->email" required="true" />

            <div class="mb-4">
                <x-form.label for="role" value="Role Akses" required="true" />
                <select name="role" class="w-full border-gray-300 rounded shadow-sm focus:ring-indigo-500">
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrator</option>
                    <option value="pemagang" {{ $user->role == 'pemagang' ? 'selected' : '' }}>Pemagang</option>
                </select>
            </div>

            <div class="border-t pt-4 mt-4 bg-gray-50 p-4 rounded">
                <h4 class="text-sm font-bold text-gray-600 mb-2">Ganti Password (Opsional)</h4>
                <p class="text-xs text-gray-500 mb-3">Biarkan kosong jika tidak ingin mengubah password.</p>

                <div class="grid grid-cols-2 gap-4">
                    <x-form.input name="password" label="Password Baru" type="password" />
                    <x-form.input name="password_confirmation" label="Ulangi Password" type="password" />
                </div>
            </div>

            <button type="submit" class="mt-4 w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700">Simpan
                Perubahan</button>
        </form>
    </div>
</x-app-layout>
