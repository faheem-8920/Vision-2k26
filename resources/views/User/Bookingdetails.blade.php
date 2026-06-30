@extends('User.layout')

@section('content')

<style>
    /* ============================================
       ROOT VARIABLES - RED & WHITE THEME
    ============================================ */
    :root {
        --primary: #DC3545;
        --primary-dark: #B22234;
        --primary-light: #FF6B6B;
        --primary-bg: #FFF5F5;
        --success: #28A745;
        --warning: #FFC107;
        --bg-main: #FFFFFF;
        --bg-light: #FEF8F8;
        --text-dark: #1A1A1A;
        --text-muted: #6C757D;
        --border-color: #F0E6E6;
        --shadow-sm: 0 2px 12px rgba(220, 53, 69, 0.08);
        --shadow-md: 0 6px 24px rgba(220, 53, 69, 0.12);
        --shadow-lg: 0 12px 40px rgba(220, 53, 69, 0.15);
        --radius: 16px;
        --transition: all 0.3s cubic-bezier(0.22, 1, 0.36, 1);
    }

    [data-theme="dark"] {
        --bg-main: #1A1A2E;
        --bg-light: #16162A;
        --text-dark: #EEEDF5;
        --text-muted: #A8A8C8;
        --border-color: #2A2A4A;
        --shadow-sm: 0 2px 12px rgba(0,0,0,0.3);
        --shadow-md: 0 6px 24px rgba(0,0,0,0.4);
        --shadow-lg: 0 12px 40px rgba(0,0,0,0.5);
    }

    /* ============================================
       BASE STYLES
    ============================================ */
    body {
        background: var(--bg-light);
        color: var(--text-dark);
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        line-height: 1.6;
        min-height: 100vh;
    }

    .container {
        max-width: 1280px;
    }

    /* ============================================
       ENHANCED HERO SECTION
    ============================================ */
    .rental-hero {
        background: linear-gradient(135deg, #DC3545, #B22234);
        padding: 2.5rem 0 2rem;
        border-radius: 0 0 3rem 3rem;
        position: relative;
        overflow: hidden;
        margin-bottom: 1.5rem;
        box-shadow: 0 8px 32px rgba(220, 53, 69, 0.25);
    }

    .rental-hero::before {
        content: '🏠';
        position: absolute;
        right: 2rem;
        bottom: -1.5rem;
        font-size: 10rem;
        opacity: 0.05;
        transform: rotate(-8deg);
        animation: floatIcon 12s ease-in-out infinite;
    }

    @keyframes floatIcon {
        0%, 100% { transform: rotate(-8deg) translateY(0); }
        50% { transform: rotate(-3deg) translateY(-15px); }
    }

    .rental-hero::after {
        content: '';
        position: absolute;
        top: -60%;
        right: -5%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(255,255,255,0.06) 0%, transparent 70%);
        animation: floatShape 10s ease-in-out infinite;
    }

    @keyframes floatShape {
        0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
        50% { transform: translate(-30px, 20px) rotate(5deg) scale(1.05); }
    }

    /* Hero decorative dots */
    .hero-dots {
        position: absolute;
        right: 10%;
        top: 20%;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 8px;
        opacity: 0.08;
    }

    .hero-dots span {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: white;
        display: block;
    }

    .hero-breadcrumb {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.75rem;
        color: rgba(255,255,255,0.6);
        margin-bottom: 0.5rem;
    }

    .hero-breadcrumb a {
        color: rgba(255,255,255,0.6);
        text-decoration: none;
        transition: var(--transition);
    }

    .hero-breadcrumb a:hover {
        color: white;
    }

    .hero-breadcrumb .separator {
        opacity: 0.4;
    }

    .hero-title {
        font-size: 1.8rem;
        font-weight: 800;
        color: white;
        margin-bottom: 0.25rem;
        letter-spacing: -0.5px;
    }

    .hero-subtitle {
        color: rgba(255,255,255,0.85);
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        flex-wrap: wrap;
    }

    .hero-subtitle .highlight {
        background: rgba(255,255,255,0.15);
        padding: 0.15rem 0.8rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.8rem;
        backdrop-filter: blur(4px);
        border: 1px solid rgba(255,255,255,0.1);
    }

    .hero-stats {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        margin-top: 0.75rem;
        flex-wrap: wrap;
    }

    .hero-stats .stat-item {
        display: flex;
        align-items: center;
        gap: 0.4rem;
        color: rgba(255,255,255,0.8);
        font-size: 0.8rem;
    }

    .hero-stats .stat-item .stat-icon {
        font-size: 0.9rem;
    }

    .hero-stats .stat-item .stat-value {
        font-weight: 700;
        color: white;
    }

    .hero-actions {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        flex-wrap: wrap;
    }

    /* Hero right panel */
    .hero-right {
        display: flex;
        align-items: center;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .hero-price-tag {
        background: rgba(255,255,255,0.12);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255,255,255,0.15);
        border-radius: 12px;
        padding: 0.5rem 1.2rem;
        text-align: center;
        min-width: 100px;
    }

    .hero-price-tag .price-amount {
        font-size: 1.4rem;
        font-weight: 700;
        color: white;
        line-height: 1.2;
    }

    .hero-price-tag .price-label {
        font-size: 0.6rem;
        color: rgba(255,255,255,0.7);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* ============================================
       STATUS PILL
    ============================================ */
    .status-pill {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.4rem 1.2rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.8rem;
        background: rgba(255,255,255,0.15);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255,255,255,0.2);
        color: white;
        transition: var(--transition);
        white-space: nowrap;
    }

    .status-pill:hover {
        background: rgba(255,255,255,0.25);
        transform: scale(1.03);
    }

    .status-pill .dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        display: inline-block;
        animation: pulseDot 1.8s infinite;
    }

    .status-pill .dot.pending { background: #FFC107; }
    .status-pill .dot.approved { background: #28A745; }
    .status-pill .dot.handed_over { background: #17A2B8; }
    .status-pill .dot.returned { background: #6C757D; }
    .status-pill .dot.completed { background: #28A745; }
    .status-pill .dot.rejected { background: #DC3545; }

    @keyframes pulseDot {
        0%, 100% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.8); opacity: 0.5; }
    }

    /* ============================================
       DARK MODE TOGGLE
    ============================================ */
    .dark-toggle-btn {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: rgba(255,255,255,0.12);
        border: 1px solid rgba(255,255,255,0.15);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
        transition: var(--transition);
        cursor: pointer;
        backdrop-filter: blur(4px);
    }

    .dark-toggle-btn:hover {
        background: rgba(255,255,255,0.25);
        transform: rotate(30deg);
    }

    /* ============================================
       MAIN CARD
    ============================================ */
    .rental-card {
        background: var(--bg-main);
        border-radius: var(--radius);
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
        overflow: hidden;
        padding: 1.5rem;
        border: 1px solid var(--border-color);
        height: 100%;
    }

    .rental-card:hover {
        box-shadow: var(--shadow-md);
    }

    /* ============================================
       IMAGE GALLERY
    ============================================ */
    .item-gallery {
        position: relative;
        border-radius: 12px;
        overflow: hidden;
        background: var(--bg-light);
        margin-bottom: 1rem;
    }

    .item-gallery .main-image {
        width: 100%;
        height: 280px;
        object-fit: cover;
        transition: var(--transition);
    }

    .item-gallery .main-image:hover {
        transform: scale(1.02);
    }

    .gallery-thumbnails {
        display: flex;
        gap: 6px;
        margin-top: 8px;
        overflow-x: auto;
        padding-bottom: 4px;
    }

    .gallery-thumbnails img {
        width: 56px;
        height: 56px;
        object-fit: cover;
        border-radius: 8px;
        cursor: pointer;
        border: 2px solid transparent;
        transition: var(--transition);
        flex-shrink: 0;
    }

    .gallery-thumbnails img:hover,
    .gallery-thumbnails img.active {
        border-color: var(--primary);
        transform: scale(1.05);
    }

    .favorite-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: white;
        border: none;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        color: #DC3545;
        cursor: pointer;
    }

    .favorite-btn:hover {
        transform: scale(1.1);
        box-shadow: var(--shadow-md);
    }

    /* ============================================
       INFO TAGS
    ============================================ */
    .info-tag {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 14px;
        background: var(--bg-light);
        border-radius: 10px;
        border-left: 3px solid var(--primary);
        transition: var(--transition);
    }

    .info-tag:hover {
        transform: translateX(4px);
        background: rgba(220, 53, 69, 0.05);
    }

    .info-tag .icon {
        width: 30px;
        height: 30px;
        border-radius: 8px;
        background: var(--primary);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
        flex-shrink: 0;
    }

    .info-tag .label {
        font-size: 0.6rem;
        color: var(--text-muted);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .info-tag .value {
        font-weight: 600;
        color: var(--text-dark);
        font-size: 0.85rem;
    }

    /* ============================================
       PRICE DISPLAY
    ============================================ */
    .price-display {
        background: linear-gradient(135deg, #DC3545, #B22234);
        padding: 14px 20px;
        border-radius: 12px;
        color: white;
        text-align: center;
        margin-bottom: 1rem;
    }

    .price-display .amount {
        font-size: 2rem;
        font-weight: 700;
    }

    .price-display .period {
        font-size: 0.8rem;
        opacity: 0.85;
    }

    /* ============================================
       DIGITAL CLOCK TIMER
    ============================================ */
    .digital-clock {
        background: var(--bg-main);
        border: 2px solid var(--primary);
        border-radius: 12px;
        padding: 1rem 1.5rem;
        text-align: center;
        box-shadow: 0 0 30px rgba(220, 53, 69, 0.08);
        position: relative;
        overflow: hidden;
    }

    .digital-clock::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, transparent 30%, rgba(220, 53, 69, 0.03) 50%, transparent 70%);
        animation: shimmerClock 3s infinite;
    }

    @keyframes shimmerClock {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    .digital-clock .clock-display {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.25rem;
        position: relative;
        z-index: 1;
    }

    .digital-clock .clock-display .time-block {
        background: var(--bg-light);
        border-radius: 8px;
        padding: 0.25rem 0.5rem;
        min-width: 50px;
        display: inline-block;
    }

    .digital-clock .clock-display .time-block .number {
        font-size: 2.2rem;
        font-weight: 700;
        color: var(--primary);
        font-family: 'Courier New', monospace;
        letter-spacing: 2px;
        transition: var(--transition);
    }

    .digital-clock .clock-display .separator {
        font-size: 2rem;
        font-weight: 700;
        color: var(--primary);
        animation: blink 1s infinite;
        padding: 0 0.1rem;
    }

    @keyframes blink {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.2; }
    }

    .digital-clock .clock-label {
        font-size: 0.6rem;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-top: 0.25rem;
        position: relative;
        z-index: 1;
    }

    /* ============================================
       PROGRESS TRACKER
    ============================================ */
    .progress-tracker {
        display: flex;
        justify-content: space-between;
        position: relative;
        padding: 0 2px;
    }

    .progress-tracker::before {
        content: '';
        position: absolute;
        top: 16px;
        left: 20px;
        right: 20px;
        height: 2px;
        background: var(--border-color);
        border-radius: 2px;
    }

    .tracker-step {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        z-index: 1;
        flex: 1;
        cursor: pointer;
        transition: var(--transition);
    }

    .tracker-step:hover {
        transform: translateY(-2px);
    }

    .tracker-step .step-circle {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: var(--border-color);
        border: 3px solid var(--bg-main);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.75rem;
        font-weight: 700;
        color: var(--text-muted);
        transition: var(--transition);
        margin-bottom: 4px;
        box-shadow: 0 0 0 1px var(--border-color);
    }

    .tracker-step.active .step-circle {
        background: var(--primary);
        color: white;
        box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.2);
        animation: popStep 0.5s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .tracker-step.completed .step-circle {
        background: var(--success);
        color: white;
        box-shadow: 0 0 0 3px rgba(40, 167, 69, 0.15);
    }

    @keyframes popStep {
        0% { transform: scale(0.8); }
        50% { transform: scale(1.2); }
        100% { transform: scale(1); }
    }

    .tracker-step .step-label {
        font-size: 0.55rem;
        font-weight: 600;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.3px;
        text-align: center;
        line-height: 1.2;
    }

    .tracker-step.active .step-label,
    .tracker-step.completed .step-label {
        color: var(--text-dark);
    }

    .tracker-step.completed .step-label {
        color: var(--success);
    }

    /* ============================================
       DETAIL CARDS
    ============================================ */
    .detail-card {
        background: var(--bg-light);
        border-radius: 12px;
        padding: 1rem;
        transition: var(--transition);
        height: 100%;
        border: 1px solid var(--border-color);
    }

    .detail-card:hover {
        box-shadow: var(--shadow-sm);
    }

    .detail-card .card-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        background: rgba(220, 53, 69, 0.08);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        color: var(--primary);
        margin-bottom: 8px;
    }

    /* ============================================
       BUTTONS
    ============================================ */
    .btn-primary-red {
        background: var(--primary);
        color: white;
        border: none;
        padding: 8px 22px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.85rem;
        transition: var(--transition);
        box-shadow: 0 4px 16px rgba(220, 53, 69, 0.25);
    }

    .btn-primary-red:hover {
        background: var(--primary-dark);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 24px rgba(220, 53, 69, 0.35);
    }

    .btn-outline-red {
        background: transparent;
        border: 2px solid var(--primary);
        color: var(--primary);
        padding: 6px 20px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.85rem;
        transition: var(--transition);
    }

    .btn-outline-red:hover {
        background: var(--primary);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 16px rgba(220, 53, 69, 0.2);
    }

    .btn-back {
        background: var(--bg-main);
        border: 1px solid var(--border-color);
        color: var(--text-dark);
        padding: 6px 18px;
        border-radius: 50px;
        font-weight: 500;
        font-size: 0.85rem;
        transition: var(--transition);
    }

    .btn-back:hover {
        background: var(--border-color);
        transform: translateY(-2px);
    }

    /* ============================================
       SIDEBAR
    ============================================ */
    .sidebar-card {
        background: var(--bg-main);
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 1rem;
        margin-bottom: 0.75rem;
        transition: var(--transition);
    }

    .sidebar-card:hover {
        box-shadow: var(--shadow-sm);
    }

    .sidebar-card .card-title {
        font-size: 0.85rem;
        font-weight: 700;
        margin-bottom: 0.6rem;
        color: var(--text-dark);
    }

    .support-card {
        background: var(--bg-light);
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 1rem;
        margin-bottom: 0.75rem;
    }

    /* ============================================
       FEATURES
    ============================================ */
    .feature-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
        gap: 6px;
    }

    .feature-item {
        background: var(--bg-light);
        padding: 8px 6px;
        border-radius: 8px;
        text-align: center;
        transition: var(--transition);
        border: 1px solid transparent;
    }

    .feature-item:hover {
        border-color: var(--primary);
        background: rgba(220, 53, 69, 0.05);
        transform: translateY(-2px);
    }

    .feature-item .feature-icon {
        font-size: 1.2rem;
        margin-bottom: 2px;
    }

    .feature-item .feature-name {
        font-size: 0.6rem;
        color: var(--text-muted);
        font-weight: 500;
    }

    /* ============================================
       ACCORDION
    ============================================ */
    .accordion-custom .accordion-item {
        border: 1px solid var(--border-color);
        border-radius: 12px !important;
        overflow: hidden;
        background: var(--bg-main);
    }

    .accordion-custom .accordion-button {
        background: var(--bg-main);
        color: var(--text-dark);
        font-weight: 600;
        font-size: 0.85rem;
        padding: 0.75rem 1rem;
        border: none;
    }

    .accordion-custom .accordion-button:not(.collapsed) {
        background: var(--bg-light);
        color: var(--primary);
        box-shadow: none;
    }

    .accordion-custom .accordion-button:focus {
        box-shadow: none;
        border-color: var(--primary);
    }

    .accordion-custom .accordion-body {
        background: var(--bg-main);
        padding: 0 1rem 1rem;
        font-size: 0.85rem;
    }

    /* ============================================
       MAP
    ============================================ */
    #map {
        height: 140px;
        border-radius: 10px;
        overflow: hidden;
        background: var(--bg-light);
    }

    /* ============================================
       RENTAL TIPS
    ============================================ */
    .rental-tips {
        background: linear-gradient(135deg, var(--bg-light), rgba(220, 53, 69, 0.03));
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 1rem;
        margin-top: 0.75rem;
    }

    .rental-tips .tip-item {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        padding: 8px 0;
        border-bottom: 1px solid var(--border-color);
        transition: var(--transition);
    }

    .rental-tips .tip-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .rental-tips .tip-item:hover {
        padding-left: 8px;
        background: rgba(220, 53, 69, 0.03);
        border-radius: 8px;
        margin: 0 -8px;
        padding-left: 16px;
        padding-right: 8px;
    }

    .rental-tips .tip-icon {
        font-size: 1.2rem;
        flex-shrink: 0;
        margin-top: 2px;
    }

    .rental-tips .tip-content {
        flex: 1;
    }

    .rental-tips .tip-title {
        font-size: 0.8rem;
        font-weight: 600;
        color: var(--text-dark);
    }

    .rental-tips .tip-desc {
        font-size: 0.7rem;
        color: var(--text-muted);
    }

    /* ============================================
       POLICY SECTION
    ============================================ */
    .policy-section {
        background: var(--bg-main);
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 1rem;
        margin-top: 0.75rem;
    }

    .policy-section .policy-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 6px 0;
        border-bottom: 1px solid var(--border-color);
    }

    .policy-section .policy-item:last-child {
        border-bottom: none;
    }

    .policy-section .policy-icon {
        color: var(--primary);
        font-size: 0.9rem;
        width: 20px;
    }

    .policy-section .policy-text {
        font-size: 0.75rem;
        color: var(--text-muted);
    }

    /* ============================================
       RESPONSIVE
    ============================================ */
    @media (max-width: 992px) {
        .item-gallery .main-image {
            height: 220px;
        }
        .hero-title {
            font-size: 1.4rem;
        }
    }

    @media (max-width: 768px) {
        .rental-hero {
            padding: 1.5rem 0 1.2rem;
            border-radius: 0 0 2rem 2rem;
        }
        .rental-hero::before {
            font-size: 6rem;
        }
        .hero-title {
            font-size: 1.2rem;
        }
        .hero-subtitle {
            font-size: 0.8rem;
        }
        .hero-stats {
            gap: 0.75rem;
        }
        .hero-stats .stat-item {
            font-size: 0.7rem;
        }
        .hero-price-tag .price-amount {
            font-size: 1.1rem;
        }
        .rental-card {
            padding: 1rem;
        }
        .price-display .amount {
            font-size: 1.6rem;
        }
        .digital-clock .clock-display .time-block .number {
            font-size: 1.6rem;
        }
        .digital-clock .clock-display .separator {
            font-size: 1.4rem;
        }
        .info-tag {
            padding: 8px 12px;
        }
        .info-tag .icon {
            width: 26px;
            height: 26px;
            font-size: 0.7rem;
        }
        .info-tag .value {
            font-size: 0.8rem;
        }
        .gallery-thumbnails img {
            width: 46px;
            height: 46px;
        }
        .tracker-step .step-circle {
            width: 28px;
            height: 28px;
            font-size: 0.65rem;
        }
        .tracker-step .step-label {
            font-size: 0.5rem;
        }
        .progress-tracker::before {
            top: 14px;
            left: 16px;
            right: 16px;
        }
        .feature-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 576px) {
        .rental-hero .d-flex {
            flex-direction: column;
            align-items: flex-start !important;
            gap: 0.75rem;
        }
        .hero-right {
            width: 100%;
            justify-content: flex-start;
        }
        .hero-price-tag {
            min-width: 80px;
            padding: 0.3rem 0.8rem;
        }
        .hero-price-tag .price-amount {
            font-size: 1rem;
        }
        .status-pill {
            font-size: 0.7rem;
            padding: 0.3rem 0.8rem;
        }
        .item-gallery .main-image {
            height: 180px;
        }
        .sidebar-card {
            padding: 0.75rem;
        }
        .support-card {
            padding: 0.75rem;
        }
        .detail-card {
            padding: 0.75rem;
        }
        .digital-clock {
            padding: 0.75rem 1rem;
        }
        .digital-clock .clock-display .time-block {
            min-width: 35px;
        }
        .digital-clock .clock-display .time-block .number {
            font-size: 1.3rem;
        }
        .digital-clock .clock-display .separator {
            font-size: 1.2rem;
        }
        .hero-stats .stat-item {
            font-size: 0.65rem;
        }
    }

    /* ============================================
       SCROLLBAR
    ============================================ */
    ::-webkit-scrollbar {
        width: 4px;
        height: 4px;
    }
    ::-webkit-scrollbar-track {
        background: var(--bg-light);
        border-radius: 10px;
    }
    ::-webkit-scrollbar-thumb {
        background: var(--primary);
        border-radius: 10px;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: var(--primary-dark);
    }

    /* ============================================
       UTILITY
    ============================================ */
    .text-primary-red {
        color: var(--primary);
    }
    .bg-primary-red-light {
        background: rgba(220, 53, 69, 0.06);
    }
    .border-primary-red {
        border-color: var(--primary) !important;
    }
    .gap-1 { gap: 0.25rem; }
    .gap-2 { gap: 0.5rem; }
    .gap-3 { gap: 0.75rem; }
    .fw-600 { font-weight: 600; }
    .mb-1 { margin-bottom: 0.5rem; }
    .mb-2 { margin-bottom: 0.75rem; }
    .mb-3 { margin-bottom: 1rem; }
    .mt-1 { margin-top: 0.5rem; }
    .mt-2 { margin-top: 0.75rem; }
    .mt-3 { margin-top: 1rem; }
    .pt-2 { padding-top: 0.75rem; }
    .pt-3 { padding-top: 1rem; }
    .pb-2 { padding-bottom: 0.75rem; }
    .border-top { border-top: 1px solid var(--border-color); }
    .border-bottom { border-bottom: 1px solid var(--border-color); }
