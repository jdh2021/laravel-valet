<?php

use App\Models\Listing;
use Illuminate\Http\Request;
// bring in model
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;

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

// Resource Route Naming Conventions:
// index: show all listings
// show: show a single listing
// create: show form to create a listing
// store: store new listing
// edit: show form to edit listing
// update: update listing
// destory: delete listing

/* route class to call HTTP method GET
takes in contoller ListingController and index method 
*/
Route::get('/', [ListingController::class, 'index']);

// route to show form to create a listing with a listing with create method - needs to be placed before /listings/{listing} or create will be seen as {listing}
Route::get('/listings/create', [ListingController::class, 'create']);

// route to store listing data, store method is called
Route::post('/listings', [ListingController::class, 'store']);

// route to get single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);


// route to show edit form with edit method
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// route to update listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);

// Route::get('/hello', function() {
//     // response helper. takes in string and status. add headers.
//     return response('<h1>Hello World</h1>', 200) 
//         ->header('Content-Type', 'text/plain');
// });

// // route with wildcard, curly braces around param for wildcard. closure is function with variable of same name
// Route::get('/posts/{id}', function($id) {
//     // debugging, showing value of what is passed in with helper methods - dump, die, debug
//     // ddd($id);
//     return response ('Post '. $id);
//     // add constraints to what can be passed. 
//     })->where('id', '[0-9]+');

// // route with request, query params, import class
// Route::get('/search', function(Request $request) {
//     return $request->name . ' ' . $request->city;
// });

