<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('schedules', function (Blueprint $table): void {
            $table->dropUnique('schedules_route_id_departure_at_unique');
            $table->string('service_class', 20)->default('Executive')->after('departure_at');
            $table->unique(['route_id', 'departure_at', 'service_class'], 'schedules_route_departure_class_unique');
        });

        Schema::table('bookings', function (Blueprint $table): void {
            $table->string('travel_class', 20)->default('Executive')->after('passenger_count');
            $table->timestamp('expires_at')->nullable()->after('booked_at');
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table): void {
            $table->dropColumn(['travel_class', 'expires_at']);
        });

        Schema::table('schedules', function (Blueprint $table): void {
            $table->dropUnique('schedules_route_departure_class_unique');
            $table->dropColumn('service_class');
            $table->unique(['route_id', 'departure_at']);
        });
    }
};
