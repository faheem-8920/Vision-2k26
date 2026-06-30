@extends('admin.layout')

@section('content')

<style>
    /* ============================================================
       EDIT ITEM — scoped styles, no layout overrides
       All class names prefixed with "ei-" to avoid collisions
       with anything the admin layout already defines.
       ============================================================ */
    :root {
        --ei-red:        #dc3545;
        --ei-red-dark:   #b02a37;
        --ei-red-darker: #8c2128;
        --ei-red-light:  #fce4e6;
        --ei-red-lighter:#fdf3f4;
        --ei-red-glow:   rgba(220,53,69,.18);
        --ei-success:    #198754;
        --ei-success-lt: #e7f6ee;
        --ei-success-gw: rgba(25,135,84,.18);
        --ei-gray-50:  #f8f9fa;
        --ei-gray-100: #f1f3f5;
        --ei-gray-200: #e9ecef;
        --ei-gray-300: #dee2e6;
        --ei-gray-400: #ced4da;
        --ei-gray-500: #adb5bd;
        --ei-gray-600: #6c757d;
        --ei-gray-700: #495057;
        --ei-gray-800: #343a40;
        --ei-gray-900: #212529;
        --ei-radius:   10px;
        --ei-radius-lg:16px;
        --ei-shadow:   0 4px 14px rgba(0,0,0,.06);
        --ei-shadow-lg:0 12px 40px rgba(0,0,0,.10);
        --ei-ease:     .25s cubic-bezier(.4,0,.2,1);
    }

    /* Page wrapper */
    .ei-page {
        padding: 28px 24px 48px;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    /* Card */
    .ei-card {
        background: #fff;
        border-radius: var(--ei-radius-lg);
        box-shadow: var(--ei-shadow-lg);
        overflow: hidden;
        max-width: 960px;
        border: 1px solid rgba(220,53,69,.08);
    }

    /* Header */
    .ei-header {
        background: linear-gradient(135deg, var(--ei-red), var(--ei-red-dark));
        padding: 26px 34px;
        color: #fff;
        position: relative;
        overflow: hidden;
    }
    .ei-header::after {
        content: '';
        position: absolute;
        bottom: 0; left: 0; right: 0;
        height: 3px;
        background: rgba(255,255,255,.22);
    }
    .ei-header-inner {
        display: flex;
        align-items: center;
        gap: 16px;
    }
    .ei-header-icon {
        width: 48px; height: 48px;
        background: rgba(255,255,255,.18);
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 22px;
        backdrop-filter: blur(4px);
        transition: var(--ei-ease);
        flex-shrink: 0;
    }
    .ei-header:hover .ei-header-icon {
        transform: rotate(-6deg) scale(1.06);
        background: rgba(255,255,255,.26);
    }
    .ei-header h1 {
        font-size: 22px; font-weight: 800;
        letter-spacing: -.02em; margin: 0 0 2px;
    }
    .ei-header p {
        font-size: 13px; opacity: .82; margin: 0; font-weight: 400;
    }
    .ei-badge {
        margin-left: auto;
        background: rgba(255,255,255,.18);
        border: 1px solid rgba(255,255,255,.3);
        border-radius: 20px;
        padding: 5px 14px;
        font-size: 12px; font-weight: 700;
        letter-spacing: .4px;
        color: #fff;
        white-space: nowrap;
    }

    /* Body grid */
    .ei-body {
        padding: 32px 34px 28px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 32px;
    }
    @media (max-width: 768px) {
        .ei-body { grid-template-columns: 1fr; gap: 20px; padding: 22px 18px; }
        .ei-header { padding: 20px 18px; }
        .ei-badge { display: none; }
    }

    /* Section */
    .ei-section-title {
        display: flex; align-items: center; gap: 10px;
        margin-bottom: 20px; padding-bottom: 10px;
        border-bottom: 2px solid var(--ei-red-light);
    }
    .ei-section-title i {
        width: 32px; height: 32px;
        background: var(--ei-red-light);
        border-radius: 8px;
        display: flex; align-items: center; justify-content: center;
        color: var(--ei-red); font-size: 14px;
        transition: var(--ei-ease);
    }
    .ei-section-title:hover i {
        background: var(--ei-red);
        color: #fff;
        transform: rotate(-5deg);
    }
    .ei-section-title h3 {
        font-size: 13px; font-weight: 700;
        color: var(--ei-gray-900);
        letter-spacing: .4px; text-transform: uppercase;
        margin: 0;
    }

    /* Form group */
    .ei-group { margin-bottom: 20px; position: relative; }

    /* Input wrapper */
    .ei-wrap {
        position: relative;
        border-radius: var(--ei-radius);
        background: #fff;
        border: 2px solid var(--ei-gray-200);
        min-height: 52px;
        transition: border-color var(--ei-ease),
                    box-shadow   var(--ei-ease),
                    background   var(--ei-ease);
    }
    .ei-wrap:hover   { border-color: var(--ei-gray-300); }
    .ei-wrap:focus-within {
        border-color: var(--ei-red);
        box-shadow: 0 0 0 4px var(--ei-red-glow);
    }
    .ei-wrap.is-valid   { border-color: var(--ei-success); background: var(--ei-success-lt); }
    .ei-wrap.is-valid:focus-within { box-shadow: 0 0 0 4px var(--ei-success-gw); }
    .ei-wrap.is-invalid { border-color: var(--ei-red); background: var(--ei-red-lighter); }
    .ei-wrap.is-invalid:focus-within { box-shadow: 0 0 0 4px var(--ei-red-glow); }
    .ei-wrap.is-textarea { min-height: 88px; }

    /* Floating label */
    .ei-label {
        position: absolute;
        left: 13px; top: 50%;
        transform: translateY(-50%);
        font-size: 13.5px; color: var(--ei-gray-500);
        pointer-events: none;
        transition: all var(--ei-ease);
        background: transparent; padding: 0 4px;
        font-weight: 500; z-index: 2;
    }
    .ei-wrap.is-textarea .ei-label { top: 15px; transform: none; }
    .ei-wrap.floated .ei-label {
        top: -9px; left: 11px;
        font-size: 10.5px; font-weight: 700;
        letter-spacing: .4px; text-transform: uppercase;
        color: var(--ei-red); background: #fff; padding: 0 5px;
    }
    .ei-wrap.is-valid.floated   .ei-label { color: var(--ei-success); background: var(--ei-success-lt); }
    .ei-wrap.is-invalid.floated .ei-label { color: var(--ei-red);     background: var(--ei-red-lighter); }

    /* Inputs */
    .ei-wrap input,
    .ei-wrap select,
    .ei-wrap textarea {
        width: 100%; padding: 15px 42px 11px 13px;
        border: none; background: transparent;
        font-size: 13.5px; font-family: inherit;
        color: var(--ei-gray-900); outline: none;
        border-radius: var(--ei-radius);
        position: relative; z-index: 1; min-height: 50px;
    }
    .ei-wrap textarea {
        min-height: 86px; resize: vertical; padding-top: 17px;
    }
    .ei-wrap select {
        appearance: none; -webkit-appearance: none;
        cursor: pointer;
    }
    .ei-wrap input::placeholder,
    .ei-wrap textarea::placeholder {
        color: var(--ei-gray-400); font-weight: 400;
        opacity: 0; transition: opacity var(--ei-ease);
    }
    .ei-wrap.floated input::placeholder,
    .ei-wrap.floated textarea::placeholder { opacity: 1; }

    /* Icon */
    .ei-icon {
        position: absolute; right: 13px; top: 50%;
        transform: translateY(-50%);
        color: var(--ei-gray-400); font-size: 15px;
        pointer-events: none; z-index: 2;
        transition: color var(--ei-ease);
    }
    .ei-wrap.is-textarea .ei-icon { top: 17px; transform: none; }
    .ei-wrap:focus-within .ei-icon { color: var(--ei-red); }
    .ei-wrap.is-valid     .ei-icon { color: var(--ei-success); }
    .ei-wrap.is-invalid   .ei-icon { color: var(--ei-red); }

    /* Check/cross pseudo via ::after — same trick as Add Item */
    .ei-wrap::after {
        content: ''; position: absolute;
        right: 40px; top: 50%; transform: translateY(-50%);
        font-family: 'Font Awesome 6 Free'; font-weight: 900;
        font-size: 14px; z-index: 2; display: none;
        pointer-events: none; animation: ei-popCheck .25s ease;
    }
    .ei-wrap.is-textarea::after { top: 19px; transform: none; }
    .ei-wrap.is-valid::after   { content: '\f00c'; display: block; color: var(--ei-success); }
    .ei-wrap.is-invalid::after { content: '\f00d'; display: block; color: var(--ei-red); }
    @keyframes ei-popCheck {
        0%   { opacity:0; transform:translateY(-50%) scale(.5); }
        100% { opacity:1; transform:translateY(-50%) scale(1); }
    }

    /* Error message */
    .ei-error {
        font-size: 11.5px; color: var(--ei-red);
        margin-top: 4px; display: none;
        align-items: center; gap: 5px;
        font-weight: 600; animation: ei-slide .22s ease;
    }
    .ei-error.show { display: flex; }
    @keyframes ei-slide {
        from { opacity:0; transform:translateY(-3px); }
        to   { opacity:1; transform:translateY(0); }
    }

    /* Status badge inside select wrapper */
    .ei-status-dot {
        position: absolute; left: 13px; top: 50%;
        transform: translateY(-50%);
        width: 8px; height: 8px; border-radius: 50%;
        z-index: 3; pointer-events: none;
        transition: background var(--ei-ease);
    }
    .ei-wrap.has-status input,
    .ei-wrap.has-status select { padding-left: 32px; }

    /* Actions bar */
    .ei-actions {
        grid-column: span 2;
        padding-top: 22px;
        border-top: 1px solid var(--ei-gray-200);
        display: flex; justify-content: space-between;
        align-items: center; flex-wrap: wrap; gap: 14px;
    }
    @media (max-width: 768px) {
        .ei-actions { grid-column: span 1; flex-direction: column; align-items: stretch; }
    }
    .ei-form-info { font-size: 11.5px; color: var(--ei-gray-600); }
    .ei-form-info i { color: var(--ei-red); margin-right: 5px; }

    .ei-submit-hint {
        font-size: 11px; color: var(--ei-gray-500);
        margin-top: 5px; display: flex; align-items: center; gap: 5px;
        transition: var(--ei-ease);
    }
    .ei-submit-hint.ready { color: var(--ei-success); font-weight: 600; }

    /* Buttons */
    .ei-btn {
        padding: 12px 28px; border: none;
        border-radius: var(--ei-radius);
        font-size: 13.5px; font-weight: 700; cursor: pointer;
        transition: all var(--ei-ease);
        display: inline-flex; align-items: center; gap: 9px;
        letter-spacing: .3px; text-decoration: none;
        font-family: inherit;
    }
    .ei-btn-primary {
        background: linear-gradient(135deg, var(--ei-red), var(--ei-red-dark));
        color: #fff;
        box-shadow: 0 4px 14px rgba(220,53,69,.30);
    }
    .ei-btn-primary:hover:not(:disabled) {
        transform: translateY(-3px);
        box-shadow: 0 8px 24px rgba(220,53,69,.40);
    }
    .ei-btn-primary:active:not(:disabled) { transform: scale(.97); }
    .ei-btn-primary:disabled {
        opacity: .52; cursor: not-allowed;
        transform: none !important;
        background: var(--ei-gray-300) !important;
        color: var(--ei-gray-600) !important;
        box-shadow: none !important;
    }
    .ei-btn-secondary {
        background: var(--ei-gray-100); color: var(--ei-gray-700);
        border: 1px solid var(--ei-gray-300);
    }
    .ei-btn-secondary:hover { background: var(--ei-gray-200); transform: translateY(-2px); }

    .ei-spinner {
        display: inline-block; width: 16px; height: 16px;
        border: 2.5px solid rgba(255,255,255,.3);
        border-top-color: #fff; border-radius: 50%;
        animation: ei-spin .7s linear infinite;
    }
    @keyframes ei-spin { to { transform: rotate(360deg); } }

    /* Toast */
    .ei-toast {
        position: fixed; top: 22px; right: 22px;
        background: #fff; padding: 14px 18px;
        border-radius: var(--ei-radius);
        box-shadow: var(--ei-shadow-lg);
        display: flex; align-items: center; gap: 12px;
        z-index: 9999;
        transform: translateX(120%);
        transition: transform .35s cubic-bezier(.175,.885,.32,1.275);
        border-left: 5px solid var(--ei-red);
        max-width: 380px; min-width: 260px;
    }
    .ei-toast.show { transform: translateX(0); }
    .ei-toast-icon {
        width: 26px; height: 26px; border-radius: 50%;
        background: var(--ei-red);
        display: flex; align-items: center; justify-content: center;
        color: #fff; font-size: 12px; flex-shrink: 0;
    }
    .ei-toast-title { font-size: 13px; font-weight: 700; color: var(--ei-gray-900); }
    .ei-toast-msg   { font-size: 11.5px; color: var(--ei-gray-600); margin-top: 1px; }
    .ei-toast-close {
        background: none; border: none; color: var(--ei-gray-400);
        cursor: pointer; font-size: 16px; padding: 0;
        width: 26px; height: 26px; display: flex;
        align-items: center; justify-content: center;
        transition: var(--ei-ease); margin-left: auto;
    }
    .ei-toast-close:hover { color: var(--ei-gray-700); transform: rotate(90deg); }

    /* Loading overlay */
    .ei-loading {
        position: fixed; inset: 0;
        background: rgba(255,255,255,.92);
        display: none; justify-content: center; align-items: center;
        z-index: 9998; backdrop-filter: blur(5px);
    }
    .ei-loading.active { display: flex; animation: ei-fade .3s ease; }
    .ei-loading-inner {
        text-align: center; max-width: 360px; padding: 36px;
    }
    .ei-loading-inner i {
        font-size: 44px; color: var(--ei-red); margin-bottom: 16px; display: block;
    }
    .ei-loading-inner h3 { font-size: 18px; font-weight: 700; margin-bottom: 6px; }
    .ei-loading-inner p  { font-size: 13px; color: var(--ei-gray-600); margin-bottom: 20px; }
    .ei-load-bar {
        background: var(--ei-gray-200); height: 5px;
        border-radius: 4px; overflow: hidden; margin-top: 16px;
    }
    .ei-load-fill {
        background: var(--ei-red); height: 100%; width: 0%;
        transition: width .4s ease; border-radius: 4px;
    }
    .ei-load-steps { margin: 18px 0; }
    .ei-load-step {
        display: flex; align-items: center; gap: 10px;
        margin-bottom: 12px; opacity: .38; transition: opacity .3s;
    }
    .ei-load-step.active { opacity: 1; }
    .ei-step-num {
        width: 24px; height: 24px; border-radius: 50%;
        background: var(--ei-gray-200);
        display: flex; align-items: center; justify-content: center;
        font-size: 11px; font-weight: 700; color: var(--ei-gray-600);
        transition: var(--ei-ease);
    }
    .ei-load-step.active .ei-step-num {
        background: var(--ei-red); color: #fff; transform: scale(1.1);
    }
    .ei-step-txt { font-size: 13px; font-weight: 500; }

    /* Success overlay */
    .ei-success {
        position: fixed; top: 50%; left: 50%;
        transform: translate(-50%,-50%) scale(.92);
        background: #fff; border-radius: var(--ei-radius-lg);
        box-shadow: var(--ei-shadow-lg);
        padding: 40px 36px 32px;
        text-align: center; max-width: 460px; width: 92%;
        display: none; z-index: 9999; opacity: 0;
        animation: ei-popIn .42s cubic-bezier(.175,.885,.32,1.275) forwards;
        border: 2px solid var(--ei-red-light);
    }
    .ei-success.active { display: block; }
    @keyframes ei-popIn {
        to { opacity:1; transform:translate(-50%,-50%) scale(1); }
    }
    .ei-success-icon {
        width: 70px; height: 70px;
        background: linear-gradient(135deg, var(--ei-red), var(--ei-red-dark));
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 18px; font-size: 30px; color: #fff;
        box-shadow: 0 8px 28px rgba(220,53,69,.28);
        animation: ei-bounce .55s ease .1s both;
    }
    @keyframes ei-bounce {
        0%  { transform: scale(0); }
        60% { transform: scale(1.1); }
        100%{ transform: scale(1); }
    }
    .ei-success h2 { font-size: 20px; font-weight: 800; margin-bottom: 8px; }
    .ei-success p  { font-size: 14px; color: var(--ei-gray-600); line-height: 1.65; }
    .ei-success-note {
        background: var(--ei-gray-50); border: 1px solid var(--ei-gray-200);
        border-radius: var(--ei-radius); padding: 10px 14px;
        font-size: 12px; color: var(--ei-gray-600);
        display: flex; align-items: flex-start; gap: 7px;
        text-align: left; margin-top: 14px;
    }
    .ei-success-note i { color: var(--ei-red); margin-top: 1px; flex-shrink: 0; }

    @keyframes ei-fade {
        from { opacity:0; } to { opacity:1; }
    }
</style>

{{-- Toast --}}
<div class="ei-toast" id="eiToast">
    <div class="ei-toast-icon"><i class="fas fa-check" id="eiToastIcon"></i></div>
    <div>
        <div class="ei-toast-title"  id="eiToastTitle">Updated!</div>
        <div class="ei-toast-msg"    id="eiToastMsg">Item saved successfully.</div>
    </div>
    <button class="ei-toast-close" onclick="eiHideToast()"><i class="fas fa-times"></i></button>
</div>

{{-- Loading --}}
<div class="ei-loading" id="eiLoading">
    <div class="ei-loading-inner">
        <i class="fas fa-pencil-alt fa-spin"></i>
        <h3>Saving Changes</h3>
        <p>Please wait while we update the item</p>
        <div class="ei-load-steps">
            <div class="ei-load-step active" id="eiStep1">
                <div class="ei-step-num">1</div>
                <div class="ei-step-txt">Validating fields</div>
            </div>
            <div class="ei-load-step" id="eiStep2">
                <div class="ei-step-num">2</div>
                <div class="ei-step-txt">Saving to database</div>
            </div>
            <div class="ei-load-step" id="eiStep3">
                <div class="ei-step-num">3</div>
                <div class="ei-step-txt">Applying changes</div>
            </div>
        </div>
        <div class="ei-load-bar"><div class="ei-load-fill" id="eiLoadFill"></div></div>
    </div>
</div>

{{-- Success --}}
<div class="ei-success" id="eiSuccess">
    <div class="ei-success-icon"><i class="fas fa-check"></i></div>
    <h2>Item Updated!</h2>
    <p>The item has been successfully saved. Changes are now live in the system.</p>
    <div class="ei-success-note">
        <i class="fas fa-info-circle"></i>
        <span>You can continue editing or go back to the items list.</span>
    </div>
    <div style="display:flex;gap:10px;justify-content:center;margin-top:18px;flex-wrap:wrap;">
        <button class="ei-btn ei-btn-secondary" onclick="document.getElementById('eiSuccess').classList.remove('active')" style="padding:9px 22px;font-size:13px;">
            <i class="fas fa-pen"></i> Keep Editing
        </button>
        <a href="/admin/items" class="ei-btn ei-btn-primary" style="padding:9px 22px;font-size:13px;">
            <i class="fas fa-list"></i> Back to Items
        </a>
    </div>
</div>

<div class="ei-page">
<div class="ei-card">

    {{-- Header --}}
    <div class="ei-header">
        <div class="ei-header-inner">
            <div class="ei-header-icon"><i class="fas fa-pen-to-square"></i></div>
            <div>
                <h1>Edit Item</h1>
                <p>Update the details below and save your changes</p>
            </div>
            <div class="ei-badge"># {{ $item->id }}</div>
        </div>
    </div>

    {{-- Form --}}
    <form id="eiForm" action="/admin/items/update/{{ $item->id }}" method="POST" novalidate>
        @csrf

        <div class="ei-body">

            {{-- LEFT: Item Details --}}
            <div>
                <div class="ei-section-title">
                    <i class="fas fa-tag"></i>
                    <h3>Item Details</h3>
                </div>

                {{-- Title --}}
                <div class="ei-group">
                    <div class="ei-wrap" id="eiW-title">
                        <span class="ei-label">Item Title</span>
                        <input type="text" name="title" id="eiF-title"
                               placeholder="e.g. Canon EOS R5 Camera"
                               value="{{ old('title', $item->title) }}" />
                        <span class="ei-icon"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <div class="ei-error" id="eiE-title"></div>
                </div>

                {{-- Category --}}
                <div class="ei-group">
                    <div class="ei-wrap" id="eiW-category_id">
                        <span class="ei-label">Category</span>
                        <select name="category_id" id="eiF-category_id">
                            <option value="" disabled>Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <span class="ei-icon"><i class="fas fa-list"></i></span>
                    </div>
                    <div class="ei-error" id="eiE-category_id"></div>
                </div>

                {{-- Description --}}
                <div class="ei-group">
                    <div class="ei-wrap is-textarea" id="eiW-description">
                        <span class="ei-label">Description</span>
                        <textarea name="description" id="eiF-description"
                                  placeholder="e.g. Professional mirrorless camera, barely used, includes 2 batteries and original box."
                                  style="top:17px;transform:none;">{{ old('description', $item->description) }}</textarea>
                        <span class="ei-icon" style="top:17px;transform:none;"><i class="fas fa-align-left"></i></span>
                    </div>
                    <div class="ei-error" id="eiE-description"></div>
                </div>

                {{-- City --}}
                <div class="ei-group">
                    <div class="ei-wrap" id="eiW-city">
                        <span class="ei-label">City</span>
                        <input type="text" name="city" id="eiF-city"
                               placeholder="e.g. Karachi"
                               value="{{ old('city', $item->city) }}" />
                        <span class="ei-icon"><i class="fas fa-city"></i></span>
                    </div>
                    <div class="ei-error" id="eiE-city"></div>
                </div>

                {{-- Address --}}
                <div class="ei-group">
                    <div class="ei-wrap is-textarea" id="eiW-address">
                        <span class="ei-label">Address</span>
                        <textarea name="address" id="eiF-address"
                                  placeholder="e.g. House 12, Block C, Gulshan-e-Iqbal"
                                  style="top:17px;transform:none;">{{ old('address', $item->address) }}</textarea>
                        <span class="ei-icon" style="top:17px;transform:none;"><i class="fas fa-map-pin"></i></span>
                    </div>
                    <div class="ei-error" id="eiE-address"></div>
                </div>
            </div>

            {{-- RIGHT: Pricing, Stock, Status --}}
            <div>
                <div class="ei-section-title">
                    <i class="fas fa-dollar-sign"></i>
                    <h3>Pricing &amp; Stock</h3>
                </div>

                {{-- Rent Per Day --}}
                <div class="ei-group">
                    <div class="ei-wrap" id="eiW-rent_price_per_day">
                        <span class="ei-label">Rent Per Day ($)</span>
                        <input type="number" name="rent_price_per_day" id="eiF-rent_price_per_day"
                               placeholder="e.g. 25.00" step="0.01" min="1"
                               value="{{ old('rent_price_per_day', $item->rent_price_per_day) }}" />
                        <span class="ei-icon"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                    <div class="ei-error" id="eiE-rent_price_per_day"></div>
                </div>

                {{-- Security Deposit --}}
                <div class="ei-group">
                    <div class="ei-wrap" id="eiW-security_deposit">
                        <span class="ei-label">Security Deposit ($)</span>
                        <input type="number" name="security_deposit" id="eiF-security_deposit"
                               placeholder="e.g. 100.00" step="0.01" min="0"
                               value="{{ old('security_deposit', $item->security_deposit) }}" />
                        <span class="ei-icon"><i class="fas fa-shield-alt"></i></span>
                    </div>
                    <div class="ei-error" id="eiE-security_deposit"></div>
                </div>

                {{-- Replacement Cost --}}
                <div class="ei-group">
                    <div class="ei-wrap" id="eiW-replacement_cost">
                        <span class="ei-label">Replacement Cost ($)</span>
                        <input type="number" name="replacement_cost" id="eiF-replacement_cost"
                               placeholder="e.g. 1800.00" step="0.01" min="0"
                               value="{{ old('replacement_cost', $item->replacement_cost) }}" />
                        <span class="ei-icon"><i class="fas fa-exchange-alt"></i></span>
                    </div>
                    <div class="ei-error" id="eiE-replacement_cost"></div>
                </div>

                {{-- Quantity --}}
                <div class="ei-group">
                    <div class="ei-wrap" id="eiW-quantity">
                        <span class="ei-label">Quantity</span>
                        <input type="number" name="quantity" id="eiF-quantity"
                               placeholder="e.g. 1" min="1"
                               value="{{ old('quantity', $item->quantity) }}" />
                        <span class="ei-icon"><i class="fas fa-hashtag"></i></span>
                    </div>
                    <div class="ei-error" id="eiE-quantity"></div>
                </div>

                {{-- Status --}}
                <div class="ei-group">
                    <div class="ei-section-title" style="margin-top:8px;">
                        <i class="fas fa-toggle-on"></i>
                        <h3>Item Status</h3>
                    </div>
                    <div class="ei-wrap" id="eiW-status">
                        <span class="ei-label">Status</span>
                        <span class="ei-status-dot" id="eiStatusDot"></span>
                        <select name="status" id="eiF-status" style="padding-left:32px;">
                            @php
                                $statuses = [
                                    'pending'  => ['label' => 'Pending',  'color' => '#f59e0b'],
                                    'approved' => ['label' => 'Approved', 'color' => '#3b82f6'],
                                    'available'=> ['label' => 'Available','color' => '#10b981'],
                                    'rented'   => ['label' => 'Rented',   'color' => '#8b5cf6'],
                                    'rejected' => ['label' => 'Rejected', 'color' => '#ef4444'],
                                    'inactive' => ['label' => 'Inactive', 'color' => '#9ca3af'],
                                ];
                            @endphp
                            @foreach($statuses as $val => $meta)
                                <option value="{{ $val }}"
                                    data-color="{{ $meta['color'] }}"
                                    {{ old('status', $item->status) === $val ? 'selected' : '' }}>
                                    {{ $meta['label'] }}
                                </option>
                            @endforeach
                        </select>
                        <span class="ei-icon"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="ei-error" id="eiE-status"></div>
                </div>
            </div>

            {{-- Actions --}}
            <div class="ei-actions">
                <div>
                    <div class="ei-form-info">
                        <i class="fas fa-lock"></i> Changes are saved securely
                    </div>
                    <div class="ei-submit-hint" id="eiHint">
                        <i class="fas fa-info-circle"></i> Fill all required fields to enable update
                    </div>
                </div>
                <div style="display:flex;gap:10px;flex-wrap:wrap;">
                    <a href="/admin/items" class="ei-btn ei-btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancel
                    </a>
                    <button type="submit" class="ei-btn ei-btn-primary" id="eiSubmit" disabled>
                        <i class="fas fa-floppy-disk"></i> Save Changes
                    </button>
                </div>
            </div>

        </div>{{-- /ei-body --}}
    </form>

</div>{{-- /ei-card --}}
</div>{{-- /ei-page --}}

<script>
(function () {
    'use strict';

    // ── CONFIG ───────────────────────────────────────────────────
    const FIELDS = ['title','category_id','description','city','address',
                    'rent_price_per_day','security_deposit','replacement_cost',
                    'quantity','status'];

    // ── HELPERS ──────────────────────────────────────────────────
    const $ = id => document.getElementById(id);
    const wrap  = id => $('eiW-' + id);
    const err   = id => $('eiE-' + id);
    const field = id => $('eiF-' + id);

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
        if (!msg || typeof msg !== 'string') return 'An unexpected error occurred.';
        const stripped = msg.replace(/<[^>]*>/g,' ').replace(/\s+/g,' ').trim();
        if (stripped.length > 200) return 'The server returned an unexpected response. Please try again.';
        return stripped || 'An unexpected error occurred.';
    }

    // ── FLOATING LABELS ──────────────────────────────────────────
    function setupFloat(id) {
        const w = wrap(id);
        const f = field(id);
        if (!w || !f) return;
        const toggle = () => {
            (f.value || f === document.activeElement)
                ? w.classList.add('floated')
                : w.classList.remove('floated');
        };
        ['focus','blur','input','change'].forEach(ev => f.addEventListener(ev, toggle));
        setTimeout(toggle, 30);
    }

    // ── STATUS DOT ───────────────────────────────────────────────
    function updateStatusDot() {
        const sel = field('status');
        const dot = $('eiStatusDot');
        if (!sel || !dot) return;
        const opt = sel.options[sel.selectedIndex];
        dot.style.background = opt ? (opt.dataset.color || '#adb5bd') : '#adb5bd';
    }

    // ── VALIDATION ───────────────────────────────────────────────
    function setValid(id) {
        wrap(id)?.classList.remove('is-invalid');
        wrap(id)?.classList.add('is-valid');
        const e = err(id);
        if (e) { e.textContent = ''; e.classList.remove('show'); }
    }
    function setInvalid(id, msg) {
        wrap(id)?.classList.remove('is-valid');
        wrap(id)?.classList.add('is-invalid');
        const e = err(id);
        if (e) { e.textContent = msg; e.classList.add('show'); }
    }
    function clearState(id) {
        wrap(id)?.classList.remove('is-valid','is-invalid');
        const e = err(id);
        if (e) { e.textContent = ''; e.classList.remove('show'); }
    }

    function validateField(id) {
        const f = field(id);
        if (!f) return true;
        const raw = f.value;
        const val = sanitize(raw);

        if (id === 'title') {
            if (!raw.trim()) return setInvalid(id,'Item title is required.'), false;
            if (val.length < 5 || val.length > 100) return setInvalid(id,'Title must be 5–100 characters.'), false;
            if (/^[0-9]+$/.test(val)) return setInvalid(id,'Title cannot be only numbers.'), false;
            if (raw !== val) return setInvalid(id,'Title contains invalid characters.'), false;
        }
        if (id === 'category_id') {
            if (!raw) return setInvalid(id,'Please select a category.'), false;
        }
        if (id === 'description') {
            if (!raw.trim()) return setInvalid(id,'Description is required.'), false;
            if (val.length < 30) return setInvalid(id,'Description must be at least 30 characters.'), false;
            if (val.length > 2000) return setInvalid(id,'Description must not exceed 2000 characters.'), false;
            if (/(.)\1{10,}/.test(val)) return setInvalid(id,'Description contains excessive repeated characters.'), false;
        }
        if (id === 'city') {
            if (!raw.trim()) return setInvalid(id,'City is required.'), false;
            if (!/^[a-zA-Z\s\-']+$/.test(val)) return setInvalid(id,'City name is invalid.'), false;
        }
        if (id === 'address') {
            if (!raw.trim()) return setInvalid(id,'Address is required.'), false;
            if (val.length < 10) return setInvalid(id,'Address must be at least 10 characters.'), false;
            if (val.length > 255) return setInvalid(id,'Address must not exceed 255 characters.'), false;
        }
        if (id === 'rent_price_per_day') {
            const n = parseFloat(raw);
            if (!raw.trim() || isNaN(n) || n <= 0) return setInvalid(id,'Enter a valid daily rent (> 0).'), false;
            if (n > 100000) return setInvalid(id,'Rent per day exceeds the allowed limit.'), false;
        }
        if (id === 'security_deposit') {
            const n = parseFloat(raw);
            if (!raw.trim() || isNaN(n) || n < 0) return setInvalid(id,'Enter a valid security deposit (≥ 0).'), false;
        }
        if (id === 'replacement_cost') {
            const n = parseFloat(raw);
            if (!raw.trim() || isNaN(n) || n < 0) return setInvalid(id,'Enter a valid replacement cost (≥ 0).'), false;
        }
        if (id === 'quantity') {
            const n = parseInt(raw);
            if (!raw.trim() || isNaN(n) || n < 1) return setInvalid(id,'Quantity must be at least 1.'), false;
            if (n > 1000) return setInvalid(id,'Quantity cannot exceed 1000.'), false;
        }
        if (id === 'status') {
            if (!raw) return setInvalid(id,'Please select a status.'), false;
        }

        setValid(id);
        return true;
    }

    function validateBusiness() {
        const rent    = parseFloat(field('rent_price_per_day')?.value) || 0;
        const deposit = parseFloat(field('security_deposit')?.value)   || 0;
        const replace = parseFloat(field('replacement_cost')?.value)   || 0;
        let ok = true;

        if (deposit > 0 && rent > 0 && deposit < rent) {
            setInvalid('security_deposit','Security deposit must be ≥ daily rent.');
            ok = false;
        }
        if (replace > 0 && deposit > 0 && replace < deposit) {
            setInvalid('replacement_cost','Replacement cost must be ≥ security deposit.');
            ok = false;
        }
        if (rent > 0 && replace > 0 && rent > replace) {
            setInvalid('rent_price_per_day','Rent per day must not exceed replacement cost.');
            ok = false;
        }
        return ok;
    }

    // Silent version — no DOM writes — used to drive the button state
    function checkSilently(id) {
        const f = field(id);
        if (!f) return true;
        const raw = f.value;
        const val = sanitize(raw);
        if (id === 'title')    return raw.trim() && val.length >= 5 && val.length <= 100 && !/^[0-9]+$/.test(val) && raw === val;
        if (id === 'category_id') return !!raw;
        if (id === 'description') return raw.trim() && val.length >= 30 && val.length <= 2000 && !/(.)\1{10,}/.test(val);
        if (id === 'city')     return raw.trim() && /^[a-zA-Z\s\-']+$/.test(val);
        if (id === 'address')  return raw.trim() && val.length >= 10 && val.length <= 255;
        if (id === 'rent_price_per_day') { const n=parseFloat(raw); return raw.trim()&&!isNaN(n)&&n>0&&n<=100000; }
        if (id === 'security_deposit')   { const n=parseFloat(raw); return raw.trim()&&!isNaN(n)&&n>=0; }
        if (id === 'replacement_cost')   { const n=parseFloat(raw); return raw.trim()&&!isNaN(n)&&n>=0; }
        if (id === 'quantity')  { const n=parseInt(raw); return raw.trim()&&!isNaN(n)&&n>=1&&n<=1000; }
        if (id === 'status')   return !!raw;
        return true;
    }

    function checkBusinessSilently() {
        const rent    = parseFloat(field('rent_price_per_day')?.value) || 0;
        const deposit = parseFloat(field('security_deposit')?.value)   || 0;
        const replace = parseFloat(field('replacement_cost')?.value)   || 0;
        if (deposit > 0 && rent > 0 && deposit < rent) return false;
        if (replace > 0 && deposit > 0 && replace < deposit) return false;
        if (rent > 0 && replace > 0 && rent > replace) return false;
        return true;
    }

    function isFormReady() {
        return FIELDS.every(checkSilently) && checkBusinessSilently();
    }

    // ── BUTTON STATE ─────────────────────────────────────────────
    function updateBtn() {
        const btn  = $('eiSubmit');
        const hint = $('eiHint');
        const ready = isFormReady();
        btn.disabled = !ready;
        if (ready) {
            hint.className = 'ei-submit-hint ready';
            hint.innerHTML = '<i class="fas fa-check-circle"></i> All fields look good — ready to save';
        } else {
            hint.className = 'ei-submit-hint';
            hint.innerHTML = '<i class="fas fa-info-circle"></i> Fill all required fields to enable update';
        }
    }

    // ── TOAST ────────────────────────────────────────────────────
    window.eiHideToast = function () {
        $('eiToast')?.classList.remove('show');
    };

    function showToast(title, msg, type = 'success') {
        const t    = $('eiToast');
        const icon = $('eiToastIcon');
        $('eiToastTitle').textContent = title;
        $('eiToastMsg').textContent   = msg;
        if (type === 'error') {
            icon.className = 'fas fa-exclamation-circle';
            t.style.borderLeftColor = 'var(--ei-red)';
        } else {
            icon.className = 'fas fa-check-circle';
            t.style.borderLeftColor = 'var(--ei-success)';
        }
        t.classList.add('show');
        setTimeout(() => t.classList.remove('show'), 4500);
    }

    // ── LOADING ANIMATION ────────────────────────────────────────
    function delay(ms) { return new Promise(r => setTimeout(r, ms)); }

    async function showLoading() {
        $('eiLoading').classList.add('active');
        const steps = [$('eiStep1'),$('eiStep2'),$('eiStep3')];
        const fill  = $('eiLoadFill');
        for (let i = 0; i < steps.length; i++) {
            steps[i].classList.add('active');
            fill.style.width = ((i + 1) / steps.length * 100) + '%';
            await delay(480);
        }
        await delay(350);
        $('eiLoading').classList.remove('active');
    }

    // ── SUBMIT ───────────────────────────────────────────────────
    let submitting = false;

    $('eiForm').addEventListener('submit', async function (e) {
        e.preventDefault();

        // Full validation with DOM error messages on submit
        let allValid = true;
        let firstBad = null;
        FIELDS.forEach(id => {
            if (!validateField(id)) {
                allValid = false;
                if (!firstBad) firstBad = field(id);
            }
        });
        if (!validateBusiness()) allValid = false;

        if (!allValid) {
            if (firstBad) { firstBad.focus(); firstBad.scrollIntoView({ behavior:'smooth', block:'center' }); }
            showToast('Fix highlighted fields', 'Some details need your attention.', 'error');
            return;
        }

        if (submitting) return;
        submitting = true;
        updateBtn();

        const btn = $('eiSubmit');
        btn.innerHTML = '<span class="ei-spinner"></span> Saving...';

        await showLoading();

        const formData = new FormData(this);
        const csrf = document.querySelector('input[name="_token"]');

        try {
            const response = await fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': csrf ? csrf.value : '',
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            });

            const contentType = response.headers.get('content-type') || '';
            let data = null;
            if (contentType.includes('application/json')) {
                try { data = await response.json(); } catch (_) { data = null; }
            }

            if (response.ok) {
                // Any 2xx = success — same pattern as the Add Item form
                $('eiSuccess').classList.add('active');
                showToast('Item updated!', 'Changes have been saved successfully.', 'success');
                return;
            }

            // Error branches — never show raw HTML
            if (response.status === 422 && data?.errors) {
                const first = Object.values(data.errors)[0];
                const msg = Array.isArray(first) && first.length ? first[0] : 'Validation failed.';
                showToast('Validation error', msg, 'error');
            } else if (response.status === 419) {
                showToast('Session expired', 'Please refresh the page and try again.', 'error');
            } else if (response.status === 401 || response.status === 403) {
                showToast('Unauthorized', 'You are not allowed to perform this action.', 'error');
            } else if (response.status >= 500) {
                showToast('Server error', 'The server encountered a problem. Please try again.', 'error');
            } else if (data?.message) {
                showToast('Error', sanitizeServerMsg(data.message), 'error');
            } else {
                showToast('Failed', `HTTP ${response.status} — please try again.`, 'error');
            }

        } catch (netErr) {
            console.error('Network error:', netErr);
            showToast('Connection error', 'Could not reach the server. Check your internet connection.', 'error');
        } finally {
            submitting = false;
            btn.innerHTML = '<i class="fas fa-floppy-disk"></i> Save Changes';
            updateBtn();
        }
    });

    // ── INIT ─────────────────────────────────────────────────────
    FIELDS.forEach(setupFloat);

    // Wire up live validation + button state
    FIELDS.forEach(id => {
        const f = field(id);
        if (!f) return;
        ['input','blur','change'].forEach(ev => {
            f.addEventListener(ev, () => {
                validateField(id);
                if (['rent_price_per_day','security_deposit','replacement_cost'].includes(id)) {
                    validateBusiness();
                }
                updateBtn();
            });
        });
    });

    // Status dot
    field('status')?.addEventListener('change', updateStatusDot);
    updateStatusDot();

    // Initial button state (fields pre-filled from DB should pass immediately)
    updateBtn();

})();
</script>

@endsection