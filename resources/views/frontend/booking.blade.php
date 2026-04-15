@extends('frontend.layouts.app')

@section('title', 'Book Now')

@section('content')
<section class="py-5" style="margin-top: 70px;">
    <div class="container">
        <h2 class="text-center mb-2">
            <span class="section-title">Book Your Session</span>
        </h2>
        <p class="text-center text-muted mb-5">Fill out the form below and we'll get back to you within 24 hours.</p>
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        @if(session('warning'))
            <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                {{ session('warning') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center">
                <i class="bi bi-x-circle-fill me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card booking-card">
                    <div class="card-body p-5">
<form action="{{ route('booking.store') }}" method="POST">
                            @csrf
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Full Name" required>
                                        <label for="name">
                                            <i class="bi bi-person me-1"></i> Full Name <span class="text-danger">*</span>
                                        </label>
                                    </div>
                                    @error('name')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Phone" required>
                                        <label for="phone">
                                            <i class="bi bi-telephone me-1"></i> Phone Number <span class="text-danger">*</span>
                                        </label>
                                    </div>
                                    @error('phone')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row g-3 mt-2">
                                <div class="col-12">
                                    <label class="form-label fw-medium">Email Address <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="your@email.com" required>
                                    </div>
                                    @error('email')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row g-3 mt-2">
                                <div class="col-12">
                                    <label class="form-label fw-medium">Select Package <span class="text-danger">*</span></label>
                                    <select name="package_id" class="form-select" required>
                                        <option value="">Choose a Package</option>
                                        @foreach($packages as $package)
                                            <option value="{{ $package->id }}" {{ request('package') == $package->id ? 'selected' : '' }}>
                                                {{ $package->name }} - ${{ number_format($package->price, 2) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('package_id')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row g-3 mt-2">
                                <div class="col-md-6">
                                    <label class="form-label fw-medium">Event Date <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                        <input type="date" name="event_date" class="form-control" value="{{ old('event_date') }}" required>
                                    </div>
                                    @error('event_date')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-medium">Event Location <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                                        <input type="text" name="event_location" class="form-control" value="{{ old('event_location') }}" placeholder="Event venue address" required>
                                    </div>
                                    @error('event_location')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row g-3 mt-2">
                                <div class="col-12">
                                    <label class="form-label fw-medium">Additional Message</label>
                                    <textarea name="message" class="form-control" rows="4" placeholder="Any special requirements, themes, or notes for your session...">{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary btn-lg w-100">
                                    <i class="bi bi-send me-2"></i>Submit Booking Request
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection