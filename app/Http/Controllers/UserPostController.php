<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function index(User $user)
    {
        // dd($user);

        // get the post with the likes
        $posts = $user->posts()->with(['user', 'likes'])->paginate(10);

        // return view with user model
        return view('users.posts.index', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
}
