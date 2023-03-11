<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class UserMenuController extends Controller
{
    public function menu()
    {
        $menu = Menu::all();
        return view('user.menus', compact('menu'));
    }
}
