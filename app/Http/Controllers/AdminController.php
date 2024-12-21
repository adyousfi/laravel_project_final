<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AdminController extends Controller
{
    public function view_category()
    {
        $users = User::all();
        return view('admin.category', compact('users'));
    }

  

    public function toggleAdmin($id)
    {
        $user = User::findOrFail($id);

        if ($user->id === auth()->user()->id) {
            return redirect()->back()->with('error', 'Je kunt je eigen adminrechten niet wijzigen!');
        }

       
        $user->usertype = $user->usertype == 'admin' ? 'user' : 'admin';
        $user->save();

        return redirect()->back()->with('status', 'Gebruikerstype succesvol gewijzigd!');
    }


    public function createUser(Request $request)
{
    // Controleer of de ingelogde gebruiker een admin is
    if(auth()->user()->usertype !== 'admin') {
        return redirect()->back()->with('error', 'Je hebt geen toestemming om deze actie uit te voeren.');
    }

    // Valideer de input
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed', 
        'usertype' => 'required|in:user,admin', 
    ]);

    // Maak de nieuwe gebruiker aan
    User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => bcrypt($validatedData['password']),
        'usertype' => $validatedData['usertype'], 
    ]);

   
    return redirect()->route('admin.view_category')->with('success', 'Gebruiker succesvol aangemaakt!');
}

  
}
