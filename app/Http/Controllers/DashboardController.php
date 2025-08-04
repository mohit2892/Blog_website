<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch recent posts
        $recentPosts = Post::latest()->take(5)->get();

        return view('dashboard', compact('recentPosts'));
    }
}
