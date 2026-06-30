@extends('admin.layout')

@section('content')
<style>
    /* ===== GLOBAL RESET & ANIMATIONS ===== */
    .booking-detail-wrapper * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }
    .booking-detail-wrapper {
        font-family: 'Inter', -apple-system, system-ui, sans-serif;
        animation: fadeSlide 0.7s cubic-bezier(0.16, 1, 0.3, 1);
        max-width: 1440px;
        margin: 0 auto;
        padding: 0 6px;
    }
    @keyframes fadeSlide {
        0% { opacity: 0; transform: translateY(40px) scale(0.98); }
        100% { opacity: 1; transform: translateY(0) scale(1); }
    }

    /* ===== HERO STRIP ===== */
    .hero-strip {
        background: #ffffff;
        border-radius: 60px;
        padding: 1rem 2.2rem;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2.5rem;
        box-shadow: 0 8px 32px rgba(160, 20, 20, 0.08);
        border: 1px solid rgba(190, 30, 30, 0.06);
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        position: relative;
        overflow: hidden;
    }
    .hero-strip::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(90deg, #8a0000, #e53935, #ff6b6b, #e53935, #8a0000);
        background-size: 300% 100%;
        animation: gradientMove 4s ease infinite;
    }
    @keyframes gradientMove {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    .hero-strip:hover {
        box-shadow: 0 12px 40px rgba(160, 20, 20, 0.14);
        transform: translateY(-3px);
    }
    .hero-left {
        display: flex;
        align-items: center;
        gap: 1.8rem;
        flex-wrap: wrap;
    }
    .hero-badge {
        background: linear-gradient(135deg, #8a0000, #c0392b);
        color: #fff;
        font-weight: 700;
        padding: 0.5rem 2rem;
        border-radius: 60px;
        font-size: 1rem;
        letter-spacing: 0.5px;
        display: inline-flex;
        align-items: center;
        gap: 12px;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        box-shadow: 0 4px 16px rgba(192, 57, 43, 0.25);
        position: relative;
        overflow: hidden;
    }
    .hero-badge::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 60%);
        opacity: 0;
        transition: opacity 0.4s ease;
    }
    .hero-badge:hover {
        background: linear-gradient(135deg, #a00000, #e74c3c);
        transform: scale(1.05) translateY(-2px);
        box-shadow: 0 8px 28px rgba(192, 57, 43, 0.4);
    }
    .hero-badge:hover::after {
        opacity: 1;
    }
    .hero-date {
        color: #555;
        font-weight: 500;
        font-size: 0.98rem;
        background: #faf6f6;
        padding: 0.4rem 1.4rem;
        border-radius: 60px;
        border: 1px solid #f0e6e6;
        transition: all 0.3s ease;
    }
    .hero-date:hover {
        background: #f5ecec;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.04);
    }
    .hero-date i {
        color: #a00;
        margin-right: 8px;
    }
    .hero-right {
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    .status-badge {
        padding: 0.5rem 2rem;
        border-radius: 60px;
        font-weight: 700;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 12px;
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        position: relative;
    }
    .status-badge:hover {
        transform: scale(1.06) translateY(-3px);
        box-shadow: 0 8px 24px rgba(0,0,0,0.12);
    }
    .status-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        display: inline-block;
        animation: pulse-dot 2s ease-in-out infinite;
        border: 2px solid rgba(255,255,255,0.3);
    }
    @keyframes pulse-dot {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.4; transform: scale(0.7); }
    }
    .status-active { background: #e8f5e8; color: #1a7a1a; }
    .status-active .status-dot { background: #2ecc71; }
    .status-pending { background: #fff4e5; color: #b85e00; }
    .status-pending .status-dot { background: #f39c12; }
    .status-completed { background: #e6f0ff; color: #004c9e; }
    .status-completed .status-dot { background: #3498db; }
    .status-cancelled { background: #fde8e8; color: #b00000; }
    .status-cancelled .status-dot { background: #e74c3c; }

    /* ===== GRID ===== */
    .detail-grid {
        display: grid;
        grid-template-columns: 1fr 1.4fr;
        gap: 2.2rem;
    }
    @media (max-width: 1024px) {
        .detail-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }
    }

    /* ===== CARDS ===== */
    .detail-card {
        background: #ffffff;
        border-radius: 32px;
        box-shadow: 0 8px 32px rgba(160, 20, 20, 0.04);
        border: 1px solid rgba(190, 30, 30, 0.05);
        margin-bottom: 2rem;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        position: relative;
    }
    .detail-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, #8a0000, #e53935, #ff6b6b);
        opacity: 0;
        transition: opacity 0.5s ease;
    }
    .detail-card:hover {
        box-shadow: 0 20px 56px rgba(160, 20, 20, 0.10);
        transform: translateY(-6px);
        border-color: rgba(190, 30, 30, 0.12);
    }
    .detail-card:hover::before {
        opacity: 1;
        animation: gradientMove 3s ease infinite;
    }
    .card-head {
        background: linear-gradient(135deg, #fcf6f6, #faf0f0);
        padding: 1.2rem 2rem;
        font-weight: 700;
        font-size: 1.05rem;
        color: #8a0000;
        border-bottom: 2px solid rgba(190, 30, 30, 0.05);
        display: flex;
        align-items: center;
        gap: 14px;
        letter-spacing: -0.2px;
    }
    .card-head i {
        color: #c0392b;
        font-size: 1.25rem;
        background: rgba(192, 57, 43, 0.08);
        padding: 8px;
        border-radius: 12px;
        transition: all 0.3s ease;
    }
    .detail-card:hover .card-head i {
        background: rgba(192, 57, 43, 0.15);
        transform: scale(1.1) rotate(-5deg);
    }
    .card-body {
        padding: 1.8rem 2rem;
    }

    /* ===== ITEM IMAGE GALLERY ===== */
    .item-image-gallery {
        margin-bottom: 1.8rem;
        border-radius: 20px;
        overflow: hidden;
        background: #faf6f6;
        border: 1px solid rgba(190, 30, 30, 0.06);
        position: relative;
    }
    .gallery-main {
        width: 100%;
        height: 360px;
        overflow: hidden;
        background: #f5f0f0;
        position: relative;
    }
    .gallery-main img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        opacity: 0;
        animation: fadeInImage 0.7s ease forwards;
    }
    .gallery-main img:hover {
        transform: scale(1.08);
    }
    @keyframes fadeInImage {
        0% { opacity: 0; transform: scale(0.96); }
        100% { opacity: 1; transform: scale(1); }
    }
    .image-counter {
        position: absolute;
        bottom: 18px;
        right: 18px;
        background: rgba(0,0,0,0.65);
        color: #fff;
        padding: 8px 18px;
        border-radius: 30px;
        font-size: 0.85rem;
        font-weight: 600;
        backdrop-filter: blur(12px);
        display: flex;
        align-items: center;
        gap: 8px;
        z-index: 2;
        border: 1px solid rgba(255,255,255,0.12);
        transition: all 0.3s ease;
    }
    .image-counter:hover {
        background: rgba(0,0,0,0.8);
        transform: scale(1.05);
    }
    .image-counter i {
        color: #fff;
        font-size: 0.9rem;
    }
    .image-loader {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f5f0f0;
        z-index: 1;
        transition: opacity 0.6s ease;
    }
    .gallery-main img.loaded + .image-loader {
        opacity: 0;
        pointer-events: none;
    }
    .loader-spinner {
        width: 48px;
        height: 48px;
        border: 4px solid #f0e6e6;
        border-top: 4px solid #c0392b;
        border-radius: 50%;
        animation: spin 0.9s linear infinite;
        box-shadow: 0 4px 16px rgba(192, 57, 43, 0.1);
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    .gallery-thumbnails {
        display: flex;
        gap: 12px;
        padding: 16px;
        background: #fcf8f8;
        flex-wrap: wrap;
        border-top: 1px solid rgba(190, 30, 30, 0.06);
    }
    .thumbnail-item {
        width: 80px;
        height: 80px;
        border-radius: 16px;
        overflow: hidden;
        cursor: pointer;
        border: 3px solid transparent;
        transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        flex-shrink: 0;
        position: relative;
        background: #f0ecec;
    }
    .thumbnail-item:hover {
        transform: scale(1.08) translateY(-3px);
        border-color: #c0392b;
        box-shadow: 0 6px 20px rgba(160, 20, 20, 0.2);
    }
    .thumbnail-item.active {
        border-color: #c0392b;
        box-shadow: 0 0 0 4px rgba(192, 57, 43, 0.15);
    }
    .thumbnail-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: opacity 0.3s ease;
    }
    .thumbnail-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(160, 20, 20, 0.25);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.35s ease;
        color: #fff;
        font-size: 1.4rem;
        backdrop-filter: blur(2px);
    }
    .thumbnail-item:hover .thumbnail-overlay {
        opacity: 1;
    }
    .thumbnail-loader {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f0ecec;
    }
    .thumbnail-item img.loaded + .thumbnail-loader {
        display: none;
    }
    .thumbnail-loader::after {
        content: '';
        width: 22px;
        height: 22px;
        border: 2.5px solid #e0d6d6;
        border-top: 2.5px solid #c0392b;
        border-radius: 50%;
        animation: spin 0.8s linear infinite;
    }
    .no-image-placeholder {
        padding: 4rem 2rem;
        text-align: center;
        color: #999;
        background: #faf6f6;
    }
    .no-image-placeholder i {
        font-size: 4rem;
        color: #a00;
        opacity: 0.2;
        margin-bottom: 0.5rem;
        transition: all 0.3s ease;
    }
    .no-image-placeholder:hover i {
        opacity: 0.4;
        transform: scale(1.1);
    }
    .no-image-placeholder p {
        font-weight: 500;
        font-size: 0.98rem;
    }

    /* ===== ITEM HEADER ===== */
    .item-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: wrap;
        gap: 0.8rem;
        margin-bottom: 0.5rem;
    }
    .item-title {
        font-size: 1.8rem;
        font-weight: 800;
        color: #1a1414;
        letter-spacing: -0.5px;
        line-height: 1.2;
        flex: 1;
        transition: color 0.3s ease;
    }
    .item-title:hover {
        color: #8a0000;
    }
    .item-rating {
        font-size: 0.9rem;
        color: #666;
        white-space: nowrap;
        padding: 6px 16px;
        background: #faf6f6;
        border-radius: 30px;
        border: 1px solid #f0e6e6;
        display: flex;
        align-items: center;
        gap: 6px;
        transition: all 0.3s ease;
    }
    .item-rating:hover {
        background: #f5ecec;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.04);
    }
    .item-rating span {
        margin-left: 4px;
        font-weight: 500;
    }
    .item-id-badge {
        background: linear-gradient(135deg, #8a0000, #c0392b);
        color: #fff;
        padding: 4px 16px;
        border-radius: 30px;
        font-size: 0.75rem;
        font-weight: 600;
        margin-left: auto;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }
    .item-id-badge:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(192, 57, 43, 0.3);
    }
    .item-desc {
        color: #444;
        font-size: 1rem;
        line-height: 1.8;
        margin: 0.6rem 0 1.2rem 0;
        background: #faf8f8;
        padding: 1rem 1.2rem;
        border-radius: 14px;
        border-left: 4px solid #c0392b;
        transition: all 0.3s ease;
    }
    .item-desc:hover {
        background: #f5ecec;
        padding-left: 1.8rem;
    }
    .item-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 0.8rem 1.4rem;
        background: #faf6f6;
        padding: 0.8rem 1.4rem;
        border-radius: 60px;
        margin-bottom: 1.4rem;
        font-size: 0.9rem;
        color: #333;
        transition: all 0.3s ease;
    }
    .item-tags:hover {
        background: #f5ecec;
        transform: translateY(-2px);
    }
    .item-tags i {
        color: #c0392b;
        width: 20px;
    }
    .item-pricing-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
        background: #fefbfb;
        padding: 1rem 1.2rem;
        border-radius: 20px;
        border: 1px solid #f0e6e6;
        transition: all 0.3s ease;
    }
    .item-pricing-grid:hover {
        border-color: #e8d4d4;
        box-shadow: 0 4px 16px rgba(0,0,0,0.02);
    }
    @media (max-width: 500px) {
        .item-pricing-grid {
            grid-template-columns: 1fr 1fr;
        }
    }
    .price-item {
        display: flex;
        flex-direction: column;
        padding: 0.3rem 0;
        transition: all 0.3s ease;
    }
    .price-item:hover {
        transform: translateY(-2px);
    }
    .price-label {
        font-size: 0.75rem;
        text-transform: uppercase;
        color: #888;
        font-weight: 600;
        letter-spacing: 0.4px;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .price-label i {
        font-size: 0.75rem;
        color: #c0392b;
    }
    .price-value {
        font-weight: 700;
        color: #8a0000;
        font-size: 1.1rem;
        margin-top: 3px;
        transition: all 0.3s ease;
    }
    .price-item:hover .price-value {
        color: #c0392b;
        transform: scale(1.02);
    }

    /* ===== CONTACT CARDS ===== */
    .contact-badge {
        background: linear-gradient(135deg, #1e7e34, #2e9b4a);
        color: #fff;
        padding: 4px 16px;
        border-radius: 30px;
        font-size: 0.7rem;
        font-weight: 600;
        margin-left: auto;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        transition: all 0.3s ease;
    }
    .contact-badge:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(30, 126, 52, 0.3);
    }
    .contact-body {
        display: flex;
        align-items: center;
        gap: 1.6rem;
        padding: 1.4rem 2rem;
        transition: all 0.3s ease;
    }
    .contact-body:hover {
        background: #fcf6f6;
    }
    .contact-avatar {
        width: 64px;
        height: 64px;
        border-radius: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 1.8rem;
        color: #fff;
        flex-shrink: 0;
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        box-shadow: 0 4px 16px rgba(160, 20, 20, 0.2);
    }
    .contact-avatar:hover {
        transform: scale(1.1) rotate(-6deg);
        box-shadow: 0 8px 28px rgba(160, 20, 20, 0.3);
    }
    .contact-info {
        line-height: 1.8;
    }
    .contact-name {
        font-weight: 700;
        font-size: 1.2rem;
        color: #1a1414;
        transition: color 0.3s ease;
    }
    .contact-name:hover {
        color: #8a0000;
    }
    .contact-detail {
        font-size: 0.95rem;
        color: #444;
        transition: all 0.3s ease;
    }
    .contact-detail:hover {
        color: #1a1414;
        transform: translateX(4px);
    }
    .contact-detail i {
        color: #c0392b;
        width: 24px;
        font-size: 0.9rem;
    }

    /* ===== BOOKING SUMMARY ===== */
    .summary-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0.8rem 1.4rem;
    }
    @media (max-width: 480px) {
        .summary-grid {
            grid-template-columns: 1fr;
        }
    }
    .summary-item {
        display: flex;
        flex-direction: column;
        padding: 0.5rem 0;
        border-bottom: 1px solid #f0eaea;
        transition: all 0.3s ease;
        border-radius: 8px;
        padding-left: 8px;
    }
    .summary-item:hover {
        background: #fcf6f6;
        padding-left: 16px;
        border-bottom-color: #e8d4d4;
    }
    .summary-item.full-width {
        grid-column: 1 / -1;
    }
    .summary-item.highlight-item {
        background: linear-gradient(135deg, #fdf6f6, #fcf0f0);
        padding: 1rem 1.2rem;
        border-radius: 16px;
        border-bottom: 2px solid #e8d4d4;
        grid-column: 1 / -1;
        margin-top: 0.2rem;
        transition: all 0.3s ease;
    }
    .summary-item.highlight-item:hover {
        background: linear-gradient(135deg, #fcecec, #fae0e0);
        transform: scale(1.01);
    }
    .summary-label {
        font-size: 0.78rem;
        text-transform: uppercase;
        font-weight: 600;
        color: #888;
        letter-spacing: 0.4px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .summary-label i {
        color: #c0392b;
        font-size: 0.9rem;
        width: 22px;
    }
    .summary-value {
        font-weight: 600;
        color: #1e1e1e;
        font-size: 1rem;
        margin-top: 3px;
    }
    .summary-value.amount {
        color: #8a0000;
        font-size: 1.5rem;
        font-weight: 800;
        transition: all 0.3s ease;
    }
    .summary-value.amount:hover {
        transform: scale(1.02);
        color: #c0392b;
    }
    .summary-value.notes {
        font-style: italic;
        color: #666;
        font-weight: 400;
        font-size: 0.98rem;
    }
    .notes-item {
        background: #faf8f8;
        padding: 0.8rem 1rem;
        border-radius: 16px;
        transition: all 0.3s ease;
    }
    .notes-item:hover {
        background: #f5ecec;
    }
    .method-badge {
        padding: 4px 16px;
        border-radius: 30px;
        font-size: 0.85rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }
    .method-badge:hover {
        transform: scale(1.05);
    }
    .method-badge.pickup {
        background: #e8f5e8;
        color: #1a7a1a;
    }
    .method-badge.delivery {
        background: #e6f0ff;
        color: #004c9e;
    }

    /* ===== REVIEWS ===== */
    .review-count-badge {
        background: linear-gradient(135deg, #8a0000, #c0392b);
        color: #fff;
        border-radius: 60px;
        padding: 0 1rem;
        font-size: 0.8rem;
        line-height: 2rem;
        font-weight: 700;
        margin-left: auto;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        box-shadow: 0 2px 12px rgba(192, 57, 43, 0.2);
    }
    .review-count-badge:hover {
        background: linear-gradient(135deg, #a00000, #e74c3c);
        transform: scale(1.08);
        box-shadow: 0 6px 20px rgba(192, 57, 43, 0.35);
    }
    .reviews-list {
        max-height: 420px;
        overflow-y: auto;
        padding-right: 6px;
    }
    .reviews-list::-webkit-scrollbar {
        width: 6px;
    }
    .reviews-list::-webkit-scrollbar-track {
        background: #f5f0f0;
        border-radius: 10px;
    }
    .reviews-list::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #8a0000, #c0392b);
        border-radius: 10px;
    }
    .review-entry {
        background: #fcf8f8;
        border-radius: 20px;
        padding: 1.2rem 1.6rem;
        margin-bottom: 1rem;
        border-left: 4px solid #c0392b;
        transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        position: relative;
        overflow: hidden;
    }
    .review-entry::before {
        content: '\201C';
        position: absolute;
        top: -10px;
        right: 16px;
        font-size: 4rem;
        color: rgba(192, 57, 43, 0.04);
        font-family: Georgia, serif;
    }
    .review-entry:hover {
        background: #faf2f2;
        transform: translateX(6px);
        border-left-width: 6px;
        box-shadow: 0 6px 20px rgba(160, 20, 20, 0.06);
    }
    .review-top {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 0.5rem;
        flex-wrap: wrap;
    }
    .reviewer-avatar {
        width: 44px;
        height: 44px;
        border-radius: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.1rem;
        color: #fff;
        flex-shrink: 0;
        transition: transform 0.3s ease;
        box-shadow: 0 2px 12px rgba(160, 20, 20, 0.15);
    }
    .reviewer-avatar:hover {
        transform: scale(1.1) rotate(-4deg);
    }
    .reviewer-meta {
        flex: 1;
    }
    .reviewer-name {
        font-weight: 700;
        font-size: 1rem;
        color: #1a1414;
        transition: color 0.3s ease;
    }
    .reviewer-name:hover {
        color: #8a0000;
    }
    .review-stars {
        display: flex;
        align-items: center;
        gap: 3px;
        font-size: 0.85rem;
        margin-top: 2px;
    }
    .star-filled {
        color: #e67e22;
        transition: all 0.3s ease;
    }
    .star-filled:hover {
        transform: scale(1.2);
    }
    .star-empty {
        color: #ddd;
    }
    .review-rating {
        font-weight: 600;
        color: #555;
        margin-left: 8px;
        font-size: 0.85rem;
    }
    .review-date {
        font-size: 0.78rem;
        color: #999;
        white-space: nowrap;
        background: #f0ecec;
        padding: 2px 14px;
        border-radius: 30px;
        transition: all 0.3s ease;
    }
    .review-date:hover {
        background: #e8dcdc;
    }
    .review-text {
        background: #ffffff;
        padding: 0.8rem 1.2rem;
        border-radius: 16px;
        border: 1px solid #f0e6e6;
        color: #2d2d2d;
        font-size: 0.98rem;
        line-height: 1.7;
        margin-top: 6px;
        transition: all 0.3s ease;
    }
    .review-text:hover {
        border-color: #e8d4d4;
        box-shadow: 0 2px 8px rgba(0,0,0,0.02);
    }
    .empty-reviews-state {
        text-align: center;
        padding: 3rem 0;
        color: #999;
    }
    .empty-reviews-state i {
        font-size: 3rem;
        color: #a00;
        opacity: 0.2;
        margin-bottom: 0.5rem;
        transition: all 0.3s ease;
    }
    .empty-reviews-state:hover i {
        opacity: 0.4;
        transform: scale(1.1);
    }
    .empty-reviews-state p {
        font-weight: 500;
    }

    /* ===== ACTION BUTTONS ===== */
    .action-footer {
        display: flex;
        justify-content: flex-end;
        gap: 1.2rem;
        margin-top: 0.2rem;
        flex-wrap: wrap;
    }
    .btn-back-action {
        background: #ffffff;
        border: 2px solid #8a0000;
        color: #8a0000;
        padding: 0.85rem 2.8rem;
        border-radius: 60px;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 14px;
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        font-size: 0.98rem;
        box-shadow: 0 2px 12px rgba(160, 20, 20, 0.04);
        position: relative;
        overflow: hidden;
    }
    .btn-back-action::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, #8a0000, #c0392b);
        opacity: 0;
        transition: opacity 0.4s ease;
        border-radius: 60px;
    }
    .btn-back-action i {
        transition: transform 0.3s;
        position: relative;
        z-index: 1;
    }
    .btn-back-action span {
        position: relative;
        z-index: 1;
    }
    .btn-back-action:hover {
        color: #fff;
        box-shadow: 0 12px 40px rgba(160, 20, 20, 0.25);
        transform: translateX(-4px) scale(1.02);
        border-color: #8a0000;
    }
    .btn-back-action:hover::before {
        opacity: 1;
    }
    .btn-back-action:hover i {
        transform: translateX(-8px);
    }
    .btn-edit-action {
        background: linear-gradient(135deg, #8a0000, #c0392b);
        color: #fff;
        padding: 0.85rem 2.8rem;
        border-radius: 60px;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 14px;
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        font-size: 0.98rem;
        border: 2px solid #8a0000;
        box-shadow: 0 6px 20px rgba(160, 20, 20, 0.2);
        position: relative;
        overflow: hidden;
    }
    .btn-edit-action::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 60%);
        opacity: 0;
        transition: opacity 0.4s ease;
    }
    .btn-edit-action i {
        transition: transform 0.3s;
    }
    .btn-edit-action:hover {
        background: #ffffff;
        color: #8a0000;
        box-shadow: 0 12px 40px rgba(160, 20, 20, 0.3);
        transform: translateX(4px) scale(1.02);
        border-color: #8a0000;
    }
    .btn-edit-action:hover::after {
        opacity: 1;
    }
    .btn-edit-action:hover i {
        transform: rotate(20deg) scale(1.1);
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .hero-strip {
            padding: 0.8rem 1.4rem;
            border-radius: 30px;
            flex-direction: column;
            align-items: flex-start;
            gap: 0.8rem;
        }
        .hero-left {
            gap: 0.8rem;
            width: 100%;
        }
        .hero-right {
            width: 100%;
        }
        .hero-badge {
            font-size: 0.85rem;
            padding: 0.4rem 1.4rem;
        }
        .card-body {
            padding: 1.2rem 1.4rem;
        }
        .card-head {
            padding: 1rem 1.4rem;
            font-size: 0.95rem;
        }
        .contact-body {
            flex-wrap: wrap;
            gap: 1rem;
            padding: 1rem 1.4rem;
        }
        .item-pricing-grid {
            grid-template-columns: 1fr 1fr;
        }
        .summary-grid {
            grid-template-columns: 1fr;
        }
        .summary-item.highlight-item {
            grid-column: 1 / -1;
        }
        .action-footer {
            flex-direction: column;
        }
        .btn-back-action, .btn-edit-action {
            width: 100%;
            justify-content: center;
            padding: 0.7rem 1.8rem;
        }
        .gallery-main {
            height: 240px;
        }
        .thumbnail-item {
            width: 60px;
            height: 60px;
        }
        .item-header {
            flex-direction: column;
        }
        .item-rating {
            white-space: normal;
        }
        .review-top {
            flex-wrap: wrap;
        }
        .review-date {
            width: 100%;
            margin-left: 0;
        }
        .item-title {
            font-size: 1.4rem;
        }
        .summary-value.amount {
            font-size: 1.2rem;
        }
    }

    @media (max-width: 480px) {
        .hero-strip {
            padding: 0.6rem 1rem;
        }
        .hero-badge {
            font-size: 0.75rem;
            padding: 0.3rem 1rem;
        }
        .hero-date {
            font-size: 0.8rem;
            padding: 0.3rem 1rem;
        }
        .status-badge {
            font-size: 0.75rem;
            padding: 0.3rem 1.2rem;
        }
        .card-body {
            padding: 1rem;
        }
        .card-head {
            padding: 0.8rem 1rem;
            font-size: 0.85rem;
        }
        .gallery-main {
            height: 180px;
        }
        .thumbnail-item {
            width: 50px;
            height: 50px;
            border-radius: 10px;
        }
        .gallery-thumbnails {
            padding: 10px;
            gap: 8px;
        }
        .item-tags {
            font-size: 0.75rem;
            padding: 0.5rem 1rem;
            gap: 0.4rem 0.8rem;
        }
        .price-item {
            padding: 0.2rem 0;
        }
        .price-value {
            font-size: 0.95rem;
        }
        .summary-item {
            padding: 0.3rem 0;
        }
        .summary-value {
            font-size: 0.9rem;
        }
        .summary-value.amount {
            font-size: 1.1rem;
        }
        .review-entry {
            padding: 0.8rem 1rem;
        }
        .review-text {
            font-size: 0.9rem;
            padding: 0.6rem 0.8rem;
        }
    }
</style>

<div class="booking-detail-wrapper">
    <!-- ========== TOP HERO SECTION ========== -->
    <div class="hero-strip">
        <div class="hero-left">
            <div class="hero-badge">
                <i class="fas fa-ticket-alt"></i> Booking #{{ $booking->id }}
            </div>
            <div class="hero-date">
                <i class="fas fa-calendar-alt"></i> {{ $booking->created_at->format('d M Y h:i A') }}
            </div>
        </div>
        <div class="hero-right">
            <span class="status-badge status-{{ strtolower($booking->status) }}">
                <span class="status-dot"></span> {{ ucfirst($booking->status) }}
            </span>
        </div>
    </div>

    <!-- ========== MAIN GRID ========== -->
    <div class="detail-grid">

        <!-- ===== LEFT COLUMN ===== -->
        <div class="left-col">

            <!-- ITEM CARD WITH IMAGES -->
            <div class="detail-card item-card">
                <div class="card-head">
                    <i class="fas fa-cube"></i> Item Details
                    <span class="item-id-badge">#{{ $booking->item->id }}</span>
                </div>
                <div class="card-body">
                    <!-- ITEM IMAGES GALLERY -->
                    <div class="item-image-gallery">
                        @if($booking->item->images && $booking->item->images->count() > 0)
                            <div class="gallery-main">
                                <img id="mainImage" 
                                     src="{{ asset('uploads/items/' . $booking->item->images->first()->image) }}" 
                                     alt="{{ $booking->item->title }}"
                                     onerror="this.src='https://via.placeholder.com/600x400/ffffff/a00?text=No+Image'"
                                     loading="lazy">
                                <div class="image-loader">
                                    <div class="loader-spinner"></div>
                                </div>
                                <div class="image-counter">
                                    <i class="fas fa-images"></i> {{ $booking->item->images->count() }}
                                </div>
                            </div>
                            @if($booking->item->images->count() > 1)
                                <div class="gallery-thumbnails">
                                    @foreach($booking->item->images as $index => $image)
                                        <div class="thumbnail-item {{ $index === 0 ? 'active' : '' }}" 
                                             onclick="changeImage('{{ asset('uploads/items/' . $image->image) }}', this)">
                                            <img src="{{ asset('uploads/items/'.$image->image) }}" 
                                                 alt="Image {{ $index + 1 }}"
                                                 onerror="this.src='https://via.placeholder.com/100x100/ffffff/a00?text=No+Image'"
                                                 loading="lazy">
                                            <div class="thumbnail-loader"></div>
                                            <div class="thumbnail-overlay">
                                                <i class="fas fa-search-plus"></i>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        @else
                            <div class="no-image-placeholder">
                                <i class="fas fa-image"></i>
                                <p>No images available</p>
                            </div>
                        @endif
                    </div>

                    <div class="item-header">
                        <h2 class="item-title">{{ $booking->item->title }}</h2>
                        <div class="item-rating">
                            @php
                                $avgRating = $booking->item->reviews->avg('rating') ?? 0;
                            @endphp
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star{{ $i <= round($avgRating) ? '' : '-o' }}" 
                                   style="color: {{ $i <= round($avgRating) ? '#e67e22' : '#ddd' }};"></i>
                            @endfor
                            <span>({{ $booking->item->reviews->count() }} reviews)</span>
                        </div>
                    </div>
                    
                    <p class="item-desc">{{ $booking->item->description }}</p>
                    
                    <div class="item-tags">
                        <span><i class="fas fa-tag"></i> {{ $booking->item->category->name }}</span>
                        <span><i class="fas fa-city"></i> {{ $booking->item->city }}</span>
                        <span><i class="fas fa-location-dot"></i> {{ $booking->item->address }}</span>
                    </div>
                    
                    <div class="item-pricing-grid">
                        <div class="price-item">
                            <span class="price-label"><i class="fas fa-wallet"></i> Per Day</span>
                            <span class="price-value">Rs {{ number_format($booking->item->rent_price_per_day) }}</span>
                        </div>
                        <div class="price-item">
                            <span class="price-label"><i class="fas fa-shield-alt"></i> Security</span>
                            <span class="price-value">Rs {{ number_format($booking->item->security_deposit) }}</span>
                        </div>
                        <div class="price-item">
                            <span class="price-label"><i class="fas fa-tools"></i> Replacement</span>
                            <span class="price-value">Rs {{ number_format($booking->item->replacement_cost) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- OWNER CARD -->
            <div class="detail-card contact-card">
                <div class="card-head">
                    <i class="fas fa-user-tie"></i> Owner
                    <span class="contact-badge"><i class="fas fa-check-circle"></i> Verified</span>
                </div>
                <div class="card-body contact-body">
                    <div class="contact-avatar" style="background: linear-gradient(135deg, #8a0000, #c0392b);">
                        {{ substr($booking->owner->name, 0, 1) }}
                    </div>
                    <div class="contact-info">
                        <div class="contact-name">{{ $booking->owner->name }}</div>
                        <div class="contact-detail"><i class="fas fa-envelope"></i> {{ $booking->owner->email }}</div>
                        <div class="contact-detail"><i class="fas fa-phone"></i> {{ $booking->owner->phone }}</div>
                    </div>
                </div>
            </div>

            <!-- RENTER CARD -->
            <div class="detail-card contact-card">
                <div class="card-head">
                    <i class="fas fa-user"></i> Renter
                </div>
                <div class="card-body contact-body">
                    <div class="contact-avatar" style="background: linear-gradient(135deg, #b03a2e, #e74c3c);">
                        {{ substr($booking->renter->name, 0, 1) }}
                    </div>
                    <div class="contact-info">
                        <div class="contact-name">{{ $booking->renter->name }}</div>
                        <div class="contact-detail"><i class="fas fa-envelope"></i> {{ $booking->renter->email }}</div>
                        <div class="contact-detail"><i class="fas fa-phone"></i> {{ $booking->renter->phone }}</div>
                        <div class="contact-detail"><i class="fas fa-id-card"></i> CNIC: {{ $booking->renter->cnic }}</div>
                    </div>
                </div>
            </div>

        </div>

        <!-- ===== RIGHT COLUMN ===== -->
        <div class="right-col">

            <!-- BOOKING SUMMARY CARD -->
            <div class="detail-card booking-summary">
                <div class="card-head">
                    <i class="fas fa-receipt"></i> Booking Summary
                </div>
                <div class="card-body summary-body">
                    <div class="summary-grid">
                        <div class="summary-item">
                            <span class="summary-label"><i class="far fa-calendar-check"></i> Start Date</span>
                            <span class="summary-value">{{ \Carbon\Carbon::parse($booking->start_date)->format('d M Y') }}</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-label"><i class="far fa-calendar-times"></i> End Date</span>
                            <span class="summary-value">{{ \Carbon\Carbon::parse($booking->end_date)->format('d M Y') }}</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-label"><i class="fas fa-clock"></i> Duration</span>
                            <span class="summary-value"><strong>{{ $booking->days }}</strong> days</span>
                        </div>
                        <div class="summary-item highlight-item">
                            <span class="summary-label"><i class="fas fa-money-bill-wave"></i> Total Amount</span>
                            <span class="summary-value amount">Rs {{ number_format($booking->total_amount) }}</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-label"><i class="fas fa-shield-alt"></i> Security Deposit</span>
                            <span class="summary-value">Rs {{ number_format($booking->security_deposit) }}</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-label"><i class="fas fa-truck"></i> Delivery Method</span>
                            <span class="summary-value">
                                @if($booking->delivery_method == 'pickup')
                                    <span class="method-badge pickup"><i class="fas fa-store"></i> Pickup</span>
                                @elseif($booking->delivery_method == 'delivery')
                                    <span class="method-badge delivery"><i class="fas fa-truck"></i> Delivery</span>
                                @else
                                    {{ $booking->delivery_method ?? '—' }}
                                @endif
                            </span>
                        </div>
                        <div class="summary-item full-width">
                            <span class="summary-label"><i class="fas fa-map-marked-alt"></i> Delivery Address</span>
                            <span class="summary-value">{{ $booking->delivery_address ?? '—' }}</span>
                        </div>
                        <div class="summary-item full-width notes-item">
                            <span class="summary-label"><i class="fas fa-pen"></i> Notes</span>
                            <span class="summary-value notes">{{ $booking->notes ?? 'No additional notes' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- REVIEWS CARD -->
            <div class="detail-card reviews-card">
                <div class="card-head">
                    <i class="fas fa-star"></i> Reviews
                    <span class="review-count-badge">{{ $booking->item->reviews->count() }}</span>
                </div>
                <div class="card-body reviews-list">
                    @forelse($booking->item->reviews as $review)
                        <div class="review-entry">
                            <div class="review-top">
                                <div class="reviewer-avatar" style="background: linear-gradient(135deg, #8b1a1a, #c0392b);">
                                    {{ substr($review->user->name, 0, 1) }}
                                </div>
                                <div class="reviewer-meta">
                                    <div class="reviewer-name">{{ $review->user->name }}</div>
                                    <div class="review-stars">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star{{ $i <= $review->rating ? '' : '-o' }} star-{{ $i <= $review->rating ? 'filled' : 'empty' }}"></i>
                                        @endfor
                                        <span class="review-rating">{{ $review->rating }}/5</span>
                                    </div>
                                </div>
                                <span class="review-date">{{ $review->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="review-text">{{ $review->review }}</p>
                        </div>
                    @empty
                        <div class="empty-reviews-state">
                            <i class="fas fa-comment-slash"></i>
                            <p>No reviews yet for this item.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- ACTION BUTTONS -->
            <div class="action-footer">
                <a href="/admin/bookings" class="btn-back-action">
                    <i class="fas fa-arrow-left"></i> <span>Back to Bookings</span>
                </a>
                <a href="/admin/bookings/edit/{{ $booking->id }}" class="btn-edit-action">
                    <i class="fas fa-edit"></i> Edit Booking
                </a>
            </div>

        </div>
    </div>
</div>

<!-- ========== IMAGE GALLERY JAVASCRIPT ========== -->
<script>
    function changeImage(imageUrl, element) {
        // Update main image with loader
        const mainImage = document.getElementById('mainImage');
        const loader = document.querySelector('.image-loader');
        
        // Show loader
        if (loader) {
            loader.style.opacity = '1';
            loader.style.pointerEvents = 'all';
        }
        
        // Update main image
        mainImage.src = imageUrl;
        mainImage.classList.remove('loaded');
        
        // When image loads, hide loader
        mainImage.onload = function() {
            if (loader) {
                loader.style.opacity = '0';
                loader.style.pointerEvents = 'none';
            }
            mainImage.classList.add('loaded');
        };
        
        // Update active thumbnail
        document.querySelectorAll('.thumbnail-item').forEach(item => {
            item.classList.remove('active');
        });
        element.classList.add('active');
    }

    // Hide loaders when images load
    document.addEventListener('DOMContentLoaded', function() {
        // Main image
        const mainImage = document.getElementById('mainImage');
        const mainLoader = document.querySelector('.image-loader');
        if (mainImage && mainLoader) {
            mainImage.onload = function() {
                mainLoader.style.opacity = '0';
                mainLoader.style.pointerEvents = 'none';
                mainImage.classList.add('loaded');
            };
            // If image already loaded
            if (mainImage.complete) {
                mainLoader.style.opacity = '0';
                mainLoader.style.pointerEvents = 'none';
                mainImage.classList.add('loaded');
            }
        }
        
        // Thumbnails
        document.querySelectorAll('.thumbnail-item img').forEach(img => {
            const loader = img.parentElement.querySelector('.thumbnail-loader');
            if (loader) {
                img.onload = function() {
                    loader.style.display = 'none';
                    img.classList.add('loaded');
                };
                if (img.complete) {
                    loader.style.display = 'none';
                    img.classList.add('loaded');
                }
            }
        });
    });
</script>
@endsection