<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class UserCategoryController extends Controller
{
    public function category()
    {
        $category = Category::all();
        return view('user.categories', compact('category'));
    }
}
