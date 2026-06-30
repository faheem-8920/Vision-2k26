@extends('admin.layout')

@section('content')

<div class="container">

    <h2 class="mb-4">
        Notifications
    </h2>

    @forelse($notifications as $notification)

        <div class="card mb-3 shadow-sm">

            <div class="card-body">

                @if(is_null($notification->read_at))
                    <span class="badge bg-danger float-end">
                        New
                    </span>
                @endif

                <h5>
                    {{ $notification->data['title'] }}
                </h5>

                <p>
                    {{ $notification->data['message'] }}
                </p>

                <small class="text-muted">
                    {{ $notification->created_at->diffForHumans() }}
                </small>

                <hr>

                <a href="/admin/notifications/read/{{ $notification->id }}"
                   class="btn btn-primary btn-sm">
                    Open
                </a>

                <form action="/admin/notifications/delete/{{ $notification->id }}"
                      method="POST"
                      class="d-inline">

                    @csrf

                    <button class="btn btn-danger btn-sm">
                        Delete
                    </button>

                </form>

            </div>

        </div>

    @empty

        <div class="alert alert-info">
            No notifications found.
        </div>

    @endforelse

</div>

@endsection