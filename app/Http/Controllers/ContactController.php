<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('posts.contact');
    }

    public function send(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        $contact = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message')
        ];
        Mail::to('cristianoronald1111@yahoo.com')->send(new ContactMail($contact));

        


        return back()->with('success', 'Message envoyé avec succès!');
    }
}
