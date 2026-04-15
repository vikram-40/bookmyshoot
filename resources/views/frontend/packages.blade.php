@extends('frontend.layouts.app')

@section('title', 'Packages')

@section('content')
<section class="py-5" style="margin-top: 70px;">
    <div class="container">
        <h2 class="text-center mb-5">Our Photography Packages</h2>
        
        @if($packages->count() > 0)
            <div class="row">
                @foreach($packages as $package)
                <div class="col-md-4 mb-4" data-aos="zoom-in">
                    <div class="card package-card h-100 {{ $package->is_popular ? 'popular' : '' }}" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        @if($package->is_popular)
                            <div class="popular-badge">POPULAR</div>
                        @endif
                        <div class="card-body">
                            <h4 class="card-title text-center">{{ $package->name }}</h4>
                            <h3 class="price text-center mb-3">${{ number_format($package->price, 2) }}</h3>
                                <p class="card-text">{{ $package->description }}</p>
                                @if($package->features)
                                    <hr>
                                    <h6>Features:</h6>
                                    <ul class="list-unstyled">
                                        @foreach(explode("\n", $package->features) as $feature)
                                            @if(trim($feature))
                                                <li><i class="bi bi-check-circle text-success me-2"></i>{{ trim($feature) }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <a href="{{ route('booking') }}?package={{ $package->id }}" class="btn btn-primary w-100">Book Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center">
                <p class="text-muted">No packages available yet.</p>
            </div>
        @endif
    </div>
</section>
@endsection