@extends('layouts.admin')

@section('title', 'Trashed Blogs')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/blogcss/trashed.css') }}">
@endsection

@section('content')
    <div class="container">
        <h2>Trashed Blogs</h2>

        <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary mb-3">Back</a>

        @if ($blogs->isEmpty())
            <p>No trashed blogs available.</p>
        @else
            <ul class="list-group">
                @foreach ($blogs as $blog)
                    <li class="list-group-item">

                        <h3>{{ $blog->title }}</h3>
                        <p>{{ $blog->content }}</p>

                        <img src="{{ asset('storage/' . $blog->image) }}" width="200">

                        <p class="mt-2">
                            Categories:
                            @foreach ($blog->categories as $category)
                                {{ $category->name }}{{ !$loop->last ? ',' : '' }}
                            @endforeach
                        </p>

                        <a href="{{ route('admin.blogs.restore', $blog->id) }}" class="btn btn-success">
                            Restore
                        </a>

                        <form action="{{ route('admin.blogs.forceDelete', $blog->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">
                                Delete Forever
                            </button>
                        </form>

                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
