<?php

namespace App\Http\Controllers\Pencari;

use App\Models\Job;
use App\models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class SendController extends Controller
{

    public function sendrequest(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        $user->job_id = $request->input('job_id');
        $user->update();

        return redirect()->back()->with('status', 'Lamaran Telah Dikirim');
    }
}
