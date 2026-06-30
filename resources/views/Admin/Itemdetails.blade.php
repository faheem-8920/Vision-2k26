@extends('admin.layout')

@section('content')

<div class="card">

    <div class="card-header">
        Item Details
    </div>

    <div class="card-body">

        <p><strong>ID:</strong> {{ $item->id }}</p>

        <p><strong>Title:</strong> {{ $item->title }}</p>

        <p><strong>Description:</strong> {{ $item->description }}</p>

        <p><strong>Owner:</strong>
            {{ $item->user->name }}
        </p>

        <p><strong>Category:</strong>
            {{ $item->category->name }}
        </p>

        <p><strong>Rent Per Day:</strong>
            Rs {{ $item->rent_price_per_day }}
        </p>

        <p><strong>Security Deposit:</strong>
            Rs {{ $item->security_deposit }}
        </p>

        <p><strong>Replacement Cost:</strong>
            Rs {{ $item->replacement_cost }}
        </p>

        <p><strong>Quantity:</strong>
            {{ $item->quantity }}
        </p>

        <p><strong>City:</strong>
            {{ $item->city }}
        </p>

        <p><strong>Address:</strong>
            {{ $item->address }}
        </p>

        <p><strong>Status:</strong>
            {{ ucfirst($item->status) }}
        </p>

        <a href="/admin/items"
           class="btn btn-secondary">
            Back
        </a>

    </div>

</div>

@endsection