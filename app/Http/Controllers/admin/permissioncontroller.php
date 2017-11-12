<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Repositories\PermissionRepository;

class permissioncontroller extends Controller
{
    
    protected $permission;


     public function __construct(PermissionRepository $permission)
    {
        $this->permission = $permission;
        
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        if(Auth::user()->can('users.create')){
        $permissions = $this->permission->getall();
        return view('admin.permission.index',compact('permissions'));
         }
         return redirect(route('admin.home'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->can('users.create')){
        return view('admin.permission.create');
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
        $this->validate($request,[
            'name' => 'required|max:50',
            'for' => 'required|max:50',
            ]);

        $permission = [

        'name' => $request->input('name'),
        'for' => $request->input('for')
        ];

        $this->permission->store($permission);
        
        return redirect(route('permission.index'))->with('message','permission created successfully');
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
        $permissions = $this->permission->getById($id);
        return view('admin.permission.edit',compact('permissions'));
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
        $this->validate($request,[
            'name' => 'required|max:50',
            'for' => 'required|max:50'
            ]);

        $permission = [

        'name' => $request->input('name'),
        'for' => $request->input('for')
        ];

        $this->permission->update($permission,$id);
        return redirect(route('permission.index'))->with('message','permission created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->permission->delete($id);
        return redirect(route('permission.index'));
    }
}
