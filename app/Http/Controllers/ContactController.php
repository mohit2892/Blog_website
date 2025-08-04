<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function create()
{
    return view('contact.create');
}


    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'message' => 'required|string',
    ]);

    Contact::create($validated); //  This stores the data

    return redirect()->back()->with('success', 'Your message has been sent!');
}
}
