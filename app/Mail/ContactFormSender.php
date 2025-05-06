<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormSender extends Mailable
{
    use Queueable, SerializesModels;

    public $form;

    public function __construct(array $form)
    {
        $this->form = $form;
    }

    public function build()
    {
        return $this->subject('Mesajınız Alındı - 314 Agency')
                    ->view('site.mail.thankyou');
    }
}
