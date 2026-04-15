@extends('admin.layouts.app')

@section('title', 'Client Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Client Details</h2>
    <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back
    </a>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Client Information</h5>
            </div>
            <div class="card-body">
                <p><strong>Name:</strong> {{ $client->name }}</p>
                <p><strong>Email:</strong> {{ $client->email }}</p>
                <p><strong>Phone:</strong> {{ $client->phone }}</p>
                <p><strong>Address:</strong> {{ $client->address ?? 'N/A' }}</p>
                <p><strong>Created:</strong> {{ $client->created_at->format('M d, Y') }}</p>
            </div>
        </div>

        @if($client->bookings->count() > 0)
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Bookings ({{ $client->bookings->count() }})</h5>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Package</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($client->bookings as $booking)
                            <tr>
                                <td>{{ $booking->package->name ?? 'N/A' }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->event_date)->format('M d, Y') }}</td>
                                <td>
                                    <span class="badge bg-{{ $booking->status == 'confirmed' ? 'success' : ($booking->status == 'cancelled' ? 'danger' : 'warning') }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Actions</h5>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.clients.edit', $client->id) }}" class="btn btn-warning w-100 mb-2">
                    <i class="bi bi-pencil me-1"></i> Edit Client
                </a>
                <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger w-100" onclick="return confirm('Are you sure?')">
                        <i class="bi bi-trash me-1"></i> Delete Client
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection