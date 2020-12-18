<?php

namespace App\Http\Controllers\Pencari;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PencariController extends Controller
{
    public function index()
    {
        return view('pencari.dashboard');
    }

    public function myprofile()
    {
        return view('pencari.profil');
    }

    public function profilupdate(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        $user->name = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');

        if ($request->hasFile('foto')) {
            $destination = 'uploads/profile/' . $user->picture;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension();
            $f_filename = time() . '.' . $extention;
            $file->move('uploads/profile/', $f_filename);
            $user->picture = $f_filename;
        }

        if ($request->hasFile('resume')) {
            $destination = 'uploads/resume/' . $user->resume;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('resume');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/resume/', $filename);
            $user->resume = $filename;
        }
        $user->no_rek = $request->input('no_rek');
        $user->update();

        return redirect()->back()->with('status', 'Profil berhasil di Update');
    }
}
