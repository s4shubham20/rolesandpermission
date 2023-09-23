<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\{Role,Permission};
use \Illuminate\Support\Facades\Crypt;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = Role::all();
        $permission = Permission::all();
        return view('admin.role.create', compact('role','permission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|unique:roles',
            'permission'    => 'required'
        ]);

        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permission);
        return redirect()->back()->with('success','Successfully Added !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $eid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $eid)
    {
        $id = Crypt::decrypt($eid);
        $role = Role::findById($id);
        $permission = Permission::all();
        return view('admin.role.edit', compact('role','permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $eid)
    {
        $id = Crypt::decrypt($eid);
        $request->validate([
            'name'          => 'required|unique:roles,name,'.$id,
            'permission'    => 'required'
        ]);
        $role = Role::findById($id);
        $role->name = $request->name;
        $role->save();
        $role->syncPermissions($request->permission);
        return redirect()->back()->with('success','Successfully Updated !');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $eid)
    {
        $id = Crypt::decrypt($eid);
        Role::destroy($id);
        return redirect()->back()->with('success','Successfully Deleted !');
    }
}
