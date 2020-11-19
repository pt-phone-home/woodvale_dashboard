<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Array_;

class Sales extends Model
{
    use HasFactory;

    public static function sales_grouped_by_month($year, $product_ids) {
        $sales = Sales::all()->where('year', $year)->groupBy('month')->map(function ($collection) use ($product_ids) {
           return $collection->whereIn('product_id', $product_ids)->pluck('value')->sum();
        });
        return $sales;
    }

    public static function units_grouped_by_month($year, $product_ids) {
        $unit_sales = Sales::all()->where('year', $year)->groupBy('month')->map(function ($collection) use($product_ids) {
           return $collection->whereIn('product_id', $product_ids)->count();
        });

        return $unit_sales;
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function location() {
        return $this->belongsTo(Location::class, 'location_code');
    }
}
