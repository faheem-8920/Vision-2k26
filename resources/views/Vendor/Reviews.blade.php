@extends('Vendor.layout')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    /* ===== PREMIUM RED & WHITE THEME - REVIEWS ===== */
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
    .admin-card {
        background: rgba(255, 255, 255, 0.92);
        backdrop-filter: blur(2px);
        border-radius: 2.5rem 2.5rem 2rem 2rem;
        padding: 2rem 1.8rem 1.8rem 1.8rem;
        box-shadow: 0 25px 50px -12px rgba(180, 20, 20, 0.25),
                    0 4px 18px rgba(200, 0, 0, 0.06);
        border: 1px solid rgba(255, 255, 255, 0.7);
        transition: box-shadow 0.35s ease, transform 0.25s ease;
    }
    .admin-card:hover {
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

    /* ----- table red/white elegance ----- */
    .table-responsive {
        border-radius: 1.8rem;
        overflow: hidden;
        background: transparent;
    }

    .table-scroll {
        overflow-x: auto;
        overflow-y: visible;
        padding: 0.2rem 0.2rem 0.5rem 0.2rem;
        scroll-behavior: smooth;
        border-radius: 32px;
    }
    .table-scroll::-webkit-scrollbar {
        height: 8px;
        background: #f5f0f0;
        border-radius: 20px;
    }
    .table-scroll::-webkit-scrollbar-track {
        background: #f5f0f0;
        border-radius: 20px;
        box-shadow: inset 0 1px 4px rgba(0,0,0,0.02);
    }
    .table-scroll::-webkit-scrollbar-thumb {
        background: linear-gradient(90deg, #b31b1b, #cf3a3a);
        border-radius: 20px;
        transition: all 0.3s;
        border: 2px solid #f5f0f0;
    }
    .table-scroll::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(90deg, #7f1414, #b31b1b);
        transform: scale(1.02);
    }
    .table-scroll {
        scrollbar-width: thin;
        scrollbar-color: #b31b1b #f5f0f0;
    }

    .table-red-white {
        border-collapse: separate;
        border-spacing: 0 10px;
        width: 100%;
        margin-bottom: 0;
        min-width: 950px;
    }

    /* header */
    .table-red-white thead th {
        background: #d32f2f;
        color: white !important;
        font-weight: 600;
        font-size: 0.78rem;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        padding: 16px 18px;
        border: none;
        transition: background 0.2s;
        position: relative;
        text-shadow: 0 1px 4px rgba(0,0,0,0.08);
        white-space: nowrap;
    }
    .table-red-white thead th i {
        color: white !important;
        margin-right: 8px;
        opacity: 0.95;
        font-size: 0.9rem;
    }
    .table-red-white thead th:first-child {
        border-radius: 20px 0 0 20px;
        padding-left: 26px;
    }
    .table-red-white thead th:last-child {
        border-radius: 0 20px 20px 0;
        padding-right: 26px;
        text-align: center !important;
    }
    .table-red-white thead th:hover {
        background: #b71c1c;
    }
    .table-red-white thead th:hover i {
        transform: scale(1.15);
        opacity: 1;
    }

    /* rows */
    .table-red-white tbody tr {
        background: white;
        border-radius: 20px;
        box-shadow: 0 4px 14px rgba(180, 20, 20, 0.04);
        transition: all 0.25s cubic-bezier(0.2, 0, 0, 1);
        border: 1px solid rgba(211, 47, 47, 0.04);
        opacity: 0;
        animation: fadeSlide 0.45s forwards;
        animation-delay: calc(0.05s * var(--i, 1));
    }
    .table-red-white tbody tr:hover {
        background: #fffbfb;
        border-color: #ecc8c8;
        transform: scale(1.008) translateY(-2px);
        box-shadow: 0 14px 28px rgba(190, 30, 30, 0.10);
    }

    @keyframes fadeSlide {
        0% { opacity: 0; transform: translateY(16px) scale(0.98); }
        100% { opacity: 1; transform: translateY(0) scale(1); }
    }

    .table-red-white tbody td {
        padding: 18px 18px;
        vertical-align: middle;
        border: none;
        background: transparent;
        font-size: 0.95rem;
        color: #1a1a1a;
    }
    .table-red-white tbody td:first-child {
        padding-left: 26px;
        border-radius: 20px 0 0 20px;
    }
    .table-red-white tbody td:last-child {
        padding-right: 26px;
        border-radius: 0 20px 20px 0;
        text-align: center !important;
    }

    /* item */
    .review-item {
        font-weight: 500;
        color: #1a1a1a;
        transition: 0.15s;
    }
    .table-red-white tbody tr:hover .review-item {
        color: #b71c1c;
    }

    /* renter */
    .review-renter {
        font-weight: 500;
        color: #1a1a1a;
        transition: 0.15s;
    }
    .table-red-white tbody tr:hover .review-renter {
        color: #b71c1c;
    }

    /* rating stars */
    .rating-stars {
        color: #f5b342;
        font-size: 1.1rem;
        letter-spacing: 1px;
        transition: 0.2s;
    }
    .rating-stars i {
        color: #f5b342 !important;
    }
    .table-red-white tbody tr:hover .rating-stars {
        transform: scale(1.1);
    }
    .rating-number {
        font-weight: 700;
        color: #a00c0c;
        margin-left: 4px;
    }

    /* comment */
    .review-comment {
        color: #3d3d3d;
        font-style: italic;
        max-width: 200px;
        display: inline-block;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        transition: 0.15s;
    }
    .table-red-white tbody tr:hover .review-comment {
        color: #b71c1c;
    }

    /* date */
    .review-date {
        color: #5a5a5a;
        font-size: 0.85rem;
        white-space: nowrap;
        transition: 0.15s;
    }
    .table-red-white tbody tr:hover .review-date {
        color: #b71c1c;
        font-weight: 500;
    }

    /* ===== ACTION BUTTONS ===== */
    .actions-wrap {
        display: flex;
        flex-wrap: nowrap;
        align-items: center;
        gap: 8px;
        justify-content: center;
        width: 100%;
    }

    .btn-action {
        border-radius: 60px;
        padding: 8px 18px;
        font-weight: 600;
        font-size: 0.75rem;
        letter-spacing: 0.25px;
        transition: all 0.25s cubic-bezier(0.2, 0, 0, 1);
        border: 1.5px solid transparent;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.02);
        text-decoration: none;
        line-height: 1;
        cursor: pointer;
        background: transparent;
    }
    .btn-action i {
        font-size: 0.85rem;
        transition: transform 0.25s ease;
        color: inherit !important;
    }

    /* View Details Button */
    .btn-view {
        background: #d32f2f;
        color: white !important;
        border-color: #d32f2f;
    }
    .btn-view i {
        color: white !important;
    }
    .btn-view:hover {
        background: #b71c1c;
        border-color: #b71c1c;
        color: white !important;
        transform: translateY(-3px) scale(1.04);
        box-shadow: 0 12px 20px rgba(211, 47, 47, 0.3);
    }
    .btn-view:hover i {
        transform: rotate(-6deg) scale(1.1);
        color: white !important;
    }

    /* footer */
    .table-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 1.8rem;
        padding-top: 1rem;
        border-top: 1px solid rgba(211, 47, 47, 0.08);
        color: #6c757d;
        font-size: 0.85rem;
        flex-wrap: wrap;
        gap: 0.8rem;
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

    /* ===== PAGINATION ===== */
    .pagination-wrapper {
        margin-top: 1.5rem;
        display: flex;
        justify-content: flex-end;
    }

    .pagination-custom {
        display: flex;
        gap: 6px;
        align-items: center;
        flex-wrap: wrap;
    }

    .pagination-custom .page-item {
        list-style: none;
    }

    .pagination-custom .page-link {
        background: white;
        border: 1.5px solid #e8e0e0;
        color: #2d2d2d;
        padding: 0.5rem 1rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.85rem;
        transition: all 0.25s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        min-width: 40px;
        justify-content: center;
    }

    .pagination-custom .page-link i {
        color: #d32f2f !important;
        font-size: 0.8rem;
    }

    .pagination-custom .page-link:hover {
        background: #fff5f5;
        border-color: #d32f2f;
        color: #b71c1c;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(211, 47, 47, 0.15);
    }

    .pagination-custom .page-item.active .page-link {
        background: #d32f2f;
        border-color: #d32f2f;
        color: white !important;
        box-shadow: 0 4px 14px rgba(211, 47, 47, 0.3);
    }

    .pagination-custom .page-item.active .page-link i {
        color: white !important;
    }

    .pagination-custom .page-item.disabled .page-link {
        opacity: 0.4;
        cursor: not-allowed;
        pointer-events: none;
    }

    .pagination-custom .page-item:first-child .page-link {
        border-radius: 12px;
    }
    .pagination-custom .page-item:last-child .page-link {
        border-radius: 12px;
    }

    .pagination-wrapper .showing-info {
        color: #6c757d;
        font-size: 0.85rem;
        margin-right: 1.5rem;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .pagination-wrapper .showing-info i {
        color: #d32f2f !important;
    }

    /* responsive */
    @media (max-width: 992px) {
        .table-red-white thead th,
        .table-red-white tbody td {
            padding: 12px 10px;
            font-size: 0.8rem;
        }
        .pagination-wrapper {
            flex-direction: column;
            align-items: flex-end;
            gap: 0.8rem;
        }
        .actions-wrap {
            flex-wrap: wrap;
            gap: 4px;
        }
        .btn-action {
            padding: 6px 12px;
            font-size: 0.7rem;
        }
    }

    @media (max-width: 768px) {
        .admin-card { padding: 1.2rem; }
        .heading-red { font-size: 1.5rem; }
        .brand-icon { width: 40px; height: 40px; font-size: 1.3rem; }
        .table-red-white thead th, .table-red-white tbody td {
            padding: 10px 8px;
            font-size: 0.75rem;
        }
        .table-red-white tbody td:first-child { padding-left: 14px; }
        .table-red-white tbody td:last-child { padding-right: 14px; }
        .header-section { 
            flex-direction: column; 
            align-items: start; 
            gap: 0.8rem; 
        }
        .status-badge { 
            align-self: flex-start; 
        }
        .pagination-wrapper {
            align-items: center;
        }
        .pagination-custom .page-link {
            padding: 0.4rem 0.7rem;
            font-size: 0.75rem;
            min-width: 32px;
        }
        .btn-action {
            padding: 4px 10px;
            font-size: 0.65rem;
        }
        .actions-wrap {
            gap: 4px;
        }
    }

    @media (max-width: 480px) {
        .table-red-white {
            min-width: 600px;
        }
        .pagination-custom .page-link {
            padding: 0.3rem 0.6rem;
            font-size: 0.7rem;
            min-width: 28px;
        }
    }
</style>

<div class="container">
    <div class="admin-card">
        <!-- header -->
        <div class="header-section">
            <div class="brand-head">
                <div class="brand-icon">
                    <i class="fas fa-star"></i>
                </div>
                <h1 class="heading-red">
                    All Reviews
                    <span>{{ $reviews->total() }}</span>
                </h1>
            </div>
            <div class="status-badge">
                <i class="fas fa-circle"></i> active
            </div>
        </div>

        <!-- table -->
        <div class="table-responsive">
            <div class="table-scroll">
                <table class="table table-red-white">
                    <thead>
                        <tr>
                            <th><i class="fas fa-box"></i> Item</th>
                            <th><i class="fas fa-user"></i> Renter</th>
                            <th><i class="fas fa-star"></i> Rating</th>
                            <th><i class="fas fa-comment"></i> Review</th>
                            <th><i class="fas fa-calendar-alt"></i> Date</th>
                            <th><i class="fas fa-bolt"></i> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reviews as $review)
                        <tr style="--i: {{ $loop->index + 1 }};">
                            <td><span class="review-item">{{ $review->item->title ?? 'N/A' }}</span></td>
                            <td><span class="review-renter">{{ $review->user->name ?? 'N/A' }}</span></td>
                            <td>
                                <span class="rating-stars">
                                    @php
                                        $fullStars = floor($review->rating ?? 0);
                                        $halfStar = ($review->rating ?? 0) - $fullStars >= 0.5;
                                    @endphp
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $fullStars)
                                            <i class="fas fa-star"></i>
                                        @elseif($i == $fullStars + 1 && $halfStar)
                                            <i class="fas fa-star-half-alt"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                    <span class="rating-number">{{ number_format($review->rating ?? 0, 1) }}</span>
                                </span>
                            </td>
                            <td>
                                <span class="review-comment" title="{{ $review->comment ?? '' }}">
                                    {{ Str::limit($review->review ?? 'No comment', 60) }}
                                </span>
                            </td>
                            <td>
                                <span class="review-date">
                                    <i class="far fa-calendar-alt" style="margin-right: 4px; color: #d32f2f !important;"></i>
                                    {{ $review->created_at->format('d M Y') }}
                                </span>
                            </td>
                            <td>
                                <div class="actions-wrap">
                                    <!-- VIEW DETAILS BUTTON -->
                                    <a href="{{ url('/owner/review/' . $review->id) }}" class="btn btn-action btn-view">
                                        <i class="fas fa-eye"></i> View Details
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center" style="padding: 4rem 0;">
                                <i class="fas fa-star" style="font-size: 2.8rem; display: block; margin-bottom: 0.75rem; opacity: 0.6; color: #b13b3b;"></i>
                                <span style="font-weight: 600; color: #7a1f1f; font-size: 1.2rem;">No reviews found.</span>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- footer & pagination -->
        <div class="table-footer">
            <span>
                <i class="fas fa-arrow-right"></i> hover rows · premium red & white
            </span>
            <span class="pill">
                <i class="fas fa-star"></i> {{ $reviews->total() }} reviews
            </span>
        </div>

        <!-- Pagination -->
        @if($reviews->hasPages())
        <div class="pagination-wrapper">
            <div class="showing-info">
                <i class="fas fa-info-circle"></i>
                Showing {{ $reviews->firstItem() ?? 0 }} - {{ $reviews->lastItem() ?? 0 }} of {{ $reviews->total() }}
            </div>
            <div class="pagination-custom">
                {{-- Previous Page Link --}}
                @if ($reviews->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link"><i class="fas fa-chevron-left"></i></span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $reviews->previousPageUrl() }}" rel="prev">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($reviews->links()->elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item disabled">
                            <span class="page-link">{{ $element }}</span>
                        </li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $reviews->currentPage())
                                <li class="page-item active">
                                    <span class="page-link">{{ $page }}</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($reviews->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $reviews->nextPageUrl() }}" rel="next">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link"><i class="fas fa-chevron-right"></i></span>
                    </li>
                @endif
            </div>
        </div>
        @endif
    </div>
</div>

<script>
    // Add animation delay for rows
    document.addEventListener('DOMContentLoaded', function() {
        const rows = document.querySelectorAll('.table-red-white tbody tr');
        rows.forEach((row, index) => {
            row.style.setProperty('--i', index + 1);
        });
    });
</script>

@endsection