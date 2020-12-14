<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Contracts\Auth\UserProvider;

class RegisteredController extends Controller
{
    public function index()
    {
        //$users = User::paginate(3);
        //$users = User::all();
        $users = User::where('role_as', Input::get('peran'))->get();
        return view('admin.users.index')->with('users', $users);
    }

    public function edit($id)
    {
        $user_roles = User::find($id);
        return view('admin.users.edit')->with('user_roles', $user_roles);
    }

    public function updaterole(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->role_as = $request->input('roles');
        $user->isverified = $request->input('isverified');
        $user->update();

        return redirect()->back()->with('status', 'Role is Updated');
    }
}
