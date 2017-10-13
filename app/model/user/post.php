<?php

namespace App\model\user;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    public function categories ()
    {
    	return $this->belongsToMany('App\model\user\category', 'category_post')->withTimestamps();
    }

    public function getRouteKeyName ()
    {
    	return 'slug';

    }   

}
