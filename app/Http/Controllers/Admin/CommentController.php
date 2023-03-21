<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comments;

class CommentController extends Controller
{
    public function comment()
    {
        $comment = Comments::all();
        return view('admin.comment', compact('comment'));
    }
}
