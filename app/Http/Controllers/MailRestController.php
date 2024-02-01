<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormEmail;
use App\Models\Email;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;


class MailRestController extends Controller
{
    public function sendEmail(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        else{
            $email = new Email;
            $email->email = $request->input('email');
            $email->subject = $request->input('subject');
            $email->text = $request->input('text');
            $email->save();

            $emailContent = [
                'subject' => $request->input('subject'),
                'text' => $request->input('text')
            ];

            Mail::to($request->input('email'))->send(new ContactFormEmail($request->input('subject'), $emailContent));

            return response()->json(['message' => 'Email sent and saved successfully'],Response::HTTP_OK);
        }

    }
}
