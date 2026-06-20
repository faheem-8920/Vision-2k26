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

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>
            <i class="fa fa-layer-group text-success me-2"></i> Categories
        </h3>

        <a href="/addcategory" class="btn btn-success btn-animate">
            <i class="fa fa-plus"></i> Add New
        </a>
    </div>

    <div class="row">
        @foreach($categories as $category)
        <div class="col-md-4 mb-3">

            <div class="card card-hover p-3">

                <h5>
                    <i class="fa fa-tag text-primary me-1"></i>
                    {{ $category->name }}
                </h5>

                <p class="text-muted">
                    {{ $category->description ?? 'No description' }}
                </p>

                <div class="d-flex gap-2">

                    <!-- EDIT -->
                    <a href="/admin/category/{{ $category->id }}/edit"
                       class="btn btn-warning btn-sm btn-animate">
                        <i class="fa fa-edit">Update</i>
                    </a>

                    <!-- DELETE -->
                    <form action="/admin/category/{{ $category->id }}" method="POST"
                          onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm btn-animate">
                            <i class="fa fa-trash">Delete</i>
                        </button>
                    </form>

                </div>

            </div>

        </div>
        @endforeach
    </div>

</div>