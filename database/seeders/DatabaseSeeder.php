<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // pass in array to create that includes fields that you want to be predefined
        $user = User::factory()->create([
            'name' => 'Amanda Smith',
            'email' => 'amandas@test.com'
        ]);


        // creating listings with Listing factory
        Listing::factory(6)->create([
            // define user_id (foreign key) as the id of the user that was created from User factory
            'user_id' => $user->id
        ]);
         
        // Listing::create([
        //     'title' => 'Dog Groomer',
        //     'tags' => 'scissoring, bathing, certification',
        //     'company' => 'Wags and Whiskers',
        //     'location' => 'San Francisco, CA',
        //     'email' => 'email@email.com',
        //     'website' => 'https://www.wagswhiskerswoof.com',
        //     'description' => 'Need experienced dog groomer for busy facility'
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
