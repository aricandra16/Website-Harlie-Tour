<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'route_id',
        'departure_at',
        'service_class',
        'arrival_at',
        'seat_capacity',
        'fare_override',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'departure_at' => 'immutable_datetime',
            'arrival_at' => 'immutable_datetime',
            'seat_capacity' => 'integer',
            'fare_override' => 'integer',
        ];
    }

    public function route(): BelongsTo
    {
        return $this->belongsTo(TravelRoute::class, 'route_id');
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
