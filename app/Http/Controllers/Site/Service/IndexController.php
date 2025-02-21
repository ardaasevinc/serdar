<?php

namespace App\Http\Controllers\Site\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class IndexController extends Controller
{
    public function index($id)
    {
        // Belirtilen ID'ye sahip servisi al
        $page_title = 'Hizmetlerimiz';
        $service = Service::where('is_published', 1)->paginate(8);
        $services = Service::findOrFail($id); // Eğer servis bulunmazsa hata döndürür

        // Önceki ve sonraki servisleri al
        $previousService = Service::where('id', '<', $id)->orderBy('id', 'desc')->first();
        $nextService = Service::where('id', '>', $id)->orderBy('id', 'asc')->first();

        return view('site.service.detail', compact('service','services', 'previousService', 'nextService', 'page_title'));
    }

}
