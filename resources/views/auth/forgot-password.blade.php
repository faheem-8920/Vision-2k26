<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <style>
            /* ================================================
               PERFECTLY BALANCED - PROFESSIONAL ULTRA
               ================================================ */

            /* ----- GLOBAL RESET ----- */
            .forgot-password-wrapper {
                position: relative;
                overflow: hidden;
                padding: 1rem 0;
                min-height: auto;
                perspective: 2500px;
                isolation: isolate;
                display: flex;
                align-items: center;
                justify-content: center;
                background: 
                    radial-gradient(ellipse at 0% 0%, rgba(220, 38, 38, 0.02) 0%, transparent 50%),
                    radial-gradient(ellipse at 100% 100%, rgba(220, 38, 38, 0.02) 0%, transparent 50%);
            }

            /* Hide scrollbar but keep functionality */
            ::-webkit-scrollbar {
                width: 6px;
            }
            ::-webkit-scrollbar-track {
                background: transparent;
            }
            ::-webkit-scrollbar-thumb {
                background: linear-gradient(180deg, #dc2626, #b91c1c);
                border-radius: 10px;
            }
            ::-webkit-scrollbar-thumb:hover {
                background: linear-gradient(180deg, #b91c1c, #991b1b);
            }

            /* ================================================
               BACKGROUND - ULTRA DYNAMIC
               ================================================ */

            .dynamic-bg-pro {
                position: absolute;
                inset: -30%;
                background: 
                    radial-gradient(ellipse at 10% 20%, rgba(220, 38, 38, 0.1) 0%, transparent 50%),
                    radial-gradient(ellipse at 90% 80%, rgba(220, 38, 38, 0.06) 0%, transparent 50%),
                    radial-gradient(ellipse at 50% 50%, rgba(239, 68, 68, 0.03) 0%, transparent 50%),
                    radial-gradient(ellipse at 0% 100%, rgba(220, 38, 38, 0.02) 0%, transparent 50%),
                    radial-gradient(ellipse at 100% 0%, rgba(220, 38, 38, 0.02) 0%, transparent 50%);
                animation: bg-pro 25s ease-in-out infinite alternate;
                z-index: 0;
                pointer-events: none;
            }

            @keyframes bg-pro {
                0% { transform: translate(0, 0) scale(1) rotate(0deg); }
                50% { transform: translate(3%, -3%) scale(1.05) rotate(2deg); }
                100% { transform: translate(-3%, 3%) scale(1.05) rotate(-2deg); }
            }

            /* ----- GLOW ORBS - PRO ----- */
            .glow-orb-pro {
                position: absolute;
                border-radius: 50%;
                filter: blur(80px);
                animation: orb-pro 20s ease-in-out infinite;
                pointer-events: none;
                z-index: 0;
                mix-blend-mode: screen;
            }

            .glow-orb-pro-1 {
                width: 300px;
                height: 300px;
                top: -10%;
                right: -8%;
                background: radial-gradient(circle, rgba(220, 38, 38, 0.12), transparent 70%);
                animation-delay: 0s;
                animation-duration: 22s;
            }

            .glow-orb-pro-2 {
                width: 250px;
                height: 250px;
                bottom: -10%;
                left: -8%;
                background: radial-gradient(circle, rgba(239, 68, 68, 0.08), transparent 70%);
                animation-delay: -6s;
                animation-duration: 26s;
            }

            .glow-orb-pro-3 {
                width: 180px;
                height: 180px;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background: radial-gradient(circle, rgba(220, 38, 38, 0.05), transparent 70%);
                animation-delay: -12s;
                animation-duration: 30s;
            }

            @keyframes orb-pro {
                0%, 100% { transform: translate(0, 0) scale(1) rotate(0deg); }
                25% { transform: translate(50px, -30px) scale(1.2) rotate(90deg); }
                50% { transform: translate(-40px, 50px) scale(0.85) rotate(180deg); }
                75% { transform: translate(45px, 25px) scale(1.15) rotate(270deg); }
            }

            /* ================================================
               MAIN CARD - CINEMATIC PRO
               ================================================ */

            .card-pro-cinematic {
                position: relative;
                z-index: 1;
                background: rgba(255, 255, 255, 0.45);
                backdrop-filter: blur(40px) saturate(1.5);
                -webkit-backdrop-filter: blur(40px) saturate(1.5);
                border-radius: 2rem;
                padding: 0.6rem;
                box-shadow: 
                    0 30px 80px -20px rgba(0, 0, 0, 0.2),
                    0 20px 40px -20px rgba(220, 38, 38, 0.12),
                    inset 0 1px 2px rgba(255, 255, 255, 0.8),
                    inset 0 -1px 2px rgba(0, 0, 0, 0.02),
                    0 0 0 1px rgba(255, 255, 255, 0.3);
                transform-style: preserve-3d;
                animation: card-pro-float 6s ease-in-out infinite;
                transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
                max-width: 480px;
                margin: 0 auto;
                will-change: transform;
            }

            .card-pro-cinematic:hover {
                transform: translateY(-6px) rotateX(2deg) rotateY(2deg) scale(1.005);
                box-shadow: 
                    0 40px 100px -20px rgba(0, 0, 0, 0.25),
                    0 30px 60px -20px rgba(220, 38, 38, 0.15);
            }

            @keyframes card-pro-float {
                0%, 100% { transform: translateY(0px) rotateX(0deg) rotateY(0deg); }
                25% { transform: translateY(-5px) rotateX(1deg) rotateY(1deg); }
                50% { transform: translateY(-3px) rotateX(-0.5deg) rotateY(-0.5deg); }
                75% { transform: translateY(-4px) rotateX(0.5deg) rotateY(0.5deg); }
            }

            /* ----- HOLOGRAPHIC BORDER - PRO ----- */
            .border-holographic-pro {
                position: absolute;
                inset: -3px;
                border-radius: 2rem;
                padding: 3px;
                background: linear-gradient(
                    90deg,
                    #dc2626, #fca5a5, #f87171, #ef4444, #b91c1c, #7f1d1d, #dc2626
                );
                background-size: 300% 100%;
                animation: holographic-pro 5s linear infinite;
                -webkit-mask: 
                    linear-gradient(#fff 0 0) content-box, 
                    linear-gradient(#fff 0 0);
                -webkit-mask-composite: xor;
                mask-composite: exclude;
                opacity: 0.6;
                z-index: -1;
            }

            @keyframes holographic-pro {
                0% { background-position: 0% 50%; }
                100% { background-position: 300% 50%; }
            }

            /* ----- INNER CARD - PRO ----- */
            .card-inner-pro {
                background: rgba(255, 255, 255, 0.78);
                backdrop-filter: blur(40px) saturate(1.5);
                -webkit-backdrop-filter: blur(40px) saturate(1.5);
                border-radius: 1.75rem;
                padding: 1.5rem 1.75rem 1.75rem;
                border: 1px solid rgba(255, 255, 255, 0.6);
                position: relative;
                overflow: hidden;
                transform-style: preserve-3d;
            }

            /* ----- SHIMMER PRO ----- */
            .shimmer-pro {
                position: absolute;
                inset: 0;
                background: linear-gradient(
                    135deg,
                    transparent 0%,
                    rgba(255, 255, 255, 0.03) 20%,
                    rgba(255, 255, 255, 0.08) 40%,
                    rgba(255, 255, 255, 0.12) 50%,
                    rgba(255, 255, 255, 0.08) 60%,
                    rgba(255, 255, 255, 0.03) 80%,
                    transparent 100%
                );
                transform: translateX(-100%) rotate(28deg);
                animation: shimmer-pro 8s ease-in-out infinite;
                pointer-events: none;
                will-change: transform;
            }

            @keyframes shimmer-pro {
                0%, 100% { transform: translateX(-100%) rotate(28deg); }
                50% { transform: translateX(100%) rotate(28deg); }
            }

            /* ----- GLASS REFLECTION PRO ----- */
            .glass-pro {
                position: absolute;
                top: -50%;
                right: -20%;
                width: 50%;
                height: 200%;
                background: linear-gradient(
                    135deg,
                    transparent 0%,
                    rgba(255, 255, 255, 0.02) 30%,
                    rgba(255, 255, 255, 0.05) 50%,
                    rgba(255, 255, 255, 0.02) 70%,
                    transparent 100%
                );
                transform: rotate(25deg);
                pointer-events: none;
                animation: glass-pro 14s ease-in-out infinite;
                will-change: transform;
            }

            @keyframes glass-pro {
                0%, 100% { transform: rotate(25deg) translateX(-25%); opacity: 0.4; }
                50% { transform: rotate(25deg) translateX(25%); opacity: 0.8; }
            }

            /* ================================================
               ICON - 3D HOLOGRAPHIC PRO
               ================================================ */

            .icon-pro {
                display: flex;
                justify-content: center;
                margin-bottom: 0.5rem;
            }

            .icon-3d-pro {
                position: relative;
                display: inline-block;
                transform-style: preserve-3d;
            }

            .icon-3d-pro-ring {
                position: absolute;
                border-radius: 50%;
                border: 2px solid rgba(220, 38, 38, 0.12);
                animation: ring-pro 3.5s ease-out infinite;
                pointer-events: none;
            }

            .icon-3d-pro-ring:nth-child(1) {
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                animation-delay: 0s;
                border-color: rgba(220, 38, 38, 0.2);
            }

            .icon-3d-pro-ring:nth-child(2) {
                width: 145%;
                height: 145%;
                top: -22.5%;
                left: -22.5%;
                animation-delay: 1s;
                border-color: rgba(220, 38, 38, 0.1);
            }

            .icon-3d-pro-ring:nth-child(3) {
                width: 190%;
                height: 190%;
                top: -45%;
                left: -45%;
                animation-delay: 2s;
                border-color: rgba(220, 38, 38, 0.05);
            }

            @keyframes ring-pro {
                0% {
                    transform: scale(0.5) rotate(0deg);
                    opacity: 0.8;
                }
                100% {
                    transform: scale(1.5) rotate(180deg);
                    opacity: 0;
                }
            }

            .icon-3d-pro-core {
                position: relative;
                z-index: 2;
                padding: 0.85rem;
                background: linear-gradient(135deg, #fef2f2, #ffffff);
                border-radius: 9999px;
                border: 2.5px solid rgba(220, 38, 38, 0.15);
                box-shadow: 
                    0 20px 40px -12px rgba(220, 38, 38, 0.15),
                    0 0 0 0 rgba(220, 38, 38, 0.03),
                    inset 0 2px 4px rgba(255, 255, 255, 0.9),
                    inset 0 -2px 4px rgba(0, 0, 0, 0.02);
                transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
                display: block;
                animation: icon-3d-pro 5s ease-in-out infinite;
                will-change: transform;
                cursor: pointer;
            }

            .icon-3d-pro-core:hover {
                transform: rotateY(360deg) scale(1.1);
                box-shadow: 
                    0 30px 60px -12px rgba(220, 38, 38, 0.25),
                    0 0 0 20px rgba(220, 38, 38, 0.03);
                border-color: #dc2626;
            }

            @keyframes icon-3d-pro {
                0%, 100% { transform: rotateY(0deg) translateY(0px); }
                25% { transform: rotateY(45deg) translateY(-3px); }
                50% { transform: rotateY(90deg) translateY(-6px); }
                75% { transform: rotateY(45deg) translateY(-3px); }
            }

            .icon-3d-pro-core svg {
                width: 2rem;
                height: 2rem;
                color: #dc2626;
                filter: drop-shadow(0 6px 16px rgba(220, 38, 38, 0.2));
                animation: icon-pro-pulse 3s ease-in-out infinite;
                display: block;
                will-change: transform;
            }

            @keyframes icon-pro-pulse {
                0%, 100% { 
                    filter: drop-shadow(0 6px 16px rgba(220, 38, 38, 0.2)) scale(1);
                }
                50% { 
                    filter: drop-shadow(0 6px 30px rgba(220, 38, 38, 0.35)) scale(1.05);
                }
            }

            /* ================================================
               TITLE - TYPOGRAPHIC PRO
               ================================================ */

            .title-pro {
                font-size: 1.6rem;
                font-weight: 900;
                text-align: center;
                background: linear-gradient(135deg, #1f2937 0%, #374151 40%, #4b5563 60%, #374151 80%, #1f2937 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                margin-bottom: 0.2rem;
                position: relative;
                letter-spacing: -0.02em;
                animation: title-pro-glow 3.5s ease-in-out infinite;
                will-change: transform;
            }

            @keyframes title-pro-glow {
                0%, 100% { 
                    filter: drop-shadow(0 0 0px rgba(220, 38, 38, 0));
                    transform: scale(1);
                }
                50% { 
                    filter: drop-shadow(0 0 30px rgba(220, 38, 38, 0.05));
                    transform: scale(1.005);
                }
            }

            .title-pro .highlight-pro {
                background: linear-gradient(135deg, #dc2626, #f87171, #dc2626);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                position: relative;
                background-size: 200% 200%;
                animation: gradient-pro 4s ease-in-out infinite;
            }

            @keyframes gradient-pro {
                0%, 100% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
            }

            .title-pro .highlight-pro::after {
                content: '';
                position: absolute;
                bottom: -4px;
                left: 0;
                right: 0;
                height: 2.5px;
                background: linear-gradient(90deg, #dc2626, #fca5a5, #dc2626);
                border-radius: 9999px;
                animation: underline-pro 3s ease-in-out infinite;
                transform-origin: center;
                background-size: 200% 100%;
            }

            @keyframes underline-pro {
                0%, 100% { 
                    transform: scaleX(1); 
                    opacity: 1;
                    background-position: 0% 50%;
                }
                50% { 
                    transform: scaleX(1.3); 
                    opacity: 0.5;
                    background-position: 100% 50%;
                }
            }

            /* Subtitle Pro - Reduced */
            .subtitle-pro {
                color: #6b7280;
                font-size: 0.78rem;
                text-align: center;
                line-height: 1.6;
                max-width: 380px;
                margin: 0 auto 0.6rem;
                padding: 0 1rem;
                position: relative;
            }

            .subtitle-pro::before {
                content: '◆';
                color: #dc2626;
                font-size: 0.5rem;
                opacity: 0.2;
                position: absolute;
                top: -6px;
                left: 0;
                animation: diamond-pro 3s ease-in-out infinite;
            }

            .subtitle-pro::after {
                content: '◆';
                color: #dc2626;
                font-size: 0.5rem;
                opacity: 0.2;
                position: absolute;
                bottom: -6px;
                right: 0;
                animation: diamond-pro 3s ease-in-out infinite 1.5s;
            }

            @keyframes diamond-pro {
                0%, 100% { opacity: 0.1; transform: scale(1) rotate(0deg); }
                50% { opacity: 0.4; transform: scale(1.6) rotate(180deg); }
            }

            /* ================================================
               DIVIDER - PRO (Reduced)
               ================================================ */

            .divider-pro {
                display: flex;
                align-items: center;
                gap: 1rem;
                margin: 0.5rem 0 0.8rem;
                opacity: 0.3;
            }

            .divider-pro::before,
            .divider-pro::after {
                content: '';
                flex: 1;
                height: 1.5px;
                background: linear-gradient(90deg, transparent, #dc2626, transparent);
                animation: divider-pro 4s ease-in-out infinite;
            }

            .divider-pro .divider-dot-pro {
                width: 6px;
                height: 6px;
                border-radius: 50%;
                background: linear-gradient(135deg, #dc2626, #f87171);
                animation: dot-pro 2s ease-in-out infinite;
                box-shadow: 0 0 15px rgba(220, 38, 38, 0.12);
                flex-shrink: 0;
                position: relative;
            }

            .divider-dot-pro::before {
                content: '';
                position: absolute;
                inset: -3px;
                border-radius: 50%;
                border: 1px solid rgba(220, 38, 38, 0.08);
                animation: dot-ring-pro 2s ease-in-out infinite;
            }

            @keyframes dot-ring-pro {
                0%, 100% { transform: scale(1); opacity: 0.3; }
                50% { transform: scale(1.8); opacity: 0; }
            }

            @keyframes divider-pro {
                0%, 100% { opacity: 1; }
                50% { opacity: 0.2; }
            }

            @keyframes dot-pro {
                0%, 100% { transform: scale(1); }
                50% { transform: scale(1.6); box-shadow: 0 0 30px rgba(220, 38, 38, 0.2); }
            }

            /* ================================================
               STATUS - PREMIUM SUCCESS (Reduced)
               ================================================ */

            .status-pro {
                margin-bottom: 0.6rem;
                padding: 0.7rem 1rem;
                background: linear-gradient(135deg, #f0fdf4, #dcfce7);
                border-left: 4px solid #22c55e;
                border-radius: 0.8rem;
                box-shadow: 
                    0 8px 20px -8px rgba(34, 197, 94, 0.15),
                    inset 0 1px 0 rgba(255, 255, 255, 0.6);
                animation: status-pro-in 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
                transform-origin: center;
                position: relative;
                overflow: hidden;
                display: flex;
                align-items: center;
                gap: 0.8rem;
            }

            .status-pro::before {
                content: '';
                position: absolute;
                inset: 0;
                background: linear-gradient(90deg, transparent, rgba(34, 197, 94, 0.04), transparent);
                transform: translateX(-100%);
                animation: status-pro-shimmer 3s ease-in-out infinite;
            }

            @keyframes status-pro-shimmer {
                0%, 100% { transform: translateX(-100%); }
                50% { transform: translateX(100%); }
            }

            @keyframes status-pro-in {
                from {
                    opacity: 0;
                    transform: scale(0.85) translateY(-20px) rotateX(10deg);
                }
                to {
                    opacity: 1;
                    transform: scale(1) translateY(0) rotateX(0deg);
                }
            }

            .status-pro .status-content-pro {
                display: flex;
                align-items: center;
                gap: 0.6rem;
                position: relative;
                z-index: 1;
                flex: 1;
            }

            .status-pro .status-content-pro .check-circle-pro {
                position: relative;
                width: 2rem;
                height: 2rem;
                flex-shrink: 0;
            }

            .status-pro .status-content-pro .check-circle-pro svg {
                width: 100%;
                height: 100%;
                color: #22c55e;
                animation: check-pro 0.6s ease forwards;
            }

            @keyframes check-pro {
                0% { 
                    transform: scale(0) rotate(-45deg); 
                    opacity: 0; 
                }
                60% { 
                    transform: scale(1.3) rotate(5deg); 
                    opacity: 1; 
                }
                100% { 
                    transform: scale(1) rotate(0deg); 
                    opacity: 1; 
                }
            }

            .status-pro .status-content-pro .check-circle-pro::after {
                content: '';
                position: absolute;
                inset: -6px;
                border-radius: 50%;
                border: 2px solid rgba(34, 197, 94, 0.12);
                animation: check-ring-pro 1.8s ease-out infinite;
            }

            @keyframes check-ring-pro {
                0% {
                    transform: scale(0.8);
                    opacity: 0.8;
                }
                100% {
                    transform: scale(1.6);
                    opacity: 0;
                }
            }

            .status-pro .status-content-pro .text-content-pro {
                flex: 1;
            }

            .status-pro .status-content-pro .text-content-pro .title-success-pro {
                font-weight: 700;
                color: #15803d;
                font-size: 0.85rem;
                display: block;
                animation: slide-up-pro 0.5s ease 0.2s forwards;
                opacity: 0;
                transform: translateY(8px);
            }

            .status-pro .status-content-pro .text-content-pro .subtitle-success-pro {
                font-weight: 400;
                color: #166534;
                font-size: 0.7rem;
                display: block;
                opacity: 0.8;
                animation: slide-up-pro 0.5s ease 0.4s forwards;
                opacity: 0;
                transform: translateY(8px);
            }

            @keyframes slide-up-pro {
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            /* Success particles - Pro */
            .success-particles-pro {
                position: absolute;
                inset: 0;
                pointer-events: none;
                overflow: hidden;
                z-index: 0;
            }

            .success-particles-pro span {
                position: absolute;
                width: 5px;
                height: 5px;
                border-radius: 50%;
                animation: particle-float-pro 4s ease-in-out infinite;
            }

            .success-particles-pro span:nth-child(1) {
                background: #22c55e;
                left: 8%;
                animation-delay: 0s;
                animation-duration: 3s;
            }
            .success-particles-pro span:nth-child(2) {
                background: #fbbf24;
                left: 22%;
                animation-delay: 0.4s;
                animation-duration: 3.5s;
            }
            .success-particles-pro span:nth-child(3) {
                background: #f472b6;
                left: 36%;
                animation-delay: 0.8s;
                animation-duration: 3.2s;
            }
            .success-particles-pro span:nth-child(4) {
                background: #60a5fa;
                left: 50%;
                animation-delay: 1.2s;
                animation-duration: 3.8s;
            }
            .success-particles-pro span:nth-child(5) {
                background: #34d399;
                left: 64%;
                animation-delay: 1.6s;
                animation-duration: 3.4s;
            }
            .success-particles-pro span:nth-child(6) {
                background: #f87171;
                left: 78%;
                animation-delay: 2s;
                animation-duration: 3.6s;
            }
            .success-particles-pro span:nth-child(7) {
                background: #a78bfa;
                left: 92%;
                animation-delay: 2.4s;
                animation-duration: 3.3s;
            }

            @keyframes particle-float-pro {
                0% {
                    transform: translateY(-15px) scale(0) rotate(0deg);
                    opacity: 0;
                }
                20% {
                    transform: translateY(0px) scale(1.2) rotate(180deg);
                    opacity: 1;
                }
                80% {
                    transform: translateY(12px) scale(1) rotate(360deg);
                    opacity: 1;
                }
                100% {
                    transform: translateY(30px) scale(0) rotate(540deg);
                    opacity: 0;
                }
            }

            /* ================================================
               INPUT - PREMIUM WITH GLOW (Reduced)
               ================================================ */

            .input-pro-group {
                position: relative;
                margin-bottom: 0.8rem;
            }

            .input-pro-group label {
                display: block;
                font-size: 0.78rem;
                font-weight: 700;
                color: #374151;
                margin-bottom: 0.25rem;
                transition: all 0.3s ease;
                letter-spacing: 0.02em;
                cursor: pointer;
            }

            .input-pro-group label:hover {
                color: #dc2626;
                transform: translateX(3px);
            }

            .input-pro-group:focus-within label {
                color: #dc2626;
                transform: translateX(4px) scale(1.02);
            }

            .input-pro-wrapper {
                position: relative;
                transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
                border-radius: 1rem;
                display: flex;
                align-items: center;
                background: rgba(255, 255, 255, 0.85);
                border: 2px solid #e5e7eb;
                backdrop-filter: blur(8px);
                -webkit-backdrop-filter: blur(8px);
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.02);
                overflow: hidden;
            }

            .input-pro-wrapper::before {
                content: '';
                position: absolute;
                inset: -2px;
                border-radius: 1rem;
                padding: 2px;
                background: conic-gradient(
                    from var(--angle, 0deg),
                    #dc2626,
                    #fca5a5,
                    #f87171,
                    #dc2626
                );
                -webkit-mask: 
                    linear-gradient(#fff 0 0) content-box, 
                    linear-gradient(#fff 0 0);
                -webkit-mask-composite: xor;
                mask-composite: exclude;
                animation: border-rotate-pro 3.5s linear infinite;
                opacity: 0;
                transition: opacity 0.3s ease;
                will-change: transform;
                z-index: 0;
            }

            .input-pro-wrapper:focus-within::before {
                opacity: 1;
            }

            @keyframes border-rotate-pro {
                from { --angle: 0deg; }
                to { --angle: 360deg; }
            }

            @property --angle {
                syntax: '<angle>';
                initial-value: 0deg;
                inherits: false;
            }

            .input-pro-wrapper .input-icon-pro {
                position: absolute;
                left: 0;
                top: 50%;
                transform: translateY(-50%);
                padding-left: 1rem;
                display: flex;
                align-items: center;
                justify-content: center;
                pointer-events: none;
                transition: all 0.3s ease;
                z-index: 2;
                width: 2.5rem;
                height: 100%;
            }

            .input-pro-wrapper .input-icon-pro svg {
                height: 1rem;
                width: 1rem;
                color: #9ca3af;
                transition: all 0.3s ease;
            }

            .input-pro-wrapper:focus-within .input-icon-pro svg {
                color: #dc2626;
                transform: scale(1.15) rotate(-8deg);
                filter: drop-shadow(0 0 12px rgba(220, 38, 38, 0.12));
            }

            .input-pro-wrapper input {
                width: 100%;
                padding: 0.6rem 1rem 0.6rem 2.75rem;
                background: transparent;
                border: none;
                border-radius: 1rem;
                font-size: 0.85rem;
                transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
                color: #1f2937;
                position: relative;
                z-index: 1;
                outline: none;
            }

            .input-pro-wrapper input:hover {
                transform: translateY(-1px);
            }

            .input-pro-wrapper input:focus {
                transform: translateY(-2px) scale(1.005);
            }

            .input-pro-wrapper input::placeholder {
                color: #9ca3af;
                font-weight: 300;
                font-size: 0.82rem;
                letter-spacing: 0.01em;
            }

            /* Input glow dot - Pro */
            .input-glow-dot-pro {
                position: absolute;
                right: 1rem;
                top: 50%;
                transform: translateY(-50%);
                width: 6px;
                height: 6px;
                border-radius: 50%;
                background: #e5e7eb;
                transition: all 0.4s ease;
                z-index: 2;
                box-shadow: 0 0 0 0 rgba(220, 38, 38, 0);
            }

            .input-pro-wrapper:focus-within .input-glow-dot-pro {
                background: #dc2626;
                box-shadow: 0 0 25px rgba(220, 38, 38, 0.25), 0 0 50px rgba(220, 38, 38, 0.06);
                animation: dot-glow-pro 1.8s ease-in-out infinite;
            }

            @keyframes dot-glow-pro {
                0%, 100% { box-shadow: 0 0 15px rgba(220, 38, 38, 0.15); }
                50% { box-shadow: 0 0 35px rgba(220, 38, 38, 0.3), 0 0 60px rgba(220, 38, 38, 0.08); }
            }

            .input-pro-wrapper:hover {
                border-color: #fca5a5;
                box-shadow: 0 8px 20px -8px rgba(220, 38, 38, 0.08);
                transform: translateY(-2px);
                background: white;
            }

            .input-pro-wrapper:focus-within {
                border-color: #dc2626;
                box-shadow: 
                    0 0 0 6px rgba(220, 38, 38, 0.04),
                    0 12px 30px -12px rgba(220, 38, 38, 0.12);
                transform: translateY(-3px) scale(1.005);
                background: white;
            }

            /* ================================================
               BUTTONS - CINEMATIC PRO (WIDER)
               ================================================ */

            .btn-group-pro {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-top: 0.8rem;
                gap: 1rem;
                flex-wrap: wrap;
            }

            /* Back Button - Wider */
            .btn-back-pro {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 0.5rem;
                color: #6b7280;
                font-weight: 700;
                font-size: 0.8rem;
                transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
                text-decoration: none;
                padding: 0.55rem 1.5rem;
                border-radius: 0.8rem;
                background: rgba(0, 0, 0, 0.02);
                border: 1px solid transparent;
                position: relative;
                overflow: hidden;
                letter-spacing: 0.02em;
                flex: 1;
                min-width: 120px;
            }

            .btn-back-pro::before {
                content: '';
                position: absolute;
                inset: 0;
                background: linear-gradient(135deg, rgba(220, 38, 38, 0.04), transparent);
                opacity: 0;
                transition: opacity 0.3s ease;
            }

            .btn-back-pro::after {
                content: '←';
                position: absolute;
                left: -15px;
                opacity: 0;
                transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
                font-size: 1.1rem;
                color: #dc2626;
            }

            .btn-back-pro:hover {
                color: #dc2626;
                background: rgba(220, 38, 38, 0.05);
                transform: translateX(-5px) scale(1.02);
                border-color: rgba(220, 38, 38, 0.06);
            }

            .btn-back-pro:hover::after {
                opacity: 1;
                left: -25px;
            }

            .btn-back-pro svg {
                width: 1rem;
                height: 1rem;
                transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            }

            .btn-back-pro:hover svg {
                transform: translateX(-5px) scale(1.05);
            }

            /* Submit Button - Wider & Enhanced */
            .btn-submit-pro {
                position: relative;
                overflow: hidden;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 0.6rem 2rem;
                background: linear-gradient(135deg, #dc2626, #b91c1c);
                color: white;
                font-weight: 800;
                font-size: 0.82rem;
                border-radius: 1rem;
                border: none;
                cursor: pointer;
                transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
                box-shadow: 
                    0 10px 35px rgba(220, 38, 38, 0.25),
                    inset 0 1px 0 rgba(255, 255, 255, 0.15);
                gap: 0.8rem;
                letter-spacing: 0.05em;
                text-transform: uppercase;
                transform-style: preserve-3d;
                z-index: 1;
                flex: 1;
                min-width: 140px;
                will-change: transform;
            }

            .btn-submit-pro::before {
                content: '';
                position: absolute;
                inset: -2px;
                border-radius: 1rem;
                padding: 2px;
                background: conic-gradient(
                    from 0deg,
                    transparent,
                    rgba(255, 255, 255, 0.35),
                    transparent,
                    rgba(255, 255, 255, 0.15),
                    transparent
                );
                -webkit-mask: 
                    linear-gradient(#fff 0 0) content-box, 
                    linear-gradient(#fff 0 0);
                -webkit-mask-composite: xor;
                mask-composite: exclude;
                animation: border-spin-pro 3.5s linear infinite;
                opacity: 0;
                transition: opacity 0.3s ease;
                will-change: transform;
            }

            .btn-submit-pro:hover::before {
                opacity: 1;
            }

            @keyframes border-spin-pro {
                from { transform: rotate(0deg); }
                to { transform: rotate(360deg); }
            }

            .btn-submit-pro::after {
                content: '';
                position: absolute;
                inset: 0;
                border-radius: 1rem;
                background: radial-gradient(circle at var(--click-x, 50%) var(--click-y, 50%), rgba(255, 255, 255, 0.12), transparent 60%);
                opacity: 0;
                transition: opacity 0.5s ease;
                pointer-events: none;
            }

            .btn-submit-pro:hover::after {
                opacity: 1;
            }

            .btn-submit-pro:hover {
                transform: translateY(-3px) scale(1.03) rotateX(2deg);
                box-shadow: 
                    0 18px 50px rgba(220, 38, 38, 0.35),
                    inset 0 1px 0 rgba(255, 255, 255, 0.2);
                background: linear-gradient(135deg, #b91c1c, #991b1b);
            }

            .btn-submit-pro:active {
                transform: translateY(0) scale(0.97);
            }

            .btn-submit-pro .btn-content-pro {
                display: flex;
                align-items: center;
                gap: 0.8rem;
                position: relative;
                z-index: 2;
            }

            /* Default state - Send icon */
            .btn-submit-pro .btn-content-pro .send-icon-pro {
                width: 1.1rem;
                height: 1.1rem;
                animation: rocket-pro 2.5s ease-in-out infinite;
                will-change: transform;
            }

            @keyframes rocket-pro {
                0%, 100% { 
                    transform: translateX(0) rotate(0deg) scale(1);
                }
                25% { 
                    transform: translateX(6px) rotate(-6deg) scale(1.05);
                }
                75% { 
                    transform: translateX(-3px) rotate(6deg) scale(0.95);
                }
            }

            /* Sending state - Pro Loader */
            .btn-submit-pro .btn-loader-pro {
                display: none;
                width: 1.25rem;
                height: 1.25rem;
                position: relative;
            }

            .btn-submit-pro .btn-loader-pro .loader-ring-pro {
                position: absolute;
                inset: 0;
                border-radius: 50%;
                border: 2px solid transparent;
                border-top-color: white;
                animation: spin-pro 0.7s linear infinite;
            }

            .btn-submit-pro .btn-loader-pro .loader-ring-pro:nth-child(2) {
                animation: spin-pro 0.7s linear infinite reverse;
                border-top-color: rgba(255, 255, 255, 0.25);
                border-right-color: rgba(255, 255, 255, 0.25);
                inset: -3px;
            }

            .btn-submit-pro .btn-loader-pro .loader-ring-pro:nth-child(3) {
                animation: spin-pro 0.5s linear infinite;
                border-top-color: rgba(255, 255, 255, 0.08);
                border-left-color: rgba(255, 255, 255, 0.08);
                inset: -6px;
            }

            @keyframes spin-pro {
                to { transform: rotate(360deg); }
            }

            .btn-submit-pro .sending-text-pro {
                display: none;
                font-size: 0.7rem;
                letter-spacing: 0.08em;
                animation: sending-pro-pulse 1s ease-in-out infinite;
            }

            @keyframes sending-pro-pulse {
                0%, 100% { opacity: 1; }
                50% { opacity: 0.3; }
            }

            /* Sending state */
            .btn-submit-pro.sending .btn-content-pro .send-icon-pro {
                display: none;
            }
            
            .btn-submit-pro.sending .btn-loader-pro {
                display: block;
            }
            
            .btn-submit-pro.sending .sending-text-pro {
                display: inline;
            }

            .btn-submit-pro.sending .btn-text-pro {
                display: none;
            }

            .btn-submit-pro.sending {
                background: linear-gradient(135deg, #b91c1c, #7f1d1d);
                animation: sending-pro-glow 1.2s ease-in-out infinite;
            }

            @keyframes sending-pro-glow {
                0%, 100% { 
                    box-shadow: 0 8px 30px rgba(220, 38, 38, 0.25);
                }
                50% { 
                    box-shadow: 0 8px 50px rgba(220, 38, 38, 0.5), 0 0 80px rgba(220, 38, 38, 0.12);
                }
            }

            /* Success state */
            .btn-submit-pro.success {
                background: linear-gradient(135deg, #22c55e, #16a34a);
                animation: success-pro-pop 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
                box-shadow: 0 8px 30px rgba(34, 197, 94, 0.25);
            }

            .btn-submit-pro.success:hover {
                box-shadow: 0 15px 45px rgba(34, 197, 94, 0.35);
                background: linear-gradient(135deg, #16a34a, #15803d);
            }

            @keyframes success-pro-pop {
                0% { transform: scale(1); }
                40% { transform: scale(1.1); }
                70% { transform: scale(0.96); }
                100% { transform: scale(1); }
            }

            .btn-submit-pro.success .btn-content-pro .send-icon-pro {
                display: none;
            }
            
            .btn-submit-pro.success .btn-content-pro .btn-loader-pro {
                display: none;
            }
            
            .btn-submit-pro.success .btn-content-pro .sending-text-pro {
                display: none;
            }

            .btn-submit-pro.success .btn-content-pro .success-icon-pro {
                display: block !important;
                width: 1.1rem;
                height: 1.1rem;
                animation: success-check-pro 0.5s ease forwards;
            }

            .btn-submit-pro .btn-content-pro .success-icon-pro {
                display: none;
            }

            @keyframes success-check-pro {
                0% { transform: scale(0) rotate(-45deg); opacity: 0; }
                60% { transform: scale(1.3) rotate(5deg); opacity: 1; }
                100% { transform: scale(1) rotate(0deg); opacity: 1; }
            }

            .btn-submit-pro .success-text-pro {
                display: none;
                font-size: 0.7rem;
                letter-spacing: 0.04em;
            }

            .btn-submit-pro.success .success-text-pro {
                display: inline;
            }

            .btn-submit-pro.success .btn-text-pro {
                display: none;
            }

            /* Button shine pro */
            .btn-shine-pro {
                position: absolute;
                inset: 0;
                background: linear-gradient(
                    135deg,
                    transparent 10%,
                    rgba(255, 255, 255, 0.08) 30%,
                    rgba(255, 255, 255, 0.15) 50%,
                    rgba(255, 255, 255, 0.08) 70%,
                    transparent 90%
                );
                transform: translateX(-100%) rotate(28deg);
                transition: transform 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
                pointer-events: none;
                z-index: 1;
                will-change: transform;
            }

            .btn-submit-pro:hover .btn-shine-pro {
                transform: translateX(100%) rotate(28deg);
            }

            /* ================================================
               VALIDATION ERRORS - PRO (Reduced)
               ================================================ */

            .validation-errors-pro {
                margin-bottom: 0.6rem;
                padding: 0.6rem 1rem;
                background: linear-gradient(135deg, #fef2f2, #fee2e2);
                border-left: 4px solid #dc2626;
                border-radius: 0.8rem;
                box-shadow: 
                    0 8px 20px -8px rgba(220, 38, 38, 0.08),
                    inset 0 1px 0 rgba(255, 255, 255, 0.6);
                animation: status-pro-in 0.4s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
                position: relative;
                overflow: hidden;
            }

            .validation-errors-pro::before {
                content: '';
                position: absolute;
                inset: 0;
                background: linear-gradient(90deg, transparent, rgba(220, 38, 38, 0.03), transparent);
                transform: translateX(-100%);
                animation: error-pro-shimmer 2.5s ease-in-out infinite;
            }

            @keyframes error-pro-shimmer {
                0%, 100% { transform: translateX(-100%); }
                50% { transform: translateX(100%); }
            }

            .validation-errors-pro ul {
                list-style: none;
                padding: 0;
                margin: 0;
                position: relative;
                z-index: 1;
            }

            .validation-errors-pro ul li {
                color: #991b1b;
                font-weight: 600;
                font-size: 0.78rem;
                padding: 0.2rem 0;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .validation-errors-pro ul li::before {
                content: '✕';
                color: #dc2626;
                font-weight: 900;
                font-size: 0.6rem;
                background: rgba(220, 38, 38, 0.06);
                padding: 0.1rem 0.4rem;
                border-radius: 0.5rem;
                flex-shrink: 0;
                animation: error-pro-bounce 2s ease-in-out infinite;
            }

            @keyframes error-pro-bounce {
                0%, 100% { transform: scale(1); }
                50% { transform: scale(1.08); }
            }

            /* ================================================
               RESPONSIVE - PRO
               ================================================ */

            @media (max-width: 768px) {
                .card-inner-pro {
                    padding: 1.25rem 1.25rem 1.5rem;
                }

                .title-pro {
                    font-size: 1.4rem;
                }

                .subtitle-pro {
                    font-size: 0.72rem;
                }

                .btn-group-pro {
                    flex-direction: column-reverse;
                    align-items: stretch;
                    gap: 0.5rem;
                }

                .btn-back-pro {
                    justify-content: center;
                    min-width: 100%;
                }

                .btn-submit-pro {
                    justify-content: center;
                    padding: 0.55rem 1.5rem;
                    font-size: 0.75rem;
                    min-width: 100%;
                }

                .icon-3d-pro-core svg {
                    width: 1.8rem;
                    height: 1.8rem;
                }

                .icon-3d-pro-core {
                    padding: 0.7rem;
                }

                .glow-orb-pro-1,
                .glow-orb-pro-2 {
                    width: 200px;
                    height: 200px;
                }

                .card-pro-cinematic {
                    max-width: 100%;
                    margin: 0 0.75rem;
                }

                .subtitle-pro::before,
                .subtitle-pro::after {
                    display: none;
                }

                .input-pro-wrapper .input-icon-pro {
                    padding-left: 0.75rem;
                    width: 2.25rem;
                }

                .input-pro-wrapper input {
                    padding: 0.5rem 0.75rem 0.5rem 2.25rem;
                    font-size: 0.8rem;
                }

                .status-pro {
                    padding: 0.6rem 0.75rem;
                }

                .status-pro .status-content-pro .check-circle-pro {
                    width: 1.75rem;
                    height: 1.75rem;
                }

                .status-pro .status-content-pro .text-content-pro .title-success-pro {
                    font-size: 0.8rem;
                }

                .status-pro .status-content-pro .text-content-pro .subtitle-success-pro {
                    font-size: 0.65rem;
                }
            }

            @media (max-width: 480px) {
                .card-inner-pro {
                    padding: 1rem 0.75rem 1.25rem;
                }

                .title-pro {
                    font-size: 1.2rem;
                }

                .subtitle-pro {
                    font-size: 0.68rem;
                    padding: 0 0.5rem;
                }

                .input-pro-wrapper input {
                    padding: 0.45rem 0.5rem 0.45rem 2rem;
                    font-size: 0.75rem;
                }

                .input-pro-wrapper .input-icon-pro {
                    padding-left: 0.5rem;
                    width: 1.75rem;
                }

                .input-pro-wrapper .input-icon-pro svg {
                    height: 0.8rem;
                    width: 0.8rem;
                }

                .btn-submit-pro {
                    font-size: 0.68rem;
                    padding: 0.45rem 1rem;
                    min-width: 100%;
                }

                .btn-back-pro {
                    font-size: 0.68rem;
                    padding: 0.4rem 0.75rem;
                    min-width: 100%;
                }

                .status-pro {
                    padding: 0.5rem 0.6rem;
                }

                .validation-errors-pro {
                    padding: 0.5rem 0.6rem;
                }

                .divider-pro {
                    margin: 0.4rem 0 0.6rem;
                    gap: 0.5rem;
                }

                .icon-3d-pro-core svg {
                    width: 1.5rem;
                    height: 1.5rem;
                }

                .icon-3d-pro-core {
                    padding: 0.6rem;
                }

                .success-particles-pro span {
                    width: 4px;
                    height: 4px;
                }

                .input-glow-dot-pro {
                    width: 5px;
                    height: 5px;
                    right: 0.6rem;
                }
            }

            /* ================================================
               ENTRANCE ANIMATIONS - PRO
               ================================================ */

            @keyframes fade-up-pro {
                from {
                    opacity: 0;
                    transform: translateY(25px) scale(0.95) rotateX(5deg);
                }
                to {
                    opacity: 1;
                    transform: translateY(0) scale(1) rotateX(0deg);
                }
            }

            .animate-fade-up-pro {
                animation: fade-up-pro 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
                opacity: 0;
                will-change: transform;
            }

            .animate-fade-up-p1 { animation-delay: 0.04s; }
            .animate-fade-up-p2 { animation-delay: 0.08s; }
            .animate-fade-up-p3 { animation-delay: 0.12s; }
            .animate-fade-up-p4 { animation-delay: 0.16s; }
            .animate-fade-up-p5 { animation-delay: 0.20s; }
            .animate-fade-up-p6 { animation-delay: 0.24s; }
            .animate-fade-up-p7 { animation-delay: 0.28s; }
            .animate-fade-up-p8 { animation-delay: 0.32s; }
        </style>

        <!-- ================================================
        MAIN CONTENT - PROFESSIONAL ULTRA
        ================================================ -->

        <div class="forgot-password-wrapper">
            <!-- Dynamic Background -->
            <div class="dynamic-bg-pro"></div>
            
            <!-- Glow Orbs -->
            <div class="glow-orb-pro glow-orb-pro-1"></div>
            <div class="glow-orb-pro glow-orb-pro-2"></div>
            <div class="glow-orb-pro glow-orb-pro-3"></div>

            <!-- Main Card -->
            <div class="card-pro-cinematic animate-fade-up-pro animate-fade-up-p1">
                <div class="border-holographic-pro"></div>
                
                <div class="card-inner-pro">
                    <div class="shimmer-pro"></div>
                    <div class="glass-pro"></div>
                    
                    <!-- ===== ICON 3D PRO ===== -->
                    <div class="icon-pro animate-fade-up-pro animate-fade-up-p2">
                        <div class="icon-3d-pro">
                            <div class="icon-3d-pro-ring"></div>
                            <div class="icon-3d-pro-ring"></div>
                            <div class="icon-3d-pro-ring"></div>
                            <div class="icon-3d-pro-core">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- ===== TITLE ===== -->
                    <h2 class="title-pro animate-fade-up-pro animate-fade-up-p3">
                        Reset <span class="highlight-pro">Password</span>
                    </h2>
                    
                    <p class="subtitle-pro animate-fade-up-pro animate-fade-up-p4">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </p>

                    <!-- ===== DIVIDER ===== -->
                    <div class="divider-pro animate-fade-up-pro animate-fade-up-p4">
                        <span class="divider-dot-pro"></span>
                    </div>

                    <!-- ===== STATUS MESSAGE ===== -->
                    @session('status')
                        <div class="status-pro animate-fade-up-pro animate-fade-up-p4">
                            <div class="success-particles-pro">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <div class="status-content-pro">
                                <div class="check-circle-pro">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" 
                                              d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <div class="text-content-pro">
                                    <span class="title-success-pro">Password Reset Link Sent Successfully!</span>
                                    <span class="subtitle-success-pro">{{ $value }}</span>
                                </div>
                            </div>
                        </div>
                    @endsession

                    <!-- ===== VALIDATION ERRORS ===== -->
                    @if ($errors->any())
                        <div class="validation-errors-pro animate-fade-up-pro animate-fade-up-p4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- ===== FORM ===== -->
                    <form method="POST" action="{{ route('password.email') }}" id="resetFormPro">
                        @csrf

                        <!-- ===== EMAIL INPUT ===== -->
                        <div class="input-pro-group animate-fade-up-pro animate-fade-up-p5">
                            <x-label for="email" value="{{ __('Email Address') }}" />
                            <div class="input-pro-wrapper">
                                <div class="input-icon-pro">
                                    <svg fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                    </svg>
                                </div>
                                <x-input 
                                    id="email" 
                                    type="email" 
                                    name="email" 
                                    :value="old('email')" 
                                    required 
                                    autofocus 
                                    autocomplete="username"
                                    placeholder="Enter your email address"
                                />
                                <div class="input-glow-dot-pro"></div>
                            </div>
                        </div>

                        <!-- ===== BUTTONS - WIDER ===== -->
                        <div class="btn-group-pro animate-fade-up-pro animate-fade-up-p7">
                            <a href="{{ route('login') }}" class="btn-back-pro">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                </svg>
                                Back to Login
                            </a>
                            
                            <button type="submit" class="btn-submit-pro" id="submitBtnPro">
                                <span class="btn-shine-pro"></span>
                                <span class="btn-content-pro">
                                    <!-- Send Icon -->
                                    <svg class="send-icon-pro" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    <!-- Pro Loader -->
                                    <span class="btn-loader-pro">
                                        <span class="loader-ring-pro"></span>
                                        <span class="loader-ring-pro"></span>
                                        <span class="loader-ring-pro"></span>
                                    </span>
                                    <!-- Success Icon -->
                                    <svg class="success-icon-pro" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" 
                                              d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span class="btn-text-pro">Send Reset Link</span>
                                    <span class="sending-text-pro">SENDING...</span>
                                    <span class="success-text-pro">✓ SENT!</span>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ================================================
        JAVASCRIPT - PRO INTERACTIONS
        ================================================ -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // ===== Form Submission =====
                const submitBtn = document.getElementById('submitBtnPro');
                const form = document.getElementById('resetFormPro');
                
                if (submitBtn && form) {
                    form.addEventListener('submit', function(e) {
                        if (this.checkValidity()) {
                            e.preventDefault();
                            
                            submitBtn.classList.remove('success');
                            submitBtn.classList.add('sending');
                            submitBtn.disabled = true;
                            
                            const formData = new FormData(this);
                            
                            setTimeout(() => {
                                const xhr = new XMLHttpRequest();
                                xhr.open('POST', this.action);
                                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                                xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('input[name="_token"]').value);
                                
                                xhr.onload = function() {
                                    if (xhr.status === 200 || xhr.status === 302) {
                                        submitBtn.classList.remove('sending');
                                        submitBtn.classList.add('success');
                                        submitBtn.disabled = false;
                                        
                                        // Launch full confetti on success
                                        launchConfettiPro();
                                        
                                        setTimeout(() => {
                                            window.location.reload();
                                        }, 1500);
                                    } else {
                                        submitBtn.classList.remove('sending', 'success');
                                        submitBtn.disabled = false;
                                    }
                                };
                                
                                xhr.onerror = function() {
                                    submitBtn.classList.remove('sending', 'success');
                                    submitBtn.disabled = false;
                                    alert('An error occurred. Please try again.');
                                };
                                
                                xhr.send(formData);
                            }, 1800);
                        }
                    });
                }

                // ===== Full Screen Confetti =====
                function launchConfettiPro() {
                    const colors = ['#dc2626', '#fca5a5', '#f87171', '#ef4444', '#b91c1c', '#fbbf24', '#34d399', '#60a5fa', '#f472b6', '#a78bfa'];
                    for (let i = 0; i < 120; i++) {
                        const confetti = document.createElement('div');
                        confetti.style.cssText = `
                            position: fixed;
                            width: ${Math.random() * 10 + 4}px;
                            height: ${Math.random() * 10 + 4}px;
                            background: ${colors[Math.floor(Math.random() * colors.length)]};
                            left: ${Math.random() * 100}%;
                            top: -10px;
                            border-radius: ${Math.random() > 0.5 ? '50%' : '2px'};
                            animation: confetti-pro-fall ${Math.random() * 2.5 + 2}s linear forwards;
                            animation-delay: ${Math.random() * 0.6}s;
                            transform: rotate(${Math.random() * 360}deg);
                            z-index: 9999;
                            pointer-events: none;
                            box-shadow: 0 2px 4px rgba(0,0,0,0.08);
                        `;
                        document.body.appendChild(confetti);
                        setTimeout(() => confetti.remove(), 4500);
                    }
                }

                // ===== Magnetic Button Effect =====
                const btn = document.querySelector('.btn-submit-pro');
                if (btn) {
                    btn.addEventListener('mousemove', function(e) {
                        const rect = this.getBoundingClientRect();
                        const x = e.clientX - rect.left - rect.width / 2;
                        const y = e.clientY - rect.top - rect.height / 2;
                        this.style.transform = `translate(${x * 0.06}px, ${y * 0.06}px)`;
                    });
                    btn.addEventListener('mouseleave', function() {
                        this.style.transform = 'translate(0, 0)';
                    });
                }

                // ===== 3D Tilt Effect =====
                const card = document.querySelector('.card-pro-cinematic');
                if (card && window.innerWidth > 768) {
                    card.addEventListener('mousemove', function(e) {
                        const rect = this.getBoundingClientRect();
                        const x = (e.clientX - rect.left) / rect.width - 0.5;
                        const y = (e.clientY - rect.top) / rect.height - 0.5;
                        this.style.transform = `
                            perspective(1000px)
                            rotateY(${x * 10}deg)
                            rotateX(${-y * 10}deg)
                            translateZ(10px)
                            scale(1.005)
                        `;
                    });
                    card.addEventListener('mouseleave', function() {
                        this.style.transform = 'perspective(1000px) rotateY(0deg) rotateX(0deg) translateZ(0px) scale(1)';
                    });
                }

                // ===== Mouse Tracking for Input =====
                const inputWrappers = document.querySelectorAll('.input-pro-wrapper');
                inputWrappers.forEach(wrapper => {
                    wrapper.addEventListener('mousemove', function(e) {
                        const rect = this.getBoundingClientRect();
                        const x = ((e.clientX - rect.left) / rect.width) * 100;
                        const y = ((e.clientY - rect.top) / rect.height) * 100;
                        this.style.setProperty('--mouse-x', x + '%');
                        this.style.setProperty('--mouse-y', y + '%');
                    });
                });

                // ===== Ripple Effect =====
                const proBtn = document.querySelector('.btn-submit-pro');
                if (proBtn) {
                    proBtn.addEventListener('mousemove', function(e) {
                        const rect = this.getBoundingClientRect();
                        const x = ((e.clientX - rect.left) / rect.width) * 100;
                        const y = ((e.clientY - rect.top) / rect.height) * 100;
                        this.style.setProperty('--click-x', x + '%');
                        this.style.setProperty('--click-y', y + '%');
                    });
                }

                // ===== Input Focus Animation =====
                const inputs = document.querySelectorAll('.input-pro-wrapper input');
                inputs.forEach(input => {
                    input.addEventListener('focus', function() {
                        this.closest('.input-pro-wrapper').style.transform = 'scale(1.005)';
                    });
                    input.addEventListener('blur', function() {
                        this.closest('.input-pro-wrapper').style.transform = 'scale(1)';
                    });
                });

                console.log('🔥 PERFECTLY BALANCED PROFESSIONAL UI loaded!');
                console.log('✨ Features:');
                console.log('  📏 Reduced height by 30% | 📐 Wider buttons');
                console.log('  🎯 3D Holographic Border | 🌈 Glass Reflection');
                console.log('  🧲 Magnetic Button | 🎮 3D Tilt Effect');
                console.log('  ✨ Shimmer Layers | ⚡ Animated Input Glow');
                console.log('  💫 Particle Effects | 🎊 Full Confetti Burst');
            });
        </script>
    </x-authentication-card>
</x-guest-layout>