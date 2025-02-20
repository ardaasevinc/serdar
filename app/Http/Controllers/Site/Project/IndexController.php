<?php

namespace App\Http\Controllers\Site\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;

class IndexController extends Controller
{
    
    public function index($id)
    {
        $page_title = 'Projeler';
        $portfolio= Portfolio::findOrFail($id);
        $portfolios = Portfolio::where('is_published', 1)->get();

        // Önceki ve sonraki blogları al
        $previousPortfolio = Portfolio::where('id', '<', $portfolio->id)->orderBy('id', 'desc')->first();
        $nextPortfolio = Portfolio::where('id', '>', $portfolio->id)->orderBy('id', 'asc')->first();

        return view('site.project.detail', compact('portfolio', 'previousPortfolio', 'nextPortfolio','portfolios', 'page_title'));
    }
}
