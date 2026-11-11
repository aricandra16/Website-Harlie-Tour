<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('routes', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('origin_city_id')->constrained('cities')->restrictOnDelete();
            $table->foreignId('destination_city_id')->constrained('cities')->restrictOnDelete();
            $table->string('service_type', 20); // shuttle or flight
            $table->unsignedSmallInteger('duration_minutes')->nullable();
            $table->unsignedBigInteger('base_fare'); // Rupiah, stored as an integer
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique(
                ['origin_city_id', 'destination_city_id', 'service_type'],
                'routes_origin_destination_service_unique'
            );
            $table->index(['is_active', 'service_type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
