<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactMessage;
use App\Mail\ContactMessageMail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:15',
            'message' => 'required|string',
        ]);

        
        ContactMessage::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'message' => $validated['message'],
        ]);

        
        Mail::to('admin@ehb.be')->send(new ContactMessageMail($validated));

       
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}

