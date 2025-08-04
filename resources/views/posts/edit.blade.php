@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
    <h1 class="text-2xl font-semibold mb-6">{{ isset($post) ? 'Edit Post' : 'Create Post' }}</h1>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ isset($post) ? route('posts.update', $post) : route('posts.store') }}">
        @csrf
        @if(isset($post))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label for="title" class="block font-medium text-gray-700 mb-2">Title</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                value="{{ old('title', $post->title ?? '') }}" 
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                required
            >
        </div>

        <div class="mb-4">
            <label for="body" class="block font-medium text-gray-700 mb-2">Body</label>
            <textarea 
                name="body" 
                id="body" 
                rows="6" 
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                required
            >{{ old('body', $post->body ?? '') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="summary" class="block font-medium text-gray-700 mb-2">Summary</label>
            <input 
                type="text" 
                name="summary" 
                id="summary" 
                value="{{ old('summary', $post->summary ?? '') }}" 
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
            >
        </div>

        <div class="mb-4">
            <label for="status" class="block font-medium text-gray-700 mb-2">Status</label>
            <select 
                name="status" 
                id="status" 
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                required
            >
                @php
                    $statuses = ['draft' => 'Draft', 'published' => 'Published', 'archived' => 'Archived'];
                @endphp
                @foreach($statuses as $key => $label)
                    <option value="{{ $key }}" {{ old('status', $post->status ?? '') === $key ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-6">
            <label for="published_at" class="block font-medium text-gray-700 mb-2">Published At</label>
            <input 
                type="datetime-local" 
                name="published_at" 
                id="published_at" 
                value="{{ old('published_at', isset($post) && $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
            >
        </div>

        <button 
            type="submit" 
            class="bg-indigo-600 text-white font-semibold px-6 py-2 rounded hover:bg-indigo-700 transition"
        >
            {{ isset($post) ? 'Update Post' : 'Create Post' }}
        </button>
    </form>
</div>
@endsection
