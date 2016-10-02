<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Models\ProjectCategory;
use App\Http\Requests\ProjectCategoryRequest;

class ProjectCategoryController extends MyPageController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ProjectCategory::orderBy('updated_at','desc')->paginate(PAGINATION_PROJECT_CATEGORY);
        return view('back.project_category.index', compact('data'));
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
        if ($request->isMethod('GET')) {
            if ($id) {
                $projectCategory = ProjectCategory::find($id);
                $message = MESSAGE_NOT_FOUND_RECORD;
                if (!$projectCategory) {
                    return response()->view('errors.500', compact('message'));
                }
            }
            return view('back.project_category.update', compact('projectCategory', 'id'));
        }
        $validate = ProjectCategoryRequest::validateData($request->all());
        if ($validate->fails()) {
            return redirect($request->path())
                ->withErrors($validate)
                ->withInput();
        }
        $projectCategory->name = $request->get('name');
        $projectCategory->save();
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
        $message = MESSAGE_NOT_FOUND_RECORD;
        if (!$projectCategory) {
            return response()->view('errors.500', compact('message'));
        }
        $projectCategory->destroy($id);
        return redirect()->route('back.project_category');
    }
}
