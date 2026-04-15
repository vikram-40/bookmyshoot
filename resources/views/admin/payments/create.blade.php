@extends('admin.layouts.app')

@section('title', 'Create Payment')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Add Payment</h2>
    <a href="{{ route('admin.payments.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.payments.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Booking</label>
                <select name="booking_id" class="form-select" required>
                    <option value="">Select Booking</option>
                    @foreach($bookings as $booking)
                        <option value="{{ $booking->id }}" {{ request('booking_id') == $booking->id ? 'selected' : '' }}>
                            #{{ $booking->id }} - {{ $booking->name }} ({{ $booking->package->name ?? 'N/A' }}) - {{ \Carbon\Carbon::parse($booking->event_date)->format('M d, Y') }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Amount</label>
                <input type="number" name="amount" class="form-control" value="{{ old('amount') }}" step="0.01" min="0" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Payment Type</label>
                <select name="payment_type" class="form-select" required>
                    <option value="advance">Advance</option>
                    <option value="full">Full</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select" required>
                    <option value="pending">Pending</option>
                    <option value="paid">Paid</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Payment Date</label>
                <input type="date" name="payment_date" class="form-control" value="{{ old('payment_date') }}">
            </div>
            <button type="submit" class="btn btn-primary">Create Payment</button>
        </form>
    </div>
</div>
@endsection