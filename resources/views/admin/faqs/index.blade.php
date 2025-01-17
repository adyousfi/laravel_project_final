@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>FAQ Questions</h1>
        <a href="{{ route('faq_categories.index') }}" class="btn btn-secondary">Manage FAQ Categories</a>
    </div>

    <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary mb-3">Create FAQ</a>

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

    <div class="text-center mt-4">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary" style="
            padding: 10px 20px; 
            font-size: 16px; 
            border-radius: 8px; 
            background-color: #6c757d; 
            color: #fff; 
            text-decoration: none;
            transition: all 0.3s ease;
        ">
            Return to Admin Dashboard
        </a>
    </div>

</div>
@endsection

