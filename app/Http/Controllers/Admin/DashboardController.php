<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'blogs_count'     => Blog::count(),
            'categories_count'=> Category::count(),
            'users_count'     => User::count(),
            'trashed_count'   => Blog::onlyTrashed()->count(),
        ]);
    }
}
