<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Client;
use App\Models\Package;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    public function index(): View
    {
        $packages = Package::all();
        return view('frontend.booking', compact('packages'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'package_id' => 'required|exists:packages,id',
            'event_date' => 'required|date|after_or_equal:today',
            'event_location' => 'required|string|max:255',
            'message' => 'nullable|string',
        ]);

        try {
            $existingBooking = Booking::where('event_date', $validated['event_date'])
                ->where('status', '!=', 'cancelled')
                ->first();

            if ($existingBooking) {
                return redirect()->back()
                    ->withInput()
                    ->with('warning', 'Warning: There is already a booking on this date. Please choose another date.');
            }

            $client = Client::firstOrCreate(
                ['email' => $validated['email']],
                [
                    'name' => $validated['name'],
                    'phone' => $validated['phone'],
                ]
            );

            Booking::create([
                'client_id' => $client->id,
                'name' => $validated['name'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'package_id' => $validated['package_id'],
                'event_date' => $validated['event_date'],
                'event_location' => $validated['event_location'],
                'message' => $validated['message'] ?? null,
                'status' => 'pending',
            ]);

            return redirect()->route('booking')
                ->with('success', 'Your booking request has been submitted successfully! We will contact you soon.');
        } catch (\Exception $e) {
            Log::error('Booking submission failed: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to submit booking. Please try again.');
        }
    }
}