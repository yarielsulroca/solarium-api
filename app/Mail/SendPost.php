<?php

namespace App\Mail;

use App\Models\Email;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendPost extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    public function build()
    {
        $email = new Email([
            'subject' => 'Front Miamusum',
            'content' => view('mail.contactanos',
            ['details' => $this->details])->render(),
        ]);

        $email->save();

        return $this->view('mail.contactanos', ['details' => $this->details]);
    }
}
