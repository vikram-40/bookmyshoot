@extends('admin.layouts.app')

@section('title', 'Edit Booking')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Booking</h2>
    <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Event Date</label>
                    <input type="date" name="event_date" class="form-control" value="{{ $booking->event_date }}" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Event Location</label>
                    <input type="text" name="event_location" class="form-control" value="{{ $booking->event_location }}" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Message</label>
                    <textarea name="message" class="form-control" rows="3">{{ $booking->message }}</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Booking</button>
        </form>
    </div>
</div>
@endsection