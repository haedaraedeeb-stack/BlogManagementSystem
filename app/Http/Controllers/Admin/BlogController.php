<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CreateBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Http\Controllers\Controller;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        return view('admin.blogs.index', compact('blogs' , 'categories' , 'selected'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.blogs.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBlogRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blogs', 'public');
            $data['image'] = $imagePath;
        }
        $blog = Blog::create($data);
        $blog->categories()->attach($request->categories);
        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully.');

    }


    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $categories = Category::all();
        $blog->load('categories');
        return view('admin.blogs.show', compact('blog' , 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = Category::all();
        return view('admin.blogs.edit', compact('blog' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $data = $request->validated();
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('blogs','public');
            $data['image'] = $imagePath;
        }
            $blog ->update($data);
            $blog->categories()->sync($request->categories);
            return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->categories();
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully.');
    }
    public function gettrashedData()
    {
        $blogs = Blog::onlyTrashed()->with('categories')->get();
        return view('admin.blogs.trashed', compact('blogs'));
    }

    public function restore($id)
    {
        $blog = Blog::withTrashed()->find($id);
        $blog->restore();
        return redirect()->route('admin.blogs.index')->with('success' , 'Blog restored successfuly.');
    }
    public function forceDelete($id)
    {
        $blog = Blog::withTrashed()->find($id);
        $blog->categories()->detach();
        $blog->forceDelete();
        return redirect()->route('admin.blogs.trashed')->with('success' , 'Blog permanently deleted successfuly.');
    }

}
