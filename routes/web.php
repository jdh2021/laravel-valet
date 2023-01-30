<?php

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

// route class to call HTTP method GET. similar to express.js. takes in endpoint and closure that is a function.
Route::get('/', function () {
    return view('welcome');
});


Route::get('/hello', function() {
    return 'Hello World';
});