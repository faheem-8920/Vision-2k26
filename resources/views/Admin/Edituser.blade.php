@extends('admin.layout')

@section('content')
<style>
    /* ===== RED & WHITE THEME ===== */
    :root {
        --primary-red: #DC143C;
        --dark-red: #8B0000;
        --light-red: #FFF5F6;
        --red-gradient: linear-gradient(135deg, #DC143C 0%, #8B0000 100%);
        --shadow-red: 0 8px 30px rgba(220, 20, 60, 0.12);
        --shadow-red-hover: 0 20px 60px rgba(220, 20, 60, 0.25);
        --shadow-red-focus: 0 0 0 5px rgba(220, 20, 60, 0.08);
        --radius: 16px;
        --radius-sm: 10px;
        --transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    /* ===== CONTAINER ===== */
    .user-form-wrapper {
        padding: 1.5rem;
        max-width: 680px;
        margin: 0 auto;
        position: relative;
        background: #FFFFFF;
    }

    .user-form-container {
        background: #FFFFFF;
        border-radius: var(--radius);
        padding: 2.5rem;
        box-shadow: var(--shadow-red);
        border: 1px solid rgba(220, 20, 60, 0.08);
        animation: slideUp 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
        overflow: hidden;
        transition: var(--transition);
    }

    .user-form-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--red-gradient);
        opacity: 0.8;
    }

    .user-form-container:hover {
        box-shadow: var(--shadow-red-hover);
        transform: translateY(-4px);
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(40px) scale(0.98);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* ===== DECORATIVE BADGE ===== */
    .form-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        background: var(--red-gradient);
        color: #FFFFFF;
        padding: 4px 16px;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.8px;
        text-transform: uppercase;
        opacity: 0.9;
        animation: pulse 2s ease-in-out infinite;
        box-shadow: 0 4px 15px rgba(220, 20, 60, 0.3);
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    /* ===== HEADER ===== */
    .form-header {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 2px solid #f0f0f0;
        position: relative;
    }

    .form-header::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 60px;
        height: 2px;
        background: var(--red-gradient);
        transition: var(--transition);
    }

    .form-header:hover::after {
        width: 100px;
    }

    .form-icon-wrapper {
        width: 56px;
        height: 56px;
        background: var(--light-red);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        color: var(--primary-red);
        flex-shrink: 0;
        transition: var(--transition);
    }

    .form-header:hover .form-icon-wrapper {
        transform: rotate(-10deg) scale(1.05);
        background: var(--red-gradient);
        color: #FFFFFF;
        box-shadow: 0 4px 20px rgba(220, 20, 60, 0.3);
    }

    .form-title-group {
        flex: 1;
    }

    .form-title {
        color: var(--dark-red);
        font-weight: 800;
        font-size: 1.6rem;
        margin: 0;
        line-height: 1.2;
        letter-spacing: -0.5px;
    }

    .form-subtitle {
        color: #888;
        font-size: 0.85rem;
        margin: 2px 0 0;
        font-weight: 400;
    }

    .form-subtitle i {
        color: var(--primary-red);
        margin: 0 4px;
        font-size: 0.7rem;
    }

    /* ===== FORM GROUPS ===== */
    .form-group {
        margin-bottom: 1.5rem;
        position: relative;
    }

    .form-group:last-of-type {
        margin-bottom: 2rem;
    }

    .form-label {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #555;
        font-weight: 600;
        font-size: 0.9rem;
        margin-bottom: 0.6rem;
        transition: var(--transition);
    }

    .form-label .label-icon {
        color: var(--primary-red);
        font-size: 0.9rem;
        transition: var(--transition);
        width: 18px;
        text-align: center;
    }

    .form-group:focus-within .form-label {
        color: var(--dark-red);
    }

    .form-group:focus-within .label-icon {
        transform: scale(1.2);
        color: var(--dark-red);
    }

    .form-label .required-star {
        color: var(--primary-red);
        font-size: 1.2rem;
        line-height: 1;
        margin-left: 2px;
    }

    /* ===== INPUT WRAPPER ===== */
    .input-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-icon {
        position: absolute;
        left: 14px;
        color: #bbb;
        font-size: 1rem;
        transition: var(--transition);
        z-index: 2;
        pointer-events: none;
    }

    .form-control-custom {
        width: 100%;
        padding: 12px 16px 12px 44px;
        border: 2px solid #e8e8e8;
        border-radius: var(--radius-sm);
        font-size: 0.95rem;
        font-weight: 500;
        color: #333;
        background: #FFFFFF;
        transition: var(--transition);
        position: relative;
        z-index: 1;
    }

    .form-control-custom:focus {
        outline: none;
        border-color: var(--primary-red);
        background: #FFFFFF;
        box-shadow: var(--shadow-red-focus);
        transform: translateY(-1px);
    }

    .form-control-custom:hover {
        border-color: var(--primary-red);
        background: #FFFFFF;
    }

    .form-control-custom::placeholder {
        color: #bbb;
        font-weight: 400;
        font-size: 0.9rem;
    }

    .form-group:focus-within .input-icon {
        color: var(--primary-red);
        transform: scale(1.1) translateX(2px);
    }

    /* ===== VALIDATION STATES ===== */
    .form-group.error .form-control-custom {
        border-color: #ff4444;
        background: #FFFFFF;
        box-shadow: 0 0 0 5px rgba(255, 68, 68, 0.08);
        animation: shakeError 0.4s ease;
    }

    @keyframes shakeError {
        0%, 100% { transform: translateX(0); }
        20% { transform: translateX(-8px); }
        40% { transform: translateX(8px); }
        60% { transform: translateX(-5px); }
        80% { transform: translateX(5px); }
    }

    .form-group.success .form-control-custom {
        border-color: #28a745;
        background: #FFFFFF;
        box-shadow: 0 0 0 5px rgba(40, 167, 69, 0.08);
    }

    .form-group.error .input-icon {
        color: #ff4444 !important;
    }

    .form-group.success .input-icon {
        color: #28a745 !important;
    }

    /* Validation Status Icons */
    .validation-status {
        position: absolute;
        right: 14px;
        opacity: 0;
        transform: scale(0) rotate(-90deg);
        transition: var(--transition);
        font-size: 1.1rem;
        z-index: 2;
        pointer-events: none;
    }

    .form-group.error .validation-status {
        opacity: 1;
        transform: scale(1) rotate(0);
        color: #ff4444;
    }

    .form-group.success .validation-status {
        opacity: 1;
        transform: scale(1) rotate(0);
        color: #28a745;
    }

    .form-group.error .validation-status .fa-check-circle {
        display: none;
    }

    .form-group.success .validation-status .fa-times-circle {
        display: none;
    }

    /* Error Message */
    .invalid-feedback-custom {
        display: none;
        margin-top: 0.5rem;
        padding: 6px 14px;
        background: #fff5f5;
        border-radius: 8px;
        border-left: 3px solid #ff4444;
        color: #d32f2f;
        font-size: 0.82rem;
        font-weight: 500;
        animation: slideDown 0.25s ease-out;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-8px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .invalid-feedback-custom::before {
        content: '⚠ ';
        font-size: 0.9rem;
    }

    .form-group.error .invalid-feedback-custom {
        display: block;
    }

    /* ===== ENHANCED SELECT BOX ===== */
    .select-wrapper {
        position: relative;
    }

    .select-wrapper .input-icon {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #bbb;
        font-size: 1rem;
        transition: var(--transition);
        z-index: 2;
        pointer-events: none;
    }

    .form-select-custom {
        width: 100%;
        padding: 12px 16px 12px 44px;
        border: 2px solid #e8e8e8;
        border-radius: var(--radius-sm);
        font-size: 0.95rem;
        font-weight: 500;
        color: #333;
        background: #FFFFFF;
        transition: var(--transition);
        appearance: none;
        cursor: pointer;
        position: relative;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='8' viewBox='0 0 14 8'%3E%3Cpath d='M1 1l6 6 6-6' stroke='%23DC143C' stroke-width='2' fill='none' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 16px center;
        padding-right: 45px;
        z-index: 1;
    }

    .form-select-custom:focus {
        outline: none;
        border-color: var(--primary-red);
        background-color: #FFFFFF;
        box-shadow: var(--shadow-red-focus);
        transform: translateY(-1px);
    }

    .form-select-custom:hover {
        border-color: var(--primary-red);
        background-color: #FFFFFF;
        box-shadow: 0 4px 15px rgba(220, 20, 60, 0.08);
    }

    .form-select-custom option {
        padding: 12px 16px;
        background: #FFFFFF;
        color: #333;
        font-weight: 500;
        font-size: 0.95rem;
        border-bottom: 1px solid #f0f0f0;
        transition: var(--transition);
    }

    .form-select-custom option:hover {
        background: var(--light-red);
    }

    .form-select-custom option:checked {
        background: var(--red-gradient);
        color: #FFFFFF;
    }

    /* Custom select container */
    .select-enhanced {
        position: relative;
    }

    .select-enhanced::after {
        content: '';
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        width: 0;
        height: 0;
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-top: 6px solid var(--primary-red);
        pointer-events: none;
        transition: var(--transition);
        z-index: 2;
    }

    .form-select-custom:focus + .select-enhanced::after {
        transform: translateY(-50%) rotate(180deg);
    }

    .select-option-hover {
        background: var(--light-red) !important;
        color: var(--dark-red) !important;
    }

    /* Role indicator */
    .role-indicator {
        margin-top: 0.5rem;
        padding: 8px 16px;
        background: var(--light-red);
        border-radius: 8px;
        font-size: 0.82rem;
        color: var(--dark-red);
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        border: 1px solid rgba(220, 20, 60, 0.1);
    }

    .role-indicator i {
        font-size: 0.9rem;
        color: var(--primary-red);
    }

    .role-indicator .role-badge {
        background: var(--red-gradient);
        color: #FFFFFF;
        padding: 2px 12px;
        border-radius: 12px;
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-left: 4px;
    }

    /* ===== SUBMIT BUTTON ===== */
    .btn-submit {
        width: 100%;
        padding: 14px 20px;
        background: var(--red-gradient);
        color: #FFFFFF;
        border: none;
        border-radius: var(--radius-sm);
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        transition: var(--transition);
        position: relative;
        overflow: hidden;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        box-shadow: 0 4px 20px rgba(220, 20, 60, 0.25);
    }

    .btn-submit .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        transform: scale(0);
        animation: rippleAnim 0.6s linear;
        pointer-events: none;
    }

    @keyframes rippleAnim {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }

    .btn-submit::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.15), transparent);
        transition: left 0.5s ease;
    }

    .btn-submit:hover::before {
        left: 100%;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 35px rgba(220, 20, 60, 0.35);
        background: linear-gradient(135deg, #8B0000, #DC143C);
    }

    .btn-submit:active {
        transform: translateY(0) scale(0.98);
        box-shadow: 0 4px 15px rgba(220, 20, 60, 0.2);
    }

    .btn-submit:disabled {
        opacity: 0.7;
        cursor: not-allowed;
        transform: none !important;
    }

    .btn-submit .btn-icon {
        font-size: 1.1rem;
        transition: var(--transition);
    }

    .btn-submit:hover .btn-icon {
        transform: rotate(-8deg) scale(1.1);
    }

    .btn-spinner {
        display: none;
        width: 20px;
        height: 20px;
        border: 2.5px solid rgba(255, 255, 255, 0.3);
        border-top-color: #FFFFFF;
        border-radius: 50%;
        animation: spin 0.7s linear infinite;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    .btn-submit.loading .btn-spinner {
        display: inline-block;
    }

    .btn-submit.loading .btn-text {
        display: none;
    }

    .btn-submit.loading .btn-icon {
        display: none;
    }

    /* ===== FLOATING NOTIFICATION ===== */
    .floating-notification {
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 14px 22px;
        border-radius: 12px;
        color: #FFFFFF;
        font-weight: 600;
        font-size: 0.9rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        z-index: 9999;
        animation: notifIn 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        display: flex;
        align-items: center;
        gap: 12px;
        max-width: 380px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.15);
    }

    .floating-notification.error {
        background: linear-gradient(135deg, #ff4444, #cc0000);
    }

    .floating-notification.success {
        background: linear-gradient(135deg, #28a745, #1e7e34);
    }

    .floating-notification .notif-icon {
        font-size: 1.3rem;
        flex-shrink: 0;
    }

    .floating-notification .notif-close {
        margin-left: auto;
        cursor: pointer;
        opacity: 0.7;
        transition: var(--transition);
        font-size: 0.9rem;
        padding: 0 4px;
    }

    .floating-notification .notif-close:hover {
        opacity: 1;
        transform: scale(1.2);
    }

    @keyframes notifIn {
        from {
            opacity: 0;
            transform: translateX(80px) scale(0.9);
        }
        to {
            opacity: 1;
            transform: translateX(0) scale(1);
        }
    }

    .floating-notification.out {
        animation: notifOut 0.4s ease forwards;
    }

    @keyframes notifOut {
        to {
            opacity: 0;
            transform: translateX(80px) scale(0.9);
        }
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .user-form-container {
            padding: 1.5rem;
            border-radius: 14px;
        }

        .form-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
        }

        .form-title {
            font-size: 1.3rem;
        }

        .form-icon-wrapper {
            width: 48px;
            height: 48px;
            font-size: 1.4rem;
        }

        .form-badge {
            display: none;
        }

        .form-control-custom,
        .form-select-custom {
            padding: 11px 14px 11px 40px;
            font-size: 0.9rem;
        }

        .input-icon {
            left: 12px;
            font-size: 0.9rem;
        }

        .btn-submit {
            padding: 12px 16px;
            font-size: 0.9rem;
        }

        .floating-notification {
            top: 16px;
            right: 16px;
            left: 16px;
            max-width: none;
            font-size: 0.85rem;
            padding: 12px 18px;
        }
    }

    @media (max-width: 480px) {
        .user-form-container {
            padding: 1.2rem;
        }

        .form-title {
            font-size: 1.1rem;
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        .form-label {
            font-size: 0.85rem;
        }

        .role-indicator {
            font-size: 0.75rem;
            padding: 6px 12px;
        }
    }
</style>

<!-- ===== MAIN CONTENT ===== -->
<div class="user-form-wrapper">
    <div class="user-form-container">
        <!-- Badge -->
        <div class="form-badge">
            <i class="fas fa-pen"></i> Edit Mode
        </div>

        <!-- Header -->
        <div class="form-header">
            <div class="form-icon-wrapper">
                <i class="fas fa-user-edit"></i>
            </div>
            <div class="form-title-group">
                <h2 class="form-title">Edit User</h2>
                <p class="form-subtitle">
                    <i class="fas fa-circle"></i>
                    Update user profile information
                    <i class="fas fa-circle"></i>
                </p>
            </div>
        </div>

        <!-- Form -->
        <form action="/users/update/{{ $user->id }}" 
              method="POST" 
              id="userForm" 
              novalidate>
            
            @csrf

            <!-- Name Field -->
            <div class="form-group" id="nameGroup">
                <label class="form-label" for="name">
                    <span class="label-icon"><i class="fas fa-user"></i></span>
                    Full Name
                    <span class="required-star">*</span>
                </label>
                <div class="input-wrapper">
                    <i class="fas fa-user input-icon"></i>
                    <input type="text"
                           id="name"
                           name="name"
                           value="{{ old('name', $user->name) }}"
                           class="form-control-custom"
                           placeholder="Enter full name"
                           required
                           minlength="2"
                           maxlength="100"
                           autofocus>
                    <span class="validation-status">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-times-circle"></i>
                    </span>
                </div>
                <div class="invalid-feedback-custom" id="nameError">
                    Please enter a valid name (2-100 characters).
                </div>
            </div>

            <!-- Email Field -->
            <div class="form-group" id="emailGroup">
                <label class="form-label" for="email">
                    <span class="label-icon"><i class="fas fa-envelope"></i></span>
                    Email Address
                    <span class="required-star">*</span>
                </label>
                <div class="input-wrapper">
                    <i class="fas fa-envelope input-icon"></i>
                    <input type="email"
                           id="email"
                           name="email"
                           value="{{ old('email', $user->email) }}"
                           class="form-control-custom"
                           placeholder="Enter email address"
                           required
                           pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                    <span class="validation-status">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-times-circle"></i>
                    </span>
                </div>
                <div class="invalid-feedback-custom" id="emailError">
                    Please enter a valid email address.
                </div>
            </div>

            <!-- Role Field -->
            <div class="form-group" id="roleGroup">
                <label class="form-label" for="role">
                    <span class="label-icon"><i class="fas fa-user-tag"></i></span>
                    User Role
                    <span class="required-star">*</span>
                </label>
                
                <div class="select-wrapper select-enhanced">
                    <i class="fas fa-shield-alt input-icon"></i>
                    <select name="role" id="role" class="form-select-custom">
                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>
                            👤 Standard User
                        </option>
                        <option value="owner" {{ $user->role == 'owner' ? 'selected' : '' }}>
                            👑 Owner
                        </option>
                    </select>
                </div>

                <div class="role-indicator">
                    <i class="fas fa-info-circle"></i>
                    Current role: 
                    <strong>{{ ucfirst($user->role) }}</strong>
                    <span class="role-badge">
                        <i class="fas fa-{{ $user->role == 'owner' ? 'crown' : 'user' }}"></i>
                        {{ $user->role == 'owner' ? 'Owner' : 'User' }}
                    </span>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-submit" id="submitBtn">
                <span class="btn-icon"><i class="fas fa-save"></i></span>
                <span class="btn-text">Update User</span>
                <span class="btn-spinner"></span>
            </button>

        </form>
    </div>
</div>

<!-- ===== JAVASCRIPT ===== -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('userForm');
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const submitBtn = document.getElementById('submitBtn');
    const nameGroup = document.getElementById('nameGroup');
    const emailGroup = document.getElementById('emailGroup');
    const nameError = document.getElementById('nameError');
    const emailError = document.getElementById('emailError');
    const selectElement = document.getElementById('role');

    // Enhanced Select Hover Effect
    selectElement.addEventListener('mouseover', function(e) {
        const option = e.target.closest('option');
        if (option) {
            this.querySelectorAll('option').forEach(opt => {
                opt.classList.remove('select-option-hover');
            });
            option.classList.add('select-option-hover');
        }
    });

    selectElement.addEventListener('mouseout', function(e) {
        this.querySelectorAll('option').forEach(opt => {
            opt.classList.remove('select-option-hover');
        });
    });

    // Validation Functions
    function validateName() {
        const value = nameInput.value.trim();
        const length = value.length;
        
        if (length === 0) {
            setError(nameGroup, nameError, 'Name is required.');
            return false;
        } else if (length < 2) {
            setError(nameGroup, nameError, 'Name must be at least 2 characters.');
            return false;
        } else if (length > 100) {
            setError(nameGroup, nameError, 'Name cannot exceed 100 characters.');
            return false;
        } else {
            setSuccess(nameGroup);
            return true;
        }
    }

    function validateEmail() {
        const value = emailInput.value.trim();
        const pattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/i;
        
        if (value === '') {
            setError(emailGroup, emailError, 'Email is required.');
            return false;
        } else if (!pattern.test(value)) {
            setError(emailGroup, emailError, 'Please enter a valid email address.');
            return false;
        } else {
            setSuccess(emailGroup);
            return true;
        }
    }

    function setError(group, errorEl, message) {
        group.classList.add('error');
        group.classList.remove('success');
        errorEl.textContent = message;
    }

    function setSuccess(group) {
        group.classList.remove('error');
        group.classList.add('success');
    }

    nameInput.addEventListener('input', validateName);
    emailInput.addEventListener('input', validateEmail);

    // Ripple Effect
    submitBtn.addEventListener('click', function(e) {
        const rect = this.getBoundingClientRect();
        const ripple = document.createElement('span');
        ripple.className = 'ripple';
        const size = Math.max(rect.width, rect.height);
        ripple.style.width = ripple.style.height = size + 'px';
        ripple.style.left = (e.clientX - rect.left - size/2) + 'px';
        ripple.style.top = (e.clientY - rect.top - size/2) + 'px';
        this.appendChild(ripple);
        setTimeout(() => ripple.remove(), 600);
    });

    // Form Submission
    form.addEventListener('submit', function(e) {
        const isNameValid = validateName();
        const isEmailValid = validateEmail();

        if (!isNameValid || !isEmailValid) {
            e.preventDefault();
            
            const firstError = document.querySelector('.form-group.error');
            if (firstError) {
                firstError.scrollIntoView({ 
                    behavior: 'smooth', 
                    block: 'center' 
                });
                const input = firstError.querySelector('input');
                if (input) input.focus();
            }

            showNotification('Please fix all errors before submitting.', 'error');
            return;
        }

        submitBtn.classList.add('loading');
        submitBtn.disabled = true;
        form.classList.add('form-loading');
    });

    // Notification System
    function showNotification(message, type = 'success') {
        const existing = document.querySelector('.floating-notification');
        if (existing) {
            existing.classList.add('out');
            setTimeout(() => existing.remove(), 400);
        }

        const icons = {
            success: 'fas fa-check-circle',
            error: 'fas fa-exclamation-circle'
        };

        const notification = document.createElement('div');
        notification.className = `floating-notification ${type}`;
        notification.innerHTML = `
            <span class="notif-icon"><i class="${icons[type] || icons.success}"></i></span>
            <span>${message}</span>
            <span class="notif-close"><i class="fas fa-times"></i></span>
        `;
        document.body.appendChild(notification);

        notification.querySelector('.notif-close').addEventListener('click', function() {
            notification.classList.add('out');
            setTimeout(() => notification.remove(), 400);
        });

        setTimeout(() => {
            notification.classList.add('out');
            setTimeout(() => notification.remove(), 400);
        }, 4000);

        notification.addEventListener('click', function(e) {
            if (!e.target.closest('.notif-close')) {
                this.classList.add('out');
                setTimeout(() => this.remove(), 400);
            }
        });
    }

    // Trigger Initial Validation
    if (nameInput.value.trim() !== '') {
        validateName();
    }
    if (emailInput.value.trim() !== '') {
        validateEmail();
    }

    // Keyboard Shortcuts
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            e.preventDefault();
            form.dispatchEvent(new Event('submit'));
        }
    });

    setTimeout(() => {
        nameInput.focus();
        nameInput.select();
    }, 400);

    console.log('✨ Enhanced user form loaded successfully!');
});
</script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

@endsection