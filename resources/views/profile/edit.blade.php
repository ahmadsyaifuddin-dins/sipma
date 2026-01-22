<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengaturan Akun') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <div class="md:col-span-1">
                    <div class="bg-white shadow rounded-2xl p-6 text-center border border-gray-100 sticky top-24">
                        <div class="relative inline-block mb-4">
                            <img class="h-32 w-32 rounded-full object-cover border-4 border-indigo-50 shadow-md mx-auto"
                                src="{{ Auth::user()->profile_photo_path ? asset(Auth::user()->profile_photo_path) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&color=7F9CF5&background=EBF4FF' }}"
                                alt="{{ Auth::user()->name }}">
                            <div class="absolute bottom-2 right-2 bg-green-500 w-5 h-5 rounded-full border-2 border-white"
                                title="Online"></div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">{{ Auth::user()->name }}</h3>
                        <p class="text-sm text-gray-500 mb-4">{{ Auth::user()->email }}</p>

                        <div
                            class="inline-flex items-center px-3 py-1 bg-indigo-50 text-indigo-700 rounded-full text-xs font-bold uppercase tracking-wide">
                            {{ Auth::user()->role ?? 'User' }}
                        </div>

                        <hr class="my-6 border-gray-100">

                        <div class="text-left space-y-3">
                            <p class="text-xs font-bold text-gray-400 uppercase">Bergabung Sejak</p>
                            <p class="text-sm text-gray-700 flex items-center gap-2">
                                <i class="fas fa-calendar-alt text-gray-400"></i>
                                {{ Auth::user()->created_at->translatedFormat('d F Y') }}
                        </div>
                    </div>
                </div>

                <div class="md:col-span-2 space-y-6">

                    <div class="p-4 sm:p-8 bg-white shadow rounded-2xl border border-gray-100">
                        <div class="max-w-xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <div class="p-4 sm:p-8 bg-white shadow rounded-2xl border border-gray-100">
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <div class="p-4 sm:p-8 bg-white shadow rounded-2xl border border-red-100">
                        <div class="max-w-xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
