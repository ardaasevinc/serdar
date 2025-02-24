<?php

namespace App\Http\Controllers\Site\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class IndexController extends Controller
{
    public function detail($slug)
    {
        // Sayfayı veritabanından al
        $page = Page::with('contents')->where('slug', $slug)->where('is_published', 1)->firstOrFail();

        // Sayfa başlığını al
        $page_title = $page->title;

        // Verileri Blade sayfasına gönder
        return view('site.page.detail', compact('page', 'page_title'));
    }
}
