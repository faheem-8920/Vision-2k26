<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rent Your Items – Marketplace</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700;14..32,800;14..32,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <style>
        /* ─── CSS Variables ─── */
        :root {
            --red-50: #fff5f5;
            --red-100: #ffe3e3;
            --red-200: #ffc9c9;
            --red-300: #ffa8a8;
            --red-400: #ff6b6b;
            --red-500: #e03131;
            --red-600: #c92a2a;
            --red-700: #a61e1e;
            --red-800: #871515;
            --white: #ffffff;
            --gray-50: #fafafa;
            --gray-100: #f5f5f5;
            --gray-200: #e9ecef;
            --gray-300: #dee2e6;
            --gray-400: #ced4da;
            --gray-500: #adb5bd;
            --gray-600: #868e96;
            --gray-700: #495057;
            --gray-800: #343a40;
            --gray-900: #212529;
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.04);
            --shadow-md: 0 6px 24px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 16px 48px rgba(0, 0, 0, 0.08);
            --shadow-xl: 0 24px 64px rgba(0, 0, 0, 0.12);
            --shadow-red: 0 8px 32px rgba(201, 42, 42, 0.18);
            --shadow-red-lg: 0 16px 56px rgba(201, 42, 42, 0.35);
            --radius: 20px;
            --radius-sm: 12px;
            --transition: 0.4s cubic-bezier(0.22, 1, 0.36, 1);
            --bg-body: #fafafa;
            --bg-card: rgba(255, 255, 255, 0.75);
            --bg-card-hover: rgba(255, 255, 255, 0.92);
            --border-card: rgba(255, 255, 255, 0.6);
            --text-primary: #212529;
            --text-secondary: #495057;
            --text-muted: #868e96;
        }

        [data-theme="dark"] {
            --bg-body: #121212;
            --bg-card: rgba(30, 30, 30, 0.8);
            --bg-card-hover: rgba(40, 40, 40, 0.95);
            --border-card: rgba(60, 60, 60, 0.6);
            --text-primary: #f0f0f0;
            --text-secondary: #c0c0c0;
            --text-muted: #999999;
            --gray-50: #1a1a1a;
            --gray-100: #2a2a2a;
            --gray-200: #3a3a3a;
            --gray-300: #4a4a4a;
            --gray-400: #666;
            --gray-500: #888;
            --gray-600: #aaa;
            --gray-700: #ccc;
            --gray-800: #ddd;
            --gray-900: #eee;
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.4);
            --shadow-md: 0 6px 24px rgba(0, 0, 0, 0.5);
            --shadow-lg: 0 16px 48px rgba(0, 0, 0, 0.6);
            --shadow-xl: 0 24px 64px rgba(0, 0, 0, 0.7);
            --shadow-red: 0 8px 32px rgba(201, 42, 42, 0.3);
            --shadow-red-lg: 0 16px 56px rgba(201, 42, 42, 0.4);
            --red-50: #2a1a1a;
            --red-100: #3a1a1a;
            --red-200: #5a2a2a;
            --red-300: #8a3a3a;
            --red-400: #cc5555;
            --red-500: #e03131;
            --red-600: #c92a2a;
            --red-700: #ff6b6b;
            --red-800: #ff8787;
        }

        /* ─── Reset & Base ─── */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--bg-body);
            color: var(--text-primary);
            line-height: 1.6;
            padding: 24px 20px 60px;
            min-height: 100vh;
            background-image: radial-gradient(ellipse at 10% 20%, rgba(255, 235, 235, 0.15) 0%, transparent 60%),
                radial-gradient(ellipse at 90% 80%, rgba(255, 220, 220, 0.1) 0%, transparent 50%);
            background-attachment: fixed;
            transition: background 0.4s, color 0.4s;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: linear-gradient(rgba(200, 200, 200, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(200, 200, 200, 0.04) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
            z-index: 0;
        }

        /* ─── Scrollbar ─── */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: var(--gray-100);
        }
        ::-webkit-scrollbar-thumb {
            background: var(--red-400);
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: var(--red-500);
        }

        /* ─── Container ─── */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 16px;
            position: relative;
            z-index: 1;
        }

        /* ─── Dark Mode Toggle ─── */
        .theme-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            background: var(--bg-card);
            backdrop-filter: blur(8px);
            border: 1px solid var(--border-card);
            border-radius: 50px;
            padding: 8px 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-primary);
            cursor: pointer;
            transition: var(--transition);
            box-shadow: var(--shadow-sm);
        }
        .theme-toggle:hover {
            box-shadow: var(--shadow-md);
            transform: scale(1.03);
        }
        .theme-toggle i {
            font-size: 1rem;
            color: var(--red-600);
        }

        /* ─── Reading Time Badge ─── */
        .reading-time {
            display: inline-block;
            background: var(--red-100);
            color: var(--red-700);
            padding: 4px 16px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-top: 8px;
            border: 1px solid var(--red-200);
        }

        /* ─── Page Heading ─── */
        .page-heading {
            text-align: center;
            padding: 20px 0 16px;
            position: relative;
        }
        .page-heading h1 {
            font-size: clamp(2.6rem, 6vw, 4rem);
            font-weight: 800;
            letter-spacing: -0.04em;
            background: linear-gradient(145deg, var(--red-800), var(--red-500));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: inline-block;
            position: relative;
        }
        .page-heading .sub {
            font-size: 1.15rem;
            color: var(--text-muted);
            max-width: 560px;
            margin: 10px auto 0;
            font-weight: 400;
        }
        .page-heading .badge-line {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 14px;
            background: var(--bg-card);
            padding: 8px 24px;
            border-radius: 50px;
            border: 1px solid var(--red-200);
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--red-700);
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            backdrop-filter: blur(4px);
        }
        .page-heading .badge-line:hover {
            background: var(--red-600);
            color: var(--white);
            border-color: var(--red-600);
            transform: translateY(-2px) scale(1.03);
            box-shadow: var(--shadow-red);
        }

        /* ─── Section Headers ─── */
        .section-head {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 28px;
            position: relative;
        }
        .section-title {
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }
        .section-title .highlight {
            color: var(--red-600);
            position: relative;
        }
        .section-title .highlight::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -2px;
            width: 100%;
            height: 4px;
            background: var(--red-400);
            border-radius: 4px;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.5s ease;
        }
        .section-title:hover .highlight::after {
            transform: scaleX(1);
        }
        .section-sub {
            font-size: 1rem;
            color: var(--text-muted);
            max-width: 600px;
        }

        /* ─── Copy Link Button ─── */
        .copy-link-btn {
            background: transparent;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            font-size: 0.9rem;
            padding: 4px 8px;
            border-radius: 6px;
            transition: var(--transition);
            opacity: 0.5;
        }
        .copy-link-btn:hover {
            opacity: 1;
            color: var(--red-600);
            background: var(--red-50);
        }

        /* ─── Cards (Glass) ─── */
        .card {
            background: var(--bg-card);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border-radius: var(--radius);
            padding: 28px 26px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-card);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            color: var(--text-primary);
        }
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--red-400), var(--red-600), var(--red-400));
            background-size: 200% 100%;
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        .card:hover::before {
            opacity: 1;
            animation: shimmer 1.5s ease infinite;
        }
        @keyframes shimmer {
            0% {
                background-position: -200% 0;
            }
            100% {
                background-position: 200% 0;
            }
        }
        .card:hover {
            transform: translateY(-8px) scale(1.01);
            box-shadow: var(--shadow-xl), var(--shadow-red);
            border-color: var(--red-300);
            background: var(--bg-card-hover);
        }
        .card .icon-wrap {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 58px;
            height: 58px;
            border-radius: 16px;
            background: var(--red-100);
            color: var(--red-600);
            font-size: 1.5rem;
            margin-bottom: 18px;
            transition: var(--transition);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }
        .card:hover .icon-wrap {
            background: var(--red-600);
            color: var(--white);
            transform: scale(1.08) rotate(-4deg);
            box-shadow: 0 8px 24px rgba(201, 42, 42, 0.3);
        }
        .card h3 {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--text-primary);
        }
        .card p {
            color: var(--text-secondary);
            font-size: 0.95rem;
            line-height: 1.6;
        }
        .card .step-badge {
            position: absolute;
            top: 16px;
            right: 18px;
            background: var(--gray-100);
            color: var(--text-secondary);
            font-weight: 700;
            font-size: 0.7rem;
            padding: 4px 14px;
            border-radius: 50px;
            letter-spacing: 0.5px;
            border: 1px solid var(--gray-200);
            transition: var(--transition);
        }
        .card:hover .step-badge {
            background: var(--red-600);
            color: var(--white);
            border-color: var(--red-600);
            box-shadow: 0 4px 16px rgba(201, 42, 42, 0.3);
            transform: scale(1.05);
        }

        /* ─── Progress Tracker (Stepper) ─── */
        .stepper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
            padding: 0 10px;
            position: relative;
        }
        .stepper::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 30px;
            right: 30px;
            height: 2px;
            background: var(--gray-300);
            transform: translateY(-50%);
            z-index: 0;
        }
        .step-dot {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            z-index: 1;
            cursor: default;
        }
        .step-dot .circle {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--bg-card);
            border: 2px solid var(--gray-300);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.8rem;
            color: var(--text-secondary);
            transition: var(--transition);
            box-shadow: var(--shadow-sm);
        }
        .step-dot.active .circle {
            background: var(--red-600);
            border-color: var(--red-600);
            color: var(--white);
            box-shadow: var(--shadow-red);
        }
        .step-dot .label {
            font-size: 0.65rem;
            font-weight: 600;
            color: var(--text-muted);
            text-align: center;
            max-width: 60px;
        }
        .step-dot.active .label {
            color: var(--red-600);
        }

        /* ─── Tooltips ─── */
        .tooltip-trigger {
            position: relative;
            cursor: help;
            border-bottom: 1px dashed var(--red-400);
            color: var(--red-700);
            font-weight: 500;
        }
        .tooltip-trigger .tooltip-text {
            visibility: hidden;
            opacity: 0;
            width: 220px;
            background: var(--bg-card);
            backdrop-filter: blur(8px);
            color: var(--text-primary);
            text-align: left;
            border-radius: 8px;
            padding: 10px 14px;
            border: 1px solid var(--border-card);
            box-shadow: var(--shadow-lg);
            position: absolute;
            z-index: 10;
            bottom: 130%;
            left: 50%;
            transform: translateX(-50%);
            transition: opacity 0.3s, visibility 0.3s, transform 0.3s;
            font-weight: 400;
            font-size: 0.85rem;
            pointer-events: none;
        }
        .tooltip-trigger .tooltip-text::after {
            content: '';
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -6px;
            border-width: 6px;
            border-style: solid;
            border-color: var(--border-card) transparent transparent transparent;
        }
        .tooltip-trigger:hover .tooltip-text {
            visibility: visible;
            opacity: 1;
            transform: translateX(-50%) translateY(-4px);
        }

        /* ─── Checklist ─── */
        .checklist-card {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 14px 18px;
            background: var(--bg-card);
            backdrop-filter: blur(4px);
            border-radius: var(--radius-sm);
            border: 1px solid var(--gray-200);
            transition: var(--transition);
            box-shadow: var(--shadow-sm);
            margin-bottom: 8px;
            color: var(--text-primary);
        }
        .checklist-card:hover {
            transform: translateX(10px);
            border-color: var(--red-300);
            box-shadow: var(--shadow-md), var(--shadow-red);
            background: var(--bg-card-hover);
        }
        .checklist-card .check {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 26px;
            height: 26px;
            background: var(--red-600);
            color: var(--white);
            border-radius: 50%;
            font-size: 0.7rem;
            flex-shrink: 0;
            margin-top: 2px;
            transition: var(--transition);
        }
        .checklist-card:hover .check {
            background: var(--red-800);
            transform: scale(1.12) rotate(-4deg);
        }
        .checklist-card span {
            font-size: 0.95rem;
            color: var(--text-secondary);
        }

        /* ─── Prohibited Tags ─── */
        .prohibited-item {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 18px;
            background: var(--red-50);
            border-radius: 50px;
            border: 1px solid var(--red-200);
            transition: var(--transition);
            font-weight: 500;
            font-size: 0.85rem;
            color: var(--text-secondary);
            margin: 4px;
        }
        .prohibited-item:hover {
            background: var(--red-600);
            color: var(--white);
            border-color: var(--red-600);
            transform: translateY(-3px) scale(1.05);
            box-shadow: var(--shadow-red);
        }
        .prohibited-item i {
            color: var(--red-600);
            transition: var(--transition);
        }
        .prohibited-item:hover i {
            color: var(--white);
        }

        /* ─── Info Banner ─── */
        .info-banner {
            background: var(--bg-card);
            backdrop-filter: blur(8px);
            border-radius: var(--radius);
            padding: 28px 32px;
            border: 1px solid var(--border-card);
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            color: var(--text-primary);
        }
        .info-banner:hover {
            box-shadow: var(--shadow-lg), var(--shadow-red);
            border-color: var(--red-300);
            transform: scale(1.005) translateY(-2px);
            background: var(--bg-card-hover);
        }
        .info-banner .icon-wrap {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .info-banner .icon-wrap i {
            font-size: 2rem;
            color: var(--red-600);
            background: var(--red-50);
            padding: 14px;
            border-radius: 50%;
            transition: var(--transition);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }
        .info-banner:hover .icon-wrap i {
            background: var(--red-600);
            color: var(--white);
            transform: rotate(-8deg) scale(1.05);
        }
        .info-banner .icon-wrap h4 {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-primary);
        }
        .info-banner .icon-wrap p {
            color: var(--text-secondary);
            font-size: 0.95rem;
        }

        /* ─── Safety Badge ─── */
        .safety-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            background: var(--red-50);
            color: var(--red-700);
            font-size: 0.7rem;
            font-weight: 700;
            padding: 2px 12px;
            border-radius: 50px;
            border: 1px solid var(--red-200);
            letter-spacing: 0.3px;
            margin-left: 8px;
            text-transform: uppercase;
        }

        /* ─── Progress Ring ─── */
        .progress-ring-wrap {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-top: 12px;
        }
        .progress-ring {
            width: 80px;
            height: 80px;
            transform: rotate(-90deg);
        }
        .progress-ring .bg-circle {
            fill: none;
            stroke: var(--gray-200);
            stroke-width: 6;
        }
        .progress-ring .progress-circle {
            fill: none;
            stroke: var(--red-600);
            stroke-width: 6;
            stroke-linecap: round;
            stroke-dasharray: 226.19;
            stroke-dashoffset: 67.86;
            transition: stroke-dashoffset 1s ease;
        }
        .progress-ring-text {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        /* ─── FAQ ─── */
        .faq-item {
            background: var(--bg-card);
            backdrop-filter: blur(4px);
            border-radius: var(--radius-sm);
            padding: 18px 22px;
            border: 1px solid var(--gray-200);
            transition: var(--transition);
            cursor: default;
            color: var(--text-primary);
        }
        .faq-item:hover {
            border-color: var(--red-300);
            box-shadow: var(--shadow-md), var(--shadow-red);
            transform: translateY(-4px);
            background: var(--bg-card-hover);
        }
        .faq-item .faq-q {
            font-weight: 700;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .faq-item .faq-q i {
            color: var(--red-600);
            font-size: 0.9rem;
            background: var(--red-100);
            padding: 6px;
            border-radius: 50%;
            transition: var(--transition);
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .faq-item:hover .faq-q i {
            background: var(--red-600);
            color: var(--white);
            transform: rotate(-6deg);
        }
        .faq-item .faq-a {
            color: var(--text-secondary);
            font-size: 0.95rem;
            margin-top: 6px;
            padding-left: 44px;
        }

        /* ─── Agreement Card ─── */
        .agreement-card {
            border: 2px solid var(--red-300);
            background: var(--bg-card);
            backdrop-filter: blur(8px);
            border-radius: var(--radius);
            padding: 32px 32px;
            box-shadow: var(--shadow-md);
            transition: var(--transition);
            position: relative;
            color: var(--text-primary);
        }
        .agreement-card:hover {
            box-shadow: var(--shadow-xl), var(--shadow-red);
            border-color: var(--red-600);
            transform: scale(1.005);
            background: var(--bg-card-hover);
        }
        .agreement-card .agree-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 16px;
        }
        .agreement-card .agree-header i {
            font-size: 2.2rem;
            color: var(--red-600);
            background: var(--red-50);
            padding: 14px;
            border-radius: 50%;
            transition: var(--transition);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }
        .agreement-card:hover .agree-header i {
            background: var(--red-600);
            color: var(--white);
            transform: rotate(-6deg) scale(1.05);
        }
        .agreement-card ul {
            list-style: none;
            padding: 0;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4px 24px;
        }
        .agreement-card ul li {
            padding: 6px 0;
            border-bottom: 1px solid var(--gray-100);
            display: flex;
            align-items: center;
            gap: 12px;
            transition: var(--transition);
            padding-left: 4px;
            color: var(--text-secondary);
        }
        .agreement-card ul li:hover {
            padding-left: 12px;
            color: var(--red-800);
        }
        .agreement-card ul li i {
            color: var(--red-600);
            font-size: 0.9rem;
        }
        @media (max-width: 640px) {
            .agreement-card ul {
                grid-template-columns: 1fr;
            }
        }

        /* ─── Sections ─── */
        section {
            padding: 48px 0 32px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.04);
        }
        section:last-of-type {
            border-bottom: none;
            padding-bottom: 12px;
        }

        /* ─── Grids ─── */
        .grid-2 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 28px;
        }
        .grid-3 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
            gap: 26px;
        }
        .grid-4 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
            gap: 22px;
        }

        /* ─── Sticky Summary Card ─── */
        .sticky-summary {
            position: sticky;
            top: 80px;
            background: var(--bg-card);
            backdrop-filter: blur(8px);
            border: 1px solid var(--border-card);
            border-radius: var(--radius);
            padding: 20px 24px;
            box-shadow: var(--shadow-md);
            margin-bottom: 28px;
            transition: var(--transition);
        }
        .sticky-summary h4 {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--text-primary);
        }
        .sticky-summary ul {
            list-style: none;
            padding: 0;
        }
        .sticky-summary ul li {
            padding: 4px 0;
            font-size: 0.9rem;
            color: var(--text-secondary);
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .sticky-summary ul li i {
            color: var(--red-600);
            font-size: 0.7rem;
        }

        /* ─── Table of Contents (Sticky) ─── */
        .toc {
            position: fixed;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 100;
            background: var(--bg-card);
            backdrop-filter: blur(8px);
            border: 1px solid var(--border-card);
            border-radius: 12px;
            padding: 12px 8px;
            box-shadow: var(--shadow-md);
            display: none;
            flex-direction: column;
            gap: 6px;
            transition: var(--transition);
        }
        .toc a {
            display: block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--gray-300);
            transition: var(--transition);
            text-decoration: none;
            position: relative;
        }
        .toc a:hover,
        .toc a.active {
            background: var(--red-600);
            transform: scale(1.3);
            box-shadow: var(--shadow-red);
        }
        .toc a .tooltip {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            background: var(--bg-card);
            color: var(--text-primary);
            padding: 4px 12px;
            border-radius: 6px;
            font-size: 0.7rem;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s;
            border: 1px solid var(--border-card);
        }
        .toc a:hover .tooltip {
            opacity: 1;
        }

        @media (min-width: 1024px) {
            .toc {
                display: flex;
            }
        }

        /* ─── ENHANCED SCROLL TO TOP ─── */
        .scroll-top-wrap {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 998;
            width: 60px;
            height: 60px;
            cursor: pointer;
            transition: var(--transition);
            background: var(--bg-card);
            backdrop-filter: blur(12px);
            border-radius: 50%;
            border: 2px solid var(--red-400);
            box-shadow: var(--shadow-md), 0 0 0 0 rgba(201, 42, 42, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .scroll-top-wrap:hover {
            transform: scale(1.1);
            border-color: var(--red-600);
            box-shadow: var(--shadow-red-lg), 0 0 0 8px rgba(201, 42, 42, 0.1);
        }
        .scroll-top-wrap svg {
            position: absolute;
            top: -2px;
            left: -2px;
            width: 60px;
            height: 60px;
            transform: rotate(-90deg);
        }
        .scroll-top-wrap .bg-circle {
            fill: none;
            stroke: var(--gray-200);
            stroke-width: 3;
        }
        .scroll-top-wrap .progress-circle {
            fill: none;
            stroke: var(--red-600);
            stroke-width: 3;
            stroke-linecap: round;
            stroke-dasharray: 175.93;
            stroke-dashoffset: 175.93;
            transition: stroke-dashoffset 0.15s ease;
        }
        .scroll-top-wrap .arrow {
            color: var(--red-600);
            font-size: 1.4rem;
            transition: var(--transition);
            z-index: 1;
            position: relative;
        }
        .scroll-top-wrap:hover .arrow {
            color: var(--red-700);
            transform: translateY(-2px);
        }
        .scroll-top-wrap .percentage {
            position: absolute;
            bottom: -24px;
            font-size: 0.65rem;
            font-weight: 700;
            color: var(--text-muted);
            letter-spacing: 0.5px;
            transition: var(--transition);
        }
        .scroll-top-wrap:hover .percentage {
            color: var(--red-600);
        }

        /* ─── Community Reviews (Carousel) ─── */
        .reviews-carousel {
            display: flex;
            gap: 20px;
            overflow-x: auto;
            padding: 8px 4px 20px;
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: thin;
        }
        .reviews-carousel::-webkit-scrollbar {
            height: 4px;
        }
        .reviews-carousel::-webkit-scrollbar-thumb {
            background: var(--red-400);
            border-radius: 10px;
        }
        .review-card {
            flex: 0 0 280px;
            background: var(--bg-card);
            backdrop-filter: blur(4px);
            border: 1px solid var(--border-card);
            border-radius: var(--radius-sm);
            padding: 20px;
            scroll-snap-align: start;
            transition: var(--transition);
            box-shadow: var(--shadow-sm);
        }
        .review-card:hover {
            transform: scale(1.02);
            box-shadow: var(--shadow-md), var(--shadow-red);
        }
        .review-card .stars {
            color: #fcc419;
            margin-bottom: 6px;
        }
        .review-card .name {
            font-weight: 700;
            font-size: 0.95rem;
            color: var(--text-primary);
        }
        .review-card .text {
            font-size: 0.9rem;
            color: var(--text-secondary);
            margin-top: 4px;
        }

        /* ─── ENHANCED APPLY NOW SECTION ─── */
        .apply-section {
            background: linear-gradient(145deg, var(--red-700), var(--red-500));
            border-radius: var(--radius);
            padding: 64px 48px;
            text-align: center;
            color: var(--white);
            position: relative;
            overflow: hidden;
            margin: 20px 0 0;
            box-shadow: var(--shadow-lg), 0 0 0 1px rgba(255, 255, 255, 0.05);
        }
        .apply-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            pointer-events: none;
            animation: floatBlob 8s ease-in-out infinite alternate;
        }
        .apply-section::after {
            content: '';
            position: absolute;
            bottom: -40%;
            left: -10%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 50%;
            pointer-events: none;
            animation: floatBlob 12s ease-in-out infinite alternate-reverse;
        }
        @keyframes floatBlob {
            0% {
                transform: translate(0, 0) scale(1);
            }
            100% {
                transform: translate(30px, -20px) scale(1.2);
            }
        }

        .apply-section .apply-content {
            position: relative;
            z-index: 2;
        }
        .apply-section .apply-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(8px);
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
        }
        .apply-section .apply-badge i {
            color: #ffd93d;
        }

        .apply-section h2 {
            font-size: clamp(2.2rem, 4.5vw, 3.2rem);
            font-weight: 900;
            letter-spacing: -0.03em;
            margin-bottom: 16px;
            position: relative;
            z-index: 2;
        }
        .apply-section h2 .emoji {
            display: inline-block;
            animation: wiggle 2.5s ease-in-out infinite;
        }
        @keyframes wiggle {
            0%,
            100% {
                transform: rotate(0);
            }
            25% {
                transform: rotate(-6deg);
            }
            75% {
                transform: rotate(6deg);
            }
        }

        .apply-section p {
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto 32px;
            font-size: 1.1rem;
            position: relative;
            z-index: 2;
            line-height: 1.7;
        }

        .apply-section .apply-stats {
            display: flex;
            justify-content: center;
            gap: 48px;
            margin-bottom: 32px;
            position: relative;
            z-index: 2;
        }
        .apply-section .apply-stats .stat {
            text-align: center;
        }
        .apply-section .apply-stats .stat-number {
            display: block;
            font-size: 1.8rem;
            font-weight: 800;
            color: #ffd93d;
        }
        .apply-section .apply-stats .stat-label {
            font-size: 0.8rem;
            opacity: 0.8;
            font-weight: 500;
        }

        .apply-section .btn-apply {
            display: inline-flex;
            align-items: center;
            gap: 14px;
            padding: 18px 48px;
            background: var(--white);
            color: var(--red-600);
            border-radius: 60px;
            font-weight: 800;
            font-size: 1.1rem;
            text-decoration: none;
            transition: var(--transition);
            position: relative;
            z-index: 2;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.2);
            border: none;
            cursor: pointer;
            letter-spacing: 0.3px;
        }
        .apply-section .btn-apply:hover {
            transform: translateY(-4px) scale(1.03);
            box-shadow: 0 16px 48px rgba(0, 0, 0, 0.3);
            background: var(--gray-50);
        }
        .apply-section .btn-apply:active {
            transform: scale(0.97);
        }
        .apply-section .btn-apply i {
            transition: transform 0.3s ease;
            font-size: 1.2rem;
        }
        .apply-section .btn-apply:hover i {
            transform: translateX(6px) rotate(-4deg);
        }
        .apply-section .btn-apply .btn-ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(201, 42, 42, 0.15);
            transform: scale(0);
            animation: ripple 0.6s ease-out;
            pointer-events: none;
        }
        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }

        /* ─── Confetti Canvas ─── */
        #confetti-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 9999;
        }

        /* ─── Responsive ─── */
        @media (max-width: 768px) {
            body {
                padding: 16px 12px 40px;
            }
            .page-heading h1 {
                font-size: 2.2rem;
            }
            .section-title {
                font-size: 1.6rem;
            }
            .grid-2,
            .grid-3,
            .grid-4 {
                grid-template-columns: 1fr;
            }
            .info-banner {
                flex-direction: column;
                text-align: center;
            }
            .scroll-top-wrap {
                bottom: 20px;
                right: 20px;
                width: 50px;
                height: 50px;
            }
            .scroll-top-wrap svg {
                width: 50px;
                height: 50px;
            }
            .scroll-top-wrap .arrow {
                font-size: 1.2rem;
            }
            .scroll-top-wrap .percentage {
                display: none;
            }
            .card {
                padding: 22px 18px;
            }
            .agreement-card {
                padding: 24px 18px;
            }
            .section-head {
                flex-direction: column;
                align-items: flex-start;
            }
            .toc {
                display: none !important;
            }
            .sticky-summary {
                position: relative;
                top: 0;
            }
            .theme-toggle {
                top: 12px;
                right: 12px;
                padding: 6px 12px;
                font-size: 0.8rem;
            }
            .stepper {
                display: none;
            }
            .apply-section {
                padding: 40px 24px;
            }
            .apply-section h2 {
                font-size: 1.8rem;
            }
            .apply-section .btn-apply {
                padding: 14px 32px;
                font-size: 1rem;
                width: 100%;
                justify-content: center;
            }
            .apply-section .apply-stats {
                gap: 24px;
                flex-wrap: wrap;
            }
            .apply-section .apply-stats .stat-number {
                font-size: 1.4rem;
            }
        }

        @media (max-width: 480px) {
            .scroll-top-wrap {
                width: 44px;
                height: 44px;
                bottom: 16px;
                right: 16px;
            }
            .scroll-top-wrap svg {
                width: 44px;
                height: 44px;
            }
            .scroll-top-wrap .arrow {
                font-size: 1rem;
            }
        }

        /* ─── Fade-up Animation ─── */
        @keyframes fadeUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .card,
        .checklist-card,
        .faq-item,
        .info-banner,
        .agreement-card,
        .review-card {
            animation: fadeUp 0.7s cubic-bezier(0.22, 1, 0.36, 1) forwards;
            opacity: 0;
        }
        .card:nth-child(2) {
            animation-delay: 0.04s;
        }
        .card:nth-child(3) {
            animation-delay: 0.08s;
        }
        .card:nth-child(4) {
            animation-delay: 0.12s;
        }
        .card:nth-child(5) {
            animation-delay: 0.16s;
        }
        .card:nth-child(6) {
            animation-delay: 0.20s;
        }
        .card:nth-child(7) {
            animation-delay: 0.24s;
        }
        .card:nth-child(8) {
            animation-delay: 0.28s;
        }

        /* ─── Float icon animation ─── */
        .float-icon {
            animation: floatY 3s ease-in-out infinite;
        }
        @keyframes floatY {
            0%,
            100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-6px);
            }
        }

        /* ─── Utility ─── */
        .text-center {
            text-align: center;
        }
        .mt-12 {
            margin-top: 12px;
        }
        .mt-24 {
            margin-top: 24px;
        }
        .mb-12 {
            margin-bottom: 12px;
        }
        .mb-24 {
            margin-bottom: 24px;
        }
        .flex-center {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .gap-8 {
            gap: 8px;
        }
        .relative {
            position: relative;
        }
    </style>
</head>
<body>

    <!-- ─── DARK MODE TOGGLE ─── -->
    <button class="theme-toggle" id="themeToggle" aria-label="Toggle dark mode">
        <i class="fas fa-moon"></i> <span id="themeLabel">Dark</span>
    </button>

    <!-- ─── MAIN CONTENT ─── -->
    <main>

        <!-- ─── Page Heading ─── -->
        <div class="page-heading">
            <h1>📦 Put Your Item on Rent</h1>
            <p class="sub">Turn your unused items into income. Connect with verified renters in our trusted marketplace.</p>
            <div class="badge-line">
                <i class="fas fa-bolt"></i> Live · 2,400+ items listed
                <span class="reading-time"><i class="far fa-clock"></i> ~5 min read</span>
            </div>
        </div>

        <!-- ─── STICKY SUMMARY ─── -->
        <div class="container" style="margin-top:12px;">
            <div class="sticky-summary" id="stickySummary">
                <h4><i class="fas fa-list-check" style="color:var(--red-600);"></i> Quick Owner Summary</h4>
                <ul>
                    <li><i class="fas fa-check-circle"></i> Verify renter identity</li>
                    <li><i class="fas fa-check-circle"></i> Collect Security Deposit</li>
                    <li><i class="fas fa-check-circle"></i> Request Original CNIC</li>
                    <li><i class="fas fa-check-circle"></i> Inspect & document condition</li>
                    <li><i class="fas fa-check-circle"></i> Follow local laws</li>
                </ul>
            </div>
        </div>

        <!-- ─── TABLE OF CONTENTS ─── -->
        <nav class="toc" id="toc" aria-label="Table of contents">
            <a href="#how-it-works" title="How It Works"><span class="tooltip">How It Works</span></a>
            <a href="#who-can-list" title="Who Can List"><span class="tooltip">Who Can List</span></a>
            <a href="#approval" title="Approval"><span class="tooltip">Approval</span></a>
            <a href="#before-renting" title="Before Renting"><span class="tooltip">Before Renting</span></a>
            <a href="#cnic" title="CNIC"><span class="tooltip">CNIC</span></a>
            <a href="#best-practices" title="Best Practices"><span class="tooltip">Best Practices</span></a>
            <a href="#damage-late" title="Damage & Late"><span class="tooltip">Damage & Late</span></a>
            <a href="#community" title="Community"><span class="tooltip">Community</span></a>
            <a href="#fraud" title="Fraud"><span class="tooltip">Fraud</span></a>
            <a href="#responsibilities" title="Responsibilities"><span class="tooltip">Responsibilities</span></a>
            <a href="#disclaimer" title="Disclaimer"><span class="tooltip">Disclaimer</span></a>
            <a href="#suspension" title="Suspension"><span class="tooltip">Suspension</span></a>
            <a href="#checklist" title="Checklist"><span class="tooltip">Checklist</span></a>
            <a href="#faq" title="FAQ"><span class="tooltip">FAQ</span></a>
            <a href="#agreement" title="Agreement"><span class="tooltip">Agreement</span></a>
        </nav>

        <!-- ─── HOW IT WORKS ─── -->
        <section id="how-it-works">
            <div class="container">
                <div class="section-head">
                    <div>
                        <h2 class="section-title">
                            How the <span class="highlight">Rental Process</span> Works
                            <button class="copy-link-btn" data-section="how-it-works" title="Copy link to this section"><i class="fas fa-link"></i></button>
                        </h2>
                        <p class="section-sub">From sign-up to safe returns — every step made simple.</p>
                    </div>
                </div>

                <!-- Stepper -->
                <div class="stepper">
                    <div class="step-dot active"><div class="circle">1</div><div class="label">Account</div></div>
                    <div class="step-dot"><div class="circle">2</div><div class="label">Profile</div></div>
                    <div class="step-dot"><div class="circle">3</div><div class="label">List</div></div>
                    <div class="step-dot"><div class="circle">4</div><div class="label">Review</div></div>
                    <div class="step-dot"><div class="circle">5</div><div class="label">Approval</div></div>
                    <div class="step-dot"><div class="circle">6</div><div class="label">Requests</div></div>
                    <div class="step-dot"><div class="circle">7</div><div class="label">Handover</div></div>
                    <div class="step-dot"><div class="circle">8</div><div class="label">Return</div></div>
                </div>

                <div class="grid-3">
                    <div class="card">
                        <span class="step-badge">Step 1</span>
                        <div class="icon-wrap"><i class="fas fa-user-plus float-icon"></i></div>
                        <h3>Create Your Account</h3>
                        <p>Register using your valid email address and phone number.</p>
                    </div>
                    <div class="card">
                        <span class="step-badge">Step 2</span>
                        <div class="icon-wrap"><i class="fas fa-id-card float-icon"></i></div>
                        <h3>Complete Your Profile</h3>
                        <p>Full name, phone, address, city, CNIC details (if required).</p>
                    </div>
                    <div class="card">
                        <span class="step-badge">Step 3</span>
                        <div class="icon-wrap"><i class="fas fa-upload float-icon"></i></div>
                        <h3>List Your Item</h3>
                        <p>Title, category, description, price, deposit, quantity, and clear images (min 4).</p>
                    </div>
                    <div class="card">
                        <span class="step-badge">Step 4</span>
                        <div class="icon-wrap"><i class="fas fa-check-circle float-icon"></i></div>
                        <h3>Submit for Review</h3>
                        <p>Our team reviews every listing to maintain quality &amp; security.</p>
                    </div>
                    <div class="card">
                        <span class="step-badge">Step 5</span>
                        <div class="icon-wrap"><i class="fas fa-badge-check float-icon"></i></div>
                        <h3>Listing Approval</h3>
                        <p>Once approved, your item becomes visible to renters.</p>
                    </div>
                    <div class="card">
                        <span class="step-badge">Step 6</span>
                        <div class="icon-wrap"><i class="fas fa-hand-holding-heart float-icon"></i></div>
                        <h3>Receive Requests</h3>
                        <p>Renters send requests — you decide to accept or decline.</p>
                    </div>
                    <div class="card">
                        <span class="step-badge">Step 7</span>
                        <div class="icon-wrap"><i class="fas fa-handshake float-icon"></i></div>
                        <h3>Hand Over the Item</h3>
                        <p>Verify identity, collect the security deposit, and hand over safely.</p>
                    </div>
                    <div class="card">
                        <span class="step-badge">Step 8</span>
                        <div class="icon-wrap"><i class="fas fa-undo-alt float-icon"></i></div>
                        <h3>Item Return</h3>
                        <p>Inspect, return the security deposit if applicable, complete the rental.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── WHO CAN LIST ─── -->
        <section id="who-can-list">
            <div class="container">
                <div class="section-head">
                    <div>
                        <h2 class="section-title">
                            Who Can <span class="highlight">List Items?</span>
                            <button class="copy-link-btn" data-section="who-can-list" title="Copy link to this section"><i class="fas fa-link"></i></button>
                        </h2>
                        <p class="section-sub">Become an owner — here's what you need.</p>
                    </div>
                </div>
                <div class="grid-2">
                    <div class="card">
                        <div class="icon-wrap"><i class="fas fa-user-check float-icon"></i></div>
                        <h3>Eligibility</h3>
                        <ul style="list-style:none;padding:0;margin-top:10px;">
                            <li style="display:flex;align-items:center;gap:12px;padding:6px 0;border-bottom:1px solid var(--gray-100);">
                                <i class="fas fa-check-circle" style="color:var(--red-500);font-size:0.9rem;"></i> Be at least 18 years old
                            </li>
                            <li style="display:flex;align-items:center;gap:12px;padding:6px 0;border-bottom:1px solid var(--gray-100);">
                                <i class="fas fa-check-circle" style="color:var(--red-500);font-size:0.9rem;"></i> Own the item you list
                            </li>
                            <li style="display:flex;align-items:center;gap:12px;padding:6px 0;border-bottom:1px solid var(--gray-100);">
                                <i class="fas fa-check-circle" style="color:var(--red-500);font-size:0.9rem;"></i> Provide genuine personal info
                            </li>
                            <li style="display:flex;align-items:center;gap:12px;padding:6px 0;border-bottom:1px solid var(--gray-100);">
                                <i class="fas fa-check-circle" style="color:var(--red-500);font-size:0.9rem;"></i> Submit correct city &amp; address
                            </li>
                            <li style="display:flex;align-items:center;gap:12px;padding:6px 0;">
                                <i class="fas fa-check-circle" style="color:var(--red-500);font-size:0.9rem;"></i> Follow all platform rules &amp; local laws
                            </li>
                        </ul>
                    </div>
                    <div class="card" style="border-color:var(--red-200);">
                        <div class="icon-wrap" style="background:var(--red-50);color:var(--red-700);"><i class="fas fa-shield-alt float-icon"></i></div>
                        <h3>Owner Verification</h3>
                        <p>To improve trust and security, we may verify:</p>
                        <ul style="list-style:none;padding:0;margin-top:8px;">
                            <li style="display:flex;align-items:center;gap:10px;padding:5px 0;">
                                <i class="fas fa-envelope" style="color:var(--red-400);width:20px;"></i> Email Address
                            </li>
                            <li style="display:flex;align-items:center;gap:10px;padding:5px 0;">
                                <i class="fas fa-phone" style="color:var(--red-400);width:20px;"></i> Mobile Number
                            </li>
                            <li style="display:flex;align-items:center;gap:10px;padding:5px 0;">
                                <i class="fas fa-id-card" style="color:var(--red-400);width:20px;"></i> Identity Documents
                            </li>
                            <li style="display:flex;align-items:center;gap:10px;padding:5px 0;">
                                <i class="fas fa-list-check" style="color:var(--red-400);width:20px;"></i> Listing Information
                            </li>
                            <li style="display:flex;align-items:center;gap:10px;padding:5px 0;">
                                <i class="fas fa-chart-line" style="color:var(--red-400);width:20px;"></i> Account Activity
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── ITEM APPROVAL ─── -->
        <section id="approval">
            <div class="container">
                <div style="text-align:center;margin-bottom:28px;">
                    <h2 class="section-title" style="justify-content:center;">
                        Item <span class="highlight">Approval Process</span>
                        <button class="copy-link-btn" data-section="approval" title="Copy link to this section"><i class="fas fa-link"></i></button>
                    </h2>
                    <p class="section-sub" style="margin:0 auto;">Every listing goes through moderation to ensure quality and compliance.</p>
                </div>
                <div class="grid-3">
                    <div class="card">
                        <div class="icon-wrap"><i class="fas fa-image float-icon"></i></div>
                        <h3>What We Check</h3>
                        <ul style="list-style:none;padding:0;margin-top:8px;">
                            <li style="padding:5px 0;border-bottom:1px solid var(--gray-100);">📸 Item quality &amp; images</li>
                            <li style="padding:5px 0;border-bottom:1px solid var(--gray-100);">📝 Description &amp; pricing</li>
                            <li style="padding:5px 0;border-bottom:1px solid var(--gray-100);">📂 Category &amp; policy compliance</li>
                            <li style="padding:5px 0;">✅ Approval, rejection, or corrections</li>
                        </ul>
                    </div>
                    <div class="card">
                        <div class="icon-wrap"><i class="fas fa-clock float-icon"></i></div>
                        <h3>Approval Time</h3>
                        <p>Approval time may vary depending on the number of pending listings. We aim to review all submissions as quickly as possible.</p>
                        <div class="progress-ring-wrap">
                            <div class="progress-ring">
                                <svg viewBox="0 0 80 80">
                                    <circle class="bg-circle" cx="40" cy="40" r="36" />
                                    <circle class="progress-circle" cx="40" cy="40" r="36" stroke-dasharray="226.19" stroke-dashoffset="67.86" />
                                </svg>
                            </div>
                            <div>
                                <div class="progress-ring-text">~70%</div>
                                <div style="font-size:0.8rem;color:var(--text-muted);">Avg. completion</div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="icon-wrap"><i class="fas fa-pen-to-square float-icon"></i></div>
                        <h3>Edit Your Listing</h3>
                        <p>You can update your listing before or after approval, subject to review if required. Remove or deactivate at any time (provided no active rental).</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── BEFORE RENTING ─── -->
        <section id="before-renting">
            <div class="container">
                <div style="margin-bottom:28px;">
                    <h2 class="section-title">
                        Before <span class="highlight">Renting Your Item</span>
                        <button class="copy-link-btn" data-section="before-renting" title="Copy link to this section"><i class="fas fa-link"></i></button>
                        <span class="safety-badge"><i class="fas fa-shield"></i> Secure</span>
                    </h2>
                    <p class="section-sub">We strongly recommend every owner follow these steps.</p>
                </div>
                <div class="grid-2">
                    <div>
                        <div class="checklist-card"><span class="check"><i class="fas fa-check"></i></span><span>Verify the renter's identity</span></div>
                        <div class="checklist-card"><span class="check"><i class="fas fa-check"></i></span><span>Collect a refundable <strong class="tooltip-trigger">Security Deposit <span class="tooltip-text">Refundable amount held to cover potential damages or late returns.</span></strong></span></div>
                        <div class="checklist-card"><span class="check"><i class="fas fa-check"></i></span><span>Collect the renter's <strong class="tooltip-trigger">Original CNIC <span class="tooltip-text">Computerised National Identity Card – a government-issued ID in Pakistan.</span></strong> before handover</span></div>
                        <div class="checklist-card"><span class="check"><i class="fas fa-check"></i></span><span>Inspect the item together</span></div>
                        <div class="checklist-card"><span class="check"><i class="fas fa-check"></i></span><span>Take clear photos &amp; videos before delivery</span></div>
                        <div class="checklist-card"><span class="check"><i class="fas fa-check"></i></span><span>Explain how the item works</span></div>
                        <div class="checklist-card"><span class="check"><i class="fas fa-check"></i></span><span>Prepare a written rental agreement if necessary</span></div>
                    </div>
                    <div class="card" style="border-color:var(--red-300);background:var(--bg-card);">
                        <div class="icon-wrap" style="background:var(--red-200);color:var(--red-800);"><i class="fas fa-hand-holding-usd float-icon"></i></div>
                        <h3>Security Deposit Guidelines <span class="safety-badge"><i class="fas fa-lock"></i> Protected</span></h3>
                        <p>A security deposit protects you from financial loss.</p>
                        <ul style="list-style:none;padding:0;margin-top:10px;">
                            <li style="padding:5px 0;border-bottom:1px solid var(--red-200);">💰 Set a reasonable deposit</li>
                            <li style="padding:5px 0;border-bottom:1px solid var(--red-200);">📊 Reflect the value of your item</li>
                            <li style="padding:5px 0;border-bottom:1px solid var(--red-200);">📋 Clearly explain refund conditions</li>
                            <li style="padding:5px 0;">↩️ Return the deposit after safe return &amp; inspection</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── ORIGINAL CNIC ─── -->
        <section id="cnic">
            <div class="container">
                <div class="info-banner">
                    <div class="icon-wrap">
                        <i class="fas fa-id-card"></i>
                        <div>
                            <h4>Original CNIC Recommendation <span class="safety-badge"><i class="fas fa-check-circle"></i> Recommended</span></h4>
                            <p>We strongly recommend collecting the renter's Original CNIC while the item is rented. Return it immediately after safe return, charges paid, and both parties confirm completion.</p>
                        </div>
                    </div>
                    <i class="fas fa-arrow-right" style="color:var(--red-400);font-size:1.6rem;transition:var(--transition);"></i>
                </div>
            </div>
        </section>

        <!-- ─── BEST PRACTICES ─── -->
        <section id="best-practices">
            <div class="container">
                <div style="margin-bottom:28px;">
                    <h2 class="section-title">
                        Rental <span class="highlight">Best Practices</span>
                        <button class="copy-link-btn" data-section="best-practices" title="Copy link to this section"><i class="fas fa-link"></i></button>
                    </h2>
                    <p class="section-sub">For a safe and smooth rental experience.</p>
                </div>
                <div class="grid-3">
                    <div class="card">
                        <div class="icon-wrap"><i class="fas fa-sun float-icon"></i></div>
                        <h3>Meet Safely</h3>
                        <p>Meet during daylight whenever possible. Choose a public meeting location if appropriate.</p>
                    </div>
                    <div class="card">
                        <div class="icon-wrap"><i class="fas fa-user-check float-icon"></i></div>
                        <h3>Verify Identity</h3>
                        <p>Verify the renter's identity and count all accessories together.</p>
                    </div>
                    <div class="card">
                        <div class="icon-wrap"><i class="fas fa-video float-icon"></i></div>
                        <h3>Document Everything</h3>
                        <p>Demonstrate operation, record condition, and keep written proof of the transaction.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── DAMAGE & LATE RETURN ─── -->
        <section id="damage-late">
            <div class="container">
                <div class="grid-2">
                    <div class="card">
                        <div class="icon-wrap"><i class="fas fa-triangle-exclamation float-icon" style="color:var(--red-600);"></i></div>
                        <h3>Damage Policy</h3>
                        <ul style="list-style:none;padding:0;margin-top:8px;">
                            <li style="padding:5px 0;border-bottom:1px solid var(--gray-100);">🔍 Inspect it immediately</li>
                            <li style="padding:5px 0;border-bottom:1px solid var(--gray-100);">📸 Compare with original condition</li>
                            <li style="padding:5px 0;border-bottom:1px solid var(--gray-100);">📄 Document any damage</li>
                            <li style="padding:5px 0;">💬 Discuss repair costs with the renter</li>
                        </ul>
                    </div>
                    <div class="card">
                        <div class="icon-wrap"><i class="fas fa-clock float-icon" style="color:var(--red-600);"></i></div>
                        <h3>Late Return Policy</h3>
                        <ul style="list-style:none;padding:0;margin-top:8px;">
                            <li style="padding:5px 0;border-bottom:1px solid var(--gray-100);">⏰ Additional rental charges may apply</li>
                            <li style="padding:5px 0;border-bottom:1px solid var(--gray-100);">📢 Inform renters of any late fees before renting</li>
                            <li style="padding:5px 0;border-bottom:1px solid var(--gray-100);">🤝 Keep communication professional</li>
                            <li style="padding:5px 0;">📅 Agree on return date &amp; time in advance</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── COMMUNITY GUIDELINES ─── -->
        <section id="community">
            <div class="container">
                <div style="margin-bottom:28px;">
                    <h2 class="section-title">
                        Community <span class="highlight">Guidelines</span>
                        <button class="copy-link-btn" data-section="community" title="Copy link to this section"><i class="fas fa-link"></i></button>
                    </h2>
                    <p class="section-sub">Our community is built on trust. Every user should:</p>
                </div>
                <div class="grid-4">
                    <div class="card" style="text-align:center;padding:24px 16px;">
                        <div style="font-size:2.8rem;margin-bottom:10px;">🤝</div>
                        <h3>Be Respectful</h3>
                        <p style="font-size:0.9rem;">Treat others with kindness and honesty.</p>
                    </div>
                    <div class="card" style="text-align:center;padding:24px 16px;">
                        <div style="font-size:2.8rem;margin-bottom:10px;">💬</div>
                        <h3>Communicate</h3>
                        <p style="font-size:0.9rem;">Be polite, prompt, and clear.</p>
                    </div>
                    <div class="card" style="text-align:center;padding:24px 16px;">
                        <div style="font-size:2.8rem;margin-bottom:10px;">🚫</div>
                        <h3>No Harassment</h3>
                        <p style="font-size:0.9rem;">Avoid abuse or inappropriate language.</p>
                    </div>
                    <div class="card" style="text-align:center;padding:24px 16px;">
                        <div style="font-size:2.8rem;margin-bottom:10px;">🚨</div>
                        <h3>Report Suspicious</h3>
                        <p style="font-size:0.9rem;">Help keep the community safe.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── FRAUD PREVENTION ─── -->
        <section id="fraud">
            <div class="container">
                <div style="margin-bottom:28px;">
                    <h2 class="section-title">
                        <span class="highlight">Fraud</span> Prevention Tips
                        <button class="copy-link-btn" data-section="fraud" title="Copy link to this section"><i class="fas fa-link"></i></button>
                        <span class="safety-badge"><i class="fas fa-shield"></i> Secure</span>
                    </h2>
                </div>
                <div class="grid-2">
                    <div class="card">
                        <div class="icon-wrap"><i class="fas fa-lock float-icon"></i></div>
                        <h3>Protect Yourself</h3>
                        <ul style="list-style:none;padding:0;margin-top:8px;">
                            <li style="padding:5px 0;border-bottom:1px solid var(--gray-100);">🔐 Never share OTPs or passwords</li>
                            <li style="padding:5px 0;border-bottom:1px solid var(--gray-100);">📸 Beware of fake payment screenshots</li>
                            <li style="padding:5px 0;border-bottom:1px solid var(--gray-100);">✅ Verify all payments before handover</li>
                            <li style="padding:5px 0;border-bottom:1px solid var(--gray-100);">🚨 Report suspicious users immediately</li>
                            <li style="padding:5px 0;">🚫 Do not deal outside the platform without proper verification</li>
                        </ul>
                    </div>
                    <div class="card" style="border-color:var(--red-300);">
                        <div class="icon-wrap" style="background:var(--red-100);color:var(--red-700);"><i class="fas fa-ban float-icon"></i></div>
                        <h3>Prohibited Items</h3>
                        <div style="display:flex;flex-wrap:wrap;gap:6px;margin-top:12px;">
                            <span class="prohibited-item"><i class="fas fa-times-circle"></i> Illegal products</span>
                            <span class="prohibited-item"><i class="fas fa-times-circle"></i> Stolen property</span>
                            <span class="prohibited-item"><i class="fas fa-times-circle"></i> Counterfeit goods</span>
                            <span class="prohibited-item"><i class="fas fa-times-circle"></i> Weapons</span>
                            <span class="prohibited-item"><i class="fas fa-times-circle"></i> Explosives</span>
                            <span class="prohibited-item"><i class="fas fa-times-circle"></i> Dangerous chemicals</span>
                            <span class="prohibited-item"><i class="fas fa-times-circle"></i> Drugs or controlled substances</span>
                            <span class="prohibited-item"><i class="fas fa-times-circle"></i> Adult or offensive material</span>
                            <span class="prohibited-item"><i class="fas fa-times-circle"></i> Any item prohibited by law</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── OWNER RESPONSIBILITIES ─── -->
        <section id="responsibilities">
            <div class="container">
                <div class="grid-2">
                    <div class="card">
                        <div class="icon-wrap"><i class="fas fa-user-tie float-icon"></i></div>
                        <h3>Owner Responsibilities</h3>
                        <ul style="list-style:none;padding:0;margin-top:8px;">
                            <li style="padding:5px 0;border-bottom:1px solid var(--gray-100);">📋 Providing accurate information</li>
                            <li style="padding:5px 0;border-bottom:1px solid var(--gray-100);">🖼️ Uploading genuine images</li>
                            <li style="padding:5px 0;border-bottom:1px solid var(--gray-100);">🔧 Maintaining listed items</li>
                            <li style="padding:5px 0;border-bottom:1px solid var(--gray-100);">💲 Setting fair rental prices</li>
                            <li style="padding:5px 0;border-bottom:1px solid var(--gray-100);">🆔 Verifying renters</li>
                            <li style="padding:5px 0;">📜 Following local laws</li>
                        </ul>
                    </div>
                    <div class="card">
                        <div class="icon-wrap"><i class="fas fa-globe float-icon"></i></div>
                        <h3>Platform Responsibilities</h3>
                        <p>Our platform provides:</p>
                        <ul style="list-style:none;padding:0;margin-top:8px;">
                            <li style="padding:5px 0;border-bottom:1px solid var(--gray-100);">📄 Item listing services</li>
                            <li style="padding:5px 0;border-bottom:1px solid var(--gray-100);">📨 Rental request management</li>
                            <li style="padding:5px 0;border-bottom:1px solid var(--gray-100);">🔐 Secure user accounts</li>
                            <li style="padding:5px 0;border-bottom:1px solid var(--gray-100);">✅ Listing moderation</li>
                            <li style="padding:5px 0;">💬 Customer support</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── DISCLAIMER ─── -->
        <section id="disclaimer">
            <div class="container">
                <div class="card" style="border-color:var(--red-300);background:var(--bg-card);">
                    <div style="display:flex;align-items:flex-start;gap:16px;">
                        <i class="fas fa-scale-balanced" style="font-size:2rem;color:var(--red-600);flex-shrink:0;margin-top:4px;"></i>
                        <div>
                            <h3 style="margin-bottom:6px;">Website Disclaimer <span class="safety-badge"><i class="fas fa-info-circle"></i> Legal</span></h3>
                            <p style="color:var(--text-secondary);font-size:0.95rem;">
                                Our website only acts as a marketplace connecting owners and renters. We are <strong>NOT</strong> responsible for lost, stolen, damaged, or misused items; financial losses; payment disputes; rental disagreements; fraud; injuries; delayed returns; failure to collect deposits or verify identity; or legal disputes between users. All rental agreements are solely between the owner and the renter.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── ACCOUNT SUSPENSION ─── -->
        <section id="suspension">
            <div class="container">
                <div style="margin-bottom:28px;">
                    <h2 class="section-title">
                        Account <span class="highlight">Suspension</span> &amp; Penalties
                        <button class="copy-link-btn" data-section="suspension" title="Copy link to this section"><i class="fas fa-link"></i></button>
                    </h2>
                </div>
                <div class="grid-3">
                    <div class="card" style="border-color:var(--red-300);">
                        <div class="icon-wrap" style="background:var(--red-100);color:var(--red-700);"><i class="fas fa-ban float-icon"></i></div>
                        <h3>May be Suspended for:</h3>
                        <ul style="list-style:none;padding:0;margin-top:8px;">
                            <li style="padding:4px 0;">❌ Fake listings</li>
                            <li style="padding:4px 0;">❌ Fraudulent activity</li>
                            <li style="padding:4px 0;">❌ False information</li>
                            <li style="padding:4px 0;">❌ Abuse of other users</li>
                            <li style="padding:4px 0;">❌ Illegal items</li>
                            <li style="padding:4px 0;">❌ Repeated policy violations</li>
                            <li style="padding:4px 0;">❌ Attempting to scam users</li>
                        </ul>
                    </div>
                    <div class="card">
                        <div class="icon-wrap"><i class="fas fa-shield float-icon"></i></div>
                        <h3>Privacy &amp; Personal Info</h3>
                        <p>We respect your privacy. Your information is used only for account management, rental communication, platform security, customer support, and verification (where applicable).</p>
                        <p style="margin-top:12px;font-size:0.9rem;color:var(--text-muted);">Please do not publicly share sensitive personal information beyond what is required.</p>
                    </div>
                    <div class="card">
                        <div class="icon-wrap"><i class="fas fa-star float-icon"></i></div>
                        <h3>Owner Success Tips</h3>
                        <ul style="list-style:none;padding:0;margin-top:8px;">
                            <li style="padding:4px 0;">📸 Upload high-quality images</li>
                            <li style="padding:4px 0;">✍️ Write detailed descriptions</li>
                            <li style="padding:4px 0;">⚡ Respond quickly to inquiries</li>
                            <li style="padding:4px 0;">💰 Keep prices competitive</li>
                            <li style="padding:4px 0;">🔧 Maintain your items well</li>
                            <li style="padding:4px 0;">😊 Be polite &amp; professional</li>
                            <li style="padding:4px 0;">⭐ Build positive reviews</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── OWNER CHECKLIST ─── -->
        <section id="checklist">
            <div class="container">
                <div style="margin-bottom:28px;">
                    <h2 class="section-title">
                        Owner <span class="highlight">Checklist</span>
                        <button class="copy-link-btn" data-section="checklist" title="Copy link to this section"><i class="fas fa-link"></i></button>
                    </h2>
                    <p class="section-sub">Before submitting your listing, make sure you have:</p>
                </div>
                <div class="grid-2">
                    <div>
                        <div class="checklist-card"><span class="check"><i class="fas fa-check"></i></span><span>Uploaded clear photos</span></div>
                        <div class="checklist-card"><span class="check"><i class="fas fa-check"></i></span><span>Added an accurate description</span></div>
                        <div class="checklist-card"><span class="check"><i class="fas fa-check"></i></span><span>Selected the correct category</span></div>
                        <div class="checklist-card"><span class="check"><i class="fas fa-check"></i></span><span>Entered the correct rental price</span></div>
                    </div>
                    <div>
                        <div class="checklist-card"><span class="check"><i class="fas fa-check"></i></span><span>Added a security deposit</span></div>
                        <div class="checklist-card"><span class="check"><i class="fas fa-check"></i></span><span>Entered the replacement cost</span></div>
                        <div class="checklist-card"><span class="check"><i class="fas fa-check"></i></span><span>Provided your correct address &amp; city</span></div>
                        <div class="checklist-card"><span class="check"><i class="fas fa-check"></i></span><span>Read all Terms &amp; Conditions</span></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── FAQ ─── -->
        <section id="faq">
            <div class="container">
                <div style="margin-bottom:28px;">
                    <h2 class="section-title">
                        Frequently <span class="highlight">Asked Questions</span>
                        <button class="copy-link-btn" data-section="faq" title="Copy link to this section"><i class="fas fa-link"></i></button>
                    </h2>
                </div>
                <div class="grid-2">
                    <div class="faq-item">
                        <div class="faq-q"><i class="fas fa-pen-to-square"></i> Can I edit my listing later?</div>
                        <div class="faq-a">Yes, you can update your listing before or after approval, subject to review if required.</div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-q"><i class="fas fa-thumbs-down"></i> Can I reject a rental request?</div>
                        <div class="faq-a">Yes. Owners have full control over accepting or declining rental requests.</div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-q"><i class="fas fa-tools"></i> What if my item is damaged?</div>
                        <div class="faq-a">Inspect the item upon return and resolve the matter directly with the renter according to your agreed rental terms.</div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-q"><i class="fas fa-clock"></i> How long does approval take?</div>
                        <div class="faq-a">Approval time may vary depending on the number of pending listings.</div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-q"><i class="fas fa-trash-can"></i> Can I remove my listing?</div>
                        <div class="faq-a">Yes, you may remove or deactivate your listing at any time, provided there is no active rental.</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── COMMUNITY REVIEWS CAROUSEL ─── -->
        <section id="reviews" style="border-bottom:1px solid rgba(0,0,0,0.04);">
            <div class="container">
                <div style="margin-bottom:20px;">
                    <h2 class="section-title">
                        What Our <span class="highlight">Community Says</span>
                        <button class="copy-link-btn" data-section="reviews" title="Copy link to this section"><i class="fas fa-link"></i></button>
                    </h2>
                </div>
                <div class="reviews-carousel">
                    <div class="review-card">
                        <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        <div class="name">Ali R.</div>
                        <div class="text">“Rented my camera gear in just 2 days! The process was smooth and secure.”</div>
                    </div>
                    <div class="review-card">
                        <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        <div class="name">Sana K.</div>
                        <div class="text">“Love the deposit protection. I felt safe renting out my tools.”</div>
                    </div>
                    <div class="review-card">
                        <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></div>
                        <div class="name">Usman M.</div>
                        <div class="text">“Great platform! The approval team was quick and responsive.”</div>
                    </div>
                    <div class="review-card">
                        <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        <div class="name">Fatima Z.</div>
                        <div class="text">“I rented a projector for my event – hassle-free experience!”</div>
                    </div>
                    <div class="review-card">
                        <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        <div class="name">Bilal A.</div>
                        <div class="text">“The CNIC verification gave me peace of mind. Highly recommend.”</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── ENHANCED APPLY NOW SECTION ─── -->
        <section id="apply-now" style="border-bottom:none; padding-bottom:20px;">
            <div class="container">
                <div class="apply-section">
                    <div class="apply-content">
                        <div class="apply-badge">
                            <i class="fas fa-bolt"></i> Limited Time Offer
                        </div>
                        <h2>
                            <span class="emoji">🚀</span> Ready to Start Earning?
                        </h2>
                        <p>
                            Give your items on rent and turn your unused belongings into a steady income stream.
                            Join thousands of owners who are already earning.
                        </p>
                        <div class="apply-stats">
                            <div class="stat">
                                <span class="stat-number">2,400+</span>
                                <span class="stat-label">Items Listed</span>
                            </div>
                            <div class="stat">
                                <span class="stat-number">98%</span>
                                <span class="stat-label">Satisfaction Rate</span>
                            </div>
                            <div class="stat">
                                <span class="stat-number">4.9★</span>
                                <span class="stat-label">Average Rating</span>
                            </div>
                        </div>
                        <a href="/becomeownerform" class="btn-apply" id="applyBtn">
                            <i class="fas fa-arrow-right"></i> Apply Now – Give Your Items on Rent
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── FINAL AGREEMENT ─── -->
        <section id="agreement">
            <div class="container">
                <div class="agreement-card">
                    <div class="agree-header">
                        <i class="fas fa-file-signature"></i>
                        <h3 style="font-size:1.4rem;">Final Agreement <button class="copy-link-btn" data-section="agreement" title="Copy link to this section"><i class="fas fa-link"></i></button></h3>
                    </div>
                    <p style="font-weight:500;color:var(--text-primary);margin-bottom:12px;">By clicking <strong>"Submit Item"</strong>, you confirm that:</p>
                    <ul>
                        <li><i class="fas fa-check-circle"></i> You are the lawful owner of the listed item.</li>
                        <li><i class="fas fa-check-circle"></i> All information provided is true and accurate.</li>
                        <li><i class="fas fa-check-circle"></i> You have read and accepted these Terms &amp; Conditions.</li>
                        <li><i class="fas fa-check-circle"></i> Rental agreements are made directly between owners and renters.</li>
                        <li><i class="fas fa-check-circle"></i> You accept full responsibility for your rental transactions.</li>
                        <li><i class="fas fa-check-circle"></i> You agree to comply with all applicable local laws and regulations.</li>
                    </ul>
                </div>
            </div>
        </section>

    </main>

    <!-- ─── ENHANCED SCROLL TO TOP ─── -->
    <div class="scroll-top-wrap" id="scrollTopWrap">
        <svg viewBox="0 0 60 60">
            <circle class="bg-circle" cx="30" cy="30" r="26" />
            <circle class="progress-circle" id="scrollProgressCircle" cx="30" cy="30" r="26" />
        </svg>
        <div class="arrow"><i class="fas fa-chevron-up"></i></div>
        <span class="percentage" id="scrollPercentage">0%</span>
    </div>

    <!-- ─── CONFETTI CANVAS ─── -->
    <canvas id="confetti-canvas"></canvas>

    <script>
        // ─── DARK MODE ───
        const themeToggle = document.getElementById('themeToggle');
        const themeLabel = document.getElementById('themeLabel');
        let darkMode = false;
        themeToggle.addEventListener('click', () => {
            darkMode = !darkMode;
            document.documentElement.setAttribute('data-theme', darkMode ? 'dark' : '');
            themeLabel.textContent = darkMode ? 'Light' : 'Dark';
            themeToggle.innerHTML = `<i class="fas ${darkMode ? 'fa-sun' : 'fa-moon'}"></i> <span id="themeLabel">${darkMode ? 'Light' : 'Dark'}</span>`;
        });

        // ─── COPY LINK BUTTONS ───
        document.querySelectorAll('.copy-link-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const sectionId = this.dataset.section;
                const url = window.location.href.split('#')[0] + '#' + sectionId;
                navigator.clipboard.writeText(url).then(() => {
                    const original = this.innerHTML;
                    this.innerHTML = '<i class="fas fa-check" style="color:var(--red-600);"></i>';
                    setTimeout(() => { this.innerHTML = original; }, 1500);
                });
            });
        });

        // ─── SCROLL PROGRESS RING WITH PERCENTAGE ───
        const progressCircle = document.getElementById('scrollProgressCircle');
        const scrollTopWrap = document.getElementById('scrollTopWrap');
        const percentageLabel = document.getElementById('scrollPercentage');
        const circumference = 2 * Math.PI * 26;
        progressCircle.style.strokeDasharray = circumference;
        progressCircle.style.strokeDashoffset = circumference;

        window.addEventListener('scroll', () => {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - window.innerHeight;
            const progress = height > 0 ? scrollTop / height : 0;
            const offset = circumference - progress * circumference;
            progressCircle.style.strokeDashoffset = offset;
            percentageLabel.textContent = Math.round(progress * 100) + '%';
        });

        scrollTopWrap.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // ─── CONFETTI ───
        const canvas = document.getElementById('confetti-canvas');
        const ctx = canvas.getContext('2d');
        let W = window.innerWidth,
            H = window.innerHeight;
        canvas.width = W;
        canvas.height = H;
        let particles = [];
        let animating = false;

        function resizeCanvas() {
            W = window.innerWidth;
            H = window.innerHeight;
            canvas.width = W;
            canvas.height = H;
        }
        window.addEventListener('resize', resizeCanvas);

        class Particle {
            constructor() {
                this.x = Math.random() * W;
                this.y = Math.random() * H - H;
                this.size = Math.random() * 8 + 4;
                this.speedX = (Math.random() - 0.5) * 4;
                this.speedY = Math.random() * 6 + 4;
                this.color = `hsl(${Math.random() * 30 + 340}, 80%, 60%)`;
                this.rotation = 0;
                this.rotationSpeed = (Math.random() - 0.5) * 0.1;
            }
            update() {
                this.x += this.speedX;
                this.y += this.speedY;
                this.rotation += this.rotationSpeed;
                if (this.y > H + 20) {
                    this.y = -20;
                    this.x = Math.random() * W;
                }
            }
            draw() {
                ctx.save();
                ctx.translate(this.x, this.y);
                ctx.rotate(this.rotation);
                ctx.fillStyle = this.color;
                ctx.shadowColor = 'rgba(200,0,0,0.3)';
                ctx.shadowBlur = 8;
                ctx.fillRect(-this.size / 2, -this.size / 4, this.size, this.size / 2);
                ctx.restore();
            }
        }

        function startConfetti() {
            if (animating) return;
            particles = [];
            for (let i = 0; i < 120; i++) {
                particles.push(new Particle());
            }
            animating = true;
            animateConfetti();
        }

        function animateConfetti() {
            if (!animating) return;
            ctx.clearRect(0, 0, W, H);
            let alive = false;
            particles.forEach(p => {
                p.update();
                p.draw();
                if (p.y < H + 20) alive = true;
            });
            if (alive) {
                requestAnimationFrame(animateConfetti);
            } else {
                animating = false;
                ctx.clearRect(0, 0, W, H);
            }
        }

        // ─── Trigger confetti on Apply Now button ───
        document.getElementById('applyBtn')?.addEventListener('click', function(e) {
            startConfetti();
            setTimeout(() => { animating = false; }, 4000);
        });

        // ─── TOC ACTIVE STATE ───
        const tocLinks = document.querySelectorAll('.toc a');
        const sections = document.querySelectorAll('section[id]');
        window.addEventListener('scroll', () => {
            let current = '';
            sections.forEach(section => {
                const top = section.offsetTop - 120;
                if (window.pageYOffset >= top) {
                    current = section.getAttribute('id');
                }
            });
            tocLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === '#' + current) {
                    link.classList.add('active');
                }
            });
        });

        // ─── FADE-UP OBSERVER ───
        const fadeEls = document.querySelectorAll('.card, .checklist-card, .faq-item, .info-banner, .agreement-card, .review-card');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.06, rootMargin: '0px 0px -30px 0px' });
        fadeEls.forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.7s cubic-bezier(0.22, 1, 0.36, 1), transform 0.7s cubic-bezier(0.22, 1, 0.36, 1)';
            observer.observe(el);
        });
        setTimeout(() => {
            fadeEls.forEach(el => {
                const rect = el.getBoundingClientRect();
                if (rect.top < window.innerHeight) {
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                }
            });
        }, 80);
    </script>

</body>
</html>