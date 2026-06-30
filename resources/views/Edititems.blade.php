<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Item</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

    <style>
        /* ============================================================
           ROOT — strict red & white, same as Add Item form
           ============================================================ */
        :root {
            --primary:       #dc3545;
            --primary-dark:  #b02a37;
            --primary-darker:#8c2128;
            --primary-light: #fce4e6;
            --primary-lighter:#fdf3f4;
            --primary-glow:  rgba(220,53,69,.18);
            --success:       #198754;
            --success-light: #e7f6ee;
            --success-glow:  rgba(25,135,84,.18);
            --white:         #ffffff;
            --gray-50:       #f8f9fa;
            --gray-100:      #f1f3f5;
            --gray-200:      #e9ecef;
            --gray-300:      #dee2e6;
            --gray-400:      #ced4da;
            --gray-500:      #adb5bd;
            --gray-600:      #6c757d;
            --gray-700:      #495057;
            --gray-800:      #343a40;
            --gray-900:      #212529;
            --radius:        10px;
            --radius-lg:     16px;
            --shadow:        0 4px 14px rgba(0,0,0,.06);
            --shadow-lg:     0 12px 40px rgba(0,0,0,.10);
            --ease:          .25s cubic-bezier(.4,0,.2,1);

            /* Sidebar slot — set to sidebar width once you add one.
               Everything else responds automatically via margin-left below. */
            --sidebar-w: 0px;
        }

        * { margin:0; padding:0; box-sizing:border-box; }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--gray-100);
            min-height: 100vh;
            color: var(--gray-800);
        }

        /* ── SIDEBAR-READY SHELL ───────────────────────────────────
           When you add a sidebar later, set --sidebar-w to its width
           (e.g. 280px) and the content area shifts automatically.
           You can also use a flex layout: sidebar + .oei-main-content
           as siblings inside a flex wrapper. Either approach works. */
        .oei-main-content {
            margin-left: var(--sidebar-w);
            transition: margin-left .3s ease;
            min-height: 100vh;
            padding: 32px 28px 56px;
        }

        /* ── CARD ─────────────────────────────────────────────────── */
        .oei-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            max-width: 980px;
            border: 1px solid rgba(220,53,69,.08);
        }

        /* ── HEADER ───────────────────────────────────────────────── */
        .oei-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            padding: 26px 34px;
            color: #fff;
            position: relative;
            overflow: hidden;
        }
        .oei-header::after {
            content: '';
            position: absolute; bottom:0; left:0; right:0;
            height: 3px; background: rgba(255,255,255,.22);
        }
        .oei-header-inner { display:flex; align-items:center; gap:16px; }
        .oei-header-icon {
            width:48px; height:48px;
            background: rgba(255,255,255,.18);
            border-radius: 12px;
            display:flex; align-items:center; justify-content:center;
            font-size: 22px; backdrop-filter: blur(4px);
            transition: var(--ease); flex-shrink:0;
        }
        .oei-header:hover .oei-header-icon {
            transform: rotate(-6deg) scale(1.06);
            background: rgba(255,255,255,.26);
        }
        .oei-header h1 { font-size:22px; font-weight:800; letter-spacing:-.02em; margin:0 0 2px; }
        .oei-header p  { font-size:13px; opacity:.82; margin:0; font-weight:400; }
        .oei-badge {
            margin-left:auto;
            background: rgba(255,255,255,.18);
            border: 1px solid rgba(255,255,255,.3);
            border-radius: 20px; padding:5px 14px;
            font-size:12px; font-weight:700; letter-spacing:.4px;
            color:#fff; white-space:nowrap;
        }

        /* ── BODY GRID ────────────────────────────────────────────── */
        .oei-body {
            padding: 32px 34px 28px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 32px;
        }
        @media(max-width:768px) {
            .oei-body { grid-template-columns:1fr; gap:20px; padding:22px 18px; }
            .oei-header { padding:20px 18px; }
            .oei-badge { display:none; }
            .oei-main-content { padding:16px 12px 48px; }
        }
        .oei-full { grid-column: span 2; }
        @media(max-width:768px) { .oei-full { grid-column:span 1; } }

        /* ── SECTION TITLES ───────────────────────────────────────── */
        .oei-section-title {
            display:flex; align-items:center; gap:10px;
            margin-bottom:20px; padding-bottom:10px;
            border-bottom:2px solid var(--primary-light);
        }
        .oei-section-title .oei-st-icon {
            width:32px; height:32px;
            background: var(--primary-light);
            border-radius:8px;
            display:flex; align-items:center; justify-content:center;
            color: var(--primary); font-size:14px;
            transition: var(--ease);
        }
        .oei-section-title:hover .oei-st-icon {
            background: var(--primary); color:#fff; transform:rotate(-5deg);
        }
        .oei-section-title h3 {
            font-size:13px; font-weight:700; color:var(--gray-900);
            letter-spacing:.4px; text-transform:uppercase; margin:0;
        }

        /* ── FORM GROUPS ──────────────────────────────────────────── */
        .oei-group { margin-bottom:20px; position:relative; }

        /* ── INPUT WRAPPER ────────────────────────────────────────── */
        .oei-wrap {
            position:relative;
            border-radius: var(--radius);
            background: var(--white);
            border: 2px solid var(--gray-200);
            min-height: 52px;
            transition: border-color var(--ease), box-shadow var(--ease), background var(--ease);
        }
        .oei-wrap:hover         { border-color:var(--gray-300); }
        .oei-wrap:focus-within  { border-color:var(--primary); box-shadow:0 0 0 4px var(--primary-glow); }
        .oei-wrap.is-valid      { border-color:var(--success); background:var(--success-light); }
        .oei-wrap.is-valid:focus-within  { box-shadow:0 0 0 4px var(--success-glow); }
        .oei-wrap.is-invalid    { border-color:var(--primary); background:var(--primary-lighter); }
        .oei-wrap.is-invalid:focus-within { box-shadow:0 0 0 4px var(--primary-glow); }
        .oei-wrap.is-textarea   { min-height:88px; }

        /* ── FLOATING LABEL ───────────────────────────────────────── */
        .oei-label {
            position:absolute; left:13px; top:50%; transform:translateY(-50%);
            font-size:13.5px; color:var(--gray-500);
            pointer-events:none;
            transition: all var(--ease);
            background:transparent; padding:0 4px;
            font-weight:500; z-index:2;
        }
        .oei-wrap.is-textarea .oei-label { top:15px; transform:none; }
        .oei-wrap.floated .oei-label {
            top:-9px; left:11px; font-size:10.5px; font-weight:700;
            letter-spacing:.4px; text-transform:uppercase;
            color:var(--primary); background:var(--white); padding:0 5px;
        }
        .oei-wrap.is-valid.floated   .oei-label { color:var(--success); background:var(--success-light); }
        .oei-wrap.is-invalid.floated .oei-label { color:var(--primary); background:var(--primary-lighter); }

        /* ── INPUTS ───────────────────────────────────────────────── */
        .oei-wrap input,
        .oei-wrap select,
        .oei-wrap textarea {
            width:100%; padding:15px 42px 11px 13px;
            border:none; background:transparent;
            font-size:13.5px; font-family:inherit;
            color:var(--gray-900); outline:none;
            border-radius:var(--radius);
            position:relative; z-index:1; min-height:50px;
        }
        .oei-wrap input::placeholder,
        .oei-wrap textarea::placeholder {
            color:var(--gray-400); font-weight:400;
            opacity:0; transition:opacity var(--ease);
        }
        .oei-wrap.floated input::placeholder,
        .oei-wrap.floated textarea::placeholder { opacity:1; }
        .oei-wrap textarea { min-height:86px; resize:vertical; padding-top:17px; }
        .oei-wrap select   { appearance:none; -webkit-appearance:none; cursor:pointer; }

        /* ── FIELD ICON ───────────────────────────────────────────── */
        .oei-icon {
            position:absolute; right:13px; top:50%; transform:translateY(-50%);
            color:var(--gray-400); font-size:15px;
            pointer-events:none; z-index:2; transition:color var(--ease);
        }
        .oei-wrap.is-textarea .oei-icon { top:17px; transform:none; }
        .oei-wrap:focus-within .oei-icon { color:var(--primary); }
        .oei-wrap.is-valid     .oei-icon { color:var(--success); }
        .oei-wrap.is-invalid   .oei-icon { color:var(--primary); }

        /* ── CHECK / CROSS PSEUDO ─────────────────────────────────── */
        .oei-wrap::after {
            content:''; position:absolute;
            right:40px; top:50%; transform:translateY(-50%);
            font-family:'Font Awesome 6 Free'; font-weight:900;
            font-size:14px; z-index:2; display:none;
            pointer-events:none; animation:oei-popCheck .25s ease;
        }
        .oei-wrap.is-textarea::after { top:19px; transform:none; }
        .oei-wrap.is-valid::after    { content:'\f00c'; display:block; color:var(--success); }
        .oei-wrap.is-invalid::after  { content:'\f00d'; display:block; color:var(--primary); }
        @keyframes oei-popCheck {
            0%  { opacity:0; transform:translateY(-50%) scale(.5); }
            100%{ opacity:1; transform:translateY(-50%) scale(1); }
        }

        /* ── ERROR MESSAGE ────────────────────────────────────────── */
        .oei-error {
            font-size:11.5px; color:var(--primary);
            margin-top:4px; display:none;
            align-items:center; gap:5px;
            font-weight:600; animation:oei-slide .22s ease;
        }
        .oei-error.show { display:flex; }
        @keyframes oei-slide {
            from { opacity:0; transform:translateY(-3px); }
            to   { opacity:1; transform:translateY(0); }
        }

        /* ── IMAGE SECTION ────────────────────────────────────────── */
        .oei-images-grid {
            display:flex; flex-wrap:wrap; gap:12px; margin-bottom:6px;
        }
        .oei-img-item {
            position:relative; width:100px; height:100px;
            border-radius:var(--radius);
            overflow:hidden;
            border:2px solid var(--gray-200);
            transition:var(--ease);
        }
        .oei-img-item:hover {
            border-color:var(--primary);
            transform:scale(1.04);
            box-shadow:0 4px 16px rgba(220,53,69,.18);
        }
        .oei-img-item img {
            width:100%; height:100%; object-fit:cover; display:block;
        }
        .oei-img-item .oei-img-label {
            position:absolute; bottom:0; left:0; right:0;
            background:rgba(0,0,0,.55);
            color:#fff; font-size:9px; padding:3px 5px;
            text-align:center; font-weight:600;
        }

        /* New image upload drop zone */
        .oei-drop-zone {
            border: 2px dashed var(--gray-300);
            border-radius: var(--radius);
            padding: 24px 20px;
            text-align:center; cursor:pointer;
            transition:var(--ease);
            background:var(--gray-50);
            position:relative;
        }
        .oei-drop-zone:hover,
        .oei-drop-zone.dragover {
            border-color: var(--primary);
            background: var(--primary-light);
        }
        .oei-drop-zone i {
            font-size:32px; color:var(--primary);
            display:block; margin-bottom:8px; transition:var(--ease);
        }
        .oei-drop-zone:hover i { transform:translateY(-3px); }
        .oei-drop-zone p { font-size:13.5px; color:var(--gray-600); margin:0; }
        .oei-drop-zone .oei-drop-hint { font-size:11.5px; color:var(--gray-500); margin-top:4px; }
        .oei-drop-zone input[type="file"] {
            position:absolute; inset:0; opacity:0; cursor:pointer; z-index:2;
        }

        /* New image previews */
        .oei-new-previews { display:flex; flex-wrap:wrap; gap:10px; margin-top:12px; }
        .oei-preview-item {
            width:80px; height:80px;
            border-radius:var(--radius); overflow:hidden;
            border:2px solid var(--gray-200);
            position:relative; background:var(--gray-100);
            transition:var(--ease); animation:oei-fadeIn .3s ease;
        }
        .oei-preview-item:hover { border-color:var(--primary); transform:scale(1.05); }
        .oei-preview-item img  { width:100%; height:100%; object-fit:cover; }
        .oei-preview-item .oei-remove {
            position:absolute; top:-5px; right:-5px;
            width:20px; height:20px; border-radius:50%;
            background:var(--primary); color:#fff;
            border:none; font-size:10px;
            display:flex; align-items:center; justify-content:center;
            cursor:pointer; z-index:3;
            box-shadow:0 2px 8px rgba(0,0,0,.2);
            transition:var(--ease);
        }
        .oei-preview-item .oei-remove:hover { background:var(--primary-darker); transform:scale(1.2); }
        .oei-preview-item .oei-sz {
            position:absolute; top:3px; left:3px;
            background:rgba(0,0,0,.55); color:#fff;
            font-size:8px; padding:1px 5px; border-radius:6px; z-index:3;
        }
        @keyframes oei-fadeIn { from{opacity:0;transform:scale(.9)} to{opacity:1;transform:scale(1)} }

        /* ── ACTIONS ──────────────────────────────────────────────── */
        .oei-actions {
            grid-column:span 2; padding-top:22px;
            border-top:1px solid var(--gray-200);
            display:flex; justify-content:space-between;
            align-items:center; flex-wrap:wrap; gap:14px;
        }
        @media(max-width:768px) {
            .oei-actions { grid-column:span 1; flex-direction:column; align-items:stretch; }
        }
        .oei-form-info { font-size:11.5px; color:var(--gray-600); }
        .oei-form-info i { color:var(--primary); margin-right:5px; }
        .oei-submit-hint {
            font-size:11px; color:var(--gray-500);
            margin-top:5px; display:flex; align-items:center; gap:5px;
            transition:var(--ease);
        }
        .oei-submit-hint.ready { color:var(--success); font-weight:600; }

        /* ── BUTTONS ──────────────────────────────────────────────── */
        .oei-btn {
            padding:12px 28px; border:none;
            border-radius:var(--radius);
            font-size:13.5px; font-weight:700; cursor:pointer;
            transition:all var(--ease);
            display:inline-flex; align-items:center; gap:9px;
            letter-spacing:.3px; text-decoration:none; font-family:inherit;
        }
        .oei-btn-primary {
            background:linear-gradient(135deg,var(--primary),var(--primary-dark));
            color:#fff; box-shadow:0 4px 14px rgba(220,53,69,.30);
        }
        .oei-btn-primary:hover:not(:disabled) { transform:translateY(-3px); box-shadow:0 8px 24px rgba(220,53,69,.40); }
        .oei-btn-primary:active:not(:disabled){ transform:scale(.97); }
        .oei-btn-primary:disabled {
            opacity:.52; cursor:not-allowed; transform:none !important;
            background:var(--gray-300) !important; color:var(--gray-600) !important; box-shadow:none !important;
        }
        .oei-btn-secondary {
            background:var(--gray-100); color:var(--gray-700);
            border:1px solid var(--gray-300);
        }
        .oei-btn-secondary:hover { background:var(--gray-200); transform:translateY(-2px); }
        .oei-spinner {
            display:inline-block; width:16px; height:16px;
            border:2.5px solid rgba(255,255,255,.3);
            border-top-color:#fff; border-radius:50%;
            animation:oei-spin .7s linear infinite;
        }
        @keyframes oei-spin { to{ transform:rotate(360deg); } }

        /* ── TOAST ────────────────────────────────────────────────── */
        .oei-toast {
            position:fixed; top:22px; right:22px;
            background:#fff; padding:14px 18px;
            border-radius:var(--radius); box-shadow:var(--shadow-lg);
            display:flex; align-items:center; gap:12px;
            z-index:9999;
            transform:translateX(120%);
            transition:transform .35s cubic-bezier(.175,.885,.32,1.275);
            border-left:5px solid var(--primary);
            max-width:380px; min-width:260px;
        }
        .oei-toast.show { transform:translateX(0); }
        .oei-toast-icon {
            width:26px; height:26px; border-radius:50%;
            background:var(--primary);
            display:flex; align-items:center; justify-content:center;
            color:#fff; font-size:12px; flex-shrink:0;
        }
        .oei-toast-title { font-size:13px; font-weight:700; color:var(--gray-900); }
        .oei-toast-msg   { font-size:11.5px; color:var(--gray-600); margin-top:1px; }
        .oei-toast-close {
            background:none; border:none; color:var(--gray-400);
            cursor:pointer; font-size:16px; padding:0;
            width:26px; height:26px;
            display:flex; align-items:center; justify-content:center;
            transition:var(--ease); margin-left:auto;
        }
        .oei-toast-close:hover { color:var(--gray-700); transform:rotate(90deg); }

        /* ── LOADING OVERLAY ──────────────────────────────────────── */
        .oei-loading {
            position:fixed; inset:0;
            background:rgba(255,255,255,.92);
            display:none; justify-content:center; align-items:center;
            z-index:9998; backdrop-filter:blur(5px);
        }
        .oei-loading.active { display:flex; animation:oei-fadeIn .3s ease; }
        .oei-loading-inner  { text-align:center; max-width:360px; padding:36px; }
        .oei-loading-inner i { font-size:44px; color:var(--primary); margin-bottom:16px; display:block; }
        .oei-loading-inner h3{ font-size:18px; font-weight:700; margin-bottom:6px; }
        .oei-loading-inner p { font-size:13px; color:var(--gray-600); margin-bottom:20px; }
        .oei-load-bar { background:var(--gray-200); height:5px; border-radius:4px; overflow:hidden; margin-top:16px; }
        .oei-load-fill{ background:var(--primary); height:100%; width:0%; transition:width .4s ease; border-radius:4px; }
        .oei-load-steps { margin:18px 0; }
        .oei-load-step {
            display:flex; align-items:center; gap:10px;
            margin-bottom:12px; opacity:.38; transition:opacity .3s;
        }
        .oei-load-step.active { opacity:1; }
        .oei-step-num {
            width:24px; height:24px; border-radius:50%;
            background:var(--gray-200);
            display:flex; align-items:center; justify-content:center;
            font-size:11px; font-weight:700; color:var(--gray-600);
            transition:var(--ease);
        }
        .oei-load-step.active .oei-step-num { background:var(--primary); color:#fff; transform:scale(1.1); }
        .oei-step-txt { font-size:13px; font-weight:500; }

        /* ── SUCCESS OVERLAY ──────────────────────────────────────── */
        .oei-success {
            position:fixed; top:50%; left:50%;
            transform:translate(-50%,-50%) scale(.92);
            background:#fff; border-radius:var(--radius-lg);
            box-shadow:var(--shadow-lg);
            padding:40px 36px 32px;
            text-align:center; max-width:460px; width:92%;
            display:none; z-index:9999; opacity:0;
            animation:oei-popIn .42s cubic-bezier(.175,.885,.32,1.275) forwards;
            border:2px solid var(--primary-light);
        }
        .oei-success.active { display:block; }
        @keyframes oei-popIn { to{opacity:1;transform:translate(-50%,-50%) scale(1);} }
        .oei-success-icon {
            width:70px; height:70px;
            background:linear-gradient(135deg,var(--primary),var(--primary-dark));
            border-radius:50%;
            display:flex; align-items:center; justify-content:center;
            margin:0 auto 18px; font-size:30px; color:#fff;
            box-shadow:0 8px 28px rgba(220,53,69,.28);
            animation:oei-bounce .55s ease .1s both;
        }
        @keyframes oei-bounce { 0%{transform:scale(0)} 60%{transform:scale(1.1)} 100%{transform:scale(1)} }
        .oei-success h2 { font-size:20px; font-weight:800; margin-bottom:8px; }
        .oei-success p  { font-size:14px; color:var(--gray-600); line-height:1.65; }
        .oei-success-note {
            background:var(--gray-50); border:1px solid var(--gray-200);
            border-radius:var(--radius); padding:10px 14px;
            font-size:12px; color:var(--gray-600);
            display:flex; align-items:flex-start; gap:7px;
            text-align:left; margin-top:14px;
        }
        .oei-success-note i { color:var(--primary); margin-top:1px; flex-shrink:0; }
    </style>
</head>
<body>

{{-- ── TOAST ─────────────────────────────────────────────────── --}}
<div class="oei-toast" id="oeiToast">
    <div class="oei-toast-icon"><i id="oeiToastIcon" class="fas fa-check"></i></div>
    <div>
        <div class="oei-toast-title" id="oeiToastTitle">Updated!</div>
        <div class="oei-toast-msg"   id="oeiToastMsg">Changes saved.</div>
    </div>
    <button class="oei-toast-close" onclick="oeiHideToast()"><i class="fas fa-times"></i></button>
</div>

{{-- ── LOADING ───────────────────────────────────────────────── --}}
<div class="oei-loading" id="oeiLoading">
    <div class="oei-loading-inner">
        <i class="fas fa-pencil-alt fa-spin"></i>
        <h3>Saving Changes</h3>
        <p>Please wait while we update your item</p>
        <div class="oei-load-steps">
            <div class="oei-load-step active" id="oeiS1">
                <div class="oei-step-num">1</div>
                <div class="oei-step-txt">Validating fields</div>
            </div>
            <div class="oei-load-step" id="oeiS2">
                <div class="oei-step-num">2</div>
                <div class="oei-step-txt">Uploading images</div>
            </div>
            <div class="oei-load-step" id="oeiS3">
                <div class="oei-step-num">3</div>
                <div class="oei-step-txt">Saving to database</div>
            </div>
        </div>
        <div class="oei-load-bar"><div class="oei-load-fill" id="oeiLoadFill"></div></div>
    </div>
</div>

{{-- ── SUCCESS ───────────────────────────────────────────────── --}}
<div class="oei-success" id="oeiSuccess">
    <div class="oei-success-icon"><i class="fas fa-check"></i></div>
    <h2>Item Updated!</h2>
    <p>Your changes have been saved successfully and are now live.</p>
    <div class="oei-success-note">
        <i class="fas fa-hourglass-half"></i>
        <span>If the item was previously approved, changes may need admin review before going live again.</span>
    </div>
    <div style="display:flex;gap:10px;justify-content:center;margin-top:18px;flex-wrap:wrap;">
        <button class="oei-btn oei-btn-secondary"
                onclick="document.getElementById('oeiSuccess').classList.remove('active')"
                style="padding:9px 22px;font-size:13px;">
            <i class="fas fa-pen"></i> Keep Editing
        </button>
        <a href="/owner/items" class="oei-btn oei-btn-primary"
           style="padding:9px 22px;font-size:13px;">
            <i class="fas fa-list"></i> My Items
        </a>
    </div>
</div>

{{-- ── SIDEBAR SLOT ──────────────────────────────────────────────
     When you add a sidebar, put it here as a sibling BEFORE
     .oei-main-content. Then switch to a flex wrapper:
     <div style="display:flex">
         <aside>...sidebar...</aside>
         <div class="oei-main-content">...form...</div>
     </div>
     and update --sidebar-w in :root to match sidebar width.
──────────────────────────────────────────────────────────────── --}}

{{-- ── MAIN CONTENT ─────────────────────────────────────────── --}}
<div class="oei-main-content">
<div class="oei-card">

    {{-- Header --}}
    <div class="oei-header">
        <div class="oei-header-inner">
            <div class="oei-header-icon"><i class="fas fa-pen-to-square"></i></div>
            <div>
                <h1>Edit Item</h1>
                <p>Update your listing details below</p>
            </div>
            <div class="oei-badge"># {{ $item->id }}</div>
        </div>
    </div>

    {{-- Form --}}
    <form id="oeiForm"
          action="/owner/item/{{ $item->id }}/update"
          method="POST"
          enctype="multipart/form-data"
          novalidate>
        @csrf

        <div class="oei-body">

            {{-- ── LEFT: Item Details ─────────────────────────── --}}
            <div>
                <div class="oei-section-title">
                    <div class="oei-st-icon"><i class="fas fa-tag"></i></div>
                    <h3>Item Details</h3>
                </div>

                {{-- Title --}}
                <div class="oei-group">
                    <div class="oei-wrap" id="oeiW-title">
                        <span class="oei-label">Item Title</span>
                        <input type="text" name="title" id="oeiF-title"
                               placeholder="e.g. Canon EOS R5 Camera"
                               value="{{ old('title', $item->title) }}" />
                        <span class="oei-icon"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <div class="oei-error" id="oeiE-title"></div>
                </div>

                {{-- Category --}}
                <div class="oei-group">
                    <div class="oei-wrap" id="oeiW-category_id">
                        <span class="oei-label">Category</span>
                        <select name="category_id" id="oeiF-category_id">
                            <option value="" disabled>Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <span class="oei-icon"><i class="fas fa-list"></i></span>
                    </div>
                    <div class="oei-error" id="oeiE-category_id"></div>
                </div>

                {{-- Description --}}
                <div class="oei-group">
                    <div class="oei-wrap is-textarea" id="oeiW-description">
                        <span class="oei-label">Description</span>
                        <textarea name="description" id="oeiF-description"
                                  placeholder="e.g. Professional mirrorless camera, barely used, includes 2 batteries and box."
                        >{{ old('description', $item->description) }}</textarea>
                        <span class="oei-icon" style="top:17px;transform:none;"><i class="fas fa-align-left"></i></span>
                    </div>
                    <div class="oei-error" id="oeiE-description"></div>
                </div>

                {{-- City --}}
                <div class="oei-group">
                    <div class="oei-wrap" id="oeiW-city">
                        <span class="oei-label">City</span>
                        <input type="text" name="city" id="oeiF-city"
                               placeholder="e.g. Karachi"
                               value="{{ old('city', $item->city) }}" />
                        <span class="oei-icon"><i class="fas fa-city"></i></span>
                    </div>
                    <div class="oei-error" id="oeiE-city"></div>
                </div>

                {{-- Address --}}
                <div class="oei-group">
                    <div class="oei-wrap is-textarea" id="oeiW-address">
                        <span class="oei-label">Address</span>
                        <textarea name="address" id="oeiF-address"
                                  placeholder="e.g. House 12, Block C, Gulshan-e-Iqbal"
                        >{{ old('address', $item->address) }}</textarea>
                        <span class="oei-icon" style="top:17px;transform:none;"><i class="fas fa-map-pin"></i></span>
                    </div>
                    <div class="oei-error" id="oeiE-address"></div>
                </div>
            </div>

            {{-- ── RIGHT: Pricing & Stock ──────────────────────── --}}
            <div>
                <div class="oei-section-title">
                    <div class="oei-st-icon"><i class="fas fa-dollar-sign"></i></div>
                    <h3>Pricing &amp; Stock</h3>
                </div>

                {{-- Rent Per Day --}}
                <div class="oei-group">
                    <div class="oei-wrap" id="oeiW-rent_price_per_day">
                        <span class="oei-label">Rent Per Day ($)</span>
                        <input type="number" name="rent_price_per_day" id="oeiF-rent_price_per_day"
                               placeholder="e.g. 25.00" step="0.01" min="1"
                               value="{{ old('rent_price_per_day', $item->rent_price_per_day) }}" />
                        <span class="oei-icon"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                    <div class="oei-error" id="oeiE-rent_price_per_day"></div>
                </div>

                {{-- Security Deposit --}}
                <div class="oei-group">
                    <div class="oei-wrap" id="oeiW-security_deposit">
                        <span class="oei-label">Security Deposit ($)</span>
                        <input type="number" name="security_deposit" id="oeiF-security_deposit"
                               placeholder="e.g. 100.00" step="0.01" min="0"
                               value="{{ old('security_deposit', $item->security_deposit) }}" />
                        <span class="oei-icon"><i class="fas fa-shield-alt"></i></span>
                    </div>
                    <div class="oei-error" id="oeiE-security_deposit"></div>
                </div>

                {{-- Replacement Cost --}}
                <div class="oei-group">
                    <div class="oei-wrap" id="oeiW-replacement_cost">
                        <span class="oei-label">Replacement Cost ($)</span>
                        <input type="number" name="replacement_cost" id="oeiF-replacement_cost"
                               placeholder="e.g. 1800.00" step="0.01" min="0"
                               value="{{ old('replacement_cost', $item->replacement_cost) }}" />
                        <span class="oei-icon"><i class="fas fa-exchange-alt"></i></span>
                    </div>
                    <div class="oei-error" id="oeiE-replacement_cost"></div>
                </div>

                {{-- Quantity --}}
                <div class="oei-group">
                    <div class="oei-wrap" id="oeiW-quantity">
                        <span class="oei-label">Quantity</span>
                        <input type="number" name="quantity" id="oeiF-quantity"
                               placeholder="e.g. 1" min="1"
                               value="{{ old('quantity', $item->quantity) }}" />
                        <span class="oei-icon"><i class="fas fa-hashtag"></i></span>
                    </div>
                    <div class="oei-error" id="oeiE-quantity"></div>
                </div>

                {{-- ── Images section spans right column bottom ── --}}
                <div class="oei-section-title" style="margin-top:8px;">
                    <div class="oei-st-icon"><i class="fas fa-images"></i></div>
                    <h3>Item Images</h3>
                </div>

                {{-- Current images --}}
                @if($item->images && $item->images->count())
                <div class="oei-group">
                    <p style="font-size:12px;color:var(--gray-500);margin-bottom:8px;font-weight:600;">
                        <i class="fas fa-photo-film" style="color:var(--primary);margin-right:4px;"></i>
                        Current images ({{ $item->images->count() }})
                    </p>
                    <div class="oei-images-grid">
                        @foreach($item->images as $image)
                        <div class="oei-img-item">
                            <img src="{{ asset('uploads/items/'.$image->image) }}"
                                 alt="Item image" />
                            <div class="oei-img-label">Current</div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Upload new images --}}
                <div class="oei-group">
                    <div class="oei-drop-zone" id="oeiDropZone">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p><strong>Click to upload</strong> or drag & drop new images</p>
                        <div class="oei-drop-hint">
                            JPG, PNG, WEBP, GIF, BMP, SVG, AVIF, HEIC · min 2, max 10 · 5 MB each
                        </div>
                        <input type="file" id="oeiImages" name="images[]"
                               multiple accept="image/*" />
                    </div>
                    <div class="oei-error" id="oeiE-images" style="margin-top:6px;"></div>
                    <div class="oei-new-previews" id="oeiNewPreviews"></div>
                </div>
            </div>

            {{-- ── ACTIONS ────────────────────────────────────── --}}
            <div class="oei-actions">
                <div>
                    <div class="oei-form-info">
                        <i class="fas fa-lock"></i> Changes are saved securely
                    </div>
                    <div class="oei-submit-hint" id="oeiHint">
                        <i class="fas fa-info-circle"></i> Fill all required fields to enable update
                    </div>
                </div>
                <div style="display:flex;gap:10px;flex-wrap:wrap;">
                    <a href="/owner/items" class="oei-btn oei-btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancel
                    </a>
                    <button type="submit" class="oei-btn oei-btn-primary" id="oeiSubmit" disabled>
                        <i class="fas fa-floppy-disk"></i> Save Changes
                    </button>
                </div>
            </div>

        </div>{{-- /oei-body --}}
    </form>

