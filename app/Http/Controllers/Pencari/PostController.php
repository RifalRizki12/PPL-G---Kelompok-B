<?php

namespace App\Http\Controllers\Pencari;

use App\User;
use App\Models\Job;
use App\Models\Owner;
use App\Models\worker;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function mypost(Request $request)
    {
        //$worker = Job::where('job_status', '!=', '3')->get();
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        $worker = worker::where('user_id', '=', $user_id)->get();
        return view('pencari.post')->with('worker', $worker);
    }


    public function edit($id)
    {
        $category = Category::where('status', '!=', '3')->get(); //3 adalah data yang dihapus
        $worker = worker::find($id);
        return view('pencari.edit-post')->with('category', $category)->with('worker', $worker);
    }

    public function postupdate(Request $request, $id)
    {
        $worker = worker::find($id);
        $worker->category_id = $request->input('category_id');
        $worker->url = $request->input('url');
        $worker->work_experience = $request->input('work_experience');
        $worker->field_work = $request->input('field_work');
        if ($request->hasfile('img_thumb')) {
            $filepath_image = 'uploads/worker/' . $worker->img_thumb;
            if (File::exists($filepath_image)) {
                File::delete($filepath_image);
            }
            $image_file = $request->file('img_thumb');
            $img_extension = $image_file->getClientOriginalExtension();
            $w_filename = time() . '.' . $img_extension;
            $image_file->move('uploads/worker/', $w_filename);
            $worker->img_thumb = $w_filename;
        }
        $worker->status = $request->input('status') == true ? '1' : '0'; //0->lowongan disembuntikan 1->lowongan ditampilkan
        $worker->update();

        return redirect()->back()->with('status', 'Lowongan berhasil di update');
    }
}
