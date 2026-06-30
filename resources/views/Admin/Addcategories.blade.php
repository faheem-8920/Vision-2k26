@extends('admin.layout')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Category · Red & White</title>
  <!-- Bootstrap 5 + Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    /* ---------- RED & WHITE THEME · ENHANCED ---------- */
    body {
      background: #f7f1f1;
      font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: center;
    }

    .card-red-white {
      background: #ffffff;
      border: none;
      border-radius: 32px;
      box-shadow: 0 20px 50px rgba(160, 20, 20, 0.12);
      transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
      position: relative;
      overflow: hidden;
      backdrop-filter: blur(2px);
    }

    .card-red-white::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 6px;
      background: linear-gradient(90deg, #b71c1c, #e53935, #b71c1c);
      background-size: 200% 100%;
      animation: shimmerRed 4s infinite;
      z-index: 2;
    }

    @keyframes shimmerRed {
      0% { background-position: -200% 0; }
      100% { background-position: 200% 0; }
    }

    .card-red-white:hover {
      transform: translateY(-6px) scale(1.003);
      box-shadow: 0 28px 60px rgba(180, 20, 20, 0.20);
    }

    /* ----- TYPOGRAPHY & ACCENTS ----- */
    .text-red-accent { color: #b71c1c; }
    .bg-red-soft { background: #fff3f3; }
    .border-red-light { border-color: #f5c2c2 !important; }

    /* ----- BUTTONS ----- */
    .btn-red {
      background: #b71c1c;
      border: none;
      color: white;
      padding: 14px 36px;
      border-radius: 60px;
      font-weight: 700;
      letter-spacing: 0.5px;
      transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      box-shadow: 0 8px 24px rgba(183, 28, 28, 0.35);
      position: relative;
      overflow: hidden;
    }

    .btn-red::after {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
      opacity: 0;
      transition: opacity 0.5s;
      transform: scale(0.8);
    }

    .btn-red:hover::after {
      opacity: 1;
      transform: scale(1);
    }

    .btn-red:hover {
      background: #a31515;
      transform: scale(1.04) translateY(-3px);
      box-shadow: 0 14px 32px rgba(183, 28, 28, 0.50);
      color: #fff;
    }

    .btn-red:active {
      transform: scale(0.96);
    }

    .btn-red i {
      transition: transform 0.3s ease;
    }
    .btn-red:hover i {
      transform: rotate(6deg) scale(1.1);
    }

    /* ----- FORM INPUTS (ELEVATED) ----- */
    .form-control-red {
      border: 2px solid #e8dcdc;
      border-radius: 20px;
      padding: 14px 20px;
      transition: all 0.3s ease;
      background: #fefcfc;
      font-weight: 450;
      font-size: 1rem;
      box-shadow: inset 0 2px 6px rgba(0,0,0,0.02);
    }

    .form-control-red:focus {
      border-color: #b71c1c;
      box-shadow: 0 0 0 6px rgba(183, 28, 28, 0.12), inset 0 2px 8px rgba(0,0,0,0.02);
      background: #ffffff;
      transform: scale(1.01);
    }

    .form-label {
      font-weight: 700;
      color: #3d2424;
      margin-bottom: 8px;
      font-size: 0.95rem;
      letter-spacing: -0.2px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .form-label i {
      color: #b71c1c;
      width: 20px;
      text-align: center;
    }

    /* ----- VALIDATION STATES (RED & GREEN) ----- */
    .was-validated .form-control-red:valid,
    .form-control-red.is-valid {
      border-color: #1e7e34;
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='22' height='22' viewBox='0 0 24 24' fill='none' stroke='%231e7e34' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='20 6 9 17 4 12'%3e%3c/polyline%3e%3c/svg%3e");
      background-repeat: no-repeat;
      background-position: right 16px center;
      background-size: 22px;
      padding-right: 50px;
    }

    .was-validated .form-control-red:invalid,
    .form-control-red.is-invalid {
      border-color: #b71c1c;
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='22' height='22' viewBox='0 0 24 24' fill='none' stroke='%23b71c1c' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'%3e%3ccircle cx='12' cy='12' r='10'%3e%3c/circle%3e%3cline x1='15' y1='9' x2='9' y2='15'%3e%3c/line%3e%3cline x1='9' y1='9' x2='15' y2='15'%3e%3c/line%3e%3c/svg%3e");
      background-repeat: no-repeat;
      background-position: right 16px center;
      background-size: 22px;
      padding-right: 50px;
    }

    .invalid-feedback, .valid-feedback {
      font-weight: 600;
      font-size: 0.85rem;
      margin-top: 8px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .invalid-feedback { color: #b71c1c; }
    .valid-feedback { color: #1e7e34; }

    /* ----- SUCCESS POP (ENHANCED) ----- */
    .success-pop {
      background: #ffffff;
      border-left: 8px solid #1e7e34;
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.12);
      border-radius: 24px;
      padding: 20px 28px;
      margin-bottom: 30px;
      animation: popIn 0.7s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      gap: 18px;
      flex-wrap: wrap;
    }

    @keyframes popIn {
      0% { opacity: 0; transform: scale(0.80) translateY(-30px); }
      100% { opacity: 1; transform: scale(1) translateY(0); }
    }

    .success-pop i:first-child {
      font-size: 2.4rem;
      color: #1e7e34;
      background: #e6f4ea;
      padding: 12px;
      border-radius: 60px;
    }

    .success-pop .pop-text {
      font-weight: 700;
      color: #1a3324;
      font-size: 1.15rem;
    }

    .success-pop .pop-sub {
      color: #3d5a4b;
      font-weight: 400;
      font-size: 0.9rem;
    }

    /* ----- CHARACTER COUNTER ----- */
    .char-counter {
      font-size: 0.8rem;
      color: #7a5a5a;
      transition: 0.2s;
      font-weight: 500;
    }
    .char-counter.limit-reached {
      color: #b71c1c;
      font-weight: 700;
    }

    /* ----- IMAGE UPLOAD PREVIEW (new) ----- */
    .image-preview-wrapper {
      display: flex;
      align-items: center;
      gap: 20px;
      flex-wrap: wrap;
      margin-top: 12px;
    }
    .image-preview {
      width: 80px;
      height: 80px;
      border-radius: 20px;
      object-fit: cover;
      border: 3px solid #f0e0e0;
      background: #faf5f5;
      transition: all 0.3s ease;
      box-shadow: 0 4px 12px rgba(0,0,0,0.04);
    }
    .image-preview:hover {
      transform: scale(1.05);
      border-color: #b71c1c;
    }
    .image-placeholder {
      width: 80px;
      height: 80px;
      border-radius: 20px;
      background: #f5eded;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #b71c1c;
      font-size: 2rem;
      border: 2px dashed #dcc8c8;
      transition: 0.3s;
    }
    .image-placeholder i {
      opacity: 0.6;
    }

    /* ----- RIBBON DECORATION ----- */
    .card-badge-ribbon {
      position: absolute;
      top: 20px;
      right: -2px;
      background: #b71c1c;
      color: white;
      padding: 6px 22px 6px 26px;
      border-radius: 40px 0 0 40px;
      font-size: 0.7rem;
      font-weight: 700;
      letter-spacing: 0.5px;
      opacity: 0.8;
      box-shadow: -6px 6px 20px rgba(183, 28, 28, 0.25);
      z-index: 3;
    }

    /* ----- RESPONSIVE ----- */
    @media (max-width: 576px) {
      .card-red-white { padding: 1.8rem !important; }
      .btn-red { width: 100%; justify-content: center; }
      .image-preview-wrapper { justify-content: center; }
    }
  </style>
</head>
<body>

<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">

      <!-- CARD -->
      <div class="card card-red-white p-4 p-md-5 position-relative">

        <div class="card-badge-ribbon">
          <i class="fa-regular fa-star me-1"></i> REQUIRED
        </div>

        <!-- HEADER -->
        <div class="d-flex align-items-center gap-3 mb-4">
          <div class="bg-red-soft p-3 rounded-4 shadow-sm" style="transition: 0.3s;">
            <i class="fa fa-list fa-2x text-red-accent" style="transition: transform 0.4s;"></i>
          </div>
          <div>
            <h3 class="fw-bold mb-0" style="color: #2d1a1a;">
              Add Category
            </h3>
            <p class="text-muted small" style="letter-spacing: 0.2px;">
              <i class="fa-regular fa-circle-check text-red-accent me-1"></i> All fields are required except description
            </p>
          </div>
        </div>

        <!-- ✅ SUCCESS POP (hidden by default) -->
        <div class="success-pop" id="successPop" style="display: none;">
          <i class="fa-regular fa-circle-check"></i>
          <div>
            <div class="pop-text"><i class="fa-regular fa-thumbs-up me-2"></i>Category added successfully!</div>
            <div class="pop-sub">The new category has been created.</div>
          </div>
          <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" onclick="document.getElementById('successPop').style.display='none'" aria-label="Close"></button>
        </div>

        <!-- ========== FORM ========== -->
        <form id="categoryForm" action="/admin/category/store" method="POST" enctype="multipart/form-data" novalidate>
          @csrf

          <!-- 1. CATEGORY NAME -->
          <div class="mb-4">
            <label for="nameInput" class="form-label">
              <i class="fa-regular fa-tag"></i> Category Name <span class="text-danger">*</span>
            </label>
            <input type="text" 
                   class="form-control form-control-red" 
                   id="nameInput" 
                   name="name" 
                   placeholder="e.g. Electronics, Fashion, Books" 
                   required
                   autofocus>
            <div class="invalid-feedback">
              <i class="fa-regular fa-circle-exclamation"></i> Category name is required.
            </div>
            <div class="valid-feedback">
              <i class="fa-regular fa-check-circle"></i> Perfect!
            </div>
          </div>

          <!-- 2. DESCRIPTION (optional with min 5 chars) -->
          <div class="mb-4">
            <label for="descInput" class="form-label">
              <i class="fa-regular fa-align-left"></i> Description <span class="text-muted fw-normal">(optional)</span>
            </label>
            <textarea class="form-control form-control-red" 
                      id="descInput" 
                      name="description" 
                      rows="3" 
                      placeholder="Write a short description (min 5 characters if provided)"
                      style="resize: vertical; min-height: 90px;"></textarea>
            <div class="d-flex justify-content-between mt-1">
              <span class="invalid-feedback" id="descInvalid" style="display: none;">
                <i class="fa-regular fa-circle-exclamation"></i> Description must be at least 5 characters.
              </span>
              <span class="valid-feedback" id="descValid" style="display: none;">
                <i class="fa-regular fa-check-circle"></i> Looks good.
              </span>
              <span class="char-counter ms-auto" id="charCounter">0 characters</span>
            </div>
          </div>

          <!-- 3. CATEGORY IMAGE (REQUIRED) -->
          <div class="mb-4">
            <label for="imageInput" class="form-label">
              <i class="fa-regular fa-image"></i> Category Image <span class="text-danger">*</span>
            </label>
            <input type="file" 
                   class="form-control form-control-red" 
                   id="imageInput" 
                   name="image" 
                   accept="image/*"
                   required
                   style="padding-top: 10px;">
            <div class="invalid-feedback" id="imageInvalid">
              <i class="fa-regular fa-circle-exclamation"></i> Please select an image.
            </div>
            <div class="valid-feedback" id="imageValid">
              <i class="fa-regular fa-check-circle"></i> Image selected.
            </div>
            <div class="form-text text-muted small mt-2">
              <i class="fa-regular fa-info-circle"></i> JPG, PNG, WEBP · Max 5MB
            </div>

            <!-- Image preview (dynamic) -->
            <div class="image-preview-wrapper">
              <div class="image-placeholder" id="imagePlaceholder">
                <i class="fa-regular fa-image"></i>
              </div>
              <img class="image-preview" id="imagePreview" src="#" alt="preview" style="display: none;">
              <span class="text-muted small" id="fileNameDisplay">No file chosen</span>
            </div>
          </div>

          <!-- SUBMIT -->
          <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
            <button class="btn btn-red btn-animate px-5 py-3" type="submit" id="submitBtn">
              <i class="fa fa-plus me-2"></i> Add Category
            </button>
          </div>

        </form>
        <!-- ========== END FORM ========== -->

        <div class="mt-4 text-center text-muted small border-top pt-3" style="border-color: #f0e0e0 !important;">
          <i class="fa-regular fa-lock me-1"></i> Secure · red & white theme
        </div>

      </div>
      <!-- end card -->

    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  (function() {
    'use strict';

    const form = document.getElementById('categoryForm');
    const nameInput = document.getElementById('nameInput');
    const descInput = document.getElementById('descInput');
    const imageInput = document.getElementById('imageInput');
    const charCounter = document.getElementById('charCounter');
    const descInvalid = document.getElementById('descInvalid');
    const descValid = document.getElementById('descValid');
    const imageInvalid = document.getElementById('imageInvalid');
    const imageValid = document.getElementById('imageValid');
    const imagePreview = document.getElementById('imagePreview');
    const imagePlaceholder = document.getElementById('imagePlaceholder');
    const fileNameDisplay = document.getElementById('fileNameDisplay');
    const successPop = document.getElementById('successPop');

    // ---------- DESCRIPTION validation + counter ----------
    function validateDescription() {
      const val = descInput.value.trim();
      const len = val.length;
      charCounter.textContent = len + ' characters';
      if (len > 0 && len < 5) {
        charCounter.classList.add('limit-reached');
        descInput.classList.add('is-invalid');
        descInput.classList.remove('is-valid');
        descInvalid.style.display = 'flex';
        descValid.style.display = 'none';
        return false;
      } else if (len >= 5) {
        charCounter.classList.remove('limit-reached');
        descInput.classList.remove('is-invalid');
        descInput.classList.add('is-valid');
        descInvalid.style.display = 'none';
        descValid.style.display = 'flex';
        return true;
      } else {
        // empty description = valid (optional)
        charCounter.classList.remove('limit-reached');
        descInput.classList.remove('is-invalid');
        descInput.classList.remove('is-valid');
        descInvalid.style.display = 'none';
        descValid.style.display = 'none';
        return true;
      }
    }

    descInput.addEventListener('input', validateDescription);

    // ---------- NAME validation ----------
    nameInput.addEventListener('input', function() {
      if (this.value.trim().length > 0) {
        this.classList.remove('is-invalid');
        this.classList.add('is-valid');
      } else {
        this.classList.remove('is-valid');
        this.classList.add('is-invalid');
      }
    });

    // ---------- IMAGE validation + preview ----------
    imageInput.addEventListener('change', function() {
      const file = this.files[0];
      if (file) {
        // validate file size (5MB)
        if (file.size > 5 * 1024 * 1024) {
          alert('Image size exceeds 5MB. Please choose a smaller file.');
          this.value = '';
          imagePreview.style.display = 'none';
          imagePlaceholder.style.display = 'flex';
          fileNameDisplay.textContent = 'No file chosen';
          this.classList.add('is-invalid');
          this.classList.remove('is-valid');
          imageInvalid.style.display = 'flex';
          imageValid.style.display = 'none';
          return;
        }
        // show preview
        const reader = new FileReader();
        reader.onload = function(e) {
          imagePreview.src = e.target.result;
          imagePreview.style.display = 'block';
          imagePlaceholder.style.display = 'none';
          fileNameDisplay.textContent = file.name;
        };
        reader.readAsDataURL(file);
        // valid
        this.classList.remove('is-invalid');
        this.classList.add('is-valid');
        imageInvalid.style.display = 'none';
        imageValid.style.display = 'flex';
      } else {
        imagePreview.style.display = 'none';
        imagePlaceholder.style.display = 'flex';
        fileNameDisplay.textContent = 'No file chosen';
        this.classList.remove('is-valid');
        this.classList.add('is-invalid');
        imageInvalid.style.display = 'flex';
        imageValid.style.display = 'none';
      }
    });

    // ---------- FORM SUBMIT (with full validation & refresh) ----------
    form.addEventListener('submit', function(event) {
      // Prevent default only for validation; we WILL submit if valid.
      let isValid = true;

      // Validate name
      const nameVal = nameInput.value.trim();
      if (nameVal === '') {
        nameInput.classList.add('is-invalid');
        nameInput.classList.remove('is-valid');
        isValid = false;
      } else {
        nameInput.classList.remove('is-invalid');
        nameInput.classList.add('is-valid');
      }

      // Validate description
      const descOk = validateDescription();
      if (!descOk) isValid = false;

      // Validate image (required)
      const imageFile = imageInput.files[0];
      if (!imageFile) {
        imageInput.classList.add('is-invalid');
        imageInput.classList.remove('is-valid');
        imageInvalid.style.display = 'flex';
        imageValid.style.display = 'none';
        isValid = false;
      } else {
        // already validated in change event
        // but ensure classes are correct
        if (imageFile.size <= 5 * 1024 * 1024) {
          imageInput.classList.remove('is-invalid');
          imageInput.classList.add('is-valid');
          imageInvalid.style.display = 'none';
          imageValid.style.display = 'flex';
        } else {
          isValid = false;
        }
      }

      if (!isValid) {
        event.preventDefault();
        event.stopPropagation();
        // scroll to first error
        const firstError = form.querySelector('.is-invalid');
        if (firstError) firstError.focus();
        return;
      }

      // If valid, we let the form submit (page will refresh).
      // But we also show success pop before submit (optional, but it will be fleeting)
      // We'll show pop and then submit after a tiny delay so user sees it.
      event.preventDefault(); // we handle submission manually to show pop then refresh

      // Show success pop
      successPop.style.display = 'flex';
      successPop.scrollIntoView({ behavior: 'smooth', block: 'center' });

      // Then submit the form after a short delay (so pop is visible)
      setTimeout(() => {
        // Re-enable default submission
        form.submit(); // this will refresh the page
      }, 800);
    });

    // ---------- initial state for image ----------
    imageInput.classList.add('is-invalid');
    imageInvalid.style.display = 'flex';
    imageValid.style.display = 'none';

    // ---------- trigger initial description counter ----------
    validateDescription();

    // Also reset image preview if no file
    imagePreview.style.display = 'none';
    imagePlaceholder.style.display = 'flex';
    fileNameDisplay.textContent = 'No file chosen';

  })();
</script>

<!-- extra polish -->
<style>
  .card-red-white .form-control-red:focus {
    border-color: #b71c1c;
    box-shadow: 0 0 0 6px rgba(183, 28, 28, 0.10), inset 0 2px 8px rgba(0,0,0,0.02);
  }
  .image-preview {
    transition: all 0.3s ease;
  }
  .image-preview:hover {
    transform: scale(1.06) rotate(1deg);
    border-color: #b71c1c;
  }
  .btn-red i {
    transition: transform 0.3s;
  }
  .btn-red:hover i {
    transform: rotate(6deg) scale(1.15);
  }
  ::-webkit-scrollbar {
    width: 8px;
    background: #f1e6e6;
  }
  ::-webkit-scrollbar-thumb {
    background: #b71c1c;
    border-radius: 12px;
  }
  ::-webkit-scrollbar-thumb:hover {
    background: #8f1414;
  }
</style>

</body>
</html>
@endsection