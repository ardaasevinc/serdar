<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Contact;

class ContactFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $form;

    public function __construct(Contact $contact)
    {
        $this->form = $contact;
    }

    public function build()
    {
        return $this->subject('Yeni İletişim Formu Mesajı')
            ->view('site.mail.index');
    }
}