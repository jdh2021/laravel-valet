<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // show register/create form to return view
    public function create() {
        return view('users.register');
    }

    // create new user with dependency injection of request
    public function store(Request $request) {
        // validate form fields
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            // email unique to users table, email field
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            // confirmed to match field with _confirmation
            'password' => ['required, confirmed, min:6']
        ]);

        // hash password with bcrypt
        $formFields['password'] = bcrypt($formFields['password']);
    }
}
