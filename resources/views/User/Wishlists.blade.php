
{{-- Custom Styles for Wishlist Page --}}
<style>
/* ===== RESET NAVBAR CONFLICTS ===== */
.wishlist-page-wrapper * {
    box-sizing: border-box;
}

.wishlist-page-wrapper ul,
.wishlist-page-wrapper li {
    list-style: none !important;
    padding: 0 !important;
    margin: 0 !important;
}

/* ===== WISHLIST SPECIFIC STYLES ===== */
.wishlist-page-wrapper {
    position: relative;
    min-height: 100vh;
    background: #f8f9fa;
    overflow: hidden;
    padding-top: 20px;
}

/* ===== BACKGROUND EFFECTS ===== */
.wishlist-bg-effects {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 0;
}

.wishlist-floating-hearts span {
    position: absolute;
    display: block;
    width: 20px;
    height: 20px;
    background: rgba(220, 53, 69, 0.1);
    border-radius: 50%;
    animation: wishlistFloatHeart 15s infinite linear;
}

.wishlist-floating-hearts span::before {
    content: '♥';
    position: absolute;
    font-size: 20px;
    color: rgba(220, 53, 69, 0.15);
}

@keyframes wishlistFloatHeart {
    0% { transform: translateY(100vh) scale(0); opacity: 0; }
    10% { opacity: 1; }
    90% { opacity: 1; }
    100% { transform: translateY(-10vh) scale(1); opacity: 0; }
}

/* ===== HERO SECTION ===== */
.wishlist-hero-section {
    position: relative;
    z-index: 1;
    padding: 80px 0 50px;
    background: linear-gradient(135deg, #dc3545 0%, #ff6b81 50%, #c0392b 100%);
    border-radius: 0 0 50px 50px;
    box-shadow: 0 20px 60px rgba(220, 53, 69, 0.3);
    overflow: hidden;
}

.wishlist-hero-section::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -20%;
    width: 70%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
    transform: rotate(15deg);
    pointer-events: none;
}

.wishlist-hero-content {
    position: relative;
    z-index: 2;
    text-align: center;
    color: white;
}

.wishlist-hero-badge {
    display: inline-block;
    padding: 10px 28px;
    background: rgba(255,255,255,0.2);
    backdrop-filter: blur(10px);
    border-radius: 50px;
    font-size: 1rem;
    font-weight: 600;
    letter-spacing: 0.5px;
    margin-bottom: 25px;
    border: 1px solid rgba(255,255,255,0.3);
}

.wishlist-hero-title {
    font-size: 4.5rem;
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 20px;
}

.wishlist-text-gradient {
    background: linear-gradient(135deg, #ffffff 0%, #ffe6e9 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.wishlist-hero-subtitle {
    display: block;
    font-size: 1.4rem;
    font-weight: 300;
    opacity: 0.9;
    -webkit-text-fill-color: rgba(255,255,255,0.9);
    margin-top: 5px;
}

.wishlist-hero-stats {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 50px;
    margin-top: 35px;
    padding: 25px 50px;
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    border: 1px solid rgba(255,255,255,0.2);
}

.wishlist-stat-item {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.wishlist-stat-number {
    font-size: 2.5rem;
    font-weight: 700;
    color: white;
}

.wishlist-stat-label {
    font-size: 0.95rem;
    opacity: 0.8;
    margin-top: 5px;
}

.wishlist-stat-divider {
    width: 1px;
    height: 50px;
    background: rgba(255,255,255,0.2);
}

/* ===== FILTER BAR ===== */
.wishlist-filter-bar {
    position: sticky;
    top: 0;
    z-index: 100;
    background: rgba(255,255,255,0.95);
    backdrop-filter: blur(20px);
    border-bottom: 1px solid rgba(220, 53, 69, 0.1);
    padding: 18px 0;
    margin-bottom: 35px;
}

.wishlist-filter-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.wishlist-filter-left {
    display: flex;
    gap: 12px;
}

.wishlist-filter-btn {
    padding: 10px 24px;
    border: 2px solid #e9ecef;
    background: transparent;
    border-radius: 50px;
    color: #6c757d;
    font-weight: 600;
    font-size: 0.95rem;
    transition: all 0.3s ease;
    cursor: pointer;
}

.wishlist-filter-btn.active {
    background: #dc3545;
    color: white;
    border-color: #dc3545;
    box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
}

.wishlist-filter-btn:hover {
    transform: translateY(-2px);
}

.wishlist-sort-dropdown select {
    padding: 10px 24px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.95rem;
    color: #495057;
    cursor: pointer;
    outline: none;
    background: transparent;
    border: 2px solid #e9ecef;
}

/* ===== WISHLIST GRID ===== */
.wishlist-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
    gap: 35px;
    padding: 20px 0 40px;
    position: relative;
    z-index: 1;
}

/* ===== WISHLIST CARD ===== */
.wishlist-card-item {
    position: relative;
    background: white;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0,0,0,0.06);
    transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
    opacity: 0;
    transform: translateY(40px);
}

