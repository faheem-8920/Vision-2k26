@extends('admin.layout')

@section('content')

<!DOCTYPE html>
<html lang="en" class="light-style" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('Admin/assets/') }}/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Dashboard · Sneat Red</title>
    <meta name="description" content="Premium Red & White Admin Dashboard" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('Admin/assets/') }}/img/favicon/favicon.ico" />

    <!-- Font Awesome 6 (Free) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('Admin/assets/') }}/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('Admin/assets/') }}/vendor/css/core.css" />
    <link rel="stylesheet" href="{{ asset('Admin/assets/') }}/vendor/css/theme-default.css" />
    <link rel="stylesheet" href="{{ asset('Admin/assets/') }}/css/demo.css" />
    <link rel="stylesheet" href="{{ asset('Admin/assets/') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('Admin/assets/') }}/vendor/libs/apex-charts/apex-charts.css" />

    <style>
        /* ============================================================
           PREMIUM RED & WHITE THEME - CLEAN LAYOUT
           ============================================================ */
        :root {
            --bs-primary: #dc3545;
            --bs-primary-rgb: 220, 53, 69;
            --bs-link-color: #dc3545;
            --bs-link-hover-color: #a71d2a;
            --bs-border-color: #f0e8e8;
            --glass-bg: rgba(255, 255, 255, 0.92);
            --glass-border: rgba(220, 53, 69, 0.08);
        }

        * {
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        body {
            background: linear-gradient(135deg, #faf5f5 0%, #f5eeee 100%);
            font-family: 'Inter', 'Public Sans', sans-serif;
            min-height: 100vh;
            padding: 1.5rem;
        }

        /* --- Main content full width --- */
        .dashboard-wrapper {
            max-width: 1600px;
            margin: 0 auto;
        }

        /* --- Glass morphism cards --- */
        .card {
            border-radius: 1.5rem;
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            box-shadow: 0 8px 32px rgba(220, 53, 69, 0.04);
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            overflow: hidden;
            position: relative;
        }
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, #dc3545, transparent);
            opacity: 0;
            transition: opacity 0.5s;
        }
        .card:hover::before {
            opacity: 1;
        }
        .card:hover {
            transform: translateY(-10px) scale(1.005);
            box-shadow: 0 24px 56px rgba(220, 53, 69, 0.10);
            border-color: rgba(220, 53, 69, 0.15);
        }
        .card .card-header {
            background: rgba(220, 53, 69, 0.02);
            border-bottom: 1px solid rgba(220, 53, 69, 0.04);
            padding: 1.25rem 1.75rem;
            font-weight: 600;
        }
        .card .card-body {
            padding: 1.75rem;
        }

        /* --- Buttons --- */
        .btn-primary {
            background: linear-gradient(135deg, #dc3545, #b02a37);
            border: none;
            color: #fff;
            padding: 0.6rem 1.8rem;
            border-radius: 2rem;
            font-weight: 600;
            box-shadow: 0 4px 16px rgba(220, 53, 69, 0.25);
        }
        .btn-primary:hover {
            transform: translateY(-3px) scale(1.04);
            box-shadow: 0 8px 28px rgba(220, 53, 69, 0.35);
            color: #fff;
        }
        .btn-outline-primary {
            border: 2px solid #dc3545;
            color: #dc3545;
            border-radius: 2rem;
            font-weight: 600;
        }
        .btn-outline-primary:hover {
            background: #dc3545;
            color: #fff;
            transform: translateY(-3px) scale(1.04);
            box-shadow: 0 8px 24px rgba(220, 53, 69, 0.25);
        }

        /* --- Badges --- */
        .badge.bg-primary {
            background: linear-gradient(135deg, #dc3545, #b02a37) !important;
            padding: 0.5rem 1.2rem;
            border-radius: 2rem;
            font-weight: 600;
        }

        /* --- Footer --- */
        .footer-link {
            color: #6c757d;
            transition: all 0.3s;
        }
        .footer-link:hover {
            color: #dc3545 !important;
            transform: translateY(-2px);
        }

        /* --- Premium Stat Cards --- */
        .stat-card {
            padding: 1.75rem 1.5rem;
            border-radius: 1.5rem;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(220, 53, 69, 0.06);
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            height: 100%;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
        }
        .stat-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #dc3545, #f5a0a5, #dc3545);
            background-size: 200% 100%;
            opacity: 0;
            transition: opacity 0.5s;
        }
        .stat-card:hover::after {
            opacity: 1;
            animation: shimmer 2s infinite;
        }
        @keyframes shimmer {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }
        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 48px rgba(220, 53, 69, 0.08);
            border-color: rgba(220, 53, 69, 0.12);
        }
        .stat-card .stat-number {
            font-size: 2.4rem;
            font-weight: 800;
            color: #1a1a1a;
            letter-spacing: -0.5px;
            line-height: 1.2;
            word-break: break-word;
        }
        .stat-card .stat-label {
            color: #6c757d;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700;
        }
        .stat-card .stat-icon {
            font-size: 2.8rem;
            color: #dc3545;
            opacity: 0.6;
            transition: all 0.5s;
            flex-shrink: 0;
        }
        .stat-card:hover .stat-icon {
            transform: scale(1.15) rotate(-6deg);
            opacity: 1;
        }
        .stat-card .stat-sub {
            font-size: 0.8rem;
            color: #6c757d;
            margin-top: 0.5rem;
            padding: 0.4rem 0.8rem;
            background: rgba(220, 53, 69, 0.04);
            border-radius: 2rem;
            display: inline-block;
            word-break: break-word;
        }
        .stat-card .stat-sub i {
            color: #dc3545;
        }

        /* --- Status badges premium --- */
        .status-badge {
            padding: 0.4rem 1.2rem;
            border-radius: 2rem;
            font-size: 0.7rem;
            font-weight: 700;
            display: inline-block;
            transition: all 0.4s;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .status-badge:hover {
            transform: scale(1.06) translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }
        .status-badge.pending {
            background: linear-gradient(135deg, #fff3cd, #ffe69b);
            color: #856404;
        }
        .status-badge.approved {
            background: linear-gradient(135deg, #d4edda, #b7e4c7);
            color: #155724;
        }
        .status-badge.handed_over {
            background: linear-gradient(135deg, #cce5ff, #99caff);
            color: #004085;
        }
        .status-badge.returned {
            background: linear-gradient(135deg, #d1ecf1, #a6dbe5);
            color: #0c5460;
        }
        .status-badge.completed {
            background: linear-gradient(135deg, #d4edda, #92d4a8);
            color: #155724;
        }
        .status-badge.rejected {
            background: linear-gradient(135deg, #f8d7da, #f5b7ba);
            color: #721c24;
        }

        /* --- Table premium --- */
        .table-hover tbody tr {
            transition: all 0.3s;
        }
        .table-hover tbody tr:hover {
            background: rgba(220, 53, 69, 0.03) !important;
            transform: scale(1.005);
            box-shadow: 0 2px 12px rgba(220, 53, 69, 0.04);
        }
        .table thead th {
            font-weight: 700;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: #6c757d;
            border-bottom: 2px solid #f0e8e8;
        }

        /* --- Congrats Banner Premium --- */
        .congrats-banner {
            background: linear-gradient(135deg, #ffffff, #fdf5f5);
            border: 1px solid rgba(220, 53, 69, 0.08);
            border-radius: 1.5rem;
            padding: 1.5rem 2rem;
            box-shadow: 0 4px 24px rgba(220, 53, 69, 0.04);
            transition: all 0.5s;
            position: relative;
            overflow: hidden;
        }
        .congrats-banner::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(220, 53, 69, 0.03), transparent);
            border-radius: 50%;
            pointer-events: none;
        }
        .congrats-banner:hover {
            box-shadow: 0 8px 40px rgba(220, 53, 69, 0.08);
            border-color: rgba(220, 53, 69, 0.12);
            transform: translateY(-2px);
        }
        .congrats-banner .badge-premium {
            background: linear-gradient(135deg, #dc3545, #b02a37);
            color: #ffffff;
            padding: 0.5rem 1.8rem;
            border-radius: 2rem;
            font-weight: 600;
            box-shadow: 0 4px 16px rgba(220, 53, 69, 0.25);
            transition: all 0.4s;
            display: inline-block;
        }
        .congrats-banner .badge-premium:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 28px rgba(220, 53, 69, 0.35);
        }
        .congrats-banner .badge-white-premium {
            background: #ffffff;
            color: #dc3545;
            border: 2px solid rgba(220, 53, 69, 0.12);
            padding: 0.5rem 1.8rem;
            border-radius: 2rem;
            font-weight: 600;
            transition: all 0.4s;
            display: inline-block;
        }
        .congrats-banner .badge-white-premium:hover {
            background: #dc3545;
            color: #ffffff;
            transform: scale(1.05);
            box-shadow: 0 4px 20px rgba(220, 53, 69, 0.2);
        }

        /* --- Progress bar premium --- */
        .progress-bar-custom {
            height: 8px;
            border-radius: 8px;
            background: #f0e8e8;
            overflow: hidden;
        }
        .progress-bar-custom .progress-fill {
            height: 100%;
            border-radius: 8px;
            background: linear-gradient(90deg, #dc3545, #f0757a, #dc3545);
            background-size: 200% 100%;
            transition: width 1.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            animation: progressShimmer 3s infinite;
        }
        @keyframes progressShimmer {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        /* --- Chart container --- */
        .chart-container {
            opacity: 0;
            animation: fadeInUp 0.9s ease forwards;
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px) scale(0.98);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* --- Stat Box premium --- */
        .stat-box {
            transition: all 0.4s;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            border: 1px solid #f0e8e8;
            border-radius: 1rem;
            padding: 1.5rem !important;
        }
        .stat-box:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 32px rgba(220, 53, 69, 0.06);
            background: #ffffff;
            border-color: rgba(220, 53, 69, 0.1);
        }

        /* --- Misc premium --- */
        .text-primary {
            color: #dc3545 !important;
        }
        .bg-soft-red {
            background: rgba(220, 53, 69, 0.06);
        }
        .glow-number {
            text-shadow: 0 0 40px rgba(220, 53, 69, 0.05);
        }

        /* --- Brand Logo --- */
        .brand-logo {
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            font-size: 1.4rem;
            font-weight: 800;
            color: #dc3545;
            gap: 0.5rem;
        }
        .brand-logo:hover {
            color: #b02a37;
        }

        /* --- Responsive --- */
        @media (max-width: 767.98px) {
            .stat-card .stat-number {
                font-size: 1.6rem;
            }
            .congrats-banner {
                padding: 1.25rem;
            }
            .card .card-body {
                padding: 1.25rem;
            }
            body {
                padding: 1rem;
            }
            .stat-card .stat-icon {
                font-size: 2rem;
            }
        }

        @media (max-width: 575.98px) {
            .stat-card .stat-number {
                font-size: 1.4rem;
            }
            .stat-card {
                padding: 1.25rem 1rem;
            }
            .congrats-banner .badge-premium,
            .congrats-banner .badge-white-premium {
                padding: 0.3rem 1rem;
                font-size: 0.8rem;
            }
        }

        /* Smooth scroll */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f8f4f4;
        }
        ::-webkit-scrollbar-thumb {
            background: #dc3545;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #b02a37;
        }

        /* Fix number wrapping */
        .stat-number {
            word-break: break-word;
            overflow-wrap: break-word;
        }
        .stat-number small {
            font-size: 0.6em;
            font-weight: 400;
            color: #6c757d;
        }
    </style>

    <script src="{{ asset('Admin/assets/') }}/vendor/js/helpers.js"></script>
    <script src="{{ asset('Admin/assets/') }}/js/config.js"></script>
</head>

<body>
    <div class="dashboard-wrapper">

        <!-- ===== CONTENT ===== -->
        <div class="content-wrapper">
            @yield('content')

            <div class="container-xxl flex-grow-1 container-p-y px-0">

                <!-- Congrats Banner - Premium -->
                <div class="congrats-banner mb-4 d-flex flex-wrap align-items-center justify-content-between">
                    <div>
                        <h4 class="mb-1" style="font-weight:800;"><i class="fas fa-hand-wave text-primary me-2"></i>Welcome back, Admin!</h4>
                        <p class="mb-0 text-muted" style="font-weight:400;">You have <strong class="text-primary">{{ number_format($newUsersThisMonth ?? 0) }}</strong> new users and <strong class="text-primary">{{ number_format($newItemsThisMonth ?? 0) }}</strong> new items this month.</p>
                    </div>
                    <div class="d-flex align-items-center gap-3 mt-2 mt-sm-0 flex-wrap">
                        <span class="badge-white-premium">
                            <i class="fas fa-star text-warning me-2"></i>
                            {{ number_format($totalReviews ?? 0) }} Reviews · {{ number_format($averageRating ?? 0, 1) }}/5
                        </span>
                        <span class="badge-premium">
                            <i class="fas fa-chart-line me-2"></i>+{{ number_format($newUsersThisMonth ?? 0) }}% growth
                        </span>
                    </div>
                </div>

                <!-- Stats Row 1: Users, Items, Bookings, Revenue -->
                <div class="row g-4 mb-4">
                    <div class="col-sm-6 col-lg-3">
                        <div class="stat-card">
                            <div class="d-flex justify-content-between align-items-start">
                                <div style="flex:1;min-width:0;">
                                    <div class="stat-label"><i class="fas fa-users me-1"></i>Total Users</div>
                                    <div class="stat-number glow-number">{{ number_format($totalUsers ?? 0) }}</div>
                                    <div class="stat-sub"><i class="fas fa-user-tie me-1"></i>{{ number_format($totalOwners ?? 0) }} Owners · <i class="fas fa-user me-1"></i>{{ number_format($totalRenters ?? 0) }} Renters</div>
                                </div>
                                <div class="stat-icon ms-3"><i class="fas fa-user-circle"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="stat-card">
                            <div class="d-flex justify-content-between align-items-start">
                                <div style="flex:1;min-width:0;">
                                    <div class="stat-label"><i class="fas fa-box me-1"></i>Total Items</div>
                                    <div class="stat-number glow-number">{{ number_format($totalItems ?? 0) }}</div>
                                    <div class="stat-sub"><i class="fas fa-clock me-1"></i>{{ number_format($pendingItems ?? 0) }} Pending · <i class="fas fa-check-circle me-1"></i>{{ number_format($approvedItems ?? 0) }} Approved</div>
                                </div>
                                <div class="stat-icon ms-3"><i class="fas fa-cubes"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="stat-card">
                            <div class="d-flex justify-content-between align-items-start">
                                <div style="flex:1;min-width:0;">
                                    <div class="stat-label"><i class="fas fa-calendar-check me-1"></i>Total Bookings</div>
                                    <div class="stat-number glow-number">{{ number_format($totalBookings ?? 0) }}</div>
                                    <div class="stat-sub"><i class="fas fa-calendar-day me-1"></i>Today: {{ number_format($todayBookings ?? 0) }}</div>
                                </div>
                                <div class="stat-icon ms-3"><i class="fas fa-calendar-alt"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="stat-card">
                            <div class="d-flex justify-content-between align-items-start">
                                <div style="flex:1;min-width:0;">
                                    <div class="stat-label"><i class="fas fa-dollar-sign me-1"></i>Total Revenue</div>
                                    <div class="stat-number glow-number">${{ number_format($totalRevenue ?? 0, 2) }}</div>
                                    <div class="stat-sub"><i class="fas fa-calendar-month me-1"></i>This month: ${{ number_format($monthRevenue ?? 0, 2) }}</div>
                                </div>
                                <div class="stat-icon ms-3"><i class="fas fa-money-bill-wave"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Row: Booking Status Chart + Revenue Chart -->
                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <div class="card h-100 chart-container">
                            <div class="card-header"><h5 class="mb-0 text-primary" style="font-weight:700;"><i class="fas fa-chart-pie me-2"></i>Booking Status Distribution</h5></div>
                            <div class="card-body">
                                <div id="bookingStatusChart" style="height:290px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 chart-container">
                            <div class="card-header"><h5 class="mb-0 text-primary" style="font-weight:700;"><i class="fas fa-chart-line me-2"></i>Revenue Overview</h5></div>
                            <div class="card-body">
                                <div id="revenueChart" style="height:290px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Booking Status Overview (compact) -->
                <div class="row g-4 mb-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"><h5 class="mb-0 text-primary" style="font-weight:700;"><i class="fas fa-list-ul me-2"></i>Booking Status Overview</h5></div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-4 col-md-2 text-center">
                                        <div class="stat-box">
                                            <span class="status-badge pending mb-2 d-inline-block">Pending</span>
                                            <h3 class="mb-0" style="font-weight:800;color:#856404;">{{ number_format($pendingBookings ?? 0) }}</h3>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-2 text-center">
                                        <div class="stat-box">
                                            <span class="status-badge approved mb-2 d-inline-block">Approved</span>
                                            <h3 class="mb-0" style="font-weight:800;color:#155724;">{{ number_format($approvedBookings ?? 0) }}</h3>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-2 text-center">
                                        <div class="stat-box">
                                            <span class="status-badge handed_over mb-2 d-inline-block">Handed Over</span>
                                            <h3 class="mb-0" style="font-weight:800;color:#004085;">{{ number_format($handedOverBookings ?? 0) }}</h3>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-2 text-center">
                                        <div class="stat-box">
                                            <span class="status-badge returned mb-2 d-inline-block">Returned</span>
                                            <h3 class="mb-0" style="font-weight:800;color:#0c5460;">{{ number_format($returnedBookings ?? 0) }}</h3>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-2 text-center">
                                        <div class="stat-box">
                                            <span class="status-badge completed mb-2 d-inline-block">Completed</span>
                                            <h3 class="mb-0" style="font-weight:800;color:#155724;">{{ number_format($completedBookings ?? 0) }}</h3>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-2 text-center">
                                        <div class="stat-box">
                                            <span class="status-badge rejected mb-2 d-inline-block">Rejected</span>
                                            <h3 class="mb-0" style="font-weight:800;color:#721c24;">{{ number_format($rejectedBookings ?? 0) }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Top Performers -->
                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-header"><h5 class="mb-0 text-primary" style="font-weight:700;"><i class="fas fa-trophy me-2"></i>Most Rented Item</h5></div>
                            <div class="card-body">
                                @if($mostRentedItem)
                                    <h4 style="font-weight:700;word-break:break-word;"><i class="fas fa-cube text-primary me-2"></i>{{ $mostRentedItem->title ?? 'N/A' }}</h4>
                                    <p class="text-muted">Total Rentals: <strong class="text-primary" style="font-size:1.2rem;">{{ number_format($mostRentedItem->total_rentals ?? 0) }}</strong></p>
                                    <span class="badge bg-soft-red text-primary px-3 py-2" style="border-radius:2rem;"><i class="fas fa-tag me-1"></i>{{ $mostRentedItem->category->name ?? 'N/A' }}</span>
                                @else
                                    <p class="text-muted text-center py-4"><i class="fas fa-info-circle me-2"></i>No data available</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-header"><h5 class="mb-0 text-primary" style="font-weight:700;"><i class="fas fa-crown me-2"></i>Top Owner</h5></div>
                            <div class="card-body">
                                @if($topOwner)
                                    <h4 style="font-weight:700;word-break:break-word;"><i class="fas fa-user-circle text-primary me-2"></i>{{ $topOwner->name ?? 'N/A' }}</h4>
                                    <p class="text-muted">Rentals: <strong class="text-primary" style="font-size:1.2rem;">{{ number_format($topOwner->rentals ?? 0) }}</strong></p>
                                    <span class="badge bg-soft-red text-primary px-3 py-2" style="border-radius:2rem;"><i class="fas fa-envelope me-1"></i>{{ $topOwner->email ?? 'N/A' }}</span>
                                @else
                                    <p class="text-muted text-center py-4"><i class="fas fa-info-circle me-2"></i>No data available</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-header"><h5 class="mb-0 text-primary" style="font-weight:700;"><i class="fas fa-star me-2"></i>Highest Rated Item</h5></div>
                            <div class="card-body">
                                @if($highestRatedItem)
                                    <h4 style="font-weight:700;word-break:break-word;"><i class="fas fa-gem text-primary me-2"></i>{{ $highestRatedItem->title ?? 'N/A' }}</h4>
                                    <p class="text-muted">Rating: <strong class="text-primary" style="font-size:1.2rem;">{{ number_format($highestRatedItem->avg_rating ?? 0, 1) }} <i class="fas fa-star text-warning"></i></strong></p>
                                    <span class="badge bg-soft-red text-primary px-3 py-2" style="border-radius:2rem;"><i class="fas fa-comment me-1"></i>{{ number_format($highestRatedItem->reviews_count ?? 0) }} reviews</span>
                                @else
                                    <p class="text-muted text-center py-4"><i class="fas fa-info-circle me-2"></i>No data available</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Bookings Table -->
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 text-primary" style="font-weight:700;"><i class="fas fa-table me-2"></i>Recent Bookings</h5>
                        <span class="badge bg-primary text-white rounded-pill px-3 py-2"><i class="fas fa-plus me-1"></i>{{ number_format($recentBookings->count() ?? 0) }} new</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th><i class="fas fa-box me-1"></i>Item</th>
                                        <th><i class="fas fa-user me-1"></i>Renter</th>
                                        <th><i class="fas fa-flag me-1"></i>Status</th>
                                        <th><i class="fas fa-dollar-sign me-1"></i>Amount</th>
                                        <th><i class="fas fa-calendar me-1"></i>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recentBookings ?? [] as $booking)
                                        <tr>
                                            <td><strong>{{ $booking->item->title ?? 'N/A' }}</strong></td>
                                            <td>{{ $booking->renter->name ?? 'N/A' }}</td>
                                            <td>
                                                <span class="status-badge {{ $booking->status ?? 'pending' }}">
                                                    {{ ucfirst($booking->status ?? 'N/A') }}
                                                </span>
                                            </td>
                                            <td>${{ number_format($booking->total_amount ?? 0, 2) }}</td>
                                            <td>{{ $booking->created_at->format('M d, Y') ?? 'N/A' }}</td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="5" class="text-center text-muted py-4"><i class="fas fa-inbox me-2"></i>No recent bookings</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Extra Stats: Wishlist, Categories, Active City -->
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card text-center p-4 stat-box" style="border:1px solid #f0e8e8;">
                            <div style="font-size:3rem;color:#dc3545;opacity:0.7;"><i class="fas fa-heart"></i></div>
                            <h6 class="text-muted mt-3" style="font-weight:600;letter-spacing:0.5px;"><i class="fas fa-heart me-1 text-primary"></i>Wishlist</h6>
                            <h3 class="text-primary" style="font-weight:800;font-size:2.5rem;">{{ number_format($totalWishlist ?? 0) }}</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center p-4 stat-box" style="border:1px solid #f0e8e8;">
                            <div style="font-size:3rem;color:#dc3545;opacity:0.7;"><i class="fas fa-folder"></i></div>
                            <h6 class="text-muted mt-3" style="font-weight:600;letter-spacing:0.5px;"><i class="fas fa-folder me-1 text-primary"></i>Categories</h6>
                            <h3 class="text-primary" style="font-weight:800;font-size:2.5rem;">{{ number_format($totalCategories ?? 0) }}</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center p-4 stat-box" style="border:1px solid #f0e8e8;">
                            <div style="font-size:3rem;color:#dc3545;opacity:0.7;"><i class="fas fa-map-marker-alt"></i></div>
                            <h6 class="text-muted mt-3" style="font-weight:600;letter-spacing:0.5px;"><i class="fas fa-map-marker-alt me-1 text-primary"></i>Most Active City</h6>
                            <h3 class="text-primary" style="font-weight:800;font-size:2.5rem;">{{ $mostActiveCity->city ?? 'N/A' }}</h3>
                            <small class="text-muted" style="font-weight:500;"><i class="fas fa-box me-1"></i>{{ number_format($mostActiveCity->total ?? 0) }} items</small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /content-wrapper -->

        <!-- FOOTER -->
        <footer class="content-footer footer bg-footer-theme mt-4">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-3 flex-md-row flex-column px-0">
                <div class="mb-2 mb-md-0">© <script>document.write(new Date().getFullYear());</script>, made with <i class="fas fa-heart text-danger"></i> by <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a></div>
                <div>
                    <a href="https://themeselection.com/license/" target="_blank" class="footer-link me-4"><i class="fas fa-file-contract me-1"></i>License</a>
                    <a href="https://themeselection.com/" target="_blank" class="footer-link me-4"><i class="fas fa-palette me-1"></i>More Themes</a>
                    <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/" target="_blank" class="footer-link me-4"><i class="fas fa-book me-1"></i>Documentation</a>
                </div>
            </div>
        </footer>
        <!-- /FOOTER -->

    </div>
    <!-- /dashboard-wrapper -->

    <!-- Upgrade to Pro button -->
    <div class="buy-now">
        <a href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/" target="_blank" class="btn btn-danger btn-buy-now"><i class="fas fa-rocket me-2"></i>Upgrade to Pro</a>
    </div>

    <!-- Core JS -->
    <script src="{{ asset('Admin/assets/') }}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('Admin/assets/') }}/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('Admin/assets/') }}/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('Admin/assets/') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('Admin/assets/') }}/vendor/js/menu.js"></script>
    <script src="{{ asset('Admin/assets/') }}/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="{{ asset('Admin/assets/') }}/js/main.js"></script>
    <script src="{{ asset('Admin/assets/') }}/js/dashboards-analytics.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- ===== CHARTS INIT ===== -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // ---- Booking Status Chart (Pie) ----
            var bookingOptions = {
                series: [
                    {{ $pendingBookings ?? 0 }},
                    {{ $approvedBookings ?? 0 }},
                    {{ $handedOverBookings ?? 0 }},
                    {{ $returnedBookings ?? 0 }},
                    {{ $completedBookings ?? 0 }},
                    {{ $rejectedBookings ?? 0 }}
                ],
                chart: {
                    type: 'pie',
                    height: 290,
                    animations: {
                        enabled: true,
                        easing: 'easeinout',
                        speed: 1000
                    }
                },
                labels: ['Pending', 'Approved', 'Handed Over', 'Returned', 'Completed', 'Rejected'],
                colors: ['#ffc107', '#28a745', '#007bff', '#17a2b8', '#20c997', '#dc3545'],
                legend: {
                    position: 'bottom',
                    horizontalAlign: 'center',
                    fontSize: '12px',
                    fontWeight: 600,
                    offsetY: 5
                },
                dataLabels: {
                    enabled: true,
                    formatter: function(val) {
                        return val.toFixed(1) + '%';
                    },
                    style: {
                        fontSize: '11px',
                        fontWeight: 700
                    }
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + ' bookings';
                        }
                    }
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            height: 240
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };
            var bookingChart = new ApexCharts(document.querySelector('#bookingStatusChart'), bookingOptions);
            bookingChart.render();

            // ---- Revenue Chart (Bar/Column) ----
            var revenueOptions = {
                series: [{
                    name: 'Revenue',
                    data: [
                        {{ $todayRevenue ?? 0 }},
                        {{ $monthRevenue ?? 0 }},
                        {{ $totalRevenue ?? 0 }}
                    ]
                }],
                chart: {
                    type: 'bar',
                    height: 290,
                    animations: {
                        enabled: true,
                        easing: 'easeinout',
                        speed: 1000
                    },
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        borderRadius: 10,
                        horizontal: false,
                        columnWidth: '50%',
                        distributed: false,
                        endingShape: 'rounded'
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: function(val) {
                        return '$' + val.toFixed(2);
                    },
                    offsetY: -12,
                    style: {
                        fontSize: '12px',
                        fontWeight: 700,
                        colors: ['#333']
                    }
                },
                colors: ['#dc3545', '#f0757a', '#b02a37'],
                xaxis: {
                    categories: ['Today', 'This Month', 'Total'],
                    labels: {
                        style: {
                            fontWeight: 600,
                            fontSize: '12px'
                        }
                    }
                },
                yaxis: {
                    labels: {
                        formatter: function(val) {
                            return '$' + val.toFixed(0);
                        },
                        style: {
                            fontWeight: 500
                        }
                    }
                },
                grid: {
                    borderColor: '#f0e8e8',
                    strokeDashArray: 5
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return '$' + val.toFixed(2);
                        }
                    }
                }
            };
            var revenueChart = new ApexCharts(document.querySelector('#revenueChart'), revenueOptions);
            revenueChart.render();

            // ---- Animate progress bars on load ----
            document.querySelectorAll('.progress-fill').forEach(function(el) {
                var width = el.style.width;
                el.style.width = '0%';
                setTimeout(function() {
                    el.style.width = width;
                }, 500);
            });
        });
    </script>
</body>
</html>
@endsection