<!DOCTYPE html>
<html>
<head>

<title>Add Item</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<style>

body{
    background:#f5f7fb;
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

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card p-4">

        <h3 class="mb-4">
            <i class="fa-solid fa-box text-primary"></i>
            Add New Item
        </h3>

        <form action="/owner/items/store" method="POST">

            @csrf

            <div class="mb-3">
                <label>Item Title</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="mb-3">
                <label>Category</label>

                <select name="category_id" class="form-select">

                    @foreach($categories as $category)

                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <div class="row">

                <div class="col-md-4">
                    <label>Rent Per Day</label>
                    <input type="number" name="rent_price_per_day" class="form-control">
                </div>

                <div class="col-md-4">
                    <label>Security Deposit</label>
                    <input type="number" name="security_deposit" class="form-control">
                </div>

                <div class="col-md-4">
                    <label>Replacement Cost</label>
                    <input type="number" name="replacement_cost" class="form-control">
                </div>

            </div>

            <br>

            <div class="row">

                <div class="col-md-6">
                    <label>City</label>
                    <input type="text" name="city" class="form-control">
                </div>

                <div class="col-md-6">
                    <label>Quantity</label>
                    <input type="number" name="quantity" class="form-control">
                </div>

            </div>

            <br>

            <div class="mb-3">
                <label>Address</label>
                <textarea name="address" class="form-control"></textarea>
            </div>

            <button class="btn btn-primary">
                <i class="fa-solid fa-plus"></i>
                Add Item
            </button>

        </form>

    </div>

</div>

</body>
</html>