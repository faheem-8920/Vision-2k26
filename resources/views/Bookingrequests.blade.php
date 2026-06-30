<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking Requests · Red & Black</title>
  <!-- Bootstrap 5 + Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
    }
    body {
      background: #f8f9fc;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
      padding: 2rem 1rem;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .container {
      max-width: 1400px;
      width: 100%;
    }

    /* Main card */
    .card-booking {
      background: #ffffff;
      border-radius: 28px;
      border: 1px solid rgba(220, 0, 0, 0.08);
      box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.15), 0 0 0 1px rgba(220, 0, 0, 0.02);
      transition: box-shadow 0.3s ease, transform 0.2s ease;
    }
    .card-booking:hover {
      box-shadow: 0 30px 55px -16px rgba(180, 0, 0, 0.25), 0 0 0 1px rgba(200, 0, 0, 0.06);
      transform: translateY(-2px);
    }

    /* Header */
    .card-header-red {
      background: linear-gradient(145deg, #b81b1b 0%, #8b0000 100%);
      border-radius: 28px 28px 0 0 !important;
      padding: 1.2rem 2rem;
      border-bottom: none;
      position: relative;
      overflow: hidden;
    }
    .card-header-red::after {
      content: '';
      position: absolute;
      top: -50%;
      left: -20%;
      width: 150%;
      height: 200%;
      background: radial-gradient(circle at 30% 50%, rgba(255, 255, 255, 0.08) 0%, transparent 60%);
      pointer-events: none;
      animation: shimmerHeader 8s infinite alternate ease-in-out;
    }
    @keyframes shimmerHeader {
      0% { transform: translateX(-10%) rotate(-2deg); }
      100% { transform: translateX(10%) rotate(2deg); }
    }
    .card-header-red h3 {
      font-weight: 700;
      letter-spacing: -0.3px;
      display: flex;
      align-items: center;
      gap: 12px;
      color: white;
      text-shadow: 0 2px 6px rgba(0,0,0,0.15);
      position: relative;
      z-index: 2;
    }
    .card-header-red h3 i {
      font-size: 2rem;
      opacity: 0.9;
      transition: transform 0.3s ease;
    }
    .card-header-red h3 i:hover {
      transform: rotate(-8deg) scale(1.05);
    }
    .badge-count {
      background: rgba(255,255,255,0.13);
      padding: 0.2rem 1rem;
      border-radius: 40px;
      font-size: 0.9rem;
      font-weight: 500;
      margin-left: auto;
    }

    /* Alert */
    .alert-red-accent {
      background: #fff0f0;
      border-left: 6px solid #b81b1b;
      color: #5a1a1a;
      border-radius: 16px;
      padding: 0.9rem 1.5rem;
      font-weight: 500;
      box-shadow: 0 4px 10px rgba(184, 27, 27, 0.06);
      animation: slideFade 0.5s cubic-bezier(0.16, 1, 0.3, 1);
    }
    @keyframes slideFade {
      0% { opacity: 0; transform: translateY(-14px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    /* Table */
    .table-booking {
      margin-bottom: 0;
      border-collapse: separate;
      border-spacing: 0 6px;
    }
    .table-booking thead th {
      background: #fcfcfc;
      color: #1e1e1e;
      font-weight: 600;
      font-size: 0.85rem;
      text-transform: uppercase;
      letter-spacing: 0.4px;
      padding: 1rem 0.75rem;
      border-bottom: 2px solid #e9e9e9;
      border-top: none;
    }
    .table-booking thead th:first-child {
      border-radius: 16px 0 0 0;
      padding-left: 1.5rem;
    }
    .table-booking thead th:last-child {
      border-radius: 0 16px 0 0;
      padding-right: 1.5rem;
    }

    .table-booking tbody tr {
      background: white;
      border-radius: 18px;
      transition: all 0.2s cubic-bezier(0.2, 0, 0, 1);
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.01);
    }
    .table-booking tbody tr:hover {
      background: #fffbfb;
      box-shadow: 0 8px 20px -6px rgba(180, 0, 0, 0.12);
      transform: scale(1.003);
    }
    .table-booking tbody td {
      padding: 1rem 0.75rem;
      vertical-align: middle;
      border-bottom: 1px solid rgba(0, 0, 0, 0.02);
      background: transparent;
      font-weight: 500;
      color: #1f1f1f;
    }
    .table-booking tbody td:first-child {
      border-radius: 18px 0 0 18px;
      padding-left: 1.5rem;
      font-weight: 600;
      color: #111;
    }
    .table-booking tbody td:last-child {
      border-radius: 0 18px 18px 0;
      padding-right: 1.5rem;
    }

    /* Item & Customer */
    .item-title {
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .item-title i {
      color: #b81b1b;
      font-size: 1.2rem;
      transition: transform 0.2s ease, color 0.2s;
    }
    .item-title i:hover {
      transform: rotate(6deg) scale(1.1);
      color: #d32f2f;
    }

    .customer-name {
      display: flex;
      align-items: center;
      gap: 6px;
      font-weight: 500;
    }
    .customer-name i {
      color: #555;
      font-size: 0.95rem;
      transition: color 0.2s;
    }
    .customer-name:hover i {
      color: #b81b1b;
    }

    /* Date */
    .date-badge {
      background: #f3f3f3;
      padding: 0.2rem 0.6rem;
      border-radius: 40px;
      font-size: 0.8rem;
      font-weight: 500;
      color: #2b2b2b;
      display: inline-block;
      transition: all 0.15s ease;
    }
    .date-badge i {
      margin-right: 4px;
      color: #b81b1b;
      font-size: 0.7rem;
    }
    .date-badge:hover {
      background: #e6e6e6;
      transform: translateY(-1px);
    }

    /* Total */
    .total-amount {
      font-weight: 700;
      color: #1f1f1f;
      background: #faf6f6;
      padding: 0.2rem 0.9rem;
      border-radius: 40px;
      font-size: 0.9rem;
      display: inline-block;
      transition: background 0.2s, transform 0.1s;
    }
    .total-amount:hover {
      background: #f0e6e6;
      transform: scale(1.02);
    }

    /* Status Badges - All statuses */
    .badge-status {
      padding: 0.5rem 1rem;
      border-radius: 40px;
      font-weight: 600;
      letter-spacing: 0.2px;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      transition: all 0.2s;
      border: 1px solid transparent;
    }
    .badge-status i {
      font-size: 0.9rem;
    }
    .badge-status:hover {
      transform: scale(1.03);
      box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    .badge-pending {
      background: #fce4e4;
      color: #9a1f1f;
      border-color: rgba(184, 27, 27, 0.15);
    }
    .badge-pending:hover {
      background: #fcd6d6;
      border-color: #b81b1b;
      box-shadow: 0 2px 8px rgba(184, 27, 27, 0.15);
    }

    .badge-approved {
      background: #e3f3e3;
      color: #0f6b0f;
      border-color: rgba(21, 128, 21, 0.15);
    }
    .badge-approved:hover {
      background: #cde8cd;
      box-shadow: 0 2px 8px rgba(21, 128, 21, 0.12);
    }

    .badge-handed {
      background: #dbeafe;
      color: #1a4c7a;
      border-color: rgba(30, 80, 180, 0.15);
    }
    .badge-handed:hover {
      background: #c5d9f0;
      box-shadow: 0 2px 8px rgba(30, 80, 180, 0.12);
    }

    .badge-returned {
      background: #d1faf0;
      color: #0f6b5a;
      border-color: rgba(15, 107, 90, 0.15);
    }
    .badge-returned:hover {
      background: #b8f0e2;
      box-shadow: 0 2px 8px rgba(15, 107, 90, 0.12);
    }

    .badge-completed {
      background: #eaeef3;
      color: #2b2b2b;
      border-color: rgba(0, 0, 0, 0.08);
    }
    .badge-completed:hover {
      background: #dde3ea;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    }

    .badge-rejected {
      background: #f1e5e5;
      color: #7a2b2b;
      border-color: rgba(150, 40, 40, 0.12);
    }
    .badge-rejected:hover {
      background: #ebd5d5;
      box-shadow: 0 2px 8px rgba(150, 40, 40, 0.1);
    }

    /* Action Buttons */
    .btn-action {
      border-radius: 40px;
      font-weight: 600;
      padding: 0.4rem 1.2rem;
      font-size: 0.8rem;
      transition: all 0.2s ease;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      border: none;
      cursor: pointer;
    }
    .btn-action i {
      font-size: 0.9rem;
    }
    .btn-action:hover {
      transform: scale(1.03);
      box-shadow: 0 4px 12px rgba(0,0,0,0.12);
    }
    .btn-action:active {
      transform: scale(0.95);
    }

    .btn-view {
      background: #1f1f1f;
      color: white;
    }
    .btn-view:hover {
      background: #b81b1b;
      color: white;
    }

    .btn-accept {
      background: #1f8b1f;
      color: white;
    }
    .btn-accept:hover {
      background: #0f6f0f;
      color: white;
    }

    .btn-reject {
      background: #b81b1b;
      color: white;
    }
    .btn-reject:hover {
      background: #8f0f0f;
      color: white;
    }

    .btn-give {
      background: #1f6fb0;
      color: white;
    }
    .btn-give:hover {
      background: #155a91;
      color: white;
    }

    .btn-return {
      background: #b87a1b;
      color: white;
    }
    .btn-return:hover {
      background: #9a6315;
      color: white;
    }

    .btn-processed {
      background: #f1f1f1;
      color: #4f4f4f;
      padding: 0.3rem 1.2rem;
      border-radius: 40px;
      font-weight: 500;
      font-size: 0.85rem;
      border: 1px solid #ddd;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      pointer-events: none;
    }

    .d-flex.gap-2 {
      gap: 0.5rem !important;
    }

    /* Empty state */
    .empty-state {
      padding: 2.5rem 0;
      color: #5f5f5f;
    }
    .empty-state i {
      font-size: 2.2rem;
      color: #b81b1b;
      opacity: 0.5;
      margin-bottom: 6px;
    }

    @media (max-width: 768px) {
      .card-header-red {
        padding: 1rem 1.2rem;
      }
      .table-booking tbody td:first-child {
        padding-left: 0.8rem;
      }
      .table-booking tbody td:last-child {
        padding-right: 0.8rem;
      }
      .btn-action {
        padding: 0.25rem 0.8rem;
        font-size: 0.7rem;
      }
    }
  </style>
</head>
<body>
<div class="container mt-4">

  <!-- Success alert -->
  @if(session('success'))
  <div class="alert alert-red-accent d-flex align-items-center gap-3 mb-4">
    <i class="bi bi-check-circle-fill" style="color: #b81b1b; font-size: 1.5rem;"></i>
    <span>{{ session('success') }}</span>
  </div>
  @endif

  <!-- Main card -->
  <div class="card card-booking border-0">

    <!-- Header -->
    <div class="card-header-red">
      <h3>
        <i class="bi bi-calendar2-check-fill"></i>
        Booking Requests
        <span class="badge-count">
          <i class="bi bi-people-fill me-1"></i> {{ $bookings->count() ?? 0 }}
        </span>
      </h3>
    </div>

    <div class="card-body p-0 p-xl-2">
      <div class="table-responsive p-3 p-lg-4">
        <table class="table table-booking table-hover align-middle">
          <thead>
            <tr>
              <th><i class="bi bi-box-seam me-1"></i> Item</th>
              <th><i class="bi bi-person-circle me-1"></i> Customer</th>
              <th><i class="bi bi-calendar-range me-1"></i> Dates</th>
              <th><i class="bi bi-currency-rupee me-1"></i> Total</th>
              <th><i class="bi bi-info-circle me-1"></i> Status</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($bookings as $booking)
            <tr>
              <!-- Item -->
              <td>
                <div class="item-title">
                  <i class="bi bi-tag-fill"></i>
                  {{ $booking->item->title ?? 'Untitled' }}
                </div>
              </td>

              <!-- Customer -->
              <td>
                <div class="customer-name">
                  <i class="bi bi-person-badge"></i>
                  {{ $booking->renter->name ?? 'N/A' }}
                </div>
              </td>

              <!-- Dates -->
              <td>
                <span class="date-badge"><i class="bi bi-calendar3"></i> {{ $booking->start_date }}</span>
                <span class="date-badge" style="margin-left: 4px;"><i class="bi bi-arrow-right-short"></i> {{ $booking->end_date }}</span>
              </td>

              <!-- Total -->
              <td>
                <span class="total-amount">
                  <i class="bi bi-currency-rupee" style="font-size: 0.75rem;"></i> {{ number_format($booking->total_amount) }}
                </span>
              </td>

              <!-- Status - ALL statuses included -->
              <td>
                @if($booking->status == 'pending')
                  <span class="badge-status badge-pending"><i class="bi bi-clock-history"></i> Pending</span>
                @elseif($booking->status == 'approved')
                  <span class="badge-status badge-approved"><i class="bi bi-check-circle-fill"></i> Approved</span>
                @elseif($booking->status == 'handed_over')
                  <span class="badge-status badge-handed"><i class="bi bi-handbag-fill"></i> Item Given</span>
                @elseif($booking->status == 'returned')
                  <span class="badge-status badge-returned"><i class="bi bi-arrow-return-left"></i> Returned</span>
                @elseif($booking->status == 'completed')
                  <span class="badge-status badge-completed"><i class="bi bi-check2-all"></i> Completed</span>
                @else
                  <span class="badge-status badge-rejected"><i class="bi bi-x-circle-fill"></i> Rejected</span>
                @endif
              </td>

              <!-- Actions - ALL actions included -->
              <td>
                <div class="d-flex gap-2 flex-wrap justify-content-center">

                  <!-- View Details - ALWAYS visible -->
                  <a href="/owner/booking/{{ $booking->id }}" class="btn-action btn-view">
                    <i class="bi bi-eye"></i> View
                  </a>

                  @if($booking->status == 'pending')
                    <!-- Accept -->
                    <form method="POST" action="/owner/bookings/{{ $booking->id }}/approve" style="display: inline;">
                      @csrf
                      <button class="btn-action btn-accept" type="submit">
                        <i class="bi bi-check-lg"></i> Accept
                      </button>
                    </form>
                    <!-- Reject -->
                    <form method="POST" action="/owner/bookings/{{ $booking->id }}/reject" style="display: inline;">
                      @csrf
                      <button class="btn-action btn-reject" type="submit">
                        <i class="bi bi-x-lg"></i> Reject
                      </button>
                    </form>

                  @elseif($booking->status == 'approved')
                    <!-- Give -->
                    <form method="POST" action="/owner/booking/{{ $booking->id }}/give" style="display: inline;">
                      @csrf
                      <button class="btn-action btn-give" type="submit">
                        <i class="bi bi-box-seam"></i> Give
                      </button>
                    </form>

                  @elseif($booking->status == 'handed_over')
                    <!-- Returned -->
                    <form method="POST" action="/owner/booking/{{ $booking->id }}/returned" style="display: inline;">
                      @csrf
                      <button class="btn-action btn-return" type="submit">
                        <i class="bi bi-arrow-return-left"></i> Returned
                      </button>
                    </form>

                  @else
                    <!-- Processed (no actions) -->
                    <span class="btn-processed">
                      <i class="bi bi-check2-all"></i> Processed
                    </span>
                  @endif

                </div>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="6" class="text-center empty-state">
                <i class="bi bi-inbox-fill d-block"></i>
                <span style="font-weight: 500;">No booking requests found.</span>
                <span class="d-block text-muted" style="font-size: 0.9rem;">All caught up</span>
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>