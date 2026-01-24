<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col h-auto">
    <div class="p-4 border-b bg-gray-50 flex justify-between items-center">
        <h4 class="font-bold text-gray-800 flex items-center gap-2">
            <i class="fas fa-bell text-yellow-500"></i> Aktivitas Terbaru
        </h4>
        <span class="text-xs text-gray-400">Real-time</span>
    </div>

    <div class="p-4 flex-grow overflow-y-auto max-h-[500px]">
        @if ($recent_activities->count() > 0)
            <div
                class="space-y-6 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-slate-300 before:to-transparent">

                @foreach ($recent_activities as $activity)
                    <div
                        class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                        <div
                            class="flex items-center justify-center w-10 h-10 rounded-full border border-white bg-white shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10">
                            <div class="w-6 h-6 rounded-full flex items-center justify-center {{ $activity['color'] }}">
                                <i class="{{ $activity['icon'] }} text-xs"></i>
                            </div>
                        </div>

                        <div
                            class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] p-3 rounded-xl border border-gray-100 shadow-sm bg-white hover:shadow-md transition duration-200">
                            <div class="flex flex-col">
                                <span class="text-xs font-bold text-gray-700 mb-1">
                                    {{ $activity['type'] == 'absensi' ? 'Absensi Masuk' : 'Pendaftaran' }}
                                </span>
                                <p class="text-xs text-gray-500 leading-snug">
                                    {{ $activity['message'] }}
                                </p>
                                <time class="text-[10px] text-gray-400 mt-2 flex items-center gap-1">
                                    <i class="far fa-clock"></i>
                                    {{ \Carbon\Carbon::parse($activity['time'])->diffForHumans() }}
                                </time>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        @else
            <div class="text-center py-8 text-gray-400">
                <i class="fas fa-sleep text-3xl mb-2"></i>
                <p class="text-sm">Belum ada aktivitas hari ini.</p>
            </div>
        @endif
    </div>

    <div class="p-3 bg-gray-50 border-t text-center">
        <a href="{{ route('admin.absensi.index') }}"
            class="text-xs text-indigo-600 hover:text-indigo-800 font-semibold hover:underline">
            Lihat Log Lengkap
        </a>
    </div>
</div>
