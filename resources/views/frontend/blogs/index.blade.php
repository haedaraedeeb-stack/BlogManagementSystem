@extends('layouts.app')

@section('title', 'Blogs List')

@section('content')

    <h1 class="mb-4">Blogs</h1>
    <form method="GET" action="{{ route('blogs.index') }}" class="mb-3">
        @if ($categories->isEmpty())
            <p>No categories available.</p>
        @else
            @foreach ($categories as $cat)
                <label style="margin-right:15px;">
                    <input type="checkbox" name="categories[]" value="{{ $cat->id }}"
                        {{ in_array($cat->id, (array) $selected) ? 'checked' : '' }}>
                    {{ $cat->name }}
                </label>
            @endforeach
            <button type="submit" class="btn btn-primary btn-sm">Filter</button>
            <a href="{{ route('blogs.index') }}" class="btn btn-secondary btn-sm">Reset</a>
        @endif
    </form>
    <form method="GET" action="{{ route('blogs.favoriteIndex') }}" class="mb-3">
        <button type="submit" class="btn btn-warning btn-sm">My Favorite Blogs</button>
    </form>

    <div class="row">
        @foreach ($blogs as $blog)
            <div class="col-md-4 mb-4">
                <div class="card p-3">
                    <h3>{{ $blog->title }}</h3>
                    @auth
                        <form method="POST" action="{{ route('blogs.toggleFavorite', $blog->id) }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link p-0" style="border:none;">
                                @if (auth()->user()->blogs->contains($blog))
                                    <i class="fas fa-heart text-danger small" title="Remove from favorites">Favorite</i>
                                @else
                                    <i class="far fa-heart text-muted small" title="Add to favorites">Un Favorite</i>
                                @endif
                            </button>
                        </form>
                    @endauth
                    <img src="{{ asset('storage/' . $blog->image) }}" width="200" class="img-thumbnail mb-2">
                    <p>{{ Str::limit($blog->content, 100) }}</p>
                    <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary btn-sm">
                        Read More
                    </a>
                </div>
            </div>
        @endforeach
    </div>

@endsection
