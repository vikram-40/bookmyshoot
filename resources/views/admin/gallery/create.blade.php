@extends('admin.layouts.app')

@section('title', 'Create Gallery Item')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Add Gallery Item</h2>
    <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Type</label>
                <select name="type" class="form-select" required>
                    <option value="image">Image</option>
                    <option value="video">Video</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">File</label>
                <input type="file" name="file_path" class="form-control" required>
                <small class="text-muted">Images: jpg, jpeg, png, gif | Videos: mp4, mov, avi, webm</small>
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <input type="text" name="category" class="form-control" value="{{ old('category') }}" placeholder="e.g., Wedding, Portrait">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection