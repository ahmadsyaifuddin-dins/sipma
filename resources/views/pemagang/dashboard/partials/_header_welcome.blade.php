<div
    class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col md:flex-row justify-between items-center">
    <div>
        <h3 class="text-2xl font-bold text-gray-800">
            Halo, {{ Auth::user()->name }} 👋
        </h3>
        <p class="text-gray-500 mt-1">Semoga harimu menyenangkan!</p>
    </div>
    <div class="mt-4 md:mt-0 px-4 py-2 bg-indigo-50 text-indigo-700 rounded-lg text-right border border-indigo-100">
        <p class="text-xs uppercase font-bold tracking-wider opacity-70">Identitas Peserta</p>
        <p class="font-mono font-bold text-lg">{{ $peserta->nim_nisn }}</p>
    </div>
</div>