.wishlist-card-item.visible {
    opacity: 1;
    transform: translateY(0);
}

.wishlist-card-item:hover {
    transform: translateY(-12px) scale(1.02);
    box-shadow: 0 30px 80px rgba(220, 53, 69, 0.15);
}

.wishlist-card-glow {
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle at center, rgba(220,53,69,0.05) 0%, transparent 70%);
    opacity: 0;
    transition: opacity 0.6s ease;
    pointer-events: none;
}

.wishlist-card-item:hover .wishlist-card-glow {
    opacity: 1;
}

/* Card Image */
.wishlist-card-image {
    position: relative;
    height: 300px;
    overflow: hidden;
    background: #f8f9fa;
}

.wishlist-card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.wishlist-card-item:hover .wishlist-card-image img {
    transform: scale(1.1);
}

.wishlist-image-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    color: #adb5bd;
    font-size: 3.5rem;
}

/* Quick Actions */
.wishlist-quick-actions {
    position: absolute;
    top: 20px;
    right: 20px;
    display: flex;
    flex-direction: column;
    gap: 10px;
    opacity: 0;
    transform: translateX(20px);
    transition: all 0.4s ease;
}

.wishlist-card-item:hover .wishlist-quick-actions {
    opacity: 1;
    transform: translateX(0);
}

.wishlist-quick-btn {
    width: 45px;
    height: 45px;
    border: none;
    border-radius: 50%;
    background: white;
    color: #495057;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
}

.wishlist-quick-btn:hover {
    background: #dc3545;
    color: white;
    transform: scale(1.1);
    box-shadow: 0 4px 20px rgba(220, 53, 69, 0.3);
}

/* Badges */
.wishlist-badge-container {
    position: absolute;
    top: 20px;
    left: 20px;
    display: flex;
    gap: 10px;
}

