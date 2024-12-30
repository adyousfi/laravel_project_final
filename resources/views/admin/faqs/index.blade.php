@extends('layouts.app')

@section('content')
<div class="container">
    <h1>FAQ Questions</h1>
    <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">Create FAQ</a>

    <table class="table">
        <thead>
            <tr>
                <th>Question</th>
                <th>Answer</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($faqs as $faq)
                <tr>
                    <td>{{ $faq->question }}</td>
                    <td>{{ $faq->answer }}</td>
                    <td>{{ $faq->category->name }}</td>
                    <td>
                    <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
