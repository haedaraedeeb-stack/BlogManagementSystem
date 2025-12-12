@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="row mb-4">

    <div class="col-md-3">
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary btn-block">
            <i class="fas fa-plus"></i> Add New Blog
        </a>
    </div>

    <div class="col-md-3">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-success btn-block">
            <i class="fas fa-plus"></i> Add New Category
        </a>
    </div>

    <div class="col-md-3">
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-info btn-block">
            <i class="fas fa-eye"></i> View All Blogs
        </a>
    </div>

    <div class="col-md-3">
        <a href="{{ route('admin.categories.index') }}" class="btn btn-warning btn-block">
            <i class="fas fa-eye"></i> View All Categories
        </a>
    </div>

</div>

<div class="row">

    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $blogs_count }}</h3>
                <p>Total Blogs</p>
            </div>
            <div class="icon"><i class="fas fa-blog"></i></div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $categories_count }}</h3>
                <p>Categories</p>
            </div>
            <div class="icon"><i class="fas fa-tags"></i></div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $users_count }}</h3>
                <p>Users</p>
            </div>
            <div class="icon"><i class="fas fa-users"></i></div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $trashed_count }}</h3>
                <p>Trashed Blogs</p>
            </div>
            <div class="icon"><i class="fas fa-trash"></i></div>
        </div>
    </div>

</div>

@endsection
