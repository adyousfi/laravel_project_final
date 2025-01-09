@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3">Create News</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Title -->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                class="form-control"
                value="{{ old('title') }}" 
                required
            >
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea 
                name="description" 
                id="description" 
                rows="5"
                class="form-control"
                required
            >{{ old('description') }}</textarea>
        </div>

        <!-- Image -->
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input 
                type="file" 
                name="image" 
                id="image" 
                class="form-control"
                required
            >
        </div>

        <!-- Publish Date -->
        <div class="mb-3">
            <label for="publish_date" class="form-label">Publish Date</label>
            <input 
                type="date" 
                name="publish_date" 
                id="publish_date" 
                class="form-control"
                value="{{ old('publish_date') }}"
                required
            >
        </div>

        <button type="submit" class="btn btn-success w-100">
            Save News
        </button>
    </form>
</div>
@endsection
