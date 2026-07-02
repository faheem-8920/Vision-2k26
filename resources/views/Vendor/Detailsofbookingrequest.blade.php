@extends('Vendor.layout')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details · Red & White</title>
    <!-- Bootstrap 5 + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Font (Inter) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f8f9fc;
            font-family: 'Inter', sans-serif;
            padding: 2rem 1rem;
        }

        /* main card – red & white theme */
        .booking-card {
            background: #ffffff;
            border-radius: 28px;
            box-shadow: 0 20px 40px -12px rgba(200, 0, 0, 0.15), 0 8px 24px -6px rgba(0, 0, 0, 0.02);
            border: 1px solid rgba(220, 53, 69, 0.08);
            transition: box-shadow 0.3s ease, transform 0.25s ease;
            overflow: hidden;
        }

        .booking-card:hover {
            box-shadow: 0 30px 50px -16px rgba(200, 0, 0, 0.20);
            transform: translateY(-4px);
        }

        /* header – red gradient */
        .card-header-custom {
            background: linear-gradient(145deg, #dc3545, #b02a37);
            padding: 1.2rem 1.8rem;
            border-bottom: none;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background 0.2s;
        }

        .card-header-custom h3 {
            font-weight: 600;
            letter-spacing: -0.3px;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .card-header-custom h3 i {
            font-size: 1.6rem;
            opacity: 0.9;
        }

        .btn-back {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(4px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            border-radius: 50px;
            padding: 0.4rem 1.2rem;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.25s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            text-decoration: none;
        }

        .btn-back:hover {
            background: white;
            color: #b02a37;
            border-color: white;
            transform: scale(1.02);
            box-shadow: 0 8px 16px -8px rgba(0,0,0,0.2);
        }

        .btn-back i {
            font-size: 1.1rem;
        }

        /* image hover */
        .item-image {
            border-radius: 20px;
            box-shadow: 0 12px 24px -10px rgba(0, 0, 0, 0.08);
            transition: transform 0.4s ease, box-shadow 0.3s ease;
            width: 100%;
            height: auto;
            object-fit: cover;
            background: #f0f2f5;
        }

        .item-image:hover {
            transform: scale(1.02) rotate(0.5deg);
            box-shadow: 0 20px 32px -12px rgba(180, 0, 0, 0.15);
        }

        /* labels & values */
        .detail-label {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
            color: #6c757d;
            display: block;
            margin-bottom: 0.15rem;
        }

        .detail-value {
            font-weight: 600;
            color: #1e1e2a;
            font-size: 1.05rem;
            margin-bottom: 0.25rem;
        }

        .detail-value.price {
            color: #b02a37;
        }

        /* info cards (customer) */
        .info-card {
            border: 1px solid rgba(220, 53, 69, 0.15);
            border-radius: 18px;
            background: #ffffff;
            transition: all 0.2s ease-in-out;
            height: 100%;
            padding: 0.75rem 0.5rem;
            box-shadow: 0 2px 6px rgba(220, 53, 69, 0.02);
        }

        .info-card:hover {
            border-color: #dc3545;
            background: #fff8f8;
            transform: translateY(-4px);
            box-shadow: 0 12px 24px -12px rgba(220, 53, 69, 0.12);
        }

        .info-card .card-body {
            padding: 0.75rem 0.5rem;
        }

        .info-card strong {
            color: #1e1e2a;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .info-card p, .info-card h6 {
            margin-bottom: 0;
            font-weight: 500;
        }

        /* badge status with animation */
        .badge-status {
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.8rem;
            letter-spacing: 0.3px;
            transition: all 0.2s;
            display: inline-block;
        }

        .badge-status.bg-warning {
            background: #ffc107;
            color: #2d1b00;
        }
        .badge-status.bg-success {
            background: #198754;
            color: white;
        }
        .badge-status.bg-primary {
            background: #0d6efd;
            color: white;
        }
        .badge-status.bg-info {
            background: #0dcaf0;
            color: #04222a;
        }
        .badge-status.bg-danger {
            background: #dc3545;
            color: white;
        }

        .badge-status:hover {
            transform: scale(1.02);
            filter: brightness(1.05);
        }

        /* rental cards */
        .rental-card {
            border: 1px solid rgba(0,0,0,0.03);
            border-radius: 20px;
            background: #ffffff;
            transition: all 0.2s ease;
            box-shadow: 0 4px 10px -4px rgba(0, 0, 0, 0.02);
            height: 100%;
            padding: 0.5rem 0.2rem;
        }

        .rental-card:hover {
            border-color: #dc3545;
            background: #fffafa;
            transform: translateY(-3px) scale(1.01);
            box-shadow: 0 12px 24px -12px rgba(220, 53, 69, 0.08);
        }

        .rental-card .card-body {
            padding: 0.8rem 0.2rem;
        }

        .rental-card strong {
            color: #4a4a5a;
            font-weight: 500;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .rental-card h6 {
            font-weight: 700;
            margin-top: 0.3rem;
            color: #1e1e2a;
        }

        .rental-card h6.text-danger {
            color: #b02a37 !important;
        }

        /* dividers */
        .hr-custom {
            border: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(220, 53, 69, 0.15), transparent);
            margin: 1.5rem 0;
        }

        .section-title {
            font-weight: 700;
            letter-spacing: -0.2px;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            color: #b02a37;
        }

        .section-title i {
            font-size: 1.5rem;
            opacity: 0.8;
        }

        /* responsive */
        @media (max-width: 768px) {
            .card-header-custom {
                flex-wrap: wrap;
                gap: 0.8rem;
            }
            .btn-back {
                margin-left: auto;
            }
        }

        /* fade-in animation */
        .fade-in-up {
            animation: fadeUp 0.5s ease forwards;
            opacity: 0;
        }

        @keyframes fadeUp {
            0% { opacity: 0; transform: translateY(18px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .delay-1 { animation-delay: 0.05s; }
        .delay-2 { animation-delay: 0.1s; }
        .delay-3 { animation-delay: 0.15s; }
        .delay-4 { animation-delay: 0.2s; }
    </style>
</head>
<body>

<div class="container py-3 fade-in-up">
    <div class="booking-card">

        <!-- HEADER with dynamic booking ID / title -->
        <div class="card-header-custom">
            <h3>
                <i class="bi bi-calendar-check"></i> Booking #{{ $booking->id ?? 'N/A' }}
            </h3>
            <a href="/owner/bookings" class="btn-back">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>

        <!-- CARD BODY -->
        <div class="card-body p-4 p-xl-5">

            <!-- ROW: image + item details -->
            <div class="row g-4 align-items-start">
                <!-- Image column -->
                <div class="col-md-4">
                    <div class="position-relative">
                        @if($booking->item->images->count())
                            <img src="{{ asset('uploads/items/'.$booking->item->images->first()->image) }}"
                                 alt="{{ $booking->item->title }}"
                                 class="item-image img-fluid rounded-4 shadow-sm">
                        @else
                            <div class="item-image img-fluid rounded-4 d-flex align-items-center justify-content-center" style="min-height:200px; background:#f0f2f5; color:#b0b8c5;">
                                <i class="bi bi-image fs-1"></i>
                            </div>
                        @endif
                    </div>
                    <div class="mt-2 text-muted small d-flex gap-2">
                        <i class="bi bi-image"></i>
                        <span>{{ $booking->item->images->count() }} image(s) · hover to zoom</span>
                    </div>
                </div>

                <!-- Item details -->
                <div class="col-md-8">
                    <h2 class="fw-bold" style="color:#1e1e2a;">{{ $booking->item->title }}</h2>
                    <p class="text-secondary" style="font-size: 0.95rem;">
                        {{ $booking->item->description }}
                    </p>
                    <hr class="hr-custom">

                    <div class="row g-3">
                        <div class="col-md-6">
                            <span class="detail-label"><i class="bi bi-tag me-1"></i> Category</span>
                            <p class="detail-value">{{ $booking->item->category->name ?? 'Uncategorized' }}</p>
                        </div>
                        <div class="col-md-6">
                            <span class="detail-label"><i class="bi bi-geo-alt me-1"></i> Location</span>
                            <p class="detail-value">{{ $booking->item->city }}</p>
                        </div>
                        <div class="col-md-6">
                            <span class="detail-label"><i class="bi bi-currency-rupee me-1"></i> Rent / Day</span>
                            <p class="detail-value price">Rs {{ number_format($booking->item->rent_price_per_day) }}</p>
                        </div>
                        <div class="col-md-6">
                            <span class="detail-label"><i class="bi bi-shield-check me-1"></i> Security Deposit</span>
                            <p class="detail-value price">Rs {{ number_format($booking->security_deposit) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="hr-custom">

            <!-- CUSTOMER INFORMATION -->
            <h4 class="section-title mb-4">
                <i class="bi bi-person-circle"></i> Customer Information
            </h4>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="info-card p-3">
                        <div class="card-body text-center">
                            <i class="bi bi-person-fill text-danger mb-2" style="font-size:1.6rem;"></i>
                            <strong class="d-block">Name</strong>
                            <p class="detail-value" style="font-weight:600;">{{ $booking->renter->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-card p-3">
                        <div class="card-body text-center">
                            <i class="bi bi-envelope-fill text-danger mb-2" style="font-size:1.6rem;"></i>
                            <strong class="d-block">Email</strong>
                            <p class="detail-value" style="font-weight:600;">{{ $booking->renter->email }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-card p-3">
                        <div class="card-body text-center">
                            <i class="bi bi-info-circle-fill text-danger mb-2" style="font-size:1.6rem;"></i>
                            <strong class="d-block">Status</strong>
                            <p>
                                @php
                                    $statusMap = [
                                        'pending' => ['class' => 'bg-warning', 'icon' => 'bi-clock-history', 'label' => 'Pending'],
                                        'approved' => ['class' => 'bg-success', 'icon' => 'bi-check-circle', 'label' => 'Approved'],
                                        'handed_over' => ['class' => 'bg-primary', 'icon' => 'bi-hand-index-thumb', 'label' => 'Handed Over'],
                                        'returned' => ['class' => 'bg-info', 'icon' => 'bi-arrow-return-left', 'label' => 'Returned'],
                                        'rejected' => ['class' => 'bg-danger', 'icon' => 'bi-x-circle', 'label' => 'Rejected'],
                                    ];
                                    $status = $statusMap[$booking->status] ?? ['class' => 'bg-secondary', 'icon' => 'bi-question-circle', 'label' => ucfirst($booking->status)];
                                @endphp
                                <span class="badge-status {{ $status['class'] }}">
                                    <i class="{{ $status['icon'] }} me-1"></i> {{ $status['label'] }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="hr-custom">

            <!-- RENTAL INFORMATION -->
            <h4 class="section-title mb-4">
                <i class="bi bi-clock-history"></i> Rental Information
            </h4>
            <div class="row g-4">
                <div class="col-md-3 col-6">
                    <div class="rental-card p-2">
                        <div class="card-body text-center">
                            <strong><i class="bi bi-calendar-event me-1"></i> Start</strong>
                            <h6 class="mt-1">{{ $booking->start_date }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="rental-card p-2">
                        <div class="card-body text-center">
                            <strong><i class="bi bi-calendar-x me-1"></i> End</strong>
                            <h6 class="mt-1">{{ $booking->end_date }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="rental-card p-2">
                        <div class="card-body text-center">
                            <strong><i class="bi bi-cash-stack me-1"></i> Total</strong>
                            <h6 class="mt-1 text-danger fw-bold">Rs {{ number_format($booking->total_amount) }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="rental-card p-2">
                        <div class="card-body text-center">
                            <strong><i class="bi bi-hash me-1"></i> Booking ID</strong>
                            <h6 class="mt-1">#{{ $booking->id }}</h6>
                        </div>
                    </div>
                </div>
            </div>

            <!-- footer note (dynamic timestamp optional) -->
            <div class="mt-4 pt-2 border-top border-light d-flex justify-content-between align-items-center">
                <span class="text-muted small"><i class="bi bi-clock me-1"></i> Booking placed: {{ $booking->created_at->diffForHumans() ?? 'recently' }}</span>
                <span class="text-muted small"><i class="bi bi-shield-lock"></i> secure</span>
            </div>

        </div> <!-- /card-body -->
    </div> <!-- /booking-card -->
</div> <!-- /container -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection