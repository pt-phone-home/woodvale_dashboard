<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationGroup extends Model
{
    use HasFactory;

    public function locations() {
        return $this->hasMany(Location::class, 'location_id');
    }

    public function sales() {
        return $this->hasManyThrough(Sales::class,
                            Location::class,
                            'location_id',
                        'location_code',
                            'id',
                    'code');
    }
}
