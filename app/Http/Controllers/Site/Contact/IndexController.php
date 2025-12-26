<?php

namespace App\Http\Controllers\Site\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log; // Hata loglamak için gerekli
use Throwable; // Hata yakalamak için gerekli
use App\Mail\ContactFormSubmitted;
use App\Mail\ContactFormSender;

class IndexController extends Controller
{
    public function index()
    {
        $page_title = 'Bize Ulaşın';
        return view('site.contact.index', compact('page_title'));
    }

    public function store(Request $request)
    {
        // 1. Validasyon
        $validator = Validator::make($request->all(), [
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'subject'      => 'required|string|max:255',
            'message'      => 'required|string|max:1000',
            'google_map'   => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // 2. Veriyi Kaydet (Modeli $contact değişkenine atıyoruz)
        $contact = Contact::create([
            'first_name'   => $request->first_name,
            'last_name'    => $request->last_name,
            'email'        => $request->email,
            'phone_number' => $request->phone_number,
            'subject'      => $request->subject,
            'message'      => $request->message,
            'google_map'   => $request->google_map,
        ]);

        // 3. Mail Gönderimi (Try-Catch ile korumaya alındı)
        try {
            // A) Adminlere giden mail
            // BURADA DÜZELTME YAPTIK: $request->only(...) yerine $contact nesnesini gönderiyoruz.
            Mail::to(['iletisim@314agency.com', 'info@314agency.com', 'ardaasevinc@gmail.com'])
                ->send(new ContactFormSubmitted($contact));

            // B) Kullanıcıya giden teşekkür maili
            Mail::to($request->email)
                ->send(new ContactFormSender($contact));

        } catch (Throwable $e) {
            // Mail gitmezse site çökmesin, hatayı arka plana kaydedelim.
            Log::error('İletişim formu mail hatası: ' . $e->getMessage());
        }

        // Mail gitmese bile veritabanına kayıt yapıldığı için kullanıcıya "Başarılı" diyoruz.
        return redirect()->back()->with('success', 'Sayın ' . $contact->first_name . ' ' . $contact->last_name . ', mesajınız başarıyla gönderildi!');
    }
}