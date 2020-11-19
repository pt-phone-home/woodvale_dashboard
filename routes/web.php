<?php

use App\Models\Sales;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(auth()->user()) {
        return view('home');
    } else {
        return view('welcome');
    }

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/totalsales', [\App\Http\Controllers\SalesController::class, 'index'])->middleware('auth');
Route::get('/totalunitsales', [\App\Http\Controllers\SalesController::class, 'unitsales'])->middleware('auth');
Route::get('/months', [\App\Http\Controllers\SalesController::class, 'months'])->middleware('auth');
Route::get('/monthlysales/{year}/{month}', [\App\Http\Controllers\SalesController::class, 'monthlysales'])->middleware('auth');
Route::get('/monthlyunits/{year}/{month}', [\App\Http\Controllers\SalesController::class, 'monthlyunits'])->middleware('auth');
Route::get('/salesbymonth/{year}/{productIds}', [\App\Http\Controllers\SalesController::class, 'groupedByMonth'])->middleware('auth');
Route::get('/allproducts', [\App\Http\Controllers\SalesController::class, 'allproducts'])->middleware('auth');
Route::get('/unitsbylocation', [\App\Http\Controllers\SalesController::class, 'unitsbylocation'])->middleware('auth');
Route::get('/salesbyregion', [\App\Http\Controllers\SalesController::class, 'salesbyregion'])->middleware('auth');
Route::get('/facebookfollwers', [\App\Http\Controllers\SalesController::class, 'facebookfollowers'])->middleware('auth');
Route::get('/facebooklikes', [\App\Http\Controllers\SalesController::class, 'facebooklikes'])->middleware('auth');
Route::get('/facebookadspending/{year}/{month}/{category}', [\App\Http\Controllers\SalesController::class, 'adspending'])->middleware('auth');
Route::get('/totaladspend', [\App\Http\Controllers\SalesController::class, 'totalAdSpend'])->middleware('auth');
Route::get('/adcategories', [\App\Http\Controllers\SalesController::class, 'adcategories'])->middleware('auth');
Route::get('/adyears', [\App\Http\Controllers\SalesController::class, 'adyears'])->middleware('auth');
Route::get('/admonths', [\App\Http\Controllers\SalesController::class, 'admonths'])->middleware('auth');
Route::get('/latestad', [\App\Http\Controllers\SalesController::class, 'latestad'])->middleware('auth');

Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'show'])->middleware('auth')->name('profile.show');
Route::patch('/updateprofile', [\App\Http\Controllers\ProfileController::class, 'update'])->middleware('auth')->name('profile.update');
