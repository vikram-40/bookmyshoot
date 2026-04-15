@extends('frontend.layouts.app')

@section('title', 'About Us')

@section('content')
<section class="py-5" style="margin-top: 70px;">
    <div class="container">
        <h2 class="text-center mb-5">About Us</h2>
        <div class="row mb-5">
            <div class="col-md-8 mx-auto text-center">
                <p class="lead">Welcome to BookMyShoot - your trusted partner in capturing life's most precious moments.</p>
                <p>With years of experience in professional photography, we specialize in weddings, events, portraits, and commercial shoots. Our team of skilled photographers is dedicated to delivering exceptional quality and creating memories that last a lifetime.</p>
            </div>
        </div>

        <h3 class="text-center mb-4">Our Team</h3>
        @if($teamMembers->count() > 0)
            <div class="row">
                @foreach($teamMembers as $member)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                @if($member->image)
                                    <img src="{{ asset($member->image) }}" alt="{{ $member->name }}" class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                                @else
                                    <i class="bi bi-person-circle display-1 text-secondary mb-3"></i>
                                @endif
                                <h5>{{ $member->name }}</h5>
                                <p class="text-muted">{{ $member->role }}</p>
                                @if($member->description)
                                    <p>{{ $member->description }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center">
                <p class="text-muted">No team members yet.</p>
            </div>
        @endif
    </div>
</section>
@endsection