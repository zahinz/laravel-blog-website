<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// routing from signup to dahsboard page 
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// routing to display page /register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
// routing to store the input from the form
Route::post('/register', [RegisterController::class, 'store']) ;

// login controller
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']) ;

// logout controller
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// return home
Route::get('/', function() {
    return view('home');
})->name('home');

Route::get('/posts', function () {
    return view('posts.index');
})->name('posts');

