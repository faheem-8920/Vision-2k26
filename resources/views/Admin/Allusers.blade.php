<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin · Users (red & white)</title>
  <!-- Font Awesome 6 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: #f6f2f2;
      font-family: 'Inter', 'Segoe UI', Roboto, system-ui, sans-serif;
      padding: 2rem 0;
      min-height: 100vh;
      display: flex;
      align-items: center;
    }

    .container {
      max-width: 1280px;
      margin: 0 auto;
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
    }
    .status-badge i {
      color: #d32f2f;
      margin-right: 6px;
    }
    .status-badge:hover {
      background: #d32f2f;
      color: white;
      border-color: #d32f2f;
      box-shadow: 0 8px 16px rgba(211, 47, 47, 0.2);
    }

    /* ----- table red/white elegance ----- */
    .table-responsive {
      border-radius: 1.8rem;
      overflow: hidden;
      background: transparent;
    }

    .table-red-white {
      border-collapse: separate;
      border-spacing: 0 10px;
      width: 100%;
      margin-bottom: 0;
    }

    /* header */
    .table-red-white thead th {
      background: #d32f2f;
      color: white;
      font-weight: 600;
      font-size: 0.78rem;
      text-transform: uppercase;
      letter-spacing: 0.6px;
      padding: 16px 18px;
      border: none;
      transition: background 0.2s;
      position: relative;
    }
    .table-red-white thead th:first-child {
      border-radius: 20px 0 0 20px;
      padding-left: 26px;
    }
    .table-red-white thead th:last-child {
      border-radius: 0 20px 20px 0;
      padding-right: 26px;
    }
    .table-red-white thead th:hover {
      background: #b71c1c;
    }
    .table-red-white thead th i {
      margin-right: 6px;
      opacity: 0.9;
    }

    /* rows */
    .table-red-white tbody tr {
      background: white;
      border-radius: 20px;
      box-shadow: 0 4px 14px rgba(180, 20, 20, 0.04);
      transition: all 0.25s cubic-bezier(0.2, 0, 0, 1);
      border: 1px solid rgba(211, 47, 47, 0.04);
    }
    .table-red-white tbody tr:hover {
      background: #fffbfb;
      border-color: #ecc8c8;
      transform: scale(1.008) translateY(-2px);
      box-shadow: 0 14px 28px rgba(190, 30, 30, 0.10);
    }

    .table-red-white tbody td {
      padding: 18px 18px;
      vertical-align: middle;
      border: none;
      background: transparent;
      font-size: 0.95rem;
    }
    .table-red-white tbody td:first-child {
      padding-left: 26px;
      border-radius: 20px 0 0 20px;
    }
    .table-red-white tbody td:last-child {
      padding-right: 26px;
      border-radius: 0 20px 20px 0;
    }

    /* user id */
    .user-id {
      font-weight: 600;
      color: #2d2d2d;
      background: #f3eeee;
      padding: 2px 12px;
      border-radius: 40px;
      font-size: 0.8rem;
      transition: all 0.2s;
    }
    .table-red-white tbody tr:hover .user-id {
      background: #d32f2f;
      color: white;
      box-shadow: 0 4px 10px rgba(211, 47, 47, 0.2);
    }

    .user-name {
      font-weight: 700;
      color: #1a1a1a;
      transition: 0.15s;
    }
    .table-red-white tbody tr:hover .user-name {
      color: #b71c1c;
    }

    .user-email {
      color: #3d3d3d;
      transition: 0.15s;
      font-weight: 450;
    }
    .table-red-white tbody tr:hover .user-email {
      color: #b71c1c;
      font-weight: 500;
    }

    /* role badge enhanced */
    .role-badge {
      background: #fee9e9;
      color: #a51b1b;
      font-weight: 600;
      padding: 6px 18px;
      border-radius: 60px;
      font-size: 0.78rem;
      letter-spacing: 0.2px;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      border: 1px solid transparent;
      transition: all 0.25s;
      box-shadow: 0 2px 4px rgba(211, 47, 47, 0.04);
    }
    .role-badge i {
      font-size: 0.7rem;
      opacity: 0.9;
    }
    .role-badge:hover {
      background: #d32f2f;
      color: white;
      border-color: #d32f2f;
      transform: scale(1.06);
      box-shadow: 0 8px 18px rgba(211, 47, 47, 0.25);
    }

    /* action buttons — elevated */
    .actions-wrap {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      gap: 8px;
    }

    .btn-action {
      border-radius: 60px;
      padding: 8px 18px;
      font-weight: 600;
      font-size: 0.75rem;
      letter-spacing: 0.25px;
      transition: all 0.25s cubic-bezier(0.2, 0, 0, 1);
      border: 1px solid transparent;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.02);
      text-decoration: none;
      line-height: 1;
    }
    .btn-action i {
      font-size: 0.85rem;
    }

    /* view */
    .btn-view {
      background: #d32f2f;
      color: white;
      border-color: #d32f2f;
    }
    .btn-view:hover {
      background: #b71c1c;
      border-color: #b71c1c;
      color: white;
      transform: translateY(-3px) scale(1.04);
      box-shadow: 0 12px 20px rgba(211, 47, 47, 0.3);
    }

    /* edit */
    .btn-edit {
      background: white;
      color: #b71c1c;
      border: 1.5px solid #d32f2f;
    }
    .btn-edit:hover {
      background: #d32f2f;
      color: white;
      transform: translateY(-3px) scale(1.04);
      box-shadow: 0 12px 20px rgba(211, 47, 47, 0.2);
      border-color: #d32f2f;
    }

    /* delete */
    .btn-delete {
      background: transparent;
      color: #a51b1b;
      border: 1.5px solid #e6c5c5;
    }
    .btn-delete:hover {
      background: #b71c1c;
      color: white;
      border-color: #b71c1c;
      transform: translateY(-3px) scale(1.04);
      box-shadow: 0 12px 24px rgba(183, 28, 28, 0.25);
    }

    .delete-form {
      display: inline-block;
      margin: 0;
    }

    /* footer with micro info */
    .table-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 1.8rem;
      padding-top: 1rem;
      border-top: 1px solid rgba(211, 47, 47, 0.08);
      color: #6c757d;
      font-size: 0.85rem;
    }
    .table-footer i {
      color: #d32f2f;
      margin: 0 4px;
    }
    .table-footer .pill {
      background: #f3eeee;
      padding: 0.2rem 1.2rem;
      border-radius: 60px;
      color: #2d2d2d;
      font-weight: 500;
      transition: 0.15s;
    }
    .table-footer .pill:hover {
      background: #d32f2f;
      color: white;
    }

    /* entry animation */
    .table-red-white tbody tr {
      opacity: 0;
      animation: fadeSlide 0.45s forwards;
      animation-delay: calc(0.05s * var(--i, 1));
    }
    @keyframes fadeSlide {
      0% { opacity: 0; transform: translateY(16px) scale(0.98); }
      100% { opacity: 1; transform: translateY(0) scale(1); }
    }

    /* ===== DELETE MODAL ===== */
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

    .delete-modal .user-name-highlight {
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

    /* ===== SUCCESS TOAST ===== */
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

    /* responsive */
    @media (max-width: 768px) {
      .admin-card { padding: 1.2rem; }
      .heading-red { font-size: 1.5rem; }
      .brand-icon { width: 40px; height: 40px; font-size: 1.3rem; }
      .table-red-white thead th, .table-red-white tbody td {
        padding: 12px 10px;
        font-size: 0.85rem;
      }
      .btn-action { padding: 6px 12px; font-size: 0.7rem; }
      .actions-wrap { gap: 4px; }
      .table-red-white tbody td:first-child { padding-left: 14px; }
      .table-red-white tbody td:last-child { padding-right: 14px; }
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

    @media (max-width: 576px) {
      .header-section { flex-direction: column; align-items: start; gap: 0.8rem; }
      .status-badge { align-self: flex-start; }
    }
  </style>
</head>
<body>
<div class="container">
  <div class="admin-card">

    <!-- header -->
    <div class="header-section">
      <div class="brand-head">
        <div class="brand-icon">
          <i class="fas fa-users"></i>
        </div>
        <h1 class="heading-red">
          All Users
          <span>{{ count($users) }}</span>
        </h1>
      </div>
      <div class="status-badge">
        <i class="fas fa-circle" style="font-size: 0.5rem;"></i>  active
      </div>
    </div>

    <!-- table -->
    <div class="table-responsive">
      <table class="table table-red-white">
        <thead>
          <tr>
            <th><i class="fas fa-hashtag"></i> ID</th>
            <th><i class="fas fa-user-circle"></i> Name</th>
            <th><i class="fas fa-envelope"></i> Email</th>
            <th><i class="fas fa-tag"></i> Role</th>
            <th style="text-align: right; padding-right: 26px;"><i class="fas fa-bolt"></i> Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $index => $user)
          <tr style="--i: {{ $loop->index + 1 }};" data-user-id="{{ $user->id }}" data-user-name="{{ $user->name }}">
            <td><span class="user-id">#{{ $user->id }}</span></td>
            <td><span class="user-name">{{ $user->name }}</span></td>
            <td><span class="user-email">{{ $user->email }}</span></td>
            <td>
              <span class="role-badge">
                <i class="fas fa-shield-alt"></i> {{ $user->role }}
              </span>
            </td>
            <td style="text-align: right;">
              <div class="actions-wrap" style="justify-content: flex-end;">
                <!-- VIEW -->
                <a href="/users/view/{{ $user->id }}" class="btn btn-action btn-view">
                  <i class="fas fa-eye"></i> View
                </a>
                <!-- EDIT -->
                <a href="/users/edit/{{ $user->id }}" class="btn btn-action btn-edit">
                  <i class="fas fa-pen"></i> Edit
                </a>
                <!-- DELETE -->
                <form id="delete-form-{{ $user->id }}" action="/users/delete/{{ $user->id }}" method="POST" style="display: none;">
                  @csrf
                </form>
                <button type="button" class="btn btn-action btn-delete" onclick="openDeleteModal({{ $user->id }}, '{{ addslashes($user->name) }}')">
                  <i class="fas fa-trash-alt"></i> Delete
                </button>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <!-- footer -->
    <div class="table-footer">
      <span>
        <i class="fas fa-arrow-right"></i>  hover rows · buttons · red & white
      </span>
      <span class="pill">
        <i class="fas fa-users"></i>  {{ count($users) }} users
      </span>
    </div>

  </div> <!-- end admin-card -->
</div> <!-- end container -->

<!-- ===== DELETE CONFIRMATION MODAL ===== -->
<div id="deleteModal" class="delete-modal-overlay">
  <div class="delete-modal">
    <div class="modal-icon">
      <i class="fas fa-exclamation-triangle"></i>
    </div>
    <h3>Delete User?</h3>
    <p>
      Are you sure you want to delete 
      <span class="user-name-highlight" id="modalUserName">"User Name"</span>?
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
      <div class="toast-message" id="toastText">User deleted successfully</div>
    </div>
  </div>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Variables for delete functionality
  let deleteUserId = null;

  // Open delete modal
  function openDeleteModal(userId, userName) {
    deleteUserId = userId;
    
    // Update modal with user name
    document.getElementById('modalUserName').textContent = `"${userName}"`;
    
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
    deleteUserId = null;
  }

  // Confirm delete
  document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
    if (deleteUserId) {
      // Find the form
      const form = document.getElementById(`delete-form-${deleteUserId}`);
      
      if (form) {
        // Close modal
        closeDeleteModal();
        
        // Find the row to animate
        const row = document.querySelector(`tr[data-user-id="${deleteUserId}"]`);
        
        // Show success toast
        showSuccessToast('User deleted successfully!');
        
        // Animate row fade out
        if (row) {
          row.classList.add('fade-out');
          setTimeout(() => {
            row.style.display = 'none';
          }, 500);
        }
        
        // Submit the form after animation
        setTimeout(() => {
          form.submit();
        }, 600);
      } else {
        console.error('Form not found for user ID:', deleteUserId);
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
  function showSuccessToast(message = 'User deleted successfully') {
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
</body>
</html>