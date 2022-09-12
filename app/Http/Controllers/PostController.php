<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;
use Redirect;

class PostController extends Controller
{
    public function index(Post $post){
        return inertia("Post/Index",["posts" => $post->get()]);
    }

    public function show(Post $post)
    {
        return inertia("Post/Show", ["post" => $post]);
    }

    public function create()
    {
        return inertia("Post/Create");
    }

    public function store(Request $request, Post $post)
    {
        $input = $request->all();
        $post->fill($input)->save();
        return Redirect::route('post.show', $post->id);
    }
}
