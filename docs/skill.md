# BookMyShoot - Technical Skills Documentation

## Backend Skills

### 1. Laravel Framework
- Laravel 12.x architecture
- MVC pattern (Model-View-Controller)
- Laravel routing (web.php)
- Middleware (auth protection)
- Service providers
- Blade templating

### 2. Eloquent ORM
- Model relationships:
  - hasMany (one-to-many)
  - belongsTo (many-to-one)
  - hasMany (one-to-many)
- Query builders
- FirstOrCreate method
- Model scoping

### 3. Database & Migrations
- MySQL database (bookmyshoot)
- migrations/
- Schema builder
- Field types: string, text, decimal, date, boolean
- Foreign keys: client_id, package_id, booking_id
- Timestamps: created_at, updated_at

### 4. Authentication
- Manual Auth (not Laravel Breeze)
- Auth::attempt() for login
- Auth::user() for user check
- is_admin field for role
- Session management
- Auth middleware

### 5. Controllers
- Frontend Controllers:
  - HomeController
  - BookingController
- Admin Controllers:
  - DashboardController
  - PackageController
  - GalleryController
  - BookingController
  - ClientController
  - PaymentController
  - TeamController
  - ProfileController
- Auth Controller:
  - LoginController

---

## Frontend Skills

### 1. Blade Templates
- Layouts (@extends, @section, @yield)
- Control structures (@forelse, @if, @foreach)
- CSRF token (@csrf)
- Form methods (POST, PUT, DELETE)
- Error handling (@error)

### 2. Bootstrap 5
- Grid system (row, col-md-*)
- Components:
  - Navbar
  - Cards
  - Forms
  - Alerts
  - Buttons
  - Modals
  - Tables
- Utility classes
- Responsive breakpoints

### 3. JavaScript Libraries
- AOS (Animate On Scroll)
- GLightbox (Gallery lightbox)
- Bootstrap JS (interactions)

### 4. CSS Styling
- Custom CSS variables
- Flexbox layout
- Gradients
- Backdrop filter
- Animations
- Hover effects
- Responsive media queries

### 5. UI Components
- Hero section with video background
- Package cards with pricing
- Gallery grid with filtering
- Booking form with validation
- Admin sidebar
- Dashboard stats
- Data tables with pagination

---

## Advanced Features

### 1. Booking System
- Form validation (server-side)
- Date conflict prevention
- Client auto-creation
- Email notification flow
- Status management:
  - pending
  - confirmed
  - cancelled

### 2. Gallery System
- Image upload (jpg, jpeg, png, gif, webp)
- Video upload (mp4, mov, avi, webm)
- File size limit: 50MB
- Category filtering
- AJAX filter (fetch API)
- Lightbox popup

### 3. Payment System
- Amount tracking
- Payment types:
  - advance
  - full
- Status tracking:
  - pending
  - paid
- Payment date
- Linked to booking

### 4. Sticky Navigation
- Transparent on scroll (0-50px)
- Solid dark on scroll (>50px)
- Backdrop blur effect
- Box shadow
- Height transition
- Mobile responsive

### 5. Dashboard Stats
- Total bookings count
- Upcoming bookings
- Total revenue (paid payments)
- Pending count
- Confirmed count
- Cancelled count

---

## UI/UX Skills

### 1. Animations
- Fade-in-up effects
- AOS library integration
- delay-1, delay-2 classes
- Hover scale effects
- Smooth transitions

### 2. Layout
- Fixed navbar
- Content padding for fixed header
- Full-width hero
- Centered container
- Card grid layouts
- Sidebar navigation

### 3. Responsive Design
- Mobile breakpoints (<768px)
- Tablet breakpoints (<992px)
- Desktop (≥992px)
- vh-100 for hero
- Flexible grids

### 4. Visual Effects
- Dark gradient navbar
- Gold accent color (#D4AF37)
- Blue accent (#3498db)
- Backdrop blur (15px)
- Box shadows
- Border radius

### 5. Accessibility
- Form labels
- Icon indicators
- Error messages
- Success alerts
- Warning alerts

---

## Project Structure

```
BookMyShoot/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/
│   │   ├── Auth/
│   │   └── Frontend/
│   ├── Models/
│   └── Providers/
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/views/
│   ├── admin/
│   ├── auth/
│   └── frontend/
├── routes/
│   └── web.php
├── .env
└── composer.json
```

---

## Technology Stack

| Category | Technology |
|----------|------------|
| Framework | Laravel 12.x |
| Database | MySQL |
| PHP | 8.2+ |
| Frontend | Blade, Bootstrap 5 |
| JavaScript | AOS, GLightbox |
| CSS | Custom + Bootstrap |
| Auth | Manual Laravel Auth |

---

## Key Files Reference

- **Routes**: routes/web.php (65 routes)
- **Layout**: resources/views/frontend/layouts/app.blade.php
- **Admin Layout**: resources/views/admin/layouts/app.blade.php
- **Auth**: app/Http/Controllers/Auth/LoginController.php
- **Booking**: app/Http/Controllers/Frontend/BookingController.php
- **Gallery**: app/Http/Controllers/Admin/GalleryController.php
- **Payment**: app/Http/Controllers/Admin/PaymentController.php