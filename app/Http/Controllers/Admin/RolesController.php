<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public function index()
    {

    	$roles = Role::all();
    	return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
    	return view('admin.roles.create');
    }

    public function store(Request $request)
    {
    	/*$roles = $request->all();
    	$addRoles = Role::create(['name' => $roles]);*/
    	$roles = new Role();
    	$roles->name = $request->name;
    	auth()->user()->assignRole()
    	$roles->save();
    	
    	// $role->save();
    	return redirect()->back();
    }
}
