<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests\NewRequest;
use App\Models\NewType;
use Illuminate\Http\Request;
use App\Models\News;
use App\Lib\FileHelper;
use Illuminate\Support\Facades\Session;

class NewController extends MyPageController
{
    public function index()
    {
        $data = News::orderBy('updated_at', 'desc')->paginate(PAGINATION_NEW);
        $indexBegin = ($data->currentPage() - 1) * PAGINATION_NEW;
        return view('back.new.index', compact('data', 'indexBegin'));
    }

    public function update(Request $request, $id = null)
    {
        $new = new News();
        if ($id) {
            $new = News::find($id);
            if (!$new) {
                Session::flash('message_error', MESSAGE_NOT_FOUND_RECORD);
                return redirect()->route('back.new');
            }
        }
        $newTypes = NewType::all();
        if (!count($newTypes)) {
            Session::flash('message_success', 'You must create least a new type');
            return redirect()->route('back.new');
        }

        if ($request->isMethod('GET')) {
            return view('back.new.update', compact('new', 'newTypes', 'id'));
        }

        $validate = NewRequest::validateData($request->all(), $id);
        if ($validate->fails()) {
            return response()->json(array('status' => STATUS_ERR, 'errors' => $validate->errors()));
        }

        $oldPathImageThumb = $new->image_thumb;
        $new->name = $request->get('name');
        $new->link = str_replace(url('/'),'',$request->get('link'));
        $new->date = $request->get('date');
        $new->new_id = $request->get('new_id');
        if ($request->hasFile('thumb')) {
            $pathSaveImageThumb = FileHelper::saveFile($request->file('thumb'));
            $new->image_thumb = $pathSaveImageThumb;
            FileHelper::delFile($oldPathImageThumb);
        }
        $new->desc = $request->get('desc');
        $new->more_desc = $request->get('more_desc');
        $arrayFileImages = $request->file('images');
        $arrayFileString = $request->get('images');
        $arrayIndexs = $request->get('indexs');
        $arrayTypeFiles = $request->get('type_files');
        if (!is_array($arrayFileString)) {
            $arrayFileString = [];
        }
        if (!is_array($arrayIndexs)) {
            $arrayIndexs = [];
        }
        if (!is_array($arrayTypeFiles)) {
            $arrayTypeFiles = [];
        }
        $lastIndex = count($arrayIndexs) - 1;
        if ($id) {
            $newImagesOld = explode(',', $new->images);
            foreach ($newImagesOld as $newImg) {
                if (!in_array($newImg, $arrayFileString)) {
                    FileHelper::delFile($newImg);
                }
            }
            $numberFileString = 0;
            $numberFileImage = 0;
            $new->images = '';
            foreach ($arrayIndexs as $index) {
                if (intval($arrayTypeFiles[$index]) == TYPE_STRING) {
                    $filePath = $arrayFileString[$numberFileString++];
                } else {
                    $filePath = FileHelper::saveFile($arrayFileImages[$numberFileImage++]);
                }
                if ($index == $lastIndex) {
                    $new->images .= $filePath;
                } else {
                    $new->images .= $filePath . ',';
                }
            }
        } else {
            foreach ($arrayIndexs as $index) {
                $filePath = FileHelper::saveFile($arrayFileImages[$index]);
                if ($index == $lastIndex) {
                    $new->images .= $filePath;
                } else {
                    $new->images .= $filePath . ',';
                }
            }
        }
        $new->save();
        Session::flash('message_success', MESSAGE_CREATE_OK);
        return response()->json(array('status' => STATUS_OK, 'url' => route('back.new')));
    }

    public function destroy($id)
    {
        $new = News::find($id);
        if (!$new) {
            Session::flash('message_error', MESSAGE_NOT_FOUND_RECORD);
            return redirect()->route('back.new_type');
        }

        FileHelper::delFile($new->image_thumb);
        $listImage = $new->images;
        if ($listImage && strlen(trim($listImage))) {
            $listImage = explode(',', $listImage);
            foreach ($listImage as $image) {
                FileHelper::delFile($image);
            }
        }
        $new->delete();
        Session::flash('message_success', MESSAGE_DELETE_OK);
        return redirect()->route('back.new_type');
    }

}
