<?php

// use namespace to be able to access from other files
namespace App\Models;

class Listing {
    // function to get all listings
    public static function all() {
        // this will be replaced by database query
        return  [
            [
                'id' => 1,
                'title' => 'Listing One',
                'description' => 'Paint small barn'
            ],
            [
                'id' => 2,
                'title' => 'Listing Two',
                'description' => 'Mount TV in living room'
            ],

        ];  
    }

    // function to get single listing
    public static function find($id) {
        // call function with self
        $listings = self::all();
        // loop through the listings
        foreach($listings as $listing) {
            if($listing['id'] == $id) {
                return $listing;
            }
        }
    }
}