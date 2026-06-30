{{-- 
    resources/views/partials/terms-privacy.blade.php
    Enhanced with:
    - Sticky TOC (desktop) + reading progress bar
    - Live search filter for all cards
--}}

<style>
    /* ============================================================
       ROOT VARIABLES – Red & White Theme
       ============================================================ */
    :root {
        --rentify-red: #c62828;
        --rentify-red-light: #ef5350;
        --rentify-red-dark: #b71c1c;
        --rentify-red-gradient: linear-gradient(135deg, #c62828 0%, #b71c1c 100%);
        --rentify-white: #ffffff;
        --rentify-gray-light: #f8f9fa;
        --rentify-gray: #e9ecef;
        --rentify-text-dark: #1a1a1a;
        --rentify-text-muted: #6c757d;
        --rentify-shadow: 0 8px 30px rgba(198, 40, 40, 0.15);
        --rentify-shadow-hover: 0 16px 48px rgba(198, 40, 40, 0.25);
        --rentify-transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* ============================================================
       BASE RESET (scoped)
       ============================================================ */
    .rentify-content * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .rentify-content {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background: var(--rentify-gray-light);
        color: var(--rentify-text-dark);
        line-height: 1.7;
        padding: 2rem 0 3rem;
    }

    /* ============================================================
       UTILITY HELPERS
       ============================================================ */
    .rentify-content .bg-rentify-red { background: var(--rentify-red); }
    .rentify-content .bg-rentify-red-gradient { background: var(--rentify-red-gradient); }
    .rentify-content .text-rentify-red { color: var(--rentify-red); }
    .rentify-content .border-rentify-red { border-color: var(--rentify-red); }
    .rentify-content .hover\:bg-rentify-red:hover { background: var(--rentify-red); }
    .rentify-content .hover\:text-rentify-red:hover { color: var(--rentify-red); }

    /* ============================================================
       PROGRESS BAR (Tip #1)
       ============================================================ */
    .rentify-content .progress-bar {
        height: 4px;
        background: var(--rentify-red-gradient);
        width: 0%;
        transition: width 0.1s linear;
        border-radius: 4px;
        margin-top: -2px; /* sits just below TOC */
    }

    /* ============================================================
       STICKY TOC (desktop) – Tip #1
       ============================================================ */
    @media (min-width: 1024px) {
        .rentify-content .toc-wrapper {
            position: sticky;
            top: 2rem;
            z-index: 10;
            margin-bottom: 2rem;
        }
    }

    /* ============================================================
       TOC
       ============================================================ */
    .rentify-content .toc-wrapper {
        background: #fff;
        border-radius: 16px;
        box-shadow: var(--rentify-shadow);
        padding: 1.5rem 1.75rem;
        border: 1px solid rgba(198, 40, 40, 0.08);
        transition: var(--rentify-transition);
    }

    .rentify-content .toc-wrapper:hover {
        box-shadow: var(--rentify-shadow-hover);
    }

    .rentify-content .toc-title {
        font-weight: 700;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: var(--rentify-red);
        margin-bottom: 0.75rem;
    }
    .rentify-content .toc-title i { margin-right: 8px; }

    .rentify-content .toc-link {
        display: inline-block;
        font-size: 0.85rem;
        font-weight: 500;
        color: var(--rentify-text-muted);
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        transition: var(--rentify-transition);
        text-decoration: none;
        border: 1px solid transparent;
    }
    .rentify-content .toc-link:hover {
        color: var(--rentify-red);
        background: rgba(198, 40, 40, 0.06);
        border-color: rgba(198, 40, 40, 0.10);
        transform: translateY(-1px);
    }
    .rentify-content .toc-link i {
        margin-right: 6px;
        font-size: 0.7rem;
        opacity: 0.6;
    }

    /* ============================================================
       SEARCH INPUT (Tip #2)
       ============================================================ */
    .rentify-content .search-wrapper {
        position: relative;
        margin-bottom: 2rem;
    }
    .rentify-content .search-wrapper .search-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--rentify-text-muted);
        font-size: 1rem;
        pointer-events: none;
        transition: var(--rentify-transition);
    }
    .rentify-content .search-wrapper input {
        width: 100%;
        padding: 0.9rem 1rem 0.9rem 3rem;
        border-radius: 12px;
        border: 2px solid #e2e8f0;
        background: #fff;
        font-size: 1rem;
        transition: var(--rentify-transition);
        outline: none;
        color: var(--rentify-text-dark);
    }
    .rentify-content .search-wrapper input:focus {
        border-color: var(--rentify-red);
        box-shadow: 0 0 0 4px rgba(198, 40, 40, 0.10);
    }
    .rentify-content .search-wrapper input::placeholder {
        color: #a0aec0;
    }
    .rentify-content .search-wrapper .clear-search {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: var(--rentify-text-muted);
        cursor: pointer;
        font-size: 1rem;
        padding: 0.25rem;
        display: none;
        transition: var(--rentify-transition);
    }
    .rentify-content .search-wrapper .clear-search:hover {
        color: var(--rentify-red);
    }
    .rentify-content .search-wrapper .clear-search.visible {
        display: block;
    }

    /* No results message */
    .rentify-content .no-results {
        display: none;
        text-align: center;
        padding: 3rem 1rem;
        color: var(--rentify-text-muted);
        font-size: 1.1rem;
    }
    .rentify-content .no-results i {
        font-size: 2rem;
        color: var(--rentify-red);
        opacity: 0.5;
        display: block;
        margin-bottom: 0.5rem;
    }

    /* ============================================================
       CONTENT CARDS
       ============================================================ */
    .rentify-content .section-card {
        background: #fff;
        border-radius: 20px;
        padding: 2rem 2.25rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
        border: 1px solid rgba(198, 40, 40, 0.06);
        transition: var(--rentify-transition);
        position: relative;
        overflow: hidden;
    }

    .rentify-content .section-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--rentify-red-gradient);
        opacity: 0;
        transition: var(--rentify-transition);
    }

    .rentify-content .section-card:hover {
        box-shadow: var(--rentify-shadow);
        border-color: rgba(198, 40, 40, 0.12);
        transform: translateY(-4px);
    }

    .rentify-content .section-card:hover::before {
        opacity: 1;
    }

    .rentify-content .section-card .card-number {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        background: rgba(198, 40, 40, 0.08);
        color: var(--rentify-red);
        border-radius: 50%;
        font-weight: 700;
        font-size: 0.9rem;
        margin-right: 12px;
        flex-shrink: 0;
        transition: var(--rentify-transition);
    }

    .rentify-content .section-card:hover .card-number {
        background: var(--rentify-red);
        color: #fff;
        transform: scale(1.05);
    }

    .rentify-content .section-title {
        font-weight: 700;
        font-size: 1.25rem;
        color: var(--rentify-text-dark);
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.75rem;
    }

    .rentify-content .section-title i {
        color: var(--rentify-red);
        font-size: 1.1rem;
        opacity: 0.7;
        transition: var(--rentify-transition);
    }

    .rentify-content .section-card:hover .section-title i {
        opacity: 1;
        transform: scale(1.1);
    }

    .rentify-content .section-card p,
    .rentify-content .section-card li {
        color: var(--rentify-text-muted);
        font-size: 0.98rem;
    }

    .rentify-content .section-card ul {
        list-style: none;
        padding-left: 0;
    }

    .rentify-content .section-card ul li {
        padding: 0.4rem 0 0.4rem 1.8rem;
        position: relative;
    }

    .rentify-content .section-card ul li::before {
        content: '◆';
        position: absolute;
        left: 0;
        color: var(--rentify-red);
        font-size: 0.7rem;
        top: 0.6rem;
        opacity: 0.6;
        transition: var(--rentify-transition);
    }

    .rentify-content .section-card:hover ul li::before {
        opacity: 1;
        transform: translateX(2px);
    }

    /* ============================================================
       DIVIDER – Red Accent
       ============================================================ */
    .rentify-content .divider-red {
        width: 60px;
        height: 4px;
        background: var(--rentify-red-gradient);
        border-radius: 4px;
        margin: 0.5rem 0 1.25rem;
        transition: var(--rentify-transition);
    }

    .rentify-content .section-card:hover .divider-red {
        width: 80px;
    }

    /* ============================================================
       PRIVACY BADGE
       ============================================================ */
    .rentify-content .privacy-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(198, 40, 40, 0.06);
        color: var(--rentify-red);
        padding: 0.3rem 1.2rem 0.3rem 0.8rem;
        border-radius: 100px;
        font-size: 0.8rem;
        font-weight: 600;
        border: 1px solid rgba(198, 40, 40, 0.10);
        transition: var(--rentify-transition);
    }

    .rentify-content .privacy-badge:hover {
        background: rgba(198, 40, 40, 0.12);
        transform: translateY(-2px);
    }

    /* ============================================================
       DISCLAIMER BOX
       ============================================================ */
    .rentify-content .disclaimer-box {
        background: rgba(198, 40, 40, 0.04);
        border-left: 5px solid var(--rentify-red);
        border-radius: 12px;
        padding: 1.5rem 2rem;
        transition: var(--rentify-transition);
    }

    .rentify-content .disclaimer-box:hover {
        background: rgba(198, 40, 40, 0.07);
        box-shadow: var(--rentify-shadow);
    }

    .rentify-content .disclaimer-icon {
        color: var(--rentify-red);
        font-size: 1.4rem;
        margin-right: 1rem;
    }

    /* ============================================================
       CONTACT CARD
       ============================================================ */
    .rentify-content .contact-card {
        background: #fff;
        border-radius: 20px;
        padding: 2.5rem;
        text-align: center;
        border: 2px solid rgba(198, 40, 40, 0.06);
        transition: var(--rentify-transition);
    }

    .rentify-content .contact-card:hover {
        border-color: var(--rentify-red);
        box-shadow: var(--rentify-shadow-hover);
        transform: translateY(-6px);
    }

    .rentify-content .contact-card .contact-icon {
        width: 72px;
        height: 72px;
        background: rgba(198, 40, 40, 0.08);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 2rem;
        color: var(--rentify-red);
        transition: var(--rentify-transition);
    }

    .rentify-content .contact-card:hover .contact-icon {
        background: var(--rentify-red);
        color: #fff;
        transform: scale(1.05) rotate(-6deg);
    }

    /* ============================================================
       FADE-IN ANIMATIONS
       ============================================================ */
    .rentify-content .fade-up {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.8s cubic-bezier(0.4, 0, 0.2, 1),
                    transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .rentify-content .fade-up.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .rentify-content .fade-up-stagger > * {
        opacity: 0;
        transform: translateY(24px);
        transition: opacity 0.6s cubic-bezier(0.4, 0, 0.2, 1),
                    transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .rentify-content .fade-up-stagger.visible > *:nth-child(1) { transition-delay: 0.05s; }
    .rentify-content .fade-up-stagger.visible > *:nth-child(2) { transition-delay: 0.10s; }
    .rentify-content .fade-up-stagger.visible > *:nth-child(3) { transition-delay: 0.15s; }
    .rentify-content .fade-up-stagger.visible > *:nth-child(4) { transition-delay: 0.20s; }
    .rentify-content .fade-up-stagger.visible > *:nth-child(5) { transition-delay: 0.25s; }
    .rentify-content .fade-up-stagger.visible > *:nth-child(6) { transition-delay: 0.30s; }
    .rentify-content .fade-up-stagger.visible > *:nth-child(7) { transition-delay: 0.35s; }
    .rentify-content .fade-up-stagger.visible > *:nth-child(8) { transition-delay: 0.40s; }
    .rentify-content .fade-up-stagger.visible > *:nth-child(9) { transition-delay: 0.45s; }
    .rentify-content .fade-up-stagger.visible > *:nth-child(10) { transition-delay: 0.50s; }
    .rentify-content .fade-up-stagger.visible > *:nth-child(11) { transition-delay: 0.55s; }
    .rentify-content .fade-up-stagger.visible > *:nth-child(12) { transition-delay: 0.60s; }
    .rentify-content .fade-up-stagger.visible > *:nth-child(13) { transition-delay: 0.65s; }
    .rentify-content .fade-up-stagger.visible > *:nth-child(14) { transition-delay: 0.70s; }
    .rentify-content .fade-up-stagger.visible > *:nth-child(15) { transition-delay: 0.75s; }
    .rentify-content .fade-up-stagger.visible > *:nth-child(16) { transition-delay: 0.80s; }
    .rentify-content .fade-up-stagger.visible > *:nth-child(17) { transition-delay: 0.85s; }
    .rentify-content .fade-up-stagger.visible > *:nth-child(18) { transition-delay: 0.90s; }
    .rentify-content .fade-up-stagger.visible > *:nth-child(19) { transition-delay: 0.95s; }
    .rentify-content .fade-up-stagger.visible > *:nth-child(20) { transition-delay: 1.00s; }

    .rentify-content .fade-up-stagger.visible > * {
        opacity: 1;
        transform: translateY(0);
    }

    /* ============================================================
       RESPONSIVE TWEAKS
       ============================================================ */
    @media (max-width: 768px) {
        .rentify-content .section-card {
            padding: 1.5rem;
        }
        .rentify-content .toc-wrapper {
            padding: 1rem 1.25rem;
        }
        .rentify-content .toc-link {
            font-size: 0.75rem;
            padding: 0.15rem 0.6rem;
        }
    }

    @media (max-width: 480px) {
        .rentify-content .section-title {
            font-size: 1.05rem;
        }
        .rentify-content .section-card {
            padding: 1.25rem;
        }
        .rentify-content .disclaimer-box {
            padding: 1rem 1.25rem;
        }
    }
</style>

<div class="rentify-content" id="rentify-content">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- ============================================================
        TOC + PROGRESS BAR (Tip #1)
        ============================================================ -->
        <div class="toc-wrapper fade-up visible" id="tocWrapper">
            <div class="toc-title">
                <i class="fas fa-list-ul"></i> On this page
            </div>
            <div class="flex flex-wrap gap-1.5">
                <a href="#terms" class="toc-link"><i class="fas fa-file-contract"></i> Terms</a>
                <a href="#privacy" class="toc-link"><i class="fas fa-shield-alt"></i> Privacy</a>
                <a href="#disclaimer" class="toc-link"><i class="fas fa-exclamation-triangle"></i> Disclaimer</a>
                <a href="#contact" class="toc-link"><i class="fas fa-headset"></i> Contact</a>
            </div>
            <!-- Progress Bar (Tip #1) -->
            <div class="progress-bar" id="readingProgress" style="margin-top: 1rem;"></div>
        </div>

        <!-- ============================================================
        SEARCH INPUT (Tip #2)
        ============================================================ -->
        <div class="search-wrapper" id="searchWrapper">
            <i class="fas fa-search search-icon"></i>
            <input type="text" id="searchInput" placeholder="🔍 Search terms, e.g. 'security deposit' or 'damage'..." aria-label="Search policies">
            <button class="clear-search" id="clearSearch" aria-label="Clear search">
                <i class="fas fa-times-circle"></i>
            </button>
        </div>
        <div class="no-results" id="noResults">
            <i class="fas fa-search"></i>
            No matching policies found. Try a different keyword.
        </div>

        <!-- ============================================================
        TERMS & CONDITIONS
        ============================================================ -->
        <section id="terms" class="mt-10 scroll-mt-24">
            <div class="flex items-center gap-3 mb-6">
                <h2 class="text-3xl font-extrabold text-rentify-red">
                    <i class="fas fa-file-contract mr-2"></i> Terms &amp; Conditions
                </h2>
                <span class="privacy-badge"><i class="fas fa-check-circle"></i> Effective 2026</span>
            </div>
            <p class="text-rentify-text-muted mb-8 max-w-3xl">
                By using Rentify, you agree to the following terms. Please read them carefully.
            </p>

            <!-- Cards Grid -->
            <div class="grid gap-6 fade-up-stagger" id="termsGrid">

                <!-- 1. Platform Purpose -->
                <div class="section-card" data-search="platform purpose marketplace">
                    <div class="section-title">
                        <span class="card-number">1</span> Platform Purpose
                    </div>
                    <div class="divider-red"></div>
                    <p>
                        Rentify is an online marketplace connecting item owners with renters.
                        We provide the platform to facilitate transactions but do not own any listed items
                        unless explicitly stated.
                    </p>
                </div>

                <!-- 2. User Registration & Identity Verification -->
                <div class="section-card" data-search="registration identity verification cnic">
                    <div class="section-title">
                        <span class="card-number">2</span> Registration &amp; Identity
                    </div>
                    <div class="divider-red"></div>
                    <p>To keep our community safe, every user must:</p>
                    <ul>
                        <li>Provide accurate, complete personal information</li>
                        <li>Submit a valid CNIC for identity verification</li>
                        <li>Provide a valid email address and phone number</li>
                        <li>Keep account credentials secure</li>
                        <li>Update information promptly when changes occur</li>
                    </ul>
                    <p class="mt-3 text-sm text-red-600/80">
                        <i class="fas fa-exclamation-circle mr-1"></i>
                        False information or fake identification may result in permanent account suspension.
                    </p>
                </div>

                <!-- 3. Listing Items -->
                <div class="section-card" data-search="listing items owner legal condition">
                    <div class="section-title">
                        <span class="card-number">3</span> Listing Items
                    </div>
                    <div class="divider-red"></div>
                    <p>When listing an item, owners must ensure:</p>
                    <ul>
                        <li>They are the legal owner of the item</li>
                        <li>The item is in good working condition</li>
                        <li>All descriptions, specifications, and images are accurate</li>
                        <li>Rental prices, replacement costs, and deposits are clearly stated</li>
                        <li>The item is legal to rent under applicable laws</li>
                    </ul>
                    <p class="mt-3 text-sm text-rentify-text-muted">
                        <i class="fas fa-flag text-rentify-red mr-1"></i>
                        Rentify reserves the right to remove any listing that violates these policies.
                    </p>
                </div>

                <!-- 4. Rental Requests -->
                <div class="section-card" data-search="rental requests pay return responsible">
                    <div class="section-title">
                        <span class="card-number">4</span> Rental Requests
                    </div>
                    <div class="divider-red"></div>
                    <p>Renters agree to:</p>
                    <ul>
                        <li>Pay all applicable rental charges</li>
                        <li>Return the item within the agreed rental period</li>
                        <li>Use the item responsibly</li>
                        <li>Follow any special instructions provided by the owner</li>
                    </ul>
                    <p class="mt-3 text-sm text-rentify-text-muted">
                        <i class="fas fa-hand text-rentify-red mr-1"></i>
                        Owners reserve the right to accept or reject rental requests.
                    </p>
                </div>

                <!-- 5. Security Deposit -->
                <div class="section-card" data-search="security deposit damage accessories late cleaning replacement">
                    <div class="section-title">
                        <span class="card-number">5</span> Security Deposit Policy
                    </div>
                    <div class="divider-red"></div>
                    <p>Owners are strongly encouraged to collect a reasonable security deposit.</p>
                    <p>The deposit may be used to cover:</p>
                    <ul>
                        <li>Damage to the item</li>
                        <li>Missing accessories</li>
                        <li>Late returns</li>
                        <li>Cleaning charges (if applicable)</li>
                        <li>Replacement costs in severe cases</li>
                    </ul>
                    <p class="mt-3 text-sm text-rentify-text-muted">
                        <i class="fas fa-rotate-left text-rentify-red mr-1"></i>
                        The remaining deposit should be refunded once the item is returned in satisfactory condition.
                    </p>
                </div>

                <!-- 6. CNIC Verification -->
                <div class="section-card" data-search="cnic verification government id security deposit">
                    <div class="section-title">
                        <span class="card-number">6</span> CNIC Verification
                    </div>
                    <div class="divider-red"></div>
                    <p>For the safety of both parties, Rentify <strong>strongly recommends</strong> that owners:</p>
                    <ul>
                        <li>Collect the renter's original CNIC (or valid government-issued ID)</li>
                        <li>Collect a security deposit before handing over any item</li>
                        <li>Verify the renter's identity before completing the transaction</li>
                    </ul>
                    <div class="mt-3 bg-red-50/50 p-3 rounded-xl border border-red-100/50 text-sm text-rentify-text-muted">
                        <i class="fas fa-shield text-rentify-red mr-1"></i>
                        This recommendation is for your protection — always verify before you hand over your item.
                    </div>
                </div>

                <!-- 7. Pickup & Return -->
                <div class="section-card" data-search="pickup return collection condition">
                    <div class="section-title">
                        <span class="card-number">7</span> Pickup &amp; Return
                    </div>
                    <div class="divider-red"></div>
                    <ul>
                        <li>Renters are responsible for collecting and returning rented items</li>
                        <li>Items must be returned on or before the agreed return date</li>
                        <li>Items should be returned in the same condition as received</li>
                    </ul>
                </div>

                <!-- 8. Inspection -->
                <div class="section-card" data-search="inspection inspect photos videos">
                    <div class="section-title">
                        <span class="card-number">8</span> Item Inspection
                    </div>
                    <div class="divider-red"></div>
                    <ul>
                        <li>Owners should inspect the item before the rental begins</li>
                        <li>Renters should carefully inspect the item before accepting it</li>
                        <li>Both parties are encouraged to take clear photos or videos before and after each rental</li>
                    </ul>
                </div>

                <!-- 9. Late Return -->
                <div class="section-card" data-search="late return fee charges suspension">
                    <div class="section-title">
                        <span class="card-number">9</span> Late Return Policy
                    </div>
                    <div class="divider-red"></div>
                    <ul>
                        <li>Failure to return an item on time may result in additional rental charges</li>
                        <li>Owners may charge reasonable late fees according to agreed terms</li>
                        <li>Continued failure to return may lead to account suspension and legal action</li>
                    </ul>
                </div>

                <!-- 10. Damage, Loss & Theft -->
                <div class="section-card" data-search="damage loss theft repair replacement value">
                    <div class="section-title">
                        <span class="card-number">10</span> Damage, Loss &amp; Theft
                    </div>
                    <div class="divider-red"></div>
                    <p>Renters are fully responsible for any rented item during the rental period.</p>
                    <p>If an item is <strong>damaged, lost, stolen, destroyed, or not returned</strong>, the renter may be required to pay repair costs or the full replacement value.</p>
                </div>

                <!-- 11. Cancellation -->
                <div class="section-card" data-search="cancellation refund approval">
                    <div class="section-title">
                        <span class="card-number">11</span> Cancellation Policy
                    </div>
                    <div class="divider-red"></div>
                    <ul>
                        <li>Renters may cancel before owner approval</li>
                        <li>Owners may decline rental requests without providing a reason</li>
                        <li>Once both parties agree, cancellations should only occur for valid reasons</li>
                        <li>Refund policies depend on the agreement between owner and renter</li>
                    </ul>
                </div>

                <!-- 12. Prohibited Items -->
                <div class="section-card" data-search="prohibited illegal stolen counterfeit weapons explosives hazardous controlled substances">
                    <div class="section-title">
                        <span class="card-number">12</span> Prohibited Items
                    </div>
                    <div class="divider-red"></div>
                    <p>The following are strictly prohibited on Rentify:</p>
                    <ul>
                        <li>Illegal products</li>
                        <li>Stolen property</li>
                        <li>Counterfeit goods</li>
                        <li>Weapons, explosives, hazardous chemicals</li>
                        <li>Controlled substances</li>
                        <li>Any item prohibited under local laws</li>
                    </ul>
                    <p class="mt-3 text-sm text-red-600/80">
                        <i class="fas fa-ban mr-1"></i>
                        Listings violating these rules will be removed immediately.
                    </p>
                </div>

                <!-- 13. Fraud Prevention -->
                <div class="section-card" data-search="fraud fake identities cnic manipulation scam misrepresentation suspension law enforcement">
                    <div class="section-title">
                        <span class="card-number">13</span> Fraud Prevention
                    </div>
                    <div class="divider-red"></div>
                    <p>Any attempt to:</p>
                    <ul>
                        <li>Use fake identities or CNIC information</li>
                        <li>Manipulate payments or scam users</li>
                        <li>Misrepresent listed items</li>
                    </ul>
                    <p>may result in immediate account suspension or permanent banning.</p>
                    <p class="mt-3 text-sm text-rentify-text-muted">
                        <i class="fas fa-gavel text-rentify-red mr-1"></i>
                        Rentify reserves the right to cooperate with law enforcement authorities whenever required.
                    </p>
                </div>

                <!-- 14. Reviews -->
                <div class="section-card" data-search="reviews ratings honest respectful truthful fake abusive">
                    <div class="section-title">
                        <span class="card-number">14</span> User Reviews &amp; Ratings
                    </div>
                    <div class="divider-red"></div>
                    <p>Users may leave honest reviews after completed rentals.</p>
                    <p>Reviews must be:</p>
                    <ul>
                        <li>Respectful</li>
                        <li>Truthful</li>
                        <li>Reflective of actual experiences</li>
                    </ul>
                    <p class="mt-3 text-sm text-rentify-text-muted">
                        <i class="fas fa-flag text-rentify-red mr-1"></i>
                        Fake or abusive reviews may be removed.
                    </p>
                </div>

                <!-- 15. Dispute Resolution -->
                <div class="section-card" data-search="dispute evidence photos videos screenshots receipts chat">
                    <div class="section-title">
                        <span class="card-number">15</span> Dispute Resolution
                    </div>
                    <div class="divider-red"></div>
                    <p>In the event of a dispute, users should provide supporting evidence including:</p>
                    <ul>
                        <li>Photos &amp; videos</li>
                        <li>Screenshots</li>
                        <li>Payment receipts</li>
                        <li>Chat history</li>
                    </ul>
                    <p class="mt-3 text-sm text-rentify-text-muted">
                        <i class="fas fa-scale-balanced text-rentify-red mr-1"></i>
                        Rentify may assist in reviewing disputes but cannot guarantee a specific outcome.
                    </p>
                </div>

                <!-- 16. Account Suspension -->
                <div class="section-card" data-search="account suspension termination fraud harassment policy violations illegal abuse">
                    <div class="section-title">
                        <span class="card-number">16</span> Account Suspension
                    </div>
                    <div class="divider-red"></div>
                    <p>Rentify may suspend or permanently terminate accounts involved in:</p>
                    <ul>
                        <li>Fraud</li>
                        <li>Harassment</li>
                        <li>Repeated policy violations</li>
                        <li>Illegal activities</li>
                        <li>Abuse of the platform</li>
                    </ul>
                </div>

                <!-- 17. Limitation of Liability -->
                <div class="section-card" data-search="limitation liability marketplace not responsible loss damage theft fraud injuries disputes outside platform">
                    <div class="section-title">
                        <span class="card-number">17</span> Limitation of Liability
                    </div>
                    <div class="divider-red"></div>
                    <p>Rentify acts solely as a marketplace connecting renters and item owners.</p>
                    <p>Rentify is <strong>not responsible</strong> for:</p>
                    <ul>
                        <li>Loss, damage, or theft of items</li>
                        <li>Fraud between users</li>
                        <li>Injuries caused by rented items</li>
                        <li>Payment disputes</li>
                        <li>Any agreement made outside the platform</li>
                    </ul>
                    <p class="mt-3 text-sm font-semibold text-rentify-red">
                        <i class="fas fa-triangle-exclamation mr-1"></i>
                        All rental transactions are carried out at the users' own risk.
                    </p>
                </div>

                <!-- 18. Changes to Terms -->
                <div class="section-card" data-search="changes terms modify update acceptance">
                    <div class="section-title">
                        <span class="card-number">18</span> Changes to Terms
                    </div>
                    <div class="divider-red"></div>
                    <p>Rentify may modify these Terms &amp; Conditions at any time without prior notice.</p>
                    <p class="mt-2 text-rentify-text-muted">
                        <i class="fas fa-rotate text-rentify-red mr-1"></i>
                        Continued use of the platform indicates acceptance of the updated terms.
                    </p>
                </div>

            </div>
        </section>

        <!-- ============================================================
        PRIVACY POLICY
        ============================================================ -->
        <section id="privacy" class="mt-16 scroll-mt-24">
            <div class="flex items-center gap-3 mb-6">
                <h2 class="text-3xl font-extrabold text-rentify-red">
                    <i class="fas fa-shield-alt mr-2"></i> Privacy Policy
                </h2>
                <span class="privacy-badge"><i class="fas fa-lock"></i> Your data is safe</span>
            </div>
            <p class="text-rentify-text-muted mb-8 max-w-3xl">
                Your privacy matters to us. This policy explains how we collect, use, and protect your personal information.
            </p>

            <div class="grid gap-6 fade-up-stagger" id="privacyGrid">

                <!-- 1. Information We Collect -->
                <div class="section-card" data-search="collect name email phone cnic city address photo rental history payment reviews">
                    <div class="section-title">
                        <span class="card-number">1</span> Information We Collect
                    </div>
                    <div class="divider-red"></div>
                    <p>We may collect:</p>
                    <ul>
                        <li>Full Name</li>
                        <li>Email Address</li>
                        <li>Phone Number</li>
                        <li>CNIC Number</li>
                        <li>City &amp; Address</li>
                        <li>Profile Photo</li>
                        <li>Rental History</li>
                        <li>Payment Records</li>
                        <li>Reviews and Ratings</li>
                    </ul>
                </div>

                <!-- 2. How We Use Your Information -->
                <div class="section-card" data-search="use account verification fraud transactions support notifications">
                    <div class="section-title">
                        <span class="card-number">2</span> How We Use Your Information
                    </div>
                    <div class="divider-red"></div>
                    <p>Your information is used to:</p>
                    <ul>
                        <li>Create and manage your account</li>
                        <li>Verify your identity</li>
                        <li>Prevent fraud</li>
                        <li>Process rental transactions</li>
                        <li>Improve our services</li>
                        <li>Provide customer support</li>
                        <li>Send important notifications</li>
                    </ul>
                </div>

                <!-- 3. CNIC Protection -->
                <div class="section-card" data-search="cnic protection verification fraud prevention security">
                    <div class="section-title">
                        <span class="card-number">3</span> CNIC Protection
                    </div>
                    <div class="divider-red"></div>
                    <p>CNIC information is collected solely for identity verification and fraud prevention.</p>
                    <p>We take reasonable security measures to protect this sensitive information from unauthorized access.</p>
                </div>

                <!-- 4. Information Sharing -->
                <div class="section-card" data-search="sharing sell law enforcement fraud payment providers security">
                    <div class="section-title">
                        <span class="card-number">4</span> Information Sharing
                    </div>
                    <div class="divider-red"></div>
                    <p>Rentify does <strong>not</strong> sell your personal information.</p>
                    <p>Information may only be shared:</p>
                    <ul>
                        <li>When required by law</li>
                        <li>During fraud investigations</li>
                        <li>With payment service providers</li>
                        <li>To protect platform security</li>
                    </ul>
                </div>

                <!-- 5. Cookies -->
                <div class="section-card" data-search="cookies login sessions performance personalize traffic">
                    <div class="section-title">
                        <span class="card-number">5</span> Cookies
                    </div>
                    <div class="divider-red"></div>
                    <p>Rentify may use cookies to:</p>
                    <ul>
                        <li>Remember login sessions</li>
                        <li>Improve website performance</li>
                        <li>Personalize user experience</li>
                        <li>Analyze website traffic</li>
                    </ul>
                </div>

                <!-- 6. Data Security -->
                <div class="section-card" data-search="security practices safeguard risk">
                    <div class="section-title">
                        <span class="card-number">6</span> Data Security
                    </div>
                    <div class="divider-red"></div>
                    <p>We use reasonable security practices to safeguard your personal information.</p>
                    <p class="text-sm text-rentify-text-muted">
                        <i class="fas fa-triangle-exclamation text-rentify-red mr-1"></i>
                        However, no online system is completely secure, and users acknowledge this risk.
                    </p>
                </div>

                <!-- 7. Data Retention -->
                <div class="section-card" data-search="retention legal disputes fraud services">
                    <div class="section-title">
                        <span class="card-number">7</span> Data Retention
                    </div>
                    <div class="divider-red"></div>
                    <p>User information may be retained for as long as necessary to:</p>
                    <ul>
                        <li>Comply with legal requirements</li>
                        <li>Resolve disputes</li>
                        <li>Prevent fraud</li>
                        <li>Improve services</li>
                    </ul>
                </div>

                <!-- 8. Account Deletion -->
                <div class="section-card" data-search="deletion request retain law fraud">
                    <div class="section-title">
                        <span class="card-number">8</span> Account Deletion
                    </div>
                    <div class="divider-red"></div>
                    <p>Users may request deletion of their accounts.</p>
                    <p class="text-sm text-rentify-text-muted">
                        <i class="fas fa-info-circle text-rentify-red mr-1"></i>
                        Certain information may still be retained where required by law or for fraud prevention purposes.
                    </p>
                </div>

                <!-- 9. Third-Party Services -->
                <div class="section-card" data-search="third-party payment email sms analytics cloud storage">
                    <div class="section-title">
                        <span class="card-number">9</span> Third-Party Services
                    </div>
                    <div class="divider-red"></div>
                    <p>Rentify may use trusted third-party providers for:</p>
                    <ul>
                        <li>Payment processing</li>
                        <li>Email notifications</li>
                        <li>SMS verification</li>
                        <li>Analytics</li>
                        <li>Cloud storage</li>
                    </ul>
                    <p class="mt-3 text-sm text-rentify-text-muted">
                        <i class="fas fa-shield text-rentify-red mr-1"></i>
                        These providers are required to protect user information.
                    </p>
                </div>

                <!-- 10. User Rights -->
                <div class="section-card" data-search="rights access update corrections deletion support">
                    <div class="section-title">
                        <span class="card-number">10</span> User Rights
                    </div>
                    <div class="divider-red"></div>
                    <p>Users have the right to:</p>
                    <ul>
                        <li>Access their personal information</li>
                        <li>Update incorrect information</li>
                        <li>Request corrections</li>
                        <li>Request account deletion</li>
                        <li>Contact support regarding privacy concerns</li>
                    </ul>
                </div>

                <!-- 11. Policy Updates -->
                <div class="section-card" data-search="updates changes review periodically">
                    <div class="section-title">
                        <span class="card-number">11</span> Policy Updates
                    </div>
                    <div class="divider-red"></div>
                    <p>Rentify may update this Privacy Policy from time to time.</p>
                    <p class="text-rentify-text-muted">
                        <i class="fas fa-eye text-rentify-red mr-1"></i>
                        Users are encouraged to review this page periodically for any changes.
                    </p>
                </div>

            </div>
        </section>

        <!-- ============================================================
        IMPORTANT DISCLAIMER
        ============================================================ -->
        <section id="disclaimer" class="mt-16 scroll-mt-24">
            <div class="disclaimer-box">
                <div class="flex items-start gap-4 flex-wrap">
                    <div class="disclaimer-icon">
                        <i class="fas fa-triangle-exclamation"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-rentify-red-dark mb-1">
                            Important Disclaimer
                        </h3>
                        <p class="text-rentify-text-muted text-sm">
                            Rentify is only an online marketplace that connects renters and item owners.
                            Rentify does <strong>not</strong> own, inspect, store, transport, or guarantee
                            the quality, safety, legality, or availability of any listed item.
                        </p>
                        <p class="text-rentify-text-muted text-sm mt-2">
                            Rentify is <strong>not responsible</strong> for loss, theft, damage, disputes,
                            misuse, injuries, or transactions conducted outside the Rentify platform.
                        </p>
                        <p class="text-rentify-text-muted text-sm mt-2 font-semibold text-rentify-red">
                            <i class="fas fa-shield mr-1"></i>
                            For maximum security, we strongly recommend that item owners collect a reasonable
                            security deposit and verify the renter's original CNIC before handing over any item.
                            Users are responsible for taking appropriate precautions during every rental transaction.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================================
        CONTACT
        ============================================================ -->
        <section id="contact" class="mt-16 scroll-mt-24">
            <h2 class="text-3xl font-extrabold text-rentify-red mb-6 text-center">
                <i class="fas fa-headset mr-2"></i> Get in Touch
            </h2>
            <p class="text-center text-rentify-text-muted max-w-2xl mx-auto mb-10">
                Have questions about our Terms, Privacy Policy, or anything else?
                Our support team is here to help.
            </p>

            <div class="grid md:grid-cols-3 gap-6 fade-up-stagger">
                <!-- Card 1 -->
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h4 class="font-bold text-lg">Email Support</h4>
                    <p class="text-rentify-text-muted text-sm mt-1">
                        support@rentify.com
                    </p>
                    <p class="text-rentify-text-muted text-xs mt-1">
                        We reply within 24 hours
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-comment-dots"></i>
                    </div>
                    <h4 class="font-bold text-lg">Live Chat</h4>
                    <p class="text-rentify-text-muted text-sm mt-1">
                        Chat with our team
                    </p>
                    <p class="text-rentify-text-muted text-xs mt-1">
                        Mon–Fri, 9am – 6pm
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-question-circle"></i>
                    </div>
                    <h4 class="font-bold text-lg">Help Center</h4>
                    <p class="text-rentify-text-muted text-sm mt-1">
                        Visit our FAQ page
                    </p>
                    <p class="text-rentify-text-muted text-xs mt-1">
                        Quick answers to common questions
                    </p>
                </div>
            </div>
        </section>

    </div> <!-- end container -->
</div> <!-- end rentify-content -->

<!-- Font Awesome & additional scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        // ============================================================
        // 1. READING PROGRESS BAR (Tip #1)
        // ============================================================
        const progressBar = document.getElementById('readingProgress');
        window.addEventListener('scroll', function() {
            const scrollTop = window.scrollY;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            const progress = (scrollTop / docHeight) * 100;
            progressBar.style.width = progress + '%';
        });

        // ============================================================
        // 2. LIVE SEARCH FILTER (Tip #2)
        // ============================================================
        const searchInput = document.getElementById('searchInput');
        const clearBtn = document.getElementById('clearSearch');
        const noResults = document.getElementById('noResults');
        const allCards = document.querySelectorAll('.rentify-content .section-card');
        const termsGrid = document.getElementById('termsGrid');
        const privacyGrid = document.getElementById('privacyGrid');

        function filterCards(query) {
            const trimmed = query.trim().toLowerCase();
            let anyVisible = false;

            allCards.forEach(card => {
                // Use the card's own text content plus the data-search attribute for better matching
                const searchData = card.getAttribute('data-search') || '';
                const textContent = card.textContent.toLowerCase();
                const combined = textContent + ' ' + searchData.toLowerCase();
                const match = combined.includes(trimmed);
                card.style.display = match ? '' : 'none';
                if (match) anyVisible = true;
            });

            // Show/hide no results message
            noResults.style.display = anyVisible ? 'none' : 'block';

            // Show/hide clear button
            if (trimmed.length > 0) {
                clearBtn.classList.add('visible');
            } else {
                clearBtn.classList.remove('visible');
            }
        }

        searchInput.addEventListener('input', function() {
            filterCards(this.value);
        });

        clearBtn.addEventListener('click', function() {
            searchInput.value = '';
            filterCards('');
            searchInput.focus();
        });

        // ============================================================
        // 3. FADE-UP ANIMATIONS (existing)
        // ============================================================
        const fadeElements = document.querySelectorAll('.rentify-content .fade-up, .rentify-content .fade-up-stagger');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    if (entry.target.classList.contains('fade-up-stagger')) {
                        entry.target.classList.add('visible');
                    }
                }
            });
        }, {
            threshold: 0.10,
            rootMargin: '0px 0px -40px 0px'
        });

        fadeElements.forEach(el => observer.observe(el));

        // ============================================================
        // 4. ACTIVE TOC LINK ON SCROLL
        // ============================================================
        const sections = document.querySelectorAll('.rentify-content section[id]');
        const tocLinks = document.querySelectorAll('.rentify-content .toc-link');

        function highlightToc() {
            let current = '';
            sections.forEach(section => {
                const top = section.offsetTop - 120;
                if (window.scrollY >= top) {
                    current = section.getAttribute('id');
                }
            });

            tocLinks.forEach(link => {
                link.style.color = '';
                link.style.background = '';
                if (link.getAttribute('href') === '#' + current) {
                    link.style.color = '#c62828';
                    link.style.background = 'rgba(198,40,40,0.06)';
                }
            });
        }

        window.addEventListener('scroll', highlightToc);
        highlightToc(); // initial

    });
</script>