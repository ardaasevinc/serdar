<?php

namespace App\Http\Controllers\Site\About;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $page_title = 'Hakkımızda';
        $about = About::first();
        return view('site.about.index', compact('about'), compact('page_title'));
        
    }
}
