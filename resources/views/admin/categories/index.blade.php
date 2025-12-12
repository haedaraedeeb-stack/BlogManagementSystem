@extends('layouts.admin')

@section('title', 'Categories List')

@section('content')

    <div class="d-flex justify-content-between mb-3">
        <h2>Categories List</h2>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
            + Create Category
        </a>
    </div>

    <div class="card">
        <div class="card-body">

            @if ($categories->isEmpty())
                <p>No categories found.</p>
            @else
                <ul class="list-group">
                    @foreach ($categories as $category)
                        <li class="list-group-item d-flex justify-content-between align-items-center">

                            <span>{{ $category->name }}</span>

                            <div>
                                <a href="{{ route('admin.categories.edit', $category->id) }}"
                                    class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>

                        </li>
                    @endforeach
                </ul>
            @endif

        </div>
    </div>

@endsection
