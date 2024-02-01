<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $emailContent;

    public function __construct($subject, $emailContent)
    {
        $this->subject = $subject;
        $this->emailContent = $emailContent;
    }

    public function build()
    {
        return $this->subject($this->subject)
                    ->view('emails.contact_form_email')
                    ->with(['emailContent' => $this->emailContent]);
    }
}