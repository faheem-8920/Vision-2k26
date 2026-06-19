<x-guest-layout>
    <style>
        :root {
            --primary: #dc2626;
            --primary-dark: #b91c1c;
            --primary-light: #fef2f2;
            --primary-gradient: linear-gradient(135deg, #dc2626, #b91c1c, #991b1b);
            --success: #10b981;
            --error: #ef4444;
            --warning: #f59e0b;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        /* Background with Red and White Theme */
        .password-reset-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: 
                radial-gradient(ellipse at 20% 50%, rgba(220,38,38,0.06) 0%, transparent 60%),
                radial-gradient(ellipse at 80% 50%, rgba(220,38,38,0.04) 0%, transparent 60%),
                radial-gradient(ellipse at 50% 100%, rgba(220,38,38,0.03) 0%, transparent 50%),
                #fafafa;
            position: relative;
            overflow: hidden;
        }

        /* Animated Gradient Orbs - Red Theme */
        .bg-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            opacity: 0.2;
            animation: orbFloat 12s ease-in-out infinite;
            will-change: transform;
        }

        .bg-orb-1 {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, #dc2626, transparent);
            top: -150px;
            right: -100px;
            animation-delay: 0s;
        }

        .bg-orb-2 {
            width: 350px;
            height: 350px;
            background: radial-gradient(circle, #b91c1c, transparent);
            bottom: -120px;
            left: -80px;
            animation-delay: -4s;
        }

        .bg-orb-3 {
            width: 250px;
            height: 250px;
            background: radial-gradient(circle, #ef4444, transparent);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation-delay: -8s;
            opacity: 0.1;
        }

        .bg-grid {
            position: absolute;
            inset: 0;
            background-image: 
                linear-gradient(rgba(220,38,38,0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(220,38,38,0.04) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
        }

        @keyframes orbFloat {
            0%, 100% { transform: translate(0, 0) scale(1); }
            25% { transform: translate(40px, -30px) scale(1.1); }
            50% { transform: translate(-30px, 40px) scale(0.9); }
            75% { transform: translate(30px, 30px) scale(1.05); }
        }

        /* Card - White Background */
        .reset-card {
            width: 100%;
            max-width: 460px;
            background: #ffffff;
            border-radius: 24px;
            padding: 24px 28px 20px;
            box-shadow: 
                0 20px 60px rgba(0, 0, 0, 0.06),
                0 0 0 1px rgba(220, 38, 38, 0.06);
            position: relative;
            overflow: hidden;
            animation: cardAppear 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        @keyframes cardAppear {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.96);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Red Border Accent */
        .card-accent {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #dc2626, #ef4444, #dc2626);
            background-size: 200% 100%;
            animation: accentMove 3s ease-in-out infinite;
        }

        @keyframes accentMove {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        /* Logo Section */
        .logo-section {
            text-align: center;
            margin-bottom: 16px;
            position: relative;
        }

        .logo-container {
            position: relative;
            display: inline-block;
            margin-bottom: 8px;
        }

        .logo-ring {
            width: 60px;
            height: 60px;
            margin: 0 auto;
            position: relative;
        }

        .logo-ring::before {
            content: '';
            position: absolute;
            inset: -3px;
            border-radius: 50%;
            background: conic-gradient(from 0deg, #dc2626, #ef4444, #fca5a5, #ef4444, #b91c1c, #dc2626);
            animation: ringSpin 6s linear infinite;
        }

        @keyframes ringSpin {
            to { transform: rotate(360deg); }
        }

        .logo-inner {
            position: relative;
            width: 100%;
            height: 100%;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: #dc2626;
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.12);
            z-index: 1;
        }

        .logo-inner i {
            animation: iconFloat 3s ease-in-out infinite;
        }

        @keyframes iconFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-3px); }
        }

        .reset-title {
            font-size: 22px;
            font-weight: 800;
            color: #dc2626;
            margin-bottom: 2px;
            letter-spacing: -0.5px;
        }

        .reset-subtitle {
            color: #6b7280;
            font-size: 12px;
            font-weight: 400;
            opacity: 0.8;
        }

        /* Success Message */
        .success-message {
            display: none;
            background: linear-gradient(135deg, #f0fdf4, #dcfce7);
            border-radius: 10px;
            padding: 12px 16px;
            margin-bottom: 16px;
            border-left: 4px solid #10b981;
            animation: successSlide 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .success-message.show {
            display: block;
        }

        @keyframes successSlide {
            from {
                opacity: 0;
                transform: translateY(-10px) scale(0.96);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .success-message .success-content {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .success-message .success-icon {
            width: 28px;
            height: 28px;
            background: #10b981;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 14px;
            flex-shrink: 0;
        }

        .success-message .success-text {
            flex: 1;
        }

        .success-message .success-title {
            font-weight: 700;
            color: #065f46;
            font-size: 13px;
        }

        .success-message .success-desc {
            color: #047857;
            font-size: 11px;
            margin-top: 1px;
        }

        .success-message .success-close {
            background: none;
            border: none;
            color: #6b7280;
            cursor: pointer;
            padding: 4px;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .success-message .success-close:hover {
            color: #dc2626;
            transform: rotate(90deg);
        }

        /* Form Groups */
        .form-group {
            margin-bottom: 12px;
            position: relative;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #374151;
            font-weight: 600;
            margin-bottom: 4px;
            font-size: 11px;
            transition: all 0.3s ease;
            padding-left: 2px;
        }

        .form-label i {
            font-size: 11px;
            color: #9ca3af;
            transition: all 0.3s ease;
        }

        .form-group:focus-within .form-label {
            color: #dc2626;
        }

        .form-group:focus-within .form-label i {
            color: #dc2626;
        }

        .input-wrapper {
            position: relative;
        }

        .form-input {
            width: 100%;
            padding: 8px 42px 8px 12px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 12px;
            color: #1f2937;
            background: #ffffff;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            height: 38px;
            font-weight: 500;
        }

        .form-input::placeholder {
            color: #9ca3af;
            font-weight: 400;
            font-size: 11px;
            opacity: 0.7;
        }

        .form-input:focus {
            outline: none;
            border-color: #dc2626;
            box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.06);
            transform: translateY(-1px);
        }

        .input-icon {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 12px;
            transition: all 0.3s ease;
            pointer-events: none;
        }

        .input-wrapper:focus-within .input-icon {
            color: #dc2626;
        }

        .password-toggle-btn {
            position: absolute;
            right: 36px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #9ca3af;
            cursor: pointer;
            padding: 4px;
            border-radius: 4px;
            transition: all 0.3s ease;
            z-index: 5;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .password-toggle-btn:hover {
            color: #dc2626;
            background: rgba(220, 38, 38, 0.05);
        }

        .char-counter {
            position: absolute;
            right: 62px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 9px;
            font-weight: 700;
            color: #9ca3af;
            opacity: 0.6;
            pointer-events: none;
            padding: 1px 4px;
            border-radius: 4px;
            background: rgba(0,0,0,0.02);
        }

        .char-counter.warning {
            color: #f59e0b;
            opacity: 1;
        }

        .char-counter.danger {
            color: #ef4444;
            opacity: 1;
        }

        /* Strength Meter - Red Theme */
        .strength-meter {
            margin-top: 6px;
            display: none;
            animation: strengthAppear 0.3s ease;
        }

        @keyframes strengthAppear {
            from {
                opacity: 0;
                transform: translateY(-5px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .strength-bar {
            display: flex;
            gap: 3px;
            margin-bottom: 3px;
        }

        .strength-segment {
            flex: 1;
            height: 3px;
            border-radius: 4px;
            background: #e5e7eb;
            transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .strength-segment.active-weak { background: #ef4444; }
        .strength-segment.active-fair { background: #f59e0b; }
        .strength-segment.active-good { background: #3b82f6; }
        .strength-segment.active-strong { background: #10b981; }

        .strength-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 9px;
        }

        .strength-label {
            font-weight: 700;
            color: #6b7280;
            transition: all 0.3s ease;
        }

        .strength-label.weak { color: #ef4444; }
        .strength-label.fair { color: #f59e0b; }
        .strength-label.good { color: #3b82f6; }
        .strength-label.strong { color: #10b981; }

        .strength-percent {
            font-weight: 800;
            color: #6b7280;
            font-size: 10px;
            transition: all 0.3s ease;
        }

        /* Requirements - Clean Red/White */
        .requirements-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2px 12px;
            margin-top: 4px;
            padding: 4px 6px;
            background: rgba(0,0,0,0.02);
            border-radius: 6px;
        }

        .requirement-item {
            display: flex;
            align-items: center;
            gap: 4px;
            color: #9ca3af;
            font-size: 10px;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 2px 4px;
            border-radius: 4px;
        }

        .requirement-item.met {
            color: #10b981;
        }

        .requirement-item .req-icon {
            font-size: 9px;
            width: 14px;
            text-align: center;
            flex-shrink: 0;
        }

        /* Match Indicator */
        .match-indicator {
            display: none;
            align-items: center;
            gap: 5px;
            margin-top: 4px;
            font-size: 10px;
            font-weight: 600;
            animation: matchSlide 0.3s ease;
            padding: 4px 10px;
            border-radius: 6px;
        }

        @keyframes matchSlide {
            from {
                opacity: 0;
                transform: translateY(-4px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .match-indicator.success {
            color: #10b981;
            background: rgba(16, 185, 129, 0.06);
        }

        .match-indicator.error {
            color: #ef4444;
            background: rgba(239, 68, 68, 0.06);
        }

        .match-indicator i {
            font-size: 12px;
        }

        /* Submit Button - Red Theme */
        .submit-btn {
            width: 100%;
            padding: 10px 20px;
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 16px;
            position: relative;
            overflow: hidden;
            height: 42px;
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.25);
        }

        .submit-btn::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.15), transparent);
            transition: left 0.6s ease;
        }

        .submit-btn:hover::after {
            left: 100%;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(220, 38, 38, 0.35);
        }

        .submit-btn:active {
            transform: translateY(0) scale(0.98);
        }

        .submit-btn .btn-icon {
            transition: transform 0.3s ease;
            font-size: 14px;
        }

        .submit-btn:hover .btn-icon {
            transform: translateX(4px);
        }

        /* Footer */
        .form-footer {
            margin-top: 14px;
            padding-top: 10px;
            border-top: 1px solid rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 4px;
        }

        .form-footer .back-link {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #6b7280;
            font-size: 11px;
            font-weight: 500;
            text-decoration: none;
            padding: 4px 10px;
            border-radius: 6px;
            transition: all 0.3s ease;
            background: rgba(0,0,0,0.02);
        }

        .form-footer .back-link:hover {
            color: #dc2626;
            background: rgba(220, 38, 38, 0.05);
        }

        .form-footer .back-link i {
            font-size: 11px;
            transition: transform 0.3s ease;
        }

        .form-footer .back-link:hover i {
            transform: translateX(-3px);
        }

        .form-footer .signin-link {
            color: #dc2626;
            font-size: 11px;
            font-weight: 600;
            text-decoration: none;
            padding: 4px 12px;
            border-radius: 6px;
            transition: all 0.3s ease;
            background: rgba(220, 38, 38, 0.04);
            border: 1px solid rgba(220, 38, 38, 0.06);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .form-footer .signin-link:hover {
            background: rgba(220, 38, 38, 0.08);
        }

        .form-footer .signin-link i {
            transition: transform 0.3s ease;
        }

        .form-footer .signin-link:hover i {
            transform: translateX(3px);
        }

        /* Security Badge */
        .security-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            margin-top: 10px;
            padding: 4px 12px;
            background: rgba(0,0,0,0.02);
            border-radius: 100px;
            font-size: 9px;
            color: #9ca3af;
            font-weight: 500;
            border: 1px solid rgba(0,0,0,0.03);
        }

        .security-badge i {
            font-size: 10px;
        }

        .security-badge i.fa-shield-alt {
            color: #10b981;
        }

        .security-badge i.fa-clock {
            color: #3b82f6;
        }

        .security-badge .dot {
            width: 2px;
            height: 2px;
            background: #d1d5db;
            border-radius: 50%;
        }

        .security-badge .badge-item {
            display: flex;
            align-items: center;
            gap: 3px;
            transition: all 0.3s ease;
            cursor: help;
        }

        .security-badge .badge-item:hover {
            transform: scale(1.05);
        }

        /* Validation States - No ticks */
        .input-valid {
            border-color: #10b981 !important;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.06) !important;
        }

        .input-invalid {
            border-color: #ef4444 !important;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.06) !important;
            animation: inputShake 0.5s ease;
        }

        @keyframes inputShake {
            0%, 100% { transform: translateX(0); }
            20% { transform: translateX(-4px); }
            40% { transform: translateX(4px); }
            60% { transform: translateX(-3px); }
            80% { transform: translateX(3px); }
        }

        /* Responsive */
        @media (max-width: 480px) {
            .reset-card {
                padding: 18px 14px 14px;
                border-radius: 18px;
            }

            .reset-title {
                font-size: 18px;
            }

            .logo-ring {
                width: 48px;
                height: 48px;
            }

            .logo-inner {
                font-size: 18px;
            }

            .form-input {
                font-size: 12px;
                height: 34px;
                padding: 6px 36px 6px 10px;
            }

            .submit-btn {
                height: 38px;
                font-size: 12px;
                padding: 8px 16px;
                border-radius: 8px;
                margin-top: 14px;
            }

            .requirements-grid {
                grid-template-columns: 1fr;
                gap: 1px;
                padding: 3px 4px;
            }

            .form-footer {
                flex-direction: column;
                align-items: stretch;
                text-align: center;
                gap: 3px;
            }

            .form-footer .back-link,
            .form-footer .signin-link {
                justify-content: center;
            }

            .char-counter {
                right: 56px;
                font-size: 8px;
            }

            .password-toggle-btn {
                right: 32px;
                font-size: 11px;
                padding: 3px;
            }

            .input-icon {
                right: 10px;
                font-size: 11px;
            }

            .security-badge {
                font-size: 8px;
                padding: 3px 8px;
                flex-wrap: wrap;
            }

            .security-badge .dot {
                display: none;
            }

            .logo-section {
                margin-bottom: 12px;
            }

            .form-group {
                margin-bottom: 10px;
            }

            .reset-subtitle {
                font-size: 11px;
            }

            .form-label {
                font-size: 10px;
                margin-bottom: 3px;
            }
        }

        /* Dark Mode - Red/White Theme */
        @media (prefers-color-scheme: dark) {
            .password-reset-wrapper {
                background: 
                    radial-gradient(ellipse at 20% 50%, rgba(220,38,38,0.08) 0%, transparent 60%),
                    radial-gradient(ellipse at 80% 50%, rgba(220,38,38,0.05) 0%, transparent 60%),
                    #0f0f0f;
            }

            .reset-card {
                background: #1a1a1a;
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4), 0 0 0 1px rgba(220, 38, 38, 0.08);
            }

            .reset-title {
                color: #ef4444;
            }

            .reset-subtitle {
                color: #9ca3af;
            }

            .form-label {
                color: #d1d5db;
            }

            .form-input {
                background: rgba(255,255,255,0.05);
                border-color: #374151;
                color: #e5e7eb;
            }

            .form-input:focus {
                border-color: #ef4444;
                box-shadow: 0 0 0 4px rgba(239,68,68,0.08);
            }

            .form-input::placeholder {
                color: #6b7280;
            }

            .input-icon {
                color: #6b7280;
            }

            .input-wrapper:focus-within .input-icon {
                color: #ef4444;
            }

            .strength-segment {
                background: #374151;
            }

            .requirements-grid {
                background: rgba(255,255,255,0.03);
            }

            .requirement-item {
                color: #6b7280;
            }

            .requirement-item.met {
                color: #34d399;
            }

            .form-footer {
                border-top-color: rgba(255,255,255,0.05);
            }

            .form-footer .back-link {
                color: #9ca3af;
                background: rgba(255,255,255,0.03);
            }

            .form-footer .back-link:hover {
                color: #ef4444;
                background: rgba(239,68,68,0.08);
            }

            .form-footer .signin-link {
                background: rgba(239,68,68,0.08);
                border-color: rgba(239,68,68,0.1);
            }

            .security-badge {
                background: rgba(255,255,255,0.03);
                border-color: rgba(255,255,255,0.05);
                color: #6b7280;
            }

            .logo-inner {
                background: #1a1a1a;
            }

            .char-counter {
                background: rgba(255,255,255,0.05);
            }

            .success-message {
                background: linear-gradient(135deg, #064e3b, #065f46) !important;
                border-left-color: #34d399 !important;
            }

            .success-message .success-title {
                color: #6ee7b7 !important;
            }

            .success-message .success-desc {
                color: #a7f3d0 !important;
            }

            .input-valid {
                border-color: #34d399 !important;
                box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1) !important;
            }

            .input-invalid {
                border-color: #f87171 !important;
                box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important;
            }

            .match-indicator.success {
                color: #34d399;
                background: rgba(16, 185, 129, 0.08);
            }

            .match-indicator.error {
                color: #f87171;
                background: rgba(239, 68, 68, 0.08);
            }
        }

        /* Accessibility */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }

        .form-input:focus-visible,
        .submit-btn:focus-visible,
        .password-toggle-btn:focus-visible {
            outline: 2px solid #dc2626;
            outline-offset: 2px;
        }

        /* Scrollbar */
        .password-reset-wrapper::-webkit-scrollbar {
            width: 6px;
        }

        .password-reset-wrapper::-webkit-scrollbar-track {
            background: transparent;
        }

        .password-reset-wrapper::-webkit-scrollbar-thumb {
            background: #dc2626;
            border-radius: 10px;
        }

        .password-reset-wrapper::-webkit-scrollbar-thumb:hover {
            background: #b91c1c;
        }
    </style>

    <div class="password-reset-wrapper">
        <!-- Background Elements -->
        <div class="bg-orb bg-orb-1"></div>
        <div class="bg-orb bg-orb-2"></div>
        <div class="bg-orb bg-orb-3"></div>
        <div class="bg-grid"></div>

        <div class="reset-card">
            <div class="card-accent"></div>

            <!-- Logo Section -->
            <div class="logo-section">
                <div class="logo-container">
                    <div class="logo-ring">
                        <div class="logo-inner">
                            <i class="fas fa-key"></i>
                        </div>
                    </div>
                </div>
                <h1 class="reset-title">Reset Password</h1>
                <p class="reset-subtitle">Create a new secure password for your account</p>
            </div>

            <!-- Success Message -->
            <div class="success-message" id="successMessage">
                <div class="success-content">
                    <div class="success-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="success-text">
                        <div class="success-title">Password Reset Successful!</div>
                        <div class="success-desc">Your password has been updated. You can now log in with your new password.</div>
                    </div>
                    <button class="success-close" onclick="this.parentElement.parentElement.remove()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <!-- Validation Errors -->
            @if ($errors->any())
                <div style="margin-bottom: 12px;">
                    <div style="background: linear-gradient(135deg, #fef2f2, #fee2e2); border-radius: 8px; padding: 10px 14px; border-left: 4px solid #dc2626;">
                        <div style="display: flex; align-items: flex-start; gap: 8px;">
                            <i class="fas fa-exclamation-triangle" style="color: #dc2626; font-size: 14px; margin-top: 2px;"></i>
                            <div style="flex: 1;">
                                <div style="font-weight: 700; color: #991b1b; font-size: 12px; margin-bottom: 3px;">
                                    {{ __('Please fix the following:') }}
                                </div>
                                <ul style="list-style: none; padding: 0; margin: 0; font-size: 11px; color: #7f1d1d;">
                                    @foreach ($errors->all() as $error)
                                        <li style="display: flex; align-items: center; gap: 5px; padding: 1px 0;">
                                            <span style="color: #dc2626; font-size: 5px;">●</span>
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}" id="resetForm" novalidate>
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Field -->
                <div class="form-group" id="emailGroup">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope"></i>
                        {{ __('Email Address') }}
                    </label>
                    <div class="input-wrapper">
                        <input 
                            id="email" 
                            class="form-input" 
                            type="email" 
                            name="email" 
                            value="{{ old('email', $request->email) }}" 
                            required 
                            autofocus 
                            autocomplete="email" 
                            placeholder="your@email.com"
                            maxlength="50"
                        />
                        <span class="input-icon"><i class="fas fa-envelope"></i></span>
                        <span class="char-counter" id="emailCounter">0/50</span>
                    </div>
                </div>

                <!-- Password Field -->
                <div class="form-group" id="passwordGroup">
                    <label for="password" class="form-label">
                        <i class="fas fa-lock"></i>
                        {{ __('New Password') }}
                    </label>
                    <div class="input-wrapper">
                        <input 
                            id="password" 
                            class="form-input" 
                            type="password" 
                            name="password" 
                            required 
                            autocomplete="new-password" 
                            placeholder="Create strong password"
                            minlength="8"
                        />
                        <span class="input-icon"><i class="fas fa-lock"></i></span>
                        <button type="button" class="password-toggle-btn" id="togglePassword" title="Toggle password visibility">
                            <i class="fas fa-eye"></i>
                        </button>
                        <span class="char-counter" id="passwordCounter">0</span>
                    </div>

                    <!-- Strength Meter -->
                    <div class="strength-meter" id="strengthMeter">
                        <div class="strength-bar" id="strengthBar">
                            <div class="strength-segment" id="seg1"></div>
                            <div class="strength-segment" id="seg2"></div>
                            <div class="strength-segment" id="seg3"></div>
                            <div class="strength-segment" id="seg4"></div>
                        </div>
                        <div class="strength-info">
                            <span class="strength-label" id="strengthLabel">Password strength</span>
                            <span class="strength-percent" id="strengthPercent">0%</span>
                        </div>
                    </div>

                    <!-- Requirements -->
                    <div class="requirements-grid" id="requirementsGrid">
                        <div class="requirement-item" id="reqLength">
                            <span class="req-icon">✗</span>
                            <span>8+ characters</span>
                        </div>
                        <div class="requirement-item" id="reqUppercase">
                            <span class="req-icon">✗</span>
                            <span>Uppercase letter</span>
                        </div>
                        <div class="requirement-item" id="reqLowercase">
                            <span class="req-icon">✗</span>
                            <span>Lowercase letter</span>
                        </div>
                        <div class="requirement-item" id="reqNumber">
                            <span class="req-icon">✗</span>
                            <span>Number</span>
                        </div>
                    </div>
                </div>

                <!-- Confirm Password Field -->
                <div class="form-group" id="confirmGroup">
                    <label for="password_confirmation" class="form-label">
                        <i class="fas fa-check-circle"></i>
                        {{ __('Confirm Password') }}
                    </label>
                    <div class="input-wrapper">
                        <input 
                            id="password_confirmation" 
                            class="form-input" 
                            type="password" 
                            name="password_confirmation" 
                            required 
                            autocomplete="new-password" 
                            placeholder="Confirm your password"
                        />
                        <span class="input-icon"><i class="fas fa-check-circle"></i></span>
                        <button type="button" class="password-toggle-btn" id="toggleConfirm" title="Toggle password visibility">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div class="match-indicator" id="matchIndicator">
                        <i class="fas fa-check-circle"></i>
                        <span>Passwords match</span>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="submit-btn" id="submitBtn">
                    <span class="btn-content">
                        <span id="btnText">{{ __('Reset Password') }}</span>
                        <i class="fas fa-arrow-right btn-icon"></i>
                    </span>
                </button>

                <!-- Footer -->
                <div class="form-footer">
                    <a href="{{ route('login') }}" class="back-link">
                        <i class="fas fa-arrow-left"></i>
                        {{ __('Back to Login') }}
                    </a>
                    <a href="{{ route('login') }}" class="signin-link">
                        {{ __('Sign In') }}
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Security Badge -->
                <div class="security-badge">
                    <span class="badge-item">
                        <i class="fas fa-shield-alt"></i>
                        <span>256-bit encrypted</span>
                    </span>
                    <span class="dot"></span>
                    <span class="badge-item">
                        <i class="fas fa-clock"></i>
                        <span>Session secure</span>
                    </span>
                    <span class="dot"></span>
                    <span class="badge-item">
                        <i class="fas fa-lock"></i>
                        <span>SSL protected</span>
                    </span>
                </div>
            </form>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('resetForm');
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            const confirm = document.getElementById('password_confirmation');
            const submitBtn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            
            const emailCounter = document.getElementById('emailCounter');
            const passwordCounter = document.getElementById('passwordCounter');
            
            const strengthMeter = document.getElementById('strengthMeter');
            const segments = [
                document.getElementById('seg1'),
                document.getElementById('seg2'),
                document.getElementById('seg3'),
                document.getElementById('seg4')
            ];
            const strengthLabel = document.getElementById('strengthLabel');
            const strengthPercent = document.getElementById('strengthPercent');
            
            const reqs = {
                length: document.getElementById('reqLength'),
                uppercase: document.getElementById('reqUppercase'),
                lowercase: document.getElementById('reqLowercase'),
                number: document.getElementById('reqNumber')
            };
            
            const matchIndicator = document.getElementById('matchIndicator');
            const successMessage = document.getElementById('successMessage');
            
            const togglePassword = document.getElementById('togglePassword');
            const toggleConfirm = document.getElementById('toggleConfirm');

            // --- Email Validation ---
            email.addEventListener('input', function() {
                const val = this.value.trim();
                emailCounter.textContent = `${val.length}/50`;
                
                if (val.length > 40) {
                    emailCounter.className = 'char-counter danger';
                } else if (val.length > 30) {
                    emailCounter.className = 'char-counter warning';
                } else {
                    emailCounter.className = 'char-counter';
                }
                
                if (val.length === 0) {
                    this.classList.remove('input-valid', 'input-invalid');
                    return;
                }
                
                const isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val);
                this.classList.toggle('input-valid', isValid);
                this.classList.toggle('input-invalid', !isValid);
            });

            // --- Password Strength ---
            password.addEventListener('input', function() {
                const val = this.value;
                passwordCounter.textContent = val.length;
                
                if (val.length === 0) {
                    passwordCounter.className = 'char-counter';
                } else if (val.length < 4) {
                    passwordCounter.className = 'char-counter danger';
                } else if (val.length < 8) {
                    passwordCounter.className = 'char-counter warning';
                } else {
                    passwordCounter.className = 'char-counter';
                }
                
                const checks = {
                    length: val.length >= 8,
                    uppercase: /[A-Z]/.test(val),
                    lowercase: /[a-z]/.test(val),
                    number: /[0-9]/.test(val)
                };
                
                updateRequirement(reqs.length, checks.length);
                updateRequirement(reqs.uppercase, checks.uppercase);
                updateRequirement(reqs.lowercase, checks.lowercase);
                updateRequirement(reqs.number, checks.number);
                
                let strength = 0;
                if (checks.length) strength += 25;
                if (checks.uppercase) strength += 25;
                if (checks.lowercase) strength += 25;
                if (checks.number) strength += 25;
                
                updateStrengthMeter(strength);
                
                if (val.length === 0) {
                    this.classList.remove('input-valid', 'input-invalid');
                } else if (val.length >= 8 && checks.uppercase && checks.lowercase && checks.number) {
                    this.classList.add('input-valid');
                    this.classList.remove('input-invalid');
                } else {
                    this.classList.add('input-invalid');
                    this.classList.remove('input-valid');
                }
                
                checkMatch();
            });

            // --- Confirm Password ---
            confirm.addEventListener('input', function() {
                checkMatch();
            });

            function checkMatch() {
                const pwd = password.value;
                const conf = confirm.value;
                
                if (conf.length === 0) {
                    matchIndicator.style.display = 'none';
                    confirm.classList.remove('input-valid', 'input-invalid');
                    return;
                }
                
                matchIndicator.style.display = 'flex';
                
                if (pwd === conf) {
                    matchIndicator.className = 'match-indicator success';
                    matchIndicator.innerHTML = '<i class="fas fa-check-circle"></i><span>Passwords match</span>';
                    confirm.classList.add('input-valid');
                    confirm.classList.remove('input-invalid');
                } else {
                    matchIndicator.className = 'match-indicator error';
                    matchIndicator.innerHTML = '<i class="fas fa-times-circle"></i><span>Passwords do not match</span>';
                    confirm.classList.add('input-invalid');
                    confirm.classList.remove('input-valid');
                }
            }

            function updateRequirement(element, met) {
                if (met) {
                    element.className = 'requirement-item met';
                    element.querySelector('.req-icon').textContent = '✓';
                } else {
                    element.className = 'requirement-item';
                    element.querySelector('.req-icon').textContent = '✗';
                }
            }

            function updateStrengthMeter(strength) {
                if (strength === 0) {
                    strengthMeter.style.display = 'none';
                    return;
                }
                
                strengthMeter.style.display = 'block';
                
                let level, label, colorClass;
                if (strength <= 25) {
                    level = 1;
                    label = 'Weak';
                    colorClass = 'weak';
                } else if (strength <= 50) {
                    level = 2;
                    label = 'Fair';
                    colorClass = 'fair';
                } else if (strength <= 75) {
                    level = 3;
                    label = 'Good';
                    colorClass = 'good';
                } else {
                    level = 4;
                    label = 'Strong';
                    colorClass = 'strong';
                }
                
                segments.forEach((seg, index) => {
                    seg.className = 'strength-segment';
                    if (index < level) {
                        setTimeout(() => {
                            seg.classList.add(`active-${colorClass}`);
                        }, index * 50);
                    }
                });
                
                strengthLabel.textContent = label;
                strengthLabel.className = `strength-label ${colorClass}`;
                
                strengthPercent.textContent = `${strength}%`;
                strengthPercent.style.color = strength > 75 ? '#10b981' : 
                                            strength > 50 ? '#3b82f6' : 
                                            strength > 25 ? '#f59e0b' : '#ef4444';
            }

            // --- Password Toggle ---
            function togglePasswordVisibility(input, button) {
                const isPassword = input.type === 'password';
                input.type = isPassword ? 'text' : 'password';
                const icon = button.querySelector('i');
                icon.className = isPassword ? 'fas fa-eye-slash' : 'fas fa-eye';
            }

            togglePassword.addEventListener('click', function() {
                togglePasswordVisibility(password, this);
            });

            toggleConfirm.addEventListener('click', function() {
                togglePasswordVisibility(confirm, this);
            });

            // --- Form Submission ---
            form.addEventListener('submit', function(e) {
                const emailVal = email.value.trim();
                const pwdVal = password.value;
                const confVal = confirm.value;
                
                let isValid = true;
                
                if (!emailVal || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailVal)) {
                    email.classList.add('input-invalid');
                    isValid = false;
                }
                
                if (pwdVal.length < 8 || !/[A-Z]/.test(pwdVal) || !/[a-z]/.test(pwdVal) || !/[0-9]/.test(pwdVal)) {
                    password.classList.add('input-invalid');
                    isValid = false;
                }
                
                if (pwdVal !== confVal || confVal.length === 0) {
                    confirm.classList.add('input-invalid');
                    isValid = false;
                }
                
                if (!isValid) {
                    e.preventDefault();
                    if (email.classList.contains('input-invalid')) email.focus();
                    else if (password.classList.contains('input-invalid')) password.focus();
                    else if (confirm.classList.contains('input-invalid')) confirm.focus();
                    return;
                }
                
                // Show success message
                e.preventDefault();
                successMessage.classList.add('show');
                
                // Update button
                btnText.textContent = 'Password Reset!';
                submitBtn.querySelector('.btn-icon').className = 'fas fa-check btn-icon';
                submitBtn.style.background = 'linear-gradient(135deg, #10b981, #059669)';
                
                setTimeout(() => {
                    form.submit();
                }, 1500);
            });

            // --- Auto-focus ---
            if (!email.value.trim()) {
                setTimeout(() => email.focus(), 300);
            }
        });
    </script>
</x-guest-layout>