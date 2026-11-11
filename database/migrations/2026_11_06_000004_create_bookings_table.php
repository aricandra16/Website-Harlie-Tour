<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('schedule_id')->constrained('schedules')->restrictOnDelete();
            $table->string('booking_code', 16)->unique();
            $table->string('customer_name', 120);
            $table->string('customer_phone', 25);
            $table->string('customer_email', 190)->nullable();
            $table->unsignedTinyInteger('passenger_count');
            $table->unsignedBigInteger('unit_fare');
            $table->unsignedBigInteger('total_fare');
            $table->string('status', 20)->default('pending'); // pending, confirmed, cancelled, completed
            $table->string('payment_status', 20)->default('unpaid'); // unpaid, pending, paid, refunded
            $table->timestamp('booked_at')->useCurrent();
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamps();

            $table->index(['schedule_id', 'status']);
            $table->index(['customer_phone', 'booked_at']);
            $table->index(['status', 'booked_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
