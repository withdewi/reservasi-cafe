<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function menu()
    {
        return view('admin.menus');
    }

    public function create()
    {
        return view('admin.add-menus');
    }
}