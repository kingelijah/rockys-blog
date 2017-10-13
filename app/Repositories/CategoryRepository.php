<?php
namespace App\Repositories;
use App\model\user\category;
class CategoryRepository
{
   
    public function getAll()
    {
        return category::all();
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
        return category::find($id);
    }
    
    public function store($request)
    {
        return category::create($request);
    }
    
    public function update($request, $id)
    {
        return category::find($id)
                        ->update($request);
    }
    
    public function delete($id)
    {
        return category::destroy($id);
    }
}