<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ContactMessage;

class AdminController extends Controller
{
    public function manage_users()
    {
        $users = User::all();
        return view('admin.manage_users', compact('users'));
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
        return redirect()->route('admin.manage_users')->with('success', 'Gebruiker succesvol aangemaakt!');
    }

    public function index()
    {
        // Voeg contactberichten toe
        $messages = ContactMessage::orderBy('created_at', 'desc')->get();

        // Retourneer de admin-dashboard view met berichten
        return view('admin.index', compact('messages'));
    }

    public function replyContactMessage(Request $request, ContactMessage $contactMessage)
    {
        $request->validate([
            'reply' => 'required|string',
        ]);

        // Markeer het bericht als beantwoord
        $contactMessage->answered = true;
        $contactMessage->save();

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'The message has been replied and marked as answered.');
    }
}
