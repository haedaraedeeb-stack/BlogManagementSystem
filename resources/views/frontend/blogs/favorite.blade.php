@extends('layouts.app')

@section('title', 'My Favorite Blogs')

@section('content')

    <h1 class="mb-4">My Favorite Blogs</h1>
    @if ($favoriteBlogs->isEmpty())
        <div class="alert alert-info">
            You have no favorite blogs yet.
        </div>
        <a href="{{ route('blogs.index') }}" class="btn btn-primary">
            Browse Blogs
        </a>
    @else
        <div class="row">
            @foreach ($favoriteBlogs as $blog)
                <div class="col-md-4 mb-4">
                    <div class="card p-3">
                        <h3>{{ $blog->title }}</h3>
                        @auth
                            <i class="fas fa-heart text-danger small" title="Favorite"></i>
                        @endauth
                        <img src="{{ asset('storage/' . $blog->image) }}" class="img-thumbnail mb-2" width="200">
                        <p class="mb-1">
                            <strong>Categories:</strong>
                            @foreach ($blog->categories as $cat)
                                {{ $cat->name }}{{ !$loop->last ? ',' : '' }}
                            @endforeach
                        </p>
                        <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-sm btn-primary mt-2">
                            Read More
                        </a>
                        @auth
                            <form method="POST" action="{{ route('blogs.toggleFavorite', $blog->id) }}" class="d-inline">
                                @csrf
                                <button class="btn btn-sm btn-danger mt-2">
                                    <i class="fas fa-times"></i> Remove
                                </button>
                            </form>
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    @endif

@endsection
