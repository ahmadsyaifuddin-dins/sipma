<x-guest-layout>
    <div class="flex flex-col items-center mb-8">
        <img src="{{ asset('logo/kibar.png') }}" alt="Logo Kibar"
            class="h-24 w-auto drop-shadow-md mb-4 hover:scale-105 transition duration-300">

        <h2 class="text-2xl font-bold text-indigo-900 text-center">Login Sistem PKL</h2>
        <p class="text-gray-500 text-sm mt-1">Silakan masuk ke akun Anda</p>
    </div>

    <div x-data="{ activeTab: 'pemagang' }" class="flex bg-gray-100 p-1 rounded-lg mb-6">

        <button type="button" @click="activeTab = 'pemagang'"
            :class="activeTab === 'pemagang'
                ?
                'bg-indigo-600 text-white shadow-sm' :
                'text-gray-500 hover:text-gray-700 bg-transparent'"
            class="flex-1 py-2 text-sm font-bold rounded-md transition-all duration-200">
            Pemagang
        </button>

        <button type="button" @click="activeTab = 'admin'"
            :class="activeTab === 'admin'
                ?
                'bg-indigo-600 text-white shadow-sm' :
                'text-gray-500 hover:text-gray-700 bg-transparent'"
            class="flex-1 py-2 text-sm font-bold rounded-md transition-all duration-200">
            Admin
        </button>

    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4 relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <i class="fas fa-envelope text-indigo-500"></i>
            </div>
            <input id="email" type="email" name="email" :value="old('email')" required autofocus
                class="w-full pl-11 pr-4 py-3 bg-white border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition shadow-sm placeholder-gray-400 text-sm"
                placeholder="Alamat Email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mb-4 relative" x-data="{ show: false }">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <i class="fas fa-lock text-indigo-500"></i>
            </div>
            <input :type="show ? 'text' : 'password'" id="password" name="password" required
                autocomplete="current-password"
                class="w-full pl-11 pr-11 py-3 bg-white border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition shadow-sm placeholder-gray-400 text-sm"
                placeholder="Kata Sandi" />

            <button type="button" @click="show = !show"
                class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none">
                <i class="fas" :class="show ? 'fa-eye-slash' : 'fa-eye'"></i>
            </button>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mb-6">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-xs text-gray-600">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-xs text-indigo-600 hover:text-indigo-800 font-semibold hover:underline"
                    href="{{ route('password.request') }}">
                    {{ __('Lupa Password?') }}
                </a>
            @endif
        </div>

        <button type="submit"
            class="w-full bg-indigo-700 text-white font-bold py-3 rounded-xl hover:bg-indigo-800 transition duration-300 shadow-lg transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
            <i class="fas fa-sign-in-alt"></i> {{ __('Masuk Sekarang') }}
        </button>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-500">Belum punya akun?
                <a href="{{ route('register') }}" class="text-indigo-600 font-bold hover:underline">Daftar Magang</a>
            </p>
        </div>

        <div class="mt-4 text-center">
            <a href="/" class="text-xs text-gray-400 hover:text-gray-600 flex items-center justify-center gap-1">
                <i class="fas fa-arrow-left"></i> Kembali ke Beranda
            </a>
        </div>
    </form>
</x-guest-layout>
