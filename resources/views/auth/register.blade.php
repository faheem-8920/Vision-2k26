<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Red&White · Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz@14..32&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        /* ===== PREMIUM STYLES ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        :root {
            --primary-red: #dc2626;
            --secondary-red: #b91c1c;
            --light-red: #ffebee;
            --white: #ffffff;
            --bg-primary: #f5f5f5;
            --bg-secondary: #ffffff;
            --text-primary: #1a1a1a;
            --text-secondary: #666666;
            --card-bg: rgba(255, 255, 255, 0.95);
            --border-color: rgba(0, 0, 0, 0.08);
            --shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
            --shadow-hover: 0 16px 48px rgba(0, 0, 0, 0.18);
            --radius: 16px;
            --transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            background: var(--bg-primary);
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            z-index: 0;
            background: linear-gradient(-45deg, rgba(220, 38, 38, 0.15), rgba(255, 82, 82, 0.10), rgba(198, 40, 40, 0.15),
                    rgba(220, 38, 38, 0.10));
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            pointer-events: none;
        }
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .particle-system {
            position: fixed;
            inset: 0;
            z-index: 0;
            pointer-events: none;
            overflow: hidden;
        }
        .particle-dot {
            position: absolute;
            border-radius: 50%;
            background: var(--primary-red);
            opacity: 0.08;
            transition: transform 0.15s ease-out;
            will-change: transform;
            pointer-events: none;
        }

        /* Floating Orbs */
        .glow-orb {
            position: fixed;
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
            filter: blur(120px);
            opacity: 0.25;
            animation: orbFloat 20s infinite alternate ease-in-out;
        }
        .glow-orb:nth-child(1) {
            width: 400px;
            height: 400px;
            background: rgba(220, 38, 38, 0.10);
            top: -100px;
            right: -100px;
        }
        .glow-orb:nth-child(2) {
            width: 500px;
            height: 500px;
            background: rgba(220, 38, 38, 0.07);
            bottom: -150px;
            left: -150px;
            animation-delay: 5s;
        }
        @keyframes orbFloat {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(60px, 40px) scale(1.3); }
        }

        .container {
            width: 100%;
            max-width: 820px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .header {
            text-align: center;
            margin-bottom: 28px;
            padding: 30px 35px;
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border-color);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            transition: var(--transition);
            animation: fadeIn 0.8s ease forwards;
            opacity: 0;
            position: relative;
            overflow: hidden;
        }
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(30px) scale(0.95); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }
        .header:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
        }
        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-red), var(--secondary-red), #ff8a80, var(--primary-red));
            background-size: 300% 100%;
            animation: shimmerGradient 4s infinite linear;
        }
        @keyframes shimmerGradient {
            0% { background-position: 0% 0%; }
            100% { background-position: 300% 0%; }
        }
        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 18px;
            margin-bottom: 12px;
        }
        .logo-icon {
            color: var(--primary-red);
            font-size: 2.8rem;
            animation: logoPulse 2.5s infinite ease-in-out;
            filter: drop-shadow(0 4px 12px rgba(220, 38, 38, 0.2));
        }
        @keyframes logoPulse {
            0%,
            100% { transform: scale(1); }
            50% { transform: scale(1.08); }
        }
        .logo-text {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary-red), #ff6b6b, var(--secondary-red));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .header h1 {
            font-size: 1.6rem;
            color: var(--text-primary);
            margin-bottom: 8px;
            font-weight: 700;
        }
        .header h1 .highlight {
            color: var(--primary-red);
            position: relative;
        }
        .header h1 .highlight::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-red), transparent);
            border-radius: 10px;
        }
        .header p {
            color: var(--text-secondary);
            font-size: 0.95rem;
            max-width: 550px;
            margin: 0 auto;
            line-height: 1.7;
        }

        .form-container {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border-color);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: transform 0.3s ease-out, box-shadow 0.5s ease;
            transform-style: preserve-3d;
            perspective: 1000px;
            animation: fadeIn 0.8s ease forwards;
            opacity: 0;
            animation-delay: 0.2s;
        }
        .form-container:hover {
            box-shadow: var(--shadow-hover);
        }

        .form-tabs {
            display: flex;
            background: linear-gradient(135deg, var(--primary-red), var(--secondary-red));
            overflow: hidden;
            position: relative;
        }
        .form-tabs::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            animation: tabShimmer 3s infinite;
        }
        @keyframes tabShimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }
        .tab {
            flex: 1;
            text-align: center;
            padding: 16px 8px;
            color: rgba(255, 255, 255, 0.8);
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            transition: var(--transition);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            overflow: hidden;
        }
        .tab:last-child { border-right: none; }
        .tab i { margin-right: 8px; transition: var(--transition); }
        .tab::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.15), transparent);
            transition: 0.6s;
        }
        .tab:hover::before { left: 100%; }
        .tab:hover {
            background: rgba(255, 255, 255, 0.1);
            color: var(--white);
            transform: translateY(-2px);
        }
        .tab.active {
            background: rgba(255, 255, 255, 0.15);
            color: var(--white);
            box-shadow: inset 0 -3px 0 var(--white);
        }
        .tab.active i { transform: scale(1.1); }

        .tab-content {
            display: none;
            padding: 32px 34px;
            animation: slideContent 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        @keyframes slideContent {
            0% { opacity: 0; transform: translateX(20px); }
            100% { opacity: 1; transform: translateX(0); }
        }
        .tab-content.active { display: block; }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
        }
        .form-group {
            flex: 1 1 calc(50% - 20px);
            min-width: 220px;
        }
        .form-group.full-width { flex: 1 1 100%; }

        .floating-label-wrapper {
            position: relative;
            margin-top: 16px;
        }
        .floating-label-wrapper .form-input {
            width: 100%;
            padding: 18px 16px 8px 48px;
            border: 2px solid var(--border-color);
            border-radius: 12px;
            font-size: 0.95rem;
            transition: var(--transition);
            background: var(--bg-secondary);
            color: var(--text-primary);
            outline: none;
            font-family: 'Inter', sans-serif;
        }
        .floating-label-wrapper .form-input:focus {
            border-color: var(--primary-red);
            box-shadow: 0 0 0 6px rgba(220, 38, 38, 0.08), 0 8px 24px rgba(220, 38, 38, 0.06);
            transform: translateY(-2px);
        }
        .floating-label-wrapper .form-input.error {
            border-color: var(--primary-red);
            background: rgba(255, 235, 235, 0.15);
            animation: shake 0.5s ease;
            box-shadow: 0 0 0 6px rgba(220, 38, 38, 0.06);
        }
        @keyframes shake {
            0%,
            100% { transform: translateX(0); }
            20% { transform: translateX(-10px); }
            60% { transform: translateX(10px); }
        }
        .floating-label-wrapper .form-input.valid {
            border-color: #22c55e;
            background: rgba(235, 255, 235, 0.08);
            box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.05);
        }
        .floating-label-wrapper .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
            font-size: 1rem;
            transition: var(--transition);
            pointer-events: none;
        }
        .floating-label-wrapper .form-input:focus+.input-icon {
            color: var(--primary-red);
            transform: translateY(-50%) scale(1.15);
        }
        .floating-label {
            position: absolute;
            left: 48px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 0.95rem;
            color: var(--text-secondary);
            pointer-events: none;
            transition: all 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
            font-weight: 500;
        }
        .floating-label-wrapper .form-input:focus~.floating-label,
        .floating-label-wrapper .form-input:not(:placeholder-shown)~.floating-label {
            top: 4px;
            font-size: 0.7rem;
            color: var(--primary-red);
            transform: translateY(0);
            font-weight: 700;
        }
        .floating-label-wrapper .form-input.valid~.floating-label {
            color: #22c55e;
        }
        .floating-label-wrapper .form-input.error~.floating-label {
            color: var(--primary-red);
        }

        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
            cursor: pointer;
            transition: var(--transition);
            background: none;
            border: none;
            padding: 4px;
            z-index: 2;
        }
        .password-toggle:hover {
            color: var(--primary-red);
            transform: translateY(-50%) scale(1.15);
        }

        .error-message {
            color: var(--primary-red);
            font-size: 0.78rem;
            margin-top: 4px;
            display: none;
            font-weight: 500;
            padding-left: 4px;
        }
        .error-message::before {
            content: '⚠ ';
        }

        .checkbox-group {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-top: 16px;
            padding: 14px 18px;
            border-radius: 12px;
            transition: var(--transition);
            background: rgba(255, 235, 235, 0.03);
            border: 1px solid var(--border-color);
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        .checkbox-group:hover {
            transform: translateX(8px);
            border-color: rgba(220, 38, 38, 0.15);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
        }
        .checkbox-group .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(220, 38, 38, 0.12);
            transform: scale(0);
            animation: rippleAnim 0.6s ease-out;
            pointer-events: none;
        }
        @keyframes rippleAnim {
            to { transform: scale(4); opacity: 0; }
        }

        .custom-checkbox {
            position: relative;
            width: 22px;
            height: 22px;
            flex-shrink: 0;
            margin-top: 1px;
        }
        .custom-checkbox input {
            position: absolute;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
            z-index: 2;
        }
        .custom-checkbox .checkmark {
            position: absolute;
            inset: 0;
            border: 2px solid var(--border-color);
            border-radius: 6px;
            transition: var(--transition);
            background: var(--bg-secondary);
        }
        .custom-checkbox input:checked+.checkmark {
            background: linear-gradient(135deg, var(--primary-red), var(--secondary-red));
            border-color: var(--primary-red);
            animation: pop 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        @keyframes pop {
            0% { transform: scale(0.7); }
            100% { transform: scale(1); }
        }
        .custom-checkbox .checkmark::after {
            content: '\f00c';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            color: var(--white);
            font-size: 0.7rem;
            transition: transform 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .custom-checkbox input:checked+.checkmark::after {
            transform: translate(-50%, -50%) scale(1);
        }

        .btn {
            padding: 13px 28px;
            border: none;
            border-radius: 12px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-family: 'Inter', sans-serif;
            position: relative;
            overflow: hidden;
        }
        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.25), transparent);
            transition: 0.6s;
        }
        .btn:hover::before { left: 100%; }
        .btn-prev {
            background: var(--border-color);
            color: var(--text-primary);
        }
        .btn-prev:hover {
            transform: translateX(-6px);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        }
        .btn-next {
            background: linear-gradient(135deg, var(--primary-red), var(--secondary-red));
            color: var(--white);
            box-shadow: 0 4px 16px rgba(220, 38, 38, 0.3);
        }
        .btn-next:hover {
            transform: translateY(-3px) scale(1.03);
            box-shadow: 0 8px 28px rgba(220, 38, 38, 0.4);
        }
        .btn-submit {
            background: linear-gradient(135deg, #8a1818, #7a1414);
            color: var(--white);
            width: 100%;
            font-size: 1rem;
            padding: 15px;
            box-shadow: 0 4px 20px rgba(138, 24, 24, 0.3);
        }
        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 32px rgba(138, 24, 24, 0.45);
            letter-spacing: 0.5px;
        }
        .btn:active { transform: scale(0.96); }
        .btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none !important;
            box-shadow: none !important;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 2px solid var(--border-color);
            gap: 16px;
        }

        .loading-spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top-color: var(--white);
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        .btn.loading .loading-spinner {
            display: inline-block;
        }
        .btn.loading .btn-text,
        .btn.loading .btn-icon {
            display: none;
        }

        .message-container {
            margin-bottom: 1.5rem;
        }
        .message-box {
            padding: 1rem 2rem;
            border-radius: 60px;
            font-size: 0.9rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 1rem;
            border: 1px solid;
            animation: slideDown 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.04);
        }
        .message-box.errors {
            background: rgba(254, 226, 226, 0.95);
            color: #991b1b;
            border-color: rgba(220, 38, 38, 0.35);
            box-shadow: 0 8px 24px rgba(220, 38, 38, 0.12);
        }
        .message-box .close-btn {
            margin-left: auto;
            cursor: pointer;
            opacity: 0.5;
            transition: all 0.3s;
            font-size: 1.1rem;
            padding: 0.1rem 0.7rem;
            border-radius: 40px;
        }
        .message-box .close-btn:hover {
            opacity: 1;
            background: rgba(0, 0, 0, 0.06);
            transform: scale(1.2) rotate(90deg);
        }
        @keyframes slideDown {
            0% { opacity: 0; transform: translateY(-30px) scale(0.9); max-height: 0; }
            100% { opacity: 1; transform: translateY(0) scale(1); max-height: 200px; }
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: var(--text-secondary);
            font-size: 0.8rem;
            padding: 16px 20px;
            border-radius: 12px;
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--border-color);
            transition: var(--transition);
            animation: fadeIn 0.8s ease forwards;
            opacity: 0;
            animation-delay: 0.4s;
        }
        .footer:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }
        .footer .footer-icons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 8px;
        }
        .footer .footer-icons i {
            color: var(--primary-red);
            opacity: 0.4;
            transition: var(--transition);
            font-size: 0.9rem;
        }
        .footer .footer-icons i:hover {
            opacity: 0.8;
            transform: scale(1.2) rotate(10px);
        }

        /* ===== ENHANCED SUCCESS OVERLAY ===== */
        .success-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            padding: 1.5rem;
        }
        .success-overlay.active {
            display: flex;
            animation: fadeInOverlay 0.7s ease;
        }
        @keyframes fadeInOverlay {
            0% { opacity: 0; backdrop-filter: blur(0px); transform: scale(0.95); }
            100% { opacity: 1; backdrop-filter: blur(24px); transform: scale(1); }
        }

        .success-modal {
            background: white;
            padding: 4.5rem 5rem;
            border-radius: 5rem;
            text-align: center;
            max-width: 580px;
            width: 100%;
            animation: bounceInModal 1.1s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 120px 260px rgba(0, 0, 0, 0.9);
            border: 2px solid rgba(220, 38, 38, 0.04);
            position: relative;
            overflow: hidden;
        }
        .success-modal::before {
            content: '';
            position: absolute;
            top: -60%;
            left: -60%;
            width: 220%;
            height: 220%;
            background: radial-gradient(circle at 30% 40%, rgba(220, 38, 38, 0.04), transparent 60%);
            pointer-events: none;
        }
        .success-modal::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #dc2626, #b91c1c, #dc2626, #b91c1c);
            background-size: 300% 100%;
            animation: shimmerGradient 3s infinite linear;
            border-radius: 0 0 5rem 5rem;
        }

        @keyframes bounceInModal {
            0% { transform: scale(0.45) translateY(100px) rotate(-4deg); opacity: 0; }
            55% { transform: scale(1.07) translateY(-12px) rotate(1.5deg); opacity: 1; }
            100% { transform: scale(1) translateY(0) rotate(0); opacity: 1; }
        }

        .success-modal .icon-wrapper {
            width: 130px;
            height: 130px;
            background: linear-gradient(145deg, #22c55e, #0a6e2a);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            box-shadow: 0 40px 80px -20px rgba(34, 197, 94, 0.5);
            animation: pulseIcon 3s ease infinite;
            position: relative;
        }
        .success-modal .icon-wrapper::after {
            content: '';
            position: absolute;
            inset: -10px;
            border-radius: 50%;
            border: 4px solid rgba(34, 197, 94, 0.15);
            animation: ringPulse 3s ease infinite;
        }
        @keyframes ringPulse {
            0%,
            100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.3); opacity: 0; }
        }
        .success-modal .icon-wrapper i {
            font-size: 4.8rem;
            color: white;
        }
        @keyframes pulseIcon {
            0%,
            100% { transform: scale(1); }
            50% { transform: scale(1.08); }
        }

        .success-modal h2 {
            font-size: 2.8rem;
            margin-bottom: 0.8rem;
            color: var(--text-primary);
            font-weight: 800;
            letter-spacing: -1px;
        }
        .success-modal p {
            color: var(--text-secondary);
            font-size: 1.05rem;
            line-height: 1.7;
            margin-bottom: 2.2rem;
            max-width: 420px;
            margin-left: auto;
            margin-right: auto;
        }

        .success-modal .name-display {
            background: var(--light-red);
            color: var(--primary-red);
            padding: 12px 28px;
            border-radius: 12px;
            font-size: 1.4rem;
            font-weight: 700;
            margin: 20px auto;
            display: inline-block;
            border: 2px dashed var(--primary-red);
            animation: namePulse 2.5s infinite;
        }
        @keyframes namePulse {
            0%,
            100% { transform: scale(1); box-shadow: 0 0 15px rgba(220, 38, 38, 0.1); }
            50% { transform: scale(1.03); box-shadow: 0 0 30px rgba(220, 38, 38, 0.2); }
        }

        .success-modal .success-stats {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin: 20px 0 25px;
            padding: 12px 20px;
            background: var(--bg-secondary);
            border-radius: 12px;
            border: 1px solid var(--border-color);
        }
        .success-modal .stat-item { text-align: center; }
        .success-modal .stat-number {
            display: block;
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--primary-red);
            font-variant-numeric: tabular-nums;
        }
        .success-modal .stat-label {
            font-size: 0.65rem;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .success-modal .btn-continue {
            background: linear-gradient(145deg, #dc2626, #8a1818);
            color: white;
            border: none;
            padding: 1.1rem 4.8rem;
            border-radius: 80px;
            font-weight: 700;
            font-size: 1.05rem;
            cursor: pointer;
            transition: all 0.5s ease;
            display: inline-flex;
            align-items: center;
            gap: 1.2rem;
            box-shadow: 0 24px 52px -16px rgba(220, 38, 38, 0.6);
            position: relative;
            overflow: hidden;
        }
        .success-modal .btn-continue::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.6s;
        }
        .success-modal .btn-continue:hover::before { left: 100%; }
        .success-modal .btn-continue:hover {
            transform: scale(1.06);
            box-shadow: 0 36px 68px -16px rgba(220, 38, 38, 0.8);
        }
        .success-modal .btn-continue:active { transform: scale(0.90); }

        /* Floating Emojis in Success Modal */
        .success-modal .floating-emoji {
            position: absolute;
            font-size: 2rem;
            opacity: 0;
            animation: floatEmoji 3.5s ease-in-out infinite;
            pointer-events: none;
        }
        .success-modal .floating-emoji:nth-child(1) { left: 8%; top: 8%; animation-delay: 0s; }
        .success-modal .floating-emoji:nth-child(2) { right: 12%; top: 15%; animation-delay: 0.6s; }
        .success-modal .floating-emoji:nth-child(3) { left: 50%; top: 4%; animation-delay: 1.2s; }
        @keyframes floatEmoji {
            0% { transform: translateY(20px) scale(0) rotate(0deg); opacity: 0; }
            15% { opacity: 1; transform: translateY(-10px) scale(1.2) rotate(10deg); }
            85% { opacity: 1; transform: translateY(-30px) scale(1) rotate(-5deg); }
            100% { transform: translateY(-50px) scale(0.8) rotate(15deg); opacity: 0; }
        }

        /* Loading state inside modal */
        .success-modal .loading-spinner-big {
            display: none;
            width: 60px;
            height: 60px;
            border: 6px solid rgba(220, 38, 38, 0.15);
            border-top-color: var(--primary-red);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 2rem;
        }
        .success-modal.loading .loading-spinner-big {
            display: block;
        }
        .success-modal.loading .icon-wrapper,
        .success-modal.loading h2,
        .success-modal.loading p,
        .success-modal.loading .name-display,
        .success-modal.loading .success-stats,
        .success-modal.loading .btn-continue,
        .success-modal.loading .floating-emoji {
            display: none;
        }

        #confettiContainer {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 10000;
            overflow: hidden;
        }
        .confetti-piece {
            position: absolute;
            top: -20px;
            opacity: 1;
            pointer-events: none;
            animation: confettiFall linear forwards;
        }
        @keyframes confettiFall {
            0% { transform: translateY(0) rotate(0deg) scale(1); opacity: 1; }
            100% { transform: translateY(calc(100vh + 100px)) rotate(720deg) scale(0.3); opacity: 0; }
        }

        .drop-zone {
            border: 2px dashed var(--border-color);
            border-radius: 12px;
            padding: 25px 20px;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
            background: var(--bg-secondary);
            position: relative;
        }
        .drop-zone:hover,
        .drop-zone.dragover {
            border-color: var(--primary-red);
            background: rgba(255, 235, 235, 0.05);
            transform: scale(1.01);
        }
        .drop-zone .drop-icon {
            font-size: 2.5rem;
            color: var(--text-secondary);
            margin-bottom: 8px;
            transition: var(--transition);
        }
        .drop-zone:hover .drop-icon {
            color: var(--primary-red);
            transform: scale(1.1);
        }
        .drop-zone .drop-text {
            color: var(--text-secondary);
            font-size: 0.9rem;
        }
        .drop-zone .drop-text span {
            color: var(--primary-red);
            font-weight: 600;
        }
        .drop-zone input[type="file"] {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
        }

        .file-preview {
            display: none;
            margin-top: 12px;
            padding: 10px 16px;
            background: rgba(235, 255, 235, 0.08);
            border-radius: 8px;
            border: 1px solid #22c55e;
            align-items: center;
            gap: 12px;
            animation: previewPop 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        @keyframes previewPop {
            0% { transform: scale(0.8); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
        .file-preview.show { display: flex; }
        .file-preview .file-name { flex: 1; font-size: 0.9rem; color: var(--text-primary); }
        .file-preview .file-size { font-size: 0.75rem; color: var(--text-secondary); }
        .file-preview .file-remove {
            cursor: pointer;
            color: var(--text-secondary);
            transition: var(--transition);
            padding: 4px 8px;
            border-radius: 4px;
        }
        .file-preview .file-remove:hover {
            color: var(--primary-red);
            background: rgba(255, 0, 0, 0.05);
        }

        .review-summary {
            background: var(--bg-secondary);
            padding: 25px;
            border-radius: 12px;
            border-left: 5px solid var(--primary-red);
            transition: var(--transition);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
        }
        .review-summary:hover {
            transform: translateX(4px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
        }
        .review-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 12px;
            margin-bottom: 18px;
        }
        .review-item {
            padding: 8px 0;
            border-bottom: 1px solid var(--border-color);
            transition: var(--transition);
        }
        .review-item:hover {
            transform: translateX(4px);
            border-bottom-color: rgba(220, 38, 38, 0.15);
        }
        .review-item strong {
            color: var(--text-primary);
            font-size: 0.82rem;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .review-item strong i { color: var(--primary-red); width: 20px; }
        .review-item span {
            color: var(--text-secondary);
            font-size: 0.9rem;
            display: block;
            margin-top: 2px;
            padding-left: 28px;
            font-weight: 500;
        }
        .review-note {
            padding: 15px 20px;
            background: var(--bg-secondary);
            border-radius: 10px;
            font-size: 0.88rem;
            color: var(--text-secondary);
            border-left: 3px solid var(--primary-red);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        @media (max-width: 768px) {
            .form-group { flex: 1 1 100%; }
            .tab-content { padding: 22px 18px; }
            .success-modal { padding: 3rem 2rem; margin: 1rem; }
            .success-modal .icon-wrapper { width: 90px; height: 90px; }
            .success-modal .icon-wrapper i { font-size: 3.2rem; }
            .success-modal h2 { font-size: 2rem; }
            .btn { padding: 10px 18px; font-size: 0.85rem; }
            .success-modal .floating-emoji { display: none; }
        }
        @media (max-width: 480px) {
            .header h1 { font-size: 1.1rem; }
            .logo-text { font-size: 1.3rem; }
            .success-modal { padding: 2rem 1.2rem; }
            .success-modal h2 { font-size: 1.5rem; }
            .success-modal .name-display { font-size: 1.1rem; padding: 8px 18px; }
        }
        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>
<body>

    <!-- Floating Orbs -->
    <div class="glow-orb"></div>
    <div class="glow-orb"></div>

    <!-- Particle System -->
    <div class="particle-system" id="particleSystem"></div>

    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="logo">
                <i class="fas fa-user-plus logo-icon"></i>
                <div class="logo-text">Red<span style="background: linear-gradient(135deg, var(--primary-red), #ff6b6b); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">ister</span></div>
            </div>
            <h1>Create <span class="highlight">Your Account</span></h1>
            <p>Complete the form below. All fields with <span style="color:var(--primary-red);font-weight:700;">*</span> are required.</p>
        </div>

        <!-- Message Container -->
        <div class="message-container" id="messageContainer"></div>

        <!-- 3D Tilt Form -->
        <div class="form-container" id="tiltCard">
            <div class="form-tabs">
                <div class="tab active" data-tab="personal"><i class="fas fa-user"></i> Personal</div>
                <div class="tab" data-tab="employment"><i class="fas fa-address-card"></i> Details</div>
                <div class="tab" data-tab="review"><i class="fas fa-check-circle"></i> Review</div>
            </div>

            <form id="registerForm" method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Personal Tab -->
                <div class="tab-content active" id="personal-tab">
                    <div class="form-row">
                        <div class="form-group">
                            <div class="floating-label-wrapper">
                                <input type="text" id="fullName" class="form-input" placeholder=" " name="name" autocomplete="name">
                                <i class="fas fa-user input-icon"></i>
                                <label class="floating-label">Full Name <span style="color:var(--primary-red);">*</span></label>
                            </div>
                            <div class="error-message" id="nameError">Please enter a valid name (min 3 characters)</div>
                        </div>
                        <div class="form-group">
                            <div class="floating-label-wrapper">
                                <input type="email" id="email" class="form-input" placeholder=" " name="email" autocomplete="email">
                                <i class="fas fa-envelope input-icon"></i>
                                <label class="floating-label">Email Address <span style="color:var(--primary-red);">*</span></label>
                            </div>
                            <div class="error-message" id="emailError">Please enter a valid email address</div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <div class="floating-label-wrapper">
                                <input type="tel" id="phone" class="form-input" placeholder=" " name="phone" autocomplete="tel">
                                <i class="fas fa-phone input-icon"></i>
                                <label class="floating-label">Phone Number <span style="color:var(--primary-red);">*</span></label>
                            </div>
                            <div class="error-message" id="phoneError">Please enter a valid phone number</div>
                        </div>
                        <div class="form-group">
                            <div class="floating-label-wrapper">
                                <input type="text" id="cnic" class="form-input" placeholder=" " name="cnic">
                                <i class="fas fa-id-card input-icon"></i>
                                <label class="floating-label">CNIC <span style="color:var(--primary-red);">*</span></label>
                            </div>
                            <div class="error-message" id="cnicError">Please enter a valid CNIC number</div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <div class="floating-label-wrapper">
                                <input type="password" id="password" class="form-input" placeholder=" " name="password" autocomplete="new-password">
                                <i class="fas fa-lock input-icon"></i>
                                <button type="button" class="password-toggle" id="togglePassword"><i class="fas fa-eye"></i></button>
                                <label class="floating-label">Password <span style="color:var(--primary-red);">*</span></label>
                            </div>
                            <div class="error-message" id="passwordError">Password must be at least 6 characters</div>
                        </div>
                        <div class="form-group">
                            <div class="floating-label-wrapper">
                                <input type="password" id="confirmPassword" name="password_confirmation" class="form-input" placeholder=" " autocomplete="new-password">
                                <i class="fas fa-lock input-icon"></i>
                                <button type="button" class="password-toggle" id="toggleConfirmPassword"><i class="fas fa-eye"></i></button>
                                <label class="floating-label">Confirm Password <span style="color:var(--primary-red);">*</span></label>
                            </div>
                            <div class="error-message" id="confirmPasswordError">Passwords do not match</div>
                        </div>
                    </div>

                    <div class="button-group">
                        <div></div>
                        <button type="button" class="btn btn-next next-tab" data-next="employment">
                            Continue <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Details Tab -->
                <div class="tab-content" id="employment-tab">
                    <div class="form-row">
                        <div class="form-group">
                            <div class="floating-label-wrapper">
                                <input type="text" id="city" class="form-input" placeholder=" " name="city">
                                <i class="fas fa-city input-icon"></i>
                                <label class="floating-label">City <span style="color:var(--primary-red);">*</span></label>
                            </div>
                            <div class="error-message" id="cityError">Please enter your city</div>
                        </div>
                        <div class="form-group">
                            <div class="floating-label-wrapper">
                                <input type="text" id="address" class="form-input" placeholder=" " name="address">
                                <i class="fas fa-map-pin input-icon"></i>
                                <label class="floating-label">Address <span style="color:var(--primary-red);">*</span></label>
                            </div>
                            <div class="error-message" id="addressError">Please enter your address</div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group full-width">
                            <label style="margin-bottom:8px;font-weight:600;font-size:0.85rem;color:var(--text-primary);">
                                <i class="fas fa-image" style="color:var(--primary-red);"></i> Profile Image <span style="font-weight:400;color:var(--text-secondary);font-size:0.8rem;">(optional)</span>
                            </label>
                            <div class="drop-zone" id="dropZone">
                                <div class="drop-icon"><i class="fas fa-cloud-upload-alt"></i></div>
                                <div class="drop-text">Drag & drop your image here, or <span>browse</span></div>
                                <input type="file" id="profile_image" name="profile_image" accept="image/*">
                            </div>
                            <div class="file-preview" id="filePreview">
                                <i class="fas fa-file-image"></i>
                                <span class="file-name" id="fileName">image.jpg</span>
                                <span class="file-size" id="fileSize">2.4 MB</span>
                                <span class="file-remove" id="fileRemove"><i class="fas fa-times"></i></span>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="is_verified" value="0" />
                    <input type="hidden" name="role" value="user" />

                    <div class="checkbox-group" id="termsGroup">
                        <div class="custom-checkbox">
                            <input type="checkbox" id="terms" name="terms" required>
                            <span class="checkmark"></span>
                        </div>
                        <label for="terms" class="checkbox-label">
                            <i class="fas fa-file-signature" style="color:var(--primary-red);"></i> I agree to the <a href="#" target="_blank">Terms of Service</a> and <a href="#" target="_blank">Privacy Policy</a>
                        </label>
                    </div>
                    <div class="error-message" id="termsError">You must agree to the Terms & Privacy Policy</div>

                    <div class="button-group">
                        <button type="button" class="btn btn-prev prev-tab" data-prev="personal">
                            <i class="fas fa-arrow-left"></i> Back
                        </button>
                        <button type="button" class="btn btn-next next-tab" data-next="review">
                            Review <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Review Tab -->
                <div class="tab-content" id="review-tab">
                    <div class="form-row">
                        <div class="form-group full-width">
                            <h3 style="color:var(--primary-red);margin-bottom:20px;font-size:1.2rem;display:flex;align-items:center;gap:10px;">
                                <i class="fas fa-clipboard-check"></i> Review Your Information
                            </h3>
                            <div class="review-summary" id="reviewSummary">
                                <!-- Populated by JavaScript -->
                            </div>
                        </div>
                    </div>

                    <div class="button-group">
                        <button type="button" class="btn btn-prev prev-tab" data-prev="employment">
                            <i class="fas fa-arrow-left"></i> Back
                        </button>
                        <button type="submit" id="submitForm" class="btn btn-submit">
                            <span class="loading-spinner"></span>
                            <i class="fas fa-paper-plane btn-icon"></i>
                            <span class="btn-text">Create Account</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Red&White &copy; 2023 | Secure Registration</p>
            <div class="footer-icons">
                <i class="fas fa-shield-alt"></i>
                <i class="fas fa-lock"></i>
                <i class="fas fa-database"></i>
            </div>
        </div>
    </div>

    <!-- ===== ENHANCED SUCCESS OVERLAY ===== -->
    <div class="success-overlay" id="successOverlay">
        <div class="success-modal" id="successModal">
            <!-- Floating Emojis -->
            <span class="floating-emoji">🎉</span>
            <span class="floating-emoji">✨</span>
            <span class="floating-emoji">🌟</span>

            <div class="loading-spinner-big"></div>
            <div class="icon-wrapper"><i class="fas fa-check-circle"></i></div>
            <h2 id="successTitle">🎉 Account Created!</h2>
            <p id="successMessage">Your registration was successful! You can now log in to your account.</p>
            <div class="name-display" id="nameDisplay">Welcome, <span id="userName">User</span>!</div>
            <div class="success-stats">
                <div class="stat-item">
                    <span class="stat-number" id="statComplete">100</span>
                    <span class="stat-label">% Complete</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number" id="statTime">2</span>
                    <span class="stat-label">Minutes</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number" id="statAccount">1</span>
                    <span class="stat-label">Account</span>
                </div>
            </div>
            <button class="btn-continue" id="continueBtn">
                <i class="fas fa-arrow-right"></i> Continue to Login
            </button>
        </div>
    </div>

    <!-- Confetti Container -->
    <div id="confettiContainer"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // ============================================
            // 1. PARTICLE SYSTEM
            // ============================================
            const particleSystem = document.getElementById('particleSystem');
            const particleCount = 50;
            for (let i = 0; i < particleCount; i++) {
                const dot = document.createElement('div');
                dot.className = 'particle-dot';
                const size = Math.random() * 8 + 2;
                dot.style.width = size + 'px';
                dot.style.height = size + 'px';
                dot.style.left = Math.random() * 100 + '%';
                dot.style.top = Math.random() * 100 + '%';
                dot.style.opacity = Math.random() * 0.12 + 0.03;
                dot.style.background = ['#dc2626', '#b91c1c', '#ff6b6b', '#8a1818'][Math.floor(Math.random() * 4)];
                particleSystem.appendChild(dot);
            }

            // Mouse tracking for particles
            let mouseX = 50,
                mouseY = 50;
            document.addEventListener('mousemove', function(e) {
                mouseX = (e.clientX / window.innerWidth) * 100;
                mouseY = (e.clientY / window.innerHeight) * 100;
                document.querySelectorAll('.particle-dot').forEach((dot, i) => {
                    const delay = i * 0.02;
                    setTimeout(() => {
                        const dx = mouseX - parseFloat(dot.style.left);
                        const dy = mouseY - parseFloat(dot.style.top);
                        const dist = Math.sqrt(dx * dx + dy * dy);
                        if (dist < 60) {
                            const angle = Math.atan2(dy, dx);
                            const force = (60 - dist) / 60 * 0.3;
                            const x = parseFloat(dot.style.left) - Math.cos(angle) * force * 2;
                            const y = parseFloat(dot.style.top) - Math.sin(angle) * force * 2;
                            dot.style.left = Math.max(0, Math.min(100, x)) + '%';
                            dot.style.top = Math.max(0, Math.min(100, y)) + '%';
                        }
                    }, delay * 100);
                });
            });

            // ============================================
            // 2. 3D TILT EFFECT
            // ============================================
            const tiltCard = document.getElementById('tiltCard');
            tiltCard.addEventListener('mousemove', function(e) {
                const rect = this.getBoundingClientRect();
                const x = (e.clientX - rect.left) / rect.width - 0.5;
                const y = (e.clientY - rect.top) / rect.height - 0.5;
                this.style.transform =
                    `perspective(1000px) rotateX(${y * 10}deg) rotateY(${-x * 10}deg) scale3d(1.015, 1.015, 1.015)`;
                this.style.transition = 'transform 0.08s ease-out';
            });
            tiltCard.addEventListener('mouseleave', function() {
                this.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale3d(1, 1, 1)';
                this.style.transition = 'transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1)';
            });

            // ============================================
            // 3. MAGNETIC BUTTONS
            // ============================================
            document.querySelectorAll('.btn:not(.btn-continue)').forEach(btn => {
                btn.addEventListener('mousemove', function(e) {
                    const rect = this.getBoundingClientRect();
                    const x = (e.clientX - rect.left) / rect.width - 0.5;
                    const y = (e.clientY - rect.top) / rect.height - 0.5;
                    this.style.transform = `translate(${x * 10}px, ${y * 10}px) scale(1.05)`;
                    this.style.transition = 'transform 0.1s ease-out';
                });
                btn.addEventListener('mouseleave', function() {
                    this.style.transform = 'translate(0, 0) scale(1)';
                    this.style.transition = 'transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1)';
                });
            });

            // ============================================
            // 4. PASSWORD TOGGLES
            // ============================================
            document.getElementById('togglePassword').addEventListener('click', function() {
                const input = document.getElementById('password');
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                this.querySelector('i').classList.toggle('fa-eye');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });
            document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
                const input = document.getElementById('confirmPassword');
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                this.querySelector('i').classList.toggle('fa-eye');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });

            // ============================================
            // 5. FILE UPLOAD
            // ============================================
            const dropZone = document.getElementById('dropZone');
            const fileInput = document.getElementById('profile_image');
            const filePreview = document.getElementById('filePreview');
            const fileName = document.getElementById('fileName');
            const fileSize = document.getElementById('fileSize');
            const fileRemove = document.getElementById('fileRemove');

            dropZone.addEventListener('dragover', function(e) {
                e.preventDefault();
                this.classList.add('dragover');
            });
            dropZone.addEventListener('dragleave', function(e) {
                e.preventDefault();
                this.classList.remove('dragover');
            });
            dropZone.addEventListener('drop', function(e) {
                e.preventDefault();
                this.classList.remove('dragover');
                if (e.dataTransfer.files.length) {
                    fileInput.files = e.dataTransfer.files;
                    handleFile(e.dataTransfer.files[0]);
                }
            });

            fileInput.addEventListener('change', function() {
                if (this.files.length) {
                    handleFile(this.files[0]);
                }
            });

            function handleFile(file) {
                if (!file.type.startsWith('image/')) {
                    alert('Please upload an image file.');
                    return;
                }
                fileName.textContent = file.name;
                fileSize.textContent = (file.size / 1024 / 1024).toFixed(1) + ' MB';
                filePreview.classList.add('show');
            }
            fileRemove.addEventListener('click', function() {
                fileInput.value = '';
                filePreview.classList.remove('show');
            });

            // ============================================
            // 6. CHECKBOX RIPPLE
            // ============================================
            document.querySelectorAll('.checkbox-group').forEach(group => {
                group.addEventListener('click', function(e) {
                    const rect = this.getBoundingClientRect();
                    const ripple = document.createElement('span');
                    ripple.className = 'ripple';
                    const size = Math.max(rect.width, rect.height);
                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
                    ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';
                    this.appendChild(ripple);
                    setTimeout(() => ripple.remove(), 600);
                });
            });

            // ============================================
            // 7. TAB SWITCHING
            // ============================================
            function switchTab(tabId) {
                document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
                document.getElementById(tabId + '-tab').classList.add('active');
                document.querySelectorAll('.tab').forEach(t => {
                    t.classList.remove('active');
                    if (t.getAttribute('data-tab') === tabId) t.classList.add('active');
                });
                if (tabId === 'review') updateReview();
            }

            document.querySelectorAll('.next-tab').forEach(btn => {
                btn.addEventListener('click', function() {
                    const current = document.querySelector('.tab-content.active');
                    const next = this.getAttribute('data-next');
                    if (validateTab(current.id)) {
                        switchTab(next);
                    }
                });
            });

            document.querySelectorAll('.prev-tab').forEach(btn => {
                btn.addEventListener('click', function() {
                    const prev = this.getAttribute('data-prev');
                    switchTab(prev);
                });
            });

            document.querySelectorAll('.tab').forEach(tab => {
                tab.addEventListener('click', function() {
                    const tabId = this.getAttribute('data-tab');
                    switchTab(tabId);
                });
            });

            // ============================================
            // 8. VALIDATION
            // ============================================
            function validateTab(tabId) {
                let valid = true;
                const fields = {
                    'personal-tab': [
                        { id: 'fullName', err: 'nameError', test: v => v.trim().length >= 3 },
                        { id: 'email', err: 'emailError', test: v => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v) },
                        { id: 'phone', err: 'phoneError', test: v => v.trim().length >= 7 },
                        { id: 'cnic', err: 'cnicError', test: v => v.trim().length >= 5 },
                        { id: 'password', err: 'passwordError', test: v => v.length >= 6 },
                        { id: 'confirmPassword', err: 'confirmPasswordError', test: (v) => {
                                const pwd = document.getElementById('password');
                                return pwd && pwd.value && v === pwd.value;
                            }
                        }
                    ],
                    'employment-tab': [
                        { id: 'city', err: 'cityError', test: v => v.trim().length > 0 },
                        { id: 'address', err: 'addressError', test: v => v.trim().length > 0 },
                        { id: 'terms', err: 'termsError', test: v => v === true }
                    ],
                    'review-tab': []
                };

                const tabFields = fields[tabId] || [];
                tabFields.forEach(({ id, err, test }) => {
                    const el = document.getElementById(id);
                    const val = el.type === 'checkbox' ? el.checked : el.value;
                    const pass = test(val);
                    if (!pass) {
                        const errorEl = document.getElementById(err);
                        if (errorEl) errorEl.style.display = 'block';
                        if (el) el.classList.add('error');
                        valid = false;
                    } else {
                        const errorEl = document.getElementById(err);
                        if (errorEl) errorEl.style.display = 'none';
                        if (el) el.classList.remove('error');
                        if (el) el.classList.add('valid');
                    }
                });
                return valid;
            }

            // Password validation
            const passwordField = document.getElementById('password');
            const confirmField = document.getElementById('confirmPassword');
            const confirmError = document.getElementById('confirmPasswordError');

            function validateConfirmPassword() {
                const pwd = passwordField.value;
                const confirm = confirmField.value;
                if (confirm.length === 0) {
                    confirmError.style.display = 'none';
                    confirmField.classList.remove('error', 'valid');
                    return;
                }
                if (pwd === confirm && pwd.length >= 6) {
                    confirmError.style.display = 'none';
                    confirmField.classList.remove('error');
                    confirmField.classList.add('valid');
                } else {
                    confirmError.style.display = 'block';
                    confirmField.classList.remove('valid');
                    confirmField.classList.add('error');
                }
            }

            function validatePassword() {
                const pwd = passwordField.value;
                const pwdError = document.getElementById('passwordError');
                if (pwd.length === 0) {
                    pwdError.style.display = 'none';
                    passwordField.classList.remove('error', 'valid');
                    return;
                }
                if (pwd.length >= 6) {
                    pwdError.style.display = 'none';
                    passwordField.classList.remove('error');
                    passwordField.classList.add('valid');
                } else {
                    pwdError.style.display = 'block';
                    passwordField.classList.remove('valid');
                    passwordField.classList.add('error');
                }
                if (confirmField.value.length > 0) {
                    validateConfirmPassword();
                }
            }

            passwordField.addEventListener('input', validatePassword);
            confirmField.addEventListener('input', validateConfirmPassword);
            passwordField.addEventListener('blur', validatePassword);
            confirmField.addEventListener('blur', validateConfirmPassword);

            // Other fields validation
            document.querySelectorAll('.form-input').forEach(input => {
                if (input.id === 'password' || input.id === 'confirmPassword') return;
                input.addEventListener('blur', function() {
                    const id = this.id;
                    const errorId = id + 'Error';
                    const validations = {
                        fullName: v => v.trim().length >= 3,
                        email: v => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v),
                        phone: v => v.trim().length >= 7,
                        cnic: v => v.trim().length >= 5,
                        city: v => v.trim().length > 0,
                        address: v => v.trim().length > 0
                    };
                    if (validations[id]) {
                        const pass = validations[id](this.value);
                        if (pass) {
                            this.classList.add('valid');
                            this.classList.remove('error');
                            document.getElementById(errorId).style.display = 'none';
                        } else if (this.value) {
                            this.classList.add('error');
                            this.classList.remove('valid');
                            document.getElementById(errorId).style.display = 'block';
                        } else {
                            this.classList.remove('valid', 'error');
                            document.getElementById(errorId).style.display = 'none';
                        }
                    }
                });
            });

            document.getElementById('terms').addEventListener('change', function() {
                if (this.checked) {
                    this.closest('.checkbox-group').classList.remove('error');
                    document.getElementById('termsError').style.display = 'none';
                }
            });

            // ============================================
            // 9. REVIEW SUMMARY
            // ============================================
            function updateReview() {
                const summary = document.getElementById('reviewSummary');
                const fields = {
                    'Full Name': document.getElementById('fullName').value || 'Not provided',
                    'Email': document.getElementById('email').value || 'Not provided',
                    'Phone': document.getElementById('phone').value || 'Not provided',
                    'CNIC': document.getElementById('cnic').value || 'Not provided',
                    'City': document.getElementById('city').value || 'Not provided',
                    'Address': document.getElementById('address').value || 'Not provided',
                    'Profile Image': document.getElementById('profile_image').files.length ? '📎 Uploaded' :
                        'Not provided'
                };

                let html = '<div class="review-grid">';
                const icons = {
                    'Full Name': 'fa-user',
                    'Email': 'fa-envelope',
                    'Phone': 'fa-phone',
                    'CNIC': 'fa-id-card',
                    'City': 'fa-city',
                    'Address': 'fa-map-pin',
                    'Profile Image': 'fa-image'
                };
                for (const [label, value] of Object.entries(fields)) {
                    html += `
                        <div class="review-item">
                            <strong><i class="fas ${icons[label]}"></i> ${label}</strong>
                            <span>${value}</span>
                        </div>
                    `;
                }
                html += `</div>
                    <div class="review-note">
                        <i class="fas fa-info-circle"></i>
                        <span><strong>Important:</strong> Please review all information before submission.</span>
                    </div>
                `;
                summary.innerHTML = html;
            }

            // ============================================
            // 10. CONFETTI
            // ============================================
            function createConfetti(count = 100) {
                const container = document.getElementById('confettiContainer');
                const colors = ['#dc2626', '#b91c1c', '#22c55e', '#2196F3', '#FFC107', '#ff6b6b', '#9C27B0', '#FF9800',
                    '#00BCD4', '#8BC34A'
                ];
                for (let i = 0; i < count; i++) {
                    const el = document.createElement('div');
                    el.className = 'confetti-piece';
                    const size = Math.random() * 10 + 4;
                    const isStar = Math.random() > 0.7;
                    el.style.width = size + 'px';
                    el.style.height = (Math.random() > 0.5 ? size : size * 0.4) + 'px';
                    el.style.background = colors[Math.floor(Math.random() * colors.length)];
                    el.style.borderRadius = Math.random() > 0.5 ? '2px' : '50%';
                    if (isStar) {
                        el.style.clipPath =
                            'polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%)';
                        el.style.borderRadius = '0';
                    }
                    el.style.left = Math.random() * 100 + '%';
                    el.style.transform = `rotate(${Math.random() * 360}deg)`;
                    el.style.boxShadow = '0 2px 8px rgba(0,0,0,0.1)';
                    el.style.animationDuration = (Math.random() * 3 + 2) + 's';
                    el.style.animationDelay = (Math.random() * 1.5) + 's';
                    container.appendChild(el);
                    setTimeout(() => el.remove(), 6000);
                }
            }

            // ============================================
            // 11. FORM SUBMISSION
            // ============================================
            const form = document.getElementById('registerForm');
            const submitBtn = document.getElementById('submitForm');
            const successOverlay = document.getElementById('successOverlay');
            const successModal = document.getElementById('successModal');
            const successMessage = document.getElementById('successMessage');
            const successTitle = document.getElementById('successTitle');
            const userName = document.getElementById('userName');
            const continueBtn = document.getElementById('continueBtn');
            const messageContainer = document.getElementById('messageContainer');

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const allValid = validateTab('personal-tab') && validateTab('employment-tab') &&
                    validateTab('review-tab');
                if (!allValid) {
                    const firstError = document.querySelector('.form-input.error, .checkbox-group.error');
                    if (firstError) {
                        const parentTab = firstError.closest('.tab-content');
                        if (parentTab) {
                            const tabId = parentTab.id.replace('-tab', '');
                            switchTab(tabId);
                        }
                    }
                    return;
                }

                submitBtn.classList.add('loading');
                submitBtn.disabled = true;
                messageContainer.innerHTML = '';

                successModal.classList.add('loading');
                successOverlay.classList.add('active');

                const formData = new FormData(form);
                const token = document.querySelector('input[name="_token"]')?.value;

                fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': token || ''
                        }
                    })
                    .then(async response => {
                        const contentType = response.headers.get('content-type');
                        let data;
                        if (contentType && contentType.includes('application/json')) {
                            data = await response.json();
                        } else {
                            const text = await response.text();
                            try { data = JSON.parse(text); } catch (e) {
                                if (response.redirected || response.status === 302 || response.status ===
                                    301) {
                                    data = { success: true, redirect: response.url };
                                } else {
                                    data = { success: false, message: 'Server error' };
                                }
                            }
                        }
                        return data;
                    })
                    .then(data => {
                        submitBtn.classList.remove('loading');
                        submitBtn.disabled = false;
                        successModal.classList.remove('loading');

                        if (data.success) {
                            const name = document.getElementById('fullName').value || 'User';
                            userName.textContent = name;
                            successTitle.textContent = '🎉 Account Created!';
                            successMessage.textContent = data.message ||
                                'Your registration was successful!';

                            // Animate stats
                            animateStats();

                            createConfetti(120);
                            setTimeout(() => createConfetti(80), 800);
                            setTimeout(() => createConfetti(60), 1600);

                            try {
                                const audioCtx = new(window.AudioContext || window.webkitAudioContext)();
                                [523.25, 659.25, 783.99, 1046.5].forEach((freq, i) => {
                                    const osc = audioCtx.createOscillator();
                                    const gain = audioCtx.createGain();
                                    osc.type = 'triangle';
                                    osc.frequency.value = freq;
                                    gain.gain.setValueAtTime(0, audioCtx.currentTime);
                                    gain.gain.linearRampToValueAtTime(0.1, audioCtx.currentTime +
                                        0.05 + i * 0.05);
                                    gain.gain.exponentialRampToValueAtTime(0.01, audioCtx
                                        .currentTime + 0.4 + i * 0.08);
                                    osc.connect(gain);
                                    gain.connect(audioCtx.destination);
                                    osc.start(audioCtx.currentTime + i * 0.08);
                                    osc.stop(audioCtx.currentTime + 0.5 + i * 0.08);
                                });
                            } catch (e) {}

                            if ('vibrate' in navigator) {
                                navigator.vibrate([50, 50, 50, 50, 100]);
                            }

                            if (data.redirect) {
                                setTimeout(() => {
                                    window.location.href = data.redirect;
                                }, 4000);
                            }
                        } else {
                            successOverlay.classList.remove('active');
                            let errorMessages = [];
                            if (data.errors) {
                                errorMessages = Object.values(data.errors).flat();
                                if (data.errors.name) document.getElementById('fullName').classList.add(
                                'error');
                                if (data.errors.email) document.getElementById('email').classList.add(
                                'error');
                                if (data.errors.password) document.getElementById('password').classList
                                    .add('error');
                                if (data.errors.phone) document.getElementById('phone').classList.add(
                                'error');
                                if (data.errors.cnic) document.getElementById('cnic').classList.add(
                                'error');
                                if (data.errors.city) document.getElementById('city').classList.add(
                                'error');
                                if (data.errors.address) document.getElementById('address').classList
                                    .add('error');
                            } else if (data.message) {
                                errorMessages = [data.message];
                            } else {
                                errorMessages = ['Registration failed. Please try again.'];
                            }

                            const errorBox = document.createElement('div');
                            errorBox.className = 'message-box errors';
                            errorBox.innerHTML = `
                                <i class="fas fa-exclamation-triangle"></i>
                                <span>${errorMessages.join(' · ')}</span>
                                <span class="close-btn" onclick="this.parentElement.remove()">✕</span>
                            `;
                            messageContainer.prepend(errorBox);
                        }
                    })
                    .catch(error => {
                        submitBtn.classList.remove('loading');
                        submitBtn.disabled = false;
                        successModal.classList.remove('loading');
                        successOverlay.classList.remove('active');

                        const errorBox = document.createElement('div');
                        errorBox.className = 'message-box errors';
                        errorBox.innerHTML = `
                            <i class="fas fa-exclamation-triangle"></i>
                            <span>Network error. Please try again.</span>
                            <span class="close-btn" onclick="this.parentElement.remove()">✕</span>
                        `;
                        messageContainer.prepend(errorBox);
                    });
            });

            // Animate stats
            function animateStats() {
                const stats = [
                    { el: document.getElementById('statComplete'), target: 100 },
                    { el: document.getElementById('statTime'), target: 2 },
                    { el: document.getElementById('statAccount'), target: 1 }
                ];
                stats.forEach(stat => {
                    let current = 0;
                    const increment = stat.target / 30;
                    const interval = setInterval(() => {
                        current += increment;
                        if (current >= stat.target) {
                            current = stat.target;
                            clearInterval(interval);
                        }
                        stat.el.textContent = Math.floor(current);
                    }, 50);
                });
            }

            // ============================================
            // 12. CONTINUE BUTTON
            // ============================================
            continueBtn.addEventListener('click', function() {
                successOverlay.classList.remove('active');
                window.location.href = '/login';
            });

            // ============================================
            // 13. INITIAL REVIEW
            // ============================================
            updateReview();
        });
    </script>
</body>
</html>