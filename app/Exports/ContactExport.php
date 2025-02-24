<?php

namespace App\Exports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ContactExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    public function collection()
    {
        return Contact::select('first_name', 'last_name', 'email', 'phone_number', 'subject', 'message', 'created_at')->get();
    }

    public function headings(): array
    {
        return [
            'Ad',
            'Soyad',
            'E-Posta',
            'Telefon',
            'Konu',
            'Mesaj',
            'Oluşturulma Tarihi'
        ];
    }
}
