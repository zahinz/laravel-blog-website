<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        // observe the sign in status
        // dd(auth()->user());

        return view('dashboard');
    }
}
