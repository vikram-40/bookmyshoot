<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    public function index(Request $request): View
    {
        $query = Booking::with(['package', 'client'])->latest();

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->date_from) {
            $query->where('event_date', '>=', $request->date_from);
        }

        if ($request->date_to) {
            $query->where('event_date', '<=', $request->date_to);
        }

        $bookings = $query->paginate(15);

        return view('admin.bookings.index', compact('bookings'));
    }

    public function create(): View
    {
        return view('admin.bookings.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'package_id' => 'required|exists:packages,id',
            'event_date' => 'required|date',
            'event_location' => 'required|string|max:255',
            'message' => 'nullable|string',
            'status' => 'in:pending,confirmed,cancelled',
        ]);

        $validated['status'] = $validated['status'] ?? 'pending';

        try {
            Booking::create($validated);
            return redirect()->route('admin.bookings.index')
                ->with('success', 'Booking created successfully.');
        } catch (\Exception $e) {
            Log::error('Booking creation failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create booking. Please try again.');
        }
    }

    public function show(Booking $booking): View
    {
        $booking->load(['package', 'client', 'payments']);
        return view('admin.bookings.show', compact('booking'));
    }

    public function edit(Booking $booking): View
    {
        $booking->load(['package', 'payments']);
        return view('admin.bookings.edit', compact('booking'));
    }

    public function update(Request $request, Booking $booking): RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled',
            'event_date' => 'required|date',
            'event_location' => 'required|string|max:255',
            'message' => 'nullable|string',
        ]);

        try {
            $booking->update($validated);
            return redirect()->route('admin.bookings.index')
                ->with('success', 'Booking updated successfully.');
        } catch (\Exception $e) {
            Log::error('Booking update failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update booking. Please try again.');
        }
    }

    public function confirm(Booking $booking): RedirectResponse
    {
        $booking->update(['status' => 'confirmed']);
        return redirect()->back()->with('success', 'Booking confirmed successfully.');
    }

    public function cancel(Booking $booking): RedirectResponse
    {
        $booking->update(['status' => 'cancelled']);
        return redirect()->back()->with('success', 'Booking cancelled successfully.');
    }

    public function destroy(Booking $booking): RedirectResponse
    {
        $booking->delete();
        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking deleted successfully.');
    }
}