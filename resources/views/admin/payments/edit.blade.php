@extends('admin.layouts.app')

@section('title', 'Edit Payment')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Payment</h2>
    <a href="{{ route('admin.payments.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.payments.update', $payment->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Booking</label>
                <select name="booking_id" class="form-select" required>
                    @foreach($bookings as $booking)
                        <option value="{{ $booking->id }}" {{ $payment->booking_id == $booking->id ? 'selected' : '' }}>
                            #{{ $booking->id }} - {{ $booking->name }} ({{ $booking->package->name ?? 'N/A' }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Amount</label>
                <input type="number" name="amount" class="form-control" value="{{ $payment->amount }}" step="0.01" min="0" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Payment Type</label>
                <select name="payment_type" class="form-select" required>
                    <option value="advance" {{ $payment->payment_type == 'advance' ? 'selected' : '' }}>Advance</option>
                    <option value="full" {{ $payment->payment_type == 'full' ? 'selected' : '' }}>Full</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select" required>
                    <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="paid" {{ $payment->status == 'paid' ? 'selected' : '' }}>Paid</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Payment Date</label>
                <input type="date" name="payment_date" class="form-control" value="{{ $payment->payment_date }}">
            </div>
            <button type="submit" class="btn btn-primary">Update Payment</button>
        </form>
    </div>
</div>
@endsection