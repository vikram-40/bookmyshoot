@extends('admin.layouts.app')

@section('title', 'Booking Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Booking Details</h2>
    <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back
    </a>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Booking Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Name:</strong> {{ $booking->name }}</p>
                        <p><strong>Email:</strong> {{ $booking->email }}</p>
                        <p><strong>Phone:</strong> {{ $booking->phone }}</p>
                        <p><strong>Package:</strong> {{ $booking->package->name ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Event Date:</strong> {{ \Carbon\Carbon::parse($booking->event_date)->format('M d, Y') }}</p>
                        <p><strong>Location:</strong> {{ $booking->event_location }}</p>
                        <p><strong>Status:</strong> 
                            <span class="badge bg-{{ $booking->status == 'confirmed' ? 'success' : ($booking->status == 'cancelled' ? 'danger' : 'warning') }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </p>
                        <p><strong>Created:</strong> {{ $booking->created_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>
                @if($booking->message)
                    <div class="mt-3">
                        <p><strong>Message:</strong></p>
                        <p>{{ $booking->message }}</p>
                    </div>
                @endif
            </div>
        </div>

        @if($booking->payments->count() > 0)
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Payments</h5>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Amount</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($booking->payments as $payment)
                            <tr>
                                <td>${{ number_format($payment->amount, 2) }}</td>
                                <td>{{ ucfirst($payment->payment_type) }}</td>
                                <td>
                                    <span class="badge bg-{{ $payment->status == 'paid' ? 'success' : 'warning' }}">
                                        {{ ucfirst($payment->status) }}
                                    </span>
                                </td>
                                <td>{{ $payment->payment_date ? \Carbon\Carbon::parse($payment->payment_date)->format('M d, Y') : 'N/A' }}</td>
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
                @if($booking->status == 'pending')
                    <a href="{{ route('admin.bookings.confirm', $booking->id) }}" class="btn btn-success w-100 mb-2" onclick="return confirm('Confirm this booking?')">
                        <i class="bi bi-check me-1"></i> Confirm Booking
                    </a>
                    <a href="{{ route('admin.bookings.cancel', $booking->id) }}" class="btn btn-danger w-100 mb-2" onclick="return confirm('Cancel this booking?')">
                        <i class="bi bi-x me-1"></i> Cancel Booking
                    </a>
                @endif
                <a href="{{ route('admin.payments.create') }}?booking_id={{ $booking->id }}" class="btn btn-primary w-100 mb-2">
                    <i class="bi bi-credit-card me-1"></i> Add Payment
                </a>
                <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger w-100" onclick="return confirm('Are you sure?')">
                        <i class="bi bi-trash me-1"></i> Delete Booking
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection