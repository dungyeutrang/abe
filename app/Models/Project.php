<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Project extends Model
{
    protected $table = 'tbl_projects';

    public function projectCategory()
    {
        return $this->belongsTo('App\Models\ProjectCategory', 'category_id');
    }

    public function projectProducer()
    {
        return $this->belongsTo('App\Models\ProjectProducer', 'producer_id');
    }

    public function projectImage()
    {
        return $this->hasMany('App\Models\ProjectImage', 'project_id');
    }

    public function projectContentType()
    {
        return $this->hasMany('App\Models\ProjectContentType', 'project_id');
    }

    public $timestamps = true;

    /**
     * get project have type id
     *
     * @param $typeId
     * @return mixed
     */
    public static function getProjectHaveTypeId($typeId)
    {
        return self::join('tbl_project_content_types', 'tbl_projects.id', '=', 'tbl_project_content_types.project_id')
            ->where('project_type_id', $typeId)
            ->select(['tbl_projects.id'])
            ->get();
    }

    /**
     * get project by category url
     * @param $url
     * @return mixed
     */
    public static function getProjectByCategoryUrl($url)
    {
        return self::join('tbl_project_categories', 'tbl_projects.category_id', '=', 'tbl_project_categories.id')
            ->where('tbl_project_categories.link', $url)
            ->select(['tbl_projects.*'])
            ->orderBy('tbl_projects.updated_at','desc')
            ->get();
    }

    /**
     * get project by year
     * @param $categoryId
     * @return mixed
     */
    public static function groupProjectByYear($categoryId)
    {
        return self::select('year', DB::raw('count(tbl_projects.id) as count'))
            ->where('category_id', $categoryId)
            ->groupBy('year')
            ->get();

    }

    /**
     * get project by producer
     * @param $categoryId
     * @return mixed
     */
    public static function groupProjectByProducer($categoryId)
    {
        return self::select('producer_id', 'tbl_project_producers.name', 'tbl_project_producers.slug', DB::raw('count(tbl_projects.id) as count'))
            ->join('tbl_project_producers', 'tbl_projects.producer_id', '=', 'tbl_project_producers.id')
            ->where('category_id', $categoryId)
            ->groupBy('producer_id')
            ->get();
    }

    /**
     * get project by producer
     * @param  $categoryId
     * @return mixed
     */
    public static function groupProjectByType($categoryId)
    {
        return ProjectContentType::select('tbl_project_types.link', 'project_type_id', 'category_id', DB::raw('count(tbl_project_content_types.id) as count'))
            ->join('tbl_projects', 'tbl_projects.id', '=', 'tbl_project_content_types.project_id')
            ->join('tbl_project_types', 'tbl_project_types.id', '=', 'tbl_project_content_types.project_type_id')
            ->where('tbl_projects.category_id', $categoryId)
            ->groupBy('project_type_id')
            ->get();

    }

    /**
     * get project by producer
     *
     * @return mixed
     */
    public static function groupProjectByCategory()
    {
        return self::select('category_id', DB::raw('count(id) as count'))
            ->groupBy('category_id')->get();
    }

    /**
     * get project by category and producer
     *
     * @param $categoryId
     * @param $slug
     * @return mixed
     */
    public static function getProjectByCategoryAndProducerSlug($categoryId, $slug)
    {
        return self::select(DB::raw('tbl_projects.*'))
            ->join('tbl_project_producers', 'tbl_project_producers.id', '=', 'tbl_projects.producer_id')
            ->where('category_id', $categoryId)
            ->where('slug', $slug)
            ->orderBy('tbl_projects.updated_at','desc')
            ->get();
    }

    /**
     * get project by category and year
     *
     * @param $categoryId
     * @param $year
     * @return mixed
     */
    public static function getProjectByCategoryAndYear($categoryId, $year)
    {
        return self::select(DB::raw('tbl_projects.*'))
            ->where('category_id', $categoryId)
            ->where('year', $year)
            ->orderBy('updated_at','desc')
            ->get();
    }

    public static function getProjectByCategoryAndType($urlType)
    {
        return self::select(DB::raw('tbl_projects.*'))
            ->join('tbl_project_content_types', 'tbl_projects.id', '=', 'tbl_project_content_types.project_id')
            ->join('tbl_project_types', 'tbl_project_types.id', '=', 'tbl_project_content_types.project_type_id')
            ->where('tbl_project_types.link', $urlType)
            ->orderBy('tbl_projects.updated_at','desc')
            ->get();
    }

}
