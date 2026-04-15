<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BookMyShoot') - Professional Photography Services</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>


            --accent-color: #3498db;
            --gold-color: #D4AF37;
        }
        
.main-navbar {
            background: transparent !important;
            backdrop-filter: blur(0px);
            box-shadow: none;
            transition: all 0.4s ease;
            height: 80px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        
        .navbar-scrolled {
            background: linear-gradient(135deg, rgba(15,23,42,0.98) 0%, rgba(30,41,62,0.98) 100%) !important;
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            box-shadow: 0 4px 25px rgba(0,0,0,0.25);
            height: 70px;
            padding-top: 5px;
            padding-bottom: 5px;
        }
        
        body {
            padding-top: 0 !important;
        }
        
        .main-content {
            position: relative;
            z-index: 1;
            background: #fff;
            min-height: 100vh;
        }
        
        .navbar-scrolled {
            background: linear-gradient(135deg, rgba(15,23,42,0.98) 0%, rgba(30,41,62,0.98) 100%) !important;
            box-shadow: 0 4px 25px rgba(0,0,0,0.25);
            animation: slideDown 0.4s ease-out;
        }
        
        @keyframes slideDown {
            from { transform: translateY(-100%); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        .main-navbar {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .navbar-brand {
            font-weight: 800;
            font-size: 1.6rem;
            transition: all 0.3s ease;
        }
        
        .navbar-brand .text-warning {
            color: #D4AF37 !important;
        }
        
        .nav-link {
            color: rgba(255,255,255,0.85) !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            transition: all 0.3s ease;
            border-radius: 4px;
            position: relative;
        }
        
        .nav-link:hover {
            color: #fff !important;
            background: rgba(255,255,255,0.15);
            transform: translateY(-2px);
        }
        
        .nav-link.active {
            color: #D4AF37 !important;
            background: rgba(212,175,55,0.2);
            font-weight: 600;
        }
        
        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 30px;
            height: 3px;
            background: #D4AF37;
            border-radius: 2px;
        }
        
        .hero-section {
            min-height: 100vh;
        }
        
        .hero-section video {
            z-index: 1;
        }
        
        /* Fade-in animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in-up {
            animation: fadeInUp 1s ease-out forwards;
        }
        
        .delay-1 {
            animation-delay: 0.3s;
        }
        
        .delay-2 {
            animation-delay: 0.6s;
        }
        
        /* Hero button hover */
        .hero-btn {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .hero-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.6s;
        }
        
        .hero-btn:hover::before {
            left: 100%;
        }
        
        .hero-btn:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 15px 40px rgba(52,152,219,0.4);
        }
        
        /* Gallery Styles */
        .gallery-card {
            transition: all 0.4s ease;
            cursor: pointer;
        }
        
        .gallery-card:hover {
            transform: scale(1.03);
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }
        
        .play-overlay, .hover-overlay {
            transition: all 0.3s ease;
        }
        
        .gallery-card:hover .hover-overlay {
            opacity: 0.8 !important;
        }
        
        /* Filter buttons */
        .filter-btn {
            transition: all 0.3s ease;
            border-radius: 25px;
            padding: 0.5rem 1.5rem;
        }
        
        .filter-btn.active, .filter-btn:hover {
            background-color: var(--accent-color) !important;
            border-color: var(--accent-color) !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(52,152,219,0.3);
        }
        
        /* Booking Form Styles */
        .booking-card {
            border: none;
            border-radius: 2rem;
            background: linear-gradient(145deg, rgba(255,255,255,0.95), rgba(248,250,252,0.9));
            backdrop-filter: blur(20px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.1);
            transition: all 0.4s ease;
        }
        
        .booking-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 35px 70px rgba(0,0,0,0.15);
        }
        
        .form-floating > .form-control:focus ~ label,
        .form-floating > .form-select:focus ~ label {
            color: var(--accent-color);
            transform: scale(0.9) translateY(-0.5rem);
        }
        
        .form-floating > .form-control:focus,
        .form-floating > .form-select:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.2rem rgba(52,152,219,0.2);
            padding-top: 1.625rem;
            padding-bottom: 0.625rem;
        }
        
        .form-floating > label {
            transition: all 0.3s ease;
            color: #6b7280;
        }
        
        .booking-submit {
            background: linear-gradient(135deg, var(--accent-color), #2980b9);
            border: none;
            border-radius: 1.5rem;
            font-weight: 700;
            font-size: 1.1rem;
            padding: 1rem 3rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .booking-submit:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 20px 40px rgba(52,152,219,0.4);
        }
        
        .booking-submit:active {
            transform: translateY(-1px);
        }
        
        .hero-section .container {
            position: relative;
            z-index: 1;
        }
        
        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .hero-section .lead {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .btn-primary {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            padding: 0.75rem 2rem;
            font-weight: 600;
            border-radius: 0.5rem;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(52,152,219,0.4);
        }
        
        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 1rem;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: var(--accent-color);
            border-radius: 2px;
        }
        
        .package-card {
            border: none;
            border-radius: 1rem;
            overflow: hidden;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        
        .package-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }
        
        .package-card .card-header {
            background: var(--accent-color);
            color: white;
            padding: 1.5rem;
            border: none;
        }
        
        .package-card {
            border: none;
            border-radius: 1.25rem;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            position: relative;
            background: white;
        }
        
        .package-card.popular {
            border: 2px solid #D4AF37;
            box-shadow: 0 20px 40px rgba(212,175,55,0.2);
            transform: scale(1.02);
        }
        
        .popular-badge {
            position: absolute;
            top: -10px;
            right: 20px;
            background: linear-gradient(45deg, #D4AF37, #F59E0B);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-size: 0.8rem;
            font-weight: 700;
            box-shadow: 0 4px 15px rgba(212,175,55,0.4);
            z-index: 2;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .package-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
        }
        
        .package-card .card-header {
            background: linear-gradient(135deg, var(--accent-color), #2980b9);
            color: white;
            padding: 1.5rem;
            position: relative;
        }
        
        .package-card .price {
            font-size: 2.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, #FFD700, #FFA500);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .package-card .price span {
            font-size: 1rem;
            font-weight: 500;
            color: #666;
        }
        
        .gallery-item {
            overflow: hidden;
            border-radius: 0.75rem;
            position: relative;
        }
        
        .gallery-item img, .gallery-item video {
            transition: transform 0.5s;
            width: 100%;
            height: 280px;
            object-fit: cover;
        }
        
        .gallery-item:hover img, .gallery-item:hover video {
            transform: scale(1.1);
        }
        
        .gallery-item::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.5) 0%, transparent 50%);
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .gallery-item:hover::after {
            opacity: 1;
        }
        
        .feature-card {
            padding: 2rem;
            border-radius: 1rem;
            background: white;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
        }
        
        .feature-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--accent-color), #2c3e50);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            color: white;
            margin: 0 auto 1.5rem;
        }
        
        .footer {
            background: var(--primary-color);
            color: white;
            padding: 60px 0 20px;
            margin-top: 80px;
        }
        
        .footer h5 {
            font-weight: 600;
            margin-bottom: 1.5rem;
        }
        
        .footer a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer a:hover {
            color: white;
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            margin-top: 30px;
            padding-top: 20px;
        }
        
        .team-card {
            border: none;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }
        
        .team-card img {
            height: 250px;
            object-fit: cover;
        }
        
        .contact-card {
            border-radius: 1rem;
            padding: 2rem;
            background: white;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            height: 100%;
        }
        
        .contact-icon {
            width: 50px;
            height: 50px;
            border-radius: 0.75rem;
            background: var(--accent-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.25rem;
        }
        
        @media (max-width: 991px) {
            .navbar-collapse {
                background: rgba(15,23,42,0.98);
                padding: 1rem;
                border-radius: 0.5rem;
                margin-top: 0.5rem;
            }
            
            .navbar-collapse.show {
                animation: slideDown 0.3s ease-out;
            }
            
            .nav-link {
                padding: 0.75rem 1rem !important;
                border-radius: 0.5rem;
            }
            
            .nav-link:hover {
                background: rgba(255,255,255,0.1);
            }
            
            .nav-link.active {
                background: rgba(212,175,55,0.2);
            }
            
            .nav-link.active::after {
                display: none;
            }
            
            .navbar-toggler {
                padding: 0.25rem 0.75rem;
                border-radius: 0.25rem;
            }
            
            .hero-section {
                padding: 100px 0;
            }
            
            .hero-section h1 {
                font-size: 2rem;
            }
            
            .gallery-item img, .gallery-item video {
                height: 200px;
            }
        }
        
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2rem;
            }
            
            .gallery-item img, .gallery-item video {
                height: 200px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top main-navbar" id="main-navbar">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <i class="bi bi-camera-fill fs-3 me-2 text-warning"></i>
                <span class="fw-bold fs-4">Book<span class="text-warning">My</span>Shoot</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('packages') ? 'active' : '' }}" href="{{ route('packages') }}">Packages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                    </li>
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        <a class="btn btn-primary" href="{{ route('booking') }}">Book Now</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h5><i class="bi bi-camera me-2"></i>BookMyShoot</h5>
                    <p class="mb-0">Professional photography services for all your special moments. Capturing memories that last a lifetime.</p>
                </div>
                <div class="col-lg-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><a href="{{ url('/') }}" class="text-white text-decoration-none">Home</a></li>
                        <li class="mb-2"><a href="{{ route('gallery') }}" class="text-white text-decoration-none">Gallery</a></li>
                        <li class="mb-2"><a href="{{ route('packages') }}" class="text-white text-decoration-none">Packages</a></li>
                        <li class="mb-2"><a href="{{ route('booking') }}" class="text-white text-decoration-none">Book Now</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h5>Contact Us</h5>
                    <p class="mb-2"><i class="bi bi-envelope me-2"></i>info@bookmyshoot.com</p>
                    <p class="mb-2"><i class="bi bi-phone me-2"></i>+1 234 567 890</p>
                    <p class="mb-0"><i class="bi bi-geo-alt me-2"></i>123 Photography Street, City</p>
                    <div class="mt-3">
                        <a href="#" class="btn btn-outline-light btn-sm me-2"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="btn btn-outline-light btn-sm me-2"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="btn btn-outline-light btn-sm"><i class="bi bi-twitter"></i></a>
                    </div>
                </div>
            </div>

            <div class="footer-bottom text-center">
                <p class="mb-0">
                    &copy; {{ date('Y') }} BookMyShoot v{{ config('app.version') }}. All rights reserved.
                </p>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
    <script>
        // Navbar scroll effect with smooth transition
        let lastScroll = 0;
        const navbar = document.getElementById('main-navbar');
        
        function handleNavbarScroll() {
            const currentScroll = window.scrollY;
            
            if (currentScroll > 50) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
            
            lastScroll = currentScroll;
        }
        
        // Debounced scroll listener for better performance
        let scrollTimeout;
        window.addEventListener('scroll', function() {
            if (scrollTimeout) clearTimeout(scrollTimeout);
            scrollTimeout = setTimeout(handleNavbarScroll, 10);
        });
        
        // Initial check on page load
        handleNavbarScroll();
        
        // Close mobile menu when clicking a link
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                const collapse = document.getElementById('navbarNav');
                if (collapse.classList.contains('show')) {
                    collapse.classList.remove('show');
                }
            });
        });
        
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });
        
        const lightbox = GLightbox({
            selector: '.gallery-lightbox',
            loop: true,
            autoplayVideos: true
        });
    </script>
</body>
</html>
