<?php

namespace App\Http\Controllers\Site\Kvkk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $page_title = 'Kvkk Politikası';
        return view('site.kvkk.index',compact('page_title'));
    }
}
