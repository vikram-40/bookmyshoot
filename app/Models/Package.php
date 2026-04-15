<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Package extends Model
{
    protected $fillable = ['name', 'price', 'description', 'features', 'is_popular'];

    protected $casts = [
        'price' => 'decimal:2',
        'is_popular' => 'bool',
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}