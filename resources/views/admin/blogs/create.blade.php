@extends('layouts.admin')

@section('title', 'Create Blog')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/blogcss/create.css') }}">
@endsection

@section('content')
    <div class="container">

        <h2>Create Blog</h2>

        <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" class="form-container">
            @csrf

            <div class="mb-3">
                <label>Title:</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <div class="mb-3">
                <label>Content:</label>
                <textarea name="content" class="form-control" required>{{ old('content') }}</textarea>
            </div>

            <div class="mb-3">
                <label>Image:</label>
                <input type="file" name="image" class="form-control" required>
            </div>

            <div class="mb-3">
                <h4>Select Categories:</h4>
                @foreach ($categories as $category)
                    <label class="d-block">
                        <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                        {{ $category->name }}
                    </label>
                @endforeach
            </div>

            <button type="submit" class="btn btn-success">Create</button>
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
