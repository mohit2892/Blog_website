<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function index()
    // {
    //     $posts = Post::latest()->get();
    //     return view('posts.index', compact('posts'));
    // }

    public function index()
{
    $posts = Post::with('user')->latest()->get(); // Eager loading 'user' to avoid null errors
    return view('posts.index', compact('posts'));
}


    public function create()
    {
        return view('posts.create');
    }

   public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'body' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('image')) {
    $filename = $request->file('image')->store('posts', 'public'); // this saves to storage/app/public/posts
    $validated['image'] = $filename; // saves 'posts/filename.jpg'
}


    $validated['user_id'] = auth()->id(); // associate post with user

    Post::create($validated);

    return redirect()->route('posts.index')->with('success', 'Post created successfully!');
}



    public function show(Post $post)
{
    $post->load('comments.user'); // Eager load comments and their authors
    return view('posts.show', compact('post'));
}


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }


    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'summary' => 'nullable|string|max:255',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
        ]);

        $post->update($validated);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }
    

    public function destroy(Post $post)
{
    $post->delete();
    return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
}



}
