<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <span>Detail Pembimbing</span>
            <a href="{{ route('admin.pembimbing.index') }}" class="text-sm text-indigo-600 hover:underline">
                &larr; Kembali ke Daftar
            </a>
        </div>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="md:col-span-1">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-indigo-600 h-24 w-full"></div>
                <div class="px-6 pb-6 relative">
                    <div class="-mt-12 mb-4">
                        <div
                            class="h-24 w-24 rounded-full border-4 border-white bg-white shadow-md flex items-center justify-center text-indigo-600 text-4xl">
                            <i class="fas fa-user-tie"></i>
                        </div>
                    </div>

                    <h2 class="text-xl font-bold text-gray-800">{{ $pembimbing->nama }}</h2>
                    <p class="text-sm text-gray-500 mb-4">{{ $pembimbing->jabatan }}</p>

                    <div class="space-y-3 border-t pt-4">
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <i class="fas fa-id-badge w-5 text-center text-indigo-400"></i>
                            <span>NIP: {{ $pembimbing->nip }}</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <i class="fas fa-building w-5 text-center text-indigo-400"></i>
                            <span>{{ $pembimbing->bidang }}</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <i class="fab fa-whatsapp w-5 text-center text-green-500"></i>
                            <span>{{ $pembimbing->no_hp ?? '-' }}</span>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('admin.pembimbing.edit', $pembimbing->id) }}"
                            class="block w-full py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded text-center transition">
                            Edit Profil
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="md:col-span-2">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <h3 class="font-bold text-lg text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fas fa-users text-indigo-600"></i> Mahasiswa Bimbingan
                </h3>

                @if ($pembimbing->penempatan && $pembimbing->penempatan->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-600">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3">Nama Peserta</th>
                                    <th class="px-4 py-3">Institusi</th>
                                    <th class="px-4 py-3">Ruangan</th>
                                    <th class="px-4 py-3">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                @foreach ($pembimbing->penempatan as $penempatan)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3 font-medium text-gray-900">
                                            {{ $penempatan->peserta->nama_lengkap }}
                                        </td>
                                        <td class="px-4 py-3">{{ $penempatan->peserta->institusi }}</td>
                                        <td class="px-4 py-3">{{ $penempatan->ruangan }}</td>
                                        <td class="px-4 py-3">
                                            <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">
                                                {{ ucfirst($penempatan->peserta->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div
                        class="text-center py-8 text-gray-400 bg-gray-50 rounded-lg border border-dashed border-gray-300">
                        <i class="fas fa-user-graduate text-3xl mb-2"></i>
                        <p>Belum ada mahasiswa yang dibimbing.</p>
                    </div>
                @endif
            </div>
        </div>

    </div>
</x-app-layout>