.wishlist-badge-category {
    padding: 8px 18px;
    background: rgba(255,255,255,0.95);
    backdrop-filter: blur(10px);
    border-radius: 50px;
    font-size: 0.8rem;
    font-weight: 600;
    color: #dc3545;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.wishlist-badge-new {
    padding: 8px 14px;
    background: linear-gradient(135deg, #ff6b81, #dc3545);
    border-radius: 50px;
    font-size: 0.75rem;
    font-weight: 700;
    color: white;
    animation: wishlistPulse 2s infinite;
}

@keyframes wishlistPulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

/* Favorite Button */
.wishlist-fav-btn {
    position: absolute;
    bottom: 20px;
    right: 20px;
    width: 50px;
    height: 50px;
    border: none;
    border-radius: 50%;
    background: white;
    color: #dc3545;
    box-shadow: 0 4px 20px rgba(0,0,0,0.15);
    cursor: pointer;
    transition: all 0.3s ease;
    z-index: 2;
    font-size: 1.3rem;
}

.wishlist-fav-btn.active {
    background: #dc3545;
    color: white;
    animation: wishlistHeartBeat 0.6s;
}

@keyframes wishlistHeartBeat {
    0% { transform: scale(1); }
    25% { transform: scale(1.3); }
    50% { transform: scale(0.9); }
    75% { transform: scale(1.1); }
    100% { transform: scale(1); }
}

.wishlist-ripple-effect {
    position: absolute;
    border-radius: 50%;
    background: rgba(220, 53, 69, 0.3);
    width: 100%;
    height: 100%;
    animation: wishlistRipple 1s ease-out;
}

@keyframes wishlistRipple {
    from { transform: scale(0); opacity: 1; }
    to { transform: scale(2); opacity: 0; }
}

/* Price Tag */
.wishlist-price-tag {
    position: absolute;
    bottom: 20px;
    left: 20px;
    padding: 10px 24px;
    background: rgba(255,255,255,0.95);
    backdrop-filter: blur(10px);
    border-radius: 50px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

.wishlist-price-tag .wishlist-currency {
    font-size: 0.85rem;
    font-weight: 600;
    color: #6c757d;
    margin-right: 3px;
}

.wishlist-price-tag .wishlist-amount {
    font-size: 1.5rem;
    font-weight: 700;
    color: #dc3545;
}

.wishlist-price-tag .wishlist-period {
    font-size: 0.85rem;
    color: #6c757d;
    margin-left: 3px;
}

/* Card Content */
.wishlist-card-content {
    padding: 24px 26px 26px;
}

.wishlist-card-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 12px;
    margin-bottom: 12px;
}

.wishlist-card-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: #1a1a2e;
    margin: 0;
    flex: 1;
    line-height: 1.4;
}

.wishlist-rating {
    display: flex;
    align-items: center;
    gap: 3px;
    color: #f59e0b;
    font-size: 0.95rem;
    white-space: nowrap;
}

.wishlist-rating-count {
    color: #6c757d;
    font-size: 0.85rem;
    margin-left: 5px;
}

.wishlist-card-desc {
    color: #6c757d;
    font-size: 1rem;
    line-height: 1.6;
    margin-bottom: 18px;
}

.wishlist-card-meta {
    display: flex;
    gap: 25px;
    margin-bottom: 20px;
    padding-top: 18px;
    border-top: 1px solid #f1f3f5;
}

.wishlist-meta-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #6c757d;
    font-size: 0.9rem;
}

.wishlist-meta-item i {
    color: #dc3545;
    width: 18px;
    font-size: 1rem;
}

/* Card Actions */
.wishlist-card-actions {
    display: flex;
    gap: 12px;
}

