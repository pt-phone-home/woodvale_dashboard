<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function sales() {
        return $this->hasMany(Sales::class);
    }

    public function category() {
        return $this->belongsTo(ProductCategory::class);
    }
}
