<?php

namespace App\model\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{
	use Notifiable;


	public function roles()
    {
       return $this->belongsToMany('App\model\admin\role', 'admin_roles');
    }
   
   public function setPasswordAttribute($value)
    {
    	$this->attributes['password'] = bcrypt($value);
    }
}
