<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request, User $user)
    {
        $request->validate([
            'body' => 'required|string|max:500',
        ]);

        Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $user->id,
            'body' => $request->body,
        ]);

        return back()->with('success', 'Bericht verzonden!');
    }

    public function inbox()
    {
        $messages = auth()->user()->receivedMessages()->with('sender')->latest()->get();
        return view('messages.inbox', compact('messages'));
    }
}
