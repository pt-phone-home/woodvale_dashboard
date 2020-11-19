<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    public function sales() {
        return $this->hasMany(Sales::class, 'location_code','code');
    }

    public function location_group() {
        return $this->belongsTo(LocationGroup::class, 'location_id');
    }

    public function testing() {
        return [
            'code' => $this->code,
            'name' => $this->name,
        ];
    }
}
