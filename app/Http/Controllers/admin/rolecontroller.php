<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\model\admin\permission;
use App\model\admin\role;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;


class rolecontroller extends Controller
{
    
    protected $role;

    protected $permission;
     
     public function __construct(PermissionRepository $permission, RoleRepository $role)
    {
        $this->role = $role;

        $this->permission = $permission;

        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        if(Auth::user()->can('users.create')){
        $roles = $this->role->getall();
        return view('admin.role.index',compact('roles'));
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
        $permissions =  $this->permission->getall();
        return view('admin.role.create',compact('permissions'));
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
        

        $role = new role;
        $role->name = $request->name;
        $role->save();
        $role->permissions()->sync($request->permissions);
        
        
        return redirect(route('role.index'))->with('message','role created successfully');
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
        $permissions = permission::all();
        $roles = role::find($id);
       return view ('admin.role.edit',compact('roles','permissions'));
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
           'name' => 'required|max:50',
            ]);

        $role = role::find($id);
        $role->name = $request->name;
        $role->save();
        $role->permissions()->sync($request->permissions);
        return redirect(route('role.index'))->with('message','role updated successfully');
    }

    /**

     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roles = role::find($id);
        $roles->delete();
        return redirect()->route('role.index');
            
    }
 }
