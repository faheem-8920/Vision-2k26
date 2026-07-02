@extends('Vendor.layout')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Item · RedTruck</title>

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

    <style>
        /* ============================================================
               ROOT – strict red & white
               ============================================================ */
        :root {
            --primary: #dc3545;
            --primary-rgb: 220, 53, 69;
            --primary-dark: #b02a37;
            --primary-darker: #8c2128;
            --primary-light: #fce4e6;
            --primary-lighter: #fdf3f4;
            --primary-glow: rgba(220, 53, 69, 0.18);
            --success: #198754;
            --success-rgb: 25, 135, 84;
            --success-light: #e7f6ee;
            --success-glow: rgba(25, 135, 84, 0.18);
            --danger: #dc3545;
            --white: #ffffff;
            --gray-50: #f8f9fa;
            --gray-100: #f1f3f5;
            --gray-200: #e9ecef;
            --gray-300: #dee2e6;
            --gray-400: #ced4da;
            --gray-500: #adb5bd;
            --gray-600: #6c757d;
            --gray-700: #495057;
            --gray-800: #343a40;
            --gray-900: #212529;
            --radius: 10px;
            --radius-lg: 16px;
            --shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 12px 40px rgba(0, 0, 0, 0.1);
            --transition: 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #f1f3f5;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 24px;
            color: var(--gray-800);
        }

        .form-container {
            background: var(--white);
            width: 100%;
            max-width: 980px;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            border: 1px solid rgba(220, 53, 69, 0.08);
            transition: var(--transition);
        }

        .form-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            padding: 28px 36px;
            color: white;
            position: relative;
        }

        .form-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: rgba(255, 255, 255, 0.25);
        }

        .header-content {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .header-icon {
            width: 52px;
            height: 52px;
            background: rgba(255, 255, 255, 0.18);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            backdrop-filter: blur(4px);
            transition: var(--transition);
        }

        .form-header:hover .header-icon {
            transform: rotate(-6deg) scale(1.05);
            background: rgba(255, 255, 255, 0.25);
        }

        .header-text h1 {
            font-size: 26px;
            font-weight: 800;
            letter-spacing: -0.02em;
            margin-bottom: 2px;
        }

        .header-text p {
            font-size: 14px;
            opacity: 0.85;
            font-weight: 400;
        }

        .progress-container {
            margin-top: 18px;
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .progress-bar {
            flex: 1;
            height: 5px;
            background: rgba(255, 255, 255, 0.25);
            border-radius: 4px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: white;
            width: 0%;
            border-radius: 4px;
            transition: width 0.35s ease;
        }

        .progress-text {
            font-size: 12px;
            font-weight: 700;
            min-width: 42px;
            text-align: right;
            color: rgba(255, 255, 255, 0.9);
            letter-spacing: 0.3px;
        }

        .form-body {
            padding: 36px 36px 28px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 36px;
            background: var(--white);
        }

        @media (max-width: 768px) {
            .form-body {
                grid-template-columns: 1fr;
                gap: 20px;
                padding: 24px 20px;
            }
        }

        .form-section {
            animation: fadeIn 0.4s ease;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 22px;
            padding-bottom: 12px;
            border-bottom: 2px solid var(--primary-light);
        }

        .section-title i {
            width: 36px;
            height: 36px;
            background: var(--primary-light);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 16px;
            transition: var(--transition);
        }

        .section-title h3 {
            font-size: 15px;
            font-weight: 700;
            color: var(--gray-900);
            letter-spacing: 0.3px;
            text-transform: uppercase;
        }

        .form-group {
            margin-bottom: 22px;
            position: relative;
        }

        .input-wrapper {
            position: relative;
            border-radius: var(--radius);
            background: var(--white);
            border: 2px solid var(--gray-200);
            transition: border-color var(--transition), box-shadow var(--transition), background var(--transition);
            min-height: 54px;
        }

        .input-wrapper:hover {
            border-color: var(--gray-300);
        }

        .input-wrapper:focus-within {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px var(--primary-glow);
        }

        .input-wrapper.success {
            border-color: var(--success);
            background: var(--success-light);
        }
        .input-wrapper.success:focus-within {
            box-shadow: 0 0 0 4px var(--success-glow);
        }

        .input-wrapper.error {
            border-color: var(--danger);
            background: var(--primary-lighter);
        }
        .input-wrapper.error:focus-within {
            box-shadow: 0 0 0 4px rgba(220, 53, 69, 0.18);
        }

        .floating-label {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 14px;
            color: var(--gray-500);
            pointer-events: none;
            transition: all var(--transition);
            background: transparent;
            padding: 0 4px;
            font-weight: 500;
            z-index: 2;
        }

        .input-wrapper.textarea .floating-label {
            top: 16px;
            transform: translateY(0);
        }

        .input-wrapper.floating .floating-label {
            top: -10px;
            left: 12px;
            font-size: 11px;
            color: var(--primary);
            background: white;
            padding: 0 6px;
            font-weight: 700;
            letter-spacing: 0.4px;
            text-transform: uppercase;
        }

        .input-wrapper.success.floating .floating-label {
            color: var(--success);
            background: var(--success-light);
        }

        .input-wrapper.error.floating .floating-label {
            color: var(--danger);
            background: var(--primary-lighter);
        }

        .input-wrapper input,
        .input-wrapper select,
        .input-wrapper textarea {
            width: 100%;
            padding: 16px 44px 12px 14px;
            border: none;
            background: transparent;
            font-size: 14px;
            font-family: inherit;
            color: var(--gray-900);
            outline: none;
            border-radius: var(--radius);
            position: relative;
            z-index: 1;
            min-height: 50px;
        }

        .input-wrapper input::placeholder,
        .input-wrapper textarea::placeholder {
            color: var(--gray-400);
            font-weight: 400;
            opacity: 1;
            transition: opacity var(--transition);
        }

        .input-wrapper:not(.floating) input::placeholder,
        .input-wrapper:not(.floating) textarea::placeholder {
            opacity: 0;
        }

        .input-wrapper textarea {
            min-height: 80px;
            resize: vertical;
            padding-top: 18px;
        }

        .input-wrapper select {
            appearance: none;
            -webkit-appearance: none;
            padding-right: 44px;
            cursor: pointer;
        }

        .input-wrapper .input-icon {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
            font-size: 16px;
            pointer-events: none;
            z-index: 2;
            transition: color var(--transition);
        }

        .input-wrapper.textarea .input-icon {
            top: 18px;
            transform: none;
        }

        .input-wrapper:focus-within .input-icon {
            color: var(--primary);
        }
        .input-wrapper.success .input-icon {
            color: var(--success);
        }
        .input-wrapper.error .input-icon {
            color: var(--danger);
        }

        .input-wrapper::after {
            content: '';
            position: absolute;
            right: 42px;
            top: 50%;
            transform: translateY(-50%);
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            font-size: 16px;
            z-index: 2;
            display: none;
            pointer-events: none;
            animation: popCheck 0.3s ease;
        }

        @keyframes popCheck {
            0% { transform: translateY(-50%) scale(0.5); opacity: 0; }
            100% { transform: translateY(-50%) scale(1); opacity: 1; }
        }

        .input-wrapper.textarea::after {
            top: 20px;
            transform: none;
        }

        .input-wrapper.success::after {
            content: '\f00c';
            display: block;
            color: var(--success);
        }

        .input-wrapper.error::after {
            content: '\f00d';
            display: block;
            color: var(--danger);
        }

        .error-message {
            font-size: 12px;
            color: var(--danger);
            margin-top: 5px;
            display: none;
            align-items: center;
            gap: 5px;
            font-weight: 600;
            animation: fadeSlide 0.25s ease;
        }

        .error-message.show {
            display: flex;
        }

        @keyframes fadeSlide {
            0% { opacity: 0; transform: translateY(-4px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .help-text {
            font-size: 11px;
            color: var(--gray-500);
            margin-top: 4px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .file-input-wrapper {
            position: relative;
            width: 100%;
        }

        .file-input-wrapper .file-drop-zone {
            border: 2px dashed var(--gray-300);
            border-radius: var(--radius);
            padding: 28px 20px;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
            background: var(--gray-50);
            position: relative;
        }

        .file-input-wrapper .file-drop-zone:hover {
            border-color: var(--primary);
            background: var(--primary-light);
        }

        .file-input-wrapper .file-drop-zone.dragover {
            border-color: var(--primary);
            background: var(--primary-light);
            transform: scale(1.02);
        }

        .file-input-wrapper .file-drop-zone i {
            font-size: 36px;
            color: var(--primary);
            display: block;
            margin-bottom: 8px;
            transition: var(--transition);
        }

        .file-input-wrapper .file-drop-zone:hover i {
            transform: translateY(-3px);
        }

        .file-input-wrapper .file-drop-zone p {
            color: var(--gray-600);
            font-size: 14px;
            margin: 0;
        }

        .file-input-wrapper .file-drop-zone .file-hint {
            font-size: 12px;
            color: var(--gray-500);
            margin-top: 4px;
        }

        .file-input-wrapper input[type="file"] {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
            width: 100%;
            height: 100%;
            z-index: 2;
        }

        .file-preview-area {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 12px;
        }

        .file-preview-item {
            width: 72px;
            height: 72px;
            border-radius: var(--radius);
            overflow: hidden;
            border: 2px solid var(--gray-200);
            position: relative;
            background: var(--gray-100);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
            animation: fadeIn 0.3s ease;
        }

        .file-preview-item:hover {
            border-color: var(--primary);
            transform: scale(1.05);
        }

        .file-preview-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .file-preview-item .file-name {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.6);
            color: white;
            font-size: 8px;
            padding: 2px 4px;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .file-preview-item .remove-file {
            position: absolute;
            top: -6px;
            right: -6px;
            background: var(--danger);
            color: white;
            border: none;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            font-size: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            transition: var(--transition);
            z-index: 3;
        }

        .file-preview-item .remove-file:hover {
            transform: scale(1.2);
            background: var(--primary-darker);
        }

        .file-preview-item .file-size {
            position: absolute;
            top: 4px;
            left: 4px;
            background: rgba(0, 0, 0, 0.6);
            color: white;
            font-size: 8px;
            padding: 1px 6px;
            border-radius: 8px;
            z-index: 3;
        }

        .form-actions {
            grid-column: span 2;
            padding-top: 24px;
            border-top: 1px solid var(--gray-200);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
        }

        @media (max-width: 768px) {
            .form-actions {
                grid-column: span 1;
                flex-direction: column;
                align-items: stretch;
            }
        }

        .form-info {
            font-size: 12px;
            color: var(--gray-600);
        }

        .form-info i {
            color: var(--primary);
            margin-right: 6px;
        }

        .btn {
            padding: 13px 32px;
            border: none;
            border-radius: var(--radius);
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: all var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            letter-spacing: 0.3px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            box-shadow: 0 4px 14px rgba(220, 53, 69, 0.3);
        }

        .btn-primary:hover:not(:disabled) {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(220, 53, 69, 0.4);
        }

        .btn-primary:active:not(:disabled) {
            transform: scale(0.97);
        }

        .btn-secondary {
            background: var(--gray-100);
            color: var(--gray-700);
            border: 1px solid var(--gray-300);
        }

        .btn-secondary:hover {
            background: var(--gray-200);
            transform: translateY(-2px);
        }

        /* Disabled state now also doubles as the "form incomplete" indicator,
           since the button is disabled by default and only enables once every
           required field, business rule, and file requirement passes. */
        .btn:disabled {
            opacity: 0.55;
            cursor: not-allowed;
            transform: none !important;
            background: var(--gray-300) !important;
            color: var(--gray-600) !important;
            box-shadow: none !important;
        }

        .btn-primary:disabled {
            background: var(--gray-300) !important;
        }

        .submit-hint {
            font-size: 11.5px;
            color: var(--gray-500);
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: var(--transition);
        }

        .submit-hint.ready {
            color: var(--success);
            font-weight: 600;
        }

        .btn-spinner {
            display: inline-block;
            width: 18px;
            height: 18px;
            border: 2.5px solid rgba(255, 255, 255, 0.3);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spin 0.7s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .toast {
            position: fixed;
            top: 24px;
            right: 24px;
            background: white;
            padding: 16px 20px;
            border-radius: var(--radius);
            box-shadow: var(--shadow-lg);
            display: flex;
            align-items: center;
            gap: 14px;
            z-index: 1002;
            transform: translateX(120%);
            transition: transform 0.35s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border-left: 5px solid var(--primary);
            max-width: 400px;
            min-width: 280px;
        }

        .toast.show {
            transform: translateX(0);
        }

        .toast-icon {
            width: 28px;
            height: 28px;
            background: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 13px;
            flex-shrink: 0;
        }

        .toast-content {
            flex: 1;
        }

        .toast-title {
            font-size: 14px;
            font-weight: 700;
            color: var(--gray-900);
        }

        .toast-message {
            font-size: 12px;
            color: var(--gray-600);
            margin-top: 2px;
        }

        .toast-close {
            background: none;
            border: none;
            color: var(--gray-400);
            cursor: pointer;
            font-size: 18px;
            padding: 0;
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .toast-close:hover {
            color: var(--gray-700);
            transform: rotate(90deg);
        }

        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.92);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            backdrop-filter: blur(6px);
        }

        .loading-overlay.active {
            display: flex;
            animation: fadeIn 0.3s ease;
        }

        .loading-content {
            text-align: center;
            color: var(--gray-900);
            max-width: 400px;
            padding: 40px;
        }

        .loading-content i {
            font-size: 48px;
            color: var(--primary);
            margin-bottom: 20px;
            display: block;
        }

        .loading-content h3 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .loading-content p {
            font-size: 14px;
            color: var(--gray-600);
            margin-bottom: 24px;
        }

        .loading-steps {
            margin: 24px 0;
        }

        .loading-step {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 14px;
            opacity: 0.4;
            transition: opacity 0.3s;
        }

        .loading-step.active {
            opacity: 1;
        }

        .step-check {
            width: 26px;
            height: 26px;
            background: var(--gray-200);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
            color: var(--gray-600);
            transition: var(--transition);
        }

        .loading-step.active .step-check {
            background: var(--primary);
            color: white;
            transform: scale(1.1);
        }

        .step-text {
            font-size: 14px;
            font-weight: 500;
        }

        .loading-content .progress-bar {
            background: var(--gray-200);
            height: 5px;
            border-radius: 4px;
            overflow: hidden;
            margin-top: 8px;
        }
        .loading-content .progress-fill {
            background: var(--primary);
            height: 100%;
            width: 0%;
            transition: width 0.4s ease;
        }

        .success-container {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.92);
            background: white;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            padding: 44px 40px 36px;
            text-align: center;
            max-width: 500px;
            width: 92%;
            display: none;
            z-index: 1001;
            opacity: 0;
            animation: popIn 0.45s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
            border: 2px solid var(--primary-light);
        }

        @keyframes popIn {
            to { opacity: 1; transform: translate(-50%, -50%) scale(1); }
        }

        .success-container.active {
            display: block;
        }

        .success-icon {
            width: 76px;
            height: 76px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 34px;
            color: white;
            box-shadow: 0 8px 30px rgba(220, 53, 69, 0.3);
            animation: bounce 0.6s ease 0.1s both;
        }

        @keyframes bounce {
            0% { transform: scale(0); }
            60% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        .success-container h2 {
            font-size: 22px;
            font-weight: 800;
            color: var(--gray-900);
            margin-bottom: 10px;
        }

        .success-container .success-message {
            font-size: 15px;
            color: var(--gray-700);
            margin-bottom: 20px;
            line-height: 1.7;
            padding: 0 10px;
        }

        .success-container .success-message i {
            color: var(--primary);
            margin-right: 6px;
        }

        .tracking-box {
            background: var(--primary-light);
            padding: 16px;
            border-radius: var(--radius);
            margin: 16px 0 20px;
            border: 2px dashed var(--primary);
        }

        .tracking-box p {
            font-size: 12px;
            color: var(--gray-600);
            margin-bottom: 4px;
        }

        .tracking-id {
            font-size: 24px;
            font-weight: 800;
            color: var(--primary);
            letter-spacing: 1px;
        }

        .approval-note {
            background: var(--gray-50);
            border: 1px solid var(--gray-200);
            border-radius: var(--radius);
            padding: 12px 16px;
            font-size: 12.5px;
            color: var(--gray-600);
            display: flex;
            align-items: flex-start;
            gap: 8px;
            text-align: left;
            margin-bottom: 4px;
        }

        .approval-note i {
            color: var(--primary);
            margin-top: 1px;
        }

        .error-modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(4px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1001;
            padding: 20px;
        }

        .error-modal-overlay.active {
            display: flex;
            animation: fadeIn 0.3s ease;
        }

        .error-modal {
            background: white;
            border-radius: var(--radius-lg);
            padding: 40px 36px 32px;
            max-width: 420px;
            width: 100%;
            text-align: center;
            box-shadow: var(--shadow-lg);
            animation: modalPop 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            border-top: 5px solid var(--danger);
        }

        .error-modal .error-icon {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            font-size: 28px;
            color: var(--danger);
            animation: shake 0.5s ease;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20% { transform: translateX(-8px); }
            40% { transform: translateX(8px); }
            60% { transform: translateX(-5px); }
            80% { transform: translateX(5px); }
        }

        .error-modal h4 {
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 6px;
        }

        .error-modal p {
            color: var(--gray-600);
            font-size: 14px;
            margin-bottom: 20px;
        }

        .error-modal .btn-error-close {
            padding: 10px 32px;
            border: none;
            border-radius: var(--radius);
            background: var(--gray-200);
            color: var(--gray-700);
            font-weight: 600;
            transition: var(--transition);
            cursor: pointer;
        }

        .error-modal .btn-error-close:hover {
            background: var(--gray-300);
        }

        @keyframes modalPop {
            0% { opacity: 0; transform: scale(0.9) translateY(10px); }
            100% { opacity: 1; transform: scale(1) translateY(0); }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(6px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 480px) {
            .form-header { padding: 20px; }
            .header-content { flex-direction: column; text-align: center; gap: 10px; }
            .form-body { padding: 16px; }
            .success-container { padding: 30px 20px; }
            .btn { width: 100%; justify-content: center; }
            .file-preview-item { width: 60px; height: 60px; }
        }
    </style>
</head>
<body>

    <!-- Toast -->
    <div class="toast" id="toast">
        <div class="toast-icon">
            <i class="fas fa-check"></i>
        </div>
        <div class="toast-content">
            <div class="toast-title" id="toastTitle">Success!</div>
            <div class="toast-message" id="toastMessage">Action completed.</div>
        </div>
        <button class="toast-close" onclick="hideToast()">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-content">
            <i class="fas fa-box-open fa-spin"></i>
            <h3>Adding Item</h3>
            <p>Please wait while we process your listing</p>
            <div class="loading-steps">
                <div class="loading-step active" id="step1">
                    <div class="step-check">1</div>
                    <div class="step-text">Validating details</div>
                </div>
                <div class="loading-step" id="step2">
                    <div class="step-check">2</div>
                    <div class="step-text">Uploading images</div>
                </div>
                <div class="loading-step" id="step3">
                    <div class="step-check">3</div>
                    <div class="step-text">Saving to database</div>
                </div>
            </div>
            <div class="progress-bar">
                <div class="progress-fill" id="loadingProgress" style="width: 25%"></div>
            </div>
        </div>
    </div>

    <!-- Success Container -->
    <div class="success-container" id="successContainer">
        <div class="success-icon">
            <i class="fas fa-check"></i>
        </div>
        <h2>Item Submitted!</h2>
        <div class="success-message">
            <i class="fas fa-paper-plane"></i> Your item request has been successfully sent to the admin.
        </div>
        <div class="tracking-box">
            <p>Reference ID:</p>
            <div class="tracking-id" id="trackingIdDisplay">ITM-00001</div>
        </div>
        <div class="approval-note">
            <i class="fas fa-hourglass-half"></i>
            <span>Please wait until the admin reviews and approves your listing. You'll be notified once it's live.</span>
        </div>
        <div style="display: flex; gap: 12px; justify-content: center; margin-top: 16px; flex-wrap: wrap;">
            <button class="btn btn-secondary" onclick="resetForm()" style="padding:10px 28px; font-size:13px;">
                <i class="fas fa-plus"></i> Add Another
            </button>
        </div>
    </div>

    <!-- Error Modal - Only shows for server errors, not validation -->
    <div class="error-modal-overlay" id="errorModal">
        <div class="error-modal">
            <div class="error-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <h4>Submission Failed</h4>
            <p id="errorMessage">Something went wrong. Please try again.</p>
            <button class="btn-error-close" id="errorCloseBtn">Try Again</button>
        </div>
    </div>

    <!-- MAIN FORM -->
    <div class="form-container">
        <div class="form-header">
            <div class="header-content">
                <div class="header-icon">
                    <i class="fas fa-box"></i>
                </div>
                <div class="header-text">
                    <h1>Add New Item</h1>
                    <p>List your item for rent in seconds</p>
                </div>
            </div>
            <div class="progress-container">
                <div class="progress-bar">
                    <div class="progress-fill" id="formProgress" style="width: 0%;"></div>
                </div>
                <div class="progress-text" id="progressText">0%</div>
            </div>
        </div>

        <form id="itemForm" action="/owner/items/store" method="POST" enctype="multipart/form-data" novalidate>
            @csrf

            <div class="form-body">
                <!-- LEFT COLUMN: Item Details -->
                <div class="form-section">
                    <div class="section-title">
                        <i class="fas fa-tag"></i>
                        <h3>Item Details</h3>
                    </div>

                    <!-- Title -->
                    <div class="form-group">
                        <div class="input-wrapper" id="title-wrapper">
                            <span class="floating-label">Item Title</span>
                            <input type="text" id="title" name="title" placeholder="e.g. Canon EOS R5 Camera" required />
                            <span class="input-icon"><i class="fas fa-pencil-alt"></i></span>
                        </div>
                        <div class="error-message" id="title-error">Item title is required.</div>
                    </div>

                    <!-- Category -->
                    <div class="form-group">
                        <div class="input-wrapper" id="category-wrapper">
                            <span class="floating-label">Category</span>
                            <select id="category_id" name="category_id" required>
                                <option value="" disabled selected>Select a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <span class="input-icon"><i class="fas fa-list"></i></span>
                        </div>
                        <div class="error-message" id="category-error">Please select a category.</div>
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <div class="input-wrapper textarea" id="description-wrapper">
                            <span class="floating-label">Description</span>
                            <textarea id="description" name="description" placeholder="e.g. Professional mirrorless camera, barely used, includes 2 batteries and original box." required></textarea>
                            <span class="input-icon" style="top:18px;transform:none;"><i class="fas fa-align-left"></i></span>
                        </div>
                        <div class="error-message" id="description-error">Description is required.</div>
                    </div>

                    <!-- City -->
                    <div class="form-group">
                        <div class="input-wrapper" id="city-wrapper">
                            <span class="floating-label">City</span>
                            <input type="text" id="city" name="city" placeholder="e.g. Karachi" required />
                            <span class="input-icon"><i class="fas fa-city"></i></span>
                        </div>
                        <div class="error-message" id="city-error">Please select your city.</div>
                    </div>

                    <!-- Address -->
                    <div class="form-group">
                        <div class="input-wrapper textarea" id="address-wrapper">
                            <span class="floating-label">Address</span>
                            <textarea id="address" name="address" placeholder="e.g. House 12, Block C, Gulshan-e-Iqbal" required></textarea>
                            <span class="input-icon" style="top:18px;transform:none;"><i class="fas fa-map-pin"></i></span>
                        </div>
                        <div class="error-message" id="address-error">Address is required.</div>
                    </div>
                </div>

                <!-- RIGHT COLUMN: Pricing & Stock -->
                <div class="form-section">
                    <div class="section-title">
                        <i class="fas fa-dollar-sign"></i>
                        <h3>Pricing &amp; Stock</h3>
                    </div>

                    <!-- Rent Per Day -->
                    <div class="form-group">
                        <div class="input-wrapper" id="rent-wrapper">
                            <span class="floating-label">Rent Per Day ($)</span>
                            <input type="number" id="rent_price_per_day" name="rent_price_per_day" placeholder="e.g. 25.00" step="0.01" min="1" required />
                            <span class="input-icon"><i class="fas fa-dollar-sign"></i></span>
                        </div>
                        <div class="error-message" id="rent-error">Enter the daily rental price.</div>
                    </div>

                    <!-- Security Deposit -->
                    <div class="form-group">
                        <div class="input-wrapper" id="deposit-wrapper">
                            <span class="floating-label">Security Deposit ($)</span>
                            <input type="number" id="security_deposit" name="security_deposit" placeholder="e.g. 100.00" step="0.01" min="0" required />
                            <span class="input-icon"><i class="fas fa-shield-alt"></i></span>
                        </div>
                        <div class="error-message" id="deposit-error">Enter the security deposit.</div>
                    </div>

                    <!-- Replacement Cost -->
                    <div class="form-group">
                        <div class="input-wrapper" id="replacement-wrapper">
                            <span class="floating-label">Replacement Cost ($)</span>
                            <input type="number" id="replacement_cost" name="replacement_cost" placeholder="e.g. 1800.00" step="0.01" min="0" required />
                            <span class="input-icon"><i class="fas fa-exchange-alt"></i></span>
                        </div>
                        <div class="error-message" id="replacement-error">Enter the replacement cost.</div>
                    </div>

                    <!-- Quantity -->
                    <div class="form-group">
                        <div class="input-wrapper" id="quantity-wrapper">
                            <span class="floating-label">Quantity</span>
                            <input type="number" id="quantity" name="quantity" placeholder="e.g. 1" min="1" required />
                            <span class="input-icon"><i class="fas fa-hashtag"></i></span>
                        </div>
                        <div class="error-message" id="quantity-error">Enter the available quantity.</div>
                    </div>

                    <!-- Images with preview -->
                    <div class="form-group">
                        <div class="input-wrapper" id="images-wrapper">
                            <span class="floating-label">Item Images</span>
                            <div class="file-input-wrapper">
                                <div class="file-drop-zone" id="fileDropZone">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <p><strong>Click to upload</strong> or drag and drop</p>
                                    <div class="file-hint">JPG, PNG, WEBP, GIF, BMP, SVG, AVIF, HEIC, TIFF, ICO · min 2, max 10 · 5 MB each</div>
                                    <input type="file" id="images" name="images[]" multiple accept="image/*" required />
                                </div>
                            </div>
                        </div>
                        <div class="error-message" id="images-error">Please upload at least 2 images.</div>
                        <div class="help-text">
                            <i class="fas fa-info-circle"></i> Min 2 images, max 10. Supports JPG, PNG, WEBP, GIF, BMP, SVG, AVIF, HEIC, TIFF, ICO · max 5 MB each
                        </div>
                        <div class="file-preview-area" id="filePreviewArea"></div>
                    </div>
                </div>

                <!-- FORM ACTIONS -->
                <div class="form-actions">
                    <div>
                        <div class="form-info">
                            <i class="fas fa-lock"></i> All data is encrypted
                        </div>
                        <div class="submit-hint" id="submitHint">
                            <i class="fas fa-info-circle"></i> Fill all required fields to enable submission
                        </div>
                    </div>
                    <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                        <button type="button" class="btn btn-secondary" onclick="resetForm()">
                            <i class="fas fa-redo"></i> Clear
                        </button>
                        <button type="submit" class="btn btn-primary" id="submitBtn" disabled>
                            <i class="fas fa-plus-circle"></i> Add Item
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        // ================================================================
        //  COMPLETE VALIDATION ENGINE - All rules applied
        // ================================================================
        class ItemForm {
            constructor() {
                this.form = document.getElementById('itemForm');
                this.submitBtn = document.getElementById('submitBtn');
                this.submitHint = document.getElementById('submitHint');
                this.loadingOverlay = document.getElementById('loadingOverlay');
                this.successContainer = document.getElementById('successContainer');
                this.errorModal = document.getElementById('errorModal');
                this.errorMessage = document.getElementById('errorMessage');
                this.toast = document.getElementById('toast');
                this.formProgress = document.getElementById('formProgress');
                this.progressText = document.getElementById('progressText');
                this.trackingIdDisplay = document.getElementById('trackingIdDisplay');
                this.fileInput = document.getElementById('images');
                this.previewArea = document.getElementById('filePreviewArea');
                this.dropZone = document.getElementById('fileDropZone');

                this.submitting = false;
                this.selectedFiles = [];

                // ── IMAGE VALIDATION CONFIG ─────────────────────────────────
                // Single source of truth. Change here → everything stays in sync.
                this.allowedExtensions  = ['jpg', 'jpeg', 'png', 'webp', 'gif', 'bmp', 'svg',
                                           'tiff', 'tif', 'avif', 'heic', 'heif', 'ico'];
                this.allowedMimeTypes   = ['image/jpeg', 'image/png', 'image/webp', 'image/gif',
                                           'image/bmp', 'image/svg+xml', 'image/tiff',
                                           'image/avif', 'image/heic', 'image/heif', 'image/x-icon',
                                           'image/vnd.microsoft.icon'];
                this.maxFileSize        = 5 * 1024 * 1024; // 5 MB per image
                this.minImages          = 2;                // owner can upload as few as 2
                this.maxImages          = 10;
                // ────────────────────────────────────────────────────────────

                this.init();
            }

            init() {
                this.setupEventListeners();
                this.setupFloatingLabels();
                this.updateProgress();
                this.updateSubmitState();
                this.setupDragAndDrop();
            }

            setupEventListeners() {
                this.form.addEventListener('submit', (e) => this.handleSubmit(e));

                const inputs = this.form.querySelectorAll('input, select, textarea');
                inputs.forEach(input => {
                    input.addEventListener('blur', () => {
                        this.validateField(input);
                        this.updateProgress();
                        this.updateSubmitState();
                    });
                    input.addEventListener('input', () => {
                        this.validateField(input);
                        this.updateProgress();
                        this.updateSubmitState();
                    });
                    if (input.tagName === 'SELECT') {
                        input.addEventListener('change', () => {
                            this.validateField(input);
                            this.updateProgress();
                            this.updateSubmitState();
                        });
                    }
                });

                // Special: real-time validation for number fields with business rules
                ['rent_price_per_day', 'security_deposit', 'replacement_cost'].forEach(id => {
                    const el = document.getElementById(id);
                    if (el) {
                        el.addEventListener('input', () => {
                            this.validateField(el);
                            this.validateBusinessRules();
                            this.updateProgress();
                            this.updateSubmitState();
                        });
                    }
                });

                this.fileInput.addEventListener('change', (e) => {
                    this.handleFileSelect(e);
                });

                this.previewArea.addEventListener('click', (e) => {
                    if (e.target.closest('.remove-file')) {
                        const index = parseInt(e.target.closest('.remove-file').dataset.index);
                        this.removeFileAtIndex(index);
                    }
                });

                document.getElementById('errorCloseBtn').addEventListener('click', () => {
                    this.errorModal.classList.remove('active');
                });

                this.errorModal.addEventListener('click', (e) => {
                    if (e.target === this.errorModal) {
                        this.errorModal.classList.remove('active');
                    }
                });
            }

            setupDragAndDrop() {
                if (!this.dropZone) return;

                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                    this.dropZone.addEventListener(eventName, (e) => {
                        e.preventDefault();
                        e.stopPropagation();
                    });
                });

                this.dropZone.addEventListener('dragover', () => {
                    this.dropZone.classList.add('dragover');
                });

                this.dropZone.addEventListener('dragleave', () => {
                    this.dropZone.classList.remove('dragover');
                });

                this.dropZone.addEventListener('drop', (e) => {
                    this.dropZone.classList.remove('dragover');
                    const files = e.dataTransfer.files;
                    if (files.length > 0) {
                        this.fileInput.files = files;
                        this.handleFileSelect({ target: this.fileInput });
                    }
                });
            }

            setupFloatingLabels() {
                const wrappers = document.querySelectorAll('.input-wrapper');
                wrappers.forEach(wrapper => {
                    const input = wrapper.querySelector('input, select, textarea');
                    if (!input) return;

                    const toggleFloat = () => {
                        if (input.value || input === document.activeElement) {
                            wrapper.classList.add('floating');
                        } else {
                            wrapper.classList.remove('floating');
                        }
                    };

                    input.addEventListener('focus', toggleFloat);
                    input.addEventListener('blur', toggleFloat);
                    input.addEventListener('input', toggleFloat);
                    if (input.tagName === 'SELECT') {
                        input.addEventListener('change', toggleFloat);
                    }
                    setTimeout(toggleFloat, 50);
                });
            }

            // ----- SANITIZATION HELPERS -----
            sanitizeText(value) {
                if (!value) return '';
                // Remove leading/trailing spaces
                let cleaned = value.trim();
                // Normalize consecutive spaces
                cleaned = cleaned.replace(/\s+/g, ' ');
                // Remove HTML/JS injection attempts
                cleaned = cleaned.replace(/<[^>]*>/g, '');
                cleaned = cleaned.replace(/[<>]/g, '');
                // Remove SQL injection patterns
                cleaned = cleaned.replace(/['";]/g, '');
                // Remove hidden/control characters
                cleaned = cleaned.replace(/[\x00-\x1F\x7F]/g, '');
                // Remove script-like patterns
                cleaned = cleaned.replace(/javascript:/gi, '');
                cleaned = cleaned.replace(/on\w+=/gi, '');
                return cleaned;
            }

            // ----- ERROR MESSAGE SANITIZER -----
            // Strips HTML tags and truncates so that if a server accidentally
            // returns an HTML error page as a "message" field value, or if any
            // string slips through that contains markup, the modal always shows
            // a clean human-readable sentence — never raw code or HTML.
            sanitizeErrorMessage(msg) {
                if (!msg || typeof msg !== 'string') {
                    return 'An unexpected error occurred. Please try again.';
                }
                // Strip all HTML tags
                const stripped = msg.replace(/<[^>]*>/g, ' ').replace(/\s+/g, ' ').trim();
                // If the result is very long (>200 chars) it's likely a dumped
                // error page or stack trace — replace with a clean fallback.
                if (stripped.length > 200) {
                    return 'The server returned an unexpected response. Please try again.';
                }
                return stripped || 'An unexpected error occurred. Please try again.';
            }

            // ----- FIELD VALIDATION (all rules) -----
            validateField(field) {
                const wrapper = field.closest('.input-wrapper');
                if (!wrapper) return true;

                const errorId = field.id + '-error';
                const errorEl = document.getElementById(errorId);

                let isValid = true;
                let errorMsg = '';

                const setError = (msg) => {
                    isValid = false;
                    errorMsg = msg;
                };

                // Get sanitized value
                let value = field.value;
                let sanitized = this.sanitizeText(value);

                // For non-file fields
                if (field.type !== 'file') {
                    // If sanitized is empty but original has content (injection attempt)
                    if (value.trim() && !sanitized) {
                        setError('Invalid content detected.');
                    }
                }

                // ---- TITLE VALIDATION ----
                if (field.id === 'title') {
                    if (field.hasAttribute('required') && !value.trim()) {
                        setError('Item title is required.');
                    } else if (value.trim()) {
                        const cleaned = this.sanitizeText(value);
                        if (cleaned.length < 5) {
                            setError('Item title must be between 5 and 100 characters.');
                        } else if (cleaned.length > 100) {
                            setError('Item title must be between 5 and 100 characters.');
                        } else if (/^[0-9]+$/.test(cleaned)) {
                            setError('Item title cannot contain only numbers.');
                        } else if (/^[^a-zA-Z0-9]+$/.test(cleaned)) {
                            setError('Item title cannot contain only special characters.');
                        }
                        // Check for HTML/JS (already sanitized)
                        if (value !== cleaned) {
                            setError('HTML, JavaScript, and SQL injection attempts are not allowed.');
                        }
                    }
                }

                // ---- CATEGORY VALIDATION ----
                if (field.id === 'category_id') {
                    if (field.hasAttribute('required') && (!field.value || field.value === '')) {
                        setError('Please select a category.');
                    }
                }

                // ---- DESCRIPTION VALIDATION ----
                if (field.id === 'description') {
                    if (field.hasAttribute('required') && !value.trim()) {
                        setError('Description is required.');
                    } else if (value.trim()) {
                        const cleaned = this.sanitizeText(value);
                        if (cleaned.length < 30) {
                            setError('Description must be at least 30 characters.');
                        } else if (cleaned.length > 2000) {
                            setError('Description must not exceed 2000 characters.');
                        } else if (/^[^\w\s]+$/.test(cleaned)) {
                            setError('Description cannot contain only emojis or special characters.');
                        } else if (value !== cleaned) {
                            setError('Description contains invalid content.');
                        }
                        // Check for excessive repeated characters
                        if (/(.)\1{10,}/.test(cleaned)) {
                            setError('Excessive repeated characters or spam text detected.');
                        }
                    }
                }

                // ---- CITY VALIDATION ----
                if (field.id === 'city') {
                    if (field.hasAttribute('required') && !value.trim()) {
                        setError('Please select your city.');
                    } else if (value.trim()) {
                        const cleaned = this.sanitizeText(value);
                        if (!/^[a-zA-Z\s\-']+$/.test(cleaned)) {
                            setError('Selected city is invalid.');
                        }
                    }
                }

                // ---- ADDRESS VALIDATION ----
                if (field.id === 'address') {
                    if (field.hasAttribute('required') && !value.trim()) {
                        setError('Address is required.');
                    } else if (value.trim()) {
                        const cleaned = this.sanitizeText(value);
                        if (cleaned.length < 10) {
                            setError('Address must be at least 10 characters.');
                        } else if (cleaned.length > 255) {
                            setError('Address must not exceed 255 characters.');
                        } else if (/^[0-9\s]+$/.test(cleaned)) {
                            setError('Address cannot contain only numbers or symbols.');
                        } else if (value !== cleaned) {
                            setError('HTML and JavaScript are not allowed.');
                        }
                    }
                }

                // ---- RENT PRICE VALIDATION ----
                if (field.id === 'rent_price_per_day') {
                    const numVal = parseFloat(value);
                    if (field.hasAttribute('required') && !value.trim()) {
                        setError('Enter the daily rental price.');
                    } else if (value.trim() && (isNaN(numVal) || numVal <= 0)) {
                        setError('Rent per day must be greater than 0.');
                    } else if (numVal > 100000) {
                        setError('Rent per day exceeds the allowed limit.');
                    }
                }

                // ---- SECURITY DEPOSIT VALIDATION ----
                if (field.id === 'security_deposit') {
                    const numVal = parseFloat(value);
                    if (field.hasAttribute('required') && !value.trim()) {
                        setError('Enter the security deposit.');
                    } else if (value.trim() && (isNaN(numVal) || numVal < 0)) {
                        setError('Security deposit must be a positive number.');
                    } else if (numVal > 1000000) {
                        setError('Security deposit cannot exceed 1,000,000.');
                    }
                }

                // ---- REPLACEMENT COST VALIDATION ----
                if (field.id === 'replacement_cost') {
                    const numVal = parseFloat(value);
                    if (field.hasAttribute('required') && !value.trim()) {
                        setError('Enter the replacement cost.');
                    } else if (value.trim() && (isNaN(numVal) || numVal < 0)) {
                        setError('Replacement cost must be a positive number.');
                    } else if (numVal > 10000000) {
                        setError('Replacement cost exceeds maximum allowed limit.');
                    }
                }

                // ---- QUANTITY VALIDATION ----
                if (field.id === 'quantity') {
                    const numVal = parseInt(value);
                    if (field.hasAttribute('required') && !value.trim()) {
                        setError('Enter the available quantity.');
                    } else if (value.trim() && (isNaN(numVal) || !Number.isInteger(numVal) || numVal < 1)) {
                        setError('Quantity must be a whole number between 1 and 1000.');
                    } else if (numVal > 1000) {
                        setError('Quantity must be between 1 and 1000.');
                    }
                }

                // ---- UPDATE UI ----
                wrapper.classList.remove('success', 'error');
                if (isValid && field.value && field.value.toString().trim() !== '') {
                    wrapper.classList.add('success');
                } else if (!isValid) {
                    wrapper.classList.add('error');
                }

                if (errorEl) {
                    if (!isValid) {
                        errorEl.textContent = errorMsg;
                        errorEl.classList.add('show');
                    } else {
                        errorEl.classList.remove('show');
                    }
                }

                return isValid;
            }

            // ----- BUSINESS RULES VALIDATION (cross-field) -----
            validateBusinessRules() {
                const rent = parseFloat(document.getElementById('rent_price_per_day').value) || 0;
                const deposit = parseFloat(document.getElementById('security_deposit').value) || 0;
                const replacement = parseFloat(document.getElementById('replacement_cost').value) || 0;

                let isValid = true;
                let errors = [];

                // Security deposit >= rent
                if (deposit > 0 && rent > 0 && deposit < rent) {
                    isValid = false;
                    errors.push('Security deposit must be greater than or equal to the daily rent.');
                }

                // Replacement cost >= security deposit
                if (replacement > 0 && deposit > 0 && replacement < deposit) {
                    isValid = false;
                    errors.push('Replacement cost must be greater than or equal to the security deposit.');
                }

                // Rent <= replacement cost
                if (rent > 0 && replacement > 0 && rent > replacement) {
                    isValid = false;
                    errors.push('Rental price must not exceed the replacement cost.');
                }

                // Show errors on deposit and replacement fields
                const depositEl = document.getElementById('security_deposit');
                const replacementEl = document.getElementById('replacement_cost');
                const rentEl = document.getElementById('rent_price_per_day');

                // Update deposit field
                const depositWrapper = depositEl?.closest('.input-wrapper');
                const depositError = document.getElementById('deposit-error');
                if (depositWrapper && depositError) {
                    if (!isValid && errors.some(e => e.includes('security deposit'))) {
                        depositWrapper.classList.add('error');
                        depositWrapper.classList.remove('success');
                        depositError.textContent = errors.find(e => e.includes('security deposit'));
                        depositError.classList.add('show');
                    } else if (depositEl?.value.trim()) {
                        depositWrapper.classList.remove('error');
                        depositWrapper.classList.add('success');
                        depositError.classList.remove('show');
                    }
                }

                // Update replacement field
                const replacementWrapper = replacementEl?.closest('.input-wrapper');
                const replacementError = document.getElementById('replacement-error');
                if (replacementWrapper && replacementError) {
                    if (!isValid && errors.some(e => e.includes('replacement cost'))) {
                        replacementWrapper.classList.add('error');
                        replacementWrapper.classList.remove('success');
                        replacementError.textContent = errors.find(e => e.includes('replacement cost'));
                        replacementError.classList.add('show');
                    } else if (replacementEl?.value.trim()) {
                        replacementWrapper.classList.remove('error');
                        replacementWrapper.classList.add('success');
                        replacementError.classList.remove('show');
                    }
                }

                // Update rent field if it violates business rules
                const rentWrapper = rentEl?.closest('.input-wrapper');
                const rentError = document.getElementById('rent-error');
                if (rentWrapper && rentError) {
                    if (!isValid && errors.some(e => e.includes('Rental price'))) {
                        rentWrapper.classList.add('error');
                        rentWrapper.classList.remove('success');
                        rentError.textContent = errors.find(e => e.includes('Rental price'));
                        rentError.classList.add('show');
                    } else if (rentEl?.value.trim()) {
                        rentWrapper.classList.remove('error');
                        rentWrapper.classList.add('success');
                        rentError.classList.remove('show');
                    }
                }

                return isValid;
            }

            // ----- FILE VALIDATION -----
            validateFiles(files) {
                const errors = [];
                const count = files instanceof FileList ? files.length : files.length;

                if (count < this.minImages) {
                    errors.push(`Please upload at least ${this.minImages} image${this.minImages > 1 ? 's' : ''}.`);
                    return errors; // no point checking individual files yet
                }

                if (count > this.maxImages) {
                    errors.push(`You can upload a maximum of ${this.maxImages} images.`);
                    return errors;
                }

                for (let i = 0; i < count; i++) {
                    const file = files[i];
                    const ext = file.name.split('.').pop().toLowerCase();
                    const mime = file.type.toLowerCase();

                    // Extension check
                    if (!this.allowedExtensions.includes(ext)) {
                        errors.push(`"${file.name}" has an unsupported format. Allowed: ${this.allowedExtensions.join(', ')}.`);
                        break;
                    }

                    // File size check
                    if (file.size > this.maxFileSize) {
                        errors.push(`"${file.name}" is too large. Each image must be under 5 MB.`);
                        break;
                    }

                    // Mime type check — HEIC/AVIF may report as empty string on some
                    // browsers because they don't know the type. We accept those by
                    // extension alone if the mime is blank (not a different known type).
                    const mimeIsBlankOrUnknown = !mime || mime === 'application/octet-stream';
                    const heicOrAvif = ['heic', 'heif', 'avif'].includes(ext);

                    if (!mimeIsBlankOrUnknown && !heicOrAvif) {
                        if (!this.allowedMimeTypes.includes(mime) && !mime.startsWith('image/')) {
                            errors.push(`"${file.name}" does not appear to be a valid image file.`);
                            break;
                        }
                    }
                }

                return errors;
            }

            // ----- FILE HANDLING -----
            handleFileSelect(e) {
                const files = Array.from(e.target.files);
                this.selectedFiles = files;

                // Validate files
                const fileErrors = this.validateFiles(files);
                const errorEl = document.getElementById('images-error');
                const wrapper = document.getElementById('images-wrapper');

                if (fileErrors.length > 0) {
                    errorEl.textContent = fileErrors[0];
                    errorEl.classList.add('show');
                    wrapper.classList.add('error');
                    wrapper.classList.remove('success');
                    // Don't show previews for invalid files
                    if (files.length > 0 && files.length >= this.minImages && files.length <= this.maxImages) {
                        // Still show previews but with error
                        this.renderFilePreviews(files);
                    }
                } else if (files.length > 0) {
                    errorEl.classList.remove('show');
                    wrapper.classList.remove('error');
                    wrapper.classList.add('success');
                    this.renderFilePreviews(files);
                } else {
                    errorEl.textContent = 'Please upload at least 2 images.';
                    errorEl.classList.add('show');
                    wrapper.classList.add('error');
                    wrapper.classList.remove('success');
                    this.previewArea.innerHTML = '';
                }

                this.updateProgress();
                this.updateSubmitState();
            }

            renderFilePreviews(files) {
                this.previewArea.innerHTML = '';

                files.forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = (ev) => {
                        const div = document.createElement('div');
                        div.className = 'file-preview-item';

                        const fileSize = (file.size / 1024).toFixed(1);
                        const sizeLabel = fileSize > 1024 ? (file.size / (1024 * 1024)).toFixed(1) + ' MB' : fileSize +
                        ' KB';

                        div.innerHTML = `
                            <img src="${ev.target.result}" alt="${file.name}" />
                            <span class="file-size">${sizeLabel}</span>
                            <span class="file-name">${file.name.length > 12 ? file.name.substring(0, 10) + '…' : file.name}</span>
                            <button type="button" class="remove-file" data-index="${index}">
                                <i class="fas fa-times"></i>
                            </button>
                        `;
                        this.previewArea.appendChild(div);
                    };
                    reader.readAsDataURL(file);
                });
            }

            removeFileAtIndex(index) {
                const dt = new DataTransfer();
                const files = Array.from(this.fileInput.files);
                files.splice(index, 1);
                files.forEach(f => dt.items.add(f));
                this.fileInput.files = dt.files;
                this.selectedFiles = files;

                // Re-validate
                const fileErrors = this.validateFiles(files);
                const errorEl = document.getElementById('images-error');
                const wrapper = document.getElementById('images-wrapper');

                if (fileErrors.length > 0) {
                    errorEl.textContent = fileErrors[0];
                    errorEl.classList.add('show');
                    wrapper.classList.add('error');
                    wrapper.classList.remove('success');
                } else if (files.length >= this.minImages) {
                    errorEl.classList.remove('show');
                    wrapper.classList.remove('error');
                    wrapper.classList.add('success');
                } else {
                    errorEl.textContent = `Please upload at least ${this.minImages} images.`;
                    errorEl.classList.add('show');
                    wrapper.classList.add('error');
                    wrapper.classList.remove('success');
                }

                this.renderFilePreviews(files);
                this.updateProgress();
                this.updateSubmitState();

                if (files.length === 0) {
                    this.fileInput.value = '';
                }
            }

            // ----- PROGRESS -----
            updateProgress() {
                const required = this.form.querySelectorAll('[required]');
                let filled = 0;
                required.forEach(f => {
                    if (f.type === 'file') {
                        if (f.files && f.files.length >= this.minImages) filled++;
                    } else if (f.tagName === 'SELECT') {
                        if (f.value && f.value !== '') filled++;
                    } else {
                        if (f.value.trim()) filled++;
                    }
                });
                const total = required.length || 1;
                const pct = Math.min(100, Math.round((filled / total) * 100));
                this.formProgress.style.width = pct + '%';
                this.progressText.textContent = pct + '%';
            }

            // ----- LIVE FORM-READY CHECK (drives the disabled submit button) -----
            // Runs the same validation rules as validateForm(), but silently —
            // it does not touch error messages or scroll/focus anything. This
            // lets the button reflect true validity on every keystroke without
            // interrupting the user while they're still typing into other fields.
            isFormCurrentlyValid() {
                const fields = this.form.querySelectorAll('input[required], select[required], textarea[required]');
                let allValid = true;

                fields.forEach(f => {
                    if (f.type === 'file') return; // checked separately below
                    if (!this.checkFieldSilently(f)) {
                        allValid = false;
                    }
                });

                if (!this.checkBusinessRulesSilently()) {
                    allValid = false;
                }

                const fileErrors = this.validateFiles(this.fileInput.files);
                if (fileErrors.length > 0) {
                    allValid = false;
                }

                return allValid;
            }

            // Same rules as validateField() but returns a boolean only —
            // does not write to the DOM. Kept in sync with validateField().
            checkFieldSilently(field) {
                let value = field.value;
                const cleaned = this.sanitizeText(value);

                if (field.id === 'title') {
                    if (!value.trim()) return false;
                    if (cleaned.length < 5 || cleaned.length > 100) return false;
                    if (/^[0-9]+$/.test(cleaned)) return false;
                    if (/^[^a-zA-Z0-9]+$/.test(cleaned)) return false;
                    if (value !== cleaned) return false;
                }

                if (field.id === 'category_id') {
                    if (!field.value || field.value === '') return false;
                }

                if (field.id === 'description') {
                    if (!value.trim()) return false;
                    if (cleaned.length < 30 || cleaned.length > 2000) return false;
                    if (/^[^\w\s]+$/.test(cleaned)) return false;
                    if (value !== cleaned) return false;
                    if (/(.)\1{10,}/.test(cleaned)) return false;
                }

                if (field.id === 'city') {
                    if (!value.trim()) return false;
                    if (!/^[a-zA-Z\s\-']+$/.test(cleaned)) return false;
                }

                if (field.id === 'address') {
                    if (!value.trim()) return false;
                    if (cleaned.length < 10 || cleaned.length > 255) return false;
                    if (/^[0-9\s]+$/.test(cleaned)) return false;
                    if (value !== cleaned) return false;
                }

                if (field.id === 'rent_price_per_day') {
                    const numVal = parseFloat(value);
                    if (!value.trim() || isNaN(numVal) || numVal <= 0 || numVal > 100000) return false;
                }

                if (field.id === 'security_deposit') {
                    const numVal = parseFloat(value);
                    if (!value.trim() || isNaN(numVal) || numVal < 0 || numVal > 1000000) return false;
                }

                if (field.id === 'replacement_cost') {
                    const numVal = parseFloat(value);
                    if (!value.trim() || isNaN(numVal) || numVal < 0 || numVal > 10000000) return false;
                }

                if (field.id === 'quantity') {
                    const numVal = parseInt(value);
                    if (!value.trim() || isNaN(numVal) || !Number.isInteger(numVal) || numVal < 1 || numVal > 1000) return false;
                }

                return true;
            }

            checkBusinessRulesSilently() {
                const rent = parseFloat(document.getElementById('rent_price_per_day').value) || 0;
                const deposit = parseFloat(document.getElementById('security_deposit').value) || 0;
                const replacement = parseFloat(document.getElementById('replacement_cost').value) || 0;

                if (deposit > 0 && rent > 0 && deposit < rent) return false;
                if (replacement > 0 && deposit > 0 && replacement < deposit) return false;
                if (rent > 0 && replacement > 0 && rent > replacement) return false;

                return true;
            }

            // Enables/disables the submit button live and updates the helper hint beneath it.
            updateSubmitState() {
                const ready = this.isFormCurrentlyValid();
                this.submitBtn.disabled = !ready || this.submitting;

                if (ready) {
                    this.submitHint.classList.add('ready');
                    this.submitHint.innerHTML = '<i class="fas fa-check-circle"></i> All fields look good — ready to submit';
                } else {
                    this.submitHint.classList.remove('ready');
                    this.submitHint.innerHTML = '<i class="fas fa-info-circle"></i> Fill all required fields to enable submission';
                }
            }

            // ----- VALIDATE ALL (used on submit, writes errors + focuses first invalid field) -----
            validateForm() {
                let allValid = true;
                const fields = this.form.querySelectorAll('input[required], select[required], textarea[required]');
                let firstInvalid = null;

                fields.forEach(f => {
                    if (!this.validateField(f)) {
                        allValid = false;
                        if (!firstInvalid) firstInvalid = f;
                    }
                });

                if (!this.validateBusinessRules()) {
                    allValid = false;
                }

                const files = this.fileInput.files;
                const fileErrors = this.validateFiles(files);
                if (fileErrors.length > 0) {
                    allValid = false;
                    const errorEl = document.getElementById('images-error');
                    errorEl.textContent = fileErrors[0];
                    errorEl.classList.add('show');
                    document.getElementById('images-wrapper').classList.add('error');
                }

                if (firstInvalid) {
                    firstInvalid.focus();
                    firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }

                return allValid;
            }

            // ----- HANDLE SUBMIT -----
            async handleSubmit(e) {
                e.preventDefault();

                // The button is disabled whenever the form is incomplete, so reaching
                // here with invalid fields should be rare — but re-check defensively
                // (e.g. Enter key submission) and surface real field errors instead
                // of a generic message.
                if (!this.validateForm()) {
                    this.showToast('Please fix the highlighted fields', 'Some details still need your attention.', 'error');
                    return;
                }

                if (this.submitting) return;
                this.submitting = true;
                this.updateSubmitState();

                this.submitBtn.innerHTML = '<span class="btn-spinner"></span> Adding...';

                await this.showLoadingAnimation();

                const formData = new FormData(this.form);
                const csrfInput = document.querySelector('input[name="_token"]');

                try {
                    const response = await fetch(this.form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': csrfInput ? csrfInput.value : '',
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    });

                    // FIX: the previous version always called response.json()
                    // unconditionally. If the server ever returned something
                    // that wasn't valid JSON — a 500 error page, an expired-
                    // session redirect to the login HTML page, a 419 CSRF
                    // page, etc. — response.json() THROWS, lands in the catch
                    // block below, and the user only ever saw the generic
                    // "check your connection" style fallback message instead
                    // of what actually happened. We now read the body as text
                    // first, branch on status code, and only attempt to parse
                    // JSON when the content-type actually says JSON.
                    const contentType = response.headers.get('content-type') || '';
                    const rawText = await response.text();
                    let data = null;

                    if (contentType.includes('application/json')) {
                        try {
                            data = JSON.parse(rawText);
                        } catch (parseErr) {
                            data = null;
                        }
                    }

                    if (response.ok) {
                        // Any 2xx response = success. We don't require data.success = true
                        // because different controllers return different shapes
                        // (e.g. {message:'...'} or {item_id:...} without a success key).
                        const trackingId = (data && (data.item_id || data.id))
                            ? data.item_id || data.id
                            : 'ITM-' + Date.now().toString().slice(-6);
                        this.showSuccess(trackingId);
                        this.showToast('Item submitted!', 'Your item has been sent for review.', 'success');
                        setTimeout(() => this.reset(), 6000);
                        return;
                    }

                    // ---- Branch on the actual HTTP status instead of guessing ----
                    if (response.status === 422 && data && data.errors) {
                        // Laravel validation error — show the actual first message
                        const firstError = Object.values(data.errors)[0];
                        const msg = Array.isArray(firstError) && firstError.length > 0
                            ? firstError[0]
                            : 'Some fields failed server-side validation.';
                        this.showError(msg);
                    } else if (response.status === 419) {
                        this.showError('Your session has expired. Please refresh the page and try again.');
                    } else if (response.status === 401 || response.status === 403) {
                        this.showError('You are not authorized to perform this action. Please log in again.');
                    } else if (response.status >= 500) {
                        // Server returned an error page (HTML, stack trace, etc.)
                        // NEVER display rawText here — it will be a full HTML page.
                        // Show a clean human-readable message instead.
                        this.showError('The server encountered an error while saving your item. Please try again in a moment. If the problem persists, contact support.');
                    } else if (data && data.message) {
                        // Only show data.message if it's a short plain string,
                        // not an HTML document accidentally returned as JSON.
                        const msg = this.sanitizeErrorMessage(data.message);
                        this.showError(msg);
                    } else {
                        this.showError(`Submission failed (HTTP ${response.status}). Please try again.`);
                    }
                } catch (networkErr) {
                    // Only fires for genuine network failures — fetch never completed.
                    console.error('Network error submitting form:', networkErr);
                    this.showError('Could not reach the server. Please check your internet connection and try again.');
                } finally {
                    this.submitting = false;
                    this.submitBtn.innerHTML = '<i class="fas fa-plus-circle"></i> Add Item';
                    this.updateSubmitState();
                }
            }

            async showLoadingAnimation() {
                this.loadingOverlay.classList.add('active');
                const steps = document.querySelectorAll('.loading-step');
                const prog = document.getElementById('loadingProgress');

                for (let i = 0; i < steps.length; i++) {
                    steps[i].classList.add('active');
                    prog.style.width = ((i + 1) / steps.length * 100) + '%';
                    await this.delay(500);
                }

                await this.delay(400);
                this.loadingOverlay.classList.remove('active');
            }

            showSuccess(trackingId) {
                this.trackingIdDisplay.textContent = trackingId;
                this.successContainer.classList.add('active');
            }

            showError(message) {
                this.errorMessage.textContent = message || 'Submission failed. Please check your inputs and try again.';
                this.errorModal.classList.add('active');
            }

            showToast(title, message, type = 'success') {
                const toast = this.toast;
                const icon = toast.querySelector('.toast-icon i');
                const titleEl = document.getElementById('toastTitle');
                const msgEl = document.getElementById('toastMessage');

                if (type === 'error') {
                    icon.className = 'fas fa-exclamation-circle';
                    toast.style.borderLeftColor = 'var(--danger)';
                } else {
                    icon.className = 'fas fa-check-circle';
                    toast.style.borderLeftColor = 'var(--success)';
                }
                titleEl.textContent = title;
                msgEl.textContent = message;
                toast.classList.add('show');
                setTimeout(() => toast.classList.remove('show'), 4000);
            }

            reset() {
                this.form.reset();
                this.previewArea.innerHTML = '';
                this.fileInput.value = '';
                this.selectedFiles = [];
                document.querySelectorAll('.input-wrapper').forEach(w => {
                    w.classList.remove('success', 'error', 'floating');
                });
                document.querySelectorAll('.error-message').forEach(el => el.classList.remove('show'));
                this.successContainer.classList.remove('active');
                this.errorModal.classList.remove('active');
                this.formProgress.style.width = '0%';
                this.progressText.textContent = '0%';
                this.submitting = false;
                this.updateSubmitState();
            }

            delay(ms) {
                return new Promise(resolve => setTimeout(resolve, ms));
            }
        }

        function hideToast() {
            document.getElementById('toast').classList.remove('show');
        }

        function resetForm() {
            window.itemForm?.reset();
        }

        document.addEventListener('DOMContentLoaded', () => {
            window.itemForm = new ItemForm();
        });
    </script>

</body>
</html>
@endsection