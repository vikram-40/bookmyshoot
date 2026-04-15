@extends('admin.layouts.app')

@section('title', 'Edit Package')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Package</h2>
    <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.packages.update', $package->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $package->name }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" name="price" class="form-control" value="{{ $package->price }}" step="0.01" min="0" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ $package->description }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Features (one per line)</label>
                <textarea name="features" class="form-control" rows="5">{{ $package->features }}</textarea>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="is_popular" id="is_popular" value="1" {{ $package->is_popular ? 'checked' : '' }}>
                <label class="form-check-label" for="is_popular">
                    Mark as Popular Package (show badge on frontend)
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Update Package</button>
        </form>
    </div>
</div>
@endsection