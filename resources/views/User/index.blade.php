@extends('User.layout')
@section('content')
 
<!-- ==========================================
    CATEGORY SHOP SECTION
========================================== -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="section-title">
                <h3 class="title">Browse Categories</h3>
            </div>

            @foreach($allcategories as $category)
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        @if($category->image)
                            <img src="{{ asset('uploads/categories/'.$category->image) }}" alt="{{ $category->name }}">
                        @else
                            <img src="{{ asset('img/shop01.png') }}" alt="">
                        @endif
                    </div>
                    <div class="shop-body">
                        <h3>{{ $category->name }}<br>Collection</h3>
                        <a href="/items?category={{ $category->id }}" class="cta-btn">
                            Shop now <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- ==========================================
    NEW PRODUCTS SECTION
========================================== -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">New Products</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            @foreach($allcategories as $category)
                                <li class="{{ $loop->first ? 'active' : '' }}">
                                    <a data-toggle="tab" href="#tab{{ $category->id }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="products-tabs">
                    @foreach($allcategories as $category)
                    <div id="tab{{ $category->id }}" class="tab-pane {{ $loop->first ? 'active' : '' }}">
                        <div class="products-slick" data-nav="#slick-nav-{{ $category->id }}">
                            @foreach($category->items->where('status','available') as $item)
                            <div class="product">
                                <div class="product-img">
                                    @if($item->images->count())
                                        <img src="{{ asset('uploads/items/'.$item->images->first()->image) }}" alt="">
                                    @else
                                        <img src="https://via.placeholder.com/300x300?text=No+Image" alt="">
                                    @endif

                                    <div class="rent-overlay">
                                        <a href="/item/{{ $item->id }}" class="rent-now-btn">
                                            <i class="fa fa-shopping-cart"></i> Rent Now
                                        </a>
                                    </div>
                                </div>

                                <div class="product-body">
                                    <p class="product-category">{{ $category->name }}</p>
                                    <h3 class="product-name"><a href="#">{{ $item->title }}</a></h3>
                                    <h4 class="product-price">Rs {{ number_format($item->rent_price_per_day) }}</h4>
                                    
                                    <div class="product-rating-wrapper">
                                        <div class="product-rating">
                                            @php $rating = round($item->reviews->avg('rating')); @endphp
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $rating)
                                                    <i class="fa fa-star star-filled"></i>
                                                @elseif($i - 0.5 <= $rating)
                                                    <i class="fa fa-star-half-o star-half"></i>
                                                @else
                                                    <i class="fa fa-star-o star-empty"></i>
                                                @endif
                                            @endfor
                                            <span class="rating-count">({{ $item->reviews->count() }})</span>
                                        </div>
                                        <div class="rating-summary">
                                            <span class="rating-average">{{ number_format($item->reviews->avg('rating'), 1) }}</span>
                                            <span class="rating-label">out of 5</span>
                                        </div>
                                    </div>

                                    <div class="product-btns">
                                        @php
                                            $isWishlisted = auth()->check() ? \App\Models\Wishlist::where('user_id', auth()->id())->where('item_id', $item->id)->exists() : false;
                                        @endphp
                                        <form method="POST" action="/wishlist/{{ $item->id }}" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="action-btn wishlist-btn">
                                                @if($isWishlisted)
                                                    <i class="fa fa-heart text-danger"></i>
                                                @else
                                                    <i class="fa fa-heart-o"></i>
                                                @endif
                                            </button>
                                        </form>
                                        <button class="action-btn compare-btn">
                                            <i class="fa fa-exchange"></i>
                                            <span class="tooltipp">Add To Compare</span>
                                        </button>
                                        <button class="action-btn quick-view-btn">
                                            <i class="fa fa-eye"></i>
                                            <span class="tooltipp">Quick View</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div id="slick-nav-{{ $category->id }}" class="products-slick-nav"></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ==========================================
    RENTAL FEATURES SECTION
========================================== -->
<section class="features-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-badge">Why Rent With Us</span>
            <h2 class="section-title mt-3">Smart <span>Rental Solutions</span></h2>
            <p class="section-subtitle">Experience hassle-free renting with trusted owners and secure transactions.</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-user-check"></i></div>
                    <h4>Verified Owners</h4>
                    <p>All owners are verified for your trust and safety.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-lock"></i></div>
                    <h4>Secure Payments</h4>
                    <p>Safe and transparent payment processing.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-calendar-check"></i></div>
                    <h4>Easy Booking</h4>
                    <p>Book your desired items in just a few clicks.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-headset"></i></div>
                    <h4>24/7 Support</h4>
                    <p>Our team is always here to assist you.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
    HOW IT WORKS
========================================== -->
<section class="how-it-works py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-badge">Easy Process</span>
            <h2 class="section-title mt-3">How <span>Renting Works</span></h2>
            <p class="section-subtitle">Four simple steps to start renting in minutes.</p>
        </div>

        <div class="row justify-content-center g-4">
            <div class="col-lg-3 col-md-6">
                <div class="step-card">
                    <div class="step-number">01</div>
                    <div class="step-icon"><i class="fas fa-search"></i></div>
                    <h4>Browse Items</h4>
                    <p>Explore thousands of rental items.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="step-card">
                    <div class="step-number">02</div>
                    <div class="step-icon"><i class="far fa-calendar-check"></i></div>
                    <h4>Select Dates</h4>
                    <p>Choose your rental period.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="step-card">
                    <div class="step-number">03</div>
                    <div class="step-icon"><i class="fas fa-credit-card"></i></div>
                    <h4>Confirm Booking</h4>
                    <p>Complete your booking securely.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="step-card">
                    <div class="step-number">04</div>
                    <div class="step-icon"><i class="fas fa-box-open"></i></div>
                    <h4>Enjoy Rental</h4>
                    <p>Get your item and start using it.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
    TESTIMONIALS
========================================== -->
<section class="testimonials py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-badge">Testimonials</span>
            <h2 class="section-title mt-3">What Our <span>Renters Say</span></h2>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-card">
                    <div class="quote-icon"><i class="fas fa-quote-left"></i></div>
                    <p class="testimonial-text">Renting was incredibly easy. The owner was professional and the booking process was smooth.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i>
                        <i class="fas fa-star"></i><i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="customer-info">
                        <img src="{{ asset('assets/images/users/user1.jpg') }}" alt="Customer">
                        <div>
                            <h5>Ali Raza</h5>
                            <span>Karachi</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-card">
                    <div class="quote-icon"><i class="fas fa-quote-left"></i></div>
                    <p class="testimonial-text">Found exactly what I needed at a reasonable price. The platform is user-friendly.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i>
                        <i class="fas fa-star"></i><i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="customer-info">
                        <img src="{{ asset('assets/images/users/user2.jpg') }}" alt="Customer">
                        <div>
                            <h5>Ahmed Khan</h5>
                            <span>Lahore</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-card">
                    <div class="quote-icon"><i class="fas fa-quote-left"></i></div>
                    <p class="testimonial-text">Secure payments and excellent support. Renting has never been this convenient.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i>
                        <i class="fas fa-star"></i><i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="customer-info">
                        <img src="{{ asset('assets/images/users/user3.jpg') }}" alt="Customer">
                        <div>
                            <h5>Sarah Malik</h5>
                            <span>Islamabad</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
    STATISTICS
========================================== -->
<section class="statistics-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-badge">Our Achievements</span>
            <h2 class="section-title mt-3">Trusted by <span>Thousands</span></h2>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-box-open"></i></div>
                    <h2 class="counter" data-target="5000">0</h2>
                    <h5>Rental Items</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-user-check"></i></div>
                    <h2 class="counter" data-target="1200">0</h2>
                    <h5>Verified Owners</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-calendar-check"></i></div>
                    <h2 class="counter" data-target="25000">0</h2>
                    <h5>Bookings Made</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-star"></i></div>
                    <h2><span class="counter" data-target="98">0</span>%</h2>
                    <h5>Satisfaction Rate</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
    NEWSLETTER
========================================== -->
<div id="newsletter" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter">
                    <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                    <form>
                        <input class="input" type="email" placeholder="Enter Your Email">
                        <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                    </form>
                    <ul class="newsletter-follow">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection