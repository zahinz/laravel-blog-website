<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index() {

        return view('auth.login');

    }

    public function store(Request $request) {

        // dd($request->remember);

        // *1 validate the user input and display $message error when the input in not meet the requirements below
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // *2 sign in the user
        if(!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('status', 'Invalid login details');
        }

        // *3 redirection
        return redirect()-> route('dashboard');

    } 
}
