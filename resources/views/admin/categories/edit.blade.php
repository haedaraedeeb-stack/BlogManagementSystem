@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h2>Edit Category</h2>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="card">
    <div class="card-body">

        <form method="POST" action="{{ route('admin.categories.update', $category->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Category Name:</label>
                <input type="text" name="name" value="{{ $category->name }}" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
</div>

@endsection
