@extends('admin.layouts.app')

@section('title', 'Team Members')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Team Members</h2>
    <a href="{{ route('admin.team.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-1"></i> Add Team Member
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teamMembers as $member)
                        <tr>
                            <td>{{ $member->id }}</td>
                            <td>
                                @if($member->image)
                                    <img src="{{ asset($member->image) }}" alt="{{ $member->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                                @else
                                    <i class="bi bi-person-circle" style="font-size: 2rem;"></i>
                                @endif
                            </td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->role }}</td>
                            <td>
                                <a href="{{ route('admin.team.show', $member->id) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.team.edit', $member->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.team.destroy', $member->id) }}" method="POST" class="d-inline">
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
        {{ $teamMembers->links() }}
    </div>
</div>
@endsection