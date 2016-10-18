<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests\ProjectTypeRequest;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use App\Models\ProjectType;
use Illuminate\Support\Facades\Session;

class ProjectTypeController extends MyPageController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ProjectType::paginate(PAGINATION_PROJECT_TYPE);
        $indexBegin = ($data->currentPage() - 1) * PAGINATION_PROJECT_TYPE;
        return view('back.project_type.index', compact('data', 'indexBegin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function update(Request $request, $id = null)
    {
        $projectType = new ProjectType();
        $projectCategory = ProjectCategory::all();
        if (!count($projectCategory)) {
            Session::flash('message_eror', 'You must create least a project category');
            return redirect()->route('back.project_type');
        }
        if ($id) {
            $projectType = ProjectType::find($id);
            $message = MESSAGE_NOT_FOUND_RECORD;
        }
        if ($request->isMethod('GET')) {
            if (!$projectType) {
                return response()->view('errors.500', compact('message'));
            }
            return view('back.project_type.update', compact('projectType', 'id', 'projectCategory'));
        }

        $validate = ProjectTypeRequest::validateData($request->all());
        if ($validate->fails()) {
            return redirect($request->path())
                ->withErrors($validate)
                ->withInput();
        }
        $projectType->name = $request->get('name');
        $projectType->project_category_id = $request->get('project_category_id');
        $projectType->save();
        Session::flash('message_success', MESSAGE_CREATE_OK);
        return redirect()->route('back.project_type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projectType = ProjectType::find($id);
        $message = MESSAGE_NOT_FOUND_RECORD;
        if (!$projectType) {
            return response()->view('errors.500', compact('message'));
        }
        $projectType->destroy($id);
        Session::flash('message_success', MESSAGE_DELETE_OK);
        return redirect()->route('back.project_type');
    }
}
