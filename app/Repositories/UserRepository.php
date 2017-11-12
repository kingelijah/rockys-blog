<?php
namespace App\Repositories;
use App\model\admin\admin;
class UserRepository
{
   
    public function getAll()
    {
        return admin::all();
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
        return admin::find($id);
    }
    
    public function store($request)
    {
        return admin::create($request);
    }
    
    public function update($request, $id)
    {
        return admin::find($id)
                        ->update($request);
    }
    
    public function delete($id)
    {
        return admin::destroy($id);
    }
}