<?php

namespace App\Http\Controllers\Site\Projects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;

class IndexController extends Controller
{
    public function index()
    {
        $page_title = 'Projeler';
        $portfolio = Portfolio::where('is_published', 1)->paginate(4);
        return view('site.projects.index', compact('portfolio', 'page_title'));
    }
}
