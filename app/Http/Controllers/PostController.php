<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Post $post){
        return inertia("Post/Index",["posts" => $post->get()]);
    }

    public function show(Post $post)
    {
        return inertia("Post/Show", ["post" => $post]);
    }
}
