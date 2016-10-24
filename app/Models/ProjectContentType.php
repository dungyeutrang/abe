<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectContentType extends Model
{
    protected $table = 'tbl_project_content_types';
    public $timestamps = true;
    public $fillable = ['project_id', 'project_type_id'];

    public function projectType()
    {
        return $this->belongsTo('App\Models\ProjectType', 'project_type_id');
    }
}
