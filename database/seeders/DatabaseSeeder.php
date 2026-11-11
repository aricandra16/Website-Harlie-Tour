<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Schedule;
use App\Models\TravelRoute;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $cities = [
            'Jakarta' => [-6.20, 106.82, 'Indonesia', 'ID', 'Asia/Jakarta'],
            'Bandung' => [-6.91, 107.61, 'Indonesia', 'ID', 'Asia/Jakarta'],
            'Yogyakarta' => [-7.80, 110.36, 'Indonesia', 'ID', 'Asia/Jakarta'],
            'Semarang' => [-6.97, 110.42, 'Indonesia', 'ID', 'Asia/Jakarta'],
            'Surabaya' => [-7.25, 112.75, 'Indonesia', 'ID', 'Asia/Jakarta'],
            'Solo' => [-7.57, 110.82, 'Indonesia', 'ID', 'Asia/Jakarta'],
            'Malang' => [-7.98, 112.63, 'Indonesia', 'ID', 'Asia/Jakarta'],
            'Bogor' => [-6.60, 106.80, 'Indonesia', 'ID', 'Asia/Jakarta'],
            'Tangerang' => [-6.18, 106.63, 'Indonesia', 'ID', 'Asia/Jakarta'],
            'Cirebon' => [-6.71, 108.56, 'Indonesia', 'ID', 'Asia/Jakarta'],
            'Medan' => [3.59, 98.67, 'Indonesia', 'ID', 'Asia/Jakarta'],
            'Singapore' => [1.35, 103.82, 'Singapura', 'SG', 'Asia/Singapore'],
            'Kuala Lumpur' => [3.14, 101.69, 'Malaysia', 'MY', 'Asia/Kuala_Lumpur'],
            'Bangkok' => [13.76, 100.50, 'Thailand', 'TH', 'Asia/Bangkok'],
            'Hat Yai' => [7.01, 100.47, 'Thailand', 'TH', 'Asia/Bangkok'],
            'Johor Bahru' => [1.49, 103.74, 'Malaysia', 'MY', 'Asia/Kuala_Lumpur'],
            'Phuket' => [7.88, 98.39, 'Thailand', 'TH', 'Asia/Bangkok'],
            'Ho Chi Minh City' => [10.82, 106.63, 'Vietnam', 'VN', 'Asia/Ho_Chi_Minh'],
            'Manila' => [14.60, 120.98, 'Filipina', 'PH', 'Asia/Manila'],
            'Hong Kong' => [22.32, 114.17, 'Hong Kong', 'HK', 'Asia/Hong_Kong'],
            'Taipei' => [25.03, 121.57, 'Taiwan', 'TW', 'Asia/Taipei'],
            'Tokyo' => [35.68, 139.69, 'Jepang', 'JP', 'Asia/Tokyo'],
            'Osaka' => [34.69, 135.50, 'Jepang', 'JP', 'Asia/Tokyo'],
            'Seoul' => [37.57, 126.98, 'Korea Selatan', 'KR', 'Asia/Seoul'],
            'Sydney' => [-33.87, 151.21, 'Australia', 'AU', 'Australia/Sydney'],
            'Melbourne' => [-37.81, 144.96, 'Australia', 'AU', 'Australia/Melbourne'],
            'Dubai' => [25.20, 55.27, 'Uni Emirat Arab', 'AE', 'Asia/Dubai'],
            'Istanbul' => [41.01, 28.98, 'Turki', 'TR', 'Europe/Istanbul'],
        ];

        $cityModels = [];
        foreach ($cities as $name => [$latitude, $longitude, $country, $countryCode, $timezone]) {
            $cityModels[$name] = City::query()->updateOrCreate(
                ['name' => $name, 'country_code' => $countryCode],
                [
                    'country_name' => $country,
                    'timezone' => $timezone,
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                    'is_active' => true,
                ]
            );
        }

        $internationalShuttles = [
            'Jakarta|Singapore' => [700000, 2160],
            'Jakarta|Kuala Lumpur' => [500000, 1800],
            'Medan|Kuala Lumpur' => [350000, 960],
            'Kuala Lumpur|Singapore' => [150000, 360],
            'Kuala Lumpur|Johor Bahru' => [80000, 300],
            'Kuala Lumpur|Hat Yai' => [250000, 600],
            'Hat Yai|Bangkok' => [200000, 900],
            'Kuala Lumpur|Phuket' => [250000, 600],
            'Kuala Lumpur|Ho Chi Minh City' => [450000, 1200],
        ];

        $citiesByCountry = [];
        foreach ($cityModels as $city) {
            $citiesByCountry[$city->country_code][] = $city;
        }

        foreach ($citiesByCountry['ID'] as $origin) {
            foreach ($citiesByCountry['ID'] as $destination) {
                if ($origin->is($destination)) {
                    continue;
                }

                $distance = $this->roadDistance($origin, $destination);
                $fixedFares = [
                    'Jakarta|Bandung' => 105000,
                    'Jakarta|Yogyakarta' => 160000,
                    'Semarang|Surabaya' => 130000,
                ];
                $key = $origin->name.'|'.$destination->name;
                $fare = $fixedFares[$key] ?? $fixedFares[$destination->name.'|'.$origin->name] ?? 50000 + ($distance * 250);
                $this->saveRoute($origin, $destination, 'shuttle', $distance, (int) round($fare));
            }
        }

        foreach ($internationalShuttles as $key => [$fare, $duration]) {
            [$originName, $destinationName] = explode('|', $key);
            $origin = $cityModels[$originName];
            $destination = $cityModels[$destinationName];
            $this->saveRoute($origin, $destination, 'shuttle', null, $fare, $duration);
            $this->saveRoute($destination, $origin, 'shuttle', null, $fare, $duration);
        }

        foreach ($cityModels as $origin) {
            foreach ($cityModels as $destination) {
                if ($origin->is($destination)) {
                    continue;
                }

                $distance = $this->straightDistance($origin, $destination);
                $international = $origin->country_code !== $destination->country_code;
                $fare = 300000 + ($distance * ($international ? 1250 : 1050)) + ($international ? 350000 : 0);
                $duration = max(60, (int) (round((($distance / 750 * 60) + 100) / 15) * 15));
                $this->saveRoute($origin, $destination, 'flight', $distance, (int) round($fare), $duration);
            }
        }

        $classMultipliers = ['Ekonomi' => 1, 'Executive' => 1.35, 'VIP' => 1.8];
        foreach (Schedule::query()->with('route')->get() as $schedule) {
            $roundingUnit = $schedule->route->service_type === 'flight' ? 25000 : 5000;
            $fare = (int) (round(
                $schedule->route->base_fare * ($classMultipliers[$schedule->service_class] ?? 1) / $roundingUnit
            ) * $roundingUnit);

            $schedule->update(['fare_override' => $fare]);
        }
    }

    private function saveRoute(City $origin, City $destination, string $type, ?float $distance, int $fare, ?int $duration = null): void
    {
        $duration ??= max(60, (int) (round((($distance ?? 0) / 55 * 4) / 15) * 15));

        TravelRoute::query()->updateOrCreate(
            [
                'origin_city_id' => $origin->id,
                'destination_city_id' => $destination->id,
                'service_type' => $type,
            ],
            [
                'duration_minutes' => $duration,
                'base_fare' => $fare,
                'is_active' => true,
            ]
        );
    }

    private function roadDistance(City $origin, City $destination): float
    {
        return $this->straightDistance($origin, $destination) * 1.3;
    }

    private function straightDistance(City $origin, City $destination): float
    {
        $radians = M_PI / 180;
        $lat1 = (float) $origin->latitude;
        $lat2 = (float) $destination->latitude;
        $deltaLat = ($lat2 - $lat1) * $radians;
        $deltaLon = ((float) $destination->longitude - (float) $origin->longitude) * $radians;
        $a = sin($deltaLat / 2) ** 2
            + cos($lat1 * $radians) * cos($lat2 * $radians) * sin($deltaLon / 2) ** 2;

        return 2 * 6371 * asin(sqrt($a));
    }
}
