@extends('layouts.admin')

@section('title', 'Blogs List')

@section('content')

    <div class="container mt-4">

        <h2>Blogs Page</h2>

        <form method="GET" action="{{ route('admin.blogs.index') }}" class="mb-3">
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
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary btn-sm">Reset</a>
            @endif
        </form>

        <div class="mb-3">
            <a href="{{ route('admin.blogs.create') }}" class="btn btn-success">Create Blog</a>
            <a href="{{ route('admin.blogs.trashed') }}" class="btn btn-warning">Trashed Blogs</a>
        </div>

        <ul class="list-group">
            @foreach ($blogs as $blog)
                <li class="list-group-item">

                    <h4>{{ $blog->title }}</h4>

                    <img src="{{ asset('storage/' . $blog->image) }}" width="200" class="img-thumbnail mb-2">

                    <p>{{ $blog->content }}</p>

                    <p>
                        <strong>Categories:</strong>
                        @foreach ($blog->categories as $category)
                            {{ $category->name }}{{ !$loop->last ? ',' : '' }}
                        @endforeach
                    </p>

                    <a href="{{ route('admin.blogs.show', $blog->id) }}" class="btn btn-info btn-sm">
                        Show
                    </a>

                    <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-primary btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>

                </li>
            @endforeach
        </ul>

    </div>

@endsection

