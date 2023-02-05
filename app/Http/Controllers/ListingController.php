<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // method to get and show all listings
    public function index() {
         // pass data that is array
    return view('listings.index', [
        // reference Listing model, :: for static method all, data is coming from model
        'listings' => Listing::all()
    ]);
    }

    /* method to get and show single listing
    route model binding - Listing model and variable listing gets passed into function
    provides 404 functionality without having to specifiy abort ('404')
    */
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);

    }
} 
