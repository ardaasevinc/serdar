<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\About;
use App\Models\Partner;
use App\Models\Portfolio;
use App\Models\Data;
use App\Models\Service;
use App\Models\News;
use App\Models\Slidetext;

class IndexController extends Controller
{
    public function index()
    {
        $page_title = 'Anasayfa';

        // Verileri doğrudan veritabanından çek
        $sliders = Slider::all();
        $about = About::first();
        $partners = Partner::where('is_active', 1)->get();
        $portfolio = Portfolio::where('is_published', 1)->paginate(4);
        $data = Data::where('is_published', 1)->get();
        $services = Service::where('is_published', 1)->paginate(4);
        $blog = News::where('is_published', 1)->paginate(3);
        $slidetext = Slidetext::where('is_published', 1)->get();

        return view('site.index', compact('sliders', 'about', 'partners', 'portfolio', 'data', 'services', 'blog', 'slidetext', 'page_title'));
    }
}
