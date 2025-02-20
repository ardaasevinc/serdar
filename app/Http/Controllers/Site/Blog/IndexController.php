<?php

namespace App\Http\Controllers\Site\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class IndexController extends Controller
{
    public function index($id)
    {
        $page_title = 'Bloglar';
        $blog = News::findOrFail($id);

        // Önceki ve sonraki blogları al
        $previousBlog = News::where('id', '<', $blog->id)->orderBy('id', 'desc')->first();
        $nextBlog = News::where('id', '>', $blog->id)->orderBy('id', 'asc')->first();

        return view('site.blog.detail', compact('blog', 'previousBlog', 'nextBlog', 'page_title'));
       
    }
}
