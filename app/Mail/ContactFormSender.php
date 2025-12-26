<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Contact; // Modeli buraya eklemeyi unutmayın!

class ContactFormSender extends Mailable
{
    use Queueable, SerializesModels;

    // View dosyanız (blade) $form değişkenini aradığı için adı $form kalmalı.
    public $form;

    // BURASI DÜZELTİLDİ: Artık Array değil, Contact Modeli bekliyor.
    public function __construct(Contact $contact)
    {
        // Gelen modeli sınıfın içindeki $form değişkenine yüklüyoruz.
        $this->form = $contact;
    }

    public function build()
    {
        return $this->subject('Mesajınız Alındı - 314 Agency')
            ->view('site.mail.thank_you'); // Dosya adınız thankyou ise aradaki _ tireyi silin.
    }
}