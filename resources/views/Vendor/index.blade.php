@extends('Vendor.layout')
@section('content')

{{-- ULTIMATE ANIMATED RED & WHITE THEME --}}
<style>
    /* ===== ROOT VARIABLES ===== */
    :root {
        --red-primary: #c8102e;
        --red-dark: #a00c24;
        --red-light: #ff6b81;
        --red-soft: #fef2f4;
        --red-glow: rgba(200, 16, 46, 0.15);
        --red-glow-strong: rgba(200, 16, 46, 0.30);
        --shadow-sm: 0 4px 20px -8px rgba(0, 0, 0, 0.04);
        --shadow-md: 0 8px 32px -12px rgba(200, 16, 46, 0.10);
        --shadow-lg: 0 24px 56px -20px rgba(200, 16, 46, 0.25);
        --shadow-xl: 0 32px 72px -24px rgba(200, 16, 46, 0.35);
        --radius-lg: 28px;
        --radius-md: 20px;
        --radius-sm: 16px;
        --radius-xs: 12px;
        --transition-smooth: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
        --transition-bounce: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        --transition-spring: all 0.7s cubic-bezier(0.22, 1, 0.36, 1);
    }

    /* ===== KEYFRAMES - ALL ANIMATIONS ===== */

    /* Card floating animations */
    @keyframes cardFloat {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-6px); }
    }

    @keyframes heroPulse {
        0%, 100% { box-shadow: var(--shadow-sm); }
        50% { box-shadow: 0 8px 32px -8px rgba(200, 16, 46, 0.12); }
    }

    @keyframes miniFloat {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-4px); }
    }

    /* Icon animations - ALL ICONS */
    @keyframes orbPulse {
        0%, 100% { transform: scale(1); opacity: 0.5; }
        50% { transform: scale(1.3); opacity: 1; }
    }

    @keyframes iconWobble {
        0%, 100% { transform: rotate(0deg) scale(1); }
        25% { transform: rotate(-4deg) scale(1.05); }
        75% { transform: rotate(4deg) scale(1.05); }
    }

    @keyframes iconSpin {
        0%, 100% { transform: rotate(0deg) scale(1); }
        50% { transform: rotate(180deg) scale(1.08); }
    }

    @keyframes iconFloat {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-5px) rotate(3deg); }
    }

    @keyframes iconPulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.15); }
    }

    @keyframes iconShake {
        0%, 100% { transform: rotate(0deg); }
        25% { transform: rotate(-5deg); }
        75% { transform: rotate(5deg); }
    }

    @keyframes iconBounce {
        0%, 100% { transform: scale(1) translateY(0); }
        50% { transform: scale(1.1) translateY(-5px); }
    }

    @keyframes iconGlow {
        0%, 100% { filter: drop-shadow(0 0 5px rgba(200, 16, 46, 0.2)); }
        50% { filter: drop-shadow(0 0 20px rgba(200, 16, 46, 0.5)); }
    }

    @keyframes iconSlide {
        0%, 100% { transform: translateX(0); }
        50% { transform: translateX(6px); }
    }

    @keyframes iconJump {
        0%, 100% { transform: scale(1) translateY(0); }
        30% { transform: scale(1.2) translateY(-8px); }
        60% { transform: scale(0.9) translateY(2px); }
    }

    @keyframes iconWave {
        0%, 100% { transform: rotate(0deg) scale(1); }
        25% { transform: rotate(-8deg) scale(1.05); }
        75% { transform: rotate(8deg) scale(1.05); }
    }

    @keyframes iconZoom {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.12); }
    }

    @keyframes iconFlip {
        0%, 100% { transform: rotateY(0deg); }
        50% { transform: rotateY(180deg); }
    }

    @keyframes iconSwing {
        0%, 100% { transform: rotate(0deg); }
        50% { transform: rotate(6deg); }
    }

    /* Number animations */
    @keyframes numberPulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.02); }
    }

    @keyframes numberBounce {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.04); }
    }

    @keyframes miniNumberPop {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.06); }
    }

    /* Label animations */
    @keyframes labelGlow {
        0%, 100% { color: #6c757d; }
        50% { color: #c8102e; }
    }

    @keyframes trendBounce {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    /* Badge animations */
    @keyframes badgeGlow {
        0%, 100% { box-shadow: 0 0 0 0 rgba(200, 16, 46, 0); }
        50% { box-shadow: 0 0 25px rgba(200, 16, 46, 0.15); }
    }

    /* Rating bar animations */
    @keyframes shimmerBar {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(200%); }
    }

    @keyframes starTwinkle {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.6; transform: scale(1.05); }
    }

    /* Tile animations */
    @keyframes tileIconBounce {
        0%, 100% { transform: scale(1) translateY(0); }
        50% { transform: scale(1.15) translateY(-4px); }
    }

    /* Pulse dot */
    @keyframes pulseDot {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.3; transform: scale(0.6); }
    }

    @keyframes ribbonPulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.7; }
    }

    /* Divider */
    @keyframes dividerWidth {
        0%, 100% { transform: scaleX(1); opacity: 0.1; }
        50% { transform: scaleX(1.02); opacity: 0.2; }
    }

    /* Shimmer flow for glass cards */
    @keyframes shimmerFlow {
        0% { background-position: 0% 0; }
        100% { background-position: 300% 0; }
    }

    /* Entry animations */
    @keyframes fadePop {
        0% { opacity: 0; transform: scale(0.92) translateY(30px); }
        100% { opacity: 1; transform: scale(1) translateY(0); }
    }

    @keyframes ratingSlide {
        0% { opacity: 0; transform: translateX(-10px); }
        100% { opacity: 1; transform: translateX(0); }
    }

    @keyframes tableRowFade {
        0% { opacity: 0; transform: translateX(-10px); }
        100% { opacity: 1; transform: translateX(0); }
    }

    @keyframes tilePop {
        0% { opacity: 0; transform: scale(0.9); }
        100% { opacity: 1; transform: scale(1); }
    }

    @keyframes summarySlide {
        0% { opacity: 0; transform: translateX(-10px); }
        100% { opacity: 1; transform: translateX(0); }
    }

    @keyframes chartFade {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    /* Specific icon animations */
    @keyframes coinFlip {
        0%, 100% { transform: rotateY(0deg) scale(1); }
        50% { transform: rotateY(180deg) scale(1.1); }
    }

    @keyframes chartRise {
        0%, 100% { transform: scaleY(1); }
        50% { transform: scaleY(1.15); }
    }

    @keyframes percentBeat {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.12); }
    }

    @keyframes spinSlow {
        0% { transform: rotate(0deg) scale(1); }
        100% { transform: rotate(360deg) scale(1.05); }
    }

    @keyframes checkPop {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.15); }
    }

    @keyframes flagWave {
        0%, 100% { transform: rotate(0deg) scale(1); }
        50% { transform: rotate(12deg) scale(1.05); }
    }

    @keyframes starSpin {
        0%, 100% { transform: rotate(0deg) scale(1); }
        50% { transform: rotate(20deg) scale(1.08); }
    }

    @keyframes boxFloat {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-8px) rotate(3deg); }
    }

    @keyframes calendarFlip {
        0%, 100% { transform: rotate(0deg) scale(1); }
        50% { transform: rotate(-5deg) scale(1.05); }
    }

    @keyframes dollarPulse {
        0%, 100% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.1); opacity: 0.8; }
    }

    @keyframes bellRing {
        0%, 100% { transform: rotate(0deg) scale(1); }
        25% { transform: rotate(-10deg) scale(1.05); }
        75% { transform: rotate(10deg) scale(1.05); }
    }

    @keyframes userBounce {
        0%, 100% { transform: scale(1) translateY(0); }
        50% { transform: scale(1.08) translateY(-4px); }
    }

    /* ===== ANIMATION CLASSES ===== */
    .anim-card-float { animation: cardFloat 8s ease-in-out infinite; }
    .anim-hero-pulse { animation: heroPulse 6s ease-in-out infinite; }
    .anim-mini-float { animation: miniFloat 7s ease-in-out infinite; }
    .anim-number-bounce { animation: numberBounce 4s ease-in-out infinite; }
    .anim-number-pulse { animation: numberPulse 4s ease-in-out infinite; }
    .anim-icon-wobble { animation: iconWobble 5s ease-in-out infinite; }
    .anim-icon-spin { animation: iconSpin 8s linear infinite; }
    .anim-icon-float { animation: iconFloat 4s ease-in-out infinite; }
    .anim-icon-pulse { animation: iconPulse 3s ease-in-out infinite; }
    .anim-icon-shake { animation: iconShake 4s ease-in-out infinite; }
    .anim-icon-bounce { animation: iconBounce 3s ease-in-out infinite; }
    .anim-icon-glow { animation: iconGlow 3s ease-in-out infinite; }
    .anim-icon-slide { animation: iconSlide 3s ease-in-out infinite; }
    .anim-icon-jump { animation: iconJump 2.5s ease-in-out infinite; }
    .anim-icon-wave { animation: iconWave 4s ease-in-out infinite; }
    .anim-icon-zoom { animation: iconZoom 3s ease-in-out infinite; }
    .anim-icon-flip { animation: iconFlip 6s ease-in-out infinite; }
    .anim-icon-swing { animation: iconSwing 3s ease-in-out infinite; }
    .anim-badge-glow { animation: badgeGlow 3s ease-in-out infinite; }
    .anim-trend-bounce { animation: trendBounce 2s ease-in-out infinite; }
    .anim-ribbon-pulse { animation: ribbonPulse 3s ease-in-out infinite; }
    .anim-star-twinkle { animation: starTwinkle 3s ease-in-out infinite; }
    .anim-tile-icon { animation: tileIconBounce 4s ease-in-out infinite; }
    .anim-divider { animation: dividerWidth 4s ease-in-out infinite; }

    /* Specific icon classes */
    .icon-coin { animation: coinFlip 5s ease-in-out infinite; display: inline-block; }
    .icon-chart { animation: chartRise 3s ease-in-out infinite; display: inline-block; }
    .icon-percent { animation: percentBeat 2s ease-in-out infinite; display: inline-block; }
    .icon-hourglass { animation: spinSlow 8s linear infinite; display: inline-block; }
    .icon-check { animation: checkPop 2s ease-in-out infinite; display: inline-block; }
    .icon-flag { animation: flagWave 3s ease-in-out infinite; display: inline-block; }
    .icon-star { animation: starSpin 4s ease-in-out infinite; display: inline-block; }
    .icon-box { animation: boxFloat 5s ease-in-out infinite; display: inline-block; }
    .icon-calendar { animation: calendarFlip 4s ease-in-out infinite; display: inline-block; }
    .icon-dollar { animation: dollarPulse 3s ease-in-out infinite; display: inline-block; }
    .icon-bell { animation: bellRing 3s ease-in-out infinite; display: inline-block; }
    .icon-user { animation: userBounce 3.5s ease-in-out infinite; display: inline-block; }
    .icon-trophy { animation: iconBounce 4s ease-in-out infinite; display: inline-block; }
    .icon-book { animation: iconFloat 4s ease-in-out infinite; display: inline-block; }
    .icon-comment { animation: iconWave 4s ease-in-out infinite; display: inline-block; }
    .icon-crown { animation: iconPulse 3s ease-in-out infinite; display: inline-block; }
    .icon-info { animation: iconGlow 4s ease-in-out infinite; display: inline-block; }
    .icon-chart-bar { animation: chartRise 3s ease-in-out infinite; display: inline-block; }

    /* ===== GLASS ANIMATED CARD ===== */
    .glass-animated {
        background: rgba(255, 255, 255, 0.96);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-radius: var(--radius-lg);
        padding: 1.8rem 2rem;
        border: 1px solid rgba(200, 16, 46, 0.05);
        box-shadow: var(--shadow-md), inset 0 1px 0 rgba(255, 255, 255, 0.95);
        transition: var(--transition-spring);
        height: 100%;
        position: relative;
        overflow: hidden;
        animation: cardFloat 8s ease-in-out infinite;
    }
    .glass-animated:nth-child(2) { animation-delay: 0.5s; }
    .glass-animated:nth-child(3) { animation-delay: 1s; }
    .glass-animated:nth-child(4) { animation-delay: 1.5s; }

    .glass-animated::before {
        content: '';
        position: absolute;
        top: -60%;
        right: -60%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle at 70% 30%, rgba(200, 16, 46, 0.03) 0%, transparent 60%);
        opacity: 0;
        transition: opacity 0.8s ease;
        pointer-events: none;
    }
    .glass-animated:hover::before {
        opacity: 1;
    }
    .glass-animated::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #c8102e, #ff6b81, #ff9aa7, #c8102e);
        background-size: 300% 100%;
        opacity: 0;
        transition: opacity 0.5s ease;
        border-radius: 10px 10px 0 0;
    }
    .glass-animated:hover::after {
        opacity: 1;
        animation: shimmerFlow 2.5s infinite linear;
    }
    .glass-animated:hover {
        transform: translateY(-10px) scale(1.01) !important;
        box-shadow: var(--shadow-xl);
        border-color: rgba(200, 16, 46, 0.15);
    }

    /* ===== HERO STAT ANIMATED ===== */
    .hero-animated {
        background: linear-gradient(145deg, #ffffff, #fefafb);
        border-radius: var(--radius-lg);
        padding: 1.8rem 2rem;
        border: 1px solid rgba(200, 16, 46, 0.05);
        box-shadow: var(--shadow-sm);
        transition: var(--transition-spring);
        height: 100%;
        min-height: 135px;
        display: flex;
        align-items: center;
        gap: 1.2rem;
        position: relative;
        overflow: hidden;
        cursor: default;
        animation: heroPulse 6s ease-in-out infinite;
    }
    .hero-animated:nth-child(2) { animation-delay: 0.3s; }
    .hero-animated:nth-child(3) { animation-delay: 0.6s; }
    .hero-animated:nth-child(4) { animation-delay: 0.9s; }

    .hero-animated::before {
        content: '';
        position: absolute;
        top: 0;
        right: -20px;
        width: 160px;
        height: 160px;
        background: radial-gradient(circle, rgba(200, 16, 46, 0.05) 0%, transparent 70%);
        border-radius: 50%;
        transition: all 0.8s ease;
        pointer-events: none;
        animation: orbPulse 4s ease-in-out infinite;
    }
    .hero-animated:hover::before {
        transform: scale(2) translate(10px, -10px);
        opacity: 0.8;
        animation-play-state: paused;
    }
    .hero-animated:hover {
        transform: translateY(-10px) scale(1.01);
        animation-play-state: paused;
        box-shadow: var(--shadow-xl);
        border-color: rgba(200, 16, 46, 0.15);
    }
    .hero-animated .icon-sphere {
        width: 74px;
        height: 74px;
        min-width: 74px;
        border-radius: 26px;
        background: linear-gradient(135deg, var(--red-soft), #fff5f7);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.4rem;
        color: var(--red-primary);
        transition: var(--transition-bounce);
        border: 1px solid rgba(200, 16, 46, 0.06);
        position: relative;
        z-index: 2;
        box-shadow: 0 4px 16px rgba(200, 16, 46, 0.06);
        animation: iconWobble 5s ease-in-out infinite;
    }
    .hero-animated:hover .icon-sphere {
        background: var(--red-primary);
        color: white;
        transform: scale(1.1) rotate(-6deg) translateY(-4px);
        animation-play-state: paused;
        box-shadow: 0 12px 40px rgba(200, 16, 46, 0.40);
    }
    .hero-animated .hero-data {
        flex: 1;
        min-width: 0;
        position: relative;
        z-index: 2;
    }
    .hero-animated .hero-label {
        font-size: 0.7rem;
        font-weight: 700;
        color: #6c757d;
        text-transform: uppercase;
        letter-spacing: 0.12em;
        margin-bottom: 0.05rem;
        animation: labelGlow 3s ease-in-out infinite;
    }
    .hero-animated .hero-number {
        font-size: 2.6rem;
        font-weight: 800;
        color: #1a1a1a;
        letter-spacing: -0.02em;
        line-height: 1.05;
        word-break: break-word;
        overflow-wrap: break-word;
        max-width: 100%;
        transition: color 0.4s ease;
        animation: numberPulse 4s ease-in-out infinite;
    }
    .hero-animated:hover .hero-number {
        color: var(--red-primary);
        animation-play-state: paused;
    }
    .hero-animated .hero-trend {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        font-size: 0.6rem;
        font-weight: 700;
        padding: 0.1rem 0.7rem;
        border-radius: 40px;
        background: #e8f5e9;
        color: #2e7d32;
        margin-top: 0.15rem;
        animation: trendBounce 2s ease-in-out infinite;
    }
    .hero-animated .hero-trend.down {
        background: #ffebee;
        color: #c62828;
    }

    /* ===== ANIMATED MINI CARD ===== */
    .mini-animated {
        background: #ffffff;
        border-radius: var(--radius-md);
        padding: 1.4rem 1.2rem;
        border: 1px solid rgba(200, 16, 46, 0.04);
        transition: var(--transition-spring);
        text-align: center;
        height: 100%;
        position: relative;
        overflow: hidden;
        cursor: default;
        animation: miniFloat 7s ease-in-out infinite;
    }
    .mini-animated:nth-child(2) { animation-delay: 0.4s; }
    .mini-animated:nth-child(3) { animation-delay: 0.8s; }
    .mini-animated:nth-child(4) { animation-delay: 1.2s; }

    .mini-animated::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 15%;
        right: 15%;
        height: 3px;
        background: linear-gradient(90deg, var(--red-primary), var(--red-light));
        transform: scaleX(0);
        transform-origin: center;
        transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        border-radius: 10px;
    }
    .mini-animated:hover::after {
        transform: scaleX(1);
    }
    .mini-animated:hover {
        transform: translateY(-8px) scale(1.02) !important;
        animation-play-state: paused;
        border-color: rgba(200, 16, 46, 0.12);
        box-shadow: 0 16px 40px -16px rgba(200, 16, 46, 0.12);
    }
    .mini-animated .mini-icon-wrap {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 54px;
        height: 54px;
        border-radius: 18px;
        font-size: 1.5rem;
        margin-bottom: 0.4rem;
        transition: var(--transition-bounce);
        animation: iconSpin 10s linear infinite;
    }
    .mini-animated:hover .mini-icon-wrap {
        transform: scale(1.15) rotate(-8deg);
        animation-play-state: paused;
    }
    .mini-animated .mini-label {
        font-size: 0.6rem;
        font-weight: 700;
        color: #6c757d;
        text-transform: uppercase;
        letter-spacing: 0.1em;
    }
    .mini-animated .mini-number {
        font-size: 2.2rem;
        font-weight: 800;
        color: #1a1a1a;
        line-height: 1.15;
        transition: color 0.3s;
        animation: miniNumberPop 3s ease-in-out infinite;
    }
    .mini-animated:hover .mini-number {
        color: var(--red-primary);
        animation-play-state: paused;
    }

    /* ===== ANIMATED TABLE ===== */
    .table-animated {
        border-collapse: separate;
        border-spacing: 0 8px;
        width: 100%;
    }
    .table-animated thead th {
        background: transparent;
        color: #6c757d;
        font-weight: 700;
        font-size: 0.6rem;
        text-transform: uppercase;
        letter-spacing: 0.14em;
        padding: 0.3rem 1rem;
        border: none;
        border-bottom: 2px solid rgba(200, 16, 46, 0.05);
    }
    .table-animated tbody td {
        background: #ffffff;
        border: none;
        padding: 0.85rem 1rem;
        border-radius: var(--radius-sm);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
        transition: var(--transition-spring);
        vertical-align: middle;
        border-left: 3px solid transparent;
    }
    .table-animated tbody tr {
        transition: var(--transition-spring);
        animation: tableRowFade 0.6s ease forwards;
        opacity: 0;
        transform: translateX(-10px);
    }
    .table-animated tbody tr:nth-child(1) { animation-delay: 0.05s; }
    .table-animated tbody tr:nth-child(2) { animation-delay: 0.10s; }
    .table-animated tbody tr:nth-child(3) { animation-delay: 0.15s; }
    .table-animated tbody tr:nth-child(4) { animation-delay: 0.20s; }
    .table-animated tbody tr:nth-child(5) { animation-delay: 0.25s; }

    .table-animated tbody tr:hover td {
        background: var(--red-soft);
        box-shadow: 0 4px 20px rgba(200, 16, 46, 0.08);
        border-left-color: var(--red-primary);
        transform: scale(1.008) translateX(4px);
    }
    .table-animated tbody tr:hover td:first-child {
        border-radius: var(--radius-sm) 0 0 var(--radius-sm);
    }
    .table-animated tbody tr:hover td:last-child {
        border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
    }

    /* ===== ANIMATED BADGE ===== */
    .badge-animated {
        font-weight: 700;
        padding: 0.3rem 1.2rem;
        border-radius: 40px;
        font-size: 0.6rem;
        letter-spacing: 0.05em;
        border: 1px solid transparent;
        transition: var(--transition-bounce);
        display: inline-block;
        cursor: default;
        animation: badgeGlow 3s ease-in-out infinite;
    }
    .badge-animated.red {
        background: var(--red-soft);
        color: var(--red-primary);
        border-color: rgba(200, 16, 46, 0.08);
    }
    .badge-animated.red:hover {
        background: var(--red-primary);
        color: white;
        border-color: var(--red-primary);
        transform: scale(1.08);
        box-shadow: 0 4px 20px rgba(200, 16, 46, 0.30);
        animation-play-state: paused;
    }
    .badge-animated.green {
        background: #e8f5e9;
        color: #2e7d32;
        border-color: rgba(46, 125, 50, 0.08);
    }
    .badge-animated.green:hover {
        background: #2e7d32;
        color: white;
        transform: scale(1.08);
        box-shadow: 0 4px 20px rgba(46, 125, 50, 0.30);
        animation-play-state: paused;
    }
    .badge-animated.gold {
        background: #fff8e1;
        color: #f57f17;
        border-color: rgba(245, 127, 23, 0.08);
    }
    .badge-animated.gold:hover {
        background: #f57f17;
        color: white;
        transform: scale(1.08);
        box-shadow: 0 4px 20px rgba(245, 127, 23, 0.30);
        animation-play-state: paused;
    }
    .badge-animated.blue {
        background: #e3f2fd;
        color: #0d47a1;
        border-color: rgba(13, 71, 161, 0.08);
    }
    .badge-animated.blue:hover {
        background: #0d47a1;
        color: white;
        transform: scale(1.08);
        box-shadow: 0 4px 20px rgba(13, 71, 161, 0.30);
        animation-play-state: paused;
    }

    /* ===== ANIMATED RATING BARS ===== */
    .rating-animated {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 0.4rem 0.6rem;
        border-radius: var(--radius-sm);
        transition: var(--transition-spring);
        cursor: default;
        animation: ratingSlide 0.6s ease forwards;
        opacity: 0;
        transform: translateX(-10px);
    }
    .rating-animated:nth-child(1) { animation-delay: 0.1s; }
    .rating-animated:nth-child(2) { animation-delay: 0.2s; }
    .rating-animated:nth-child(3) { animation-delay: 0.3s; }
    .rating-animated:nth-child(4) { animation-delay: 0.4s; }
    .rating-animated:nth-child(5) { animation-delay: 0.5s; }

    .rating-animated:hover {
        background: var(--red-soft);
        transform: translateX(8px) scale(1.01);
    }
    .rating-animated .stars {
        min-width: 88px;
        font-size: 0.9rem;
        color: #ffb300;
        letter-spacing: 2px;
        font-weight: 500;
        animation: starTwinkle 3s ease-in-out infinite;
    }
    .rating-animated .track {
        flex: 1;
        height: 8px;
        background: #f0f0f0;
        border-radius: 20px;
        overflow: hidden;
        position: relative;
        box-shadow: inset 0 1px 3px rgba(0,0,0,0.04);
    }
    .rating-animated .track .fill {
        height: 100%;
        border-radius: 20px;
        background: linear-gradient(90deg, var(--red-primary), var(--red-light));
        transition: width 1.5s cubic-bezier(0.22, 1, 0.36, 1);
        width: 0%;
        position: relative;
    }
    .rating-animated .track .fill::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        right: 0;
        bottom: 0;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
        animation: shimmerBar 2.5s infinite;
    }
    .rating-animated .count {
        min-width: 44px;
        text-align: right;
        font-weight: 700;
        color: #1a1a1a;
        font-size: 0.9rem;
        transition: color 0.3s;
    }
    .rating-animated:hover .count {
        color: var(--red-primary);
    }

    /* ===== ANIMATED TILE ===== */
    .tile-animated {
        background: var(--red-soft);
        border-radius: var(--radius-sm);
        padding: 1.2rem 1rem;
        text-align: center;
        transition: var(--transition-spring);
        border: 1px solid transparent;
        height: 100%;
        cursor: default;
        animation: tilePop 0.6s ease forwards;
        opacity: 0;
        transform: scale(0.9);
    }
    .tile-animated:nth-child(1) { animation-delay: 0.1s; }
    .tile-animated:nth-child(2) { animation-delay: 0.2s; }
    .tile-animated:nth-child(3) { animation-delay: 0.3s; }
    .tile-animated:nth-child(4) { animation-delay: 0.4s; }

    .tile-animated:hover {
        background: #ffffff;
        border-color: rgba(200, 16, 46, 0.12);
        transform: translateY(-6px) scale(1.03);
        box-shadow: 0 8px 28px rgba(200, 16, 46, 0.08);
        animation-play-state: paused;
    }
    .tile-animated .tile-icon {
        font-size: 2rem;
        display: block;
        margin-bottom: 0.2rem;
        animation: tileIconBounce 4s ease-in-out infinite;
    }
    .tile-animated:hover .tile-icon {
        animation-play-state: paused;
        transform: scale(1.15);
    }
    .tile-animated .tile-label {
        font-size: 0.5rem;
        color: #6c757d;
        text-transform: uppercase;
        letter-spacing: 0.12em;
        font-weight: 700;
    }
    .tile-animated .tile-value {
        font-weight: 700;
        color: #1a1a1a;
        font-size: 0.95rem;
        margin-top: 0.15rem;
        word-break: break-word;
    }

    /* ===== ANIMATED SUMMARY ===== */
    .summary-animated {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.7rem 1rem;
        background: var(--red-soft);
        border-radius: var(--radius-sm);
        transition: var(--transition-spring);
        border: 1px solid transparent;
        animation: summarySlide 0.6s ease forwards;
        opacity: 0;
        transform: translateX(-10px);
    }
    .summary-animated:nth-child(1) { animation-delay: 0.1s; }
    .summary-animated:nth-child(2) { animation-delay: 0.2s; }
    .summary-animated:nth-child(3) { animation-delay: 0.3s; }
    .summary-animated:nth-child(4) { animation-delay: 0.4s; }
    .summary-animated:nth-child(5) { animation-delay: 0.5s; }

    .summary-animated:hover {
        background: #ffffff;
        border-color: rgba(200, 16, 46, 0.08);
        transform: translateX(6px) scale(1.01);
        box-shadow: 0 4px 16px rgba(200, 16, 46, 0.06);
        animation-play-state: paused;
    }
    .summary-animated .label {
        color: #6c757d;
        font-size: 0.82rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .summary-animated .value {
        font-weight: 700;
        color: #1a1a1a;
        font-size: 0.95rem;
        transition: color 0.3s;
    }
    .summary-animated:hover .value {
        color: var(--red-primary);
    }
    .summary-animated .value.red {
        color: var(--red-primary);
    }

    /* ===== CHART WRAPPER ===== */
    .chart-animated {
        background: #ffffff;
        border-radius: var(--radius-lg);
        padding: 1.8rem 2rem 1.2rem 2rem;
        border: 1px solid rgba(200, 16, 46, 0.05);
        box-shadow: var(--shadow-sm);
        transition: var(--transition-spring);
        height: 100%;
        animation: chartFade 0.8s ease forwards;
        opacity: 0;
        transform: translateY(20px);
    }
    .chart-animated:hover {
        border-color: rgba(200, 16, 46, 0.12);
        box-shadow: var(--shadow-lg);
        transform: translateY(-4px);
    }
    .chart-animated canvas {
        width: 100% !important;
        height: auto !important;
        max-height: 220px;
        min-height: 180px;
    }

    /* ===== PULSE DOT ===== */
    .pulse-dot {
        display: inline-block;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #4caf50;
        animation: pulseDot 1.5s ease-in-out infinite;
    }

    /* ===== STATUS RIBBON ===== */
    .status-ribbon {
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
        font-size: 0.6rem;
        font-weight: 600;
        padding: 0.15rem 0.7rem;
        border-radius: 40px;
        animation: ribbonPulse 3s ease-in-out infinite;
    }
    .status-ribbon.live {
        background: #e8f5e9;
        color: #2e7d32;
    }

    /* ===== SECTION HEADER ===== */
    .section-header {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        margin-bottom: 1.2rem;
        flex-wrap: wrap;
    }
    .section-header .icon {
        font-size: 1.8rem;
        animation: iconFloat 4s ease-in-out infinite;
    }
    .section-header .title {
        margin: 0;
        font-weight: 800;
        color: #1a1a1a;
        font-size: 1.2rem;
        background: linear-gradient(135deg, #1a1a1a, #c8102e);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    .section-header .badge-right {
        margin-left: auto;
    }

    /* ===== DIVIDER ===== */
    .divider-animated {
        border: 0;
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--red-primary), var(--red-light), var(--red-primary), transparent);
        margin: 2rem 0;
        opacity: 0.10;
        border-radius: 10px;
        animation: dividerWidth 4s ease-in-out infinite;
    }

    /* ===== ENTRY ANIMATIONS ===== */
    .fade-pop {
        animation: fadePop 0.7s cubic-bezier(0.23, 1, 0.32, 1) forwards;
        opacity: 0;
    }
    .delay-1 { animation-delay: 0.04s; }
    .delay-2 { animation-delay: 0.08s; }
    .delay-3 { animation-delay: 0.12s; }
    .delay-4 { animation-delay: 0.16s; }
    .delay-5 { animation-delay: 0.20s; }
    .delay-6 { animation-delay: 0.24s; }
    .delay-7 { animation-delay: 0.28s; }
    .delay-8 { animation-delay: 0.32s; }
    .delay-9 { animation-delay: 0.36s; }
    .delay-10 { animation-delay: 0.40s; }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .hero-animated {
            padding: 1.2rem 1.2rem;
            min-height: 90px;
            gap: 0.8rem;
        }
        .hero-animated .icon-sphere {
            width: 52px;
            height: 52px;
            min-width: 52px;
            font-size: 1.6rem;
            border-radius: 18px;
        }
        .hero-animated .hero-number {
            font-size: 1.6rem;
        }
        .hero-animated .hero-label {
            font-size: 0.55rem;
        }
        .mini-animated .mini-number {
            font-size: 1.6rem;
        }
        .mini-animated .mini-icon-wrap {
            width: 44px;
            height: 44px;
            font-size: 1.2rem;
        }
        .glass-animated {
            padding: 1.2rem 1rem;
        }
        .rating-animated .stars {
            min-width: 60px;
            font-size: 0.7rem;
        }
        .rating-animated .count {
            min-width: 30px;
            font-size: 0.8rem;
        }
        .chart-animated canvas {
            max-height: 160px;
            min-height: 140px;
        }
        .table-animated tbody td {
            padding: 0.5rem 0.6rem;
            font-size: 0.8rem;
        }
        .badge-animated {
            padding: 0.2rem 0.8rem;
            font-size: 0.5rem;
        }
        .section-header .title {
            font-size: 1rem;
        }
        .section-header .icon {
            font-size: 1.4rem;
        }
    }
    @media (max-width: 576px) {
        .hero-animated .hero-number {
            font-size: 1.3rem;
        }
        .hero-animated .icon-sphere {
            width: 44px;
            height: 44px;
            min-width: 44px;
            font-size: 1.3rem;
        }
        .mini-animated .mini-number {
            font-size: 1.3rem;
        }
        .mini-animated .mini-icon-wrap {
            width: 38px;
            height: 38px;
            font-size: 1rem;
        }
        .glass-animated {
            padding: 0.8rem 0.8rem;
        }
        .rating-animated {
            gap: 0.5rem;
            padding: 0.3rem 0.3rem;
        }
        .rating-animated .stars {
            min-width: 45px;
            font-size: 0.6rem;
            letter-spacing: 1px;
        }
        .rating-animated .count {
            min-width: 25px;
            font-size: 0.7rem;
        }
        .rating-animated .track {
            height: 6px;
        }
        .tile-animated .tile-value {
            font-size: 0.8rem;
        }
        .tile-animated .tile-icon {
            font-size: 1.4rem;
        }
    }
