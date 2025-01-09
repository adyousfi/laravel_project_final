@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">{{ $newsItem->title }}</h2>

    <img 
        src="{{ asset('storage/' . $newsItem->image) }}" 
        alt="News Image"
        class="img-fluid mb-3"
        style="max-height:400px; object-fit:cover;">

    <p class="text-muted">Published: {{ $newsItem->publish_date }}</p>

    <p>{{ $newsItem->description }}</p>

   
    <a href="{{ route('news.index') }}" class="btn btn-secondary mt-2">Back to News</a>
</div>
@endsection
