<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // method to get and show all listings
    public function index() {
        // request helper to get value of tag
        // dd(request('tag'));
         // pass data that is array
        return view('listings.index', [
        // reference Listing model, :: for static method latest, tag gets passed in as $filters in Listing model
        'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()
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

    /*
    return a view to show a form to create a listing
    */
    public function create() {
        return view('listings.create');
    }
} 
