<div
    class="mb-8 p-6 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-xl shadow-lg text-white relative overflow-hidden">
    <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl"></div>
    <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl"></div>

    <div class="flex items-center justify-between relative z-10">
        <div>
            <h3 class="text-2xl font-bold">Halo, {{ Auth::user()->name }}! 👋</h3>
            <p class="mt-2 text-indigo-100 max-w-xl">
                Pantau statistik pendaftar dan aktivitas absensi peserta magang secara real-time di sini.
            </p>
        </div>
        <div class="hidden md:block opacity-90 transform rotate-12 mr-6">
            <i class="fas fa-chart-line text-6xl text-white/80"></i>
        </div>
    </div>
</div>
