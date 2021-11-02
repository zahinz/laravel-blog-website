<?php

namespace App\Http\Controllers;

use App\Mail\PostLiked;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index() {

        // observe the sign in status
        // dd(auth()->user()->posts);
        // ? created at will return created_at as carbon datetime manipulation. Carbon is a php package. https://carbon.nesbot.com/docs/
        // dd(Post::find(4)->created_at->diffForHumans());

        return view('dashboard');
    }
}
