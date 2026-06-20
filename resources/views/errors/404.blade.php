<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>404 · Rentify</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google Font: Poppins & Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800;14..32,900&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

    <style>
        /* ── RESET & BASE ── */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Poppins', sans-serif;
            background: #faf6f6;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        /* ── 3D PARALLAX BACKGROUND (floating orbs) ── */
        .bg-3d {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.5;
            animation: orbFloat 20s ease-in-out infinite alternate;
            will-change: transform;
        }

        .orb:nth-child(1) {
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, #ff6b7a, #dc3545);
            top: -15%;
            left: -10%;
            animation-duration: 25s;
        }

        .orb:nth-child(2) {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, #ffb3b3, #ff6b7a);
            bottom: -10%;
            right: -8%;
            animation-duration: 30s;
            animation-delay: -5s;
        }

        .orb:nth-child(3) {
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, #ff8a8a, #dc3545);
            top: 50%;
            left: 60%;
            animation-duration: 22s;
            animation-delay: -10s;
            opacity: 0.3;
        }

        .orb:nth-child(4) {
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, #ffb0b0, #ff4d5a);
            bottom: 20%;
            left: 5%;
            animation-duration: 18s;
            animation-delay: -3s;
            opacity: 0.25;
        }

        @keyframes orbFloat {
            0% {
                transform: translate(0, 0) scale(1) rotate(0deg);
            }
            33% {
                transform: translate(60px, -80px) scale(1.1) rotate(120deg);
            }
            66% {
                transform: translate(-40px, 50px) scale(0.9) rotate(240deg);
            }
            100% {
                transform: translate(30px, -20px) scale(1.05) rotate(360deg);
            }
        }

        /* ── GLASS NAVBAR ── */
        .navbar {
            background: rgba(255, 255, 255, 0.65);
            backdrop-filter: blur(18px) saturate(180%);
            -webkit-backdrop-filter: blur(18px) saturate(180%);
            border-bottom: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.04);
            padding: 14px 44px;
            position: relative;
            z-index: 30;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .navbar:hover {
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 12px 50px rgba(0, 0, 0, 0.06);
        }

        .navbar-brand {
            font-weight: 900;
            font-size: 1.7rem;
            color: #dc3545 !important;
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }

        .navbar-brand i {
            font-size: 1.8rem;
            color: #dc3545;
            transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .navbar-brand:hover i {
            transform: scale(1.15) rotate(-6deg);
        }

        .navbar .btn-ghost {
            border-radius: 60px;
            padding: 7px 24px;
            font-weight: 600;
            font-size: 0.85rem;
            border: 1.5px solid rgba(220, 53, 69, 0.2);
            color: #dc3545;
            background: transparent;
            transition: all 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            overflow: hidden;
        }

        .navbar .btn-ghost::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 60px;
            background: linear-gradient(135deg, #dc3545, #c82333);
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: -1;
        }

        .navbar .btn-ghost:hover {
            color: #fff !important;
            border-color: #dc3545;
            transform: translateY(-2px) scale(1.03);
            box-shadow: 0 12px 30px rgba(220, 53, 69, 0.25);
        }

        .navbar .btn-ghost:hover::before {
            opacity: 1;
        }

        .navbar .btn-ghost:active {
            transform: scale(0.95);
        }

        /* ── MAIN HERO ── */
        .error-section {
            text-align: center;
            padding: 20px 20px 10px;
            position: relative;
            z-index: 10;
        }

        /* 3D floating 404 */
        .error-404-wrap {
            position: relative;
            display: inline-block;
            margin-bottom: 10px;
        }

        .error-404 {
            font-size: 11rem;
            font-weight: 900;
            line-height: 1;
            color: #dc3545;
            text-shadow:
                0 0 50px rgba(220, 53, 69, 0.12),
                0 20px 70px rgba(220, 53, 69, 0.08);
            animation: float3D 4s ease-in-out infinite;
            display: flex;
            gap: 0px;
            letter-spacing: -10px;
            position: relative;
            z-index: 2;
        }

        .error-404 span {
            display: inline-block;
            animation: bounceDigit 2.8s ease-in-out infinite;
            transform-origin: center;
        }

        .error-404 span:nth-child(1) {
            animation-delay: 0s;
        }
        .error-404 span:nth-child(2) {
            animation-delay: 0.12s;
        }
        .error-404 span:nth-child(3) {
            animation-delay: 0.24s;
        }

        @keyframes bounceDigit {
            0%,
            100% {
                transform: translateY(0) scale(1) rotate(0deg);
            }
            40% {
                transform: translateY(-20px) scale(1.08) rotate(-2deg);
            }
            60% {
                transform: translateY(-8px) scale(1.04) rotate(1deg);
            }
        }

        @keyframes float3D {
            0%,
            100% {
                transform: translateY(0) rotate(0deg) scale(1);
            }
            50% {
                transform: translateY(-22px) rotate(1.2deg) scale(1.02);
            }
        }

        /* Glow ring */
        .glow-ring {
            position: absolute;
            width: 420px;
            height: 420px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(220, 53, 69, 0.07), transparent 70%);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 0;
            animation: ringPulse 5s ease-in-out infinite;
        }

        @keyframes ringPulse {
            0%,
            100% {
                transform: translate(-50%, -50%) scale(1);
                opacity: 0.6;
            }
            50% {
                transform: translate(-50%, -50%) scale(1.35);
                opacity: 1;
            }
        }

        .error-section h2 {
            font-weight: 800;
            font-size: 2.6rem;
            margin-top: 6px;
            background: linear-gradient(135deg, #dc3545, #ff6b7a, #dc3545);
            background-size: 200% 200%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradientMove 6s ease-in-out infinite;
        }

        @keyframes gradientMove {
            0%,
            100% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
        }

        .error-section .sub-message {
            font-size: 1.15rem;
            color: #6c757d;
            max-width: 520px;
            margin: 6px auto 0;
            font-weight: 400;
            letter-spacing: 0.2px;
        }

        /* ── SEARCH BOX (premium) ── */
        .search-box {
            max-width: 600px;
            margin: 32px auto 12px;
            display: flex;
            border-radius: 80px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 2px solid rgba(255, 255, 255, 0.9);
            box-shadow: 0 10px 50px rgba(0, 0, 0, 0.04), 0 0 0 1px rgba(220, 53, 69, 0.04);
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .search-box:focus-within {
            box-shadow: 0 16px 70px rgba(220, 53, 69, 0.12), 0 0 0 3px rgba(220, 53, 69, 0.15);
            border-color: #dc3545;
            transform: scale(1.01);
            background: rgba(255, 255, 255, 0.95);
        }

        .search-box input {
            flex: 1;
            padding: 18px 28px;
            border: none;
            outline: none;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            background: transparent;
            color: #1a1a1a;
            font-weight: 500;
        }

        .search-box input::placeholder {
            color: #adb5bd;
            font-weight: 400;
            letter-spacing: -0.2px;
        }

        .search-box button {
            background: linear-gradient(135deg, #dc3545, #c82333);
            color: #fff;
            border: none;
            padding: 0 38px;
            font-weight: 700;
            font-size: 0.95rem;
            letter-spacing: 0.4px;
            transition: all 0.35s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .search-box button::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.15), transparent);
            transform: translateX(-100%);
            transition: transform 0.7s ease;
        }

        .search-box button:hover::before {
            transform: translateX(100%);
        }

        .search-box button:hover {
            background: linear-gradient(135deg, #c82333, #a71d2a);
            transform: scale(1.02);
            box-shadow: 0 8px 30px rgba(220, 53, 69, 0.30);
        }

        .search-box button:active {
            transform: scale(0.95);
        }

        /* ── COUNTDOWN ── */
        #redirectText {
            font-weight: 500;
            font-size: 1rem;
            color: #495057 !important;
            margin-top: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        #redirectText .count-badge {
            display: inline-block;
            background: #dc3545;
            color: #fff;
            font-weight: 800;
            font-size: 1.2rem;
            width: 38px;
            height: 38px;
            line-height: 38px;
            text-align: center;
            border-radius: 50%;
            box-shadow: 0 4px 16px rgba(220, 53, 69, 0.30);
            animation: countPulse 1.2s ease-in-out infinite;
            transition: transform 0.2s ease;
        }

        @keyframes countPulse {
            0%,
            100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.12);
            }
        }

        /* ── CATEGORY CARDS (glass + 3D tilt) ── */
        .category-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 24px;
            padding: 26px 16px 22px;
            text-align: center;
            font-weight: 600;
            font-size: 1.05rem;
            color: #1a1a1a;
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.04);
            transition: all 0.45s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            cursor: default;
            position: relative;
            overflow: hidden;
            will-change: transform;
        }

        .category-card::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 24px;
            background: linear-gradient(135deg, rgba(220, 53, 69, 0.04), transparent);
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .category-card:hover::after {
            opacity: 1;
        }

        .category-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 24px 60px rgba(220, 53, 69, 0.12);
            border-color: rgba(220, 53, 69, 0.15);
            background: rgba(255, 255, 255, 0.9);
        }

        .category-card .icon {
            display: block;
            font-size: 2.8rem;
            margin-bottom: 6px;
            transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .category-card:hover .icon {
            transform: scale(1.2) rotate(-8deg);
        }

        .category-card .label {
            position: relative;
            z-index: 2;
            font-weight: 700;
            letter-spacing: -0.3px;
        }

        /* ── ITEM CARDS (glass + 3D) ── */
        .item-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.04);
            transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            cursor: default;
            will-change: transform;
        }

        .item-card:hover {
            transform: translateY(-14px) scale(1.01);
            box-shadow: 0 30px 70px rgba(220, 53, 69, 0.10);
            border-color: rgba(220, 53, 69, 0.10);
            background: rgba(255, 255, 255, 0.92);
        }

        .item-img {
            height: 150px;
            background: linear-gradient(145deg, #ffebeb, #fff5f5);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3.6rem;
            color: #dc3545;
            transition: all 0.6s ease;
            position: relative;
            overflow: hidden;
        }

        .item-img::after {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 30% 40%, rgba(220, 53, 69, 0.06), transparent 70%);
            opacity: 0;
            transition: opacity 0.6s ease;
        }

        .item-card:hover .item-img::after {
            opacity: 1;
        }

        .item-card:hover .item-img {
            background: linear-gradient(145deg, #ffdcdc, #fff0f0);
            transform: scale(1.02);
        }

        .item-card .p-3 {
            padding: 20px 20px 22px !important;
        }

        .item-card h6 {
            font-weight: 800;
            font-size: 1.05rem;
            color: #1a1a1a;
            transition: color 0.3s ease;
            letter-spacing: -0.3px;
        }

        .item-card:hover h6 {
            color: #dc3545;
        }

        .item-card small {
            color: #6c757d;
            font-weight: 500;
            font-size: 0.8rem;
            opacity: 0.8;
        }

        /* ── SUPPORT (glass premium) ── */
        .support {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            padding: 36px 32px;
            border-radius: 28px;
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.04);
            transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            overflow: hidden;
        }

        .support::before {
            content: '';
            position: absolute;
            top: -40%;
            right: -20%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(220, 53, 69, 0.04), transparent 70%);
            border-radius: 50%;
            transition: all 0.7s ease;
        }

        .support:hover::before {
            transform: scale(1.6);
            opacity: 0.8;
        }

        .support:hover {
            transform: translateY(-8px);
            box-shadow: 0 24px 60px rgba(220, 53, 69, 0.08);
            border-color: rgba(220, 53, 69, 0.08);
            background: rgba(255, 255, 255, 0.85);
        }

        .support h5 {
            font-weight: 800;
            font-size: 1.4rem;
            color: #1a1a1a;
            position: relative;
            z-index: 2;
        }

        .support .text-muted {
            font-size: 0.95rem;
            position: relative;
            z-index: 2;
        }

        .support p {
            margin-bottom: 4px;
            position: relative;
            z-index: 2;
        }

        .support .btn-red {
            background: linear-gradient(135deg, #dc3545, #c82333);
            color: #fff;
            border-radius: 60px;
            padding: 12px 38px;
            font-weight: 700;
            border: none;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            box-shadow: 0 8px 30px rgba(220, 53, 69, 0.25);
            position: relative;
            overflow: hidden;
            z-index: 2;
        }

        .support .btn-red::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.15), transparent);
            transform: translateX(-100%);
            transition: transform 0.7s ease;
        }

        .support .btn-red:hover::before {
            transform: translateX(100%);
        }

        .support .btn-red:hover {
            background: linear-gradient(135deg, #c82333, #a71d2a);
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 16px 45px rgba(220, 53, 69, 0.35);
            color: #fff;
        }

        .support .btn-red:active {
            transform: scale(0.95);
        }

        /* ── SECTION TITLES ── */
        .section-title {
            font-weight: 800;
            font-size: 1.7rem;
            color: #1a1a1a;
            position: relative;
            display: inline-block;
            letter-spacing: -0.5px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #dc3545, #ff6b7a);
            border-radius: 10px;
            transition: width 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .section-title:hover::after {
            width: 100px;
        }

        /* ── REVEAL ANIMATION ── */
        .reveal {
            opacity: 0;
            transform: translateY(40px) scale(0.96);
            animation: revealUp 0.9s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
        }

        .reveal:nth-child(1) {
            animation-delay: 0.05s;
        }
        .reveal:nth-child(2) {
            animation-delay: 0.15s;
        }
        .reveal:nth-child(3) {
            animation-delay: 0.25s;
        }
        .reveal:nth-child(4) {
            animation-delay: 0.35s;
        }

        @keyframes revealUp {
            0% {
                opacity: 0;
                transform: translateY(40px) scale(0.96);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 768px) {
            .navbar {
                padding: 12px 20px;
            }
            .navbar-brand {
                font-size: 1.3rem;
            }
            .navbar .btn-ghost {
                padding: 5px 16px;
                font-size: 0.75rem;
            }
            .error-404 {
                font-size: 6.5rem;
                letter-spacing: -6px;
            }
            .glow-ring {
                width: 250px;
                height: 250px;
            }
            .error-section h2 {
                font-size: 1.7rem;
            }
            .error-section .sub-message {
                font-size: 0.95rem;
            }
            .search-box {
                max-width: 100%;
                border-radius: 60px;
            }
            .search-box input {
                padding: 14px 20px;
                font-size: 0.9rem;
            }
            .search-box button {
                padding: 0 22px;
                font-size: 0.85rem;
            }
            .category-card {
                padding: 18px 12px;
                font-size: 0.9rem;
            }
            .category-card .icon {
                font-size: 2.2rem;
            }
            .item-img {
                height: 110px;
                font-size: 2.6rem;
            }
            .section-title {
                font-size: 1.3rem;
            }
            .support {
                padding: 24px 18px;
            }
        }

        @media (max-width: 480px) {
            .error-404 {
                font-size: 4.8rem;
                letter-spacing: -4px;
            }
            .glow-ring {
                width: 180px;
                height: 180px;
            }
            .error-section h2 {
                font-size: 1.3rem;
            }
            .navbar .btn-ghost {
                padding: 4px 12px;
                font-size: 0.7rem;
            }
            .search-box button {
                padding: 0 16px;
                font-size: 0.8rem;
            }
        }

        /* ── Z-INDEX LAYERS ── */
        .container {
            position: relative;
            z-index: 10;
        }

        .nav-btns {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        /* ── SCROLL BAR STYLING ── */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: #dc3545;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #c82333;
        }
    </style>
</head>

<body>

    <!-- ─── 3D BACKGROUND ORBS ─── -->
    <div class="bg-3d">
        <div class="orb"></div>
        <div class="orb"></div>
        <div class="orb"></div>
        <div class="orb"></div>
    </div>

    <!-- ─── NAVBAR ─── -->
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">
            <i class="bi bi-house-heart-fill"></i> Rentify
        </a>
        <div class="ms-auto nav-btns">
            <a href="/" class="btn-ghost btn"><i class="bi bi-house me-1"></i>Home</a>
            <a href="/categories" class="btn-ghost btn"><i class="bi bi-grid me-1"></i>Categories</a>
            <a href="/contact" class="btn-ghost btn"><i class="bi bi-envelope me-1"></i>Contact</a>
        </div>
    </nav>

    <!-- ─── ERROR HERO ─── -->
    <div class="container error-section">

        <div class="error-404-wrap">
            <div class="glow-ring"></div>
            <div class="error-404">
                <span>4</span><span>0</span><span>4</span>
            </div>
        </div>

        <h2 class="fw-bold">🚫 This item seems to be out for rent!</h2>
        <p class="sub-message">The page you're looking for might have been removed or is temporarily unavailable.</p>

        <!-- SEARCH -->
        <div class="search-box">
            <input type="text" id="searchInput" placeholder="Search rental items..." />
            <button onclick="searchItem()"><i class="bi bi-search"></i> Search</button>
        </div>

        <div id="redirectText">
            <i class="bi bi-arrow-repeat me-1"></i> Redirecting to homepage in
            <span class="count-badge" id="count">10</span> seconds
        </div>

    </div>

    <!-- ─── CATEGORIES ─── -->
    <div class="container mt-5">
        <h4 class="text-center mb-4 section-title">Popular Categories</h4>

        <div class="row g-4">
            <div class="col-md-3 col-6 reveal">
                <div class="category-card">
                    <span class="icon">🚗</span>
                    <span class="label">Vehicles</span>
                </div>
            </div>
            <div class="col-md-3 col-6 reveal">
                <div class="category-card">
                    <span class="icon">📷</span>
                    <span class="label">Cameras</span>
                </div>
            </div>
            <div class="col-md-3 col-6 reveal">
                <div class="category-card">
                    <span class="icon">💻</span>
                    <span class="label">Laptops</span>
                </div>
            </div>
            <div class="col-md-3 col-6 reveal">
                <div class="category-card">
                    <span class="icon">🎮</span>
                    <span class="label">Gaming</span>
                </div>
            </div>
        </div>
    </div>

    <!-- ─── LATEST ITEMS ─── -->
    <div class="container mt-5">
        <h4 class="text-center mb-4 section-title">Latest Items</h4>

        <div class="row g-4">
            <div class="col-md-3 col-6 reveal">
                <div class="item-card">
                    <div class="item-img">💻</div>
                    <div class="p-3">
                        <h6>Laptop</h6>
                        <small>Available for rent</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 reveal">
                <div class="item-card">
                    <div class="item-img">📷</div>
                    <div class="p-3">
                        <h6>Canon Camera</h6>
                        <small>HD Photography</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 reveal">
                <div class="item-card">
                    <div class="item-img">🚗</div>
                    <div class="p-3">
                        <h6>Honda Civic</h6>
                        <small>Luxury Ride</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 reveal">
                <div class="item-card">
                    <div class="item-img">🎮</div>
                    <div class="p-3">
                        <h6>PS5 Console</h6>
                        <small>Gaming Fun</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ─── SUPPORT ─── -->
    <div class="container mt-5 mb-5">
        <div class="support">
            <h5><i class="bi bi-headset me-2" style="color:#dc3545;"></i>Need Help?</h5>
            <p class="text-muted">Our support team is here for you 24/7</p>
            <p>
                <i class="bi bi-envelope me-2" style="color:#dc3545;"></i> support@rentify.com &nbsp;|&nbsp;
                <i class="bi bi-telephone me-2" style="color:#dc3545;"></i> +92 XXX XXXXXXX
            </p>
            <a href="/contact" class="btn-red btn mt-2"><i class="bi bi-chat-dots me-2"></i>Contact Support</a>
        </div>
    </div>

    <!-- ─── SCRIPTS ─── -->
    <script>
        // ── SEARCH ──
        function searchItem() {
            const input = document.getElementById('searchInput');
            const value = input.value.trim();
            if (value) {
                window.location.href = '/search?q=' + encodeURIComponent(value);
            } else {
                input.focus();
                input.style.borderColor = '#dc3545';
                input.style.boxShadow = '0 0 0 4px rgba(220,53,69,0.2)';
                setTimeout(() => {
                    input.style.borderColor = '';
                    input.style.boxShadow = '';
                }, 700);
            }
        }

        document.getElementById('searchInput').addEventListener('keydown', e => {
            if (e.key === 'Enter') searchItem();
        });

        // ── COUNTDOWN ──
        let count = 10;
        const countEl = document.getElementById('count');

        const timer = setInterval(() => {
            count--;
            countEl.innerText = count;
            countEl.style.transform = 'scale(1.25)';
            setTimeout(() => { countEl.style.transform = 'scale(1)'; }, 200);

            if (count <= 0) {
                clearInterval(timer);
                window.location.href = '/';
            }
        }, 1000);

        // ── 3D TILT ON CARDS (interactive) ──
        document.querySelectorAll('.item-card, .category-card').forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = (e.clientX - rect.left) / rect.width - 0.5;
                const y = (e.clientY - rect.top) / rect.height - 0.5;
                card.style.transform =
                    `perspective(800px) rotateY(${x * 8}deg) rotateX(${y * -8}deg) translateY(-8px) scale(1.01)`;
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = '';
            });
        });

        // ── REVEAL OBSERVER ──
        const reveals = document.querySelectorAll('.reveal');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                }
            });
        }, { threshold: 0.15 });

        reveals.forEach(el => {
            el.style.animationPlayState = 'paused';
            observer.observe(el);
        });

        // ── PARALLAX 404 (subtle) ──
        const errorWrap = document.querySelector('.error-404-wrap');
        document.addEventListener('mousemove', (e) => {
            const x = (e.clientX / window.innerWidth - 0.5) * 8;
            const y = (e.clientY / window.innerHeight - 0.5) * 8;
            if (errorWrap) {
                errorWrap.style.transform = `perspective(600px) rotateY(${x}deg) rotateX(${y * -1}deg)`;
            }
        });

        console.log('✨ Rentify 404 — elevated experience');
    </script>

</body>
</html>