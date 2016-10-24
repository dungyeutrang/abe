<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Back\ProjectController;
use App\Http\Requests\ProjectTypeRequest;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectContentType;
use Illuminate\Http\Request;
use App\Models\ProjectType;
use Illuminate\Support\Facades\Session;
use DB;

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
            Session::flash('message_error', 'You must create least a project category');
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

        $validate = ProjectTypeRequest::validateData($request->all(),$id);
        if ($validate->fails()) {
            return redirect($request->path())
                ->withErrors($validate)
                ->withInput();
        }
        $projectType->name = $request->get('name');
        $projectType->link = $request->get('link');
        $projectType->project_category_id = $request->get('project_category_id');
        $projectType->save();
        if ($id) {
            Session::flash('message_success', MESSAGE_UPDATE_OK);
        } else {
            Session::flash('message_success', MESSAGE_CREATE_OK);
        }
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
        DB::beginTransaction();
        try {
            if (!$projectType) {
                return response()->view('errors.500', compact('message'));
            }
            $projects = Project::getProjectHaveTypeId($id);
            $projectController = new ProjectController();
            foreach ($projects as $project) {
                if (count($project->projectContentType) === 1) {
                    $projectController->destroy($project->id);
                }
            }
            ProjectContentType::where('project_type_id', $id)->delete();
            $projectType->delete();
            Session::flash('message_success', MESSAGE_DELETE_OK);
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
            Session::flash('message_error', MESSAGE_DELETE_ERROR);
        }
        return redirect()->route('back.project_type');
    }
}
