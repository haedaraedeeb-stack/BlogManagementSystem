@extends('layouts.admin')

@section('title', $blog->title)

@section('content')

<div class="blog-details">
    <h1>{{ $blog->title }}</h1>
    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="img-fluid mb-3">

    <p class="text-muted">
        {{ $blog->created_at->format('d/m/Y') }}
    </p>

    <div class="mt-3">
        {!! nl2br(e($blog->content)) !!}
    </div>

    <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary mt-4">Back</a>
</div>

@endsection
