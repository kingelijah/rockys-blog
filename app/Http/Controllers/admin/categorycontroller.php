<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;

class categorycontroller extends Controller
{
   
     protected $category;



     public function __construct(CategoryRepository $category)
    
    {

        $this->category = $category;

        $this->middleware('auth:admin');
    }


    public function index()

    {  
        $categories = $this->category->getall(); 
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->can('users.create')){
        return view('admin.category.create');
        }
        return redirect(route('admin.home'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required',

            ]);

        $category = [

        'name' => $request->input('name'),
        'slug' => $request->input('name')
        ];

        $this->category->store($category);
        
        return redirect(route('category.index'))->with('message','category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->can('users.create')){
        $categorys = $this->category->getById($id);
       return view('admin.category.edit',compact('categorys'));
        }
        return redirect(route('admin.home'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
           'name' => 'required',
          

            ]);
        
        $category = [

        'name' => $request->input('name'),
        'slug' => $request->input('name')
        ];

        $this->category->update($category,$id);

        return redirect(route('category.index'))->with('status','category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->category->delete($id);
        return redirect()->route('category.index');
    }
}
