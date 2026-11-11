<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country_name',
        'country_code',
        'timezone',
        'latitude',
        'longitude',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'latitude' => 'decimal:7',
            'longitude' => 'decimal:7',
            'is_active' => 'boolean',
        ];
    }

    public function originRoutes(): HasMany
    {
        return $this->hasMany(TravelRoute::class, 'origin_city_id');
    }

    public function destinationRoutes(): HasMany
    {
        return $this->hasMany(TravelRoute::class, 'destination_city_id');
    }
}
