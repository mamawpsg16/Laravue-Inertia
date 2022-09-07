<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //Show Register Form
    public function create() {
        return Inertia::render('Auth/Register');
    }

    //Show Login Form
    public function login() {
        return Inertia::render('Auth/Login');
    }

    public function store(RegisterRequest $request){

        //VALIDATE DATA
        $data = $request->validated();

        //HASH PASSWORD
        $data['password'] = Hash::make($request->password);

        //Store User
        $user = User::create($data);

        //Log In
        Auth::login($user);

        //Redirect
        return Redirect::route('home');
    }

    public function authenticate(LoginRequest $request)
    {
        //Check if info is correct & existing
        if(auth()->attempt($request->validated())) {
            $request->session()->regenerate();

            return Redirect::route('home');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return Redirect::route('auth.login');
    }
}
