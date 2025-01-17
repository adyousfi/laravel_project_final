@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3">Manage News</h1>
    
   
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    
    <div class="text-end mb-3">
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
            Create New News
        </a>
    </div>

    @if($newsItems->count() > 0)
        <table class="table table-striped table-bordered">
            <thead> 
                <tr>
                    <th>Title</th>
                    <th>Publish Date</th>
                    <th class="text-center" style="width: 200px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($newsItems as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->publish_date }}</td>
                        <td class="text-center">
                           
                            <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-sm btn-info">
                                Edit
                            </a>

                            
                            <form action="{{ route('admin.news.destroy', $item->id) }}" 
                                  method="POST" 
                                  style="display:inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete this news item?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No news found.</p>
    @endif

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