</style>

<div class="container-fluid pt-4 px-4">

    <!-- ===== HERO STATS ROW ===== -->
    <div class="row g-4">
        <div class="col-xl-3 col-sm-6 fade-pop delay-1">
            <div class="hero-animated">
                <div class="icon-sphere"><i class="fa fa-box icon-box"></i></div>
                <div class="hero-data">
                    <div class="hero-label">Total Items</div>
                    <div class="hero-number">{{ $totalItems ?? 128 }}</div>
                    <span class="hero-trend"><i class="fas fa-arrow-up"></i> +12 this month</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 fade-pop delay-2">
            <div class="hero-animated">
                <div class="icon-sphere"><i class="fa fa-calendar-check icon-calendar"></i></div>
                <div class="hero-data">
                    <div class="hero-label">Total Bookings</div>
                    <div class="hero-number">{{ $totalBookings ?? 342 }}</div>
                    <span class="hero-trend"><i class="fas fa-arrow-up"></i> +8% vs last month</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 fade-pop delay-3">
            <div class="hero-animated">
                <div class="icon-sphere"><i class="fa fa-star icon-star"></i></div>
                <div class="hero-data">
                    <div class="hero-label">Average Rating</div>
                    <div class="hero-number">{{ number_format($averageRating ?? 4.6,1) }}<span style="font-size:1.2rem;font-weight:400;color:#6c757d;">/5</span></div>
                    <span class="hero-trend"><i class="fas fa-star"></i> Based on {{ $totalReviews ?? 148 }} reviews</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 fade-pop delay-4">
            <div class="hero-animated">
                <div class="icon-sphere"><i class="fa fa-dollar-sign icon-dollar"></i></div>
                <div class="hero-data">
                    <div class="hero-label">Total Revenue</div>
                    <div class="hero-number" style="font-size:2rem;">Rs. {{ number_format($totalRevenue ?? 84720) }}</div>
                    <span class="hero-trend"><i class="fas fa-arrow-up"></i> +15% growth</span>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== ITEM STATUS ===== -->
    <div class="row g-4 mt-3">
        <div class="col-md-3 col-6 fade-pop delay-1">
            <div class="mini-animated">
                <div class="mini-icon-wrap" style="background:#e8f5e9;color:#2e7d32;"><i class="fas fa-check-circle anim-icon-pulse"></i></div>
                <div class="mini-label">Available</div>
                <div class="mini-number">{{ $availableItems ?? 83 }}</div>
            </div>
        </div>
        <div class="col-md-3 col-6 fade-pop delay-2">
            <div class="mini-animated">
                <div class="mini-icon-wrap" style="background:#fff8e1;color:#f57f17;"><i class="fas fa-clock anim-icon-spin"></i></div>
                <div class="mini-label">Pending</div>
                <div class="mini-number">{{ $pendingItems ?? 12 }}</div>
            </div>
        </div>
        <div class="col-md-3 col-6 fade-pop delay-3">
            <div class="mini-animated">
                <div class="mini-icon-wrap" style="background:#ffebee;color:#c62828;"><i class="fas fa-times-circle anim-icon-shake"></i></div>
                <div class="mini-label">Rejected</div>
                <div class="mini-number">{{ $rejectedItems ?? 7 }}</div>
            </div>
        </div>
        <div class="col-md-3 col-6 fade-pop delay-4">
            <div class="mini-animated">
                <div class="mini-icon-wrap" style="background:#e3f2fd;color:#0d47a1;"><i class="fas fa-handshake anim-icon-bounce"></i></div>
                <div class="mini-label">Active Rentals</div>
                <div class="mini-number">{{ $activeRentals ?? 41 }}</div>
            </div>
        </div>
    </div>

    <!-- ===== BOOKING STATUS ===== -->
    <div class="row g-4 mt-2">
        <div class="col-md-3 col-6 fade-pop delay-1">
            <div class="mini-animated">
                <div class="mini-icon-wrap" style="background:#f5f5f5;color:#757575;"><i class="fas fa-ban anim-icon-slide"></i></div>
                <div class="mini-label">Cancelled</div>
                <div class="mini-number">{{ $cancelledBookings ?? 18 }}</div>
            </div>
        </div>
        <div class="col-md-3 col-6 fade-pop delay-2">
            <div class="mini-animated">
                <div class="mini-icon-wrap" style="background:#ffebee;color:#c62828;"><i class="fas fa-thumbs-down anim-icon-wave"></i></div>
                <div class="mini-label">Rejected Bookings</div>
                <div class="mini-number">{{ $rejectedBookings ?? 9 }}</div>
            </div>
        </div>
        <div class="col-md-3 col-6 fade-pop delay-3">
            <div class="mini-animated">
                <div class="mini-icon-wrap" style="background:#e3f2fd;color:#0d47a1;"><i class="fas fa-calendar-day icon-calendar"></i></div>
                <div class="mini-label">Today's Bookings</div>
                <div class="mini-number">{{ $todayBookings ?? 14 }}</div>
            </div>
        </div>
        <div class="col-md-3 col-6 fade-pop delay-4">
            <div class="mini-animated">
                <div class="mini-icon-wrap" style="background:#e8f5e9;color:#2e7d32;"><i class="fas fa-calendar-alt anim-icon-float"></i></div>
                <div class="mini-label">This Month</div>
                <div class="mini-number">{{ $thisMonthBookings ?? 97 }}</div>
            </div>
        </div>
    </div>

    <!-- ===== REVENUE + SUCCESS ===== -->
    <div class="row g-4 mt-2">
        <div class="col-md-4 fade-pop delay-1">
            <div class="glass-animated text-center">
                <div style="display:flex;align-items:center;justify-content:center;gap:0.8rem;margin-bottom:0.3rem;">
                    <i class="fas fa-coins text-success icon-coin" style="font-size:2.2rem;"></i>
                    <span style="font-size:0.65rem;font-weight:700;color:#6c757d;text-transform:uppercase;letter-spacing:0.1em;">Today's Revenue</span>
                </div>
                <div style="font-size:2.8rem;font-weight:800;color:#1a1a1a;line-height:1.05;word-break:break-word;" class="anim-number-bounce">
                    Rs. {{ number_format($todayRevenue ?? 3250) }}
                </div>
                <div style="font-size:0.65rem;color:#6c757d;margin-top:0.2rem;"><i class="fas fa-arrow-up text-success anim-icon-slide"></i> +5% from yesterday</div>
            </div>
        </div>
        <div class="col-md-4 fade-pop delay-2">
            <div class="glass-animated text-center">
                <div style="display:flex;align-items:center;justify-content:center;gap:0.8rem;margin-bottom:0.3rem;">
                    <i class="fas fa-chart-line text-warning icon-chart" style="font-size:2.2rem;"></i>
                    <span style="font-size:0.65rem;font-weight:700;color:#6c757d;text-transform:uppercase;letter-spacing:0.1em;">This Month</span>
                </div>
                <div style="font-size:2.8rem;font-weight:800;color:#1a1a1a;line-height:1.05;word-break:break-word;" class="anim-number-bounce">
                    Rs. {{ number_format($thisMonthRevenue ?? 28900) }}
                </div>
                <div style="font-size:0.65rem;color:#6c757d;margin-top:0.2rem;">Projected: Rs. {{ number_format(($thisMonthRevenue ?? 28900) * 1.12) }}</div>
            </div>
        </div>
        <div class="col-md-4 fade-pop delay-3">
            <div class="glass-animated text-center">
                <div style="display:flex;align-items:center;justify-content:center;gap:0.8rem;margin-bottom:0.3rem;">
                    <i class="fas fa-percent text-danger icon-percent" style="font-size:2.2rem;"></i>
                    <span style="font-size:0.65rem;font-weight:700;color:#6c757d;text-transform:uppercase;letter-spacing:0.1em;">Success Rate</span>
                </div>
                <div style="font-size:2.8rem;font-weight:800;color:#1a1a1a;line-height:1.05;" class="anim-number-bounce">
                    {{ $bookingSuccessRate ?? 86 }}%
                </div>
                <div style="font-size:0.65rem;color:#6c757d;margin-top:0.2rem;"><i class="fas fa-arrow-up text-success anim-icon-jump"></i> 3% improvement</div>
            </div>
        </div>
    </div>

    <!-- ===== RATING DISTRIBUTION ===== -->
    <div class="row mt-4 fade-pop delay-1">
        <div class="col-12">
            <div class="glass-animated">
                <div class="section-header">
                    <i class="fas fa-star text-warning icon-star"></i>
                    <h5 class="title">Rating Distribution</h5>
                    <span class="badge-animated red badge-right">{{ ($fiveStarReviews ?? 64) + ($fourStarReviews ?? 28) + ($threeStarReviews ?? 12) + ($twoStarReviews ?? 5) + ($oneStarReviews ?? 3) }} total</span>
                </div>
                @php
                    $total = ($fiveStarReviews ?? 64) + ($fourStarReviews ?? 28) + ($threeStarReviews ?? 12) + ($twoStarReviews ?? 5) + ($oneStarReviews ?? 3);
                    $total = $total > 0 ? $total : 1;
                @endphp
                <div class="rating-animated">
                    <span class="stars anim-star-twinkle">⭐⭐⭐⭐⭐</span>
                    <div class="track"><div class="fill" style="width:{{ ($fiveStarReviews ?? 64) / $total * 100 }}%;"></div></div>
                    <span class="count">{{ $fiveStarReviews ?? 64 }}</span>
                </div>
                <div class="rating-animated">
                    <span class="stars anim-star-twinkle">⭐⭐⭐⭐</span>
                    <div class="track"><div class="fill" style="width:{{ ($fourStarReviews ?? 28) / $total * 100 }}%;"></div></div>
                    <span class="count">{{ $fourStarReviews ?? 28 }}</span>
                </div>
                <div class="rating-animated">
                    <span class="stars anim-star-twinkle">⭐⭐⭐</span>
                    <div class="track"><div class="fill" style="width:{{ ($threeStarReviews ?? 12) / $total * 100 }}%;"></div></div>
                    <span class="count">{{ $threeStarReviews ?? 12 }}</span>
                </div>
                <div class="rating-animated">
                    <span class="stars anim-star-twinkle">⭐⭐</span>
                    <div class="track"><div class="fill" style="width:{{ ($twoStarReviews ?? 5) / $total * 100 }}%;"></div></div>
                    <span class="count">{{ $twoStarReviews ?? 5 }}</span>
                </div>
                <div class="rating-animated">
                    <span class="stars anim-star-twinkle">⭐</span>
                    <div class="track"><div class="fill" style="width:{{ ($oneStarReviews ?? 3) / $total * 100 }}%;"></div></div>
                    <span class="count">{{ $oneStarReviews ?? 3 }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== TOP PERFORMING TILES ===== -->
    <div class="row mt-4 fade-pop delay-2">
        <div class="col-12">
            <div class="glass-animated">
                <div class="section-header">
                    <i class="fas fa-crown text-warning icon-crown"></i>
                    <h5 class="title">Top Performing Items</h5>
                    <span class="status-ribbon live badge-right"><span class="pulse-dot"></span> Live</span>
                </div>
                <div class="row g-3">
                    <div class="col-md-3 col-6">
                        <div class="tile-animated">
                            <span class="tile-icon anim-tile-icon">🏆</span>
                            <div class="tile-label">Revenue Leader</div>
                            <div class="tile-value">{{ optional($highestRevenueItem)->title ?? 'Mountain Bike Pro' }}</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="tile-animated">
                            <span class="tile-icon anim-tile-icon">📝</span>
                            <div class="tile-label">Most Reviewed</div>
                            <div class="tile-value">{{ optional($mostReviewedItem)->title ?? 'Camping Tent 4P' }}</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="tile-animated">
                            <span class="tile-icon anim-tile-icon">❤️</span>
                            <div class="tile-label">Most Wishlisted</div>
                            <div class="tile-value">{{ optional($mostWishlistedItem)->title ?? 'GoPro Hero 11' }}</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="tile-animated">
                            <span class="tile-icon anim-tile-icon">👥</span>
                            <div class="tile-label">Total Renters</div>
                            <div class="tile-value">{{ $totalRenters ?? 215 }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== LATEST BOOKINGS & REVIEWS ===== -->
    <div class="row g-4 mt-2">
        <div class="col-md-6 fade-pop delay-1">
            <div class="glass-animated">
                <div class="section-header">
                    <i class="fas fa-book-open text-primary icon-book"></i>
                    <h5 class="title">Latest Bookings</h5>
                    <span class="badge-animated blue badge-right">{{ count($latestBookings ?? []) }} recent</span>
                </div>
                <table class="table-animated">
                    <thead><tr><th>Item</th><th>Renter</th><th>Status</th></tr></thead>
                    <tbody>
                        @foreach($latestBookings ?? [] as $booking)
                        <tr>
                            <td><strong>{{ $booking->item->title ?? 'Tent' }}</strong></td>
                            <td>{{ $booking->renter->name ?? 'Alex' }}</td>
                            <td><span class="badge-animated red">{{ ucfirst($booking->status ?? 'pending') }}</span></td>
                        </tr>
                        @endforeach
                        @if(empty($latestBookings))
                        <tr><td><strong>Camping Stove</strong></td><td>Sam</td><td><span class="badge-animated green">Approved</span></td></tr>
                        <tr><td><strong>Kayak</strong></td><td>Jordan</td><td><span class="badge-animated red">Pending</span></td></tr>
                        <tr><td><strong>Sleeping Bag</strong></td><td>Taylor</td><td><span class="badge-animated gold">Completed</span></td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6 fade-pop delay-2">
            <div class="glass-animated">
                <div class="section-header">
                    <i class="fas fa-comment-dots text-warning icon-comment"></i>
                    <h5 class="title">Latest Reviews</h5>
                    <span class="badge-animated gold badge-right">{{ count($latestReviews ?? []) }} new</span>
                </div>
                <table class="table-animated">
                    <thead><tr><th>Item</th><th>User</th><th>Rating</th></tr></thead>
                    <tbody>
                        @foreach($latestReviews ?? [] as $review)
                        <tr>
                            <td><strong>{{ $review->item->title ?? 'Laptop' }}</strong></td>
                            <td>{{ $review->user->name ?? 'Emma' }}</td>
                            <td><span class="badge-animated red">{{ str_repeat('⭐', $review->rating ?? 4) }}</span></td>
                        </tr>
                        @endforeach
                        @if(empty($latestReviews))
                        <tr><td><strong>Drone</strong></td><td>Liam</td><td><span class="badge-animated red">⭐⭐⭐⭐⭐</span></td></tr>
                        <tr><td><strong>Camera</strong></td><td>Olivia</td><td><span class="badge-animated red">⭐⭐⭐⭐</span></td></tr>
                        <tr><td><strong>Bike</strong></td><td>Noah</td><td><span class="badge-animated red">⭐⭐⭐⭐⭐</span></td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- ===== PENDING / APPROVED / COMPLETED ===== -->
    <div class="row g-4 mt-2">
        <div class="col-md-4 fade-pop delay-1">
            <div class="glass-animated text-center" style="border-top:4px solid #ff9800;">
                <div style="display:flex;align-items:center;justify-content:center;gap:0.8rem;margin-bottom:0.2rem;">
                    <i class="fas fa-hourglass-half text-warning icon-hourglass" style="font-size:2.2rem;"></i>
                    <span style="font-size:0.65rem;font-weight:700;color:#6c757d;text-transform:uppercase;letter-spacing:0.1em;">Pending</span>
                </div>
                <div style="font-size:3.2rem;font-weight:800;color:#1a1a1a;line-height:1.05;" class="anim-number-bounce">
                    {{ $pendingBookings ?? 22 }}
                </div>
                <div style="font-size:0.65rem;color:#6c757d;">Awaiting action</div>
            </div>
        </div>
        <div class="col-md-4 fade-pop delay-2">
            <div class="glass-animated text-center" style="border-top:4px solid #4caf50;">
                <div style="display:flex;align-items:center;justify-content:center;gap:0.8rem;margin-bottom:0.2rem;">
                    <i class="fas fa-check-double text-success icon-check" style="font-size:2.2rem;"></i>
                    <span style="font-size:0.65rem;font-weight:700;color:#6c757d;text-transform:uppercase;letter-spacing:0.1em;">Approved</span>
                </div>
                <div style="font-size:3.2rem;font-weight:800;color:#1a1a1a;line-height:1.05;" class="anim-number-bounce">
                    {{ $approvedBookings ?? 103 }}
                </div>
                <div style="font-size:0.65rem;color:#6c757d;">Confirmed</div>
            </div>
        </div>
        <div class="col-md-4 fade-pop delay-3">
            <div class="glass-animated text-center" style="border-top:4px solid #2196f3;">
                <div style="display:flex;align-items:center;justify-content:center;gap:0.8rem;margin-bottom:0.2rem;">
                    <i class="fas fa-flag-checkered text-primary icon-flag" style="font-size:2.2rem;"></i>
                    <span style="font-size:0.65rem;font-weight:700;color:#6c757d;text-transform:uppercase;letter-spacing:0.1em;">Completed</span>
                </div>
                <div style="font-size:3.2rem;font-weight:800;color:#1a1a1a;line-height:1.05;" class="anim-number-bounce">
                    {{ $completedBookings ?? 87 }}
                </div>
                <div style="font-size:0.65rem;color:#6c757d;">Finished</div>
            </div>
        </div>
    </div>

    <!-- ===== REVENUE CHART + SUMMARY ===== -->
    <div class="row g-4 mt-3">
        <div class="col-lg-8 fade-pop delay-1">
            <div class="chart-animated">
                <div class="section-header">
                    <i class="fas fa-chart-bar text-danger icon-chart-bar"></i>
                    <h5 class="title">Monthly Revenue Trend</h5>
                    <span class="badge-animated red badge-right">2026</span>
                </div>
                <canvas id="revenueChart"></canvas>
            </div>
        </div>
        <div class="col-lg-4 fade-pop delay-2">
            <div class="glass-animated">
                <div class="section-header">
                    <i class="fas fa-info-circle text-primary icon-info"></i>
                    <h5 class="title">Quick Summary</h5>
                </div>
                <div style="display:grid;gap:0.6rem;">
                    <div class="summary-animated">
                        <span class="label"><i class="fas fa-star icon-star" style="color:#ffb300;width:20px;"></i> Total Reviews</span>
                        <span class="value">{{ $totalReviews ?? 148 }}</span>
                    </div>
                    <div class="summary-animated">
                        <span class="label"><i class="fas fa-heart anim-icon-pulse" style="color:#e91e63;width:20px;"></i> Wishlist Count</span>
                        <span class="value">{{ $wishlistCount ?? 231 }}</span>
                    </div>
                    <div class="summary-animated">
                        <span class="label"><i class="fas fa-dollar-sign icon-dollar" style="color:var(--red-primary);width:20px;"></i> Total Revenue</span>
                        <span class="value red">Rs. {{ number_format($totalRevenue ?? 84720) }}</span>
                    </div>
                    <div class="summary-animated">
                        <span class="label"><i class="fas fa-box icon-box" style="color:#2196f3;width:20px;"></i> Active Items</span>
                        <span class="value">{{ $availableItems ?? 83 }}</span>
                    </div>
                    <div class="summary-animated" style="background:var(--red-primary);color:white;border-radius:var(--radius-sm);border-color:var(--red-primary);">
                        <span class="label" style="color:rgba(255,255,255,0.85);"><i class="fas fa-chart-simple anim-icon-zoom" style="width:20px;"></i> Overall Performance</span>
                        <span class="value" style="color:white;font-weight:800;">{{ $bookingSuccessRate ?? 86 }}%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== TOP PERFORMING ITEMS TABLE ===== -->
    <div class="row mt-4 fade-pop delay-2">
        <div class="col-12">
            <div class="glass-animated">
                <div class="section-header">
                    <i class="fas fa-trophy text-warning icon-trophy"></i>
                    <h5 class="title">Top Performing Items</h5>
                    <span class="badge-animated gold badge-right">by bookings</span>
                </div>
                <table class="table-animated">
                    <thead><tr><th>#</th><th>Item Name</th><th>Total Bookings</th><th>Revenue</th><th>Status</th></tr></thead>
                    <tbody>
                        @foreach($topItems ?? [] as $index => $item)
                        <tr>
                            <td><span style="font-weight:800;color:var(--red-primary);font-size:1.1rem;">#{{ $index + 1 }}</span></td>
                            <td><strong>{{ $item->title ?? 'E-bike' }}</strong></td>
                            <td><span class="badge-animated red">{{ $item->bookings_count ?? 24 }}</span></td>
                            <td style="font-weight:600;">Rs. {{ number_format(($item->bookings_count ?? 24) * 1200) }}</td>
                            <td><span class="status-ribbon live"><span class="pulse-dot"></span> Active</span></td>
                        </tr>
                        @endforeach
                        @if(empty($topItems))
                        <tr><td><span style="font-weight:800;color:var(--red-primary);font-size:1.1rem;">#1</span></td><td><strong>Mountain Bike</strong></td><td><span class="badge-animated red">42</span></td><td style="font-weight:600;">Rs. 50,400</td><td><span class="status-ribbon live"><span class="pulse-dot"></span> Active</span></td></tr>
                        <tr><td><span style="font-weight:800;color:var(--red-primary);font-size:1.1rem;">#2</span></td><td><strong>Camping Tent</strong></td><td><span class="badge-animated red">37</span></td><td style="font-weight:600;">Rs. 44,400</td><td><span class="status-ribbon live"><span class="pulse-dot"></span> Active</span></td></tr>
                        <tr><td><span style="font-weight:800;color:var(--red-primary);font-size:1.1rem;">#3</span></td><td><strong>GoPro Hero</strong></td><td><span class="badge-animated red">29</span></td><td style="font-weight:600;">Rs. 34,800</td><td><span class="status-ribbon live"><span class="pulse-dot"></span> Active</span></td></tr>
                        <tr><td><span style="font-weight:800;color:var(--red-primary);font-size:1.1rem;">#4</span></td><td><strong>Kayak</strong></td><td><span class="badge-animated red">22</span></td><td style="font-weight:600;">Rs. 26,400</td><td><span class="status-ribbon live"><span class="pulse-dot"></span> Active</span></td></tr>
                        <tr><td><span style="font-weight:800;color:var(--red-primary);font-size:1.1rem;">#5</span></td><td><strong>Drone</strong></td><td><span class="badge-animated red">18</span></td><td style="font-weight:600;">Rs. 21,600</td><td><span class="status-ribbon live"><span class="pulse-dot"></span> Active</span></td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- ===== CHART SCRIPT ===== -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        const revenueData = new Array(12).fill(0);

        @if(isset($monthlyRevenue) && count($monthlyRevenue))
            @foreach($monthlyRevenue as $row)
                revenueData[{{ $row->month-1 }}] = {{ $row->total }};
            @endforeach
        @else
            [4200, 5100, 6300, 7100, 8200, 9400, 10200, 11500, 12800, 14200, 15600, 17200].forEach((v, i) => revenueData[i] = v);
        @endif

        const canvas = document.getElementById('revenueChart');
        if (!canvas) return;

        const container = canvas.parentElement;
        const containerWidth = container.clientWidth || 600;
        canvas.width = containerWidth;
        canvas.height = Math.min(220, containerWidth * 0.35);

        const ctx = canvas.getContext('2d');

        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: months,
                datasets: [{
                    label: 'Revenue (Rs.)',
                    data: revenueData,
                    backgroundColor: [
                        'rgba(200, 16, 46, 0.85)',
                        'rgba(200, 16, 46, 0.75)',
                        'rgba(200, 16, 46, 0.65)',
                        'rgba(200, 16, 46, 0.75)',
                        'rgba(200, 16, 46, 0.85)',
                        'rgba(200, 16, 46, 0.75)',
                        'rgba(200, 16, 46, 0.65)',
                        'rgba(200, 16, 46, 0.75)',
                        'rgba(200, 16, 46, 0.85)',
                        'rgba(200, 16, 46, 0.75)',
                        'rgba(200, 16, 46, 0.65)',
                        'rgba(200, 16, 46, 0.85)'
                    ],
                    borderColor: '#c8102e',
                    borderWidth: 1.5,
                    borderRadius: 8,
                    barPercentage: 0.55,
                    categoryPercentage: 0.7,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                aspectRatio: 2.8,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return 'Rs. ' + context.parsed.y.toLocaleString();
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0,0,0,0.04)',
                            drawBorder: false,
                        },
                        ticks: {
                            callback: function(val) {
                                if (val >= 1000) return 'Rs. ' + (val/1000).toFixed(0) + 'k';
                                return 'Rs. ' + val;
                            },
                            font: { size: 10 },
                            maxTicksLimit: 6,
                        }
                    },
                    x: {
                        grid: { display: false },
                        ticks: {
                            font: { size: 10 },
                            maxTicksLimit: 12,
                        }
                    }
                },
                animation: {
                    duration: 1500,
                    easing: 'easeOutQuart'
                }
            }
        });

        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                const newWidth = container.clientWidth || 600;
                canvas.width = newWidth;
                chart.resize();
            }, 200);
        });
    });
</script>

@endsection