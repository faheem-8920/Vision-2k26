<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-red">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Rentify Admin Dashboard</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('Admin/assets/') }}/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('Admin/assets/') }}/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="{{ asset('Admin/assets/') }}/vendor/css/core.css" />
    <link rel="stylesheet" href="{{ asset('Admin/assets/') }}/vendor/css/theme-default.css" />
    <link rel="stylesheet" href="{{ asset('Admin/assets/') }}/css/demo.css" />
    <link rel="stylesheet" href="{{ asset('Admin/assets/') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('Admin/assets/') }}/vendor/libs/apex-charts/apex-charts.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* ============================================================
           RENTIFY PREMIUM THEME - SIDEBAR & TOPBAR
           ============================================================ */
        
        /* ----- CSS Variables ----- */
        :root {
            --primary-red: #e53935;
            --primary-red-dark: #c62828;
            --primary-red-light: #ff6b6b;
            --primary-red-gradient: linear-gradient(135deg, #e53935 0%, #c62828 100%);
            --primary-gold: #FFD700;
            --primary-gold-gradient: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
            --bg-white: #ffffff;
            --bg-soft: #faf8f8;
            --shadow-red: 0 8px 30px rgba(229, 57, 53, 0.25);
            --shadow-red-hover: 0 12px 40px rgba(229, 57, 53, 0.35);
            --transition-smooth: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-bounce: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            --border-radius-lg: 20px;
            --border-radius-md: 14px;
            --border-radius-sm: 10px;
            --sidebar-width: 280px; /* single source of truth for our custom sidebar width */
        }

        /* ----- Global Styles ----- */
        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background: var(--bg-soft);
            transition: background 0.3s ease;
        }

        /* ============================================================
           ANIMATIONS
           ============================================================ */
        @keyframes logoFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-4px); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-8px) rotate(-2deg); }
        }

        @keyframes rotateRing {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes pulseRing {
            0%, 100% { transform: scale(1); opacity: 0.6; }
            50% { transform: scale(1.1); opacity: 1; }
        }

        @keyframes sparkle {
            0%, 100% { opacity: 1; transform: scale(1) rotate(0deg); }
            50% { opacity: 0.5; transform: scale(1.3) rotate(180deg); }
        }

        @keyframes glowPulse {
            0%, 100% { box-shadow: var(--shadow-red); }
            50% { box-shadow: 0 8px 35px rgba(229, 57, 53, 0.5); }
        }

        @keyframes iconPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.15) rotate(-3deg); }
        }

        @keyframes badgePulse {
            0% { box-shadow: 0 0 0 0 rgba(229, 57, 53, 0.4); }
            70% { box-shadow: 0 0 0 8px rgba(229, 57, 53, 0); }
            100% { box-shadow: 0 0 0 0 rgba(229, 57, 53, 0); }
        }

        @keyframes slideDown {
            0% { opacity: 0; transform: translateY(-10px) scale(0.98); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }

        @keyframes dropdownFade {
            0% { opacity: 0; transform: translateY(-10px) scale(0.96); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }

        @keyframes avatarPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.08); }
        }

        /* ============================================================
           SIDEBAR ENHANCEMENTS
           ============================================================ */
        .layout-menu {
            background: var(--bg-white) !important;
            border-right: none !important;
            box-shadow: 4px 0 30px rgba(0, 0, 0, 0.04) !important;
            transition: var(--transition-smooth) !important;
            position: fixed !important;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 1040;
            width: var(--sidebar-width) !important;
            transform: translateX(0);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.3s ease;
        }

        .layout-menu.collapsed {
            transform: translateX(-100%) !important;
        }

        /* ----- FIX #1 (verified against Sneat's real core.css source) -----
           ROOT CAUSE: Sneat's vendor CSS uses flexbox + a CSS variable,
           NOT margin-left. The actual rule (core.css, confirmed by
           pulling the file directly) is:

             .layout-menu-fixed:not(.layout-menu-collapsed) .layout-page {
                 padding-inline-start: var(--bs-menu-width);       // 16.25rem
             }
             .layout-menu-fixed.layout-menu-collapsed .layout-page {
                 padding-inline-start: var(--bs-menu-collapsed-width); // 5.25rem
             }

           Sneat's own "collapsed" state is a narrow 5.25rem icon rail,
           NOT a fully hidden sidebar. Your design fully hides the
           sidebar (translateX(-100%)), so Sneat's vendor padding rule
           was still reserving 16.25rem OR 5.25rem of space no matter
           what your custom JS/CSS did — because none of your custom
           classes matched the selectors Sneat actually uses.

           Previous attempt added a SECOND offset (margin-left) on top
           of Sneat's own padding-inline-start, which is what produced
           "two sidebar widths" of empty space when both applied at once.

           FIX: override Sneat's own CSS variable to 0 when the sidebar
           is fully collapsed. This works WITH Sneat's existing mechanism
           instead of stacking a second one on top of it, and needs no
           separate margin/padding rule of our own at all. */
        html {
            --bs-menu-width: var(--sidebar-width); /* align Sneat's expanded-width variable to our actual 280px sidebar, was its default 16.25rem (260px) */
        }

        html.layout-menu-collapsed {
            --bs-menu-collapsed-width: 0rem !important;
        }

        .layout-page {
            transition: padding-inline-start 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* ----- Sidebar Toggle Buttons ----- */
        .sidebar-toggle-btn {
            position: fixed;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1050;
            width: 32px;
            height: 60px;
            background: var(--bg-white);
            color: var(--primary-red);
            border: 2px solid rgba(229, 57, 53, 0.15);
            border-left: none;
            border-radius: 0 10px 10px 0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            cursor: pointer;
            transition: var(--transition-bounce);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            font-weight: 700;
        }

        .sidebar-toggle-btn:hover {
            background: var(--primary-red-gradient);
            color: white;
            border-color: transparent;
            box-shadow: var(--shadow-red);
            width: 38px;
        }

        .sidebar-toggle-btn i {
            transition: var(--transition-smooth);
        }

        .sidebar-toggle-btn:hover i {
            transform: scale(1.2);
        }

        /* Open button (>) - shown when sidebar is closed */
        .sidebar-toggle-open {
            left: 0;
            display: none;
        }

        .sidebar-toggle-open.show {
            display: flex;
        }

        /* Close button (<) - shown when sidebar is open */
        .sidebar-toggle-close {
            left: var(--sidebar-width);
            display: none;
        }

        .sidebar-toggle-close.show {
            display: flex;
        }

        /* When sidebar is collapsed, move close button */
        .layout-menu.collapsed ~ .sidebar-toggle-close {
            display: none !important;
        }

        .layout-menu.collapsed ~ .sidebar-toggle-open {
            display: flex !important;
        }

        /* For mobile - hamburger menu */
        .sidebar-hamburger-btn {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1050;
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: var(--bg-white);
            color: var(--primary-red);
            border: 2px solid rgba(229, 57, 53, 0.15);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            cursor: pointer;
            transition: var(--transition-bounce);
            display: none;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .sidebar-hamburger-btn:hover {
            background: var(--primary-red-gradient);
            color: white;
            transform: scale(1.05);
            border-color: transparent;
            box-shadow: var(--shadow-red);
        }

        .sidebar-hamburger-btn i {
            transition: var(--transition-smooth);
        }

        .sidebar-hamburger-btn.collapsed i {
            transform: rotate(90deg);
        }

        /* Sidebar overlay for mobile */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(6px);
            z-index: 1039;
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .sidebar-overlay.active {
            display: block;
            opacity: 1;
        }

        /* ----- Brand/Logo Area with Premium Rentify ----- */
        .app-brand {
            padding: 1.8rem 1.5rem !important;
            border-bottom: 2px solid rgba(229, 57, 53, 0.06);
            transition: var(--transition-smooth);
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #fff 0%, #fff5f5 100%);
        }

        .app-brand::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -30%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(229, 57, 53, 0.05) 0%, transparent 70%);
            border-radius: 50%;
            transition: var(--transition-smooth);
        }

        .app-brand:hover::before {
            transform: scale(1.5);
        }

        .app-brand::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--primary-red-gradient);
            transform: scaleX(0);
            transform-origin: left;
            transition: var(--transition-smooth);
        }

        .app-brand:hover::after {
            transform: scaleX(1);
        }

        .app-brand:hover {
            background: rgba(229, 57, 53, 0.03);
            transform: translateY(-2px);
        }

        .app-brand-link {
            display: flex;
            align-items: center;
            gap: 14px;
            text-decoration: none;
            position: relative;
            z-index: 1;
        }

        /* ----- Premium Logo (refined) -----
           Previous version stacked 5 independent animations on one
           logo: a clockwise ring, a counter-rotating ring, a pulsing
           outer ring, a floating badge, AND separately-floating gold
           text. Nothing settled, so it read as busy rather than premium.

           This version: ONE calm float on the badge itself, a single
           fixed gold accent dot in the corner (no separate sparkle
           animation), and a subtle accent underline under the tagline
           instead of dot+icon+line all competing. Gold is used once,
           deliberately, instead of being spread across five elements. */
        .logo-container {
            position: relative;
            width: 52px;
            height: 52px;
            flex-shrink: 0;
        }

        .app-brand-logo {
            position: relative;
            z-index: 2;
            width: 52px;
            height: 52px;
            background: var(--primary-red-gradient);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 20px rgba(229, 57, 53, 0.28);
            transition: var(--transition-bounce);
            animation: logoFloat 3.5s ease-in-out infinite;
        }

        .app-brand:hover .app-brand-logo {
            transform: scale(1.06);
            box-shadow: 0 8px 26px rgba(229, 57, 53, 0.38);
        }

        .app-brand-logo svg {
            width: 26px;
            height: auto;
        }

        .app-brand-logo .logo-badge {
            position: absolute;
            bottom: -3px;
            right: -3px;
            width: 18px;
            height: 18px;
            background: var(--primary-gold-gradient);
            border-radius: 6px;
            border: 2px solid var(--bg-white);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 9px;
            color: #8a4f00;
            font-weight: 700;
        }

        .brand-text-wrapper {
            display: flex;
            flex-direction: column;
        }

        .app-brand-text {
            font-weight: 700 !important;
            font-size: 1.55rem !important;
            letter-spacing: -0.3px;
            line-height: 1.2;
            color: var(--primary-red-dark);
        }

        .app-brand-text .rentify-gold {
            color: var(--primary-gold) !important;
            -webkit-text-fill-color: var(--primary-gold) !important;
        }

        .brand-tagline {
            font-size: 9px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--gray-400);
            -webkit-text-fill-color: var(--gray-400);
            margin-top: 2px;
            position: relative;
            padding-left: 0;
        }

        .brand-tagline::after {
            content: '';
            display: block;
            width: 22px;
            height: 2px;
            background: var(--primary-gold);
            border-radius: 1px;
            margin-top: 4px;
        }

        /* ----- Menu Items ----- */
        .menu-inner .menu-item {
            margin: 2px 0 !important;
        }

        .menu-inner .menu-item .menu-link {
            padding: 0.75rem 1.2rem !important;
            border-radius: var(--border-radius-sm) !important;
            transition: var(--transition-smooth) !important;
            position: relative;
            overflow: hidden;
            margin: 0 10px !important;
            font-weight: 500;
            color: #4a4a6a !important;
        }

        .menu-inner .menu-item .menu-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 4px;
            height: 100%;
            background: var(--primary-red-gradient);
            transform: scaleY(0);
            transition: var(--transition-smooth);
            border-radius: 0 4px 4px 0;
        }

        .menu-inner .menu-item .menu-link:hover::before {
            transform: scaleY(1);
        }

        .menu-inner .menu-item .menu-link:hover {
            background: rgba(229, 57, 53, 0.07) !important;
            transform: translateX(8px) !important;
            color: var(--primary-red) !important;
            box-shadow: 0 4px 15px rgba(229, 57, 53, 0.08);
        }

        .menu-inner .menu-item .menu-link .menu-icon {
            transition: var(--transition-smooth);
            font-size: 1.3rem !important;
            color: #7a7a9a !important;
        }

        .menu-inner .menu-item .menu-link:hover .menu-icon {
            color: var(--primary-red) !important;
            transform: scale(1.15) rotate(-3deg);
        }

        .menu-inner .menu-item.active > .menu-link {
            background: var(--primary-red-gradient) !important;
            color: #fff !important;
            box-shadow: var(--shadow-red) !important;
            transform: translateX(4px) !important;
            animation: glowPulse 2s infinite;
        }

        .menu-inner .menu-item.active > .menu-link::before {
            transform: scaleY(1);
            background: #fff;
        }

        .menu-inner .menu-item.active > .menu-link .menu-icon {
            color: #fff !important;
            animation: iconPulse 2s infinite;
        }

        /* ----- Submenu ----- */
        .menu-sub {
            padding-left: 0.8rem !important;
            animation: slideDown 0.35s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        }

        .menu-sub .menu-item .menu-link {
            padding: 0.5rem 1rem !important;
            font-size: 0.9rem !important;
            border-left: 2px solid transparent;
            transition: var(--transition-smooth) !important;
            margin: 0 10px !important;
        }

        .menu-sub .menu-item .menu-link:hover {
            border-left-color: var(--primary-red);
            background: rgba(229, 57, 53, 0.05) !important;
            transform: translateX(8px) !important;
        }

        /* ----- Menu Headers ----- */
        .menu-header {
            color: var(--primary-red) !important;
            font-weight: 700 !important;
            font-size: 0.7rem !important;
            letter-spacing: 1.5px !important;
            text-transform: uppercase !important;
            padding: 1rem 1.5rem 0.5rem !important;
            opacity: 0.7;
            position: relative;
        }

        .menu-header::after {
            content: '';
            display: block;
            width: 30px;
            height: 2px;
            background: var(--primary-red-gradient);
            margin-top: 6px;
            border-radius: 4px;
            opacity: 0.4;
            transition: var(--transition-smooth);
        }

        .menu-header:hover::after {
            width: 50px;
            opacity: 0.8;
        }

        .menu-toggle::after {
            transition: var(--transition-smooth) !important;
        }

        .menu-item.open > .menu-link .menu-toggle::after {
            transform: rotate(180deg) !important;
        }

        /* ============================================================
           TOPBAR (NAVBAR) ENHANCEMENTS
           ============================================================ */
        .navbar-detached {
            background: var(--bg-white) !important;
            border-radius: var(--border-radius-md) !important;
            margin: 1.2rem 1.5rem 0 !important;
            padding: 0.6rem 1.5rem !important;
            box-shadow: 0 4px 25px rgba(0, 0, 0, 0.04) !important;
            border: 1px solid rgba(229, 57, 53, 0.08) !important;
            transition: var(--transition-smooth) !important;
            position: relative;
            overflow: hidden;
        }

        .navbar-detached::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--primary-red-gradient);
            transform: scaleX(0);
            transform-origin: left;
            transition: var(--transition-smooth);
        }

        .navbar-detached:hover::before {
            transform: scaleX(1);
        }

        .navbar-detached:hover {
            box-shadow: 0 6px 35px rgba(229, 57, 53, 0.08) !important;
            transform: translateY(-2px);
        }

        /* ----- Search Bar ----- */
        .navbar-detached .form-control {
            border-radius: 50px !important;
            border: 2px solid #f0e8e8 !important;
            padding: 0.5rem 1.2rem !important;
            transition: var(--transition-smooth) !important;
            background: var(--bg-soft);
            font-weight: 400;
            font-size: 14px;
        }

        .navbar-detached .form-control:focus {
            border-color: var(--primary-red) !important;
            box-shadow: 0 0 0 4px rgba(229, 57, 53, 0.1) !important;
            background: #fff;
            transform: scale(1.02);
        }

        .navbar-detached .bx-search {
            color: var(--primary-red);
            font-size: 1.4rem !important;
            transition: var(--transition-smooth);
        }

        .navbar-detached .nav-item:hover .bx-search {
            transform: scale(1.15) rotate(10deg);
        }

        /* ============================================================
           AUTH SECTION - FIXED DROPDOWN
           ============================================================ */
        
        /* Auth Links (Login/Register) */
        .navbar-nav .nav-item a:not(.dropdown-toggle) {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 13px;
            transition: var(--transition-smooth);
            text-decoration: none;
            color: var(--primary-red);
            border: 2px solid var(--primary-red);
            background: transparent;
        }

        .navbar-nav .nav-item a:not(.dropdown-toggle):hover {
            background: var(--primary-red-gradient);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(229, 57, 53, 0.25);
            border-color: transparent;
        }

        /* Dropdown Toggle Button */
        .navbar-nav .dropdown-toggle {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--gray-700);
            font-weight: 600;
            transition: var(--transition-smooth);
            text-decoration: none;
            padding: 8px 16px;
            border-radius: var(--border-radius-sm);
            background: transparent;
            border: none;
            cursor: pointer;
        }

        .navbar-nav .dropdown-toggle:hover {
            color: var(--primary-red);
            background: rgba(229, 57, 53, 0.06);
            transform: translateY(-1px);
        }

        .navbar-nav .dropdown-toggle i {
            font-size: 1.1rem;
            color: var(--primary-red);
            transition: var(--transition-smooth);
        }

        .navbar-nav .dropdown-toggle:hover i {
            transform: scale(1.15) rotate(-5deg);
        }

        /* Dropdown Menu - Fixed for Bootstrap 5 */
        .dropdown-menu {
            border: none !important;
            border-radius: var(--border-radius-md) !important;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08) !important;
            padding: 0.6rem !important;
            border: 1px solid rgba(229, 57, 53, 0.06) !important;
            min-width: 200px;
            background: white !important;
            margin-top: 8px !important;
            /* FIX #2 support: z-index raised so the menu can never render
               underneath the fixed sidebar / navbar (z-index 1040 / 1050). */
            z-index: 1060 !important;
        }

        .dropdown-item {
            border-radius: var(--border-radius-sm) !important;
            padding: 0.6rem 1rem !important;
            transition: var(--transition-smooth) !important;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            color: var(--gray-700);
            text-decoration: none;
        }

        .dropdown-item:hover {
            background: rgba(229, 57, 53, 0.07) !important;
            color: var(--primary-red) !important;
            transform: translateX(6px);
        }

        .dropdown-item i {
            color: var(--primary-red);
            transition: var(--transition-smooth);
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        .dropdown-item:hover i {
            transform: scale(1.15) rotate(-5deg);
        }

        .dropdown-item.text-danger {
            color: #dc3545 !important;
        }

        .dropdown-item.text-danger i {
            color: #dc3545 !important;
        }

        .dropdown-item.text-danger:hover {
            background: rgba(220, 53, 69, 0.08) !important;
        }

        .dropdown-item .btn-logout {
            border: none;
            background: none;
            width: 100%;
            text-align: left;
            padding: 0;
            font-weight: 500;
            color: inherit;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* ----- Avatar ----- */
        .avatar-online .avatar img {
            border: 3px solid var(--primary-red);
            transition: var(--transition-smooth);
            filter: grayscale(20%);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .avatar-online .avatar img:hover {
            transform: scale(1.1) rotate(-5deg);
            filter: grayscale(0%);
            border-color: var(--primary-red-dark);
            box-shadow: 0 4px 20px rgba(229, 57, 53, 0.3);
            animation: avatarPulse 1.5s ease;
        }

        /* ============================================================
           SCROLL TO TOP BUTTON
           ============================================================ */
        .scroll-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 1050;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: var(--primary-red-gradient);
            color: white;
            border: none;
            box-shadow: var(--shadow-red);
            cursor: pointer;
            transition: var(--transition-bounce);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px);
        }

        .scroll-to-top.visible {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .scroll-to-top:hover {
            transform: scale(1.1) translateY(-4px);
            box-shadow: var(--shadow-red-hover);
        }

        .scroll-to-top i {
            transition: var(--transition-smooth);
        }

        .scroll-to-top:hover i {
            animation: float 1s ease-in-out infinite;
        }

        /* ============================================================
           RESPONSIVE
           ============================================================ */
        @media (max-width: 1200px) {
            .layout-menu {
                transform: translateX(-100%);
                width: 300px !important;
            }
            
            .layout-menu.show {
                transform: translateX(0);
            }
            
            .sidebar-toggle-open,
            .sidebar-toggle-close {
                display: none !important;
            }
            
            .sidebar-hamburger-btn {
                display: flex !important;
            }

            /* On mobile the sidebar is an overlay; never reserve content space for it */
            .layout-page {
                --bs-menu-width: 0rem !important;
                --bs-menu-collapsed-width: 0rem !important;
            }
        }

        @media (min-width: 1201px) {
            .sidebar-hamburger-btn {
                display: none !important;
            }
            .sidebar-overlay {
                display: none !important;
            }
            
            /* Show toggle buttons on big screens */
            .sidebar-toggle-open.show {
                display: flex !important;
            }
            .sidebar-toggle-close.show {
                display: flex !important;
            }
        }

        @media (max-width: 768px) {
            .navbar-detached {
                margin: 0.8rem 0.8rem 0 !important;
                padding: 0.5rem 1rem !important;
                border-radius: var(--border-radius-sm);
            }
            
            .app-brand-text {
                font-size: 1.2rem !important;
            }
            
            .brand-tagline {
                font-size: 7px;
            }
            
            .logo-container {
                width: 42px;
                height: 42px;
            }
            
            .app-brand-logo {
                width: 42px;
                height: 42px;
            }
            
            .app-brand-logo svg {
                width: 20px;
            }
            
            .navbar-nav .nav-item a:not(.dropdown-toggle) {
                padding: 6px 14px;
                font-size: 12px;
            }
            
            .navbar-nav .dropdown-toggle {
                padding: 6px 12px;
                font-size: 13px;
            }
            
            .scroll-to-top {
                width: 42px;
                height: 42px;
                font-size: 18px;
                bottom: 20px;
                right: 20px;
            }
            
            .sidebar-hamburger-btn {
                width: 38px;
                height: 38px;
                font-size: 17px;
                top: 15px;
                left: 15px;
            }
            
            .dropdown-menu {
                min-width: 180px !important;
            }
        }

        @media (max-width: 480px) {
            .app-brand {
                padding: 1.2rem 1rem !important;
            }
            
            .app-brand-text {
                font-size: 1rem !important;
            }
            
            .app-brand-logo {
                width: 36px;
                height: 36px;
            }
            
            .app-brand-logo svg {
                width: 18px;
            }
            
            .logo-container {
                width: 36px;
                height: 36px;
            }
            
            .app-brand-logo .logo-badge {
                width: 14px;
                height: 14px;
                font-size: 8px;
                bottom: -2px;
                right: -2px;
            }
            
            .brand-tagline {
                font-size: 6px;
                letter-spacing: 1px;
            }
        }
    </style>

    <script src="{{ asset('Admin/assets/') }}/vendor/js/helpers.js"></script>
    <script src="{{ asset('Admin/assets/') }}/js/config.js"></script>
</head>

<body>
    
    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar Toggle Buttons -->
    <!-- Open Button (>) - shown when sidebar is closed -->
    <button class="sidebar-toggle-btn sidebar-toggle-open show" id="sidebarToggleOpen" onclick="openSidebar()">
        <i class="fas fa-chevron-right"></i>
    </button>
    
    <!-- Close Button (<) - shown when sidebar is open -->
    <button class="sidebar-toggle-btn sidebar-toggle-close show" id="sidebarToggleClose" onclick="closeSidebar()">
        <i class="fas fa-chevron-left"></i>
    </button>

    <!-- Hamburger Button for Mobile -->
    <button class="sidebar-hamburger-btn" id="sidebarHamburgerBtn" onclick="toggleMobileSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Scroll to Top Button -->
    <button class="scroll-to-top" id="scrollToTop" onclick="scrollToTop()">
        <i class="fas fa-chevron-up"></i>
    </button>

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- ============================================================
            PREMIUM SIDEBAR WITH RENTIFY LOGO
            ============================================================ -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="index.html" class="app-brand-link">
                        <div class="logo-container">
                            <div class="app-brand-logo">
                                <svg width="26" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                    <defs>
                                        <path d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z" id="path-1"></path>
                                    </defs>
                                    <g fill="none" fill-rule="evenodd">
                                        <use fill="#ffffff" xlink:href="#path-1"></use>
                                    </g>
                                </svg>
                                <span class="logo-badge">R</span>
                            </div>
                        </div>
                        <div class="brand-text-wrapper">
                            <span class="app-brand-text demo menu-text">
                                Rent<span class="rentify-gold">ify</span>
                            </span>
                            <span class="brand-tagline">Admin Panel</span>
                        </div>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item active">
                        <a href="/admin/dashboard" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>

                    <!-- Categories -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-layout"></i>
                            <div data-i18n="Layouts">Categories</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="/admin/categories" class="menu-link">
                                    <div data-i18n="Without menu">All Categories</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="/addcategory" class="menu-link">
                                    <div data-i18n="Without navbar">Add Category</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Pages</span>
                    </li>

                    <!-- Users -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Users</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="/users" class="menu-link">
                                    <div data-i18n="Account">All Users</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Requests -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                            <div data-i18n="Authentications">Requests</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="/admin/owner-requests" class="menu-link">
                                    <div data-i18n="Basic">Owner Requests</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="/admin/item-requests" class="menu-link">
                                    <div data-i18n="Basic">Item Requests</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Items -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                            <div data-i18n="Misc">Items</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="/admin/items" class="menu-link">
                                    <div data-i18n="Error">All Items</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Components</span>
                    </li>

                    <!-- Bookings -->
                    <li class="menu-item">
                        <a href="/admin/bookings" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                            <div data-i18n="Basic">Bookings</div>
                        </a>
                    </li>

                    <!-- Reviews -->
                    <li class="menu-item">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-box"></i>
                            <div data-i18n="User interface">Reviews</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="/admin/reviews" class="menu-link">
                                    <div data-i18n="Accordion">All Reviews</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Notifications -->
                    <li class="menu-item">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-copy"></i>
                            <div data-i18n="Extended UI">Notifications</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="/admin/notifications" class="menu-link">
                                    <div data-i18n="Perfect Scrollbar">All Notifications</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </aside>
            <!-- / PREMIUM SIDEBAR -->

            <!-- ============================================================
            LAYOUT PAGE
            ============================================================ -->
            <div class="layout-page">
                <!-- ENHANCED TOPBAR -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)" onclick="toggleMobileSidebar()">
                            <i class="fas fa-bars"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0 me-2"></i>
                                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
                            </div>
                        </div>
                        <!-- /Search -->

                        <!-- ===== AUTH SECTION - FIXED DROPDOWN ===== -->
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                           @auth
<li class="nav-item dropdown">

    <a class="nav-link dropdown-toggle"
       href="#"
       id="userDropdown"
       role="button"
       data-bs-toggle="dropdown"
       aria-expanded="false">

        <i class="fa fa-user"></i>
        {{ Auth::user()->name }}
    </a>

    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">

        <li>
            <a class="dropdown-item" href="{{ route('profile.show') }}">
                <i class="fa fa-user"></i> Profile
            </a>
        </li>

        <li><hr class="dropdown-divider"></li>

        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item text-danger">
                    <i class="fa fa-sign-out"></i> Logout
                </button>
            </form>
        </li>

    </ul>

</li>

@endauth
</ul>                        <!-- ===== END AUTH SECTION ===== -->
                    </div>
                </nav>
                <!-- / ENHANCED TOPBAR -->

                <!-- ============================================================
                CONTENT AREA
                ============================================================ -->
                @yield('content')

                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">
                            © <script>document.write(new Date().getFullYear());</script>
                            , made with ❤️ by
                            <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                        </div>
                        <div>
                            <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                            <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>
                            <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/" target="_blank" class="footer-link me-4">Documentation</a>
                            <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank" class="footer-link me-4">Support</a>
                        </div>
                    </div>
                </footer>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- / LAYOUT PAGE -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <!-- ============================================================
         FIX #2: Bootstrap was being loaded TWICE.
         The CDN bundle (bootstrap.bundle.min.js, includes Popper)
         was followed by the template's own vendor/js/bootstrap.js,
         which overwrote window.bootstrap with an older/different
         build and broke dropdown toggling. The vendor copy is now
         removed below — the CDN bundle is the only Bootstrap JS
         on the page, and it is loaded BEFORE the inline init script
         that calls `new bootstrap.Dropdown(...)`.
         ============================================================ -->

    <!-- Bootstrap 5 JS (required for dropdown) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Sidebar & Scroll Toggle JavaScript -->
    <script>
        // ============================================================
        // SIDEBAR TOGGLE FUNCTIONS
        // ============================================================
        
        // For big screens - Open sidebar with >
        function openSidebar() {
            const sidebar = document.getElementById('layout-menu');
            const openBtn = document.getElementById('sidebarToggleOpen');
            const closeBtn = document.getElementById('sidebarToggleClose');
            
            sidebar.classList.remove('collapsed');
            document.documentElement.classList.remove('layout-menu-collapsed'); // NEW: lets .layout-page expand back
            openBtn.classList.remove('show');
            closeBtn.classList.add('show');
            
            // Update localStorage
            localStorage.setItem('sidebarState', 'open');
        }

        // For big screens - Close sidebar with <
        function closeSidebar() {
            const sidebar = document.getElementById('layout-menu');
            const openBtn = document.getElementById('sidebarToggleOpen');
            const closeBtn = document.getElementById('sidebarToggleClose');
            
            sidebar.classList.add('collapsed');
            document.documentElement.classList.add('layout-menu-collapsed'); // NEW: triggers .layout-page to expand
            openBtn.classList.add('show');
            closeBtn.classList.remove('show');
            
            // Update localStorage
            localStorage.setItem('sidebarState', 'collapsed');
        }

        // For mobile - Toggle sidebar with hamburger
        function toggleMobileSidebar() {
            const sidebar = document.getElementById('layout-menu');
            const overlay = document.getElementById('sidebarOverlay');
            const hamburgerBtn = document.getElementById('sidebarHamburgerBtn');
            
            sidebar.classList.toggle('show');
            overlay.classList.toggle('active');
            hamburgerBtn.classList.toggle('collapsed');
            
            // Change icon between bars and times
            const icon = hamburgerBtn.querySelector('i');
            if (sidebar.classList.contains('show')) {
                icon.className = 'fas fa-times';
            } else {
                icon.className = 'fas fa-bars';
            }
        }

        // Close mobile sidebar when clicking overlay
        document.getElementById('sidebarOverlay').addEventListener('click', function() {
            if (window.innerWidth <= 1200) {
                const sidebar = document.getElementById('layout-menu');
                if (sidebar.classList.contains('show')) {
                    toggleMobileSidebar();
                }
            }
        });

        // Handle responsive behavior
        window.addEventListener('resize', function() {
            const sidebar = document.getElementById('layout-menu');
            const overlay = document.getElementById('sidebarOverlay');
            const hamburgerBtn = document.getElementById('sidebarHamburgerBtn');
            const openBtn = document.getElementById('sidebarToggleOpen');
            const closeBtn = document.getElementById('sidebarToggleClose');
            
            if (window.innerWidth > 1200) {
                // Big screen - use > and < buttons
                sidebar.classList.remove('show');
                overlay.classList.remove('active');
                hamburgerBtn.classList.remove('collapsed');
                const icon = hamburgerBtn.querySelector('i');
                icon.className = 'fas fa-bars';
                
                // Check stored state
                const state = localStorage.getItem('sidebarState');
                if (state === 'collapsed') {
                    sidebar.classList.add('collapsed');
                    document.documentElement.classList.add('layout-menu-collapsed'); // NEW
                    openBtn.classList.add('show');
                    closeBtn.classList.remove('show');
                } else {
                    sidebar.classList.remove('collapsed');
                    document.documentElement.classList.remove('layout-menu-collapsed'); // NEW
                    openBtn.classList.remove('show');
                    closeBtn.classList.add('show');
                }
            } else {
                // Mobile - hide > and < buttons
                openBtn.classList.remove('show');
                closeBtn.classList.remove('show');
                document.documentElement.classList.remove('layout-menu-collapsed'); // NEW: mobile never offsets content anyway
            }
        });

        // Close mobile sidebar when clicking a menu link
        document.querySelectorAll('.menu-link').forEach(link => {
            link.addEventListener('click', function(e) {
                if (window.innerWidth <= 1200 && !this.classList.contains('menu-toggle')) {
                    const sidebar = document.getElementById('layout-menu');
                    if (sidebar.classList.contains('show')) {
                        toggleMobileSidebar();
                    }
                }
            });
        });

        // Restore sidebar state on load
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('layout-menu');
            const openBtn = document.getElementById('sidebarToggleOpen');
            const closeBtn = document.getElementById('sidebarToggleClose');
            
            // Only for big screens
            if (window.innerWidth > 1200) {
                const state = localStorage.getItem('sidebarState');
                if (state === 'collapsed') {
                    sidebar.classList.add('collapsed');
                    document.documentElement.classList.add('layout-menu-collapsed'); // NEW
                    openBtn.classList.add('show');
                    closeBtn.classList.remove('show');
                } else {
                    sidebar.classList.remove('collapsed');
                    document.documentElement.classList.remove('layout-menu-collapsed'); // NEW
                    openBtn.classList.remove('show');
                    closeBtn.classList.add('show');
                }
            }
        });

        // ============================================================
        // SCROLL TO TOP FUNCTIONALITY
        // ============================================================
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Show/hide scroll to top button
        window.addEventListener('scroll', function() {
            const scrollBtn = document.getElementById('scrollToTop');
            if (window.pageYOffset > 300) {
                scrollBtn.classList.add('visible');
            } else {
                scrollBtn.classList.remove('visible');
            }
        });

        // Keyboard shortcut: Press 't' to scroll to top
        document.addEventListener('keydown', function(e) {
            if (e.key === 't' || e.key === 'T') {
                if (!e.target.matches('input, textarea, select')) {
                    scrollToTop();
                }
            }
        });

        // ============================================================
        // FIX DROPDOWN - Bootstrap 5
        // (Runs AFTER bootstrap.bundle.min.js has loaded, and no
        //  second Bootstrap script runs afterward to overwrite it.)
        // ============================================================
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize all dropdowns
            var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
            dropdownElementList.map(function(dropdownToggleEl) {
                return new bootstrap.Dropdown(dropdownToggleEl);
            });
        });
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core JS -->
    <script src="{{ asset('Admin/assets/') }}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('Admin/assets/') }}/vendor/libs/popper/popper.js"></script>
    <!-- REMOVED: vendor/js/bootstrap.js — this was the duplicate Bootstrap
         build that overwrote window.bootstrap and broke the dropdown.
         The CDN bundle above already includes Bootstrap + Popper. -->
    <script src="{{ asset('Admin/assets/') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('Admin/assets/') }}/vendor/js/menu.js"></script>
    <script src="{{ asset('Admin/assets/') }}/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="{{ asset('Admin/assets/') }}/js/main.js"></script>
    <script src="{{ asset('Admin/assets/') }}/js/dashboards-analytics.js"></script>
</body>
</html>