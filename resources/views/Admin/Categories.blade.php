@extends('admin.layout')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<style>
    /* ===== ENHANCED RED & WHITE THEME ===== */
    
    /* Global Styles */
    .container {
        max-width: 1280px;
    }

    /* Gradient Header */
    .page-header {
        background: linear-gradient(135deg, #ffffff 0%, #fff5f5 100%);
        padding: 2rem 2rem 1.5rem 2rem;
        border-radius: 20px;
        box-shadow: 0 2px 20px rgba(220, 53, 69, 0.08);
        margin-bottom: 2.5rem;
        border: 1px solid rgba(220, 53, 69, 0.1);
        position: relative;
        overflow: hidden;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(220, 53, 69, 0.05) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }

    .page-title {
        font-weight: 800;
        color: #1a1a2e;
        font-size: 2rem;
        letter-spacing: -0.5px;
        position: relative;
        z-index: 1;
    }

    .page-title i {
        background: linear-gradient(135deg, #dc3545, #b02a37);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-right: 12px;
    }

    .page-subtitle {
        color: #6c757d;
        font-size: 0.95rem;
        margin-top: 4px;
        position: relative;
        z-index: 1;
    }

    /* Enhanced Add Button */
    .add-btn {
        background: linear-gradient(135deg, #dc3545, #b02a37);
        border: none;
        border-radius: 50px;
        padding: 0.7rem 2rem;
        font-weight: 600;
        color: white;
        transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1);
        box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        position: relative;
        z-index: 1;
        letter-spacing: 0.3px;
    }

    .add-btn:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 8px 25px rgba(220, 53, 69, 0.4);
        color: #fff;
        background: linear-gradient(135deg, #c82333, #a71d2a);
    }

    .add-btn i {
        font-size: 1.1rem;
    }

    /* Enhanced Cards */
    .card-hover {
        background: #ffffff;
        border-radius: 20px;
        border: 1px solid rgba(220, 53, 69, 0.08);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
        transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1);
        position: relative;
        overflow: hidden;
        height: 100%;
        padding: 1.5rem;
    }

    .card-hover::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #dc3545, #ff6b7a, #dc3545);
        background-size: 200% 100%;
        animation: shimmer 3s infinite;
        opacity: 0;
        transition: opacity 0.4s;
    }

    @keyframes shimmer {
        0% { background-position: -200% 0; }
        100% { background-position: 200% 0; }
    }

    .card-hover:hover::before {
        opacity: 1;
    }

    .card-hover:hover {
        transform: translateY(-10px) scale(1.01);
        box-shadow: 0 20px 40px -8px rgba(220, 53, 69, 0.2);
        border-color: rgba(220, 53, 69, 0.2);
    }

    .card-hover::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 100% 0%, rgba(220, 53, 69, 0.03), transparent 70%);
        pointer-events: none;
        opacity: 0;
        transition: opacity 0.4s;
        border-radius: 20px;
    }

    .card-hover:hover::after {
        opacity: 1;
    }

    /* Enhanced Image */
    .cat-img-wrapper {
        position: relative;
        border-radius: 16px;
        overflow: hidden;
        margin-bottom: 16px;
        background: #f8f9fa;
    }

    .cat-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.2, 0.9, 0.4, 1), filter 0.4s ease;
        display: block;
    }

    .card-hover:hover .cat-img {
        transform: scale(1.05);
        filter: brightness(1.03);
    }

    .cat-img-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to top, rgba(220, 53, 69, 0.1), transparent);
        opacity: 0;
        transition: opacity 0.4s;
        pointer-events: none;
    }

    .card-hover:hover .cat-img-overlay {
        opacity: 1;
    }

    /* Category Badge */
    .category-badge {
        display: inline-block;
        background: linear-gradient(135deg, #dc3545, #b02a37);
        color: white;
        padding: 2px 12px;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 600;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        margin-bottom: 8px;
    }

    /* Category Name */
    .category-name {
        font-weight: 700;
        color: #1a1a2e;
        font-size: 1.2rem;
        margin-bottom: 6px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .category-name i {
        color: #dc3545;
        font-size: 0.9rem;
        opacity: 0.8;
    }

    /* Description */
    .desc-text {
        color: #6c757d;
        font-size: 0.9rem;
        line-height: 1.6;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 2.8rem;
        margin-bottom: 12px;
    }

    /* Stats Row */
    .category-stats {
        display: flex;
        gap: 16px;
        padding: 10px 0;
        border-top: 1px solid #f1f3f5;
        border-bottom: 1px solid #f1f3f5;
        margin-bottom: 14px;
    }

    .stat-item {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 0.8rem;
        color: #6c757d;
    }

    .stat-item i {
        color: #dc3545;
        opacity: 0.7;
    }

    .stat-item strong {
        color: #1a1a2e;
        font-weight: 600;
    }

    /* Enhanced Buttons */
    .btn-update {
        background: linear-gradient(135deg, #dc3545, #b02a37);
        color: #fff;
        border: none;
        border-radius: 50px;
        padding: 0.5rem 1.5rem;
        font-weight: 600;
        transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 0.85rem;
        flex: 1;
        justify-content: center;
        box-shadow: 0 2px 10px rgba(220, 53, 69, 0.2);
        cursor: pointer;
    }

    .btn-update:hover {
        transform: translateY(-2px) scale(1.02);
        box-shadow: 0 6px 20px rgba(220, 53, 69, 0.3);
        color: #fff;
        background: linear-gradient(135deg, #c82333, #a71d2a);
    }

    .btn-delete {
        background: #ffffff;
        color: #dc3545;
        border: 2px solid #dc3545;
        border-radius: 50px;
        padding: 0.5rem 1.5rem;
        font-weight: 600;
        transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1);
        font-size: 0.85rem;
        flex: 1;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        cursor: pointer;
    }

    .btn-delete:hover {
        background: linear-gradient(135deg, #dc3545, #b02a37);
        color: #fff;
        transform: translateY(-2px) scale(1.02);
        box-shadow: 0 6px 20px rgba(220, 53, 69, 0.25);
        border-color: #dc3545;
    }

    .card-footer-actions {
        display: flex;
        gap: 10px;
        margin-top: 4px;
    }

    /* ===== ENGAGING MODAL ===== */
    .delete-modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(8px);
        z-index: 10000;
        display: none;
        align-items: center;
        justify-content: center;
        animation: fadeInOverlay 0.3s ease;
    }

    @keyframes fadeInOverlay {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    .delete-modal {
        background: #ffffff;
        border-radius: 24px;
        padding: 2.5rem;
        max-width: 440px;
        width: 90%;
        position: relative;
        animation: modalSlideUp 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.3);
        text-align: center;
    }

    @keyframes modalSlideUp {
        from {
            transform: scale(0.8) translateY(40px);
            opacity: 0;
        }
        to {
            transform: scale(1) translateY(0);
            opacity: 1;
        }
    }

    .delete-modal .modal-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #fff5f5, #ffe8e8);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 2.5rem;
        color: #dc3545;
        animation: pulseIcon 1.5s ease-in-out infinite;
    }

    @keyframes pulseIcon {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    .delete-modal h3 {
        color: #1a1a2e;
        font-weight: 700;
        margin-bottom: 0.5rem;
        font-size: 1.5rem;
    }

    .delete-modal p {
        color: #6c757d;
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }

    .delete-modal .category-name-highlight {
        color: #dc3545;
        font-weight: 700;
        background: #fff5f5;
        padding: 2px 12px;
        border-radius: 8px;
        display: inline-block;
    }

    .delete-modal .modal-actions {
        display: flex;
        gap: 12px;
        justify-content: center;
    }

    .delete-modal .btn-cancel {
        background: #f1f3f5;
        color: #495057;
        border: none;
        border-radius: 50px;
        padding: 0.7rem 2rem;
        font-weight: 600;
        transition: all 0.3s ease;
        cursor: pointer;
        flex: 1;
    }

    .delete-modal .btn-cancel:hover {
        background: #e9ecef;
        transform: scale(1.02);
    }

    .delete-modal .btn-confirm-delete {
        background: linear-gradient(135deg, #dc3545, #b02a37);
        color: #fff;
        border: none;
        border-radius: 50px;
        padding: 0.7rem 2rem;
        font-weight: 600;
        transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1);
        cursor: pointer;
        flex: 1;
        box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
    }

    .delete-modal .btn-confirm-delete:hover {
        transform: scale(1.02) translateY(-2px);
        box-shadow: 0 8px 25px rgba(220, 53, 69, 0.4);
        background: linear-gradient(135deg, #c82333, #a71d2a);
    }

    /* ===== ENGAGING SUCCESS TOAST ===== */
    .toast-container-custom {
        position: fixed;
        top: 30px;
        right: 30px;
        z-index: 9999;
        min-width: 320px;
        max-width: 450px;
        pointer-events: none;
    }

    .toast-success {
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(10px);
        border-left: 8px solid #dc3545;
        border-radius: 20px;
        box-shadow: 0 20px 60px -12px rgba(0, 0, 0, 0.25), 0 4px 20px rgba(220, 53, 69, 0.1);
        padding: 20px 28px;
        color: #1a1a2e;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 16px;
        transform: translateX(0);
        opacity: 1;
        pointer-events: none;
        animation: slideInRight 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    @keyframes slideInRight {
        from {
            transform: translateX(120%) scale(0.9);
            opacity: 0;
        }
        to {
            transform: translateX(0) scale(1);
            opacity: 1;
        }
    }

    .toast-success i {
        font-size: 2rem;
        color: #dc3545;
        background: linear-gradient(135deg, #fff5f5, #ffe8e8);
        padding: 12px;
        border-radius: 50%;
        box-shadow: 0 2px 10px rgba(220, 53, 69, 0.1);
        animation: checkBounce 0.6s ease;
    }

    @keyframes checkBounce {
        0% { transform: scale(0); }
        50% { transform: scale(1.2); }
        70% { transform: scale(0.9); }
        100% { transform: scale(1); }
    }

    .toast-success .toast-content {
        flex: 1;
    }

    .toast-success .toast-title {
        font-weight: 700;
        color: #1a1a2e;
        font-size: 1rem;
    }

    .toast-success .toast-message {
        color: #6c757d;
        font-size: 0.9rem;
        margin-top: 2px;
    }

    .toast-success.hide {
        animation: slideOutRight 0.5s cubic-bezier(0.2, 0.9, 0.4, 1) forwards;
    }

    @keyframes slideOutRight {
        from {
            transform: translateX(0) scale(1);
            opacity: 1;
        }
        to {
            transform: translateX(120%) scale(0.9);
            opacity: 0;
        }
    }

    /* Card Fade Out */
    .fade-out {
        animation: fadeOut 0.5s cubic-bezier(0.2, 0.9, 0.4, 1) forwards;
    }

    @keyframes fadeOut {
        0% { 
            opacity: 1; 
            transform: scale(1) translateY(0); 
        }
        100% { 
            opacity: 0; 
            transform: scale(0.8) translateY(-20px); 
        }
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        background: #ffffff;
        border-radius: 20px;
        border: 2px dashed rgba(220, 53, 69, 0.15);
    }

    .empty-state i {
        font-size: 4rem;
        color: #dc3545;
        opacity: 0.3;
        margin-bottom: 1rem;
    }

    .empty-state h4 {
        color: #1a1a2e;
        font-weight: 600;
    }

    .empty-state p {
        color: #6c757d;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .page-header {
            padding: 1.5rem;
        }
        
        .page-title {
            font-size: 1.5rem;
        }
        
        .cat-img {
            height: 160px;
        }
        
        .card-footer-actions {
            flex-direction: column;
        }
        
        .btn-update, .btn-delete {
            width: 100%;
            justify-content: center;
        }
        
        .toast-container-custom {
            top: 20px;
            right: 20px;
            left: 20px;
            min-width: unset;
            max-width: unset;
        }

        .delete-modal {
            padding: 2rem 1.5rem;
        }

        .delete-modal .modal-actions {
            flex-direction: column;
        }
    }

    /* Scrollbar Styling */
    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #dc3545, #b02a37);
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #b02a37;
    }

    /* Counter Badge */
    .counter-badge {
        background: #dc3545;
        color: white;
        border-radius: 50%;
        padding: 2px 10px;
        font-size: 0.75rem;
        font-weight: 700;
        margin-left: 8px;
        display: inline-block;
    }
</style>

<div class="container mt-4">
    <!-- Enhanced Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="page-title">
                    <i class="fas fa-th-large"></i> Categories
                    <span class="counter-badge">{{ $categories->count() }}</span>
                </h1>
                <p class="page-subtitle">
                    <i class="fas fa-arrow-right me-2" style="color: #dc3545;"></i>
                    Manage your product categories efficiently
                </p>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <a href="/addcategory" class="add-btn">
                    <i class="fas fa-plus-circle"></i> 
                    <span>Add New Category</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Category Grid -->
    @if($categories->count() > 0)
        <div class="row g-4">
            @foreach($categories as $category)
            <div class="col-lg-4 col-md-6">
                <div class="card card-hover" data-category-id="{{ $category->id }}" data-category-name="{{ $category->name }}">
                    <!-- Image -->
                    <div class="cat-img-wrapper">
                        @if($category->image)
                            <img src="{{ asset('uploads/categories/'.$category->image) }}"
                                 class="cat-img" 
                                 alt="{{ $category->name }}">
                        @else
                            <img src="https://via.placeholder.com/400x200/ffffff/dc3545?text=No+Image"
                                 class="cat-img" 
                                 alt="No image">
                        @endif
                        <div class="cat-img-overlay"></div>
                    </div>

                    <!-- Badge -->
                    <div class="category-badge">
                        <i class="fas fa-tag me-1"></i> Category
                    </div>

                    <!-- Name -->
                    <div class="category-name">
                        <i class="fas fa-folder-open"></i>
                        {{ $category->name }}
                    </div>

                    <!-- Description -->
                    <p class="desc-text">
                        {{ $category->description ?? 'No description available for this category.' }}
                    </p>

                    <!-- Stats -->
                    <div class="category-stats">
                        <span class="stat-item">
                            <i class="fas fa-calendar-alt"></i>
                            <strong>Created:</strong> 
                            {{ $category->created_at ? $category->created_at->format('M d, Y') : 'N/A' }}
                        </span>
                        <span class="stat-item">
                            <i class="fas fa-hashtag"></i>
                            <strong>ID:</strong> #{{ $category->id }}
                        </span>
                    </div>

                    <!-- Actions -->
                    <div class="card-footer-actions">
                        <a href="/admin/category/{{ $category->id }}/edit" 
                           class="btn-update btn-animate">
                            <i class="fas fa-edit"></i> Update
                        </a>

                        <!-- Hidden form for delete -->
                        <form id="delete-form-{{ $category->id }}" 
                              action="/admin/category/{{ $category->id }}" 
                              method="POST" 
                              style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>

                        <button type="button" 
                                class="btn-delete btn-animate"
                                onclick="openDeleteModal({{ $category->id }}, '{{ addslashes($category->name) }}')">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <!-- Empty State -->
        <div class="empty-state">
            <i class="fas fa-folder-open"></i>
            <h4>No Categories Found</h4>
            <p>Start by creating your first category to organize your products.</p>
            <a href="/addcategory" class="add-btn mt-3" style="display: inline-flex;">
                <i class="fas fa-plus-circle"></i> Create Category
            </a>
        </div>
    @endif
</div>

<!-- ===== DELETE CONFIRMATION MODAL ===== -->
<div id="deleteModal" class="delete-modal-overlay">
    <div class="delete-modal">
        <div class="modal-icon">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <h3>Delete Category?</h3>
        <p>
            Are you sure you want to delete 
            <span class="category-name-highlight" id="modalCategoryName">"Category Name"</span>?
            <br>
            <small style="color: #dc3545; font-weight: 500;">
                <i class="fas fa-exclamation-circle"></i> This action cannot be undone.
            </small>
        </p>
        <div class="modal-actions">
            <button class="btn-cancel" onclick="closeDeleteModal()">
                <i class="fas fa-times"></i> Cancel
            </button>
            <button class="btn-confirm-delete" id="confirmDeleteBtn">
                <i class="fas fa-trash-alt"></i> Yes, Delete
            </button>
        </div>
    </div>
</div>

<!-- ===== SUCCESS TOAST ===== -->
<div id="successToast" class="toast-container-custom">
    <div id="toastMessage" class="toast-success" style="display: none;">
        <i class="fas fa-check-circle"></i>
        <div class="toast-content">
            <div class="toast-title">Success!</div>
            <div class="toast-message" id="toastText">Category deleted successfully</div>
        </div>
    </div>
</div>

<script>
    // Variables for delete functionality
    let deleteCategoryId = null;

    // Open delete modal
    function openDeleteModal(categoryId, categoryName) {
        deleteCategoryId = categoryId;
        
        // Update modal with category name
        document.getElementById('modalCategoryName').textContent = `"${categoryName}"`;
        
        // Show modal with animation
        const modal = document.getElementById('deleteModal');
        modal.style.display = 'flex';
        
        // Re-trigger animation
        const modalContent = modal.querySelector('.delete-modal');
        modalContent.style.animation = 'none';
        setTimeout(() => {
            modalContent.style.animation = 'modalSlideUp 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
        }, 10);
    }

    // Close delete modal
    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        modal.style.display = 'none';
        deleteCategoryId = null;
    }

    // Confirm delete
    document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
        if (deleteCategoryId) {
            // Find the form
            const form = document.getElementById(`delete-form-${deleteCategoryId}`);
            
            if (form) {
                // Close modal
                closeDeleteModal();
                
                // Find the card to animate
                const card = document.querySelector(`.card-hover[data-category-id="${deleteCategoryId}"]`);
                
                // Show success toast
                showSuccessToast('Category deleted successfully!');
                
                // Animate card fade out
                if (card) {
                    card.classList.add('fade-out');
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 500);
                }
                
                // Submit the form after animation
                setTimeout(() => {
                    form.submit();
                }, 600);
            } else {
                console.error('Form not found for category ID:', deleteCategoryId);
                closeDeleteModal();
            }
        }
    });

    // Close modal on overlay click
    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeDeleteModal();
        }
    });

    // Close modal on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeDeleteModal();
        }
    });

    // Enhanced toast notification
    function showSuccessToast(message = 'Category deleted successfully') {
        const toast = document.getElementById('toastMessage');
        const textSpan = document.getElementById('toastText');
        
        if (textSpan) textSpan.innerText = message;
        
        // Reset and show
        toast.classList.remove('hide');
        toast.style.display = 'flex';
        
        // Remove previous animation and re-trigger
        toast.style.animation = 'none';
        setTimeout(() => {
            toast.style.animation = 'slideInRight 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
        }, 10);

        // Auto hide after 5 seconds
        clearTimeout(window.toastTimeout);
        window.toastTimeout = setTimeout(() => {
            toast.classList.add('hide');
            setTimeout(() => {
                toast.style.display = 'none';
            }, 500);
        }, 5000);
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection