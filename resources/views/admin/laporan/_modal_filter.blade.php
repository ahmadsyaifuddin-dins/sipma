<div x-show="isOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50" style="display: none;">

    <div class="bg-white rounded-xl shadow-2xl w-full max-w-lg mx-4 overflow-hidden transform transition-all"
        @click.away="isOpen = false">

        <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-indigo-100 text-indigo-600 flex items-center justify-center">
                    <i class="fas fa-print"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-800" x-text="modalTitle"></h3>
                    <p class="text-xs text-gray-500">Konfigurasi Laporan</p>
                </div>
            </div>
            <button @click="isOpen = false" class="text-gray-400 hover:text-red-500 transition">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <form method="GET" :action="actionUrl" target="_blank">
            <div class="p-6">
                <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r mb-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-info-circle text-blue-500"></i>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-blue-800">Deskripsi</h3>
                            <div class="mt-1 text-sm text-blue-700">
                                <p x-text="modalDesc"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div x-show="showDateFilter" x-transition>
                    <h4 class="text-sm font-bold text-gray-700 mb-3 flex items-center gap-2">
                        <i class="far fa-calendar-alt text-gray-400"></i> Filter Periode
                    </h4>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1">Tanggal Mulai</label>
                            <input type="date" name="tgl_mulai"
                                class="w-full border-gray-300 rounded-lg text-sm focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1">Tanggal Selesai</label>
                            <input type="date" name="tgl_selesai"
                                class="w-full border-gray-300 rounded-lg text-sm focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                    </div>
                    <p class="text-xs text-gray-400 mt-2 italic">* Kosongkan tanggal untuk mencetak semua data.</p>
                </div>
            </div>

            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-end gap-3">
                <button type="button" @click="isOpen = false"
                    class="px-4 py-2 bg-white text-gray-700 border border-gray-300 rounded-lg text-sm font-medium hover:bg-gray-100 transition">
                    Batal
                </button>

                <button type="submit"
                    class="px-5 py-2 bg-gray-800 text-white rounded-lg text-sm font-medium hover:bg-gray-900 flex items-center gap-2 shadow-lg transition transform hover:scale-105">
                    <i class="fas fa-file-pdf"></i> Download PDF
                </button>
            </div>

        </form>
    </div>
</div>
