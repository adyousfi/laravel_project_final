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
        // Valideer de gegevens en sla het resultaat op in $validated
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'usertype' => 'required|in:user,admin',
        ]);
    
        // Maak een nieuwe gebruiker aan
        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']);
        $user->usertype = $validated['usertype'];
        $user->save();
    
        // Redirect naar een succespagina
        return redirect()->route('admin.view_category')->with('success', 'Gebruiker succesvol aangemaakt!');
    }
  
}
