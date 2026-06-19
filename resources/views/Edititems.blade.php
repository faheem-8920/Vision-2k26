<!DOCTYPE html>

<html>
<head>

```
<title>Edit Item</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<style>

    body{
        background:#f4f6f9;
    }

    .card{
        border:none;
        border-radius:20px;
        transition:.3s;
    }

    .card:hover{
        box-shadow:0 15px 35px rgba(0,0,0,.12);
    }

    .preview-image{
        width:120px;
        height:120px;
        object-fit:cover;
        border-radius:12px;
        margin-right:10px;
        margin-bottom:10px;
    }

    .btn{
        transition:.3s;
    }

    .btn:hover{
        transform:translateY(-2px);
    }

</style>
```

</head>

<body>

<div class="container py-5">

```
<div class="row justify-content-center">

    <div class="col-lg-10">

        <div class="card p-4">

            <h2 class="mb-4">

                <i class="fa-solid fa-pen-to-square text-warning"></i>

                Edit Item

            </h2>

            <form action="/owner/item/{{ $item->id }}/update"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">

                    <label class="form-label">

                        Item Title

                    </label>

                    <input type="text"
                           name="title"
                           value="{{ $item->title }}"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Category

                    </label>

                    <select name="category_id"
                            class="form-select">

                        @foreach($categories as $category)

                            <option value="{{ $category->id }}"
                                {{ $item->category_id == $category->id ? 'selected' : '' }}>

                                {{ $category->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">

                    <label>Description</label>

                    <textarea name="description"
                              rows="4"
                              class="form-control">{{ $item->description }}</textarea>

                </div>

                <div class="row">

                    <div class="col-md-4">

                        <label>Rent Per Day</label>

                        <input type="number"
                               name="rent_price_per_day"
                               value="{{ $item->rent_price_per_day }}"
                               class="form-control">

                    </div>

                    <div class="col-md-4">

                        <label>Security Deposit</label>

                        <input type="number"
                               name="security_deposit"
                               value="{{ $item->security_deposit }}"
                               class="form-control">

                    </div>

                    <div class="col-md-4">

                        <label>Replacement Cost</label>

                        <input type="number"
                               name="replacement_cost"
                               value="{{ $item->replacement_cost }}"
                               class="form-control">

                    </div>

                </div>

                <br>

                <div class="row">

                    <div class="col-md-6">

                        <label>City</label>

                        <input type="text"
                               name="city"
                               value="{{ $item->city }}"
                               class="form-control">

                    </div>

                    <div class="col-md-6">

                        <label>Quantity</label>

                        <input type="number"
                               name="quantity"
                               value="{{ $item->quantity }}"
                               class="form-control">

                    </div>

                </div>

                <br>

                <div class="mb-3">

                    <label>Address</label>

                    <textarea name="address"
                              rows="3"
                              class="form-control">{{ $item->address }}</textarea>

                </div>

                <hr>

                <h5>

                    <i class="fa-solid fa-images text-primary"></i>

                    Current Images

                </h5>

                <div class="mb-4">

                    @foreach($item->images as $image)

                        <img src="{{ asset('uploads/items/'.$image->image) }}"
                             class="preview-image">

                    @endforeach

                </div>

                <div class="mb-4">

                    <label>

                        Upload New Images

                    </label>

                    <input type="file"
                           name="images[]"
                           multiple
                           class="form-control">

                </div>

                <div class="d-flex gap-2">

                    <button class="btn btn-success">

                        <i class="fa-solid fa-floppy-disk"></i>

                        Update Item

                    </button>

                    <a href="/owner/items"
                       class="btn btn-secondary">

                        Back

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>
```

</div>

</body>
</html>
