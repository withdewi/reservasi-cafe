<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function menu()
    {
        $menu = Menu::all();
        return view('admin.menus', compact('menu'));
    }

    public function createMenu()
    {
        return view('admin.add-menus');
    }
    public function storeMenu(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:menus',
            'file' => 'required',
            'price' => 'required',
            'description' => 'required',
        ],[
            'name.required' => '*Menu wajib diisi.',
            'name.unique' => '*Menu tidak boleh sama.',
            'file' => '*Gambar wajib diisi.',
            'price' => '*Harga Menu wajib diisi.',
            'description.required' => '*Deskripsi wajib diisi.',
        ]);

        $data = Menu::create($request->all());

        if($request->hasFile('file')) {

            $request->file('file')->move('menu/', $request->file('file')->getClientOriginalName());
            $data->file = $request->file('file')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('menu');
    }
    public function editMenu($id)
    {
        $menu = Menu::find($id);
        return view('admin.edit-menus', compact('menu'));
    }

    public function updateMenu(Request $request, $id)
    {
        $data = Menu::find($id);
        $data->update($request->all());

        if($request->hasFile('file')) {

            $request->file('file')->move('menu/', $request->file('file')->getClientOriginalName());
            $data->file = $request->file('file')->getClientOriginalName();
            $data->update();
        }
        return redirect()->route('menu');
    }
    public function destroyMenu(Request $request, $id) 
    {
        $data = Menu::find($id);
        $data->delete();

        return redirect()->route('menu');
    }
}
