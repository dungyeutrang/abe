<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Slider;

class IndexController extends Controller
{

    public function index()
    {
        $data = Slider::all();
        return view('front.index.index',compact('data'));
    }

}
