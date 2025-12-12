<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;;
use App\Models\Category;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::orderBy('name')->get();
        $selected = $request->query('categories' , []);
        $blogsQuery = Blog::with('categories')->orderBy('created_at' , 'desc');
        if(!empty($selected)){
            $blogsQuery->whereHas('categories',function($query) use($selected){
                $query->whereIn('categories.id' , $selected);
            });
        }
        $blogs = $blogsQuery->get();
        return view('frontend.blogs.index', compact('blogs' , 'categories' , 'selected'));
    }
    public function show(Blog $blog)
    {
        $categories = Category::all();
        $blog->load('categories');

        return view('frontend.blogs.show', compact('blog' , 'categories'));
        
}

}
