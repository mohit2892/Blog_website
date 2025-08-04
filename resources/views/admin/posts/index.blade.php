@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <h1 class="text-4xl font-bold mb-8 text-gray-900 dark:text-white">All Posts</h1>

    <div class="space-y-8">
        @foreach ($posts as $post)
            <article class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 transition hover:shadow-lg">
                <h2 class="text-2xl font-semibold mb-2 text-indigo-600 dark:text-indigo-400">{{ $post->title }}</h2>
                
                <p class="text-gray-700 dark:text-gray-300 mb-4">{{ Str::limit($post->summary ?? $post->body, 150) }}</p>

                <div class="flex flex-wrap gap-4 text-sm text-gray-500 dark:text-gray-400 mb-4">
                    <div><strong>Status:</strong> {{ ucfirst($post->status) }}</div>
                    <div><strong>Published:</strong> {{ optional($post->published_at)->format('M d, Y H:i') ?? 'N/A' }}</div>
                    <div><strong>Author:</strong> {{ $post->user?->name ?? 'Unknown' }}</div>
                </div>

                <a href="{{ route('posts.edit', $post) }}" class="inline-block px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                    Edit
                </a>
                <!-- <a href="{{ route('posts.edit', $post) }}" class="inline-block px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition"> -->
                    <!-- delete
                </a> -->
                <!-- <a href="{{ route('posts.edit', $post) }}" class="inline-block px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                    Edit
                </a> -->


            </article>
        @endforeach
    </div>
</div>
@endsection
