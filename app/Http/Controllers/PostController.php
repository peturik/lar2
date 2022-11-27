<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('post.index', [
            'posts' => Post::all(),
        ]);
    }

    public function show($slug)
    {
        return view('post', [
            'post' => Post::where('slug', $slug),
        ]);
    }
}
