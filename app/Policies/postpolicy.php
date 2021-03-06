<?php

namespace App\Policies;

use App\model\admin\admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class postpolicy
{
    use HandlesAuthorization;

   
    public function view(admin $user)
    {
      return $this->getPermission($user,5);
    }

    
    public function create(admin $user)
    {
        return $this->getPermission($user,1);
    }

    public function update(admin $user)
    {
       return $this->getPermission($user,2);
    }

    public function delete(admin $user)
    {
       return $this->getPermission($user,3);
    } 

    public function publish(admin $user)
    {
      
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
