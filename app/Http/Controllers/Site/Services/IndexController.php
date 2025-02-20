<?php

namespace App\Http\Controllers\Site\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
class IndexController extends Controller
{
    public function index()
    {
        $page_title = 'Hizmetlerimiz';
        $services = Service::where('is_published', 1)->paginate(4);
        return view('site.services.index', compact('services', 'page_title'));
    }
}
