@extends('admin.layouts.app')

@section('title', 'Gallery Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Gallery Details</h2>
    <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                @if($gallery->type == 'image')
                    <img src="{{ asset($gallery->file_path) }}" alt="{{ $gallery->title }}" class="img-fluid">
                @else
                    <video src="{{ asset($gallery->file_path) }}" controls class="w-100"></video>
                @endif
            </div>
            <div class="col-md-6">
                <p><strong>Title:</strong> {{ $gallery->title }}</p>
                <p><strong>Type:</strong> {{ ucfirst($gallery->type) }}</p>
                <p><strong>Category:</strong> {{ $gallery->category ?? 'N/A' }}</p>
                <p><strong>Created:</strong> {{ $gallery->created_at->format('M d, Y') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection