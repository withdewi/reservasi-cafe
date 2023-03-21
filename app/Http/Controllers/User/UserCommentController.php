<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comments;

class UserCommentController extends Controller
{
    public function comment()
    {
        $comment = Comments::all();
        return view('index', compact('comment'));
    }

    // public function createComment()
    // {
    //     $comment = Comments::all();
    //     return view('index');
    // }

    public function storeComment(Request $request)
    {
        $comment = Comments::create($request->all());

        return redirect()->back();
    }
}
