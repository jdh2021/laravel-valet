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

        // check if image was uploaded with hasFile method
        if($request->hasFile('logo')) {
            // add to form fields, set it to path and upload with store method referencing logos folder and public disk
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // let database know which user submitted the form with auth helper
        $formFields['user_id'] = auth()->id();

        // use model with create method, pass in $formFields array
        Listing::create($formFields);

        // flash message - stored in memory for one page load - need to view to display that
        return redirect('/')->with('message', 'Listing created successfully!');
    }
        // method to show edit form takes in listing with variable name listing
        public function edit(Listing $listing) {
            // pass in listing itself
            return view('listings.edit', ['listing' =>$listing]);
        }

        // update listing data, pass in listing
        public function update(Request $request, Listing $listing) {
            // validate data, validate takes in an array with rules for form fields
            $formFields = $request->validate([
                'title' => 'required',
                'company' => ['required'],
                'location' => 'required',
                'website' => 'required',
                'email' => ['required', 'email'],
                'tags' => 'required',
                'description' => 'required'
            ]);   

            // check if image was uploaded with hasFile method
            if($request->hasFile('logo')) {
                // add to form fields, set it to path and upload with store method referencing logos folder and public disk
                $formFields['logo'] = $request->file('logo')->store('logos', 'public');
            }
             // use model with update method, pass in $formFields array
            $listing->update($formFields);

            // return back, flash message - stored in memory for one page load
            return back()->with('message', 'Listing updated successfully!');
    }

    // delete listing, pass in listing
    public function delete(Listing $listing) {
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }

    // manage listings, pass in listings of logged in user
    public function manage() {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}