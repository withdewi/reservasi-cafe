<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category()
    {
        $category = Category::all();
        return view('admin.categories', compact('category'));
    }

    public function createCategory()
    {
        return view('admin.add-categories');
    }

    public function storeCategory(Request $request)
    {   
        $request->validate([
            'name' => 'required|unique:category',
            'description' => 'required',
            'file' => 'required',
        ],[
            'name.required' => '*Kategori wajib diisi.',
            'name.unique' => '*Kategori tidak boleh sama.',
            'description.required' => '*Deskripsi wajib diisi.',
            'file' => '*Gambar wajib diisi.',
        ]);

        $data = Category::create($request->all());

        if($request->hasFile('file')) {

            $request->file('file')->move('kategori/', $request->file('file')->getClientOriginalName());
            $data->file = $request->file('file')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('category');
    }

    public function editCategory($id)
    {
        $category = Category::find($id);
        return view('admin.edit-categories', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $data = Category::find($id);
        $data->update($request->all());

        if($request->hasFile('file')) {

            $request->file('file')->move('kategori/', $request->file('file')->getClientOriginalName());
            $data->file = $request->file('file')->getClientOriginalName();
            $data->update();
        }
        return redirect()->route('category');
    }

    public function destroyCategory(Request $request, $id) 
    {
        $data = Category::find($id);
        $data->delete();

        return redirect()->route('category');
    }
}
