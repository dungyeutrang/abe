<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    protected $table = 'tbl_project_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'project_category_id'
    ];

    public function projectCategory()
    {
        return $this->belongsTo('App\Models\ProjectCategory','project_category_id');
    }

    public $timestamps = true;
}
