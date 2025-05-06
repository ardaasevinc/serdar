<?php

namespace App\Http\Controllers\Site\Faq;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
class IndexController extends Controller
{
    public function index()
    {
        $page_title ='Sıkça Sorulan Sorular';
        $faq =Faq::where('is_published',1)->get();
        return view('site.faq.index',compact('page_title','faq'));
    }
}
