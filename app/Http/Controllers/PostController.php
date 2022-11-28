<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('post.index', [
            'posts' => Post::paginate(2),
        ]);
    }

    public function show($slug)
    {
        
        return view('post.show', [
            'post' => Post::where('slug', $slug)->first(),
            // 'user' => User::find($id),
        ]);
    }
}
