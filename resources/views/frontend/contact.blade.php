@extends('frontend.layouts.app')

@section('title', 'Contact Us')

@section('content')
<section class="py-5" style="margin-top: 70px;">
    <div class="container">
        <h2 class="text-center mb-5">Contact Us</h2>
        
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="mb-4">Get in Touch</h4>
                        <div class="mb-3">
                            <i class="bi bi-geo-alt text-primary me-3"></i>
                            <span>123 Photography Street, City, Country</span>
                        </div>
                        <div class="mb-3">
                            <i class="bi bi-telephone text-primary me-3"></i>
                            <span>+1 234 567 890</span>
                        </div>
                        <div class="mb-3">
                            <i class="bi bi-envelope text-primary me-3"></i>
                            <span>info@bookmyshoot.com</span>
                        </div>
                        <div class="mb-3">
                            <i class="bi bi-clock text-primary me-3"></i>
                            <span>Mon - Sat: 9:00 AM - 6:00 PM</span>
                        </div>
                        
                        <div class="mt-4">
                            <h5>Follow Us</h5>
                            <a href="#" class="btn btn-outline-primary btn-sm me-2"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="btn btn-outline-primary btn-sm me-2"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="btn btn-outline-primary btn-sm me-2"><i class="bi bi-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="mb-4">Send us a Message</h4>
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" placeholder="Your Name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="Your Email">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input type="tel" class="form-control" placeholder="Your Phone">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Message</label>
                                <textarea class="form-control" rows="4" placeholder="Your Message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection