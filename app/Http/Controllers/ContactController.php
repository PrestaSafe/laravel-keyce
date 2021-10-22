<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            'name' => 'string|required|min:3',
            'email' => 'email|required',
            'sujet' => 'string|required|min:3',
            'message' => 'string|required|min:5',
        ];
        if($request->ajax())
        {
            $validator = Validator::make($request->input(),$rules);
           
            if(!$validator->fails()){
                $this->sendMessage($request);
                return response()->json(
                    [
                        'success'=> true,
                        'message' => 'Message envoyé',
                    ]
                );
            }
            return response()->json(
                [
                    'success'=> false,
                    'message' => 'Merci de remplir les champs comme il faut',
                    'validator' =>  $validator->errors(),
                ]
            );
        }
        $request->validate($rules);

      

        if($this->sendMessage($request)){
            return redirect()->route('contact')->with('success', 'Message envoyé');
        }
    } 

    public function sendMessage($request)
    {
        $contact = new Contact;
        $contact->name = e($request->input('name'));
        $contact->email = e($request->input('email'));
        $contact->sujet = e($request->input('sujet'));
        $contact->message = e($request->input('message'));
        if($contact->save())
        {
            // envoi email
            Mail::raw('Vous avez reçu une nouvelle demande de contact', function ($message) use($contact) {
                $message->from('no-reply@johndoe.com', 'No-reply');
                $message->sender('john@johndoe.com', 'John Doe');
                $message->to('admin@email.com', 'Site Laravel');
                $message->replyTo($contact->email, $contact->name);
                $message->subject($contact->sujet);
                $message->priority(3);
            });
            return true;
        }
    }
}
