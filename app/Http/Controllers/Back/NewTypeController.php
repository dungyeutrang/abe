<?php

namespace App\Http\Controllers\Back;


use App\Models\NewType;
use Illuminate\Http\Request;
use App\Http\Requests\NewTypeRequest;
use Illuminate\Support\Facades\Session;
use DB;
use League\Flysystem\Exception;
use App\Models\News;

class NewTypeController extends MyPageController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = NewType::orderBy('updated_at', 'desc')->paginate(PAGINATION_NEW_TYPE);
        $indexBegin = ($data->currentPage() - 1) * PAGINATION_NEW_TYPE;
        return view('back.new_type.index', compact('data', 'indexBegin'));
    }

    public function update(Request $request, $id = null)
    {
        $newType = new NewType();
        if ($id) {
            $newType = NewType::find($id);
            $message = MESSAGE_NOT_FOUND_RECORD;
            if (!$newType) {
                return response()->view('errors.500', compact('message'));
            }
        }
        if ($request->isMethod('GET')) {
            return view('back.new_type.update', compact('newType', 'id'));
        }
        $validate = NewTypeRequest::validateData($request->all(), $id);
        if ($validate->fails()) {
            return redirect($request->path())
                ->withErrors($validate)
                ->withInput();
        }
        DB::beginTransaction();
        try {
            $newType->name = $request->get('name');
            $oldLink = $newType->link;
            $newType->link = str_replace(url('/'),'',$request->get('link'));
            $newType->save();
            $news = News::where('new_id', $newType->id)->get();
            foreach ($news as $new) {
                $new->link = str_replace($oldLink, $newType->link, $new->link);
                $new->save();
            }
            DB::commit();
            if ($id) {
                Session::flash('message_success', MESSAGE_UPDATE_OK);
            } else {
                Session::flash('message_success', MESSAGE_CREATE_OK);
            }
        } catch (Exception $ex) {
            DB::rollback();
            if ($id) {
                Session::flash('message_error', MESSAGE_UPDATE_ERROR);
            } else {
                Session::flash('message_error', MESSAGE_CREATE_ERROR);
            }
        }
        return redirect()->route('back.new_type');
    }

    public function destroy($id)
    {
        $newType = NewType::find($id);
        DB::beginTransaction();
        try {
            if (!$newType) {
                Session::flash('message_error', MESSAGE_NOT_FOUND_RECORD);
                return redirect()->route('back.new_type');
            }
            $news = News::where('new_id', $id)->get();
            $newController = new NewController();
            foreach ($news as $new) {
                $newController->destroy($new->id);
            }
            $newType->delete();
            Session::flash('message_success', MESSAGE_DELETE_OK);
            DB::commit();
        } catch (Exception $ex) {
            Session::flash('message_error', MESSAGE_DELETE_ERROR);
            DB::rollback();
        }

        return redirect()->route('back.new_type');

    }
}
