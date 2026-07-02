@extends('Vendor.layout')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    /* ===== PREMIUM RED & WHITE THEME - VENDOR ITEMS ===== */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 1.5rem;
        animation: fadeSlideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1);
    }

    @keyframes fadeSlideUp {
        0% { opacity: 0; transform: translateY(30px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    /* ----- main card / glass effect ----- */
    .vendor-card {
        background: rgba(255, 255, 255, 0.92);
        backdrop-filter: blur(2px);
        border-radius: 2.5rem 2.5rem 2rem 2rem;
        padding: 2rem 1.8rem 1.8rem 1.8rem;
        box-shadow: 0 25px 50px -12px rgba(180, 20, 20, 0.25),
                    0 4px 18px rgba(200, 0, 0, 0.06);
        border: 1px solid rgba(255, 255, 255, 0.7);
        transition: box-shadow 0.35s ease, transform 0.25s ease;
    }
    .vendor-card:hover {
        box-shadow: 0 35px 60px -18px rgba(190, 0, 0, 0.35);
        transform: translateY(-4px);
    }

    /* ----- header with red-white flair ----- */
    .header-section {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 2rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid rgba(211, 47, 47, 0.12);
    }

    .brand-head {
        display: flex;
        align-items: center;
        gap: 0.9rem;
    }
    .brand-icon {
        background: #d32f2f;
        width: 48px;
        height: 48px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.6rem;
        box-shadow: 0 8px 18px rgba(211, 47, 47, 0.3);
        transition: all 0.25s;
    }
    .brand-icon i {
        color: white !important;
    }
    .brand-icon:hover {
        transform: rotate(-6deg) scale(1.04);
        background: #b71c1c;
        box-shadow: 0 12px 24px rgba(183, 28, 28, 0.35);
    }

    .heading-red {
        font-weight: 700;
        font-size: 2rem;
        letter-spacing: -0.5px;
        color: #1a1a1a;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    .heading-red span {
        background: #d32f2f;
        color: white;
        font-size: 0.9rem;
        font-weight: 600;
        padding: 0.2rem 1rem;
        border-radius: 60px;
        margin-left: 6px;
        letter-spacing: 0.3px;
        transition: 0.2s;
    }
    .heading-red span:hover {
        background: #b71c1c;
        transform: scale(1.04);
    }

    .btn-add-item {
        background: #d32f2f;
        color: white !important;
        border: none;
        border-radius: 60px;
        padding: 0.6rem 1.8rem;
        font-weight: 600;
        font-size: 0.9rem;
        letter-spacing: 0.3px;
        transition: all 0.25s cubic-bezier(0.2, 0, 0, 1);
        box-shadow: 0 4px 14px rgba(211, 47, 47, 0.25);
        display: inline-flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
    }
    .btn-add-item i {
        color: white !important;
        font-size: 0.9rem;
    }
    .btn-add-item:hover {
        background: #b71c1c;
        transform: translateY(-3px) scale(1.03);
        box-shadow: 0 12px 28px rgba(183, 28, 28, 0.35);
        color: white !important;
    }

    .status-badge {
        background: white;
        border: 1.5px solid #d32f2f;
        color: #b71c1c;
        border-radius: 60px;
        padding: 0.4rem 1.4rem;
        font-weight: 600;
        font-size: 0.8rem;
        letter-spacing: 0.4px;
        box-shadow: 0 2px 6px rgba(211, 47, 47, 0.08);
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    .status-badge i {
        color: #d32f2f !important;
        font-size: 0.6rem;
    }
    .status-badge:hover {
        background: #d32f2f;
        color: white;
        border-color: #d32f2f;
        box-shadow: 0 8px 16px rgba(211, 47, 47, 0.2);
    }
    .status-badge:hover i {
        color: white !important;
    }

    /* ----- success alert ----- */
    .alert-success-custom {
        background: #f0f8f0;
        border-left: 8px solid #d32f2f;
        border-radius: 16px;
        padding: 1rem 1.5rem;
        color: #1a1a1a;
        font-weight: 500;
        margin-bottom: 1.8rem;
        box-shadow: 0 2px 12px rgba(211, 47, 47, 0.06);
        display: flex;
        align-items: center;
        gap: 12px;
        animation: fadeSlideUp 0.6s ease;
    }
    .alert-success-custom i {
        color: #d32f2f !important;
        font-size: 1.4rem;
    }

    /* ===== ITEM CARDS GRID ===== */
    .items-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 1.8rem;
        margin-top: 0.5rem;
    }

    .item-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        transition: all 0.35s cubic-bezier(0.2, 0, 0, 1);
        border: 1px solid rgba(211, 47, 47, 0.06);
        box-shadow: 0 4px 20px rgba(180, 20, 20, 0.04);
        animation: fadeSlide 0.45s forwards;
        animation-delay: calc(0.05s * var(--i, 1));
        opacity: 0;
    }

    @keyframes fadeSlide {
        0% { opacity: 0; transform: translateY(20px) scale(0.97); }
        100% { opacity: 1; transform: translateY(0) scale(1); }
    }

    .item-card:hover {
        transform: translateY(-8px) scale(1.005);
        box-shadow: 0 20px 50px rgba(180, 20, 20, 0.12);
        border-color: rgba(211, 47, 47, 0.15);
    }

    .item-image-wrapper {
        position: relative;
        height: 220px;
        overflow: hidden;
        background: #f8f4f4;
    }

    .item-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .item-card:hover .item-image {
        transform: scale(1.06);
    }

    .item-card-body {
        padding: 1.5rem 1.5rem 1.8rem;
    }

    /* badges row */
    .badges-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0.75rem;
    }

    .category-badge {
        background: #f3eeee;
        color: #2d2d2d;
        padding: 4px 16px;
        border-radius: 40px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        transition: all 0.2s;
    }
    .item-card:hover .category-badge {
        background: #d32f2f;
        color: white;
        box-shadow: 0 4px 12px rgba(211, 47, 47, 0.2);
    }

    .status-badge-item {
        display: inline-block;
        padding: 4px 14px;
        border-radius: 40px;
        font-size: 0.7rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        transition: all 0.2s;
    }
    .status-badge-item.available {
        background: #e8f5e9;
        color: #2e7d32;
        border: 1px solid #a5d6a7;
    }
    .status-badge-item.pending {
        background: #fff3e0;
        color: #e65100;
        border: 1px solid #ffcc80;
    }
    .status-badge-item.rented {
        background: #f3e5f5;
        color: #6a1b9a;
        border: 1px solid #ce93d8;
    }
    .status-badge-item.maintenance {
        background: #fbe9e7;
        color: #bf360c;
        border: 1px solid #ffab91;
    }
    .status-badge-item.archived {
        background: #eeeeee;
        color: #616161;
        border: 1px solid #bdbdbd;
    }
    .status-badge-item.active {
        background: #e3f2fd;
        color: #0d47a1;
        border: 1px solid #90caf9;
    }
    .item-card:hover .status-badge-item {
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(0,0,0,0.06);
    }

    /* title */
    .item-title {
        font-weight: 700;
        font-size: 1.25rem;
        color: #1a1a1a;
        margin: 0.5rem 0 0.25rem;
        transition: color 0.2s;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .item-card:hover .item-title {
        color: #b71c1c;
    }

    .item-description {
        color: #6c757d;
        font-size: 0.9rem;
        line-height: 1.5;
        margin-bottom: 1rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 2.7rem;
    }

    /* price */
    .item-price {
        font-size: 1.6rem;
        font-weight: 700;
        color: #a00c0c;
        margin-bottom: 1rem;
    }
    .item-price small {
        font-size: 0.9rem;
        font-weight: 500;
        color: #6c757d;
    }
    .item-card:hover .item-price {
        color: #d32f2f;
    }

    /* stats row */
    .stats-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0.5rem;
        margin-bottom: 1.2rem;
        padding: 0.75rem 0;
        border-top: 1px solid rgba(211, 47, 47, 0.06);
        border-bottom: 1px solid rgba(211, 47, 47, 0.06);
    }

    .stat-item {
        text-align: center;
    }
    .stat-item .stat-value {
        font-weight: 700;
        color: #1a1a1a;
        font-size: 1rem;
    }
    .stat-item .stat-label {
        font-size: 0.7rem;
        color: #6c757d;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        font-weight: 600;
    }

    /* ===== ACTION BUTTONS - SINGLE LINE ===== */
    .actions-row {
        display: flex;
        gap: 8px;
        justify-content: center;
        flex-wrap: nowrap;
        width: 100%;
    }

    .btn-action-card {
        border-radius: 60px;
        padding: 8px 14px;
        font-weight: 600;
        font-size: 0.7rem;
        letter-spacing: 0.25px;
        transition: all 0.25s cubic-bezier(0.2, 0, 0, 1);
        border: 1.5px solid transparent;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        text-decoration: none;
        line-height: 1;
        cursor: pointer;
        background: transparent;
        white-space: nowrap;
        flex: 1;
        min-width: 0;
    }
    .btn-action-card i {
        font-size: 0.75rem;
        transition: transform 0.25s ease;
        color: inherit !important;
    }

    /* view */
    .btn-view-card {
        background: #d32f2f;
        color: white !important;
        border-color: #d32f2f;
    }
    .btn-view-card i {
        color: white !important;
    }
    .btn-view-card:hover {
        background: #b71c1c;
        border-color: #b71c1c;
        color: white !important;
        transform: translateY(-3px) scale(1.04);
        box-shadow: 0 12px 20px rgba(211, 47, 47, 0.3);
    }
    .btn-view-card:hover i {
        transform: rotate(-6deg) scale(1.1);
        color: white !important;
    }

    /* edit */
    .btn-edit-card {
        background: white;
        color: #b71c1c !important;
        border: 1.5px solid #d32f2f;
    }
    .btn-edit-card i {
        color: #b71c1c !important;
    }
    .btn-edit-card:hover {
        background: #d32f2f;
        color: white !important;
        transform: translateY(-3px) scale(1.04);
        box-shadow: 0 12px 20px rgba(211, 47, 47, 0.2);
        border-color: #d32f2f;
    }
    .btn-edit-card:hover i {
        transform: rotate(8deg) scale(1.1);
        color: white !important;
    }

    /* delete */
    .btn-delete-card {
        background: transparent;
        color: #a51b1b !important;
        border: 1.5px solid #e6c5c5;
    }
    .btn-delete-card i {
        color: #a51b1b !important;
    }
    .btn-delete-card:hover {
        background: #b71c1c;
        color: white !important;
        border-color: #b71c1c;
        transform: translateY(-3px) scale(1.04);
        box-shadow: 0 12px 24px rgba(183, 28, 28, 0.25);
    }
    .btn-delete-card:hover i {
        transform: rotate(12deg) scale(1.1);
        color: white !important;
    }

    /* ----- EMPTY STATE ----- */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        background: white;
        border-radius: 32px;
        box-shadow: 0 4px 20px rgba(180, 20, 20, 0.04);
        border: 1px solid rgba(211, 47, 47, 0.06);
    }
    .empty-state .empty-icon {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, #fff5f5, #ffe8e8);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 3rem;
        color: #d32f2f;
    }
    .empty-state .empty-icon i {
        color: #d32f2f !important;
    }
    .empty-state h3 {
        color: #1a1a1a;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }
    .empty-state p {
        color: #6c757d;
        margin-bottom: 1.5rem;
    }
    .empty-state .btn-add-empty {
        background: #d32f2f;
        color: white !important;
        border: none;
        border-radius: 60px;
        padding: 0.7rem 2.5rem;
        font-weight: 600;
        transition: all 0.25s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }
    .empty-state .btn-add-empty i {
        color: white !important;
    }
    .empty-state .btn-add-empty:hover {
        background: #b71c1c;
        transform: translateY(-3px) scale(1.03);
        box-shadow: 0 12px 28px rgba(183, 28, 28, 0.3);
        color: white !important;
    }

    /* ----- footer ----- */
    .table-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 2rem;
        padding-top: 1rem;
        border-top: 1px solid rgba(211, 47, 47, 0.08);
        color: #6c757d;
        font-size: 0.85rem;
    }
    .table-footer i {
        color: #d32f2f !important;
        margin: 0 4px;
    }
    .table-footer .pill {
        background: #f3eeee;
        padding: 0.2rem 1.2rem;
        border-radius: 60px;
        color: #2d2d2d;
        font-weight: 500;
        transition: 0.15s;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .table-footer .pill i {
        color: #d32f2f !important;
    }
    .table-footer .pill:hover {
        background: #d32f2f;
        color: white;
    }
    .table-footer .pill:hover i {
        color: white !important;
    }

    /* ===== DELETE MODAL ===== */
    .delete-modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(8px);
        z-index: 10000;
        display: none;
        align-items: center;
        justify-content: center;
        animation: fadeInOverlay 0.3s ease;
    }

    @keyframes fadeInOverlay {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    .delete-modal {
        background: #ffffff;
        border-radius: 24px;
        padding: 2.5rem;
        max-width: 440px;
        width: 90%;
        position: relative;
        animation: modalSlideUp 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.3);
        text-align: center;
    }

    @keyframes modalSlideUp {
        from {
            transform: scale(0.8) translateY(40px);
            opacity: 0;
        }
        to {
            transform: scale(1) translateY(0);
            opacity: 1;
        }
    }

    .delete-modal .modal-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #fff5f5, #ffe8e8);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 2.5rem;
        color: #dc3545;
        animation: pulseIcon 1.5s ease-in-out infinite;
    }
    .delete-modal .modal-icon i {
        color: #dc3545 !important;
    }

    @keyframes pulseIcon {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    .delete-modal h3 {
        color: #1a1a2e;
        font-weight: 700;
        margin-bottom: 0.5rem;
        font-size: 1.5rem;
    }

    .delete-modal p {
        color: #6c757d;
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }

    .delete-modal .item-highlight {
        color: #dc3545;
        font-weight: 700;
        background: #fff5f5;
        padding: 2px 12px;
        border-radius: 8px;
        display: inline-block;
    }

    .delete-modal .modal-actions {
        display: flex;
        gap: 12px;
        justify-content: center;
    }

    .delete-modal .btn-cancel {
        background: #f1f3f5;
        color: #495057;
        border: none;
        border-radius: 50px;
        padding: 0.7rem 2rem;
        font-weight: 600;
        transition: all 0.3s ease;
        cursor: pointer;
        flex: 1;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }
    .delete-modal .btn-cancel i {
        color: #495057 !important;
    }
    .delete-modal .btn-cancel:hover {
        background: #e9ecef;
        transform: scale(1.02);
    }

    .delete-modal .btn-confirm-delete {
        background: linear-gradient(135deg, #dc3545, #b02a37);
        color: #fff;
        border: none;
        border-radius: 50px;
        padding: 0.7rem 2rem;
        font-weight: 600;
        transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1);
        cursor: pointer;
        flex: 1;
        box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }
    .delete-modal .btn-confirm-delete i {
        color: white !important;
    }
    .delete-modal .btn-confirm-delete:hover {
        transform: scale(1.02) translateY(-2px);
        box-shadow: 0 8px 25px rgba(220, 53, 69, 0.4);
        background: linear-gradient(135deg, #c82333, #a71d2a);
    }

    /* ===== SUCCESS TOAST ===== */
    .toast-container-custom {
        position: fixed;
        top: 30px;
        right: 30px;
        z-index: 9999;
        min-width: 320px;
        max-width: 450px;
        pointer-events: none;
    }

    .toast-success {
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(10px);
        border-left: 8px solid #dc3545;
        border-radius: 20px;
        box-shadow: 0 20px 60px -12px rgba(0, 0, 0, 0.25), 0 4px 20px rgba(220, 53, 69, 0.1);
        padding: 20px 28px;
        color: #1a1a2e;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 16px;
        transform: translateX(0);
        opacity: 1;
        pointer-events: none;
        animation: slideInRight 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    @keyframes slideInRight {
        from {
            transform: translateX(120%) scale(0.9);
            opacity: 0;
        }
        to {
            transform: translateX(0) scale(1);
            opacity: 1;
        }
    }

    .toast-success i {
        font-size: 2rem;
        color: #dc3545 !important;
        background: linear-gradient(135deg, #fff5f5, #ffe8e8);
        padding: 12px;
        border-radius: 50%;
        box-shadow: 0 2px 10px rgba(220, 53, 69, 0.1);
        animation: checkBounce 0.6s ease;
    }

    @keyframes checkBounce {
        0% { transform: scale(0); }
        50% { transform: scale(1.2); }
        70% { transform: scale(0.9); }
        100% { transform: scale(1); }
    }

    .toast-success .toast-content {
        flex: 1;
    }

    .toast-success .toast-title {
        font-weight: 700;
        color: #1a1a2e;
        font-size: 1rem;
    }

    .toast-success .toast-message {
        color: #6c757d;
        font-size: 0.9rem;
        margin-top: 2px;
    }

    .toast-success.hide {
        animation: slideOutRight 0.5s cubic-bezier(0.2, 0.9, 0.4, 1) forwards;
    }

    @keyframes slideOutRight {
        from {
            transform: translateX(0) scale(1);
            opacity: 1;
        }
        to {
            transform: translateX(120%) scale(0.9);
            opacity: 0;
        }
    }

    /* Row Fade Out */
    .fade-out {
        animation: fadeOut 0.5s cubic-bezier(0.2, 0.9, 0.4, 1) forwards;
    }

    @keyframes fadeOut {
        0% { 
            opacity: 1; 
            transform: scale(1) translateY(0); 
        }
        100% { 
            opacity: 0; 
            transform: scale(0.8) translateY(-20px); 
        }
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
        .items-grid {
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.2rem;
        }
        .header-section {
            flex-direction: column;
            align-items: start;
            gap: 0.8rem;
        }
        .btn-add-item {
            align-self: flex-start;
        }
    }

    @media (max-width: 768px) {
        .vendor-card { padding: 1.2rem; }
        .heading-red { font-size: 1.5rem; }
        .brand-icon { width: 40px; height: 40px; font-size: 1.3rem; }
        .items-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
        .item-image-wrapper {
            height: 180px;
        }
        .item-price {
            font-size: 1.3rem;
        }
        
        /* Keep buttons in single line on mobile */
        .actions-row {
            gap: 6px;
        }
        .btn-action-card {
            padding: 6px 10px;
            font-size: 0.65rem;
        }
        .btn-action-card i {
            font-size: 0.65rem;
        }
        
        .toast-container-custom {
            top: 20px;
            right: 20px;
            left: 20px;
            min-width: unset;
            max-width: unset;
        }
        .delete-modal {
            padding: 2rem 1.5rem;
        }
        .delete-modal .modal-actions {
            flex-direction: column;
        }
    }

    @media (max-width: 480px) {
        .stats-row {
            grid-template-columns: 1fr 1fr;
            gap: 0.3rem;
        }
        .badges-row {
            flex-wrap: wrap;
            gap: 0.5rem;
        }
        .actions-row {
            gap: 4px;
        }
        .btn-action-card {
            padding: 5px 8px;
            font-size: 0.6rem;
        }
        .btn-action-card i {
            font-size: 0.6rem;
        }
    }
</style>

<div class="container">
    <div class="vendor-card">
        <!-- header -->
        <div class="header-section">
            <div class="brand-head">
                <div class="brand-icon">
                    <i class="fas fa-boxes"></i>
                </div>
                <h1 class="heading-red">
                    My Items
                    <span>{{ $items->count() }}</span>
                </h1>
            </div>
            <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                <div class="status-badge">
                    <i class="fas fa-circle"></i> active
                </div>
                <a href="/owner/items/create" class="btn-add-item">
                    <i class="fas fa-plus"></i> Add Item
                </a>
            </div>
        </div>

        <!-- success message -->
        @if(session('success'))
        <div class="alert-success-custom">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
        @endif

        <!-- items grid -->
        @if($items->count())
        <div class="items-grid">
            @foreach($items as $item)
            <div class="item-card" style="--i: {{ $loop->index + 1 }};" data-item-id="{{ $item->id }}" data-item-title="{{ $item->title }}">
                <div class="item-image-wrapper">
                    @if($item->images->count())
                        <img src="{{ asset('uploads/items/'.$item->images->first()->image) }}"
                             class="item-image"
                             alt="{{ $item->title }}">
                    @else
                        <img src="https://via.placeholder.com/600x400/fff5f5/d32f2f?text=No+Image"
                             class="item-image"
                             alt="No image">
                    @endif
                </div>
                <div class="item-card-body">
                    <div class="badges-row">
                        <span class="category-badge">
                            <i class="fas fa-folder" style="margin-right: 6px;"></i>
                            {{ $item->category->name ?? 'N/A' }}
                        </span>
                        @php
                            $statusClass = strtolower($item->status);
                            if (!in_array($statusClass, ['available', 'pending', 'rented', 'maintenance', 'archived', 'active'])) {
                                $statusClass = 'active';
                            }
                        @endphp
                        <span class="status-badge-item {{ $statusClass }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </div>

                    <h4 class="item-title">{{ $item->title }}</h4>
                    <p class="item-description">{{ Str::limit($item->description, 80) }}</p>

                    <div class="item-price">
                        Rs {{ number_format($item->rent_price_per_day) }}
                        <small>/ day</small>
                    </div>

                    <div class="stats-row">
                        <div class="stat-item">
                            <span class="stat-value">{{ $item->quantity }}</span>
                            <br>
                            <span class="stat-label">Quantity</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value">{{ $item->city }}</span>
                            <br>
                            <span class="stat-label">City</span>
                        </div>
                    </div>

                    <!-- ===== THREE BUTTONS IN SINGLE LINE ===== -->
                    <div class="actions-row">
                        <!-- VIEW -->
                        <a href="{{ url('/owner/item/' . $item->id) }}" class="btn-action-card btn-view-card">
    <i class="fas fa-eye"></i> View
</a>
                        <!-- EDIT -->
                        <a href="/owner/item/{{ $item->id }}/edit" class="btn-action-card btn-edit-card">
                            <i class="fas fa-pen"></i> Edit
                        </a>
                        <!-- DELETE -->
                        <form id="delete-form-{{ $item->id }}" action="/owner/item/{{ $item->id }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        <button type="button" class="btn-action-card btn-delete-card" onclick="openDeleteModal({{ $item->id }}, '{{ addslashes($item->title) }}')">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <!-- empty state -->
        <div class="empty-state">
            <div class="empty-icon">
                <i class="fas fa-box-open"></i>
            </div>
            <h3>No Items Found</h3>
            <p>Start by adding your first rental item.</p>
            <a href="/owner/items/create" class="btn-add-empty">
                <i class="fas fa-plus"></i> Add Item
            </a>
        </div>
        @endif

        <!-- footer -->
        <div class="table-footer">
            <span>
                <i class="fas fa-arrow-right"></i> hover cards · red & white
            </span>
            <span class="pill">
                <i class="fas fa-boxes"></i> {{ $items->count() }} items
            </span>
        </div>
    </div>
</div>

<!-- ===== DELETE CONFIRMATION MODAL ===== -->
<div id="deleteModal" class="delete-modal-overlay">
    <div class="delete-modal">
        <div class="modal-icon">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <h3>Delete Item?</h3>
        <p>
            Are you sure you want to delete the item 
            <span class="item-highlight" id="modalItemTitle">"Item Title"</span>?
            <br>
            <small style="color: #dc3545; font-weight: 500;">
                <i class="fas fa-exclamation-circle"></i> This action cannot be undone.
            </small>
        </p>
        <div class="modal-actions">
            <button class="btn-cancel" onclick="closeDeleteModal()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="btn-confirm-delete" id="confirmDeleteBtn">
                <i class="fas fa-trash-alt"></i> Yes, Delete
            </button>
        </div>
    </div>
</div>

<!-- ===== SUCCESS TOAST ===== -->
<div id="successToast" class="toast-container-custom">
    <div id="toastMessage" class="toast-success" style="display: none;">
        <i class="fas fa-check-circle"></i>
        <div class="toast-content">
            <div class="toast-title">Success!</div>
            <div class="toast-message" id="toastText">Item deleted successfully</div>
        </div>
    </div>
</div>

<script>
    // Variables for delete functionality
    let deleteItemId = null;

    // Open delete modal
    function openDeleteModal(itemId, itemTitle) {
        deleteItemId = itemId;
        
        // Update modal with item title
        document.getElementById('modalItemTitle').textContent = `"${itemTitle}"`;
        
        // Show modal with animation
        const modal = document.getElementById('deleteModal');
        modal.style.display = 'flex';
        
        // Re-trigger animation
        const modalContent = modal.querySelector('.delete-modal');
        modalContent.style.animation = 'none';
        setTimeout(() => {
            modalContent.style.animation = 'modalSlideUp 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
        }, 10);
    }

    // Close delete modal
    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        modal.style.display = 'none';
        deleteItemId = null;
    }

    // Confirm delete
    document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
        if (deleteItemId) {
            // Find the form
            const form = document.getElementById(`delete-form-${deleteItemId}`);
            
            if (form) {
                // Close modal
                closeDeleteModal();
                
                // Find the card to animate
                const card = document.querySelector(`.item-card[data-item-id="${deleteItemId}"]`);
                
                // Show success toast
                showSuccessToast('Item deleted successfully!');
                
                // Animate card fade out
                if (card) {
                    card.classList.add('fade-out');
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 500);
                }
                
                // Submit the form after animation
                setTimeout(() => {
                    form.submit();
                }, 600);
            } else {
                console.error('Form not found for item ID:', deleteItemId);
                closeDeleteModal();
            }
        }
    });

    // Close modal on overlay click
    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeDeleteModal();
        }
    });

    // Close modal on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeDeleteModal();
        }
    });

    // Toast notification
    function showSuccessToast(message = 'Item deleted successfully') {
        const toast = document.getElementById('toastMessage');
        const textSpan = document.getElementById('toastText');
        
        if (textSpan) textSpan.innerText = message;
        
        // Reset and show
        toast.classList.remove('hide');
        toast.style.display = 'flex';
        
        // Remove previous animation and re-trigger
        toast.style.animation = 'none';
        setTimeout(() => {
            toast.style.animation = 'slideInRight 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
        }, 10);

        // Auto hide after 5 seconds
        clearTimeout(window.toastTimeout);
        window.toastTimeout = setTimeout(() => {
            toast.classList.add('hide');
            setTimeout(() => {
                toast.style.display = 'none';
            }, 500);
        }, 5000);
    }
</script>

@endsection