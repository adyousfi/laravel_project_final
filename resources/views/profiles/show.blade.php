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
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">Over mij</h2>
                    <p class="text-gray-600">{{ $user->about_me ?? 'Geen informatie beschikbaar.' }}</p>
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">Geboortedatum</h2>
                    <p class="text-gray-600">{{ $user->birthday ? \Carbon\Carbon::parse($user->birthday)->format('d-m-Y') : 'Niet opgegeven' }}</p>
                </div>
            </div>

            <!-- Comments sectie -->
            <hr class="my-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Bestaande comments</h2>
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
                    <p class="text-sm text-gray-500">Geen comments gevonden.</p>
                @endif

                @auth
                    <form method="POST" action="{{ route('profiles.comments.store', $user) }}" class="mt-4">
                        @csrf
                        <textarea name="body" rows="3" placeholder="Schrijf een comment..." class="w-full border rounded-lg p-2 focus:outline-none focus:ring focus:ring-indigo-200"></textarea>
                        <button type="submit" class="mt-2 bg-blue-500 hover:bg-blue-700 text-blue py-1 px-4 rounded">Plaatsen</button>
                    </form>
                @else
                    <p class="text-sm text-gray-500 mt-4"><a href="{{ route('login') }}" class="text-blue-500 hover:underline">Log in</a> om een comment te plaatsen.</p>
                @endauth
            </div>

            <!-- Prive bericht sturen -->
            @auth
                <hr class="my-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Stuur een bericht</h2>
                <form method="POST" action="{{ route('messages.store', $user) }}" class="bg-gray-50 p-4 rounded-lg shadow-inner">
                    @csrf
                    <textarea name="body" rows="3" placeholder="Typ je bericht..." class="w-full border rounded-lg p-2 focus:outline-none focus:ring focus:ring-indigo-200"></textarea>
                    <button type="submit" class="mt-2 bg-blue-500 hover:bg-blue-700 text-blue py-1 px-4 rounded">Verstuur</button>
                </form>
            @endauth
        </div>
    </div>
@endsection
