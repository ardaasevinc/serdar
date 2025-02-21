<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

class SitemapController extends Controller
{
    public function index()
    {
        $urls = [
            route('site.index'),
            route('site.about'),
            route('site.projects'),
            route('site.services'),
            route('site.blog'),
            route('site.contact'),
            route('site.search')
        ];

        $xml = view('sitemap', compact('urls'))->render();

        return response($xml)->header('Content-Type', 'application/xml');
    }
}
