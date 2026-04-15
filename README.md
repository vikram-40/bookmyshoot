# 📸 BookMyShoot - Professional Photographer Booking Platform 🚀

[![Laravel](https://img.shields.io/badge/Laravel-11.x-brightgreen.svg?style=flat-square&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-blue.svg?style=flat-square)](https://php.net)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-purple.svg?style=flat-square&logo=bootstrap)](https://getbootstrap.com)

## 🎯 Project Description

**BookMyShoot** is a production-ready **Photographer Booking System** built with Laravel 11. Clients can browse packages and book sessions, while admins manage bookings, galleries, payments, and teams through a clean Bootstrap 5 admin panel.

Modern SaaS-style UI with responsive design, file uploads (images/videos), AJAX filtering, and complete CRUD operations.

## ✨ Key Features

- **Frontend**: Responsive landing page, package showcase, booking form, gallery with AJAX category filter
- **Admin Panel**: Complete dashboard with stats, bookings CRUD (confirm/cancel), payments tracking
- **Gallery**: Image + video upload (50MB max), public gallery with lightbox
- **Booking System**: Client auto-creation, date conflict check, status workflow
- **Authentication**: Admin login/logout (role-based access)
- **Responsive Design**: Mobile-first Bootstrap 5 + AOS animations
- **File Management**: Public storage link for uploads
- **Validation**: Form validation + error handling

## 🛠 Tech Stack

| Category | Technologies |
|----------|--------------|
| Backend | Laravel 11, PHP 8.2+, Eloquent ORM |
| Frontend | Bootstrap 5, Bootstrap Icons, AOS, GLightbox |
| Database | MySQL/PostgreSQL (migrations included) |
| Assets | Vite (ready for production build) |

## 🚀 Quick Installation

```bash
# Clone & Setup
git clone [your-repo-url]
cd BookMyShoot

# Copy env & configure database
cp .env.example .env
php artisan key:generate

# Install dependencies
composer install
npm install

# Database & Assets
php artisan migrate
php artisan db:seed
php artisan storage:link
npm run build

# Start development server
php artisan serve
```

**Live Demo**: http://127.0.0.1:8000

## 👨‍💼 Admin Login

```
Email: admin@gmail.com
Password: 12345678
URL: http://127.0.0.1:8000/admin/dashboard
```

## 📁 Project Structure

```
├── app/Http/Controllers/Admin/     # Admin CRUD controllers
├── app/Models/                     # Eloquent models
├── resources/views/admin/          # Admin views + layouts
├── resources/views/frontend/       # Client-facing views
├── routes/web.php                  # All routes (auth protected)
├── database/migrations/            # Complete schema
└── database/seeders/              # Admin + sample data
```

## ✅ Status

**Production Ready (100%)** - Version **1.0.0**

**Current Version**: 1.0.0 - Fully functional with tests passed:
- ✅ Authentication & Authorization
- ✅ Complete CRUD Operations  
- ✅ File Uploads (Image/Video)
- ✅ Responsive Design
- ✅ SEO-friendly Structure

## 🔮 Future Improvements

- [ ] Payment Gateway (Stripe/PayPal)
- [ ] Email Notifications
- [ ] Client Dashboard
- [ ] Analytics Dashboard
- [ ] Multi-language Support

## 👨‍💻 Author

**Your Name**  
Full Stack Developer | Laravel Specialist  
[LinkedIn](https://linkedin.com) | [Portfolio](https://your-portfolio.com) | [GitHub](https://github.com)

---

⭐ **Star this repo if you found it helpful!** ⭐

