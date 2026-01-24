<x-app-layout>
    <x-slot name="header">Data Peserta Magang</x-slot>

    <div x-data="{
        open: false,
        isLoading: false,
        modalContent: '',
    
        // FUNGSI UNTUK FETCH DATA MODAL
        async openModal(url) {
            this.open = true;
            this.isLoading = true;
            this.modalContent = ''; // Reset konten
    
            try {
                let response = await fetch(url);
                if (response.ok) {
                    this.modalContent = await response.text();
                } else {
                    this.modalContent = '<div class=\'p-4 text-center text-red-500\'>Gagal memuat data.</div>';
                }
            } catch (error) {
                this.modalContent = '<div class=\'p-4 text-center text-red-500\'>Terjadi kesalahan jaringan.</div>';
            } finally {
                this.isLoading = false;
            }
        }
    }" class="p-4 bg-white rounded-lg shadow-xs relative">

        <form method="GET" action="{{ route('admin.peserta.index') }}"
            class="mb-6 flex flex-col md:flex-row gap-4 justify-between">
            <div class="flex items-center gap-2">
                <span class="text-sm text-gray-600">Filter Status:</span>
                <select name="status" onchange="this.form.submit()"
                    class="border-gray-300 rounded text-sm focus:ring-indigo-500">
                    <option value="">Semua</option>
                    <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>
            <div class="flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Nama / NIM..."
                    class="border-gray-300 rounded text-sm w-full md:w-64 focus:ring-indigo-500">
                <button type="submit"
                    class="bg-indigo-600 text-white px-4 py-2 rounded text-sm hover:bg-indigo-700">Cari</button>
            </div>
        </form>

        <div class="w-full overflow-x-auto border rounded-lg">
            <table class="w-full whitespace-no-wrap">
                <thead class="bg-gray-50 border-b">
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">
                        <th class="px-4 py-3 text-center" width="80">Foto</th>
                        <th class="px-4 py-3">Peserta</th>
                        <th class="px-4 py-3">Institusi</th>
                        <th class="px-4 py-3">Pembimbing & Ruangan</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y">
                    @forelse($data as $item)
                        <tr class="text-gray-700 hover:bg-gray-50 transition">
                            <td class="px-4 py-3 text-center">
                                @php
                                    $avatar = $item->foto_profil
                                        ? asset($item->foto_profil)
                                        : 'https://ui-avatars.com/api/?name=' .
                                            urlencode($item->nama_lengkap) .
                                            '&color=7F9CF5&background=EBF4FF';
                                @endphp
                                <div class="relative w-10 h-10 mx-auto">
                                    <img class="object-cover w-full h-full rounded-full border border-gray-200 shadow-sm hover:scale-150 transition-transform duration-200 cursor-pointer"
                                        src="{{ $avatar }}" alt="Avatar" {{-- KLIK FOTO JUGA BISA BUKA MODAL --}}
                                        @click="openModal('{{ route('admin.peserta.show', $item->id) }}')">
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="font-bold text-gray-800">{{ $item->nama_lengkap }}</div>
                                <div class="text-xs text-gray-500 font-mono bg-gray-100 inline-block px-1 rounded">
                                    {{ $item->nim_nisn }}
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <div class="font-semibold">{{ $item->institusi }}</div>
                                <span class="text-xs text-gray-400">{{ $item->jurusan }}</span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                @if ($item->penempatan)
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-user-tie text-gray-400 text-xs"></i>
                                        <span
                                            class="font-medium text-gray-700">{{ $item->penempatan->pembimbing->nama ?? '-' }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 mt-1">
                                        <i class="fas fa-door-open text-gray-400 text-xs"></i>
                                        <span class="text-xs text-gray-500">{{ $item->penempatan->ruangan }}</span>
                                    </div>
                                @else
                                    <span class="text-gray-400 italic text-xs">- Belum ditempatkan -</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-xs">
                                @php
                                    $colors = [
                                        'aktif' => 'bg-green-100 text-green-700 border-green-200',
                                        'pending' => 'bg-yellow-100 text-yellow-700 border-yellow-200',
                                        'selesai' => 'bg-indigo-100 text-indigo-700 border-indigo-200',
                                        'ditolak' => 'bg-red-100 text-red-700 border-red-200',
                                        'menunggu_nilai' => 'bg-blue-100 text-blue-700 border-blue-200',
                                    ];
                                    $class = $colors[$item->status] ?? 'bg-gray-100 text-gray-600';
                                @endphp
                                <span
                                    class="px-3 py-1 font-semibold leading-tight rounded-full border {{ $class }}">
                                    {{ str_replace('_', ' ', ucfirst($item->status)) }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex items-center justify-center gap-3">

                                    <button @click="openModal('{{ route('admin.peserta.show', $item->id) }}')"
                                        class="text-blue-500 hover:text-blue-700 transition" title="Lihat Detail">
                                        <i class="fas fa-eye text-lg"></i>
                                    </button>

                                    <a href="{{ route('admin.peserta.edit', $item->id) }}"
                                        class="text-yellow-500 hover:text-yellow-700 transition" title="Edit Data">
                                        <i class="fas fa-edit text-lg"></i>
                                    </a>

                                    <form action="{{ route('admin.peserta.destroy', $item->id) }}" method="POST"
                                        class="inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 transition"
                                            title="Hapus Data">
                                            <i class="fas fa-trash-alt text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center text-gray-500">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fas fa-inbox text-4xl text-gray-300 mb-2"></i>
                                    <p>Data peserta tidak ditemukan.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $data->links() }}
        </div>

        <div x-show="open" style="display: none;"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm p-4"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

            <div @click.away="open = false"
                class="bg-white rounded-xl shadow-2xl w-full max-w-2xl transform transition-all overflow-hidden"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 scale-95 translate-y-4">

                <div x-show="isLoading" class="p-12 text-center">
                    <i class="fas fa-circle-notch fa-spin text-4xl text-indigo-600 mb-4"></i>
                    <p class="text-gray-500 font-medium">Sedang memuat data...</p>
                </div>

                <div x-show="!isLoading" x-html="modalContent"></div>
            </div>
        </div>
    </div>
</x-app-layout>
