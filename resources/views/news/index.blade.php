@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3">Latest News</h1>

    <div class="row">
        @foreach($newsItems as $item)
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <img 
                        src="{{ asset('storage/' . $item->image) }}" 
                        class="card-img-top" 
                        alt="News Image"
                        style="max-height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">
                            {{ \Illuminate\Support\Str::limit($item->description, 80, '...') }}
                        </p>
                        <p class="text-muted mb-2">Published: {{ $item->publish_date }}</p>

                        <a href="{{ route('news.show', $item->id) }}" class="btn btn-primary mt-auto">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
