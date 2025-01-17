@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-12">
        <div class="bg-white shadow-md rounded-lg p-8">
            <!-- Header: Gebruikersnaam -->
            <div class="flex items-center mb-8">
                @if ($user->profile_picture)
                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="{{ $user->username }}" class="w-32 h-32 rounded-full border-2 border-gray-300 object-cover">
                @else
                    <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center text-gray-500">
                        <i class="fas fa-user text-3xl"></i>
                    </div>
                @endif
                <div class="ml-6">
                    <h1 class="text-2xl font-semibold">{{ $user->username ?? $user->name }}</h1>
                    <p class="text-sm text-gray-500">{{ $user->email }}</p>
                </div>
            </div>

            <!-- Profielinformatie -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">About me</h2>
                    <p class="text-gray-600">{{ $user->about_me ?? 'No information available.' }}</p>
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">Birthday</h2>
                    <p class="text-gray-600">{{ $user->birthday ? \Carbon\Carbon::parse($user->birthday)->format('d-m-Y') : 'No information available' }}</p>
                </div>
            </div>

            <!-- Comments sectie -->
            <hr class="my-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Existing comments</h2>
            <div class="bg-gray-50 p-4 rounded-lg shadow-inner">
                @if ($user->profileComments->isNotEmpty())
                    <ul class="space-y-4">
                        @foreach ($user->profileComments as $comment)
                            <li class="border-b pb-2">
                                <strong>{{ $comment->user->name }}:</strong>
                                <p class="text-sm text-gray-600">{{ $comment->body }}</p>
                                <small class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</small>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-sm text-gray-500">No comments found.</p>
                @endif

                @auth
                    <form method="POST" action="{{ route('profiles.comments.store', $user) }}" class="mt-4">
                        @csrf
                        <textarea name="body" rows="3" placeholder="Write a comment..." class="w-full border rounded-lg p-2 focus:outline-none focus:ring focus:ring-indigo-200"></textarea>
                        <button type="submit" class="custom-button">Post comment</button>
                    </form>
                @else
                    <p class="text-sm text-gray-500 mt-4"><a href="{{ route('login') }}" class="text-blue-500 hover:underline">Log in</a> to leave a comment.</p>
                @endauth
            </div>

            <!-- Prive bericht sturen -->
            @auth
                <hr class="my-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Send a private message</h2>
                <form method="POST" action="{{ route('messages.store', $user) }}" class="bg-gray-50 p-4 rounded-lg shadow-inner">
                    @csrf
                    <textarea name="body" rows="3" placeholder="Write your message..." class="w-full border rounded-lg p-2 focus:outline-none focus:ring focus:ring-indigo-200"></textarea>
                    <button type="submit" class="custom-button">Verstuur</button>
                </form>
            @endauth
        </div>
    </div>
@endsection


<style>
    .custom-button {
        background-color: #007bff; 
        color: #ffffff; 
        padding: 10px 20px;
        border-radius: 5px;
        border: none;
        font-weight: bold;
        cursor: pointer;
    }

    .custom-button:hover {
        background-color: #0056b3; 
    }
</style>
