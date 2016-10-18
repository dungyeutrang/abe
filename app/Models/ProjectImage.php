<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    protected $table = 'tbl_project_images';
    public $timestamps = true;
    public $fillable = ['project_id','image','caption'];
}
