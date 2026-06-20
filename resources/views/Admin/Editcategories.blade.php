<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body{
            background:#f8f9fa;
        }

        .card{
            border:none;
            border-radius:15px;
            transition:.3s;
        }

        .card:hover{
            transform:translateY(-5px);
            box-shadow:0 10px 25px rgba(0,0,0,.15);
        }

        .btn{
            transition:.3s;
        }

        .btn:hover{
            transform:scale(1.05);
        }
    </style>
</head>
<body>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card p-4">

                <h3 class="mb-4">
                    <i class="fa-solid fa-pen-to-square text-warning"></i>
                    Update Category
                </h3>

                <form action="/admin/category/{{ $category->id }}/update" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Category Name</label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ $category->name }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>

                        <textarea name="description"
                                  class="form-control"
                                  rows="4">{{ $category->description }}</textarea>
                    </div>

                    <button class="btn btn-primary">
                        <i class="fa-solid fa-floppy-disk"></i>
                        Update Category
                    </button>

                    <a href="/admin/categories"
                       class="btn btn-secondary">
                        Back
                    </a>

                </form>

            </div>

        </div>

    </div>

</div>

</body>
</html>