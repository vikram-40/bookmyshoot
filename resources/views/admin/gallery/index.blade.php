@extends('admin.layouts.app')

@section('title', 'Gallery')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Gallery</h2>
    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-1"></i> Add Gallery Item
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Category</th>
                        <th>File</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($galleries as $gallery)
                        <tr>
                            <td>{{ $gallery->id }}</td>
                            <td>{{ $gallery->title }}</td>
                            <td><span class="badge bg-{{ $gallery->type == 'image' ? 'info' : 'secondary' }}">{{ ucfirst($gallery->type) }}</span></td>
                            <td>{{ $gallery->category ?? '-' }}</td>
                            <td>
                                @if($gallery->type === 'image')
                                    <img src="{{ asset($gallery->file_path) }}" alt="{{ $gallery->title }}" style="width: 50px; height: 50px; object-fit: cover;" class="rounded">
                                @else
                                    <div class="position-relative d-inline-block" style="width: 50px; height: 50px; background: #343a40; border-radius: 4px;">
                                        <i class="bi bi-video-fill text-white position-absolute top-50 start-50 translate-middle" style="font-size: 20px;"></i>
                                    </div>
                                    <span class="ms-1 text-muted small">{{ substr($gallery->file_path, strrpos($gallery->file_path, '/') + 1) }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.gallery.show', $gallery->id) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.gallery.edit', $gallery->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $galleries->links() }}
    </div>
</div>
@endsection