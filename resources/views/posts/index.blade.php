@extends('layouts.app')

@section('content')
@php use Illuminate\Support\Str; @endphp

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    {{-- Header --}}
    <div class="text-center mb-12">
        <h1 class="text-5xl font-extrabold text-gray-900 dark:text-white leading-tight mb-4">
            📝 Blog Website
        </h1>
        <p class="text-gray-600 dark:text-gray-300 text-lg mb-6">
            Discover articles, stories, and ideas by amazing authors.
        </p>
        <a href="{{ route('posts.create') }}"
           class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white text-lg font-semibold py-3 px-6 rounded-xl transition">
            ➕ Create New Post
        </a>
    </div>

    {{-- Posts --}}
    @if ($posts->isEmpty())
        <div class="text-center text-gray-500 dark:text-gray-400 mt-6 text-lg">
            😕 No posts found.<br>
            <a href="{{ route('posts.create') }}" class="text-indigo-600 hover:underline inline-block mt-3">
                Be the first to create one!
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach ($posts as $post)
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl shadow-md hover:shadow-xl transition-all overflow-hidden">
                    
                    {{-- Image --}}
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}"
                             alt="{{ $post->title }}"
                             class="w-full h-48 object-cover">
                    @else
                        <img src="https://via.placeholder.com/600x300?text=No+Image"
                             alt="No Image"
                             class="w-full h-48 object-cover">
                    @endif

                    <div class="p-6">
                        {{-- Title --}}
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white truncate mb-2">
                            {{ Str::limit($post->title, 60) }}
                        </h2>

                        {{-- Author + Time --}}
                        <div class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                            By {{ $post->user->name ?? 'User' }} • {{ $post->created_at->diffForHumans() }}
                        </div>

                        {{-- Body --}}
                        <p class="text-gray-700 dark:text-gray-300 text-[15px] leading-relaxed mb-4">
                            {{ Str::limit(strip_tags($post->body), 150) }}
                        </p>

                        {{-- Action buttons --}}
                        <div class="flex justify-between items-center">
                            {{-- Comment --}}
                            <a href="{{ route('comment', $post->id) }}"
                               class="text-indigo-600 hover:underline font-semibold text-sm">
                                💬 Comment
                            </a>

                            {{-- Edit/Delete Buttons --}}
                            <div class="flex gap-2">
                                <a href="{{ route('posts.edit', $post->id) }}"
                                   class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1.5 rounded-lg text-sm font-semibold transition">
                                    ✏️ Edit
                                </a>

                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this post?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded-lg text-sm font-semibold transition">
                                        🗑️ Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
