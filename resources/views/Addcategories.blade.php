<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<style>
    .card-hover {
        transition: all 0.3s ease;
        border-radius: 12px;
    }

    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    .btn-animate {
        transition: 0.3s ease;
    }

    .btn-animate:hover {
        transform: scale(1.05);
    }
</style>
<div class="container mt-5">

    <div class="card card-hover p-4">
        <h3 class="mb-3">
            <i class="fa fa-list me-2 text-primary"></i> Add Category
        </h3>

        <form action="/admin/category/store" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Category Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter category name" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>

            <button class="btn btn-primary btn-animate">
                <i class="fa fa-plus me-1"></i> Add Category
            </button>
        </form>
    </div>

</div>