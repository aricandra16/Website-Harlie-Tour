<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\City;
use App\Models\Schedule;
use App\Models\TravelRoute;
use Carbon\CarbonImmutable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingTest extends TestCase
{
    use RefreshDatabase;

    public function test_valid_booking_is_saved_as_pending_and_fare_is_calculated_by_server(): void
    {
        $this->createShuttleRoute();
        $payload = $this->bookingPayload();

        $this->postJson(route('bookings.store'), $payload)
            ->assertCreated()
            ->assertJsonPath('booking.status', 'pending')
            ->assertJsonPath('booking.unit_fare', 140000)
            ->assertJsonPath('booking.total_fare', 280000)
            ->assertJsonPath('booking.passenger_count', 2);

        $this->assertDatabaseHas('bookings', [
            'customer_name' => 'Rani Test',
            'customer_phone' => '081234567890',
            'passenger_count' => 2,
            'travel_class' => 'Executive',
            'unit_fare' => 140000,
            'total_fare' => 280000,
            'status' => 'pending',
        ]);
    }

    public function test_booking_with_invalid_customer_data_is_rejected_without_saving(): void
    {
        $this->createShuttleRoute();
        $payload = $this->bookingPayload();
        unset($payload['customer_name']);
        $payload['customer_phone'] = 'not-a-phone';

        $this->postJson(route('bookings.store'), $payload)
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['customer_name', 'customer_phone']);

        $this->assertDatabaseCount('bookings', 0);
        $this->assertDatabaseCount('schedules', 0);
    }

    public function test_booking_is_rejected_when_requested_passengers_exceed_remaining_seats(): void
    {
        $route = $this->createShuttleRoute();
        $departure = CarbonImmutable::now('Asia/Jakarta')->addDay()->setTime(7, 0);
        $departureUtc = $departure->utc();
        $schedule = Schedule::query()->create([
            'route_id' => $route->id,
            'departure_at' => $departureUtc->format('Y-m-d H:i:s'),
            'service_class' => 'Executive',
            'arrival_at' => $departureUtc->addHours(3)->format('Y-m-d H:i:s'),
            'seat_capacity' => 10,
            'fare_override' => 140000,
            'status' => 'scheduled',
        ]);

        Booking::query()->create([
            'schedule_id' => $schedule->id,
            'booking_code' => 'HTFIXTURE',
            'customer_name' => 'Pelanggan Sebelumnya',
            'customer_phone' => '081234567890',
            'passenger_count' => 8,
            'travel_class' => 'Executive',
            'unit_fare' => 140000,
            'total_fare' => 1120000,
            'status' => 'confirmed',
            'payment_status' => 'paid',
        ]);

        $payload = $this->bookingPayload();
        $payload['passenger_count'] = 3;

        $this->postJson(route('bookings.store'), $payload)
            ->assertUnprocessable()
            ->assertJsonValidationErrors('passenger_count');

        $this->assertDatabaseCount('bookings', 1);
    }

    private function createShuttleRoute(): TravelRoute
    {
        $jakarta = City::query()->create([
            'name' => 'Jakarta',
            'country_name' => 'Indonesia',
            'country_code' => 'ID',
            'timezone' => 'Asia/Jakarta',
        ]);
        $bandung = City::query()->create([
            'name' => 'Bandung',
            'country_name' => 'Indonesia',
            'country_code' => 'ID',
            'timezone' => 'Asia/Jakarta',
        ]);

        return TravelRoute::query()->create([
            'origin_city_id' => $jakarta->id,
            'destination_city_id' => $bandung->id,
            'service_type' => 'shuttle',
            'duration_minutes' => 180,
            'base_fare' => 105000,
            'is_active' => true,
        ]);
    }

    private function bookingPayload(): array
    {
        return [
            'origin' => 'Jakarta',
            'destination' => 'Bandung',
            'travel_date' => CarbonImmutable::now('Asia/Jakarta')->addDay()->toDateString(),
            'departure_time' => '07:00',
            'transport_type' => 'shuttle',
            'travel_class' => 'Executive',
            'passenger_count' => 2,
            'customer_name' => 'Rani Test',
            'customer_phone' => '081234567890',
        ];
    }
}
