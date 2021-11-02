<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    
    public function index()
    {
        // return the view 'name of the view'
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // ? dd() can use as debug tools
        // dd($request);
        // dd($request->email);

        // *1 validate the user input and display $message error when the input in not meet the requirements below
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            // confirmed - will look at other input with _confrimation and compaired it with this input
            'password' => 'required|confirmed',
        ]);

        // *2 store user into database
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // *3 sign in the user
        auth()->attempt($request->only('email', 'password'));

        // *4 redirection
        return redirect()-> route('dashboard');



    }
}
