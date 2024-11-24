<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\UserMailFormDetail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactFormController extends Controller
{
    public function adminPanel(){
        return view('admin-panel');
    }
    public function submit(Request $request){
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:25',
            'email' => 'required|email',
            'subject' => 'required|max:100',
            'message' => 'required|max:5000'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        $name = $request->name;
        $email = $request->email;
        $user_subject = $request->subject;
        $message = $request->message;
        $to = "kavyit1674@gmail.com";
        $subject = "Contact Form Submission";
        $messageContent = "Name: $name\nEmail: $email\nSubject: $user_subject\nMessage: $message";
        
        // dd($messageContent);
        Mail::to($to)->send(new UserMailFormDetail($messageContent, $subject));    
        
        return response()->json([
            'status' => 'success',
            'message' => 'Form submitted successfully!'
        ]);
        return view('success', compact('messageContent'));
    }
    public function index(){
        return view('contact-form');
    }
}
