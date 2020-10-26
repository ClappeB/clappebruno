<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    private $mail_information = null;

    /**
     * Create a new message instance.
     *
     * @param $mail
     * @return void
     */
    public function __construct($mail)
    {
        $this->mail_information = $mail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.mailers.smtp.username'))
            ->subject($this->mail_information['object'].' de '.$this->mail_information['email'])
            ->view('emails.contact_mail')
            ->with(['mail' => $this->mail_information]);
    }
}
