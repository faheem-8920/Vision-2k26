@extends('admin.layout')

@section('content')

{{-- Font Awesome for icons --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

<style>
    /* ----- RESET & BASE (scoped to .item-detail-card) ----- */
    .item-detail-card {
        max-width: 1300px;
        width: 100%;
        background: #ffffff;
        border-radius: 3rem;
        padding: 2.8rem 3.2rem;
        box-shadow: 0 30px 60px -15px rgba(180, 20, 20, 0.2),
                    0 10px 30px -8px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(220, 40, 40, 0.1);
        transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        animation: fadeSlideUp 0.8s ease forwards;
        margin: 0 auto;
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #ffffff 0%, #fffafa 100%);
    }

    .item-detail-card::before {
        content: '';
        position: absolute;
        top: -60%;
        right: -30%;
        width: 60%;
        height: 80%;
        background: radial-gradient(circle, rgba(185, 28, 28, 0.03) 0%, transparent 70%);
        animation: floatBg 20s ease-in-out infinite;
        pointer-events: none;
        z-index: 0;
    }

    .item-detail-card::after {
        content: '';
        position: absolute;
        bottom: -40%;
        left: -20%;
        width: 50%;
        height: 60%;
        background: radial-gradient(circle, rgba(185, 28, 28, 0.02) 0%, transparent 70%);
        animation: floatBg 25s ease-in-out infinite reverse;
        pointer-events: none;
        z-index: 0;
    }

    @keyframes floatBg {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(20px, -30px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
    }

    .item-detail-card:hover {
        box-shadow: 0 50px 100px -20px rgba(200, 30, 30, 0.35);
        border-color: rgba(200, 30, 30, 0.2);
        transform: translateY(-8px) scale(1.002);
    }

    @keyframes fadeSlideUp {
        0% { opacity: 0; transform: translateY(50px) scale(0.97); }
        100% { opacity: 1; transform: translateY(0) scale(1); }
    }

    /* ----- ANIMATIONS ----- */
    .animate-slide-down {
        animation: slideDown 0.6s ease forwards;
    }
    .animate-fade-in {
        animation: fadeIn 0.8s ease forwards;
    }
    .animate-slide-up {
        opacity: 0;
        animation: slideUp 0.7s ease forwards;
    }

    @keyframes slideDown {
        0% { opacity: 0; transform: translateY(-30px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    @keyframes slideUp {
        0% { opacity: 0; transform: translateY(40px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeIn {
        0% { opacity: 0; }
        100% { opacity: 1; }
    }
    @keyframes pulseGlow {
        0%, 100% { box-shadow: 0 4px 20px rgba(185, 28, 28, 0.3); }
        50% { box-shadow: 0 4px 40px rgba(185, 28, 28, 0.6); }
    }

    /* ----- HERO HEADER (red accent) ----- */
    .hero-header {
        position: relative;
        z-index: 1;
        margin-bottom: 2.5rem;
        padding: 1.5rem 2rem;
        background: linear-gradient(135deg, #b91c1c 0%, #dc2626 100%);
        border-radius: 1.8rem;
        box-shadow: 0 12px 30px rgba(185, 28, 28, 0.3);
        transition: all 0.4s ease;
        overflow: hidden;
    }

    .hero-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 60%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255,255,255,0.05), transparent);
        transform: rotate(30deg);
        animation: shimmerMove 6s infinite;
    }

    @keyframes shimmerMove {
        0% { transform: translateX(-100%) rotate(30deg); }
        100% { transform: translateX(100%) rotate(30deg); }
    }

    .hero-header:hover {
        box-shadow: 0 20px 50px rgba(185, 28, 28, 0.4);
        transform: scale(1.01);
    }

    .hero-content {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        position: relative;
        z-index: 1;
    }

    .hero-icon {
        width: 64px;
        height: 64px;
        border-radius: 50%;
        background: rgba(255,255,255,0.15);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255,255,255,0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        color: #fff;
        animation: pulseGlow 2s infinite;
        flex-shrink: 0;
    }

    .hero-text {
        flex: 1;
    }

    .hero-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: #fff;
        margin: 0;
        letter-spacing: -0.5px;
    }

    .hero-subtitle {
        font-size: 0.9rem;
        color: rgba(255,255,255,0.8);
        margin: 0;
    }

    .hero-badge {
        background: rgba(255,255,255,0.15);
        padding: 0.5rem 1.2rem;
        border-radius: 40px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.1);
    }

    .item-id-badge {
        color: #fff;
        font-weight: 600;
        font-size: 1rem;
    }

    .hero-particles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 0;
    }

    .hero-particles span {
        position: absolute;
        width: 6px;
        height: 6px;
        background: rgba(255,255,255,0.15);
        border-radius: 50%;
        animation: particleFloat 8s infinite;
    }

    .hero-particles span:nth-child(1) { top: 20%; left: 10%; animation-delay: 0s; }
    .hero-particles span:nth-child(2) { top: 60%; left: 85%; animation-delay: 1s; }
    .hero-particles span:nth-child(3) { top: 80%; left: 20%; animation-delay: 2s; }
    .hero-particles span:nth-child(4) { top: 30%; left: 75%; animation-delay: 3s; }
    .hero-particles span:nth-child(5) { top: 10%; left: 50%; animation-delay: 4s; }

    @keyframes particleFloat {
        0%, 100% { transform: translateY(0) scale(1); opacity: 0.3; }
        50% { transform: translateY(-30px) scale(1.5); opacity: 0.8; }
    }

    /* ----- STATS ROW ----- */
    .stats-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));
        gap: 1.2rem;
        margin-bottom: 2.5rem;
        position: relative;
        z-index: 1;
    }

    .stat-item {
        background: #fefbfb;
        padding: 1.2rem 1.5rem;
        border-radius: 1.5rem;
        border: 1px solid #f7e6e6;
        display: flex;
        align-items: center;
        gap: 1rem;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        cursor: default;
        position: relative;
        overflow: hidden;
    }

    .stat-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(90deg, #b91c1c, #f87171);
        transform: scaleX(0);
        transition: transform 0.4s ease;
        transform-origin: left;
    }

    .stat-item:hover::before {
        transform: scaleX(1);
    }

    .stat-item:hover {
        transform: translateY(-4px) scale(1.02);
        box-shadow: 0 12px 30px rgba(180, 20, 20, 0.08);
        border-color: #f0d0d0;
        background: #fff7f7;
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: #b91c1c;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 1.1rem;
        flex-shrink: 0;
        transition: all 0.4s ease;
    }

    .stat-icon i {
        color: #ffffff !important;
    }

    .stat-item:hover .stat-icon {
        transform: rotate(360deg) scale(1.1);
    }

    .stat-info {
        flex: 1;
        min-width: 0;
    }

    .stat-label {
        display: block;
        font-size: 0.65rem;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: #a94442;
        font-weight: 600;
    }

    .stat-value {
        font-size: 1.3rem;
        font-weight: 700;
        color: #1f1a1a;
    }

    .stat-sub {
        font-size: 0.75rem;
        font-weight: 400;
        color: #7a5a5a;
    }

    /* ----- SECTION HEADER (shared) ----- */
    .section-header {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        margin-bottom: 1.5rem;
        padding-bottom: 0.8rem;
        border-bottom: 2px solid rgba(200, 30, 30, 0.15);
        position: relative;
    }

    .section-header::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 60px;
        height: 2px;
        background: #b91c1c;
        animation: expandLine 1.5s ease forwards;
    }

    @keyframes expandLine {
        0% { width: 0; }
        100% { width: 60px; }
    }

    .section-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #b91c1c;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 0.9rem;
        flex-shrink: 0;
        transition: all 0.4s ease;
    }

    .section-icon i {
        color: #ffffff !important;
    }

    .section-header:hover .section-icon {
        transform: rotate(180deg) scale(1.1);
    }

    .section-header h3 {
        font-size: 1.1rem;
        font-weight: 600;
        color: #1f1a1a;
        margin: 0;
        flex: 1;
    }

    /* status badges */
    .status-badge {
        padding: 0.3rem 1.2rem;
        border-radius: 40px;
        font-size: 0.7rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        background: #f0f0f0;
        color: #666;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        border-radius: 40px;
    }

    .status-badge.available {
        background: #dcfce7;
        color: #16a34a;
    }
    .status-badge.rented {
        background: #fef3c7;
        color: #d97706;
    }
    .status-badge.maintenance {
        background: #fee2e2;
        color: #dc2626;
    }
    .status-badge i {
        font-size: 0.4rem;
    }
    .status-badge:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    /* ----- DETAIL ITEMS (perfect circles) ----- */
    .detail-item {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        padding: 0.6rem 0.8rem;
        border-radius: 0.8rem;
        transition: all 0.3s ease;
        border-bottom: 1px solid #f5e8e8;
    }

    .detail-item:last-child {
        border-bottom: none;
    }

    .detail-item:hover {
        background: rgba(185, 28, 28, 0.04);
        transform: translateX(4px);
    }

    .detail-icon-circle {
        width: 40px;
        height: 40px;
        min-width: 40px;
        min-height: 40px;
        border-radius: 50% !important;
        background: #b91c1c;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: 0 2px 8px rgba(185, 28, 28, 0.25);
        border: 2px solid rgba(255, 255, 255, 0.1);
        flex-shrink: 0;
        overflow: hidden;
    }

    .detail-icon-circle i {
        color: #ffffff !important;
        font-size: 1rem !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        line-height: 1 !important;
        width: auto !important;
        height: auto !important;
    }

    .detail-item:hover .detail-icon-circle {
        transform: scale(1.15) rotate(360deg);
        box-shadow: 0 4px 20px rgba(185, 28, 28, 0.4);
        border-color: rgba(255, 255, 255, 0.3);
    }

    .detail-item > div {
        flex: 1;
        min-width: 0;
    }

    .detail-label {
        display: block;
        font-size: 0.6rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #a94442;
        font-weight: 600;
    }

    .detail-value {
        display: block;
        font-size: 0.9rem;
        color: #1f1a1a;
        word-break: break-word;
    }

    .detail-value.highlight {
        color: #b91c1c;
        font-weight: 600;
    }
    .detail-value.currency {
        color: #b91c1c;
        font-weight: 700;
    }

    /* grid helpers */
    .two-col-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0.5rem 2rem;
    }

    .three-col-grid {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 0.5rem 2rem;
    }

    .four-col-grid {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        gap: 0.5rem 1.5rem;
    }

    /* ----- ITEM INFO SECTION ----- */
    .item-info-section {
        background: #fefcfc;
        border-radius: 2rem;
        padding: 2rem;
        margin-bottom: 2.5rem;
        border: 1px solid #f7e6e6;
        position: relative;
        z-index: 1;
        transition: all 0.4s ease;
    }

    .item-info-section:hover {
        background: #fffafa;
        border-color: #f0d0d0;
        box-shadow: 0 8px 30px rgba(180, 20, 20, 0.05);
    }

    /* ----- IMAGES SECTION ----- */
    .images-section {
        background: #fefcfc;
        border-radius: 2rem;
        padding: 2rem;
        margin-bottom: 2.5rem;
        border: 1px solid #f7e6e6;
        position: relative;
        z-index: 1;
        transition: all 0.4s ease;
    }

    .images-section:hover {
        background: #fffafa;
        border-color: #f0d0d0;
        box-shadow: 0 8px 30px rgba(180, 20, 20, 0.05);
    }

    .image-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        gap: 1.2rem;
    }

    .image-grid img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 1.2rem;
        border: 2px solid #f5e8e8;
        transition: all 0.4s ease;
    }

    .image-grid img:hover {
        transform: scale(1.04);
        border-color: #b91c1c;
        box-shadow: 0 8px 25px rgba(185, 28, 28, 0.15);
    }

    /* ----- REVIEWS SECTION ----- */
    .reviews-section {
        background: #fefcfc;
        border-radius: 2rem;
        padding: 2rem;
        margin-bottom: 2.5rem;
        border: 1px solid #f7e6e6;
        position: relative;
        z-index: 1;
        transition: all 0.4s ease;
    }

    .reviews-section:hover {
        background: #fffafa;
        border-color: #f0d0d0;
        box-shadow: 0 8px 30px rgba(180, 20, 20, 0.05);
    }

    .review-card-item {
        background: #fefbfb;
        border-radius: 1.2rem;
        padding: 1.2rem 1.5rem;
        border: 1px solid #f5e8e8;
        margin-bottom: 0.8rem;
        transition: all 0.3s ease;
    }

    .review-card-item:hover {
        background: #fff7f7;
        border-color: #f0d0d0;
        transform: translateX(4px);
    }

    .review-card-item .review-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0.4rem;
    }

    .review-card-item .reviewer-name {
        font-weight: 600;
        color: #1f1a1a;
    }

    .review-card-item .review-stars {
        color: #fbbf24;
        letter-spacing: 2px;
    }

    .review-card-item .review-text {
        color: #4a3a3a;
        font-size: 0.95rem;
        margin: 0.3rem 0;
    }

    .review-card-item .review-date {
        font-size: 0.75rem;
        color: #a94442;
    }

    /* ----- BOOKINGS SECTION ----- */
    .bookings-section {
        background: #fefcfc;
        border-radius: 2rem;
        padding: 2rem;
        margin-bottom: 2.5rem;
        border: 1px solid #f7e6e6;
        position: relative;
        z-index: 1;
        transition: all 0.4s ease;
    }

    .bookings-section:hover {
        background: #fffafa;
        border-color: #f0d0d0;
        box-shadow: 0 8px 30px rgba(180, 20, 20, 0.05);
    }

    .booking-card {
        background: #fefbfb;
        border-radius: 1.2rem;
        padding: 1.2rem 1.5rem;
        border: 1px solid #f5e8e8;
        margin-bottom: 0.8rem;
        transition: all 0.3s ease;
    }

    .booking-card:hover {
        background: #fff7f7;
        border-color: #f0d0d0;
        transform: translateX(4px);
    }

    .booking-card .booking-grid {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1fr 1.2fr;
        gap: 0.5rem;
        align-items: center;
    }

    .booking-card .booking-label {
        font-size: 0.6rem;
        text-transform: uppercase;
        color: #a94442;
        font-weight: 600;
    }

    .booking-card .booking-value {
        font-size: 0.9rem;
        color: #1f1a1a;
    }

    .booking-card .booking-status {
        padding: 0.25rem 0.8rem;
        border-radius: 40px;
        font-size: 0.7rem;
        font-weight: 600;
        text-transform: uppercase;
        display: inline-block;
    }

    .booking-status.confirmed {
        background: #dcfce7;
        color: #16a34a;
    }
    .booking-status.pending {
        background: #fef3c7;
        color: #d97706;
    }
    .booking-status.cancelled {
        background: #fee2e2;
        color: #dc2626;
    }
    .booking-status.completed {
        background: #dbeafe;
        color: #2563eb;
    }

    /* ----- WISHLISTS SECTION ----- */
    .wishlists-section {
        background: #fefcfc;
        border-radius: 2rem;
        padding: 2rem;
        margin-bottom: 2.5rem;
        border: 1px solid #f7e6e6;
        position: relative;
        z-index: 1;
        transition: all 0.4s ease;
    }

    .wishlists-section:hover {
        background: #fffafa;
        border-color: #f0d0d0;
        box-shadow: 0 8px 30px rgba(180, 20, 20, 0.05);
    }

    .wishlist-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.8rem 1rem;
        border-bottom: 1px solid #f5e8e8;
        transition: all 0.3s ease;
        border-radius: 0.6rem;
    }

    .wishlist-item:hover {
        background: rgba(185, 28, 28, 0.04);
    }

    .wishlist-item .wishlist-name {
        font-weight: 500;
        color: #1f1a1a;
        display: flex;
        align-items: center;
        gap: 0.6rem;
    }

    .wishlist-item .wishlist-name i {
        color: #b91c1c;
        width: 1.2rem;
    }

    .wishlist-item .wishlist-email {
        color: #7a5a5a;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 0.6rem;
    }

    .wishlist-item .wishlist-email i {
        color: #b91c1c;
        width: 1.2rem;
    }

    /* ----- BACK BUTTON ----- */
    .back-section {
        margin-top: 1.5rem;
        text-align: right;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
        padding: 0.7rem 2rem;
        background: #f5f0f0;
        color: #4a3a3a;
        border: 1px solid #e5d8d8;
        border-radius: 40px;
        font-weight: 600;
        font-size: 0.9rem;
        text-decoration: none;
        transition: all 0.3s ease;
        border-radius: 40px;
    }

    .btn-back:hover {
        background: #b91c1c;
        color: #fff;
        border-color: #b91c1c;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(185, 28, 28, 0.25);
    }

    .btn-back i {
        transition: transform 0.3s ease;
    }

    .btn-back:hover i {
        transform: translateX(-4px);
    }

    /* ----- FOOTER ----- */
    .footer-note {
        margin-top: 2rem;
        padding: 1rem 1.5rem;
        font-size: 0.8rem;
        color: #b08282;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 2px solid #f5e8e8;
        padding-top: 1.5rem;
        position: relative;
        z-index: 1;
        transition: all 0.3s ease;
    }

    .footer-note:hover {
        color: #b91c1c;
    }

    .footer-badge {
        background: #dcfce7;
        color: #16a34a;
        padding: 0.3rem 1.2rem;
        border-radius: 40px;
        font-size: 0.7rem;
        font-weight: 600;
        transition: all 0.3s ease;
        border-radius: 40px;
    }

    .footer-badge:hover {
        transform: scale(1.05);
    }

    /* ----- RESPONSIVE ----- */
    @media (max-width: 1024px) {
        .item-detail-card { padding: 2rem; }
        .four-col-grid { grid-template-columns: 1fr 1fr; }
        .three-col-grid { grid-template-columns: 1fr 1fr; }
        .booking-card .booking-grid { grid-template-columns: 1fr 1fr; gap: 0.3rem 1rem; }
    }

    @media (max-width: 768px) {
        .item-detail-card { padding: 1.5rem; border-radius: 2rem; }
        .hero-header { padding: 1.2rem; }
        .hero-content { flex-wrap: wrap; justify-content: center; text-align: center; }
        .hero-title { font-size: 1.4rem; }
        .hero-icon { width: 54px; height: 54px; font-size: 1.5rem; }
        .stats-row { grid-template-columns: 1fr 1fr; }
        .two-col-grid { grid-template-columns: 1fr; }
        .three-col-grid { grid-template-columns: 1fr; }
        .four-col-grid { grid-template-columns: 1fr; }
        .booking-card .booking-grid { grid-template-columns: 1fr; gap: 0.3rem; }
        .image-grid { grid-template-columns: repeat(auto-fill, minmax(140px, 1fr)); }
        .review-card-item .review-header { flex-direction: column; align-items: flex-start; gap: 0.3rem; }
        .stats-row { gap: 0.8rem; }
        .stat-item { padding: 0.8rem 1rem; }
        .stat-value { font-size: 1.1rem; }
        .stat-icon { width: 40px; height: 40px; font-size: 0.9rem; }
    }

    @media (max-width: 480px) {
        .item-detail-card { padding: 1rem; border-radius: 1.5rem; }
        .hero-content { flex-direction: column; }
        .hero-icon { width: 50px; height: 50px; font-size: 1.4rem; }
        .stats-row { grid-template-columns: 1fr; }
        .section-header { flex-wrap: wrap; }
        .section-header h3 { font-size: 0.95rem; }
        .section-icon { width: 34px; height: 34px; font-size: 0.8rem; }
        .image-grid { grid-template-columns: 1fr 1fr; }
        .image-grid img { height: 130px; }
        .footer-note { flex-direction: column; gap: 0.8rem; text-align: center; }
        .back-section { text-align: center; }
        .detail-icon-circle { width: 34px; height: 34px; min-width: 34px; min-height: 34px; }
        .detail-icon-circle i { font-size: 0.8rem !important; }
    }
