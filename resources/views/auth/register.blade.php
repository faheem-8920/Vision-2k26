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
            z-index: 2;
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

        /* ============================================================ */
        /* ===== REDIRECTING OVERLAY ===== */
        /* ============================================================ */
        .redirecting-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            padding: 1.5rem;
        }
        .redirecting-overlay.active {
            display: flex;
            animation: fadeInOverlay 0.5s ease;
        }
        @keyframes fadeInOverlay {
            0% { opacity: 0; backdrop-filter: blur(0px); transform: scale(0.98); }
            100% { opacity: 1; backdrop-filter: blur(20px); transform: scale(1); }
        }

        .redirecting-modal {
            background: white;
            padding: 4rem 4.5rem;
            border-radius: 3.5rem;
            text-align: center;
            max-width: 520px;
            width: 100%;
            animation: bounceIn 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
            box-shadow: 0 80px 200px rgba(0, 0, 0, 0.6);
            border: 2px solid rgba(220, 38, 38, 0.06);
            position: relative;
            overflow: hidden;
        }
        @keyframes bounceIn {
            0% { transform: scale(0.7) translateY(40px); opacity: 0; }
            100% { transform: scale(1) translateY(0); opacity: 1; }
        }

        .redirecting-modal .icon-wrapper {
            width: 100px;
            height: 100px;
            background: linear-gradient(145deg, #f59e0b, #d97706);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.8rem;
            box-shadow: 0 30px 60px -16px rgba(245, 158, 11, 0.35);
            position: relative;
            animation: iconPulse 2s ease-in-out infinite;
        }
        @keyframes iconPulse {
            0%,
            100% { transform: scale(1); }
            50% { transform: scale(1.06); }
        }
        .redirecting-modal .icon-wrapper i {
            font-size: 3.5rem;
            color: white;
        }

        .redirecting-modal h2 {
            font-size: 2rem;
            font-weight: 800;
            color: var(--text-primary);
            margin-bottom: 0.8rem;
            letter-spacing: -0.5px;
        }

        .redirecting-modal p {
            color: var(--text-secondary);
            font-size: 1rem;
            line-height: 1.7;
            margin-bottom: 1.5rem;
            max-width: 380px;
            margin-left: auto;
            margin-right: auto;
        }

        .redirecting-modal .loading-dots {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 20px 0;
        }
        .redirecting-modal .loading-dots span {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-red), var(--secondary-red));
            animation: dotBounce 1.4s ease-in-out infinite;
        }
        .redirecting-modal .loading-dots span:nth-child(1) { animation-delay: 0s; }
        .redirecting-modal .loading-dots span:nth-child(2) { animation-delay: 0.2s; }
        .redirecting-modal .loading-dots span:nth-child(3) { animation-delay: 0.4s; }
        @keyframes dotBounce {
            0%,
            80%,
            100% { transform: scale(0.4); opacity: 0.4; }
            40% { transform: scale(1); opacity: 1; }
        }

        .redirecting-modal .progress-track {
            width: 100%;
            height: 4px;
            background: var(--border-color);
            border-radius: 10px;
            overflow: hidden;
            margin-top: 10px;
        }
        .redirecting-modal .progress-fill {
            height: 100%;
            width: 0%;
            border-radius: 10px;
            background: linear-gradient(90deg, var(--primary-red), var(--secondary-red), #ff8a80);
            animation: progressFill 2.5s ease-in-out forwards;
        }
        @keyframes progressFill {
            0% { width: 0%; }
            40% { width: 60%; }
            70% { width: 85%; }
            100% { width: 100%; }
        }

        .redirecting-modal .float-particle {
            position: absolute;
            font-size: 1.5rem;
            opacity: 0;
            animation: floatParticle 3s ease-in-out infinite;
            pointer-events: none;
        }
        .redirecting-modal .float-particle:nth-child(1) { left: 8%; top: 10%; animation-delay: 0s; }
        .redirecting-modal .float-particle:nth-child(2) { right: 10%; top: 20%; animation-delay: 0.6s; }
        .redirecting-modal .float-particle:nth-child(3) { left: 5%; bottom: 25%; animation-delay: 1.2s; }
        .redirecting-modal .float-particle:nth-child(4) { right: 8%; bottom: 15%; animation-delay: 0.3s; }

        @keyframes floatParticle {
            0% { transform: translateY(0) scale(0); opacity: 0; }
            20% { opacity: 0.6; transform: translateY(-10px) scale(1); }
            80% { opacity: 0.6; transform: translateY(-25px) scale(1); }
            100% { transform: translateY(-40px) scale(0.8); opacity: 0; }
        }

        #confettiContainer {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 10001;
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

        @media (max-width: 768px) {
            .form-group { flex: 1 1 100%; }
            .tab-content { padding: 22px 18px; }
            .btn { padding: 10px 18px; font-size: 0.85rem; }
            .redirecting-modal { padding: 2.5rem 1.8rem; margin: 1rem; }
            .redirecting-modal .icon-wrapper { width: 80px; height: 80px; }
            .redirecting-modal .icon-wrapper i { font-size: 2.8rem; }
            .redirecting-modal h2 { font-size: 1.6rem; }
            .redirecting-modal .float-particle { display: none; }
        }
        @media (max-width: 480px) {
            .header h1 { font-size: 1.1rem; }
            .logo-text { font-size: 1.3rem; }
            .redirecting-modal { padding: 2rem 1.2rem; }
            .redirecting-modal h2 { font-size: 1.3rem; }
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
                            <div class="error-message" id="nameError">Must be 3-100 characters, letters and spaces only</div>
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
                                <input type="tel" id="phone" class="form-input" placeholder=" " name="phone" autocomplete="tel" maxlength="11">
                                <i class="fas fa-phone input-icon"></i>
                                <label class="floating-label">Phone Number <span style="color:var(--primary-red);">*</span></label>
                            </div>
                            <div class="error-message" id="phoneError">Must be 11 digits starting with 03 (e.g. 03001234567)</div>
                        </div>
                        <div class="form-group">
                            <div class="floating-label-wrapper">
                                <input type="text" id="cnic" class="form-input" placeholder=" " name="cnic" maxlength="15">
                                <i class="fas fa-id-card input-icon"></i>
                                <label class="floating-label">CNIC <span style="color:var(--primary-red);">*</span></label>
                            </div>
                            <div class="error-message" id="cnicError">Format: 12345-1234567-1 (13 digits with dashes)</div>
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
                            <div class="error-message" id="passwordError">Must be 6-30 characters</div>
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
                            <div class="error-message" id="cityError">Letters only, please</div>
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
                                <i class="fas fa-image" style="color:var(--primary-red);"></i> Profile Image <span style="font-weight:400;color:var(--text-secondary);font-size:0.8rem;">(optional - JPG, PNG, WEBP, max 2MB)</span>
                            </label>
                            <div class="drop-zone" id="dropZone">
                                <div class="drop-icon"><i class="fas fa-cloud-upload-alt"></i></div>
                                <div class="drop-text">Drag & drop your image here, or <span>browse</span></div>
                                <input type="file" id="profile_image" name="profile_photo" accept="image/*">
                            </div>
                            <div class="file-preview" id="filePreview">
                                <i class="fas fa-file-image"></i>
                                <span class="file-name" id="fileName">image.jpg</span>
                                <span class="file-size" id="fileSize">2.4 MB</span>
                                <span class="file-remove" id="fileRemove"><i class="fas fa-times"></i></span>
                            </div>
                            <div class="error-message" id="fileError">Max 2MB. Allowed: JPG, JPEG, PNG, WEBP</div>
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

    <!-- ============================================================ -->
    <!-- ===== REDIRECTING OVERLAY ===== -->
    <!-- ============================================================ -->
    <div class="redirecting-overlay" id="redirectingOverlay">
        <div class="redirecting-modal">
            <!-- Floating Particles -->
            <span class="float-particle">📧</span>
            <span class="float-particle">✉️</span>
            <span class="float-particle">🔐</span>
            <span class="float-particle">✅</span>

            <div class="icon-wrapper">
                <i class="fas fa-envelope-open-text"></i>
            </div>

            <h2>Redirecting to Verification</h2>
            <p>Your account has been created! We're taking you to verify your email address.</p>

            <!-- Animated Dots -->
            <div class="loading-dots">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <!-- Progress Bar -->
            <div class="progress-track">
                <div class="progress-fill"></div>
            </div>
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
            document.querySelectorAll('.btn-prev, .btn-next, .btn-submit').forEach(btn => {
                btn.addEventListener('mousemove', function(e) {
                    if (this.disabled) return;
                    const rect = this.getBoundingClientRect();
                    const x = (e.clientX - rect.left) / rect.width - 0.5;
                    const y = (e.clientY - rect.top) / rect.height - 0.5;
                    this.style.transform = `translate(${x * 8}px, ${y * 8}px) scale(1.04)`;
                    this.style.transition = 'transform 0.08s ease-out';
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

            document.querySelectorAll('.tab').forEach(tab => {
                tab.addEventListener('click', function(e) {
                    e.preventDefault();
                    const tabId = this.getAttribute('data-tab');
                    switchTab(tabId);
                });
            });

            document.querySelectorAll('.next-tab').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const current = document.querySelector('.tab-content.active');
                    const next = this.getAttribute('data-next');
                    if (validateTab(current.id)) {
                        switchTab(next);
                    }
                });
            });

            document.querySelectorAll('.prev-tab').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const prev = this.getAttribute('data-prev');
                    switchTab(prev);
                });
            });

            // ============================================
            // 8. ENHANCED VALIDATION
            // ============================================
            function validateTab(tabId) {
                let valid = true;
                const fields = {
                    'personal-tab': [
                        { 
                            id: 'fullName', 
                            err: 'nameError', 
                            test: function(v) {
                                const trimmed = v.trim();
                                return trimmed.length >= 3 && trimmed.length <= 100 && /^[A-Za-z\s]+$/.test(trimmed);
                            }
                        },
                        { 
                            id: 'email', 
                            err: 'emailError', 
                            test: function(v) {
                                return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v.trim());
                            }
                        },
                        { 
                            id: 'phone', 
                            err: 'phoneError', 
                            test: function(v) {
                                const cleaned = v.replace(/\D/g, '');
                                return cleaned.length === 11 && cleaned.startsWith('03');
                            }
                        },
                        { 
                            id: 'cnic', 
                            err: 'cnicError', 
                            test: function(v) {
                                return /^\d{5}-\d{7}-\d{1}$/.test(v.trim());
                            }
                        },
                        { 
                            id: 'password', 
                            err: 'passwordError', 
                            test: function(v) {
                                return v.length >= 6 && v.length <= 30;
                            }
                        },
                        { 
                            id: 'confirmPassword', 
                            err: 'confirmPasswordError', 
                            test: function(v) {
                                const pwd = document.getElementById('password');
                                return pwd && pwd.value && v === pwd.value;
                            }
                        }
                    ],
                    'employment-tab': [
                        { 
                            id: 'city', 
                            err: 'cityError', 
                            test: function(v) {
                                const trimmed = v.trim();
                                return trimmed.length > 0 && /^[A-Za-z\s]+$/.test(trimmed);
                            }
                        },
                        { 
                            id: 'address', 
                            err: 'addressError', 
                            test: function(v) {
                                return v.trim().length > 0;
                            }
                        },
                        { 
                            id: 'terms', 
                            err: 'termsError', 
                            test: function(v) {
                                return v === true;
                            }
                        }
                    ],
                    'review-tab': []
                };

                const tabFields = fields[tabId] || [];
                tabFields.forEach(({ id, err, test }) => {
                    const el = document.getElementById(id);
                    let val;
                    if (el.type === 'checkbox') {
                        val = el.checked;
                    } else {
                        val = el.value;
                    }
                    const pass = test(val);
                    if (!pass) {
                        const errorEl = document.getElementById(err);
                        if (errorEl) errorEl.style.display = 'block';
                        if (el) el.classList.add('error');
                        if (el) el.classList.remove('valid');
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

            // ============================================
            // 9. REAL-TIME VALIDATION
            // ============================================
            // Phone validation
            document.getElementById('phone').addEventListener('input', function() {
                this.value = this.value.replace(/\D/g, '');
                if (this.value.length > 11) {
                    this.value = this.value.slice(0, 11);
                }
                
                const cleaned = this.value;
                const isValid = cleaned.length === 11 && cleaned.startsWith('03');
                const errorEl = document.getElementById('phoneError');
                
                if (this.value.length > 0) {
                    if (isValid) {
                        this.classList.add('valid');
                        this.classList.remove('error');
                        errorEl.style.display = 'none';
                    } else {
                        this.classList.add('error');
                        this.classList.remove('valid');
                        errorEl.style.display = 'block';
                        if (cleaned.length < 11) {
                            errorEl.textContent = 'Must be 11 digits (currently ' + cleaned.length + ')';
                        } else if (!cleaned.startsWith('03')) {
                            errorEl.textContent = 'Must start with 03';
                        }
                    }
                } else {
                    this.classList.remove('valid', 'error');
                    errorEl.style.display = 'none';
                }
            });

            // CNIC validation
            document.getElementById('cnic').addEventListener('input', function() {
                let value = this.value.replace(/\D/g, '');
                if (value.length > 13) value = value.slice(0, 13);
                
                let formatted = '';
                for (let i = 0; i < value.length; i++) {
                    if (i === 5 || i === 12) {
                        formatted += '-';
                    }
                    formatted += value[i];
                }
                this.value = formatted;
                
                const isValid = /^\d{5}-\d{7}-\d{1}$/.test(this.value);
                const errorEl = document.getElementById('cnicError');
                
                if (this.value.length > 0) {
                    if (isValid) {
                        this.classList.add('valid');
                        this.classList.remove('error');
                        errorEl.style.display = 'none';
                    } else {
                        this.classList.add('error');
                        this.classList.remove('valid');
                        errorEl.style.display = 'block';
                    }
                } else {
                    this.classList.remove('valid', 'error');
                    errorEl.style.display = 'none';
                }
            });

            // Other fields
            document.querySelectorAll('.form-input').forEach(input => {
                if (input.id === 'phone' || input.id === 'cnic') return;
                
                input.addEventListener('input', function() {
                    const id = this.id;
                    const errorId = id + 'Error';
                    const validations = {
                        fullName: function(v) {
                            const trimmed = v.trim();
                            return trimmed.length >= 3 && trimmed.length <= 100 && /^[A-Za-z\s]+$/.test(trimmed);
                        },
                        email: function(v) {
                            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v.trim());
                        },
                        password: function(v) {
                            return v.length >= 6 && v.length <= 30;
                        },
                        confirmPassword: function(v) {
                            const pwd = document.getElementById('password');
                            return pwd && pwd.value && v === pwd.value;
                        },
                        city: function(v) {
                            const trimmed = v.trim();
                            return trimmed.length > 0 && /^[A-Za-z\s]+$/.test(trimmed);
                        },
                        address: function(v) {
                            return v.trim().length > 0;
                        }
                    };

                    if (validations[id]) {
                        const pass = validations[id](this.value);
                        if (pass) {
                            this.classList.add('valid');
                            this.classList.remove('error');
                            document.getElementById(errorId).style.display = 'none';
                        } else if (this.value.length > 0) {
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
            // 10. REVIEW SUMMARY
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
            // 11. CONFETTI
            // ============================================
            function createConfetti(count = 60) {
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
            // 12. FORM SUBMISSION - WITH PROPER REDIRECT
            // ============================================
            const form = document.getElementById('registerForm');
            const submitBtn = document.getElementById('submitForm');
            const redirectingOverlay = document.getElementById('redirectingOverlay');
            const messageContainer = document.getElementById('messageContainer');

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                // ===== STEP 1: CLEAR PREVIOUS ERRORS =====
                messageContainer.innerHTML = '';
                
                // ===== STEP 2: VALIDATE ALL TABS =====
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
                        setTimeout(() => {
                            const errorInput = document.querySelector('.form-input.error');
                            if (errorInput) errorInput.focus();
                        }, 100);
                    }
                    return; // STOP - NO ANIMATION
                }

                // ===== STEP 3: SHOW LOADING =====
                submitBtn.classList.add('loading');
                submitBtn.disabled = true;

                // ===== STEP 4: SHOW REDIRECTING OVERLAY =====
                redirectingOverlay.classList.add('active');

                // Small confetti burst
                setTimeout(() => createConfetti(40), 200);

                // ===== STEP 5: SUBMIT FORM =====
                const formData = new FormData(form);
                const token = document.querySelector('input[name="_token"]')?.value;

                fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': token || '',
                            'Accept': 'application/json'
                        }
                    })
                    .then(async response => {
                        // Check if it's a redirect (Laravel does this on success)
                        if (response.redirected) {
                            // Follow the redirect
                            window.location.href = response.url;
                            return;
                        }

                        const contentType = response.headers.get('content-type');
                        let data = { success: false, message: 'Unknown response' };
                        let bodyText = '';

                        // Success status (2xx)
                        if (response.ok) {
                            try {
                                bodyText = await response.text();
                            } catch (e) {
                                bodyText = '';
                            }

                            if (!bodyText || bodyText.trim() === '') {
                                data = { success: true };
                            } else {
                                try {
                                    const parsed = JSON.parse(bodyText);
                                    if (typeof parsed === 'object' && parsed !== null) {
                                        data = parsed;
                                        if (!('success' in data)) {
                                            data.success = true;
                                        }
                                    } else {
                                        data = { success: true };
                                    }
                                } catch (e) {
                                    data = { success: true };
                                }
                            }
                            return data;
                        }

                        // Error status (4xx, 5xx)
                        try {
                            bodyText = await response.text();
                            if (bodyText && bodyText.trim() !== '') {
                                const parsed = JSON.parse(bodyText);
                                if (typeof parsed === 'object' && parsed !== null) {
                                    data = parsed;
                                } else {
                                    data = { success: false, message: 'Server error' };
                                }
                            } else {
                                data = { success: false, message: 'Server error' };
                            }
                        } catch (e) {
                            data = { success: false, message: 'Server error' };
                        }
                        return data;
                    })
                    .then(data => {
                        submitBtn.classList.remove('loading');
                        submitBtn.disabled = false;

                        // ===== SUCCESS =====
                        if (data && data.success === true) {
                            window.location.href = '/verify-email';
                            return;
                        }

                        // ===== ERROR =====
                        redirectingOverlay.classList.remove('active');

                        let errorMessages = [];
                        if (data && data.errors) {
                            errorMessages = Object.values(data.errors).flat();
                            // Highlight fields with errors
                            if (data.errors.name) {
                                document.getElementById('fullName').classList.add('error');
                                document.getElementById('nameError').style.display = 'block';
                            }
                            if (data.errors.email) {
                                document.getElementById('email').classList.add('error');
                                document.getElementById('emailError').style.display = 'block';
                            }
                            if (data.errors.password) {
                                document.getElementById('password').classList.add('error');
                                document.getElementById('passwordError').style.display = 'block';
                            }
                            if (data.errors.phone) {
                                document.getElementById('phone').classList.add('error');
                                document.getElementById('phoneError').style.display = 'block';
                            }
                            if (data.errors.cnic) {
                                document.getElementById('cnic').classList.add('error');
                                document.getElementById('cnicError').style.display = 'block';
                            }
                            if (data.errors.city) {
                                document.getElementById('city').classList.add('error');
                                document.getElementById('cityError').style.display = 'block';
                            }
                            if (data.errors.address) {
                                document.getElementById('address').classList.add('error');
                                document.getElementById('addressError').style.display = 'block';
                            }
                        } else if (data && data.message) {
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
                    })
                    .catch(error => {
                        submitBtn.classList.remove('loading');
                        submitBtn.disabled = false;
                        redirectingOverlay.classList.remove('active');
                        console.error('Fetch error:', error);

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

            // ============================================
            // 13. INITIAL REVIEW
            // ============================================
            updateReview();
        });
    </script>
</body>
</html>