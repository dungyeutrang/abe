<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    const PROJECT_TYPE = 'type';
    const PROJECT_PRODUCER = 'producer';
    const PROJECT_YEAR = 'year';

    public function index()
    {

        $data = Project::all();
        $categories = ProjectCategory::all();
        $categoryByYear = Project::groupProjectByYear();
        $categoryByProducer = Project::groupProjectByProducer();
        $categoryByType = Project::groupProjectByType();
        $listProjectByCategories = Project::groupProjectByCategory();
        return view('front.project.index', compact('data', 'categories', 'categoryByYear', 'categoryByProducer', 'categoryByType', 'listProjectByCategories'));
    }

    public function category(Request $request)
    {
        $url = str_replace(url('/'), '', $request->fullUrl());
        $category = ProjectCategory::where('link', $url)->first();
        if (!$category) {
            return redirect()->route('front.index');
        }
        $data = Project::getProjectByCategoryUrl($url);
        $categoryName = $category->name;
        $categories = ProjectCategory::all();
        $categoryByYear = Project::groupProjectByYear();
        $categoryByProducer = Project::groupProjectByProducer();
        $categoryByType = Project::groupProjectByType();
        $listProjectByCategories = Project::groupProjectByCategory();
        return view('front.project.category',
            compact('data',
                'url',
                'categoryName',
                'categories',
                'categoryByYear',
                'categoryByProducer',
                'categoryByType',
                'listProjectByCategories'
            )
        );
    }

    public function type(Request $request, $category, $type, $detail)
    {
        switch ($type) {
            case self::PROJECT_PRODUCER:
                $this->listByProducer($request, $category, $type, $detail);
                break;
            default:
                return redirect()->route('front.index');
        }

    }

    function listByProducer($request, $category, $type, $detail)
    {
        $url = str_replace(url('/'), '', $request->fullUrl());
        $url = str_replace('/'.self::PROJECT_PRODUCER, '', $url);
        $url = str_replace('/'.$detail, '', $url);
        $category = ProjectCategory::where('link', $url)->first();
    }
}
