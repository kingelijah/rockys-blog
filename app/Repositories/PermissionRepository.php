<?php
namespace App\Repositories;
use App\model\admin\permission;
class PermissionRepository
{
   
    public function getAll()
    {
        return permission::all();
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
        return permission::find($id);
    }
    
    public function store($request)
    {
        return permission::create($request);
    }
    
    public function update($request, $id)
    {
        return permission::find($id)
                        ->update($request);
    }
    
    public function delete($id)
    {
        return permission::destroy($id);
    }
}