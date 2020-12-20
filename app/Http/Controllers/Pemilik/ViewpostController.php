<?php

namespace App\Http\Controllers\Pemilik;

use App\Models\Job;
use App\Models\Category;
use App\Models\Users;
use App\Http\Controllers\Controller;
use App\Models\worker;
use Illuminate\Support\Facades\Request;

class ViewpostController extends Controller
{

    public function categoryview($category_url)
    {
        $category = Category::where('url', $category_url)->first();
        $category_id = $category->id;

        // if (Request::get('sort') == 'salary_asc') {
        //     $job = Job::where('category_id', $category_id)
        //         ->orderBy('job_salary', 'asc')
        //         ->where('job_status', '!=', '2')
        //         ->where('job_status', '0')->get();
        // } elseif (Request::get('sort') == 'salary_desc') {
        //     $job = Job::where('category_id', $category_id)
        //         ->orderBy('job_salary', 'desc')
        //         ->where('job_status', '!=', '2')
        //         ->where('job_status', '0')->get();
        // } elseif (Request::get('sort') == 'newest') {
        //     $job = Job::where('category_id', $category_id)
        //         ->orderBy('created_at', 'desc')
        //         ->where('job_status', '!=', '2')
        //         ->where('job_status', '0')->get();
        // } else {
        //     $job = Job::where('category_id', $category_id)->where('job_status', '!=', '2')->where('job_status', '0')->get();
        // }

        $worker = worker::where('category_id', $category_id)->where('status', '!=', '1')->where('status', '0')->get();

        return view('pemilik.post.post')->with('worker', $worker)->with('category', $category);
    }

    public function postview($category_url, $url)
    {
        $worker = worker::where('url', $url)->where('status', '!=', '1')->where('status', '0')->first();
        return view('pemilik.post.post-view')->with('worker', $worker);
    }
}
