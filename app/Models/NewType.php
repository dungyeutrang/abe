<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewType extends Model
{
    protected $table = 'tbl_type_news';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public $timestamps = true;
}
