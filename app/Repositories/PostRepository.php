<?php
namespace App\Repositories;
use App\model\user\post;
use App\model\user\category;
class PostRepository
{
   
    public function getAll()
    {
         return post::paginate(5);
    }
    
    public function getById($id)
    {
        return post::with('categories')->find($id);
    }
    
    public function store($request)
    {
        return post::create($request);
    }
    
    public function update($request, $id)
    {
        return post::find($id)
                        ->update($request);
    }
    
    public function delete($id)
    {
        return post::destroy($id);
    }
}