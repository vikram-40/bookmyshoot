@extends('admin.layouts.app')

@section('title', 'Payment Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Payment Details</h2>
    <a href="{{ route('admin.payments.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back
    </a>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Payment Information</h5>
            </div>
            <div class="card-body">
                <p><strong>Booking:</strong> #{{ $payment->booking->id }}</p>
                <p><strong>Package:</strong> {{ $payment->booking->package->name ?? 'N/A' }}</p>
                <p><strong>Amount:</strong> ${{ number_format($payment->amount, 2) }}</p>
                <p><strong>Payment Type:</strong> {{ ucfirst($payment->payment_type) }}</p>
                <p><strong>Status:</strong> 
                    <span class="badge bg-{{ $payment->status == 'paid' ? 'success' : 'warning' }}">
                        {{ ucfirst($payment->status) }}
                    </span>
                </p>
                <p><strong>Payment Date:</strong> {{ $payment->payment_date ? \Carbon\Carbon::parse($payment->payment_date)->format('M d, Y') : 'N/A' }}</p>
                <p><strong>Created:</strong> {{ $payment->created_at->format('M d, Y H:i') }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Actions</h5>
            </div>
            <div class="card-body">
                @if($payment->status == 'pending')
                    <a href="{{ route('admin.payments.markAsPaid', $payment->id) }}" class="btn btn-success w-100 mb-2" onclick="return confirm('Mark as paid?')">
                        <i class="bi bi-check me-1"></i> Mark as Paid
                    </a>
                @else
                    <a href="{{ route('admin.payments.markAsPending', $payment->id) }}" class="btn btn-warning w-100 mb-2" onclick="return confirm('Mark as pending?')">
                        <i class="bi bi-arrow-counterclockwise me-1"></i> Mark as Pending
                    </a>
                @endif
                <a href="{{ route('admin.payments.edit', $payment->id) }}" class="btn btn-primary w-100 mb-2">
                    <i class="bi bi-pencil me-1"></i> Edit Payment
                </a>
                <form action="{{ route('admin.payments.destroy', $payment->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger w-100" onclick="return confirm('Are you sure?')">
                        <i class="bi bi-trash me-1"></i> Delete Payment
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection