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

    
    <hr>
    <h4>Comments ({{ $newsItem->newsComments->count() }})</h4>
    @foreach($newsItem->newsComments as $comment)
        <div class="border p-3 mb-2">
            <p>{{ $comment->content }}</p>
            <small class="text-muted">
                @if($comment->user)
                    Posted by {{ $comment->user->name }}
                @else
                    Posted by Guest
                @endif
                on {{ $comment->created_at->format('d-m-Y H:i') }}
            </small>
        </div>
    @endforeach

    @auth
        <hr>
        <h5>Leave a comment</h5>
        <form action="{{ route('newsComments.store', $newsItem->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="content" class="form-label">Your Comment</label>
                <textarea name="content" id="content" rows="3" class="form-control" required></textarea>
                @error('content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Post Comment</button>
        </form>
    @else
        <p class="mt-4">
            <a href="{{ route('login') }}">Log in</a> to leave a comment.
        </p>
    @endauth
    
</div>
@endsection
