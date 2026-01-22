<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SIPMA - Diskominfo Batola') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-50 text-gray-900">

    <nav class="bg-white border-b border-gray-200 px-4 py-3 shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">

            <div class="flex items-center gap-3">
                <img src="{{ asset('logo/kibar.png') }}" alt="Logo Diskominfo" class="h-10 w-auto object-contain">

                <div class="flex flex-col">
                    <span class="font-bold text-lg text-gray-800 leading-none tracking-tight">SIPMA</span>
                    <span class="text-[10px] text-gray-500 font-bold uppercase tracking-wider">Diskominfo Batola</span>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <div class="hidden sm:flex flex-col items-end">
                    <span class="text-[10px] text-gray-400 uppercase font-bold">Masuk sebagai</span>
                    <span class="text-sm font-semibold text-gray-700">{{ Auth::user()->name }}</span>
                </div>

                <div class="hidden sm:block h-8 w-px bg-gray-200"></div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="group flex items-center gap-2 text-sm text-gray-500 hover:text-red-600 font-medium transition duration-150 ease-in-out"
                        title="Keluar Aplikasi">
                        <span class="hidden sm:inline group-hover:underline">Keluar</span>
                        <div class="p-2 bg-gray-100 rounded-full group-hover:bg-red-50 transition">
                            <i class="fas fa-sign-out-alt"></i>
                        </div>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <main class="py-12 px-4 sm:px-6 lg:px-8 min-h-[calc(100vh-73px)] flex flex-col items-center">
        <div class="w-full max-w-5xl">
            {{ $slot }}
        </div>

        <div class="mt-12 text-center text-sm text-gray-400">
            &copy; {{ date('Y') }} Dinas Komunikasi dan Informatika Barito Kuala.
        </div>
    </main>

</body>

</html>
