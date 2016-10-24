<?php

namespace App\Http\Controllers\Back;

use App\Models\Project;
use App\Models\ProjectProducer;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectProducerRequest;
use Illuminate\Support\Facades\Session;
use DB;

class ProjectProducerController extends MyPageController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ProjectProducer::orderBy('updated_at', 'desc')->paginate(PAGINATION_PROJECT_PRODUCER);
        $indexBegin = ($data->currentPage() - 1) * PAGINATION_PROJECT_PRODUCER;
        return view('back.project_producer.index', compact('data', 'indexBegin'));
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
        $projectProducer = new ProjectProducer();
        if ($id) {
            $projectProducer = ProjectProducer::find($id);
            $message = MESSAGE_NOT_FOUND_RECORD;
            if (!$projectProducer) {
                return response()->view('errors.500', compact('message'));
            }
        }
        if ($request->isMethod('GET')) {
            return view('back.project_producer.update', compact('projectProducer', 'id'));
        }
        $validate = ProjectProducerRequest::validateData($request->all(), $id);
        if ($validate->fails()) {
            return redirect($request->path())
                ->withErrors($validate)
                ->withInput();
        }
        $projectProducer->name = $request->get('name');
        $projectProducer->slug = $request->get('slug');
        $projectProducer->save();
        if ($id) {
            Session::flash('message_success', MESSAGE_UPDATE_OK);
        } else {
            Session::flash('message_success', MESSAGE_CREATE_OK);
        }
        return redirect()->route('back.project_producer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projectProducer = ProjectProducer::find($id);
        DB::beginTransaction();
        try {
            $message = MESSAGE_NOT_FOUND_RECORD;
            if (!$projectProducer) {
                return response()->view('errors.500', compact('message'));
            }
            $projects = Project::where('producer_id', $projectProducer->id)->get();
            $projectController = new ProjectController();
            foreach ($projects as $project) {
                $projectController->destroy($project->id);
            }
            $projectProducer->delete();
            Session::flash('message_success', MESSAGE_DELETE_OK);
            DB::commit();
        } catch (Exception $ex) {
            Session::flash('message_error', MESSAGE_DELETE_ERROR);
        }
        return redirect()->route('back.project_producer');
    }
}
