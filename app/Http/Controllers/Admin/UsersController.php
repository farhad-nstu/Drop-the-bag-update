<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
    	$users = User::all();
    	$roles = Role::all();
    	return view('admin.users.index', compact('users', 'roles'));
    }

    public function updateStatus($id)
    {
    	$userStatus = User::find($id);
        
        $statusActive = $userStatus->status == 1;
        $statusDeactive = $userStatus->status == 0;
        
        if($statusActive) {
            $userStatus->status  = 0;
            $userStatus->save();
            
        } if($statusDeactive) {
            $userStatus->status  = 1;    
            $userStatus->save();
        }
        
        return back()->with('success', 'Publisher Update Success.');
    }
}
