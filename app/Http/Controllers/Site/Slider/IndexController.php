<?php

namespace App\Http\Controllers\Site\Slider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class IndexController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('components.slider', compact('sliders'));
    }
}
