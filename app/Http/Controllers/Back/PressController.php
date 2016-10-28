<?php

namespace App\Http\Controllers\Back;

use App\Models\Press;
use Illuminate\Http\Request;

class PressController extends MyPageController
{
    public function index(Request $request)
    {
        $data = Press::first();
        if (!$data) {
            $data = new Press();
        }
        if ($request->isMethod('GET')) {
            return view('back.press.index', compact('data'));
        }
        $data->press_vi = $request->get('press_vi');
        $data->press_en = $request->get('press_en');
        $data->save();

    }
}
