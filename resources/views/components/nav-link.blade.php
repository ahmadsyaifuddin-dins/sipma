@props(['active'])

@php
    // Style Dasar (Selalu ada)
    $baseClasses = 'flex items-center mt-2 py-3 px-5 mx-2 rounded-xl transition-all duration-200 group relative';

    // Logic Active vs Inactive
    $classes =
        $active ?? false
            ? // ACTIVE STATE: Gradient Indigo-Blue, Teks Putih, Shadow Glow, Sedikit membesar (scale)
                $baseClasses .
                ' bg-gradient-to-r from-indigo-600 to-blue-600 text-white shadow-lg shadow-indigo-500/30 transform scale-[1.02]'
            : // INACTIVE STATE: Teks Abu, Hover jadi Putih & Background agak terang
                $baseClasses . ' text-gray-400 hover:text-white hover:bg-gray-800 hover:shadow-md';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>

    <span
        class="{{ $active ? 'text-white' : 'text-gray-400 group-hover:text-indigo-400' }} transition-colors duration-200">
        {{ $icon ?? '' }}
    </span>

    <span class="mx-3 font-medium text-sm tracking-wide">
        {{ $slot }}
    </span>

    @if ($active)
        <span class="absolute right-3 w-1.5 h-1.5 rounded-full bg-white/50 animate-pulse"></span>
    @endif
</a>
