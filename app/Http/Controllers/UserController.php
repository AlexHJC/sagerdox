<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Middleware\RedirectIfAuthenticated;

class UserController extends Controller
{
    // show user registration page
    public function create()
    {
        return view('users.register');
    }
    // store new user information
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:3'
        ]);
        // hash password
        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/')->with('message', 'User successfully created and logged in');
    }
    // logout user
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'you have been logged out');
    }
    // login user
    public function login()
    {
        return view('/users.login');
    }
    // authenticate user
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'you have successfully logged in');
        }

        return back()->withErrors(['email' => 'invalid credentials'])->onlyInput('email');
    }
}
