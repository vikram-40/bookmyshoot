@extends('admin.layouts.app')

@section('title', 'Payments')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Payments</h2>
    <a href="{{ route('admin.payments.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-1"></i> Add Payment
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Booking</th>
                        <th>Package</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment)
                        <tr>
                            <td>{{ $payment->id }}</td>
                            <td>#{{ $payment->booking->id }}</td>
                            <td>{{ $payment->booking->package->name ?? 'N/A' }}</td>
                            <td>${{ number_format($payment->amount, 2) }}</td>
                            <td>{{ ucfirst($payment->payment_type) }}</td>
                            <td>
                                <span class="badge bg-{{ $payment->status == 'paid' ? 'success' : 'warning' }}">
                                    {{ ucfirst($payment->status) }}
                                </span>
                            </td>
                            <td>{{ $payment->payment_date ? \Carbon\Carbon::parse($payment->payment_date)->format('M d, Y') : '-' }}</td>
                            <td>
                                <a href="{{ route('admin.payments.show', $payment->id) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i>
                                </a>
                                @if($payment->status == 'pending')
                                    <a href="{{ route('admin.payments.markAsPaid', $payment->id) }}" class="btn btn-sm btn-success" onclick="return confirm('Mark as paid?')">
                                        <i class="bi bi-check"></i>
                                    </a>
                                @else
                                    <a href="{{ route('admin.payments.markAsPending', $payment->id) }}" class="btn btn-sm btn-warning" onclick="return confirm('Mark as pending?')">
                                        <i class="bi bi-arrow-counterclockwise"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $payments->links() }}
    </div>
</div>
@endsection