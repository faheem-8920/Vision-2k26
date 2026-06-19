<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rentify · Premium Red & White</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:opsz@14..32&display=swap');
    * { 
      font-family: 'Inter', system-ui, -apple-system, sans-serif;
      box-sizing: border-box;
    }
    
    /* Prevent horizontal scroll */
    html, body {
      overflow-x: hidden;
      max-width: 100vw;
    }

    /* Enhanced glassmorphism */
    .card-glass {
      background: rgba(255, 255, 255, 0.78);
      backdrop-filter: blur(14px);
      -webkit-backdrop-filter: blur(14px);
      border: 1px solid rgba(255, 255, 255, 0.5);
      box-shadow: 0 8px 32px rgba(180, 0, 0, 0.06);
      transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    .card-glass:hover {
      transform: translateY(-8px);
      box-shadow: 0 24px 56px rgba(180, 0, 0, 0.12);
      border-color: rgba(185, 28, 28, 0.2);
    }

    /* Premium gradient text */
    .text-gradient-red {
      background: linear-gradient(135deg, #b91c1c 0%, #7f1d1d 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    /* Glow effects */
    .glow-red {
      box-shadow: 0 0 60px rgba(185, 28, 28, 0.06);
    }
    .glow-red-strong {
      box-shadow: 0 0 80px rgba(185, 28, 28, 0.08);
    }

    /* Animated underline */
    .link-underline-red {
      position: relative;
      text-decoration: none;
    }
    .link-underline-red::after {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 0%;
      height: 2.5px;
      background: linear-gradient(90deg, #b91c1c, #ef4444);
      transition: width 0.35s ease;
    }
    .link-underline-red:hover::after {
      width: 100%;
    }

    /* Icon rings - enhanced */
    .icon-ring {
      background: linear-gradient(135deg, #fef2f2, #fff5f5);
      border: 1.5px solid rgba(185, 28, 28, 0.15);
      box-shadow: 0 4px 16px rgba(185, 28, 28, 0.06);
      transition: all 0.3s ease;
    }
    .group:hover .icon-ring {
      transform: scale(1.1) rotate(-3deg);
      border-color: rgba(185, 28, 28, 0.3);
      box-shadow: 0 8px 24px rgba(185, 28, 28, 0.12);
    }
    .icon-ring svg {
      stroke: #b91c1c;
      stroke-width: 1.8;
    }

    /* Feature list with elegant bullets */
    .feature-list li {
      display: flex;
      align-items: flex-start;
      gap: 0.75rem;
      padding: 0.6rem 0;
      border-bottom: 1px solid rgba(185, 28, 28, 0.04);
      transition: all 0.2s;
    }
    .feature-list li:hover {
      padding-left: 0.5rem;
    }
    .feature-list li:last-child {
      border-bottom: none;
    }
    .feature-list li::before {
      content: "✦";
      color: #b91c1c;
      font-weight: 700;
      font-size: 1.1rem;
      line-height: 1.5;
      opacity: 0.8;
      flex-shrink: 0;
      transition: transform 0.2s;
    }
    .feature-list li:hover::before {
      transform: scale(1.3) rotate(10deg);
    }

    /* Decorative dot pattern - subtle */
    .dot-pattern {
      background-image: radial-gradient(circle, #fecaca 1px, transparent 1px);
      background-size: 24px 24px;
      opacity: 0.15;
    }

    /* Badge premium */
    .badge-premium {
      background: linear-gradient(135deg, #b91c1c, #991b1b);
      color: white;
      padding: 0.3rem 1.2rem;
      border-radius: 9999px;
      font-size: 0.7rem;
      font-weight: 600;
      letter-spacing: 0.05em;
      text-transform: uppercase;
      box-shadow: 0 2px 12px rgba(185, 28, 28, 0.25);
    }

    /* Stats counter */
    .stat-number {
      font-size: 2rem;
      font-weight: 800;
      background: linear-gradient(135deg, #b91c1c, #7f1d1d);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      line-height: 1;
    }

    /* Background gradient hero */
    .bg-red-gradient-hero {
      background: linear-gradient(145deg, #ffffff 0%, #fff8f8 30%, #fff0f0 100%);
    }

    /* Floating decorative elements */
    .floating-shape {
      position: absolute;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(185, 28, 28, 0.04), transparent 70%);
      pointer-events: none;
    }

    /* Custom scrollbar - hide horizontal */
    ::-webkit-scrollbar {
      width: 8px;
      height: 0;
    }
    ::-webkit-scrollbar-track {
      background: #fef2f2;
    }
    ::-webkit-scrollbar-thumb {
      background: linear-gradient(180deg, #b91c1c, #991b1b);
      border-radius: 9999px;
    }

    /* Pulse animation for status */
    @keyframes pulse-dot {
      0%, 100% { opacity: 1; transform: scale(1); }
      50% { opacity: 0.6; transform: scale(0.85); }
    }
    .pulse-dot {
      animation: pulse-dot 2s ease-in-out infinite;
    }

    /* Extra spacing at bottom */
    .extra-bottom-padding {
      padding-bottom: 4rem;
    }

    /* Card inner spacing enhancements - ALL SIDES */
    .card-inner-spacing {
      padding: 2rem 2rem 2.5rem;
    }

    @media (min-width: 768px) {
      .card-inner-spacing {
        padding: 2.5rem 2.5rem 3rem;
      }
    }

    /* Section padding - all sides */
    .section-padding {
      padding: 1.5rem;
    }

    @media (min-width: 768px) {
      .section-padding {
        padding: 2rem;
      }
    }

    /* Hero card padding */
    .hero-padding {
      padding: 1.5rem;
    }

    @media (min-width: 768px) {
      .hero-padding {
        padding: 2.5rem;
      }
    }

    @media (min-width: 1024px) {
      .hero-padding {
        padding: 3rem;
      }
    }

    /* Trust cards padding */
    .trust-card-padding {
      padding: 1.5rem;
    }

    @media (min-width: 768px) {
      .trust-card-padding {
        padding: 2rem;
      }
    }
  </style>
</head>
<body class="bg-[#faf5f5] font-sans antialiased min-h-screen p-4 md:p-6 lg:p-8 relative dot-pattern extra-bottom-padding overflow-x-hidden">

  <!-- Floating decorative shapes -->
  <div class="floating-shape w-[300px] h-[300px] top-[-100px] right-[-50px]"></div>
  <div class="floating-shape w-[200px] h-[200px] bottom-[100px] left-[-80px]"></div>
  <div class="floating-shape w-[150px] h-[150px] bottom-[300px] right-[10%]"></div>

  <div class="w-full max-w-6xl mx-auto relative z-10">

    <!-- ============================================ -->
    <!-- HERO CARD · RENTIFY (ultra-premium) -->
    <!-- ============================================ -->
    <div class="card-glass hero-padding rounded-3xl glow-red-strong hover:shadow-2xl transition-all duration-500 mb-8 bg-red-gradient-hero border border-white/60 relative overflow-hidden">
      
      <!-- Decorative accent line -->
      <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-red-500 to-transparent opacity-40"></div>

      <!-- Top bar: Logo + badge -->
      <div class="flex flex-wrap items-center justify-between gap-4">
        <div class="flex items-center gap-4">
          <!-- Enhanced Rentify icon -->
          <div class="p-3 rounded-2xl bg-gradient-to-br from-red-50 to-white border border-red-200/50 shadow-sm hover:shadow-md transition-all">
            <svg class="h-10 w-auto" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect x="5" y="20" width="34" height="19" rx="3" fill="#b91c1c" fill-opacity="0.9" />
              <path d="M22 4L2 17L42 17L22 4Z" fill="#b91c1c" fill-opacity="0.6" />
              <rect x="16" y="26" width="12" height="13" rx="2" fill="white" />
              <circle cx="22" cy="32" r="2.5" fill="#b91c1c" />
            </svg>
          </div>
          <div>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight leading-none">
              <span class="text-gradient-red">Rentify</span>
            </h1>
            <span class="text-xs text-gray-400 font-medium tracking-widest uppercase">Premium rental platform</span>
          </div>
        </div>
        <div class="flex items-center gap-3">
          <span class="badge-premium">✨ New</span>
          <span class="hidden sm:inline-flex items-center gap-2 bg-white/80 backdrop-blur-sm px-5 py-2 rounded-full border border-red-200/50 text-gray-600 text-sm shadow-sm">
            <span class="w-2.5 h-2.5 bg-green-500 rounded-full pulse-dot"></span> 
            <span class="hidden xs:inline font-medium">1,200+</span> active listings
          </span>
        </div>
      </div>

      <!-- Headline -->
      <div class="mt-8">
        <h2 class="text-3xl md:text-5xl lg:text-6xl font-extrabold text-gray-800 leading-tight">
          Welcome to <span class="text-gradient-red">Rentify</span>
          <span class="block text-xl md:text-2xl lg:text-3xl font-medium text-gray-500 mt-2">Find, book, and manage rentals — effortlessly.</span>
        </h2>
      </div>

      <!-- Description with accent border -->
      <div class="mt-6">
        <div class="bg-white/40 backdrop-blur-sm rounded-2xl p-5 border-l-4 border-red-500/40 shadow-sm">
          <p class="text-base md:text-lg text-gray-600 leading-relaxed">
            Rentify is a modern rental platform designed to help users find, book, and manage rental properties with ease.
            Our goal is to provide a simple, secure, and user-friendly experience for both property owners and tenants.
          </p>
        </div>
      </div>

      <!-- Feature list (two columns) with enhanced styling -->
      <div class="mt-7 grid grid-cols-1 sm:grid-cols-2 gap-4 bg-white/30 backdrop-blur-sm rounded-2xl p-5 border border-red-100/30">
        <ul class="feature-list text-sm text-gray-700">
          <li>Browse available rental properties</li>
          <li>View detailed property information</li>
          <li>Make and manage bookings</li>
        </ul>
        <ul class="feature-list text-sm text-gray-700">
          <li>Track your rental history</li>
          <li>Update your profile and account settings</li>
        </ul>
      </div>

      <!-- CTA + thank you message -->
      <div class="mt-8 flex flex-wrap items-center justify-between gap-6 p-6 bg-white/60 backdrop-blur-sm rounded-2xl border border-red-100/40 shadow-sm">
        <div class="flex-1 min-w-[200px]">
          <p class="text-gray-700 text-sm font-medium flex items-center gap-2">
            <span class="text-[#b91c1c] text-xl">✦</span> 
            We are continuously improving our platform and adding new features to enhance your rental experience.
          </p>
          <p class="text-[#b91c1c] font-semibold text-base mt-1 flex items-center gap-2">
            <span class="w-2 h-2 bg-red-600 rounded-full"></span>
            Thank you for choosing Rentify.
          </p>
        </div>
        <div class="flex gap-3 flex-wrap">
          <a href="#" class="group inline-flex items-center gap-2 bg-gradient-to-r from-[#b91c1c] to-[#991b1b] hover:from-[#7f1d1d] hover:to-[#6b1a1a] text-white font-bold py-3.5 px-9 rounded-full transition-all duration-300 shadow-lg shadow-red-200/50 hover:shadow-red-300/60 text-sm tracking-wide">
            Get started
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 group-hover:translate-x-1.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
            </svg>
          </a>
          <a href="#" class="inline-flex items-center px-6 border-2 border-red-200 hover:border-red-400 rounded-full text-gray-600 hover:bg-red-50 transition text-sm font-medium">
            Learn more
          </a>
        </div>
      </div>

      <!-- Stats with enhanced design -->
      <div class="mt-7 grid grid-cols-2 sm:grid-cols-4 gap-4 text-xs text-gray-400 border-t-2 border-red-100/40 pt-6">
        <div class="text-center"><span class="stat-number">2.5k+</span> <span class="text-gray-500 block mt-1">properties</span></div>
        <div class="text-center"><span class="stat-number">98%</span> <span class="text-gray-500 block mt-1">satisfaction</span></div>
        <div class="text-center"><span class="stat-number">24/7</span> <span class="text-gray-500 block mt-1">support</span></div>
        <div class="text-center"><span class="stat-number">⭐ 4.9</span> <span class="text-gray-500 block mt-1">average rating</span></div>
      </div>
    </div>

    <!-- ============================================ -->
    <!-- 4 FEATURE CARDS · enhanced with premium styling -->
    <!-- ============================================ -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">

      <!-- Card 1: Browse -->
      <div class="card-glass card-inner-spacing rounded-2xl hover:shadow-2xl transition-all duration-400 group border border-white/60 hover:border-red-200/40 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-red-50/20 rounded-full -mr-16 -mt-16"></div>
        <div class="flex items-start gap-5 relative">
          <div class="p-4 rounded-2xl icon-ring group-hover:scale-110 transition-transform duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" class="w-7 h-7">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h7.5" />
            </svg>
          </div>
          <div>
            <h3 class="text-xl font-bold text-gray-800 group-hover:text-[#b91c1c] transition-colors">Browse properties</h3>
            <p class="text-gray-500 text-sm mt-2 leading-relaxed">Explore 2,500+ rentals — apartments, houses, lofts. Filter by price, location, amenities, and more.</p>
            <div class="mt-5 flex flex-wrap gap-2">
              <span class="bg-red-50/90 text-red-700 text-xs px-3 py-1.5 rounded-full border border-red-200/50 font-medium">🔍 smart search</span>
              <span class="bg-red-50/90 text-red-700 text-xs px-3 py-1.5 rounded-full border border-red-200/50 font-medium">📍 map view</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 2: Details -->
      <div class="card-glass card-inner-spacing rounded-2xl hover:shadow-2xl transition-all duration-400 group border border-white/60 hover:border-red-200/40 relative overflow-hidden">
        <div class="absolute bottom-0 left-0 w-32 h-32 bg-red-50/20 rounded-full -ml-16 -mb-16"></div>
        <div class="flex items-start gap-5 relative">
          <div class="p-4 rounded-2xl icon-ring group-hover:scale-110 transition-transform duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" class="w-7 h-7">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
          </div>
          <div>
            <h3 class="text-xl font-bold text-gray-800 group-hover:text-[#b91c1c] transition-colors">Detailed info</h3>
            <p class="text-gray-500 text-sm mt-2 leading-relaxed">High-res photos, 3D tours, floor plans, neighborhood guides, and full specs for every listing.</p>
            <div class="mt-5 flex flex-wrap gap-2">
              <span class="bg-red-50/90 text-red-700 text-xs px-3 py-1.5 rounded-full border border-red-200/50 font-medium">📸 360° view</span>
              <span class="bg-red-50/90 text-red-700 text-xs px-3 py-1.5 rounded-full border border-red-200/50 font-medium">📋 fact sheets</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 3: Bookings -->
      <div class="card-glass card-inner-spacing rounded-2xl hover:shadow-2xl transition-all duration-400 group border border-white/60 hover:border-red-200/40 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-32 h-32 bg-red-50/20 rounded-full -ml-16 -mt-16"></div>
        <div class="flex items-start gap-5 relative">
          <div class="p-4 rounded-2xl icon-ring group-hover:scale-110 transition-transform duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" class="w-7 h-7">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
            </svg>
          </div>
          <div>
            <h3 class="text-xl font-bold text-gray-800 group-hover:text-[#b91c1c] transition-colors">Book & manage</h3>
            <p class="text-gray-500 text-sm mt-2 leading-relaxed">Instant booking, flexible rescheduling, and easy cancellation. All reservations synced to your dashboard.</p>
            <div class="mt-5 flex flex-wrap gap-2">
              <span class="bg-red-50/90 text-red-700 text-xs px-3 py-1.5 rounded-full border border-red-200/50 font-medium">📅 smart calendar</span>
              <span class="bg-red-50/90 text-red-700 text-xs px-3 py-1.5 rounded-full border border-red-200/50 font-medium">🔄 auto-sync</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 4: Profile -->
      <div class="card-glass card-inner-spacing rounded-2xl hover:shadow-2xl transition-all duration-400 group border border-white/60 hover:border-red-200/40 relative overflow-hidden">
        <div class="absolute bottom-0 right-0 w-32 h-32 bg-red-50/20 rounded-full -mr-16 -mb-16"></div>
        <div class="flex items-start gap-5 relative">
          <div class="p-4 rounded-2xl icon-ring group-hover:scale-110 transition-transform duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" class="w-7 h-7">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
            </svg>
          </div>
          <div>
            <h3 class="text-xl font-bold text-gray-800 group-hover:text-[#b91c1c] transition-colors">Profile & history</h3>
            <p class="text-gray-500 text-sm mt-2 leading-relaxed">Manage your personal info, view past rentals, track payments, and adjust preferences.</p>
            <div class="mt-5 flex flex-wrap gap-2">
              <span class="bg-red-50/90 text-red-700 text-xs px-3 py-1.5 rounded-full border border-red-200/50 font-medium">⚙️ full control</span>
              <span class="bg-red-50/90 text-red-700 text-xs px-3 py-1.5 rounded-full border border-red-200/50 font-medium">📊 insights</span>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- ============================================ -->
    <!-- BONUS: Trust & Features Section -->
    <!-- ============================================ -->
    <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="card-glass trust-card-padding rounded-2xl text-center border border-white/60 hover:border-red-200/40 transition-all hover:shadow-xl">
        <div class="text-3xl mb-2">🔒</div>
        <h4 class="font-bold text-gray-800">Secure Payments</h4>
        <p class="text-sm text-gray-500 mt-1">End-to-end encrypted transactions</p>
      </div>
      <div class="card-glass trust-card-padding rounded-2xl text-center border border-white/60 hover:border-red-200/40 transition-all hover:shadow-xl">
        <div class="text-3xl mb-2">🏆</div>
        <h4 class="font-bold text-gray-800">Verified Listings</h4>
        <p class="text-sm text-gray-500 mt-1">All properties are verified by our team</p>
      </div>
      <div class="card-glass trust-card-padding rounded-2xl text-center border border-white/60 hover:border-red-200/40 transition-all hover:shadow-xl">
        <div class="text-3xl mb-2">💬</div>
        <h4 class="font-bold text-gray-800">24/7 Support</h4>
        <p class="text-sm text-gray-500 mt-1">Dedicated team available round the clock</p>
      </div>
    </div>

    <!-- ============================================ -->
    <!-- FOOTER · refined with extra padding -->
    <!-- ============================================ -->
    <div class="mt-12 flex flex-wrap items-center justify-between gap-6 text-sm text-gray-400 border-t-2 border-red-100/40 pt-8 pb-4">
      <div class="flex items-center gap-2">
        <span class="w-2.5 h-2.5 bg-red-600 rounded-full"></span>
        <span>crafted with <span class="text-[#b91c1c] font-bold">♥</span> for renters</span>
      </div>
      <div class="flex flex-wrap gap-6">
        <span class="font-medium text-gray-500">Rentify · premium red & white</span>
        <span class="hidden sm:inline text-gray-300">|</span>
        <a href="#" class="link-underline-red text-gray-500 hover:text-[#b91c1c] transition font-medium">About</a>
        <a href="#" class="link-underline-red text-gray-500 hover:text-[#b91c1c] transition font-medium">Contact</a>
        <a href="#" class="link-underline-red text-gray-500 hover:text-[#b91c1c] transition font-medium">Privacy</a>
        <a href="#" class="link-underline-red text-gray-500 hover:text-[#b91c1c] transition font-medium">Support</a>
      </div>
    </div>

    <!-- Extra bottom spacing visual -->
    <div class="mt-6 text-center text-xs text-gray-300 opacity-40">
      <span>⬇︎</span> End of page <span>⬇︎</span>
    </div>

  </div>

</body>
</html>