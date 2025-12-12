<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function toggleFavorite(Blog $blog)
    {
        $user = auth()->user();
        if($user->blogs()->where('blog_id', $blog->id)->exists())
        {
            $user->blogs()->detach($blog->id);
            return redirect()->back()->with('success', 'Blog removed from favorites.');
        } else {
            $user->blogs()->attach($blog->id);
            return redirect()->back()->with('success', 'Blog added to favorites.');
        }
    }
    public function index()
    {
        $user = auth()->user();
        $favoriteBlogs = $user->blogs()->with('categories')->orderBy('created_at', 'desc')->get();
        return view('frontend.blogs.favorite', compact('favoriteBlogs'));
    }
}
