<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectController extends Controller
{


    public function index()
    {

        $data = Project::orderBy('updated_at', 'desc')->get();
        $categories = ProjectCategory::all();
        $groupItem = array();
        foreach ($categories as $cate) {
            $groupItem[$cate->id] = array();
            $groupItem[$cate->id]['years'] = Project::groupProjectByYear($cate->id);
            $groupItem[$cate->id]['types'] = Project::groupProjectByType($cate->id);
            $groupItem[$cate->id]['producers'] = Project::groupProjectByProducer($cate->id);
        }
        $listProjectByCategories = Project::groupProjectByCategory();
        return view('front.project.index', compact('data', 'categories', 'groupItem', 'listProjectByCategories'));
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
        $groupItem = array();
        foreach ($categories as $cate) {
            $groupItem[$cate->id] = array();
            $groupItem[$cate->id]['years'] = Project::groupProjectByYear($cate->id);
            $groupItem[$cate->id]['types'] = Project::groupProjectByType($cate->id);
            $groupItem[$cate->id]['producers'] = Project::groupProjectByProducer($cate->id);
        }
        $listProjectByCategories = Project::groupProjectByCategory();
        return view('front.project.category',
            compact('data',
                'url',
                'categoryName',
                'categories',
                'groupItem',
                'listProjectByCategories'
            )
        );
    }

    public function type(Request $request, $category, $type, $detail)
    {
        $url = str_replace(url('/'), '', $request->fullUrl());

        switch ($type) {
            case PROJECT_PRODUCER:
                $url = str_replace('/' . PROJECT_PRODUCER, '', $url);
                $url = str_replace('/' . $detail, '', $url);
                $category = ProjectCategory::where('link', $url)->first();
                if (!$category) {
                    return redirect()->route('front.index');
                }
                $data = Project::getProjectByCategoryAndProducerSlug($category->id, $detail);
                break;
            case PROJECT_YEAR:
                $url = str_replace('/' . PROJECT_YEAR, '', $url);
                $url = str_replace('/' . $detail, '', $url);
                $category = ProjectCategory::where('link', $url)->first();
                if (!$category) {
                    return redirect()->route('front.index');
                }
                $data = Project::getProjectByCategoryAndYear($category->id, $detail);
                break;
            case PROJECT_TYPE:
                $urlOld = $url;
                $url = str_replace('/' . PROJECT_TYPE, '', $url);
                $url = str_replace('/' . $detail, '', $url);
                $detail = $urlOld;
                $category = ProjectCategory::where('link', $url)->first();
                if (!$category) {
                    return redirect()->route('front.index');
                }
                $data = Project::getProjectByCategoryAndType($detail);
                break;
            default:
                return redirect()->route('front.index');
        }

        $categoryName = $category->name;
        $categories = ProjectCategory::all();
        $groupItem = array();
        foreach ($categories as $cate) {
            $groupItem[$cate->id] = array();
            $groupItem[$cate->id]['years'] = Project::groupProjectByYear($cate->id);
            $groupItem[$cate->id]['types'] = Project::groupProjectByType($cate->id);
            $groupItem[$cate->id]['producers'] = Project::groupProjectByProducer($cate->id);
        }
        $listProjectByCategories = Project::groupProjectByCategory();
        return view('front.project.type',
            compact('data',
                'url',
                'detail',
                'type',
                'categoryName',
                'category',
                'categories',
                'groupItem',
                'listProjectByCategories'
            )
        );

    }

    public function detail(Request $request)
    {
        $url = str_replace(url('/'), '', $request->fullUrl());
        $project = Project::where('link', $url)->first();
        if (!$project) {
            return redirect()->route('front.index');
        }
        $category = $project->projectCategory;
        $url = $category->url;
        $projectImages = $project->projectImage;
        $projectTypes = $project->projectContentType;
        if (!$category) {
            return redirect()->route('front.index');
        }
        $categoryName = $category->name;
        $categories = ProjectCategory::all();
        $groupItem = array();
        foreach ($categories as $cate) {
            $groupItem[$cate->id] = array();
            $groupItem[$cate->id]['years'] = Project::groupProjectByYear($cate->id);
            $groupItem[$cate->id]['types'] = Project::groupProjectByType($cate->id);
            $groupItem[$cate->id]['producers'] = Project::groupProjectByProducer($cate->id);
        }
        $listProjectByCategories = Project::groupProjectByCategory();
        $listAllProjectId = Project::select(['id','link'])->orderBy('updated_at', 'desc')->get();
        foreach ($listAllProjectId as $index => $prId) {
            if ($prId->id == $project->id) {
                $before = null;
                if (isset($listAllProjectId[$index - 1])) {
                    $before = $listAllProjectId[$index - 1];
                }
                $after = null;
                if(isset($listAllProjectId[$index+1])){
                    $after = $listAllProjectId[$index+1];
                }
                break;
            }
        }
        $linkCategory = url('/') . $category->link;
        return view('front.project.detail',
            compact('project',
                'url',
                'linkCategory',
                'projectImages',
                'projectTypes',
                'categoryName',
                'categories',
                'groupItem',
                'listProjectByCategories',
                'before',
                'after'
            )
        );
    }

}
