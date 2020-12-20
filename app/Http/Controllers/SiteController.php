<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\worker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class SiteController extends Controller
{
    public function home()
    {
        // $job = Job::all();
        // return view('sites.home',compact(['jobs']));
        return view('frontend.index');
    }

    public function about()
    {
        return view('sites.about');
    }
    public function contact()
    {
        return view('sites.contact');
    }

    public function register()
    {
        return view('sites.register');
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    public function postregister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
        ]);

        //input pendaftar sebagai user dulu
        $user = new \App\User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_as = $request->role_as;
        $user->password = bcrypt($request->password);
        $user->isverified = $request->isverified;
        if (request()->hasFile('resume')) {
            $file = request()->file('resume');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            request()->file('resume')->storeAs('uploads/resume/', $filename);
            $file->move('uploads/resume/', $filename);
            $user->update(['resume' => $filename]);
            $user->resume = $filename;
        }

        $user->remember_token = str_random(60);
        $user->save();

        if ($user->role_as = 'pencari') {
            $request->request->add(['user_id' => $user->id]);
            $user = worker::create([
                'user_id' => $user['id'],
            ]);
        }

        //insert ke tabel siswa

        return redirect('/login')->with('sukses', 'Pendaftaran Berhasil');
    }


    public function singlepost($url)
    {
        $job = Job::where('url', '=', $url)->first();
        return view('sites.singlepost', compact(['post']));
    }
}
