<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verify Email | Rentify</title>
  <!-- Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <!-- PWA Manifest -->
  <link rel="manifest" href="data:application/json;base64,ewogICJuYW1lIjogIlJlbnRpZnkgVmVyaWZpY2F0aW9uIiwKICAic2hvcnRfbmFtZSI6ICJSZW50aWZ5IiwKICAic3RhcnRfdXJsIjogIi4iLAogICJkaXNwbGF5IjogInN0YW5kYWxvbmUiLAogICJiYWNrZ3JvdW5kX2NvbG9yIjogIiNmZmZmZmYiLAogICJ0aGVtZV9jb2xvciI6ICIjZGMyNjI2Igp9">
  
  <style>
    /* ============================================================
       ROOT & THEMING (Light / Dark)
       ============================================================ */
    :root {
      /* Light theme (default) */
      --bg-primary: #ffffff;
      --bg-secondary: #fafafa;
      --bg-card: rgba(255, 255, 255, 0.92);
      --text-primary: #1a1a1a;
      --text-secondary: #525252;
      --text-muted: #737373;
      --border-color: #e5e5e5;
      --shadow-color: rgba(0, 0, 0, 0.06);
      
      /* Brand colors – Red & White */
      --primary: #dc2626;
      --primary-dark: #b91c1c;
      --primary-light: #fef2f2;
      --primary-glow: rgba(220, 38, 38, 0.2);
      --primary-gradient: linear-gradient(145deg, #dc2626, #b91c1c);
      
      --white: #ffffff;
      --gray-50: #fafafa;
      --gray-100: #f5f5f5;
      --gray-200: #e5e5e5;
      --gray-300: #d4d4d4;
      --gray-400: #a3a3a3;
      --gray-500: #737373;
      --gray-600: #525252;
      --gray-800: #262626;
      --success: #16a34a;
      --error: #ef4444;
      
      --radius: 12px;
      --radius-lg: 18px;
      --shadow: 0 8px 32px rgba(0, 0, 0, 0.06);
      --shadow-red: 0 8px 28px rgba(220, 38, 38, 0.15);
      --transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    [data-theme="dark"] {
      --bg-primary: #1a1a1a;
      --bg-secondary: #0d0d0d;
      --bg-card: rgba(30, 30, 30, 0.95);
      --text-primary: #f5f5f5;
      --text-secondary: #b3b3b3;
      --text-muted: #8a8a8a;
      --border-color: #333333;
      --shadow-color: rgba(0, 0, 0, 0.4);
      --primary-light: #2a1515;
      --gray-50: #1a1a1a;
      --gray-100: #262626;
      --gray-200: #333333;
      --gray-300: #4a4a4a;
      --gray-400: #666666;
      --gray-500: #8a8a8a;
      --gray-600: #b3b3b3;
      --gray-800: #e5e5e5;
    }

    /* ============================================================
       RESET & BASE
       ============================================================ */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: var(--bg-primary);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 12px;
      position: relative;
      overflow-x: hidden;
      transition: background 0.4s ease, color 0.4s ease;
    }

    /* ============================================================
       DARK MODE TOGGLE
       ============================================================ */
    .theme-toggle {
      position: fixed;
      top: 16px;
      right: 16px;
      z-index: 1001;
      background: var(--bg-card);
      border: 1px solid var(--border-color);
      border-radius: 50%;
      width: 44px;
      height: 44px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: var(--transition);
      box-shadow: var(--shadow);
      color: var(--text-primary);
      font-size: 18px;
    }
    .theme-toggle:hover {
      transform: scale(1.05) rotate(8deg);
    }

    /* ============================================================
       BACKGROUND PARTICLES (Red/White)
       ============================================================ */
    .bg-particles {
      position: fixed;
      width: 100%;
      height: 100%;
      z-index: 0;
      pointer-events: none;
      overflow: hidden;
    }
    .bg-particles span {
      position: absolute;
      border-radius: 50%;
      filter: blur(80px);
      opacity: 0.12;
      animation: particleFloat 20s infinite alternate ease-in-out;
      transition: opacity 0.4s ease;
    }
    [data-theme="dark"] .bg-particles span {
      opacity: 0.06;
    }
    .bg-particles span:nth-child(1) {
      width: 350px; height: 350px;
      background: #dc2626;
      top: -120px; right: -80px;
      animation-duration: 24s;
    }
    .bg-particles span:nth-child(2) {
      width: 400px; height: 400px;
      background: #fca5a5;
      bottom: -140px; left: -100px;
      animation-duration: 28s;
      animation-delay: -6s;
    }
    .bg-particles span:nth-child(3) {
      width: 200px; height: 200px;
      background: #ef4444;
      top: 30%; left: 10%;
      animation-duration: 18s;
      animation-delay: -10s;
    }
    .bg-particles span:nth-child(4) {
      width: 150px; height: 150px;
      background: #fecaca;
      bottom: 20%; right: 5%;
      animation-duration: 22s;
      animation-delay: -4s;
    }

    @keyframes particleFloat {
      0% { transform: translate(0, 0) scale(1); }
      100% { transform: translate(50px, -40px) scale(1.2); }
    }

    /* ============================================================
       MAIN CONTAINER
       ============================================================ */
    .compact-container {
      width: 100%;
      max-width: 420px;
      position: relative;
      z-index: 1;
      animation: slideIn 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    @keyframes slideIn {
      from { opacity: 0; transform: translateY(24px) scale(0.96); }
      to { opacity: 1; transform: translateY(0) scale(1); }
    }

    /* ============================================================
       CARD (Glass-morphism)
       ============================================================ */
    .verification-card {
      background: var(--bg-card);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border-radius: var(--radius-lg);
      box-shadow: var(--shadow), 0 0 0 1px var(--border-color);
      padding: 24px 22px 20px;
      position: relative;
      overflow: hidden;
      border: 1px solid rgba(255, 255, 255, 0.1);
      transition: background 0.4s ease, box-shadow 0.4s ease;
    }

    .verification-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 5px;
      background: linear-gradient(90deg, var(--primary), #f87171, var(--primary-dark));
      background-size: 200% 100%;
      animation: shimmerBar 3.5s infinite linear;
    }

    @keyframes shimmerBar {
      0% { background-position: -200% 0; }
      100% { background-position: 200% 0; }
    }

    /* decorative accent */
    .verification-card::after {
      content: '';
      position: absolute;
      bottom: -30px;
      right: -30px;
      width: 120px;
      height: 120px;
      background: radial-gradient(circle, rgba(220,38,38,0.04) 0%, transparent 70%);
      border-radius: 50%;
      pointer-events: none;
    }

    /* ============================================================
       HEADER
       ============================================================ */
    .verification-header {
      text-align: center;
      margin-bottom: 12px;
      position: relative;
    }

    .logo-wrapper {
      position: relative;
      width: 64px;
      height: 64px;
      margin: 0 auto 8px;
    }

    .logo {
      position: absolute;
      width: 100%;
      height: 100%;
      background: var(--primary-gradient);
      border-radius: 18px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 28px;
      animation: logoFloat 3.8s infinite ease-in-out;
      box-shadow: 0 8px 24px var(--primary-glow);
    }

    @keyframes logoFloat {
      0%, 100% { transform: translateY(0) rotate(0deg); }
      50% { transform: translateY(-5px) rotate(1.5deg); }
    }

    .verification-header h1 {
      font-size: 22px;
      font-weight: 800;
      color: var(--text-primary);
      letter-spacing: -0.5px;
      margin-bottom: 4px;
      transition: color 0.4s ease;
    }
    .verification-header h1 span {
      color: var(--primary);
    }

    .verification-header .tagline {
      font-size: 13px;
      font-weight: 600;
      color: var(--text-secondary);
      background: var(--primary-light);
      display: inline-block;
      padding: 4px 18px;
      border-radius: 30px;
      margin-top: 2px;
      border: 1px solid rgba(220, 38, 38, 0.08);
      transition: background 0.4s ease, color 0.4s ease;
    }
    .verification-header .tagline i {
      margin-right: 6px;
      color: var(--primary);
    }

    /* ============================================================
       ENVELOPE 3D
       ============================================================ */
    .email-animation-container {
      position: relative;
      height: 80px;
      margin: 4px auto 12px;
    }

    .envelope-3d {
      position: absolute;
      width: 68px;
      height: 48px;
      background: var(--primary-gradient);
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%) perspective(600px) rotateX(15deg);
      border-radius: 10px;
      animation: envelope3d 4.8s infinite ease-in-out;
      box-shadow: 0 8px 28px var(--primary-glow);
    }

    @keyframes envelope3d {
      0%, 100% { transform: translate(-50%, -50%) perspective(600px) rotateX(15deg); }
      50% { transform: translate(-50%, -50%) perspective(600px) rotateX(5deg) translateY(-6px); }
    }

    .envelope-flap {
      position: absolute;
      width: 68px;
      height: 24px;
      background: linear-gradient(145deg, var(--primary-dark), #991b1b);
      top: 50%;
      left: 50%;
      transform: translate(-50%, calc(-50% - 24px)) rotateX(60deg);
      transform-origin: bottom;
      border-radius: 8px 8px 0 0;
      animation: flapWave 2.6s infinite ease-in-out;
    }

    @keyframes flapWave {
      0%, 100% { transform: translate(-50%, calc(-50% - 24px)) rotateX(60deg); }
      50% { transform: translate(-50%, calc(-50% - 24px)) rotateX(42deg); }
    }

    .email-icon {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 28px;
      color: white;
      z-index: 2;
      animation: iconGlow 2.8s infinite ease-in-out;
    }

    @keyframes iconGlow {
      0%, 100% { filter: drop-shadow(0 0 4px rgba(255,255,255,0.4)); }
      50% { filter: drop-shadow(0 0 16px rgba(255,255,255,0.8)); }
    }

    .envelope-shine {
      position: absolute;
      width: 20px;
      height: 8px;
      background: rgba(255,255,255,0.15);
      border-radius: 50%;
      top: 18%;
      left: 22%;
      transform: rotate(-20deg);
      filter: blur(2px);
      z-index: 1;
    }

    /* ============================================================
       EMAIL DISPLAY
       ============================================================ */
    .email-display-container {
      background: var(--primary-light);
      padding: 10px 16px;
      border-radius: var(--radius);
      margin: 6px 0 14px;
      border: 1px solid rgba(220, 38, 38, 0.12);
      animation: highlightPulse 3.2s infinite ease-in-out;
      transition: background 0.4s ease, border-color 0.4s ease;
    }

    @keyframes highlightPulse {
      0%, 100% { box-shadow: 0 0 0 rgba(220,38,38,0.06); }
      50% { box-shadow: 0 0 20px rgba(220,38,38,0.08); }
    }

    .email-display {
      display: flex;
      align-items: center;
      justify-content: space-between;
      font-size: 13px;
      color: var(--primary-dark);
      font-weight: 600;
      transition: color 0.4s ease;
    }
    [data-theme="dark"] .email-display {
      color: #f87171;
    }

    .copy-btn {
      background: rgba(255,255,255,0.7);
      border: 1px solid rgba(220,38,38,0.15);
      border-radius: 8px;
      padding: 5px 14px;
      font-size: 10.5px;
      color: var(--primary);
      cursor: pointer;
      transition: var(--transition);
      display: flex;
      align-items: center;
      gap: 6px;
      font-weight: 700;
      letter-spacing: 0.2px;
      position: relative;
      overflow: hidden;
    }

    .copy-btn:hover {
      background: white;
      transform: translateY(-2px);
      box-shadow: 0 4px 16px var(--primary-glow);
      border-color: var(--primary);
    }

    /* ============================================================
       SMART DETECTION BADGE
       ============================================================ */
    .smart-detection {
      margin: 8px 0 12px;
      padding: 8px 14px;
      background: var(--primary-light);
      border-radius: var(--radius);
      display: flex;
      align-items: center;
      justify-content: space-between;
      border: 1px solid rgba(220, 38, 38, 0.08);
      transition: background 0.4s ease, border-color 0.4s ease;
    }
    .detection-badge {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 11px;
      color: var(--text-secondary);
      font-weight: 500;
    }
    .detection-badge i {
      color: var(--primary);
    }
    .direct-open-btn {
      background: var(--white);
      border: 1px solid var(--primary);
      border-radius: 6px;
      padding: 4px 14px;
      color: var(--primary);
      font-weight: 700;
      font-size: 11px;
      cursor: pointer;
      transition: var(--transition);
      display: none;
      align-items: center;
      gap: 6px;
    }
    .direct-open-btn:hover {
      background: var(--primary);
      color: white;
    }
    [data-theme="dark"] .direct-open-btn {
      background: transparent;
    }
    [data-theme="dark"] .direct-open-btn:hover {
      background: var(--primary);
    }

    /* ============================================================
       MESSAGE BOX
       ============================================================ */
    .verification-message {
      font-size: 12.5px;
      color: var(--text-secondary);
      line-height: 1.6;
      margin-bottom: 14px;
      text-align: center;
      padding: 12px 16px;
      background: linear-gradient(135deg, var(--primary-light), #fff5f5);
      border-radius: var(--radius);
      border-left: 5px solid var(--primary);
      animation: fadeInUp 0.5s ease;
      font-weight: 500;
      transition: background 0.4s ease, color 0.4s ease;
    }
    [data-theme="dark"] .verification-message {
      background: linear-gradient(135deg, #2a1515, #1f0f0f);
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(8px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* ============================================================
       SUCCESS MESSAGE
       ============================================================ */
    .success-message {
      background: linear-gradient(135deg, #f0fdf4, #dcfce7);
      border: 1px solid #86efac;
      border-radius: var(--radius);
      padding: 10px 16px;
      margin-bottom: 12px;
      color: #14532d;
      font-size: 12px;
      display: flex;
      align-items: center;
      gap: 10px;
      animation: successSlide 0.3s ease;
      font-weight: 600;
      transition: background 0.4s ease, border-color 0.4s ease;
    }
    [data-theme="dark"] .success-message {
      background: linear-gradient(135deg, #0a1f0a, #0d2a0d);
      border-color: #166534;
      color: #86efac;
    }

    @keyframes successSlide {
      from { opacity: 0; transform: translateY(-10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* ============================================================
       QUICK ACCESS (Email Providers)
       ============================================================ */
    .email-quick-access {
      background: rgba(255,255,255,0.5);
      backdrop-filter: blur(4px);
      padding: 12px 10px;
      border-radius: var(--radius);
      margin: 10px 0 14px;
      border: 1px solid var(--border-color);
      box-shadow: 0 2px 8px rgba(0,0,0,0.02);
      transition: background 0.4s ease, border-color 0.4s ease;
    }
    [data-theme="dark"] .email-quick-access {
      background: rgba(30,30,30,0.5);
    }

    .quick-access-title {
      font-size: 10px;
      color: var(--text-muted);
      text-align: center;
      margin-bottom: 10px;
      font-weight: 700;
      letter-spacing: 0.8px;
      text-transform: uppercase;
    }
    .quick-access-title i {
      color: var(--primary);
      margin-right: 4px;
    }

    .smart-email-buttons {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 8px;
    }

    .smart-email-btn {
      background: var(--bg-primary);
      border: 1.5px solid var(--border-color);
      border-radius: 10px;
      padding: 9px 4px;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 4px;
      cursor: pointer;
      transition: var(--transition);
      font-size: 10px;
      color: var(--text-secondary);
      font-weight: 700;
      position: relative;
      overflow: hidden;
    }

    .smart-email-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 20px var(--primary-glow);
      border-color: var(--primary);
    }

    .smart-email-btn i { font-size: 18px; }
    .smart-email-btn.gmail { border-color: #d93025; }
    .smart-email-btn.gmail i { color: #d93025; }
    .smart-email-btn.gmail:hover { background: #fce8e6; border-color: #d93025; }

    .smart-email-btn.outlook { border-color: #0078d4; }
    .smart-email-btn.outlook i { color: #0078d4; }
    .smart-email-btn.outlook:hover { background: #e8f2fe; border-color: #0078d4; }

    .smart-email-btn.yahoo { border-color: #6001d2; }
    .smart-email-btn.yahoo i { color: #6001d2; }
    .smart-email-btn.yahoo:hover { background: #f5f0ff; border-color: #6001d2; }

    .smart-email-btn.apple { border-color: #1d1d1f; }
    .smart-email-btn.apple i { color: #1d1d1f; }
    .smart-email-btn.apple:hover { background: #f5f5f7; border-color: #1d1d1f; }

    /* ============================================================
       RESEND BUTTON (with ripple)
       ============================================================ */
    .resend-container {
      margin: 6px 0 14px;
      position: relative;
    }

    .resend-btn {
      width: 100%;
      padding: 13px 12px;
      background: var(--primary-gradient);
      color: white;
      border: none;
      border-radius: var(--radius);
      font-size: 13.5px;
      font-weight: 700;
      cursor: pointer;
      transition: var(--transition);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      position: relative;
      overflow: hidden;
      box-shadow: 0 4px 20px var(--primary-glow);
      letter-spacing: 0.3px;
    }

    .resend-btn:hover:not(:disabled) {
      transform: translateY(-2px);
      box-shadow: 0 8px 32px var(--primary-glow);
    }

    .resend-btn:disabled {
      opacity: 0.6;
      cursor: not-allowed;
      transform: none !important;
    }

    .resend-btn::after {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.06) 50%, transparent 70%);
      animation: shimmerEffect 4.5s infinite linear;
    }

    @keyframes shimmerEffect {
      0% { transform: translateX(-100%) rotate(45deg); }
      100% { transform: translateX(100%) rotate(45deg); }
    }

    /* Ripple effect for buttons */
    .ripple {
      position: absolute;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.4);
      transform: scale(0);
      animation: rippleAnim 0.6s linear;
      pointer-events: none;
    }
    @keyframes rippleAnim {
      from { transform: scale(0); opacity: 0.5; }
      to { transform: scale(4); opacity: 0; }
    }

    .loading-spinner {
      display: none;
      width: 16px;
      height: 16px;
      border: 2.5px solid rgba(255,255,255,0.25);
      border-top-color: white;
      border-radius: 50%;
      animation: spin 0.7s linear infinite;
    }

    @keyframes spin { to { transform: rotate(360deg); } }

    /* ============================================================
       PROGRESS & COUNTDOWN
       ============================================================ */
    .progress-container {
      width: 100%;
      height: 4px;
      background: var(--border-color);
      border-radius: 4px;
      overflow: hidden;
      margin-top: 10px;
      display: none;
    }

    .progress-bar {
      height: 100%;
      background: linear-gradient(90deg, var(--primary), #f87171);
      width: 0%;
      transition: width 1s linear;
      border-radius: 4px;
    }

    .countdown-container {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      margin-top: 8px;
      font-size: 12px;
      color: var(--text-muted);
      font-weight: 500;
    }

    .countdown-number {
      background: var(--primary-light);
      color: var(--primary-dark);
      padding: 2px 14px;
      border-radius: 30px;
      font-weight: 800;
      font-size: 14px;
      border: 1px solid rgba(220,38,38,0.1);
      animation: countdownPulse 1s infinite alternate;
      transition: background 0.4s ease, color 0.4s ease;
    }
    [data-theme="dark"] .countdown-number {
      background: #2a1515;
      color: #f87171;
      border-color: rgba(220,38,38,0.2);
    }

    @keyframes countdownPulse {
      from { transform: scale(1); }
      to { transform: scale(1.06); }
    }

    /* ============================================================
       FOOTER ACTIONS
       ============================================================ */
    .footer-actions {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 14px;
      padding-top: 14px;
      border-top: 1.5px solid var(--border-color);
      transition: border-color 0.4s ease;
    }

    .footer-link {
      color: var(--primary);
      text-decoration: none;
      font-size: 12px;
      font-weight: 700;
      display: flex;
      align-items: center;
      gap: 6px;
      transition: var(--transition);
      padding: 5px 12px;
      border-radius: 10px;
    }

    .footer-link:hover {
      background: var(--primary-light);
      transform: translateY(-2px);
    }

    .logout-form {
      margin: 0;
    }

    .logout-btn {
      background: none;
      border: none;
      color: var(--text-muted);
      font-size: 12px;
      font-weight: 700;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 6px;
      padding: 5px 12px;
      border-radius: 10px;
      transition: var(--transition);
    }

    .logout-btn:hover {
      background: var(--gray-100);
      color: var(--text-primary);
    }
    [data-theme="dark"] .logout-btn:hover {
      background: #2a2a2a;
    }

    /* ============================================================
       TOAST
       ============================================================ */
    .advanced-toast {
      position: fixed;
      top: 18px;
      left: 50%;
      transform: translateX(-50%) translateY(-100px);
      background: var(--primary-dark);
      color: white;
      padding: 12px 24px;
      border-radius: var(--radius);
      font-size: 13px;
      font-weight: 600;
      box-shadow: 0 8px 32px var(--primary-glow);
      z-index: 1000;
      opacity: 0;
      transition: transform 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55), opacity 0.4s;
      display: flex;
      align-items: center;
      gap: 12px;
      min-width: 200px;
      text-align: center;
      backdrop-filter: blur(12px);
      border: 1px solid rgba(255,255,255,0.08);
    }

    .advanced-toast.success {
      background: linear-gradient(135deg, var(--success), #15803d);
    }
    .advanced-toast.error {
      background: linear-gradient(135deg, var(--error), #b91c1c);
    }

    /* ============================================================
       CONFETTI OVERLAY (for celebration)
       ============================================================ */
    .confetti-container {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: 999;
      overflow: hidden;
    }
    .confetti-piece {
      position: absolute;
      width: 10px;
      height: 10px;
      animation: confettiFall 3s linear forwards;
    }
    @keyframes confettiFall {
      0% { transform: translateY(-20px) rotate(0deg); opacity: 1; }
      100% { transform: translateY(110vh) rotate(720deg); opacity: 0; }
    }

    /* ============================================================
       RESPONSIVE
       ============================================================ */
    @media (max-width: 480px) {
      .compact-container { max-width: 340px; }
      .verification-card { padding: 18px 14px; }
      .smart-email-buttons { grid-template-columns: repeat(4, 1fr); gap: 5px; }
      .email-animation-container { height: 64px; }
      .envelope-3d { width: 54px; height: 38px; }
      .envelope-flap { width: 54px; height: 20px; transform: translate(-50%, calc(-50% - 20px)) rotateX(60deg); }
      .footer-actions { flex-direction: column; gap: 6px; }
      .verification-header h1 { font-size: 19px; }
      .smart-detection { flex-direction: column; gap: 6px; align-items: stretch; }
      .direct-open-btn { justify-content: center; }
    }
  </style>
</head>
<body>

<!-- ============================================================
     DARK MODE TOGGLE
     ============================================================ -->
<button class="theme-toggle" id="themeToggle" aria-label="Toggle theme">
  <i class="fas fa-moon"></i>
</button>

<!-- ============================================================
     BACKGROUND PARTICLES
     ============================================================ -->
<div class="bg-particles">
  <span></span><span></span><span></span><span></span>
</div>

<!-- ============================================================
     TOAST
     ============================================================ -->
<div class="advanced-toast" id="toast"></div>

<!-- ============================================================
     CONFETTI CONTAINER
     ============================================================ -->
<div class="confetti-container" id="confettiContainer"></div>

<!-- ============================================================
     MAIN CARD
     ============================================================ -->
<div class="compact-container">
  <div class="verification-card">

    <!-- HEADER -->
    <div class="verification-header">
      <div class="logo-wrapper">
        <div class="logo"><i class="fas fa-warehouse"></i></div>
      </div>
      <h1>Verify Your <span>Email</span></h1>
      <div class="tagline"><i class="fas fa-arrow-right"></i> one click away from Rentify</div>
    </div>

    <!-- 3D ENVELOPE -->
    <div class="email-animation-container">
      <div class="envelope-3d">
        <div class="envelope-shine"></div>
      </div>
      <div class="envelope-flap"></div>
      <div class="email-icon"><i class="fas fa-envelope"></i></div>
    </div>

    <!-- EMAIL DISPLAY -->
    <div class="email-display-container">
      <div class="email-display">
        <div>
          <i class="fas fa-at" style="color: var(--primary); margin-right: 4px;"></i>
          <span id="emailText">alex.rents@rentify.com</span>
        </div>
        <button class="copy-btn" onclick="copyEmail()">
          <i class="fas fa-copy"></i> Copy
        </button>
      </div>
    </div>

    <!-- SMART DETECTION (auto-detects provider) -->
    <div class="smart-detection" id="smartDetection">
      <div class="detection-badge">
        <i class="fas fa-magic"></i>
        <span id="detectedProvider">Detecting provider...</span>
      </div>
      <button class="direct-open-btn" id="directOpenBtn" style="display:none;">
        <i class="fas fa-arrow-right"></i> Open in <span id="providerName"></span>
      </button>
    </div>

    <!-- MESSAGE -->
    <div class="verification-message">
      <i class="fas fa-circle-check" style="color: var(--primary); margin-right: 8px;"></i>
      Click the verification link in your email to activate your account and start renting.
    </div>

    <!-- SUCCESS MESSAGE -->
    <div class="success-message" id="successMessage" style="display:none;">
      <i class="fas fa-check-circle" style="color: #16a34a; font-size: 16px;"></i> 
      A new verification link has been sent to your email.
    </div>

    <!-- QUICK ACCESS -->
    <div class="email-quick-access">
      <div class="quick-access-title"><i class="fas fa-bolt"></i> Quick Access</div>
      <div class="smart-email-buttons">
        <button class="smart-email-btn gmail" onclick="openProvider('gmail')"><i class="fab fa-google"></i> Gmail</button>
        <button class="smart-email-btn outlook" onclick="openProvider('outlook')"><i class="fas fa-envelope"></i> Outlook</button>
        <button class="smart-email-btn yahoo" onclick="openProvider('yahoo')"><i class="fab fa-yahoo"></i> Yahoo</button>
        <button class="smart-email-btn apple" onclick="openProvider('apple')"><i class="fab fa-apple"></i> Mail</button>
      </div>
    </div>

    <!-- RESEND FORM -->
    <div class="resend-container">
      <form id="resendForm" method="POST" action="#">
        <input type="hidden" name="_token" value="simulated">
        <button type="submit" class="resend-btn" id="resendBtn">
          <i class="fas fa-paper-plane"></i>
          <span id="btnText">Resend Verification</span>
          <div class="loading-spinner" id="spinner"></div>
        </button>
      </form>

      <div class="progress-container" id="progressContainer">
        <div class="progress-bar" id="progressBar"></div>
      </div>

      <div class="countdown-container" id="countdownContainer" style="display:none;">
        <div class="countdown">
          <span>Resend in</span>
          <span class="countdown-number" id="countdownNumber">60</span>
          <span>seconds</span>
        </div>
      </div>
    </div>

    <!-- FOOTER ACTIONS -->
    <div class="footer-actions">
      <a href="#" class="footer-link" onclick="showToast('Profile dashboard','success')">
        <i class="fas fa-user-cog"></i> Profile
      </a>
      <form method="POST" action="#" class="logout-form" id="logoutForm">
        <input type="hidden" name="_token" value="simulated">
        <button type="submit" class="logout-btn" id="logoutBtn">
          <i class="fas fa-sign-out-alt"></i> Logout
        </button>
      </form>
    </div>

  </div>
</div>

<!-- ============================================================
     JAVASCRIPT – ALL FEATURES
     ============================================================ -->
<script>
(function() {
  'use strict';

  // ============================================================
  // 1. DARK MODE TOGGLE
  // ============================================================
  const themeToggle = document.getElementById('themeToggle');
  const html = document.documentElement;
  const moonIcon = '<i class="fas fa-moon"></i>';
  const sunIcon = '<i class="fas fa-sun"></i>';

  // Load saved theme
  const savedTheme = localStorage.getItem('theme') || 'light';
  html.setAttribute('data-theme', savedTheme);
  themeToggle.innerHTML = savedTheme === 'dark' ? sunIcon : moonIcon;

  themeToggle.addEventListener('click', () => {
    const current = html.getAttribute('data-theme');
    const next = current === 'dark' ? 'light' : 'dark';
    html.setAttribute('data-theme', next);
    localStorage.setItem('theme', next);
    themeToggle.innerHTML = next === 'dark' ? sunIcon : moonIcon;
    showToast(next === 'dark' ? '🌙 Dark mode activated' : '☀️ Light mode activated', 'info');
  });

  // ============================================================
  // 2. TOAST SYSTEM
  // ============================================================
  const toast = document.getElementById('toast');
  window.showToast = function(message, type = 'info') {
    const iconMap = {
      success: 'fa-check-circle',
      error: 'fa-exclamation-circle',
      info: 'fa-info-circle'
    };
    toast.innerHTML = `<i class="fas ${iconMap[type] || 'fa-info-circle'}"></i> <span>${message}</span>`;
    toast.className = `advanced-toast ${type}`;
    toast.style.transform = 'translateX(-50%) translateY(0)';
    toast.style.opacity = '1';
    clearTimeout(toast._hide);
    toast._hide = setTimeout(() => {
      toast.style.transform = 'translateX(-50%) translateY(-100px)';
      toast.style.opacity = '0';
    }, 3200);
  };

  // ============================================================
  // 3. SMART EMAIL DETECTION (with deep linking)
  // ============================================================
  const email = document.getElementById('emailText').textContent;
  const detectedProvider = document.getElementById('detectedProvider');
  const directOpenBtn = document.getElementById('directOpenBtn');
  const providerName = document.getElementById('providerName');

  function detectEmailProvider(email) {
    const domain = email.split('@')[1]?.toLowerCase() || '';
    const providers = {
      'gmail.com': { name: 'Gmail', icon: 'fab fa-google', url: 'https://mail.google.com/mail/u/0/#search/Rentify' },
      'googlemail.com': { name: 'Gmail', icon: 'fab fa-google', url: 'https://mail.google.com/mail/u/0/#search/Rentify' },
      'outlook.com': { name: 'Outlook', icon: 'fas fa-envelope', url: 'https://outlook.live.com/mail/0/inbox' },
      'hotmail.com': { name: 'Outlook', icon: 'fas fa-envelope', url: 'https://outlook.live.com/mail/0/inbox' },
      'live.com': { name: 'Outlook', icon: 'fas fa-envelope', url: 'https://outlook.live.com/mail/0/inbox' },
      'yahoo.com': { name: 'Yahoo', icon: 'fab fa-yahoo', url: 'https://mail.yahoo.com/d/search/keyword=Rentify' },
      'yahoo.co.uk': { name: 'Yahoo', icon: 'fab fa-yahoo', url: 'https://mail.yahoo.com/d/search/keyword=Rentify' },
      'icloud.com': { name: 'Apple Mail', icon: 'fab fa-apple', url: 'https://www.icloud.com/mail' },
      'me.com': { name: 'Apple Mail', icon: 'fab fa-apple', url: 'https://www.icloud.com/mail' },
      'mac.com': { name: 'Apple Mail', icon: 'fab fa-apple', url: 'https://www.icloud.com/mail' }
    };
    return providers[domain] || null;
  }

  const provider = detectEmailProvider(email);
  if (provider) {
    detectedProvider.textContent = `Detected: ${provider.name}`;
    providerName.textContent = provider.name;
    directOpenBtn.style.display = 'flex';
    directOpenBtn.onclick = () => {
      window.open(provider.url, '_blank');
      showToast(`Opening ${provider.name}...`, 'info');
    };
  } else {
    detectedProvider.textContent = '📧 Check your email inbox';
  }

  // ============================================================
  // 4. DESKTOP NOTIFICATIONS
  // ============================================================
  function requestNotificationPermission() {
    if ('Notification' in window && Notification.permission === 'default') {
      setTimeout(() => {
        Notification.requestPermission().then(perm => {
          if (perm === 'granted') {
            showToast('🔔 Notifications enabled', 'success');
          }
        });
      }, 3000);
    }
  }
  requestNotificationPermission();

  function sendNotification() {
    if ('Notification' in window && Notification.permission === 'granted') {
      new Notification('📬 Rentify Verification', {
        body: 'Check your email for the verification link!',
        icon: 'data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><text y=".9em" font-size="90">📬</text></svg>',
        tag: 'rentify-verification',
        requireInteraction: true
      });
    }
  }

  // ============================================================
  // 5. CONFETTI CELEBRATION
  // ============================================================
  function launchConfetti() {
    const container = document.getElementById('confettiContainer');
    const colors = ['#dc2626', '#f87171', '#fecaca', '#ffffff', '#b91c1c', '#ef4444'];
    for (let i = 0; i < 60; i++) {
      const piece = document.createElement('div');
      piece.className = 'confetti-piece';
      const size = Math.random() * 8 + 4;
      piece.style.width = size + 'px';
      piece.style.height = size + 'px';
      piece.style.background = colors[Math.floor(Math.random() * colors.length)];
      piece.style.left = Math.random() * 100 + '%';
      piece.style.top = '-10px';
      piece.style.borderRadius = Math.random() > 0.5 ? '50%' : '2px';
      piece.style.animationDuration = (Math.random() * 2 + 2) + 's';
      piece.style.animationDelay = (Math.random() * 1.5) + 's';
      piece.style.transform = `rotate(${Math.random() * 360}deg)`;
      container.appendChild(piece);
      setTimeout(() => piece.remove(), 4000);
    }
  }

  // ============================================================
  // 6. MICRO-INTERACTIONS (Ripple Effect)
  // ============================================================
  function addRipple(e) {
    const btn = e.currentTarget;
    const rect = btn.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);
    const x = e.clientX - rect.left - size / 2;
    const y = e.clientY - rect.top - size / 2;
    
    const ripple = document.createElement('span');
    ripple.className = 'ripple';
    ripple.style.width = size + 'px';
    ripple.style.height = size + 'px';
    ripple.style.left = x + 'px';
    ripple.style.top = y + 'px';
    btn.appendChild(ripple);
    setTimeout(() => ripple.remove(), 600);
  }

  // Apply ripple to all buttons
  document.querySelectorAll('.resend-btn, .copy-btn, .smart-email-btn, .theme-toggle, .direct-open-btn').forEach(btn => {
    btn.addEventListener('click', addRipple);
  });

  // ============================================================
  // 7. RESEND WITH EXPONENTIAL BACKOFF
  // ============================================================
  const resendForm = document.getElementById('resendForm');
  const resendBtn = document.getElementById('resendBtn');
  const btnText = document.getElementById('btnText');
  const spinner = document.getElementById('spinner');
  const progressContainer = document.getElementById('progressContainer');
  const progressBar = document.getElementById('progressBar');
  const countdownContainer = document.getElementById('countdownContainer');
  const countdownNumber = document.getElementById('countdownNumber');
  const successMsg = document.getElementById('successMessage');

  // Exponential backoff: [60, 120, 300, 600] seconds
  const cooldownTimes = [60, 120, 300, 600];
  let countdownInterval = null;

  function getAttempts() {
    return parseInt(localStorage.getItem('resendAttempts') || '0');
  }

  function incrementAttempts() {
    const current = getAttempts();
    localStorage.setItem('resendAttempts', current + 1);
  }

  function getCooldownTime() {
    const attempts = getAttempts();
    return cooldownTimes[Math.min(attempts, cooldownTimes.length - 1)];
  }

  // Restore cooldown
  const cooldownEnd = localStorage.getItem('emailResendCooldown');
  if (cooldownEnd) {
    const remaining = Math.ceil((parseInt(cooldownEnd) - Date.now()) / 1000);
    if (remaining > 0) startCountdown(remaining);
    else {
      localStorage.removeItem('emailResendCooldown');
    }
  }

  // Resend handler
  resendForm.addEventListener('submit', function(e) {
    e.preventDefault();

    const cooldownTime = getCooldownTime();
    localStorage.setItem('emailResendCooldown', Date.now() + cooldownTime * 1000);
    incrementAttempts();

    resendBtn.disabled = true;
    btnText.innerHTML = 'Sending...';
    spinner.style.display = 'block';

    // Simulate AJAX
    setTimeout(() => {
      successMsg.style.display = 'flex';
      showToast('Verification email sent successfully!', 'success');
      sendNotification();

      setTimeout(() => {
        btnText.innerHTML = '<i class="fas fa-check"></i> Sent!';
        resendBtn.style.background = 'linear-gradient(145deg, #16a34a, #15803d)';
        setTimeout(() => {
          btnText.innerHTML = 'Resend Verification';
          resendBtn.style.background = '';
          spinner.style.display = 'none';
          startCountdown(cooldownTime);
        }, 1200);
      }, 400);

      setTimeout(() => { successMsg.style.display = 'none'; }, 4000);
    }, 700);
  });

  // Countdown with progress
  function startCountdown(seconds) {
    if (countdownInterval) clearInterval(countdownInterval);
    let remaining = seconds;
    countdownContainer.style.display = 'flex';
    progressContainer.style.display = 'block';
    resendBtn.disabled = true;

    function update() {
      countdownNumber.textContent = remaining;
      const progress = ((seconds - remaining) / seconds) * 100;
      progressBar.style.width = Math.min(progress, 100) + '%';
      if (remaining <= 0) {
        clearInterval(countdownInterval);
        countdownContainer.style.display = 'none';
        progressContainer.style.display = 'none';
        resendBtn.disabled = false;
        localStorage.removeItem('emailResendCooldown');
      }
      remaining--;
    }
    update();
    countdownInterval = setInterval(update, 1000);
  }

  // ============================================================
  // 8. COPY EMAIL
  // ============================================================
  window.copyEmail = function() {
    const emailText = document.getElementById('emailText').textContent;
    navigator.clipboard.writeText(emailText).then(() => {
      showToast('Email copied to clipboard!', 'success');
      const btn = document.querySelector('.copy-btn');
      btn.innerHTML = '<i class="fas fa-check"></i> Copied!';
      btn.style.background = '#16a34a';
      btn.style.color = 'white';
      btn.style.borderColor = '#16a34a';
      setTimeout(() => {
        btn.innerHTML = '<i class="fas fa-copy"></i> Copy';
        btn.style.background = '';
        btn.style.color = '';
        btn.style.borderColor = '';
      }, 1500);
    }).catch(() => {
      // Fallback
      const textarea = document.createElement('textarea');
      textarea.value = emailText;
      document.body.appendChild(textarea);
      textarea.select();
      document.execCommand('copy');
      textarea.remove();
      showToast('Email copied!', 'success');
    });
  };

  // ============================================================
  // 9. PROVIDER LINKS
  // ============================================================
  window.openProvider = function(provider) {
    const urls = {
      gmail: 'https://mail.google.com',
      outlook: 'https://outlook.live.com',
      yahoo: 'https://mail.yahoo.com',
      apple: 'https://www.icloud.com/mail'
    };
    window.open(urls[provider], '_blank');
    showToast(`Opening ${provider.charAt(0).toUpperCase() + provider.slice(1)}...`, 'info');
  };

  // ============================================================
  // 10. LOGOUT CONFIRMATION
  // ============================================================
  document.getElementById('logoutBtn').addEventListener('click', function(e) {
    e.preventDefault();
    if (confirm('Logout from Rentify?')) {
      showToast('Logging out...', 'info');
      // In real app: submit form
    }
  });

  // ============================================================
  // 11. PROFILE LINK (demo)
  // ============================================================
  document.querySelector('.footer-link')?.addEventListener('click', function(e) {
    e.preventDefault();
    showToast('Profile dashboard (demo)', 'info');
  });

  // ============================================================
  // 12. SIMULATE VERIFICATION CELEBRATION (demo trigger)
  // ============================================================
  // Click on the envelope to simulate verification (for demo)
  document.querySelector('.envelope-3d')?.addEventListener('dblclick', function() {
    launchConfetti();
    showToast('🎉 Email verified successfully! Welcome to Rentify!', 'success');
    // Update UI
    document.querySelector('.verification-message').innerHTML = `
      <i class="fas fa-check-circle" style="color: var(--success); margin-right: 8px;"></i>
      ✅ Your email has been verified! Welcome to Rentify.
    `;
    document.querySelector('.verification-message').style.borderLeftColor = '#16a34a';
  });

  console.log('🚀 Rentify Verification Page loaded with all enhancements!');
  console.log('📧 Double-click the envelope to simulate verification!');

})();
</script>
</body>
</html>