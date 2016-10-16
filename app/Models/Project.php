<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'tbl_projects';

    public function projectCategory()
    {
        return $this->belongsTo('App\Models\ProjectCategory', 'project_category_id');
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
}
