<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'tbl_news';
    public $timestamps = true;

    public function newType()
    {
        return $this->belongsTo('App\Models\NewType', 'new_id');
    }
}
