

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        min-height: 100vh;
        background: linear-gradient(135deg, #faf6f6 0%, #fff0f0 100%);
        font-family: 'Inter', sans-serif;
        padding: 1.5rem;
    }

    .request-card {
        width: 100%;
        max-width: 700px;
        margin: auto;
        background: #ffffff;
        border-radius: 2.5rem;
        padding: 2.2rem 2.5rem 2.8rem;
        box-shadow: 0 20px 60px rgba(180, 0, 0, 0.06), 0 8px 20px rgba(180, 0, 0, 0.04);
        transition: all 0.4s cubic-bezier(0.2, 0.9, 0.3, 1);
        border: 1px solid rgba(200, 0, 0, 0.05);
        position: relative;
        overflow: hidden;
    }

    .request-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #dc3545, #ff6b6b, #dc3545);
        background-size: 200% 100%;
        animation: shimmer 3s ease-in-out infinite;
    }

    @keyframes shimmer {
        0% { background-position: -200% 0; }
        100% { background-position: 200% 0; }
    }

    .request-card:hover {
        box-shadow: 0 30px 80px rgba(180, 0, 0, 0.08), 0 10px 30px rgba(180, 0, 0, 0.06);
        transform: translateY(-3px);
    }

    .form-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 2rem;
        padding-bottom: 1.2rem;
        border-bottom: 2px solid #f5ecec;
    }

    .form-header .icon-wrapper {
        width: 52px;
        height: 52px;
        background: linear-gradient(135deg, #fce8e8, #fff5f5);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        flex-shrink: 0;
    }

    .form-header .icon-wrapper:hover {
        transform: rotate(-5deg) scale(1.05);
    }

    .form-header .icon-wrapper i {
        font-size: 1.6rem;
        color: #dc3545;
    }

    .form-header .header-content {
        flex: 1;
    }

    .form-header .header-content h2 {
        font-weight: 700;
        font-size: 1.6rem;
        color: #a00;
        letter-spacing: -0.5px;
        margin: 0;
        line-height: 1.2;
    }

    .form-header .header-content p {
        color: #8a6a6a;
        font-size: 0.85rem;
        margin: 0;
        font-weight: 400;
    }

    .form-header .status-badge {
        background: #fce8e8;
        padding: 0.4rem 1rem;
        border-radius: 50px;
        color: #a00;
        font-size: 0.65rem;
        font-weight: 600;
        border: 1px solid #f0c0c0;
        display: flex;
        align-items: center;
        gap: 6px;
        letter-spacing: 0.5px;
        flex-shrink: 0;
    }

    .form-header .status-badge .dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #dc3545;
        animation: pulse 1.5s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.4; transform: scale(0.7); }
    }

    .input-group {
        margin-bottom: 1.5rem;
        position: relative;
    }

    .input-group label {
        display: block;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        color: #7a5a5a;
        margin-bottom: 0.4rem;
    }

    .input-group label i {
        margin-right: 6px;
        color: #b33;
        font-size: 0.75rem;
    }

    .input-group label .required {
        color: #dc3545;
        margin-left: 2px;
    }

    .input-group .input-wrapper {
        position: relative;
        transition: all 0.3s ease;
    }

    .input-group input,
    .input-group textarea,
    .input-group select {
        width: 100%;
        padding: 0.75rem 1.1rem;
        background: #fcf9f9;
        border: 2px solid #e8dddd;
        border-radius: 1.2rem;
        font-size: 0.95rem;
        font-family: 'Inter', sans-serif;
        color: #1f0e0e;
        transition: all 0.3s cubic-bezier(0.15, 0.9, 0.25, 1);
        outline: none;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
    }

    .input-group input:hover,
    .input-group textarea:hover,
    .input-group select:hover {
        border-color: #c99;
        background: #fffcfc;
    }

    .input-group input:focus,
    .input-group textarea:focus,
    .input-group select:focus {
        border-color: #dc3545;
        background: #ffffff;
        box-shadow: 0 0 0 4px rgba(220, 53, 69, 0.06), 0 4px 12px rgba(160, 0, 0, 0.05);
        transform: translateY(-1px);
    }

    .input-group textarea {
        resize: vertical;
        min-height: 80px;
        border-radius: 1.2rem;
        line-height: 1.6;
    }

    .input-group select {
        appearance: none;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="%23b33" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>');
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 1rem;
        color: #1f0e0e;
        cursor: pointer;
    }

    .input-group select option {
        background: #fffafa;
        color: #1f0e0e;
    }

    /* Valid State */
    .input-group.valid .input-wrapper input,
    .input-group.valid .input-wrapper textarea,
    .input-group.valid .input-wrapper select {
        border-color: #28a745 !important;
        background: #f4fcf6;
        box-shadow: 0 0 0 4px rgba(40, 167, 69, 0.06);
    }

    .input-group.valid .input-wrapper::after {
        content: '✓';
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #28a745;
        font-weight: 700;
        font-size: 1rem;
    }

    .input-group.valid textarea ~ .input-wrapper::after {
        top: 18px;
        transform: none;
    }

    /* Error State */
    .input-group.error .input-wrapper input,
    .input-group.error .input-wrapper textarea,
    .input-group.error .input-wrapper select {
        border-color: #dc3545 !important;
        background: #fff6f6;
        box-shadow: 0 0 0 4px rgba(220, 53, 69, 0.06);
    }

    .input-group.error .input-wrapper::after {
        content: '✕';
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #dc3545;
        font-weight: 700;
        font-size: 1rem;
    }

    .input-group.error textarea ~ .input-wrapper::after {
        top: 18px;
        transform: none;
    }

    .error-msg {
        color: #dc3545;
        font-size: 0.7rem;
        margin-top: 0.3rem;
        margin-left: 0.8rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 4px;
        opacity: 0;
        transform: translateY(-4px);
        transition: all 0.2s ease;
        height: 1.2rem;
    }

    .error-msg.show {
        opacity: 1;
        transform: translateY(0);
    }

    .error-msg i {
        font-size: 0.65rem;
    }

    /* Enhanced File Upload - COMPACT */
    .file-upload-section {
        margin: 1.8rem 0 1.2rem;
    }

    .file-upload-section .section-label {
        display: block;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        color: #7a5a5a;
        margin-bottom: 0.8rem;
    }

    .file-upload-section .section-label i {
        margin-right: 6px;
        color: #b33;
    }

    .file-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .file-upload-box {
        position: relative;
        border-radius: 1.2rem;
        overflow: hidden;
        transition: all 0.3s ease;
        background: #fcf9f9;
        border: 2px dashed #d4c0c0;
        min-height: 100px;
    }

    .file-upload-box:hover {
        border-color: #b33;
        background: #fffcfc;
        transform: translateY(-1px);
    }

    .file-upload-box .file-label {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 0.8rem 1rem;
        cursor: pointer;
        min-height: 100px;
        text-align: center;
        transition: all 0.3s ease;
    }

    .file-upload-box .file-label .upload-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #fce8e8, #fff5f5);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 0.4rem;
        transition: transform 0.3s ease;
    }

    .file-upload-box .file-label:hover .upload-icon {
        transform: scale(1.1) rotate(-5deg);
    }

    .file-upload-box .file-label .upload-icon i {
        font-size: 1.2rem;
        color: #dc3545;
    }

    .file-upload-box .file-label .file-text {
        font-size: 0.8rem;
        color: #5a3a3a;
        font-weight: 600;
    }

    .file-upload-box .file-label .file-subtext {
        font-size: 0.65rem;
        color: #8a6a6a;
        margin-top: 0.1rem;
    }

    .file-upload-box .file-label .file-name {
        font-size: 0.7rem;
        color: #28a745;
        font-weight: 600;
        margin-top: 0.3rem;
        word-break: break-all;
        max-width: 100%;
        display: none;
    }

    .file-upload-box .file-label .file-name.show {
        display: block;
        animation: fadeInUp 0.3s ease;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(5px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .file-upload-box input[type="file"] {
        position: absolute;
        opacity: 0;
        width: 0.1px;
        height: 0.1px;
        pointer-events: none;
    }

    /* Image Preview - COMPACT */
    .file-upload-box .image-preview-wrapper {
        position: relative;
        width: 100%;
        height: 100px;
        overflow: hidden;
        background: #fcf9f9;
        display: none;
    }

    .file-upload-box .image-preview-wrapper.show {
        display: block;
    }

    .file-upload-box .image-preview {
        width: 100%;
        height: 100px;
        object-fit: cover;
        animation: fadeInScale 0.3s ease;
    }

    @keyframes fadeInScale {
        from {
            opacity: 0;
            transform: scale(0.95);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .file-upload-box .image-preview-wrapper .remove-image {
        position: absolute;
        top: 6px;
        right: 6px;
        width: 26px;
        height: 26px;
        background: rgba(220, 53, 69, 0.95);
        border: none;
        border-radius: 50%;
        color: white;
        cursor: pointer;
        font-size: 0.7rem;
        display: none;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        z-index: 5;
    }

    .file-upload-box .image-preview-wrapper .remove-image.show {
        display: flex;
    }

    .file-upload-box .image-preview-wrapper .remove-image:hover {
        transform: scale(1.15);
        background: #dc3545;
    }

    .file-upload-box.valid {
        border-color: #28a745;
        background: #f4fcf6;
        border-style: solid;
    }

    .file-upload-box.valid .file-label .upload-icon i {
        color: #28a745;
    }

    .file-upload-box.error {
        border-color: #dc3545;
        background: #fff6f6;
        border-style: solid;
    }

    .file-upload-box.error .file-label .upload-icon i {
        color: #dc3545;
    }

    .file-error-msg {
        color: #dc3545;
        font-size: 0.7rem;
        margin-top: 0.3rem;
        margin-left: 0.8rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 4px;
        opacity: 0;
        transform: translateY(-4px);
        transition: all 0.2s ease;
        height: 1.2rem;
    }

    .file-error-msg.show {
        opacity: 1;
        transform: translateY(0);
    }

    .file-error-msg i {
        font-size: 0.65rem;
    }

    /* Submit Button */
    .submit-btn {
        width: 100%;
        background: linear-gradient(135deg, #dc3545, #e63946);
        border: none;
        padding: 0.95rem 1.8rem;
        border-radius: 2.5rem;
        font-size: 1.05rem;
        font-weight: 700;
        color: white;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin-top: 1.2rem;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1);
        box-shadow: 0 6px 20px -4px rgba(180, 0, 0, 0.25);
        position: relative;
        overflow: hidden;
    }

    .submit-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.6s ease;
    }

    .submit-btn:hover::before {
        left: 100%;
    }

    .submit-btn:hover {
        transform: translateY(-2px) scale(1.01);
        box-shadow: 0 10px 30px -4px rgba(180, 0, 0, 0.35);
    }

    .submit-btn:active {
        transform: scale(0.97);
    }

    .submit-btn i {
        font-size: 1.1rem;
        transition: transform 0.3s ease;
    }

    .submit-btn:hover i {
        transform: translateX(3px) scale(1.05);
    }

    .submit-btn:disabled {
        opacity: 0.7;
        cursor: not-allowed;
        transform: none !important;
    }

    /* Alert Messages */
    .alert-custom {
        border: none;
        border-radius: 1.2rem;
        padding: 0.9rem 1.2rem;
        margin-bottom: 1.2rem;
        animation: slideDown 0.5s ease;
        display: flex;
        align-items: flex-start;
        gap: 10px;
        font-size: 0.9rem;
    }

    .alert-custom i {
        font-size: 1.1rem;
        margin-top: 2px;
        flex-shrink: 0;
    }

    .alert-custom.success {
        background: #f0fff4;
        border-left: 4px solid #28a745;
        color: #1a5a2a;
    }

    .alert-custom.error {
        background: #fff6f6;
        border-left: 4px solid #dc3545;
        color: #8a2222;
    }

    .alert-custom ul {
        list-style: none;
        padding-left: 0;
        margin: 0;
    }

    .alert-custom ul li {
        padding: 2px 0;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-15px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Success Popup */
    .popup-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        visibility: hidden;
        transition: all 0.4s cubic-bezier(0.2, 0.9, 0.3, 1);
        z-index: 9999;
        padding: 1.5rem;
    }

    .popup-overlay.active {
        opacity: 1;
        visibility: visible;
    }

    .popup-card {
        background: #ffffff;
        border-radius: 2.5rem;
        padding: 2.8rem 2.5rem;
        max-width: 440px;
        width: 100%;
        text-align: center;
        box-shadow: 0 40px 100px rgba(0, 0, 0, 0.15);
        transform: scale(0.7) translateY(30px) rotate(-2deg);
        transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        border: 2px solid rgba(200, 0, 0, 0.06);
        position: relative;
        overflow: hidden;
    }

    .popup-overlay.active .popup-card {
        transform: scale(1) translateY(0) rotate(0deg);
    }

    .popup-card::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: conic-gradient(from 0deg, transparent, rgba(200, 0, 0, 0.02), transparent, rgba(200, 0, 0, 0.02), transparent);
        animation: rotateGlow 6s linear infinite;
        pointer-events: none;
    }

    @keyframes rotateGlow {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .popup-card>* {
        position: relative;
        z-index: 1;
    }

    .popup-card .icon-wrapper {
        display: inline-block;
        background: linear-gradient(135deg, #fce8e8, #fff5f5);
        padding: 1.5rem;
        border-radius: 50%;
        margin-bottom: 1rem;
        animation: popPulse 0.6s ease;
        box-shadow: 0 4px 20px rgba(200, 0, 0, 0.08);
    }

    .popup-card .icon-wrapper i {
        font-size: 3.5rem;
        color: #dc3545;
        animation: checkmark 0.6s ease;
    }

    @keyframes checkmark {
        0% { transform: scale(0) rotate(-20deg); opacity: 0; }
        50% { transform: scale(1.2) rotate(3deg); }
        100% { transform: scale(1) rotate(0deg); opacity: 1; }
    }

    @keyframes popPulse {
        0% { transform: scale(0.6); opacity: 0.3; }
        70% { transform: scale(1.05); }
        100% { transform: scale(1); opacity: 1; }
    }

    .popup-card h3 {
        font-size: 1.6rem;
        font-weight: 700;
        color: #a00;
        margin-bottom: 0.5rem;
        letter-spacing: -0.3px;
        animation: slideUp 0.5s ease 0.2s both;
    }

    @keyframes slideUp {
        0% { opacity: 0; transform: translateY(15px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    .popup-card .popup-message {
        color: #3a2a2a;
        font-size: 0.95rem;
        line-height: 1.7;
        margin: 1rem 0 1.5rem;
        font-weight: 400;
        background: #fcf7f7;
        padding: 1rem 1.5rem;
        border-radius: 2rem;
        border: 1px solid #f0e0e0;
        animation: slideUp 0.5s ease 0.4s both;
    }

    .popup-card .popup-message i {
        font-size: 0.9rem;
        background: transparent;
        padding: 0;
        margin: 0 6px 0 0;
        color: #dc3545;
        box-shadow: none;
        animation: none;
    }

    .popup-card .popup-message .highlight {
        display: inline-block;
        background: #fce8e8;
        padding: 0.1rem 0.6rem;
        border-radius: 20px;
        font-weight: 500;
        color: #a00;
    }

    .popup-card .popup-btn {
        background: linear-gradient(135deg, #dc3545, #e63946);
        border: none;
        color: white;
        padding: 0.75rem 2.5rem;
        border-radius: 2.5rem;
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(180, 0, 0, 0.15);
        letter-spacing: 0.3px;
        animation: slideUp 0.5s ease 0.6s both;
    }

    .popup-card .popup-btn:hover {
        transform: scale(1.04) translateY(-2px);
        box-shadow: 0 8px 25px rgba(160, 0, 0, 0.2);
    }

    .popup-card .confetti {
        position: absolute;
        width: 8px;
        height: 8px;
        border-radius: 2px;
        animation: confettiFall 3s ease-in-out infinite;
        opacity: 0.5;
    }

    @keyframes confettiFall {
        0% { transform: translateY(-15px) rotate(0deg) scale(0); opacity: 0; }
        20% { opacity: 0.7; }
        80% { opacity: 0.7; }
        100% { transform: translateY(80px) rotate(720deg) scale(1); opacity: 0; }
    }

    @media (max-width: 768px) {
        .request-card {
            padding: 1.5rem 1.2rem;
        }

        .form-header {
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .form-header .header-content h2 {
            font-size: 1.3rem;
        }

        .form-header .status-badge {
            font-size: 0.6rem;
            padding: 0.3rem 0.8rem;
        }

        .file-grid {
            grid-template-columns: 1fr;
        }

        .popup-card {
            padding: 2rem 1.5rem;
        }

        .popup-card .icon-wrapper i {
            font-size: 2.8rem;
        }

        .popup-card h3 {
            font-size: 1.3rem;
        }
    }

    @media (max-width: 480px) {
        .request-card {
            padding: 1.2rem 1rem;
        }

        .form-header .icon-wrapper {
            width: 40px;
            height: 40px;
        }

        .form-header .icon-wrapper i {
            font-size: 1.2rem;
        }

        .input-group input,
        .input-group textarea,
        .input-group select {
            padding: 0.65rem 0.9rem;
            font-size: 0.85rem;
        }

        .file-upload-box .file-label {
            min-height: 80px;
            padding: 0.6rem 0.8rem;
        }

        .file-upload-box .image-preview-wrapper {
            height: 80px;
        }

        .file-upload-box .image-preview {
            height: 80px;
        }

        .submit-btn {
            font-size: 0.95rem;
            padding: 0.8rem 1.2rem;
        }
    }
</style>

<div class="request-card">
    <div class="form-header">
        <div class="icon-wrapper">
            <i class="fas fa-building"></i>
        </div>
        <div class="header-content">
            <h2>Owner Verification</h2>
            <p>Complete your request to become a verified owner</p>
        </div>
        <div class="status-badge">
            <span class="dot"></span>
            Pending
        </div>
    </div>

    @if(session('success'))
    <div class="alert-custom success">
        <i class="fas fa-check-circle"></i>
        <div>{{ session('success') }}</div>
    </div>
    @endif

    @if(session('error'))
    <div class="alert-custom error">
        <i class="fas fa-exclamation-circle"></i>
        <div>{{ session('error') }}</div>
    </div>
    @endif

    @if ($errors->any())
    <div class="alert-custom error">
        <i class="fas fa-exclamation-triangle"></i>
        <div>
            <strong>Please fix the following errors:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li><i class="fas fa-chevron-right" style="font-size: 0.5rem; margin-right: 4px;"></i> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    <form method="POST" action="/become-owner" enctype="multipart/form-data" id="requestForm">
        @csrf

        <!-- CNIC -->
        <div class="input-group" id="cnicGroup">
            <label for="cnic"><i class="fas fa-id-card"></i> CNIC Number <span class="required">*</span></label>
            <div class="input-wrapper">
                <input type="text" 
                       id="cnic" 
                       name="cnic"
                       placeholder="42101-1234567-1" 
                       maxlength="15"
                       value="{{ old('cnic') }}"
                       class="@error('cnic') error @enderror"
                       required />
            </div>
            <div class="error-msg" id="cnicError"><i class="fas fa-exclamation-circle"></i> CNIC must be 13 digits (format: XXXXX-XXXXXXX-X)</div>
            @error('cnic')
            <div class="error-msg show" style="opacity:1; transform:translateY(0);">{{ $message }}</div>
            @enderror
        </div>

        <!-- Phone -->
        <div class="input-group" id="phoneGroup">
            <label for="phone"><i class="fas fa-phone"></i> Phone Number <span class="required">*</span></label>
            <div class="input-wrapper">
                <input type="text" 
                       id="phone" 
                       name="phone"
                       placeholder="0300-1234567" 
                       maxlength="12"
                       value="{{ old('phone') }}"
                       class="@error('phone') error @enderror"
                       required />
            </div>
            <div class="error-msg" id="phoneError"><i class="fas fa-exclamation-circle"></i> Valid phone number required (03XXXXXXXXX)</div>
            @error('phone')
            <div class="error-msg show" style="opacity:1; transform:translateY(0);">{{ $message }}</div>
            @enderror
        </div>

        <!-- City -->
        <div class="input-group" id="cityGroup">
            <label for="city"><i class="fas fa-city"></i> City <span class="required">*</span></label>
            <div class="input-wrapper">
                <input type="text" 
                       id="city" 
                       name="city"
                       placeholder="e.g. Lahore" 
                       value="{{ old('city') }}"
                       class="@error('city') error @enderror"
                       required />
            </div>
            <div class="error-msg" id="cityError"><i class="fas fa-exclamation-circle"></i> City is required</div>
            @error('city')
            <div class="error-msg show" style="opacity:1; transform:translateY(0);">{{ $message }}</div>
            @enderror
        </div>

        <!-- Address -->
        <div class="input-group" id="addressGroup">
            <label for="address"><i class="fas fa-map-pin"></i> Address <span class="required">*</span></label>
            <div class="input-wrapper">
                <textarea id="address" 
                          name="address"
                          placeholder="Street, house #, area, landmark…" 
                          class="@error('address') error @enderror"
                          required>{{ old('address') }}</textarea>
            </div>
            <div class="error-msg" id="addressError"><i class="fas fa-exclamation-circle"></i> Address cannot be empty</div>
            @error('address')
            <div class="error-msg show" style="opacity:1; transform:translateY(0);">{{ $message }}</div>
            @enderror
        </div>

        <!-- File Uploads - COMPACT -->
        <div class="file-upload-section">
            <span class="section-label"><i class="fas fa-image"></i> Identity Verification <span class="required">*</span></span>
            <div class="file-grid">
                <div class="file-upload-box" id="cnicFrontBox">
                    <label for="cnicFront" class="file-label">
                        <div class="upload-icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <span class="file-text">CNIC Front</span>
                        <span class="file-subtext">Click to upload</span>
                        <span class="file-name" id="cnicFrontName"></span>
                    </label>
                    <div class="image-preview-wrapper" id="cnicFrontPreviewWrapper">
                        <img id="cnicFrontPreview" class="image-preview" alt="CNIC Front Preview">
                        <button type="button" class="remove-image" id="removeFrontBtn" onclick="removeImage('cnicFront', 'cnicFrontPreview', 'cnicFrontName', 'cnicFrontBox', 'cnicFrontPreviewWrapper')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <input type="file" id="cnicFront" name="cnic_front" accept="image/*" required />
                    <div class="file-error-msg" id="cnicFrontError"><i class="fas fa-exclamation-circle"></i> Please upload CNIC front image</div>
                    @error('cnic_front')
                    <div class="file-error-msg show" style="opacity:1; transform:translateY(0);">{{ $message }}</div>
                    @enderror
                </div>

                <div class="file-upload-box" id="cnicBackBox">
                    <label for="cnicBack" class="file-label">
                        <div class="upload-icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <span class="file-text">CNIC Back</span>
                        <span class="file-subtext">Click to upload</span>
                        <span class="file-name" id="cnicBackName"></span>
                    </label>
                    <div class="image-preview-wrapper" id="cnicBackPreviewWrapper">
                        <img id="cnicBackPreview" class="image-preview" alt="CNIC Back Preview">
                        <button type="button" class="remove-image" id="removeBackBtn" onclick="removeImage('cnicBack', 'cnicBackPreview', 'cnicBackName', 'cnicBackBox', 'cnicBackPreviewWrapper')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <input type="file" id="cnicBack" name="cnic_back" accept="image/*" required />
                    <div class="file-error-msg" id="cnicBackError"><i class="fas fa-exclamation-circle"></i> Please upload CNIC back image</div>
                    @error('cnic_back')
                    <div class="file-error-msg show" style="opacity:1; transform:translateY(0);">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <input type="hidden" name="proof_type" value="cnic" />
        <input type="hidden" name="status" value="pending" />
        <input type="hidden" name="admin_note" value="" />
        <input type="hidden" name="approved_at" value="" />
        <input type="hidden" name="approved_by" value="" />

        <button type="submit" class="submit-btn" id="submitBtn">
            <i class="fas fa-paper-plane"></i> Submit Verification Request
        </button>
    </form>
</div>

<!-- Success Popup -->
<div class="popup-overlay" id="successPopup">
    <div class="popup-card">
        <div class="confetti" style="left:10%; animation-delay:0.2s; background:#dc3545;"></div>
        <div class="confetti" style="left:30%; animation-delay:0.5s; background:#e74c3c;"></div>
        <div class="confetti" style="left:50%; animation-delay:0.8s; background:#ff6b6b;"></div>
        <div class="confetti" style="left:70%; animation-delay:0.3s; background:#c0392b;"></div>
        <div class="confetti" style="left:90%; animation-delay:0.6s; background:#e67e22;"></div>
        
        <div class="icon-wrapper">
            <i class="fas fa-check-circle"></i>
        </div>
        <h3>🎉 Request Sent!</h3>
        <div class="popup-message">
            <i class="fas fa-shield-alt"></i> Your owner request has been sent successfully.<br />
            <span class="highlight">Admin will check the request and let you know.</span>
        </div>
        <button class="popup-btn" id="closePopupBtn"><i class="fas fa-arrow-right" style="margin-right: 8px;"></i>Got it</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('requestForm');
        const popup = document.getElementById('successPopup');
        const closePopupBtn = document.getElementById('closePopupBtn');
        const submitBtn = document.getElementById('submitBtn');

        // CNIC Auto-format with dashes
        const cnic = document.getElementById('cnic');
        const cnicError = document.getElementById('cnicError');
        const cnicGroup = document.getElementById('cnicGroup');

        function formatCNIC(value) {
            let digits = value.replace(/\D/g, '');
            if (digits.length > 13) digits = digits.slice(0, 13);
            
            let formatted = '';
            if (digits.length > 0) {
                formatted += digits.slice(0, 5);
                if (digits.length > 5) {
                    formatted += '-' + digits.slice(5, 12);
                    if (digits.length > 12) {
                        formatted += '-' + digits.slice(12, 13);
                    }
                }
            }
            return formatted;
        }

        if (cnic) {
            cnic.addEventListener('input', function() {
                const formatted = formatCNIC(this.value);
                this.value = formatted;
                
                const clean = formatted.replace(/-/g, '');
                const isValid = /^\d{13}$/.test(clean) && formatted.includes('-');
                
                if (isValid) {
                    cnicGroup.classList.remove('error');
                    cnicGroup.classList.add('valid');
                    cnicError.classList.remove('show');
                } else {
                    cnicGroup.classList.remove('valid');
                    if (this.value.length > 0) {
                        cnicGroup.classList.add('error');
                        cnicError.classList.add('show');
                    } else {
                        cnicGroup.classList.remove('error');
                    }
                }
            });

            cnic.addEventListener('blur', function() {
                const clean = this.value.replace(/-/g, '');
                const isValid = /^\d{13}$/.test(clean) && this.value.includes('-');
                if (!isValid && this.value.length > 0) {
                    cnicGroup.classList.add('error');
                    cnicError.classList.add('show');
                }
            });
        }

        // Phone validation
        const phone = document.getElementById('phone');
        const phoneError = document.getElementById('phoneError');
        const phoneGroup = document.getElementById('phoneGroup');

        if (phone) {
            phone.addEventListener('input', function() {
                let val = this.value.replace(/\D/g, '');
                if (val.length > 11) val = val.slice(0, 11);
                this.value = val;
                
                const isValid = /^03\d{9}$/.test(val);
                if (isValid) {
                    phoneGroup.classList.remove('error');
                    phoneGroup.classList.add('valid');
                    phoneError.classList.remove('show');
                } else {
                    phoneGroup.classList.remove('valid');
                    if (this.value.length > 0) {
                        phoneGroup.classList.add('error');
                        phoneError.classList.add('show');
                    } else {
                        phoneGroup.classList.remove('error');
                    }
                }
            });

            phone.addEventListener('blur', function() {
                const isValid = /^03\d{9}$/.test(this.value);
                if (!isValid && this.value.length > 0) {
                    phoneGroup.classList.add('error');
                    phoneError.classList.add('show');
                }
            });
        }

        // City validation
        const city = document.getElementById('city');
        const cityError = document.getElementById('cityError');
        const cityGroup = document.getElementById('cityGroup');

        if (city) {
            city.addEventListener('input', function() {
                const isValid = this.value.trim().length > 0;
                if (isValid) {
                    cityGroup.classList.remove('error');
                    cityGroup.classList.add('valid');
                    cityError.classList.remove('show');
                } else {
                    cityGroup.classList.remove('valid');
                    cityGroup.classList.remove('error');
                }
            });

            city.addEventListener('blur', function() {
                const isValid = this.value.trim().length > 0;
                if (!isValid) {
                    cityGroup.classList.add('error');
                    cityError.classList.add('show');
                }
            });
        }

        // Address validation
        const address = document.getElementById('address');
        const addressError = document.getElementById('addressError');
        const addressGroup = document.getElementById('addressGroup');

        if (address) {
            address.addEventListener('input', function() {
                const isValid = this.value.trim().length > 0;
                if (isValid) {
                    addressGroup.classList.remove('error');
                    addressGroup.classList.add('valid');
                    addressError.classList.remove('show');
                } else {
                    addressGroup.classList.remove('valid');
                    addressGroup.classList.remove('error');
                }
            });

            address.addEventListener('blur', function() {
                const isValid = this.value.trim().length > 0;
                if (!isValid) {
                    addressGroup.classList.add('error');
                    addressError.classList.add('show');
                }
            });
        }

        // File upload with preview - COMPACT
        function handleFileUpload(input, previewId, nameId, boxId, wrapperId, errorId) {
            const preview = document.getElementById(previewId);
            const nameEl = document.getElementById(nameId);
            const box = document.getElementById(boxId);
            const wrapper = document.getElementById(wrapperId);
            const errorEl = document.getElementById(errorId);
            const removeBtn = document.querySelector(`#${boxId} .remove-image`);

            if (input.files && input.files.length > 0) {
                const file = input.files[0];
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    wrapper.classList.add('show');
                    preview.classList.add('show');
                    nameEl.textContent = file.name;
                    nameEl.classList.add('show');
                    box.classList.remove('error');
                    box.classList.add('valid');
                    errorEl.classList.remove('show');
                    if (removeBtn) removeBtn.classList.add('show');
                };
                
                reader.readAsDataURL(file);
            } else {
                wrapper.classList.remove('show');
                preview.classList.remove('show');
                preview.src = '';
                nameEl.textContent = '';
                nameEl.classList.remove('show');
                box.classList.remove('valid');
                if (removeBtn) removeBtn.classList.remove('show');
            }
        }

        // Remove image function
        window.removeImage = function(inputId, previewId, nameId, boxId, wrapperId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);
            const nameEl = document.getElementById(nameId);
            const box = document.getElementById(boxId);
            const wrapper = document.getElementById(wrapperId);
            const removeBtn = document.querySelector(`#${boxId} .remove-image`);
            
            input.value = '';
            wrapper.classList.remove('show');
            preview.classList.remove('show');
            preview.src = '';
            nameEl.textContent = '';
            nameEl.classList.remove('show');
            box.classList.remove('valid');
            if (removeBtn) removeBtn.classList.remove('show');
            
            // Trigger change event for validation
            const event = new Event('change', { bubbles: true });
            input.dispatchEvent(event);
        };

        const cnicFront = document.getElementById('cnicFront');
        const cnicBack = document.getElementById('cnicBack');

        if (cnicFront) {
            cnicFront.addEventListener('change', function() {
                handleFileUpload(this, 'cnicFrontPreview', 'cnicFrontName', 'cnicFrontBox', 'cnicFrontPreviewWrapper', 'cnicFrontError');
            });
        }

        if (cnicBack) {
            cnicBack.addEventListener('change', function() {
                handleFileUpload(this, 'cnicBackPreview', 'cnicBackName', 'cnicBackBox', 'cnicBackPreviewWrapper', 'cnicBackError');
            });
        }

        // Form submission
        if (form) {
            form.addEventListener('submit', function(e) {
                // Validate all fields
                let isValid = true;

                // Validate CNIC
                const cnicVal = document.getElementById('cnic').value.replace(/-/g, '');
                if (!/^\d{13}$/.test(cnicVal)) {
                    document.getElementById('cnicGroup').classList.add('error');
                    document.getElementById('cnicError').classList.add('show');
                    isValid = false;
                }

                // Validate Phone
                const phoneVal = document.getElementById('phone').value;
                if (!/^03\d{9}$/.test(phoneVal)) {
                    document.getElementById('phoneGroup').classList.add('error');
                    document.getElementById('phoneError').classList.add('show');
                    isValid = false;
                }

                // Validate City
                if (!document.getElementById('city').value.trim()) {
                    document.getElementById('cityGroup').classList.add('error');
                    document.getElementById('cityError').classList.add('show');
                    isValid = false;
                }

                // Validate Address
                if (!document.getElementById('address').value.trim()) {
                    document.getElementById('addressGroup').classList.add('error');
                    document.getElementById('addressError').classList.add('show');
                    isValid = false;
                }

                // Validate Files
                if (!document.getElementById('cnicFront').files.length) {
                    document.getElementById('cnicFrontBox').classList.add('error');
                    document.getElementById('cnicFrontError').classList.add('show');
                    isValid = false;
                }

                if (!document.getElementById('cnicBack').files.length) {
                    document.getElementById('cnicBackBox').classList.add('error');
                    document.getElementById('cnicBackError').classList.add('show');
                    isValid = false;
                }

                if (!isValid) {
                    e.preventDefault();
                    // Scroll to first error
                    const firstError = document.querySelector('.input-group.error, .file-upload-box.error');
                    if (firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                    return;
                }

                // Show popup and submit
                e.preventDefault();
                popup.classList.add('active');
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Submitting...';
                
                setTimeout(function() {
                    form.submit();
                }, 1500);
            });
        }

        // Close popup
        if (closePopupBtn) {
            closePopupBtn.addEventListener('click', function() {
                popup.classList.remove('active');
            });
        }

        if (popup) {
            popup.addEventListener('click', function(e) {
                if (e.target === this) {
                    this.classList.remove('active');
                }
            });
        }

        // Show popup if success message exists
        @if(session('success'))
        if (popup) {
            popup.classList.add('active');
            setTimeout(function() {
                popup.classList.remove('active');
            }, 5000);
        }
        @endif
    });
</script>

