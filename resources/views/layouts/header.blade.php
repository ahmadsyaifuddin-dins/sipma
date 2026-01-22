<header class="z-10 py-4 bg-white shadow-sm border-b-4 border-indigo-600">
    <div class="flex items-center justify-between h-full px-6 mx-auto">

        <button @click="sidebarOpen = true"
            class="p-1 mr-5 -ml-1 rounded-md text-gray-500 focus:outline-none focus:shadow-outline-purple lg:hidden">
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>

        <div class="flex justify-center flex-1 lg:mr-32"></div>

        <ul class="flex items-center flex-shrink-0 space-x-6">
            <li class="relative">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button @click="dropdownOpen = ! dropdownOpen"
                            class="flex items-center gap-2 align-middle rounded-full focus:shadow-outline-purple focus:outline-none transition duration-150 ease-in-out"
                            type="button">

                            <div class="hidden md:block text-right">
                                <span class="block text-sm font-semibold text-gray-700 leading-tight">
                                    {{ Auth::user()->name }}
                                </span>
                                <span class="block text-xs text-gray-500">
                                    {{ Auth::user()->role ?? 'User' }}
                                </span>
                            </div>

                            @php
                                $user = Auth::user();
                                // Cek apakah path foto ada di database
                                if ($user->profile_photo_path) {
                                    // Panggil langsung dari public (tanpa storage/)
                                    $photoUrl = asset($user->profile_photo_path);
                                } else {
                                    // Jika null, pakai UI Avatars
                                    $name = urlencode($user->name);
                                    $photoUrl = "https://ui-avatars.com/api/?name={$name}&color=7F9CF5&background=EBF4FF";
                                }
                            @endphp

                            <img class="object-cover w-10 h-10 rounded-full border-2 border-indigo-100 shadow-sm"
                                src="{{ $photoUrl }}" alt="{{ $user->name }}" aria-hidden="true" />

                            <svg class="hidden md:block w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-dropdown-link href="{{ route('profile.edit') }}">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                {{ __('Profile') }}
                            </div>
                        </x-dropdown-link>

                        <div class="border-t border-gray-100"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="text-red-600 hover:text-red-800">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                    {{ __('Log out') }}
                                </div>
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </li>
        </ul>
    </div>
</header>
