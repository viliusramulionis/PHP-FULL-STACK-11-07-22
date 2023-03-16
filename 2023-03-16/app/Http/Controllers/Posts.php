<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts as PostsModel;

class Posts extends Controller
{
    public function index() {
        return view('posts');
    }

    public function newPost() {
        return view('newpost');
    }

    public function savePost(Request $request) {
        $newPost = new PostsModel;
        $newPost->title = $request->title;
        $newPost->content = $request->content;
        $newPost->save();

        return redirect('/posts');
    }
}
