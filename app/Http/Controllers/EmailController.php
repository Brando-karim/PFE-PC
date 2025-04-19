<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
         public function sendEmail(Request $request) 
        { 
            
            $request->validate([ 
                'email' => 'required|email', 
                'subject' => 'required|string|max:255', 
                'message' => 'required|string', 
            ]); 
     
             
            Mail::raw($request->message, function ($message) 
            use ($request) { 
                $message->to($request->email) ->subject($request->subject)->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME')); 
            }); 
     
            
            return back()->with('success', 'Email envoyé avec succès !'); 
        } 
    
}
