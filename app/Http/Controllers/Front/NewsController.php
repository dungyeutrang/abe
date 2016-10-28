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
        $before = News::where('id','>',$currentNew->id)->where('new_id',$currentNew->new_id)->first();
        $after = News::where('id','<',$currentNew->id)->where('new_id',$currentNew->new_id)->orderBy('id','desc')->first();

        return view('front.new.detail', compact('currentNew', 'newTypes', 'newTypeCurrent','before','after'));
    }
}
