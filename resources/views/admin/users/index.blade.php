<x-app-layout>
    <x-slot name="header">Manajemen Pengguna Sistem</x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">

        <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
            <div>
                <h2 class="text-lg font-semibold text-gray-700">Daftar Akun Pengguna</h2>
                <p class="text-xs text-gray-500">Kelola akun Administrator dan Pemagang.</p>
            </div>

           <!--  <a href="{{ route('admin.users.create') }}"
                class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 shadow-md transition flex items-center gap-2">
                <i class="fas fa-user-plus"></i> Tambah Admin Baru
            </a> -->
        </div>

        <div class="w-full overflow-x-auto border rounded-lg">
            <table class="w-full whitespace-no-wrap">
                <thead class="bg-gray-50 border-b">
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">
                        <th class="px-4 py-3">Nama Pengguna</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3 text-center">Role</th>
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
                                        <p class="font-semibold text-gray-800">{{ $user->name }}</p>
                                        {{-- Tampilkan Info Peserta jika Pemagang --}}
                                        @if ($user->role == 'pemagang' && $user->peserta)
                                            <p class="text-xs text-gray-500">{{ $user->peserta->nim_nisn }}</p>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm font-mono text-gray-600">
                                {{ $user->email }}
                            </td>

                            {{-- KOLOM ROLE (LOGIKA BADGE) --}}
                            <td class="px-4 py-3 text-xs text-center">
                                @if ($user->role == 'admin')
                                    <span
                                        class="px-2 py-1 font-bold leading-tight text-purple-700 bg-purple-100 rounded-full border border-purple-200 shadow-sm">
                                        <i class="fas fa-user-shield mr-1"></i> Admin
                                    </span>
                                @else
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full border border-blue-200">
                                        <i class="fas fa-user-graduate mr-1"></i> Pemagang
                                    </span>
                                @endif
                            </td>

                            <td class="px-4 py-3 text-sm text-gray-500">
                                {{ $user->created_at->format('d M Y') }}
                            </td>

                            <td class="px-4 py-3 text-center">
                                <div class="flex items-center justify-center gap-3">

                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                        class="text-yellow-500 hover:text-yellow-700 transition" title="Edit Akun">
                                        <i class="fas fa-edit text-lg"></i>
                                    </a>

                                    @if (Auth::id() !== $user->id)
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                            class="inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 transition"
                                                title="Hapus Akun">
                                                <i class="fas fa-trash-alt text-lg"></i>
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-gray-300 cursor-not-allowed" title="Akun Anda Sendiri">
                                            <i class="fas fa-ban text-lg"></i>
                                        </span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-6 text-center text-gray-500">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-users-slash text-4xl text-gray-300 mb-2"></i>
                                    <span>Belum ada data pengguna.</span>
                                </div>
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
