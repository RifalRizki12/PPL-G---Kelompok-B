<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Job;

class LowonganController extends Controller
{
    public function index()
    {
        $category = Category::where('status','0')->get();
        return view ('frontend.lowongan.index')->with('category',$category);
    }

    public function categoryview($category_url)
    {
        $category = Category::where('url', $category_url)->first();
        $category_id = $category->id;

        $job = Job::where('category_id', $category_id)->where('job_status', '!=', '2')->where('job_status', '0')->get();
        return view('frontend.lowongan.job')->with('job',$job)->with('category',$category);
    }
}
