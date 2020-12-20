<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Facades\File;

class RegisteredController extends Controller
{
    public function index()
    {
        //$users = User::paginate(3);
        //$users = User::all();
        $users = User::where('role_as', Input::get('peran'))->where('isverified', Input::get('isverified'))->get();
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
        if ($request->hasFile('resume')) {
            $destination = 'uploads/resume/' . $user->resume;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('resume');
            $extention = $file->getClientOriginalExtension();
            $filename_resume = time() . '.' . $extention;
            $file->move('uploads/resume/', $filename_resume);
            $user->resume = $filename_resume;
        }
        $user->role_as = $request->input('roles');
        $user->isverified = $request->input('isverified');
        $user->update();

        return redirect()->back()->with('status', 'Role is Updated');
    }
}
