@extends('admin.layouts.app')

@section('title', 'Edit Gallery Item')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Gallery Item</h2>
    <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $gallery->title }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Type</label>
                <select name="type" class="form-select" required>
                    <option value="image" {{ $gallery->type == 'image' ? 'selected' : '' }}>Image</option>
                    <option value="video" {{ $gallery->type == 'video' ? 'selected' : '' }}>Video</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Current File</label>
                @if($gallery->type == 'image')
                    <img src="{{ asset($gallery->file_path) }}" alt="{{ $gallery->title }}" style="max-width: 200px;">
                @else
                    <video src="{{ asset($gallery->file_path) }}" controls style="max-width: 300px;"></video>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Replace File</label>
                <input type="file" name="file_path" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <input type="text" name="category" class="form-control" value="{{ $gallery->category }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection