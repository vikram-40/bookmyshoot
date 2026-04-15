<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalBookings = Booking::count();
        $upcomingBookings = Booking::where('event_date', '>=', now()->toDateString())
            ->where('status', '!=', 'cancelled')
            ->orderBy('event_date')
            ->limit(10)
            ->get();
        $totalRevenue = Payment::where('status', 'paid')->sum('amount');
        $pendingBookings = Booking::where('status', 'pending')->count();
        $confirmedBookings = Booking::where('status', 'confirmed')->count();
        $cancelledBookings = Booking::where('status', 'cancelled')->count();

        return view('admin.dashboard', compact(
            'totalBookings',
            'upcomingBookings',
            'totalRevenue',
            'pendingBookings',
            'confirmedBookings',
            'cancelledBookings'
        ));
    }
}