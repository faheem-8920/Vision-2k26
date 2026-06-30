@extends('admin.layout')

@section('content')
<style>
    /* ===== MAIN WRAPPER ===== */
    .review-edit-wrapper {
        max-width: 900px;
        margin: 0 auto;
        padding: 1.5rem 50px;
        animation: fadeSlideUp 0.6s ease;
    }

    @keyframes fadeSlideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ===== CARD ===== */
    .review-edit-card {
        background: #ffffff;
        border-radius: 24px;
        box-shadow: 0 15px 50px rgba(180, 40, 40, 0.10), 0 8px 24px rgba(0,0,0,0.04);
        border: 1px solid rgba(220, 60, 60, 0.06);
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
    }

    .review-edit-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(183, 28, 28, 0.03) 0%, transparent 70%);
        pointer-events: none;
    }

    .review-edit-card:hover {
        box-shadow: 0 25px 70px rgba(180, 40, 40, 0.16);
        transform: translateY(-3px);
    }

    /* ===== HEADER ===== */
    .review-edit-header {
        background: linear-gradient(135deg, #b71c1c 0%, #d32f2f 100%);
        padding: 1.2rem 2rem;
        border-bottom: 4px solid #ef5350;
        position: relative;
        overflow: hidden;
    }

    .review-edit-header::after {
        content: '✦';
        position: absolute;
        right: 2rem;
        top: 50%;
        transform: translateY(-50%);
        font-size: 3rem;
        color: rgba(255,255,255,0.06);
        animation: floatIcon 6s ease-in-out infinite;
    }

    @keyframes floatIcon {
        0%, 100% { transform: translateY(-50%) rotate(0deg) scale(1); }
        50% { transform: translateY(-60%) rotate(15deg) scale(1.1); }
    }

    .review-edit-header h4 {
        color: #ffffff;
        font-weight: 700;
        font-size: 1.3rem;
        letter-spacing: 0.3px;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 12px;
        position: relative;
        z-index: 1;
    }

    .review-edit-header h4 i {
        font-size: 1.3rem;
        opacity: 0.95;
        filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
    }

    .review-id-badge {
        margin-left: auto;
        background: rgba(255,255,255,0.15);
        backdrop-filter: blur(4px);
        padding: 0.3rem 1rem;
        border-radius: 50px;
        font-size: 0.7rem;
        font-weight: 500;
        letter-spacing: 0.5px;
        border: 1px solid rgba(255,255,255,0.1);
    }

    /* ===== BODY ===== */
    .review-edit-body {
        padding: 1.8rem 2rem 1.8rem 2rem;
        background: #fefcfc;
        position: relative;
        z-index: 1;
    }

    /* ===== FORM GROUPS ===== */
    .form-group-premium {
        margin-bottom: 1.5rem;
        position: relative;
    }

    .form-group-premium label {
        display: block;
        font-weight: 700;
        color: #4a2020;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        margin-bottom: 0.5rem;
        transition: all 0.3s ease;
    }

    .form-group-premium label i {
        margin-right: 8px;
        color: #c62828;
        font-size: 0.85rem;
        transition: all 0.3s ease;
    }

    .form-group-premium:hover label i {
        transform: scale(1.2) rotate(-8deg);
        color: #b71c1c;
    }

    /* ===== STAR RATING (Clickable) ===== */
    .star-rating-container {
        display: flex;
        flex-direction: column;
        gap: 8px;
        padding: 0.2rem 0;
    }

    .star-rating-wrapper {
        display: flex;
        gap: 12px;
        align-items: center;
        flex-wrap: wrap;
        padding: 0.5rem 1.2rem;
        background: rgba(255, 255, 255, 0.6);
        border-radius: 14px;
        border: 2px solid #f0e8e8;
        transition: all 0.3s ease;
    }

    .star-rating-wrapper:hover {
        border-color: #d32f2f;
        background: rgba(255, 255, 255, 0.9);
        box-shadow: 0 4px 20px rgba(180, 40, 40, 0.06);
    }

    .star-rating-wrapper.is-valid {
        border-color: #2e7d32;
        background: rgba(46, 125, 50, 0.04);
        box-shadow: 0 0 0 6px rgba(46, 125, 50, 0.06);
    }

    .star-rating-wrapper.is-invalid {
        border-color: #c62828;
        background: rgba(198, 40, 40, 0.04);
        box-shadow: 0 0 0 6px rgba(198, 40, 40, 0.06);
        animation: shakeRating 0.5s ease;
    }

    @keyframes shakeRating {
        0%, 100% { transform: translateX(0); }
        20% { transform: translateX(-8px); }
        40% { transform: translateX(8px); }
        60% { transform: translateX(-6px); }
        80% { transform: translateX(6px); }
    }

    .star-rating {
        display: flex;
        gap: 6px;
        flex-direction: row-reverse;
        justify-content: flex-end;
    }

    .star-rating input {
        display: none;
    }

    .star-rating label {
        font-size: 2.4rem;
        color: #e0d0d0;
        cursor: pointer;
        transition: all 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
        line-height: 1;
        padding: 0 3px;
        user-select: none;
        position: relative;
    }

    /* Hover effect - all stars to the left get highlighted */
    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: #f59e0b !important;
        transform: scale(1.2) rotate(-5deg);
        text-shadow: 0 0 30px rgba(245, 158, 11, 0.3);
    }

    /* Checked state - fill stars up to selected rating */
    .star-rating input:checked ~ label {
        color: #f59e0b !important;
        text-shadow: 0 0 20px rgba(245, 158, 11, 0.2);
    }

    /* Animation for checked stars */
    .star-rating input:checked ~ label {
        animation: starPop 0.35s ease;
    }

    @keyframes starPop {
        0% { transform: scale(1); }
        40% { transform: scale(1.3) rotate(-8deg); }
        100% { transform: scale(1.05); }
    }

    .rating-text-display {
        font-size: 0.95rem;
        font-weight: 700;
        color: #4a2020;
        min-width: 100px;
        padding: 0.3rem 1rem;
        background: #f5eeee;
        border-radius: 50px;
        text-align: center;
        transition: all 0.3s ease;
        border: 2px solid transparent;
        letter-spacing: 0.3px;
    }

    .rating-text-display.active {
        background: linear-gradient(135deg, #fef3c7, #fde68a);
        border-color: #f59e0b;
        color: #92400e;
        box-shadow: 0 4px 16px rgba(245, 158, 11, 0.2);
    }

    .rating-emoji {
        display: inline-block;
        font-size: 1rem;
        margin-right: 4px;
    }

    .rating-label-text {
        font-size: 0.85rem;
        color: #888;
        font-weight: 500;
        margin-left: 4px;
        min-width: 90px;
    }

    .rating-label-text.active {
        color: #4a2020;
        font-weight: 600;
    }

    /* ===== VALIDATION FEEDBACK FOR RATING ===== */
    .rating-feedback {
        display: none;
        font-size: 0.8rem;
        font-weight: 500;
        padding: 0.3rem 0.8rem;
        border-radius: 10px;
        margin-top: 0.2rem;
        animation: slideDown 0.3s ease;
    }

    .rating-feedback.valid {
        display: block;
        color: #2e7d32;
        background: #f0f7f0;
        border-left: 4px solid #2e7d32;
    }

    .rating-feedback.invalid {
        display: block;
        color: #c62828;
        background: #fff0f0;
        border-left: 4px solid #c62828;
    }

    @keyframes slideDown {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* ===== COMMENT TEXTAREA ===== */
    .comment-wrapper-premium {
        position: relative;
    }

    .comment-wrapper-premium textarea {
        width: 100%;
        padding: 0.8rem 1.2rem;
        padding-left: 3rem;
        font-size: 0.95rem;
        border: 2px solid #ece0e0;
        border-radius: 14px;
        background: #ffffff;
        color: #2d1a1a;
        transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: 0 2px 8px rgba(180, 40, 40, 0.04);
        outline: none;
        font-family: 'Inter', -apple-system, sans-serif;
        line-height: 1.6;
        min-height: 90px;
        resize: vertical;
        text-align: left;
    }

    .comment-wrapper-premium textarea:focus {
        border-color: #c62828;
        box-shadow: 0 0 0 6px rgba(198, 40, 40, 0.08), 0 4px 16px rgba(180, 40, 40, 0.06);
        transform: translateY(-2px);
        background: #ffffff;
    }

    .comment-wrapper-premium textarea:hover {
        border-color: #d32f2f;
        background: #fffbfb;
    }

    .comment-wrapper-premium .comment-icon {
        position: absolute;
        left: 1rem;
        top: 0.9rem;
        color: #b71c1c;
        font-size: 1.1rem;
        opacity: 0.5;
        transition: all 0.3s ease;
        pointer-events: none;
    }

    .comment-wrapper-premium textarea:focus ~ .comment-icon,
    .comment-wrapper-premium textarea:hover ~ .comment-icon {
        opacity: 1;
        transform: scale(1.1) rotate(-5deg);
    }

    .comment-wrapper-premium textarea.is-valid {
        border-color: #2e7d32;
        box-shadow: 0 0 0 6px rgba(46, 125, 50, 0.08);
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%232e7d32' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M20 6L9 17l-5-5'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 20px;
        padding-right: 3.2rem;
    }

    .comment-wrapper-premium textarea.is-invalid {
        border-color: #c62828;
        box-shadow: 0 0 0 6px rgba(198, 40, 40, 0.08);
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%23c62828' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'%3E%3Ccircle cx='12' cy='12' r='10'/%3E%3Cline x1='12' y1='8' x2='12' y2='12'/%3E%3Cline x1='12' y1='16' x2='12.01' y2='16'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 20px;
        padding-right: 3.2rem;
        animation: shakeField 0.5s ease;
    }

    @keyframes shakeField {
        0%, 100% { transform: translateX(0); }
        20% { transform: translateX(-8px); }
        40% { transform: translateX(8px); }
        60% { transform: translateX(-6px); }
        80% { transform: translateX(6px); }
    }

    .comment-feedback {
        display: none;
        font-size: 0.8rem;
        font-weight: 500;
        padding: 0.3rem 0.8rem;
        border-radius: 10px;
        margin-top: 0.3rem;
        animation: slideDown 0.3s ease;
    }

    .comment-feedback.valid {
        display: block;
        color: #2e7d32;
        background: #f0f7f0;
        border-left: 4px solid #2e7d32;
    }

    .comment-feedback.invalid {
        display: block;
        color: #c62828;
        background: #fff0f0;
        border-left: 4px solid #c62828;
    }

    /* ===== CHARACTER COUNTER ===== */
    .char-counter-premium {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 0.4rem;
        font-size: 0.75rem;
        color: #999;
        margin-top: 0.3rem;
        padding-right: 0.3rem;
        transition: all 0.3s ease;
        font-weight: 600;
    }

    .char-counter-premium.valid {
        color: #2e7d32;
    }

    .char-counter-premium.invalid {
        color: #c62828;
    }

    .char-counter-premium .char-count-number {
        font-size: 0.9rem;
        font-weight: 700;
    }

    /* ===== CHAR PROGRESS BAR ===== */
    .char-progress-track {
        width: 100%;
        height: 3px;
        background: #f0e8e8;
        border-radius: 3px;
        margin-top: 0.2rem;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .char-progress-fill {
        height: 100%;
        width: 0%;
        border-radius: 3px;
        background: linear-gradient(90deg, #ef4444, #f59e0b);
        transition: width 0.3s ease, background 0.3s ease;
    }

    .char-progress-fill.complete {
        background: linear-gradient(90deg, #2e7d32, #16a34a);
    }

    /* ===== SUBMIT BUTTON ===== */
    .btn-submit-premium {
        background: linear-gradient(135deg, #b71c1c 0%, #d32f2f 100%);
        color: #ffffff;
        border: none;
        padding: 0.8rem 2.5rem;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.95rem;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: 0 6px 24px rgba(183, 28, 28, 0.35);
        display: inline-flex;
        align-items: center;
        gap: 12px;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        margin-top: 0.3rem;
        width: auto;
        min-width: 200px;
        justify-content: center;
    }

    .btn-submit-premium::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.15), transparent);
        transition: left 0.7s ease;
    }

    .btn-submit-premium:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 10px 35px rgba(183, 28, 28, 0.45);
        background: linear-gradient(135deg, #c62828 0%, #e53935 100%);
        color: #ffffff;
    }

    .btn-submit-premium:hover::before {
        left: 100%;
    }

    .btn-submit-premium:active {
        transform: translateY(0px) scale(0.98);
        box-shadow: 0 4px 16px rgba(183, 28, 28, 0.3);
    }

    .btn-submit-premium:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none !important;
    }

    .btn-submit-premium i {
        font-size: 1.1rem;
        transition: all 0.4s ease;
    }

    .btn-submit-premium:hover i {
        transform: rotate(-10deg) scale(1.15);
    }

    .btn-submit-premium .btn-spinner {
        display: none;
        width: 18px;
        height: 18px;
        border: 3px solid rgba(255,255,255,0.3);
        border-top-color: white;
        border-radius: 50%;
        animation: spin 0.7s linear infinite;
    }

    .btn-submit-premium.is-loading .btn-spinner {
        display: inline-block;
    }

    .btn-submit-premium.is-loading .btn-label {
        display: none;
    }

    .btn-submit-premium.is-loading i {
        display: none;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    /* ===== DIVIDER ===== */
    .form-divider-custom {
        height: 2px;
        background: linear-gradient(to right, transparent, #eedcdc, transparent);
        margin: 0.2rem 0 1.2rem 0;
        opacity: 0.6;
    }

    /* ===== SUCCESS OVERLAY ===== */
    .review-success-overlay {
        position: fixed;
        inset: 0;
        background: rgba(24, 24, 27, 0.45);
        backdrop-filter: blur(6px);
        -webkit-backdrop-filter: blur(6px);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 10000;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .review-success-overlay.show {
        display: flex;
        opacity: 1;
    }

    .review-success-popup {
        background: white;
        border-radius: 24px;
        padding: 2rem 2.5rem;
        max-width: 380px;
        text-align: center;
        box-shadow: 0 24px 80px rgba(0,0,0,0.25);
        transform: scale(0.7) translateY(20px);
        opacity: 0;
        transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.4s ease;
        position: relative;
        overflow: hidden;
    }

    .review-success-overlay.show .review-success-popup {
        transform: scale(1) translateY(0);
        opacity: 1;
    }

    .review-success-popup::before {
        content: '';
        position: absolute;
        top: -40%;
        left: -20%;
        width: 240px;
        height: 240px;
        background: radial-gradient(circle, rgba(22, 163, 74, 0.08) 0%, transparent 70%);
        border-radius: 50%;
    }

    .review-success-popup .popup-check {
        width: 72px;
        height: 72px;
        margin: 0 auto 1rem;
        border-radius: 50%;
        background: linear-gradient(135deg, #d1fae5, #a7f3d0);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.2rem;
        color: #16a34a;
        box-shadow: 0 8px 28px rgba(22, 163, 74, 0.25);
        position: relative;
        z-index: 1;
        animation: popCheck 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) 0.15s both;
    }

    @keyframes popCheck {
        from { transform: scale(0) rotate(-30deg); opacity: 0; }
        to { transform: scale(1) rotate(0); opacity: 1; }
    }

    .review-success-popup .popup-stars {
        font-size: 1.4rem;
        color: #f59e0b;
        margin-bottom: 0.5rem;
        letter-spacing: 0.3rem;
        position: relative;
        z-index: 1;
    }

    .review-success-popup .popup-stars span {
        display: inline-block;
        opacity: 0;
        animation: starPop 0.4s cubic-bezier(0.34, 1.56, 0.64, 1) both;
    }

    .review-success-popup .popup-stars span:nth-child(1) { animation-delay: 0.3s; }
    .review-success-popup .popup-stars span:nth-child(2) { animation-delay: 0.38s; }
    .review-success-popup .popup-stars span:nth-child(3) { animation-delay: 0.46s; }
    .review-success-popup .popup-stars span:nth-child(4) { animation-delay: 0.54s; }
    .review-success-popup .popup-stars span:nth-child(5) { animation-delay: 0.62s; }

    .review-success-popup h4 {
        font-weight: 800;
        font-size: 1.2rem;
        color: #18181b;
        margin: 0 0 0.3rem;
        position: relative;
        z-index: 1;
    }

    .review-success-popup p {
        font-size: 0.85rem;
        color: #71717a;
        margin: 0 0 1.2rem;
        line-height: 1.5;
        position: relative;
        z-index: 1;
    }

    .review-success-popup .popup-close-btn {
        background: linear-gradient(135deg, #b71c1c 0%, #d32f2f 100%);
        color: white;
        border: none;
        padding: 0.5rem 2rem;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.85rem;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: 0 4px 20px rgba(183, 28, 28, 0.3);
        position: relative;
        z-index: 1;
    }

    .review-success-popup .popup-close-btn:hover {
        transform: translateY(-2px) scale(1.03);
        box-shadow: 0 8px 28px rgba(183, 28, 28, 0.4);
    }

    .review-success-popup .popup-close-btn:active {
        transform: scale(0.95);
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .review-edit-wrapper {
            padding: 1rem 20px;
        }
        .review-edit-body {
            padding: 1.5rem 1.2rem;
        }
        .review-edit-header {
            padding: 1rem 1.2rem;
        }
        .review-edit-header h4 {
            font-size: 1.1rem;
            flex-wrap: wrap;
        }
        .review-id-badge {
            margin-left: 0;
            font-size: 0.65rem;
        }
        .star-rating label {
            font-size: 2rem;
        }
        .star-rating-wrapper {
            padding: 0.4rem 0.8rem;
            gap: 8px;
        }
        .rating-text-display {
            font-size: 0.8rem;
            min-width: 80px;
            padding: 0.2rem 0.8rem;
        }
        .btn-submit-premium {
            width: 100%;
            justify-content: center;
            padding: 0.7rem 1.5rem;
            min-width: unset;
        }
        .review-success-popup {
            padding: 1.5rem 1.5rem;
            max-width: 92vw;
        }
        .comment-wrapper-premium textarea {
            min-height: 70px;
            padding: 0.6rem 1rem;
            padding-left: 2.5rem;
            font-size: 0.85rem;
        }
    }

    @media (max-width: 480px) {
        .review-edit-wrapper {
            padding: 0 12px;
        }
        .star-rating label {
            font-size: 1.6rem;
        }
        .star-rating-wrapper {
            gap: 4px;
            flex-direction: column;
            align-items: stretch;
        }
        .rating-text-display {
            font-size: 0.7rem;
            min-width: 60px;
            padding: 0.15rem 0.6rem;
        }
        .rating-label-text {
            font-size: 0.75rem;
            min-width: 70px;
        }
        .comment-wrapper-premium textarea {
            min-height: 60px;
            padding: 0.5rem 0.8rem;
            padding-left: 2.2rem;
            font-size: 0.8rem;
        }
        .comment-wrapper-premium .comment-icon {
            left: 0.8rem;
            top: 0.7rem;
            font-size: 0.9rem;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .review-edit-wrapper *,
        .review-edit-wrapper *::before,
        .review-edit-wrapper *::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }
    }
</style>

<div class="review-edit-wrapper">
    <div class="review-edit-card">

        <!-- ===== HEADER ===== -->
        <div class="review-edit-header">
            <h4>
                <i class="fas fa-pen-fancy"></i>
                Edit Review
                <span class="review-id-badge">
                    <i class="fas fa-hashtag" style="opacity:0.6;"></i> {{ $review->id }}
                </span>
            </h4>
        </div>

        <!-- ===== BODY ===== -->
        <div class="review-edit-body">

            <form action="/admin/reviews/update/{{ $review->id }}" method="POST" id="reviewForm" novalidate>
                @csrf

                <!-- ===== STAR RATING (Clickable) ===== -->
                <div class="form-group-premium">
                    <label for="rating">
                        <i class="fas fa-star"></i> Your Rating
                    </label>

                    <div class="star-rating-container">
                        <div class="star-rating-wrapper" id="ratingWrapper">
                            <div class="star-rating" id="starRating">
                                @php
                                    $currentRating = $review->rating ?? 0;
                                @endphp
                                @for($i = 5; $i >= 1; $i--)
                                    <input type="radio" name="rating" id="star{{ $i }}" value="{{ $i }}"
                                        {{ $currentRating == $i ? 'checked' : '' }}>
                                    <label for="star{{ $i }}" title="{{ $i }} stars" 
                                           style="color: {{ $currentRating >= $i ? '#f59e0b' : '#d4c4c4' }};">
                                        <i class="fas fa-star"></i>
                                    </label>
                                @endfor
                            </div>

                            <span class="rating-text-display {{ $currentRating ? 'active' : '' }}" id="ratingText">
                                <span class="rating-emoji">
                                    @switch($currentRating)
                                        @case(5) 🌟 @break
                                        @case(4) 😊 @break
                                        @case(3) 😐 @break
                                        @case(2) 😕 @break
                                        @case(1) 😤 @break
                                        @default ⭐
                                    @endswitch
                                </span>
                                {{ $currentRating ? $currentRating . ' / 5' : 'Select rating' }}
                            </span>
                            <span class="rating-label-text {{ $currentRating ? 'active' : '' }}" id="ratingLabel">
                                @switch($currentRating)
                                    @case(5) Excellent! @break
                                    @case(4) Very Good @break
                                    @case(3) Good @break
                                    @case(2) Fair @break
                                    @case(1) Poor @break
                                    @default Click a star to rate
                                @endswitch
                            </span>
                        </div>

                        <div class="rating-feedback" id="ratingFeedback"></div>
                    </div>
                </div>

                <!-- ===== COMMENT ===== -->
                <div class="form-group-premium">
                    <label for="comment">
                        <i class="fas fa-comment-dots"></i> Review Comment
                    </label>

                    <div class="comment-wrapper-premium">
                        <i class="fas fa-quote-left comment-icon"></i>
                        <textarea name="review" id="comment" rows="4" minlength="3" maxlength="500"
                            placeholder="Share your detailed experience with this item...">{{ $review->comment }}</textarea>
                    </div>

                    <div class="char-progress-track">
                        <div class="char-progress-fill" id="charProgress"></div>
                    </div>

                    <div class="char-counter-premium" id="charCounter">
                        <span class="char-count-number" id="charCount">{{ strlen($review->comment) }}</span>
                        <span>/ 500 characters</span>
                    </div>

                    <div class="comment-feedback" id="commentFeedback"></div>
                </div>

                <div class="form-divider-custom"></div>

                <!-- ===== SUBMIT ===== -->
                <button type="submit" class="btn-submit-premium" id="submitBtn">
                    <i class="fas fa-sync-alt"></i>
                    <span class="btn-label">Update Review</span>
                    <span class="btn-spinner"></span>
                </button>

            </form>
        </div>
    </div>
</div>

<!-- ===== SUCCESS OVERLAY ===== -->
<div class="review-success-overlay" id="reviewSuccessOverlay">
    <div class="review-success-popup">
        <div class="popup-check">
            <i class="fas fa-check"></i>
        </div>
        <div class="popup-stars">
            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
        </div>
        <h4>Review Updated!</h4>
        <p>Your review has been successfully updated. Thank you for your feedback!</p>
        <button type="button" class="popup-close-btn" id="popupCloseBtn">Got it</button>
    </div>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<script>
    (function() {
        'use strict';

        const form = document.getElementById('reviewForm');
        const stars = document.querySelectorAll('.star-rating input');
        const starLabels = document.querySelectorAll('.star-rating label');
        const ratingWrapper = document.getElementById('ratingWrapper');
        const ratingText = document.getElementById('ratingText');
        const ratingLabel = document.getElementById('ratingLabel');
        const ratingFeedback = document.getElementById('ratingFeedback');
        const comment = document.getElementById('comment');
        const commentFeedback = document.getElementById('commentFeedback');
        const charCounter = document.getElementById('charCounter');
        const charCount = document.getElementById('charCount');
        const charProgress = document.getElementById('charProgress');
        const submitBtn = document.getElementById('submitBtn');

        const ratingLabels = {
            5: { label: 'Excellent!', emoji: '🌟' },
            4: { label: 'Very Good', emoji: '😊' },
            3: { label: 'Good', emoji: '😐' },
            2: { label: 'Fair', emoji: '😕' },
            1: { label: 'Poor', emoji: '😤' }
        };

        // ===== UPDATE STAR COLORS =====
        function updateStarColors(selectedValue) {
            starLabels.forEach((label, index) => {
                // Stars are in reverse order (5 to 1)
                const starValue = 5 - index;
                if (starValue <= selectedValue) {
                    label.style.color = '#f59e0b';
                } else {
                    label.style.color = '#d4c4c4';
                }
            });
        }

        // ===== STAR RATING LOGIC =====
        stars.forEach(star => {
            star.addEventListener('change', function() {
                const val = parseInt(this.value);
                const ratingInfo = ratingLabels[val] || { label: '', emoji: '⭐' };
                
                // Update star colors
                updateStarColors(val);
                
                // Update text display
                ratingText.innerHTML = `<span class="rating-emoji">${ratingInfo.emoji}</span> ${val} / 5`;
                ratingText.classList.add('active');
                ratingLabel.textContent = ratingInfo.label;
                ratingLabel.classList.add('active');
                ratingWrapper.classList.remove('is-invalid');
                ratingWrapper.classList.add('is-valid');

                // Animate stars that are now filled
                starLabels.forEach((label, index) => {
                    const starValue = 5 - index;
                    if (starValue <= val) {
                        label.style.animation = 'none';
                        setTimeout(() => {
                            label.style.animation = 'starPop 0.35s ease';
                        }, 10);
                    }
                });

                validateRating();
            });
        });

        // ===== COMMENT VALIDATION =====
        comment.addEventListener('input', function() {
            const len = this.value.length;
            charCount.textContent = len;

            // Update progress bar
            const minLength = 3;
            const maxLength = 500;
            const progressPct = Math.min(100, (len / minLength) * 100);
            charProgress.style.width = progressPct + '%';
            charProgress.classList.toggle('complete', len >= minLength);

            // Update counter styling
            charCounter.classList.remove('valid', 'invalid');
            if (len >= minLength && len <= maxLength) {
                charCounter.classList.add('valid');
            } else if (len > 0) {
                charCounter.classList.add('invalid');
            }

            validateComment();
        });

        comment.addEventListener('blur', validateComment);

        // ===== VALIDATION FUNCTIONS =====
        function validateRating() {
            const selected = document.querySelector('.star-rating input:checked');
            const feedback = ratingFeedback;

            if (selected) {
                feedback.className = 'rating-feedback valid';
                feedback.innerHTML = '<i class="fas fa-check-circle"></i> Rating selected: ' + selected.value + ' stars';
                ratingWrapper.classList.remove('is-invalid');
                ratingWrapper.classList.add('is-valid');
                return true;
            } else {
                feedback.className = 'rating-feedback invalid';
                feedback.innerHTML = '<i class="fas fa-exclamation-circle"></i> Please select a rating';
                ratingWrapper.classList.remove('is-valid');
                ratingWrapper.classList.add('is-invalid');
                return false;
            }
        }

        function validateComment() {
            const val = comment.value.trim();
            const len = val.length;
            const feedback = commentFeedback;

            if (len >= 3 && len <= 500) {
                comment.classList.remove('is-invalid');
                comment.classList.add('is-valid');
                feedback.className = 'comment-feedback valid';
                feedback.innerHTML = '<i class="fas fa-check-circle"></i> Comment looks great!';
                return true;
            } else if (len > 0 && len < 3) {
                comment.classList.remove('is-valid');
                comment.classList.add('is-invalid');
                feedback.className = 'comment-feedback invalid';
                feedback.innerHTML = '<i class="fas fa-exclamation-circle"></i> Please enter at least 3 characters';
                return false;
            } else if (len > 500) {
                comment.classList.remove('is-valid');
                comment.classList.add('is-invalid');
                feedback.className = 'comment-feedback invalid';
                feedback.innerHTML = '<i class="fas fa-exclamation-circle"></i> Maximum 500 characters allowed';
                return false;
            } else {
                comment.classList.remove('is-valid');
                comment.classList.remove('is-invalid');
                feedback.className = 'comment-feedback';
                feedback.innerHTML = '';
                return false;
            }
        }

        // ===== SHOW SUCCESS POPUP =====
        function showSuccessPopup() {
            const overlay = document.getElementById('reviewSuccessOverlay');
            if (overlay) {
                overlay.classList.add('show');
            }
        }

        function hideSuccessPopup() {
            const overlay = document.getElementById('reviewSuccessOverlay');
            if (overlay) {
                overlay.classList.remove('show');
            }
        }

        document.getElementById('popupCloseBtn')?.addEventListener('click', hideSuccessPopup);
        document.getElementById('reviewSuccessOverlay')?.addEventListener('click', function(e) {
            if (e.target === this) hideSuccessPopup();
        });
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') hideSuccessPopup();
        });

        // ===== FORM SUBMIT =====
        form.addEventListener('submit', function(e) {
            const isRatingValid = validateRating();
            const isCommentValid = validateComment();

            if (!isRatingValid || !isCommentValid) {
                e.preventDefault();

                // Scroll to first error
                const firstError = document.querySelector('.rating-feedback.invalid, .comment-feedback.invalid');
                if (firstError) {
                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }

                // Shake invalid elements
                if (!isRatingValid) {
                    ratingWrapper.style.animation = 'none';
                    setTimeout(() => {
                        ratingWrapper.style.animation = 'shakeRating 0.5s ease';
                    }, 10);
                }

                if (!isCommentValid && comment.classList.contains('is-invalid')) {
                    comment.style.animation = 'none';
                    setTimeout(() => {
                        comment.style.animation = 'shakeField 0.5s ease';
                    }, 10);
                }
            } else {
                // Show loading state
                submitBtn.classList.add('is-loading');
                submitBtn.disabled = true;

                // Show success popup after a tiny delay (form will submit)
                setTimeout(() => {
                    showSuccessPopup();
                }, 300);

                // Allow form to submit naturally
                // The page will reload with the updated review
            }
        });

        // ===== INITIAL SETUP =====
        window.addEventListener('DOMContentLoaded', function() {
            // Set initial star colors based on current rating
            const currentRating = {{ $review->rating ?? 0 }};
            if (currentRating > 0) {
                updateStarColors(currentRating);
            }
            
            validateRating();
            validateComment();
            
            const len = comment.value.length;
            charCount.textContent = len;
            
            // Initialize progress bar
            const minLength = 3;
            const progressPct = Math.min(100, (len / minLength) * 100);
            charProgress.style.width = progressPct + '%';
            charProgress.classList.toggle('complete', len >= minLength);
            
            if (len >= 3 && len <= 500) {
                charCounter.classList.add('valid');
            } else if (len > 0) {
                charCounter.classList.add('invalid');
            }
        });

        // ===== FLASH MESSAGE HANDLER =====
        @if(session('success'))
            document.addEventListener('DOMContentLoaded', function() {
                showSuccessPopup();
            });
        @endif

    })();
</script>

@endsection