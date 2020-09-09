<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class News extends Model
{
	use SoftDeletes;
    protected $fillable = [
        'title', 'slug', 'image', 'meta_keyword', 'meta_description','content','user_id'
    ];
}