</style>

<!-- ============================================
     ENHANCED HERO SECTION
============================================ -->
<div class="rental-hero">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <!-- Left Side -->
            <div>
                <!-- Breadcrumb -->
                <div class="hero-breadcrumb">
                    <a href="/">Home</a>
                    <span class="separator">›</span>
                    <a href="/my-bookings">My Rentals</a>
                    <span class="separator">›</span>
                    <span style="color:rgba(255,255,255,0.8);">Booking Details</span>
                </div>

                <!-- Title -->
                <h1 class="hero-title">
                    🏠 {{ $booking->item->title ?? 'Rental Details' }}
                </h1>

                <!-- Subtitle with booking info -->
                <div class="hero-subtitle">
                    <span>Booking #{{ $booking->id }}</span>
                    <span class="highlight">📅 {{ $booking->start_date }} → {{ $booking->end_date }}</span>
                    <span class="highlight">⏱ {{ \Carbon\Carbon::parse($booking->start_date)->diffInDays($booking->end_date) }} days</span>
                </div>

                <!-- Stats -->
                <div class="hero-stats">
                    <div class="stat-item">
                        <span class="stat-icon">👤</span>
                        <span>Owner: <span class="stat-value">{{ $booking->item->owner->name ?? 'N/A' }}</span></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-icon">📍</span>
                        <span>Location: <span class="stat-value">{{ $booking->item->city ?? 'N/A' }}</span></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-icon">📦</span>
                        <span>Category: <span class="stat-value">{{ $booking->item->category->name ?? 'N/A' }}</span></span>
                    </div>
                </div>
            </div>

            <!-- Right Side -->
            <div class="hero-right">
                <!-- Price Tag -->
                <div class="hero-price-tag">
                    <div class="price-amount">Rs {{ number_format($booking->total_amount) }}</div>
                    <div class="price-label">Total Amount</div>
                </div>

                <!-- Dark Mode Toggle -->
                <button class="dark-toggle-btn" onclick="toggleDarkMode()" title="Toggle Dark Mode">
                    <i class="fas fa-moon" id="darkModeIcon"></i>
                </button>

                <!-- Status Pill -->
                @php
                    $statusIcons = [
                        'pending' => '⏳',
                        'approved' => '✓',
                        'handed_over' => '🤝',
                        'returned' => '↩️',
                        'completed' => '⭐',
                        'rejected' => '✕'
                    ];
                    $statusDot = [
                        'pending' => 'pending',
                        'approved' => 'approved',
                        'handed_over' => 'handed_over',
                        'returned' => 'returned',
                        'completed' => 'completed',
                        'rejected' => 'rejected'
                    ];
                @endphp
                <span class="status-pill">
                    <span class="dot {{ $statusDot[$booking->status] ?? 'pending' }}"></span>
                    {{ $statusIcons[$booking->status] ?? '📦' }} 
                    {{ ucfirst(str_replace('_', ' ', $booking->status)) }}
                </span>
            </div>
        </div>

        <!-- Hero Decorative Dots -->
        <div class="hero-dots">
            <span></span><span></span><span></span>
            <span></span><span></span><span></span>
            <span></span><span></span><span></span>
        </div>
    </div>
