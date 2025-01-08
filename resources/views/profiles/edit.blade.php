
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
 <form action="{{ route('profile.update') }}" method="POST" class="mt-6 space-y-6">
    @csrf
    @method('PATCH')

    <!-- Gebruikersnaam -->
    <div>
        <label for="username">{{ __('Gebruikersnaam') }}</label>
        <input id="username" name="username" type="text" 
               value="{{ old('username', auth()->user()->username) }}" 
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
    </div>

    <!-- Geboortedatum -->
    <div>
        <label for="birthday">{{ __('Geboortedatum') }}</label>
        <input id="birthday" name="birthday" type="date" 
               value="{{ old('birthday', auth()->user()->birthday) }}" 
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
    </div>

    <!-- Over mij -->
    <div>
        <label for="about_me">{{ __('Over mij') }}</label>
        <textarea id="about_me" name="about_me" 
                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            {{ old('about_me', auth()->user()->about_me) }}
        </textarea>
    </div>

    <!-- Opslaan knop -->
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        {{ __('Opslaan') }}
    </button>
</form>


<style>
    .custom-button {
        background-color: #007bff; /* Blauwe achtergrond */
        color: #ffffff; /* Witte tekst */
        padding: 10px 20px;
        border-radius: 5px;
        border: none;
        font-weight: bold;
        cursor: pointer;
    }

    .custom-button:hover {
        background-color: #0056b3; /* Donkerder blauw bij hover */
    }
</style>

