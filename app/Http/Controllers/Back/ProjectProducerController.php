<?php

namespace App\Http\Controllers\Back;

use App\Models\ProjectProducer;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectProducerRequest;
use Illuminate\Support\Facades\Session;

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
        if ($request->isMethod('GET')) {
            if ($id) {
                $projectProducer = ProjectProducer::find($id);
                $message = MESSAGE_NOT_FOUND_RECORD;
                if (!$projectProducer) {
                    return response()->view('errors.500', compact('message'));
                }
            }
            return view('back.project_producer.update', compact('projectCategory', 'id'));
        }
        $validate = ProjectProducerRequest::validateData($request->all());
        if ($validate->fails()) {
            return redirect($request->path())
                ->withErrors($validate)
                ->withInput();
        }
        $projectProducer->name = $request->get('name');
        $projectProducer->save();
        Session::flash('message_success', MESSAGE_CREATE_OK);
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
        try {
            $message = MESSAGE_NOT_FOUND_RECORD;
            if (!$projectProducer) {
                return response()->view('errors.500', compact('message'));
            }
            $projectProducer->delete();
        } catch (Exception $ex) {
            Session::flash('message_error', MESSAGE_DELETE_ERROR);
        }
        return redirect()->route('back.project_producer');
    }
}
