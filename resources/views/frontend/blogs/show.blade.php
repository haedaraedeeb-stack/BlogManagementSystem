@extends('layouts.app')

@section('title', $blog->title)

@section('content')

    <div class="blog-details">
        <h1>{{ $blog->title }}</h1>
        <img src="{{ asset('storage/' . $blog->image) }}" width="200" class="img-thumbnail mb-2">
        <p>
                        <strong>Categories:</strong>
                        @foreach ($blog->categories as $category)
                            {{ $category->name }}{{ !$loop->last ? ',' : '' }}
                        @endforeach
                    </p>
        <p class="text-muted">
            {{ $blog->created_at->format('d/m/Y') }}
        </p>

        @auth
            @php

                $isFavorited = auth()->user()->blogs->contains($blog);
            @endphp

            <form method="POST" action="{{ route('blogs.toggleFavorite', $blog) }}" class="mb-4 d-inline">
                @csrf
                <button type="submit"
                        class="btn btn-lg {{ $isFavorited ? 'btn-danger' : 'btn-outline-success' }}">

                    @if ($isFavorited)
                        <i class="fas fa-heart"></i> Exit from Favorite
                    @else
                        <i class="far fa-heart"></i>   Add to Favorite
                    @endif
                </button>
            </form>
        @else
            <div class="alert alert-info p-2 mb-4 d-inline-block">
                <i class="fas fa-info-circle"></i> <a href="{{ route('login') }}">login </a> To add this blog to favorite.
            </div>
        @endauth


        <div class="mt-3">
            {!! nl2br(e($blog->content)) !!}
        </div>

        <a href="{{ route('blogs.index') }}" class="btn btn-secondary mt-4">Back</a>
    </div>

@endsection
