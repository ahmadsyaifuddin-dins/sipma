<x-app-layout>
    <x-slot name="header">Manajemen Administrator</x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">

        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-lg font-semibold text-gray-700">Daftar Akun Admin</h2>
                <p class="text-xs text-gray-500">Kelola akun staff yang memiliki akses ke panel admin.</p>
            </div>

            <a href="{{ route('admin.users.create') }}"
                class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 shadow-md transition flex items-center gap-2">
                <i class="fas fa-user-plus"></i> Tambah Admin
            </a>
        </div>

        <div class="w-full overflow-x-auto border rounded-lg">
            <table class="w-full whitespace-no-wrap">
                <thead class="bg-gray-50 border-b">
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">
                        <th class="px-4 py-3">Nama Pengguna</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Role</th>
                        <th class="px-4 py-3">Terdaftar</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y">
                    @forelse($users as $user)
                        <tr class="text-gray-700 hover:bg-gray-50 transition">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full border border-gray-200"
                                            src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&color=7F9CF5&background=EBF4FF"
                                            alt="" />
                                    </div>
                                    <div>
                                        <p class="font-semibold">{{ $user->name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $user->email }}
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-purple-700 bg-purple-100 rounded-full border border-purple-200">
                                    Administrator
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $user->created_at->format('d M Y') }}
                            </td>

                            <td class="px-4 py-3 text-center">
                                <div class="flex items-center justify-center gap-3">

                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                        class="text-yellow-500 hover:text-yellow-700 transition" title="Edit Admin">
                                        <i class="fas fa-edit text-lg"></i>
                                    </a>

                                    @if (Auth::id() !== $user->id)
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                            class="inline"
                                            onsubmit="return confirm('Yakin ingin menghapus Admin {{ $user->name }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 transition"
                                                title="Hapus Admin">
                                                <i class="fas fa-trash-alt text-lg"></i>
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-gray-300 cursor-not-allowed" title="Akun Sendiri">
                                            <i class="fas fa-trash-alt text-lg"></i>
                                        </span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-6 text-center text-gray-500">
                                Tidak ada data administrator.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>
