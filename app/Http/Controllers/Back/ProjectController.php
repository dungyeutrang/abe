<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests\ProjectRequest;
use App\Models\ProjectCategory;
use App\Models\ProjectContentType;
use App\Models\ProjectImage;
use App\Models\ProjectProducer;
use App\Models\ProjectType;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Session;
use App\Lib\FileHelper;
use DB;


class ProjectController extends MyPageController
{

    public function index(Request $request)
    {
        $name = $request->get('name');
        $year = $request->get('year');
        $producer = $request->get('producer');
        $category = $request->get('category');

        $projectCategories = ProjectCategory::getCategoryByProjectType();
        $projectProducers = ProjectProducer::all();
        if (empty($name) && empty($year) && empty($producer) && empty($producer)) {
            if (isset($projectProducers[0])) {
                $query = Project::where('producer_id', $projectProducers[0]->id);
                if (isset($projectCategories[0])) {
                    $query = $query->where('category_id', $projectCategories[0]->project_category_id);
                }
                $data = $query->orderBy('updated_at', 'desc')->paginate(PAGINATION_PROJECT);
            } else {
                if (isset($projectCategories[0])) {
                    $data = Project::where('category_id', $projectCategories[0]->project_category_id)->orderBy('updated_at', 'desc')->paginate(PAGINATION_PROJECT);
                } else {
                    $data = Project::orderBy('updated_at', 'desc')->paginate(PAGINATION_PROJECT);
                }
            }

        } else {
            if (!empty($name)) {
                $query = Project::where('name', 'like', '%' . $name . '%');
                if (!empty($year)) {
                    $query = $query->where('year', 'like', '%' . $year . '%');
                }
            } else {
                $query = Project::where('year', 'like', '%' . $year . '%');
            }
            if (!empty($producer)) {
                $query = $query->where('producer_id', 'like', '%' . $producer . '%');
            }
            if (!empty($category)) {
                $query = $query->where('category_id', 'like', '%' . $category . '%');
            }
            $data = $query->orderBy('updated_at', 'desc')->paginate(PAGINATION_PROJECT);
        }
        $indexBegin = ($data->currentPage() - 1) * PAGINATION_PROJECT;
        return view('back.project.index', compact('data', 'indexBegin', 'projectCategories', 'projectProducers', 'name', 'year', 'producer', 'category'));
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
        $projectContentTypes = $project->projectContentType()->select('project_type_id')->get();
        if (!$projectCategories->count()) {
            Session::flash('message_error', 'You must create least a project category and project type');
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

        $validate = ProjectRequest::validateData($request->all(), $id);
        if ($validate->fails()) {
            return response()->json(array('status' => STATUS_ERR, 'errors' => $validate->errors()));
        }

        DB::beginTransaction();
        try {
            $oldPathImageThumb = $project->image_thumb;
            $project->name = $request->get('name');
            $project->year = $request->get('year');
            $project->link = str_replace(url('/'), '', $request->get('link'));
            $project->category_id = $request->get('project_category_id');
            $project->producer_id = $request->get('project_producer_id');
            if ($request->hasFile('thumb')) {
                $pathSaveImageThumb = FileHelper::saveFile($request->file('thumb'));
                $project->image_thumb = $pathSaveImageThumb;
                FileHelper::delFile($oldPathImageThumb);
            }
            $project->desc = $request->get('desc');
            $project->save();
            $types = $request->get('type');
            if ($id) {
                ProjectContentType::where('project_id', $project->id)->delete();
            }
            foreach ($types as $type) {
                ProjectContentType::create([
                    'project_id' => $project->id,
                    'project_type_id' => $type
                ]);
            }
            $arrayFileImages = $request->file('images');
            $arrayFileString = $request->get('images');
            $arrayIndexs = $request->get('indexs');
            $arrayTypeFiles = $request->get('type_files');
            $arrayCaptions = $request->get('captions');
            if (!is_array($arrayFileString)) {
                $arrayFileString = [];
            }
            if (!is_array($arrayFileImages)) {
                $arrayFileImages = [];
            }
            if (!is_array($arrayIndexs)) {
                $arrayIndexs = [];
            }
            if (!is_array($arrayTypeFiles)) {
                $arrayTypeFiles = [];
            }
            if (!is_array($arrayCaptions)) {
                $arrayCaptions = [];
            }

            if ($id) {
                $projectImagesOld = ProjectImage::where('project_id', $project->id)->get();
                foreach ($projectImagesOld as $projectImg) {
                    if (!in_array($projectImg->image, $arrayFileString)) {
                        FileHelper::delFile($projectImg->image);
                    }
                    $projectImg->destroy($projectImg->id);
                }
                $numberFileString = 0;
                $numberFileImage = 0;
                foreach ($arrayIndexs as $index) {
                    if (intval($arrayTypeFiles[$index]) == TYPE_STRING) {
                        $filePath = $arrayFileString[$numberFileString++];
                    } else {
                        $filePath = FileHelper::saveFile($arrayFileImages[$numberFileImage++]);
                    }
                    ProjectImage::create([
                        'caption' => $arrayCaptions[$index],
                        'image' => $filePath,
                        'project_id' => $project->id
                    ]);
                }
            } else {
                foreach ($arrayIndexs as $index) {
                    $filePath = FileHelper::saveFile($arrayFileImages[$index]);
                    ProjectImage::create([
                        'caption' => $arrayCaptions[$index],
                        'image' => $filePath,
                        'project_id' => $project->id
                    ]);
                }
            }
            DB::commit();
            Session::flash('message_success', MESSAGE_CREATE_OK);
            return response()->json(array('status' => STATUS_OK, 'url' => route('back.project')));
        } catch (Exception $ex) {
            DB::rollback();
            Session::flash('message_error', MESSAGE_CREATE_ERROR);
            return response()->json(array('status' => STATUS_FAILED));
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

    function destroy($id)
    {
        $project = Project::find($id);
        DB::beginTransaction();
        try {
            $message = MESSAGE_NOT_FOUND_RECORD;
            if (!$project) {
                return response()->view('errors.500', compact('message'));
            }
            FileHelper::delFile($project->image_thumb);
            ProjectContentType::where('project_id', $project->id)->delete();
            $projectImages = ProjectImage::where('project_id', $project->id)->get();
            foreach ($projectImages as $projectImage) {
                FileHelper::delFile($projectImage->image);
                $projectImage->destroy($projectImage->id);
            }
            $project->delete();
            Session::flash('message_success', MESSAGE_DELETE_OK);
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
            Session::flash('message_error', MESSAGE_DELETE_ERROR);
        }
        return redirect()->route('back.project');
    }
}