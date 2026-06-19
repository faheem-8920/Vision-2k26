<!DOCTYPE html>

<html>
<head>
    <title>My Items</title>

```
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<style>

    body{
        background:#f4f6f9;
    }

    .item-card{
        border:none;
        border-radius:18px;
        overflow:hidden;
        transition:all .35s ease;
    }

    .item-card:hover{
        transform:translateY(-8px);
        box-shadow:0 15px 35px rgba(0,0,0,.15);
    }

    .item-image{
        height:240px;
        object-fit:cover;
        width:100%;
    }

    .price{
        font-size:22px;
        font-weight:700;
        color:#dc3545;
    }

    .badge-custom{
        background:#0d6efd;
        padding:8px 12px;
        border-radius:20px;
        color:white;
    }

    .action-btn{
        transition:.3s;
    }

    .action-btn:hover{
        transform:scale(1.08);
    }

    .page-title{
        font-weight:700;
    }

    .empty-box{
        background:white;
        border-radius:20px;
        padding:50px;
        text-align:center;
    }

</style>
```

</head>

<body>

<div class="container py-5">

```
<div class="d-flex justify-content-between align-items-center mb-4">

    <h2 class="page-title">
        <i class="fa-solid fa-box-open text-primary"></i>
        My Items
    </h2>

    <a href="/owner/items/create"
       class="btn btn-primary">
        <i class="fa-solid fa-plus"></i>
        Add Item
    </a>

</div>

@if(session('success'))

    <div class="alert alert-success">
        {{ session('success') }}
    </div>

@endif

@if($items->count())

<div class="row">

    @foreach($items as $item)

    <div class="col-lg-4 col-md-6 mb-4">

        <div class="card item-card h-100">

            @if($item->images->count())

                <img src="{{ asset('uploads/items/'.$item->images->first()->image) }}"
                     class="item-image">

            @else

                <img src="https://via.placeholder.com/600x400?text=No+Image"
                     class="item-image">

            @endif

            <div class="card-body">

                <div class="d-flex justify-content-between mb-2">

                    <span class="badge-custom">
                        {{ $item->category->name }}
                    </span>

                    <span class="badge bg-success">
                        {{ $item->status }}
                    </span>

                </div>

                <h4 class="mt-3">
                    {{ $item->title }}
                </h4>

                <p class="text-muted">

                    {{ Str::limit($item->description,80) }}

                </p>

                <div class="price mb-3">

                    Rs {{ number_format($item->rent_price_per_day) }}

                    <small class="text-muted fs-6">
                        / day
                    </small>

                </div>

                <div class="row text-center mb-3">

                    <div class="col-6">

                        <strong>
                            {{ $item->quantity }}
                        </strong>

                        <br>

                        <small class="text-muted">
                            Quantity
                        </small>

                    </div>

                    <div class="col-6">

                        <strong>
                            {{ $item->city }}
                        </strong>

                        <br>

                        <small class="text-muted">
                            City
                        </small>

                    </div>

                </div>

                <div class="d-flex justify-content-between">

                    <a href="/owner/item/{{ $item->id }}/edit"
                       class="btn btn-warning action-btn">

                        <i class="fa-solid fa-pen"></i>

                    </a>

                    <form action="/owner/item/{{ $item->id }}"
                          method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger action-btn"
                                onclick="return confirm('Delete this item?')">

                            <i class="fa-solid fa-trash"></i>

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

    @endforeach

</div>

@else

<div class="empty-box">

    <i class="fa-solid fa-box-open fa-4x text-secondary mb-3"></i>

    <h3>No Items Found</h3>

    <p class="text-muted">
        Start by adding your first rental item.
    </p>

    <a href="/owner/items/create"
       class="btn btn-primary">

        Add Item

    </a>

</div>

@endif
```

</div>

</body>
</html>
