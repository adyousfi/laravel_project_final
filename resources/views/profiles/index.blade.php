@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Alle Profielen</h1>

        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card h-100 text-center">
                        @if ($user->profile_picture)
                            <img src="{{ asset('storage/' . $user->profile_picture) }}" class="card-img-top rounded-circle mx-auto mt-3" style="width: 100px; height: 100px; object-fit: cover;" alt="{{ $user->username }}">
                        @else
                            <div class="bg-secondary rounded-circle mx-auto mt-3" style="width: 100px; height: 100px; display: flex; justify-content: center; align-items: center;">
                                <i class="fas fa-user text-white" style="font-size: 2rem;"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->username ?? $user->name }}</h5>
                            <p class="card-text text-muted">{{ $user->email }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('profiles.show', $user) }}" class="btn btn-primary btn-sm">Bekijk Profiel</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
