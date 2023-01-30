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

//
Route::get('/hello', function() {
    // response helper. takes in string and status. add headers.
    return response('<h1>Hello World</h1>', 200) 
        ->header('Content-Type', 'text/plain');
});

// route with wildcard, curly braces around param for wildcard. closure is function with variable of same name
Route::get('/posts/{id}', function($id) {
    // debugging, showing values of what is passed in with helpers methods - dump, die, debug
    ddd($id);
    return response ('Post '. $id);
    // add constraints to what can be passed. 
    })->where('id', '[0-9]+');



