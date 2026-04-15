@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')
<section class="hero-section vh-100 position-relative overflow-hidden d-flex align-items-center text-white text-center">
    <!-- Background Video -->
    <video autoplay muted loop playsinline class="position-absolute w-100 h-100 object-fit-cover" poster="https://images.unsplash.com/photo-1519721483858-62e1b77a5b95?w=1920">
        <source src="{{ asset('storage/default-hero.mp4') }}" type="video/mp4">
        <!-- Fallback image -->
    </video>
    
    <!-- Dark Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>
    
    <!-- Content -->
    <div class="container position-relative z-2">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-6">
                <h1 class="display-2 fw-bold mb-4 fade-in-up">Capture Your Precious Moments</h1>
                <p class="lead fs-3 opacity-90 mb-5 fade-in-up delay-1">Professional photography services for weddings, events, portraits, and commercial shoots.</p>
                <div class="d-flex gap-3 justify-content-center flex-wrap fade-in-up delay-2">
                    <a href="{{ route('booking') }}" class="btn btn-primary btn-lg hero-btn px-5 py-3 fs-5">
                        <i class="bi bi-calendar-check me-3"></i>Book Now
                    </a>
                    <a href="{{ route('gallery') }}" class="btn btn-outline-light btn-lg px-4 py-3">
                        <i class="bi bi-images me-2"></i>View Gallery
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
<h2 class="text-center mb-5" data-aos="fade-up" data-aos-delay="100">
            <span class="section-title">Our Packages</span>
        </h2>
        <div class="row g-4" data-aos="fade-up" data-aos-delay="200">
            @forelse($packages as $package)
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="card package-card h-100 {{ $package->is_popular ? 'popular' : '' }}">
                        @if($package->is_popular)
                            <div class="popular-badge">POPULAR</div>
                        @endif
                        <div class="card-header text-center">
                            <h4 class="mb-0">{{ $package->name }}</h4>
                        </div>
                        <div class="card-body text-center">
                            <div class="price mb-3">${{ number_format($package->price, 2) }} <span>/session</span></div>
                            <p class="card-text">{{ $package->description }}</p>
                            @if($package->features)
                                <ul class="list-unstyled text-start mx-auto" style="max-width: 200px;">
                                    @foreach(explode("\n", $package->features) as $feature)
                                        @if(trim($feature))
                                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>{{ trim($feature) }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="card-footer bg-transparent border-0 text-center pb-4">
                            <a href="{{ route('booking') }}?package={{ $package->id }}" class="btn btn-primary">
                                <i class="bi bi-calendar-plus me-2"></i>Book This Package
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-box-seam display-1 text-muted mb-3"></i>
                    <p class="text-muted fs-5">No packages available yet. Check back soon!</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<section class="py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
    <div class="container">
        <h2 class="text-center mb-5" data-aos="fade-down" data-aos-delay="100">
            <span class="section-title">Why Choose Us</span>
        </h2>
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-card text-center">
                    <div class="feature-icon">
                        <i class="bi bi-camera-fill"></i>
                    </div>
                    <h4 class="mb-3">Professional Equipment</h4>
                    <p class="text-muted mb-0">We use state-of-the-art cameras, lenses, and lighting equipment to capture your moments beautifully.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="400">
                <div class="feature-card text-center">
                    <div class="feature-icon">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <h4 class="mb-3">Timely Delivery</h4>
                    <p class="text-muted mb-0">We understand the importance of time and deliver your professionally edited photos promptly.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="600">
                <div class="feature-card text-center">
                    <div class="feature-icon">
                        <i class="bi bi-heart-fill"></i>
                    </div>
                    <h4 class="mb-3">Customer Satisfaction</h4>
                    <p class="text-muted mb-0">Your satisfaction is our top priority. We work closely with you until you're completely happy.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="mb-4">Ready to Book Your Session?</h2>
                <p class="fs-5 text-muted">Book your photography session today and let us capture your special moments. Our team is ready to make your vision come true.</p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="{{ route('booking') }}" class="btn btn-primary btn-lg">
                        <i class="bi bi-calendar-check me-2"></i>Book Now
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-primary btn-lg">
                        <i class="bi bi-chat-dots me-2"></i>Contact Us
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row g-4">
                    <div class="col-6">
                        <div class="text-center p-4 rounded-3" style="background: #f8f9fa;">
                            <i class="bi bi-calendar-check display-4 text-primary mb-2"></i>
                            <h3 class="mb-0">500+</h3>
                            <p class="mb-0 text-muted">Sessions Completed</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-center p-4 rounded-3" style="background: #f8f9fa;">
                            <i class="bi bi-people display-4 text-primary mb-2"></i>
                            <h3 class="mb-0">200+</h3>
                            <p class="mb-0 text-muted">Happy Clients</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection