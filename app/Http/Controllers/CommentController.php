<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    //

    public function index(Post $post)
{
    $comments = $post->comments()->with('user')->latest()->get();
    return view('comments.index', compact('post', 'comments'));
}



    public function store(Request $request,$postId) {
        
        $request->validate([
            'body' =>'required|max:100',
        ]);
        
        Comment::create([
            'body' => $request->body,
            'user_id' =>auth()->id(),
            'post_id' => $postId, 
        ]);

        return redirect()->back()->with('success','Comment added!');

    }
}
