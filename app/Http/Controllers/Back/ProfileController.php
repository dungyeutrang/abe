<?php

namespace App\Http\Controllers\Back;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Lib\FileHelper;
use App\Http\Requests\ProfileRequest;

class ProfileController extends MyPageController
{
    public function index(Request $request)
    {
        $profile = Profile::first();
        if (!$profile) {
            $profile = new Profile();
        }
        if ($request->isMethod('GET')) {
            return view('back.profile.index', compact('profile'));
        }

        $validator = ProfileRequest::validateData($request->all());
        if ($validator->fails()) {
            return response()->json(array('status' => STATUS_ERR, 'errors' => $validator->errors()));
        }

        $oldPathImageThumb = $profile->avatar;
        $profile->company_vi = $request->get('company_vi');
        $profile->staff_vi = $request->get('staff_vi');
        $profile->profile_vi = $request->get('profile_vi');
        $profile->summary_vi = $request->get('summary_vi');
        $profile->shop_showroom_vi = $request->get('shop_showroom_vi');

        $profile->company_en = $request->get('company_en');
        $profile->staff_en = $request->get('staff_en');
        $profile->profile_en = $request->get('profile_en');
        $profile->summary_en = $request->get('summary_en');
        $profile->shop_showroom_en = $request->get('shop_showroom_en');

        if ($request->hasFile('avatar')) {
            $pathSaveImageThumb = FileHelper::saveFile($request->file('avatar'));
            $profile->avatar = $pathSaveImageThumb;
            FileHelper::delFile($oldPathImageThumb);
        }
        $profile->save();
        return response()->json(array('status' => STATUS_OK,'url'=>route('back.profile')));
    }
}
