<?php

namespace App\Http\Controllers\Front;

use App\Models\Press;
use App\Http\Controllers\Controller;

class PressController extends Controller
{
    public function index()
    {
        $press = Press::first();
        return view('front.press.index',compact('press'));
    }
}
