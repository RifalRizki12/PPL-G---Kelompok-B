<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::where('status', '!=', '2')->get();
        return view('admin.lowongan.category.index')->with('category', $category);
    }
    public function viewpage()
    {
        return view('admin.lowongan.category.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categorys',
            'url' => 'required|unique:categorys',
        ]);

        $category = new Category();
        $category->name = $request->input('name');
        $category->url = $request->input('url');
        $category->descrip = $request->input('descrip');
        if ($request->input('status') == true) {
            $category->status = "1";
        } else {
            $category->status = "0";
        }
        $category->save();
        return redirect()->back()->with('status', 'Berhasil Menambah Kategori');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.lowongan.category.edit')->with('category', $category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->url = $request->input('url');
        $category->descrip = $request->input('descrip');
        $category->status = $request->input('status') == true ? '1' : '0';
        $category->update();

        return redirect()->back()->with('status', 'Kategori Berhasil di Update');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->status = "2"; //0->ditampilkan, 1->disembunyikan, 2->dihapus
        $category->update();

        return redirect()->back()->with('status', 'Kategori telah dihapus');
    }

    public function deletedcategory()
    {
        $category = Category::where('status', '2')->get();
        return view('admin.lowongan.category.deleted')->with('category', $category);
    }

    public function deletedrestore($id)
    {
        $category = Category::find($id);
        $category->status = "0"; //0->ditampilkan, 1->disembunyikan, 2->dihapus
        $category->update();

        return redirect('category')->with('status', 'Kategori telah dikembalikan');
    }
}
