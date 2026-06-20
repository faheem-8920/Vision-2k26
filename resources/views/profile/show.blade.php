<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between relative">
            <div class="relative">
                <h2 class="font-black text-3xl md:text-4xl text-gray-900 leading-tight tracking-tight">
                    {{ __('Profile') }}
                    <span class="absolute -top-1 -right-8 text-xs font-medium text-red-500 animate-pulse">● Live</span>
                </h2>
                <p class="text-sm text-gray-500 mt-1 flex items-center gap-2">
                    <span class="w-1 h-1 bg-red-500 rounded-full inline-block animate-pulse"></span>
                    Manage your account settings and preferences
                </p>
            </div>
            
            {{-- Premium Profile Strength with 3D ring --}}
            <div class="hidden lg:block relative">
                <div class="flex items-center gap-6 bg-white/60 backdrop-blur-2xl px-6 py-4 rounded-3xl shadow-[0_20px_60px_rgba(0,0,0,0.04)] border border-white/50 hover:shadow-[0_30px_80px_rgba(220,38,38,0.06)] transition-all duration-700 group">
                    <div class="relative perspective-500">
                        <svg class="w-16 h-16 -rotate-90 transform group-hover:scale-110 transition-transform duration-700">
                            <circle cx="32" cy="32" r="26" fill="none" stroke="#f3f4f6" stroke-width="4"/>
                            <circle cx="32" cy="32" r="26" fill="none" stroke="url(#premiumGradient)" stroke-width="4" 
                                    stroke-dasharray="163.36" stroke-dashoffset="40.84" 
                                    stroke-linecap="round" class="transition-all duration-1000">
                                <animate attributeName="stroke-dashoffset" from="163.36" to="40.84" dur="2s" fill="freeze"/>
                            </circle>
                            <defs>
                                <linearGradient id="premiumGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#dc2626"/>
                                    <stop offset="50%" stop-color="#e11d48"/>
                                    <stop offset="100%" stop-color="#be123c"/>
                                </linearGradient>
                            </defs>
                        </svg>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="text-base font-black text-red-600">75%</span>
                        </div>
                        <div class="absolute -inset-1 bg-red-500/5 rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Profile Strength</p>
                        <div class="flex items-center gap-2 mt-1">
                            <p class="text-sm font-semibold text-gray-800">Almost complete</p>
                            <span class="text-xs text-green-500 font-medium bg-green-50 px-2 py-0.5 rounded-full">+25%</span>
                        </div>
                        <div class="w-32 h-1 bg-gray-100 rounded-full mt-2 overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-red-400 via-red-500 to-red-600 rounded-full animate-shimmer" style="width: 75%; background-size: 200% 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    {{-- Animated Particle Background --}}
    <div id="particles" class="fixed inset-0 -z-10 pointer-events-none"></div>
    
    {{-- Animated Gradient Orbs --}}
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute top-1/4 left-1/4 w-[600px] h-[600px] bg-red-100/20 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-1/4 right-1/4 w-[500px] h-[500px] bg-rose-200/15 rounded-full blur-3xl animate-float-delayed"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-red-50/10 rounded-full blur-3xl animate-pulse-slow"></div>
    </div>

    <div class="py-8 md:py-12 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Premium Stats Grid with 3D hover --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 mb-10">
                <div class="stat-card-3d group bg-white/60 backdrop-blur-xl rounded-3xl p-6 shadow-[0_8px_32px_rgba(0,0,0,0.04)] border border-white/50 hover:shadow-[0_20px_60px_rgba(220,38,38,0.08)] transition-all duration-700 hover:-translate-y-2 hover:scale-[1.02] cursor-pointer">
                    <div class="flex items-start justify-between">
                        <div>
                            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-red-50 to-red-100/50 flex items-center justify-center mb-3 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <p class="text-2xl font-black text-gray-900">Premium</p>
                            <p class="text-xs text-gray-400 font-medium uppercase tracking-wider mt-1">Account Status</p>
                        </div>
                        <div class="px-2 py-1 bg-green-50 rounded-lg">
                            <span class="text-[10px] font-bold text-green-600 uppercase">Active</span>
                        </div>
                    </div>
                    <div class="mt-4 h-1 w-full bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-green-400 to-green-500 rounded-full w-full animate-shimmer" style="background-size: 200% 100%;"></div>
                    </div>
                </div>

                <div class="stat-card-3d group bg-white/60 backdrop-blur-xl rounded-3xl p-6 shadow-[0_8px_32px_rgba(0,0,0,0.04)] border border-white/50 hover:shadow-[0_20px_60px_rgba(220,38,38,0.08)] transition-all duration-700 hover:-translate-y-2 hover:scale-[1.02] cursor-pointer">
                    <div class="flex items-start justify-between">
                        <div>
                            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-red-50 to-red-100/50 flex items-center justify-center mb-3 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <p class="text-2xl font-black text-gray-900">2FA</p>
                            <p class="text-xs text-gray-400 font-medium uppercase tracking-wider mt-1">Security Level</p>
                        </div>
                        <div class="px-2 py-1 bg-yellow-50 rounded-lg">
                            <span class="text-[10px] font-bold text-yellow-600 uppercase">Off</span>
                        </div>
                    </div>
                    <div class="mt-4 h-1 w-full bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-yellow-400 to-yellow-500 rounded-full w-1/3 animate-shimmer" style="background-size: 200% 100%;"></div>
                    </div>
                </div>

                <div class="stat-card-3d group bg-white/60 backdrop-blur-xl rounded-3xl p-6 shadow-[0_8px_32px_rgba(0,0,0,0.04)] border border-white/50 hover:shadow-[0_20px_60px_rgba(220,38,38,0.08)] transition-all duration-700 hover:-translate-y-2 hover:scale-[1.02] cursor-pointer">
                    <div class="flex items-start justify-between">
                        <div>
                            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-red-50 to-red-100/50 flex items-center justify-center mb-3 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <p class="text-2xl font-black text-gray-900">3</p>
                            <p class="text-xs text-gray-400 font-medium uppercase tracking-wider mt-1">Active Sessions</p>
                        </div>
                        <div class="px-2 py-1 bg-blue-50 rounded-lg">
                            <span class="text-[10px] font-bold text-blue-600 uppercase">Online</span>
                        </div>
                    </div>
                    <div class="mt-4 h-1 w-full bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-blue-400 to-blue-500 rounded-full w-3/4 animate-shimmer" style="background-size: 200% 100%;"></div>
                    </div>
                </div>

                <div class="stat-card-3d group bg-white/60 backdrop-blur-xl rounded-3xl p-6 shadow-[0_8px_32px_rgba(0,0,0,0.04)] border border-white/50 hover:shadow-[0_20px_60px_rgba(220,38,38,0.08)] transition-all duration-700 hover:-translate-y-2 hover:scale-[1.02] cursor-pointer">
                    <div class="flex items-start justify-between">
                        <div>
                            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-red-50 to-red-100/50 flex items-center justify-center mb-3 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <p class="text-2xl font-black text-gray-900">45d</p>
                            <p class="text-xs text-gray-400 font-medium uppercase tracking-wider mt-1">Member Since</p>
                        </div>
                        <div class="px-2 py-1 bg-purple-50 rounded-lg">
                            <span class="text-[10px] font-bold text-purple-600 uppercase">Loyal</span>
                        </div>
                    </div>
                    <div class="mt-4 h-1 w-full bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-purple-400 to-purple-500 rounded-full w-full animate-shimmer" style="background-size: 200% 100%;"></div>
                    </div>
                </div>
            </div>

            {{-- Main Content with Masonry Layout --}}
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                
                {{-- Left Column (7/12) --}}
                <div class="lg:col-span-7 space-y-6">
                    {{-- Profile Information with Avatar --}}
                    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                        <div class="premium-card-3d group">
                            <div class="card-header-premium">
                                <div class="flex items-center gap-4">
                                    <div class="relative">
                                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-red-500 to-red-600 flex items-center justify-center text-white font-black text-2xl shadow-lg shadow-red-500/20 group-hover:shadow-red-500/40 transition-all duration-500 group-hover:scale-110 group-hover:rotate-3">
                                            JD
                                        </div>
                                        <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-green-500 rounded-full border-2 border-white shadow-lg animate-pulse"></div>
                                    </div>
                                    <div>
                                        <h3 class="card-title-premium">Profile Information</h3>
                                        <p class="card-subtitle-premium">Update your personal details and avatar</p>
                                    </div>
                                    <span class="flex-1"></span>
                                    <div class="flex items-center gap-2 px-3 py-1.5 bg-white/60 backdrop-blur rounded-full border border-gray-100/50">
                                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-ping"></span>
                                        <span class="text-xs font-medium text-gray-600">Verified</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body-premium">
                                @livewire('profile.update-profile-information-form')
                            </div>
                        </div>
                    @endif

                    {{-- Password with Strength Meter --}}
                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                        <div class="premium-card-3d group">
                            <div class="card-header-premium">
                                <div class="flex items-center gap-4">
                                    <div class="header-icon-premium">
                                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="card-title-premium">Security Settings</h3>
                                        <p class="card-subtitle-premium">Update your password</p>
                                    </div>
                                    <span class="flex-1"></span>
                                    <div class="flex items-center gap-2">
                                        <div class="w-16 h-1.5 bg-gray-100 rounded-full overflow-hidden">
                                            <div class="h-full bg-gradient-to-r from-red-400 to-red-600 rounded-full" style="width: 85%"></div>
                                        </div>
                                        <span class="text-[10px] font-bold text-red-600">Strong</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body-premium">
                                @livewire('profile.update-password-form')
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Right Column (5/12) --}}
                <div class="lg:col-span-5 space-y-6">
                    {{-- 2FA with Toggle --}}
                    @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                        <div class="premium-card-3d group">
                            <div class="card-header-premium">
                                <div class="flex items-center gap-4">
                                    <div class="header-icon-premium">
                                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="card-title-premium">Two-Factor Auth</h3>
                                        <p class="card-subtitle-premium">Extra security layer</p>
                                    </div>
                                    <span class="flex-1"></span>
                                    <div class="flex items-center gap-3">
                                        <span class="text-xs font-medium text-gray-400">Status</span>
                                        <div class="relative inline-flex items-center cursor-pointer">
                                            <div class="w-12 h-6 bg-gray-200 rounded-full transition-all duration-500 premium-toggle" data-status="inactive">
                                                <div class="w-5 h-5 bg-white rounded-full shadow-md transition-all duration-500 transform translate-x-0.5 mt-0.5 ml-0.5"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body-premium">
                                @livewire('profile.two-factor-authentication-form')
                            </div>
                        </div>
                    @endif

                    {{-- Sessions with Device Icons --}}
                    <div class="premium-card-3d group">
                        <div class="card-header-premium">
                            <div class="flex items-center gap-4">
                                <div class="header-icon-premium">
                                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="card-title-premium">Active Sessions</h3>
                                    <p class="card-subtitle-premium">Devices logged into your account</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body-premium">
                            @livewire('profile.logout-other-browser-sessions-form')
                        </div>
                    </div>

                    {{-- Delete Account with Warning Animation --}}
                    @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                        <div class="premium-card-3d group border-red-200/50 hover:border-red-300/70">
                            <div class="card-header-premium border-b-red-100/50">
                                <div class="flex items-center gap-4">
                                    <div class="header-icon-premium bg-red-100 group-hover:bg-red-200 transition-colors duration-500">
                                        <svg class="w-5 h-5 text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="card-title-premium text-red-700">Danger Zone</h3>
                                        <p class="card-subtitle-premium">Permanently delete your account</p>
                                    </div>
                                    <span class="flex-1"></span>
                                    <div class="px-2 py-1 bg-red-100 rounded-lg animate-pulse">
                                        <span class="text-[10px] font-bold text-red-700 uppercase">⚠️ Irreversible</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body-premium">
                                @livewire('profile.delete-user-form')
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>

    {{-- Advanced Premium Styles with 3D and Animations --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');

        * {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        /* 3D Card with Perspective */
        .premium-card-3d {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border-radius: 32px;
            border: 1px solid rgba(255, 255, 255, 0.7);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.04);
            transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
            transform-style: preserve-3d;
            perspective: 800px;
        }

        .premium-card-3d::before {
            content: '';
            position: absolute;
            inset: 0;
            padding: 1px;
            border-radius: 32px;
            background: linear-gradient(135deg, rgba(220,38,38,0.1), rgba(255,255,255,0.5), rgba(220,38,38,0.1));
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.6s ease;
        }

        .premium-card-3d:hover::before {
            opacity: 1;
        }

        .premium-card-3d::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at var(--mouse-x, 50%) var(--mouse-y, 50%), rgba(220,38,38,0.03), transparent 50%);
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }

        .premium-card-3d:hover::after {
            opacity: 1;
        }

        .premium-card-3d:hover {
            transform: translateY(-6px) rotateX(2deg) rotateY(2deg);
            box-shadow: 0 30px 80px rgba(220, 38, 38, 0.08);
            border-color: rgba(220, 38, 38, 0.08);
        }

        /* Card Header */
        .card-header-premium {
            padding: 1.75rem 2rem;
            border-bottom: 1px solid rgba(243, 244, 246, 0.6);
            background: rgba(255, 255, 255, 0.2);
            transition: all 0.4s ease;
        }

        .group:hover .card-header-premium {
            background: rgba(254, 242, 242, 0.15);
        }

        .card-body-premium {
            padding: 2rem;
        }

        /* Header Icon with 3D */
        .header-icon-premium {
            width: 44px;
            height: 44px;
            border-radius: 14px;
            background: rgba(254, 242, 242, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
            flex-shrink: 0;
            transform-style: preserve-3d;
        }

        .group:hover .header-icon-premium {
            background: #fef2f2;
            transform: scale(1.1) rotateY(10deg) rotateX(5deg);
            box-shadow: 0 8px 24px rgba(220, 38, 38, 0.1);
        }

        .card-title-premium {
            font-size: 0.9375rem;
            font-weight: 800;
            color: #1a1a2e;
            letter-spacing: -0.01em;
        }

        .card-subtitle-premium {
            font-size: 0.8125rem;
            color: #9ca3af;
            font-weight: 400;
            margin-top: 2px;
        }

        /* 3D Stat Cards */
        .stat-card-3d {
            transform-style: preserve-3d;
            perspective: 600px;
            transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .stat-card-3d:hover {
            transform: translateY(-6px) rotateX(3deg) rotateY(-3deg) scale(1.02);
        }

        /* Premium Toggle Switch */
        .premium-toggle {
            position: relative;
            width: 48px;
            height: 26px;
            background: #e5e7eb;
            border-radius: 9999px;
            transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
            cursor: pointer;
            flex-shrink: 0;
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.05);
        }

        .premium-toggle.active {
            background: linear-gradient(135deg, #dc2626, #e11d48);
            box-shadow: 0 0 20px rgba(220, 38, 38, 0.2);
        }

        .premium-toggle .toggle-dot {
            position: absolute;
            top: 2px;
            left: 2px;
            width: 22px;
            height: 22px;
            background: white;
            border-radius: 50%;
            transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .premium-toggle.active .toggle-dot {
            transform: translateX(22px);
            box-shadow: 0 2px 12px rgba(220, 38, 38, 0.3);
        }

        /* Button Styles */
        .btn-3d {
            background: linear-gradient(135deg, #dc2626, #e11d48) !important;
            color: white !important;
            padding: 0.75rem 2.5rem !important;
            border-radius: 16px !important;
            font-weight: 700 !important;
            font-size: 0.875rem !important;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1) !important;
            box-shadow: 0 4px 20px rgba(220, 38, 38, 0.25), inset 0 1px 0 rgba(255,255,255,0.1) !important;
            border: none !important;
            position: relative !important;
            overflow: hidden !important;
            transform-style: preserve-3d !important;
        }

        .btn-3d::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.15), transparent);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .btn-3d:hover::before {
            opacity: 1;
        }

        .btn-3d:hover {
            transform: translateY(-3px) scale(1.02) !important;
            box-shadow: 0 8px 40px rgba(220, 38, 38, 0.35), inset 0 1px 0 rgba(255,255,255,0.1) !important;
        }

        .btn-3d:active {
            transform: scale(0.96) !important;
        }

        .btn-3d-danger {
            background: linear-gradient(135deg, #991b1b, #7f1d1d) !important;
            box-shadow: 0 4px 20px rgba(153, 27, 27, 0.3) !important;
        }

        .btn-3d-danger:hover {
            box-shadow: 0 8px 40px rgba(153, 27, 27, 0.4) !important;
        }

        .btn-3d-outline {
            background: transparent !important;
            color: #dc2626 !important;
            border: 2px solid #dc2626 !important;
            box-shadow: none !important;
        }

        .btn-3d-outline:hover {
            background: #dc2626 !important;
            color: white !important;
            transform: translateY(-3px) scale(1.02) !important;
            box-shadow: 0 8px 40px rgba(220, 38, 38, 0.15) !important;
        }

        /* Override Jetstream */
        button[type="submit"],
        .jetstream-button,
        .bg-indigo-500, .bg-indigo-600, .bg-blue-500, .bg-blue-600 {
            @apply btn-3d !important;
        }

        .bg-red-500, .bg-red-600, .bg-red-700 {
            @apply btn-3d btn-3d-danger !important;
        }

        /* Enhanced Inputs */
        .input-3d {
            background: rgba(255, 255, 255, 0.8) !important;
            border: 1px solid rgba(229, 231, 235, 0.6) !important;
            border-radius: 16px !important;
            padding: 0.875rem 1.25rem !important;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1) !important;
            font-size: 0.9375rem !important;
            backdrop-filter: blur(8px) !important;
        }

        .input-3d:focus {
            border-color: #dc2626 !important;
            box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.06), 0 8px 24px rgba(220, 38, 38, 0.04) !important;
            background: white !important;
            transform: translateY(-2px) !important;
        }

        .input-3d:hover {
            border-color: #d1d5db !important;
            background: white !important;
            transform: translateY(-1px) !important;
        }

        input, select, textarea {
            @apply input-3d !important;
        }

        /* Animations */
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(5deg); }
        }

        @keyframes float-delayed {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-25px) rotate(-5deg); }
        }

        @keyframes pulse-slow {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(1.1); }
        }

        @keyframes shimmer {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        .animate-float {
            animation: float 8s ease-in-out infinite;
        }

        .animate-float-delayed {
            animation: float-delayed 10s ease-in-out infinite;
        }

        .animate-pulse-slow {
            animation: pulse-slow 6s ease-in-out infinite;
        }

        .animate-shimmer {
            animation: shimmer 2s linear infinite;
        }

        /* Particles Canvas */
        #particles canvas {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            pointer-events: none !important;
            z-index: -1 !important;
        }

        /* Perspective Utilities */
        .perspective-500 {
            perspective: 500px;
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #dc2626;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #b91c1c;
        }

        /* Selection */
        ::selection {
            background: #dc2626;
            color: white;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .card-header-premium {
                padding: 1.5rem;
            }
            .card-body-premium {
                padding: 1.5rem;
            }
        }

        @media (max-width: 640px) {
            .premium-card-3d {
                border-radius: 20px;
            }
            .card-header-premium {
                padding: 1rem 1.25rem;
            }
            .card-body-premium {
                padding: 1.25rem;
            }
            .stat-card-3d {
                padding: 1rem;
            }
            .header-icon-premium {
                width: 36px;
                height: 36px;
            }
            .header-icon-premium svg {
                width: 16px;
                height: 16px;
            }
            .btn-3d,
            button[type="submit"] {
                width: 100% !important;
                justify-content: center !important;
            }
            .card-title-premium {
                font-size: 0.8125rem;
            }
            .card-subtitle-premium {
                font-size: 0.6875rem;
            }
        }

        /* Reduced Motion */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
            .premium-card-3d::before,
            .premium-card-3d::after {
                animation: none !important;
                opacity: 0 !important;
            }
        }
    </style>

    {{-- JavaScript for 3D mouse tracking and particles --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- 3D Mouse Tracking for Cards ---
            document.querySelectorAll('.premium-card-3d').forEach(card => {
                card.addEventListener('mousemove', function(e) {
                    const rect = this.getBoundingClientRect();
                    const x = ((e.clientX - rect.left) / rect.width - 0.5) * 8;
                    const y = ((e.clientY - rect.top) / rect.height - 0.5) * -8;
                    
                    this.style.transform = `translateY(-6px) rotateX(${y}deg) rotateY(${x}deg)`;
                    
                    // Update glow position
                    const glowX = ((e.clientX - rect.left) / rect.width) * 100;
                    const glowY = ((e.clientY - rect.top) / rect.height) * 100;
                    this.style.setProperty('--mouse-x', glowX + '%');
                    this.style.setProperty('--mouse-y', glowY + '%');
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = '';
                });
            });

            // --- 3D Toggle Switch ---
            document.querySelectorAll('.premium-toggle').forEach(toggle => {
                toggle.addEventListener('click', function() {
                    this.classList.toggle('active');
                    const dot = this.querySelector('.toggle-dot');
                    if (!dot) {
                        const newDot = document.createElement('div');
                        newDot.className = 'toggle-dot';
                        this.appendChild(newDot);
                    }
                    
                    // Dispatch event for livewire
                    const event = new CustomEvent('toggle-change', {
                        detail: { active: this.classList.contains('active') }
                    });
                    this.dispatchEvent(event);
                });
            });

            // --- Particle System ---
            class ParticleSystem {
                constructor() {
                    this.canvas = document.createElement('canvas');
                    this.ctx = this.canvas.getContext('2d');
                    const container = document.getElementById('particles');
                    container.appendChild(this.canvas);
                    
                    this.particles = [];
                    this.mouse = { x: null, y: null };
                    
                    this.resize();
                    this.initParticles(80);
                    this.animate();
                    
                    window.addEventListener('resize', () => this.resize());
                    document.addEventListener('mousemove', (e) => {
                        this.mouse.x = e.clientX;
                        this.mouse.y = e.clientY;
                    });
                }

                resize() {
                    this.canvas.width = window.innerWidth;
                    this.canvas.height = window.innerHeight;
                }

                initParticles(count) {
                    for (let i = 0; i < count; i++) {
                        this.particles.push({
                            x: Math.random() * this.canvas.width,
                            y: Math.random() * this.canvas.height,
                            vx: (Math.random() - 0.5) * 0.5,
                            vy: (Math.random() - 0.5) * 0.5,
                            r: Math.random() * 2 + 0.5,
                            opacity: Math.random() * 0.3 + 0.1
                        });
                    }
                }

                animate() {
                    this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
                    
                    this.particles.forEach(p => {
                        p.x += p.vx;
                        p.y += p.vy;
                        
                        if (p.x < 0 || p.x > this.canvas.width) p.vx *= -1;
                        if (p.y < 0 || p.y > this.canvas.height) p.vy *= -1;
                        
                        // Mouse interaction
                        if (this.mouse.x && this.mouse.y) {
                            const dx = this.mouse.x - p.x;
                            const dy = this.mouse.y - p.y;
                            const dist = Math.sqrt(dx * dx + dy * dy);
                            if (dist < 150) {
                                const force = (150 - dist) / 150 * 0.02;
                                p.x -= dx * force;
                                p.y -= dy * force;
                            }
                        }
                        
                        this.ctx.beginPath();
                        this.ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
                        this.ctx.fillStyle = `rgba(220, 38, 38, ${p.opacity})`;
                        this.ctx.fill();
                    });
                    
                    // Draw connections
                    for (let i = 0; i < this.particles.length; i++) {
                        for (let j = i + 1; j < this.particles.length; j++) {
                            const dx = this.particles[i].x - this.particles[j].x;
                            const dy = this.particles[i].y - this.particles[j].y;
                            const dist = Math.sqrt(dx * dx + dy * dy);
                            if (dist < 120) {
                                this.ctx.beginPath();
                                this.ctx.moveTo(this.particles[i].x, this.particles[i].y);
                                this.ctx.lineTo(this.particles[j].x, this.particles[j].y);
                                this.ctx.strokeStyle = `rgba(220, 38, 38, ${0.05 * (1 - dist / 120)})`;
                                this.ctx.lineWidth = 0.5;
                                this.ctx.stroke();
                            }
                        }
                    }
                    
                    requestAnimationFrame(() => this.animate());
                }
            }

            // Initialize particles on non-mobile devices
            if (window.innerWidth > 768) {
                new ParticleSystem();
            }

            // --- Apply button styling to dynamic elements ---
            const observer = new MutationObserver(() => {
                document.querySelectorAll('button:not(.btn-3d)').forEach(btn => {
                    if (btn.type === 'submit' || btn.classList.contains('primary') ||
                        btn.innerText.includes('Update') || btn.innerText.includes('Save') ||
                        btn.innerText.includes('Enable') || btn.innerText.includes('Disable') ||
                        btn.innerText.includes('Confirm') || btn.innerText.includes('Submit')) {
                        if (!btn.classList.contains('btn-3d')) {
                            if (btn.innerText.toLowerCase().includes('delete') || 
                                btn.innerText.toLowerCase().includes('remove') ||
                                btn.innerText.toLowerCase().includes('deactivate')) {
                                btn.classList.add('btn-3d', 'btn-3d-danger');
                            } else if (btn.classList.contains('outline') || btn.classList.contains('ghost')) {
                                btn.classList.add('btn-3d', 'btn-3d-outline');
                            } else {
                                btn.classList.add('btn-3d');
                            }
                        }
                    }
                });
            });
            
            observer.observe(document.body, { childList: true, subtree: true });
        });
    </script>
</x-app-layout>