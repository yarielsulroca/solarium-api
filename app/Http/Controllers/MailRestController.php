<?php

namespace App\Http\Controllers;

use App\Mail\SendPost;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;


class MailRestController extends Controller
{
    public function sendEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'body' => 'required',
        ]);
        if($validator->fails())
        {
            return response()->json(['mensage' => 'this form is not valid resuqest'],
            Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        else {

        $details= [
            'email' => $request['email'],
            'body' => $request['body'],
        ];
            Mail::to($details['email'])->send(new SendPost($details) );
           // to save at DB table mail
            $mail= new SendPost([
                'email' => $details['email'],
                'body' => $details['body'],
            ]);
            $mail->save();
            return response()->json(['message' => 'Email send and saved to database'],
            Response::HTTP_OK);
        }
    }
}
