{{-- 
    Enhanced UI for Update Booking Status – v2
    - 50px left/right spacing (card container)
    - Fully restyled select box with open-state enhancements
    - Red & White color scheme with smooth transitions & animations
--}}
@extends('admin.layout')

@section('content')
<div class="booking-page-wrapper">
    <div class="card booking-update-card">
        <div class="card-header booking-update-header">
            <div class="header-icon">
                <i class="fas fa-calendar-check"></i>
            </div>
            <span>Update Booking Status</span>
            <span class="badge booking-id-badge">#{{ $booking->id }}</span>
        </div>

        <div class="card-body booking-update-body">
            <form action="/admin/bookings/update/{{ $booking->id }}" method="POST" class="booking-form">
                @csrf

                {{-- Current Status Indicator --}}
                <div class="current-status-indicator">
                    <span class="status-label">Current Status:</span>
                    <span class="status-pill status-{{ $booking->status }}">
                        <i class="fas fa-circle"></i> {{ ucfirst($booking->status) }}
                    </span>
                </div>

                {{-- Enhanced Select Dropdown with Open-State Styling --}}
                <div class="form-group select-wrapper">
                    <label for="statusSelect" class="form-label">
                        <i class="fas fa-arrow-right"></i> Select New Status
                    </label>
                    <div class="select-container">
                        <select name="status" id="statusSelect" class="form-control custom-select">
                            <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>
                                ⏳ Pending
                            </option>
                            <option value="approved" {{ $booking->status == 'approved' ? 'selected' : '' }}>
                                ✅ Approved
                            </option>
                            <option value="rejected" {{ $booking->status == 'rejected' ? 'selected' : '' }}>
                                ❌ Rejected
                            </option>
                            <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>
                                🏁 Completed
                            </option>
                            <option value="handed_over" {{ $booking->status == 'handed_over' ? 'selected' : '' }}>
                                🤝 Handed Over
                            </option>
                            <option value="returned" {{ $booking->status == 'returned' ? 'selected' : '' }}>
                                ↩️ Returned
                            </option>
                        </select>
                        <div class="select-arrow">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                    {{-- Custom dropdown indicator line --}}
                    <div class="select-highlight"></div>
                </div>

                {{-- Action Buttons --}}
                <div class="form-actions">
                    <button type="submit" class="btn btn-update">
                        <i class="fas fa-sync-alt"></i> Update Booking
                    </button>
                    <a href="{{ url('/admin/bookings') }}" class="btn btn-cancel">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Inline Styles – Scoped to this view --}}
