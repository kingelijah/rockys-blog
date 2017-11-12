<?php

namespace App\Policies;


use App\model\admin\admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class userpolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the admin.
     *
     * @param  \App\User  $user
     * @param  \App\admin  $admin
     * @return mixed
     */
    public function view(User $user, admin $admin)
    {
        //
    }

    public function create(admin $user)
    {
        return $this->getPermission($user,6);
    }

    public function update(admin $user)
    {
       return $this->getPermission($user,8);
    }

    public function delete(admin $user)
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
