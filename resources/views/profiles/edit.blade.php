@if(session('success'))
    <div 
        style="
            color: #0f5132;           
            background-color: #d1e7dd; 
            font-size: 1.5rem;        
            font-weight: bold;       
            padding: 1rem;            
            border: 2px solid #badbcc; 
            border-radius: 8px;
            margin-bottom: 1rem;
        "
    >
        {{ session('success') }}
    </div>
@endif
<br>
<br>

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Profielfoto upload -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">{{ __('Profielfoto bijwerken') }}</h2>
                    </header>

   

<form method="POST" action="{{ route('profile.updateProfilePicture') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
    @csrf
    <div>
        <label for="profile_picture" class="block text-sm font-medium text-gray-700">{{ __('Profielfoto') }}</label>
        <input id="profile_picture" type="file" name="profile_picture" accept="image/*" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
    </div>

    @if (auth()->user()->profile_picture)
        <div class="mt-4">
            <p class="text-sm text-gray-600">{{ __('Huidige profielfoto:') }}</p>
            <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profielfoto" class="rounded-full w-20 h-20 object-cover">
        </div>
    @endif

    <button type="submit" class="custom-button">
        {{ __('Bijwerken') }}
    </button>
</form>

               
        
<!-- Profielinformatie bewerken -->
<div class="max-w-xl mx-auto bg-white shadow-md rounded-md p-6 mt-6">
    <h2 class="text-2xl font-bold mb-4 text-gray-700">
        {{ __('Profielinformatie bewerken') }}
    </h2>

    <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
        @csrf
        @method('PATCH')

        <!-- Gebruikersnaam -->
        <div>
            <label for="username" class="block font-semibold text-gray-700 mb-1">
                {{ __('Gebruikersnaam') }}
            </label>
            <input
                id="username"
                name="username"
                type="text"
                value="{{ old('username', auth()->user()->username) }}"
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none
                       focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500
                       transition-colors duration-200"
            >
        </div>

        <!-- Geboortedatum -->
        <div>
            <label for="birthday" class="block font-semibold text-gray-700 mb-1">
                {{ __('Geboortedatum') }}
            </label>
            <input
                id="birthday"
                name="birthday"
                type="date"
                value="{{ old('birthday', auth()->user()->birthday) }}"
                class="w-full border border-gray-300 rounded-md px-3 py-2
                       focus:outline-none focus:ring-2 focus:ring-indigo-500
                       focus:border-indigo-500 transition-colors duration-200"
            >
        </div>

        <!-- Over mij -->
        <div>
            <label for="about_me" class="block font-semibold text-gray-700 mb-1">
                {{ __('Over mij') }}
            </label>
            <textarea
                id="about_me"
                name="about_me"
                rows="5"
                class="w-full border border-gray-300 rounded-md px-3 py-2
                       focus:outline-none focus:ring-2 focus:ring-indigo-500
                       focus:border-indigo-500 transition-colors duration-200"
            >{{ old('about_me', auth()->user()->about_me) }}</textarea>
        </div>

        
        <button type="submit" class="custom-button">
            {{ __('Opslaan') }}
        </button>
    </form>
</div>



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

