<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $contact = new Contact;
        $contact->name = e($request->input('name'));
        $contact->email = e($request->input('email'));
        $contact->sujet = e($request->input('sujet'));
        $contact->message = e($request->input('message'));

        if($contact->save()){
            return redirect()->route('contact')->with('success', 'Message envoyé');
        }
    } 
}