</div>{{-- /oei-card --}}
</div>{{-- /oei-main-content --}}


<script>
(function () {
    'use strict';

    // ── CONFIG ──────────────────────────────────────────────────
    // Single source of truth for image validation.
    // Change here → everything stays in sync.
    const IMG_CFG = {
        minImages:  2,
        maxImages:  10,
        maxSizeB:   5 * 1024 * 1024,
        extensions: ['jpg','jpeg','png','webp','gif','bmp','svg',
                     'tiff','tif','avif','heic','heif','ico'],
        mimeTypes:  ['image/jpeg','image/png','image/webp','image/gif',
                     'image/bmp','image/svg+xml','image/tiff',
                     'image/avif','image/heic','image/heif',
                     'image/x-icon','image/vnd.microsoft.icon']
    };

    const TEXT_FIELDS = [
        'title','category_id','description',
        'city','address',
        'rent_price_per_day','security_deposit','replacement_cost','quantity'
    ];

    // ── HELPERS ─────────────────────────────────────────────────
    const $id   = id => document.getElementById(id);
    const wrap  = id => $id('oeiW-' + id);
    const errEl = id => $id('oeiE-' + id);
    const fld   = id => $id('oeiF-' + id);

    function sanitize(v) {
        if (!v) return '';
        return v.trim()
            .replace(/\s+/g,' ')
            .replace(/<[^>]*>/g,'')
            .replace(/[<>]/g,'')
            .replace(/['";]/g,'')
            .replace(/[\x00-\x1F\x7F]/g,'')
            .replace(/javascript:/gi,'')
            .replace(/on\w+=/gi,'');
    }

    function sanitizeServerMsg(msg) {
        if (!msg || typeof msg !== 'string')
            return 'An unexpected error occurred.';
        const s = msg.replace(/<[^>]*>/g,' ').replace(/\s+/g,' ').trim();
        return s.length > 200
            ? 'The server returned an unexpected response. Please try again.'
            : s || 'An unexpected error occurred.';
    }

    // ── FLOATING LABELS ─────────────────────────────────────────
    function setupFloat(id) {
        const w = wrap(id); const f = fld(id);
        if (!w || !f) return;
        const toggle = () => (f.value || f === document.activeElement)
            ? w.classList.add('floated')
            : w.classList.remove('floated');
        ['focus','blur','input','change'].forEach(ev => f.addEventListener(ev, toggle));
        setTimeout(toggle, 30);
    }

    // ── VALIDATION STATE ─────────────────────────────────────────
    function setValid(id) {
        const w = wrap(id); const e = errEl(id);
        w?.classList.remove('is-invalid'); w?.classList.add('is-valid');
        if (e) { e.textContent=''; e.classList.remove('show'); }
    }
    function setInvalid(id, msg) {
        const w = wrap(id); const e = errEl(id);
        w?.classList.remove('is-valid'); w?.classList.add('is-invalid');
        if (e) { e.textContent=msg; e.classList.add('show'); }
    }

    // ── FIELD VALIDATION ────────────────────────────────────────
    function validateField(id) {
        const f = fld(id); if (!f) return true;
        const raw = f.value;
        const val = sanitize(raw);

        if (id === 'title') {
            if (!raw.trim())                            return setInvalid(id,'Item title is required.'), false;
            if (val.length < 5 || val.length > 100)    return setInvalid(id,'Title must be 5–100 characters.'), false;
            if (/^[0-9]+$/.test(val))                  return setInvalid(id,'Title cannot be only numbers.'), false;
            if (raw !== val)                            return setInvalid(id,'Title contains invalid characters.'), false;
        }
        if (id === 'category_id') {
            if (!raw)                                   return setInvalid(id,'Please select a category.'), false;
        }
        if (id === 'description') {
            if (!raw.trim())                            return setInvalid(id,'Description is required.'), false;
            if (val.length < 30)                        return setInvalid(id,'Description must be at least 30 characters.'), false;
            if (val.length > 2000)                      return setInvalid(id,'Description must not exceed 2000 characters.'), false;
            if (/(.)\1{10,}/.test(val))                 return setInvalid(id,'Contains excessive repeated characters.'), false;
        }
        if (id === 'city') {
            if (!raw.trim())                            return setInvalid(id,'City is required.'), false;
            if (!/^[a-zA-Z\s\-']+$/.test(val))         return setInvalid(id,'City name is invalid.'), false;
        }
        if (id === 'address') {
            if (!raw.trim())                            return setInvalid(id,'Address is required.'), false;
            if (val.length < 10)                        return setInvalid(id,'Address must be at least 10 characters.'), false;
            if (val.length > 255)                       return setInvalid(id,'Address must not exceed 255 characters.'), false;
        }
        if (id === 'rent_price_per_day') {
            const n = parseFloat(raw);
            if (!raw.trim() || isNaN(n) || n <= 0)     return setInvalid(id,'Enter a valid daily rent (> 0).'), false;
            if (n > 100000)                             return setInvalid(id,'Rent exceeds the allowed limit.'), false;
        }
        if (id === 'security_deposit') {
            const n = parseFloat(raw);
            if (!raw.trim() || isNaN(n) || n < 0)      return setInvalid(id,'Enter a valid deposit (≥ 0).'), false;
        }
        if (id === 'replacement_cost') {
            const n = parseFloat(raw);
            if (!raw.trim() || isNaN(n) || n < 0)      return setInvalid(id,'Enter a valid replacement cost (≥ 0).'), false;
        }
        if (id === 'quantity') {
            const n = parseInt(raw);
            if (!raw.trim() || isNaN(n) || n < 1)      return setInvalid(id,'Quantity must be at least 1.'), false;
            if (n > 1000)                               return setInvalid(id,'Quantity cannot exceed 1000.'), false;
        }

        setValid(id);
        return true;
    }

    // ── BUSINESS RULES ───────────────────────────────────────────
    function validateBusiness() {
        const rent    = parseFloat(fld('rent_price_per_day')?.value) || 0;
        const deposit = parseFloat(fld('security_deposit')?.value)   || 0;
        const replace = parseFloat(fld('replacement_cost')?.value)   || 0;
        let ok = true;
        if (deposit > 0 && rent > 0 && deposit < rent) {
            setInvalid('security_deposit','Security deposit must be ≥ daily rent.'); ok = false;
        }
        if (replace > 0 && deposit > 0 && replace < deposit) {
            setInvalid('replacement_cost','Replacement cost must be ≥ security deposit.'); ok = false;
        }
        if (rent > 0 && replace > 0 && rent > replace) {
            setInvalid('rent_price_per_day','Daily rent must not exceed replacement cost.'); ok = false;
        }
        return ok;
    }

    // ── SILENT CHECKS (drive button state) ──────────────────────
    function checkSilently(id) {
        const f = fld(id); if (!f) return true;
        const raw = f.value; const val = sanitize(raw);
        if (id === 'title')               return raw.trim() && val.length >= 5 && val.length <= 100 && !/^[0-9]+$/.test(val) && raw === val;
        if (id === 'category_id')         return !!raw;
        if (id === 'description')         return raw.trim() && val.length >= 30 && val.length <= 2000 && !/(.)\1{10,}/.test(val);
        if (id === 'city')                return raw.trim() && /^[a-zA-Z\s\-']+$/.test(val);
        if (id === 'address')             return raw.trim() && val.length >= 10 && val.length <= 255;
        if (id === 'rent_price_per_day')  { const n=parseFloat(raw); return raw.trim()&&!isNaN(n)&&n>0&&n<=100000; }
        if (id === 'security_deposit')    { const n=parseFloat(raw); return raw.trim()&&!isNaN(n)&&n>=0; }
        if (id === 'replacement_cost')    { const n=parseFloat(raw); return raw.trim()&&!isNaN(n)&&n>=0; }
        if (id === 'quantity')            { const n=parseInt(raw);   return raw.trim()&&!isNaN(n)&&n>=1&&n<=1000; }
        return true;
    }

    function checkBusinessSilently() {
        const rent    = parseFloat(fld('rent_price_per_day')?.value) || 0;
        const deposit = parseFloat(fld('security_deposit')?.value)   || 0;
        const replace = parseFloat(fld('replacement_cost')?.value)   || 0;
        if (deposit > 0 && rent > 0 && deposit < rent)   return false;
        if (replace > 0 && deposit > 0 && replace < deposit) return false;
        if (rent > 0 && replace > 0 && rent > replace)   return false;
        return true;
    }

    // ── IMAGE VALIDATION ────────────────────────────────────────
    let selectedFiles = [];

    function validateImages(files) {
        const errors = [];
        const count = files.length;
        if (count < IMG_CFG.minImages) {
            errors.push(`Upload at least ${IMG_CFG.minImages} images.`);
            return errors;
        }
        if (count > IMG_CFG.maxImages) {
            errors.push(`You can upload a maximum of ${IMG_CFG.maxImages} images.`);
            return errors;
        }
        for (let i = 0; i < count; i++) {
            const file = files[i];
            const ext  = file.name.split('.').pop().toLowerCase();
            const mime = file.type.toLowerCase();
            if (!IMG_CFG.extensions.includes(ext)) {
                errors.push(`"${file.name}" has an unsupported format.`); break;
            }
            if (file.size > IMG_CFG.maxSizeB) {
                errors.push(`"${file.name}" exceeds 5 MB.`); break;
            }
            const mimeBlank   = !mime || mime === 'application/octet-stream';
            const heicOrAvif  = ['heic','heif','avif'].includes(ext);
            if (!mimeBlank && !heicOrAvif) {
                if (!IMG_CFG.mimeTypes.includes(mime) && !mime.startsWith('image/')) {
                    errors.push(`"${file.name}" is not a valid image.`); break;
                }
            }
        }
        return errors;
    }

    function renderNewPreviews(files) {
        const area = $id('oeiNewPreviews');
        area.innerHTML = '';
        files.forEach((file, idx) => {
            const reader = new FileReader();
            reader.onload = ev => {
                const sz   = file.size > 1048576
                    ? (file.size/1048576).toFixed(1)+' MB'
                    : (file.size/1024).toFixed(0)+' KB';
                const div  = document.createElement('div');
                div.className = 'oei-preview-item';
                div.innerHTML = `
                    <img src="${ev.target.result}" alt="${file.name}" />
                    <span class="oei-sz">${sz}</span>
                    <button type="button" class="oei-remove" data-idx="${idx}">
                        <i class="fas fa-times"></i>
                    </button>`;
                area.appendChild(div);
            };
            reader.readAsDataURL(file);
        });
    }

    function handleFileChange(e) {
        selectedFiles = Array.from(e.target.files);
        const errs   = validateImages(selectedFiles);
        const errDiv = $id('oeiE-images');
        if (errs.length) {
            errDiv.textContent = errs[0]; errDiv.classList.add('show');
        } else {
            errDiv.textContent = ''; errDiv.classList.remove('show');
        }
        if (selectedFiles.length) renderNewPreviews(selectedFiles);
        else $id('oeiNewPreviews').innerHTML = '';
        updateBtn();
    }

    // Remove preview
    $id('oeiNewPreviews').addEventListener('click', e => {
        const btn = e.target.closest('.oei-remove');
        if (!btn) return;
        const idx = parseInt(btn.dataset.idx);
        const dt  = new DataTransfer();
        selectedFiles.splice(idx, 1);
        selectedFiles.forEach(f => dt.items.add(f));
        $id('oeiImages').files = dt.files;
        const errs   = validateImages(selectedFiles);
        const errDiv = $id('oeiE-images');
        if (errs.length) { errDiv.textContent=errs[0]; errDiv.classList.add('show'); }
        else              { errDiv.textContent='';     errDiv.classList.remove('show'); }
        renderNewPreviews(selectedFiles);
        if (!selectedFiles.length) $id('oeiImages').value = '';
        updateBtn();
    });

    // Drag & drop
    const drop = $id('oeiDropZone');
    ['dragenter','dragover','dragleave','drop'].forEach(ev =>
        drop.addEventListener(ev, e => { e.preventDefault(); e.stopPropagation(); })
    );
    drop.addEventListener('dragover',  () => drop.classList.add('dragover'));
    drop.addEventListener('dragleave', () => drop.classList.remove('dragover'));
    drop.addEventListener('drop', e => {
        drop.classList.remove('dragover');
        if (e.dataTransfer.files.length) {
            $id('oeiImages').files = e.dataTransfer.files;
            handleFileChange({ target: $id('oeiImages') });
        }
    });
    $id('oeiImages').addEventListener('change', handleFileChange);

    // ── BUTTON STATE ─────────────────────────────────────────────
    function isFormReady() {
        const fieldsOk  = TEXT_FIELDS.every(checkSilently);
        const bizOk     = checkBusinessSilently();
        // Images are optional on edit — owner may keep existing images.
        // Only gate on images if they've started uploading new ones.
        const imgOk = selectedFiles.length === 0
            || validateImages(selectedFiles).length === 0;
        return fieldsOk && bizOk && imgOk;
    }

    function updateBtn() {
        const btn   = $id('oeiSubmit');
        const hint  = $id('oeiHint');
        const ready = isFormReady();
        btn.disabled = !ready;
        if (ready) {
            hint.className = 'oei-submit-hint ready';
            hint.innerHTML = '<i class="fas fa-check-circle"></i> All fields look good — ready to save';
        } else {
            hint.className = 'oei-submit-hint';
            hint.innerHTML = '<i class="fas fa-info-circle"></i> Fill all required fields to enable update';
        }
    }

    // ── TOAST ────────────────────────────────────────────────────
    window.oeiHideToast = () => $id('oeiToast')?.classList.remove('show');

    function showToast(title, msg, type='success') {
        const t    = $id('oeiToast');
        const icon = $id('oeiToastIcon');
        $id('oeiToastTitle').textContent = title;
        $id('oeiToastMsg').textContent   = msg;
        if (type === 'error') {
            icon.className = 'fas fa-exclamation-circle';
            t.style.borderLeftColor = 'var(--primary)';
        } else {
            icon.className = 'fas fa-check-circle';
            t.style.borderLeftColor = 'var(--success)';
        }
        t.classList.add('show');
        setTimeout(() => t.classList.remove('show'), 4500);
    }

    // ── LOADING ANIMATION ────────────────────────────────────────
    const delay = ms => new Promise(r => setTimeout(r, ms));

    async function showLoading() {
        $id('oeiLoading').classList.add('active');
        const steps = [$id('oeiS1'),$id('oeiS2'),$id('oeiS3')];
        const fill  = $id('oeiLoadFill');
        for (let i = 0; i < steps.length; i++) {
            steps[i].classList.add('active');
            fill.style.width = ((i+1)/steps.length*100) + '%';
            await delay(480);
        }
        await delay(350);
        $id('oeiLoading').classList.remove('active');
    }

    // ── SUBMIT ───────────────────────────────────────────────────
    let submitting = false;

    $id('oeiForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        // Full validation pass with DOM feedback
        let allValid = true;
        let firstBad = null;
        TEXT_FIELDS.forEach(id => {
            if (!validateField(id)) {
                allValid = false;
                if (!firstBad) firstBad = fld(id);
            }
        });
        if (!validateBusiness()) allValid = false;

        // Images: only validate if new ones were selected
        if (selectedFiles.length > 0) {
            const imgErrs = validateImages(selectedFiles);
            if (imgErrs.length) {
                allValid = false;
                const e = $id('oeiE-images');
                e.textContent = imgErrs[0]; e.classList.add('show');
            }
        }

        if (!allValid) {
            if (firstBad) { firstBad.focus(); firstBad.scrollIntoView({behavior:'smooth',block:'center'}); }
            showToast('Fix highlighted fields','Some details need your attention.','error');
            return;
        }

        if (submitting) return;
        submitting = true;
        updateBtn();

        const btn = $id('oeiSubmit');
        btn.innerHTML = '<span class="oei-spinner"></span> Saving...';

        await showLoading();

        const formData = new FormData(this);
        const csrf     = document.querySelector('input[name="_token"]');

        try {
            const response = await fetch(this.action, {
                method: 'POST',
                body:   formData,
                headers: {
                    'X-CSRF-TOKEN':      csrf ? csrf.value : '',
                    'X-Requested-With':  'XMLHttpRequest',
                    'Accept':            'application/json'
                }
            });

            const contentType = response.headers.get('content-type') || '';
            let data = null;
            if (contentType.includes('application/json')) {
                try { data = await response.json(); } catch(_) { data = null; }
            }

            if (response.ok) {
                // Any 2xx = success
                $id('oeiSuccess').classList.add('active');
                showToast('Item updated!','Your changes have been saved.','success');
                return;
            }

            // Error branches — never show raw HTML
            if (response.status === 422 && data?.errors) {
                const first = Object.values(data.errors)[0];
                const msg   = Array.isArray(first) && first.length ? first[0] : 'Validation failed.';
                showToast('Validation error', msg, 'error');
            } else if (response.status === 419) {
                showToast('Session expired','Please refresh the page and try again.','error');
            } else if (response.status === 401 || response.status === 403) {
                showToast('Unauthorized','You are not allowed to perform this action.','error');
            } else if (response.status >= 500) {
                showToast('Server error','The server encountered a problem. Please try again.','error');
            } else if (data?.message) {
                showToast('Error', sanitizeServerMsg(data.message), 'error');
            } else {
                showToast('Failed',`HTTP ${response.status} — please try again.`,'error');
            }

        } catch(netErr) {
            console.error('Network error:', netErr);
            showToast('Connection error','Could not reach the server. Check your internet connection.','error');
        } finally {
            submitting = false;
            btn.innerHTML = '<i class="fas fa-floppy-disk"></i> Save Changes';
            updateBtn();
        }
    });

    // ── INIT ─────────────────────────────────────────────────────
    TEXT_FIELDS.forEach(setupFloat);

    TEXT_FIELDS.forEach(id => {
        const f = fld(id); if (!f) return;
        ['input','blur','change'].forEach(ev => f.addEventListener(ev, () => {
            validateField(id);
            if (['rent_price_per_day','security_deposit','replacement_cost'].includes(id)) {
                validateBusiness();
            }
            updateBtn();
        }));
    });

    updateBtn();

})();
</script>
</body>
</html>