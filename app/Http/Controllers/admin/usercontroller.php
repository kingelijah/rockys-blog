<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\admin\admin;
use App\model\admin\role;


class usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $users = admin::all();
        return view('admin.user.index',compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $roles = role::all();
        return view('admin.user.create', compact('roles'));
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
           
           'name' => 'required|string|max:255',
           'email' => 'required|string|email|max:255',
           'password' => 'required|string|min:6|confirmed',
        
            ]);

        $admin = new admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = $request->password;
       
        $admin->save();
        $admin->roles() -> sync($request->role);
        return redirect(route('user.index'))->with('message','user created successfully');
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
        $users = admin::find($id);
        $roles = role::all();
        return view('admin.user.edit', compact('roles','users'));
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
           'name' => 'required|string|max:255',
           'email' => 'required|string|email|max:255',
           
        
            ]);

        $admin = admin::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
       
       
        $admin->save();
        $admin->roles() -> sync($request->role);
        return redirect(route('user.index'))->with('message','user updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = admin::find($id);
        $users->delete();
        return redirect(route('user.index'));
    }
}
