<?php

namespace App\Http\Controllers;

// use App\Models\Post;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }

    public function index() {
        // get the post using eloquent
        // it will return a laravel collection
        // $posts = Post::get();

        // get the post paginate it
        // eager loading every request in database and return in array
        $posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(5);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request) {
        // validate the value of the input
        $this->validate($request, [
            'body' => 'required',
        ]);

        // push the post in relation with the id of the auth user
        // this been made by the model relation from user hasMany(Post::class)
        $request->user()->posts()->create([
            'body' => $request->body
        ]);

        return back();
    }

    public function destroy(Post $post) {

        // ? transferred into policies
        // if (!$post->ownedBy(auth()->user())) {
        //     dd('no');
        // }

        $this->authorize('delete', $post);

        $post->delete();
        return back();
    }

    public function show(Post $post) {
        return view('posts.show', [
            'post' => $post,
        ]);
    }
}
