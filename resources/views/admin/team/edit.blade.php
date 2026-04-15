@extends('admin.layouts.app')

@section('title', 'Edit Team Member')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Team Member</h2>
    <a href="{{ route('admin.team.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.team.update', $teamMember->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $teamMember->name }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Role</label>
                <input type="text" name="role" class="form-control" value="{{ $teamMember->role }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Current Image</label>
                @if($teamMember->image)
                    <img src="{{ asset($teamMember->image) }}" alt="{{ $teamMember->name }}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;">
                @else
                    <p>No image</p>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Replace Image</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ $teamMember->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Team Member</button>
        </form>
    </div>
</div>
@endsection