.wishlist-btn-view {
    flex: 1;
    padding: 12px 24px;
    background: linear-gradient(135deg, #dc3545, #ff6b81);
    color: white;
    border: none;
    border-radius: 12px;
    font-weight: 600;
    font-size: 1rem;
    text-decoration: none;
    text-align: center;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.wishlist-btn-view:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(220, 53, 69, 0.3);
    color: white;
}

.wishlist-btn-view i {
    transition: transform 0.3s ease;
}

.wishlist-btn-view:hover i {
    transform: translateX(5px);
}

.wishlist-btn-remove {
    padding: 12px 20px;
    background: #f8f9fa;
    border: 2px solid #e9ecef;
    border-radius: 12px;
    color: #dc3545;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    font-size: 1rem;
}

.wishlist-btn-remove:hover {
    background: #dc3545;
    color: white;
    border-color: #dc3545;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(220, 53, 69, 0.2);
}

.wishlist-tooltip {
    position: absolute;
    bottom: calc(100% + 12px);
    left: 50%;
    transform: translateX(-50%);
    background: #1a1a2e;
    color: white;
    padding: 8px 14px;
    border-radius: 8px;
    font-size: 0.8rem;
    white-space: nowrap;
    opacity: 0;
    pointer-events: none;
    transition: all 0.3s ease;
}

.wishlist-btn-remove:hover .wishlist-tooltip {
    opacity: 1;
}

/* ===== EMPTY STATE ===== */
.wishlist-empty-state {
    grid-column: 1 / -1;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 550px;
    padding: 50px;
}

.wishlist-empty-content {
    text-align: center;
    max-width: 550px;
}

.wishlist-empty-icon {
    position: relative;
    display: inline-block;
    margin-bottom: 35px;
}

.wishlist-empty-icon i {
    font-size: 7rem;
    color: #dc3545;
    opacity: 0.3;
}

.wishlist-empty-ring {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 140px;
    height: 140px;
    border: 3px dashed rgba(220, 53, 69, 0.2);
    border-radius: 50%;
    animation: wishlistSpin 20s linear infinite;
}

@keyframes wishlistSpin {
    to { transform: translate(-50%, -50%) rotate(360deg); }
}

.wishlist-empty-content h2 {
    font-size: 2.8rem;
    font-weight: 800;
    color: #1a1a2e;
    margin-bottom: 15px;
}

.wishlist-empty-content p {
    color: #6c757d;
    font-size: 1.2rem;
    margin-bottom: 35px;
}

.wishlist-empty-actions {
    display: flex;
    gap: 18px;
    justify-content: center;
    flex-wrap: wrap;
    margin-bottom: 45px;
}

.wishlist-btn-primary {
    padding: 16px 40px;
    background: linear-gradient(135deg, #dc3545, #ff6b81);
    color: white;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    font-size: 1.05rem;
    transition: all 0.3s ease;
    box-shadow: 0 8px 30px rgba(220, 53, 69, 0.3);
}

.wishlist-btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 40px rgba(220, 53, 69, 0.4);
    color: white;
}

.wishlist-btn-secondary {
    padding: 16px 40px;
    background: white;
    color: #dc3545;
    border: 2px solid #dc3545;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    font-size: 1.05rem;
    transition: all 0.3s ease;
}

.wishlist-btn-secondary:hover {
    background: #dc3545;
    color: white;
    transform: translateY(-3px);
}

.wishlist-suggestions span {
    display: block;
    color: #6c757d;
    font-size: 1rem;
    margin-bottom: 15px;
}

.wishlist-suggestion-tags {
    display: flex;
    gap: 12px;
    justify-content: center;
    flex-wrap: wrap;
}

.wishlist-suggestion-tags span {
    padding: 8px 22px;
    background: #f8f9fa;
    border-radius: 50px;
    font-size: 0.95rem;
    color: #495057;
    cursor: pointer;
    transition: all 0.3s ease;
}

.wishlist-suggestion-tags span:hover {
    background: #dc3545;
    color: white;
    transform: translateY(-2px);
}

/* ===== LOAD MORE ===== */
.wishlist-load-more {
    text-align: center;
    padding: 45px 0;
}

.wishlist-btn-load-more {
    padding: 16px 50px;
    background: transparent;
    border: 2px solid #dc3545;
    border-radius: 50px;
    color: #dc3545;
    font-weight: 600;
    font-size: 1.05rem;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.wishlist-btn-load-more::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(220,53,69,0.1), transparent);
    transition: left 0.5s ease;
}

.wishlist-btn-load-more:hover::before {
    left: 100%;
}

.wishlist-btn-load-more:hover {
    background: #dc3545;
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 8px 30px rgba(220, 53, 69, 0.3);
}

.wishlist-btn-load-more.loaded {
    background: #28a745;
    border-color: #28a745;
    color: white;
}

.wishlist-pagination-wrapper {
    margin-top: 30px;
}

/* ===== QUICK VIEW MODAL ===== */
.wishlist-quick-view-container {
    position: relative;
    display: flex;
    flex-direction: column;
    max-height: 90vh;
}

.wishlist-btn-close-modal {
    position: absolute;
    top: 20px;
    right: 20px;
    z-index: 10;
    width: 45px;
    height: 45px;
    border: none;
    border-radius: 50%;
    background: rgba(0,0,0,0.5);
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 1.2rem;
}

.wishlist-btn-close-modal:hover {
    background: #dc3545;
    transform: rotate(90deg);
}

.wishlist-quick-view-content {
    display: flex;
    flex-wrap: wrap;
}

.wishlist-quick-view-image {
    flex: 1 1 45%;
    min-height: 350px;
    background: #f8f9fa;
}

.wishlist-quick-view-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.wishlist-quick-view-info {
    flex: 1 1 55%;
    padding: 45px;
}

.wishlist-quick-view-info h2 {
    font-size: 2rem;
    font-weight: 700;
    color: #1a1a2e;
}

.wishlist-quick-price {
    font-size: 2.2rem;
    font-weight: 700;
    color: #dc3545;
    margin: 18px 0;
}

.wishlist-quick-view-info p {
    font-size: 1.05rem;
    color: #6c757d;
    line-height: 1.7;
}

.wishlist-btn-add-cart {
    margin-top: 25px;
    padding: 16px 45px;
    background: linear-gradient(135deg, #dc3545, #ff6b81);
    color: white;
    border: none;
    border-radius: 50px;
    font-weight: 600;
    font-size: 1.05rem;
    cursor: pointer;
    transition: all 0.3s ease;
}

.wishlist-btn-add-cart:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 30px rgba(220, 53, 69, 0.3);
}

/* ===== TOAST ===== */
.wishlist-custom-toast {
    position: fixed;
    bottom: 30px;
    right: 30px;
    z-index: 9999;
    padding: 18px 28px;
    background: #1a1a2e;
    color: white;
    border-radius: 12px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.2);
    display: flex;
    align-items: center;
    gap: 14px;
    animation: wishlistSlideUp 0.5s ease;
    font-size: 1rem;
}

.wishlist-custom-toast i {
    color: #28a745;
    font-size: 1.3rem;
}

@keyframes wishlistSlideUp {
    from { transform: translateY(100px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {
    .wishlist-hero-title {
        font-size: 2.8rem;
    }
    
    .wishlist-hero-subtitle {
        font-size: 1.1rem;
    }
    
    .wishlist-hero-stats {
        flex-direction: column;
        gap: 18px;
        padding: 20px 25px;
    }
    
    .wishlist-stat-divider {
        width: 80%;
        height: 1px;
    }
    
    .wishlist-grid {
        grid-template-columns: 1fr;
        gap: 25px;
    }
    
    .wishlist-card-image {
        height: 240px;
    }
    
    .wishlist-quick-actions {
        opacity: 1;
        transform: translateX(0);
    }
    
    .wishlist-filter-content {
        flex-direction: column;
        align-items: stretch;
    }
    
    .wishlist-filter-left {
        justify-content: center;
    }
    
    .wishlist-quick-view-content {
        flex-direction: column;
    }
    
    .wishlist-quick-view-image {
        min-height: 220px;
    }
    
    .wishlist-quick-view-info {
        padding: 25px;
    }
    
    .wishlist-quick-view-info h2 {
        font-size: 1.5rem;
    }
    
    .wishlist-empty-content h2 {
        font-size: 2rem;
    }
}

@media (max-width: 480px) {
    .wishlist-hero-title {
        font-size: 2.2rem;
    }
    
    .wishlist-hero-section {
        padding: 50px 0 30px;
    }
    
    .wishlist-hero-stats {
        padding: 15px 20px;
    }
    
    .wishlist-stat-number {
        font-size: 1.8rem;
    }
    
    .wishlist-card-title {
        font-size: 1rem;
    }
    
    .wishlist-price-tag .wishlist-amount {
        font-size: 1.2rem;
    }
}

/* ===== ANIMATIONS ===== */
.wishlist-animate-float {
    animation: wishlistFloat 3s ease-in-out infinite;
}

@keyframes wishlistFloat {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-8px); }
}

/* Skeleton Loading */
.wishlist-card-skeleton {
    display: none;
}

.wishlist-card-item.loading .wishlist-card-skeleton {
    display: block;
}

.wishlist-card-item.loading .wishlist-card-image,
.wishlist-card-item.loading .wishlist-card-content {
    display: none;
}

.wishlist-skeleton-image {
    height: 300px;
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: wishlistShimmer 1.5s infinite;
}

.wishlist-skeleton-text {
    height: 22px;
    margin: 12px 0;
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: wishlistShimmer 1.5s infinite;
    border-radius: 4px;
}

.wishlist-skeleton-text:last-child {
    width: 60%;
}

@keyframes wishlistShimmer {
    0% { background-position: -200% 0; }
    100% { background-position: 200% 0; }
}

/* ===== PAGINATION OVERRIDES ===== */
.wishlist-pagination-wrapper .pagination {
    justify-content: center;
    gap: 8px;
}

.wishlist-pagination-wrapper .page-link {
    border-radius: 50% !important;
    width: 45px;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid #e9ecef;
    color: #495057;
    font-weight: 600;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.wishlist-pagination-wrapper .page-link:hover {
    background: #dc3545;
    color: white;
    border-color: #dc3545;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(220, 53, 69, 0.2);
}

.wishlist-pagination-wrapper .page-item.active .page-link {
    background: #dc3545;
    border-color: #dc3545;
    color: white;
    box-shadow: 0 4px 20px rgba(220, 53, 69, 0.3);
}

.wishlist-pagination-wrapper .page-item.disabled .page-link {
    opacity: 0.5;
    cursor: not-allowed;
}
</style>

{{-- Main Wishlist Container --}}
<div class="wishlist-page-wrapper">
    {{-- Animated Background --}}
    <div class="wishlist-bg-effects">
        <div class="wishlist-floating-hearts">
            <span></span><span></span><span></span><span></span><span></span>
        </div>
    </div>

    {{-- Hero Section --}}
    <section class="wishlist-hero-section">
        <div class="container">
            <div class="wishlist-hero-content">
                <div class="wishlist-hero-badge wishlist-animate-float">
                    <i class="fas fa-gem"></i> Premium Collection
                </div>
                <h1 class="wishlist-hero-title">
                    <span class="wishlist-text-gradient">My Wishlist</span>
                    <span class="wishlist-hero-subtitle">Curated with ❤️ for you</span>
                </h1>
                <div class="wishlist-hero-stats">
                    <div class="wishlist-stat-item">
                        <span class="wishlist-stat-number">{{ $wishlists->count() }}</span>
                        <span class="wishlist-stat-label">Items Saved</span>
                    </div>
                    <div class="wishlist-stat-divider"></div>
                    <div class="wishlist-stat-item">
                        <span class="wishlist-stat-number">24</span>
                        <span class="wishlist-stat-label">Total Favorites</span>
                    </div>
                    <div class="wishlist-stat-divider"></div>
                    <div class="wishlist-stat-item">
                        <span class="wishlist-stat-number">4.8</span>
                        <span class="wishlist-stat-label">Avg Rating</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Filter/Sort Bar --}}
    <div class="wishlist-filter-bar">
        <div class="container">
            <div class="wishlist-filter-content">
                <div class="wishlist-filter-left">
                    <button class="wishlist-filter-btn active">
                        <i class="fas fa-th"></i> Grid
                    </button>
                    <button class="wishlist-filter-btn">
                        <i class="fas fa-list"></i> List
                    </button>
                </div>
                <div class="wishlist-filter-right">
                    <div class="wishlist-sort-dropdown">
                        <select class="form-select border-0 bg-transparent">
                            <option>Sort by: Latest</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                            <option>Most Popular</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Wishlist Grid --}}
    <div class="container">
        <div class="wishlist-grid">
            @forelse($wishlists as $wishlist)
            <div class="wishlist-card-item" data-id="{{ $wishlist->id }}">
                {{-- Card Glow Effect --}}
                <div class="wishlist-card-glow"></div>
                
                {{-- Card Image --}}
                <div class="wishlist-card-image">
                    @if($wishlist->item->images->count())
                        <img src="{{ asset('uploads/items/'.$wishlist->item->images->first()->image) }}" 
                             alt="{{ $wishlist->item->title }}"
                             loading="lazy">
                    @else
                        <div class="wishlist-image-placeholder">
                            <i class="fas fa-image"></i>
                        </div>
                    @endif
                    
                    {{-- Quick Action Buttons --}}
                    <div class="wishlist-quick-actions">
                        <button class="wishlist-quick-btn" onclick="wishlistQuickView({{ $wishlist->item->id }})">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="wishlist-quick-btn" onclick="wishlistAddToCart({{ $wishlist->item->id }})">
                            <i class="fas fa-shopping-cart"></i>
                        </button>
                        <button class="wishlist-quick-btn" onclick="wishlistShareItem({{ $wishlist->item->id }})">
                            <i class="fas fa-share-alt"></i>
                        </button>
                    </div>

                    {{-- Badges --}}
                    <div class="wishlist-badge-container">
                        <span class="wishlist-badge-category">
                            <i class="fas fa-tag"></i> {{ $wishlist->item->category->name }}
                        </span>
                        @if($wishlist->created_at->diffInDays(now()) < 7)
                        <span class="wishlist-badge-new">New</span>
                        @endif
                    </div>

                    {{-- Favorite Button --}}
                    <button class="wishlist-fav-btn active" onclick="wishlistToggle({{ $wishlist->id }})">
                        <i class="fas fa-heart"></i>
                        <span class="wishlist-ripple-effect"></span>
                    </button>

                    {{-- Price Tag --}}
                    <div class="wishlist-price-tag">
                        <span class="wishlist-currency">Rs</span>
                        <span class="wishlist-amount">{{ number_format($wishlist->item->rent_price_per_day) }}</span>
                        <span class="wishlist-period">/day</span>
                    </div>
                </div>

                {{-- Card Content --}}
                <div class="wishlist-card-content">
                    <div class="wishlist-card-header">
                        <h3 class="wishlist-card-title">{{ Str::limit($wishlist->item->title, 35) }}</h3>
                        <div class="wishlist-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span class="wishlist-rating-count">(24)</span>
                        </div>
                    </div>

                    <p class="wishlist-card-desc">
                        {{ Str::limit($wishlist->item->description ?? 'No description available', 60) }}
                    </p>

                    <div class="wishlist-card-meta">
                        <div class="wishlist-meta-item">
                            <i class="fas fa-user"></i>
                            <span>{{ $wishlist->item->user->name ?? 'Admin' }}</span>
                        </div>
                        <div class="wishlist-meta-item">
                            <i class="far fa-clock"></i>
                            <span>{{ $wishlist->created_at->diffForHumans() }}</span>
                        </div>
                    </div>

                    <div class="wishlist-card-actions">
                        <a href="/item/{{ $wishlist->item->id }}" class="wishlist-btn-view">
                            <span>View Details</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <form method="POST" action="/wishlist/remove/{{ $wishlist->id }}" class="wishlist-remove-form">
                            @csrf
                            <button type="submit" class="wishlist-btn-remove">
                                <i class="fas fa-trash-alt"></i>
                                <span class="wishlist-tooltip">Remove from wishlist</span>
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Loading Skeleton --}}
                <div class="wishlist-card-skeleton">
                    <div class="wishlist-skeleton-image"></div>
                    <div class="wishlist-skeleton-text"></div>
                    <div class="wishlist-skeleton-text"></div>
                </div>
            </div>
            @empty
            {{-- Premium Empty State --}}
            <div class="wishlist-empty-state">
                <div class="wishlist-empty-content">
                    <div class="wishlist-empty-icon">
                        <i class="fas fa-heart"></i>
                        <div class="wishlist-empty-ring"></div>
                    </div>
                    <h2>Your Wishlist is Empty</h2>
                    <p>Start building your dream collection by exploring our catalog</p>
                    <div class="wishlist-empty-actions">
                        <a href="/" class="wishlist-btn-primary">
                            <i class="fas fa-compass"></i> Start Exploring
                        </a>
                        <a href="/categories" class="wishlist-btn-secondary">
                            <i class="fas fa-th-large"></i> Browse Categories
                        </a>
                    </div>
                    <div class="wishlist-suggestions">
                        <span>Popular items you might like:</span>
                        <div class="wishlist-suggestion-tags">
                            <span>Electronics</span>
                            <span>Fashion</span>
                            <span>Home & Living</span>
                            <span>Books</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforelse
        </div>

        {{-- Load More --}}
        @if(method_exists($wishlists, 'hasPages') && $wishlists->hasPages())
        <div class="wishlist-load-more">
            <button class="wishlist-btn-load-more" id="wishlistLoadMoreBtn">
                <span class="wishlist-btn-text">Load More</span>
                <span class="wishlist-btn-loader" style="display: none;">
                    <i class="fas fa-spinner fa-spin"></i>
                </span>
            </button>
            <div class="wishlist-pagination-wrapper">
                {{ $wishlists->links('pagination::bootstrap-5') }}
            </div>
        </div>
        @endif
    </div>
