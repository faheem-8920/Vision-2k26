@extends('admin.layout')

@section('content')
{{-- Add Font Awesome CDN --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="review-card">
    {{-- ====== HERO HEADER ====== --}}
    <div class="hero-header animate-slide-down">
        <div class="hero-content">
            <div class="hero-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="hero-text">
                <h1 class="hero-title">Review Details</h1>
                <p class="hero-subtitle">{{ $review->created_at ? $review->created_at->diffForHumans() : 'N/A' }}</p>
            </div>
            <div class="hero-badge">
                <span class="review-id">#{{ $review->id }}</span>
            </div>
        </div>
        <div class="hero-particles">
            <span></span><span></span><span></span><span></span><span></span>
        </div>
    </div>

    {{-- ====== STATS ROW ====== --}}
    <div class="stats-row animate-fade-in">
        <div class="stat-item rating-glow">
            <div class="stat-icon"><i class="fas fa-star"></i></div>
            <div class="stat-info">
                <span class="stat-label">Average Rating</span>
                <span class="stat-value">{{ number_format($averageRating, 1) }} <span class="stat-sub">/ 5</span></span>
            </div>
        </div>
        <div class="stat-item">
            <div class="stat-icon"><i class="fas fa-comment"></i></div>
            <div class="stat-info">
                <span class="stat-label">Total Reviews</span>
                <span class="stat-value">{{ $totalReviews }}</span>
            </div>
        </div>
        <div class="stat-item">
            <div class="stat-icon"><i class="fas fa-calendar-check"></i></div>
            <div class="stat-info">
                <span class="stat-label">Total Bookings</span>
                <span class="stat-value">{{ $totalBookings }}</span>
            </div>
        </div>
        <div class="stat-item">
            <div class="stat-icon"><i class="fas fa-clock"></i></div>
            <div class="stat-info">
                <span class="stat-label">Duration</span>
                <span class="stat-value">{{ \Carbon\Carbon::parse($review->booking->start_date)->diffInDays($review->booking->end_date) }} <span class="stat-sub">days</span></span>
            </div>
        </div>
    </div>

    {{-- ====== REVIEW CONTENT ====== --}}
    <div class="review-content animate-slide-up">
        <div class="review-rating">
            <div class="stars">
                @for($i = 1; $i <= 5; $i++)
                    <i class="fas fa-star {{ $i <= $review->rating ? 'active' : '' }}"></i>
                @endfor
            </div>
            <span class="rating-number">{{ $review->rating }}.0</span>
            <span class="rating-label">out of 5</span>
        </div>
        <div class="review-text">
            <i class="fas fa-quote-left quote-icon"></i>
            <p>{{ $review->review ?? 'No review text provided' }}</p>
            <i class="fas fa-quote-right quote-icon"></i>
        </div>
        <div class="review-meta">
            <span><i class="far fa-calendar-alt"></i> Created: {{ $review->created_at }}</span>
            <span><i class="far fa-calendar-check"></i> Updated: {{ $review->updated_at }}</span>
        </div>
    </div>

    {{-- ====== USER PROFILE ====== --}}
    <div class="profile-section animate-slide-up" style="animation-delay: 0.1s;">
        <div class="section-header">
            <div class="section-icon"><i class="fas fa-user-circle"></i></div>
            <h3>Reviewer Profile</h3>
            <span class="status-badge active"><i class="fas fa-circle"></i> Active</span>
        </div>
        <div class="profile-grid">
            <div class="profile-avatar">
                <div class="avatar-circle">
                    <i class="fas fa-user fa-3x"></i>
                </div>
                <h4>{{ $review->user->name ?? 'N/A' }}</h4>
                <span class="user-role">Reviewer</span>
            </div>
            <div class="profile-details">
                <div class="detail-item">
                    <div class="detail-icon-circle"><i class="fas fa-envelope"></i></div>
                    <div>
                        <span class="detail-label">Email</span>
                        <span class="detail-value">{{ $review->user->email ?? 'N/A' }}</span>
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-icon-circle"><i class="fas fa-phone-alt"></i></div>
                    <div>
                        <span class="detail-label">Phone</span>
                        <span class="detail-value">{{ $review->user->phone ?? 'N/A' }}</span>
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-icon-circle"><i class="fas fa-id-card"></i></div>
                    <div>
                        <span class="detail-label">CNIC</span>
                        <span class="detail-value">{{ $review->user->cnic ?? 'N/A' }}</span>
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-icon-circle"><i class="fas fa-calendar-alt"></i></div>
                    <div>
                        <span class="detail-label">Joined</span>
                        <span class="detail-value">{{ $review->user->created_at ?? 'N/A' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ====== ITEM SECTION ====== --}}
    <div class="item-section animate-slide-up" style="animation-delay: 0.2s;">
        <div class="section-header">
            <div class="section-icon"><i class="fas fa-box"></i></div>
            <h3>Item Details</h3>
            <span class="status-badge {{ $review->item->status ?? 'N/A' }}">{{ $review->item->status ?? 'N/A' }}</span>
        </div>
        <div class="item-grid">
            {{-- Item Images Carousel --}}
            <div class="item-image-card">
                <div class="image-carousel">
                    <div class="image-wrapper">
                        @php
                            $images = $review->item->images ?? collect();
                            $firstImage = $images->first();
                        @endphp
                        @if($firstImage)
                            <img src="{{ asset('uploads/items/' . $firstImage->image) }}" 
                                 alt="{{ $review->item->title }}" class="item-img" id="mainImage">
                        @else
                            <div class="no-image">
                                <i class="fas fa-image fa-4x"></i>
                                <span>No Image</span>
                            </div>
                        @endif
                    </div>
                    @if($images->count() > 1)
                        <div class="thumbnail-strip">
                            @foreach($images as $image)
                                <div class="thumbnail-item" onclick="changeImage('{{ asset('uploads/items/' . $image->image) }}')">
                                    <img src="{{ asset('uploads/items/' . $image->image) }}" alt="Thumbnail">
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="image-overlay">
                    <span class="item-title">{{ $review->item->title ?? 'N/A' }}</span>
                    <span class="item-category">{{ $review->item->category->name ?? 'N/A' }}</span>
                </div>
            </div>

            {{-- Item Details --}}
            <div class="item-details-grid">
                <div class="detail-item">
                    <div class="detail-icon-circle"><i class="fas fa-hashtag"></i></div>
                    <div>
                        <span class="detail-label">ID</span>
                        <span class="detail-value highlight">#{{ $review->item->id ?? 'N/A' }}</span>
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-icon-circle"><i class="fas fa-align-left"></i></div>
                    <div>
                        <span class="detail-label">Description</span>
                        <span class="detail-value">{{ $review->item->description ?? 'N/A' }}</span>
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-icon-circle"><i class="fas fa-dollar-sign"></i></div>
                    <div>
                        <span class="detail-label">Price / Day</span>
                        <span class="detail-value highlight">${{ $review->item->rent_price_per_day ?? 'N/A' }}</span>
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-icon-circle"><i class="fas fa-shield-alt"></i></div>
                    <div>
                        <span class="detail-label">Security Deposit</span>
                        <span class="detail-value">${{ $review->item->security_deposit ?? 'N/A' }}</span>
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-icon-circle"><i class="fas fa-tools"></i></div>
                    <div>
                        <span class="detail-label">Replacement Cost</span>
                        <span class="detail-value">${{ $review->item->replacement_cost ?? 'N/A' }}</span>
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-icon-circle"><i class="fas fa-cubes"></i></div>
                    <div>
                        <span class="detail-label">Quantity</span>
                        <span class="detail-value">{{ $review->item->quantity ?? 'N/A' }}</span>
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-icon-circle"><i class="fas fa-map-marker-alt"></i></div>
                    <div>
                        <span class="detail-label">Location</span>
                        <span class="detail-value">{{ $review->item->city ?? 'N/A' }}, {{ $review->item->address ?? 'N/A' }}</span>
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-icon-circle"><i class="fas fa-calendar-plus"></i></div>
                    <div>
                        <span class="detail-label">Listed</span>
                        <span class="detail-value">{{ $review->item->created_at ?? 'N/A' }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Owner Info --}}
        <div class="owner-section">
            <div class="owner-header">
                <i class="fas fa-user-tie"></i>
                <span>Item Owner</span>
            </div>
            <div class="owner-grid">
                <div class="detail-item">
                    <div class="detail-icon-circle"><i class="fas fa-user"></i></div>
                    <div>
                        <span class="detail-label">Name</span>
                        <span class="detail-value">{{ $review->item->owner->name ?? 'N/A' }}</span>
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-icon-circle"><i class="fas fa-envelope"></i></div>
                    <div>
                        <span class="detail-label">Email</span>
                        <span class="detail-value">{{ $review->item->owner->email ?? 'N/A' }}</span>
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-icon-circle"><i class="fas fa-phone-alt"></i></div>
                    <div>
                        <span class="detail-label">Phone</span>
                        <span class="detail-value">{{ $review->item->owner->phone ?? 'N/A' }}</span>
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-icon-circle"><i class="fas fa-id-card"></i></div>
                    <div>
                        <span class="detail-label">CNIC</span>
                        <span class="detail-value">{{ $review->item->owner->cnic ?? 'N/A' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ====== BOOKING SECTION ====== --}}
    <div class="booking-section animate-slide-up" style="animation-delay: 0.3s;">
        <div class="section-header">
            <div class="section-icon"><i class="fas fa-calendar-check"></i></div>
            <h3>Booking Information</h3>
            <span class="status-badge {{ $review->booking->status ?? 'N/A' }}">{{ $review->booking->status ?? 'N/A' }}</span>
        </div>
        <div class="booking-grid">
            <div class="detail-item">
                <div class="detail-icon-circle"><i class="fas fa-hashtag"></i></div>
                <div>
                    <span class="detail-label">Booking ID</span>
                    <span class="detail-value highlight">#{{ $review->booking->id ?? 'N/A' }}</span>
                </div>
            </div>
            <div class="detail-item">
                <div class="detail-icon-circle"><i class="fas fa-calendar-day"></i></div>
                <div>
                    <span class="detail-label">Start Date</span>
                    <span class="detail-value">{{ $review->booking->start_date ?? 'N/A' }}</span>
                </div>
            </div>
            <div class="detail-item">
                <div class="detail-icon-circle"><i class="fas fa-calendar-day"></i></div>
                <div>
                    <span class="detail-label">End Date</span>
                    <span class="detail-value">{{ $review->booking->end_date ?? 'N/A' }}</span>
                </div>
            </div>
            <div class="detail-item">
                <div class="detail-icon-circle"><i class="fas fa-dollar-sign"></i></div>
                <div>
                    <span class="detail-label">Total Amount</span>
                    <span class="detail-value highlight">${{ $review->booking->total_amount ?? 'N/A' }}</span>
                </div>
            </div>
            <div class="detail-item">
                <div class="detail-icon-circle"><i class="fas fa-shield-alt"></i></div>
                <div>
                    <span class="detail-label">Security Deposit</span>
                    <span class="detail-value">${{ $review->booking->security_deposit ?? 'N/A' }}</span>
                </div>
            </div>
            <div class="detail-item">
                <div class="detail-icon-circle"><i class="fas fa-clock"></i></div>
                <div>
                    <span class="detail-label">Booked At</span>
                    <span class="detail-value">{{ $review->booking->created_at ?? 'N/A' }}</span>
                </div>
            </div>
        </div>

        {{-- Renter & Owner --}}
        <div class="booking-parties">
            <div class="party-card">
                <div class="party-header">
                    <i class="fas fa-user"></i>
                    <span>Renter</span>
                </div>
                <div class="party-details">
                    <div class="detail-item">
                        <div class="detail-icon-circle"><i class="fas fa-user"></i></div>
                        <div>
                            <span class="detail-label">Name</span>
                            <span class="detail-value">{{ $review->booking->renter->name ?? 'N/A' }}</span>
                        </div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-icon-circle"><i class="fas fa-envelope"></i></div>
                        <div>
                            <span class="detail-label">Email</span>
                            <span class="detail-value">{{ $review->booking->renter->email ?? 'N/A' }}</span>
                        </div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-icon-circle"><i class="fas fa-phone-alt"></i></div>
                        <div>
                            <span class="detail-label">Phone</span>
                            <span class="detail-value">{{ $review->booking->renter->phone ?? 'N/A' }}</span>
                        </div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-icon-circle"><i class="fas fa-id-card"></i></div>
                        <div>
                            <span class="detail-label">CNIC</span>
                            <span class="detail-value">{{ $review->booking->renter->cnic ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="party-card">
                <div class="party-header">
                    <i class="fas fa-user-tie"></i>
                    <span>Owner</span>
                </div>
                <div class="party-details">
                    <div class="detail-item">
                        <div class="detail-icon-circle"><i class="fas fa-user"></i></div>
                        <div>
                            <span class="detail-label">Name</span>
                            <span class="detail-value">{{ $review->booking->owner->name ?? 'N/A' }}</span>
                        </div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-icon-circle"><i class="fas fa-envelope"></i></div>
                        <div>
                            <span class="detail-label">Email</span>
                            <span class="detail-value">{{ $review->booking->owner->email ?? 'N/A' }}</span>
                        </div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-icon-circle"><i class="fas fa-phone-alt"></i></div>
                        <div>
                            <span class="detail-label">Phone</span>
                            <span class="detail-value">{{ $review->booking->owner->phone ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ====== FOOTER ====== --}}
    <div class="footer-note animate-fade-in" style="animation-delay: 0.5s;">
        <i class="fas fa-arrow-right"></i> Premium Review Details · Red & White Theme
        <span class="footer-badge"><i class="fas fa-check-circle"></i> Verified</span>
    </div>
</div>

<script>
    function changeImage(src) {
        document.getElementById('mainImage').src = src;
    }
</script>
@endsection

{{-- ====== STYLES ====== --}}
<style>
    /* ===== RESET & BASE ===== */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    .review-card {
        max-width: 1300px;
        width: 100%;
        background: #ffffff;
        border-radius: 3rem;
        padding: 2.8rem 3.2rem;
        box-shadow: 0 30px 60px -15px rgba(180, 20, 20, 0.2),
                    0 10px 30px -8px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(220, 40, 40, 0.1);
        transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        animation: fadeSlideUp 0.8s ease forwards;
        margin: 2rem auto;
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #ffffff 0%, #fffafa 100%);
    }

    .review-card::before {
        content: '';
        position: absolute;
        top: -60%;
        right: -30%;
        width: 60%;
        height: 80%;
        background: radial-gradient(circle, rgba(185, 28, 28, 0.03) 0%, transparent 70%);
        animation: floatBg 20s ease-in-out infinite;
        pointer-events: none;
        z-index: 0;
    }

    .review-card::after {
        content: '';
        position: absolute;
        bottom: -40%;
        left: -20%;
        width: 50%;
        height: 60%;
        background: radial-gradient(circle, rgba(185, 28, 28, 0.02) 0%, transparent 70%);
        animation: floatBg 25s ease-in-out infinite reverse;
        pointer-events: none;
        z-index: 0;
    }

    @keyframes floatBg {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(20px, -30px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
    }

    .review-card:hover {
        box-shadow: 0 50px 100px -20px rgba(200, 30, 30, 0.35);
        border-color: rgba(200, 30, 30, 0.2);
        transform: translateY(-8px) scale(1.002);
    }

    @keyframes fadeSlideUp {
        0% { opacity: 0; transform: translateY(50px) scale(0.97); }
        100% { opacity: 1; transform: translateY(0) scale(1); }
    }

    /* ===== ANIMATIONS ===== */
    .animate-slide-down {
        animation: slideDown 0.6s ease forwards;
    }

    .animate-fade-in {
        animation: fadeIn 0.8s ease forwards;
    }

    .animate-slide-up {
        opacity: 0;
        animation: slideUp 0.7s ease forwards;
    }

    @keyframes slideDown {
        0% { opacity: 0; transform: translateY(-30px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    @keyframes slideUp {
        0% { opacity: 0; transform: translateY(40px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeIn {
        0% { opacity: 0; }
        100% { opacity: 1; }
    }

    @keyframes pulseGlow {
        0%, 100% { box-shadow: 0 4px 20px rgba(185, 28, 28, 0.3); }
        50% { box-shadow: 0 4px 40px rgba(185, 28, 28, 0.6); }
    }

    /* ===== HERO HEADER ===== */
    .hero-header {
        position: relative;
        z-index: 1;
        margin-bottom: 2.5rem;
        padding: 1.5rem 2rem;
        background: linear-gradient(135deg, #b91c1c 0%, #dc2626 100%);
        border-radius: 1.8rem;
        box-shadow: 0 12px 30px rgba(185, 28, 28, 0.3);
        transition: all 0.4s ease;
        overflow: hidden;
    }

    .hero-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 60%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255,255,255,0.05), transparent);
        transform: rotate(30deg);
        animation: shimmerMove 6s infinite;
    }

    @keyframes shimmerMove {
        0% { transform: translateX(-100%) rotate(30deg); }
        100% { transform: translateX(100%) rotate(30deg); }
    }

    .hero-header:hover {
        box-shadow: 0 20px 50px rgba(185, 28, 28, 0.4);
        transform: scale(1.01);
    }

    .hero-content {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        position: relative;
        z-index: 1;
    }

    .hero-icon {
        width: 60px;
        height: 60px;
        background: rgba(255,255,255,0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        color: #fff;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.2);
        animation: pulseGlow 2s infinite;
    }

    .hero-text {
        flex: 1;
    }

    .hero-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: #fff;
        margin: 0;
        letter-spacing: -0.5px;
    }

    .hero-subtitle {
        font-size: 0.9rem;
        color: rgba(255,255,255,0.8);
        margin: 0;
    }

    .hero-badge {
        background: rgba(255,255,255,0.2);
        padding: 0.5rem 1.2rem;
        border-radius: 40px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.15);
    }

    .review-id {
        color: #fff;
        font-weight: 600;
        font-size: 1rem;
    }

    .hero-particles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 0;
    }

    .hero-particles span {
        position: absolute;
        width: 6px;
        height: 6px;
        background: rgba(255,255,255,0.15);
        border-radius: 50%;
        animation: particleFloat 8s infinite;
    }

    .hero-particles span:nth-child(1) { top: 20%; left: 10%; animation-delay: 0s; }
    .hero-particles span:nth-child(2) { top: 60%; left: 85%; animation-delay: 1s; }
    .hero-particles span:nth-child(3) { top: 80%; left: 20%; animation-delay: 2s; }
    .hero-particles span:nth-child(4) { top: 30%; left: 75%; animation-delay: 3s; }
    .hero-particles span:nth-child(5) { top: 10%; left: 50%; animation-delay: 4s; }

    @keyframes particleFloat {
        0%, 100% { transform: translateY(0) scale(1); opacity: 0.3; }
        50% { transform: translateY(-30px) scale(1.5); opacity: 0.8; }
    }

    /* ===== STATS ROW ===== */
    .stats-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.2rem;
        margin-bottom: 2.5rem;
        position: relative;
        z-index: 1;
    }

    .stat-item {
        background: #fefbfb;
        padding: 1.2rem 1.5rem;
        border-radius: 1.5rem;
        border: 1px solid #f7e6e6;
        display: flex;
        align-items: center;
        gap: 1rem;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        cursor: default;
        position: relative;
        overflow: hidden;
    }

    .stat-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(90deg, #b91c1c, #f87171);
        transform: scaleX(0);
        transition: transform 0.4s ease;
        transform-origin: left;
    }

    .stat-item:hover::before {
        transform: scaleX(1);
    }

    .stat-item:hover {
        transform: translateY(-4px) scale(1.02);
        box-shadow: 0 12px 30px rgba(180, 20, 20, 0.08);
        border-color: #f0d0d0;
        background: #fff7f7;
    }

    .rating-glow {
        background: linear-gradient(135deg, #fefbfb, #fff5f5);
        border-color: #fccccc;
    }

    .stat-icon {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: #b91c1c;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 1.1rem;
        flex-shrink: 0;
        transition: all 0.4s ease;
    }

    .stat-icon i {
        color: #ffffff !important;
    }

    .stat-item:hover .stat-icon {
        transform: rotate(360deg) scale(1.1);
    }

    .stat-info {
        flex: 1;
    }

    .stat-label {
        display: block;
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: #a94442;
        font-weight: 600;
    }

    .stat-value {
        font-size: 1.4rem;
        font-weight: 700;
        color: #1f1a1a;
    }

    .stat-sub {
        font-size: 0.8rem;
        font-weight: 400;
        color: #7a5a5a;
    }

    /* ===== REVIEW CONTENT ===== */
    .review-content {
        background: #fefcfc;
        border-radius: 2rem;
        padding: 2rem;
        margin-bottom: 2.5rem;
        border: 1px solid #f7e6e6;
        position: relative;
        z-index: 1;
        transition: all 0.4s ease;
    }

    .review-content:hover {
        background: #fffafa;
        border-color: #f0d0d0;
        box-shadow: 0 8px 30px rgba(180, 20, 20, 0.05);
    }

    .review-rating {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.2rem;
    }

    .stars {
        display: flex;
        gap: 0.3rem;
    }

    .stars i {
        font-size: 1.4rem;
        color: #e0d0d0;
        transition: all 0.3s ease;
    }

    .stars i.active {
        color: #fbbf24;
        text-shadow: 0 0 20px rgba(251, 191, 36, 0.3);
    }

    .stars i:hover {
        transform: scale(1.2) rotate(-5deg);
    }

    .rating-number {
        font-size: 1.5rem;
        font-weight: 700;
        color: #b91c1c;
    }

    .rating-label {
        font-size: 0.8rem;
        color: #7a5a5a;
    }

    .review-text {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        padding: 1rem 0;
        position: relative;
    }

    .quote-icon {
        font-size: 1.5rem;
        color: #b91c1c;
        opacity: 0.3;
        flex-shrink: 0;
        margin-top: 0.2rem;
    }

    .review-text p {
        font-size: 1.05rem;
        line-height: 1.8;
        color: #1f1a1a;
        margin: 0;
        flex: 1;
        font-style: italic;
    }

    .review-meta {
        display: flex;
        gap: 2rem;
        padding-top: 1rem;
        border-top: 1px solid #f5e0e0;
        font-size: 0.8rem;
        color: #7a5a5a;
    }

    .review-meta i {
        color: #b91c1c;
        margin-right: 0.3rem;
    }

    /* ===== SECTIONS ===== */
    .section-header {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        margin-bottom: 1.5rem;
        padding-bottom: 0.8rem;
        border-bottom: 2px solid rgba(200, 30, 30, 0.15);
        position: relative;
    }

    .section-header::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 60px;
        height: 2px;
        background: #b91c1c;
        animation: expandLine 1.5s ease forwards;
    }

    @keyframes expandLine {
        0% { width: 0; }
        100% { width: 60px; }
    }

    .section-icon {
        width: 36px;
        height: 36px;
        background: #b91c1c;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 0.9rem;
        flex-shrink: 0;
        transition: all 0.4s ease;
    }

    .section-icon i {
        color: #ffffff !important;
    }

    .section-header:hover .section-icon {
        transform: rotate(180deg) scale(1.1);
    }

    .section-header h3 {
        font-size: 1.1rem;
        font-weight: 600;
        color: #1f1a1a;
        margin: 0;
        flex: 1;
    }

    .status-badge {
        padding: 0.25rem 1rem;
        border-radius: 40px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        background: #f0f0f0;
        color: #666;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
    }

    .status-badge.active {
        background: #dcfce7;
        color: #16a34a;
    }

    .status-badge.completed {
        background: #dbeafe;
        color: #2563eb;
    }

    .status-badge.pending {
        background: #fef3c7;
        color: #d97706;
    }

    .status-badge.cancelled {
        background: #fee2e2;
        color: #dc2626;
    }

    .status-badge i {
        font-size: 0.4rem;
    }

    .status-badge:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    /* ===== PROFILE SECTION ===== */
    .profile-section {
        background: #fefcfc;
        border-radius: 2rem;
        padding: 2rem;
        margin-bottom: 2.5rem;
        border: 1px solid #f7e6e6;
        position: relative;
        z-index: 1;
        transition: all 0.4s ease;
    }

    .profile-section:hover {
        background: #fffafa;
        border-color: #f0d0d0;
        box-shadow: 0 8px 30px rgba(180, 20, 20, 0.05);
    }

    .profile-grid {
        display: grid;
        grid-template-columns: 200px 1fr;
        gap: 2.5rem;
        align-items: start;
    }

    .profile-avatar {
        text-align: center;
    }

    .avatar-circle {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: linear-gradient(135deg, #b91c1c, #dc2626);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 0.8rem;
        color: #fff;
        box-shadow: 0 8px 30px rgba(185, 28, 28, 0.3);
        transition: all 0.4s ease;
        position: relative;
    }

    .avatar-circle i {
        color: #ffffff !important;
    }

    .avatar-circle::after {
        content: '';
        position: absolute;
        inset: -3px;
        border-radius: 50%;
        background: linear-gradient(135deg, #b91c1c, #f87171, #b91c1c);
        background-size: 300% 300%;
        animation: borderGlow 3s ease infinite;
        z-index: -1;
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .profile-avatar:hover .avatar-circle::after {
        opacity: 1;
    }

    @keyframes borderGlow {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .avatar-circle:hover {
        transform: scale(1.05) rotate(-5deg);
    }

    .profile-avatar h4 {
        font-size: 1.1rem;
        font-weight: 600;
        color: #1f1a1a;
        margin: 0.5rem 0 0.2rem;
    }

    .user-role {
        font-size: 0.75rem;
        color: #a94442;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        font-weight: 600;
    }

    .profile-details,
    .item-details-grid,
    .booking-grid,
    .owner-grid,
    .party-details {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0.8rem 2rem;
    }

    /* ===== DETAIL ITEMS WITH PERFECT CIRCLES ===== */
    .detail-item {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        padding: 0.5rem 0.8rem;
        border-radius: 0.8rem;
        transition: all 0.3s ease;
        border-bottom: 1px solid #f5e8e8;
    }

    .detail-item:last-child {
        border-bottom: none;
    }

    .detail-item:hover {
        background: rgba(185, 28, 28, 0.04);
        transform: translateX(4px);
    }

    /* ===== PERFECT CIRCLE WITH WHITE ICON ===== */
    .detail-icon-circle {
        width: 38px;
        height: 38px;
        min-width: 38px;
        min-height: 38px;
        border-radius: 50% !important;
        background: #b91c1c;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: 0 2px 8px rgba(185, 28, 28, 0.25);
        border: 2px solid rgba(255, 255, 255, 0.1);
        flex-shrink: 0;
        overflow: hidden;
    }

    /* Force white icons inside perfect circles */
    .detail-icon-circle i {
        color: #ffffff !important;
        font-size: 1rem !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        line-height: 1 !important;
        width: auto !important;
        height: auto !important;
    }

    .detail-item:hover .detail-icon-circle {
        transform: scale(1.15) rotate(360deg);
        box-shadow: 0 4px 20px rgba(185, 28, 28, 0.4);
        border-color: rgba(255, 255, 255, 0.3);
    }

    .detail-item > div {
        flex: 1;
        min-width: 0;
    }

    .detail-label {
        display: block;
        font-size: 0.65rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #a94442;
        font-weight: 600;
    }

    .detail-value {
        display: block;
        font-size: 0.9rem;
        color: #1f1a1a;
        word-break: break-word;
    }

    .detail-value.highlight {
        color: #b91c1c;
        font-weight: 600;
    }

    /* ===== ITEM SECTION ===== */
    .item-section {
        background: #fefcfc;
        border-radius: 2rem;
        padding: 2rem;
        margin-bottom: 2.5rem;
        border: 1px solid #f7e6e6;
        position: relative;
        z-index: 1;
        transition: all 0.4s ease;
    }

    .item-section:hover {
        background: #fffafa;
        border-color: #f0d0d0;
        box-shadow: 0 8px 30px rgba(180, 20, 20, 0.05);
    }

    .item-grid {
        display: grid;
        grid-template-columns: 340px 1fr;
        gap: 2rem;
        margin-bottom: 2rem;
    }

    .item-image-card {
        position: relative;
        border-radius: 1.5rem;
        overflow: hidden;
        background: #f5f0f0;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        transition: all 0.4s ease;
    }

    .item-image-card:hover {
        transform: translateY(-4px) scale(1.02);
        box-shadow: 0 12px 40px rgba(180, 20, 20, 0.15);
    }

    .image-carousel {
        width: 100%;
    }

    .image-wrapper {
        width: 100%;
        height: 250px;
        overflow: hidden;
        position: relative;
        background: #f5f0f0;
    }

    .item-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.6s ease;
    }

    .item-image-card:hover .item-img {
        transform: scale(1.08);
    }

    .thumbnail-strip {
        display: flex;
        gap: 0.5rem;
        padding: 0.8rem;
        background: #fff;
        overflow-x: auto;
        scrollbar-width: thin;
        scrollbar-color: #b91c1c #f5e8e8;
    }

    .thumbnail-strip::-webkit-scrollbar {
        height: 4px;
    }

    .thumbnail-strip::-webkit-scrollbar-track {
        background: #f5e8e8;
        border-radius: 10px;
    }

    .thumbnail-strip::-webkit-scrollbar-thumb {
        background: #b91c1c;
        border-radius: 10px;
    }

    .thumbnail-item {
        width: 60px;
        height: 60px;
        border-radius: 0.5rem;
        overflow: hidden;
        cursor: pointer;
        border: 2px solid transparent;
        transition: all 0.3s ease;
        flex-shrink: 0;
    }

    .thumbnail-item:hover {
        border-color: #b91c1c;
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(185, 28, 28, 0.2);
    }

    .thumbnail-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .no-image {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #c0a8a8;
        gap: 0.5rem;
    }

    .no-image i {
        opacity: 0.5;
    }

    .no-image span {
        font-size: 0.9rem;
        font-weight: 500;
    }

    .image-overlay {
        padding: 1rem;
        text-align: center;
        background: #fff;
        border-top: 1px solid #f5e8e8;
    }

    .item-title {
        display: block;
        font-weight: 600;
        color: #1f1a1a;
        font-size: 1rem;
    }

    .item-category {
        display: block;
        font-size: 0.8rem;
        color: #a94442;
        font-weight: 500;
    }

    .item-details-grid {
        grid-template-columns: 1fr 1fr;
        gap: 0.5rem 1.5rem;
    }

    .owner-section {
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 2px solid #f5e8e8;
    }

    .owner-header {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        margin-bottom: 1rem;
        font-size: 0.9rem;
        font-weight: 600;
        color: #1f1a1a;
    }

    .owner-header i {
        color: #b91c1c;
        font-size: 1.1rem;
    }

    .owner-grid {
        grid-template-columns: 1fr 1fr 1fr 1fr;
    }

    /* ===== BOOKING SECTION ===== */
    .booking-section {
        background: #fefcfc;
        border-radius: 2rem;
        padding: 2rem;
        margin-bottom: 2.5rem;
        border: 1px solid #f7e6e6;
        position: relative;
        z-index: 1;
        transition: all 0.4s ease;
    }

    .booking-section:hover {
        background: #fffafa;
        border-color: #f0d0d0;
        box-shadow: 0 8px 30px rgba(180, 20, 20, 0.05);
    }

    .booking-grid {
        grid-template-columns: 1fr 1fr 1fr;
        margin-bottom: 2rem;
    }

    .booking-parties {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
        padding-top: 1.5rem;
        border-top: 2px solid #f5e8e8;
    }

    .party-card {
        background: #fefbfb;
        border-radius: 1.5rem;
        padding: 1.5rem;
        border: 1px solid #f5e8e8;
        transition: all 0.4s ease;
    }

    .party-card:hover {
        background: #fff7f7;
        border-color: #f0d0d0;
        transform: translateY(-4px);
        box-shadow: 0 8px 25px rgba(180, 20, 20, 0.06);
    }

    .party-header {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        margin-bottom: 1rem;
        font-size: 0.9rem;
        font-weight: 600;
        color: #1f1a1a;
        padding-bottom: 0.8rem;
        border-bottom: 1px solid #f5e8e8;
    }

    .party-header i {
        color: #b91c1c;
        font-size: 1rem;
    }

    .party-details {
        grid-template-columns: 1fr 1fr;
        gap: 0.5rem 1.5rem;
    }

    /* ===== FOOTER ===== */
    .footer-note {
        margin-top: 2.5rem;
        padding: 1rem 1.5rem;
        font-size: 0.8rem;
        color: #b08282;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 2px solid #f5e8e8;
        padding-top: 1.5rem;
        position: relative;
        z-index: 1;
        transition: all 0.3s ease;
    }

    .footer-note:hover {
        color: #b91c1c;
    }

    .footer-badge {
        background: #dcfce7;
        color: #16a34a;
        padding: 0.3rem 1rem;
        border-radius: 40px;
        font-size: 0.7rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .footer-badge:hover {
        transform: scale(1.05);
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 1024px) {
        .review-card { padding: 2rem; }
        .profile-grid { grid-template-columns: 1fr; }
        .item-grid { grid-template-columns: 1fr; }
        .item-image-card { max-width: 400px; margin: 0 auto; }
        .owner-grid { grid-template-columns: 1fr 1fr; }
        .booking-grid { grid-template-columns: 1fr 1fr; }
        .booking-parties { grid-template-columns: 1fr; }
        .party-details { grid-template-columns: 1fr 1fr; }
    }

    @media (max-width: 768px) {
        .review-card { padding: 1.5rem; border-radius: 2rem; }
        .hero-header { padding: 1.2rem; }
        .hero-content { flex-wrap: wrap; justify-content: center; text-align: center; }
        .hero-title { font-size: 1.4rem; }
        .stats-row { grid-template-columns: 1fr 1fr; }
        .profile-details { grid-template-columns: 1fr; }
        .item-details-grid { grid-template-columns: 1fr; }
        .booking-grid { grid-template-columns: 1fr; }
        .owner-grid { grid-template-columns: 1fr; }
        .party-details { grid-template-columns: 1fr; }
        .review-meta { flex-direction: column; gap: 0.5rem; }
        .stats-row { gap: 0.8rem; }
        .stat-item { padding: 0.8rem 1rem; }
        .stat-value { font-size: 1.1rem; }
    }

    @media (max-width: 480px) {
        .review-card { padding: 1rem; border-radius: 1.5rem; }
        .hero-content { flex-direction: column; }
        .hero-icon { width: 50px; height: 50px; font-size: 1.4rem; }
        .stats-row { grid-template-columns: 1fr; }
        .profile-avatar .avatar-circle { width: 90px; height: 90px; }
        .profile-grid { gap: 1.5rem; }
        .section-header { flex-wrap: wrap; }
        .section-header h3 { font-size: 0.95rem; }
        .review-text { flex-direction: column; align-items: center; text-align: center; }
        .review-text p { font-size: 0.95rem; }
        .footer-note { flex-direction: column; gap: 0.8rem; text-align: center; }
        .thumbnail-strip { justify-content: center; }
        .item-grid { grid-template-columns: 1fr; }
    }
</style>