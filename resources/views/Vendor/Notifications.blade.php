@extends('Vendor.layout')
@section('content')

<style>
    /* ===== IMPORTS & RESETS ===== */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* ===== MAIN WRAPPER ===== */
    .notifications-wrapper {
        font-family: 'Inter', sans-serif;
        max-width: 950px;
        margin: 0 auto;
        padding: 30px 25px;
        position: relative;
        min-height: 100vh;
    }

    /* ===== ANIMATED BACKGROUND PARTICLES ===== */
    .bg-particles {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        pointer-events: none;
        z-index: 0;
        overflow: hidden;
    }

    .particle {
        position: absolute;
        border-radius: 50%;
        opacity: 0;
        animation: particleFloat linear infinite;
        background: radial-gradient(circle, rgba(220, 53, 69, 0.3), transparent);
    }

    @keyframes particleFloat {
        0% {
            transform: translateY(100vh) scale(0);
            opacity: 0;
        }
        10% {
            opacity: 1;
        }
        90% {
            opacity: 1;
        }
        100% {
            transform: translateY(-10vh) scale(1);
            opacity: 0;
        }
    }

    /* ===== GLASS OVERLAY ===== */
    .glass-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 50%, rgba(220, 53, 69, 0.03) 0%, transparent 50%),
            radial-gradient(circle at 80% 50%, rgba(220, 53, 69, 0.03) 0%, transparent 50%),
            radial-gradient(circle at 50% 100%, rgba(220, 53, 69, 0.02) 0%, transparent 30%);
        pointer-events: none;
        z-index: 0;
        animation: overlayPulse 8s ease-in-out infinite;
    }

    @keyframes overlayPulse {
        0%, 100% { opacity: 0.5; }
        50% { opacity: 1; }
    }

    /* ===== HEADER SECTION ===== */
    .notifications-header {
        position: relative;
        z-index: 1;
        background: linear-gradient(135deg, #dc3545 0%, #b02a37 30%, #dc3545 60%, #c82333 100%);
        background-size: 300% 300%;
        padding: 35px 40px;
        border-radius: 24px;
        margin-bottom: 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 
            0 15px 50px rgba(220, 53, 69, 0.35),
            0 5px 20px rgba(0, 0, 0, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.25);
        animation: gradientFlow 6s ease-in-out infinite;
        transform: translateY(0);
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        overflow: hidden;
        backdrop-filter: blur(10px);
    }

    .notifications-header::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: 
            radial-gradient(circle at 30% 50%, rgba(255, 255, 255, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 70% 50%, rgba(255, 255, 255, 0.05) 0%, transparent 30%);
        animation: headerGlow 15s linear infinite;
        pointer-events: none;
    }

    @keyframes headerGlow {
        0% { transform: rotate(0deg) scale(1); }
        50% { transform: rotate(180deg) scale(1.2); }
        100% { transform: rotate(360deg) scale(1); }
    }

    @keyframes gradientFlow {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .notifications-header::after {
        content: '';
        position: absolute;
        top: -100%;
        left: -100%;
        width: 300%;
        height: 300%;
        background: conic-gradient(from 0deg, transparent, rgba(255,255,255,0.05), transparent, rgba(255,255,255,0.05), transparent);
        animation: conicRotate 20s linear infinite;
        pointer-events: none;
    }

    @keyframes conicRotate {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .notifications-header:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 
            0 25px 60px rgba(220, 53, 69, 0.45),
            0 10px 30px rgba(0, 0, 0, 0.15),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
    }

    .header-left {
        display: flex;
        align-items: center;
        gap: 25px;
        position: relative;
        z-index: 2;
    }

    /* ===== 3D ICON WRAPPER ===== */
    .header-icon-wrapper {
        position: relative;
        width: 75px;
        height: 75px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.15);
        border-radius: 20px;
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.25);
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        transform-style: preserve-3d;
        perspective: 500px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .header-icon-wrapper::before {
        content: '';
        position: absolute;
        inset: 2px;
        border-radius: 18px;
        background: linear-gradient(135deg, rgba(255,255,255,0.2), transparent);
        pointer-events: none;
    }

    .header-icon-wrapper:hover {
        transform: rotateY(-10deg) rotateX(5deg) scale(1.1);
        background: rgba(255, 255, 255, 0.25);
        box-shadow: 
            0 20px 40px rgba(0, 0, 0, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
    }

    .header-icon-wrapper i {
        font-size: 32px;
        color: white;
        filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.2));
        animation: bellSwing 4s ease-in-out infinite;
        transform-origin: top center;
    }

    @keyframes bellSwing {
        0%, 80%, 100% { transform: rotate(0deg); }
        85% { transform: rotate(15deg); }
        88% { transform: rotate(-12deg); }
        91% { transform: rotate(8deg); }
        94% { transform: rotate(-5deg); }
        97% { transform: rotate(3deg); }
    }

    /* ===== NOTIFICATION DOT ===== */
    .header-icon-wrapper .notification-dot {
        position: absolute;
        top: -8px;
        right: -8px;
        min-width: 28px;
        height: 28px;
        padding: 0 8px;
        background: linear-gradient(135deg, #ffd700, #f0c000);
        border-radius: 50px;
        border: 3px solid #dc3545;
        animation: dotPulse 1.5s ease-in-out infinite;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        font-weight: 800;
        color: #dc3545;
        box-shadow: 0 4px 15px rgba(255, 215, 0, 0.5);
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    }

    @keyframes dotPulse {
        0%, 100% { transform: scale(1); box-shadow: 0 4px 15px rgba(255, 215, 0, 0.5); }
        50% { transform: scale(1.15); box-shadow: 0 4px 30px rgba(255, 215, 0, 0.8); }
    }

    /* ===== HEADER TEXT ===== */
    .header-text {
        position: relative;
        z-index: 2;
    }

    .header-text h2 {
        color: white;
        margin: 0;
        font-weight: 900;
        font-size: 2.2rem;
        letter-spacing: -0.5px;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .header-text h2 .highlight {
        background: rgba(255, 255, 255, 0.2);
        padding: 2px 12px;
        border-radius: 50px;
        font-size: 0.7em;
        font-weight: 600;
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.15);
    }

    .header-text .subtitle {
        color: rgba(255, 255, 255, 0.92);
        margin: 4px 0 0;
        font-size: 0.95rem;
        font-weight: 400;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .header-text .subtitle .status-dot {
        display: inline-block;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #28a745;
        animation: statusPulse 2s ease-in-out infinite;
    }

    @keyframes statusPulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.6; transform: scale(0.8); }
    }

    /* ===== MARK ALL BUTTON ===== */
    .header-right {
        position: relative;
        z-index: 2;
    }

    .btn-mark-all {
        position: relative;
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.25);
        color: white;
        padding: 14px 32px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1rem;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        display: flex;
        align-items: center;
        gap: 12px;
        cursor: pointer;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-mark-all::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: rgba(255, 255, 255, 0.25);
        border-radius: 50%;
        transition: all 0.7s ease;
        transform: translate(-50%, -50%);
    }

    .btn-mark-all:hover::before {
        width: 400%;
        height: 400%;
    }

    .btn-mark-all::after {
        content: '';
        position: absolute;
        inset: -1px;
        border-radius: 50px;
        background: linear-gradient(135deg, rgba(255,255,255,0.3), transparent, rgba(255,255,255,0.3));
        animation: btnShine 3s linear infinite;
        pointer-events: none;
    }

    @keyframes btnShine {
        0% { transform: translateX(-100%) rotate(45deg); }
        100% { transform: translateX(100%) rotate(45deg); }
    }

    .btn-mark-all:hover {
        background: white;
        color: #dc3545;
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 15px 40px rgba(255, 255, 255, 0.25);
    }

    .btn-mark-all:active {
        transform: scale(0.95);
    }

    .btn-mark-all i {
        font-size: 1.1rem;
    }

    /* ===== NOTIFICATION CARDS ===== */
    .notification-card {
        position: relative;
        z-index: 1;
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(25px);
        border-radius: 20px;
        margin-bottom: 24px;
        border: 1px solid rgba(220, 53, 69, 0.08);
        box-shadow: 
            0 4px 25px rgba(0, 0, 0, 0.04),
            0 1px 3px rgba(0, 0, 0, 0.02),
            inset 0 1px 0 rgba(255, 255, 255, 0.9);
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        opacity: 0;
        animation: cardEntrance 0.7s ease forwards;
        overflow: hidden;
        transform-style: preserve-3d;
        perspective: 1000px;
    }

    @keyframes cardEntrance {
        from {
            opacity: 0;
            transform: translateY(40px) scale(0.95) rotateX(-5deg);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1) rotateX(0deg);
        }
    }

    /* ===== CARD GLOW EFFECT ===== */
    .notification-card::before {
        content: '';
        position: absolute;
        inset: -1px;
        border-radius: 21px;
        padding: 1px;
        background: linear-gradient(135deg, rgba(220, 53, 69, 0.1), transparent, rgba(220, 53, 69, 0.05));
        -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
        pointer-events: none;
        opacity: 0;
        transition: opacity 0.5s ease;
    }

    .notification-card:hover::before {
        opacity: 1;
    }

    .notification-card:hover {
        transform: translateX(12px) translateY(-6px) scale(1.01) rotateY(2deg);
        box-shadow: 
            0 20px 60px rgba(220, 53, 69, 0.15),
            0 8px 25px rgba(0, 0, 0, 0.06),
            inset 0 1px 0 rgba(255, 255, 255, 0.9);
        border-color: rgba(220, 53, 69, 0.2);
    }

    /* ===== UNREAD CARD STYLES ===== */
    .notification-card.unread {
        background: linear-gradient(135deg, rgba(255, 245, 245, 0.95), rgba(255, 255, 255, 0.95));
        border-left: 5px solid #dc3545;
        box-shadow: 
            0 4px 25px rgba(220, 53, 69, 0.1),
            0 1px 3px rgba(0, 0, 0, 0.02),
            inset 0 1px 0 rgba(255, 255, 255, 0.9);
    }

    .notification-card.unread::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at top right, rgba(220, 53, 69, 0.06), transparent 70%);
        pointer-events: none;
        animation: unreadGlow 4s ease-in-out infinite;
    }

    @keyframes unreadGlow {
        0%, 100% { opacity: 0.5; transform: scale(1); }
        50% { opacity: 1; transform: scale(1.1); }
    }

    /* ===== CARD BODY ===== */
    .card-body {
        padding: 28px 32px;
        position: relative;
        z-index: 1;
    }

    /* ===== NOTIFICATION HEADER ===== */
    .notification-header {
        display: flex;
        align-items: flex-start;
        gap: 18px;
        margin-bottom: 14px;
    }

    /* ===== 3D ICON IN CARD ===== */
    .notification-icon {
        width: 52px;
        height: 52px;
        min-width: 52px;
        background: linear-gradient(135deg, #dc3545, #b02a37);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 20px;
        box-shadow: 
            0 8px 25px rgba(220, 53, 69, 0.25),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        transform-style: preserve-3d;
    }

    .notification-card:hover .notification-icon {
        transform: rotateY(-15deg) rotateX(5deg) scale(1.1) translateZ(10px);
        box-shadow: 
            0 15px 35px rgba(220, 53, 69, 0.35),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
    }

    .notification-content {
        flex: 1;
        min-width: 0;
    }

    /* ===== TITLE WRAPPER ===== */
    .notification-title-wrapper {
        display: flex;
        align-items: center;
        gap: 14px;
        flex-wrap: wrap;
        margin-bottom: 6px;
    }

    .notification-title-wrapper h5 {
        margin: 0;
        font-weight: 800;
        color: #1a202c;
        font-size: 1.1rem;
        letter-spacing: -0.3px;
        transition: color 0.3s ease;
    }

    .notification-card:hover .notification-title-wrapper h5 {
        color: #dc3545;
    }

    /* ===== PREMIUM BADGE ===== */
    .badge-premium {
        position: relative;
        background: linear-gradient(135deg, #dc3545, #ff6b6b, #dc3545);
        background-size: 200% 200%;
        color: white;
        padding: 5px 16px;
        border-radius: 50px;
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
        animation: badgeShimmer 3s ease-in-out infinite;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        overflow: hidden;
    }

    @keyframes badgeShimmer {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .badge-premium::before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 50px;
        padding: 1px;
        background: linear-gradient(135deg, rgba(255,255,255,0.3), transparent, rgba(255,255,255,0.3));
        -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
        animation: badgeBorder 2s linear infinite;
    }

    @keyframes badgeBorder {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .badge-premium .circle {
        display: inline-block;
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: white;
        animation: circlePulse 1s ease-in-out infinite;
    }

    @keyframes circlePulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.3; transform: scale(0.8); }
    }

    /* ===== MESSAGE ===== */
    .notification-message {
        color: #4a5568;
        margin: 10px 0 14px 0;
        line-height: 1.8;
        font-size: 0.98rem;
        padding-right: 20px;
        position: relative;
    }

    .notification-message::before {
        content: '"';
        position: absolute;
        top: -8px;
        left: -8px;
        font-size: 28px;
        color: #dc3545;
        opacity: 0.1;
        font-family: Georgia, serif;
    }

    /* ===== META INFO ===== */
    .notification-meta {
        display: flex;
        align-items: center;
        gap: 25px;
        flex-wrap: wrap;
        padding: 12px 0;
        margin: 12px 0 16px;
        border-top: 2px solid rgba(0, 0, 0, 0.04);
        border-bottom: 2px solid rgba(0, 0, 0, 0.04);
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #718096;
        font-size: 0.88rem;
        font-weight: 500;
        transition: all 0.3s ease;
        padding: 4px 12px;
        border-radius: 50px;
        background: rgba(0, 0, 0, 0.02);
    }

    .meta-item i {
        font-size: 14px;
        color: #dc3545;
        opacity: 0.6;
        transition: all 0.3s ease;
    }

    .meta-item:hover {
        color: #dc3545;
        background: rgba(220, 53, 69, 0.05);
        transform: translateX(5px);
    }

    .meta-item:hover i {
        opacity: 1;
        transform: scale(1.2);
    }

    .meta-item .status-indicator {
        display: inline-block;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        margin-left: 4px;
    }

    .meta-item .status-indicator.read {
        background: #28a745;
    }

    .meta-item .status-indicator.unread {
        background: #dc3545;
        animation: statusPulse 2s ease-in-out infinite;
    }

    /* ===== ACTIONS ===== */
    .notification-actions {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 4px;
    }

    .btn-action {
        position: relative;
        padding: 10px 26px;
        border-radius: 50px;
        font-size: 0.88rem;
        font-weight: 600;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        border: 2px solid transparent;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
        background: transparent;
        overflow: hidden;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-action::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        transition: all 0.6s ease;
        transform: translate(-50%, -50%);
    }

    .btn-action:active::after {
        width: 300%;
        height: 300%;
    }

    /* ===== MARK READ BUTTON ===== */
    .btn-mark-read {
        background: linear-gradient(135deg, #dc3545, #c82333);
        color: white;
        border-color: #dc3545;
        box-shadow: 0 6px 20px rgba(220, 53, 69, 0.25);
    }

    .btn-mark-read:hover {
        transform: translateY(-4px) scale(1.06);
        box-shadow: 0 12px 40px rgba(220, 53, 69, 0.4);
        background: linear-gradient(135deg, #c82333, #b02a37);
        border-color: #b02a37;
    }

    .btn-mark-read::before {
        content: '';
        position: absolute;
        inset: -2px;
        border-radius: 50px;
        padding: 2px;
        background: linear-gradient(135deg, #ff6b6b, transparent, #ff6b6b);
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .btn-mark-read:hover::before {
        opacity: 1;
    }

    /* ===== DELETE BUTTON ===== */
    .btn-delete {
        background: transparent;
        color: #dc3545;
        border-color: #dc3545;
    }

    .btn-delete:hover {
        background: #dc3545;
        color: white;
        transform: translateY(-4px) scale(1.06);
        box-shadow: 0 12px 40px rgba(220, 53, 69, 0.3);
    }

    /* ===== READ BUTTON ===== */
    .btn-read {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        border-color: #28a745;
        box-shadow: 0 6px 20px rgba(40, 167, 69, 0.2);
    }

    .btn-read:hover {
        transform: translateY(-4px) scale(1.06);
        box-shadow: 0 12px 40px rgba(40, 167, 69, 0.35);
        background: linear-gradient(135deg, #218838, #1e7e34);
    }

    /* ===== PAGINATION ===== */
    .pagination-container {
        position: relative;
        z-index: 1;
        margin-top: 50px;
        display: flex;
        justify-content: center;
    }

    .pagination-container .pagination {
        gap: 10px;
        flex-wrap: wrap;
    }

    .pagination-container .page-link {
        border: none;
        padding: 12px 22px;
        border-radius: 14px;
        color: #4a5568;
        font-weight: 700;
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(15px);
        border: 2px solid rgba(220, 53, 69, 0.08);
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
        font-size: 0.95rem;
        min-width: 48px;
        text-align: center;
    }

    .pagination-container .page-link:hover {
        background: linear-gradient(135deg, #dc3545, #b02a37);
        color: white;
        transform: translateY(-4px) scale(1.08);
        box-shadow: 0 12px 35px rgba(220, 53, 69, 0.3);
        border-color: #dc3545;
    }

    .pagination-container .page-item.active .page-link {
        background: linear-gradient(135deg, #dc3545, #b02a37);
        color: white;
        border-color: #dc3545;
        box-shadow: 0 8px 30px rgba(220, 53, 69, 0.35);
        transform: scale(1.05);
    }

    .pagination-container .page-item.disabled .page-link {
        opacity: 0.4;
        cursor: not-allowed;
        transform: none !important;
    }

    /* ===== EMPTY STATE ===== */
    .empty-state {
        position: relative;
        z-index: 1;
        text-align: center;
        padding: 100px 40px;
        background: rgba(255, 255, 255, 0.75);
        backdrop-filter: blur(25px);
        border-radius: 24px;
        border: 3px dashed rgba(220, 53, 69, 0.15);
        box-shadow: 0 8px 40px rgba(0, 0, 0, 0.04);
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        overflow: hidden;
    }

    .empty-state::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle, rgba(220, 53, 69, 0.03), transparent 70%);
        animation: emptyGlow 6s ease-in-out infinite;
    }

    @keyframes emptyGlow {
        0%, 100% { transform: scale(1) rotate(0deg); }
        50% { transform: scale(1.2) rotate(180deg); }
    }

    .empty-state:hover {
        border-color: rgba(220, 53, 69, 0.3);
        transform: scale(1.02);
        box-shadow: 0 15px 60px rgba(0, 0, 0, 0.08);
    }

    .empty-state .empty-icon {
        position: relative;
        z-index: 1;
        width: 120px;
        height: 120px;
        margin: 0 auto 30px;
        background: linear-gradient(135deg, rgba(220, 53, 69, 0.08), rgba(220, 53, 69, 0.02));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        animation: floatEmpty 4s ease-in-out infinite;
        border: 2px solid rgba(220, 53, 69, 0.05);
    }

    @keyframes floatEmpty {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(-5deg); }
    }

    .empty-state .empty-icon i {
        font-size: 60px;
        color: #dc3545;
        opacity: 0.25;
        transition: all 0.5s ease;
    }

    .empty-state:hover .empty-icon i {
        opacity: 0.4;
        transform: scale(1.1);
    }

    .empty-state h4 {
        position: relative;
        z-index: 1;
        color: #1a202c;
        font-weight: 800;
        margin-bottom: 12px;
        font-size: 1.8rem;
        letter-spacing: -0.5px;
    }

    .empty-state p {
        position: relative;
        z-index: 1;
        color: #718096;
        font-size: 1.05rem;
        max-width: 450px;
        margin: 0 auto;
        line-height: 1.7;
    }

    /* ===== CARD ANIMATION DELAYS ===== */
    .notification-card:nth-child(1) { animation-delay: 0.05s; }
    .notification-card:nth-child(2) { animation-delay: 0.1s; }
    .notification-card:nth-child(3) { animation-delay: 0.15s; }
    .notification-card:nth-child(4) { animation-delay: 0.2s; }
    .notification-card:nth-child(5) { animation-delay: 0.25s; }
    .notification-card:nth-child(6) { animation-delay: 0.3s; }
    .notification-card:nth-child(7) { animation-delay: 0.35s; }
    .notification-card:nth-child(8) { animation-delay: 0.4s; }
    .notification-card:nth-child(9) { animation-delay: 0.45s; }
    .notification-card:nth-child(10) { animation-delay: 0.5s; }
    .notification-card:nth-child(11) { animation-delay: 0.55s; }
    .notification-card:nth-child(12) { animation-delay: 0.6s; }
    .notification-card:nth-child(13) { animation-delay: 0.65s; }
    .notification-card:nth-child(14) { animation-delay: 0.7s; }
    .notification-card:nth-child(15) { animation-delay: 0.75s; }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
        .notifications-wrapper {
            padding: 20px 15px;
        }

        .notifications-header {
            padding: 25px 30px;
            flex-direction: column;
            gap: 20px;
            align-items: stretch;
            text-align: center;
        }

        .header-left {
            flex-direction: column;
            text-align: center;
        }

        .header-text h2 {
            font-size: 1.8rem;
            justify-content: center;
        }

        .header-text .subtitle {
            justify-content: center;
        }

        .btn-mark-all {
            justify-content: center;
            width: 100%;
        }

        .card-body {
            padding: 22px 24px;
        }
    }

    @media (max-width: 768px) {
        .notifications-header {
            padding: 20px;
            border-radius: 18px;
        }

        .header-icon-wrapper {
            width: 60px;
            height: 60px;
        }

        .header-icon-wrapper i {
            font-size: 24px;
        }

        .header-text h2 {
            font-size: 1.5rem;
        }

        .notification-card:hover {
            transform: translateX(0) translateY(-4px) scale(1.01);
        }

        .card-body {
            padding: 18px 20px;
        }

        .notification-header {
            flex-direction: column;
            align-items: stretch;
            gap: 12px;
        }

        .notification-icon {
            width: 44px;
            height: 44px;
            min-width: 44px;
            font-size: 16px;
        }

        .notification-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .btn-action {
            width: 100%;
            justify-content: center;
            padding: 12px 20px;
        }

        .notification-meta {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }

        .meta-item {
            width: 100%;
        }

        .empty-state {
            padding: 60px 20px;
        }

        .empty-state .empty-icon {
            width: 90px;
            height: 90px;
        }

        .empty-state .empty-icon i {
            font-size: 40px;
        }

        .empty-state h4 {
            font-size: 1.4rem;
        }

        .pagination-container .page-link {
            padding: 10px 16px;
            font-size: 0.85rem;
        }
    }

    @media (max-width: 480px) {
        .header-text h2 {
            font-size: 1.3rem;
        }

        .header-text .subtitle {
            font-size: 0.8rem;
            flex-wrap: wrap;
        }

        .notification-title-wrapper h5 {
            font-size: 0.95rem;
        }

        .badge-premium {
            font-size: 0.6rem;
            padding: 4px 12px;
        }

        .notification-message {
            font-size: 0.9rem;
        }

        .btn-action {
            font-size: 0.8rem;
            padding: 10px 16px;
        }
    }

    /* ===== CUSTOM SCROLLBAR ===== */
    .notifications-wrapper::-webkit-scrollbar {
        width: 10px;
    }

    .notifications-wrapper::-webkit-scrollbar-track {
        background: rgba(0, 0, 0, 0.02);
        border-radius: 10px;
    }

    .notifications-wrapper::-webkit-scrollbar-thumb {
        background: linear-gradient(180deg, #dc3545, #b02a37);
        border-radius: 10px;
        border: 2px solid rgba(255, 255, 255, 0.1);
    }

    .notifications-wrapper::-webkit-scrollbar-thumb:hover {
        background: #dc3545;
    }

    /* ===== SELECTION STYLING ===== */
    ::selection {
        background: #dc3545;
        color: white;
    }
</style>

<!-- ===== BACKGROUND PARTICLES ===== -->
<div class="bg-particles" id="particles"></div>
<div class="glass-overlay"></div>

<!-- ===== MAIN CONTENT ===== -->
<div class="notifications-wrapper">
    <!-- Header -->
    <div class="notifications-header">
        <div class="header-left">
            <div class="header-icon-wrapper">
                <i class="fas fa-bell"></i>
                @if($notifications->whereNull('read_at')->count() > 0)
                    <span class="notification-dot">
                        {{ $notifications->whereNull('read_at')->count() }}
                    </span>
                @endif
            </div>
            <div class="header-text">
                <h2>
                    Notifications
                    <span class="highlight">
                        <i class="fas fa-bolt" style="font-size: 0.6em;"></i>
                        Live
                    </span>
                </h2>
                <p class="subtitle">
                    <span class="status-dot"></span>
                    {{ $notifications->whereNull('read_at')->count() }} unread · 
                    {{ $notifications->count() }} total
                </p>
            </div>
        </div>
        
        @if($notifications->whereNull('read_at')->count() > 0)
            <div class="header-right">
                <form action="/owner/notifications/read-all" method="POST" class="m-0">
                    @csrf
                    <button class="btn-mark-all" type="submit">
                        <i class="fas fa-check-double"></i>
                        <span>Mark All Read</span>
                        <i class="fas fa-arrow-right" style="font-size: 0.8rem;"></i>
                    </button>
                </form>
            </div>
        @endif
    </div>

    <!-- Notifications -->
    @forelse($notifications as $notification)
        <div class="notification-card {{ !$notification->read_at ? 'unread' : '' }}">
            <div class="card-body">
                <div class="notification-header">
                    <div class="notification-icon">
                        <i class="fas {{ $notification->data['icon'] ?? 'fa-envelope' }}"></i>
                    </div>
                    <div class="notification-content">
                        <div class="notification-title-wrapper">
                            <h5>{{ $notification->data['title'] }}</h5>
                            @if(!$notification->read_at)
                                <span class="badge-premium">
                                    <span class="circle"></span>
                                    New
                                </span>
                            @endif
                        </div>
                        <p class="notification-message">
                            {{ $notification->data['message'] }}
                        </p>
                    </div>
                </div>

                <div class="notification-meta">
                    <span class="meta-item">
                        <i class="far fa-clock"></i>
                        {{ $notification->created_at->diffForHumans() }}
                    </span>
                    @if($notification->read_at)
                        <span class="meta-item">
                            <i class="fas fa-check-circle" style="color: #28a745;"></i>
                            Read {{ $notification->read_at->diffForHumans() }}
                            <span class="status-indicator read"></span>
                        </span>
                    @else
                        <span class="meta-item">
                            <i class="fas fa-circle" style="color: #dc3545; font-size: 8px;"></i>
                            Unread
                            <span class="status-indicator unread"></span>
                        </span>
                    @endif
                </div>

                <div class="notification-actions">
                    @if(!$notification->read_at)
                        <form action="/owner/notifications/read/{{ $notification->id }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="btn-action btn-mark-read" type="submit">
                                <i class="fas fa-check"></i>
                                Mark Read
                            </button>
                        </form>
                    @endif

                    <form action="/owner/notifications/{{ $notification->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn-action btn-delete" type="submit" onclick="return confirm('Delete this notification?')">
                            <i class="fas fa-trash"></i>
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="empty-state">
            <div class="empty-icon">
                <i class="fas fa-bell-slash"></i>
            </div>
            <h4>All Caught Up! 🎉</h4>
            <p>You have no notifications at the moment. We'll notify you when something important happens.</p>
        </div>
    @endforelse

    <!-- Pagination -->
    @if($notifications->hasPages())
        <div class="pagination-container">
            {{ $notifications->links() }}
        </div>
    @endif
</div>

<!-- ===== JAVASCRIPT FOR PARTICLES ===== -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Create floating particles
        const particlesContainer = document.getElementById('particles');
        const particleCount = 15;
        
        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            const size = Math.random() * 8 + 4;
            particle.style.width = size + 'px';
            particle.style.height = size + 'px';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animationDuration = (Math.random() * 15 + 10) + 's';
            particle.style.animationDelay = (Math.random() * 10) + 's';
            particle.style.opacity = Math.random() * 0.4 + 0.1;
            particlesContainer.appendChild(particle);
        }
    });

    // Smooth card entrance with intersection observer
    if ('IntersectionObserver' in window) {
        const cards = document.querySelectorAll('.notification-card');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0) scale(1) rotateX(0)';
                    }, index * 50);
                }
            });
        }, { threshold: 0.1 });

        cards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px) scale(0.95) rotateX(-5deg)';
            observer.observe(card);
        });
    }
</script>

@endsection