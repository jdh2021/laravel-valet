<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // method to get and show all listings
    public function index() {
        // request helper to get value of tag
        // dd(request('tag'));
         // pass data that is array
        return view('listings.index', [
        // reference Listing model, :: for static method latest, tag gets passed in as $filters in Listing model
        'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
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

    /*
    return a view to store listing data from form, dependency injection of Request $request
    */
    public function store(Request $request) {
        // dd($request->file('logo')->store());
        // validate data, validate takes in an array with rules for form fields
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        // use model with create method, pass in $formFields array
        Listing::create($formFields);

        // flash message - stored in memory for one page load - need to view to display that
        return redirect('/')->with('message', 'Listing created successfully!');
    }
} 
