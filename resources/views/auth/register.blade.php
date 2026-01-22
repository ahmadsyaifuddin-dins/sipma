<x-guest-layout>
    <div class="flex flex-col items-center mb-8">
        <img src="{{ asset('logo/kibar.png') }}" alt="Logo Kibar" class="h-20 w-auto drop-shadow-md mb-3">
        <h2 class="text-2xl font-bold text-indigo-900 text-center">Registrasi Peserta</h2>
        <p class="text-gray-500 text-sm mt-1">Buat akun untuk memulai magang</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-4 relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <i class="fas fa-user text-indigo-500"></i>
            </div>
            <input id="name" type="text" name="name" :value="old('name')" required autofocus
                class="w-full pl-11 pr-4 py-3 bg-white border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition shadow-sm placeholder-gray-400 text-sm"
                placeholder="Nama Lengkap" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mb-4 relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <i class="fas fa-envelope text-indigo-500"></i>
            </div>
            <input id="email" type="email" name="email" :value="old('email')" required
                class="w-full pl-11 pr-4 py-3 bg-white border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition shadow-sm placeholder-gray-400 text-sm"
                placeholder="Alamat Email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mb-4 relative" x-data="{ show: false }">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <i class="fas fa-lock text-indigo-500"></i>
            </div>
            <input :type="show ? 'text' : 'password'" id="password" name="password" required
                autocomplete="new-password"
                class="w-full pl-11 pr-11 py-3 bg-white border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition shadow-sm placeholder-gray-400 text-sm"
                placeholder="Kata Sandi Baru" />
            <button type="button" @click="show = !show"
                class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none">
                <i class="fas" :class="show ? 'fa-eye-slash' : 'fa-eye'"></i>
            </button>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mb-6 relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <i class="fas fa-check-circle text-indigo-500"></i>
            </div>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                class="w-full pl-11 pr-4 py-3 bg-white border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition shadow-sm placeholder-gray-400 text-sm"
                placeholder="Konfirmasi Kata Sandi" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <button type="submit"
            class="w-full bg-indigo-700 text-white font-bold py-3 rounded-xl hover:bg-indigo-800 transition duration-300 shadow-lg transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
            <i class="fas fa-user-plus"></i> {{ __('Daftar Sekarang') }}
        </button>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-500">Sudah punya akun?
                <a href="{{ route('login') }}" class="text-indigo-600 font-bold hover:underline">Masuk disini</a>
            </p>
        </div>
    </form>
</x-guest-layout>
