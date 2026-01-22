<section>
    <header class="flex items-start gap-4 border-b border-gray-100 pb-4 mb-6">
        <div class="p-3 bg-indigo-50 text-indigo-600 rounded-lg">
            <i class="fas fa-user-edit text-xl"></i>
        </div>
        <div>
            <h2 class="text-lg font-bold text-gray-900">
                {{ __('Informasi Profil') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600">
                {{ __('Perbarui foto profil, nama, dan alamat email akun Anda.') }}
            </p>
        </div>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
            <input type="file" class="hidden" x-ref="photo" name="photo"
                @change="
                                photoName = $refs.photo.files[0].name;
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    photoPreview = e.target.result;
                                };
                                reader.readAsDataURL($refs.photo.files[0]);
                        " />

            <x-input-label for="photo" value="{{ __('Foto Baru') }}" />

            <div class="mt-2 flex items-center gap-4">
                <div x-show="! photoPreview">
                    <img src="{{ $user->profile_photo_path ? asset($user->profile_photo_path) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&color=7F9CF5&background=EBF4FF' }}"
                        alt="{{ $user->name }}" class="rounded-full h-20 w-20 object-cover border-2 border-gray-200">
                </div>

                <div x-show="photoPreview" style="display: none;">
                    <span
                        class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center border-2 border-indigo-400"
                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    <i class="fas fa-camera mr-2"></i> {{ __('Pilih Foto') }}
                </x-secondary-button>

                @if ($user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Hapus') }}
                    </x-secondary-button>
                @endif
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('photo')" />
        </div>

        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <div class="relative mt-1">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-user text-gray-400"></i>
                </div>
                <x-text-input id="name" name="name" type="text" class="pl-10 block w-full" :value="old('name', $user->name)"
                    required autofocus autocomplete="name" />
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email Address')" />
            <div class="relative mt-1">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-envelope text-gray-400"></i>
                </div>
                <x-text-input id="email" name="email" type="email" class="pl-10 block w-full" :value="old('email', $user->email)"
                    required autocomplete="username" />
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="mt-2 p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                    <p class="text-sm text-yellow-800">
                        {{ __('Alamat email Anda belum diverifikasi.') }}
                        <button form="send-verification"
                            class="underline text-sm text-yellow-600 hover:text-yellow-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
            <x-primary-button class="gap-2">
                <i class="fas fa-save"></i> {{ __('Simpan Perubahan') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 font-bold flex items-center gap-1"><i class="fas fa-check-circle"></i>
                    {{ __('Berhasil disimpan.') }}</p>
            @endif
        </div>
    </form>
</section>
