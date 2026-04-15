@extends('admin.layouts.app')

@section('title', 'Package Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Package Details</h2>
    <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>Name:</strong> {{ $package->name }}</p>
                <p><strong>Price:</strong> ${{ number_format($package->price, 2) }}</p>
                <p><strong>Created:</strong> {{ $package->created_at->format('M d, Y') }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Description:</strong></p>
                <p>{{ $package->description ?? 'No description' }}</p>
            </div>
        </div>
        @if($package->features)
            <div class="mt-3">
                <p><strong>Features:</strong></p>
                <ul>
                    @foreach(explode("\n", $package->features) as $feature)
                        @if(trim($feature))
                            <li>{{ trim($feature) }}</li>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
@endsection