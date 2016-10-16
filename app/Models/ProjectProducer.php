<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectProducer extends Model
{
    protected $table = 'tbl_project_producers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public $timestamps = true;
}
