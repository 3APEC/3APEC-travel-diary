<?php

namespace App\Http\Controllers;

use App\Http\Class\PermissionClass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        if(PermissionClass::checkPermission(1)){
            return view('users', [
                'users' => User::all(),
            ]);
        }
        else{
            return redirect()->route('home')->with('error', 'You do not have permission to view this page.');
        }
        
    }

    public function update(User $user, Request $request)
    {
        if(PermissionClass::checkPermission(1)){
            $user->update($request->validate([
                'role_id' => ['required', 'integer', 'exists:roles,id'],
                'name' => 'required',
                'email' => 'required'
            ]));
            return redirect()->route('users.index')->with('success', 'User updated successfully.');
        }
        else{
            return redirect()->route('home')->with('error', 'You do not have permission to view this page.');
        }
    }

    public function destroy(User $user)
    {
        if(PermissionClass::checkPermission(1)){
            $user->delete();
            return redirect()->route('users.index')->with('success', 'User deleted successfully.');
        }
        else{
            return redirect()->route('home')->with('error', 'You do not have permission to view this page.');
        }
    }

    public function edit(User $user)
    {
        if(PermissionClass::checkPermission(1))
        {
            return view('userform', [
                'user' => $user,
                'roles' => Role::all(),
            ]);
        } 
        else 
        {
            return redirect('home')->with('error', 'You are not allowed to do that!');
        }
    }
}
