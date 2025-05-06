<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $form;

    public function __construct(array $form)
    {
        $this->form = $form;
    }

    public function build()
    {
        return $this->subject('Yeni İletişim Mesajı - 314 Agency')
                    ->view('site.mail.index');
    }
}