</style>

<div class="item-detail-card">

    <!-- ====== HERO HEADER ====== -->
    <div class="hero-header animate-slide-down">
        <div class="hero-content">
            <div class="hero-icon">
                <i class="fas fa-box"></i>
            </div>
            <div class="hero-text">
                <h1 class="hero-title">{{ $item->title ?? 'Item Title' }}</h1>
                <p class="hero-subtitle">Category: {{ $item->category->name ?? 'N/A' }} · Listed {{ $item->created_at ?? 'N/A' }}</p>
            </div>
            <div class="hero-badge">
                <span class="item-id-badge">#{{ $item->id ?? 'N/A' }}</span>
            </div>
        </div>
        <div class="hero-particles">
            <span></span><span></span><span></span><span></span><span></span>
        </div>
    </div>

    <!-- ====== STATS ROW ====== -->
    <div class="stats-row animate-fade-in">
        <div class="stat-item">
            <div class="stat-icon"><i class="fas fa-star"></i></div>
            <div class="stat-info">
                <span class="stat-label">Average Rating</span>
                <span class="stat-value">{{ number_format($averageRating ?? 0, 1) }} <span class="stat-sub">/ 5</span></span>
            </div>
        </div>
        <div class="stat-item">
            <div class="stat-icon"><i class="fas fa-comment"></i></div>
            <div class="stat-info">
                <span class="stat-label">Total Reviews</span>
                <span class="stat-value">{{ $totalReviews ?? 0 }}</span>
            </div>
        </div>
        <div class="stat-item">
            <div class="stat-icon"><i class="fas fa-calendar-check"></i></div>
            <div class="stat-info">
                <span class="stat-label">Total Bookings</span>
                <span class="stat-value">{{ $totalBookings ?? 0 }}</span>
            </div>
        </div>
        <div class="stat-item">
            <div class="stat-icon"><i class="fas fa-heart"></i></div>
            <div class="stat-info">
                <span class="stat-label">Wishlist Count</span>
                <span class="stat-value">{{ $wishlistCount ?? 0 }}</span>
            </div>
        </div>
        <div class="stat-item">
            <div class="stat-icon"><i class="fas fa-dollar-sign"></i></div>
            <div class="stat-info">
                <span class="stat-label">Total Revenue</span>
                <span class="stat-value">Rs {{ number_format($totalRevenue ?? 0) }}</span>
            </div>
        </div>
    </div>

    <!-- ====== ITEM INFO SECTION ====== -->
    <div class="item-info-section animate-slide-up">
        <div class="section-header">
            <div class="section-icon"><i class="fas fa-info-circle"></i></div>
            <h3>Item Information</h3>
            <span class="status-badge {{ $item->status ?? 'available' }}">
                <i class="fas fa-circle"></i> {{ $item->status ?? 'Available' }}
            </span>
        </div>

        <div class="two-col-grid">
            <div class="detail-item">
                <div class="detail-icon-circle"><i class="fas fa-align-left"></i></div>
                <div>
                    <span class="detail-label">Description</span>
                    <span class="detail-value">{{ $item->description ?? 'N/A' }}</span>
                </div>
            </div>
            <div class="detail-item">
                <div class="detail-icon-circle"><i class="fas fa-tag"></i></div>
                <div>
                    <span class="detail-label">Category</span>
                    <span class="detail-value">{{ $item->category->name ?? 'N/A' }}</span>
                </div>
            </div>
            <div class="detail-item">
                <div class="detail-icon-circle"><i class="fas fa-dollar-sign"></i></div>
                <div>
                    <span class="detail-label">Rent Price / Day</span>
                    <span class="detail-value currency">Rs {{ $item->rent_price_per_day ?? 'N/A' }}</span>
                </div>
            </div>
            <div class="detail-item">
                <div class="detail-icon-circle"><i class="fas fa-shield-alt"></i></div>
                <div>
                    <span class="detail-label">Security Deposit</span>
                    <span class="detail-value currency">Rs {{ $item->security_deposit ?? 'N/A' }}</span>
                </div>
            </div>
            <div class="detail-item">
                <div class="detail-icon-circle"><i class="fas fa-tools"></i></div>
                <div>
                    <span class="detail-label">Replacement Cost</span>
                    <span class="detail-value currency">Rs {{ $item->replacement_cost ?? 'N/A' }}</span>
                </div>
            </div>
            <div class="detail-item">
                <div class="detail-icon-circle"><i class="fas fa-cubes"></i></div>
                <div>
                    <span class="detail-label">Quantity</span>
                    <span class="detail-value">{{ $item->quantity ?? 'N/A' }}</span>
                </div>
            </div>
            <div class="detail-item">
                <div class="detail-icon-circle"><i class="fas fa-map-marker-alt"></i></div>
                <div>
                    <span class="detail-label">Location</span>
                    <span class="detail-value">{{ $item->city ?? 'N/A' }}{{ $item->city && $item->address ? ', ' : '' }}{{ $item->address ?? '' }}</span>
                </div>
            </div>
            <div class="detail-item">
                <div class="detail-icon-circle"><i class="fas fa-calendar-plus"></i></div>
                <div>
                    <span class="detail-label">Listed On</span>
                    <span class="detail-value">{{ $item->created_at ?? 'N/A' }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- ====== OWNER SECTION ====== -->
    <div class="item-info-section animate-slide-up" style="animation-delay: 0.05s;">
        <div class="section-header">
            <div class="section-icon"><i class="fas fa-user-tie"></i></div>
            <h3>Owner Information</h3>
        </div>

        <div class="four-col-grid">
            <div class="detail-item">
                <div class="detail-icon-circle"><i class="fas fa-user"></i></div>
                <div>
                    <span class="detail-label">Name</span>
                    <span class="detail-value">{{ $item->user->name ?? 'N/A' }}</span>
                </div>
            </div>
            <div class="detail-item">
                <div class="detail-icon-circle"><i class="fas fa-envelope"></i></div>
                <div>
                    <span class="detail-label">Email</span>
                    <span class="detail-value">{{ $item->user->email ?? 'N/A' }}</span>
                </div>
            </div>
            <div class="detail-item">
                <div class="detail-icon-circle"><i class="fas fa-phone-alt"></i></div>
                <div>
                    <span class="detail-label">Phone</span>
                    <span class="detail-value">{{ $item->user->phone ?? 'N/A' }}</span>
                </div>
            </div>
            <div class="detail-item">
                <div class="detail-icon-circle"><i class="fas fa-id-card"></i></div>
                <div>
                    <span class="detail-label">CNIC</span>
                    <span class="detail-value">{{ $item->user->cnic ?? 'N/A' }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- ====== BOOKING STATS ====== -->
    <div class="item-info-section animate-slide-up" style="animation-delay: 0.1s;">
        <div class="section-header">
            <div class="section-icon"><i class="fas fa-chart-bar"></i></div>
            <h3>Booking Statistics</h3>
        </div>

        <div class="four-col-grid">
            <div class="detail-item">
                <div class="detail-icon-circle"><i class="fas fa-clock"></i></div>
                <div>
                    <span class="detail-label">Pending</span>
                    <span class="detail-value highlight">{{ $pendingBookings ?? 0 }}</span>
                </div>
            </div>
            <div class="detail-item">
                <div class="detail-icon-circle"><i class="fas fa-check-circle"></i></div>
                <div>
                    <span class="detail-label">Approved</span>
                    <span class="detail-value highlight">{{ $approvedBookings ?? 0 }}</span>
                </div>
            </div>
            <div class="detail-item">
                <div class="detail-icon-circle"><i class="fas fa-check-double"></i></div>
                <div>
                    <span class="detail-label">Completed</span>
                    <span class="detail-value highlight">{{ $completedBookings ?? 0 }}</span>
                </div>
            </div>
            <div class="detail-item">
                <div class="detail-icon-circle"><i class="fas fa-calendar-check"></i></div>
                <div>
                    <span class="detail-label">Total Bookings</span>
                    <span class="detail-value highlight">{{ $totalBookings ?? 0 }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- ====== IMAGES SECTION ====== -->
    <div class="images-section animate-slide-up" style="animation-delay: 0.15s;">
        <div class="section-header">
            <div class="section-icon"><i class="fas fa-images"></i></div>
            <h3>Item Images</h3>
            <span class="status-badge" style="background:#f0f0f0;color:#666;">{{ count($item->images ?? []) }} images</span>
        </div>

        <div class="image-grid">
            @foreach($item->images as $image)
                <img src="{{ asset('uploads/items/'.$image->image) }}" alt="Item Image">
            @endforeach
            @if(empty($item->images) || count($item->images) === 0)
                <div style="grid-column:1/-1; text-align:center; padding:2rem; color:#a94442; background:#fefbfb; border-radius:1.2rem; border:1px dashed #f0d0d0;">
                    <i class="fas fa-image fa-2x" style="opacity:0.4; margin-bottom:0.5rem; display:block;"></i>
                    No images available
                </div>
            @endif
        </div>
    </div>

    <!-- ====== REVIEWS SECTION ====== -->
    <div class="reviews-section animate-slide-up" style="animation-delay: 0.2s;">
        <div class="section-header">
            <div class="section-icon"><i class="fas fa-star"></i></div>
            <h3>Reviews</h3>
            <span class="status-badge" style="background:#f0f0f0;color:#666;">{{ count($item->reviews ?? []) }} reviews</span>
        </div>

        @foreach($item->reviews as $review)
            <div class="review-card-item">
                <div class="review-header">
                    <span class="reviewer-name">{{ $review->user->name ?? 'Anonymous' }}</span>
                    <span class="review-stars">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $review->rating)
                                <i class="fas fa-star"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                    </span>
                </div>
                <div class="review-text">“{{ $review->review ?? 'No review text' }}”</div>
                <div class="review-date"><i class="far fa-calendar-alt"></i> {{ $review->created_at ?? 'N/A' }}</div>
            </div>
        @endforeach
        @if(empty($item->reviews) || count($item->reviews) === 0)
            <div style="text-align:center; padding:1.5rem; color:#a94442; background:#fefbfb; border-radius:1.2rem; border:1px dashed #f0d0d0;">
                <i class="far fa-comment" style="opacity:0.4; margin-right:0.5rem;"></i> No reviews yet
            </div>
        @endif
    </div>

    <!-- ====== BOOKINGS SECTION ====== -->
    <div class="bookings-section animate-slide-up" style="animation-delay: 0.25s;">
        <div class="section-header">
            <div class="section-icon"><i class="fas fa-calendar-check"></i></div>
            <h3>Bookings</h3>
            <span class="status-badge" style="background:#f0f0f0;color:#666;">{{ count($item->bookings ?? []) }} bookings</span>
        </div>

        @foreach($item->bookings as $booking)
            <div class="booking-card">
                <div class="booking-grid">
                    <div>
                        <span class="booking-label">Renter</span>
                        <span class="booking-value">{{ $booking->renter->name ?? 'N/A' }}</span>
                    </div>
                    <div>
                        <span class="booking-label">Start Date</span>
                        <span class="booking-value">{{ $booking->start_date ?? 'N/A' }}</span>
                    </div>
                    <div>
                        <span class="booking-label">End Date</span>
                        <span class="booking-value">{{ $booking->end_date ?? 'N/A' }}</span>
                    </div>
                    <div>
                        <span class="booking-label">Total Amount</span>
                        <span class="booking-value" style="color:#b91c1c;font-weight:600;">Rs {{ $booking->total_amount ?? 'N/A' }}</span>
                    </div>
                    <div>
                        <span class="booking-label">Status</span>
                        <span class="booking-status {{ strtolower($booking->status ?? 'pending') }}">
                            {{ $booking->status ?? 'Pending' }}
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
        @if(empty($item->bookings) || count($item->bookings) === 0)
            <div style="text-align:center; padding:1.5rem; color:#a94442; background:#fefbfb; border-radius:1.2rem; border:1px dashed #f0d0d0;">
                <i class="far fa-calendar" style="opacity:0.4; margin-right:0.5rem;"></i> No bookings yet
            </div>
        @endif
    </div>

    <!-- ====== WISHLISTS SECTION ====== -->
    <div class="wishlists-section animate-slide-up" style="animation-delay: 0.3s;">
        <div class="section-header">
            <div class="section-icon"><i class="fas fa-heart"></i></div>
            <h3>Wishlists</h3>
            <span class="status-badge" style="background:#f0f0f0;color:#666;">{{ count($item->wishlists ?? []) }} users</span>
        </div>

        @foreach($item->wishlists as $wishlist)
            <div class="wishlist-item">
                <span class="wishlist-name"><i class="fas fa-user"></i> {{ $wishlist->user->name ?? 'N/A' }}</span>
                <span class="wishlist-email"><i class="fas fa-envelope"></i> {{ $wishlist->user->email ?? 'N/A' }}</span>
            </div>
        @endforeach
        @if(empty($item->wishlists) || count($item->wishlists) === 0)
            <div style="text-align:center; padding:1.5rem; color:#a94442; background:#fefbfb; border-radius:1.2rem; border:1px dashed #f0d0d0;">
                <i class="far fa-heart" style="opacity:0.4; margin-right:0.5rem;"></i> No wishlists yet
            </div>
        @endif
    </div>

    <!-- ====== BACK BUTTON ====== -->
    <div class="back-section">
        <a href="/admin/items" class="btn-back">
            <i class="fas fa-arrow-left"></i> Back to Items
        </a>
    </div>

    <!-- ====== FOOTER ====== -->
    <div class="footer-note animate-fade-in" style="animation-delay: 0.4s;">
        <span><i class="fas fa-box"></i> Item Details · Admin Panel</span>
        <span class="footer-badge"><i class="fas fa-check-circle"></i> Verified</span>
    </div>

</div>

@endsection