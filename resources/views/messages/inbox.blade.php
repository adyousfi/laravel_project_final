@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold text-gray-800 text-center mb-6">Inbox</h1>

        @if ($messages->isEmpty())
            <p class="text-lg text-gray-600 text-center mt-4">You have not received a message yet.</p>
        @else
            <ul class="space-y-4">
                @foreach ($messages as $message)
                    <li class="bg-gray-50 border border-gray-200 rounded-lg p-4 shadow hover:shadow-lg hover:-translate-y-1 transition transform">
                        <div class="flex items-center justify-between">
                            <div>
                                <strong class="text-gray-800">From:</strong>
                                <span class="text-gray-600">{{ $message->sender->name }}</span>
                            </div>
                            <small class="text-sm text-gray-400">{{ $message->created_at->diffForHumans() }}</small>
                        </div>
                        <p class="text-gray-700 mt-2">{{ $message->body }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
