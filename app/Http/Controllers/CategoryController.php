<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($slug)
    {
        $category = Category::where('slug', $slug)->first();

        $posts = Post::where('category_id', $category->id)
            ->where('active', 1)
//            ->orderBy('id', 'desc')
            ->latest()
            ->paginate(5);

        return view('post.index', compact(
            'posts',
            'category',
        ));
    }
}
