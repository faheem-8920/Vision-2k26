<x-guest-layout>
    <style>
        /* ===== BASE STYLES ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #f8fafc 0%, #eef2f7 50%, #f8fafc 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            position: relative;
        }

        /* ===== ANIMATED BACKGROUND ===== */
        .bg-elements {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            z-index: 0;
            pointer-events: none;
        }

        .bg-elements .floating-icon {
            position: absolute;
            font-size: 40px;
            opacity: 0.06;
            animation: floatIcon 20s infinite ease-in-out;
        }

        .bg-elements .floating-icon:nth-child(1) {
            top: 10%;
            left: 5%;
            animation-delay: 0s;
            font-size: 60px;
        }
        .bg-elements .floating-icon:nth-child(2) {
            top: 20%;
            right: 8%;
            animation-delay: -4s;
            font-size: 45px;
        }
        .bg-elements .floating-icon:nth-child(3) {
            bottom: 25%;
            left: 10%;
            animation-delay: -8s;
            font-size: 50px;
        }
        .bg-elements .floating-icon:nth-child(4) {
            bottom: 15%;
            right: 5%;
            animation-delay: -12s;
            font-size: 55px;
        }
        .bg-elements .floating-icon:nth-child(5) {
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation-delay: -6s;
            font-size: 80px;
            opacity: 0.04;
        }

        @keyframes floatIcon {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg) scale(1);
            }
            25% {
                transform: translate(30px, -40px) rotate(10deg) scale(1.05);
            }
            50% {
                transform: translate(-20px, 30px) rotate(-5deg) scale(0.95);
            }
            75% {
                transform: translate(25px, 20px) rotate(8deg) scale(1.02);
            }
        }

        /* ===== GRID OVERLAY ===== */
        .grid-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 0;
            pointer-events: none;
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(220, 38, 38, 0.03) 0%, transparent 50%),
                radial-gradient(circle at 80% 50%, rgba(220, 38, 38, 0.03) 0%, transparent 50%);
        }

        /* ===== MAIN CONTAINER ===== */
        .auth-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 500px;
            padding: 15px;
            animation: containerSlide 0.8s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        }

        @keyframes containerSlide {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.96);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .auth-card {
            background: rgba(255, 255, 255, 0.97);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 32px 40px 28px;
            box-shadow: 
                0 20px 40px -12px rgba(0, 0, 0, 0.06),
                0 0 0 1px rgba(0, 0, 0, 0.02),
                inset 0 1px 0 rgba(255, 255, 255, 0.8);
            transition: all 0.4s cubic-bezier(0.22, 1, 0.36, 1);
            position: relative;
            overflow: hidden;
        }

        .auth-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #dc2626, #ef4444, #f87171, #ef4444, #dc2626);
            background-size: 300% 100%;
            animation: shimmer 4s infinite linear;
        }

        @keyframes shimmer {
            0% {
                background-position: -300% 0;
            }
            100% {
                background-position: 300% 0;
            }
        }

        .auth-card:hover {
            transform: translateY(-3px);
            box-shadow: 
                0 25px 50px -12px rgba(220, 38, 38, 0.08),
                0 0 0 1px rgba(220, 38, 38, 0.03);
        }

        /* ===== BRAND SECTION ===== */
        .brand-section {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 4px;
            animation: fadeInDown 0.8s ease 0.2s both;
            position: relative;
            z-index: 1;
        }

        .brand-icon {
            font-size: 36px;
            animation: brandBounce 2s infinite ease-in-out;
            display: inline-block;
        }

        @keyframes brandBounce {
            0%, 100% {
                transform: scale(1) rotate(0deg);
            }
            50% {
                transform: scale(1.05) rotate(-5deg);
            }
        }

        .brand-name {
            font-size: 24px;
            font-weight: 800;
            background: linear-gradient(135deg, #dc2626, #991b1b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.5px;
        }

        .brand-tagline {
            font-size: 10px;
            color: #9ca3af;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-top: -2px;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ===== HEADER ===== */
        .auth-header {
            text-align: center;
            margin-bottom: 22px;
            animation: fadeInDown 0.8s ease 0.3s both;
            position: relative;
            z-index: 1;
        }

        .auth-title {
            font-size: 26px;
            font-weight: 800;
            color: #1a1a1a;
            letter-spacing: -0.5px;
            margin-bottom: 4px;
        }

        .auth-subtitle {
            color: #6b7280;
            font-size: 14px;
            font-weight: 400;
        }

        /* ===== ENGAGING ALERTS - FIXED HEIGHT ===== */
        .alert {
            padding: 14px 18px;
            border-radius: 14px;
            margin-bottom: 18px;
            display: flex;
            align-items: flex-start;
            gap: 14px;
            animation: alertSlideIn 0.6s cubic-bezier(0.22, 1, 0.36, 1);
            position: relative;
            z-index: 1;
            border: 1px solid;
            min-height: 76px;
            transition: all 0.4s ease;
            height: auto;
        }

        .alert:last-child {
            margin-bottom: 18px;
        }

        .alert:hover {
            transform: scale(1.01);
        }

        @keyframes alertSlideIn {
            from {
                opacity: 0;
                transform: translateY(-15px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .alert-error {
            background: linear-gradient(135deg, #fef2f2, #fee2e2);
            border-color: #fecaca;
            color: #991b1b;
        }

        .alert-success {
            background: linear-gradient(135deg, #f0fdf4, #dcfce7);
            border-color: #bbf7d0;
            color: #166534;
        }

        .alert-icon-wrapper {
            flex-shrink: 0;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: iconPop 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) 0.2s both;
        }

        @keyframes iconPop {
            from {
                transform: scale(0);
            }
            to {
                transform: scale(1);
            }
        }

        .alert-error .alert-icon-wrapper {
            background: rgba(220, 38, 38, 0.1);
        }

        .alert-success .alert-icon-wrapper {
            background: rgba(34, 197, 94, 0.1);
        }

        .alert-icon {
            font-size: 22px;
            line-height: 1;
        }

        .alert-content {
            flex: 1;
            padding-top: 2px;
            min-height: 44px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .alert-title {
            font-weight: 700;
            font-size: 14px;
            margin-bottom: 2px;
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .alert-title .badge {
            font-size: 9px;
            font-weight: 700;
            padding: 2px 10px;
            border-radius: 20px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .alert-error .badge {
            background: rgba(220, 38, 38, 0.1);
            color: #dc2626;
        }

        .alert-success .badge {
            background: rgba(34, 197, 94, 0.1);
            color: #16a34a;
        }

        .alert-message {
            font-size: 13px;
            opacity: 0.9;
            line-height: 1.4;
        }

        .alert-message ul {
            margin: 2px 0 0 0;
            padding-left: 18px;
        }

        .alert-message ul li {
            margin-bottom: 1px;
        }

        .alert-progress {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            border-radius: 0 0 14px 14px;
            animation: progressBar 4s linear forwards;
        }

        .alert-error .alert-progress {
            background: linear-gradient(90deg, #dc2626, #f87171);
        }

        .alert-success .alert-progress {
            background: linear-gradient(90deg, #16a34a, #4ade80);
        }

        @keyframes progressBar {
            from {
                width: 100%;
            }
            to {
                width: 0%;
            }
        }

        .alert-close {
            margin-left: auto;
            background: none;
            border: none;
            color: inherit;
            cursor: pointer;
            padding: 4px;
            border-radius: 50%;
            transition: all 0.3s ease;
            opacity: 0.4;
            flex-shrink: 0;
            margin-top: 2px;
            font-size: 18px;
            line-height: 1;
        }

        .alert-close:hover {
            opacity: 1;
            background: rgba(0, 0, 0, 0.05);
            transform: rotate(90deg);
        }

        /* ===== FORM GROUPS ===== */
        .form-group {
            margin-bottom: 14px;
            animation: fadeInUp 0.6s ease both;
            position: relative;
            z-index: 1;
        }

        .form-group:nth-child(1) {
            animation-delay: 0.4s;
        }
        .form-group:nth-child(2) {
            animation-delay: 0.5s;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(12px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 5px;
            letter-spacing: 0.3px;
            text-transform: uppercase;
            opacity: 0.7;
            transition: all 0.3s ease;
        }

        .input-wrapper {
            position: relative;
            transition: all 0.3s ease;
        }

        .input-wrapper:focus-within .form-label {
            color: #dc2626;
            opacity: 1;
        }

        .input-icon {
            position: absolute;
            top: 50%;
            left: 14px;
            transform: translateY(-50%);
            font-size: 18px;
            color: #9ca3af;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            pointer-events: none;
            z-index: 1;
            line-height: 1;
        }

        .input-wrapper:focus-within .input-icon {
            color: #dc2626;
            transform: translateY(-50%) scale(1.1);
        }

        .auth-input {
            width: 100%;
            padding: 11px 14px 11px 46px;
            background: #f8fafc;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 14px;
            color: #1a1a1a;
            transition: all 0.3s cubic-bezier(0.22, 1, 0.36, 1);
            outline: none;
            font-family: inherit;
            height: 46px;
        }

        .auth-input::placeholder {
            color: #9ca3af;
            font-size: 13px;
            opacity: 0.7;
        }

        .auth-input:hover {
            background: #f1f5f9;
            border-color: #d1d5db;
        }

        .auth-input:focus {
            background: #ffffff;
            border-color: #dc2626;
            box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.06), 0 4px 12px rgba(220, 38, 38, 0.04);
            transform: translateY(-1px);
        }

        .auth-input.error {
            border-color: #ef4444;
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.06);
            animation: shake 0.4s cubic-bezier(0.36, 0.07, 0.19, 0.97) both;
        }

        @keyframes shake {
            10%, 90% {
                transform: translateX(-3px);
            }
            20%, 80% {
                transform: translateX(3px);
            }
            30%, 50%, 70% {
                transform: translateX(-6px);
            }
            40%, 60% {
                transform: translateX(6px);
            }
        }

        .input-error {
            display: none;
            margin-top: 4px;
            font-size: 12px;
            color: #ef4444;
            font-weight: 500;
            align-items: center;
            gap: 6px;
            animation: fadeInError 0.3s ease;
        }

        .input-error.show {
            display: flex;
        }

        @keyframes fadeInError {
            from {
                opacity: 0;
                transform: translateY(-6px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .input-error svg {
            width: 14px;
            height: 14px;
            flex-shrink: 0;
        }

        /* ===== PASSWORD TOGGLE ===== */
        .password-toggle {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #9ca3af;
            cursor: pointer;
            padding: 4px;
            border-radius: 50%;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            line-height: 1;
        }

        .password-toggle:hover {
            color: #dc2626;
            background: rgba(220, 38, 38, 0.05);
        }

        .password-toggle:active {
            transform: translateY(-50%) scale(0.9);
        }

        /* ===== REMEMBER & FORGOT ===== */
        .auth-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 14px 0 18px 0;
            animation: fadeInUp 0.6s ease 0.6s both;
            position: relative;
            z-index: 1;
        }

        .remember-me {
            display: flex;
            align-items: center;
            cursor: pointer;
            position: relative;
            user-select: none;
            gap: 10px;
        }

        .remember-me input[type="checkbox"] {
            display: none;
        }

        .custom-checkbox {
            width: 20px;
            height: 20px;
            border: 2px solid #d1d5db;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            flex-shrink: 0;
            background: #f8fafc;
        }

        .remember-me:hover .custom-checkbox {
            border-color: #dc2626;
            transform: scale(1.05);
        }

        .remember-me input[type="checkbox"]:checked + .custom-checkbox {
            background: #dc2626;
            border-color: #dc2626;
            animation: checkPop 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        @keyframes checkPop {
            0% {
                transform: scale(0.8);
            }
            50% {
                transform: scale(1.15);
            }
            100% {
                transform: scale(1);
            }
        }

        .custom-checkbox svg {
            width: 13px;
            height: 13px;
            color: white;
            opacity: 0;
            transform: scale(0);
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .remember-me input[type="checkbox"]:checked + .custom-checkbox svg {
            opacity: 1;
            transform: scale(1);
        }

        .remember-label {
            font-size: 13px;
            color: #374151;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .remember-me:hover .remember-label {
            color: #dc2626;
        }

        .forgot-link {
            font-size: 13px;
            color: #6b7280;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }

        .forgot-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: #dc2626;
            transition: width 0.3s ease;
        }

        .forgot-link:hover {
            color: #dc2626;
        }

        .forgot-link:hover::after {
            width: 100%;
        }

        /* ===== SUBMIT BUTTON ===== */
        .auth-button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.22, 1, 0.36, 1);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            letter-spacing: 0.5px;
            animation: fadeInUp 0.6s ease 0.7s both;
            height: 46px;
            z-index: 1;
        }

        .auth-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s ease;
        }

        .auth-button:hover::before {
            left: 100%;
        }

        .auth-button:hover {
            transform: translateY(-2px);
            box-shadow: 
                0 12px 30px -8px rgba(220, 38, 38, 0.3),
                0 4px 12px rgba(220, 38, 38, 0.12);
        }

        .auth-button:active {
            transform: translateY(0) scale(0.98);
        }

        .auth-button:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none !important;
        }

        .auth-button .spinner {
            display: none;
            width: 18px;
            height: 18px;
            border: 2.5px solid rgba(255, 255, 255, 0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        .auth-button.loading .spinner {
            display: block;
        }

        .auth-button.loading .button-text {
            display: none;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .button-icon {
            font-size: 18px;
            transition: transform 0.3s ease;
            line-height: 1;
        }

        .auth-button:hover .button-icon {
            transform: translateX(4px);
        }

        /* ===== DIVIDER ===== */
        .divider {
            display: flex;
            align-items: center;
            gap: 14px;
            margin: 4px 0 12px 0;
            animation: fadeInUp 0.6s ease 0.65s both;
            position: relative;
            z-index: 1;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, #e5e7eb);
        }

        .divider::after {
            background: linear-gradient(90deg, #e5e7eb, transparent);
        }

        .divider-text {
            font-size: 10px;
            color: #9ca3af;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            white-space: nowrap;
        }

        .divider-icon {
            font-size: 14px;
            margin: 0 4px;
        }

        /* ===== SIGNUP LINK ===== */
        .auth-footer {
            text-align: center;
            margin-top: 16px;
            padding-top: 14px;
            border-top: 2px solid #f1f5f9;
            animation: fadeInUp 0.6s ease 0.8s both;
            position: relative;
            z-index: 1;
        }

        .auth-footer p {
            font-size: 13px;
            color: #6b7280;
        }

        .signup-link {
            color: #dc2626;
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s ease;
            position: relative;
            margin-left: 4px;
        }

        .signup-link::before {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background: #dc2626;
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.3s ease;
        }

        .signup-link:hover {
            color: #991b1b;
        }

        .signup-link:hover::before {
            transform: scaleX(1);
            transform-origin: left;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 640px) {
            .auth-container {
                padding: 10px;
                max-width: 100%;
            }

            .auth-card {
                padding: 24px 18px 20px;
                border-radius: 18px;
            }

            .auth-title {
                font-size: 22px;
            }

            .brand-name {
                font-size: 20px;
            }

            .brand-icon {
                font-size: 28px;
            }

            .auth-input {
                font-size: 13px;
                padding: 10px 12px 10px 40px;
                height: 42px;
            }

            .auth-options {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .auth-button {
                font-size: 13px;
                padding: 10px;
                height: 42px;
            }

            .alert {
                padding: 12px 14px;
                min-height: 68px;
            }

            .alert-icon-wrapper {
                width: 38px;
                height: 38px;
            }

            .alert-icon {
                font-size: 18px;
            }

            .bg-elements .floating-icon {
                font-size: 30px !important;
                opacity: 0.04;
            }
        }

        /* ===== SCROLLBAR ===== */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #dc2626;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #b91c1c;
        }
    </style>

    <!-- ===== BACKGROUND WITH RENT THEMED ICONS ===== -->
    <div class="bg-elements">
        <div class="floating-icon">🏠</div>
        <div class="floating-icon">🔑</div>
        <div class="floating-icon">📦</div>
        <div class="floating-icon">💎</div>
        <div class="floating-icon">🏪</div>
    </div>
    <div class="grid-overlay"></div>

    <!-- ===== MAIN CONTAINER ===== -->
    <div class="auth-container">
        <div class="auth-card">
            <!-- ===== BRAND SECTION ===== -->
            <div class="brand-section">
                <span class="brand-icon">🏠</span>
                <div>
                    <div class="brand-name">RentEase</div>
                    <div class="brand-tagline">✦ Rent Anything, Anywhere ✦</div>
                </div>
            </div>

            <!-- ===== HEADER ===== -->
            <div class="auth-header">
                <h1 class="auth-title">Welcome Back!</h1>
                <p class="auth-subtitle">Sign in to manage your rentals</p>
            </div>

            <!-- ===== ENGAGING ERROR MESSAGE ===== -->
            @if ($errors->any())
                <div class="alert alert-error" role="alert" id="errorAlert">
                    <div class="alert-icon-wrapper">
                        <span class="alert-icon">🔴</span>
                    </div>
                    <div class="alert-content">
                        <div class="alert-title">
                            Oops! Access Denied
                            <span class="badge">Action Required</span>
                        </div>
                        <div class="alert-message">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <button type="button" class="alert-close" onclick="dismissAlert('errorAlert')">✕</button>
                    <div class="alert-progress"></div>
                </div>
            @endif

            <!-- ===== ENGAGING SUCCESS MESSAGE ===== -->
            @session('status')
                <div class="alert alert-success" role="alert" id="successAlert">
                    <div class="alert-icon-wrapper">
                        <span class="alert-icon">✅</span>
                    </div>
                    <div class="alert-content">
                        <div class="alert-title">
                            Welcome Back! 🎉
                            <span class="badge">Success</span>
                        </div>
                        <div class="alert-message">
                            {{ $value }}
                            <br>
                            <small style="opacity:0.8;">⚡ Redirecting to your dashboard...</small>
                        </div>
                    </div>
                    <button type="button" class="alert-close" onclick="dismissAlert('successAlert')">✕</button>
                    <div class="alert-progress"></div>
                </div>
            @endsession

            <!-- ===== LOGIN FORM ===== -->
            <form method="POST" action="{{ route('login') }}" id="loginForm" novalidate>
                @csrf

                <!-- ===== EMAIL FIELD ===== -->
                <div class="form-group">
                    <label for="email" class="form-label">📧 Email Address</label>
                    <div class="input-wrapper">
                        <span class="input-icon">📧</span>
                        <input id="email" 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            class="auth-input" 
                            placeholder="you@example.com"
                            required 
                            autofocus 
                            autocomplete="username" />
                        <div class="input-error" id="emailError">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                            <span>Please enter a valid email</span>
                        </div>
                    </div>
                </div>

                <!-- ===== PASSWORD FIELD ===== -->
                <div class="form-group">
                    <label for="password" class="form-label">🔒 Password</label>
                    <div class="input-wrapper">
                        <span class="input-icon">🔑</span>
                        <input id="password" 
                            type="password" 
                            name="password" 
                            class="auth-input" 
                            placeholder="Enter your password"
                            required 
                            autocomplete="current-password" />
                        <button type="button" class="password-toggle" onclick="togglePassword()" aria-label="Toggle password visibility">
                            <span id="eyeIcon">👁️</span>
                        </button>
                        <div class="input-error" id="passwordError">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                            <span>Password is required</span>
                        </div>
                    </div>
                </div>

                <!-- ===== OPTIONS ===== -->
                <div class="auth-options">
                    <label class="remember-me">
                        <input type="checkbox" name="remember" id="remember_me" />
                        <span class="custom-checkbox">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                            </svg>
                        </span>
                        <span class="remember-label">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-link">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- ===== DIVIDER ===== -->
                <div class="divider">
                    <span class="divider-text">Secure Access</span>
                    <span class="divider-icon">🔐</span>
                    <span class="divider-text">Rent Safe</span>
                </div>

                <!-- ===== SUBMIT BUTTON ===== -->
                <button type="submit" class="auth-button" id="loginButton">
                    <span class="spinner"></span>
                    <span class="button-text">Sign In</span>
                    <span class="button-icon">→</span>
                </button>
            </form>

            <!-- ===== FOOTER ===== -->
            <div class="auth-footer">
                <p>
                    New to RentEase?
                    <a href="{{ route('register') }}" class="signup-link">
                        Create Account 🏠
                    </a>
                </p>
            </div>
        </div>
    </div>

    <!-- ===== JAVASCRIPT ===== -->
    <script>
        // ===== DISMISS ALERT =====
        function dismissAlert(alertId) {
            const alert = document.getElementById(alertId);
            if (alert) {
                alert.style.opacity = '0';
                alert.style.transform = 'scale(0.95) translateY(-15px)';
                alert.style.transition = 'all 0.4s ease';
                setTimeout(() => alert.remove(), 400);
            }
        }

        // ===== PASSWORD TOGGLE =====
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                eyeIcon.textContent = '👁️';
            }
        }

        // ===== FORM VALIDATION =====
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('loginForm');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const emailError = document.getElementById('emailError');
            const passwordError = document.getElementById('passwordError');
            const loginButton = document.getElementById('loginButton');

            // Real-time validation
            emailInput.addEventListener('input', function() {
                validateEmail();
            });

            emailInput.addEventListener('blur', function() {
                if (this.value.trim() !== '') {
                    validateEmail();
                }
            });

            passwordInput.addEventListener('input', function() {
                validatePassword();
            });

            passwordInput.addEventListener('blur', function() {
                if (this.value.trim() !== '') {
                    validatePassword();
                }
            });

            function validateEmail() {
                const email = emailInput.value.trim();
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                
                if (email === '') {
                    emailInput.classList.remove('error');
                    emailError.classList.remove('show');
                    return false;
                }
                
                if (!emailRegex.test(email)) {
                    emailInput.classList.add('error');
                    emailError.classList.add('show');
                    return false;
                } else {
                    emailInput.classList.remove('error');
                    emailError.classList.remove('show');
                    return true;
                }
            }

            function validatePassword() {
                const password = passwordInput.value.trim();
                
                if (password === '') {
                    passwordInput.classList.remove('error');
                    passwordError.classList.remove('show');
                    return false;
                }
                
                if (password.length < 6) {
                    passwordInput.classList.add('error');
                    passwordError.querySelector('span').textContent = 'Min 6 characters required';
                    passwordError.classList.add('show');
                    return false;
                } else {
                    passwordInput.classList.remove('error');
                    passwordError.classList.remove('show');
                    return true;
                }
            }

            // Form submission
            form.addEventListener('submit', function(e) {
                const isEmailValid = validateEmail();
                const isPasswordValid = validatePassword();
                
                if (emailInput.value.trim() === '') {
                    emailInput.classList.add('error');
                    emailError.querySelector('span').textContent = 'Email is required';
                    emailError.classList.add('show');
                    e.preventDefault();
                    return false;
                }
                
                if (passwordInput.value.trim() === '') {
                    passwordInput.classList.add('error');
                    passwordError.querySelector('span').textContent = 'Password is required';
                    passwordError.classList.add('show');
                    e.preventDefault();
                    return false;
                }
                
                if (!isEmailValid || !isPasswordValid) {
                    e.preventDefault();
                    return false;
                }
                
                loginButton.classList.add('loading');
                loginButton.disabled = true;
            });

            // Remove loading state
            window.addEventListener('pageshow', function() {
                loginButton.classList.remove('loading');
                loginButton.disabled = false;
            });
        });

        // ===== AUTO-DISMISS ALERTS =====
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.opacity = '0';
                    alert.style.transform = 'scale(0.95) translateY(-15px)';
                    alert.style.transition = 'all 0.5s cubic-bezier(0.22, 1, 0.36, 1)';
                    setTimeout(() => alert.remove(), 500);
                }, 4000);
            });
        });

        // ===== KEYBOARD SHORTCUTS =====
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('.input-error').forEach(el => {
                    el.classList.remove('show');
                });
                document.querySelectorAll('.auth-input').forEach(el => {
                    el.classList.remove('error');
                });
            }
        });
    </script>
</x-guest-layout>