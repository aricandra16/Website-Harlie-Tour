<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('route_id')->constrained('routes')->restrictOnDelete();
            $table->dateTime('departure_at');
            $table->dateTime('arrival_at')->nullable();
            $table->unsignedSmallInteger('seat_capacity');
            $table->unsignedBigInteger('fare_override')->nullable();
            $table->string('status', 20)->default('scheduled'); // scheduled, cancelled, completed
            $table->timestamps();

            $table->unique(['route_id', 'departure_at']);
            $table->index(['status', 'departure_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
