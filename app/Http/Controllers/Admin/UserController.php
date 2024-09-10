<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->with('roles')->get();
        return view('admin.user.index',compact(['users']));
    }

    public function createUserRole(User $user)
    {

        $roles = Role::query()->get();
        $userHasRole = $user->roles->pluck('id')->toArray();
        foreach ($roles as $item) {
            $item->checked = in_array($item->id, $userHasRole);
        }
        return view('admin.user.role',compact(['roles','user']));
    }

    public function storeUserRole(Request $request,User $user){

        $roleIds = [];

        if($request->has('roles')){
            $roleIds = array_map('intval', $request->roles);
        }
        $user->syncRoles($roleIds);

        return redirect()->route('admin.user');
    }
}
