<x-app-layout>
    <x-slot name="header">Manajemen Pengguna</x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-700">Daftar Akun Login</h2>
            <a href="{{ route('admin.users.create') }}"
                class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 text-sm">
                + Tambah Admin / User
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 text-green-700 bg-green-100 p-3 rounded">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="mb-4 text-red-700 bg-red-100 p-3 rounded">{{ session('error') }}</div>
        @endif

        <div class="w-full overflow-hidden border rounded-lg">
            <table class="w-full whitespace-no-wrap">
                <thead class="bg-gray-50 border-b">
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">
                        <th class="px-4 py-3">Nama Pengguna</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Role</th>
                        <th class="px-4 py-3">Dibuat Pada</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y">
                    @foreach ($users as $user)
                        <tr class="text-gray-700 hover:bg-gray-50">
                            <td class="px-4 py-3 font-semibold">{{ $user->name }}</td>
                            <td class="px-4 py-3 text-sm">{{ $user->email }}</td>
                            <td class="px-4 py-3 text-xs">
                                @if ($user->role === 'admin')
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-white bg-purple-600 rounded-full">Admin</span>
                                @else
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-200 rounded-full">Pemagang</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}
                            </td>
                            <td class="px-4 py-3 text-center text-sm">
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                        class="text-yellow-600 hover:underline">Edit</a>

                                    @if ($user->id !== Auth::id())
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin hapus user ini? Data terkait (Peserta) juga akan terhapus!');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>
