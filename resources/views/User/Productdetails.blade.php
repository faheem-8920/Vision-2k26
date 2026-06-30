<!DOCTYPE html>
<html>
<head>
    <title>Book Item</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<style>

body{
    background:#fff5f5;
}

.booking-card{
    background:white;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 15px 40px rgba(220,53,69,.15);
    animation:fadeIn .5s ease;
}

@keyframes fadeIn{
    from{
        opacity:0;
        transform:translateY(20px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

.product-image-wrapper {
    position: relative;
    overflow: hidden;
    background: #f8f0f0;
}

.product-image{
    width:100%;
    height:400px;
    object-fit:cover;
    transition: transform 0.5s ease;
}
.product-image:hover {
    transform: scale(1.03);
}

/* Image Badge */
.image-badge {
    position: absolute;
    top: 20px;
    left: 20px;
    background: #dc3545;
    color: white;
    padding: 8px 20px;
    border-radius: 30px;
    font-weight: 600;
    font-size: 14px;
    box-shadow: 0 4px 15px rgba(220,53,69,.3);
    z-index: 2;
}

.image-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 30px 25px;
    background: linear-gradient(transparent, rgba(0,0,0,0.6));
    color: white;
    z-index: 2;
}
.image-overlay h3 {
    font-weight: 700;
    margin-bottom: 5px;
    text-shadow: 0 2px 8px rgba(0,0,0,0.3);
}
.image-overlay p {
    margin: 0;
    opacity: 0.9;
    font-size: 14px;
}

.price{
    font-size:28px;
    font-weight:700;
    color:#dc3545;
}

.info-box{
    background:#fff5f5;
    padding:15px;
    border-radius:12px;
    margin-bottom:12px;
    border-left: 4px solid #dc3545;
    transition: all 0.3s ease;
}
.info-box:hover {
    background: #ffe8e8;
    transform: translateX(5px);
}

.form-control,
.form-select{
    border-radius:12px;
    padding:12px;
    border: 2px solid #f0d6d6;
    transition: all 0.3s ease;
}

.form-control:focus,
.form-select:focus{
    border-color:#dc3545;
    box-shadow:0 0 0 4px rgba(220,53,69,.12);
}

.form-control.is-invalid,
.form-select.is-invalid {
    border-color: #dc3545;
}

.summary-box{
    background:#fff5f5;
    border:2px dashed #dc3545;
    padding:20px;
    border-radius:15px;
    transition: all 0.3s ease;
}
.summary-box:hover {
    background: #ffe8e8;
}

.terms-box{
    background:#fff;
    border-left:5px solid #dc3545;
    padding:20px;
    border-radius:12px;
    transition: all 0.3s ease;
}
.terms-box:hover {
    box-shadow: 0 4px 12px rgba(220,53,69,.1);
}

.book-btn{
    background:#dc3545;
    border:none;
    padding:14px;
    font-size:18px;
    font-weight:600;
    border-radius:12px;
    transition: all 0.3s ease;
    color: white;
}

.book-btn:hover{
    background:#bb2d3b;
    transform:translateY(-3px);
    box-shadow:0 8px 20px rgba(220,53,69,.3);
}

.fine-box{
    background:#ffe5e5;
    color:#dc3545;
    padding:15px;
    border-radius:12px;
    border: 1px solid #fcc;
}

/* Related Products inside left column */
.related-section {
    padding: 20px 20px 25px;
    background: #faf5f5;
}

.related-card {
    border-radius: 16px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: 1px solid #fce8e8;
    background: white;
    height: 100%;
}
.related-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 30px rgba(220,53,69,.12);
    border-color: #dc3545;
}
.related-card .card-img-top {
    height: 160px;
    object-fit: cover;
    transition: transform 0.4s ease;
}
.related-card:hover .card-img-top {
    transform: scale(1.05);
}
.related-card .btn-outline-danger {
    border-radius: 30px;
    border-width: 2px;
    font-weight: 600;
    transition: all 0.3s ease;
}
.related-card .btn-outline-danger:hover {
    background: #dc3545;
    color: white;
}

.form-check-input:checked {
    background-color: #dc3545;
    border-color: #dc3545;
}

.invalid-feedback {
    color: #dc3545;
    font-weight: 500;
}

/* Left column container */
.left-column {
    display: flex;
    flex-direction: column;
    height: 100%;
}

/* Map Styles */
.map-container {
    padding: 20px;
    background: #faf5f5;
    border-top: 1px solid #f0e0e0;
}

.map-container iframe {
    width: 100%;
    height: 250px;
    border-radius: 12px;
    border: 2px solid #fce8e8;
    transition: all 0.3s ease;
}

.map-container iframe:hover {
    border-color: #dc3545;
    box-shadow: 0 4px 15px rgba(220,53,69,.1);
}

.map-label {
    font-size: 13px;
    color: #6c757d;
    margin-bottom: 8px;
    font-weight: 600;
}

.map-label i {
    color: #dc3545;
    margin-right: 5px;
}

/* Thumbnail Gallery Styles */
.thumbnail-gallery {
    display: flex;
    gap: 10px;
    padding: 12px 20px;
    background: #faf5f5;
    border-top: 1px solid #f0e0e0;
    flex-wrap: wrap;
}

.thumbnail {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 10px;
    cursor: pointer;
    border: 3px solid transparent;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}

.thumbnail:hover {
    transform: scale(1.08);
    border-color: #dc3545;
    box-shadow: 0 4px 12px rgba(220,53,69,.25);
}

.thumbnail.active {
    border-color: #dc3545;
    box-shadow: 0 0 0 3px rgba(220,53,69,.3);
}

/* Thumbnail counter badge */
.thumbnail-counter {
    position: absolute;
    bottom: 10px;
    right: 15px;
    background: rgba(0,0,0,0.7);
    color: white;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    z-index: 2;
}

</style>

</head>
<body>

<div class="container py-5">

<div class="booking-card">

<div class="row g-0">

<!-- LEFT COLUMN: Image + Gallery + Map + Related Products -->
<div class="col-lg-6 left-column">

    <!-- Product Image with overlay -->
    <div class="product-image-wrapper">
        @if($item->images->count())
            <img 
                id="mainImage"
                src="{{ asset('uploads/items/'.$item->images->first()->image) }}"
                class="product-image"
                alt="{{ $item->title }}">
        @else
            <img 
                id="mainImage"
                src="https://via.placeholder.com/800x600/ffcccc/dc3545?text=No+Image"
                class="product-image"
                alt="No image available">
        @endif

        <!-- Badge -->
        <div class="image-badge">
            <i class="fa-regular fa-clock me-1"></i> Available Now
        </div>

        <!-- Overlay text -->
        <div class="image-overlay">
            <h3><i class="fa-regular fa-star me-2"></i>{{ $item->title }}</h3>
            <p><i class="fa-regular fa-location-dot me-2"></i>{{ $item->city ?? 'Location' }} · {{ $item->category->name ?? 'Category' }}</p>
        </div>

        <!-- Image Counter -->
        @if($item->images->count() > 1)
        <div class="thumbnail-counter">
            <i class="fa-regular fa-image me-1"></i> {{ $item->images->count() }} photos
        </div>
        @endif
    </div>

    <!-- Thumbnail Gallery -->
    @if($item->images->count() > 1)
    <div class="thumbnail-gallery">
        @foreach($item->images as $index => $image)
        <img 
            src="{{ asset('uploads/items/'.$image->image) }}"
            class="thumbnail {{ $loop->first ? 'active' : '' }}"
            onclick="changeImage(this.src)"
            alt="Thumbnail {{ $index + 1 }}"
            title="Image {{ $index + 1 }}">
        @endforeach
    </div>
    @endif

    <!-- Map Section -->
    <div class="map-container">
        <div class="map-label">
            <i class="fa-solid fa-map-location-dot"></i>
            <span id="mapLabel">📍 Owner Location</span>
        </div>
        
        <!-- Owner Location Map (Default) -->
        <iframe
            id="locationMap"
            width="100%"
            height="250"
            style="border:0; border-radius: 12px;"
            loading="lazy"
            allowfullscreen
            src="https://maps.google.com/maps?q={{ urlencode($item->address ?? $item->city ?? 'Karachi') }}&output=embed">
        </iframe>
    </div>

    <!-- Related Products Section -->
    <div class="related-section flex-grow-1">
        <h5 class="mb-3 text-danger fw-bold">
            <i class="fa-regular fa-compass me-2"></i>You May Also Like
        </h5>

        <div class="row g-3">

            @forelse($relatedItems as $related)
                <div class="col-lg-6 col-md-6">
                    <div class="card related-card">
                        @if($related->images->count())
                            <img src="{{ asset('uploads/items/'.$related->images->first()->image) }}"
                                 class="card-img-top"
                                 alt="{{ $related->title }}">
                        @else
                            <img src="https://via.placeholder.com/400x200/ffcccc/dc3545?text=No+Image"
                                 class="card-img-top"
                                 alt="No image">
                        @endif

                        <div class="card-body p-3">
                            <small class="text-danger fw-semibold">
                                {{ $related->category->name ?? 'Uncategorized' }}
                            </small>
                            <h6 class="mt-1 fw-bold text-truncate">{{ $related->title }}</h6>
                            <p class="text-muted small mb-2">{{ Str::limit($related->description, 40) }}</p>
                            <h6 class="text-danger mb-0">Rs {{ number_format($related->rent_price_per_day) }} <small class="text-muted fw-normal">/day</small></h6>
                        </div>

                        <div class="card-footer bg-white border-0 pb-3 pt-0">
                            <a href="/item/{{ $related->id }}" class="btn btn-outline-danger w-100 rounded-pill btn-sm">
                                <i class="fa-regular fa-eye me-1"></i> View Details
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-4 text-muted">
                        <i class="fa-regular fa-box-open fa-2x mb-2 d-block"></i>
                        No related products found.
                    </div>
                </div>
            @endforelse

        </div>
    </div>

</div>

<!-- RIGHT COLUMN: Booking Form -->
<div class="col-lg-6 p-4 p-xl-5" style="background: white;">

    <h2 class="fw-bold mb-2 text-danger">{{ $item->title }}</h2>
    <p class="text-muted mb-3">{{ Str::limit($item->description, 120) }}</p>

    <div class="info-box">
        <i class="fa-regular fa-tag me-2"></i>
        <strong>Category:</strong> {{ $item->category->name ?? 'N/A' }}
    </div>

    <div class="info-box">
        <i class="fa-regular fa-user me-2"></i>
        <strong>Owner:</strong> {{ $item->owner->name ?? 'N/A' }}
    </div>

    <div class="info-box">
        <i class="fa-regular fa-location-dot me-2"></i>
        <strong>Location:</strong> {{ $item->city ?? 'N/A' }}
    </div>

    <div class="price mb-4">
        Rs {{ number_format($item->rent_price_per_day) }}
        <small class="fs-6 text-muted">/ Day</small>
    </div>

    <form method="POST" action="/item/{{ $item->id }}/book" id="bookingForm">

        @csrf

        <div class="row g-3">
            <div class="col-md-6">
                <label class="fw-semibold small text-uppercase text-secondary">
                    <i class="fa-regular fa-calendar me-1"></i>Start Date
                </label>
                <input type="date"
                       name="start_date"
                       id="start_date"
                       class="form-control"
                       required>
                <div class="invalid-feedback">Please select a start date.</div>
            </div>

            <div class="col-md-6">
                <label class="fw-semibold small text-uppercase text-secondary">
                    <i class="fa-regular fa-calendar me-1"></i>End Date
                </label>
                <input type="date"
                       name="end_date"
                       id="end_date"
                       class="form-control"
                       required>
                <div class="invalid-feedback">Please select an end date.</div>
            </div>
        </div>

        <div class="mt-3">
            <label class="fw-semibold small text-uppercase text-secondary">
                <i class="fa-regular fa-phone me-1"></i>Contact Number
            </label>
            <input type="text"
                   name="contact_number"
                   id="contact_number"
                   class="form-control"
                   placeholder="+92 300 1234567"
                   required>
            <div class="invalid-feedback">Please enter a valid contact number.</div>
        </div>

        <div class="mt-3">
            <label class="fw-semibold small text-uppercase text-secondary">
                <i class="fa-regular fa-truck me-1"></i>Delivery Method
            </label>
            <select name="delivery_method"
                    id="delivery_method"
                    class="form-select">
                <option value="pickup">📦 Self Pickup</option>
                <option value="delivery">🚚 Home Delivery (+ Rs 500)</option>
            </select>
        </div>

        <div class="mt-3" id="addressBox" style="display:none;">
            <label class="fw-semibold small text-uppercase text-secondary">
                <i class="fa-regular fa-location-dot me-1"></i>Delivery Address
            </label>
            <textarea name="delivery_address"
                      id="delivery_address"
                      class="form-control"
                      rows="2"
                      placeholder="Street, city, landmark"
                      oninput="updateDeliveryMap(this.value)"></textarea>
            <div class="invalid-feedback">Delivery address is required.</div>
            <small class="text-muted" style="font-size: 11px;">
                <i class="fa-regular fa-info-circle me-1"></i>
                Map will update with your delivery location
            </small>
        </div>

        <div class="mt-3">
            <label class="fw-semibold small text-uppercase text-secondary">
                <i class="fa-regular fa-pen me-1"></i>Notes
            </label>
            <textarea name="notes"
                      rows="2"
                      class="form-control"
                      placeholder="Any special requests..."></textarea>
        </div>

        <!-- Summary Box -->
        <div class="summary-box mt-4">
            <h5 class="mb-3 text-danger">
                <i class="fa-solid fa-file-invoice-dollar me-2"></i>Booking Summary
            </h5>
            <div class="row">
                <div class="col-6">
                    <p class="mb-1"><span class="fw-semibold">Days:</span> <strong id="days">0</strong></p>
                    <p class="mb-1"><span class="fw-semibold">Subtotal:</span> <strong id="subtotal">Rs 0</strong></p>
                    <p class="mb-0"><span class="fw-semibold">Delivery:</span> <strong id="delivery_charge">Rs 0</strong></p>
                </div>
                <div class="col-6">
                    <p class="mb-1"><span class="fw-semibold">Deposit:</span> <strong>Rs {{ number_format($item->security_deposit ?? 0) }}</strong></p>
                    <p class="mb-1"><span class="fw-semibold">Replacement:</span> <strong>Rs {{ number_format($item->replacement_cost ?? 0) }}</strong></p>
                </div>
            </div>
            <hr>
            <h4 class="text-danger fw-bold mb-0">
                Total: <span id="total">Rs 0</span>
            </h4>
        </div>

        <!-- Fine Box -->
        <div class="fine-box mt-3">
            <i class="fa-solid fa-triangle-exclamation me-2"></i>
            <strong>Late Return Fine:</strong>
            Rs {{ number_format(($item->rent_price_per_day ?? 0) * 2) }} per day
        </div>

        <!-- Terms Box -->
        <div class="terms-box mt-3">
            <h5 class="text-danger">
                <i class="fa-regular fa-circle-check me-2"></i>Terms & Conditions
            </h5>
            <ul class="mb-2 ps-3" style="font-size: 13px;">
                <li>No cancellation is allowed after booking.</li>
                <li>No refund will be issued once booking is confirmed.</li>
                <li>Security deposit will be refunded after successful inspection.</li>
                <li>Late return fine is double the daily rental price.</li>
                <li>Lost item may result in full replacement cost charges.</li>
                <li>Any damage charges will be deducted from the security deposit.</li>
                <li>Delivery charges are Rs 500 if home delivery is selected.</li>
            </ul>

            <div class="form-check mt-2">
                <input type="checkbox"
                       required
                       class="form-check-input"
                       id="termsCheck">
                <label class="form-check-label fw-medium" for="termsCheck">
                    I agree to all Terms & Conditions
                </label>
                <div class="invalid-feedback" style="display: block; margin-top: 4px;">
                    You must agree to the terms.
                </div>
            </div>
        </div>

        <button type="submit" class="btn book-btn w-100 mt-4" id="submitBtn">
            <i class="fa-regular fa-calendar-check me-2"></i>
            Submit Booking Request
        </button>

    </form>

</div>

</div>

</div>

</div>

<script>

// Image Gallery Function
function changeImage(imageUrl) {
    document.getElementById('mainImage').src = imageUrl;
    
    // Update active thumbnail
    document.querySelectorAll('.thumbnail').forEach(thumb => {
        thumb.classList.remove('active');
        if (thumb.src === imageUrl) {
            thumb.classList.add('active');
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {

    // DOM Elements
    const startDate = document.getElementById('start_date');
    const endDate = document.getElementById('end_date');
    const deliveryMethod = document.getElementById('delivery_method');
    const addressBox = document.getElementById('addressBox');
    const deliveryAddress = document.getElementById('delivery_address');
    const termsCheck = document.getElementById('termsCheck');
    const form = document.getElementById('bookingForm');
    const contactNumber = document.getElementById('contact_number');
    const mapFrame = document.getElementById('locationMap');
    const mapLabel = document.getElementById('mapLabel');

    // Store owner location from Blade
    const ownerLocation = "{{ urlencode($item->address ?? $item->city ?? 'Karachi') }}";

    // Display elements
    const daysSpan = document.getElementById('days');
    const subtotalSpan = document.getElementById('subtotal');
    const deliveryChargeSpan = document.getElementById('delivery_charge');
    const totalSpan = document.getElementById('total');

    // Dynamic data from Blade
    const rentPerDay = {{ $item->rent_price_per_day ?? 0 }};
    const securityDeposit = {{ $item->security_deposit ?? 0 }};
    const deliveryFee = 500;

    // Update map based on delivery method
    function updateMap() {
        if (deliveryMethod.value === 'delivery' && deliveryAddress.value.trim() !== '') {
            // Show delivery location
            const address = encodeURIComponent(deliveryAddress.value.trim());
            mapFrame.src = `https://maps.google.com/maps?q=${address}&output=embed`;
            mapLabel.innerHTML = '<i class="fa-solid fa-location-dot"></i> 📍 Delivery Location';
        } else {
            // Show owner location
            mapFrame.src = `https://maps.google.com/maps?q=${ownerLocation}&output=embed`;
            mapLabel.innerHTML = '<i class="fa-solid fa-map-location-dot"></i> 📍 Owner Location';
        }
    }

    // Function to update delivery map (called from input)
    window.updateDeliveryMap = function(address) {
        if (deliveryMethod.value === 'delivery' && address.trim() !== '') {
            const encodedAddress = encodeURIComponent(address.trim());
            mapFrame.src = `https://maps.google.com/maps?q=${encodedAddress}&output=embed`;
            mapLabel.innerHTML = '<i class="fa-solid fa-location-dot"></i> 📍 Delivery Location';
        } else {
            // Revert to owner location if address is empty
            mapFrame.src = `https://maps.google.com/maps?q=${ownerLocation}&output=embed`;
            mapLabel.innerHTML = '<i class="fa-solid fa-map-location-dot"></i> 📍 Owner Location';
        }
    };

    // Toggle address field
    function toggleAddress() {
        if (deliveryMethod.value === 'delivery') {
            addressBox.style.display = 'block';
            deliveryAddress.setAttribute('required', 'required');
            // If address already has value, update map
            if (deliveryAddress.value.trim() !== '') {
                updateMap();
            } else {
                // Show owner location with delivery label
                mapFrame.src = `https://maps.google.com/maps?q=${ownerLocation}&output=embed`;
                mapLabel.innerHTML = '<i class="fa-solid fa-truck"></i> 📍 Enter delivery address to see location';
            }
        } else {
            addressBox.style.display = 'none';
            deliveryAddress.removeAttribute('required');
            deliveryAddress.classList.remove('is-invalid');
            // Show owner location
            mapFrame.src = `https://maps.google.com/maps?q=${ownerLocation}&output=embed`;
            mapLabel.innerHTML = '<i class="fa-solid fa-map-location-dot"></i> 📍 Owner Location';
        }
        calculateTotal();
    }

    // Calculate total
    function calculateTotal() {
        const startVal = startDate.value;
        const endVal = endDate.value;
        let days = 0;
        let subtotal = 0;
        let deliveryCharge = 0;
        let total = 0;

        if (startVal && endVal) {
            const d1 = new Date(startVal);
            const d2 = new Date(endVal);
            if (d2 > d1) {
                const diffTime = d2 - d1;
                days = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                subtotal = days * rentPerDay;
            }
        }

        if (deliveryMethod.value === 'delivery') {
            deliveryCharge = deliveryFee;
        }

        total = subtotal + securityDeposit + deliveryCharge;

        daysSpan.innerText = days;
        subtotalSpan.innerText = 'Rs ' + subtotal.toLocaleString();
        deliveryChargeSpan.innerText = 'Rs ' + deliveryCharge.toLocaleString();
        totalSpan.innerText = 'Rs ' + total.toLocaleString();
    }

    // Form validation - FIXED: Now submits the form if valid
    function validateForm(event) {
        // Check if form is valid using HTML5 validation
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
            
            // Add invalid class to all invalid fields
            form.querySelectorAll(':invalid').forEach(el => {
                el.classList.add('is-invalid');
            });
            
            // Focus on first invalid field
            const firstInvalid = form.querySelector('.is-invalid');
            if (firstInvalid) {
                firstInvalid.focus();
            }
            
            return;
        }
        
        // If validation passes, allow form submission
        // The form will submit normally to the action URL
        // No need to preventDefault or call alert
    }

    // Real-time validation removal
    function removeInvalidClass(e) {
        this.classList.remove('is-invalid');
    }

    // Event Listeners
    startDate.addEventListener('change', calculateTotal);
    endDate.addEventListener('change', calculateTotal);
    deliveryMethod.addEventListener('change', function() {
        toggleAddress();
        updateMap();
    });

    // Remove invalid class on input
    contactNumber.addEventListener('input', removeInvalidClass);
    deliveryAddress.addEventListener('input', function() {
        this.classList.remove('is-invalid');
        if (deliveryMethod.value === 'delivery') {
            updateMap();
        }
    });
    startDate.addEventListener('input', removeInvalidClass);
    endDate.addEventListener('input', removeInvalidClass);
    termsCheck.addEventListener('change', function() {
        if (this.checked) {
            this.classList.remove('is-invalid');
        }
    });

    // Form submit - validate then submit
    form.addEventListener('submit', validateForm);

    // Initialize
    toggleAddress();
    calculateTotal();

    // Set default dates for demo
    const today = new Date();
    const tomorrow = new Date(today);
    tomorrow.setDate(tomorrow.getDate() + 1);
    startDate.value = today.toISOString().split('T')[0];
    endDate.value = tomorrow.toISOString().split('T')[0];
    calculateTotal();

});

</script>

</body>
</html>