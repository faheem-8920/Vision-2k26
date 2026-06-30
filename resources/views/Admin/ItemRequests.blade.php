@extends('Admin.layout')

@section('content')

<style>
    /* ============================================================
       ROOT VARIABLES & RESET
       ============================================================ */
    :root {
        --red-50: #fff5f5;
        --red-100: #ffe3e3;
        --red-200: #ffc9c9;
        --red-300: #ffa8a8;
        --red-400: #ff6b6b;
        --red-500: #dc3545;
        --red-600: #c92a2a;
        --red-700: #a61d1d;
        --red-800: #861d1d;
        --red-900: #6b1a1a;

        --green-500: #198754;
        --green-600: #157347;

        --shadow-xs: 0 1px 3px rgba(220, 53, 69, 0.04);
        --shadow-sm: 0 2px 8px rgba(220, 53, 69, 0.06);
        --shadow-md: 0 8px 30px rgba(220, 53, 69, 0.10);
        --shadow-lg: 0 20px 50px rgba(220, 53, 69, 0.14);
        --shadow-xl: 0 30px 70px rgba(220, 53, 69, 0.18);
        --shadow-2xl: 0 40px 90px rgba(220, 53, 69, 0.22);

        --radius-sm: 10px;
        --radius-md: 16px;
        --radius-lg: 24px;
        --radius-xl: 32px;
        --radius-2xl: 40px;

        --transition-fast: 0.2s cubic-bezier(0.34, 1.56, 0.64, 1);
        --transition-base: 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        --transition-slow: 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    /* ============================================================
       BASE
       ============================================================ */
    body {
        background: linear-gradient(160deg, #ffffff 0%, var(--red-50) 100%);
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
        min-height: 100vh;
        padding-bottom: 50px;
        position: relative;
    }

    body::before {
        content: '';
        position: fixed;
        top: -50%;
        right: -30%;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(220, 53, 69, 0.03) 0%, transparent 70%);
        pointer-events: none;
        z-index: 0;
        border-radius: 50%;
    }

    body::after {
        content: '';
        position: fixed;
        bottom: -30%;
        left: -20%;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(220, 53, 69, 0.02) 0%, transparent 70%);
        pointer-events: none;
        z-index: 0;
        border-radius: 50%;
    }

    .container-fluid {
        position: relative;
        z-index: 1;
    }

    /* ============================================================
       ANIMATIONS
       ============================================================ */
    @keyframes fadeSlideUp {
        0% { opacity: 0; transform: translateY(40px) scale(0.95); }
        100% { opacity: 1; transform: translateY(0) scale(1); }
    }

    @keyframes shimmer {
        0% { background-position: -200% center; }
        100% { background-position: 200% center; }
    }

    @keyframes pulseRing {
        0%, 100% { box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.25); }
        50% { box-shadow: 0 0 0 14px rgba(220, 53, 69, 0); }
    }

    @keyframes slideDown {
        0% { opacity: 0; transform: translateY(-30px) scale(0.95); }
        100% { opacity: 1; transform: translateY(0) scale(1); }
    }

    @keyframes countUp {
        0% { opacity: 0; transform: scale(0.3) rotate(-10deg); }
        100% { opacity: 1; transform: scale(1) rotate(0deg); }
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-8px); }
    }

    @keyframes glowPulse {
        0%, 100% { opacity: 0.6; }
        50% { opacity: 1; }
    }

    @keyframes shimmerBorder {
        0% { background-position: -200% 0; }
        100% { background-position: 200% 0; }
    }

    .animate-in {
        animation: fadeSlideUp 0.7s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
        opacity: 0;
    }

    .animate-in-fast {
        animation: fadeSlideUp 0.4s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
        opacity: 0;
    }

    /* ============================================================
       GLASSMORPHISM UTILITY
       ============================================================ */
    .glass {
        background: rgba(255, 255, 255, 0.72);
        backdrop-filter: blur(16px) saturate(180%);
        -webkit-backdrop-filter: blur(16px) saturate(180%);
        border: 1px solid rgba(255, 255, 255, 0.5);
    }

    .glass-dark {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(20px) saturate(200%);
        -webkit-backdrop-filter: blur(20px) saturate(200%);
        border: 1px solid rgba(220, 53, 69, 0.06);
    }

    /* ============================================================
       STATS CARDS
       ============================================================ */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
        gap: 22px;
        margin-bottom: 36px;
    }

    .stats-card {
        background: rgba(255, 255, 255, 0.80);
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        border-radius: var(--radius-lg);
        padding: 26px 20px 22px;
        text-align: center;
        border: 1px solid rgba(220, 53, 69, 0.08);
        box-shadow: var(--shadow-sm);
        transition: all var(--transition-base);
        position: relative;
        overflow: hidden;
        cursor: default;
    }

    .stats-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(145deg, rgba(220, 53, 69, 0.03), transparent 70%);
        pointer-events: none;
    }

    .stats-card::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(90deg, var(--red-400), var(--red-500), var(--red-600), var(--red-500), var(--red-400));
        background-size: 300% 100%;
        animation: shimmerBorder 4s linear infinite;
        border-radius: var(--radius-lg) var(--radius-lg) 0 0;
    }

    .stats-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: var(--shadow-xl);
        border-color: rgba(220, 53, 69, 0.18);
        background: rgba(255, 255, 255, 0.95);
    }

    .stats-card .icon-wrap {
        font-size: 2.2rem;
        margin-bottom: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 60px;
        height: 60px;
        background: var(--red-50);
        border-radius: 50%;
        transition: all var(--transition-base);
        border: 1px solid rgba(220, 53, 69, 0.06);
    }

    .stats-card:hover .icon-wrap {
        transform: scale(1.12) rotate(-6deg);
        background: var(--red-100);
        border-color: rgba(220, 53, 69, 0.12);
    }

    .stats-number {
        font-size: 2.9rem;
        font-weight: 800;
        letter-spacing: -0.03em;
        background: linear-gradient(135deg, var(--red-700), var(--red-500));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        line-height: 1.1;
        margin: 4px 0 2px;
        animation: countUp 0.7s ease;
    }

    .stats-label {
        font-size: 0.8rem;
        font-weight: 600;
        color: #6b4a4a;
        text-transform: uppercase;
        letter-spacing: 0.7px;
        opacity: 0.7;
    }

    .stats-trend {
        display: inline-block;
        font-size: 0.65rem;
        background: rgba(25, 135, 84, 0.10);
        color: var(--green-500);
        padding: 2px 14px;
        border-radius: 60px;
        margin-top: 6px;
        font-weight: 600;
        letter-spacing: 0.3px;
        border: 1px solid rgba(25, 135, 84, 0.06);
    }

    .stats-trend.warning {
        background: rgba(255, 193, 7, 0.12);
        color: #b8860b;
        border-color: rgba(255, 193, 7, 0.08);
    }

    /* ============================================================
       MAIN CARD
       ============================================================ */
    .custom-card {
        background: rgba(255, 255, 255, 0.75);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border-radius: var(--radius-xl);
        border: 1px solid rgba(220, 53, 69, 0.06);
        box-shadow: var(--shadow-lg);
        overflow: hidden;
        transition: all var(--transition-base);
    }

    .custom-card:hover {
        box-shadow: var(--shadow-2xl);
        border-color: rgba(220, 53, 69, 0.10);
    }

    /* ============================================================
       CARD HEADER
       ============================================================ */
    .card-header-custom {
        background: rgba(255, 255, 255, 0.50);
        padding: 22px 30px;
        border-bottom: 1px solid rgba(220, 53, 69, 0.05);
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 16px;
    }

    .card-header-custom .header-left {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .card-header-custom .header-left .title-icon {
        font-size: 1.4rem;
        line-height: 1;
    }

    .card-header-custom .header-left .title-text {
        font-weight: 700;
        color: #2d1e1e;
        font-size: 1.1rem;
        letter-spacing: -0.01em;
    }

    .card-header-custom .header-left .badge-count {
        background: linear-gradient(135deg, var(--red-500), var(--red-600));
        color: white;
        font-weight: 700;
        font-size: 0.7rem;
        padding: 4px 16px;
        border-radius: 60px;
        letter-spacing: 0.4px;
        box-shadow: 0 4px 12px rgba(220, 53, 69, 0.25);
        transition: all var(--transition-fast);
    }

    .card-header-custom .header-left .badge-count:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 18px rgba(220, 53, 69, 0.35);
    }

    /* ============================================================
       SEARCH
       ============================================================ */
    .search-wrapper {
        position: relative;
        flex: 1;
        min-width: 200px;
        max-width: 420px;
    }

    .search-wrapper .search-icon {
        position: absolute;
        left: 18px;
        top: 50%;
        transform: translateY(-50%);
        color: #b08a8a;
        font-size: 1rem;
        pointer-events: none;
        transition: all var(--transition-fast);
    }

    .search-box {
        width: 100%;
        height: 48px;
        border-radius: 60px;
        border: 2px solid rgba(220, 53, 69, 0.08);
        background: white;
        padding: 0 20px 0 46px;
        font-weight: 500;
        font-size: 0.92rem;
        transition: all var(--transition-base);
        box-shadow: var(--shadow-xs);
        color: #2d1e1e;
    }

    .search-box:focus {
        border-color: var(--red-500);
        box-shadow: 0 0 0 6px rgba(220, 53, 69, 0.06), var(--shadow-md);
        transform: scale(1.01);
        background: #fffafa;
        outline: none;
    }

    .search-box::placeholder {
        color: #b08a8a;
        font-weight: 400;
        opacity: 0.6;
    }

    .search-wrapper:focus-within .search-icon {
        color: var(--red-500);
    }

    .search-clear {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #ccc;
        cursor: pointer;
        font-size: 1rem;
        padding: 4px 8px;
        border-radius: 50%;
        transition: all var(--transition-fast);
        opacity: 0;
        pointer-events: none;
    }

    .search-clear.visible {
        opacity: 1;
        pointer-events: auto;
    }

    .search-clear:hover {
        color: var(--red-500);
        background: var(--red-50);
    }

    /* ============================================================
       TABLE
       ============================================================ */
    .table-wrap {
        padding: 8px 16px 16px 16px;
        overflow-x: auto;
        position: relative;
    }

    .custom-table {
        border-collapse: separate;
        border-spacing: 0 10px;
        width: 100%;
        font-size: 0.9rem;
        min-width: 900px;
    }

    .custom-table thead th {
        background: transparent;
        color: #6b4a4a;
        font-weight: 700;
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.9px;
        padding: 12px 16px 10px;
        border-bottom: 2px solid rgba(220, 53, 69, 0.05);
        white-space: nowrap;
        position: sticky;
        top: 0;
        z-index: 10;
        backdrop-filter: blur(8px);
        background: rgba(255, 255, 255, 0.6);
    }

    .custom-table tbody tr {
        background: rgba(255, 255, 255, 0.65);
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(4px);
        border-radius: var(--radius-md);
        transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: 0 2px 8px rgba(220, 53, 69, 0.02);
        border: 1px solid transparent;
        position: relative;
    }

    .custom-table tbody tr::before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: var(--radius-md);
        background: linear-gradient(135deg, rgba(220, 53, 69, 0.02), transparent 80%);
        opacity: 0;
        transition: opacity 0.4s ease;
        pointer-events: none;
    }

    .custom-table tbody tr:hover::before {
        opacity: 1;
    }

    .custom-table tbody tr:hover {
        background: #fff5f6;
        transform: translateY(-4px) scale(1.004);
        box-shadow: 0 16px 40px -12px rgba(220, 53, 69, 0.15);
        border-color: rgba(220, 53, 69, 0.08);
    }

    .custom-table tbody tr:active {
        transform: scale(0.995);
    }

    .custom-table tbody td {
        padding: 14px 16px;
        vertical-align: middle;
        border: none;
        color: #2d1e1e;
        background: transparent;
        position: relative;
        z-index: 2;
    }

    .custom-table tbody td:first-child {
        border-radius: var(--radius-md) 0 0 var(--radius-md);
        padding-left: 20px;
    }
    .custom-table tbody td:last-child {
        border-radius: 0 var(--radius-md) var(--radius-md) 0;
        padding-right: 20px;
    }

    /* ============================================================
       ITEM IMAGE
       ============================================================ */
    .img-container {
        position: relative;
        display: inline-block;
        border-radius: var(--radius-sm);
        line-height: 0;
    }

    .item-img {
        width: 64px;
        height: 56px;
        object-fit: cover;
        border-radius: var(--radius-sm);
        border: 3px solid white;
        box-shadow: 0 4px 16px -4px rgba(220, 53, 69, 0.12);
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        display: block;
        background: #fce8ea;
        cursor: zoom-in;
        position: relative;
    }

    .item-img:hover {
        transform: scale(3.2) rotate(3deg);
        z-index: 9999;
        position: relative;
        box-shadow: 0 25px 60px -8px rgba(220, 53, 69, 0.30);
        border-color: var(--red-500);
        border-radius: var(--radius-sm);
    }

    .img-container .zoom-hint {
        position: absolute;
        bottom: 2px;
        right: 2px;
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(4px);
        color: white;
        font-size: 0.5rem;
        padding: 2px 8px;
        border-radius: 6px;
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none;
        font-weight: 600;
        letter-spacing: 0.3px;
    }

    .img-container:hover .zoom-hint {
        opacity: 1;
    }

    .no-image-placeholder {
        width: 64px;
        height: 56px;
        border-radius: var(--radius-sm);
        background: var(--red-50);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        color: var(--red-300);
        border: 2px dashed rgba(220, 53, 69, 0.10);
    }

    /* ============================================================
       TEXT STYLES
       ============================================================ */
    .item-title {
        font-weight: 700;
        color: var(--red-700);
        font-size: 0.92rem;
        transition: color var(--transition-fast);
        display: inline-block;
    }
    .item-title:hover {
        color: var(--red-500);
        text-decoration: underline;
        text-underline-offset: 3px;
        text-decoration-color: rgba(220, 53, 69, 0.2);
    }

    .owner-name {
        font-weight: 600;
        color: #2d1e1e;
        transition: color var(--transition-fast);
    }
    .owner-name:hover {
        color: var(--red-600);
    }

    /* ============================================================
       BADGES
       ============================================================ */
    .badge-soft {
        background: rgba(220, 53, 69, 0.06);
        color: var(--red-700);
        padding: 4px 14px;
        border-radius: 60px;
        font-weight: 600;
        font-size: 0.72rem;
        letter-spacing: 0.2px;
        transition: all var(--transition-fast);
        display: inline-block;
        border: 1px solid rgba(220, 53, 69, 0.04);
    }

    .badge-soft:hover {
        background: rgba(220, 53, 69, 0.12);
        transform: scale(1.04);
        border-color: rgba(220, 53, 69, 0.08);
    }

    .badge-city {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: rgba(220, 53, 69, 0.03);
        padding: 4px 14px;
        border-radius: 60px;
        font-weight: 500;
        font-size: 0.78rem;
        color: #5a3e3e;
        border: 1px solid rgba(220, 53, 69, 0.04);
        transition: all var(--transition-fast);
    }

    .badge-city:hover {
        background: rgba(220, 53, 69, 0.07);
        transform: translateX(2px);
    }

    .badge-qty {
        background: rgba(220, 53, 69, 0.06);
        padding: 4px 14px;
        border-radius: 60px;
        font-weight: 700;
        font-size: 0.78rem;
        color: var(--red-700);
        display: inline-block;
        min-width: 36px;
        text-align: center;
        border: 1px solid rgba(220, 53, 69, 0.04);
        transition: all var(--transition-fast);
    }

    .badge-qty:hover {
        background: rgba(220, 53, 69, 0.12);
        transform: scale(1.05);
    }

    .price-tag {
        font-weight: 700;
        color: var(--red-700);
        font-size: 0.9rem;
        background: rgba(220, 53, 69, 0.04);
        padding: 4px 16px;
        border-radius: 60px;
        display: inline-block;
        transition: all var(--transition-fast);
        border: 1px solid rgba(220, 53, 69, 0.04);
    }

    .price-tag:hover {
        background: rgba(220, 53, 69, 0.10);
        transform: scale(1.04);
        border-color: rgba(220, 53, 69, 0.08);
    }

    /* ============================================================
       ACTION BUTTONS
       ============================================================ */
    .action-group {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        align-items: center;
    }

    .btn-action {
        border: none;
        padding: 9px 22px;
        font-weight: 700;
        font-size: 0.72rem;
        border-radius: 60px;
        letter-spacing: 0.6px;
        transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-width: 105px;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        text-transform: uppercase;
        border: 1px solid transparent;
    }

    .btn-action::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(255,255,255,0.12), transparent 70%);
        pointer-events: none;
        opacity: 0;
        transition: opacity 0.4s;
    }

    .btn-action:hover::before {
        opacity: 1;
    }

    .btn-action:active {
        transform: scale(0.92) !important;
    }

    .btn-action .btn-icon {
        font-size: 1.1rem;
        line-height: 1;
    }

    .btn-approve {
        background: linear-gradient(135deg, #0d6e3d, #2b8c5e);
        color: white;
        box-shadow: 0 4px 16px -4px rgba(25, 135, 84, 0.30);
        border-color: rgba(25, 135, 84, 0.2);
    }

    .btn-approve:hover {
        transform: translateY(-4px) scale(1.03);
        box-shadow: 0 12px 30px -6px rgba(25, 135, 84, 0.45);
        background: linear-gradient(135deg, #0f7a47, #33a06e);
        border-color: rgba(25, 135, 84, 0.3);
    }

    .btn-reject {
        background: linear-gradient(135deg, #b02a37, #dc3545);
        color: white;
        box-shadow: 0 4px 16px -4px rgba(220, 53, 69, 0.30);
        border-color: rgba(220, 53, 69, 0.2);
    }

    .btn-reject:hover {
        transform: translateY(-4px) scale(1.03);
        box-shadow: 0 12px 30px -6px rgba(220, 53, 69, 0.45);
        background: linear-gradient(135deg, #c72f3e, #e84555);
        border-color: rgba(220, 53, 69, 0.3);
    }

    /* ============================================================
       ALERT
       ============================================================ */
    .alert-custom {
        border: none;
        border-radius: var(--radius-lg);
        padding: 18px 28px;
        background: linear-gradient(135deg, #0d6e3d, #28c76f);
        color: white;
        font-weight: 600;
        box-shadow: 0 12px 35px -8px rgba(25, 135, 84, 0.25);
        animation: slideDown 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        display: flex;
        align-items: center;
        gap: 16px;
        backdrop-filter: blur(4px);
        border: 1px solid rgba(255,255,255,0.10);
        position: relative;
        overflow: hidden;
    }

    .alert-custom::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(255,255,255,0.06), transparent 60%);
        pointer-events: none;
    }

    .alert-custom .alert-icon {
        font-size: 1.6rem;
        line-height: 1;
        position: relative;
        z-index: 1;
    }

    .alert-custom .alert-text {
        position: relative;
        z-index: 1;
    }

    /* ============================================================
       EMPTY STATE
       ============================================================ */
    .empty-state {
        padding: 60px 20px !important;
        text-align: center;
    }

    .empty-state .empty-icon {
        font-size: 4.5rem;
        margin-bottom: 12px;
        display: block;
        opacity: 0.5;
        animation: float 3s ease-in-out infinite;
    }

    .empty-state .empty-text {
        font-size: 1.15rem;
        font-weight: 600;
        color: #2d1e1e;
    }

    .empty-state .empty-sub {
        display: block;
        font-size: 0.85rem;
        color: #b08a8a;
        margin-top: 4px;
        font-weight: 400;
    }

    /* ============================================================
       CARD FOOTER
       ============================================================ */
    .card-footer-custom {
        background: rgba(255, 255, 255, 0.30);
        padding: 14px 30px;
        border-top: 1px solid rgba(220, 53, 69, 0.04);
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
        font-size: 0.82rem;
        color: #6b4a4a;
        backdrop-filter: blur(4px);
    }

    .card-footer-custom .footer-badge {
        background: rgba(220, 53, 69, 0.04);
        padding: 4px 18px;
        border-radius: 60px;
        font-weight: 600;
        font-size: 0.75rem;
        color: var(--red-700);
        border: 1px solid rgba(220, 53, 69, 0.04);
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .card-footer-custom .footer-badge .live-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--red-500);
        display: inline-block;
        animation: pulseRing 2s infinite;
    }

    /* ============================================================
       PAGE HEADER
       ============================================================ */
    .page-header-custom {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 16px;
        margin-bottom: 30px;
        padding: 4px 0;
    }

    .page-header-custom .title-group {
        display: flex;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
    }

    .page-header-custom h2 {
        font-weight: 800;
        font-size: 2rem;
        letter-spacing: -0.03em;
        background: linear-gradient(135deg, var(--red-700), var(--red-500));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
        line-height: 1.2;
    }

    .page-header-custom .subtitle {
        color: #6b4a4a;
        font-weight: 500;
        opacity: 0.7;
        margin: 0;
        font-size: 0.95rem;
    }

    .page-header-custom .header-actions {
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .header-chip {
        background: rgba(220, 53, 69, 0.06);
        padding: 6px 20px;
        border-radius: 60px;
        font-weight: 600;
        font-size: 0.78rem;
        color: var(--red-700);
        display: flex;
        align-items: center;
        gap: 8px;
        border: 1px solid rgba(220, 53, 69, 0.06);
        transition: all var(--transition-fast);
    }

    .header-chip:hover {
        background: rgba(220, 53, 69, 0.10);
        border-color: rgba(220, 53, 69, 0.10);
        transform: translateY(-1px);
    }

    .header-chip .dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: var(--red-500);
        animation: pulseRing 2s infinite;
        display: inline-block;
    }

    /* ============================================================
       RESPONSIVE
       ============================================================ */
    @media (max-width: 1200px) {
        .custom-table { font-size: 0.85rem; min-width: 800px; }
        .item-img { width: 56px; height: 48px; }
        .item-img:hover { transform: scale(2.5); }
    }

    @media (max-width: 992px) {
        .custom-table tbody td { padding: 12px 12px; }
        .btn-action { min-width: 90px; padding: 8px 16px; font-size: 0.65rem; }
        .stats-grid { grid-template-columns: repeat(2, 1fr); gap: 16px; }
        .stats-number { font-size: 2.4rem; }
    }

    @media (max-width: 768px) {
        .page-header-custom h2 { font-size: 1.5rem; }
        .page-header-custom { flex-direction: column; align-items: flex-start; }

        .card-header-custom {
            flex-direction: column;
            align-items: stretch;
            padding: 16px 18px;
        }
        .search-wrapper { max-width: 100%; }

        .action-group {
            flex-direction: column;
            align-items: stretch;
        }
        .btn-action {
            width: 100%;
            min-width: unset;
            justify-content: center;
            padding: 10px 20px;
        }

        .custom-table tbody td:first-child { padding-left: 12px; }
        .custom-table tbody td:last-child { padding-right: 12px; }

        .table-wrap { padding: 4px 8px 8px; }

        .stats-grid { grid-template-columns: 1fr 1fr; gap: 12px; }
        .stats-card { padding: 20px 14px 16px; }
        .stats-number { font-size: 2rem; }
        .stats-card .icon-wrap { width: 48px; height: 48px; font-size: 1.6rem; }

        .item-img:hover { transform: scale(2); }
        .card-footer-custom { flex-direction: column; text-align: center; padding: 12px 18px; }

        .header-chip { font-size: 0.7rem; padding: 4px 14px; }
    }

    @media (max-width: 480px) {
        .stats-grid { grid-template-columns: 1fr; }
        .page-header-custom h2 { font-size: 1.3rem; }
        .custom-table { font-size: 0.78rem; min-width: 650px; }
        .item-img { width: 44px; height: 40px; }
        .badge-soft, .badge-city, .badge-qty, .price-tag { font-size: 0.65rem; padding: 2px 10px; }
        .alert-custom { flex-direction: column; text-align: center; padding: 16px 20px; }
    }

    /* ============================================================
       SCROLLBAR
       ============================================================ */
    .table-wrap::-webkit-scrollbar {
        height: 6px;
    }
    .table-wrap::-webkit-scrollbar-track {
        background: rgba(220, 53, 69, 0.04);
        border-radius: 10px;
    }
    .table-wrap::-webkit-scrollbar-thumb {
        background: rgba(220, 53, 69, 0.15);
        border-radius: 10px;
        transition: background 0.3s;
    }
    .table-wrap::-webkit-scrollbar-thumb:hover {
        background: rgba(220, 53, 69, 0.30);
    }

    /* ============================================================
       UTILITY: ROW STRIPING
       ============================================================ */
    .custom-table tbody tr:nth-child(even) {
        background: rgba(255, 245, 245, 0.30);
    }
    .custom-table tbody tr:nth-child(even):hover {
        background: #fff0f1;
    }

    /* ============================================================
       STATUS INDICATOR
       ============================================================ */
    .status-indicator {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 0.7rem;
        font-weight: 600;
        color: #ffc107;
        background: rgba(255, 193, 7, 0.08);
        padding: 2px 12px;
        border-radius: 60px;
        border: 1px solid rgba(255, 193, 7, 0.06);
    }

    .status-indicator .pulse-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #ffc107;
        animation: pulseRing 1.5s infinite;
        display: inline-block;
    }
</style>

{{-- ============================================================ --}}
{{-- CONTENT --}}
{{-- ============================================================ --}}

<div class="container-fluid px-3 px-md-4 py-3">

    {{-- Success Alert --}}
    @if(session('success'))
        <div class="alert-custom animate-in-fast mb-4">
            <span class="alert-icon">✅</span>
            <span class="alert-text">{{ session('success') }}</span>
        </div>
    @endif

    {{-- Page Header --}}
    <div class="page-header-custom animate-in" style="animation-delay:0.05s;">
        <div class="title-group">
            <h2>
                <span>⏳</span> Item Approval
            </h2>
            <span class="header-chip">
                <span class="dot"></span>
                {{ $items->count() }} pending
            </span>
        </div>
        <div class="header-actions">
            <span class="subtitle">
                <span style="display:inline-block;animation:float 3s ease-in-out infinite;">📋</span>
                Review & manage owner submissions
            </span>
        </div>
    </div>

    {{-- Stats Grid --}}
    <div class="stats-grid animate-in" style="animation-delay:0.08s;">

        <div class="stats-card">
            <div class="icon-wrap">📦</div>
            <div class="stats-number">{{ $items->count() }}</div>
            <div class="stats-label">Pending Items</div>
            <span class="stats-trend">↑ awaiting review</span>
        </div>

        <div class="stats-card">
            <div class="icon-wrap">📊</div>
            <div class="stats-number">{{ $items->sum('quantity') }}</div>
            <div class="stats-label">Total Quantity</div>
            <span class="stats-trend">across all listings</span>
        </div>

        <div class="stats-card">
            <div class="icon-wrap">👤</div>
            <div class="stats-number">{{ $items->pluck('user_id')->unique()->count() }}</div>
            <div class="stats-label">Unique Owners</div>
            <span class="stats-trend">active sellers</span>
        </div>

        <div class="stats-card">
            <div class="icon-wrap">🏷️</div>
            <div class="stats-number">{{ $items->pluck('category_id')->unique()->count() }}</div>
            <div class="stats-label">Categories</div>
            <span class="stats-trend">diverse inventory</span>
        </div>

    </div>

    {{-- Main Table Card --}}
    <div class="custom-card animate-in" style="animation-delay:0.12s;">

        {{-- Card Header --}}
        <div class="card-header-custom">
            <div class="header-left">
                <span class="title-icon">📋</span>
                <span class="title-text">All Requests</span>
                <span class="badge-count">{{ $items->count() }}</span>
                <span class="status-indicator">
                    <span class="pulse-dot"></span>
                    Live
                </span>
            </div>
            <div class="search-wrapper">
                <input
                    type="text"
                    id="searchInput"
                    class="search-box"
                    placeholder="Search items, owners, cities…"
                    aria-label="Search items"
                    autocomplete="off"
                >
                <span class="search-icon">🔍</span>
                <button class="search-clear" id="searchClear" aria-label="Clear search">✕</button>
            </div>
        </div>

        {{-- Table --}}
        <div class="table-wrap">
            <table class="custom-table">

                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Item</th>
                        <th>Owner</th>
                        <th>Category</th>
                        <th>City</th>
                        <th>Price / Day</th>
                        <th>Qty</th>
                        <th style="min-width:250px;">Actions</th>
                    </tr>
                </thead>

                <tbody id="tableBody">

                    @forelse($items as $item)
                        <tr class="animate-in" style="animation-delay:{{ $loop->index * 0.015 + 0.2 }}s;">
                            {{-- Image --}}
                            <td>
                                @if($item->images->count())
                                    <div class="img-container">
                                        <img
                                            src="{{ asset('uploads/items/'.$item->images->first()->image) }}"
                                            class="item-img"
                                            alt="{{ $item->title }}"
                                            loading="lazy"
                                        >
                                        <span class="zoom-hint">🔍</span>
                                    </div>
                                @else
                                    <div class="no-image-placeholder">
                                        <span>🖼️</span>
                                    </div>
                                @endif
                            </td>

                            {{-- Title --}}
                            <td>
                                <span class="item-title">{{ $item->title }}</span>
                            </td>

                            {{-- Owner --}}
                            <td>
                                <span class="owner-name">
                                    {{ $item->owner->name ?? 'N/A' }}
                                </span>
                            </td>

                            {{-- Category --}}
                            <td>
                                <span class="badge-soft">{{ $item->category->name ?? 'N/A' }}</span>
                            </td>

                            {{-- City --}}
                            <td>
                                <span class="badge-city">
                                    📍 {{ $item->city }}
                                </span>
                            </td>

                            {{-- Price --}}
                            <td>
                                <span class="price-tag">Rs {{ number_format($item->rent_price_per_day) }}</span>
                            </td>

                            {{-- Quantity --}}
                            <td>
                                <span class="badge-qty">{{ $item->quantity }}</span>
                            </td>

                            {{-- Actions --}}
                            <td>
                                <div class="action-group">

                                    {{-- Approve --}}
                                    <form method="POST" action="/admin/items/{{ $item->id }}/approve" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn-action btn-approve">
                                            <span class="btn-icon">✓</span> Approve
                                        </button>
                                    </form>

                                    {{-- Reject --}}
                                    <form method="POST" action="/admin/items/{{ $item->id }}/reject" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn-action btn-reject">
                                            <span class="btn-icon">✕</span> Reject
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="empty-state">
                                <span class="empty-icon">📭</span>
                                <span class="empty-text">No pending item requests found.</span>
                                <span class="empty-sub">All caught up! 🎉 Everything is approved.</span>
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        {{-- Card Footer --}}
        <div class="card-footer-custom">
            <span>
                Showing <strong>{{ $items->count() }}</strong> pending {{ Str::plural('item', $items->count()) }}
            </span>
            <span class="footer-badge">
                <span class="live-dot"></span>
                Updated: {{ now()->format('M d, Y H:i') }}
            </span>
        </div>

    </div>

</div>

{{-- ============================================================ --}}
{{-- JavaScript: Live Search with Clear Button & Smooth Filtering --}}
{{-- ============================================================ --}}
<script>
    (function() {
        'use strict';

        const searchInput = document.getElementById('searchInput');
        const searchClear = document.getElementById('searchClear');
        const rows = document.querySelectorAll('#tableBody tr');

        // Filter out empty state row if present
        const dataRows = Array.from(rows).filter(row => {
            return !row.querySelector('.empty-state');
        });

        const emptyRow = document.querySelector('.empty-state')?.closest('tr');

        function updateClearButton() {
            if (searchInput.value.length > 0) {
                searchClear.classList.add('visible');
            } else {
                searchClear.classList.remove('visible');
            }
        }

        function filterRows() {
            const query = searchInput.value.toLowerCase().trim();
            let visibleCount = 0;

            dataRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                const match = text.includes(query);
                row.style.display = match ? '' : 'none';
                if (match) visibleCount++;
            });

            // Show/hide empty state if all rows are hidden
            if (emptyRow) {
                emptyRow.style.display = (visibleCount === 0 && dataRows.length > 0) ? '' : 'none';
            }

            updateClearButton();
        }

        // Debounced search
        let debounceTimer;
        searchInput.addEventListener('input', function() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(filterRows, 150);
        });

        // Clear button
        searchClear.addEventListener('click', function() {
            searchInput.value = '';
            filterRows();
            searchInput.focus();
        });

        // Also trigger on search clear (via X button in some browsers)
        searchInput.addEventListener('search', filterRows);

        // Initial state
        filterRows();

        // Keyboard shortcut: Escape clears search
        searchInput.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                searchInput.value = '';
                filterRows();
                searchInput.blur();
            }
        });

    })();
</script>

@endsection