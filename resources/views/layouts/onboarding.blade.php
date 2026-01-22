<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SIPMA Batola') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">

    <nav class="bg-white border-b border-gray-200 px-4 py-3 shadow-sm">
        <div class="max-w-7xl mx-auto flex justify-between items-center">

            <div class="flex items-center gap-2">
                <svg class="h-8 w-8 text-indigo-600" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                <span class="font-bold text-xl text-gray-800 tracking-tight">SIPMA Batola</span>
            </div>

            <div class="flex items-center gap-4">
                <span class="text-sm text-gray-500 hidden sm:inline">Masuk sebagai:
                    <strong>{{ Auth::user()->name }}</strong></span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="text-sm text-red-600 hover:text-red-800 font-medium hover:underline transition">
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <main class="py-10">
        {{ $slot }}
    </main>

</body>

</html>
