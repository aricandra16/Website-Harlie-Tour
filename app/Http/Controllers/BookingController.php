<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Schedule;
use App\Models\TravelRoute;
use Carbon\CarbonImmutable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class BookingController
{
    private const CLASS_MULTIPLIERS = [
        'Ekonomi' => 1,
        'Executive' => 1.35,
        'VIP' => 1.8,
    ];

    private const SEAT_CAPACITIES = [
        'shuttle' => ['Ekonomi' => 14, 'Executive' => 10, 'VIP' => 6],
        'flight' => ['Ekonomi' => 180, 'Executive' => 36, 'VIP' => 12],
    ];

    private const DEPARTURE_TIMES = [
        'shuttle' => ['05:00', '07:00', '09:00', '12:00', '15:00', '18:00', '21:00'],
        'flight' => ['06:00', '09:00', '12:00', '15:00', '18:00', '21:00'],
    ];

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'origin' => ['required', 'string', 'max:120'],
            'destination' => ['required', 'string', 'max:120', 'different:origin'],
            'travel_date' => ['required', 'date_format:Y-m-d', 'after_or_equal:today'],
            'departure_time' => ['required', 'date_format:H:i'],
            'transport_type' => ['required', 'in:shuttle,flight'],
            'travel_class' => ['required', 'in:Ekonomi,Executive,VIP'],
            'passenger_count' => ['required', 'integer', 'min:1', 'max:8'],
            'customer_name' => ['required', 'string', 'min:2', 'max:120'],
            'customer_phone' => ['required', 'string', 'regex:/^[0-9+().\- ]{9,25}$/'],
        ]);

        if (! in_array($data['departure_time'], self::DEPARTURE_TIMES[$data['transport_type']], true)) {
            throw ValidationException::withMessages([
                'departure_time' => 'Jadwal keberangkatan tidak tersedia.',
            ]);
        }

        $route = TravelRoute::query()
            ->with(['origin', 'destination'])
            ->where('service_type', $data['transport_type'])
            ->whereHas('origin', fn ($query) => $query->where('name', $data['origin'])->where('is_active', true))
            ->whereHas('destination', fn ($query) => $query->where('name', $data['destination'])->where('is_active', true))
            ->where('is_active', true)
            ->first();

        if (! $route) {
            throw ValidationException::withMessages([
                'destination' => 'Rute ini belum tersedia untuk moda yang dipilih.',
            ]);
        }

        $phoneDigits = preg_replace('/\D+/', '', $data['customer_phone']);
        if (strlen($phoneDigits) < 9 || strlen($phoneDigits) > 15) {
            throw ValidationException::withMessages([
                'customer_phone' => 'Nomor HP harus berisi 9 sampai 15 digit.',
            ]);
        }

        $originTimezone = $route->origin->timezone ?: 'Asia/Jakarta';
        $departure = CarbonImmutable::createFromFormat(
            '!Y-m-d H:i',
            $data['travel_date'].' '.$data['departure_time'],
            $originTimezone
        );

        if ($departure->lessThanOrEqualTo(CarbonImmutable::now($originTimezone))) {
            throw ValidationException::withMessages([
                'travel_date' => 'Waktu keberangkatan sudah lewat.',
            ]);
        }

        $travelClass = $data['travel_class'];
        $roundingUnit = $data['transport_type'] === 'flight' ? 25000 : 5000;
        $unitFare = (int) (round($route->base_fare * self::CLASS_MULTIPLIERS[$travelClass] / $roundingUnit) * $roundingUnit);
        $capacity = self::SEAT_CAPACITIES[$data['transport_type']][$travelClass];
        $departureAt = $departure->utc();
        $arrivalAt = $departureAt->addMinutes($route->duration_minutes ?? 60);

        $booking = DB::transaction(function () use (
            $route,
            $departureAt,
            $arrivalAt,
            $travelClass,
            $unitFare,
            $capacity,
            $data
        ): Booking {
            // Serializing creation by route prevents duplicate date-specific schedules.
            TravelRoute::query()->whereKey($route->id)->lockForUpdate()->firstOrFail();

            $schedule = Schedule::query()->firstOrCreate(
                [
                    'route_id' => $route->id,
                    'departure_at' => $departureAt->format('Y-m-d H:i:s'),
                    'service_class' => $travelClass,
                ],
                [
                    'arrival_at' => $arrivalAt->format('Y-m-d H:i:s'),
                    'seat_capacity' => $capacity,
                    'fare_override' => $unitFare,
                    'status' => 'scheduled',
                ]
            );

            $schedule = Schedule::query()->whereKey($schedule->id)->lockForUpdate()->firstOrFail();

            if ($schedule->status !== 'scheduled') {
                throw ValidationException::withMessages(['departure_time' => 'Jadwal ini tidak lagi tersedia.']);
            }

            $scheduledFare = (int) ($schedule->fare_override ?? $unitFare);

            $reservedSeats = $schedule->bookings()
                ->where(function ($query): void {
                    $query->where('status', 'confirmed')
                        ->orWhere(function ($pending): void {
                            $pending->where('status', 'pending')
                                ->where('expires_at', '>', now());
                        });
                })
                ->sum('passenger_count');

            if ($reservedSeats + $data['passenger_count'] > $schedule->seat_capacity) {
                throw ValidationException::withMessages(['passenger_count' => 'Kursi pada jadwal ini tidak mencukupi.']);
            }

            return Booking::query()->create([
                'schedule_id' => $schedule->id,
                'booking_code' => $this->newBookingCode(),
                'customer_name' => $data['customer_name'],
                'customer_phone' => $data['customer_phone'],
                'passenger_count' => $data['passenger_count'],
                'unit_fare' => $scheduledFare,
                'total_fare' => $scheduledFare * $data['passenger_count'],
                'travel_class' => $travelClass,
                'status' => 'pending',
                'payment_status' => 'unpaid',
                'expires_at' => now()->addMinutes(30),
            ]);
        });

        return response()->json([
            'message' => 'Permintaan booking berhasil disimpan.',
            'booking' => [
                'booking_code' => $booking->booking_code,
                'unit_fare' => $booking->unit_fare,
                'total_fare' => $booking->total_fare,
                'passenger_count' => $booking->passenger_count,
                'status' => $booking->status,
                'expires_at' => $booking->expires_at?->toIso8601String(),
            ],
        ], 201);
    }

    private function newBookingCode(): string
    {
        do {
            $code = 'HT'.Str::upper(Str::random(6));
        } while (Booking::query()->where('booking_code', $code)->exists());

        return $code;
    }
}
