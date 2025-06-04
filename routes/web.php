<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Models\Destination;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $categories = Category::all();
    $featuredDestinations = Destination::where('is_featured', true)
        ->with('category')
        ->take(6)
        ->get();
    return view('home', compact('categories', 'featuredDestinations'));
})->name('home');

Route::resource('destinations', DestinationController::class);
Route::resource('categories', CategoryController::class);

// Search routes
Route::get('/search', [DestinationController::class, 'search'])->name('search');

// Filter routes
Route::get('/destinations/category/{category}', [DestinationController::class, 'byCategory'])->name('destinations.byCategory');
Route::get('/destinations/filter', [DestinationController::class, 'filter'])->name('destinations.filter');
