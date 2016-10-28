<?php

namespace App\Http\Controllers\Front;

use App\Models\Profile;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        if (!$profile) {
            $profile = new Profile();
        }
        return view('front.profile.index',compact('profile'));
    }
}
