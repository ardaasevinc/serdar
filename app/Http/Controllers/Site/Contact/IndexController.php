<?php

namespace App\Http\Controllers\Site\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
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
        // Form doğrulama
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
            'google_map' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Veriyi kaydet
        Contact::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'subject' => $request->subject,
            'message' => $request->message,
            'google_map' => $request->google_map,
        ]);

        // Admin'e mail gönder
        Mail::to(['iletisim@314agency.com', 'info@314agency.com', 'ardaasevinc@gmail.com'])
            ->send(new ContactFormSubmitted($request->only([
                'first_name',
                'last_name',
                'email',
                'phone_number',
                'subject',
                'message',
            ])));

        Mail::to($request->email)
            ->send(new ContactFormSender($request->only([
                'first_name',
                'last_name',
                'subject',
                'message',
            ])));


        return redirect()->back()->with('success', 'Sayın ' . $request->first_name . ' ' . $request->last_name . ', mesajınız başarıyla gönderildi!');
    }

}