<div class="delete-account-wrapper" x-data="deleteAccount()">
    <x-action-section>
        <x-slot name="title">
            <div class="flex items-center space-x-3">
                <div class="w-9 h-9 rounded-xl bg-red-600 flex items-center justify-center shadow-lg shadow-red-200">
                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <span class="text-base font-bold text-gray-900">{{ __('Delete Account') }}</span>
                    <p class="text-xs text-gray-500">Permanent action</p>
                </div>
            </div>
        </x-slot>

        <x-slot name="description">
            <span class="text-sm text-red-600 font-semibold flex items-center gap-2">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-red-600"></span>
                </span>
                {{ __('Permanently delete your account and all associated data') }}
            </span>
        </x-slot>

        <x-slot name="content">
            <!-- Main Danger Card -->
            <div class="max-w-2xl bg-white rounded-xl border border-red-200 overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 danger-card">
                <!-- Card Header -->
                <div class="relative px-5 py-3.5 bg-red-50 border-b border-red-200">
                    <div class="absolute top-0 left-0 right-0 h-0.5 bg-red-600"></div>
                    
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2.5">
                            <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center">
                                <svg class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <span class="text-sm font-semibold text-gray-800">Warning: Permanent Action</span>
                                <p class="text-xs text-gray-500">This action cannot be reversed</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="relative flex items-center gap-2 px-3 py-1 bg-red-600 text-white text-xs font-bold rounded-full">
                                <span class="relative flex h-1.5 w-1.5">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-white"></span>
                                </span>
                                Critical
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="p-5 space-y-4">
                    <!-- Description -->
                    <p class="text-sm text-gray-700 leading-relaxed">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                    </p>

                    <!-- Info Badges -->
                    <div class="flex flex-wrap items-center gap-3 text-xs">
                        <span class="flex items-center gap-1.5 text-red-600 font-medium">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                            Irreversible
                        </span>
                        <span class="w-px h-3 bg-red-200"></span>
                        <span class="flex items-center gap-1.5 text-gray-600">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                            </svg>
                            Password required
                        </span>
                        <span class="w-px h-3 bg-red-200"></span>
                        <span class="flex items-center gap-1.5 text-gray-600">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812z" clip-rule="evenodd"/>
                            </svg>
                            Data loss
                        </span>
                    </div>

                    <!-- Divider -->
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t-2 border-red-200 border-dashed"></div>
                        </div>
                        <div class="relative flex justify-center">
                            <span class="px-3 text-xs font-medium text-red-600 bg-white">Proceed with extreme caution</span>
                        </div>
                    </div>

                    <!-- Delete Button Section -->
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 bg-red-50 rounded-lg px-4 py-3.5 border-2 border-red-200">
                        <div class="flex items-center space-x-3">
                            <div class="w-9 h-9 rounded-full bg-red-100 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-red-700">Delete this account</p>
                                <p class="text-xs text-red-600">All data will be permanently removed</p>
                            </div>
                        </div>
                        
                        <div class="relative group/tooltip w-full sm:w-auto">
                            <button 
                                wire:click="confirmUserDeletion" 
                                wire:loading.attr="disabled"
                                class="delete-btn w-full sm:w-auto inline-flex items-center justify-center px-6 py-2.5 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold rounded-lg shadow-md hover:shadow-lg hover:shadow-red-200 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed"
                            >
                                <span wire:loading.remove class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ __('Delete Account') }}
                                    <kbd class="hidden sm:inline-block px-1.5 py-0.5 bg-white/20 rounded text-xs">Enter</kbd>
                                </span>
                                <span wire:loading class="flex items-center gap-2">
                                    <svg class="animate-spin w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    {{ __('Deleting...') }}
                                </span>
                            </button>
                            <!-- Tooltip -->
                            <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 px-3 py-1.5 bg-gray-900 text-white text-xs rounded-lg opacity-0 group-hover/tooltip:opacity-100 transition-all duration-200 pointer-events-none whitespace-nowrap shadow-lg">
                                This action cannot be undone
                                <div class="absolute top-full left-1/2 -translate-x-1/2 -mt-1 border-4 border-transparent border-t-gray-900"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Footer -->
                <div class="px-5 py-2.5 bg-gray-50 border-t border-gray-100 flex flex-wrap items-center justify-between gap-2">
                    <div class="flex items-center gap-3 text-xs text-gray-500">
                        <span class="flex items-center gap-1">
                            <svg class="w-3.5 h-3.5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                            {{ __('This action is permanent') }}
                        </span>
                        <span class="w-px h-3 bg-gray-300"></span>
                        <span class="flex items-center gap-1">
                            <svg class="w-3.5 h-3.5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            {{ __('Requires confirmation') }}
                        </span>
                    </div>
                    <span class="text-xs font-medium text-red-400 animate-pulse">⚠️ Last chance to cancel</span>
                </div>
            </div>

            <!-- Premium Confirmation Modal -->
            <x-dialog-modal wire:model.live="confirmingUserDeletion" class="!max-w-md">
                <div class="relative">
                    <!-- Decorative Top Bar -->
                    <div class="absolute top-0 left-0 right-0 h-1 bg-red-600 rounded-t-2xl"></div>
                    
                    <x-slot name="title">
                        <div class="flex items-center space-x-3 pt-1">
                            <div class="w-10 h-10 rounded-xl bg-red-600 flex items-center justify-center shadow-lg shadow-red-200">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-900">{{ __('Delete Account') }}</h3>
                                <p class="text-xs text-gray-500">Confirm permanent deletion</p>
                            </div>
                        </div>
                    </x-slot>

                    <x-slot name="content">
                        <div class="space-y-5 py-2">
                            <!-- Warning Box -->
                            <div class="bg-red-50 rounded-xl p-4 border-2 border-red-200">
                                <div class="flex items-start space-x-3">
                                    <svg class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    <div class="flex-1">
                                        <p class="text-sm font-semibold text-gray-800">
                                            {{ __('Are you sure you want to delete your account?') }}
                                        </p>
                                        <p class="text-sm text-gray-600 mt-1">
                                            {{ __('All your data, projects, and settings will be permanently removed.') }}
                                        </p>
                                        
                                        <!-- Confirmation Checklist -->
                                        <div class="mt-3 space-y-2">
                                            <label class="flex items-start gap-2.5 p-2 rounded-lg hover:bg-white transition-colors cursor-pointer group">
                                                <input type="checkbox" 
                                                    x-model="confirmPermanent" 
                                                    class="mt-0.5 w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-500">
                                                <span class="text-xs text-gray-600 group-hover:text-gray-800 transition-colors">
                                                    I understand this action is permanent
                                                </span>
                                            </label>
                                            <label class="flex items-start gap-2.5 p-2 rounded-lg hover:bg-white transition-colors cursor-pointer group">
                                                <input type="checkbox" 
                                                    x-model="confirmBackup" 
                                                    class="mt-0.5 w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-500">
                                                <span class="text-xs text-gray-600 group-hover:text-gray-800 transition-colors">
                                                    I have backed up all important data
                                                </span>
                                            </label>
                                            <label class="flex items-start gap-2.5 p-2 rounded-lg hover:bg-white transition-colors cursor-pointer group">
                                                <input type="checkbox" 
                                                    x-model="confirmDelete" 
                                                    class="mt-0.5 w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-500">
                                                <span class="text-xs text-gray-600 group-hover:text-gray-800 transition-colors">
                                                    I want to permanently delete my account
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Password Input -->
                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                                <div class="flex items-center justify-between mb-2.5">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-sm font-semibold text-gray-700">{{ __('Enter your account password') }}</span>
                                    </div>
                                    <span class="text-xs text-red-600 font-bold">Required</span>
                                </div>
                                
                                <div x-data="{ showPassword: false }" 
                                     x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                                    <div class="relative">
                                        <input 
                                            :type="showPassword ? 'text' : 'password'"
                                            class="block w-full pr-12 py-2.5 pl-4 bg-white border-2 rounded-xl focus:outline-none focus:ring-4 focus:bg-white transition-all duration-300 text-sm
                                            @error('password') border-red-500 focus:border-red-500 focus:ring-red-200 
                                            @elseif(strlen($password ?? '') > 0 && strlen($password ?? '') >= 6) border-green-500 focus:border-green-500 focus:ring-green-200 
                                            @elseif(strlen($password ?? '') > 0 && strlen($password ?? '') < 6) border-red-500 focus:border-red-500 focus:ring-red-200 
                                            @else border-gray-300 hover:border-red-300 focus:border-red-600 focus:ring-red-200 @enderror"
                                            autocomplete="current-password"
                                            placeholder="{{ __('Enter your account password') }}"
                                            x-ref="password"
                                            wire:model.live="password"
                                            wire:keydown.enter="deleteUser"
                                        />

                                        <!-- Eye Icon - Inside Input Field on Right Side -->
                                        <button 
                                            type="button"
                                            @click="showPassword = !showPassword"
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 transition-colors duration-200 focus:outline-none"
                                            aria-label="Toggle password visibility"
                                        >
                                            <template x-if="!showPassword">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                                                </svg>
                                            </template>
                                            <template x-if="showPassword">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd"/>
                                                    <path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.064 7 9.542 7 .847 0 1.669-.105 2.454-.303z"/>
                                                </svg>
                                            </template>
                                        </button>
                                    </div>

                                    <!-- Character Counter -->
                                    <div class="mt-1.5 flex justify-end">
                                        <span class="text-xs" 
                                              :class="password.length >= 6 ? 'text-green-600' : 'text-gray-400'">
                                            <span x-text="password.length"></span>/6 characters
                                        </span>
                                    </div>

                                    <!-- Clean Error Message - No SVG icon -->
                                    @error('password')
                                        <div class="mt-2 text-sm text-red-600 bg-red-50 px-3 py-2 rounded-lg border border-red-200 animate-slide-in">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Keyboard Shortcut Hint -->
                            <div class="text-center">
                                <span class="text-xs text-gray-400 flex items-center justify-center gap-2">
                                    <kbd class="px-2 py-0.5 bg-gray-100 rounded text-xs font-mono">Enter</kbd>
                                    <span>to confirm deletion</span>
                                    <span class="w-px h-3 bg-gray-300"></span>
                                    <kbd class="px-2 py-0.5 bg-gray-100 rounded text-xs font-mono">Esc</kbd>
                                    <span>to cancel</span>
                                </span>
                            </div>
                        </div>
                    </x-slot>

                    <x-slot name="footer">
                        <div class="flex items-center justify-end gap-3">
                            <button 
                                wire:click="$toggle('confirmingUserDeletion')" 
                                wire:loading.attr="disabled"
                                class="px-5 py-2.5 text-sm font-semibold text-gray-700 bg-white border-2 border-gray-300 rounded-xl hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-4 focus:ring-gray-200 focus:ring-offset-2 transition-all duration-200"
                            >
                                {{ __('Cancel') }}
                                <span class="text-xs text-gray-400">(Esc)</span>
                            </button>

                            <button 
                                wire:click="deleteUser" 
                                wire:loading.attr="disabled"
                                x-bind:disabled="!confirmPermanent || !confirmBackup || !confirmDelete || password.length < 6"
                                class="px-6 py-2.5 bg-red-600 hover:bg-red-700 text-white font-bold rounded-xl shadow-lg hover:shadow-lg hover:shadow-red-200 transition-all duration-300 transform hover:scale-105 active:scale-95 focus:outline-none focus:ring-4 focus:ring-red-200 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100"
                            >
                                <span wire:loading.remove class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ __('Delete Account') }}
                                    <span class="text-xs text-white/70">(Enter)</span>
                                </span>
                                <span wire:loading class="flex items-center gap-2">
                                    <svg class="animate-spin w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    {{ __('Deleting...') }}
                                </span>
                            </button>
                        </div>
                    </x-slot>
                </div>
            </x-dialog-modal>

            <!-- Deletion Progress Indicator -->
            <div wire:loading wire:target="deleteUser" class="fixed bottom-4 right-4 z-50">
                <div class="bg-white rounded-xl shadow-2xl p-4 border border-red-200 max-w-sm animate-slide-up">
                    <div class="flex items-center gap-3">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                                <svg class="animate-spin w-5 h-5 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-900">Deleting Account</p>
                            <p class="text-xs text-gray-500">Please wait while we process your request...</p>
                            <div class="mt-2 h-1.5 bg-red-100 rounded-full overflow-hidden">
                                <div class="h-full bg-red-600 rounded-full animate-progress" style="width: 0%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Success Notification -->
            <div x-data="{ show: false }" 
                 x-on:account-deleted.window="show = true; setTimeout(() => show = false, 6000)"
                 x-show="show"
                 x-transition:enter="transform transition ease-out duration-500"
                 x-transition:enter-start="translate-x-full opacity-0 scale-95"
                 x-transition:enter-end="translate-x-0 opacity-100 scale-100"
                 x-transition:leave="transform transition ease-in duration-300"
                 x-transition:leave-start="translate-x-0 opacity-100 scale-100"
                 x-transition:leave-end="translate-x-full opacity-0 scale-95"
                 class="fixed top-4 right-4 z-50 max-w-sm"
                 style="display: none;">
                
                <!-- Confetti -->
                <div class="absolute inset-0 overflow-hidden pointer-events-none">
                    <div class="confetti-container">
                        <div class="confetti confetti-1"></div>
                        <div class="confetti confetti-2"></div>
                        <div class="confetti confetti-3"></div>
                        <div class="confetti confetti-4"></div>
                        <div class="confetti confetti-5"></div>
                        <div class="confetti confetti-6"></div>
                        <div class="confetti confetti-7"></div>
                        <div class="confetti confetti-8"></div>
                        <div class="confetti confetti-9"></div>
                        <div class="confetti confetti-10"></div>
                        <div class="confetti confetti-11"></div>
                        <div class="confetti confetti-12"></div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-2xl border-2 border-green-500 p-5 relative overflow-hidden">
                    <div class="absolute -top-10 -right-10 w-32 h-32 bg-green-100 rounded-full opacity-20 animate-pulse"></div>
                    <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-green-100 rounded-full opacity-20 animate-pulse" style="animation-delay: 0.5s;"></div>
                    
                    <div class="flex items-start gap-4 relative">
                        <div class="flex-shrink-0">
                            <div class="w-14 h-14 rounded-full bg-green-100 flex items-center justify-center animate-bounce-success">
                                <svg class="w-8 h-8 text-green-600 animate-check" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div class="absolute inset-0 rounded-full border-4 border-green-400 animate-ping opacity-75"></div>
                            <div class="absolute inset-0 rounded-full border-4 border-green-300 animate-ping opacity-50" style="animation-delay: 0.3s;"></div>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2">
                                <h4 class="text-lg font-bold text-gray-900 animate-slide-right">Account Deleted!</h4>
                                <span class="px-2 py-0.5 bg-green-100 text-green-700 text-xs font-semibold rounded-full animate-fade-in">Success</span>
                            </div>
                            <p class="text-sm text-gray-600 mt-1 leading-relaxed animate-slide-right" style="animation-delay: 0.1s;">
                                Your account has been permanently removed from our system.
                            </p>
                            <div class="mt-3 flex flex-wrap items-center gap-3 text-xs text-gray-500 animate-slide-right" style="animation-delay: 0.2s;">
                                <span class="flex items-center gap-1 bg-green-50 px-2 py-1 rounded-full">
                                    <svg class="w-3.5 h-3.5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Data erased
                                </span>
                                <span class="flex items-center gap-1 bg-green-50 px-2 py-1 rounded-full">
                                    <svg class="w-3.5 h-3.5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Account removed
                                </span>
                                <span class="flex items-center gap-1 bg-green-50 px-2 py-1 rounded-full">
                                    <svg class="w-3.5 h-3.5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Process complete
                                </span>
                            </div>
                        </div>
                        <button @click="show = false" class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-action-section>

    <style>
        /* Smooth Transitions */
        .delete-account-wrapper * {
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Card Hover Effect */
        .danger-card:hover {
            box-shadow: 0 8px 30px rgba(220, 38, 38, 0.08);
        }

        /* Delete Button Hover */
        .delete-btn:hover {
            transform: translateY(-2px);
        }

        /* Modal Animation */
        .x-dialog-modal {
            animation: modalSlideUp 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        @keyframes modalSlideUp {
            from {
                opacity: 0;
                transform: scale(0.95) translateY(20px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        /* Progress Bar Animation */
        @keyframes progress {
            0% { width: 0%; }
            50% { width: 70%; }
            100% { width: 100%; }
        }

        .animate-progress {
            animation: progress 2s ease-in-out infinite;
        }

        /* Slide Up Notification */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .animate-slide-up {
            animation: slideUp 0.3s ease-out;
        }

        /* Slide Right Animation */
        @keyframes slideRight {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-slide-right {
            animation: slideRight 0.5s ease-out forwards;
        }

        /* Fade In Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.8); }
            to { opacity: 1; transform: scale(1); }
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }

        /* Success Animation - Bounce */
        @keyframes bounceSuccess {
            0%, 100% { transform: scale(1); }
            30% { transform: scale(1.2); }
            50% { transform: scale(0.95); }
            70% { transform: scale(1.05); }
        }

        .animate-bounce-success {
            animation: bounceSuccess 0.6s ease-out;
        }

        /* Check Mark Animation */
        @keyframes checkAnim {
            0% { stroke-dashoffset: 50; opacity: 0; transform: scale(0.5); }
            50% { transform: scale(1.1); }
            100% { stroke-dashoffset: 0; opacity: 1; transform: scale(1); }
        }

        .animate-check {
            stroke-dasharray: 50;
            stroke-dashoffset: 50;
            animation: checkAnim 0.6s ease-out forwards;
        }

        /* Error Slide In */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-5px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slide-in {
            animation: slideIn 0.2s ease-out;
        }

        /* Confetti Animations */
        .confetti-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
        }

        .confetti {
            position: absolute;
            width: 8px;
            height: 8px;
            border-radius: 2px;
            opacity: 0;
        }

        .confetti-1 { background: #ef4444; animation: confettiFall 1.5s ease-out 0.1s forwards; left: 5%; }
        .confetti-2 { background: #22c55e; animation: confettiFall 1.5s ease-out 0.2s forwards; left: 15%; }
        .confetti-3 { background: #eab308; animation: confettiFall 1.5s ease-out 0.3s forwards; left: 25%; }
        .confetti-4 { background: #3b82f6; animation: confettiFall 1.5s ease-out 0.4s forwards; left: 35%; }
        .confetti-5 { background: #ec4899; animation: confettiFall 1.5s ease-out 0.5s forwards; left: 45%; }
        .confetti-6 { background: #8b5cf6; animation: confettiFall 1.5s ease-out 0.6s forwards; left: 55%; }
        .confetti-7 { background: #f59e0b; animation: confettiFall 1.5s ease-out 0.7s forwards; left: 65%; }
        .confetti-8 { background: #10b981; animation: confettiFall 1.5s ease-out 0.8s forwards; left: 75%; }
        .confetti-9 { background: #ef4444; animation: confettiFall 1.5s ease-out 0.15s forwards; left: 85%; }
        .confetti-10 { background: #22c55e; animation: confettiFall 1.5s ease-out 0.35s forwards; left: 10%; }
        .confetti-11 { background: #eab308; animation: confettiFall 1.5s ease-out 0.55s forwards; left: 50%; }
        .confetti-12 { background: #3b82f6; animation: confettiFall 1.5s ease-out 0.75s forwards; left: 90%; }

        @keyframes confettiFall {
            0% {
                opacity: 1;
                transform: translateY(-20px) rotate(0deg) scale(1);
            }
            100% {
                opacity: 0;
                transform: translateY(120px) rotate(720deg) scale(0.3);
            }
        }

        /* Modal Overlay */
        .x-dialog-modal .modal-overlay {
            backdrop-filter: blur(4px);
            background: rgba(0, 0, 0, 0.4);
        }

        /* Custom Scrollbar */
        .x-dialog-modal::-webkit-scrollbar {
            width: 4px;
        }
        .x-dialog-modal::-webkit-scrollbar-track {
            background: transparent;
        }
        .x-dialog-modal::-webkit-scrollbar-thumb {
            background: #e5e7eb;
            border-radius: 20px;
        }
        .x-dialog-modal::-webkit-scrollbar-thumb:hover {
            background: #d1d5db;
        }

        /* Focus Rings */
        .focus\:ring-red-200:focus {
            --tw-ring-color: rgba(254, 202, 202, 0.8);
        }
        .focus\:ring-green-200:focus {
            --tw-ring-color: rgba(187, 247, 208, 0.8);
        }

        /* Loading States */
        [wire\:loading] {
            display: inline-flex;
        }

        /* Checkbox Styling */
        input[type="checkbox"] {
            accent-color: #dc2626;
        }

        /* Responsive */
        @media (max-width: 640px) {
            .x-dialog-modal {
                margin: 1rem;
            }
            
            .delete-btn {
                width: 100%;
                justify-content: center;
            }
        }

        /* Fixed Positioning */
        .fixed {
            position: fixed;
        }
        .z-50 {
            z-index: 50;
        }
    </style>
</div>

<script>
    function deleteAccount() {
        return {
            password: '',
            confirmPermanent: false,
            confirmBackup: false,
            confirmDelete: false,
            showSuccess: false,
            
            validatePassword() {
                return this.password.length >= 6;
            },
            
            canDelete() {
                return this.confirmPermanent && 
                       this.confirmBackup && 
                       this.confirmDelete && 
                       this.validatePassword();
            }
        }
    }
</script>