<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;

class MypageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}