</div>

{{-- Quick View Modal --}}
<div class="modal fade" id="wishlistQuickViewModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="wishlist-quick-view-container">
                    <button type="button" class="wishlist-btn-close-modal" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="wishlist-quick-view-content">
                        <div class="wishlist-quick-view-image">
                            <img src="" alt="Quick View" id="wishlistQuickViewImage">
                        </div>
                        <div class="wishlist-quick-view-info" id="wishlistQuickViewInfo">
                            <!-- Dynamic content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Quick View Function
function wishlistQuickView(itemId) {
    fetch(`/item/${itemId}/quick-view`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('wishlistQuickViewImage').src = data.image;
            document.getElementById('wishlistQuickViewInfo').innerHTML = `
                <h2>${data.title}</h2>
                <div class="wishlist-quick-price">Rs ${data.price}</div>
                <p>${data.description}</p>
                <button class="wishlist-btn-add-cart">Add to Cart</button>
            `;
            new bootstrap.Modal(document.getElementById('wishlistQuickViewModal')).show();
        });
}

// Toggle Wishlist
function wishlistToggle(id) {
    const btn = event.currentTarget;
    btn.classList.toggle('active');
    
    fetch(`/wishlist/toggle/${id}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    });
}

// Add to Cart with Animation
function wishlistAddToCart(itemId) {
    const btn = event.currentTarget;
    btn.innerHTML = '<i class="fas fa-check"></i>';
    btn.style.background = '#28a745';
    
    fetch(`/cart/add/${itemId}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    }).then(() => {
        setTimeout(() => {
            btn.innerHTML = '<i class="fas fa-shopping-cart"></i>';
            btn.style.background = '';
        }, 2000);
    });
}

// Share Function
function wishlistShareItem(itemId) {
    if (navigator.share) {
        navigator.share({
            title: 'Check out this item!',
            text: 'I found this amazing item on our platform!',
            url: window.location.origin + '/item/' + itemId
        });
    } else {
        const url = window.location.origin + '/item/' + itemId;
        navigator.clipboard.writeText(url).then(() => {
            wishlistShowToast('Link copied to clipboard!');
        });
    }
}

// Toast Notification
function wishlistShowToast(message) {
    const toast = document.createElement('div');
    toast.className = 'wishlist-custom-toast';
    toast.innerHTML = `
        <i class="fas fa-check-circle"></i>
        <span>${message}</span>
    `;
    document.body.appendChild(toast);
    setTimeout(() => toast.remove(), 3000);
}

// Load More with Animation
document.getElementById('wishlistLoadMoreBtn')?.addEventListener('click', function() {
    const text = this.querySelector('.wishlist-btn-text');
    const loader = this.querySelector('.wishlist-btn-loader');
    text.style.display = 'none';
    loader.style.display = 'inline-block';
    
    setTimeout(() => {
        text.style.display = 'inline-block';
        loader.style.display = 'none';
        this.classList.add('loaded');
    }, 1500);
});

// Intersection Observer for Cards
const wishlistCards = document.querySelectorAll('.wishlist-card-item');
const wishlistObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry, index) => {
        if (entry.isIntersecting) {
            setTimeout(() => {
                entry.target.classList.add('visible');
            }, index * 100);
        }
    });
}, { threshold: 0.1 });

wishlistCards.forEach(card => wishlistObserver.observe(card));

// Floating Hearts Animation
document.querySelectorAll('.wishlist-floating-hearts span').forEach((heart, index) => {
    heart.style.left = `${Math.random() * 100}%`;
    heart.style.animationDelay = `${index * 2}s`;
    heart.style.animationDuration = `${10 + Math.random() * 10}s`;
});

// Filter Buttons
document.querySelectorAll('.wishlist-filter-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.wishlist-filter-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
    });
});
</script>

{{-- Font Awesome --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

{{-- Bootstrap 5 --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
