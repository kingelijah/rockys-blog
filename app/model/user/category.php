<?php

namespace App\model\user;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
     public function posts ()
    {
    	return $this->belongsToMany('App\model\user\post', 'category_post')->orderBy('created_at', 'DESC')->paginate(5);
    }

    public function getRouteKeyName ()
    {
    	return 'slug';

    } 

    protected $fillable = ['name','slug'];  
}
