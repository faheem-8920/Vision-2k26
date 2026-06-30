@extends('admin.layout')

@section('content')

<style>
    /* ────────────── ROOT ────────────── */
    :root {
        --primary: #dc3545;
        --primary-dark: #b02a37;
        --primary-light: #fff5f5;
        --primary-gradient: linear-gradient(135deg, #dc3545 0%, #ff6b6b 100%);
        --primary-gradient-hover: linear-gradient(135deg, #c82333 0%, #e85d5d 100%);
        --dark: #1a1a2e;
        --shadow-sm: 0 4px 20px rgba(220, 53, 69, 0.10);
        --shadow-md: 0 10px 40px rgba(220, 53, 69, 0.15);
        --shadow-lg: 0 20px 60px rgba(220, 53, 69, 0.20);
        --shadow-xl: 0 30px 80px rgba(220, 53, 69, 0.25);
        --radius-sm: 12px;
        --radius-md: 18px;
        --radius-lg: 24px;
        --radius-xl: 32px;
        --transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        --transition-slow: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    /* ────────────── GLOBAL ────────────── */
    body {
        background: #f0f2f8;
    }

    /* ────────────── PAGE HEADER ────────────── */
    .page-header {
        background: var(--primary-gradient);
        color: #fff;
        padding: 32px 40px;
        border-radius: var(--radius-lg);
        margin-bottom: 32px;
        box-shadow: var(--shadow-xl);
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 16px;
        border: 1px solid rgba(255, 255, 255, 0.08);
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: -60%;
        right: -10%;
        width: 400px;
        height: 400px;
        background: rgba(255, 255, 255, 0.06);
        border-radius: 50%;
        pointer-events: none;
    }

    .page-header::after {
        content: '';
        position: absolute;
        bottom: -40%;
        left: 20%;
        width: 250px;
        height: 250px;
        background: rgba(255, 255, 255, 0.04);
        border-radius: 50%;
        pointer-events: none;
    }

    .page-header-content {
        position: relative;
        z-index: 1;
    }

    .page-header-content h2 {
        font-weight: 800;
        font-size: 1.8rem;
        letter-spacing: -0.5px;
        margin-bottom: 4px;
        display: flex;
        align-items: center;
        gap: 12px;
        color: #fff;
    }

    .page-header-content h2 .badge-new {
        background: rgba(255, 255, 255, 0.20);
        backdrop-filter: blur(8px);
        font-size: 0.65rem;
        padding: 4px 14px;
        border-radius: 60px;
        font-weight: 700;
        letter-spacing: 0.8px;
        border: 1px solid rgba(255, 255, 255, 0.15);
        color: #fff;
        text-transform: uppercase;
    }

    .page-header-content p {
        opacity: 0.85;
        font-weight: 400;
        margin-bottom: 0;
        font-size: 0.95rem;
        color: rgba(255, 255, 255, 0.9);
    }

    .page-header-stats {
        position: relative;
        z-index: 1;
        display: flex;
        gap: 24px;
        background: rgba(255, 255, 255, 0.10);
        backdrop-filter: blur(12px);
        padding: 12px 28px;
        border-radius: 60px;
        border: 1px solid rgba(255, 255, 255, 0.12);
    }

    .page-header-stats .stat-item {
        text-align: center;
        padding: 0 8px;
    }

    .page-header-stats .stat-item .number {
        font-size: 1.4rem;
        font-weight: 800;
        display: block;
        line-height: 1.2;
        color: #fff;
    }

    .page-header-stats .stat-item .label {
        font-size: 0.65rem;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        opacity: 0.7;
        font-weight: 600;
        color: rgba(255, 255, 255, 0.8);
    }

    /* ────────────── STATS CARDS ────────────── */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 32px;
    }

    .stats-card {
        background: #fff;
        border: none;
        border-radius: var(--radius-md);
        padding: 24px 20px;
        text-align: center;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(220, 53, 69, 0.05);
        cursor: default;
    }

    .stats-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--primary-gradient);
        transform: scaleX(0);
        transform-origin: left;
        transition: var(--transition);
    }

    .stats-card::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 100px;
        height: 100px;
        background: var(--primary-gradient);
        opacity: 0.03;
        border-radius: 50%;
        transition: var(--transition-slow);
    }

    .stats-card:hover {
        transform: translateY(-8px) scale(1.01);
        box-shadow: var(--shadow-md);
        border-color: rgba(220, 53, 69, 0.12);
    }

    .stats-card:hover::before {
        transform: scaleX(1);
    }

    .stats-card:hover::after {
        transform: scale(2);
        opacity: 0.06;
    }

    .stats-card .stats-icon {
        font-size: 2rem;
        margin-bottom: 6px;
        display: block;
    }

    .stats-card .stats-number {
        font-size: 2.2rem;
        font-weight: 800;
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        line-height: 1.2;
        letter-spacing: -0.5px;
    }

    .stats-card .stats-label {
        color: #6c757d;
        font-weight: 600;
        font-size: 0.85rem;
        margin-top: 2px;
        letter-spacing: 0.3px;
        text-transform: uppercase;
    }

    .stats-card .stats-trend {
        font-size: 0.7rem;
        font-weight: 700;
        margin-top: 8px;
        display: inline-block;
        padding: 3px 14px;
        border-radius: 60px;
        background: #e8f5e9;
        color: #2e7d32;
        letter-spacing: 0.3px;
    }

    .stats-card .stats-trend.down {
        background: #ffebee;
        color: #c62828;
    }

    /* ────────────── MAIN CARD ────────────── */
    .custom-card {
        border: none;
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
        background: #fff;
        border: 1px solid rgba(220, 53, 69, 0.04);
    }

    .custom-card:hover {
        box-shadow: var(--shadow-md);
    }

    /* ────────────── CARD HEADER ────────────── */
    .card-header-custom {
        padding: 20px 28px;
        background: #fff !important;
        border-bottom: 1px solid rgba(220, 53, 69, 0.06);
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
    }

    .card-header-custom .header-title {
        font-weight: 700;
        color: var(--dark);
        font-size: 1rem;
        letter-spacing: 0.3px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .card-header-custom .header-title .count-badge {
        background: var(--primary-gradient);
        color: #fff;
        font-size: 0.7rem;
        padding: 2px 12px;
        border-radius: 60px;
        font-weight: 700;
    }

    /* ────────────── SEARCH ────────────── */
    .search-wrapper {
        position: relative;
        min-width: 240px;
    }

    .search-wrapper .search-icon {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #adb5bd;
        font-size: 0.9rem;
        pointer-events: none;
        transition: var(--transition);
    }

    .search-box {
        border-radius: 60px;
        padding: 10px 18px 10px 46px;
        border: 2px solid #f0f0f0;
        font-size: 0.9rem;
        transition: var(--transition);
        background: #fafafa;
        width: 100%;
        font-weight: 500;
    }

    .search-box:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 6px rgba(220, 53, 69, 0.08);
        background: #fff;
        outline: none;
    }

    .search-box:focus+.search-icon {
        color: var(--primary);
    }

    .search-box::placeholder {
        color: #adb5bd;
        font-weight: 400;
    }

    /* ────────────── TABLE ────────────── */
    .table-wrap {
        padding: 0 4px 4px 4px;
    }

    .custom-table {
        margin-bottom: 0;
        font-size: 0.9rem;
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
    }

    /* --- ENHANCED TABLE HEADER with WHITE TEXT --- */
    .custom-table thead {
        background: var(--primary-gradient);
        color: #fff !important;
        border: none;
    }

    .custom-table thead th {
        padding: 16px 20px;
        border: none;
        font-weight: 700;
        font-size: 0.72rem;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        white-space: nowrap;
        position: relative;
        color: #ffffff !important;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.06);
    }

    .custom-table thead th:not(:last-child)::after {
        content: '';
        position: absolute;
        right: 0;
        top: 20%;
        height: 60%;
        width: 1.5px;
        background: rgba(255, 255, 255, 0.15);
    }

    .custom-table thead th .th-icon {
        margin-right: 6px;
        opacity: 0.8;
    }

    .custom-table tbody tr {
        transition: var(--transition);
        border-bottom: 1px solid rgba(220, 53, 69, 0.04);
        background: #fff;
    }

    .custom-table tbody tr:last-child {
        border-bottom: none;
    }

    .custom-table tbody tr:hover {
        background: var(--primary-light);
        transform: scale(1.002);
        box-shadow: 0 2px 12px rgba(220, 53, 69, 0.04);
    }

    .custom-table tbody tr:active {
        transform: scale(0.998);
    }

    .custom-table td {
        vertical-align: middle;
        padding: 14px 20px;
        border: none;
        font-weight: 500;
        color: #2d3436;
    }

    /* ────────────── USER ────────────── */
    .user-cell {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 60px;
        background: var(--primary-gradient);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.9rem;
        flex-shrink: 0;
        box-shadow: 0 4px 12px rgba(220, 53, 69, 0.2);
        transition: var(--transition);
        text-transform: uppercase;
    }

    .user-cell:hover .user-avatar {
        transform: scale(1.08) rotate(-3deg);
        box-shadow: 0 6px 20px rgba(220, 53, 69, 0.3);
    }

    .user-name {
        font-weight: 700;
        color: var(--dark);
        transition: var(--transition);
    }

    .user-name:hover {
        color: var(--primary);
    }

    .user-email {
        font-size: 0.7rem;
        color: #6c757d;
        font-weight: 400;
        display: block;
        margin-top: -2px;
    }

    /* ────────────── CNIC IMAGES ────────────── */
    .cnic-wrapper {
        position: relative;
        display: inline-block;
    }

    .cnic-img {
        width: 80px;
        height: 56px;
        object-fit: cover;
        border-radius: var(--radius-sm);
        border: 2px solid #f0f0f0;
        transition: var(--transition);
        cursor: pointer;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        background: #f8f9fa;
    }

    .cnic-img:hover {
        transform: scale(2.6) translateY(-8px);
        z-index: 999;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
        border-color: var(--primary);
        border-radius: var(--radius-sm);
    }

    .cnic-img:not(:hover) {
        transition-delay: 0.1s;
    }

    .no-image {
        color: #adb5bd;
        font-size: 0.65rem;
        font-weight: 600;
        background: #f8f9fa;
        padding: 4px 14px;
        border-radius: 60px;
        border: 1px dashed #dee2e6;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* ────────────── STATUS BADGES ────────────── */
    .status-badge {
        padding: 5px 16px;
        border-radius: 60px;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: var(--transition);
        border: 1px solid transparent;
    }

    .status-pending {
        background: #fff3cd;
        color: #856404;
        border-color: #ffc107;
    }

    .status-pending .dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #ffc107;
        display: inline-block;
        animation: pulse-dot 1.5s infinite;
    }

    @keyframes pulse-dot {
        0%,
        100% {
            opacity: 1;
            transform: scale(1);
        }
        50% {
            opacity: 0.4;
            transform: scale(0.8);
        }
    }

    .status-approved {
        background: #d4edda;
        color: #155724;
        border-color: #28a745;
    }

    .status-rejected {
        background: #f8d7da;
        color: #721c24;
        border-color: #dc3545;
    }

    .status-badge:hover {
        transform: scale(1.04) translateY(-1px);
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
    }

    /* ────────────── ACTION BUTTONS ────────────── */
    .action-group {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        align-items: center;
    }

    .btn-action {
        border: none;
        border-radius: 60px;
        padding: 8px 20px;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        transition: var(--transition);
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-transform: uppercase;
        position: relative;
        overflow: hidden;
        cursor: pointer;
    }

    .btn-action::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .btn-action:active::after {
        width: 300px;
        height: 300px;
    }

    .btn-approve {
        background: #28a745;
        color: #fff;
        box-shadow: 0 4px 12px rgba(40, 167, 69, 0.25);
    }

    .btn-approve:hover {
        background: #1e7e34;
        transform: translateY(-3px) scale(1.04);
        box-shadow: 0 8px 24px rgba(40, 167, 69, 0.35);
        color: #fff;
    }

    .btn-reject {
        background: var(--primary);
        color: #fff;
        box-shadow: 0 4px 12px rgba(220, 53, 69, 0.25);
    }

    .btn-reject:hover {
        background: var(--primary-dark);
        transform: translateY(-3px) scale(1.04);
        box-shadow: 0 8px 24px rgba(220, 53, 69, 0.35);
        color: #fff;
    }

    .btn-action:active {
        transform: scale(0.94) !important;
    }

    .processed-badge {
        font-size: 0.65rem;
        font-weight: 700;
        color: #6c757d;
        background: #f1f3f5;
        padding: 6px 16px;
        border-radius: 60px;
        border: 1px solid #e9ecef;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    /* ────────────── EMPTY STATE ────────────── */
    .empty-state {
        padding: 60px 20px;
        text-align: center;
    }

    .empty-state .empty-icon {
        font-size: 3.5rem;
        margin-bottom: 16px;
        display: block;
        opacity: 0.3;
    }

    .empty-state h5 {
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 4px;
    }

    .empty-state p {
        color: #6c757d;
        font-weight: 400;
    }

    /* ────────────── ANIMATIONS ────────────── */
    @keyframes fadeSlideUp {
        from {
            opacity: 0;
            transform: translateY(30px) scale(0.98);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: scale(0.96);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .page-header {
        animation: fadeSlideUp 0.6s ease forwards;
    }

    .stats-card {
        animation: fadeSlideUp 0.6s ease forwards;
        opacity: 0;
    }

    .stats-card:nth-child(2) {
        animation-delay: 0.08s;
    }
    .stats-card:nth-child(3) {
        animation-delay: 0.16s;
    }
    .stats-card:nth-child(4) {
        animation-delay: 0.24s;
    }

    .custom-card {
        animation: fadeSlideUp 0.6s ease 0.15s forwards;
        opacity: 0;
    }

    .custom-table tbody tr {
        animation: fadeIn 0.4s ease forwards;
        opacity: 0;
    }

    .custom-table tbody tr:nth-child(1) {
        animation-delay: 0.05s;
    }
    .custom-table tbody tr:nth-child(2) {
        animation-delay: 0.10s;
    }
    .custom-table tbody tr:nth-child(3) {
        animation-delay: 0.15s;
    }
    .custom-table tbody tr:nth-child(4) {
        animation-delay: 0.20s;
    }
    .custom-table tbody tr:nth-child(5) {
        animation-delay: 0.25s;
    }
    .custom-table tbody tr:nth-child(6) {
        animation-delay: 0.30s;
    }
    .custom-table tbody tr:nth-child(7) {
        animation-delay: 0.35s;
    }
    .custom-table tbody tr:nth-child(8) {
        animation-delay: 0.40s;
    }
    .custom-table tbody tr:nth-child(9) {
        animation-delay: 0.45s;
    }
    .custom-table tbody tr:nth-child(10) {
        animation-delay: 0.50s;
    }

    /* ────────────── SCROLLBAR ────────────── */
    .table-responsive::-webkit-scrollbar {
        height: 6px;
        width: 6px;
    }

    .table-responsive::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .table-responsive::-webkit-scrollbar-thumb {
        background: var(--primary);
        border-radius: 10px;
    }

    .table-responsive::-webkit-scrollbar-thumb:hover {
        background: var(--primary-dark);
    }

    /* ────────────── RESPONSIVE ────────────── */
    @media (max-width: 992px) {
        .page-header {
            flex-direction: column;
            align-items: stretch;
            padding: 24px;
        }
        .page-header-stats {
            justify-content: space-around;
            padding: 12px 16px;
        }
        .page-header-stats .stat-item .number {
            font-size: 1.2rem;
        }
    }

    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: 1fr 1fr;
        }
        .card-header-custom {
            flex-direction: column;
            align-items: stretch;
        }
        .search-wrapper {
            min-width: 100%;
        }
        .action-group {
            flex-direction: column;
            gap: 6px;
        }
        .cnic-img:hover {
            transform: scale(1.6);
        }
        .custom-table td,
        .custom-table th {
            padding: 10px 12px;
            font-size: 0.8rem;
        }
        .page-header-content h2 {
            font-size: 1.4rem;
        }
    }

    @media (max-width: 480px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }
        .page-header-stats {
            flex-wrap: wrap;
            gap: 8px;
            border-radius: var(--radius-md);
        }
        .page-header-stats .stat-item {
            flex: 1 1 40%;
            padding: 4px 0;
        }
        .user-cell {
            flex-direction: column;
            align-items: flex-start;
            gap: 4px;
        }
    }
