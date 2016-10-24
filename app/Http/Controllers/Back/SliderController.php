<?php

namespace App\Http\Controllers\Back;

use App\Models\Slider;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;
use App\Lib\FileHelper;

class SliderController extends MyPageController
{

    public function index(Request $request)
    {
        $sliders = Slider::all();
        if ($request->isMethod('GET')) {
            return view('back.slider.index', compact('sliders'));
        }

        DB::beginTransaction();
        try {
            $arrayFileImages = $request->file('images');
            $arrayFileString = $request->get('images');
            $arrayTypeFiles = $request->get('types');
            if (!is_array($arrayFileImages)) {
                $arrayFileImages = [];
            }
            if (!is_array($arrayFileString)) {
                $arrayFileString = [];
            }
            if (!is_array($arrayTypeFiles)) {
                $arrayTypeFiles = [];
            }

            foreach ($sliders as $slider) {
                if (!in_array($slider->name, $arrayFileString)) {
                    FileHelper::delFile($slider->name);
                }
                $slider->delete();
            }
            $numberFileString = 0;
            $numberFileImage = 0;

            foreach ($arrayTypeFiles as $type) {
                if (intval($type) == TYPE_STRING) {
                    $filePath = $arrayFileString[$numberFileString++];
                } else {
                    $filePath = FileHelper::saveFile($arrayFileImages[$numberFileImage++]);
                }
                $slider = new Slider();
                $slider->name = $filePath;
                $slider->save();
            }
            DB::commit();
            Session::flash('message_success', 'Update success');
            return response()->json(array('status' => STATUS_OK, 'url' => route('back.slider')));
        } catch (Exception $ex) {
            DB::rollback();
            return response()->json(array('status' => STATUS_FAILED));
        }

    }
}
