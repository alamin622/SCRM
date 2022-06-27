<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Role;
use Session;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.index', compact('roles'));

    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // validation
         $this->validate($request, [
            'name' =>'required|max:50|unique:roles'
        ]);

        $role = Role::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            
            
        ]);

        Session::flash('success', 'Role created successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(role $role)
    {
        return view('admin.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,role $role)
    {
        // validation
        $this->validate($request, [
            'name' =>'required|max:50|unique:roles'
        ]);

        
        $role->name = $request->name;
        $role->slug = Str::slug($request->name, '-');
        $role->save();

        Session::flash('success', 'Role updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( role $role)
    {
        if($role){
            $role->delete();

            Session::flash('success', 'Role deleted successfully');
            return redirect()->route('role.index');
        }
    }
}
