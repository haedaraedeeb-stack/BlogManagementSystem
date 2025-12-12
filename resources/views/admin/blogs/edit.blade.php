@extends('layouts.admin')

@section('title', 'Edit Blog')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/blogcss/edit.css') }}">
@endsection

@section('content')
    <div class="container">
        <h2>Edit Blog</h2>
        <div class="blog-details mt-4">
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary mt-4">Back</a>
        </div>

        <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data"
            class="form-container">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Title:</label>
                <input type="text" name="title" class="form-control" value="{{ $blog->title }}" required>
            </div>

            <div class="mb-3">
                <label>Content:</label>
                <textarea name="content" class="form-control" required>{{ $blog->content }}</textarea>
            </div>

            <div class="mb-3">
                <label>Image:</label>
                <input type="file" name="image" class="form-control">

                @if ($blog->image)
                    <div class="mt-3">
                        <img src="{{ asset('storage/' . $blog->image) }}" width="200">
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <h4>Select Categories:</h4>
                @foreach ($categories as $category)
                    <label class="d-block">
                        <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                            {{ $blog->categories->contains($category->id) ? 'checked' : '' }}>
                        {{ $category->name }}
                    </label>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

@endsection
