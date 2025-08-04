@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-10">
    <h2 class="text-2xl font-bold mb-4">Comments for: {{ $post->title }}</h2>

    {{-- Comment Form --}}
    <form action="{{ route('comments.store', $post->id) }}" method="POST" class="mb-6">
        @csrf
        <textarea name="body" rows="3" class="w-full border rounded p-2" placeholder="Add a comment..."></textarea>
        <button type="submit" class="mt-2 bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded">
            Submit
        </button>
    </form>

    {{-- Comments List --}}
    @forelse($comments as $comment)
        <div class="bg-white shadow p-4 mb-3 rounded">
            <div class="text-gray-800">{{ $comment->body }}</div>
            <div class="text-sm text-gray-500">By: {{ $comment->user->name ?? 'Anonymous' }}</div>
        </div>
    @empty
        <div class="text-gray-500">No comments yet.</div>
    @endforelse
</div>
@endsection
