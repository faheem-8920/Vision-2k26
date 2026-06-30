<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin · User Profile</title>
  <!-- Bootstrap 5 + Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
  <!-- Google Font (Inter) -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet" />
  <style>
    /* ===== GLOBAL RESET & THEME ===== */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: #f0eaea;
      font-family: 'Inter', system-ui, -apple-system, sans-serif;
      padding: 2.5rem 0;
      min-height: 100vh;
      display: flex;
      align-items: center;
      background-image: radial-gradient(circle at 10% 20%, rgba(200, 50, 50, 0.03) 0%, transparent 50%),
                        radial-gradient(circle at 90% 80%, rgba(200, 50, 50, 0.04) 0%, transparent 50%);
    }

    /* ===== ENTRANCE ANIMATION ===== */
    .profile-wrapper {
      animation: entrance 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
      width: 100%;
    }
    @keyframes entrance {
      0% { opacity: 0; transform: translateY(50px) scale(0.96); }
      100% { opacity: 1; transform: translateY(0) scale(1); }
    }

    /* ===== PROFILE CARD (premium) ===== */
    .profile-card {
      background: #ffffff;
      border-radius: 40px;
      overflow: hidden;
      box-shadow: 0 24px 64px -20px rgba(140, 20, 20, 0.22);
      transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
      border: 1px solid rgba(200, 60, 60, 0.05);
      position: relative;
    }
    .profile-card:hover {
      box-shadow: 0 40px 96px -24px rgba(160, 20, 20, 0.30);
      transform: translateY(-6px) scale(1.002);
    }

    /* cover with animated gradient */
    .cover {
      height: 210px;
      background: linear-gradient(135deg, #8a0000, #d42a2a, #b30000);
      position: relative;
      overflow: hidden;
    }
    .cover::before {
      content: '';
      position: absolute;
      inset: 0;
      background: radial-gradient(circle at 30% 20%, rgba(255,255,255,0.10) 0%, transparent 70%);
      animation: shimmer 6s ease-in-out infinite alternate;
    }
    @keyframes shimmer {
      0% { opacity: 0.5; transform: scale(1); }
      100% { opacity: 1; transform: scale(1.2); }
    }
    .cover::after {
      content: '';
      position: absolute;
      top: -100px;
      right: -80px;
      width: 400px;
      height: 400px;
      background: rgba(255, 255, 255, 0.06);
      border-radius: 50%;
      transition: all 1s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .profile-card:hover .cover::after {
      transform: scale(1.6) translateX(40px);
      opacity: 0.4;
    }

    /* floating particles on cover */
    .particle {
      position: absolute;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.08);
      animation: float 8s ease-in-out infinite;
    }
    .particle:nth-child(1) { width: 60px; height: 60px; top: 20%; left: 10%; animation-delay: 0s; }
    .particle:nth-child(2) { width: 40px; height: 40px; top: 60%; right: 15%; animation-delay: 2s; }
    .particle:nth-child(3) { width: 80px; height: 80px; bottom: 10%; left: 40%; animation-delay: 4s; }
    @keyframes float {
      0%, 100% { transform: translateY(0) scale(1); opacity: 0.3; }
      50% { transform: translateY(-20px) scale(1.1); opacity: 0.6; }
    }

    /* profile image with glow ring */
    .profile-img {
      width: 170px;
      height: 170px;
      border-radius: 50%;
      border: 6px solid white;
      object-fit: cover;
      margin-top: -85px;
      background: white;
      box-shadow: 0 16px 40px -12px rgba(160, 20, 20, 0.30);
      transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
      position: relative;
      z-index: 2;
    }
    .profile-img-wrapper {
      position: relative;
      display: inline-block;
    }
    .profile-img-wrapper::before {
      content: '';
      position: absolute;
      inset: -8px;
      border-radius: 50%;
      background: linear-gradient(135deg, #c62828, #ff6b6b, #c62828);
      opacity: 0;
      transition: all 0.5s ease;
      z-index: 0;
      filter: blur(8px);
    }
    .profile-img-wrapper:hover::before {
      opacity: 0.6;
      animation: spinGlow 3s linear infinite;
    }
    @keyframes spinGlow {
      0% { transform: rotate(0deg) scale(1); }
      50% { transform: rotate(180deg) scale(1.1); }
      100% { transform: rotate(360deg) scale(1); }
    }
    .profile-img:hover {
      transform: scale(1.05) rotate(-2deg);
      border-color: #ffd0d0;
      box-shadow: 0 24px 56px -12px rgba(180, 20, 20, 0.40);
    }

    .info h2 {
      font-weight: 800;
      color: #1a1414;
      letter-spacing: -0.5px;
      font-size: 2.1rem;
    }
    .info .text-muted {
      color: #6b4f4f !important;
      font-weight: 500;
      font-size: 1.05rem;
    }

    /* badges with premium styling */
    .badge-role {
      background: linear-gradient(135deg, #b71c1c, #d32f2f);
      font-size: 0.85rem;
      padding: 0.55rem 1.8rem;
      border-radius: 60px;
      font-weight: 600;
      letter-spacing: 0.4px;
      transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
      color: white;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      box-shadow: 0 4px 16px rgba(190, 30, 30, 0.25);
    }
    .badge-role:hover {
      background: linear-gradient(135deg, #a00000, #c62828);
      box-shadow: 0 8px 28px rgba(190, 30, 30, 0.40);
      transform: scale(1.05) translateY(-2px);
    }

    .badge-verified {
      background: linear-gradient(135deg, #1e7e34, #2e9b4a);
      font-size: 0.85rem;
      padding: 0.55rem 1.6rem;
      border-radius: 60px;
      transition: all 0.4s ease;
      box-shadow: 0 4px 16px rgba(30, 126, 52, 0.20);
    }
    .badge-verified:hover {
      transform: scale(1.05) translateY(-2px);
      box-shadow: 0 8px 28px rgba(30, 126, 52, 0.30);
    }
    .badge-notverified {
      background: linear-gradient(135deg, #a02828, #c62828);
      font-size: 0.85rem;
      padding: 0.55rem 1.6rem;
      border-radius: 60px;
      transition: all 0.4s ease;
      box-shadow: 0 4px 16px rgba(160, 40, 40, 0.20);
    }
    .badge-notverified:hover {
      transform: scale(1.05) translateY(-2px);
      box-shadow: 0 8px 28px rgba(160, 40, 40, 0.30);
    }

    /* ===== STAT CARDS (glassmorphism + gradient) ===== */
    .stat-card {
      border: none;
      border-radius: 28px;
      overflow: hidden;
      color: white;
      transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
      box-shadow: 0 16px 40px -14px rgba(140, 20, 20, 0.20);
      position: relative;
      backdrop-filter: blur(2px);
    }
    .stat-card:hover {
      transform: translateY(-12px) scale(1.03);
      box-shadow: 0 32px 64px -20px rgba(160, 20, 20, 0.35);
    }
    .stat-card::after {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(255,255,255,0.12) 0%, transparent 60%);
      pointer-events: none;
    }
    .red-gradient {
      background: linear-gradient(145deg, #b71c1c, #e53935);
    }
    .dark-gradient {
      background: linear-gradient(145deg, #7f0000, #c62828);
    }
    .stat-card i {
      font-size: 3.5rem;
      opacity: 0.15;
      position: absolute;
      right: 20px;
      top: 20px;
      transition: all 0.5s ease;
    }
    .stat-card:hover i {
      opacity: 0.30;
      transform: scale(1.15) rotate(-6deg);
    }
    .stat-card .card-body {
      padding: 1.8rem 2rem;
      position: relative;
      z-index: 1;
    }
    .stat-card h6 {
      font-weight: 400;
      letter-spacing: 0.6px;
      opacity: 0.85;
      margin-bottom: 4px;
      font-size: 0.85rem;
      text-transform: uppercase;
    }
    .stat-card h2 {
      font-weight: 800;
      margin: 0;
      font-size: 2.4rem;
      letter-spacing: -0.5px;
    }
    .stat-card .trend {
      font-size: 0.75rem;
      opacity: 0.7;
      display: inline-flex;
      align-items: center;
      gap: 4px;
      margin-top: 4px;
    }
    .stat-card .trend i { font-size: 0.9rem; opacity: 0.8; position: static; }

    /* ===== SECTION CARDS (premium) ===== */
    .section-card {
      background: white;
      border-radius: 32px;
      padding: 2rem 2.2rem;
      box-shadow: 0 8px 40px rgba(0, 0, 0, 0.04);
      border: 1px solid #f3e8e8;
      transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
      height: 100%;
      position: relative;
      overflow: hidden;
    }
    .section-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 5px;
      background: linear-gradient(90deg, #b71c1c, #e53935, #ff6b6b, #b71c1c);
      background-size: 300% 100%;
      opacity: 0;
      transition: opacity 0.5s ease;
    }
    .section-card:hover::before {
      opacity: 1;
      animation: gradientMove 3s ease infinite;
    }
    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }
    .section-card:hover {
      box-shadow: 0 24px 64px -20px rgba(150, 30, 30, 0.10);
      border-color: #f0dada;
      transform: translateY(-4px);
    }

    .section-card h4 {
      font-weight: 700;
      color: #1a1414;
      display: flex;
      align-items: center;
      gap: 12px;
      font-size: 1.35rem;
    }
    .section-card h4 i {
      color: #c62828;
      font-size: 1.6rem;
    }

    /* personal info rows – premium */
    .info-row {
      border-bottom: 1px solid #f5ecec;
      padding: 0.9rem 0.6rem;
      transition: all 0.3s ease;
      border-radius: 12px;
      padding-left: 10px;
    }
    .info-row:hover {
      background: #fcf5f5;
      padding-left: 20px;
      border-bottom-color: #f0d0d0;
      transform: translateX(4px);
    }
    .info-row strong {
      color: #4d2b2b;
      font-weight: 600;
      font-size: 0.75rem;
      text-transform: uppercase;
      letter-spacing: 0.6px;
      display: block;
      margin-bottom: 3px;
    }
    .info-row strong i {
      color: #c62828;
      margin-right: 4px;
    }
    .info-row p, .info-row .badge {
      margin-bottom: 0;
      font-weight: 500;
      color: #1a1414;
      font-size: 1rem;
    }
    .info-row .badge {
      font-size: 0.85rem;
      padding: 0.4rem 1.4rem;
      border-radius: 60px;
    }

    /* list group – summary with premium styling */
    .list-group-item {
      border: none;
      background: transparent;
      padding: 0.9rem 0.4rem;
      border-bottom: 1px solid #f5eaea;
      font-weight: 500;
      transition: all 0.3s ease;
      border-radius: 12px;
      padding-left: 8px;
    }
    .list-group-item:hover {
      background: #fcf2f2;
      padding-left: 20px;
      border-bottom-color: #f0d0d0;
    }
    .list-group-item span {
      font-weight: 700;
      color: #b71c1c;
      background: #fce8e8;
      padding: 0.15rem 1rem;
      border-radius: 40px;
      font-size: 0.9rem;
      transition: all 0.3s ease;
    }
    .list-group-item:hover span {
      background: #c62828;
      color: white;
      transform: scale(1.05);
    }

    /* ===== OWNER REQUEST CARD (premium) ===== */
    .owner-card {
      background: white;
      border-radius: 32px;
      padding: 2rem 2.2rem;
      box-shadow: 0 8px 40px rgba(0,0,0,0.04);
      border-left: 10px solid #c62828;
      transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
      margin-top: 2rem;
      position: relative;
      overflow: hidden;
    }
    .owner-card::after {
      content: '';
      position: absolute;
      top: -50%;
      right: -20%;
      width: 300px;
      height: 300px;
      background: rgba(200, 40, 40, 0.02);
      border-radius: 50%;
      pointer-events: none;
    }
    .owner-card:hover {
      box-shadow: 0 24px 64px -20px rgba(160, 20, 20, 0.12);
      transform: translateX(6px);
      border-left-color: #b71c1c;
    }
    .owner-card h4 i {
      color: #c62828;
    }
    .bg-soft-red {
      background: #fcecec;
      border-radius: 16px;
      border-left: 5px solid #c62828;
      padding: 1rem 1.4rem;
      transition: 0.3s;
    }
    .bg-soft-red:hover {
      background: #fce0e0;
      transform: translateX(4px);
    }

    /* ===== BACK BUTTON (premium) ===== */
    .btn-outline-red {
      border: 2px solid #c62828;
      color: #c62828;
      border-radius: 60px;
      padding: 0.7rem 2.8rem;
      font-weight: 600;
      transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
      background: transparent;
      display: inline-flex;
      align-items: center;
      gap: 12px;
      font-size: 1rem;
      text-decoration: none;
      position: relative;
      overflow: hidden;
    }
    .btn-outline-red::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, #c62828, #b71c1c);
      opacity: 0;
      transition: opacity 0.4s ease;
      border-radius: 60px;
    }
    .btn-outline-red:hover {
      color: white;
      box-shadow: 0 12px 40px -12px rgba(190, 30, 30, 0.45);
      transform: translateY(-4px) scale(1.02);
      border-color: #b71c1c;
    }
    .btn-outline-red:hover::before {
      opacity: 1;
    }
    .btn-outline-red i, .btn-outline-red span {
      position: relative;
      z-index: 1;
    }
    .btn-outline-red i {
      transition: 0.3s;
    }
    .btn-outline-red:hover i {
      transform: translateX(-8px);
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 576px) {
      .profile-img {
        width: 130px;
        height: 130px;
        margin-top: -65px;
      }
      .cover { height: 140px; }
      .section-card { padding: 1.2rem; }
      .stat-card .card-body { padding: 1.2rem; }
      .stat-card h2 { font-size: 1.8rem; }
      .info h2 { font-size: 1.6rem; }
    }

    /* floating decorative elements */
    .dot-pattern {
      position: absolute;
      right: 30px;
      bottom: 30px;
      opacity: 0.04;
      font-size: 4rem;
      letter-spacing: 10px;
      pointer-events: none;
      color: #c62828;
    }

    /* status indicator dot */
    .status-dot {
      display: inline-block;
      width: 10px;
      height: 10px;
      border-radius: 50%;
      margin-right: 6px;
      animation: pulse 2s ease-in-out infinite;
    }
    .status-dot.online { background: #2e9b4a; }
    .status-dot.offline { background: #c62828; }
    @keyframes pulse {
      0%, 100% { opacity: 1; transform: scale(1); }
      50% { opacity: 0.5; transform: scale(0.8); }
    }
  </style>
</head>
<body>

<div class="container profile-wrapper">

  {{-- ========== PROFILE CARD ========== --}}
  <div class="profile-card mb-4">
    <div class="cover">
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
    </div>

    <div class="text-center px-3 pb-4 position-relative">
      <div class="profile-img-wrapper">
        @if(isset($user->profile_image) && $user->profile_image)
          <img src="{{ asset('storage/'.$user->profile_image) }}" class="profile-img" alt="profile">
        @else
          <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name ?? 'User') }}&background=c62828&color=fff&size=200&bold=true&font-size=0.5" class="profile-img" alt="avatar">
        @endif
      </div>

      <div class="info mt-3">
        <h2>{{ $user->name ?? 'Alex Rivera' }}</h2>
        <p class="text-muted">
          <i class="bi bi-envelope me-1"></i> {{ $user->email ?? 'alex@example.com' }}
        </p>

        <div class="d-flex flex-wrap justify-content-center gap-2 mt-2">
          <span class="badge-role">
            <i class="bi bi-shield-fill-check"></i> {{ ucfirst($user->role ?? 'admin') }}
          </span>

          @if(isset($user->is_verified) && $user->is_verified)
            <span class="badge badge-verified">
              <i class="bi bi-check-circle-fill"></i> Verified
            </span>
          @else
            <span class="badge badge-notverified">
              <i class="bi bi-x-circle-fill"></i> Not Verified
            </span>
          @endif

          <span class="badge bg-light text-dark border" style="border-radius:60px; padding:0.5rem 1.4rem;">
            <span class="status-dot online"></span> Active
          </span>
        </div>
      </div>

      <div class="dot-pattern">•••</div>
    </div>
  </div>

  {{-- ========== STATS ROW ========== --}}
  <div class="row g-4 mb-4">
    <div class="col-md-3 col-6">
      <div class="card stat-card red-gradient">
        <div class="card-body">
          <i class="bi bi-box-seam"></i>
          <h6>Total Items</h6>
          <h2>{{ $stats['items'] ?? 0 }}</h2>
          <div class="trend"><i class="bi bi-arrow-up"></i> +12%</div>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-6">
      <div class="card stat-card dark-gradient">
        <div class="card-body">
          <i class="bi bi-calendar-check"></i>
          <h6>Bookings</h6>
          <h2>{{ $stats['renterBookings'] ?? 0 }}</h2>
          <div class="trend"><i class="bi bi-arrow-up"></i> +8%</div>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-6">
      <div class="card stat-card red-gradient">
        <div class="card-body">
          <i class="bi bi-heart-fill"></i>
          <h6>Wishlist</h6>
          <h2>{{ $stats['wishlist'] ?? 0 }}</h2>
          <div class="trend"><i class="bi bi-arrow-up"></i> +5%</div>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-6">
      <div class="card stat-card dark-gradient">
        <div class="card-body">
          <i class="bi bi-cash-stack"></i>
          <h6>Revenue</h6>
          <h2>Rs {{ number_format($stats['revenue'] ?? 0) }}</h2>
          <div class="trend"><i class="bi bi-arrow-up"></i> +18%</div>
        </div>
      </div>
    </div>
  </div>

  {{-- ========== MAIN ROW: PERSONAL + SUMMARY ========== --}}
  <div class="row g-4">

    {{-- PERSONAL INFORMATION --}}
    <div class="col-lg-8">
      <div class="section-card">
        <h4 class="mb-3">
          <i class="bi bi-person-fill"></i> Personal Information
          <span style="font-size:0.7rem; font-weight:400; color:#b38080; margin-left:auto;">
            <i class="bi bi-pencil-square"></i> edit profile
          </span>
        </h4>

        <div class="row">
          <div class="col-md-6 info-row">
            <strong><i class="bi bi-hash"></i> User ID</strong>
            <p>{{ $user->id ?? '108' }}</p>
          </div>
          <div class="col-md-6 info-row">
            <strong><i class="bi bi-person"></i> Full Name</strong>
            <p>{{ $user->name ?? 'Alex Rivera' }}</p>
          </div>
          <div class="col-md-6 info-row">
            <strong><i class="bi bi-envelope"></i> Email</strong>
            <p>{{ $user->email ?? 'alex@example.com' }}</p>
          </div>
          <div class="col-md-6 info-row">
            <strong><i class="bi bi-phone"></i> Phone</strong>
            <p>{{ $user->phone ?? '+92 300 1234567' }}</p>
          </div>
          <div class="col-md-6 info-row">
            <strong><i class="bi bi-card-text"></i> CNIC</strong>
            <p>{{ $user->cnic ?? '12345-6789012-3' }}</p>
          </div>
          <div class="col-md-6 info-row">
            <strong><i class="bi bi-shield"></i> Role</strong>
            <span class="badge bg-danger" style="border-radius:60px; padding:0.4rem 1.4rem;">
              {{ ucfirst($user->role ?? 'admin') }}
            </span>
          </div>
          <div class="col-md-6 info-row">
            <strong><i class="bi bi-geo-alt"></i> City</strong>
            <p>{{ $user->city ?? 'Lahore' }}</p>
          </div>
          <div class="col-md-6 info-row">
            <strong><i class="bi bi-house"></i> Address</strong>
            <p>{{ $user->address ?? 'Gulberg III, Lahore' }}</p>
          </div>
          <div class="col-md-6 info-row">
            <strong><i class="bi bi-check-circle"></i> Email Verified</strong>
            @if(isset($user->email_verified_at) && $user->email_verified_at)
              <span class="badge bg-success" style="border-radius:60px;"><i class="bi bi-check-circle-fill"></i> Verified</span>
            @else
              <span class="badge bg-warning text-dark" style="border-radius:60px;"><i class="bi bi-clock"></i> Not Verified</span>
            @endif
          </div>
          <div class="col-md-6 info-row">
            <strong><i class="bi bi-calendar3"></i> Account Created</strong>
            <p>{{ isset($user->created_at) ? $user->created_at->format('d M Y h:i A') : '26 Jun 2026 02:30 PM' }}</p>
          </div>
        </div>
      </div>
    </div>

    {{-- ACCOUNT SUMMARY --}}
    <div class="col-lg-4">
      <div class="section-card">
        <h4 class="mb-3">
          <i class="bi bi-bar-chart-fill"></i> Summary
        </h4>
        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex justify-content-between">
            Items Listed <span>{{ $stats['items'] ?? 0 }}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            Bookings <span>{{ $stats['renterBookings'] ?? 0 }}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            Wishlist <span>{{ $stats['wishlist'] ?? 0 }}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            Reviews <span>{{ $stats['reviews'] ?? 0 }}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            Completed <span>{{ $stats['completed'] ?? 0 }}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            Pending <span>{{ $stats['pending'] ?? 0 }}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between border-0">
            Revenue <span>Rs {{ number_format($stats['revenue'] ?? 0) }}</span>
          </li>
        </ul>
        <div class="mt-3 pt-2 border-top border-light d-flex justify-content-between">
          <small class="text-muted"><i class="bi bi-arrow-repeat me-1"></i> Updated today</small>
        </div>
      </div>
    </div>
  </div>

  {{-- ========== OWNER REQUEST (if exists) ========== --}}
  @if(isset($user->ownerRequest) && $user->ownerRequest)
    <div class="owner-card">
      <h4 class="mb-3">
        <i class="bi bi-file-earmark-person"></i> Owner Request
        <span class="badge bg-danger ms-2" style="font-size:0.8rem; border-radius:60px; padding:0.3rem 1.4rem;">
          {{ ucfirst($user->ownerRequest->status ?? 'pending') }}
        </span>
        <span style="margin-left:auto; font-size:0.75rem; color:#b38080;">
          <i class="bi bi-clock me-1"></i> 2 days ago
        </span>
      </h4>
      <div class="row g-3">
        <div class="col-md-6">
          <strong><i class="bi bi-phone me-1"></i> Phone</strong>
          <p>{{ $user->ownerRequest->phone ?? 'N/A' }}</p>
        </div>
        <div class="col-md-6">
          <strong><i class="bi bi-card-text me-1"></i> CNIC</strong>
          <p>{{ $user->ownerRequest->cnic ?? 'N/A' }}</p>
        </div>
        <div class="col-md-6">
          <strong><i class="bi bi-file-earmark me-1"></i> Proof Type</strong>
          <p>{{ $user->ownerRequest->proof_type ?? 'N/A' }}</p>
        </div>
        <div class="col-md-6">
          <strong><i class="bi bi-calendar me-1"></i> Requested</strong>
          <p>{{ isset($user->ownerRequest->created_at) ? $user->ownerRequest->created_at->format('d M Y') : '26 Jun 2026' }}</p>
        </div>
        <div class="col-md-12">
          <strong><i class="bi bi-sticky-fill me-1"></i> Admin Note</strong>
          <div class="bg-soft-red mt-1">
            {{ $user->ownerRequest->admin_note ?? 'No note available' }}
          </div>
        </div>
      </div>
    </div>
  @endif

  {{-- ========== BACK BUTTON ========== --}}
  <div class="mt-4 d-flex justify-content-start">
    <a href="/users" class="btn-outline-red">
      <i class="bi bi-arrow-left"></i> <span>Back to Users</span>
    </a>
  </div>

</div> {{-- /.container --}}

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
