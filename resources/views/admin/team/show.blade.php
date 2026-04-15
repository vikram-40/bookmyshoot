@extends('admin.layouts.app')

@section('title', 'Team Member Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-people me-2"></i>Team Member Details</h2>
    <a href="{{ route('admin.team.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back
    </a>
</div>

@if(!$teamMember)
<div class="alert alert-warning">
    <i class="bi bi-exclamation-triangle me-2"></i>Team member not found.
</div>
@else
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center">
                @if($teamMember->image)
                    <img src="{{ asset($teamMember->image) }}" alt="{{ $teamMember->name }}" class="img-fluid rounded-circle" style="max-width: 200px;">
                @else
                    <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 200px; height: 200px;">
                        <i class="bi bi-person-circle text-muted" style="font-size: 5rem;"></i>
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <table class="table table-borderless">
                    <tr>
                        <td class="text-muted" style="width: 120px;">Name:</td>
                        <td class="fw-medium">{{ $teamMember->name }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Role:</td>
                        <td>{{ $teamMember->role }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Description:</td>
                        <td>{{ $teamMember->description ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Created:</td>
                        <td>{{ $teamMember->created_at ? $teamMember->created_at->format('M d, Y') : 'N/A' }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endif
@endsection