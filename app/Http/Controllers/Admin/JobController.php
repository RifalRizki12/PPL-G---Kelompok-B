<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Job;
use App\Models\Owner;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $job = Job::where('job_status', '!=', '3')->get();
        return view('admin.lowongan.job.index')->with('job', $job);
    }

    // public function create(Request $request)
    // {
    //     $user_id = Auth::user()->id;
    //     $user = User::findOrFail($user_id);
    //     $category = Category::where('status', '!=', '3')->get(); //3-> data yang dihapus
    //     return view('admin.lowongan.job.create')->with('category',$category);
    // }

    // public function store(Request $request)
    // {

    //     $job = new Job();
    //     $job->category_id = $request->input('category_id');
    //     $job->owner_id = $request->input('owner_id');
    //     $job->url = $request->input('url');
    //     $job->job_name = $request->input('job_name');
    //     $job->job_descrip = $request->input('job_descrip');
    //     $job->job_capacity = $request->input('job_capacity');
    //     if ($request->hasfile('job_image')) {
    //         $image_file = $request->file('job_image');
    //         $img_extension = $image_file->getClientOriginalExtension();
    //         $img_filename = time() . '.' . $img_extension;
    //         $image_file->move('uploads/jobimage/', $img_filename);
    //         $job->job_image = $img_filename;
    //     }
    //     $job->job_req = $request->input('job_req');
    //     $job->job_salary = $request->input('job_salary');
    //     $job->job_status = $request->input('job_status') == true ? '1' : '0'; //0->lowongan disembuntikan 1->lowongan ditampilkan
    //     $job->save();

    //     return redirect()->back()->with('status', 'Berhasil menambahkan Lowongan Baru');
    // }

    public function edit($id)
    {
        $category = Category::where('status', '!=', '3')->get(); //3 adalah data yang dihapus
        $job = Job::find($id);
        return view('admin.lowongan.job.edit')->with('category', $category)->with('job', $job);
    }

    public function update(Request $request, $id)
    {
        $job = Job::find($id);
        $job->category_id = $request->input('category_id');
        $job->url = $request->input('url');
        $job->job_name = $request->input('job_name');
        $job->job_descrip = $request->input('job_descrip');
        $job->job_capacity = $request->input('job_capacity');
        if ($request->hasfile('job_image')) {
            $filepath_image = 'uploads/jobimage/' . $job->job_image;
            if (File::exists($filepath_image)) {
                File::delete($filepath_image);
            }
            $image_file = $request->file('job_image');
            $img_extension = $image_file->getClientOriginalExtension();
            $img_filename = time() . '.' . $img_extension;
            $image_file->move('uploads/jobimage/', $img_filename);
            $job->job_image = $img_filename;
        }
        $job->job_req = $request->input('job_req');
        $job->job_salary = $request->input('job_salary');
        $job->job_status = $request->input('job_status') == true ? '1' : '0'; //0->lowongan disembuntikan 1->lowongan ditampilkan
        $job->update();

        return redirect()->back()->with('status', 'Lowongan berhasil di update');
    }

    public function delete($id)
    {
        $job = Job::find($id);
        $job->job_status = '3'; //3 data yang dihapus
        $job->update();

        return redirect()->back()->with('status', 'Lowongan telah dihapus');
    }
}
