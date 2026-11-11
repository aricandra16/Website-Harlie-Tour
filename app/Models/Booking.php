<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_id',
        'booking_code',
        'customer_name',
        'customer_phone',
        'customer_email',
        'passenger_count',
        'travel_class',
        'unit_fare',
        'total_fare',
        'status',
        'payment_status',
        'booked_at',
        'expires_at',
        'confirmed_at',
        'cancelled_at',
    ];

    protected function casts(): array
    {
        return [
            'passenger_count' => 'integer',
            'unit_fare' => 'integer',
            'total_fare' => 'integer',
            'booked_at' => 'immutable_datetime',
            'expires_at' => 'immutable_datetime',
            'confirmed_at' => 'immutable_datetime',
            'cancelled_at' => 'immutable_datetime',
        ];
    }

    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class);
    }
}
