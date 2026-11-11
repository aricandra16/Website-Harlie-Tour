<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TravelRoute extends Model
{
    use HasFactory;

    protected $table = 'routes';

    protected $fillable = [
        'origin_city_id',
        'destination_city_id',
        'service_type',
        'duration_minutes',
        'base_fare',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'duration_minutes' => 'integer',
            'base_fare' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    public function origin(): BelongsTo
    {
        return $this->belongsTo(City::class, 'origin_city_id');
    }

    public function destination(): BelongsTo
    {
        return $this->belongsTo(City::class, 'destination_city_id');
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class, 'route_id');
    }
}
