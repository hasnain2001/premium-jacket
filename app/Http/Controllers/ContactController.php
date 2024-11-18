<?php

namespace App\Http\Controllers;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }


    
    public function submitForm(Request $request)
    {
        // Custom validation messages
        $messages = [
            'firstName.required' => 'We need to know your first name!',
            'lastName.required' => 'We need to know your last name!',
            'email.required' => 'Don\'t forget your email address!',
            'email.email' => 'Please provide a valid email address.',
            'message.required' => 'A message is required to submit the form.',
        ];
    
        // Validate form inputs
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
        ], $messages);
    
        // Send the email using the Mailable class
        Mail::to('hasnainalikhan2001@gmail.com')->send(new ContactMail(
            $request->firstName . ' ' . $request->lastName, // Full name
            $request->email,
            $request->message
        ));
    
        return back()->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }
    
    
}
