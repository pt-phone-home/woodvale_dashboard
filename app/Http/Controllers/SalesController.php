<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\AdCategory;
use App\Models\Follower;
use App\Models\Like;
use App\Models\Location;
use App\Models\LocationGroup;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Sales;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Array_;
use Ramsey\Uuid\Type\Integer;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_sales = Sales::all()->pluck('value')->sum();
        return $total_sales;
    }

    public function unitsales() {
        $total_unit_sales = Sales::all()->count();
        return $total_unit_sales;
    }

    public function months() {
        $months = Sales::distinct('month')->pluck('month')->flatten();
        $years_ordered = Sales::distinct('year')->pluck('year')->flatten();
        $current_year = $years_ordered->last();
        $months_ordered = $months->mapWithKeys(function ($month) {
            return [$month => \Carbon\Carbon::createFromFormat('m', $month)->format('M')];
        });
//        $current_month = $months_ordered->last();
//        $current_month = \Carbon\Carbon::createFromFormat('m', $current_month)->format('m');
        $current_month = $months->last();
        return ['months_ordered' => $months_ordered, 'current_month' => $current_month, 'years_ordered' => $years_ordered, 'current_year' => $current_year];
    }

    public function monthlysales($year, $month) {
        $monthly_sales = Sales::where('year', $year)->where('month', $month)->pluck('value')->sum();
        return $monthly_sales ? "€$monthly_sales" : 'No Data';
    }

    public function monthlyunits($year, $month) {
       $monthly_units = Sales::where('year', $year)->where('month', $month)->count();

       return $monthly_units ? $monthly_units : 'No Data';

    }

    public function groupedByMonth($year, $product_id) {
        $all_ids = Product::all()->pluck('id');
        if  ($product_id == 0) {
          $sales =  Sales::sales_grouped_by_month($year, $all_ids);
          $unit_sales = Sales::units_grouped_by_month($year, $all_ids);
        } else {
            $sales =  Sales::sales_grouped_by_month($year, $product_id);
            $unit_sales = Sales::units_grouped_by_month($year, $product_id);
        }

        $months = $sales->keys()->map(function ($item) {
            return [$item => \Carbon\Carbon::createFromFormat('m', $item)->format('M')];
        });

        return ['months' => $sales->keys(), 'values' => $sales->values(), 'month_pairs' => $months, 'unit_sales' => $unit_sales->values() ];
    }

    public function unitsbylocation() {
        $units_by_location = Location::all()->map(function ($location) {
            return ['code' => $location->code,'name' => $location->name, 'units' => $location->sales->count()];
        });

        return $units_by_location;
    }

    public function salesbyregion() {
        $sales_by_region = LocationGroup::all()->map(function ($group) {
            return ['name' => $group->name, 'unit_sales' => $group->sales->count(), 'euro_sales' => $group->sales->sum('value')];
        });

        return $sales_by_region;
    }

    public function allproducts() {
        return Product::all();
    }

    public function facebookfollowers() {
        $followers = Follower::all()->sum('number');
        return $followers;
    }

    public function facebooklikes() {
        $likes = Like::all()->sum('number');
        return $likes;
    }

    public function adspending($year, $month, $category) {
        $all_categories = AdCategory::all()->pluck('id')->flatten();
        if ($category == 0) {
            $spending = Ad::all()->where('year', $year)
                ->whereIn('month', $month)
                ->whereIn('category_id', $all_categories)
                ->sum('cost');
        } else {
            $spending = Ad::all()->where('year', $year)
                ->whereIn('month', $month)
                ->whereIn('category_id', $category)
                ->sum('cost');
        }
        return $spending ? "€$spending" : 'No data';
    }

    public function adcategories() {
        return $ad_categories = AdCategory::all();
    }

    public function adyears() {
        return $ad_years = Ad::distinct('year')->pluck('year')->flatten();
    }

    public function admonths() {
        $ad_months = Ad::distinct('month')->pluck('month')->flatten();
        $ad_months = $ad_months->mapWithKeys(function ($month) {
            return [$month => \Carbon\Carbon::createFromFormat('m', $month)->format('M')];
        });
            return $ad_months;
    }

    public function totalAdSpend() {
       return $total_spend = Ad::all()->sum('cost');
    }

    public function latestad() {
        $now = \Carbon\Carbon::now()->subMonths(1)->format('m');
        return $latest_ad = Ad::all()->where('month', $now)->first();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(Sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales $sales)
    {
        //
    }
}
