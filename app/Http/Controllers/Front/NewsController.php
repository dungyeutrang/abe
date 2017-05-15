<?php

namespace App\Http\Controllers\Front;

use App\Models\News;
use App\Models\NewType;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('updated_at', 'desc')->get();
        $newTypes = NewType::orderBy('name', 'desc')->get();
        return view('front.new.index', compact('news', 'newTypes'));
    }

    public function type(Request $request)
    {
        $url = str_replace(url('/'), '', $request->fullUrl());
        $newTypeCurrent = NewType::where('link', $url)->first();
        if (!$newTypeCurrent) {
            return redirect()->route('front.index');
        }
        $news = News::where('new_id', $newTypeCurrent->id)->orderBy('updated_at', 'desc')->get();
        $newTypes = NewType::orderBy('name', 'desc')->get();
        return view('front.new.type', compact('news', 'newTypes', 'newTypeCurrent'));
    }

    public function detail(Request $request)
    {
        $url = str_replace(url('/'), '', $request->fullUrl());
        $currentNew = News::where('link',$url)->first();
        $newTypeCurrent = $currentNew->newType;
        $newTypes = NewType::orderBy('name', 'desc')->get();
        $listAllNewsId = News::select(['id','link'])->where('new_id',$currentNew->new_id)->orderBy('updated_at', 'desc')->get();
        foreach ($listAllNewsId as $index => $newId) {
            if ($newId->id == $currentNew->id) {
                $before = null;
                if (isset($listAllNewsId[$index - 1])) {
                    $before = $listAllNewsId[$index - 1];
                }
                $after = null;
                if(isset($listAllNewsId[$index+1])){
                    $after = $listAllNewsId[$index+1];
                }
                break;
            }
        }
        return view('front.new.detail', compact('currentNew', 'newTypes', 'newTypeCurrent','before','after'));
    }
}
