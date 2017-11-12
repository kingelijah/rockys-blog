<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\model\admin\admin;
use App\model\admin\role;
use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;


class usercontroller extends Controller
{
    
    protected $user;

    protected $role;



    
     public function __construct(UserRepository $user, RoleRepository $role)
    {
        $this->user = $user;
        $this->role = $role;
        $this->middleware('auth:admin');
    }

    public function index()
    {
        if(Auth::user()->can('users.create')){
        $users = $this->user->getall();
        return view('admin.user.index',compact('users'));
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
        $roles = $this->role->getall();
        return view('admin.user.create', compact('roles'));
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
        if(Auth::user()->can('users.create')){
        $users = $this->user->getById($id);
        $roles = $this->role->getall();
        return view('admin.user.edit', compact('roles','users'));
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
        $this->user->delete($id);
        return redirect(route('user.index'));
    }
}
