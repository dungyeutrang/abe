<?php

namespace App\Http\Controllers\Back;

use App\Models\ProjectType;
use Illuminate\Http\Request;
use App\Models\ProjectCategory;
use App\Http\Requests\ProjectCategoryRequest;
use Illuminate\Support\Facades\Session;
use DB;
use App\Models\Project;


class ProjectCategoryController extends MyPageController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ProjectCategory::orderBy('updated_at', 'desc')->paginate(PAGINATION_PROJECT_CATEGORY);
        $indexBegin = ($data->currentPage() - 1) * PAGINATION_PROJECT_CATEGORY;
        return view('back.project_category.index', compact('data', 'indexBegin'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = null)
    {
        $projectCategory = new ProjectCategory();
        if ($id) {
            $projectCategory = ProjectCategory::find($id);
            $message = MESSAGE_NOT_FOUND_RECORD;
            if (!$projectCategory) {
                return response()->view('errors.500', compact('message'));
            }
        }
        if ($request->isMethod('GET')) {
            return view('back.project_category.update', compact('projectCategory', 'id'));
        }
        $validate = ProjectCategoryRequest::validateData($request->all(), $id);
        if ($validate->fails()) {
            return redirect($request->path())
                ->withErrors($validate)
                ->withInput();
        }
        DB::beginTransaction();
        try {
            $projectCategory->name = $request->get('name');
            $oldLink = $projectCategory->link;
            $projectCategory->link = str_replace(url('/'),'',$request->get('link'));
            $projectCategory->save();
            $projectTypes = ProjectType::where('project_category_id', $projectCategory->id)->get();
            foreach ($projectTypes as $projectType) {
                $projectType->link = str_replace($oldLink, $projectCategory->link, $projectType->link);
                $projectType->save();
            }

            $projects = Project::where('category_id',$projectCategory->id)->get();
            foreach ($projects as $project) {
                $project->link = str_replace($oldLink, $projectCategory->link, $project->link);
                $project->save();
            }
            if ($id) {
                Session::flash('message_success', MESSAGE_UPDATE_OK);
            } else {
                Session::flash('message_success', MESSAGE_CREATE_OK);
            }
            DB::commit();
        } catch (Exception $ex) {
            if ($id) {
                Session::flash('message_error', MESSAGE_UPDATE_ERROR);
            } else {
                Session::flash('message_error', MESSAGE_CREATE_ERROR);
            }
            DB::rollback();
        }
        return redirect()->route('back.project_category');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projectCategory = ProjectCategory::find($id);
        DB::beginTransaction();
        try {
            $message = MESSAGE_NOT_FOUND_RECORD;
            if (!$projectCategory) {
                return response()->view('errors.500', compact('message'));
            }

            $projects = Project::where('category_id', $projectCategory->id)->get();
            $projectController = new ProjectController();
            foreach ($projects as $project) {
                $projectController->destroy($project->id);
            }

            Project::where('category_id', $projectCategory->id)->delete();
            Session::flash('message_success', MESSAGE_DELETE_OK);
            $projectCategory->delete();
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
            Session::flash('message_error', MESSAGE_DELETE_ERROR);
        }
        return redirect()->route('back.project_category');
    }
}
