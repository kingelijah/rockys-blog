<?php

namespace App\Policies;

use App\model\admin\admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class postpolicy
{
    use HandlesAuthorization;

   
    public function view(admin $user)
    {
        //
    }

    
    public function create(admin $user)
    {
        return $this->getPermission($user,2);
    }

    public function update(admin $user)
    {
       return $this->getPermission($user,5);
    }

    public function delete(admin $user)
    {
       return $this->getPermission($user,6);
    } 

    public function category(admin $user)
    {
       return $this->getPermission($user,7);
    }

    protected function getPermission($user,$p_id)
    {
        foreach ($user->roles as $role) {
            foreach ($role->permissions as  $permission) {
              if($permission->id == $p_id)
              {
                return true;
              }
            }
        }
      return false;
    }
}
