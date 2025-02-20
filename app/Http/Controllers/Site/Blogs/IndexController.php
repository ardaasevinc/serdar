<?php

namespace App\Http\Controllers\Site\Blogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class IndexController extends Controller
{
    public function index()
    {
        $page_title = 'Bloglar';
        $blog = News::where('is_published', 1)->paginate(2);

        return view('site.blogs.index', compact('blog', 'page_title'));
    }
}
