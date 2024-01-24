<?php

namespace App\Http\Controllers;

use App\Mail\SendPost;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;


class MailRestController extends Controller
{
    public function sendEmail(Request $request) {
        $data = [
        'email' => $request->input('email'),
        'subject' => $request->input('subject'),
        'message' => $request->input('message')
        ];

        Mail::send('mail.contactanos', $data, function($message) use ($data) {
        $message->to($data['email'])->subject($data['subject']);
        });

        return response()->json(['message' => 'Email sent']);
    }
}
