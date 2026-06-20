<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-red-500 to-red-600 flex items-center justify-center shadow-lg shadow-red-200">
                <i class="fas fa-user-edit text-white text-lg"></i>
            </div>
            <div>
                <span class="text-xl font-bold text-gray-800">{{ __('Profile Information') }}</span>
                <p class="text-xs text-gray-400 font-normal">{{ __('Manage your personal details') }}</p>
            </div>
        </div>
    </x-slot>

    <x-slot name="description">
        <div class="flex items-start gap-2">
            <i class="fas fa-info-circle text-red-400 text-sm mt-0.5"></i>
            <p class="text-sm text-gray-500 leading-relaxed">{{ __('Update your account\'s profile information and email address.') }}</p>
        </div>
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null, hover: false}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" id="photo" class="hidden"
                            wire:model.live="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <div class="flex items-center gap-2 mb-3">
                    <i class="fas fa-camera text-red-500 text-sm"></i>
                    <x-label for="photo" value="{{ __('Profile Photo') }}" class="text-sm font-semibold text-gray-700" />
                </div>

                <div class="mt-2 flex flex-wrap items-center gap-8 p-6 bg-gradient-to-br from-white to-red-50/30 rounded-2xl border border-red-100/50 shadow-sm">
                    <!-- Current Profile Photo -->
                    <div class="relative group" x-show="! photoPreview">
                        <div class="relative">
                            <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                                 class="rounded-full w-28 h-28 object-cover border-4 border-white shadow-xl transition-all duration-300 group-hover:scale-105 group-hover:shadow-2xl">
                            <div class="absolute inset-0 rounded-full bg-gradient-to-tr from-red-600/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="absolute -bottom-1 -right-1 bg-gradient-to-br from-green-400 to-green-500 rounded-full w-6 h-6 border-2 border-white shadow-md flex items-center justify-center">
                            <i class="fas fa-check text-white text-[10px]"></i>
                        </div>
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div class="relative group" x-show="photoPreview" style="display: none;">
                        <div class="relative">
                            <span class="block rounded-full w-28 h-28 bg-cover bg-no-repeat bg-center border-4 border-white shadow-xl transition-all duration-300 group-hover:scale-105 group-hover:shadow-2xl"
                                  x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                            </span>
                            <div class="absolute inset-0 rounded-full bg-gradient-to-tr from-red-600/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="absolute -bottom-1 -right-1 bg-gradient-to-br from-yellow-400 to-orange-400 rounded-full w-6 h-6 border-2 border-white shadow-md flex items-center justify-center">
                            <i class="fas fa-spinner fa-spin text-white text-[10px]"></i>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-3">
                        <button type="button"
                            class="relative overflow-hidden px-5 py-2.5 rounded-xl bg-white border-2 border-red-200 text-red-600 hover:bg-red-50 hover:border-red-300 hover:shadow-md transition-all duration-200 text-sm font-medium group"
                            x-on:click.prevent="$refs.photo.click()">
                            <span class="relative z-10 flex items-center gap-2">
                                <i class="fas fa-upload text-red-500 group-hover:scale-110 transition-transform duration-200"></i>
                                {{ __('Choose Photo') }}
                            </span>
                            <span class="absolute inset-0 bg-gradient-to-r from-red-50/0 via-red-50/50 to-red-50/0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>
                        </button>

                        @if ($this->user->profile_photo_path)
                            <button type="button"
                                class="px-5 py-2.5 rounded-xl bg-white border-2 border-gray-200 text-gray-500 hover:bg-red-50 hover:text-red-600 hover:border-red-200 transition-all duration-200 hover:shadow-md text-sm font-medium group"
                                wire:click="deleteProfilePhoto">
                                <span class="flex items-center gap-2">
                                    <i class="fas fa-trash-alt text-gray-400 group-hover:text-red-500 transition-colors duration-200"></i>
                                    {{ __('Remove') }}
                                </span>
                            </button>
                        @endif
                    </div>
                </div>

                <x-input-error for="photo" class="mt-3 text-sm" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <div class="flex items-center gap-2 mb-2">
                <i class="fas fa-user text-red-500 text-sm"></i>
                <x-label for="name" value="{{ __('Full Name') }}" class="text-sm font-semibold text-gray-700">
                    <span class="flex items-center gap-1">
                        {{ __('Full Name') }}
                        <span class="text-red-500 text-lg">*</span>
                    </span>
                </x-label>
            </div>
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="fas fa-user text-gray-400 group-focus-within:text-red-500 transition-colors duration-200 text-sm"></i>
                </div>
                <x-input id="name" type="text"
                    class="mt-0 block w-full pl-11 pr-4 py-3 rounded-xl border-2 border-gray-200 focus:border-red-400 focus:ring-4 focus:ring-red-100 transition-all duration-200 shadow-sm hover:shadow-md group-focus-within:shadow-md"
                    wire:model="state.name" required autocomplete="name" placeholder="Enter your full name" />
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none opacity-0 group-focus-within:opacity-100 transition-opacity duration-200">
                    <i class="fas fa-check-circle text-green-500 text-sm"></i>
                </div>
            </div>
            <x-input-error for="name" class="mt-2 text-sm" />
            <p class="mt-1 text-xs text-gray-400 flex items-center gap-1">
                <i class="fas fa-info-circle text-gray-300"></i>
                {{ __('Enter your full name as it appears on official documents') }}
            </p>
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <div class="flex items-center gap-2 mb-2">
                <i class="fas fa-envelope text-red-500 text-sm"></i>
                <x-label for="email" value="{{ __('Email Address') }}" class="text-sm font-semibold text-gray-700">
                    <span class="flex items-center gap-1">
                        {{ __('Email Address') }}
                        <span class="text-red-500 text-lg">*</span>
                    </span>
                </x-label>
            </div>
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="fas fa-envelope text-gray-400 group-focus-within:text-red-500 transition-colors duration-200 text-sm"></i>
                </div>
                <x-input id="email" type="email"
                    class="mt-0 block w-full pl-11 pr-4 py-3 rounded-xl border-2 border-gray-200 focus:border-red-400 focus:ring-4 focus:ring-red-100 transition-all duration-200 shadow-sm hover:shadow-md group-focus-within:shadow-md"
                    wire:model="state.email" required autocomplete="username" placeholder="Enter your email address" />
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none opacity-0 group-focus-within:opacity-100 transition-opacity duration-200">
                    <i class="fas fa-check-circle text-green-500 text-sm"></i>
                </div>
            </div>
            <x-input-error for="email" class="mt-2 text-sm" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <div class="mt-4 rounded-2xl border-2 border-red-100 bg-gradient-to-br from-red-50/80 to-white p-5 shadow-md">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 mt-1">
                            <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                                <i class="fas fa-exclamation-triangle text-red-500 text-sm"></i>
                            </div>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-800 flex items-center gap-2">
                                <span class="text-red-600">{{ __('Email Unverified') }}</span>
                                <span class="w-1.5 h-1.5 rounded-full bg-gray-300"></span>
                                <span class="font-normal text-gray-500 text-xs">{{ __('Action Required') }}</span>
                            </p>
                            <p class="mt-1 text-sm text-gray-600">{{ __('Your email address needs verification to access all features.') }}</p>
                            <button type="button"
                                class="mt-2 inline-flex items-center gap-2 text-sm font-medium text-red-600 hover:text-red-700 hover:underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 rounded-lg px-3 py-1.5 hover:bg-red-50 transition-colors duration-200"
                                wire:click.prevent="sendEmailVerification">
                                <i class="fas fa-paper-plane"></i>
                                {{ __('Resend Verification Email') }}
                            </button>

                            @if ($this->verificationLinkSent)
                                <div class="mt-3 p-3 rounded-xl bg-green-50 border border-green-200 flex items-center gap-3">
                                    <i class="fas fa-check-circle text-green-500 text-sm"></i>
                                    <p class="text-sm font-medium text-green-700">
                                        {{ __('Verification link sent successfully!') }}
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Additional Info Section -->
        <div class="col-span-6 sm:col-span-4 mt-4">
            <div class="p-4 rounded-xl bg-gradient-to-br from-gray-50 to-white border border-gray-100">
                <div class="flex items-center gap-2 mb-2">
                    <i class="fas fa-shield-alt text-red-400 text-sm"></i>
                    <p class="text-xs text-gray-500">
                        <span class="font-medium text-gray-700">{{ __('Privacy Notice') }}</span>
                        {{ __('Your information is secure and will not be shared with third parties.') }}
                    </p>
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <div class="flex items-center gap-4 bg-gradient-to-r from-red-50/30 to-transparent px-6 py-4 rounded-2xl -mx-4 -mb-4">
            <x-action-message class="text-sm font-medium text-green-600 flex items-center gap-2" on="saved">
                <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center">
                    <i class="fas fa-check text-green-500 text-sm"></i>
                </div>
                {{ __('Saved successfully!') }}
            </x-action-message>

            <div class="flex-1"></div>

            <x-button wire:loading.attr="disabled" wire:target="photo"
                class="relative overflow-hidden !bg-gradient-to-r !from-red-600 !to-red-700 hover:!from-red-700 hover:!to-red-800 focus:!ring-4 focus:!ring-red-200 !text-white shadow-lg hover:shadow-xl transition-all duration-200 px-8 py-3 rounded-xl text-sm font-semibold group">
                <span class="relative z-10 flex items-center gap-3">
                    <i class="fas fa-save group-hover:scale-110 transition-transform duration-200"></i>
                    {{ __('Save Changes') }}
                </span>
                <span class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/15 to-white/0 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></span>
                <span class="absolute inset-0 bg-gradient-to-b from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
            </x-button>
        </div>
    </x-slot>
</x-form-section>