<style>
    /* ----- Page Wrapper: 50px left/right spacing ----- */
    .booking-page-wrapper {
        padding: 0 50px;
        width: 100%;
        box-sizing: border-box;
    }

    @media (max-width: 768px) {
        .booking-page-wrapper {
            padding: 0 20px;
        }
    }

    @media (max-width: 480px) {
        .booking-page-wrapper {
            padding: 0 12px;
        }
    }

    /* ----- Card ----- */
    .booking-update-card {
        background: #ffffff;
        border: none;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(220, 20, 20, 0.08);
        transition: box-shadow 0.4s ease, transform 0.3s ease;
        overflow: hidden;
        margin: 1.5rem 0;
    }

    .booking-update-card:hover {
        box-shadow: 0 18px 55px rgba(220, 20, 20, 0.18);
        transform: translateY(-4px);
    }

    /* ----- Header ----- */
    .booking-update-header {
        background: linear-gradient(135deg, #b71c1c 0%, #d32f2f 60%, #e53935 100%);
        color: #ffffff;
        padding: 1.2rem 2rem;
        font-weight: 600;
        font-size: 1.3rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        border-bottom: 3px solid #ffcdd2;
        letter-spacing: 0.3px;
        position: relative;
    }

    .header-icon {
        font-size: 1.6rem;
        background: rgba(255, 255, 255, 0.2);
        width: 44px;
        height: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: background 0.3s ease, transform 0.3s ease;
    }

    .booking-update-header:hover .header-icon {
        background: rgba(255, 255, 255, 0.35);
        transform: rotate(20deg) scale(1.05);
    }

    .booking-id-badge {
        background: #ffffff;
        color: #b71c1c;
        font-weight: 700;
        padding: 0.4rem 1.2rem;
        border-radius: 40px;
        margin-left: auto;
        font-size: 0.9rem;
        box-shadow: 0 2px 10px rgba(0,0,0,0.15);
        transition: background 0.3s ease, color 0.3s ease, transform 0.3s ease;
    }

    .booking-id-badge:hover {
        background: #ffebee;
        color: #880e0e;
        transform: scale(1.04);
    }

    /* ----- Body ----- */
    .booking-update-body {
        padding: 2rem 2rem 2.2rem;
        background: #fefefe;
    }

    /* ----- Current Status Indicator ----- */
    .current-status-indicator {
        display: flex;
        align-items: center;
        gap: 1rem;
        background: #fafafa;
        padding: 0.8rem 1.5rem;
        border-radius: 60px;
        margin-bottom: 2rem;
        border: 1px solid #f5f5f5;
        transition: background 0.3s ease, border-color 0.3s ease;
        flex-wrap: wrap;
    }

    .current-status-indicator:hover {
        background: #fff5f5;
        border-color: #ffcdd2;
    }

    .status-label {
        font-weight: 500;
        color: #6c757d;
        letter-spacing: 0.3px;
    }

    .status-pill {
        padding: 0.3rem 1.2rem;
        border-radius: 40px;
        font-weight: 600;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        text-transform: capitalize;
    }

    .status-pill i {
        font-size: 0.6rem;
        transition: transform 0.3s ease;
    }

    .status-pill:hover i {
        transform: scale(1.3);
    }

    /* Status Colors */
    .status-pending {
        background: #fff3cd;
        color: #856404;
        border-left: 4px solid #ffc107;
    }
    .status-approved {
        background: #d4edda;
        color: #155724;
        border-left: 4px solid #28a745;
    }
    .status-rejected {
        background: #f8d7da;
        color: #721c24;
        border-left: 4px solid #dc3545;
    }
    .status-completed {
        background: #cce5ff;
        color: #004085;
        border-left: 4px solid #007bff;
    }
    .status-handed_over {
        background: #e2d6f5;
        color: #4a1a7a;
        border-left: 4px solid #6f42c1;
    }
    .status-returned {
        background: #d6f5e6;
        color: #0a5e3a;
        border-left: 4px solid #28a745;
    }

    /* ----- Form Select Wrapper ----- */
    .select-wrapper {
        position: relative;
        margin-bottom: 2rem;
    }

    .form-label {
        font-weight: 600;
        color: #b71c1c;
        display: flex;
        align-items: center;
        gap: 0.6rem;
        margin-bottom: 0.6rem;
        font-size: 1rem;
        transition: color 0.3s ease;
    }

    .form-label i {
        font-size: 1.1rem;
        transition: transform 0.3s ease;
    }

    .select-wrapper:hover .form-label i {
        transform: translateX(4px);
    }

    /* ----- Select Container (for better control) ----- */
    .select-container {
        position: relative;
        width: 100%;
    }

    /* ----- Custom Select – Enhanced with Open-State Styles ----- */
    .custom-select {
        appearance: none;
        -webkit-appearance: none;
        background: #ffffff;
        border: 2px solid #e0e0e0;
        border-radius: 14px;
        padding: 0.9rem 1.8rem 0.9rem 1.5rem;
        font-weight: 500;
        color: #212529;
        transition: all 0.35s cubic-bezier(0.2, 0.9, 0.4, 1);
        width: 100%;
        cursor: pointer;
        font-size: 1rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.02);
        position: relative;
        z-index: 2;
        background-image: none;
    }

    /* Hover state */
    .custom-select:hover {
        border-color: #d32f2f;
        box-shadow: 0 4px 16px rgba(211, 47, 47, 0.12);
        background: #fffbfb;
    }

    /* Focus & Open state – ENHANCED */
    .custom-select:focus {
        border-color: #b71c1c;
        outline: none;
        box-shadow: 0 0 0 5px rgba(183, 28, 28, 0.15), 0 6px 24px rgba(183, 28, 28, 0.12);
        background: #ffffff;
        transform: scale(1.01);
    }

    /* When select is OPEN (focused + :focus is active) */
    .custom-select:focus {
        border-radius: 14px 14px 0 0;
        border-bottom-color: #b71c1c;
    }

    /* For browsers that support :focus-within on parent, we add extra flair */
    .select-container:focus-within .custom-select {
        border-color: #b71c1c;
        box-shadow: 0 0 0 5px rgba(183, 28, 28, 0.12), 0 8px 28px rgba(183, 28, 28, 0.10);
        border-radius: 14px 14px 0 0;
    }

    /* Highlight line that animates when select is open */
    .select-highlight {
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 3px;
        background: linear-gradient(90deg, #b71c1c, #e53935);
        border-radius: 0 0 10px 10px;
        transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1);
        z-index: 5;
        transform: translateX(-50%);
    }

    .select-container:focus-within .select-highlight {
        width: 100%;
        left: 50%;
        transform: translateX(-50%);
    }

    /* Custom dropdown arrow */
    .select-arrow {
        position: absolute;
        right: 1.2rem;
        top: 50%;
        transform: translateY(-50%);
        color: #b71c1c;
        font-size: 0.9rem;
        pointer-events: none;
        z-index: 3;
        transition: transform 0.4s ease, color 0.3s ease;
        background: white;
        padding-left: 12px;
        padding-right: 4px;
    }

    .select-container:hover .select-arrow {
        color: #d32f2f;
    }

    /* Rotate arrow when select is open */
    .select-container:focus-within .select-arrow {
        transform: translateY(-50%) rotate(180deg);
        color: #b71c1c;
    }

    /* ----- Option Styling (for dropdown items when opened) ----- */
    .custom-select option {
        padding: 12px 16px;
        background: white;
        color: #212529;
        font-weight: 500;
        transition: background 0.2s ease;
        border-bottom: 1px solid #f1f1f1;
    }

    .custom-select option:hover,
    .custom-select option:checked,
    .custom-select option:focus {
        background: #b71c1c !important;
        color: #ffffff !important;
    }

    /* For Firefox & other browsers – selected option style */
    .custom-select option:checked {
        background: #b71c1c linear-gradient(0deg, #b71c1c 0%, #b71c1c 100%);
        color: white;
    }

    /* ----- Action Buttons ----- */
    .form-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        margin-top: 0.5rem;
        align-items: center;
    }

    .btn-update {
        background: linear-gradient(135deg, #b71c1c, #d32f2f);
        border: none;
        color: #ffffff;
        padding: 0.8rem 2.2rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1rem;
        letter-spacing: 0.5px;
        transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1);
        display: inline-flex;
        align-items: center;
        gap: 0.7rem;
        box-shadow: 0 4px 14px rgba(183, 28, 28, 0.30);
        border: 1px solid rgba(255, 255, 255, 0.15);
        cursor: pointer;
        flex: 1 1 auto;
        justify-content: center;
    }

    .btn-update i {
        font-size: 1.1rem;
        transition: transform 0.4s ease;
    }

    .btn-update:hover {
        background: linear-gradient(135deg, #880e0e, #b71c1c);
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 10px 30px rgba(183, 28, 28, 0.45);
        color: #ffffff;
    }

    .btn-update:hover i {
        transform: rotate(180deg) scale(1.1);
    }

    .btn-update:active {
        transform: scale(0.97);
        box-shadow: 0 4px 10px rgba(183, 28, 28, 0.25);
    }

    .btn-cancel {
        background: #f8f9fa;
        border: 2px solid #e0e0e0;
        color: #495057;
        padding: 0.8rem 1.8rem;
        border-radius: 50px;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
        text-decoration: none;
        flex: 0 1 auto;
        justify-content: center;
    }

    .btn-cancel i {
        font-size: 0.9rem;
        transition: transform 0.3s ease;
    }

    .btn-cancel:hover {
        background: #f1f3f5;
        border-color: #b71c1c;
        color: #b71c1c;
        transform: translateY(-2px);
        box-shadow: 0 4px 14px rgba(0,0,0,0.05);
        text-decoration: none;
    }

    .btn-cancel:hover i {
        transform: rotate(90deg);
    }

    .btn-cancel:active {
        transform: scale(0.96);
    }

    /* ----- Animations ----- */
    .status-pill {
        animation: fadeSlideIn 0.5s ease;
    }

    @keyframes fadeSlideIn {
        0% { opacity: 0; transform: translateX(-8px); }
        100% { opacity: 1; transform: translateX(0); }
    }

    .btn-update {
        animation: softPulse 3s infinite ease-in-out;
    }

    @keyframes softPulse {
        0% { box-shadow: 0 4px 14px rgba(183, 28, 28, 0.30); }
        50% { box-shadow: 0 6px 24px rgba(183, 28, 28, 0.45); }
        100% { box-shadow: 0 4px 14px rgba(183, 28, 28, 0.30); }
    }

    .btn-update:hover {
        animation: none;
    }

    /* subtle entrance for card */
    .booking-update-card {
        animation: cardFadeUp 0.6s ease;
    }

    @keyframes cardFadeUp {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    /* ----- Responsive ----- */
    @media (max-width: 768px) {
        .booking-update-header {
            font-size: 1rem;
            padding: 1rem 1.2rem;
            flex-wrap: wrap;
        }
        .header-icon {
            width: 36px;
            height: 36px;
            font-size: 1.2rem;
        }
        .booking-id-badge {
            margin-left: 0;
            font-size: 0.75rem;
            padding: 0.2rem 0.8rem;
        }
        .booking-update-body {
            padding: 1.5rem 1rem;
        }
        .current-status-indicator {
            padding: 0.6rem 1rem;
            border-radius: 30px;
        }
        .form-actions {
            flex-direction: column;
            align-items: stretch;
        }
        .btn-update, .btn-cancel {
            width: 100%;
            justify-content: center;
        }
        .custom-select {
            padding: 0.8rem 1.2rem;
            font-size: 0.95rem;
        }
        .select-arrow {
            right: 0.8rem;
        }
    }

    @media (max-width: 480px) {
        .booking-update-header {
            font-size: 0.9rem;
            padding: 0.8rem 1rem;
        }
        .booking-update-body {
            padding: 1rem 0.8rem;
        }
        .custom-select {
            font-size: 0.9rem;
            padding: 0.7rem 1rem;
        }
    }

    /* FontAwesome fallback */
    .fas, .far, .fal, .fab {
        font-family: 'Font Awesome 6 Free', 'Font Awesome 5 Free', 'FontAwesome', sans-serif;
    }
</style>

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endpush

@endsection