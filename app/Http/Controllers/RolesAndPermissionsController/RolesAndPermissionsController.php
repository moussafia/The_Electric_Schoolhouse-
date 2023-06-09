<?php

namespace App\Http\Controllers\RolesAndPermissionsController;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RolesAndPermissionsController extends Controller
{
    public function updateRolesUser(Request $request){
        $rules=[
            'userId' => 'required',
            'RolesUser' => 'required|string',
        ];
        $request->validate($rules);
        $roles=explode(',',$request->RolesUser);
        $user=User::findOrFail($request->userId);
        $roles=Role::whereIn('name',$roles)->get();
        $user->syncRoles($roles);
        $user->load('roles');
        return response()->json([
            "rolesUser"=>$user->roles,
            "user"=>$user->load('score')
        ]);
    }
    public function CreateRoles(Request $request){
         $rules=[
            'permissions' => 'required|string',
            'RoleName' => 'required|string|unique:roles,name'
        ];
        $request->validate($rules);
        $permissions=explode(',',$request->permissions);
        $role=Role::create(['name' =>$request->RoleName]);
        $role->syncPermissions($permissions);
        return response()->json([
            'role'=>$role
        ]);
    }
}