</style>

<div class="container-fluid">

    {{-- ═══ PAGE HEADER ═══ --}}
    <div class="page-header">
        <div class="page-header-content">
            <h2>
                👑 Owner Verification
                <span class="badge-new">Admin</span>
            </h2>
            <p>Review and manage owner approval requests from users</p>
        </div>
        <div class="page-header-stats">
            <div class="stat-item">
                <span class="number">{{ $requests->count() }}</span>
                <span class="label">Total</span>
            </div>
            <div class="stat-item">
                <span class="number" style="color:#ffc107;">{{ $requests->where('status','pending')->count() }}</span>
                <span class="label">Pending</span>
            </div>
            <div class="stat-item">
                <span class="number" style="color:#28a745;">{{ $requests->where('status','approved')->count() }}</span>
                <span class="label">Approved</span>
            </div>
            <div class="stat-item">
                <span class="number" style="color:#dc3545;">{{ $requests->where('status','rejected')->count() }}</span>
                <span class="label">Rejected</span>
            </div>
        </div>
    </div>

    {{-- ═══ STATS GRID ═══ --}}
    <div class="stats-grid">
        <div class="stats-card">
            <span class="stats-icon">📋</span>
            <div class="stats-number">{{ $requests->count() }}</div>
            <div class="stats-label">Total Requests</div>
            <span class="stats-trend">↑ +12%</span>
        </div>
        <div class="stats-card">
            <span class="stats-icon">⏳</span>
            <div class="stats-number">{{ $requests->where('status','pending')->count() }}</div>
            <div class="stats-label">Pending Review</div>
            <span class="stats-trend down">⚡ Needs attention</span>
        </div>
        <div class="stats-card">
            <span class="stats-icon">✅</span>
            <div class="stats-number">{{ $requests->where('status','approved')->count() }}</div>
            <div class="stats-label">Approved</div>
            <span class="stats-trend">✓ Verified</span>
        </div>
        <div class="stats-card">
            <span class="stats-icon">❌</span>
            <div class="stats-number">{{ $requests->where('status','rejected')->count() }}</div>
            <div class="stats-label">Rejected</div>
            <span class="stats-trend down">✕ Declined</span>
        </div>
    </div>

    {{-- ═══ TABLE CARD ═══ --}}
    <div class="card custom-card">

        <div class="card-header-custom">
            <div class="header-title">
                📋 Requests
                <span class="count-badge">{{ $requests->count() }}</span>
            </div>
            <div class="search-wrapper">
                <input type="text"
                       id="searchInput"
                       class="form-control search-box"
                       placeholder="Search by user, CNIC or phone...">
                <span class="search-icon">🔍</span>
            </div>
        </div>

        <div class="table-wrap">
            <div class="table-responsive">
                <table class="table custom-table mb-0">
                    <thead>
                        <tr>
                            <th><span class="th-icon">👤</span> User</th>
                            <th><span class="th-icon">🆔</span> CNIC</th>
                            <th><span class="th-icon">📞</span> Phone</th>
                            <th><span class="th-icon">🖼️</span> CNIC Front</th>
                            <th><span class="th-icon">🖼️</span> CNIC Back</th>
                            <th><span class="th-icon">📌</span> Status</th>
                            <th style="min-width:210px;"><span class="th-icon">⚡</span> Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">

                        @forelse($requests as $request)
                            <tr>
                                {{-- USER --}}
                                <td>
                                    <div class="user-cell">
                                        <div class="user-avatar">
                                            {{ strtoupper(substr($request->user->name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <div class="user-name">{{ $request->user->name }}</div>
                                            <span class="user-email">{{ $request->user->email ?? '' }}</span>
                                        </div>
                                    </div>
                                </td>

                                <td><strong>{{ $request->cnic }}</strong></td>
                                <td>{{ $request->phone }}</td>

                                {{-- CNIC FRONT --}}
                                <td>
                                    @if($request->cnic_front)
                                        <div class="cnic-wrapper">
                                            <a href="{{ asset('storage/'.$request->cnic_front) }}" target="_blank">
                                                <img src="{{ asset('storage/'.$request->cnic_front) }}"
                                                     class="cnic-img"
                                                     alt="CNIC Front"
                                                     loading="lazy">
                                            </a>
                                        </div>
                                    @else
                                        <span class="no-image">No Image</span>
                                    @endif
                                </td>

                                {{-- CNIC BACK --}}
                                <td>
                                    @if($request->cnic_back)
                                        <div class="cnic-wrapper">
                                            <a href="{{ asset('storage/'.$request->cnic_back) }}" target="_blank">
                                                <img src="{{ asset('storage/'.$request->cnic_back) }}"
                                                     class="cnic-img"
                                                     alt="CNIC Back"
                                                     loading="lazy">
                                            </a>
                                        </div>
                                    @else
                                        <span class="no-image">No Image</span>
                                    @endif
                                </td>

                                {{-- STATUS --}}
                                <td>
                                    @if($request->status == 'pending')
                                        <span class="status-badge status-pending">
                                            <span class="dot"></span> Pending
                                        </span>
                                    @elseif($request->status == 'approved')
                                        <span class="status-badge status-approved">✅ Approved</span>
                                    @else
                                        <span class="status-badge status-rejected">❌ Rejected</span>
                                    @endif
                                </td>

                                {{-- ACTIONS --}}
                                <td>
                                    <div class="action-group">
                                        @if($request->status == 'pending')
                                            <form method="POST" action="/admin/owner-requests/{{ $request->id }}/approve">
                                                @csrf
                                                <button type="submit" class="btn btn-action btn-approve">
                                                    ✓ Approve
                                                </button>
                                            </form>

                                            <form method="POST" action="/admin/owner-requests/{{ $request->id }}/reject">
                                                @csrf
                                                <button type="submit" class="btn btn-action btn-reject">
                                                    ✕ Reject
                                                </button>
                                            </form>
                                        @else
                                            <span class="processed-badge">
                                                ✓ Processed
                                            </span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="empty-state">
                                    <span class="empty-icon">📭</span>
                                    <h5>No verification requests</h5>
                                    <p>All owner requests have been processed.</p>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

{{-- ═══ SEARCH SCRIPT ═══ --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const tableBody = document.getElementById('tableBody');
        const rows = tableBody.querySelectorAll('tr');

        searchInput.addEventListener('input', function() {
            const value = this.value.toLowerCase().trim();

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(value) ? '' : 'none';
            });
        });
    });
</script>

@endsection