<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Models\ProjectType;

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
        return view('back.project_type.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = null)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
