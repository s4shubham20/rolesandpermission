<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use \Illuminate\Support\Facades\Hash;
use \App\Models\User;
use Spatie\Permission\Models\{Role,Permission};
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::role(['name' => 'admin', 'user'])->get();
        return view('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role  = Role::whereNotIn('name', ['superadmin'])->get();
        return view('admin.user.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      =>  'required',
            'email'     =>  'required|unique:users',
            'password'  =>  'required',
            'role'      =>  'required'
        ]);

        $user            =   new User();
        $user->name      =   $request->name;
        $user->email     =   $request->email;
        $user->password  =   Hash::make($request->password);
        $user->save();
        $user->syncRoles($request->role);
        return redirect()->back()->with('success','Successfully Added !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $eid)
    {
        $id = Crypt::decrypt($eid);
        $user = User::findOrFail($id);
        $role  = Role::whereNotIn('name', ['superadmin'])->get();
        return view('admin.user.edit')->with(['user' => $user, 'role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $eid)
    {
        $id = Crypt::decrypt($eid);
        $request->validate([
            'name'          =>  'required',
            'email'         =>  'required|unique:users,email,'.$id,
            'role'          =>  'required'
        ]);

        $user                   =   User::findOrFail($id);
        $user->name             =   $request->name;
        $user->email            =   $request->email;
        if($request->password != null){
            $user->password         =   Hash::make($request->password);
        }
        $user->save();
        $user->syncRoles($request->role);
        return redirect()->back()->with('success', 'Successfully Updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $eid)
    {
        $id = Crypt::decrypt($eid);
        Permission::destroy($id);
        return redirect()->back()->with('success','Successfully Deleted !');
    }

    public function getUsers()
    {
        $now = Carbon::now('Asia/Kolkata')->format('H:m:i');
        if($now < '12:00 PM'){
            $greet =  'Morning';
        }elseif($now < '17:00 PM'){
            $greet = 'Afternoon';
        }elseif($now < '20:00 PM'){
            $greet = 'Evening';
        }else{
            $greet = 'Night';
        }
        return view('admin.index', compact('greet'));
    }

}
