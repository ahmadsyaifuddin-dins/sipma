<div class="grid gap-6 mb-8 md:grid-cols-4">

    <div
        class="flex flex-col p-4 bg-white rounded-xl shadow-sm hover:shadow-md transition duration-300 border border-gray-100">
        <div class="flex items-center">
            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full">
                <i class="fas fa-users text-xl"></i>
            </div>
            <div>
                <p class="mb-1 text-sm font-medium text-gray-600">Peserta Aktif</p>
                <p class="text-2xl font-bold text-gray-800">
                    {{ $total_peserta ?? 0 }}
                </p>
            </div>
        </div>
        <div class="mt-4 border-t pt-3">
            <a href="{{ route('admin.peserta.index') }}"
                class="text-sm text-blue-600 hover:text-blue-800 font-medium flex items-center group">
                Lihat semua data <i class="fas fa-arrow-right ml-1 transform group-hover:translate-x-1 transition"></i>
            </a>
        </div>
    </div>

    <div
        class="flex flex-col p-4 bg-white rounded-xl shadow-sm hover:shadow-md transition duration-300 border border-gray-100">
        <div class="flex items-center">
            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full">
                <i class="fas fa-user-clock text-xl"></i>
            </div>
            <div>
                <p class="mb-1 text-sm font-medium text-gray-600">Menunggu Verifikasi</p>
                <p class="text-2xl font-bold text-gray-800">
                    {{ $peserta_pending ?? 0 }}
                </p>
            </div>
        </div>
        <div class="mt-4 border-t pt-3">
            <a href="{{ route('admin.verifikasi.index') }}"
                class="text-sm text-orange-600 hover:text-orange-800 font-medium flex items-center group">
                Proses pengajuan <i class="fas fa-arrow-right ml-1 transform group-hover:translate-x-1 transition"></i>
            </a>
        </div>
    </div>

    <div
        class="flex flex-col p-4 bg-white rounded-xl shadow-sm hover:shadow-md transition duration-300 border border-gray-100">
        <div class="flex items-center">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full">
                <i class="fas fa-chalkboard-teacher text-xl"></i>
            </div>
            <div>
                <p class="mb-1 text-sm font-medium text-gray-600">Total Pembimbing</p>
                <p class="text-2xl font-bold text-gray-800">
                    {{ $total_pembimbing ?? 0 }}
                </p>
            </div>
        </div>
        <div class="mt-4 border-t pt-3">
            <a href="{{ route('admin.pembimbing.index') }}"
                class="text-sm text-green-600 hover:text-green-800 font-medium flex items-center group">
                Kelola pembimbing <i class="fas fa-arrow-right ml-1 transform group-hover:translate-x-1 transition"></i>
            </a>
        </div>
    </div>

    <div
        class="flex flex-col p-4 bg-white rounded-xl shadow-sm hover:shadow-md transition duration-300 border border-gray-100">
        <div class="flex items-center">
            <div class="p-3 mr-4 text-purple-500 bg-purple-100 rounded-full">
                <i class="fas fa-clipboard-check text-xl"></i>
            </div>
            <div>
                <p class="mb-1 text-sm font-medium text-gray-600">Perlu Dinilai</p>
                <p class="text-2xl font-bold text-gray-800">
                    {{ $total_menunggu_nilai ?? 0 }}
                </p>
            </div>
        </div>
        <div class="mt-4 border-t pt-3">
            <a href="{{ route('admin.evaluasi.index') }}"
                class="text-sm text-purple-600 hover:text-purple-800 font-medium flex items-center group">
                Lihat data evaluasi <i
                    class="fas fa-arrow-right ml-1 transform group-hover:translate-x-1 transition"></i>
            </a>
        </div>
    </div>

</div>
