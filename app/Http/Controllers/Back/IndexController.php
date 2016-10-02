<?php

namespace App\Http\Controllers\Back;

class IndexController extends MyPageController
{
    public function index()
    {
        return view('back.home');
    }
}