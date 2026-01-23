<div class="bg-white rounded-xl shadow-sm border border-gray-100">
    <div class="bg-gray-50 px-6 py-4 border-b border-gray-100">
        <h3 class="font-bold text-gray-700 flex items-center gap-2">
            <i class="fas fa-comment-dots text-indigo-500"></i> Catatan Pembimbing
        </h3>
    </div>
    <div class="p-6">
        <textarea name="catatan_pembimbing" rows="5"
            class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 shadow-sm"
            placeholder="Tuliskan evaluasi deskriptif, saran, atau kesan pesan untuk peserta...">{{ $evaluasi->catatan_pembimbing ?? '' }}</textarea>
        <p class="text-xs text-gray-400 mt-2 text-right">Opsional, tapi sangat disarankan.</p>
    </div>
</div>
