<?php

namespace App\Http\Controllers\Pencari;

use App\Models\Job;
use App\Models\Users;
use App\Models\worker;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class LowonganController extends Controller
{
    public function index()
    {
        $category = Category::where('status', '0')->get();
        return view('pencari.lowongan.index')->with('category', $category);
    }

    public function categoryview($category_url)
    {
        $category = Category::where('url', $category_url)->first();
        $category_id = $category->id;

        if (Request::get('sort') == 'salary_asc') {
            $job = Job::where('category_id', $category_id)
                ->orderBy('job_salary', 'asc')
                ->where('job_status', '!=', '2')
                ->where('job_status', '0')->get();
        } elseif (Request::get('sort') == 'salary_desc') {
            $job = Job::where('category_id', $category_id)
                ->orderBy('job_salary', 'desc')
                ->where('job_status', '!=', '2')
                ->where('job_status', '0')->get();
        } elseif (Request::get('sort') == 'newest') {
            $job = Job::where('category_id', $category_id)
                ->orderBy('created_at', 'desc')
                ->where('job_status', '!=', '2')
                ->where('job_status', '0')->get();
        } else {
            $job = Job::where('category_id', $category_id)->where('job_status', '!=', '2')->where('job_status', '0')->get();
        }

        return view('pencari.lowongan.job')->with('job', $job)->with('category', $category);
    }

    public function jobview($category_url, $job_url)
    {
        $user = Auth::user()->id;
        $job = Job::where('url', $job_url)->where('job_status', '!=', '2')->where('job_status', '0')->first();
        return view('pencari.lowongan.job-view')->with('job', $job)->with('user', $user);
    }
}
