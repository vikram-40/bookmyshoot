<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function index(): View
    {
        $payments = Payment::with('booking.package')->latest()->paginate(15);
        return view('admin.payments.index', compact('payments'));
    }

    public function create(): View
    {
        $bookings = Booking::with('package')->where('status', '!=', 'cancelled')->get();
        return view('admin.payments.create', compact('bookings'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'amount' => 'required|numeric|min:0',
            'payment_type' => 'required|in:advance,full',
            'status' => 'required|in:pending,paid',
            'payment_date' => 'nullable|date',
        ]);

        try {
            if ($validated['status'] === 'paid' && !$validated['payment_date']) {
                $validated['payment_date'] = now()->toDateString();
            }

            Payment::create($validated);

            return redirect()->route('admin.payments.index')
                ->with('success', 'Payment created successfully.');
        } catch (\Exception $e) {
            Log::error('Payment creation failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create payment. Please try again.');
        }
    }

    public function show(Payment $payment): View
    {
        $payment->load('booking.package');
        return view('admin.payments.show', compact('payment'));
    }

    public function edit(Payment $payment): View
    {
        $payment->load('booking');
        $bookings = Booking::with('package')->where('status', '!=', 'cancelled')->get();
        return view('admin.payments.edit', compact('payment', 'bookings'));
    }

    public function update(Request $request, Payment $payment): RedirectResponse
    {
        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'amount' => 'required|numeric|min:0',
            'payment_type' => 'required|in:advance,full',
            'status' => 'required|in:pending,paid',
            'payment_date' => 'nullable|date',
        ]);

        try {
            if ($validated['status'] === 'paid' && !$validated['payment_date']) {
                $validated['payment_date'] = now()->toDateString();
            }

            $payment->update($validated);

            return redirect()->route('admin.payments.index')
                ->with('success', 'Payment updated successfully.');
        } catch (\Exception $e) {
            Log::error('Payment update failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update payment. Please try again.');
        }
    }

    public function markAsPaid(Payment $payment): RedirectResponse
    {
        $payment->update([
            'status' => 'paid',
            'payment_date' => now()->toDateString(),
        ]);

        return redirect()->back()->with('success', 'Payment marked as paid.');
    }

    public function markAsPending(Payment $payment): RedirectResponse
    {
        $payment->update(['status' => 'pending']);

        return redirect()->back()->with('success', 'Payment marked as pending.');
    }

    public function destroy(Payment $payment): RedirectResponse
    {
        $payment->delete();

        return redirect()->route('admin.payments.index')
            ->with('success', 'Payment deleted successfully.');
    }
}