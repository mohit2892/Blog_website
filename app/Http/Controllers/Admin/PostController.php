<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    // Uncomment and implement these as needed:

    // public function edit(Post $post)
    // {
    //     return view('admin.posts.edit', compact('post'));
    // }

    // public function update(Request $request, Post $post)
    // {
    //     $validated = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'body' => 'required|string',
    //         'summary' => 'nullable|string|max:255',
    //         'status' => 'required|in:draft,published',
    //         'published_at' => 'nullable|date',
    //     ]);

    //     $post->update($validated);

    //     return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully!');
    // }
    

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post deleted.');
    }
}
