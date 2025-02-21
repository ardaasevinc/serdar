<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class RobotsController extends Controller
{
    public function index()
    {
        $content = "User-agent: *\n";
        $content .= "Disallow: /admin\n";
        $content .= "Disallow: /private\n"; // Gerekirse başka sayfaları da engelleyebilirsin
        $content .= "Sitemap: " . url('sitemap.xml') . "\n";

        return response($content)->header('Content-Type', 'text/plain');
    }
}
