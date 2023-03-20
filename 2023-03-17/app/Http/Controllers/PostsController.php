<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostsController extends Controller
{
    public function index() {
        return view('posts');
    }

    public function newPost() {
        return view('newpost');
    }

    public function savePost(Request $request) {
        $newPost = new Posts;
        $newPost->title = $request->title;
        $newPost->content = $request->content;
        $newPost->save();

        return redirect('/posts');
    }
}
