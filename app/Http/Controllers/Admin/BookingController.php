<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class BookingController extends Controller
{
    public function index(Request $request): View
    {
        $status = $request->query('status');
        $bookings = Booking::query()
            ->with(['schedule.route.origin', 'schedule.route.destination'])
            ->when(in_array($status, ['pending', 'confirmed', 'cancelled', 'completed'], true),
                fn ($query) => $query->where('status', $status))
            ->latest('booked_at')
            ->paginate(15)
            ->withQueryString();

        return view('admin.bookings.index', [
            'bookings' => $bookings,
            'selectedStatus' => $status,
            'counts' => [
                'pending' => Booking::where('status', 'pending')->count(),
                'confirmed' => Booking::where('status', 'confirmed')->count(),
                'today' => Booking::whereHas('schedule', fn ($query) => $query->whereDate('departure_at', today()))->count(),
            ],
        ]);
    }

    public function update(Request $request, Booking $booking): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', 'in:pending,confirmed,cancelled,completed'],
            'payment_status' => ['required', 'in:unpaid,pending,paid,refunded'],
        ]);

        DB::transaction(function () use ($booking, $data): void {
            $lockedBooking = Booking::query()->whereKey($booking->id)->lockForUpdate()->firstOrFail();
            $allowedTransitions = [
                'pending' => ['pending', 'confirmed', 'cancelled'],
                'confirmed' => ['confirmed', 'cancelled', 'completed'],
                'cancelled' => ['cancelled'],
                'completed' => ['completed'],
            ];

            if (! in_array($data['status'], $allowedTransitions[$lockedBooking->status] ?? [], true)) {
                throw ValidationException::withMessages([
                    'status' => 'Perubahan status booking ini tidak diperbolehkan.',
                ]);
            }

            if ($data['payment_status'] === 'refunded' && $lockedBooking->payment_status !== 'paid') {
                throw ValidationException::withMessages([
                    'payment_status' => 'Booking harus berstatus sudah dibayar sebelum ditandai refund.',
                ]);
            }

            $lockedBooking->status = $data['status'];
            $lockedBooking->payment_status = $data['payment_status'];

            if ($data['status'] === 'confirmed' && ! $lockedBooking->confirmed_at) {
                $lockedBooking->confirmed_at = now();
            }
            if ($data['status'] === 'cancelled' && ! $lockedBooking->cancelled_at) {
                $lockedBooking->cancelled_at = now();
            }

            $lockedBooking->save();
        });

        return back()->with('success', 'Status booking '.$booking->booking_code.' berhasil diperbarui.');
    }
}
