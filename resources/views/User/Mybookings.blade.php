<style>
    /* ===== IMPORTS & RESET ===== */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');

    /* ===== CUSTOM PROPERTIES ===== */
    .bookings-page {
        --primary: #DC2626;
        --primary-dark: #B91C1C;
        --primary-light: #EF4444;
        --primary-gradient: linear-gradient(135deg, #DC2626 0%, #EF4444 50%, #F87171 100%);
        --primary-bg: rgba(220, 38, 38, 0.08);
        --primary-border: rgba(220, 38, 38, 0.15);
        --shadow-sm: 0 4px 20px rgba(220, 38, 38, 0.08);
        --shadow-md: 0 8px 40px rgba(220, 38, 38, 0.12);
        --shadow-lg: 0 16px 60px rgba(220, 38, 38, 0.18);
        --shadow-xl: 0 24px 80px rgba(220, 38, 38, 0.25);
        --shadow-glow: 0 0 40px rgba(220, 38, 38, 0.15);
        --radius: 20px;
        --radius-sm: 12px;
        --transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        --success: #16A34A;
        --success-dark: #15803D;
        --success-bg: rgba(22, 163, 74, 0.1);
        --gray-50: #FAFAFA;
        --gray-100: #F4F4F5;
        --gray-200: #E4E4E7;
        --gray-300: #D4D4D8;
        --gray-600: #71717A;
        --gray-700: #3F3F46;
        --gray-900: #18181B;
        --red-50: #FEF2F2;
        --red-100: #FEE2E2;
        --red-200: #FECACA;
    }

    .bookings-page {
        max-width: 1280px;
        margin: 0 auto;
        padding: 2.5rem 2rem 5rem;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        background: linear-gradient(135deg, #FEF2F2 0%, #FFFFFF 50%, #FEF2F2 100%);
        min-height: 100vh;
        position: relative;
    }

    /* ===== ANIMATED BACKGROUND ===== */
    .bookings-page::before {
        content: '';
        position: fixed;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background:
            radial-gradient(ellipse at 20% 50%, rgba(220, 38, 38, 0.04) 0%, transparent 50%),
            radial-gradient(ellipse at 80% 50%, rgba(239, 68, 68, 0.04) 0%, transparent 50%);
        animation: bgFloat 20s ease-in-out infinite alternate;
        z-index: 0;
        pointer-events: none;
    }

    @keyframes bgFloat {
        0% { transform: translate(0, 0) rotate(0deg); }
        100% { transform: translate(2%, -2%) rotate(2deg); }
    }

    .bookings-page::after {
        content: '';
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background-image:
            radial-gradient(2px 2px at 20px 30px, rgba(220, 38, 38, 0.1), transparent),
            radial-gradient(2px 2px at 40px 70px, rgba(239, 68, 68, 0.1), transparent),
            radial-gradient(2px 2px at 50px 160px, rgba(220, 38, 38, 0.1), transparent),
            radial-gradient(2px 2px at 90px 40px, rgba(239, 68, 68, 0.1), transparent),
            radial-gradient(2px 2px at 130px 80px, rgba(220, 38, 38, 0.1), transparent);
        background-size: 200px 200px;
        opacity: 0.5;
        z-index: 0;
        pointer-events: none;
        animation: particlesFloat 30s linear infinite;
    }

    @keyframes particlesFloat {
        0% { transform: translateY(0); }
        100% { transform: translateY(-100px); }
    }

    .bookings-page > * {
        position: relative;
        z-index: 1;
    }

    /* ===== HEADER ===== */
    .bookings-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1.5rem;
        margin-bottom: 3rem;
        padding: 2rem 2.5rem;
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-radius: var(--radius);
        border: 1px solid rgba(220, 38, 38, 0.1);
        box-shadow: var(--shadow-sm);
        position: relative;
        overflow: hidden;
        animation: headerDrop 0.7s cubic-bezier(0.34, 1.56, 0.64, 1) both;
    }

    @keyframes headerDrop {
        from { opacity: 0; transform: translateY(-24px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .bookings-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--primary-gradient);
        background-size: 200% 100%;
        animation: shimmer 3s ease-in-out infinite;
    }

    @keyframes shimmer {
        0%, 100% { background-position: -200% 0; }
        50% { background-position: 200% 0; }
    }

    .bookings-header::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(220, 38, 38, 0.05) 0%, transparent 70%);
        border-radius: 50%;
        animation: pulseGlow 4s ease-in-out infinite;
    }

    @keyframes pulseGlow {
        0%, 100% { transform: scale(1); opacity: 0.5; }
        50% { transform: scale(1.5); opacity: 1; }
    }

    .bookings-header-left {
        display: flex;
        align-items: center;
        gap: 1.25rem;
        position: relative;
        z-index: 1;
    }

    .bookings-header-left .header-icon {
        width: 60px;
        height: 60px;
        border-radius: 18px;
        background: var(--primary-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: white;
        box-shadow: 0 8px 24px rgba(220, 38, 38, 0.35);
        animation: float 6s ease-in-out infinite;
        position: relative;
        transition: var(--transition);
    }

    .bookings-header-left .header-icon:hover {
        transform: scale(1.1) rotate(-6deg);
        box-shadow: 0 12px 32px rgba(220, 38, 38, 0.45);
    }

    .bookings-header-left .header-icon::before {
        content: '';
        position: absolute;
        inset: -3px;
        border-radius: 20px;
        background: var(--primary-gradient);
        opacity: 0.3;
        filter: blur(8px);
        z-index: -1;
        animation: pulseRing 2s ease-in-out infinite;
    }

    @keyframes pulseRing {
        0%, 100% { transform: scale(1); opacity: 0.3; }
        50% { transform: scale(1.1); opacity: 0.6; }
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }

    .bookings-header-left h1 {
        font-size: 2.25rem;
        font-weight: 900;
        margin: 0;
        letter-spacing: -0.5px;
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        line-height: 1.2;
    }

    .bookings-header-left p {
        margin: 0.2rem 0 0;
        color: var(--gray-600);
        font-size: 0.95rem;
        font-weight: 400;
        -webkit-text-fill-color: var(--gray-600);
    }

    .bookings-header-right {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        flex-wrap: wrap;
        position: relative;
        z-index: 1;
    }

    .bookings-count-badge {
        background: var(--red-50);
        color: var(--primary);
        padding: 0.6rem 1.5rem;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.9rem;
        border: 2px solid var(--red-200);
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
        transition: var(--transition);
        backdrop-filter: blur(10px);
    }

    .bookings-count-badge:hover {
        transform: scale(1.05) translateY(-2px);
        box-shadow: var(--shadow-md);
        border-color: var(--primary);
    }

    .bookings-count-badge .count-number {
        background: var(--primary-gradient);
        color: white;
        padding: 0.1rem 0.7rem;
        border-radius: 50px;
        font-size: 0.8rem;
        transition: var(--transition);
        display: inline-block;
    }

    .bookings-count-badge.bump .count-number {
        animation: countBump 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    @keyframes countBump {
        0% { transform: scale(1); }
        40% { transform: scale(1.5) rotate(-6deg); }
        100% { transform: scale(1); }
    }

    .btn-primary-premium {
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
        padding: 0.6rem 1.75rem;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.9rem;
        border: none;
        background: var(--primary-gradient);
        color: white;
        cursor: pointer;
        text-decoration: none;
        transition: var(--transition);
        box-shadow: 0 4px 20px rgba(220, 38, 38, 0.35);
        position: relative;
        overflow: hidden;
    }

    .btn-primary-premium::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: 0.6s;
    }

    .btn-primary-premium:hover::before {
        left: 100%;
    }

    .btn-primary-premium:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 8px 32px rgba(220, 38, 38, 0.5);
        color: white;
        text-decoration: none;
    }

    .btn-primary-premium:active {
        transform: scale(0.95);
    }

    /* ===== BOOKING CARDS ===== */
    .booking-card {
        background: rgba(255, 255, 255, 0.92);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-radius: var(--radius);
        margin-bottom: 1.25rem;
        box-shadow: var(--shadow-sm);
        border: 1px solid rgba(220, 38, 38, 0.08);
        transition: var(--transition);
        position: relative;
        overflow: hidden;
        animation: cardAppear 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) both;
    }

    .booking-card:nth-child(1) { animation-delay: 0.05s; }
    .booking-card:nth-child(2) { animation-delay: 0.1s; }
    .booking-card:nth-child(3) { animation-delay: 0.15s; }
    .booking-card:nth-child(4) { animation-delay: 0.2s; }
    .booking-card:nth-child(5) { animation-delay: 0.25s; }
    .booking-card:nth-child(n+6) { animation-delay: 0.3s; }

    @keyframes cardAppear {
        from {
            opacity: 0;
            transform: translateY(40px) scale(0.98);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* Pulse the whole card green for a moment right after a review lands */
    @keyframes cardJustReviewed {
        0% { box-shadow: var(--shadow-sm); border-color: rgba(220, 38, 38, 0.08); }
        30% { box-shadow: 0 0 0 4px rgba(22, 163, 74, 0.25), var(--shadow-md); border-color: rgba(22, 163, 74, 0.4); }
        100% { box-shadow: var(--shadow-sm); border-color: rgba(220, 38, 38, 0.08); }
    }

    .booking-card.just-reviewed {
        animation: cardJustReviewed 1.6s ease-out;
    }

    .booking-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 5px;
        height: 100%;
        background: var(--primary-gradient);
        opacity: 0;
        transition: var(--transition);
        border-radius: var(--radius) 0 0 var(--radius);
    }

    .booking-card:hover::before {
        opacity: 1;
    }

    .booking-card::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 350px;
        height: 350px;
        background: radial-gradient(circle, rgba(220, 38, 38, 0.04) 0%, transparent 70%);
        border-radius: 50%;
        transition: var(--transition);
        pointer-events: none;
    }

    .booking-card:hover::after {
        transform: scale(1.5) rotate(20deg);
        opacity: 0.8;
    }

    .booking-card:hover {
        transform: translateY(-6px) scale(1.005);
        box-shadow: var(--shadow-lg);
        border-color: rgba(220, 38, 38, 0.2);
        background: rgba(255, 255, 255, 0.98);
    }

    .booking-card-inner {
        display: grid;
        grid-template-columns: 1.8fr 1.4fr 1.2fr 1fr 1.4fr;
        align-items: center;
        padding: 1.5rem 2rem;
        gap: 1.25rem;
        position: relative;
        z-index: 1;
    }

    /* Item Info */
    .booking-item {
        display: flex;
        align-items: center;
        gap: 1.25rem;
        min-width: 0;
    }

    .booking-item .item-icon {
        width: 58px;
        height: 58px;
        min-width: 58px;
        border-radius: 16px;
        background: var(--red-50);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border: 2px solid var(--red-200);
        transition: var(--transition);
        position: relative;
        box-shadow: 0 2px 8px rgba(220, 38, 38, 0.06);
    }

    .booking-item .item-icon::after {
        content: '';
        position: absolute;
        inset: 0;
        background: var(--primary-gradient);
        opacity: 0;
        transition: var(--transition);
        border-radius: 14px;
    }

    .booking-card:hover .item-icon::after {
        opacity: 0.1;
    }

    .booking-card:hover .item-icon {
        transform: scale(1.08) rotate(-5deg);
        border-color: var(--primary);
        box-shadow: 0 8px 24px rgba(220, 38, 38, 0.15);
    }

    .booking-item .item-icon img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        position: relative;
        z-index: 1;
    }

    .booking-item .item-icon i {
        font-size: 1.6rem;
        color: var(--primary);
        position: relative;
        z-index: 1;
    }

    .booking-item .item-info {
        min-width: 0;
    }

    .booking-item .item-name {
        font-weight: 700;
        font-size: 1.05rem;
        color: var(--gray-900);
        margin: 0;
        line-height: 1.3;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        transition: color 0.3s;
    }

    .booking-card:hover .item-name {
        color: var(--primary);
    }

    .booking-item .item-category {
        font-size: 0.8rem;
        color: var(--gray-600);
        display: flex;
        align-items: center;
        gap: 0.3rem;
        margin-top: 0.2rem;
    }

    .booking-item .item-category .category-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--primary-gradient);
        display: inline-block;
        animation: pulseDot 2s ease-in-out infinite;
    }

    @keyframes pulseDot {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.5; transform: scale(0.8); }
    }

    /* Dates */
    .booking-dates {
        display: flex;
        flex-direction: column;
        gap: 0.2rem;
    }

    .booking-dates .date-label {
        font-size: 0.7rem;
        color: var(--gray-600);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        opacity: 0.7;
    }

    .booking-dates .date-value {
        font-size: 0.95rem;
        font-weight: 600;
        color: var(--gray-900);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .booking-dates .date-value i {
        color: var(--primary-light);
        font-size: 0.9rem;
    }

    /* Total Amount */
    .booking-amount {
        font-size: 1.3rem;
        font-weight: 900;
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        display: flex;
        align-items: baseline;
        gap: 0.1rem;
        letter-spacing: -0.5px;
    }

    .booking-amount .currency {
        font-size: 0.85rem;
        font-weight: 700;
        -webkit-text-fill-color: var(--primary);
    }

    /* Status */
    .status-badge-premium {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.45rem 1.25rem;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.8rem;
        border: none;
        cursor: default;
        white-space: nowrap;
        transition: var(--transition);
        position: relative;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    }

    .status-badge-premium::before {
        content: '';
        position: absolute;
        inset: 0;
        opacity: 0.5;
        border-radius: 50px;
    }

    .status-badge-premium:hover {
        transform: scale(1.05) translateY(-2px);
        box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    }

    .status-badge-premium.pending {
        background: linear-gradient(135deg, #FEF3C7, #FDE68A);
        color: #92400E;
    }

    .status-badge-premium.pending i {
        animation: pulse-dot 1.5s ease-in-out infinite;
    }

    .status-badge-premium.approved {
        background: linear-gradient(135deg, #D1FAE5, #A7F3D0);
        color: #065F46;
    }

    .status-badge-premium.rejected {
        background: linear-gradient(135deg, #FEE2E2, #FCA5A5);
        color: #991B1B;
    }

    .status-badge-premium.completed {
        background: linear-gradient(135deg, #DBEAFE, #93C5FD);
        color: #1E40AF;
    }

    @keyframes pulse-dot {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.5; transform: scale(0.8); }
    }

    /* Actions */
    .booking-actions {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        flex-wrap: wrap;
    }

    .btn-action-premium {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.45rem 1.1rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.8rem;
        border: 2px solid var(--gray-200);
        background: transparent;
        color: var(--gray-600);
        cursor: pointer;
        text-decoration: none;
        transition: var(--transition);
        white-space: nowrap;
        position: relative;
        overflow: hidden;
    }

    .btn-action-premium::before {
        content: '';
        position: absolute;
        inset: 0;
        background: var(--primary-gradient);
        opacity: 0;
        transition: var(--transition);
    }

    .btn-action-premium:hover::before {
        opacity: 1;
    }

    .btn-action-premium:hover {
        border-color: transparent;
        transform: translateY(-3px);
        box-shadow: var(--shadow-md);
        color: white;
        text-decoration: none;
    }

    .btn-action-premium:active {
        transform: translateY(-1px) scale(0.96);
    }

    .btn-action-premium:hover i,
    .btn-action-premium:hover span {
        position: relative;
        z-index: 1;
    }

    .btn-action-premium i,
    .btn-action-premium span {
        position: relative;
        z-index: 1;
    }

    .btn-action-premium.primary {
        border-color: var(--primary);
        color: var(--primary);
        background: var(--red-50);
    }

    .btn-action-premium.primary:hover {
        background: var(--primary);
        color: white;
        border-color: var(--primary);
        box-shadow: 0 4px 20px rgba(220, 38, 38, 0.35);
    }

    .btn-action-premium.success {
        border-color: var(--success);
        color: var(--success);
    }

    .btn-action-premium.success:hover {
        background: var(--success);
        color: white;
        border-color: var(--success);
    }

    /* Disabled state should look calm, not invite clicks */
    .btn-action-premium:disabled {
        cursor: not-allowed;
        opacity: 0.55;
        border-color: var(--gray-200);
        color: var(--gray-300);
        background: var(--gray-100);
        transform: none !important;
        box-shadow: none !important;
    }

    .btn-action-premium:disabled::before {
        display: none;
    }

    /* Spinner for submit-in-flight state */
    .btn-action-premium .btn-spinner {
        width: 14px;
        height: 14px;
        border: 2px solid rgba(255, 255, 255, 0.4);
        border-top-color: white;
        border-radius: 50%;
        display: none;
        animation: spin 0.7s linear infinite;
    }

    .btn-action-premium.is-loading .btn-spinner {
        display: inline-block;
    }

    .btn-action-premium.is-loading .btn-label,
    .btn-action-premium.is-loading i.bi-send {
        display: none;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    .btn-reviewed-premium {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.45rem 1.1rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.8rem;
        background: linear-gradient(135deg, var(--success-bg), rgba(22, 163, 74, 0.2));
        color: var(--success);
        border: 2px solid rgba(22, 163, 74, 0.3);
        cursor: default;
        white-space: nowrap;
        transition: var(--transition);
        box-shadow: 0 2px 8px rgba(22, 163, 74, 0.08);
        animation: reviewedAppear 0.5s cubic-bezier(0.34, 1.56, 0.64, 1) both;
    }

    @keyframes reviewedAppear {
        from { opacity: 0; transform: scale(0.6) rotate(-10deg); }
        to { opacity: 1; transform: scale(1) rotate(0); }
    }

    .btn-reviewed-premium:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 16px rgba(22, 163, 74, 0.15);
    }

    /* ===== EMPTY STATE ===== */
    .empty-state-premium {
        text-align: center;
        padding: 5rem 3rem;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(20px);
        border-radius: var(--radius);
        border: 2px dashed var(--red-200);
        transition: var(--transition);
        position: relative;
        overflow: hidden;
    }

    .empty-state-premium::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(220, 38, 38, 0.05) 0%, transparent 70%);
        border-radius: 50%;
        animation: pulseGlow 4s ease-in-out infinite;
    }

    .empty-state-premium:hover {
        border-color: var(--primary);
        transform: scale(1.01);
        box-shadow: var(--shadow-md);
    }

    .empty-state-premium .empty-icon {
        font-size: 5rem;
        display: block;
        margin-bottom: 1.5rem;
        animation: float 6s ease-in-out infinite;
    }

    .empty-state-premium h3 {
        font-size: 1.75rem;
        font-weight: 800;
        color: var(--gray-900);
        margin: 0 0 0.5rem;
    }

    .empty-state-premium h3 .highlight {
        color: var(--primary);
    }

    .empty-state-premium p {
        font-size: 1rem;
        color: var(--gray-600);
        margin: 0 0 2rem;
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
    }

    /* ===== REVIEW MODAL ===== */
    .modal-review-premium .modal-content {
        border-radius: 24px !important;
        border: none !important;
        overflow: hidden;
        box-shadow: var(--shadow-xl) !important;
        background: rgba(255, 255, 255, 0.98) !important;
        backdrop-filter: blur(20px) !important;
    }

    .modal-review-premium .modal-header {
        background: var(--primary-gradient);
        padding: 1.5rem 2rem;
        border-bottom: none;
        position: relative;
        overflow: hidden;
    }

    .modal-review-premium .modal-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 200px;
        height: 200px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        animation: pulseGlow 4s ease-in-out infinite;
    }

    .modal-review-premium .modal-header .modal-title {
        color: white;
        font-weight: 800;
        font-size: 1.25rem;
        position: relative;
        z-index: 1;
    }

    .modal-review-premium .modal-header .modal-title i {
        margin-right: 0.6rem;
        animation: float 3s ease-in-out infinite;
    }

    .modal-review-premium .modal-header .btn-close {
        filter: brightness(0) invert(1);
        opacity: 0.8;
        transition: opacity 0.3s;
        position: relative;
        z-index: 1;
    }

    .modal-review-premium .modal-header .btn-close:hover {
        opacity: 1;
        transform: rotate(90deg);
        transition: transform 0.3s;
    }

    .modal-review-premium .modal-body {
        padding: 2rem;
        background: transparent;
    }

    .modal-review-premium .modal-footer {
        padding: 1.25rem 2rem 2rem;
        border-top: 1px solid var(--gray-200);
        background: transparent;
        gap: 0.75rem;
    }

    /* Review Item Info */
    .review-item-premium {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem 1.25rem;
        background: var(--red-50);
        border-radius: var(--radius-sm);
        border: 2px solid var(--red-200);
        margin-bottom: 1.5rem;
        transition: var(--transition);
    }

    .review-item-premium:hover {
        border-color: var(--primary);
        box-shadow: var(--shadow-sm);
        transform: translateY(-2px);
    }

    .review-item-premium .review-icon {
        width: 48px;
        height: 48px;
        min-width: 48px;
        border-radius: 12px;
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border: 2px solid var(--red-200);
    }

    .review-item-premium .review-icon img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .review-item-premium .review-icon i {
        font-size: 1.5rem;
        color: var(--primary);
    }

    .review-item-premium .review-name {
        font-weight: 700;
        font-size: 1rem;
        color: var(--gray-900);
        margin: 0;
    }

    .review-item-premium .review-detail {
        font-size: 0.85rem;
        color: var(--gray-600);
        margin: 0.1rem 0 0;
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }

    .review-item-premium .review-detail i {
        color: var(--primary-light);
    }

    /* Star Rating */
    .star-rating-premium {
        display: flex;
        gap: 0.5rem;
        font-size: 3rem;
        direction: rtl;
        justify-content: center;
        padding: 0.5rem 0;
    }

    .star-rating-premium input {
        display: none;
    }

    .star-rating-premium label {
        color: var(--gray-300);
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        padding: 0 0.2rem;
        position: relative;
    }

    .star-rating-premium label:hover,
    .star-rating-premium label:hover ~ label,
    .star-rating-premium input:checked ~ label {
        color: #F59E0B;
        transform: scale(1.3) rotate(-8deg);
        text-shadow: 0 0 30px rgba(245, 158, 11, 0.4);
    }

    .star-rating-premium label:active {
        transform: scale(0.9);
    }

    .rating-label-premium {
        text-align: center;
        font-weight: 700;
        font-size: 1.1rem;
        color: var(--gray-700);
        margin-top: 0.25rem;
        transition: var(--transition);
        padding: 0.3rem;
        border-radius: 8px;
    }

    .rating-label-premium.bump {
        animation: countBump 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .rating-label-premium .rating-emoji {
        display: inline-block;
        animation: float 3s ease-in-out infinite;
    }

    /* Review Textarea */
    .review-textarea-premium {
        border-radius: var(--radius-sm) !important;
        border: 2px solid var(--gray-200) !important;
        padding: 0.85rem 1.25rem !important;
        font-size: 0.95rem !important;
        font-family: 'Inter', sans-serif !important;
        transition: var(--transition) !important;
        background: rgba(255, 255, 255, 0.9) !important;
        width: 100% !important;
        resize: vertical !important;
        min-height: 100px !important;
        color: var(--gray-900) !important;
    }

    .review-textarea-premium:focus {
        border-color: var(--primary) !important;
        box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.1) !important;
        outline: none !important;
        transform: translateY(-2px);
        background: white !important;
    }

    .review-textarea-premium::placeholder {
        color: var(--gray-300);
    }

    .review-textarea-premium.is-invalid {
        border-color: #EF4444 !important;
        box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1) !important;
    }

    .review-textarea-premium.is-valid {
        border-color: var(--success) !important;
        box-shadow: 0 0 0 4px rgba(22, 163, 74, 0.1) !important;
    }

    .char-counter {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 0.4rem;
        font-size: 0.8rem;
        color: var(--gray-600);
        margin-top: 0.4rem;
        font-weight: 600;
        transition: var(--transition);
    }

    .char-counter.valid {
        color: var(--success);
    }

    .char-counter.invalid {
        color: #EF4444;
    }

    /* Tiny progress bar under the textarea showing distance to minlength */
    .char-progress-track {
        width: 100%;
        height: 4px;
        background: var(--gray-200);
        border-radius: 4px;
        margin-top: 0.5rem;
        overflow: hidden;
    }

    .char-progress-fill {
        height: 100%;
        width: 0%;
        border-radius: 4px;
        background: linear-gradient(90deg, #EF4444, #F59E0B);
        transition: width 0.25s ease, background 0.3s ease;
    }

    .char-progress-fill.complete {
        background: linear-gradient(90deg, var(--success), var(--success-dark));
    }

    .review-textarea-premium.shake-invalid {
        animation: shake 0.5s ease;
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        10%, 30%, 50%, 70%, 90% { transform: translateX(-6px); }
        20%, 40%, 60%, 80% { transform: translateX(6px); }
    }

    /* ===== SUCCESS TOAST ===== */
    .toast-premium-success {
        border-radius: 16px !important;
        border: none !important;
        box-shadow: var(--shadow-xl) !important;
        background: white !important;
        padding: 0 !important;
        min-width: 400px !important;
        overflow: hidden !important;
        animation: toastIn 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) !important;
    }

    @keyframes toastIn {
        from {
            opacity: 0;
            transform: translateY(40px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .toast-premium-success .toast-header {
        background: linear-gradient(135deg, var(--success), var(--success-dark));
        color: white;
        border-radius: 16px 16px 0 0 !important;
        padding: 0.85rem 1.25rem;
        border: none;
        position: relative;
        overflow: hidden;
    }

    .toast-premium-success .toast-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 120px;
        height: 120px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        animation: pulseGlow 4s ease-in-out infinite;
    }

    .toast-premium-success .toast-header i {
        font-size: 1.4rem;
        margin-right: 0.5rem;
        position: relative;
        z-index: 1;
        animation: float 3s ease-in-out infinite;
    }

    .toast-premium-success .toast-header strong {
        position: relative;
        z-index: 1;
    }

    .toast-premium-success .toast-header .btn-close {
        filter: brightness(0) invert(1);
        opacity: 0.8;
        position: relative;
        z-index: 1;
    }

    .toast-premium-success .toast-header .btn-close:hover {
        opacity: 1;
        transform: rotate(90deg);
        transition: transform 0.3s;
    }

    .toast-premium-success .toast-body {
        padding: 1.25rem 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        background: linear-gradient(135deg, #F0FDF4, #ECFDF5);
        border-radius: 0 0 16px 16px;
    }

    .toast-premium-success .toast-body .toast-icon-wrapper {
        width: 52px;
        height: 52px;
        min-width: 52px;
        border-radius: 50%;
        background: linear-gradient(135deg, #D1FAE5, #A7F3D0);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
        color: var(--success);
        animation: float 4s ease-in-out infinite;
        box-shadow: 0 4px 16px rgba(22, 163, 74, 0.2);
    }

    .toast-premium-success .toast-body .toast-content {
        flex: 1;
    }

    .toast-premium-success .toast-body .toast-content .toast-title {
        font-weight: 800;
        font-size: 1rem;
        color: var(--gray-900);
        margin: 0;
    }

    .toast-premium-success .toast-body .toast-content .toast-message {
        font-size: 0.9rem;
        color: var(--gray-600);
        margin: 0.15rem 0 0;
    }

    /* ===== CENTER SUCCESS POPUP (fires instantly on submit) ===== */
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
        padding: 2.5rem 2.75rem;
        max-width: 380px;
        text-align: center;
        box-shadow: var(--shadow-xl);
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
        width: 84px;
        height: 84px;
        margin: 0 auto 1.25rem;
        border-radius: 50%;
        background: linear-gradient(135deg, #D1FAE5, #A7F3D0);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.6rem;
        color: var(--success);
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
        color: #F59E0B;
        margin-bottom: 0.75rem;
        letter-spacing: 0.2rem;
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

    @keyframes starPop {
        from { opacity: 0; transform: scale(0) rotate(-20deg); }
        to { opacity: 1; transform: scale(1) rotate(0); }
    }

    .review-success-popup h4 {
        font-weight: 800;
        font-size: 1.3rem;
        color: var(--gray-900);
        margin: 0 0 0.4rem;
        position: relative;
        z-index: 1;
    }

    .review-success-popup p {
        font-size: 0.92rem;
        color: var(--gray-600);
        margin: 0 0 1.5rem;
        line-height: 1.5;
        position: relative;
        z-index: 1;
    }

    .review-success-popup .popup-close-btn {
        background: var(--primary-gradient);
        color: white;
        border: none;
        padding: 0.65rem 2.25rem;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.9rem;
        cursor: pointer;
        transition: var(--transition);
        box-shadow: 0 4px 20px rgba(220, 38, 38, 0.3);
        position: relative;
        z-index: 1;
    }

    .review-success-popup .popup-close-btn:hover {
        transform: translateY(-2px) scale(1.03);
        box-shadow: 0 8px 28px rgba(220, 38, 38, 0.4);
    }

    .review-success-popup .popup-close-btn:active {
        transform: scale(0.95);
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 1024px) {
        .booking-card-inner {
            grid-template-columns: 1.5fr 1.2fr 1fr 1fr 1.2fr;
            padding: 1.25rem;
            gap: 0.75rem;
        }
    }

    @media (max-width: 768px) {
        .bookings-page {
            padding: 1rem 0.75rem 2rem;
        }

        .bookings-header {
            flex-direction: column;
            align-items: stretch;
            gap: 1rem;
            padding: 1.25rem;
        }

        .bookings-header-left h1 {
            font-size: 1.5rem;
        }

        .bookings-header-left .header-icon {
            width: 48px;
            height: 48px;
            font-size: 1.4rem;
        }

        .bookings-header-right {
            justify-content: flex-start;
            flex-wrap: wrap;
        }

        .booking-card-inner {
            grid-template-columns: 1fr;
            gap: 0.75rem;
            padding: 1.25rem;
        }

        .booking-item .item-name {
            white-space: normal;
        }

        .booking-actions {
            justify-content: flex-start;
        }

        .status-badge-premium {
            align-self: flex-start;
        }

        .modal-review-premium .modal-body {
            padding: 1.25rem;
        }

        .modal-review-premium .modal-footer {
            flex-direction: column;
        }

        .modal-review-premium .modal-footer button {
            width: 100%;
            justify-content: center;
        }

        .star-rating-premium {
            font-size: 2.2rem;
        }

        .toast-premium-success {
            min-width: unset !important;
            width: 100% !important;
        }

        .empty-state-premium {
            padding: 3rem 1.5rem;
        }

        .empty-state-premium .empty-icon {
            font-size: 3.5rem;
        }

        .review-success-popup {
            padding: 2rem 1.75rem;
            max-width: 92vw;
        }
    }

    @media (max-width: 480px) {
        .booking-item .item-icon {
            width: 44px;
            height: 44px;
            min-width: 44px;
        }

        .booking-amount {
            font-size: 1.1rem;
        }

        .booking-dates .date-value {
            font-size: 0.85rem;
        }

        .star-rating-premium {
            font-size: 1.8rem;
        }
    }

    /* Respect reduced motion preference */
    @media (prefers-reduced-motion: reduce) {
        .bookings-page *,
        .bookings-page *::before,
        .bookings-page *::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }
    }
</style>

<div class="bookings-page">
    <!-- ===== HEADER ===== -->
    <div class="bookings-header">
        <div class="bookings-header-left">
            <div class="header-icon">
                <i class="bi bi-calendar-check"></i>
            </div>
            <div>
                <h1>My Bookings</h1>
                <p>Manage and track all your rental bookings</p>
            </div>
        </div>
        <div class="bookings-header-right">
            <span class="bookings-count-badge" id="bookingsCountBadge">
                <i class="bi bi-calendar2-check"></i>
                <span class="count-number" id="bookingsCountNumber">{{ $bookings->count() }}</span>
                {{ Str::plural('Booking', $bookings->count()) }}
            </span>
            <a href="/items" class="btn-primary-premium">
                <i class="bi bi-compass"></i>
                Explore Items
            </a>
        </div>
    </div>

    <!-- ===== BOOKING LIST ===== -->
    @forelse($bookings as $booking)
        @php
            $item = $booking->item;
            $itemTitle = $item->title ?? 'Untitled Item';
            $itemCategory = $item->category->name ?? null;
            $itemImage = $item->images->first()->image ?? null;
            $totalAmount = $booking->total_amount ?? $booking->amount ?? 0;
            $hasReviewed = !is_null($booking->review);

            $startDate = isset($booking->start_date) ? \Carbon\Carbon::parse($booking->start_date) : null;
            $endDate = isset($booking->end_date) ? \Carbon\Carbon::parse($booking->end_date) : null;
            $bookingDate = isset($booking->booking_date) ? \Carbon\Carbon::parse($booking->booking_date) : null;
        @endphp

        <div class="booking-card" id="bookingCard{{ $booking->id }}" data-booking-id="{{ $booking->id }}">
            <div class="booking-card-inner">
                <!-- Item Name -->
                <div class="booking-item">
                    <div class="item-icon">
@if($booking->item->images->count())
<img src="{{ asset('uploads/items/'.$itemImage) }}"
     alt="{{ $itemTitle }}">                            
                        @else
                            <i class="bi bi-box-seam"></i>
                        @endif
                    </div>
                    <div class="item-info">
                        <div class="item-name">{{ $itemTitle }}</div>
                        @if($itemCategory)
                            <div class="item-category">
                                <span class="category-dot"></span>
                                {{ $itemCategory }}
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Dates -->
                <div class="booking-dates">
                    @if($startDate && $endDate)
                        <span class="date-label">Duration</span>
                        <span class="date-value">
                            <i class="bi bi-calendar-range"></i>
                            {{ $startDate->format('M d') }} - {{ $endDate->format('M d, Y') }}
                        </span>
                    @elseif($bookingDate)
                        <span class="date-label">Booking Date</span>
                        <span class="date-value">
                            <i class="bi bi-calendar-event"></i>
                            {{ $bookingDate->format('M d, Y') }}
                        </span>
                    @else
                        <span class="date-label">Date</span>
                        <span class="date-value">
                            <i class="bi bi-calendar"></i>
                            N/A
                        </span>
                    @endif
                </div>

                <!-- Total Amount -->
                <div class="booking-amount">
                    <span class="currency">$</span>{{ number_format($totalAmount, 2) }}
                </div>

                <!-- Status -->
                @php
                    $statusConfig = [
                        'pending'   => ['class' => 'pending', 'icon' => 'bi-hourglass-split', 'label' => 'Pending'],
                        'approved'  => ['class' => 'approved', 'icon' => 'bi-check-circle-fill', 'label' => 'Approved'],
                        'rejected'  => ['class' => 'rejected', 'icon' => 'bi-x-circle-fill', 'label' => 'Rejected'],
                        'completed' => ['class' => 'completed', 'icon' => 'bi-check2-all', 'label' => 'Completed'],
                    ];
                    $status = $statusConfig[$booking->status] ?? ['class' => 'pending', 'icon' => 'bi-question-circle', 'label' => ucfirst($booking->status)];
                @endphp
                <span class="status-badge-premium {{ $status['class'] }}">
                    <i class="bi {{ $status['icon'] }}"></i>
                    {{ $status['label'] }}
                </span>

                <!-- Actions -->
                <div class="booking-actions" id="bookingActions{{ $booking->id }}">
                    <a href="/booking/{{ $booking->id }}" class="btn-action-premium">
                        <i class="bi bi-eye"></i>
                        <span>View</span>
                    </a>

                    @if($booking->status == 'completed')
                        @if($hasReviewed)
                            <span class="btn-reviewed-premium">
                                <i class="bi bi-star-fill"></i>
                                Reviewed
                            </span>
                        @else
                            <button class="btn-action-premium primary" data-bs-toggle="modal" data-bs-target="#reviewModal{{ $booking->id }}">
                                <i class="bi bi-star"></i>
                                <span>Review</span>
                            </button>
                        @endif
                    @endif
                </div>
            </div>
        </div>

        <!-- ===== REVIEW MODAL ===== -->
        @if($booking->status == 'completed' && !$hasReviewed)
        <div class="modal fade modal-review-premium" id="reviewModal{{ $booking->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="bi bi-star-fill"></i>
                            Write a Review
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form method="POST" action="/booking/{{ $booking->id }}/review" id="reviewForm{{ $booking->id }}" data-booking-id="{{ $booking->id }}" data-item-name="{{ $itemTitle }}" novalidate>
                        @csrf
                        <div class="modal-body">
                            <!-- Item Info -->
                            <div class="review-item-premium">
                                <div class="review-icon">
                                    @if($itemImage)
                                        <img src="{{ asset('storage/' . $itemImage) }}" alt="{{ $itemTitle }}">
                                    @else
                                        <i class="bi bi-box-seam"></i>
                                    @endif
                                </div>
                                <div>
                                    <p class="review-name">{{ $itemTitle }}</p>
                                    <p class="review-detail">
                                        <i class="bi bi-calendar-check"></i>
                                        {{ $bookingDate ? $bookingDate->format('M d, Y') : 'N/A' }}
                                    </p>
                                </div>
                            </div>

                            <!-- Rating -->
                            <div class="text-center mb-4">
                                <label style="font-weight: 700; color: var(--gray-700); font-size: 0.95rem; display: block; margin-bottom: 0.5rem;">
                                    <i class="bi bi-stars" style="color: var(--primary);"></i>
                                    How was your experience?
                                </label>
                                <div class="star-rating-premium">
                                    <input type="radio" name="rating" value="5" id="star5{{ $booking->id }}" checked>
                                    <label for="star5{{ $booking->id }}">★</label>
                                    <input type="radio" name="rating" value="4" id="star4{{ $booking->id }}">
                                    <label for="star4{{ $booking->id }}">★</label>
                                    <input type="radio" name="rating" value="3" id="star3{{ $booking->id }}">
                                    <label for="star3{{ $booking->id }}">★</label>
                                    <input type="radio" name="rating" value="2" id="star2{{ $booking->id }}">
                                    <label for="star2{{ $booking->id }}">★</label>
                                    <input type="radio" name="rating" value="1" id="star1{{ $booking->id }}">
                                    <label for="star1{{ $booking->id }}">★</label>
                                </div>
                                <div class="rating-label-premium" id="ratingLabel{{ $booking->id }}">
                                    <span class="rating-emoji">🌟</span> Excellent!
                                </div>
                            </div>

                            <!-- Review Text -->
                            <div>
                                <label style="font-weight: 700; color: var(--gray-700); font-size: 0.9rem; display: block; margin-bottom: 0.5rem;">
                                    <i class="bi bi-chat-dots" style="color: var(--primary);"></i>
                                    Share your experience <span style="color: #EF4444;">*</span>
                                </label>
                                <textarea
                                    name="review"
                                    id="reviewText{{ $booking->id }}"
                                    rows="4"
                                    class="review-textarea-premium"
                                    placeholder="What did you like or dislike about this item? (minimum 10 characters, maximum 500)"
                                    required
                                    minlength="10"
                                    maxlength="500"
                                    oninput="validateReview({{ $booking->id }})"
                                ></textarea>
                                <div class="char-progress-track">
                                    <div class="char-progress-fill" id="charProgress{{ $booking->id }}"></div>
                                </div>
                                <div class="char-counter" id="charCounter{{ $booking->id }}">
                                    <span id="charCount{{ $booking->id }}">0</span> / 10 minimum
                                </div>
                                <div class="invalid-feedback" id="reviewFeedback{{ $booking->id }}" style="display: none; font-size: 0.85rem; color: #EF4444; margin-top: 0.25rem;">
                                    <i class="bi bi-exclamation-circle"></i>
                                    Please enter at least 10 characters for your review.
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-action-premium" data-bs-dismiss="modal" style="border-color: var(--gray-200);">
                                <i class="bi bi-x-lg"></i>
                                Cancel
                            </button>
                            <button type="submit" class="btn-action-premium primary" id="submitReview{{ $booking->id }}" disabled style="padding: 0.5rem 2rem; font-size: 0.9rem;">
                                <i class="bi bi-send"></i>
                                <span class="btn-label">Submit Review</span>
                                <span class="btn-spinner"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif

    @empty
        <!-- ===== EMPTY STATE ===== -->
        <div class="empty-state-premium">
            <span class="empty-icon">📭</span>
            <h3>No <span class="highlight">Bookings</span> Yet</h3>
            <p>You haven't made any bookings. Start exploring items and book your first one today!</p>
            <a href="/items" class="btn-primary-premium" style="padding: 0.75rem 2.5rem; font-size: 1rem;">
                <i class="bi bi-compass"></i>
                Explore Items
            </a>
        </div>
        
    @endforelse
</div>

<!-- ===== SUCCESS TOAST (bottom-right, persists across reload) ===== -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999;">
    <div id="reviewToast" class="toast toast-premium-success" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="6000">
        <div class="toast-header">
            <i class="bi bi-check-circle-fill"></i>
            <strong>Review Submitted</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
      
</div>

<!-- ===== CENTER SUCCESS POPUP (fires the instant Submit is clicked & valid) ===== -->
<div class="review-success-overlay" id="reviewSuccessOverlay">
    <div class="review-success-popup">
        <div class="popup-check">
            <i class="bi bi-check-lg"></i>
        </div>
        <div class="popup-stars">
            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
        </div>
        <h4 id="popupTitle">Review Submitted!</h4>
        <p id="popupMessage">Thanks for sharing your experience. Your feedback helps the community.</p>
        <button type="button" class="popup-close-btn" id="popupCloseBtn">Got it</button>
    </div>
</div>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- ===== JAVASCRIPT ===== -->
<script>
    const ratingEmojis = {
        1: '😤 Terrible',
        2: '😕 Poor',
        3: '😐 Average',
        4: '😊 Good',
        5: '🌟 Excellent!'
    };

    document.addEventListener('DOMContentLoaded', function() {
        // ---- Rating label live update ----
        document.querySelectorAll('.star-rating-premium input[type="radio"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const idMatch = this.id.match(/\d+/);
                if (idMatch) {
                    const id = idMatch[0];
                    const label = document.getElementById('ratingLabel' + id);
                    if (label) {
                        label.innerHTML = ratingEmojis[this.value] || '🌟 Excellent!';
                        label.classList.remove('bump');
                        // restart animation
                        void label.offsetWidth;
                        label.classList.add('bump');
                    }
                }
            });
        });

        // Set initial rating labels
        document.querySelectorAll('.star-rating-premium input[type="radio"]:checked').forEach(radio => {
            const idMatch = radio.id.match(/\d+/);
            if (idMatch) {
                const id = idMatch[0];
                const label = document.getElementById('ratingLabel' + id);
                if (label) {
                    label.innerHTML = ratingEmojis[radio.value] || '🌟 Excellent!';
                }
            }
        });

        // ---- Session-flashed toast (after a real page reload) ----
        @if(session('review_success'))
            showToast(@json(session('review_success')));
        @endif

        // ---- Wire up every review form for live validation + success popup ----
        document.querySelectorAll('form[id^="reviewForm"]').forEach(form => {
            form.addEventListener('submit', function(e) {
                const bookingId = this.dataset.bookingId;
                const textarea = this.querySelector('textarea[name="review"]');
                const submitBtn = document.getElementById('submitReview' + bookingId);

                const value = textarea ? textarea.value.trim() : '';
                const isValid = value.length >= 10 && value.length <= 500;

                if (!isValid) {
                    e.preventDefault();
                    validateReview(bookingId);

                    const feedback = document.getElementById('reviewFeedback' + bookingId);
                    if (feedback) {
                        feedback.style.display = 'block';
                        feedback.innerHTML = value.length === 0
                            ? '<i class="bi bi-exclamation-circle"></i> Please write a review before submitting.'
                            : '<i class="bi bi-exclamation-circle"></i> Please enter at least 10 characters for your review.';
                    }

                    if (textarea) {
                        textarea.classList.add('shake-invalid');
                        textarea.focus();
                        setTimeout(() => textarea.classList.remove('shake-invalid'), 500);
                    }
                    return;
                }

                // Valid: show the loading state on the button immediately,
                // and pop the success popup right on click rather than waiting
                // for a full page reload from the server.
                if (submitBtn) {
                    submitBtn.classList.add('is-loading');
                    submitBtn.disabled = true;
                }

                const itemName = this.dataset.itemName || 'this item';
                showSuccessPopup(itemName);

                // Reflect the "reviewed" state in this card right away so the
                // UI feels instant even before the server round-trip finishes.
                markCardAsReviewed(bookingId);

                // Let the form actually submit to the server as normal.
            });
        });
    });

    function validateReview(bookingId) {
        const textarea = document.getElementById('reviewText' + bookingId);
        const charCount = document.getElementById('charCount' + bookingId);
        const charCounter = document.getElementById('charCounter' + bookingId);
        const charProgress = document.getElementById('charProgress' + bookingId);
        const feedback = document.getElementById('reviewFeedback' + bookingId);
        const submitBtn = document.getElementById('submitReview' + bookingId);

        if (!textarea) return;

        const currentLength = textarea.value.length;
        const minLength = 10;
        const maxLength = 500;

        if (charCount) charCount.textContent = currentLength;

        const progressPct = Math.min(100, (currentLength / minLength) * 100);
        if (charProgress) {
            charProgress.style.width = progressPct + '%';
            charProgress.classList.toggle('complete', currentLength >= minLength);
        }

        if (currentLength >= minLength && currentLength <= maxLength) {
            textarea.classList.remove('is-invalid');
            textarea.classList.add('is-valid');
            charCounter.classList.remove('invalid');
            charCounter.classList.add('valid');
            if (feedback) feedback.style.display = 'none';
            if (submitBtn) submitBtn.disabled = false;
            if (charCounter) {
                charCounter.innerHTML = '<i class="bi bi-check-circle-fill"></i> ' + currentLength + ' / ' + maxLength;
            }
        } else if (currentLength > maxLength) {
            textarea.classList.remove('is-valid');
            textarea.classList.add('is-invalid');
            charCounter.classList.remove('valid');
            charCounter.classList.add('invalid');
            if (submitBtn) submitBtn.disabled = true;
            if (feedback) {
                feedback.style.display = 'block';
                feedback.innerHTML = '<i class="bi bi-exclamation-circle"></i> Keep your review under ' + maxLength + ' characters.';
            }
            if (charCounter) {
                charCounter.innerHTML = '<span>' + currentLength + '</span> / ' + maxLength + ' max';
            }
        } else {
            textarea.classList.remove('is-valid');
            textarea.classList.add('is-invalid');
            charCounter.classList.remove('valid');
            charCounter.classList.add('invalid');
            if (feedback) feedback.style.display = 'block';
            if (submitBtn) submitBtn.disabled = true;
            if (charCounter) {
                charCounter.innerHTML = '<span>' + currentLength + '</span> / ' + minLength + ' minimum';
            }
        }
    }

    function markCardAsReviewed(bookingId) {
        const card = document.getElementById('bookingCard' + bookingId);
        const actions = document.getElementById('bookingActions' + bookingId);
        if (card) {
            card.classList.add('just-reviewed');
        }
        if (actions) {
            const reviewBtn = actions.querySelector('button.btn-action-premium.primary');
            if (reviewBtn) {
                const replacement = document.createElement('span');
                replacement.className = 'btn-reviewed-premium';
                replacement.innerHTML = '<i class="bi bi-star-fill"></i> Reviewed';
                reviewBtn.replaceWith(replacement);
            }
        }
    }

    function showSuccessPopup(itemName) {
        const overlay = document.getElementById('reviewSuccessOverlay');
        const message = document.getElementById('popupMessage');
        if (message) {
            message.textContent = 'Thanks for reviewing "' + itemName + '". Your feedback helps the community.';
        }
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

    function showToast(message) {
        const toastElement = document.getElementById('reviewToast');
        const toastMessage = document.getElementById('toastMessage');

        if (toastMessage) {
            const msgElement = toastMessage.querySelector('.toast-message');
            if (msgElement) {
                msgElement.textContent = message || 'Your review has been submitted successfully.';
            }
        }

        if (toastElement && window.bootstrap) {
            const toast = new bootstrap.Toast(toastElement);
            toast.show();
        }

        // Give the booking count badge a small "something changed" bump too
        const badge = document.getElementById('bookingsCountBadge');
        if (badge) {
            badge.classList.remove('bump');
            void badge.offsetWidth;
            badge.classList.add('bump');
        }
    }
</script>