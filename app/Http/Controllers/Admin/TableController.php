<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;

class TableController extends Controller
{
    public function table()
    {
        $table = Table::all();
        return view('admin.tables', compact('table'));
    }

    public function createTable()
    {
        $status = Table::all();
        return view('admin.add-tables', compact('status'));
    }

    public function storeTable(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'guest_number' => 'required',
            'status' => 'required',
            'location' => 'required',
        ],[
            'name.required' => '*Menu wajib diisi.',
            'guest_number.required' => '*Jumlah tamu wajib diisi.',
            'status.required' => '*Status wajib diisi.',
            'location.required' => '*Lokasi wajib diisi.',
        ]);

        $data = Table::create($request->all());

        return redirect()->route('table');
    }

    public function editTable($id)
    {
        $table = Table::find($id);
        return view('admin.edit-tables', compact('table'));
    }

    public function updateTable(Request $request, $id)
    {
        $data = Table::find($id);
        $data->update($request->all());

        return redirect()->route('table');
    }

    public function destroyTable(Request $request, $id) 
    {
        $data = Table::find($id);
        $data->delete();

        return redirect()->route('table');
    }
}
