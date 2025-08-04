@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded shadow-md">

    <h1 class="text-3xl font-bold mb-6 text-indigo-600 text-center">Create a New Post</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc pl-5 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="space-y-6">
    @csrf

    <!-- Title -->
    <div>
        <label for="title" class="block text-gray-700 font-semibold">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}"
               class="w-full mt-1 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
    </div>

    <!-- Body -->
    <div>
        <label for="body" class="block text-gray-700 font-semibold">Body</label>
        <textarea name="body" id="body" rows="6" required
                  class="w-full mt-1 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('body') }}</textarea>
    </div>

    <!-- Image Upload -->
    <div>
        <label for="image" class="block text-gray-700 font-semibold">Image (optional)</label>
        <input type="file" name="image" id="image"
               class="w-full mt-1 border rounded-lg p-2 bg-white text-sm">
    </div>

    <!-- Submit -->
    <div class="text-center">
        <button type="submit"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded shadow font-semibold transition duration-200">
            Create Post
        </button>
    </div>
</form>

</div>
@endsection
