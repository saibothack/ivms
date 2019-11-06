<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Session;

class RoleController extends Controller {

    public function __construct() {
        
        //isAdmin middleware lets only users with a //specific permission permission to access these resources
        $this->middleware(['auth', 'isAdmin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $roles = Role::where('status', '=', 1)->paginate(10);;//Get all roles

        return view('roles.index')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $permissions = Permission::where('status', '=', 1)->get();;//Get all permissions

        return view('roles.create', ['permissions'=>$permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
    //Validate name and permissions field
        
        $this->validate($request, [
            'name'=>'required',
            'permissions' =>'required',
            ]
        );
        
        $user = Auth::User();

        $name = $request['name'];
        $role = new Role();
        $role->name = $name;
        $role->user_create = $user->id;

        $permissions = $request['permissions'];

        $role->save();
        
        //Looping thru selected permissions
        foreach ($permissions as $permission) {
            $p = Permission::where([['id', '=', $permission], 
                ['status', '=', 1]])->firstOrFail(); 
            
            //Fetch the newly created role and assign permission
            $role = Role::where([['name', '=', $name], 
                ['status', '=', 1]])->first(); 
            
            $role->givePermissionTo($p);
        }

        return redirect()->route('roles.index')
            ->with('flash_message',
             'Rol '. $role->name.' agregado!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return redirect('roles');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $role = Role::where('status', '=', 1)->findOrFail($id);
        $permissions = Permission::where('status', '=', 1)->get();

        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $user = Auth::User();
        $role = Role::where('status', '=', 1)->findOrFail($id);//Get role with the given id
        //Validate name and permission fields
        
        $this->validate($request, [
            'name'=>'required',
            'permissions' =>'required',
        ]);

        $user = Auth::User();
        $input = $request->except(['permissions']);
        $permissions = $request['permissions'];
        $input["user_modified"] = $user->id;
        $role->fill($input)->save();

        $p_all = Permission::where('status', '=', 1)->get();//Get all permissions

        foreach ($p_all as $p) {
            $role->revokePermissionTo($p); //Remove all permissions associated with role
        }

        foreach ($permissions as $permission) {
            $p = Permission::where([['id', '=', $permission], 
                ['status', '=', 1]])->firstOrFail(); //Get corresponding form //permission in db
            $role->givePermissionTo($p);  //Assign permission to role
        }

        return redirect()->route('roles.index')
            ->with('flash_message',
             'Rol '. $role->name.' modificado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::where('status', '=', 1)->findOrFail($id);
        $roleUpdate["status"] = 0;
        
        $role->fill($roleUpdate)->save();

        return redirect()->route('roles.index')
            ->with('flash_message',
             'Rol eliminado!');

    }
}
