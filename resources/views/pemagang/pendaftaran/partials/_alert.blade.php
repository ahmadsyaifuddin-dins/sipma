@if ($errors->any())
    <div class="mb-8 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-xl shadow-sm animate-pulse">
        <div class="flex items-start gap-3">
            <div class="flex-shrink-0">
                <i class="fas fa-exclamation-triangle text-red-500 text-xl mt-0.5"></i>
            </div>
            <div class="w-full">
                <h3 class="text-sm font-bold text-red-800">Gagal Menyimpan Data!</h3>
                <p class="text-xs text-red-600 mt-1 mb-2">Silakan perbaiki kesalahan berikut:</p>
                <ul
                    class="list-disc list-inside text-sm text-red-700 space-y-1 bg-white/50 p-2 rounded-lg border border-red-100">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
