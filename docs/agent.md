# Agent Guidelines - BookMyShoot Project

## Architecture Guidelines

### 1. MVC Structure
- Models go in `app/Models/`
- Controllers go in `app/Http/Controllers/`
- Views go in `resources/views/`
- Use proper namespaces

### 2. Naming Conventions
- Models: singular, PascalCase (Package, Booking)
- Controllers: PascalCase (PackageController)
- Tables: plural, snake_case (packages, bookings)
- Routes: snake_case with dots (admin.packages.index)

### 3. RESTful Routes
- Use Route::resource() where possible
- Custom routes for special actions
- Prefix admin routes with /admin
- Name routes with admin. prefix

---

## Coding Standards

### 1. Controller Rules
```php
// Correct ✓
public function index(): View
public function store(Request $request): RedirectResponse
public function show(Package $package): View

// Never do this ✗
public function index() // Missing return types
```

### 2. Model Rules
```php
// Correct ✓
protected $fillable = ['name', 'price'];
protected $casts = ['price' => 'decimal:2'];

class Package extends Model
{
    public function bookings(): HasMany
}
```

### 3. Route Rules
```php
// Correct ✓
Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');
Route::resource('packages', PackageController::class);

// Never do this ✗
Route::get('/packages', 'PackageController@index');
```

### 4. Blade Rules
```php
// Correct ✓
@extends('frontend.layouts.app')
@section('content')
@csrf

// Use compact for variables
return view('admin.packages.index', compact('packages'));
```

---

## UI Guidelines

### 1. Navbar Requirements
- Always use fixed-top navbar
- Add margin-top to content sections for fixed header (70px)
- Test with scroll behavior
- Ensure mobile responsive

### 2. Forms
- Always use @csrf token
- Use form-floating for inputs
- Show validation with @error
- Use old() for form values

### 3. Cards/Grids
- Use Bootstrap grid (row, col-*)
- Add gap spacing (g-4)
- Use card components
- Add hover effects

### 4. Colors
- Primary: #3498db (blue)
- Accent: #D4AF37 (gold)
- Dark: #2c3e50 (navy)
- Success: green
- Error: red

---

## Module Priority Order

### High Priority (Core)
1. Authentication (Login/Logout)
2. Dashboard
3. Packages CRUD
4. Bookings CRUD
5. Payments CRUD

### Medium Priority
6. Gallery CRUD
7. Clients CRUD
8. Team CRUD
9. Profile Update

### Low Priority
10. Frontend Pages (About, Contact)
11. UI Enhancements
12. Animations

---

## Do's and Don'ts

### DO ✅
- Use Eloquent relationships
- Add return types to controller methods
- Use form requests validation
- Handle exceptions with try-catch
- Add success/error messages
- Use compact() for views
- Add auth middleware to admin routes

### DON'T ❌
- Don't use raw SQL (use Eloquent)
- Don't skip return types
- Don't hardcode URLs (use route())
- Don't skip @csrf in forms
- Don't skip validation
- Don't skip error handling
- Don't break existing layouts

---

## Common Fixes

### 1. Navbar Content Overlap
```php
// Fix: Add margin-top to section
<section class="py-5" style="margin-top: 70px;">
```

### 2. Route Not Found
```php
// Fix: Clear routes cache
php artisan route:clear
php artisan cache:clear
```

### 3. View Not Found
```php
// Fix: Clear view cache
php artisan view:clear
```

### 4. Auth Not Working
```php
// Fix: Check is_admin field exists
// Check auth middleware applied
```

### 5. Database Issues
```php
// Fix: Run migrations
php artisan migrate
```

---

## Testing Checklist

Before any commit:
- [ ] Routes working
- [ ] Forms submit correctly
- [ ] Validation works
- [ ] Database saves
- [ ] UI displays correctly
- [ ] Mobile responsive
- [ ] No PHP errors
- [ ] No JS errors

---

## Admin Credentials

- **URL**: /login
- **Email**: admin@gmail.com
- **Password**: 12345678
- **Access**: All admin routes

---

## Important Files

| File | Purpose |
|------|---------|
| routes/web.php | All routes (65 total) |
| app/Models/*.php | Database models |
| app/Http/Controllers/*.php | Business logic |
| resources/views/**/*.blade.php | UI templates |
| .env | Database config |
| database/migrations/*.php | Schema |

---

## Database Tables

1. users (id, name, email, password, is_admin, photo)
2. packages (id, name, price, description, features, is_popular)
3. galleries (id, title, file_path, type, category)
4. clients (id, name, email, phone)
5. bookings (id, client_id, package_id, name, phone, email, event_date, event_location, message, status)
6. payments (id, booking_id, amount, payment_type, status, payment_date)
7. team_members (id, name, role, image, description)

---

## Key Flows

### User Booking Flow
1. Visit /booking
2. Fill form (name, phone, email, package, date, location)
3. Submit → POST /booking
4. Validation → Client created → Booking created (pending)
5. Redirect back with success

### Admin Flow
1. Visit /login
2. Submit credentials
3. Redirect /admin/dashboard
4. Manage modules via sidebar

---

## Quick Reference

```bash
# Run server
php artisan serve

# Clear caches
php artisan view:clear
php artisan route:clear
php artisan cache:clear
php artisan config:clear

# Check routes
php artisan route:list

# Check migrations
php artisan migrate:status
```