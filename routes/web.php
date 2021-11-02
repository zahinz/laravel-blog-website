<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use Illuminate\Support\Facades\Route;

// routing from signup to dahsboard page 
Route::get('/dashboard', [DashboardController::class, 'index'])
->name('dashboard')
->middleware('auth');

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

// route for post from post controller
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// route for likes and unlike
Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes');

// route user posts
Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])->name('users.posts');