</div>

<!-- ============================================
     MAIN CONTENT
============================================ -->
<div class="container pb-4">

    <!-- Back Button -->
    <a href="/my-bookings" class="btn btn-back mb-3">
        <i class="fas fa-arrow-left me-2"></i> Back to Rentals
    </a>

    <div class="row g-3">

        <!-- ===== LEFT COLUMN ===== -->
        <div class="col-lg-8">

            <!-- ===== MAIN CARD ===== -->
            <div class="rental-card">

                <!-- ===== IMAGE GALLERY ===== -->
                <div class="item-gallery">
                    @if($booking->item->images->count())
                        <img src="{{ asset('uploads/items/'.$booking->item->images->first()->image) }}"
                             class="main-image" id="mainImage" alt="{{ $booking->item->title }}">
                    @else
                        <div class="main-image bg-light d-flex align-items-center justify-content-center">
                            <i class="fas fa-image fa-3x text-muted opacity-25"></i>
                        </div>
                    @endif
                    
                    <button class="favorite-btn" onclick="toggleFavorite(this)">
                        <i class="far fa-heart"></i>
                    </button>

                    @if($booking->item->images->count() > 1)
                        <div class="gallery-thumbnails">
                            @foreach($booking->item->images as $index => $image)
                                <img src="{{ asset('uploads/items/'.$image->image) }}"
                                     class="{{ $index == 0 ? 'active' : '' }}"
                                     onclick="changeImage(this, '{{ asset('uploads/items/'.$image->image) }}')"
                                     alt="Thumbnail {{ $index + 1 }}">
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- ===== ITEM TITLE & RATING ===== -->
                <div class="d-flex flex-wrap justify-content-between align-items-start mb-2">
                    <div>
                        <h5 class="fw-bold mb-0">{{ $booking->item->title }}</h5>
                        <p class="text-muted mb-0 small">{{ Str::limit($booking->item->description, 80) }}</p>
                    </div>
                    <div class="text-end">
                        <div class="d-flex align-items-center gap-1">
                            <div class="stars" style="font-size:0.8rem;">
                                @php $rating = 4.5; $reviewsCount = 28; @endphp
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= round($rating) ? 'text-warning' : 'text-muted' }}"></i>
                                @endfor
                            </div>
                            <span class="text-muted small">({{ $reviewsCount }})</span>
                        </div>
                    </div>
                </div>

                <!-- ===== PRICE DISPLAY ===== -->
                <div class="price-display">
                    <div class="amount">Rs {{ number_format($booking->total_amount) }}</div>
                    <div class="period">Total for {{ \Carbon\Carbon::parse($booking->start_date)->diffInDays($booking->end_date) }} days</div>
                </div>

                <!-- ===== INFO TAGS ===== -->
                <div class="row g-2 mb-2">
                    <div class="col-sm-6">
                        <div class="info-tag">
                            <div class="icon"><i class="fas fa-tag"></i></div>
                            <div>
                                <div class="label">Category</div>
                                <div class="value">{{ $booking->item->category->name ?? 'N/A' }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="info-tag">
                            <div class="icon"><i class="fas fa-user"></i></div>
                            <div>
                                <div class="label">Owner</div>
                                <div class="value">{{ $booking->item->owner->name ?? 'N/A' }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="info-tag">
                            <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                            <div>
                                <div class="label">Location</div>
                                <div class="value">{{ $booking->item->city ?? 'N/A' }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="info-tag">
                            <div class="icon"><i class="fas fa-calendar-check"></i></div>
                            <div>
                                <div class="label">Booked On</div>
                                <div class="value">{{ $booking->created_at->format('d M Y') }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===== DIGITAL CLOCK TIMER ===== -->
                <div class="digital-clock mb-2">
                    <div class="clock-display">
                        <div class="time-block">
                            <span class="number" id="clockDays">00</span>
                        </div>
                        <span class="separator">:</span>
                        <div class="time-block">
                            <span class="number" id="clockHours">00</span>
                        </div>
                        <span class="separator">:</span>
                        <div class="time-block">
                            <span class="number" id="clockMinutes">00</span>
                        </div>
                        <span class="separator">:</span>
                        <div class="time-block">
                            <span class="number" id="clockSeconds">00</span>
                        </div>
                    </div>
                    <div class="clock-label">⏰ Time Remaining Until Rental Ends</div>
                </div>

                <!-- ===== PROGRESS ===== -->
                @php
                    $statusOrder = ['pending', 'approved', 'handed_over', 'returned', 'completed'];
                    $currentIdx = array_search($booking->status, $statusOrder);
                    if ($currentIdx === false) $currentIdx = -1;
                    $progressPercent = round(($currentIdx + 1) / count($statusOrder) * 100);
                @endphp

                <div class="mb-2">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <span class="fw-600 small">Progress</span>
                        <span class="badge bg-danger bg-opacity-10 text-danger px-2 py-1 rounded-pill" style="font-size:0.65rem;">
                            {{ $progressPercent }}%
                        </span>
                    </div>
                    <div class="progress mb-2" style="height:4px;border-radius:10px;background:var(--border-color);">
                        <div class="progress-bar" style="width:{{ $progressPercent }}%;background:var(--primary);border-radius:10px;transition:width 0.8s cubic-bezier(0.22, 1, 0.36, 1);"></div>
                    </div>
                    <div class="progress-tracker">
                        @foreach($statusOrder as $idx => $stage)
                            @php
                                $isActive = ($idx == $currentIdx);
                                $isCompleted = ($idx < $currentIdx);
                                $label = ucfirst(str_replace('_', ' ', $stage));
                                $icon = '';
                                if ($stage == 'pending') $icon = '📝';
                                elseif ($stage == 'approved') $icon = '✅';
                                elseif ($stage == 'handed_over') $icon = '🤝';
                                elseif ($stage == 'returned') $icon = '↩️';
                                elseif ($stage == 'completed') $icon = '⭐';
                            @endphp
                            <div class="tracker-step {{ $isActive ? 'active' : '' }} {{ $isCompleted ? 'completed' : '' }}" title="{{ $label }}">
                                <div class="step-circle">{{ $icon }}</div>
                                <span class="step-label">{{ $label }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- ===== RENTAL & PAYMENT DETAILS ===== -->
                <div class="row g-2 mb-2">
                    <div class="col-sm-6">
                        <div class="detail-card">
                            <div class="card-icon"><i class="fas fa-calendar-alt"></i></div>
                            <h6 class="fw-bold mb-1" style="font-size:0.8rem;">Rental Period</h6>
                            <p class="mb-0 small"><strong>Start:</strong> {{ $booking->start_date }}</p>
                            <p class="mb-0 small"><strong>End:</strong> {{ $booking->end_date }}</p>
                            <p class="mb-0 small"><strong>Duration:</strong> 
                                {{ \Carbon\Carbon::parse($booking->start_date)->diffInDays($booking->end_date) }} days
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="detail-card">
                            <div class="card-icon"><i class="fas fa-wallet"></i></div>
                            <h6 class="fw-bold mb-1" style="font-size:0.8rem;">Payment Summary</h6>
                            <div class="d-flex justify-content-between small">
                                <span class="text-muted">Rental Fee</span>
                                <span>Rs {{ number_format($booking->total_amount - $booking->security_deposit) }}</span>
                            </div>
                            <div class="d-flex justify-content-between small">
                                <span class="text-muted">Security Deposit</span>
                                <span>Rs {{ number_format($booking->security_deposit) }}</span>
                            </div>
                            <div class="d-flex justify-content-between border-top pt-1 mt-1 small">
                                <strong>Total</strong>
                                <strong class="text-primary-red">Rs {{ number_format($booking->total_amount) }}</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===== FEATURES ===== -->
                @if(isset($booking->item->features) && $booking->item->features->count())
                    <div class="mb-2">
                        <h6 class="fw-bold mb-1" style="font-size:0.8rem;">✨ Features</h6>
                        <div class="feature-grid">
                            @foreach($booking->item->features as $feature)
                                <div class="feature-item">
                                    <div class="feature-icon">{{ $feature->icon ?? '🔹' }}</div>
                                    <div class="feature-name">{{ $feature->name }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- ===== NOTES ===== -->
                @if(!empty($booking->notes))
                    <div class="bg-primary-red-light p-2 rounded-2 mb-2" style="border-radius:8px;">
                        <h6 class="fw-bold mb-0" style="font-size:0.75rem;"><i class="fas fa-sticky-note me-1"></i>Notes</h6>
                        <p class="mb-0 small">{{ $booking->notes }}</p>
                    </div>
                @endif

                <!-- ===== ACTION BUTTONS ===== -->
                <div class="d-flex flex-wrap gap-2 mt-2 pt-2 border-top">
                    <a href="/item/{{ $booking->item->id }}" class="btn btn-outline-red">
                        <i class="fas fa-eye me-1"></i> View Item
                    </a>
                    <a href="/my-bookings" class="btn btn-primary-red">
                        <i class="fas fa-arrow-left me-1"></i> Back
                    </a>
                </div>

            </div> <!-- end rental-card -->

        </div> <!-- end col-lg-8 -->

        <!-- ===== RIGHT COLUMN ===== -->
        <div class="col-lg-4">

            <!-- ===== SUMMARY ===== -->
            <div class="sidebar-card">
                <div class="card-title">📊 Summary</div>
                <div class="d-flex justify-content-between border-bottom pb-1 mb-1 small">
                    <span class="text-muted">Booking ID</span>
                    <span class="fw-bold">#{{ $booking->id }}</span>
                </div>
                <div class="d-flex justify-content-between border-bottom pb-1 mb-1 small">
                    <span class="text-muted">Item</span>
                    <span class="fw-bold">{{ Str::limit($booking->item->title, 15) }}</span>
                </div>
                <div class="d-flex justify-content-between border-bottom pb-1 mb-1 small">
                    <span class="text-muted">Duration</span>
                </div>
                <div class="d-flex justify-content-between border-bottom pb-1 mb-1 small">
                    <span class="text-muted">Total</span>
                    <span class="fw-bold text-primary-red">Rs {{ number_format($booking->total_amount) }}</span>
                </div>
                <div class="d-flex justify-content-between small">
                    <span class="text-muted">Status</span>
                    <span class="fw-bold text-capitalize">{{ $booking->status }}</span>
                </div>
            </div>

            <!-- ===== LOCATION ===== -->
            <div class="sidebar-card">
                <div class="card-title">📍 Location</div>
                <div id="map">
                    <div class="d-flex align-items-center justify-content-center h-100 text-muted small">
                        <span><i class="fas fa-map-marked-alt me-1"></i> Loading...</span>
                    </div>
                </div>
                <p class="small text-muted mt-1 mb-0">
                    <i class="fas fa-map-pin text-primary-red me-1"></i>
                    {{ $booking->item->city ?? 'N/A' }}
                </p>
            </div>

            <!-- ===== SUPPORT ===== -->
            <div class="support-card">
                <h6 class="fw-bold mb-1" style="font-size:0.85rem;">🆘 Help</h6>
                <p class="mb-0 small"><i class="fas fa-phone text-primary-red me-1"></i> +92-300-0000000</p>
                <p class="mb-0 small"><i class="fas fa-envelope text-primary-red me-1"></i> support@rental.com</p>
                <hr class="my-1">
                <p class="small text-muted mb-0">24/7 support</p>
            </div>

            <!-- ===== ADDITIONAL DETAILS ===== -->
            <div class="accordion accordion-custom" id="bookingAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" 
                                data-bs-toggle="collapse" data-bs-target="#collapseDetails">
                            <i class="fas fa-info-circle text-primary-red me-1"></i> 
                            Additional Details
                        </button>
                    </h2>
                    <div id="collapseDetails" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <p class="mb-1 small"><strong>Created:</strong> {{ $booking->created_at->format('d M Y h:i A') }}</p>
                            <p class="mb-1 small"><strong>Updated:</strong> {{ $booking->updated_at->format('d M Y h:i A') }}</p>
                            <p class="mb-0 small"><strong>Type:</strong> {{ ucfirst($booking->booking_type ?? 'Standard') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ===== RENTAL TIPS ===== -->
            <div class="rental-tips">
                <h6 class="fw-bold mb-2" style="font-size:0.85rem;">💡 Rental Tips</h6>
                <div class="tip-item">
                    <div class="tip-icon">🔍</div>
                    <div class="tip-content">
                        <div class="tip-title">Inspect Before Taking</div>
                        <div class="tip-desc">Always check the item thoroughly before accepting</div>
                    </div>
                </div>
                <div class="tip-item">
                    <div class="tip-icon">📸</div>
                    <div class="tip-content">
                        <div class="tip-title">Document Everything</div>
                        <div class="tip-desc">Take photos of the item at pickup and return</div>
                    </div>
                </div>
                <div class="tip-item">
                    <div class="tip-icon">⏰</div>
                    <div class="tip-content">
                        <div class="tip-title">Return On Time</div>
                        <div class="tip-desc">Avoid late fees by returning items promptly</div>
                    </div>
                </div>
            </div>

            <!-- ===== POLICY SECTION ===== -->
            <div class="policy-section">
                <h6 class="fw-bold mb-2" style="font-size:0.85rem;">📋 Rental Policies</h6>
                <div class="policy-item">
                    <span class="policy-icon"><i class="fas fa-check-circle"></i></span>
                    <span class="policy-text">Security deposit refunded within 24-48 hours after return</span>
                </div>
                <div class="policy-item">
                    <span class="policy-icon"><i class="fas fa-check-circle"></i></span>
                    <span class="policy-text">Free cancellation within 24 hours of booking</span>
                </div>
                <div class="policy-item">
                    <span class="policy-icon"><i class="fas fa-check-circle"></i></span>
                    <span class="policy-text">Damage protection included for all rentals</span>
                </div>
                <div class="policy-item">
                    <span class="policy-icon"><i class="fas fa-check-circle"></i></span>
                    <span class="policy-text">24/7 customer support for emergencies</span>
                </div>
            </div>

        </div> <!-- end col-lg-4 -->

    </div> <!-- end row -->
</div> <!-- end container -->

<!-- ============================================
     MODALS
============================================ -->

<!-- Share Modal -->
<div class="modal fade" id="shareModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius:16px;background:var(--bg-main);border:1px solid var(--border-color);">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold" style="font-size:1rem;"><i class="fas fa-share-alt text-primary-red me-2"></i>Share</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mb-2 small">Share this rental</p>
                <div class="d-flex justify-content-center gap-2 mb-2">
                    <a href="#" class="btn btn-primary rounded-circle" style="width:40px;height:40px;padding:0;display:inline-flex;align-items:center;justify-content:center;">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="btn btn-info rounded-circle" style="width:40px;height:40px;padding:0;display:inline-flex;align-items:center;justify-content:center;color:white;">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="btn btn-success rounded-circle" style="width:40px;height:40px;padding:0;display:inline-flex;align-items:center;justify-content:center;">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="#" class="btn btn-danger rounded-circle" style="width:40px;height:40px;padding:0;display:inline-flex;align-items:center;justify-content:center;">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
                <div class="input-group" style="max-width:300px;margin:0 auto;">
                    <input type="text" class="form-control form-control-sm" value="Rental #{{ $booking->id }}" readonly>
                    <button class="btn btn-primary-red btn-sm" onclick="copyLink()">
                        <i class="fas fa-copy"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ============================================
     JAVASCRIPT
============================================ -->
<script>
    // ============================================
    // DARK MODE
    // ============================================
    function toggleDarkMode() {
        const html = document.documentElement;
        const icon = document.getElementById('darkModeIcon');
        
        if (html.getAttribute('data-theme') === 'dark') {
            html.removeAttribute('data-theme');
            icon.className = 'fas fa-moon';
            localStorage.setItem('theme', 'light');
        } else {
            html.setAttribute('data-theme', 'dark');
            icon.className = 'fas fa-sun';
            localStorage.setItem('theme', 'dark');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const theme = localStorage.getItem('theme');
        if (theme === 'dark') {
            document.documentElement.setAttribute('data-theme', 'dark');
            document.getElementById('darkModeIcon').className = 'fas fa-sun';
        }
    });

    // ============================================
    // DIGITAL CLOCK COUNTDOWN
    // ============================================
    function updateDigitalClock() {
        const endDate = new Date('{{ $booking->end_date }}').getTime();
        const now = new Date().getTime();
        const diff = Math.max(0, endDate - now);
        
        const days = Math.floor(diff / (1000 * 60 * 60 * 24));
        const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((diff % (1000 * 60)) / 1000);
        
        document.getElementById('clockDays').textContent = String(days).padStart(2, '0');
        document.getElementById('clockHours').textContent = String(hours).padStart(2, '0');
        document.getElementById('clockMinutes').textContent = String(minutes).padStart(2, '0');
        document.getElementById('clockSeconds').textContent = String(seconds).padStart(2, '0');
    }

    updateDigitalClock();
    setInterval(updateDigitalClock, 1000);

    // ============================================
    // IMAGE GALLERY
    // ============================================
    function changeImage(element, src) {
        document.getElementById('mainImage').src = src;
        document.querySelectorAll('.gallery-thumbnails img').forEach(img => {
            img.classList.remove('active');
        });
        element.classList.add('active');
    }

    // ============================================
    // FAVORITE
    // ============================================
    function toggleFavorite(btn) {
        const icon = btn.querySelector('i');
        if (icon.classList.contains('far')) {
            icon.classList.remove('far');
            icon.classList.add('fas');
            btn.style.background = '#DC3545';
            btn.style.color = 'white';
        } else {
            icon.classList.remove('fas');
            icon.classList.add('far');
            btn.style.background = 'white';
            btn.style.color = '#DC3545';
        }
    }

    // ============================================
    // COPY
    // ============================================
    function copyLink() {
        const input = document.querySelector('#shareModal .input-group input');
        input.select();
        document.execCommand('copy');
        alert('Copied!');
    }

    // ============================================
    // MAP
    // ============================================
    document.addEventListener('DOMContentLoaded', function() {
        const mapContainer = document.getElementById('map');
        if (mapContainer && typeof L !== 'undefined') {
            try {
                const map = L.map('map').setView([30.3753, 69.3451], 5);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '© OpenStreetMap'
                }).addTo(map);
                L.marker([30.3753, 69.3451]).addTo(map)
                    .bindPopup('{{ $booking->item->title ?? "Location" }}')
                    .openPopup();
            } catch(e) {
                mapContainer.innerHTML = `
                    <div class="d-flex align-items-center justify-content-center h-100 text-muted small">
                        <i class="fas fa-map-marked-alt me-1"></i> Map unavailable
                    </div>
                `;
            }
        }
    });
</script>

<!-- ============================================
     RESOURCES
============================================ -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection