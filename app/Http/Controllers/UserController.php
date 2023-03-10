<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\User;

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
            'password' => 'required | confirmed | min:6'
        ]);

        // hash password with bcrypt
        $formFields['password'] = bcrypt($formFields['password']);

        // create user 
        $user = User::create($formFields);

        // log in
        auth()->login($user);

        return redirect('/')->with('message', 'User created. Logged in');
    }

    // log out a user 
    public function logout (Request $request) {
        // removes auth info from user session -->
        auth()->logout();
        // invalidate user session and regenerate csrf token
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // redirect
        return redirect('/')->with('message', 'You\'re logged out');
    }

    // show login form
    public function login() {
        return view('users.login');
    }

    // log in a user
    public function authenticate(Request $request) {
           // validate form fields
           $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        // attempt to log user in
        if (auth()->attempt($formFields)) {
            // generate a session id
            $request->session()->regenerate();
            return redirect('/')->with('message', 'Logged in!');
        }
        // if login attempt fails. withErrors takes in array
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}
