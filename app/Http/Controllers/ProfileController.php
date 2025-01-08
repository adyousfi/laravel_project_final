<?php 

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Comment;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('profiles.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = Auth::user();
        
        $user->fill($request->validated());
        $user->save();
    
        
        return redirect()->route('profile.edit')->with('success', 'Profiel bijgewerkt!');
    }
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function index(): View
    {
        $users = User::all(); 
        return view('profiles.index', compact('users'));
    }

    public function show(User $user): View
    {
        return view('profiles.show', compact('user'));
    }

    public function storeComment(Request $request, User $user)
    {
        $request->validate([
            'body' => 'required|string|max:500',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'profile_id' => $user->id,
            'body' => $request->body,
        ]);

        return back()->with('success', 'Comment geplaatst!');
    }

    public function updateProfilePicture(Request $request)
    {
        $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $user = Auth::user();
    
        if ($request->hasFile('profile_picture')) {
           
            if ($user->profile_picture) {
                Storage::delete('public/' . $user->profile_picture);
            }
    
            // Upload de nieuwe profielfoto
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }
    
        $user->save();
    
        return back()->with('success', 'Profielfoto bijgewerkt!');
    }
}
