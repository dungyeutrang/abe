<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class ProjectController extends Controller
{

    public function index()
    {
        return view('front.project.index');
    }

}
