@extends('admin.layouts.app')

@section('title', 'Packages')

@section('content')
<div class="page-header">
    <h2><i class="bi bi-box-seam me-2"></i>Packages</h2>
    <a href="{{ route('admin.packages.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-1"></i> Add Package
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Created</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($packages as $package)
                        <tr>
                            <td class="ps-4">#{{ $package->id }}</td>
                            <td class="fw-medium">{{ $package->name }}</td>
                            <td><span class="badge bg-success bg-opacity-10 text-success">${{ number_format($package->price, 2) }}</span></td>
                            <td>{{ Str::limit($package->description, 50) }}</td>
                            <td class="text-muted">{{ $package->created_at->format('M d, Y') }}</td>
                            <td class="text-end pe-4">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.packages.show', $package->id) }}" class="btn btn-sm btn-outline-info">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.packages.edit', $package->id) }}" class="btn btn-sm btn-outline-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.packages.destroy', $package->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <i class="bi bi-box-seam display-1 text-muted mb-3"></i>
                                <p class="text-muted mb-0">No packages found. Create your first package!</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($packages->hasPages())
        <div class="card-footer bg-white">
            {{ $packages->links() }}
        </div>
    @endif
</div>
@endsection