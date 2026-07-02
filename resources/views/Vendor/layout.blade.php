<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Rentify - Owner Panel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700;800&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('Vendor/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Vendor/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('Vendor/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('Vendor/css/style.css') }}" rel="stylesheet">

    <!--
        Rentify Theme Overrides — Red & White
        NOTE ON SAFETY: this block intentionally never sets position, display,
        overflow, width or transform on structural containers (.sidebar, .content,
        .navbar, .navbar-nav). Those properties belong to Vendor/css/style.css and
        changing them here is what breaks the fixed sidebar / sticky navbar.
        Everything below only touches color, background, border, shadow, and
        hover/active states on leaf elements (buttons, links, icons, cards), plus
        self-contained decorative elements (the logo badge, ripples, orbit dots)
        that are absolutely positioned inside their own small wrapper and never
        affect surrounding layout.
    -->
    <style>
        :root{
            --rf-red: #FF4757;
            --rf-red-light: #FF6B7A;
            --rf-red-dark: #E63950;
            --rf-gold: #FFC24B;
            --rf-white: #FFFFFF;
            --rf-off: #FFF8F8;
            --rf-ink: #2E2226;
            --rf-line: #FBE2E5;
            --rf-shadow: 0 6px 20px rgba(255, 71, 87, 0.14);
        }

        body{
            background: var(--rf-off);
            font-family: 'Heebo', sans-serif;
            color: var(--rf-ink);
        }

        /* ===== Spinner ===== */
        #spinner{ background: var(--rf-white); }
        #spinner .spinner-border{ color: var(--rf-red) !important; }

        /* ===== Sidebar (background/border only, no position/overflow/layout changes) ===== */
        .sidebar{
            background: var(--rf-white);
            background-image:
                radial-gradient(circle at 90% 0%, rgba(255,107,122,.14) 0%, transparent 45%),
                radial-gradient(circle at 0% 85%, rgba(255,71,87,.10) 0%, transparent 40%);
            background-size: 160% 160%;
            border-right: 1px solid var(--rf-line);
            animation: rf-aurora 14s ease-in-out infinite;
        }
        .sidebar .navbar{ background: transparent !important; }

        @keyframes rf-aurora{
            0%,100%{ background-position: 0% 0%, 0% 100%; }
            50%{ background-position: 15% 10%, 10% 85%; }
        }

        /* ============================================================
           Rentify animated logo v3 — self-contained badge, does not
           affect surrounding layout (absolutely positioned children
           live entirely inside the 52x52 badge box, or the small
           overflow-visible halo around it). A LOT more going on:
           morphing blob backdrop, orbiting spark-dust, rising chimney
           smoke, flickering windows, a key that actually flies home
           into the lock on hover, and a shimmering text treatment.
           ============================================================ */
        .rf-logo-link{
            display:flex; align-items:center; gap:.85rem; text-decoration:none;
            padding: 16px 0 8px;
        }
        .rf-logo-badge{
            position: relative;
            width: 56px; height: 56px; flex-shrink:0;
            display:flex; align-items:center; justify-content:center;
            transition: transform .35s cubic-bezier(.34,1.56,.64,1);
        }

        /* Layer 0: morphing organic blob backdrop — a second gradient
           shape that slowly changes its corner radii and rotates,
           giving the badge a "living" feel behind the crisp tile */
        .rf-logo-blob{
            position:absolute; inset:-6px;
            background: linear-gradient(140deg, var(--rf-red-light), var(--rf-gold) 120%);
            opacity:.55;
            z-index:0;
            filter: blur(.5px);
            animation: rf-blob-morph 6s ease-in-out infinite;
        }

        /* Layer 1: soft ambient glow that breathes behind everything */
        .rf-logo-halo{
            position:absolute; inset:-14px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255,71,87,.38) 0%, transparent 70%);
            filter: blur(2px);
            z-index: 0;
            animation: rf-halo-breathe 3.2s ease-in-out infinite;
        }

        /* Layer 1.5: drifting spark-dust — six tiny motes on independent
           orbits & timings around the badge, twinkling like fireflies */
        .rf-logo-sparkles{ position:absolute; inset:-20px; z-index:2; pointer-events:none; }
        .rf-logo-sparkles span{
            position:absolute; width:3px; height:3px; border-radius:50%;
            background: var(--rf-gold);
            box-shadow: 0 0 5px 1px rgba(255,194,75,.9);
            opacity:0;
            animation: rf-sparkle-twinkle 2.8s ease-in-out infinite;
        }
        .rf-logo-sparkles span:nth-child(1){ top:2px;  left:6px;  animation-delay:0s;   }
        .rf-logo-sparkles span:nth-child(2){ top:10px; left:78px; animation-delay:.4s;  }
        .rf-logo-sparkles span:nth-child(3){ top:66px; left:70px; animation-delay:.9s;  }
        .rf-logo-sparkles span:nth-child(4){ top:76px; left:20px; animation-delay:1.4s; }
        .rf-logo-sparkles span:nth-child(5){ top:40px; left:-6px; animation-delay:1.9s; }
        .rf-logo-sparkles span:nth-child(6){ top:34px; left:84px; animation-delay:2.3s; }

        /* Layer 2: main gradient tile */
        .rf-logo-badge::before{
            content:'';
            position:absolute; inset:0;
            border-radius: 16px;
            background: linear-gradient(135deg, var(--rf-red-light) 0%, var(--rf-red) 55%, var(--rf-red-dark) 100%);
            box-shadow: 0 6px 14px rgba(255, 71, 87, 0.4);
            animation: rf-badge-pulse 2.6s ease-in-out infinite;
            z-index: 1;
        }

        /* Layer 3: diagonal shine sweep */
        .rf-logo-shine{
            position: absolute;
            inset: 0;
            border-radius: 16px;
            overflow: hidden;
            z-index: 2;
            pointer-events: none;
        }
        .rf-logo-shine::after{
            content:'';
            position: absolute;
            top: -50%; left: -60%;
            width: 40%; height: 200%;
            background: linear-gradient(120deg, transparent, rgba(255,255,255,.65), transparent);
            transform: rotate(20deg);
            animation: rf-shine 3.2s ease-in-out infinite;
        }

        /* Layer 4: dashed rotating ring */
        .rf-logo-ring{
            position: absolute;
            inset: -8px;
            border-radius: 19px;
            border: 2px dashed var(--rf-red-light);
            opacity: .55;
            animation: rf-spin 7s linear infinite;
            z-index: 0;
        }
        /* Layer 4.5: a second, slower counter-rotating dotted ring for depth */
        .rf-logo-ring3{
            position:absolute;
            inset:-15px;
            border-radius: 22px;
            border: 1.5px dotted var(--rf-gold);
            opacity:.45;
            animation: rf-spin-reverse 11s linear infinite;
            z-index:0;
        }
        /* Layer 5: pulse-out ripple ring */
        .rf-logo-ring2{
            position: absolute;
            inset: -3px;
            border-radius: 16px;
            border: 2px solid var(--rf-red-light);
            opacity: 0;
            animation: rf-ring 2.6s ease-out infinite;
            z-index: 0;
        }
        /* Layer 6: tiny orbiting satellite (a little key-shaped mote)
           travels a circular path around the badge using its own
           rotating wrapper so translate and rotate never fight */
        .rf-logo-orbit{
            position: absolute;
            inset: -15px;
            z-index: 3;
            animation: rf-spin 5s linear infinite;
            pointer-events: none;
            transition: animation-duration .3s ease;
        }
        .rf-logo-orbit-dot{
            position: absolute;
            top: 0; left: 50%;
            width: 7px; height: 7px;
            margin-left: -3.5px;
            border-radius: 50%;
            background: radial-gradient(circle at 35% 35%, #FFE6B0, var(--rf-gold));
            box-shadow: 0 0 7px 1.5px rgba(255,194,75,.85);
            animation: rf-orbit-dot-spin 5s linear infinite reverse;
        }

        /* Layer 7: the house mark itself, gentle float + on-load pop */
        .rf-logo-mark{
            position: relative;
            width: 30px; height: 30px;
            z-index: 4;
            animation: rf-float 2.6s ease-in-out infinite, rf-pop-in .65s cubic-bezier(.34,1.56,.64,1) both;
        }
        .rf-logo-mark .rf-roof{
            transform-origin: 16px 8px;
            animation: rf-roof-settle .7s ease-out .05s both;
        }
        .rf-logo-mark .rf-door-wrap{
            transform-origin: 16px 28px;
            transition: transform .4s cubic-bezier(.34,1.56,.64,1);
        }
        .rf-logo-mark .rf-doorknob{
            animation: rf-glow 2.6s ease-in-out infinite;
        }
        .rf-logo-mark .rf-window{
            animation: rf-window-flicker 3.6s ease-in-out infinite;
        }
        .rf-logo-mark .rf-window-r{ animation-delay: .8s; }
        .rf-logo-mark .rf-chimney{ opacity: .95; }
        .rf-logo-mark .rf-smoke-puff{
            opacity: 0;
            transform-origin: center;
            animation: rf-smoke-rise 3s ease-out infinite;
        }
        .rf-logo-mark .rf-smoke-2{ animation-delay: 1s; }
        .rf-logo-mark .rf-smoke-3{ animation-delay: 2s; }
        .rf-logo-mark .rf-key{
            opacity: 0;
            transform: translate(0,0) rotate(-25deg) scale(.6);
            transform-origin: 24px 24px;
            transition: opacity .35s ease, transform .55s cubic-bezier(.34,1.56,.64,1);
        }

        /* Hover state: the whole badge "wakes up" — blob spins faster,
           sparkles quicken, the door swings wide, and the little key
           actually flies in from its orbit to sit in the lock */
        .rf-logo-link:hover .rf-logo-badge::before{ animation-duration: 1s; }
        .rf-logo-link:hover .rf-logo-mark{ animation-duration: 1s; }
        .rf-logo-link:hover .rf-logo-ring{ animation-duration: 2s; }
        .rf-logo-link:hover .rf-logo-ring3{ animation-duration: 3.5s; }
        .rf-logo-link:hover .rf-logo-orbit{ animation-duration: 1.4s; opacity: 0; }
        .rf-logo-link:hover .rf-logo-blob{ animation-duration: 1.8s; opacity: .8; }
        .rf-logo-link:hover .rf-logo-sparkles span{ animation-duration: 1s; }
        .rf-logo-link:hover .rf-logo-halo{ animation-duration: 1.1s; background: radial-gradient(circle, rgba(255,71,87,.6) 0%, transparent 70%); }
        .rf-logo-link:hover .rf-logo-mark .rf-door-wrap{ transform: rotateY(50deg) translateX(.4px); }
        .rf-logo-link:hover .rf-logo-mark .rf-key{
            opacity: 1;
            transform: translate(-4px,-1px) rotate(0deg) scale(1);
        }
        .rf-logo-link:hover .rf-logo-text .rf-fy{ color: var(--rf-red-dark); }
        .rf-logo-link:hover .rf-logo-badge{ transform: scale(1.1) rotate(-3deg); }
        .rf-logo-link:hover .rf-logo-underline{ transform: scaleX(1); }
        .rf-logo-link:active .rf-logo-badge{ transform: scale(.92) rotate(0deg); }

        @keyframes rf-blob-morph{
            0%,100%{ border-radius: 42% 58% 60% 40% / 48% 42% 58% 52%; transform: rotate(0deg) scale(1); }
            33%{ border-radius: 58% 42% 45% 55% / 55% 60% 40% 45%; transform: rotate(6deg) scale(1.04); }
            66%{ border-radius: 46% 54% 55% 45% / 40% 50% 50% 60%; transform: rotate(-5deg) scale(.98); }
        }
        @keyframes rf-halo-breathe{
            0%,100%{ opacity:.55; transform: scale(1); }
            50%{ opacity: 1; transform: scale(1.14); }
        }
        @keyframes rf-sparkle-twinkle{
            0%,100%{ opacity: 0; transform: scale(.4) translateY(0); }
            50%{ opacity: 1; transform: scale(1.3) translateY(-3px); }
        }
        @keyframes rf-badge-pulse{
            0%,100%{ transform: scale(1); }
            50%{ transform: scale(1.07); }
        }
        @keyframes rf-shine{
            0%{ left: -60%; }
            60%{ left: 130%; }
            100%{ left: 130%; }
        }
        @keyframes rf-spin{
            from{ transform: rotate(0deg); }
            to{ transform: rotate(360deg); }
        }
        @keyframes rf-spin-reverse{
            from{ transform: rotate(360deg); }
            to{ transform: rotate(0deg); }
        }
        @keyframes rf-orbit-dot-spin{
            from{ transform: rotate(0deg); }
            to{ transform: rotate(-360deg); }
        }
        @keyframes rf-ring{
            0%{ transform: scale(0.85); opacity: .6; }
            100%{ transform: scale(1.4); opacity: 0; }
        }
        @keyframes rf-float{
            0%,100%{ transform: translateY(0) rotate(0deg); }
            50%{ transform: translateY(-2px) rotate(-2deg); }
        }
        @keyframes rf-glow{
            0%,100%{ opacity:.85; }
            50%{ opacity: 1; filter: brightness(1.5); }
        }
        @keyframes rf-window-flicker{
            0%,100%{ opacity: .8; filter: brightness(1); }
            45%{ opacity: 1; filter: brightness(1.6); }
            55%{ opacity: .55; filter: brightness(.9); }
        }
        @keyframes rf-smoke-rise{
            0%{ opacity: 0; transform: translate(0,0) scale(.5); }
            25%{ opacity: .6; }
            100%{ opacity: 0; transform: translate(3px,-11px) scale(1.6); }
        }
        @keyframes rf-pop-in{
            0%{ transform: scale(.4) rotate(-14deg); opacity: 0; }
            100%{ transform: scale(1) rotate(0deg); opacity: 1; }
        }
        @keyframes rf-roof-settle{
            0%{ transform: translateY(-6px) scale(.85); opacity: 0; }
            100%{ transform: translateY(0) scale(1); opacity: 1; }
        }

        .rf-logo-textwrap{ position: relative; }
        .rf-logo-text{
            position: relative;
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            font-size: 1.55rem;
            letter-spacing: .3px;
            color: var(--rf-ink);
            line-height: 1;
            white-space: nowrap;
        }
        .rf-logo-text .rf-fy{
            color: var(--rf-red);
            background: linear-gradient(100deg, var(--rf-red) 0%, var(--rf-gold) 45%, var(--rf-red) 90%);
            background-size: 250% 100%;
            -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;
            transition: color .3s ease;
        }
        .rf-logo-link:hover .rf-logo-text .rf-fy{
            animation: rf-text-shimmer 1.1s ease-in-out;
        }
        @keyframes rf-text-shimmer{
            0%{ background-position: 200% 0; }
            100%{ background-position: -50% 0; }
        }
        .rf-logo-tag{
            display:block;
            font-family:'Heebo',sans-serif;
            font-weight:600;
            font-size:.6rem;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--rf-red-dark);
            margin-top: 2px;
        }
        .rf-logo-underline{
            position:absolute; left:0; bottom:-4px;
            width: 100%; height: 2px;
            background: linear-gradient(90deg, var(--rf-red), var(--rf-gold));
            border-radius: 2px;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .4s cubic-bezier(.34,1.56,.64,1);
        }

        /* Click burst particles, spawned by JS entirely inside the badge's
           own stacking context — never touches page layout */
        .rf-burst-particle{
            position:absolute; top:50%; left:50%;
            width:5px; height:5px; border-radius:50%;
            pointer-events:none;
            z-index: 5;
        }

        .sidebar hr.rf-divider{
            border: none;
            height: 1px;
            background: var(--rf-line);
            margin: 0 1.5rem 1.2rem;
        }

        /* Profile block */
        .sidebar .rf-profile{
            background: var(--rf-off);
            border-radius: 14px;
            margin: 0 1.25rem 1.2rem;
            padding: .7rem .9rem;
            border: 1px solid var(--rf-line);
            transition: box-shadow .25s ease, border-color .25s ease;
        }
        .sidebar .rf-profile:hover{ box-shadow: var(--rf-shadow); border-color: var(--rf-red-light); }
        .sidebar .rf-profile img.rounded-circle{ border: 2px solid var(--rf-red-light); }
        .sidebar .rf-profile h6{ color: var(--rf-ink); font-weight: 700; margin: 0; }
        .sidebar .rf-profile span{ color: var(--rf-red); font-size: .78rem; font-weight: 600; }
        .rf-owner-pill{
            display:inline-block;
            font-size: .62rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--rf-white);
            background: var(--rf-red);
            padding: 1px 8px;
            border-radius: 20px;
            margin-left: 6px;
            vertical-align: middle;
        }

        /* Nav links: color/background/shadow only on hover/active, no position changes.
           Entrance is a fade+slide handled purely with opacity/transform on the
           link itself, staggered per item — never touches parent layout. */
        .sidebar .nav-item .nav-link{
            color: var(--rf-ink);
            border-radius: 10px;
            transition: background-color .2s ease, color .2s ease, box-shadow .2s ease, padding-left .2s ease;
            animation: rf-nav-in .5s ease both;
        }
        .sidebar .nav-item:nth-child(1) .nav-link{ animation-delay: .05s; }
        .sidebar .nav-item:nth-child(2) .nav-link{ animation-delay: .1s; }
        .sidebar .nav-item:nth-child(3) .nav-link{ animation-delay: .15s; }
        .sidebar .nav-item:nth-child(4) .nav-link{ animation-delay: .2s; }
        .sidebar .nav-item:nth-child(5) .nav-link{ animation-delay: .25s; }
        .sidebar .nav-item:nth-child(6) .nav-link{ animation-delay: .3s; }
        @keyframes rf-nav-in{
            0%{ opacity: 0; transform: translateX(-14px); }
            100%{ opacity: 1; transform: translateX(0); }
        }
        .sidebar .nav-item .nav-link i{
            color: var(--rf-red);
            transition: transform .25s cubic-bezier(.34,1.56,.64,1), color .2s ease;
        }
        .sidebar .nav-item .nav-link:hover{
            background: var(--rf-off);
            color: var(--rf-red-dark);
            padding-left: 1.1rem;
        }
        .sidebar .nav-item .nav-link:hover i{ transform: scale(1.15) rotate(-6deg); }
        .sidebar .nav-item .nav-link.active{
            background: linear-gradient(135deg, var(--rf-red-light), var(--rf-red));
            color: var(--rf-white) !important;
            font-weight: 600;
            box-shadow: 0 6px 14px rgba(255,71,87,.3);
            position: relative;
        }
        .sidebar .nav-item .nav-link.active i{ color: var(--rf-white); }
        .sidebar .nav-item .nav-link.active::before{
            content:'';
            position:absolute; left:-6px; top:50%;
            width:4px; height:60%;
            transform: translateY(-50%);
            background: var(--rf-gold);
            border-radius: 4px;
        }

        /* ===== Top navbar ===== */
        .content .navbar{
            background: var(--rf-white) !important;
            border-bottom: 1px solid var(--rf-line);
            box-shadow: 0 2px 12px rgba(255,71,87,.06);
        }
        .content .navbar form input.form-control{
            background: var(--rf-off);
            border-radius: 20px;
            padding-left: 34px;
            border: 1px solid var(--rf-line);
        }
        .content .navbar form input.form-control:focus{
            box-shadow: 0 0 0 3px rgba(255,71,87,.15);
            border-color: var(--rf-red-light);
        }
        .content .navbar form{ position: relative; }
        .content .navbar form::before{
            content: '\f002';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            left: 14px; top: 50%; transform: translateY(-50%);
            color: var(--rf-red-light);
            font-size: .8rem;
            pointer-events: none;
            transition: color .2s ease;
        }
        .content .navbar form:has(input:focus)::before{ color: var(--rf-red); }
        .content .navbar .nav-link{ color: var(--rf-ink); transition: color .25s ease; }
        .content .navbar .nav-link:hover{ color: var(--rf-red); }
        .content .navbar .nav-item.dropdown .nav-link i{
            width: 32px; height: 32px;
            display: inline-flex; align-items:center; justify-content:center;
            background: var(--rf-off);
            border-radius: 8px;
            font-size: .85rem;
            transition: background-color .25s ease, color .25s ease, transform .25s ease;
        }
        .content .navbar .nav-item.dropdown .nav-link:hover i{
            background: var(--rf-red);
            color: var(--rf-white);
            transform: translateY(-2px);
        }
        .content .navbar .nav-item.dropdown .fa-bell{ transition: transform .3s ease; }
        .content .navbar .nav-item.dropdown .nav-link:hover .fa-bell{ animation: rf-bell 0.5s ease; }
        @keyframes rf-bell{
            0%,100%{ transform: rotate(0); }
            20%{ transform: rotate(14deg); }
            40%{ transform: rotate(-10deg); }
            60%{ transform: rotate(6deg); }
            80%{ transform: rotate(-4deg); }
        }
        .navbar-nav .nav-item.dropdown img.rounded-circle{ border: 2px solid var(--rf-red); transition: transform .25s ease, box-shadow .25s ease; }
        .navbar-nav .nav-item.dropdown .nav-link:hover img.rounded-circle{ transform: scale(1.08); box-shadow: 0 0 0 4px rgba(255,71,87,.15); }

        /*
            Dropdown menus: opacity/visibility only (never transform), so this
            never fights Bootstrap Popper's own inline positioning transform.
        */
        .dropdown-menu{
            display: block !important;
            border: 1px solid var(--rf-line);
            border-top: 3px solid var(--rf-red);
            box-shadow: var(--rf-shadow);
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            z-index: 1050;
            transition: opacity .2s ease, visibility .2s ease;
        }
        .dropdown-menu.show{
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }
        .dropdown-toggle::after{ transition: transform .25s ease; vertical-align: middle; }
        .dropdown-toggle[aria-expanded="true"]::after{ transform: rotate(180deg); }
        .dropdown-item{ transition: background-color .18s ease, color .18s ease, padding-left .18s ease; }
        .dropdown-item:active, .dropdown-item:focus{ background: var(--rf-red); color: var(--rf-white); }
        .dropdown-item:hover{ background: var(--rf-off); color: var(--rf-red-dark); padding-left: 1.35rem; }
        .dropdown-item img.rounded-circle{ transition: transform .25s ease; }
        .dropdown-item:hover img.rounded-circle{ transform: scale(1.08); }

        /* Notification panel */
        .rf-notif-count{
            font-size: .6rem;
            padding: 3px 5px;
            animation: rf-badge-pulse 1.6s ease-in-out infinite;
            box-shadow: 0 0 0 2px var(--rf-white);
        }
        .rf-notif-item{
            border-left: 3px solid transparent;
            transition: background-color .18s ease, border-color .18s ease, padding-left .18s ease;
        }
        .rf-notif-item.rf-unread{ background: var(--rf-off); border-left-color: var(--rf-red); }
        .rf-notif-item.rf-unread:hover{ background: #FFEDEF; }
        .rf-notif-item h6{ color: var(--rf-ink); }
        .rf-notif-item p{ color: #7A6266; }
        .rf-new-badge{ font-size: .58rem; vertical-align: middle; animation: rf-badge-pulse 1.6s ease-in-out infinite; }
        .rf-notif-empty{ color: #B98A90; }
        .rf-notif-empty i{ font-size: 1.6rem; display:block; color: var(--rf-line); }
        .rf-notif-viewall{
            background: var(--rf-white) !important;
            color: var(--rf-red) !important;
            border-top: 1px solid var(--rf-line);
        }
        .rf-notif-viewall:hover{ color: var(--rf-red-dark) !important; background: var(--rf-off) !important; }

        /* Buttons */
        .btn-primary, .back-to-top{
            background: var(--rf-red) !important;
            border-color: var(--rf-red) !important;
            box-shadow: 0 4px 12px rgba(255,71,87,.25);
            transition: background-color .25s ease, box-shadow .25s ease, transform .25s ease;
        }
        .btn-primary:hover, .back-to-top:hover{
            background: var(--rf-red-dark) !important;
            border-color: var(--rf-red-dark) !important;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(230,57,80,.35);
        }
        .btn-primary:active{ transform: scale(.97); }
        .text-primary{ color: var(--rf-red) !important; }
        .bg-primary{ background: var(--rf-red) !important; }

        /* Back-to-top scroll progress ring, drawn purely with a conic-gradient
           mask so it never needs extra DOM nodes or layout changes */
        .back-to-top{
            --rf-progress: 0%;
            position: relative;
        }
        .back-to-top::before{
            content:'';
            position:absolute; inset:-4px;
            border-radius: 50%;
            background: conic-gradient(var(--rf-gold) var(--rf-progress), transparent var(--rf-progress));
            z-index: -1;
        }

        /* Footer */
        .content .bg-light.rounded-top {
            background: var(--rf-white) !important;
            border: 1px solid var(--rf-line);
            box-shadow: var(--rf-shadow);
        }
        .content .bg-light.rounded-top a{ color: var(--rf-red); font-weight: 600; transition: color .2s ease; }
        .content .bg-light.rounded-top a:hover{ color: var(--rf-red-dark); text-decoration: underline; }

        /* Sidebar toggler */
        .sidebar-toggler{
            color: var(--rf-red);
            width: 36px; height: 36px;
            display:inline-flex; align-items:center; justify-content:center;
            background: var(--rf-off);
            border-radius: 8px;
            transition: background-color .25s ease, color .25s ease, transform .25s ease;
        }
        .sidebar-toggler:hover{ background: var(--rf-red); color: var(--rf-white); transform: rotate(90deg); }

        /* Cards / tables (leaf content, safe to animate) */
        .card{
            border: 1px solid var(--rf-line);
            border-radius: 14px;
            box-shadow: var(--rf-shadow);
            transition: box-shadow .25s ease, transform .25s ease;
        }
        .card:hover{ transform: translateY(-4px); box-shadow: 0 14px 28px rgba(255,71,87,.2); }
        .card-header{ background: var(--rf-white); border-bottom: 1px solid var(--rf-line); font-weight: 700; }
        .card h1, .card h2, .card h3{
            background: linear-gradient(135deg, var(--rf-red-dark), var(--rf-red));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        table thead{ background: var(--rf-off); }
        table thead th{ color: var(--rf-red-dark); border-bottom: 2px solid var(--rf-line) !important; }
        table tbody tr{ transition: background-color .2s ease; }
        table tbody tr:hover{ background: var(--rf-off) !important; }

        /* Scrollbar */
        ::-webkit-scrollbar{ width: 9px; height: 9px; }
        ::-webkit-scrollbar-track{ background: var(--rf-off); }
        ::-webkit-scrollbar-thumb{ background: linear-gradient(180deg, var(--rf-red-light), var(--rf-red)); border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover{ background: var(--rf-red-dark); }

        /* Accessible focus ring */
        a:focus-visible, button:focus-visible, input:focus-visible{
            outline: 2px solid var(--rf-red-light);
            outline-offset: 2px;
        }

        a{ transition: color .2s ease; }
        input, select, textarea{ transition: box-shadow .2s ease, border-color .2s ease; }

        @media (prefers-reduced-motion: reduce){
            *, *::before, *::after{ animation-duration: .001ms !important; animation-iteration-count: 1 !important; transition-duration: .001ms !important; }
        }
    </style>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.blade.php" class="rf-logo-link navbar-brand mx-4">
                    <div class="rf-logo-badge">
                        <div class="rf-logo-sparkles">
                            <span></span><span></span><span></span><span></span><span></span><span></span>
                        </div>
                        <div class="rf-logo-halo"></div>
                        <div class="rf-logo-blob"></div>
                        <div class="rf-logo-ring3"></div>
                        <div class="rf-logo-ring"></div>
                        <div class="rf-logo-ring2"></div>
                        <div class="rf-logo-shine"></div>
                        <div class="rf-logo-orbit"><span class="rf-logo-orbit-dot"></span></div>
                        <svg class="rf-logo-mark" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <defs>
                                <linearGradient id="rfRoofGrad" x1="0" y1="0" x2="1" y2="1">
                                    <stop offset="0%" stop-color="#FFFFFF"/>
                                    <stop offset="100%" stop-color="#FFE9EB"/>
                                </linearGradient>
                            </defs>
                            <!-- chimney + rising smoke puffs, purely decorative -->
                            <g class="rf-smoke">
                                <circle class="rf-smoke-puff rf-smoke-1" cx="24" cy="4" r="1" fill="#FFFFFF"/>
                                <circle class="rf-smoke-puff rf-smoke-2" cx="24" cy="4" r="1" fill="#FFFFFF"/>
                                <circle class="rf-smoke-puff rf-smoke-3" cx="24" cy="4" r="1" fill="#FFFFFF"/>
                            </g>
                            <rect class="rf-chimney" x="22.5" y="5" width="3" height="6" fill="#FFFFFF"/>
                            <g class="rf-roof">
                                <path d="M16 3 L29 13 H25.5 V15.5 H6.5 V13 H3 Z" fill="url(#rfRoofGrad)"/>
                            </g>
                            <g class="rf-base">
                                <rect x="7" y="15" width="18" height="13.5" rx="1.6" fill="#FFFFFF"/>
                            </g>
                            <!-- little "lit" windows that softly flicker -->
                            <rect class="rf-window rf-window-l" x="9" y="17.6" width="3" height="3" rx=".6" fill="#FF4757"/>
                            <rect class="rf-window rf-window-r" x="20" y="17.6" width="3" height="3" rx=".6" fill="#FF4757"/>
                            <g class="rf-door-wrap">
                                <rect class="rf-door" x="13.5" y="20" width="5" height="8.5" rx="1" fill="#FF4757"/>
                                <circle class="rf-doorknob" cx="17" cy="24.2" r="0.7" fill="#FFFFFF"/>
                            </g>
                            <!-- key that orbits, then flies home into the lock on hover -->
                            <g class="rf-key">
                                <circle cx="24" cy="24" r="1.6" fill="none" stroke="#FFC24B" stroke-width="1"/>
                                <line x1="25.1" y1="25.1" x2="27.2" y2="27.2" stroke="#FFC24B" stroke-width="1"/>
                                <line x1="26.4" y1="26.4" x2="27.2" y2="25.6" stroke="#FFC24B" stroke-width="1"/>
                            </g>
                        </svg>
                    </div>
                    <span class="rf-logo-textwrap">
                        <span class="rf-logo-text">Rent<span class="rf-fy">ify</span></span>
                        <span class="rf-logo-tag">Owner Panel</span>
                        <span class="rf-logo-underline"></span>
                    </span>
                </a>
                <div class="d-flex align-items-center rf-profile">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>          
                    <div class="ms-3">
                        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                        <span>Owner<span class="rf-owner-pill text-white ">Verified</span></span>
                    </div>
                </div>
                <hr class="rf-divider">
                <div class="navbar-nav w-100">
                    <a href="/owner/analytics" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

                    <a href="/owner/items/create" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Add Items</a>
                    <a href="/owner/items" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>All Items</a>
                    <a href="/owner/bookings" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Bookings</a>
                    <a href="/owner/notifications" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Notifications</a>
                    <a href="/owner/reviews" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Reviews</a>

                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

         <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.blade.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">

    <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            <i class="fa fa-envelope me-lg-2"></i>
            <span class="d-none d-lg-inline-flex">Message</span>
        </a>
        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
            <a href="#" class="dropdown-item">
                <div class="d-flex align-items-center">
                    <img class="rounded-circle" src="{{ asset('Vendor/img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                    <div class="ms-2">
                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                        <small>15 minutes ago</small>
                    </div>
                </div>
            </a>
            <hr class="dropdown-divider">
            <a href="#" class="dropdown-item">
                <div class="d-flex align-items-center">
                    <img class="rounded-circle" src="{{ asset('Vendor/img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                    <div class="ms-2">
                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                        <small>15 minutes ago</small>
                    </div>
                </div>
            </a>
            <hr class="dropdown-divider">
            <a href="#" class="dropdown-item">
                <div class="d-flex align-items-center">
                    <img class="rounded-circle" src="{{ asset('Vendor/img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                    <div class="ms-2">
                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                        <small>15 minutes ago</small>
                    </div>
                </div>
            </a>
            <hr class="dropdown-divider">
            <a href="#" class="dropdown-item text-center">See all message</a>
        </div>
    </div>

    <!-- Notification Start -->
    <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            <span class="position-relative d-inline-block">
                <i class="fa fa-bell me-lg-2"></i>
                @if(Auth::user()->unreadNotifications->count() > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger rf-notif-count">
                        {{ Auth::user()->unreadNotifications->count() }}
                    </span>
                @endif
            </span>
            <span class="d-none d-lg-inline-flex">Notifications</span>
        </a>
        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0 rf-notif-panel"
             style="width:350px; max-height:400px; overflow-y:auto;">
            @forelse(Auth::user()->notifications()->latest()->take(5)->get() as $notification)
                <a href="/owner/notifications/read/{{ $notification->id }}" class="dropdown-item rf-notif-item {{ is_null($notification->read_at) ? 'rf-unread' : '' }}">
                    <h6 class="fw-normal mb-1">
                        {{ $notification->data['title'] }}
                        @if(is_null($notification->read_at))
                            <span class="badge bg-danger ms-1 rf-new-badge">
                                New
                            </span>
                        @endif
                    </h6>
                    <p class="mb-1 small">
                        {{ $notification->data['message'] }}
                    </p>
                    <small class="text-muted">
                        {{ $notification->created_at->diffForHumans() }}
                    </small>
                </a>
                <hr class="dropdown-divider">
            @empty
                <div class="dropdown-item text-center text-muted py-4 rf-notif-empty">
                    <i class="fa fa-bell-slash mb-2"></i>
                    <div>No notifications found.</div>
                </div>
            @endforelse
            <a href="/owner/notifications" class="dropdown-item text-center fw-bold rf-notif-viewall">
                See All Notifications
            </a>
        </div>
    </div>
    <!-- Notification End -->

    <div class="nav-item dropdown">
    <ul class="navbar-nav d-flex flex-row align-items-center">

        @guest
            <li class="nav-item dropdown">
                <a href="{{ route('login') }}" class="nav-link dropdown-toggle">
                    <i class="fa fa-sign-in-alt me-lg-2"></i>
                    <span class="d-none d-lg-inline-flex">Login</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="{{ route('register') }}" class="nav-link dropdown-toggle">
                    <i class="fa fa-user-plus me-lg-2"></i>
                    <span class="d-none d-lg-inline-flex">Register</span>
                </a>
            </li>
        @endguest

        @auth
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img class="rounded-circle me-lg-2" src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="" style="width: 40px; height: 40px;">
                    <span class="d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                    <a href="{{ route('profile.show') }}" class="dropdown-item">
                        <i class="fa fa-user"></i> My Profile
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item text-danger" style="border:none;background:none;">
                            <i class="fa fa-sign-out"></i> Log Out
                        </button>
                    </form>
                </div>
            </li>
        @endauth

    </ul>
</div>

</div>
            </nav>

@yield('content')

       <!-- Footer Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded-top p-4">
        <div class="row align-items-center">

            <div class="col-md-6 text-center text-md-start">
                &copy; {{ date('Y') }}
                <a href="{{ url('/') }}" class="fw-bold text-danger">Rentify</a>.
                All Rights Reserved.
            </div>

            <div class="col-md-6 text-center text-md-end">
                Secure • Reliable • Easy Rentals
            </div>

        </div>
    </div>
</div>
<!-- Footer End -->
        </div>
        <!-- Content End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('Vendor/lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('Vendor/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('Vendor/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('Vendor/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('Vendor/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('Vendor/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('Vendor/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('Vendor/js/main.js') }}"></script>

    <!-- Rentify: back-to-top scroll progress ring + button ripple (isolated, no layout/DOM structure changes) -->
    <script>
        (function(){
            var backToTop = document.querySelector('.back-to-top');
            if (backToTop) {
                var updateProgress = function(){
                    var scrollTop = window.scrollY || document.documentElement.scrollTop;
                    var docHeight = document.documentElement.scrollHeight - window.innerHeight;
                    var pct = docHeight > 0 ? Math.min(100, Math.max(0, (scrollTop / docHeight) * 100)) : 0;
                    backToTop.style.setProperty('--rf-progress', pct + '%');
                };
                window.addEventListener('scroll', updateProgress, { passive: true });
                updateProgress();
            }

            // Logo badge click: burst a dozen tiny gold/red/white sparks
            // outward from the center, purely inside the badge's own box.
            var logoBadge = document.querySelector('.rf-logo-badge');
            if (logoBadge) {
                logoBadge.style.overflow = 'visible';
                logoBadge.addEventListener('click', function(){
                    var colors = ['#FFC24B', '#FF4757', '#FFFFFF', '#FF6B7A'];
                    var count = 12;
                    for (var i = 0; i < count; i++) {
                        (function(i){
                            var particle = document.createElement('span');
                            particle.className = 'rf-burst-particle';
                            particle.style.background = colors[i % colors.length];
                            particle.style.boxShadow = '0 0 5px 1px rgba(255,194,75,.6)';
                            particle.style.opacity = '1';
                            particle.style.transition = 'transform .6s cubic-bezier(.16,1,.3,1), opacity .6s ease';
                            logoBadge.appendChild(particle);
                            var angle = (i / count) * Math.PI * 2;
                            var distance = 30 + Math.random() * 14;
                            var dx = Math.cos(angle) * distance;
                            var dy = Math.sin(angle) * distance;
                            requestAnimationFrame(function(){
                                particle.style.transform = 'translate(' + dx + 'px,' + dy + 'px) scale(.2)';
                                particle.style.opacity = '0';
                            });
                            setTimeout(function(){ particle.remove(); }, 650);
                        })(i);
                    }
                });
            }

            document.addEventListener('click', function(e){
                var btn = e.target.closest('.btn-primary');
                if (!btn) return;
                var rect = btn.getBoundingClientRect();
                var ripple = document.createElement('span');
                var size = Math.max(rect.width, rect.height) * 1.6;
                ripple.style.position = 'absolute';
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
                ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';
                ripple.style.borderRadius = '50%';
                ripple.style.background = 'rgba(255,255,255,.5)';
                ripple.style.transform = 'scale(0)';
                ripple.style.opacity = '1';
                ripple.style.pointerEvents = 'none';
                ripple.style.transition = 'transform .5s ease, opacity .6s ease';
                if (getComputedStyle(btn).position === 'static') btn.style.position = 'relative';
                btn.style.overflow = 'hidden';
                btn.appendChild(ripple);
                requestAnimationFrame(function(){
                    ripple.style.transform = 'scale(1)';
                    ripple.style.opacity = '0';
                });
                setTimeout(function(){ ripple.remove(); }, 650);
            });
        })();
    </script>
</body>

</html>