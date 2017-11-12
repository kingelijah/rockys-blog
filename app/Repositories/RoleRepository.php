<?php

namespace App\Repositories;
use App\model\admin\role;
class RoleRepository
{
   
    public function getAll()
    {
        return role::all();
    }
    /**
     * get projects in descending order.
     
    public function get()
    {
        return category::where('status', 1)
                        ->orderBy('id', 'desc')
                        ->paginate(15);
    }*/
    public function getById($id)
    {
        return role::find($id);
    }
    
    public function store($request)
    {
        return role::create($request);
    }
    
    public function update($request, $id)
    {
        return role::find($id)
                        ->update($request);
    }
    
    public function delete($id)
    {
        return role::destroy($id);
    }
}