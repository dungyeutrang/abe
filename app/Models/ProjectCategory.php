<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{

    protected $table = 'tbl_project_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public $timestamps = true;

    /**
     * get category by project type
     *
     * @return mixed
     */
    public static function getCategoryByProjectType()
    {
        return ProjectCategory::select(['tbl_project_types.project_category_id','tbl_project_categories.name'])
            ->join('tbl_project_types', 'tbl_project_categories.id', '=', 'tbl_project_types.project_category_id')
            ->distinct('tbl_project_categories.id')
            ->get();
    }
}


