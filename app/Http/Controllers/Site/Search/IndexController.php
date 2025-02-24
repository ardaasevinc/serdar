<?php

namespace App\Http\Controllers\Site\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Service;
use App\Models\Portfolio;


class IndexController extends Controller
{
    public function index(Request $request)
    {
        $page_title= 'Arama Sonuçları';
        $query = $request->input('query');

        

        if (!$query) {
            return redirect()->back()->with('error', 'Lütfen bir arama terimi girin.');
        };

        // Bloglarda Arama
        $blogs = News::where('title', 'LIKE', "%{$query}%")
        ->orWhere('content', 'LIKE', "%{$query}%")
        ->where('is_published', 1)
        ->paginate(5);

        // Hizmetlerde Arama
        $services = Service::where('title', 'LIKE', "%{$query}%")
        ->orWhere('content', 'LIKE', "%{$query}%")
        ->where('is_published', 1)
        ->paginate(5);

        // Projelerde Arama
        $portfolios = Portfolio::where('title', 'LIKE', "%{$query}%")
        ->orWhere('description', 'LIKE', "%{$query}%")
        ->where('is_published', 1)
        ->paginate(4);

        return view('site.search.results', compact('query', 'blogs', 'services', 'portfolios','page-title'));
    }
}
