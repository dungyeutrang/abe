<?php

namespace App\Http\Controllers\Back;

use App\Models\ProjectCategory;
use App\Models\ProjectProducer;
use App\Models\ProjectType;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Session;


class ProjectController extends MyPageController
{

    public function index()
    {
        $data = Project::orderBy('updated_at', 'desc')->paginate(PAGINATION_PROJECT);
        $indexBegin = ($data->currentPage() - 1) * PAGINATION_PROJECT;
        return view('back.project.index', compact('data', 'indexBegin'));
    }

    public function update(Request $request, $id = null)
    {
        $project = new Project();
        if ($id) {
            $project = Project::find($id);
            if (!$project) {
                Session::flash('message_error', MESSAGE_NOT_FOUND_RECORD);
                return redirect()->route('back.project');
            }
        }
        $projectTypes = ProjectType::all();
        $projectCategories = ProjectCategory::getCategoryByProjectType();
        $projectProducers = ProjectProducer::all();
        $projectContentTypes = $project->projectContentType()->select('project_type_id')->get()->toArray();
        if (!$projectCategories->count()) {
            Session::flash('message_error', 'You must create least a project category');
            return redirect()->route('back.project');
        }

        if (!$projectTypes->count()) {
            Session::flash('message_error', 'You must create least a project type');
            return redirect()->route('back.project');
        }

        if (!$projectProducers->count()) {
            Session::flash('message_error', 'You must create least a project producer');
            return redirect()->route('back.project');
        }

        $firstProjectCategory = $projectCategories->first();
        if ($request->isMethod('GET')) {
            return view('back.project.update', compact('project', 'id', 'projectCategories', 'projectTypes', 'projectProducers', 'projectContentTypes', 'firstProjectCategory'));
        }

    }

    /**
     * change project type
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    function changeProjectType(Request $request)
    {
        $id = $request->get('id');
        $data = ProjectType::select(['id', 'name'])->where('project_category_id', $id)->get()->toArray();
        return response()->json($data);
    }
}
