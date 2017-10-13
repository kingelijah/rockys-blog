<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    public function roles()
    {
    	return $this->belongsToMany('App\model\admin\role', 'permission_role');
    }
}
