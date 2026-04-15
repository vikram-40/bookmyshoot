@extends('admin.layouts.app')

@section('title', 'Create Package')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Create Package</h2>
    <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.packages.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" name="price" class="form-control" value="{{ old('price') }}" step="0.01" min="0" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Features (one per line)</label>
                <textarea name="features" class="form-control" rows="5" placeholder="Feature 1&#10;Feature 2&#10;Feature 3">{{ old('features') }}</textarea>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="is_popular" id="is_popular" value="1" {{ old('is_popular') ? 'checked' : '' }}>
                <label class="form-check-label" for="is_popular">
                    Mark as Popular Package (show badge on frontend)
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Create Package</button>
        </form>
    </div>
</div>
@endsection